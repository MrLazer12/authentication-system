-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 21 2020 г., 10:14
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `authentication_system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user_data`
--

CREATE TABLE `user_data` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `birthday` date NOT NULL,
  `id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_data`
--

INSERT INTO `user_data` (`username`, `password`, `first_name`, `last_name`, `sex`, `email`, `birthday`, `id`, `is_active`) VALUES
('d', 's', 'd', 'd', 'm', 's@mail.ru', '2020-11-05', 1, 1),
('das', 'A_23213ddasda', 'd', 'd', 'm', 's@mail.ru', '2020-11-12', 2, 1),
('vlad12', 'Vlad_123', 'd', 's', 'm', 'staffordtony03@gmail.com', '2020-11-19', 33, 1),
('nikita', 'Akira_123', 'Kira', 'Akitzuka', 'm', 'staffordtony03@gmail.com', '2002-06-12', 35, 1),
('as', 'Akira_123', 'd', 's', 'm', 'staffordtony03@gmail.com', '2020-11-21', 36, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
