-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 09 2023 г., 23:39
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `club`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answer`
--

CREATE TABLE `answer` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `form_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `answer`
--

INSERT INTO `answer` (`id`, `email`, `text`, `form_id`, `user_id`) VALUES
(5, 'admin@gmail.com', 'knklsjdnfkljndfkglnkfjldb', 27, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `form`
--

CREATE TABLE `form` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `form`
--

INSERT INTO `form` (`id`, `title`, `email`, `text`, `user_id`) VALUES
(27, 'дашвоьодпльвадл', 'omar2007767@gmail.com', 'длваьтпдлотвадлпотавылдотплыавот', 5),
(28, 'djksbfkjsdbkv', 'omar2007767@gmail.com', 'fhdsfhjvsdjhfvsd', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `otziv`
--

CREATE TABLE `otziv` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `otziv`
--

INSERT INTO `otziv` (`id`, `login`, `text`) VALUES
(4, 'bahey2015@gmail.com', 'ioudsbhfiubdsiobfgshidbgifdhbigbdfsuihgbdfuisbgufdybgjhfdbsjgbufidbgufdhbs'),
(10, 'bahey2015@gmail.com', 'кереварпа');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `img`, `text`) VALUES
(20, 'jinfignrienug', '../uploads/16502110292022-01-21 (1).png', 'hdfnguihrfneuignuirfnguhrnfuignrufynguirfnguinrfuignruiyfnguitrnuigntruinghifdnijgnrfuinguihnfrijniemnfuitrnmumvgnmrmtuiehuvngmimurhnfvguimrhfmnuvighrnmuivgnhmrtuinvgmuirtehntcmugrnuminhtr'),
(24, 'oijfdoijgoifdjgoifjdoigjdf', '../uploads/16509094211622897264824140803.jpg', 'fjkdngkljndfkgjndksjngkjdfngkjdns'),
(27, 'jbdfhgbsjkdbgjdkshbgjkjfdsbgj', '../uploads/16509330012021-09-29.png', 'ifdsuhgjhkdfsbgjhbfdsjghbdsjkgbh');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `name`) VALUES
(5, 'Omar20072222222', 'omar2007767@gmail.com', '11111111', 'Omar'),
(14, 'jkdfkjs', 'bahey20111111@gmail.com', '11111111', 'oiuhrfgh'),
(15, 'admin4ik', 'admin@gmail.com', 'adminadmin', 'Игорь'),
(16, 'kjdsnfkj', 'jskandk@gmail.com', 'c.ronaldo777', 'kjdbnskfjbdsjkh'),
(17, 'kljdnfkjnsdkj', 'kfdsnfksnfkjsd@gmail.com', '11111111', 'lkdmnlfknsdlnkfl'),
(18, 'kjndkjfnk', 'bahey151515@gmail.com', '11111111', 'ooooooooo'),
(19, '94839834', 'baga@gm', 'c.ronaldo7777777777777', 'kjdnsfkjnds'),
(23, 'kdsjfnkjdsn', 'maybe@gmail.com', '11111111', 'ksdjnfkjsdn'),
(25, 'kjfdgbnjkdfh', 'hjfdsbbdfjsh@gmail.com', '11111111', 'djhbgjkdfhb');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `otziv`
--
ALTER TABLE `otziv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT для таблицы `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `form`
--
ALTER TABLE `form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `otziv`
--
ALTER TABLE `otziv`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
