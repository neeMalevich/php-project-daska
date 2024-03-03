-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 03 2024 г., 14:31
-- Версия сервера: 10.6.7-MariaDB
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `green_oak`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `category_parent`) VALUES
(1, 'Стулья', 'styl.png', NULL),
(2, 'Тумбы', 'tumb.png', NULL),
(3, 'Полки', 'polka-dub.png', NULL),
(4, 'Столы', 'stol.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `color_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`color_id`, `color`) VALUES
(1, 'белый'),
(2, 'бежевый'),
(3, 'коричневый'),
(4, 'орех'),
(5, 'черный');

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE `favorites` (
  `favorit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favorites`
--

INSERT INTO `favorites` (`favorit_id`, `user_id`, `product_id`) VALUES
(320, 15, 9),
(323, 15, 2),
(328, 15, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `makers`
--

CREATE TABLE `makers` (
  `maker_id` int(11) NOT NULL,
  `maker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `makers`
--

INSERT INTO `makers` (`maker_id`, `maker`) VALUES
(1, 'Амазония'),
(2, 'Байдарка'),
(3, 'Диприз'),
(4, 'Панормо');

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `material_id` int(11) NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`material_id`, `material`) VALUES
(1, 'дуб'),
(2, 'дуб с МДФ'),
(3, 'сосна'),
(4, 'ольха');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_data`, `order_time`, `order_tel`, `comment`) VALUES
(1, 15, '2024-03-05', '11:44:51.000000', NULL, NULL),
(2, 14, '2024-03-12', '66:01:41.000000', 'fds', NULL),
(3, 12, '2024-03-05', '12:37:00.000000', 'ftgvy', NULL),
(4, 12, '2024-03-13', '16:55:11.000000', 'выффыфвы', '448'),
(5, 13, '2024-03-12', '17:21:27.000000', '47', '777'),
(6, 13, '2024-03-05', '18:22:00.000000', '7848448', '8*8*8'),
(7, 15, '2024-03-16', '13:48', '', 'DSAAA'),
(8, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(9, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(10, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(11, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(12, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(13, 15, '2024-03-06', '14:07', '', '777'),
(14, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(15, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(16, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(17, 15, '2024-03-16', '13:48', '', 'DSAAAdsasss'),
(18, 15, '2024-03-12', '14:22', '', '445'),
(19, 15, '2024-03-12', '14:22', '', '445'),
(20, 15, '2024-03-12', '14:22', '', '445'),
(21, 15, '2024-03-04', '14:26', '', 'TEST'),
(22, 15, '2024-03-08', '17:28', '', '7777'),
(23, 15, '2024-03-09', '14:31', '', 'TEST0');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) UNSIGNED DEFAULT NULL,
  `price_old` int(11) UNSIGNED DEFAULT NULL,
  `material_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `maker_id` int(11) NOT NULL,
  `image` varchar(555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `price_old`, `material_id`, `color_id`, `maker_id`, `image`, `category_id`) VALUES
(2, 'Стул Амазония', 'Описание для Стул Амазония', 230, 400, 1, 2, 2, 'styl.png', 1),
(3, 'Тумба Панормо', 'Описание Тумба Панормо', 475, 600, 4, 4, 1, 'tumb.png', 2),
(4, 'Полка из дуба', 'Описание Полка из дуба', 95, 200, 1, 3, 1, 'polka-dub.png', 3),
(5, 'Стол Байдимэкс', 'Описание Стол Байдимэкс', 380, 450, 2, 3, 2, 'baidim.png', 4),
(6, 'Полки Диприз', 'Описание Полки Диприз', 220, 800, 3, 1, 3, 'dapriz.png', 3),
(7, 'Стул Виктория', 'Описание Стул Виктория', 120, 190, 4, 4, 4, 'styl-victoria.png', 1),
(8, 'Тумба Амазония', 'Описание Тумба Амазония', 460, 525, 2, 4, 2, 'amazonia.png', 2),
(9, 'Кресло Юнона', 'Описание Кресло Юнона', 135, 250, 3, 5, 2, 'ubo.png', 1),
(10, 'Стол с ящиками', 'Описание Стол с ящиками', 400, NULL, 1, 3, 2, 'yachic.png', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `count` int(22) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `product_id`, `user_id`, `order_id`, `count`) VALUES
(43, 6, 15, 22, 1),
(45, 9, 15, 23, 2),
(66, 2, 15, 22, 3),
(67, 9, 15, 23, 1),
(68, 7, 15, 17, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(555) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `role`) VALUES
(7, 'йййййtesttest@gmail.com', 'testtest@gmail.com', 'f7c504b5c111d18ea57b2b73b01e17c5', 'C:/OpenServer/domains/laba_daska/green_oak/backend/uploads/thumbnail_1633343479.png', NULL),
(12, 'Иван', 'teest@gmail.com', '8439e2ca1ae47f49b05ec55991ea5b28', '', NULL),
(13, 'malevich@gmail.com', 'malevich@gmail.com', '8277e0910d750195b448797616e091ad', NULL, NULL),
(14, 'malevich@gmail.com', 'msalevich@gmail.com', 'b8b1f1e70e65bdf38a6eba18a45847df', NULL, NULL),
(15, 'dadsdss@gmail.com', 'dadsdss@gmail.com', 'd76cd16868d5cdde5af973bef9b4046c', '/uploads/Rectangle.png', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Индексы таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorit_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `makers`
--
ALTER TABLE `makers`
  ADD PRIMARY KEY (`maker_id`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `maker_id` (`maker_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`user_id`),
  ADD KEY `order_id_2` (`order_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT для таблицы `makers`
--
ALTER TABLE `makers`
  MODIFY `maker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `materials` (`material_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`maker_id`) REFERENCES `makers` (`maker_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_order_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
