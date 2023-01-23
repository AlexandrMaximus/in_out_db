-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2023 г., 17:16
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `in_out_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `details`
--

CREATE TABLE `details` (
  `detail_id` int NOT NULL,
  `detail_name` varchar(50) NOT NULL,
  `material` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `form` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `height` decimal(10,2) DEFAULT NULL,
  `mass` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='содержит перечень деталей с заготовками';

--
-- Дамп данных таблицы `details`
--

INSERT INTO `details` (`detail_id`, `detail_name`, `material`, `form`, `size`, `height`, `mass`) VALUES
(3, 'ЗМС.ЗКА.65.21-35.00.002 Головка', 'сталь 09Г2С', 'круг', '200', '110.00', '26.00'),
(4, 'тройник 209АФ.00.210-22', 'сталь 40Х', 'квадрат', '210х210', '210.00', '80.00'),
(5, 'Шпиндель УД.ЗКА.00.001', 'сталь 20Х13', 'круг', '40', '370.00', '3.70'),
(6, 'Втулка УД.ЗКА.00.002', 'БрАЖ9-4', 'круг', '45', '37.00', '0.50');

-- --------------------------------------------------------

--
-- Структура таблицы `forms`
--

CREATE TABLE `forms` (
  `form_id` int NOT NULL,
  `form_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='типы заготовок';

--
-- Дамп данных таблицы `forms`
--

INSERT INTO `forms` (`form_id`, `form_type`) VALUES
(2, 'квадрат'),
(1, 'круг'),
(3, 'поковка шибер 65');

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `material_id` int NOT NULL,
  `material` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`material_id`, `material`) VALUES
(4, 'БрАЖ9-4'),
(3, 'сталь 09Г2С'),
(2, 'сталь 20Х13'),
(1, 'сталь 40Х');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_details`
--

CREATE TABLE `orders_details` (
  `order_id` int NOT NULL,
  `order_num` varchar(30) NOT NULL,
  `detail_type` varchar(30) NOT NULL,
  `detail_name` varchar(50) NOT NULL,
  `material` varchar(100) NOT NULL,
  `form` varchar(30) NOT NULL,
  `size` varchar(30) NOT NULL,
  `height` decimal(10,2) DEFAULT NULL,
  `mass` decimal(10,2) DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `total_mass` decimal(10,2) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `step` varchar(30) DEFAULT NULL,
  `prod_time` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int NOT NULL,
  `size` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='содержит размеры заготовок';

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`) VALUES
(1, '200'),
(2, '210х210'),
(3, '40'),
(4, '45');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `form` (`form`),
  ADD KEY `size` (`size`),
  ADD KEY `material` (`material`);

--
-- Индексы таблицы `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `form_type` (`form_type`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `material` (`material`);

--
-- Индексы таблицы `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `size` (`size`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `details`
--
ALTER TABLE `details`
  MODIFY `detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `material_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`form`) REFERENCES `forms` (`form_type`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `details_ibfk_2` FOREIGN KEY (`size`) REFERENCES `sizes` (`size`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `details_ibfk_3` FOREIGN KEY (`material`) REFERENCES `materials` (`material`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
