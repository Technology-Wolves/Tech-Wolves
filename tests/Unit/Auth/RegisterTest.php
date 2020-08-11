<?php

namespace Tests\Unit\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RegisterTest extends TestCase
{
   
    /** @test */
    public function register_displays_the_register_form()
    {
        $response = $this->get('/register');
        
        $response->assertStatus(200);
        $response->assertViewIs('auth.register');
    }

    /** @test */

    public function user_cannot_view_a_register_form_when_authenticated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect('/home');
    }


}
