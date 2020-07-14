<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\User;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        
        'user_id' => function() {
            return  User::all()->random();
        },
        'title' => $faker->title(),
        'price' => $faker->randomNumber(),
        'path' => $faker->imageUrl(),
    ];
});
