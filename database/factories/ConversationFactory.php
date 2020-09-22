<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Conversation;
use Faker\Generator as Faker;

$factory->define(Conversation::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence(),
        'description' => $faker->realText(500),
        'user_id'     => 1
    ];
});
