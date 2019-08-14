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