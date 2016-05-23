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
$sql2 = mysql_query("SELECT * FROM products WHERE category='4' ORDER BY date_added");
$count = mysql_num_rows($sql2);
if($count > 0){
	while($row = mysql_fetch_array($sql2)){
		$id = $row['id'];
		$name = $row['name'];
		$price = $row['price'];
		$source = "products/$id.jpg";
		$img = '<img src="' .$source . '" width="160" border="0">';
		$new_products .= '
		    <div id="d_p">
			    <a href="view_w.php?id=' . $id .'">' . $img . '</a>
				<br/>
				' . $name . '
				<br/>
				' . $price .'тг
			</div>
		';
		
	}
}else{
	$new_products = '<p>В данный момент в нашем магазине нет продуктов, подойдите позже!</p>';
}
/////
$category = "";
$sql3 = mysql_query("SELECT ")

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Продукты</title>
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
                            <?php echo $new_products; ?>
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