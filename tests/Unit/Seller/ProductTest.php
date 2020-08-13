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
}
