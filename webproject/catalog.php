<?php
/*Запускаем сессию*/
session_start();
/*Подключаем библиотеки*/
require "eshop_db.inc.php";
require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Каталог товаров</title>
</head>
<body>
<p>Товаров в <a href="basket.php">корзине</a>: <?=$count?></p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>В корзину</th>
</tr>
<?php
$goods = selectAll();
foreach($goods as $item){
?>
	<tr>
		<td><?=$item["author"]?></td>
		<td><?=$item["title"]?></td>
		<td><?=$item["publicyear"]?></td>
		<td><?=$item["price"]?></td>
		<td><a href="add2basket.php?id=<?=$item["id"]?>">В корзину</td>
	</tr>
<?php
}
?>
</table>
<p><a href="add2cat.php">Добавить товар в Каталог</a></p>
</body>
</html>