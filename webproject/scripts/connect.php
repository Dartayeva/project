<?php

$host = "localhost";
$user = "root";
$pass = "123";
$name = "1";

mysql_connect("$host","$user","$pass") or die(mysql_error());
mysql_select_db("$name") or die(mysql_error());

?>
