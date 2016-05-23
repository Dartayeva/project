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
<title>О нас</title>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" media="screen" href="style/<?php echo $style; ?>">
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
                            <h2 class="page_title">О нас</h2>
                            <br/>
                            <p align="center" style="color:#C60; font-family: arial; font-size:20px;" ><b>Amway (сокр. от англ. American Way of Life — «американский образ жизни») — компания в США, входящая с 2000 года в корпорацию Alticor. Компания занимается производством и продажей средств личной гигиены, бытовой химии, косметических средств, биологически активных добавок к пище и др. Для продвижения товаров используются технологии прямых продаж и сетевого маркетинга с многоуровневой системой компенсаций.<br/><br/>
                            Официальный сайт компании Amway: <a href="http://www.amway.kz">www.amway.kz</a></b></p>
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