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
    use RefreshDatabase;
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

     /** @test */

     public function user_can_register_with_valid_input()
    {

        $response = $this->from('/register')->post('/register', [
            'name' => 'Users Name',
            'email' => 'User@gmail.com',
            'telephone' => '9849123456',
            'address' => 'Kathmandu',
            'gender' => 'female',
            'password' => 'user123',
            'password_confirmation' => 'user123',
            'regType' => 'buyer',
            'profileImage' => 'default.png'
        ]);
        // $response->assertStatus(200);
        $response->assertRedirect('/home');
        $this->assertAuthenticated();
    }

     /** @test */

     public function user_cannot_register_with_invalid_email()
     {
         $response = $this->from('/register')->post('/register', [
            'name' => 'Users name',
            'email' => 'wrong_email',
            'telephone' => '9849123456',
            'address' => 'locationhere',
            'gender' => 'male',
            'password' => 'user123',
            'password_confirmation' => 'user123',
            'regType' => 'buyer',
            'profileImage' => 'default.png'
         ]);

         $response->assertRedirect('/register');
         $response->assertSessionHasErrors('email');
         $this->assertTrue(session()->hasOldInput('email'));
         $this->assertFalse(session()->hasOldInput('password'));
         $this->assertGuest();
     }

     /** @test */
    public function user_cannot_register_with_mismatched_password()
    {
        $response = $this->from('/register')->post('register', [
            'name' => 'Users name',
            'email' => 'User@gmail.com',
            'telephone' => '9849123456',
            'address' => 'locationhere',
            'gender' => 'male',
            'password' => 'password',
            'password_confirmation' => 'wrong_password',
            'regType' => 'buyer',
            'profileImage' => 'default.png'
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

     /** @test */
     public function user_cannot_register_with_special_character_and_numbers_in_name()
     {
         $response = $this->from('/register')->post('register', [
             'name' => 'User name @',
             'email' => 'User8@gmail.com',
             'telephone' => '9849123456',
             'address' => 'locationhere',
             'gender' => 'male',
             'password' => 'password',
             'password_confirmation' => 'password',
             'regType' => 'buyer',
             'profileImage' => 'default.png'
         ]);

         $response->assertRedirect('/register');
         $response->assertSessionHasErrors('name');
         $this->assertTrue(session()->hasOldInput('name'));
         $this->assertFalse(session()->hasOldInput('password'));
         $this->assertGuest();
     }

    /** @test */
    public function telephone_no_must_be_ten_character()
    {
        $response = $this->from('/register')->post('register', [
            'name' => 'User name',
            'email' => 'User@gmail.com',
            'telephone' => '12345678901',
            'address' => 'locationhere',
            'gender' => 'male',
            'password' => 'password',
            'password_confirmation' => 'password',
            'regType' => 'buyer',
            'profileImage' => 'default.png'
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('telephone');
        $this->assertTrue(session()->hasOldInput('telephone'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

}
