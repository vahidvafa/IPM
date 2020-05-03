<?php


function unixToDay($timestamp)
{
    return $timestamp / 60 / 60 / 24;
}

function dayToUnix($day)
{
    return $day * 86400;
}

function yearToUnix($year)
{
    return dayToUnix($year * 365);
}

function tr_num($str, $mod = 'fa', $mf = '٫')
{
    $num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
    $key_a = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', $mf);
    return ($mod == 'fa') ? str_replace($num_a, $key_a, $str) : str_replace($key_a, $num_a, $str);
}

function flash_message($type, $message)
{
    \Session::flash($type, $message);
}

function makeMsgCode($status, $msg, $code, $arr_res = null, $token = null)
{
    return $arr_res == null ? array("status" => $status, "msg" => $msg, "code" => $code) : array("status" => $status, "msg" => $msg, "code" => $code, "results" => $arr_res, "token" => $token);
}

function checkIsMobile($number)
{
    $re = '/((09)\d{9})/m';
    preg_match_all($re, $number, $matches, PREG_SET_ORDER, 0);
    return ($matches) ? true : false;
}


function checkMenu($button, $page)
{
    return ($button == $page) ? 'active' : '';
}

function checkUserNameType($username)
{
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        if (!checkIsMobile($username)) {
            return makeObj(['status' => false]);
        }
        return makeObj(['status' => true, 'type' => 'mobile']);
    }
    return makeObj(['status' => true, 'type' => 'email']);
}

function makeObj($array)
{
    return (object)$array;
}

function checkYoung($age)
{
//    $age = j_to_timestamp($age);
//    if ((now() - $age))
}

function j_to_timestamp($date, $time = null)
{
    $date = explode("/", tr_num($date));
    $gregorian = \Morilog\Jalali\CalendarUtils::toGregorian($date[0], $date[1], $date[2]);
    $gregorian = $gregorian[0] . "/" . $gregorian[1] . "/" . $gregorian[2];
    if (isset($time))
        $gregorian .= $time;
    return strtotime($gregorian);
}

function DateDifference($firstDate, $secondDate, $ok)
{
//    echo $firstDate." , ".$secondDate;
//    exit();
    $month = $day = 0;
    list($fdY, $fdM, $fdD) = explode('/', $firstDate);
    list($sdY, $sdM, $sdD) = explode('/', $secondDate);

    if (strlen($fdM) == 1)
        $fdM = "0" . $fdM;

    if (strlen($fdD) == 1)
        $fdD = "0" . $fdD;

    if (strlen($sdM) == 1)
        $sdM = "0" . $sdM;

    if (strlen($sdD) == 1)
        $sdD = "0" . $sdD;

    $fd = $fdY . "/" . $fdM . "/" . $fdD;

    $sd = $sdY . "/" . $sdM . "/" . $sdD;


    while (true) {
        $fdY++;
        $temp = $fdY . "/" . $fdM . "/" . $fdD;
        if ($temp <= $sd) {
            $month += 12;
            $fd = $temp;
        } else {
            break;
        }

    }
    $fdY--;
    while (true) {
        $fdM++;
        if ($fdM > 12) {
            $fdM = 1;
            $fdY++;
        }
        if (strlen($fdM) == 1) {
            $fdM = "0" . $fdM;
        }

        $temp = $fdY . "/" . $fdM . "/" . $fdD;
        // echo"<br>";
        if ($temp <= $sd) {
            $month++;
            $fd = $temp;
        } else {
            break;
        }
    }

    if ($fdM == "01") {
        $fdM = 12;
    } else $fdM--;
    if ($fdM > 0 && $fdM < 7) {
        if ($fdM != $sdM)
            $day = (31 - $fdD) + $sdD;
        else
            $day = $sdD - $fdD;
    } else if ($fdM > 6 && $fdM < 12) {
        if ($fdM != $sdM)
            $day = (30 - $fdD) + $sdD;
        else
            $day = $sdD - $fdD;
    } else if ($fdM == 12) {
        if ($fdM != $sdM)
            $day = (29 - $fdD) + $sdD;
        else
            $day = $sdD - $fdD;
    }
    if ($ok == true) {
        $day = $day . " روز ";
        $month = $month . " ماه ";
        $va = " و ";
        if ($day == 0) {
            $day = "";
            $va = "";
        }

        if ($month == 0) {
            $month = "";
            $va = "";
        }
        $date = $month . $va . $day;
    } else if ($ok == false)
        $date = $month . "/" . $day;

    return $date;
}



function word2uniTmp($word)
{

    $new_word = array();
    $char_type = array();
    $isolated_chars = array('ا', 'د', 'ذ', 'أ', 'آ', 'ر', 'ؤ', 'ء', 'ز', 'ژ', 'و','ة');

    $all_chars = array
    (
        'ا' => array(

            'middle'		=>   '&#xFE8E;',

            'isolated'		=>   '&#xFE8D;'
        ),

        'ؤ' => array(

            'middle'		=>   '&#xFE85;',

            'isolated'		=>   '&#xFE86;'
        ),
        'ء' => array(
            'middle'		=>   '&#xFE80;',
            'isolated'		=>   '&#xFE80;'
        ),
        'أ' => array(

            'middle'		=>   '&#xFE84;',

            'isolated'		=>   '&#xFE83;'
        ),
        'آ' => array(

            'middle'		=>   '&#xFE82;',

            'isolated'		=>   '&#xFE81;'
        ),
        'ب' => array(
            'beginning'		=>   '&#xFE91;',
            'middle'		=>   '&#xFE92;',
            'end'			=>   '&#xFE90;',
            'isolated'		=>   '&#xFE8F;'
        ),
        'ت' => array(
            'beginning'		=>   '&#xFE97;',
            'middle'		=>   '&#xFE98;',
            'end'			=>   '&#xFE96;',
            'isolated'		=>   '&#xFE95;'
        ),
        'ث' => array(
            'beginning'		=>   '&#xFE9B;',
            'middle'		=>   '&#xFE9C;',
            'end'			=>   '&#xFE9A;',
            'isolated'		=>   '&#xFE99;'
        ),
        'پ' => array(
            'beginning'		=>   '&#xFB58;',
            'middle'		=>   '&#xFB59;',
            'end'			=>   '&#xfb57;',
            'isolated'		=>   '&#xfb56;'
        ),
        'ج' => array(
            'beginning'		=>   '&#xFE9F;',
            'middle'		=>   '&#xFEA0;',
            'end'			=>   '&#xFE9E;',
            'isolated'		=>   '&#xFE9D;'
        ),
        'ح' => array(
            'beginning'		=>   '&#xFEA3;',
            'middle'		=>   '&#xFEA4;',
            'end'			=>   '&#xFEA2;',
            'isolated'		=>   '&#xFEA1;'
        ),
        'خ' => array(
            'beginning'		=>   '&#xFEA7;',
            'middle'		=>   '&#xFEA8;',
            'end'			=>   '&#xFEA6;',
            'isolated'		=>   '&#xFEA5;'
        ),
        'د' => array(
            'middle'		=>   '&#xFEAA;',
            'isolated'		=>   '&#xFEA9;'
        ),
        'ذ' => array(
            'middle'		=>   '&#xFEAC;',
            'isolated'		=>   '&#xFEAB;'
        ),
        'ر' => array(
            'middle'		=>   '&#xFEAE;',
            'isolated'		=>   '&#xFEAD;'
        ),
        'ز' => array(
            'middle'		=>   '&#xFEB0;',
            'isolated'		=>   '&#xFEAF;'
        ),
        'ژ' => array(
            'middle'		=>   '&#xfb8b;',
            'isolated'		=>   '&#xfb8a;'
        ),
        'س' => array(
            'beginning'		=>   '&#xFEB3;',
            'middle'		=>   '&#xFEB4;',
            'end'			=>   '&#xFEB2;',
            'isolated'		=>   '&#xFEB1;'
        ),
        'ش' => array(
            'beginning'		=>   '&#xFEB7;',
            'middle'		=>   '&#xFEB8;',
            'end'			=>   '&#xFEB6;',
            'isolated'		=>   '&#xFEB5;'
        ),
        'ص' => array(
            'beginning'		=>   '&#xFEBB;',
            'middle'		=>   '&#xFEBC;',
            'end'			=>   '&#xFEBA;',
            'isolated'		=>   '&#xFEB9;'
        ),
        'ض' => array(
            'beginning'		=>   '&#xFEBF;',
            'middle'		=>   '&#xFEC0;',
            'end'			=>   '&#xFEBE;',
            'isolated'		=>   '&#xFEBD;'
        ),
        'ط' => array(
            'beginning'		=>   '&#xFEC3;',
            'middle'		=>   '&#xFEC4;',
            'end'			=>   '&#xFEC2;',
            'isolated'		=>   '&#xFEC1;'
        ),
        'ظ' => array(
            'beginning'		=>   '&#xFEC7;',
            'middle'		=>   '&#xFEC8;',
            'end'			=>   '&#xFEC6;',
            'isolated'		=>   '&#xFEC5;'
        ),
        'ع' => array(
            'beginning'		=>   '&#xFECB;',
            'middle'		=>   '&#xFECC;',
            'end'			=>   '&#xFECA;',
            'isolated'		=>   '&#xFEC9;'
        ),
        'غ' => array(
            'beginning'		=>   '&#xFECF;',
            'middle'		=>   '&#xFED0;',
            'end'			=>   '&#xFECE;',
            'isolated'		=>   '&#xFECD;'
        ),
        'ف' => array(
            'beginning'		=>   '&#xFED3;',
            'middle'		=>   '&#xFED4;',
            'end'			=>   '&#xFED2;',
            'isolated'		=>   '&#xFED1;'
        ),
        'ق' => array(
            'beginning'		=>   '&#xFED7;',
            'middle'		=>   '&#xFED8;',
            'end'			=>   '&#xFED6;',
            'isolated'		=>   '&#xFED5;'
        ),
        'ل' => array(
            'beginning'		=>   '&#xFEDF;',
            'middle'		=>   '&#xFEE0;',
            'end'			=>   '&#xFEDE;',
            'isolated'		=>   '&#xFEDD;'
        ),

        'گ' => array(
            'beginning'		=>   '&#xfb94;',
            'middle'		=>   '&#xfb95;',
            'end'			=>   '&#xfb93;',
            'isolated'		=>   '&#xfb92;'
        ),
        'م' => array(
            'beginning'		=>   '&#xFEE3;',
            'middle'		=>   '&#xFEE4;',
            'end'			=>   '&#xFEE2;',
            'isolated'		=>   '&#xFEE1;'
        ),
        'ن' => array(
            'beginning'		=>   '&#xFEE7;',
            'middle'		=>   '&#xFEE8;',
            'end'			=>   '&#xFEE6;',
            'isolated'		=>   '&#xFEE5;'
        ),
        'ه' => array(
            'beginning'		=>   '&#xFEEB;',
            'middle'		=>   '&#xFEEC;',
            'end'			=>   '&#xFEEA;',
            'isolated'		=>   '&#xFEE9;'
        ),
        'و' => array(
            'middle'		=>   '&#xFEEE;',
            'isolated'		=>   '&#xFEED;'
        ),
        'ی' => array(
            'beginning'		=>   '&#xFBFE;',
            'middle'		=>   '&#xFBFF;',
            'end'			=>   '&#xFBFD;',
            'isolated'		=>   '&#xFBFC;'
        ),
        'ئ' => array(
            'beginning'		=>   '&#xFBFE;',
            'middle'		=>   '&#xFBFF;',
            'end'			=>   '&#xFBFD;',
            'isolated'		=>   '&#xFBFC;'
        ),
        'ة' => array(
            'middle'		=>   '&#xFE94;',
            'isolated'		=>   '&#xFE93;'
        ),

    );

    if(in_array($word[0].$word[1], $isolated_chars))
    {
        $new_word[] = $all_chars[$word[0].$word[1]]['isolated'];
        $char_type[] = 'not_normal';
    }
    else
    {
        $new_word[] = $all_chars[$word[0].$word[1]]['beginning'];
        $char_type[] = 'normal';
    }

    if(strlen($word) > 4)
    {
        if($char_type[0] == 'not_normal')

        {
            if(in_array($word[2].$word[3], $isolated_chars))
            {
                $new_word[] = $all_chars[$word[2].$word[3]]['isolated'];
                $char_type[] = 'not_normal';
            }
            else
            {

                $new_word[] = $all_chars[$word[2].$word[3]]['beginning'];
                $char_type[] = 'normal';
            }
        }
        else
        {
            $new_word[] = $all_chars[$word[2].$word[3]]['middle'];
            $chars_statue[] = 'middle';

            if(in_array($word[2].$word[3], $isolated_chars))
            {
                $char_type[] = 'not_normal';
            }
            else
            {
                $char_type[] = 'normal';
            }
        }
        $x = 4;
    }
    else
    {
        $x = 2;
    }

    for($x=4;$x< (strlen($word)-4) ;$x++)
    {
        if($char_type[count($char_type)-1] == 'not_normal' AND $x %2 == 0)
        {
            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
                $char_type[] = 'not_normal';
            }
            else
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
                $char_type[] = 'normal';
            }
        }
        elseif($char_type[count($char_type)-1] == 'normal' AND $x %2 == 0)
        {

            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                $char_type[] = 'not_normal';
            }
            else
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                $char_type[] = 'normal';
            }
        }

    }
    if(strlen($word)>6)
    {
        if($char_type[count($char_type)-1] == 'not_normal')
        {
            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
                $char_type[] = 'not_normal';
            }
            else
            {

                if($word[strlen($word)-2].$word[strlen($word)-1] == 'ء')
                {
                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
                    $char_type[] = 'normal';
                }
                else
                {
                    $new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
                    $char_type[] = 'normal';
                }

            }

            $x += 2;
        }
        elseif($char_type[count($char_type)-1] == 'normal')
        {

            if(in_array($word[$x].$word[$x+1], $isolated_chars))
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                $char_type[] = 'not_normal';
            }
            else
            {

                $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
                $char_type[] = 'normal';
            }

            $x += 2;
        }


    }

    if($char_type[count($char_type)-1] == 'not_normal')
    {

        if(in_array($word[$x].$word[$x+1], $isolated_chars))
        {

            $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

        }
        else
        {
            $new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

        }

    }
    else
    {
        if(in_array($word[$x].$word[$x+1], $isolated_chars))
        {

            $new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];

        }
        else
        {

            $new_word[] = $all_chars[$word[$x].$word[$x+1]]['end'];

        }
    }

    return implode('',array_reverse($new_word));
}


function word2uni($word){

    $explode = explode(" ",$word);
    $word ="";

    for ($i = count($explode)-1 ; $i>=0 ; $i--)
        $word .= word2uniTmp($explode[$i]) . " ";


    return $word;
}