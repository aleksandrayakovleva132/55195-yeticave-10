-- Список категорий

INSERT INTO category SET name = 'Доски и лыжи', code = 'boards';
INSERT INTO category SET name = 'Крепления', code = 'attachment';
INSERT INTO category SET name = 'Ботинки', code = 'boots';
INSERT INTO category SET name = 'Одежда', code = 'clothing';
INSERT INTO category SET name = 'Инструменты', code = 'tools';
INSERT INTO category SET name = 'Разное', code = 'other';

--Придумайте пару пользователей
INSERT INTO users SET date_registration = '2019-08-08', email = 'mike@yandex.com', name = 'Mike', password = '123', avatar = 'img1', contacts = '123-65-34';
INSERT INTO users SET date_registration = '2019-08-20', email = 'mike@yandex.com', name = 'Pit', password = '090', avatar = 'img2', contacts = '809-22-14';

--список объявлений
INSERT INTO lot SET date_create = '2019-09-07', name = '014 Rossignol District Snowboard', description = 'desc1', image = 'img/lot-1.jpg',  start_price = '10999', last_date = '2019-09-10', step_rate = '120', author_id = '2',  winner = '1', category_id = '1';
INSERT INTO lot SET date_create = '2019-09-08', name = 'DC Ply Mens 2016/2017 Snowboard', description = 'desc2', image = 'img/lot-2.jpg',  start_price = '159999', last_date = '2019-09-10', step_rate = '100', author_id = '2',  winner = '3', category_id = '1';
INSERT INTO lot SET date_create = '2019-09-11', name = 'Крепления Union Contact Pro 2015 года размер L/XL', description = 'desc3', image = 'img/lot-3.jpg',  start_price = '8000', last_date = '2019-09-10', step_rate = '150', author_id = '2',  winner = '', category_id = '2';
INSERT INTO lot SET date_create = '2019-09-12', name = 'Ботинки для сноуборда DC Mutiny Charocal', description = 'desc4', image = 'img/lot-4.jpg',  start_price = '10999', last_date = '2019-09-12', step_rate = '200', author_id = '4',  winner = '', category_id = '3';
INSERT INTO lot SET date_create =  NOW()+INTERVAL 3 DAYS, name = 'Куртка для сноуборда DC Mutiny Charocal', description = 'desc5', image = 'img/lot-5.jpg',  start_price = '7500', last_date = '2019-09-23', step_rate = '150', author_id = '1',  winner = '', category_id = '4';
INSERT INTO lot SET date_create =  NOW()+INTERVAL 5 DAYS , name = 'Маска Oakley Canopy', description = 'desc6', image = 'img/lot-6.jpg',  start_price = '5400', last_date = '2019-09-15', step_rate = '250', author_id = '1',  winner = '', category_id = '6';


-- Cтавки для любого объявления
INSERT INTO rate SET  date_create = '2019-09-25', amount = '100', user_id = '2', lot_id = '3';
INSERT INTO rate SET  date_create = '2019-09-25', amount = '140', user_id = '2', lot_id = '3';
INSERT INTO rate SET  date_create = '2019-09-28', amount = '150', user_id = '3', lot_id = '4';

--получить все категории
SELECT * FROM category;

--получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, название категории;

SELECT  l.name, l.start_price, l.image,  c.name,  IFNULL(l.start_price, MAX(r.amount)) current_price  FROM lot l
JOIN category c ON l.category_id = c.name  LEFT JOIN rate r ON  l.id = r.lot_id GROUP BY r.lot_id
WHERE l.last_date >= NOW() ORDER BY l.date_create DESC LIMIT 3;

--показать лот по его id. Получите также название категории, к которой принадлежит лот;
SELECT category_id FROM lot WHERE id = 3;

--обновить название лота по его идентификатору;
UPDATE lot SET name = 'new name' WHERE id = 2;

--получить список ставок для лота по его идентификатору с сортировкой по дате.
SELECT l.step_rate FROM lot l JOIN rate r ON l.id = r.lot_id  WHERE r.id > 3 ORDER BY r.date_create;


--связать лот с таблицей ставок
SELECT l.id FROM lot l JOIN rate r ON l.id = r.lot_id;