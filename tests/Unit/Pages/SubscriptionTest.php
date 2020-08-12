<?php

namespace Tests\Unit\Pages;

use Tests\TestCase;
use App\Subscription;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_subscribe_with_valid_email()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/subscriptions', [
            'email' => 'User@gmail.com',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_subscribe_with_empty_form()
    {
        $response = $this->post('/subscriptions', [
            'email' => '',
        ]);

        $response->assertSessionHasErrors('email');

    }

    /** @test */
    public function same_user_cannot_subscribe_one_or_more_times()
    {
        $user = factory(Subscription::class)->create([
            'email' => $email = 'User@gmail.com',
        ]);

        $response = $this->post('/subscriptions', [
            'email' => $email,
        ]);

        $response->assertSessionHasErrors('email');

    }
}
