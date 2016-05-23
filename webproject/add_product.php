<?php

include_once("scripts/connect.php");
include_once("scripts/check_log.php");
//////
$id = "";
$price = "";
$total = "";
if(isset($_GET['id'])){
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
	$mem_id = preg_replace('#[^0-9]#i', '', $_SESSION['id']);
	$result3 = mysql_query("SELECT price FROM products WHERE id='$id' LIMIT 1");
	$count3 = mysql_num_rows($result3);
	if($count3 > 0){
		while($row = mysql_fetch_array($result3)){
			$price = $row["price"];
            $result1 = mysql_query("SELECT * FROM shopping WHERE mem_id='$mem_id' LIMIT 1");
	        $count1 = mysql_num_rows($result1);
	        if($count1 > 0){
		        while($row = mysql_fetch_array($result1)){
			        $cart = $row["cart"];
			        $total = $row["total"];
			        $next  = $total + $price;
		            $result2 = mysql_query("UPDATE shopping SET cart='$cart,$id', total='$next' WHERE mem_id='$mem_id' LIMIT 1");
			        header("location: shopping_cart.php");
			        exit();
		        }
	        }else{
		        mysql_query("INSERT INTO shopping(mem_id, cart, total) VALUES('$mem_id','$id','$price')");
		        header("location: shopping_cart.php");
		        exit();
	        }			
		}
	}else{
		header("location: index.php");
	exit();
	}	
}else{
	header("location: index.php");
	exit();
}

?>