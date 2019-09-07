<?php
function price($price){
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
function take_seconds($date) {
    $dt_end = strtotime($date);
    $dt_now = time();
    $dt_diff = $dt_end - $dt_now;
    $seconds = $dt_diff;
    return $seconds;
};
function formate_seconds($seconds) {
    $sec_in_hour = 3600;
    $hours_until_end = floor($seconds / $sec_in_hour);
    $ts_midnight = strtotime('tomorrow');
    $secs_to_midnight = $ts_midnight - time();
    $hours =  str_pad($hours_until_end,2, '0', STR_PAD_LEFT);
    $minutes = floor(($secs_to_midnight % 3600) / 60);
    $minutes =  str_pad($minutes, 2, '0', STR_PAD_LEFT);
    $result = $hours .':' . $minutes;
    return $result;
}

function show_error($typeError) {
    $link = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
    mysqli_set_charset($link, "utf8");

    $error = $typeError;
    $page_content = include_template('error.php', ['error' => $error]);
    $layout_content = include_template('layout.php', [
        'content' => $page_content,
        'categories' => $categories,
        'title' => 'YetiCave'
    ]);
    print($layout_content);
    die();
}