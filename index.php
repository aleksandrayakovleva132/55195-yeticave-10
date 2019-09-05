<?php
$is_auth = rand(0, 1);
require_once('functions.php');
// require_once('data.php');

$link = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
mysqli_set_charset($link, "utf8");

if(!$link) {
   $error = mysqli_connect_error();
   $content = include_template('error.php', ['error' => $error]);
} 
else {
    $sql = 'SELECT name, code FROM category';    
    $result = mysqli_query($link, $sql);
    
    if($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $page_content = include_template('main.php', ['categories' => $categories]);
    } else {
        $error = mysqli_error($link);
        $page_content  = include_template('error.php', ['error' => $error]);
    }

    $sql = 'SELECT  l.image, l.category_id, l.start_price,
    l.last_date, l.name, c.name as category_name FROM lot l INNER JOIN category c ON l.category_id = c.id
    WHERE l.last_date > NOW()  ORDER BY l.date_create DESC LIMIT 9';

    $result = mysqli_query($link, $sql);

    if($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $page_content = include_template('main.php', ['product' => $products]);
    } else {
        $error = mysqli_error($link);
        $page_content  = include_template('error.php', ['error' => $error]);
    }
}  

$page_content = include_template('main.php', ['categories' => $categories, 'products' => $products]);
// $page_content = include_template('main.php', ['products' => $products]);


$layout_content = include_template('layout.php', [
        'content' => $page_content,
        'categories' => $categories,
        'title' => 'YetiCave'
]);
print($layout_content);

?>
