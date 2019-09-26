<?php
require_once('functions.php');
$link = mysqli_connect('127.0.0.1', 'root', '', 'yeticave');
mysqli_set_charset($link, "utf8");

$sql = 'SELECT id, name, code FROM category';
$result = mysqli_query($link, $sql);

$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
$page_content = include_template('addLot.php', ['categories' => $categories]);

//Узнаем, что форма была отправлена
// Если форму отправили, то метод запроса POST

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $lot = $_POST;
    ///Валидация формы///
    $required = ['name', 'category_id', 'description', 'image', 'start_price', 'step_rate', 'last_date'];
    $errors = [];

    $rules = [
        'name' => function() {
            return validateFilled('name');
        },
        'description' => function() {
            return validateFilled('description');
        },
        // 'category_id' => function() use ($cats_ids) {
        //     return validateCategory('category_id', $cats_ids);
        // },
        
        'start_price' => function() {
           return validStartPrice('start_price');
        },
        'last_date' => function() {
            return validateDate('last_date');
        }

    ];

    foreach ($_POST as $key => $value) {
        if (isset($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule();
        }
    }

    $errors = array_filter($errors);
    foreach ($required as $key) {
		if (empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
		}
	}

    ///Валидация формы///

    if (isset( $_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_path = __DIR__ . '/uploads/';
        $file_url = '/uploads/' . $file_name;

        // $finfo = finfo_open(FILEINFO_MIME_TYPE);
        // $file_type = finfo_file($finfo, $file_name);

        // if ($file_type !== "image/png") {
		// 	print_r('Загрузите картинку в формате png');
		// }
		// else {
        //     move_uploaded_file($_FILES['image']['tmp_name'], $file_path . $file_name); 
        //     $lot['image'] =  $file_url; 
		// }
        
        move_uploaded_file($_FILES['image']['tmp_name'], $file_path . $file_name);       
    }
   


     $lot['image'] =  $file_url;
     
    $sql = 'INSERT INTO `lot`(`id`, `date_create`, `name`, `category_id`, `description`,  `start_price`,  `step_rate`,`last_date`, `image`,`user_author_id`, `user_winner_id`)
    VALUES (NULL, NOW(), ?,?,?,?,?,?,?,4,7)';
    
    $stmt = db_get_prepare_stmt($link, $sql, $lot);
    $res = mysqli_stmt_execute($stmt);
    
    if($res) {
        $id = mysqli_insert_id($link);
        
        header("Location: lot.php?id=" . $id);
    }
    
    // else {
    //     show_error(mysqli_error($link));
    // }  
}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'YetiCave'
  ]);
  print($layout_content);
  