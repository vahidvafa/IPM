<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        "user_id"=>\App\User::all('id')->random()->id,
        "address"=>"ادرس ادرس ادرس ادرس ادرس",
        "explain"=>"توضیحات توضیحات توضیحات",
        "state"=>mt_rand(0,1),
        "lang_id"=>"1",
    ];
});
