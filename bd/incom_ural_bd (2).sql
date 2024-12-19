-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2024 г., 02:04
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `incom_ural_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dop_for_fountains`
--

CREATE TABLE `dop_for_fountains` (
  `id` int NOT NULL,
  `UV_sterilizer` int NOT NULL,
  `Restriction_ring` int NOT NULL,
  `Pedal_start` int NOT NULL,
  `Touch_control` int NOT NULL,
  `Crane_Gusak` int NOT NULL,
  `Reverse_Osmosis` int NOT NULL,
  `filtration_system` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `dop_for_fountains`
--

INSERT INTO `dop_for_fountains` (`id`, `UV_sterilizer`, `Restriction_ring`, `Pedal_start`, `Touch_control`, `Crane_Gusak`, `Reverse_Osmosis`, `filtration_system`) VALUES
(12, 5000, 600, 2500, 8000, 3000, 15000, 5600);

-- --------------------------------------------------------

--
-- Структура таблицы `Fountains`
--

CREATE TABLE `Fountains` (
  `id` int NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int NOT NULL,
  `gabarit_Length` int NOT NULL,
  `gabarit_Width` int NOT NULL,
  `gabarit_Height` int NOT NULL,
  `Weight` int NOT NULL,
  `Filter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Performance` int NOT NULL,
  `Сooling` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Fountains`
--

INSERT INTO `Fountains` (`id`, `Name`, `Price`, `gabarit_Length`, `gabarit_Width`, `gabarit_Height`, `Weight`, `Filter`, `Performance`, `Сooling`, `img`, `material`) VALUES
(1, 'Питьевой фонтанчик \"Байкал\"', 9500, 300, 300, 900, 15, '0', 200, '0', 'assets\\img\\img_tovar\\baikal_1.jpg', 'Сталь'),
(9, 'Питьевой фонтанчик Байкал с охлаждением\r\n', 30000, 300, 300, 900, 30, ' 3-х ступенчатый', 120, '1', 'assets\\img\\img_tovar\\baikal_4.jpg', 'нержа'),
(10, 'Питьевой фонтанчик Байкал с охлаждением и газированием\r\n', 38000, 400, 400, 830, 45, ' 3-х ступенчатый', 120, '1', 'assets\\img\\img_tovar\\baikal_4.jpg', 'нержа'),
(11, 'Питьевой фонтанчик \"Байкал\"', 9500, 300, 300, 900, 15, '0', 200, '0', 'assets\\img\\img_tovar\\baikal_2.jpg', 'нержа'),
(12, 'Питьевой фонтанчик \"Байкал\"', 11000, 400, 400, 900, 15, '0', 200, '0', 'assets\\img\\img_tovar\\baikal_4.jpg', 'нержа');

-- --------------------------------------------------------

--
-- Структура таблицы `Fountains_coling_gaz`
--

CREATE TABLE `Fountains_coling_gaz` (
  `id_tablici` int NOT NULL,
  `id` int NOT NULL,
  `Cooling_capacity` varchar(255) NOT NULL,
  `refrigerant` varchar(255) NOT NULL,
  `Carbon_dioxide_content` varchar(255) NOT NULL,
  `Power_supply` varchar(255) NOT NULL,
  `Power_consumption` varchar(255) NOT NULL,
  `Operating_temperature` varchar(255) NOT NULL,
  `Chilled_water_temperature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Fountains_coling_gaz`
--

INSERT INTO `Fountains_coling_gaz` (`id_tablici`, `id`, `Cooling_capacity`, `refrigerant`, `Carbon_dioxide_content`, `Power_supply`, `Power_consumption`, `Operating_temperature`, `Chilled_water_temperature`) VALUES
(1, 10, '800', 'R22. R134', '7,5 ', '220В (± 10 %), 50Гц', '0,4', '+5°C…+50°C', '+10'),
(2, 9, '800', 'R134', '0', '220В (± 10 %), 50Гц', '0,4', '+5°C…+50°C', '+10');

-- --------------------------------------------------------

--
-- Структура таблицы `NapolyevPurifayer_RO`
--

CREATE TABLE `NapolyevPurifayer_RO` (
  `Id` int NOT NULL,
  `Model` varchar(100) NOT NULL,
  `TypeOfConstruction` varchar(50) NOT NULL,
  `HeatingType` varchar(50) NOT NULL,
  `HotWaterTankVolume` float NOT NULL,
  `HeatingPower` float NOT NULL,
  `HotWaterProductionRate` float NOT NULL,
  `CoolingType` varchar(50) NOT NULL,
  `CoolingPower` float NOT NULL,
  `ColdWaterProductionRate` float NOT NULL,
  `ColdWaterTankVolume` float NOT NULL,
  `DisplayPresent` tinyint(1) DEFAULT NULL,
  `FaucetType` varchar(50) DEFAULT NULL,
  `Dimensions` varchar(20) DEFAULT NULL,
  `Weight` float NOT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `WarrantyPeriod` int NOT NULL,
  `gabarit_Length` int NOT NULL,
  `gabarit_Width` int NOT NULL,
  `gabarit_Height` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `NapolyevPurifayer_uv`
--

CREATE TABLE `NapolyevPurifayer_uv` (
  `Id` int NOT NULL,
  `Model` varchar(100) NOT NULL,
  `TypeOfConstruction` varchar(50) NOT NULL,
  `HeatingType` varchar(50) NOT NULL,
  `HotWaterTankVolume` float NOT NULL,
  `HeatingPower` float NOT NULL,
  `HotWaterProductionRate` float NOT NULL,
  `CoolingType` varchar(50) NOT NULL,
  `CoolingPower` float NOT NULL,
  `ColdWaterProductionRate` float NOT NULL,
  `ColdWaterTankVolume` float NOT NULL,
  `DisplayPresent` tinyint(1) DEFAULT NULL,
  `FaucetType` varchar(50) DEFAULT NULL,
  `Dimensions` varchar(20) DEFAULT NULL,
  `Weight` float NOT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `WarrantyPeriod` int NOT NULL,
  `gabarit_Length` int NOT NULL,
  `gabarit_Width` int NOT NULL,
  `gabarit_Height` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `NastolPurifayer_RO`
--

CREATE TABLE `NastolPurifayer_RO` (
  `Id` int NOT NULL,
  `Model` varchar(100) NOT NULL,
  `TypeOfConstruction` varchar(50) NOT NULL,
  `HeatingType` varchar(50) NOT NULL,
  `HotWaterTankVolume` float NOT NULL,
  `HeatingPower` float NOT NULL,
  `HotWaterProductionRate` float NOT NULL,
  `CoolingType` varchar(50) NOT NULL,
  `CoolingPower` float NOT NULL,
  `ColdWaterProductionRate` float NOT NULL,
  `ColdWaterTankVolume` float NOT NULL,
  `DisplayPresent` tinyint(1) DEFAULT NULL,
  `FaucetType` varchar(50) DEFAULT NULL,
  `Dimensions` varchar(20) DEFAULT NULL,
  `Weight` float NOT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `WarrantyPeriod` int NOT NULL,
  `gabarit_Length` int NOT NULL,
  `gabarit_Width` int NOT NULL,
  `gabarit_Height` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `NastolPurifayer_uv`
--

CREATE TABLE `NastolPurifayer_uv` (
  `Id` int NOT NULL,
  `Model` varchar(100) NOT NULL,
  `TypeOfConstruction` varchar(50) NOT NULL,
  `HeatingType` varchar(50) NOT NULL,
  `HotWaterTankVolume` float NOT NULL,
  `HeatingPower` float NOT NULL,
  `HotWaterProductionRate` float NOT NULL,
  `CoolingType` varchar(50) NOT NULL,
  `CoolingPower` float NOT NULL,
  `ColdWaterProductionRate` float NOT NULL,
  `ColdWaterTankVolume` float NOT NULL,
  `DisplayPresent` tinyint(1) DEFAULT NULL,
  `FaucetType` varchar(50) DEFAULT NULL,
  `Dimensions` varchar(20) DEFAULT NULL,
  `Weight` float NOT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `WarrantyPeriod` int NOT NULL,
  `gabarit_Length` int NOT NULL,
  `gabarit_Width` int NOT NULL,
  `gabarit_Height` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `remember_tokens`
--

CREATE TABLE `remember_tokens` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `remember_tokens`
--

INSERT INTO `remember_tokens` (`id`, `user_id`, `token`, `created_at`) VALUES
(13, 13, '0531fdf17f024597aa9c5d91a15dccd7b1849c6cd8514164e5f62834674ce21e', '2024-12-07 17:52:15'),
(14, 13, '2e392e66212f17dcbb5e349f753f1b757426924d6e872c6c8021eedd4066c722', '2024-12-07 18:18:46'),
(15, 13, '3025d203532341f100a11b088ea7f43bfdafed21bdd370839db4a13b7f3997c6', '2024-12-07 18:18:54'),
(16, 13, 'fdeb3de621c7a46547c91bfac25562a9d37915a4cddb0f29bca115117cb77faf', '2024-12-07 18:19:02'),
(17, 13, 'be73fea36eb083bd41308da724bc86ed92abe8e9061cc4f44c30df69c799e4b7', '2024-12-07 18:22:52');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `password`, `mail`, `role`) VALUES
(30, '33', '33', '33@33', 'user'),
(57, 'admin1', 'admin1', 'admin@admin.admin', 'root');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dop_for_fountains`
--
ALTER TABLE `dop_for_fountains`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Fountains`
--
ALTER TABLE `Fountains`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Fountains_coling_gaz`
--
ALTER TABLE `Fountains_coling_gaz`
  ADD PRIMARY KEY (`id_tablici`);

--
-- Индексы таблицы `NapolyevPurifayer_uv`
--
ALTER TABLE `NapolyevPurifayer_uv`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `remember_tokens`
--
ALTER TABLE `remember_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dop_for_fountains`
--
ALTER TABLE `dop_for_fountains`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `Fountains`
--
ALTER TABLE `Fountains`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `Fountains_coling_gaz`
--
ALTER TABLE `Fountains_coling_gaz`
  MODIFY `id_tablici` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `NapolyevPurifayer_uv`
--
ALTER TABLE `NapolyevPurifayer_uv`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `remember_tokens`
--
ALTER TABLE `remember_tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
