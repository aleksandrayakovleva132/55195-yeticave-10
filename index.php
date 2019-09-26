<?php
$is_auth = rand(0, 1);
$user_name = "Александра";
require_once('functions.php');
// require_once('data.php')

$link = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
mysqli_set_charset($link, "utf8");

if(!$link) {
    show_error(mysqli_connect_error());
} 
$sql = 'SELECT name, code FROM category';
$result = mysqli_query($link, $sql);

if(!$result) {
    show_error(mysqli_error($link));
}
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = 'SELECT l.image, l.id, l.category_id, l.start_price, 
        l.last_date, l.name, c.name as category_name FROM lot l INNER JOIN category c ON l.category_id = c.id
        WHERE l.last_date > NOW() ORDER BY l.date_create DESC LIMIT 9';
        $result = mysqli_query($link, $sql);

if(!$result) {
    show_error(mysqli_error($link));
}
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
$page_content = include_template('main.php', ['categories' => $categories, 'products' => $products ]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'YetiCave'
]);

print($layout_content);



   




