<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("events")->insert([
            'title' => 'اکسل پیشرفته در برنامه ریزی های پروژه',
            'course_headings' => 'فصل اول: کار با صفحات گسترده
آشنایی با نرم افزار EXCEL 2016
معرفی نرم افزار EXCEL
بازکردن برنامه وایجاد فایل
آشنایی با محیط کاریEXCEL
بستن فایل
مفاهیم اصل
انتخاب ها',
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

کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.',
            'address' => ' تهران، امیرآباد شمالی، بالاتر از بزرگراه جلال آل احمد، پردیس دانشکده های فنی دانشگاه تهران، ساختمان انستیتو مهندسی نفت، طبقه همکف ',
            'price' => '30000',
            'tel' => '09199999',
            'latitude' => '35.733249',
            'longitude' => '51.388087',
            'category_id' => '1',
            'ad_date' => '1398/10/02',
            'solar_date' => '2020/10/10',
            'province_id' => '10',
            'created_at' => now(),


        ]);

    }
}
