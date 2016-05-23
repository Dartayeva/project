<?php

$style = "";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");

if(!isset($_SESSION['id'])){
	header("location: index.php");
	exit();
}

$sql =  mysql_query("SELECT * FROM site_style WHERE status='1' LIMIT 1");
while($row = mysql_fetch_array($sql)){
	$style = $row["name"];
}

$user_costumer = $_SESSION['id'];
$cart = '';
$cart_action = '';
$s = 'n';
$sql2 = mysql_query("SELECT * FROM shopping WHERE mem_id='$user_costumer' AND status='p' LIMIT 1");
$count = mysql_num_rows($sql2);
$cartArray = "";
$cartCount = "";
$cartSlice = "";
$file_link = "";
$product_name = "";
$product_price = "";
$cart_top = "";
$cart_bottom = "";
$cart_id = "";
if($count == 1){
	while($row = mysql_fetch_array($sql2)){
		$cart_shop = $row["cart"];
		$cart_id = $row["id"];
		if($cart_shop != ''){
			$cart_action = '
			    <form action="shopping_cart.php" method="post" enctype="multipart/form-data">
		        <input type="submit" name="submit" class="cart_action_yes" value="Заказать" />';
		}else{
			$cart_action = '<div class="cart_action_none">Заказать</div>';
		}
		$cart_total = $row["total"];
		if ($cart_shop  != "") { 
		    $cartArray = explode(",", $cart_shop);
	        $cartCount = count($cartArray);
            $cartSlice = array_slice($cartArray, 0, 50);	
            $i = 0; 
			foreach ($cartSlice as $key => $value) { 
                $i++; 
		        $file_link = 'products/' . $value . '.jpg';
				$image = '<img src="' . $file_link . '" width="40" height="40" border="0" />';
			    $sql3 = mysql_query("SELECT name, price FROM products WHERE id='$value' LIMIT 1") or die ("Ошибка!");
		        while($row = mysql_fetch_array($sql3)){ 
			        $product_name = $row["name"];
			     	$product_price = $row["price"];
			    }
				$cart_top = '
				    <table width="100%" cellpadding="3" cellspacing="0" border="1">
                        <tr>
						    <td width="40" align="center" height="40"></td>
							<td>Имя продукта</td>
							<td width="40" align="center">Цена</td>
						</tr>
				';
				$cart .= '
				    <tr>
					    <td width="40" align="center" height="40"><a href="view.php?id=' . $value . '">' . $image . '</a></td>
						<td><p class="text">' . $product_name .'</p></td>
						<td width="70" align="center"><p class="price">' . $product_price .' тг</p></td>
					</tr>
				';  
				$cart_bottom = '
				    <tr>
					    <td colspan="2" style="padding: 3px;"><h3>Общая цена: </h3></td>
						<td width="70" align="center"><p class="price"> ' . $cart_total .' тг</p></td>
					</tr>
					</table>
				';
			}
		}
	}
}else{
	$cart = "<b>В данный момент у вас нет корзин, чтобы приобрести корзину вам необходимо купить продукт.</b>";
}

if(isset($_POST['submit'])){
	$sql = mysql_query("UPDATE shopping SET status='n' WHERE id='$cart_id' LIMIT 1");
	$cart_action = 'Спасибо за покупку! Ваш заказ обрабатывается, Вы скоро получите письмо от нас в вашей почте!';
	mysql_close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Корзина</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="style/<?php echo $style; ?>">
<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css">
<link rel="shortcut icon" href="icon.ico" />
<style type="text/css">
    .text{
		font-weight: bold;
		font-family: arial;
		margin-left: 10px;
		font-size: 14px;
	}
	.price{
		font-weight: bold;
		font-family: arial;
        color: #F00;
		font-size: 14px;
	}
	.cart_action_none{
		float: right;
		padding: 10px; 
		width: 100px;
		border: 1px solid #CCC; 
		background: #F1F1F1; 
		color: #333;
		font-weight: bold;
		font-family: arial;
		font-size: 16px;
		text-align: center;
	}
	.cart_action_yes{
		float: right;
		padding: 10px; 
		width: 100px;
		border: 1px solid #CCC; 
		background: #FC0; 
		color: #333;
		font-weight: bold;
		font-family: arial;
		font-size: 16px;
		text-align: center;
		cursor: pointer;
	}
</style>
</head>
<body>
    <div id="main_wrapper">
        <?php include_once("templates/tmp_header.php"); ?>
        <?php include_once("templates/tmp_nav.php"); ?>
        <div id="content_wrapper">
            <table cellpadding="0" cellspacing="0" border="0" width="1000">
                <tr>
                    <td valign="top">
                        <?php include_once("templates/tmp_left_aside.php"); ?>
                    </td>
                    <td valign="top">
                        <section id="main_content">
                            <div id="newest_products">
                                <h2 class="page_title">Корзина</h2>
                                <br/> 
                                <?php echo $cart_top; ?>                             
                                <?php echo $cart; ?>
                                <?php echo $cart_bottom; ?>
                                <br/>
                                <?php echo $cart_action; ?>
                            </div>
                        </section>
                    </td>
                    <td valign="top">
                        <?php include_once("templates/tmp_right_aside.php"); ?>
                    </td>
                </tr>
            </table>
        </div>      
    </div>
    <?php include_once("templates/tmp_footer.php"); ?>
</body>
</html>