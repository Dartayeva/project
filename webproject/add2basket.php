<?php
/*Запускаем сессию*/
session_start();
/*Подключяем библиотеки*/
require "eshop_db.inc.php";
require "eshop_lib.inc.php";

/*Получаем идентификатор пользователя*/
$customer = session_id();
/*Получаем id товара*/
$goodsid = clearData($_GET["id"], "i");
/*Количество товара, в данном случае у нас всегда будет одна единица одного товара*/
$quantity = 1;
/*Получаем время*/
$date = time();

add2basket($customer, $goodsid, $quantity, $date);
header("Location: catalog.php");
?>