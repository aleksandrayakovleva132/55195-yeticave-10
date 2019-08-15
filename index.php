<?php
$is_auth = rand(0, 1);
require_once('functions.php');
require_once('data.php');

$page_content = include_template('main.php', ['categories' => $categories, 'products' => $products]);

$layout_content = include_template('layout.php', [
        'content' => $page_content,
        'categories' => $categories,
        'title' => 'YetiCave'
]);
print($layout_content);
?>
