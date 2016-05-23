<?php

session_start();
if(!isset($_SESSION['name'])){
	header("location: ../admin.php");
	exit();
}

?>
<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Сообщении</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="style/forms.css" media="screen">
<link rel="stylesheet" href="style/main.css" media="screen">
<link rel="shortcut icon" href="../icon.ico" />
</head>
<body>
    <div id="main_wrapper">
        <?php include_once("templates/tmp_header.php"); ?>
        <?php include_once("templates/tmp_nav.php"); ?>   
        <section id="main_content">
            <h2 class="page_title">Сообщении</h2>
            <br/>
            <?php
include_once("../scripts/connect.php");

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM messages WHERE id='$_POST[hidden]'";          
mysql_query($DeleteQuery);
};



$sql = "SELECT * FROM messages ORDER BY msg_date DESC";
$myData = mysql_query($sql);
echo "<table width=730 cellspacing=0 cellpadding=3 border=1>
<tr>
<td align=center width=250><b>Имя</b></td>
<td align=center width=250><b>Почта</b></td>
<td align=center width=350><b>Тема</b></td>
<td align=center width=550><b>Сообщение</b></td>
<td align=center width=250><b>Дата</b></td>
</tr>";
while($record = mysql_fetch_array($myData)){
echo "<form action=admin_messages.php method=post>";
echo "<tr>";
echo "<td align=center>"  . $record['msg_name'] . " </td>";
echo "<td align=center>"  . $record['msg_email'] . " </td>";
echo "<td align=center>"  . $record['msg_subject'] . " </td>";
echo "<td align=center>"  . $record['msg_message'] . " </td>";
echo "<td align=center>"  . $record['msg_date'] . " </td>";
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