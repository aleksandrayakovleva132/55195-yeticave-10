-- Список категорий

INSERT INTO category SET name = 'Доски и лыжи', code = 'boards';
INSERT INTO category SET name = 'Крепления', code = 'attachment';
INSERT INTO category SET name = 'Ботинки', code = 'boots';
INSERT INTO category SET name = 'Одежда', code = 'clothing';
INSERT INTO category SET name = 'Инструменты', code = 'tools';
INSERT INTO category SET name = 'Разное', code = 'other';

--Придумайте пару пользователей
INSERT INTO user SET date_registration = '08-08-2019', email = 'mike@yandex.com', name = 'Mike', password = '123', avatar = 'img1', contacts = '123-65-34', lot_id = '3', rate_id = '50';
INSERT INTO user SET date_registration = '20-08-2019', email = 'mike@yandex.com', name = 'Pit', password = '090', avatar = 'img2', contacts = '809-22-14', lot_id = '2', rate_id = '100';

--список объявлений
INSERT INTO lot SET date_create = '07-09-2019', name = '014 Rossignol District Snowboard', description = 'desc1', image = 'img/lot-1.jpg',  start_price = '10999', last_date = '10-09-2019', step_rate = '100', author_id = '1',  winner = '5', category_id = '1';
INSERT INTO lot SET date_create = '07-09-2019', name = 'DC Ply Mens 2016/2017 Snowboard', description = 'desc2', image = 'img/lot-2.jpg',  start_price = '159999', last_date = '10-09-2019', step_rate = '100', author_id = '2',  winner = '2', category_id = '1';
INSERT INTO lot SET date_create = '08-09-2019', name = 'Крепления Union Contact Pro 2015 года размер L/XL', description = 'desc3', image = 'img/lot-3.jpg',  start_price = '8000', last_date = '10-09-2019', step_rate = '150', author_id = '2',  winner = '', category_id = '2';
INSERT INTO lot SET date_create = '08-09-2019', name = 'Ботинки для сноуборда DC Mutiny Charocal', description = 'desc4', image = 'img/lot-4.jpg',  start_price = '10999', last_date = '10-09-2019', step_rate = '200', author_id = '1',  winner = '1', category_id = '3';
INSERT INTO lot SET date_create = '09-09-2019', name = 'Куртка для сноуборда DC Mutiny Charocal', description = 'desc5', image = 'img/lot-5.jpg',  start_price = '7500', last_date = '10-09-2019', step_rate = '150', author_id = '1',  winner = '3', category_id = '4';
INSERT INTO lot SET date_create = '09-09-2019', name = 'Маска Oakley Canopy', description = 'desc6', image = 'img/lot-6.jpg',  start_price = '5400', last_date = '10-09-2019', step_rate = '250', author_id = '1',  winner = '3', category_id = '6';


-- Cтавки для любого объявления
INSERT INTO rate SET id = '1', date_create = '25-09-2019', amount = '100', user_id = '2', lot_id = '3';
INSERT INTO rate SET id = '2', date_create = '25-09-2019', amount = '150', user_id = '3', lot_id = '4';

--получить все категории
SELECT * FROM category;

--получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, название категории;
SELECT name, start_price, image, category_id, step_rate FROM lot
LIMIT 3 ORDER BY date_create DESC
WHERE last_date >= '25-08-2019';


--показать лот по его id. Получите также название категории, к которой принадлежит лот;
SELECT category_id FROM lot WHERE id = 3;

--обновить название лота по его идентификатору;
UPDATE lot SET name = 'new name' WHERE id = '2';

--получить список ставок для лота по его идентификатору с сортировкой по дате.
SELECT step_rate FROM lot ORDER BY date_create;



