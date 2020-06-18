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

function persianText($text)
{
    return (new \App\Utils\FarsiGD())->persianText($text);
}


function createUserCode($membershipType, $main = 0): string
{
    $array = ['', 'A', 'C', 'S'];
    $year = jdate()->format('y');
    $year = (strlen($year) == 1) ? 0 . $year : $year;
    $lastCode = \App\User::where('active', '>', 1)->orderByDesc('user_code')->get(['user_code'])->first()->user_code;
    $lastCode = explode('-', $lastCode);
    $type = ($main == 0) ? $array[$membershipType] : 'M';
//    $type = $lastCode[2];
    if ($year == $lastCode[0]) {
        $counter = $lastCode[1] + 1;
        $diff = 3 - strlen($counter);
        $zero = "";
        for ($i = 0; $i < $diff; $i++) {
            $zero .= "0";
        }
        $counter = $zero . $counter;
        $code = "$year-$counter-$type";
    } else {
        $code = "$year-001-$type";
    }
    return $code;
}

function changeUserCode($userId, $membershipType, $main = 0): string
{
    $array = ['', 'A', 'C', 'S'];
    $type = ($main == 0) ? $array[$membershipType] : 'M';
    $userCode = \App\User::find($userId)->user_code;
    $userCode = explode('-', $userCode);
    $code = $userCode[0] . '-' . $userCode[1] . '-' . $type;
    return $code;
}
