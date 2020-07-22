<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'productName' => $faker->sentence,
        'productDescription' => $faker->paragraph,
        'orginalPrice' => '1000',
        'discountedPrice' => '800',
        'discountRate' => '20',
        'categories' => 'others',
        'productImage' => 'default.jpg',
        'productOwnerId' => factory(\App\User::class)
    ];
});
