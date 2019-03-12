<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Mockery\MockInterface;
use App\Models\Subscription;
use App\Libraries\EmailOctopusApi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmYourSubscriptionMailable;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubscriptionTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @var MockInterface */
    protected $emailOctopusApi;
    
    protected function setUp()
    {
        parent::setUp();
        
        $this->emailOctopusApi = Mockery::mock(EmailOctopusApi::class);
        $this->emailOctopusApi = $this->app->instance(EmailOctopusApi::class, $this->emailOctopusApi);
        config()->set('honeypot.enabled', false);
    }

    public function testItCanRequestToSubscribeToStayPosted()
    {
        Mail::fake();
        
        $this->post('/', [
            'email' => 'interested@example.com'
        ]);

        $subscriptions = Subscription::all();
        
        Mail::assertSent(ConfirmYourSubscriptionMailable::class);

        $this->assertCount(1, $subscriptions);
        $this->assertEquals('interested@example.com', $subscriptions->first()->email);
        $this->assertFalse((bool) $subscriptions->first()->confirmed);
    }
    
    public function testItCanConfirmItsSubscription()
    {
        $this->withoutExceptionHandling();
        $this->emailOctopusApi->shouldReceive('createContactOfAList')
            ->andReturn(
                File::get(base_path('tests/stubs/email-octopus-api/create-contact-of-a-list/success.json'))
            );

        factory(Subscription::class)->create([
            'token' => $token = md5(now()->timestamp),
            'confirmed' => false
        ]);

        $unconfirmedSubscription = Subscription::first();
        $this->assertEquals(false, $unconfirmedSubscription->confirmed);

        $response = $this->get('confirm-subscription/' . $token);
        $response->assertRedirect('/');

        $confirmedSubscription = Subscription::first();
        $this->assertEquals(true, $confirmedSubscription->confirmed);
    }

    public function testItCannotSubscribeTwice()
    {
        factory(Subscription::class)->create(['email' => 'interested@example.com']);
        
        $response = $this->post('/', ['email' => 'interested@example.com']);

        $response->assertSessionHasErrors('email');
        $this->assertCount(1, Subscription::all());
    }
}
