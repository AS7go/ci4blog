-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Мар 09 2025 г., 14:23
-- Версия сервера: 8.4.4
-- Версия PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `study`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-02-11-203702', 'App\\Database\\Migrations\\CreateTask', 'default', 'App', 1739316065, 1),
(2, '2025-02-25-142303', 'App\\Database\\Migrations\\EditTasksTable', 'default', 'App', 1740493831, 2),
(3, '2025-02-26-140836', 'App\\Database\\Migrations\\CreateUserTable', 'default', 'App', 1740579940, 3),
(4, '2025-03-06-104337', 'App\\Database\\Migrations\\AddStatusToUserTable', 'default', 'App', 1741259942, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Task 1', 'Description for Task 111', '2023-05-18 10:00:00', '2025-02-25 18:37:29'),
(2, 'Task 2', 'Description for Task 2222', '2023-05-19 14:30:00', '2025-02-26 12:48:26'),
(3, 'Task 3', 'Description for Task 312', '2023-05-20 09:15:00', '2025-03-07 16:52:20'),
(4, 'Task 4', 'Description for Task 4', '2023-05-21 16:45:00', NULL),
(5, 'Task 5', 'Description for Task 555555', '2023-05-22 11:30:00', '2025-03-03 18:09:46'),
(6, 'Task 6', 'text 6', '2025-02-14 23:37:00', '2025-03-03 18:10:19'),
(7, 'task 2', 'des 2', '2025-02-17 09:33:00', NULL),
(8, 'Task 8', 'text 8', '2025-02-21 18:54:00', NULL),
(10, 'Task 10', 'text 10 edit', '2025-02-21 18:54:00', '2025-03-07 16:52:47'),
(11, 'Task 11', 'text 11', '2025-02-20 21:52:00', '2025-02-25 14:32:30'),
(24, 'Task 24', 'text 24', '2025-03-03 20:23:00', '2025-03-03 18:24:15'),
(25, 'Task 25 edit', 'Test 25 text', '2025-03-01 20:38:00', '2025-03-07 15:42:58'),
(26, 'Djo go', 'Test text', '2025-03-07 17:42:00', '2025-03-07 15:42:10');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Joe222', '222@mail.g', '', '2025-03-02 14:56:55', '2025-03-07 15:35:03', 'new'),
(4, 'Bill', 'test1@gmail.com', '$2y$10$UJQPbdD.oba1akByhHTh1.HTMUyZc27KsdV9jfBPG9U1Hy7ZdUzgC', '2025-03-03 11:25:20', '2025-03-07 15:35:22', 'user'),
(5, 'Emely', 'test11@gmail.com', '$2y$10$cNFkFw9O.H8QL9JjJ15dZ.MBkfOSMtt/SUj/f56vmnzL90iXobO1e', '2025-03-03 11:26:37', '2025-03-07 15:35:47', 'new'),
(7, 'Test2222', '2222@m.q', '$2y$10$yu6jmHzF5zGaYJJjTcPxiuvVHWfTi3yfcf8k.j7V3guX8B1uIA416', '2025-03-03 14:59:19', '2025-03-07 15:36:11', 'admin'),
(8, 'Li', 'qqq23@w.e', '$2y$10$xPgoDDsiMfeAP/f5HGt7NuyguNMF/RLDFFqGcwP2zYsDXJEOqZpoC', '2025-03-03 15:35:18', '2025-03-07 15:36:55', 'user'),
(10, 'test333', 'test333@gmail.com', '$2y$10$gfyObmtvyxiodSitykbMC.Lev3j6nvoOxiEb7QJ7u0MnWoxFp2Qj.', '2025-03-03 17:15:04', '2025-03-07 15:37:14', 'admin'),
(11, 'May555', 't555@t.t', '$2y$10$K32vSl699QcnWaB3Kp2Q/u56omsbP.zmErhLeSC00b1viA5eIhKjO', '2025-03-04 15:44:58', '2025-03-07 15:37:39', 'user'),
(14, 'Elis333', 'e@d.t', '$2y$10$y9pYineHkpASzqqLryxXIuywVanvZA0DWLjiTQYeQzUeY5.fHLU4u', '2025-03-07 15:45:50', '2025-03-07 15:45:50', 'new');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
