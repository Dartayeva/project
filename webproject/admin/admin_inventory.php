<?php

session_start();
if(!isset($_SESSION['name'])){
	header("location: ../index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Инвентарь</title>
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
            <h2 class="page_title">Инвентарь</h2>
            <br/>
            <?php
			
			include_once("../scripts/connect.php");

if(isset($_POST['update'])){
$UpdateQuery = "UPDATE products SET name='$_POST[name]', price='$_POST[price]', description='$_POST[description]' WHERE id='$_POST[hidden]'";               
mysql_query($UpdateQuery);
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM products WHERE id='$_POST[hidden]'";          
mysql_query($DeleteQuery);
};



$sql = "SELECT * FROM products ORDER BY date_added DESC";
$myData = mysql_query($sql);
echo "<table width=730 cellspacing=0 cellpadding=3 border=1>
<tr>
<td align=center>Имя продукта</td>
<td align=center>Цена</td>
<td align=center>Описание</td>
</tr>";
while($record = mysql_fetch_array($myData)){
echo "<form action=admin_inventory.php method=post>";
echo "<tr>";
echo "<td align=center>" . $record['name'] . " </td>";
echo "<td align=center>" . $record['price'] . "тг </td>";
echo "<td align=center>" . $record['description'] . " </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $record['id'] . " </td>";
echo "</tr>";
echo "<tr>";
echo "<td>" . "<input type=text name=name </td>";
echo "<td>" . "<input type=text name=price </td>";
echo "<td>" . "<input type=text name=description </td>";
echo "<td>" . "<input type=submit name=update value=Изменить id=button"  . " </td>";
echo "<td>" . "<input type=submit name=delete value=Удалить id=button" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "</form>";
echo "</table>";
mysql_close();

?>
        </section>
        <?php include_once("templates/tmp_aside.php"); ?>
        <?php include_once("templates/tmp_footer.php"); ?>
    </div>
</body>
</html>