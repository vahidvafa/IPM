<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => 'یک خبر تصادفی درباره ی قوانین انجمن',
        'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.',
        'detail' => '<li ><span class=\"text-black pr-1 text-regular\">سطح دوره  : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">نام مدرس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">روش تدریس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">سطح دوره  : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">موضوع دوره : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">نام مدرس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">روش تدریس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">موضوع دوره : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li ><span class=\"text-black pr-1 text-regular\">نام مدرس : </span><span class=\"text-black-light\">متن تصادفی</span></li>
                            <li><span class=\"text-black pr-1 text-regular\">روش تدریس : </span><span class=\"text-black-light\">متن تصادفی</span></li>',
        'photo' => 'popular' . random_int(1, 4) . '.jpg',
        'lang_id' => 1
    ];
});
