<?php

$style = "";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");
$sql =  mysql_query("SELECT * FROM site_style WHERE status='1' LIMIT 1");
while($row = mysql_fetch_array($sql)){
	$style = $row["name"];
}
//////////////////////////////////////////////////
$full_name = "";
$city = "";
$phone = "";
$email = "";
$password = "";
$address = "";
$ip = "";
$msg = "";
if(isset($_POST['full_name'])){
	$full_name = $_POST['full_name'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	
	///////////////////////////////
	$full_name = strip_tags($full_name);
	$city = strip_tags($city);
	//$phone = strip_tags($phone);
	$password = strip_tags($password);
	//$address = strip_tags($address);
	///////////////////////////////
	$full_name = stripslashes($full_name);
	$city = stripslashes($city);
	//$phone = stripslashes($phone);
	$password = stripslashes($password);
	//$address = stripslashes($address);
	//////////////////////////////
	$full_name = mysql_real_escape_string($full_name);
	$phone = $phone = stripslashes($phone);
	$email = mysql_real_escape_string($email);
	/////////////////////////////
	if((!$full_name)  || (!$city) || (!$phone) || (!$password) || (!$address) || (!$email)){
		$msg .= "Пополните все данные!<br/>";
	}else{
		include_once("scripts/connect.php");
		$email_check = mysql_query("SELECT email FROM users WHERE email='$email' LIMIT 1");
		$count_email = mysql_num_rows($email_check);
		if(strlen($full_name) < 10){
			$msg .= "Вставьте действительное имя.<br/>";
		}else if(strlen($phone) < 9){
			$msg .= "Введите действительный номер.<br/>";
		}else if(strlen($password) < 6){
			$msg .= "Пароль должен содержать минимум 6 символов.<br/>";
		}else if(strlen($address) < 12){
			$msg .= "Введите действительный адрес.<br/>";
		}else if(strlen($email) < 9){
			$msg .= "Введите действительный логин<br/>";
		}else if($count_email == 1){
			$msg .= "Этот логин уже занят другим ползователям.<br/>";
		}else{			
			$password = md5($password);
			$ip = $_SERVER['REMOTE_ADDR'];
			$sql = mysql_query("INSERT INTO users(full_name, city, phone, email, password, address, ip, signup) VALUES('$full_name','$city','$phone','$email','$password','$address','$ip',now())");
			header("location: success_register.php");
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Регистрация</title>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" media="screen" href="style/<?php echo $style; ?>">
<link rel="stylesheet" type="text/css" media="screen" href="style/forms.css">
<link rel="shortcut icon" href="icon.ico" />
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
                            <h2 class="page_title">Создать аккаунт</h2>
                            <br/>
                            <form method="post" action="register.php" enctype="multipart/form-data">
                            <table width="100%" cellpadding="4" cellspacing="4" border="0">
                                <tr>
                                    <td align="right" width="150"><label>Полное имя*:</label></td>
                                    <td align="left"><input type="text" name="full_name" class="text_input" maxlength="255" /></td>
                                </tr>
                                <tr>
                                    <td align="right" width="150"><label>Город*:</label></td>
                                    <td align="left">
                                        <select name="city" class="text_input">
                                        <option value=""></option>
                                        <option value="Актау">Актау</option>
                                        <option value="Актобе">Актобе</option>
                                        <option value="Алматы">Алматы</option>
                                        <option value="Астана">Астана</option>
                                        <option value="Атырау">Атырау</option>
                                        <option value="Жезказган">Жезказган</option>
                                        <option value="Караганды">Караганды</option>
                                        <option value="Кокшетау">Кокшетау</option>
                                        <option value="Кызылорда">Кызылорда</option>
                                        <option value="Павлодар">Павлодар</option>
                                        <option value="Семипалатинск">Семипалатинск</option>
                                        <option value="Талдыкорган">Талдыкорган</option> 
                                        <option value="Тараз">Тараз</option> 
                                        <option value="Ускаменагорск">Ускаменагорск</option> 
                                        <option value="Шымкент">Шымкент</option> 
                                        </select>
                                    </td>
                                </tr>
                               <tr>
                                   <td align="right"><label>Телефон*:</label></td>
                                   <td align="left"><input type="number" name="phone" class="text_input" maxlength="11" /></td>
                               </tr>
                               <tr>
                                   <td align="right"><label>Логин*:</label></td>
                                   <td align="left"><input type="email" name="email" class="text_input" maxlength="100" /></td>
                               </tr>
                               <tr>
                                   <td align="right"><label>Пароль*:</label></td>
                                   <td align="left"><input type="password" name="password" class="text_input" maxlength="20" /></td>
                               </tr>
                               <tr>
                                   <td align="right"><label>Адрес*:</label></td>
                                   <td align="left">
                                       <textarea name="address" style="width:300px;height:80px;padding:5px;resize:none"></textarea>
                                   </td>
                               </tr>
                               <tr>
                                   <td align="center" colspan="2"><input type="submit" name="submit" id="button" value="Создать"/></td>
                               </tr>
                               <tr>
                                   <td align="center" colspan="2"><?php echo $msg; ?></td>
                              </tr>
                          </table>
                          </form>
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