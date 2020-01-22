<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PassedCoursesCategory;
use Faker\Generator as Faker;

$factory->define(PassedCoursesCategory::class, function (Faker $faker) {
    $names=array("گواهی نامه ها","دوره های آموزشی","حوایز","مدارک");
    return [
        'name'=>$names[mt_rand(0,3)],
        'user_id'=>\App\User::all('id')->random()->id,
        "lang_id"=>mt_rand(0,1),
        'created_at' => now(),
    ];
});
