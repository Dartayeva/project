<?php

include_once("scripts/connect.php");
include_once("scripts/check_log.php");
$sql =  mysql_query("SELECT * FROM site_style WHERE status='1' LIMIT 1");
while($row = mysql_fetch_array($sql)){
	$style = $row["name"];
}

if(!isset($_SESSION['id'])){
	header("location: vitamin_cat.php");
	exit();
}

$id = "";
if(isset($_GET['id'])){
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']);
}else{
	header("location: index.php");
	exit();
}

///
$price = "";
$new_products = "";
$sql2 = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql2);
if($count > 0){
	while($row = mysql_fetch_array($sql2)){
		$id = $row['id'];
		$name = $row['name'];
		$description = $row['description'];
		$status = $row['status'];
		$price = $row['price'];
		$source = "products/$id.jpg";
		$img = '<a href="' . $source . '" target="_blank"><img src="' .$source . '" width="250" border="1"></a>';
		$product = '
		    <table width="580" border="0" cellpadding="4" cellspacing="4">
			    <tr>
				    <td valign="top" width="250">' . $img . '</td>
					<td valign="top" width="330">
				        <h2 class="page_title">' . $name . '</h2>
				        <br/>
				        <label>' . $price .'тг<label>	
						<br/>
				        <label>Описание: ' . $description .'<label>
						<br/>
						<br/>
						<a href="add_product.php?id=' . $id .'">Добавить в корзину</a>
					</td>
				</tr>
				
			</table>
		';
	}
}else{
	header("location: index.php");
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Продукт</title>
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
                            <?php echo $product; ?>
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