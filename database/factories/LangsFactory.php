<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\langs;
use Faker\Generator as Faker;

$factory->define(langs::class, function (Faker $faker) {
    return [
        "name"=>'test '.(langs::all('id')->last()->id+1),
        "photo"=>"test.png",
    ];
});
