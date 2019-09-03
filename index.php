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
    $sql = 'SELECT `name`, `code` FROM category';    

    $result = mysqli_query($link, $sql);
    if($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } 
    $sql = 'SELECT  `name`, `image`, `category_id`, `start_price`, `last_date` FROM lot 
    WHERE `date_create`< NOW()  ORDER BY `date_create` LIMIT 6' ;

    $result = mysqli_query($link, $sql);

    if($result) {
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
