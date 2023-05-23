-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 23 2023 г., 16:15
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasklist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `description`, `status`, `created_at`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint.', '1', '2023-05-23 15:44:57'),
(2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint.', '1', '2023-05-23 15:45:16'),
(3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. At, sint.', '1', '2023-05-23 15:45:28'),
(10, 2, '12351', '2', '2023-05-23 17:00:42');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'user@mail.ru', '$2y$10$3WtEBoM2bwSrV97amBnvXuzsTp.19T/L8wxcpbtFidLPgjQ3xry0O', '2023-05-23 00:15:12'),
(2, 'user2@mail.ru', '$2y$10$YeCPViIAK6tZr9JjnqZCCeTxXzi2q5lQeZhRQ/c7K6dNXPyT49mF.', '2023-05-23 00:30:46'),
(3, 'user3@mail.ru', '$2y$10$oJe64Effm89KdantLBnDSOSEcGds0pzuu8nduC7IvgiQuSke5wT3C', '2023-05-23 17:07:41');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
