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
  winner CHAR,
  category_id ISELECT  l.name, l.start_price, l.image,  c.name,  IFNULL(MAX(r.amount), l.start_price) current_price  FROM lot l
JOIN category c ON l.category_id = c.name  LEFT JOIN rate r ON  l.id = r.lot_id
WHERE l.last_date > NOW() GROUP BY r.lot_id, l.name, l.start_price, l.image ,c.name, l.category_id, l.id ORDER BY l.date_create DESC LIMIT 3;NT
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

