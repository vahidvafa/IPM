<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderCode;
use Faker\Generator as Faker;

$factory->define(OrderCode::class, function (Faker $faker) {
    return [
        "order_id"=>\App\Order::all('id')->random()->id,
        "state_id"=>random_int(0,1),
        "name"=>$faker->name,
        "mobile"=>$faker->phoneNumber,
        "email"=>$faker->email,
        "code"=>\Illuminate\Support\Str::random(),
    ];
});
