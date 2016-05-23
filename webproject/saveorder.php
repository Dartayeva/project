<?php
/*Запускаем сессию*/
session_start();
/*Подключаем библиотеки*/
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
/*Получаем данные из формы*/
$name = clearData($_POST["name"], "string_file");
$email = clearData($_POST["email"], "string_file");
$phone = clearData($_POST["phone"], "string_file");
$address = clearData($_POST["address"], "string_file");
$customer = session_id();
$datetime = time();
/*Составляем строку, которая будет записываться в файл. Это данные пользователя, оформившего заказ*/
$order = "$name|$email|$phone|$address|$customer
          |$datetime\n";
/*Записываем строку в файл*/
file_put_contents(ORDERS_LOG, $order, FILE_APPEND);
/*Вызываем функцию resave() из нашей библиотеке функций (eshop_lib.inc.php) для пересохранения купленных товаров из корзины в таблицу orders.*/
resave($datetime);
?>
<html>
<head>
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Каталог товаров</a></p>
</body>
</html>	