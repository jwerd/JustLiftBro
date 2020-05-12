<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Routine;
use Faker\Generator as Faker;

$factory->define(Routine::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'title' => $faker->sentence(4),
        'exercise_id' => $faker->word,
    ];
});
