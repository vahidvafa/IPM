<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => 'اکسل پیشرفته در برنامه ریزی های پروژه'.(Event::all('id')->last()->id+1),
        'course_headings' => 'فصل اول: کار با صفحات گسترده
آشنایی با نرم افزار EXCEL 2016
معرفی نرم افزار EXCEL
بازکردن برنامه وایجاد فایل
آشنایی با محیط کاریEXCEL
بستن فایل
مفاهیم اصل
انتخاب ها '.(Event::all('id')->last()->id+1),
        'detail' => "<li ><span class=\"text-black pr-1 text-regular\">سطح دوره  : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">نام مدرس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">روش تدریس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">سطح دوره  : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">موضوع دوره : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">نام مدرس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">روش تدریس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">موضوع دوره : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">نام مدرس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li><span class=\"text-black pr-1 text-regular\">روش تدریس : </span><span class=\"text-black-light\">متن تصادفی</span></li>",
        'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد

کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.'.(Event::all('id')->last()->id+1),
        'address' => ' تهران، امیرآباد شمالی، بالاتر از بزرگراه جلال آل احمد، پردیس دانشکده های فنی دانشگاه تهران، ساختمان انستیتو مهندسی نفت، طبقه همکف '.(Event::all('id')->last()->id+1),
        'price' => '30000',
        'tel' => '09199999',
        'latitude' => '35.733249',
        'longitude' => '51.388087',
        'category_id' => \App\Category::all('id')->random()->id,
        'date' => '1398/10/02',
        'province_id' => '10',
        'creator_uid' => \App\User::all('id')->random()->id,
        'lang_id' =>\App\langs::all('id')->random()->id,
        'created_at' => now(),


    ];
});
