<?php
/*подключение библиотек*/
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
/*Получаем и фильтруем данные из формы. Функция clearData () находится в библиотеке функций eshop_lib.inc.php */
$author = clearData($_POST['author']);
$title = clearData($_POST['title']);
$publicyear = clearData($_POST['publicyear'], "i"); // "i" - это integer - число, т.к сюда передаются числовые данные
$price = clearData($_POST['price'], "i");
/*Сохранение нового товара в базе данных. Функция save () находится в библиотеке функций eshop_lib.inc.php */
save($author, $title, $publicyear, $price);	
/*Переадресовываем пользователя на страницу добавления товара*/
header("Location: add2cat.php");
?> 