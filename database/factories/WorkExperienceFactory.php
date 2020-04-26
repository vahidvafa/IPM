<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WorkExperience;
use Faker\Generator as Faker;

$factory->define(WorkExperience::class, function (Faker $faker) {
    return [
        'user_id'=>\App\User::all('id')->random()->id,
        'company_name'=>$faker->company,
        'job_title'=>$faker->jobTitle,
        'from_date'=>$faker->date("Y/m/d"),
        'to_date'=>$faker->date("Y/m/d"),
        'specialized_basins' => "حوضه های تخصصی",
//        'optional_description'=>"",
        'lang_id'=>\App\Lang::all('id')->random()->id,
        'created_at'=>now(),


    ];
});
