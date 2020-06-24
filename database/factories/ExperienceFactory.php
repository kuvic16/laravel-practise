<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Experience;
use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create();
        },
        'points' => $faker->randomNumber(),
    ];
});
