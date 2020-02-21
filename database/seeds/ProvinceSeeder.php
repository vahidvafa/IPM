<?php

use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = array(
            array('id' => '1','title' => 'مرکزی'),
            array('id' => '2','title' => 'گیلان'),
            array('id' => '3','title' => 'مازندران'),
            array('id' => '4','title' => 'آذربایجان شرقی'),
            array('id' => '5','title' => 'آذربایجان غربی'),
            array('id' => '6','title' => 'کرمانشاه'),
            array('id' => '7','title' => 'خوزستان'),
            array('id' => '8','title' => 'فارس'),
            array('id' => '9','title' => 'کرمان'),
            array('id' => '10','title' => 'خراسان رضوی'),
            array('id' => '11','title' => 'اصفهان'),
            array('id' => '12','title' => 'سیستان وبلوچستان'),
            array('id' => '13','title' => 'کردستان'),
            array('id' => '14','title' => 'همدان'),
            array('id' => '15','title' => 'چهارمحال وبختیاری'),
            array('id' => '16','title' => 'لرستان'),
            array('id' => '17','title' => 'ایلام'),
            array('id' => '18','title' => 'کهگیلویه وبویراحمد'),
            array('id' => '19','title' => 'بوشهر'),
            array('id' => '20','title' => 'زنجان'),
            array('id' => '21','title' => 'سمنان'),
            array('id' => '22','title' => 'یزد'),
            array('id' => '23','title' => 'هرمزگان'),
            array('id' => '24','title' => 'تهران'),
            array('id' => '25','title' => 'اردبیل'),
            array('id' => '26','title' => 'قم'),
            array('id' => '27','title' => 'قزوین'),
            array('id' => '28','title' => 'گلستان'),
            array('id' => '29','title' => 'خراسان شمالی'),
            array('id' => '30','title' => 'خراسان جنوبی'),
            array('id' => '31','title' => 'البرز')
        );
        foreach ($provinces as $province){
            DB::table('provinces')->insert(['title'=>$province['title']]);
        }
    }
}
