<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'conversation_id' => 37,
        'by_user_id'      => 1,
        'details'         => $faker->sentence()
    ];
});
