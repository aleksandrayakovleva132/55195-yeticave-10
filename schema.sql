CREATE DATABASE yeticave
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE category (
  id INT AUTO_INCREMENT PRIMARY KEY,  
  name CHAR(128) NOT NULL UNIQUE, 
  code CHAR(128) NOT NULL
);

--id  - встает автоматом, не обязательно указывать Null/not null
-- Название категории обязательно, поэтому ставлю not null
-- Важна привязка к категории, иначе при фильтрации товар не будет видне not null

CREATE TABLE lot (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_create DATETIME,
  name CHAR(255) NOT NULL UNIQUE,
  description TEXT NULL,
  image CHAR NULL,
  start_price INT NOT NULL,
  last_date DATE NOT NULL,
  step_rate INT NOT NULL,
  user_author_id INT NOT NULL,
  user_winner_id INT NULL,
  category_id INT NOT NULL
);

--id встает автоматически, поэтому не ставим  Null/not null
--date_create -автоматически, поэтому не ставим  Null/not null
--name обязательно название товара, поэтому not null
--description чисто теоретически товар можно продать без описания ставлю null
--image  здесь та же история, но вообще отсутсвие картинки крайне нежелательно, поэтому я сомневаюсь
--start_price - обязательный параметр для аукциона - not null
--user_author_id - обязательный параметр для аукциона - not null
--user_winner_id - победитель мб объявлен позже  - NULL
--category_id - Важна привязка к категории, иначе при фильтрации товар не будет видне not null


CREATE TABLE rate (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  amount INT NOT NULL,
  user_id INT NOT NULL,
  lot_id INT NOT NULL
 );
 --id встает автоматически, поэтому не ставим  Null/not null
 --date_create встает автоматически, поэтому не ставим  Null/not null
 --amount если юзер делает ставку, он обязан заполнить поле
 --user_id - обязательно знать кто делает ставки
 --lot_id - обязательно знать на что делается ставка 


CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_registration DATE,
  email CHAR(128) NOT NULL UNIQUE,
  name CHAR(128) NOT NULL,
  password CHAR(255) NOT NULL,
  avatar CHAR(255) NULL,
  contacts CHAR(300) NOT NULL
);

--id встает автоматически, поэтому не ставим  Null/not null
--date_create встает автоматически, поэтому не ставим  Null/not null
--email обязательно для регистрации пользователя - not null
--name обязательно для индефикации пользователя - not null
--password обязательно для авторизации пользователя - not null
--avatar можно быть без avatar
--contacts контакт обязателен
