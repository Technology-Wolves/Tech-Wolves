<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Subscription;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'email'=> $faker->email
    ];
});
