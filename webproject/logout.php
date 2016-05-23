<?php

session_start();
$_SESSION = array();
session_destroy();
if(!isset($_SESSION['name'])){
	header("location: index.php");
}else{
	echo "<h2>Could not log you out, sorry the system encountered an error.</h2>";
	exit();
}

?>