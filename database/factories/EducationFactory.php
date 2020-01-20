<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\education;
use Faker\Generator as Faker;

$factory->define(education::class, function (Faker $faker) {
    return [
        'user_id'=>\App\User::all('id')->random()->id,
        'education_place'=>$faker->name,
        'grade'=>"کاردانی",
    'from_date'=>"1398/10/23",
    'to_date'=>"1399/10/",
    'gpa'=>'19',
    'lang_id'=>'19',
    ];
});
