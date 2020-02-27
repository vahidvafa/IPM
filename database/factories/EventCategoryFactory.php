<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EventCategory;
use Faker\Generator as Faker;

$factory->define(EventCategory::class, function (Faker $faker) {
    return [
        "name"=>$faker->title,
        "lang_id"=>mt_rand(0,1),
    ];
});
