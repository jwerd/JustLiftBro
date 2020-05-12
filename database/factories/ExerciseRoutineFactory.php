<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ExerciseRoutine;
use Faker\Generator as Faker;

$factory->define(ExerciseRoutine::class, function (Faker $faker) {
    return [
        'exercise_id' => factory(\App\Exercise::class),
        'routine_id' => factory(\App\Routine::class),
        'user_id' => factory(\App\User::class),
        'sets' => $faker->word,
        'reps' => $faker->word,
        'weight' => $faker->word,
    ];
});
