﻿<?php
/*Запускаем сессию*/
session_start();
/*Подключаем библиотеки*/
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Корзина пользователя</title>
</head>
<body>
<?php
if($count){
	echo "<p>Вернуться в <a href='catalog.php'>каталог</a></p>";
}else{
	echo "<p>Корзина пуста. Вернитесь в <a href='catalog.php'>каталог</a></p>";
}
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php
$goods = myBasket();// myBasket() -  функция из eshop_lib.inc.php
$i = 1;
$sum = 0;
foreach($goods as $item){
?>
	<tr>
		<td><?=$i?></td>
		<td><?=$item["author"]?></td>
		<td><?=$item["title"]?></td>
		<td><?=$item["publicyear"]?></td>
		<td><?=$item["price"]?></td>
		<td><?=$item["quantity"]?></td>
		<td><a href="delete_from_basket.php?id=<?=$item["id"]?>">Удалить</td>
	</tr>
<?php
	$i++;
	$sum += $item["price"]*$item["quantity"]; 
}
?>
</table>

<p>Всего товаров в корзине на сумму: <?=$sum?> руб.

<div align="center">
   <input type="button" value="Оформить заказ!"
    onClick="location.href='orderform.php'">
</div>

</body>
</html>