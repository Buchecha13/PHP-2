-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2021 г., 16:57
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `session_id`) VALUES
(309, 1, '9kl63nm7qn7a9frmv4mub673e5hoe2cv'),
(317, 1, '6vs1k85h4kikghs03kj8rg9pjku289dn'),
(318, 2, '6vs1k85h4kikghs03kj8rg9pjku289dn'),
(319, 3, '6vs1k85h4kikghs03kj8rg9pjku289dn'),
(322, 1, 'hm5ieo911er4c0r441b64u46q9opjsma'),
(323, 1, 'hm5ieo911er4c0r441b64u46q9opjsma'),
(324, 1, 'hm5ieo911er4c0r441b64u46q9opjsma'),
(325, 1, 'hm5ieo911er4c0r441b64u46q9opjsma'),
(326, 1, 'um4i1au8ii4bkr8ta37ih0eg6m7f2ea8'),
(328, 2, 'tdnpojbq07l7urksuakrfeb11digulmi'),
(329, 1, '15h82jbt3cqs9akaorcq4dv3tq9u97br'),
(330, 1, '59uau4nda5f1fekg9gm221jaekusn7c7'),
(331, 1, 'vmsbdf6s4g2ljqtgc4t1l56p3lp08oud'),
(332, 1, '5uvcajajldiplefb8u9h3ep63hnhua2s'),
(333, 1, 'lul3s0cafr900ul79s3rc5bebac1puer'),
(334, 1, 'ogjtdpktaafhh7714ml3jspc5ebda33r'),
(335, 2, 'ogjtdpktaafhh7714ml3jspc5ebda33r'),
(336, 3, 'ogjtdpktaafhh7714ml3jspc5ebda33r'),
(337, 3, 'ap427l5e3r5vdgrcv3lbcvejc972kuc6'),
(338, 2, 'ap427l5e3r5vdgrcv3lbcvejc972kuc6'),
(339, 1, '2b252nnk66tlmfg9o52vatsct0s4q2ks'),
(340, 2, '2b252nnk66tlmfg9o52vatsct0s4q2ks'),
(341, 1, '172f5ea6rdr59f4lhjjlk7o00ilpknq1'),
(342, 2, 'k17a15sjcidmn28bvgq03qpigjoubgvm'),
(343, 1, 'apcks9fakboi4agf1rt8t9gnbpaoc60f'),
(344, 2, 'apcks9fakboi4agf1rt8t9gnbpaoc60f'),
(345, 1, 'me9vd97jqv8vamgrag973a2quighc1n8'),
(346, 2, 'me9vd97jqv8vamgrag973a2quighc1n8'),
(347, 3, 'me9vd97jqv8vamgrag973a2quighc1n8'),
(348, 1, 'bakbdkv1nbq4ddq8g3s97vhpoomb5rsj'),
(349, 2, 'bakbdkv1nbq4ddq8g3s97vhpoomb5rsj'),
(350, 3, 'bakbdkv1nbq4ddq8g3s97vhpoomb5rsj'),
(351, 1, 'bv61ui4vu7s5ep907n1djn4ktnhapsff'),
(352, 2, 'gmu35gihbb35mc5kfvfuq916vqj0vcus'),
(353, 2, 'gmu35gihbb35mc5kfvfuq916vqj0vcus'),
(354, 2, 'uifn3ruf1560umn415nh68jgl977t3gc'),
(355, 2, 'uifn3ruf1560umn415nh68jgl977t3gc'),
(356, 2, 'uifn3ruf1560umn415nh68jgl977t3gc'),
(357, 1, '2ld9ugedar5bcmv17087hfnv0aqghhqe'),
(358, 1, 'ls720t8378i8ff2p7bfv648o5233r2co'),
(359, 2, 'q12qp06s3d4drqeriu2fhocu2ptmc8ge'),
(360, 3, 'q12qp06s3d4drqeriu2fhocu2ptmc8ge'),
(361, 2, 'bjvpk3tke777d2v8au5jv3hqtta2a6c0'),
(362, 2, 'bjvpk3tke777d2v8au5jv3hqtta2a6c0'),
(363, 1, 'ag546n3l7icd0c3v7a7s9r14bse9scp4'),
(364, 2, 'ag546n3l7icd0c3v7a7s9r14bse9scp4'),
(365, 3, 'ag546n3l7icd0c3v7a7s9r14bse9scp4'),
(366, 2, 'pp9aiaj3lkeb9d2vdd3lkq3dn4mt64cf'),
(369, 1, 'pvdi9d1jbbi2n3qt3uf853q9b64klvh6'),
(370, 2, 'rfe6pvs8uisld8llb2qg4rmcdbgiv0ar'),
(371, 2, 'chj5smjomdulmtt1qpsug4u4t8e6csjd'),
(374, 1, 'metvkgdte3v2ig2tobaj22sm5tsjt722'),
(375, 1, 'ajql1toeejvt54blhohl0apmm0nl48br'),
(376, 2, 'ajql1toeejvt54blhohl0apmm0nl48br'),
(377, 2, 'ajql1toeejvt54blhohl0apmm0nl48br'),
(384, 2, 'c6jphhbp6au62j8if00bgrusa25j6kod'),
(385, 2, 'c6jphhbp6au62j8if00bgrusa25j6kod'),
(386, 2, 'qsf1ro75560vfda6qftn4qbpdfjuhn0r'),
(387, 3, 'qsf1ro75560vfda6qftn4qbpdfjuhn0r'),
(388, 3, 'qsf1ro75560vfda6qftn4qbpdfjuhn0r'),
(391, 2, 'f2ikic937gt7jsnli8pnpo6us7ahk55n');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `clientName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `clientPhone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `clientName`, `clientPhone`, `session_id`, `status`) VALUES
(37, 'Валерий', '+7 (111) 111-11-11', 'metvkgdte3v2ig2tobaj22sm5tsjt722', 'processed'),
(38, 'Саша', '+79998848484', 'ajql1toeejvt54blhohl0apmm0nl48br', 'processed'),
(39, '123', '+7 (111) 111-11-11', 'n8dj8rqetdn9dmvmq6si57kf0fv9lg4u', 'new'),
(40, 'test', '123123', 'c6jphhbp6au62j8if00bgrusa25j6kod', 'new'),
(41, 'Валерий', '+7 (111) 111-11-11', 'qsf1ro75560vfda6qftn4qbpdfjuhn0r', 'new'),
(42, 'admin', '+7 (111) 1', 'f2ikic937gt7jsnli8pnpo6us7ahk55n', 'new');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `img`) VALUES
(1, 'chocolate', 49, 'Вкусный шоколад', 'chocolate.jpg'),
(2, 'Сахар', 99, 'Описание сахара', 'sahar.jpg'),
(3, 'Сок', 299, 'Описание сока', 'sok.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(21, 'admin', '$2y$10$rknLhKZ4ZKK97geJpiek4eAhwVe1jJKRDYOnBBi/ZRHIL1Yc/sCPG', '10486399646054e545816530.17286390');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
