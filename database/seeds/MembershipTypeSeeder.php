<?php

use Illuminate\Database\Seeder;

class MembershipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("membership_types")->insert([
            "id"=>"1",
            "title"=>"عضویت حقیقی",
            "price"=>"1500000",
            "period"=>"1500000",
            "required_documents"=>"کپی شناسنامه از صفحه اول - فایل اسکن عکس پرسنلی 3 در 4 - کپی از آخرین مدرک تحصیلی",
            "lang_id"=>"1",
            'created_at'=>now(),
        ]);
        DB::table("membership_types")->insert([
            "id"=>"2",
            "title"=>"عضویت حقوقی",
            "price"=>"10000000",
            "period"=>"1500000",
            "required_documents"=>"تصویرآگهی تاسیس - کپی آخرین آگهی تغییرات - ارسال مشخصات نماینده معرفی شده",
            "lang_id"=>"1",
            'created_at'=>now(),
        ]);
        DB::table("membership_types")->insert([
            "id"=>"3",
            "title"=>"عضویت دانشجویی",
            "price"=>"600000",
            "period"=>"1500000",
            "required_documents"=>"کپی شناسنامه از صفحه اول - فایل اسکن عکس پرسنلی 3 در 4 - کپی کارت دانشجویی -کپی از آخرین مدرک تحصیلی",
            "lang_id"=>"1",
            'created_at'=>now(),
        ]);
        DB::table("membership_types")->insert([
            "id"=>"4",
            "title"=>"عضویت دانش آموزی",
            "price"=>"0",
            "period"=>"1500000",
            "required_documents"=>"",
            "lang_id"=>"1",
            'created_at'=>now(),
        ]);
    }
}
