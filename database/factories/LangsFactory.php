<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lang;
use Faker\Generator as Faker;

$factory->define(Lang::class, function (Faker $faker) {
    return [
        "name"=>'fa',
        "photo"=>"fa.png",
    ];
});
$factory->define(Lang::class, function (Faker $faker) {
    return [
        "name"=>'en',
        "photo"=>"en.png",
    ];
});
