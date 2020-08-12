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
}
