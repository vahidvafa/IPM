<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {

    $ownership_type=array("خصوصی","دولتی",'عمومی',' سایر','دولتی / خصوصی','خصوصی / دولتی');
    $legal_type=array('سهامی خاص','سهامی عام','با مسئولیت محدود','تضامنی سایر');
//    $receive_place = array('منزل','محل کار');
    $user=\App\User::all('id',"slug")->random();
    return [
        'user_id'=>$user->id,
        'father_name'=>$faker->name,
        'certificate_number'=>mt_rand(0,99999999),
        'birth_date'=>$faker->date("Y/m/d"),
        'birth_place'=>$faker->city,
        'national_code'=>mt_rand(0,999999999999),
        'work_name'=>"نام شرکت ".$faker->name,
        'work_address'=>$faker->address,
        'home_address'=>$faker->address,
        'work_post'=>$faker->postcode,
        'home_post'=>$faker->postcode,
        'work_tel'=>$faker->phoneNumber,
        'home_tel'=>$faker->e164PhoneNumber,
        'receive_place'=>mt_rand(0,1),
        'established_date'=>$faker->date("Y/m/d"),
        'established_place'=>$faker->city,
        'established_number'=>mt_rand(0,99999999999909),
        'economy_number'=>mt_rand(0,99999999999909),
        'national_number'=>mt_rand(0,9999999999),
        'post_number'=>$faker->postcode,
        'ownership_type'=>$ownership_type[random_int(0,5)],
        'legal_type'=>$ownership_type[random_int(0,3)],
        'address'=>$faker->address,
        'ceo_name'=>$faker->name,
        'ceo_name_en'=>"ceo_name_en",
        'ceo_picture'=>"s.png",
        'agent_name'=>$faker->name,
        'agent_name_en'=>"agent_name_en",
        'sex'=>\App\User::all('id')->random()->id,
        "youTube"=>"https://youTube.com/".$user->slug,
        "facebook"=>"https://facebook.com/".$user->slug,
        "instagram"=>"https://instagram.com/".$user->slug,
        "telegram"=>"https://telegram.com/".$user->slug,
        "twitter"=>"https://twitter.com/".$user->slug,
        'lang_id' => mt_rand(0,1),
        'created_at' => now(),
    ];

});

