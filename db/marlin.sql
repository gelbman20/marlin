-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 06 2020 г., 11:30
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `marlin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(8) NOT NULL,
  `userID` int(8) NOT NULL DEFAULT '0',
  `name` varchar(160) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `userID`, `name`, `date`, `message`) VALUES
(1, 0, 'Andrii ', '2020-02-06 10:18:50', 'Hello World\r\n'),
(2, 0, '11', '2020-02-06 10:27:30', '22'),
(3, 0, '11', '2020-02-06 10:34:26', '33'),
(4, 0, '11', '2020-02-06 10:35:57', '22'),
(5, 0, '11', '2020-02-06 10:44:49', '22'),
(6, 0, '44', '2020-02-06 10:44:58', '44'),
(7, 0, '55', '2020-02-06 10:45:06', '66'),
(8, 0, '10', '2020-02-06 10:52:58', '15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(160) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(7, 'gel', 'gel@gmail.com', '$2y$10$qkRXp82yum1Wis/zAj33MeOyiOu7wEoQY.thdTQVcOTOifNRTtuS2'),
(8, 'gel2', 'gel2@gmail.com', '$2y$10$.FXgK9.o5V8G/wXApsSYN.NWxLRrAKWOHOvi0quxKDwBGTyrA2.3S'),
(9, 'Andrii Helever', 'andrii-helever@gmail.com', '$2y$10$HGzuYq9qqQ/GZSL1Ib6AuOyQAn1lJgujx7WLg9IzLr2N5Rspt0gta'),
(10, '55', '55@gmail.com', '$2y$10$Dobnp.FOOxpr4PoqTjDz2uXOBFqR/pgQDRE58K3ZMblhDh4SVy8dy');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
