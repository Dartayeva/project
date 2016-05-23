<?php

$style = "";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");
$sql =  mysql_query("SELECT * FROM site_style WHERE status='1' LIMIT 1");
while($row = mysql_fetch_array($sql)){
	$style = $row["name"];
}
///
$new_products = "";
$sql2 = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 12");
$count = mysql_num_rows($sql2);
if($count > 0){
	while($row = mysql_fetch_array($sql2)){
		$id = $row['id'];
		$name = $row['name'];
		$price = $row['price'];
		$source = "products/$id.jpg";
		$img = '<img src="' .$source . '" width="160" height="180" border="0">';
		$new_products .= '
		    <div id="d_p">
			    <a href="view.php?id=' . $id .'">' . $img . '</a>
				<br/>
				' . $name . '
				<br/>
				' . $price .'тг
			</div>
		';
	}
}else{
	$new_products = '<p>В данный момент в нашем магазине нет продуктов, зайдите позже!</p>';
}

?>
<?php

$email = "";
$password = "";
$msg_error = "";

$msg = "";
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = stripslashes($password);
	$password = strip_tags($password);
	if((!$email) || (!$password)){
		$msg_error = "<p style='color: #CC0; font-weight: bold;'>Логин или пароль неправильный!</p>";
	}else{
		$email = mysql_real_escape_string($email);
		$password = md5($password);
		include_once("scripts/connect.php");
		$sql = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1");
		$count = mysql_num_rows($sql);
		if($count > 0){
			while($row = mysql_fetch_array($sql)){
				$s_id = $row['id'];
				$s_email = $row['email'];
				$s_pass = $row['password'];
				$_SESSION['id'] = $s_id;
				$_SESSION['email'] = $s_email;
				$_SESSION['password'] = $s_pass;
				mysql_query("UPDATE users SET last_log=now() WHERE email='$s_email' LIMIT 1");
				
			}
			header("location: index.php");
				exit();
		}else{
			$msg_error = "<p style='color: #C00; font-weight: bold;'>Логин или пароль неправильный!</p>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Главная</title>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" media="screen" href="style/white_black_p.css">
<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css">
<link rel="shortcut icon" href="icon.ico" />
<style type="text/css">
#newest_products{
	width: 580px;
	border-top: 2px solid #333;
	padding-top: 20px;
}
#d_p{
	float: left;
	width: 160px;
	height: 230px;
	padding: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	text-align: center;
	border: 1px solid #999;
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
                                <?php echo $new_products; ?>
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