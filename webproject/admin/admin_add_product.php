<?php

$msg = "";
if(isset($_POST['product_name'])){
	$product_name = $_POST['product_name'];
	$product_category = $_POST['product_category'];
	$product_description = $_POST['product_description'];
	$product_price = $_POST['product_price'];
	////////////////////////////////////////////////
	$product_name = strip_tags($product_name);
	$product_category = strip_tags($product_category);
	$product_description = strip_tags($product_description);
	$product_price = strip_tags($product_price);
	////////////////////////////////////////////////
	$product_name = stripslashes($product_name);
	$product_category = stripslashes($product_category);
	$product_description = stripslashes($product_description);
	$product_price = stripslashes($product_price);
	if((!$product_name) || (!$product_category) || (!$product_description) || (!$product_price)){
		$msg = "<p style='color: #C00; font-weight: bold; font-size: 18px;'>Пожалуйста пополните все данные!</p>";
	}else{
	if($_FILES['fileField']['tmp_name'] != ""){ 
        $maxfilesize = 1000000; 
        if($_FILES['fileField']['size'] > $maxfilesize ){ 
            $msg = '<p class="errror_message">Размер вашей картиной слишком большой, попробуйте еще раз.</p>';
            unlink($_FILES['fileField']['tmp_name']); 
        }else if(!preg_match("/\.(gif|jpg|png)$/i", $_FILES['fileField']['name'])){
            $msg = '<p class="errror_message">Формат вашей картины не поддерживается, попробуйте еще раз.</p>';
            unlink($_FILES['fileField']['tmp_name']); 
        }else{ 
            $newname = ".jpg";
			include_once("../scripts/connect.php");
			$sql = mysql_query("INSERT INTO products(name, category, description, price, date_added) VALUES('$product_name','$product_category','$product_description','$product_price', now())");
			$id = mysql_insert_id();
            $place_file = move_uploaded_file( $_FILES['fileField']['tmp_name'], "../products/$id".$newname);
			$msg = "Добавлено!";
        }
    }
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Добавить продукт</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="style/main.css" media="screen">
<link rel="stylesheet" href="style/forms.css" media="screen">
<link rel="shortcut icon" href="../icon.ico" />
</head>
<body>
    <div id="main_wrapper">
        <?php include_once("templates/tmp_header.php"); ?>
        <?php include_once("templates/tmp_nav.php"); ?>   
        <section id="main_content">
            <h2 class="page_title">Добавьте новый продукт</h2>
            <br/>
            <form method="post" action="admin_add_product.php" enctype="multipart/form-data">
                <table width="100%" cellpadding="4" cellspacing="4" border="0">
                    <tr>
                        <td align="right" width="150"><label>Имя продукта:</label></td>
                        <td align="left"><input type="text" name="product_name" class="text_input" maxlength="100" /></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Категория:</label></td>
                        <td align="left">
                            <select name="product_category" class="text_input">
                                <option></option>
                                <option value="1">Дом</option>
                                <option value="2">Витамины</option>
                                <option value="3">Косметика</option>
                                <option value="4">Для мытья</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><label>Описание:</label></td>
                        <td align="left"><textarea name="product_description" style="width:300px;height:80px;padding:5px;resize:none"></textarea></td>
                    </tr>
                    <tr>
                        <td align="right"><label>Цена:</label></td>
                        <td align="left"><input type="text" name="product_price" class="text_input" maxlength="10" />&nbsp;тг</td>
                    </tr>
                    <tr>
                        <td align="right"><label>Фото:</label></td>
                        <td align="left">
                            <input name="fileField" type="file" class="formFields" id="fileField" /> 
                            <input name="parse_var" type="hidden" value="pho1" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><input type="submit" name="submit" id="button" value="Добавить"/></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"><?php echo $msg; ?></td>
                    </tr>
                </table>
            </form>
        </section>
        <?php include_once("templates/tmp_aside.php"); ?>
        <?php include_once("templates/tmp_footer.php"); ?>
    </div>
</body>
</html>