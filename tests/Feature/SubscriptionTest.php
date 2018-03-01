<?php

namespace Tests\Feature;

use App\Models\Subscription;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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

        $this->assertCount(1, Subscription::all());
        $this->assertEquals('roelgonzalez@example.org', Subscription::find(1)->email);
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
}
