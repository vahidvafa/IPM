<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $contract_type = array("همه موارد","تمام وقت","نیمه وقت","قراردادی / پروژه ای",);
    $work_experience = array("همه موارد","زیر ۲ سال","بین ۲ تا ۵ سال","بین ۵ تا ۸ سال","۸ سال به بالا");
    $education = array("فرقی نمی کن","دیپلم","کاردانی","کارشناسی","کارشناسی ارشد","دکترا");
    return [
        'user_id'=>\App\User::all('id')->random()->id,
        'title'=>$faker->jobTitle." متن تصادفی برای title فرصت های شغلی"." ".random_int(0,999),
        "min_salary"=>random_int(0,999999),
        "max_salary"=>random_int(0,99999999999999),
        "education"=>$education[random_int(0,sizeof($education)-1)],
        "location"=>$faker->address,
        "contract_type"=>$contract_type[random_int(0,sizeof($contract_type)-1)],
        "work_experience"=>$work_experience[random_int(0,sizeof($work_experience)-1)],
        "province_id"=>\App\Province::all('id')->random()->id,
        "jobs_category_id"=>\App\JobsCategory::all('id')->random()->id,
        "sex"=>random_int(0,1),
        "benefits"=>"تسهیلات و مزایا || تسهیلات و مزایا || تسهیلات و مزایا || تسهیلات و مزایا || تسهیلات و مزایا || تسهیلات و مزایا || تسهیلات و مزایا || تسهیلات و مزایا",
        "content"=>"متن تصادفی برای توضیحات فرصت شغلی || متن تصادفی برای توضیحات فرصت شغلی || متن تصادفی برای توضیحات فرصت شغلی || متن تصادفی برای توضیحات فرصت شغلی || متن تصادفی برای توضیحات فرصت شغلی || متن تصادفی برای توضیحات فرصت شغلی || متن تصادفی برای توضیحات فرصت شغلی || متن تصادفی برای توضیحات فرصت شغلی",
        "skills"=>"- مشتاق و توانا در شبکه سازی و ارتباط موثر با دیگران
- آشنا با حوزه مهندسی نرم افزار و صنعت IT
- خلاق و پویا در استفاده از روش های گوناگون برای ارتباط با افراد فنی و غیر فنی برای تامین سرمایه انسانی مورد نیاز
- آشنایی کامل با شبکه های اجتماعی و انتشار محتوی در آنها
- ترجیحا آشنا به امور منابع انسانی و استخدام ",
        'state'=>1
    ];

});

