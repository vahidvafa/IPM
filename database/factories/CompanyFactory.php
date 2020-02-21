<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $ownership_type = array("خصوصی", "دولتی", 'عمومی', ' سایر', 'دولتی / خصوصی', 'خصوصی / دولتی');
    $legal_type = array('سهامی خاص', 'سهامی عام', 'با مسئولیت محدود', 'تضامنی سایر');
    $user = \App\User::all('id', "slug")->random();
    return [
        'user_id' => $user->id,
        'name' => $faker->company,
        'established_date' => $faker->date("Y/m/d"),
        'established_place' => $faker->city,
        'established_number' => mt_rand(0, 99999999999909),
        'economy_number' => mt_rand(0, 99999999999909),
        'national_number' => mt_rand(0, 9999999999),
        'post_number' => $faker->postcode,
        'ownership_type' => $ownership_type[random_int(0, 5)],
        'legal_type' => $legal_type[random_int(0, 3)],
        'address' => $faker->address,
        'ceo_name' => $faker->name,
        'ceo_name_en' => "ceo_name_en",
        'ceo_picture' => "s.png",
        'lang_id' => mt_rand(0, 1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
