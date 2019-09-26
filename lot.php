<?php

require_once('functions.php');
$link = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
mysqli_set_charset($link, "utf8");

$sql = 'SELECT name, code FROM category';
$result = mysqli_query($link, $sql);

$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);


//Нам нужен текущий прайс. 

if(isset($_GET['id'])) {
       

        $id = mysqli_real_escape_string($link, $_GET['id']);
        
        $sql = "SELECT l.id, l.name, l.image, l.description, l.last_date, l.start_price, l.step_rate, MAX(r.amount)  as lot_amount,
        c.name as category_name FROM lot l INNER JOIN rate r ON r.lot_id = l.id INNER JOIN category c ON l.category_id = c.id 
        WHERE  l.id = '$id' ";

        $result = mysqli_query($link, $sql); 

        if($result=mysqli_fetch_assoc($result)){
          $product = array_filter($result);  
            if($product == NULL) {
              http_response_code(404);
              $page_content = include_template('404.php', ['categories' => $categories]);
            } else {
              $page_content = include_template('product.php', ['categories' => $categories, 'product' => $product]);
            }
        }
    }
    else {
        http_response_code(404);
        $page_content = include_template('404.php', ['categories' => $categories]);
}

$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'categories' => $categories,
  'title' => 'YetiCave'
]);
print($layout_content);

?>