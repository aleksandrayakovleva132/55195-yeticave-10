<?php
function print_price($price){
    $price = ceil($price);
    if ($price >= 1000) {
        $price = number_format($price, '0', '', ' ');
    }
    $price .= " ₽";
    return $price;
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;
    $result = ob_get_clean();
    return $result;
}

function esc($str){
    $text = htmlspecialchars($str);
    return $text;
}

date_default_timezone_set("Europe/Moscow");
function end_time($date){
    $dt_end = strtotime($date);
    $dt_now = time();
    $dt_diff = $dt_end - $dt_now; //получили количество секунд до конца
    $sec_in_hour = 3600;
    $hours_until_end = floor($dt_diff / $sec_in_hour);
    $ts_midnight = strtotime('tomorrow');
    $secs_to_midnight = $ts_midnight - time();
    $hours =  str_pad($hours_until_end,2, '0', STR_PAD_LEFT);
    $minutes = floor(($secs_to_midnight % 3600) / 60);
    $minutes =  str_pad($minutes, 2, '0', STR_PAD_LEFT);
    $result =    $hours .':' . $minutes;
    return $result;
}

function take_hours($date) {
    $dt_end = strtotime($date);
    $dt_now = time();
    $dt_diff = $dt_end - $dt_now;
    $hours = $dt_diff;
    return $hours;
};