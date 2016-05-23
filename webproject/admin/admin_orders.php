<?php

session_start();
if(!isset($_SESSION['name'])){
	header("location: ../admin.php");
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Заказы</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="style/main.css" media="screen">
<link rel="stylesheet" href="style/forms.css" media="screen">
<link rel="shortcut icon" href="../icon.ico" />
</head>
<body>
    <div id="main_wrapper">
        <?php include_once("templates/tmp_header.php"); ?>
        <?php include_once("templates/tmp_nav.php"); ?>   
        <section id="main_content">
            <h2 class="page_title">Заказы</h2>
             <br/>
             <?php
include_once("../scripts/connect.php");

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM shopping WHERE id='$_POST[hidden]'";          
mysql_query($DeleteQuery);
};



$sql = "SELECT  users.full_name, users.city, users.phone, users.address, shopping.id, shopping.mem_id, shopping.cart, shopping.total,  products.name FROM users, shopping, products WHERE users.id=shopping.mem_id AND shopping.cart=products.id";
$myData = mysql_query($sql);
echo "<table width=730 cellspacing=0 cellpadding=3 border=1>
<tr>
<td align=center width=250><b>Полное имя</b></td>
<td align=center width=250><b>Город</b></td>
<td align=center width=350><b>Телефон</b></td>
<td align=center width=550><b>Адрес</b></td>
<td align=center width=250><b>Товар</b></td>
<td align=center width=250><b>Общая сумма</b></td>
</tr>";
while($record = mysql_fetch_array($myData)){
echo "<form action=admin_orders.php method=post>";
echo "<tr>";
echo "<td align=center>"  . $record['full_name'] . " </td>";
echo "<td align=center>"  . $record['city'] . " </td>";
echo "<td align=center>"  . $record['phone'] . " </td>";
echo "<td align=center>"  . $record['address'] . " </td>";
echo "<td align=center><a href=shopping_cart.php?id=$record[mem_id]>Показать</a></td>";
echo "<td align=center>"  . $record['total'] . "тг </td>";

echo "<td align=center>" . "<input type=hidden name=hidden value=" . $record['id'] . " </td>";
echo "<td align=center>" . "<input type=submit name=delete value=удалить" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "</table>";
mysql_close();

?>
        </section>
        <?php include_once("templates/tmp_aside.php"); ?>
        <?php include_once("templates/tmp_footer.php"); ?>
    </div>
</body>
</html>