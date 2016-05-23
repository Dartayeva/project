<?php
/*Запускаем сессии*/
session_start();
/*Подключаем библиотеки*/
require "eshop_db.inc.php";
require "eshop_lib.inc.php";

$id = clearData($_GET["id"], "i");
basketDel($id);
header("Location: basket.php");
?>