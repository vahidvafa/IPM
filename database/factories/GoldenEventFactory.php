<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\GoldenEvent;
use Faker\Generator as Faker;

$factory->define(GoldenEvent::class, function (Faker $faker) {
    return [
        "event_id"=>\App\Event::all('id')->random()->id,
        "title"=>"چهاردهمین کنفرانس بین المللی مدیریت پروژه",
        "sub_title"=>"ثبت نام پیش از تاریخ ۲۰/۵/۹۸ دارای ۱۰ درصد تخفیف است",
        "description"=>"ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و",
    ];
});
