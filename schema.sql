CREATE DATABASE yeticave
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE category (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR(128) NOT NULL UNIQUE,
  code CHAR(128)
);

CREATE TABLE lot (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_create DATETIME,
  name CHAR(255) NOT NULL UNIQUE,
  description TEXT,
  image CHAR,
  start_price INT,
  last_date DATE,
  step_rate INT,
  author_id INT,
  winner INT,
  category_id INT
);

CREATE TABLE rate (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  amount INT,
  user_id INT,
  lot_id INT
 );


CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_registration DATE,
  email CHAR(128) NOT NULL UNIQUE,
  name CHAR(128),
  password CHAR(255),
  avatar CHAR(255),
  contacts CHAR(300)
);

