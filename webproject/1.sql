-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 14 2016 г., 12:56
-- Версия сервера: 5.6.20
-- Версия PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(1) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_log` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `last_log`) VALUES
(1, 'Azhara079', '202cb962ac59075b964b07152d234b70', '2016-05-14 16:23:43');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(7) NOT NULL,
  `msg_name` varchar(100) NOT NULL,
  `msg_email` varchar(80) NOT NULL,
  `msg_subject` varchar(50) NOT NULL,
  `msg_message` mediumtext NOT NULL,
  `msg_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `msg_name`, `msg_email`, `msg_subject`, `msg_message`, `msg_date`) VALUES
(2, 'lkjnhbvbnm,', 'azhardartayeva@gmail.com', '.lkjmnhbvcbnm', '    dfgupok[jcgfgbhjml,;mbnvn                                        ', '2016-05-09'),
(3, 'Azhar', 'azhardartayeva@gmail.com', 'CVBNM', '     FDCGBVHJNKLKKNHJGFYTDFGBH                                      ', '2016-05-14');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(7) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `category` enum('1','2','3','4') NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `price` varchar(5) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `status`, `date_added`) VALUES
(20, 'ÐšÐ¾Ð½Ñ‚ÐµÐ¹Ð½ÐµÑ€', '1', 'Ð”Ð»Ñ Ð²Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð¼Ð½Ð¾Ð³Ð¸Ñ… Ð²ÐµÑ‰ÐµÐ¹', '2600', '1', '2015-01-11 11:45:55'),
(21, 'Ð”ÑÐ¹Ð»Ð¸', '2', 'Ð”Ð»Ñ Ñ€Ð°Ð·Ð²Ð¸Ñ‚Ð¸Ð¸ Ð¸Ð¼Ð¼ÑƒÐ½Ð¸Ñ‚ÐµÑ‚Ð°  ', '2800', '1', '2015-01-11 11:46:45'),
(23, 'Ð’ ÐºÐ¾Ð¼Ð¿Ð»ÐµÐºÑ', '2', 'Ð”Ð»Ñ Ð¼Ð¾Ð·Ð³Ð°', '4800', '1', '2015-01-11 11:48:29'),
(24, 'SA8 ', '1', 'Ð´Ð»Ñ ÑÑ‚Ð¸Ñ€ÐºÐ¸', '3800', '1', '2015-01-11 11:49:12'),
(25, 'Qwen cleaner', '1', 'Ð´Ð»Ñ Ð¿Ð»Ð¸Ñ‚Ð¾Ðº', '4800', '1', '2015-01-11 11:49:50'),
(26, 'ÑˆÐ°Ð¼Ð¿ÑƒÐ½ÑŒ  ', '4', 'Ð´Ð»Ñ Ð²ÑÐµÑ… Ñ‚Ð¸Ð¿Ð¾Ð² Ð²Ð¾Ð»Ð¾Ñ  ', '4800', '1', '2015-01-09 22:47:59'),
(27, 'Glister', '4', 'Ð´Ð»Ñ Ð¿Ð¾Ð»Ð¾ÑÐºÐ°Ð½Ð¸Ðµ Ñ€Ñ‚Ð°', '4500', '1', '2015-01-09 22:49:02'),
(28, 'Ð—ÑƒÐ±Ð½Ð°Ñ Ð¿Ð°ÑÑ‚Ð°', '4', 'Ð·ÑƒÐ±Ð½Ð°Ñ Ð¿Ð°ÑÑ‚Ð°', '3800', '1', '2015-01-09 22:49:48'),
(32, 'ÑÑ€ÐµÐ´ÑÑ‚Ð²Ð° Ð´Ð»Ñ ÑƒÑ…Ð¾Ð´Ð° ÐºÐ¾Ð¶Ð¸', '3', 'Ð´Ð»Ñ ÑƒÑ…Ð¾Ð´Ð° ', '5200', '1', '2015-01-09 23:00:17'),
(33, 'ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¹ ÐºÐ°Ñ€Ð°Ð½Ð´Ð°Ñˆ', '3', 'Ð´Ð»Ñ Ñ€ÐµÑÐ½Ð¸Ñ†', '4800', '1', '2015-01-09 23:00:49');

-- --------------------------------------------------------

--
-- Структура таблицы `shopping`
--

CREATE TABLE IF NOT EXISTS `shopping` (
`id` int(10) NOT NULL,
  `mem_id` int(10) NOT NULL,
  `cart` text NOT NULL,
  `total` varchar(7) NOT NULL,
  `status` enum('n','p','f') NOT NULL DEFAULT 'p'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `shopping`
--

INSERT INTO `shopping` (`id`, `mem_id`, `cart`, `total`, `status`) VALUES
(8, 1, '20,23,20,21,20,35,37', '24400', 'n'),
(12, 2, '35,26,35', '14800', 'p');

-- --------------------------------------------------------

--
-- Структура таблицы `site_style`
--

CREATE TABLE IF NOT EXISTS `site_style` (
`id` int(2) NOT NULL,
  `name` varchar(15) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `site_style`
--

INSERT INTO `site_style` (`id`, `name`, `status`) VALUES
(1, 'main.css', '0'),
(2, 'white_black.css', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(9) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `last_log` datetime NOT NULL,
  `signup` date NOT NULL,
  `activated` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `city`, `phone`, `email`, `password`, `address`, `ip`, `last_log`, `signup`, `activated`) VALUES
(1, 'Azhara Dartayeva', 'ÐÐºÑ‚Ð°Ñƒ', '87479594827', 'azhara.dartayeva@is.sdu.edu.kz', '46e6bc23cf9e0f075d89334c51c713c9', 'Shymkent, Nursat 149', '::1', '2016-05-09 15:47:13', '2016-05-09', '0'),
(2, 'Alisher Toleberdyyev', 'ÐÐ»Ð¼Ð°Ñ‚Ñ‹', '87755011050', 'fredcolin079@gmail.com', 'b8e692131cb61c59b6342c9749aecfe3', 'akademika pavlova 74 - 25 ', '::1', '2016-05-14 16:23:53', '2016-05-09', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_style`
--
ALTER TABLE `site_style`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `shopping`
--
ALTER TABLE `shopping`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `site_style`
--
ALTER TABLE `site_style`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
