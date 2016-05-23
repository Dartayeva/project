<html>
<head>
	<title>Форма добавления товара в каталог</title>
</head>
<body>
	<form action="save2cat.php" method="post">
		<p>Автор: <input type="text" name="author" size="50"></p>
		<p>Название: <input type="text" name="title" size="100"></p>
		<p>Год издания: <input type="text" name="publicyear" size="4"></p>
		<p>Цена: <input type="text" name="price" size="6"> руб.</p>
		<p><input type="submit" value="Добавить"></p>
	</form>
<p>Посмотреть <a href="catalog.php">Каталог</a></p>
</body>
</html>