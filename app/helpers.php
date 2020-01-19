<?php
function unixToDay($timestamp)
{
    return $timestamp / 60 / 60 / 24;
}

function dayToUnix($day)
{
    return $day * 86400;

}

function tr_num($str, $mod = 'en', $mf = '٫')
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
