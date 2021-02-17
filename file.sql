-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-02-17 04:36:57
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `file`
--

-- --------------------------------------------------------

--
-- 資料表結構 `students`
--

CREATE TABLE `students` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `birthday` date NOT NULL,
  `addr` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `birthday`, `addr`) VALUES
(1, '小明', 17, '1976-11-30', '基隆市\r\n'),
(2, '小華', 18, '1977-05-27', '台北市\r\n'),
(3, '小強', 19, '1978-03-18', '台南市\r\n'),
(4, '小愛', 20, '1979-02-15', '高雄市');

-- --------------------------------------------------------

--
-- 資料表結構 `upload`
--

CREATE TABLE `upload` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `upload`
--

INSERT INTO `upload` (`id`, `name`, `path`, `type`, `note`, `uploaded_time`) VALUES
(2, 'Ukwxh8.txt', './img/20201126023633.txt', '文件', '文字檔', '2020-11-26 06:36:33'),
(3, '02-01.jpg', './img/20201126023652.jpg', '圖檔', '圖', '2020-11-26 06:36:52'),
(5, '學員名單-訂便單用.docx', './img/20201126023952.docx', '文件', '文字檔', '2020-11-26 06:39:52'),
(6, '學員名單-訂便單用.docx', './img/20201126024044.docx', '文件', '文字檔', '2020-11-26 06:40:44');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
