<?php

namespace Tests\Feature;

use App\Mail\ConfirmYourSubscription;
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
    function it_can_subscribe_to_stay_posted()
    {
        $this->post('/', [
            'email' => 'roelgonzalez@example.org'
        ]);

        $subscription = Subscription::all()->first();

        $this->assertCount(1, Subscription::all());
        $this->assertEquals('roelgonzalez@example.org', Subscription::find(1)->email);
        $this->assertEquals(false, $subscription->confirmed);
    }

    /** @test */
    function it_can_not_subscribe_twice()
    {
        $this->post('/', [
            'email' => 'roelgonzalez@example.org'
        ]);

        $response = $this->post('/', [
            'email' => 'roelgonzalez@example.org'
        ]);

        $response->assertSessionHasErrors('email');

        $this->assertCount(1, Subscription::all());
    }

    /** @test */
    function it_can_confirm_its_subscription()
    {
        $this->withoutExceptionHandling();

        factory('App\Models\Subscription')->create([
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
    function it_can_send_an_email_for_confirmation()
    {
        Mail::fake();

        $this->post('/', [
            'email' => 'roelgonzalez@example.org'
        ]);

        Mail::assertSent(ConfirmYourSubscription::class);
    }
}
