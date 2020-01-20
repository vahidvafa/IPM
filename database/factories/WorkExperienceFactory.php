<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\workExperience;
use Faker\Generator as Faker;

$factory->define(workExperience::class, function (Faker $faker) {
    return [
        'user_id'=>\App\User::all('id')->random()->id,
        'company_name'=>'شرکت تستی',
        'job_title'=>'برنامه نویس ارشد',
        'from_date'=>'1398/10/23',
        'to_date'=>'1398/12/23',
//        'optional_description'=>"",
        'created_at'=>now(),
        'lang_id'=>\App\Lang::all('id')->random()->id,
        
    ];
});
