<?php
/**
 * Created by PhpStorm.
 * User: rainapp
 * Date: 2/5/20
 * Time: 11:52 PM
 */

namespace App\Utils;


class UserProFields
{

    public $sex="جنسیت:";
    public $father_name="نام پدر:";
    public $certificate_number="شماره ثبت:";
    public $birth_date="تاریخ تولد:";
    public $birth_place="محل تولد:";
    public $national_code="کد ملی:";
    public $work_name="نام مجل سرکار:";
    public $work_address="نشانی محل کار:";
    public $home_address="نشانی منزل";
    public $work_post="کد پستی محل کار:";
    public $home_post="کد پستی منزل:";
    public $work_tel="تلفن محل کار:";
    public $home_tel="تلفن منزل:";
    public $receive_place="نشانی ارسال مراسلات:";
    public $established_date="سال تاسیس:";
    public $established_place="محل تاسیس";
    public $established_number="شماره ثبت:";
    public $economy_number="شماره اقتصادی:";
    public $national_number="شماره ملی:";
    public $post_number="کد پستی:";
    public $ownership_type="نوع کالکیت شرکت:";
    public $legal_type="نوع حقوقی شرکت :";
    public $address="نشانی:";
    public $ceo_name="نام مدیر عامل شرکت:";
    public $ceo_name_en="نام مدیر عامل شرکت انگلیسی:";
    public $ceo_picture="عکس مدیرعامل:";
    public $agent_name="نام نماینده شرکت:";
    public $agent_name_en="نام نماینده شرکت انگلیسی";
    public $agent_picture="عکس نماینده:";
    public $youTube ="لینک یوتویوذ:";
    public $facebook ="لینک فیسبوک:";
    public $instagram ="لینک اینستاگرام:";
    public $telegram ="لینک تلگرام:";
    public $twitter ="لینک تویتر:";



        public function asArray()
        {
            $variable_names = get_object_vars($this);
            $attributes = array();
            foreach ($variable_names as $key => $value)
                $attributes[$key] = $value;

            return $attributes;
        }


}