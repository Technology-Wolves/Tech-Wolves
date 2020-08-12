<?php

namespace Tests\Unit\Pages;

use Tests\TestCase;
use App\Contact;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function redirect_to_contact_page()
    {
        $response = $this->get('/contacts');
        $response->assertStatus(200);
        $response->assertViewIs('contacts');
    }

    /** @test */
    public function user_can_contact_with_the_owners()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/contacts', [
            'name' => 'Users Name',
            'email' => 'User@gmail.com',
            'subject' => 'Subject Arise Here...',
            'message' => 'Message Arise Here',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/contacts');
        $this->assertGuest();
    }

    /** @test */
    public function empty_field_validation()
    {
        $response = $this->post('/contacts', [
            'name' => '',
            'email' => 'Saugat@gmail.com',
            'subject' => 'Subject Arise Here...',
            'message' => 'Message Arise Here',
        ]);

        $response->assertSessionHasErrors('name');

    }

    /** @test */
    public function email_validation()
    {
        $response = $this->post('/contacts', [
            'name' => 'Deepak',
            'email' => 'invalid_email',
            'subject' => 'Subject Arise Here...',
            'message' => 'Message Arise Here',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }
}
