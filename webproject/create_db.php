<?php
/*Создание базы данных*/
define("DB_HOST", "localhost");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "password");
define("DB_NAME", "eshop");
/*Соединяемся с сервером*/
mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysql_error());
/*Создаем базу данных*/
$sql = 'CREATE DATABASE '.DB_NAME;
mysql_query($sql) or die(mysql_error());
/*Выбираем нашу базу данных*/
mysql_select_db(DB_NAME) or die(mysql_error());
/*Создаем запрос на создание таблицы catalog*/
$sql = "
CREATE TABLE catalog (
	id int(11) NOT NULL auto_increment,
	author varchar(50) NOT NULL default '',
	title varchar(50) NOT NULL default '',
	pubyear int(4) NOT NULL default 0,
	price int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
/*Выполняем запрос на создание таблицы catalog*/
mysql_query($sql) or die(mysql_error());
/*Создаем запрос на создание таблицы basket*/
$sql = "
CREATE TABLE basket (
	id int(11) NOT NULL auto_increment,
	customer varchar(32) NOT NULL default '',
	goodsid int(11) NOT NULL default 0,
	quantity int(4) NOT NULL default 0,
	datetime int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
/*Выполняем запрос на создание таблицы catalog*/
mysql_query($sql) or die(mysql_error());
/*Создаем запрос на создание таблицы orders*/
$sql = "
CREATE TABLE orders (
	id int(11) NOT NULL auto_increment,
	author varchar(50) NOT NULL default '',
	title varchar(50) NOT NULL default '',
	pubyear int(4) NOT NULL default 0,
	price int(11) NOT NULL default 0,
	customer varchar(32) NOT NULL default '',
	quantity int(4) NOT NULL default 0,
	datetime int(11) NOT NULL default 0,
	PRIMARY KEY (id)
)";
/*Выполняем запрос на создание таблицы orders*/
mysql_query($sql) or die(mysql_error());
/*Закрываем соединие с сервером*/
mysql_close();
/*Если все сделано правильно, выводим сообщение*/
echo '<p>Структура базы данных успешно создана!</p>';
?>