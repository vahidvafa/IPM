<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IPMA;
use Faker\Generator as Faker;

$factory->define(IPMA::class, function (Faker $faker) {
    return [
        "head_title"=>"چهاردهمین کنفرانس بین المللی مدیریت پروژه",
        "head_subtitle"=>"ثبت نام پیش از تاریخ ۹۸/۵/۲۰ دارای ۱۰ درصد تخفیف است",
        "head_description"=>"ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و",
        "address"=>"تهران، امیرآباد شمالی، بالاتر از بزرگراه جلال آل احمد، پردیس دانشکده های فنی دانشگاه تهران، ساختمان انستیتو مهندسی نفت، طبقه همکف / کدپستی: 1439956191",
//        "event_id"=>2,
        "news_id"=>2,
        "tel"=>"(5خط) 88229406 021",
        "fax"=>"89784216",
        "secretariat_email"=>"info@ipma.ir",
        "membership_email"=>"membership@ipma.ir",
    ];

});

