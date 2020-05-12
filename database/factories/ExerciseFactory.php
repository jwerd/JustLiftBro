<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exercise;
use Faker\Generator as Faker;

$factory->define(Exercise::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->text,
        'is_custom' => $faker->boolean,
        'user_id' => factory(\App\User::class),
    ];
});
