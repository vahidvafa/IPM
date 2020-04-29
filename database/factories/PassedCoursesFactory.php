<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PassedCourses;
use Faker\Generator as Faker;

$factory->define(PassedCourses::class, function (Faker $faker) {

    return [
        'passed_courses_category_id'=>\App\PassedCoursesCategory::all('id')->random()->id,
        'title'=>'عنوان دوره گذرانده شده',
        'content'=>"<li><span class=\"text-black-light\">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </span><span class=\"text-dark-violet text-medium\">[ از 89 تا 95 ]</span></p></li>",
        'user_id' => \App\User::all('id')->random()->id,
        'created_at' => now(),
    ];
});
