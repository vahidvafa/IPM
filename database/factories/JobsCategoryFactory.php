<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobsCategory;
use Faker\Generator as Faker;

$factory->define(JobsCategory::class, function (Faker $faker) {
    return [
        "title"=>"متن تصادفی برای دسته یندی فرصت های شقلی"." ".random_int(0,999)
    ];
});
