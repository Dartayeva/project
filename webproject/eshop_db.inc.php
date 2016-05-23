<?php
/*Адрес сервера*/
define("DB_HOST", "localhost");
/*Логин для соединения с базой*/
define("DB_LOGIN", "root");
/*Пароль для соединения с базой*/
define("DB_PASSWORD", "");
/*Имя базы данных*/
define("DB_NAME", "eshop");
/*Имя файла с личными данными пользователей*/
define("ORDERS_LOG", "orders.log");

/*Количество товаров в корзине пользователя. Изначально ноль*/
$count = 0;

/*Устанавливаем соединение с сервером базы данных*/
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die("Не могу соединиться с сервером базы данных!");
/*Выбираем базу данных*/
mysql_select_db(DB_NAME) or die(mysql_error());
/*При добавлении товаров в корзину, счетчик $count будет меняться, то есть будет меняться количество товаров в корзине*/
$sql = "SELECT count(*) FROM basket WHERE customer='".session_id()."'";
$resultat = mysql_query($sql) or die(mysql_error());
$count = mysql_result($resultat, 0, "count(*)");
?>