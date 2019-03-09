<?php

namespace Tests\Feature;

use App\Mail\ConfirmYourSubscriptionMailable;
use App\Models\Subscription;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriptionTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    /** @test */
    public function it_can_subscribe_to_stay_posted()
    {
        $this->post('/', [
            'email' => 'interested@example.org'
        ]);

        $subscriptions = Subscription::all();

        $this->assertCount(1, $subscriptions);
        $this->assertEquals('interested@example.org', $subscriptions->first()->email);
    }

    /** @test */
    public function it_can_not_subscribe_twice()
    {
        $this->post('/', [
            'email' => 'interested@example.org'
        ]);

        $response = $this->post('/', [
            'email' => 'interested@example.org'
        ]);

        $response->assertSessionHasErrors('email');

        $this->assertCount(1, Subscription::all());
    }

    /** @test */
    public function it_can_confirm_its_subscription()
    {
        $this->withoutExceptionHandling();

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

    /** @test */
    public function it_can_send_an_email_for_confirmation()
    {
        Mail::fake();

        $this->post('/', [
            'email' => 'roelgonzalez@example.org'
        ]);

        Mail::assertSent(ConfirmYourSubscriptionMailable::class);
    }
}
