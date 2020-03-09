-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 26 2018 г., 18:14
-- Версия сервера: 10.1.35-MariaDB
-- Версия PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `play`
--

-- --------------------------------------------------------

--
-- Структура таблицы `participate`
--

CREATE TABLE `participate` (
  `id` bigint(20) NOT NULL,
  `requestid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `participate`
--

INSERT INTO `participate` (`id`, `requestid`, `userid`) VALUES
(1, 1, 1),
(2, 2, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type` varchar(255) NOT NULL,
  `information` varchar(1000) NOT NULL,
  `maxpeople` int(4) NOT NULL,
  `dateofrequest` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accept` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `userid`, `title`, `location`, `date`, `time`, `type`, `information`, `maxpeople`, `dateofrequest`, `accept`) VALUES
(1, 1, 'hlo', 'asd', '2018-11-12', '00:00:00', 'football', 'asdasd', 10, '2018-11-21 15:35:52', 0),
(2, 1, 'dsa', 'asd', '2018-11-13', '00:00:00', 'football', 'asdasd', 15, '2018-11-21 15:35:52', 0),
(3, 1, 'dsa', 'asd', '2018-11-11', '00:00:00', 'football', 'asdasd', 25, '2018-11-21 15:35:52', 0),
(5, 1, 'dsa', 'asd', '2018-11-14', '15:00:00', 'football', 'asdasd', 0, '2018-11-21 15:35:52', 1),
(6, 1, 'dsa', 'asd', '2018-11-14', '04:00:00', 'football', 'asdasd', 0, '2018-11-21 15:35:52', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userid` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `moderator` int(1) NOT NULL DEFAULT '0',
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `phone`, `moderator`, `admin`) VALUES
(1, 'adminss', '123456789', 'admin@gmail.com', '+77715632062', 0, 1),
(2, 'moderator', '123456789', 'moder@gmail.com', '+77085639062', 1, 0),
(10, 'user', '123456789', 'user@akb.nis.edu.kz', '+77075635064', 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `participate`
--
ALTER TABLE `participate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
