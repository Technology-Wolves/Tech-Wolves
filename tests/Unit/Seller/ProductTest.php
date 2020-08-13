<?php

namespace Tests\Unit\Seller;

use App\Product;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function access_add_product_form()
    {

        $this->withExceptionHandling();

        $this->actingAs(factory('App\User')->create(
            [
                'isAdmin' => false,
                'regType' => 'seller',
            ]));

        $response = $this->get('/addProduct');

        $response->assertStatus(200);
        $response->assertViewIs('layouts.seller.products.create');
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_product()
    {
        //Given we have a task object
        $product = factory('App\Product')->make();

        //When unauthenticated user submits post request to create task endpoint
        // He should be redirected to home page
        $this->post('/addProduct',$product->toArray())
            ->assertRedirect('/');
    }

    /** @test */
    public function authenticated_users_can_create_a_new_product()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create(
            [
                'isAdmin' => false,
                'regType' => 'seller',
            ]
        ));

        //And a product object
        $product = factory('App\Product')->create();

        //When user submits post request to create product endpoint
        $this->from('/addProduct')->post('/addProduct', $product->toArray());

        //It gets stored in the database
        $this->assertEquals(1,Product::all()->count());
    }




}
