<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\visibiliy;
use Faker\Generator as Faker;

$factory->define(visibiliy::class, function (Faker $faker) {
    $arr = array('sex','father_name','certificate_number','birth_date','birth_place','national_code','work_name','work_address','home_address','work_post','home_post','work_tel','home_tel','receive_place','youTube','facebook','instagram','telegram','twitter','established_date','established_place','established_number','economy_number','national_number','post_number','ownership_type','legal_type','address','ceo_name','ceo_name_en','ceo_picture','agent_name','agent_name_en','agent_picture');
    return [
        "user_id"=>\App\User::all('id')->random()->id,
        "profile_fields"=>$arr[random_int(0,count($arr)-1)]
    ];
});
