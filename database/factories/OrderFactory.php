<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id'=>\App\User::all('id')->random()->id,
        'event_id'=>\App\Event::all('id')->random()->id,
        'state_id'=>random_int(0,2),
        'total_price'=>random_int(10000,999999999),
        'reference_id'=>random_int(0,100),
    ];
});
