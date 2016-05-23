<?php

$style = "";
include_once("scripts/connect.php");
include_once("scripts/check_log.php");
$sql =  mysql_query("SELECT * FROM site_style WHERE status='1' LIMIT 1");
while($row = mysql_fetch_array($sql)){
	$style = $row["name"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Успешно</title>
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
                            <h2 class="page_title">Успешно!</h2>
                            <br/>
                            <p>Ваш аккаунт создана. Админ проверить ваш аккаунт и если все в порядке, вы можете покупать или заказать продукт</p>
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