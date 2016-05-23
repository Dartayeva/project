<?php

session_start();
if(isset($_SESSION['name'])){
	header("location: admin/admin_add_product.php");
	exit();
}


$msg = "";
if(isset($_POST['username'])){
	$admin = $_POST['username'];
	$password = $_POST['password'];
	$admin = stripslashes($admin);
	$password = stripslashes($password);
	$admin = strip_tags($admin);
	$password = strip_tags($password);
	if((!$admin) || (!$password)){
		$msg = "<p style='color: #CC0; font-weight: bold;'>Логин или пароль неверный!</p>";
	}else{
		$admin = mysql_real_escape_string($admin);
		$password = md5($password);
		include_once("scripts/connect.php");
		$sql = mysql_query("SELECT * FROM admin WHERE name='$admin' AND password='$password' LIMIT 1");
		$count = mysql_num_rows($sql);
		if($count > 0){
			while($row = mysql_fetch_array($sql)){
				$s_id = $row['id'];
				$s_name = $row['name'];
				$s_pass = $row['password'];
				$_SESSION['id'] = $s_id;
				$_SESSION['name'] = $s_name;
				$_SESSION['password'] = $s_pass;
				mysql_query("UPDATE admin SET last_log=now() WHERE name='$s_name' LIMIT 1");
				
			}
			header("location: admin/admin_add_product.php");
				exit();
		}else{
			$msg = "<p style='color: #C00; font-weight: bold;'>Логин или пароль неверный!</p>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Вход</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="icon.ico" />
<style type="text/css">
body{
	color: #000;
	background: #06F;
}
#main_wrapper{
	width: 400px;
	padding: 15px;
	margin: 100px auto;
	background: #FFF;
	border-radius: 8px;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	box-shadow: #080808 5px 5px 15px;
}
h2{
   color: #F60;
   font-family: Tahoma, Geneva, sans-serif;
   font-size: 24px;
}
label{
	color: #000;
	font-family: arial;
	font-weight: bold;
}
.text_input{
	width: 150px;
	padding: 5px;
}
#button{
	padding: 5px 8px 5px;
}
</style>
</head>
<body>
    <div id="main_wrapper">
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <table width="100%" cellpadding="3" cellspacing="3" border="0">
                <tr>
                    <td align="center" colspan="2"><h2>Вход</h2></td>
                </tr>
                <tr>
                    <td align="right"><label>Логин:</label></td>
                    <td align="left"><input type="text" name="username" class="text_input" maxlength="20" /></td>
                </tr>
                <tr>
                    <td align="right"><label>Пароль:</label></td>
                    <td align="left"><input type="password" name="password" class="text_input" maxlength="20" /></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="submit" name="submit" id="button" value="Входите!"/></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><?php echo $msg; ?></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>