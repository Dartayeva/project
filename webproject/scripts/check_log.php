<?php

session_start();
$status = 0;
$msg_error = "";
if(isset($_SESSION['id'])){
	if(isset($_SESSION['email'])){
		if(isset($_SESSION['password'])){
			$status = 1;
		}
	}
}

?>