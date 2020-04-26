<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Education;
use Faker\Generator as Faker;

$factory->define(Education::class, function (Faker $faker) {
    $education_place=array("دانسگاه شمسی پور",'دانسگاه ازاد واحد تهران شمال','دانسگاه علم و صنعت','دانسگاه تهران حنوب','دانسگاه علوم تجقیقات');
    return [
        'user_id'=>\App\User::all('id')->random()->id,
        'education_place'=>$education_place[mt_rand(0,3)],
        'grade'=>"کارشناسی",
    'from_date'=>$faker->date("Y/m/d"),
    'to_date'=>$faker->date("Y/m/d"),
    'gpa'=>mt_rand(0,20),
    'field_of_study'=>"مهندسی نرم افزار",
    'lang_id'=>\App\Lang::all('id')->random()->id,
        'created_at' => now(),
    ];
});
