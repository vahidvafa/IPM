<?php
/**
 * Created by PhpStorm.
 * User: rainapp
 * Date: 2/14/20
 * Time: 11:43 PM
 */

namespace App\Utils;


class UnsetUserRelation
{

    public static function unsetUserFields($arr){
        return array_diff($arr,[$arr['_token'],$arr['type'],$arr['slug'],$arr['name'],$arr['email'],$arr['about_me']]);
    }
    public static function unsetProfileFields($arr){
        return array_diff($arr,[$arr['established_date'],$arr['established_number'],$arr['economy_number']
            ,$arr['national_number'],$arr['post_number'],$arr['ownership_type'],$arr['legal_type'],$arr['address']
            ,$arr['ceo_name'],$arr['ceo_name_en'],$arr['agent_name'],$arr['agent_name_en']
        ]);
    }

}