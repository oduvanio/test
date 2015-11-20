-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 20 2015 г., 18:27
-- Версия сервера: 5.6.24
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `news_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `picture`) VALUES
(13, 'Российская дальняя авиация нанесла новый удар по т', 'Российская дальняя авиация нанесла несколько новых ударов по позициям террористов в Сирии. Эскадрилья бомбардировщиков Ту-22М3 атаковала шесть объектов в провинциях Ракка и Дэйр-эз-Зор, еще шесть объектов были обстреляны крылатыми ракетами, запущенными с бомбардировщиков Ту-160 над территорией России.', '../images/1.jpg'),
(14, 'Российская дальняя авиация нанесла новый удар по т', 'Российская дальняя авиация нанесла несколько новых ударов по позициям террористов в Сирии. Эскадрилья бомбардировщиков Ту-22М3 атаковала шесть объектов в провинциях Ракка и Дэйр-эз-Зор, еще шесть объектов были обстреляны крылатыми ракетами, запущенными с бомбардировщиков Ту-160 над территорией России.', '../images/1.jpg'),
(15, 'Российская дальняя авиация нанесла новый удар по т', 'Российская дальняя авиация нанесла несколько новых ударов по позициям террористов в Сирии. Эскадрилья бомбардировщиков Ту-22М3 атаковала шесть объектов в провинциях Ракка и Дэйр-эз-Зор, еще шесть объектов были обстреляны крылатыми ракетами, запущенными с бомбардировщиков Ту-160 над территорией России.', '../images/1.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
