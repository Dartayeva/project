<?php
/*Сохраняет новый товар в таблицу catalog*/
function save($author, $title, $publicyear, $price){
	$sql = "INSERT INTO catalog(author, 
                                title, 
                                pubyear, 
								price)
							VALUES(
								'$author', 
								'$title', 
								$publicyear, 
								$price
								)";
	mysql_query($sql) or die(mysql_error());
}

/*Фильтрация полученных данных*/
function clearData($data, $type = "s"){
	switch($type){
	     case "s": 
		return 
         mysql_real_escape_string
         (trim(strip_tags($data))); break;
	     case "i":
		return (int)$data;
	  /*Для фильтрации данных пользователя, который оформил заказ и эти данные уходят в файл*/
	     case "string_file":
		return trim(strip_tags($data));
	}
}

/*Возвращение всего каталога товаров*/
function selectAll(){
	$sql = "SELECT * FROM catalog";
	$resultat = mysql_query($sql) or die(mysql_error());
	return dataBaseToArray($resultat);
}

/*Переводим данные в массив*/
function dataBaseToArray($resultat){
	$array = array();
	while($row = mysql_fetch_assoc($resultat)){
		$array[] = $row;
	}
	return $array;
}

/*Добавляем товары в корзину*/
function add2basket($customer, $goodsid, $quantity, $datetime){
	$sql = "INSERT INTO basket(	customer, 
								goodsid, 
								quantity, 
								datetime)
							VALUES(
								'$customer', 
								$goodsid, 
								$quantity, 
								$datetime
								)";
	mysql_query($sql) or die(mysql_error());
}

/*Возвращаем всю пользовательскую корзину*/
function myBasket(){
	$sql = "SELECT 
				author, 
				title, 
				pubyear, 
				price, 
				basket.id, 
				goodsid, 
				customer, 
				quantity
			FROM catalog, basket
			WHERE customer='".session_id()."'
			AND catalog.id=basket.goodsid";
	$resultat = mysql_query($sql) or die(mysql_error());
	return dataBaseToArray($resultat);
}

/*Удаление данных из корзины*/
function basketDel($id){
	$sql = "DELETE FROM basket WHERE id=$id";
	mysql_query($sql) or die(mysql_error());
}

/*Пересохранение товаров из корзины в заказы*/
function resave($datetime){
	$goods = myBasket();
	foreach($goods as $item){
	$sql = "INSERT INTO orders(
							author,
							title,
							pubyear,
							price,
							customer,
							quantity,
							datetime)
				     VALUES(
					  '{$item["author"]}',
					  '{$item["title"]}',
					   {$item["publicyear"]},
					   {$item["price"]},
					  '{$item["customer"]}',
					   {$item["quantity"]},
					   $datetime)";
		mysql_query($sql) or die(mysql_error());
	}
	/*Запрос на удаление товаров из корзины*/
	$sql = "DELETE FROM basket WHERE customer='".session_id()."'";
	mysql_query($sql) or die(mysql_error());
}

/*Получение информации о заказах*/
function getOrders(){
	if(!file_exists(ORDERS_LOG))
		return false;
		$allorders = array();
	$orders = file(ORDERS_LOG);
	foreach($orders as $order){
		list($name, $email, $phone, $address, $customer, $datetime) = 
			explode("|", $order);
		$orderinfo = array();
			$orderinfo["name"] = $name;
			$orderinfo["email"] = $email;
			$orderinfo["phone"] = $phone;
			$orderinfo["address"] = $address;
			$orderinfo["datetime"] = $datetime * 1;
		$sql = "SELECT * FROM orders
						 WHERE customer='$customer' 
						 AND datetime=".$orderinfo["datetime"];
		$resultat = mysql_query($sql) or die(mysql_error());
			$orderinfo["goods"] = dataBaseToArray($resultat);
		$allorders[] = $orderinfo;
	}
	return $allorders;
}
?>