<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

//    $receive_place = array('منزل','محل کار');
    $user = \App\User::all('id', "slug")->random();
    return [
        'user_id' => $user->id,
        'father_name' => $faker->name,
        'certificate_number' => mt_rand(0, 99999999),
        'birth_date' => $faker->date("Y/m/d"),
        'birth_place' => $faker->city,
        'national_code' => mt_rand(0, 999999999999),
        'work_name' => "نام شرکت " . $faker->name,
        'work_address' => $faker->address,
        'home_address' => $faker->address,
        'work_post' => $faker->postcode,
        'home_post' => $faker->postcode,
        'work_tel' => $faker->phoneNumber,
        'home_tel' => $faker->e164PhoneNumber,
        'sex' => mt_rand(0, 1),
        'receive_place' => mt_rand(0, 1),
        "youTube" => "https://youTube.com/" . $user->slug,
        "facebook" => "https://facebook.com/" . $user->slug,
        "instagram" => "https://instagram.com/" . $user->slug,
        "telegram" => "https://telegram.com/" . $user->slug,
        "twitter" => "https://twitter.com/" . $user->slug,
        'honors' => "موسس انجمن - دیبر - عضو هیات مدیره - رییس شبکه اعضا جوان - رییس کمیته عضویت",
        'certificate' => "IPMA CB Certificate Level “A” - 2019-08-23",
        'awards' => "Awards & certificates Awards & certificates?!?Awards & certificates Awards & certificates?!?Awards & certificates Awards & certificates",
        'specialized_basins' => "حوضه های تخصصی",
        'lang_id' => mt_rand(0, 1),
        'created_at' => now(),
    ];

});

