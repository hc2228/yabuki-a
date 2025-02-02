-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-07-16 06:12:38
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- テーブルの構造 `table1`
--

DROP TABLE IF EXISTS `table1`;
CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `month` date NOT NULL,
  `varcost` int(11) NOT NULL,
  `hwork` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `table1`
--

INSERT INTO `table1` (`id`, `month`, `varcost`, `hwork`, `userid`) VALUES
(1, '2021-06-01', 200, 1000, 1),
(2, '2021-06-02', 0, 850, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `table2`
--

DROP TABLE IF EXISTS `table2`;
CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `password` varchar(10) NOT NULL,
  `target` int(11) NOT NULL,
  `remonth` date NOT NULL,
  `fixcost` int(11) NOT NULL,
  `worktime` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `table2`
--

INSERT INTO `table2` (`id`, `password`, `target`, `remonth`, `fixcost`, `worktime`, `userid`) VALUES
(1, 'aaa', 200000, '2021-10-01', 15000, 53, 1),
(2, 'bbb', 100000, '2021-12-01', 10000, 16, 2);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `table2`
--
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `table2`
--
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
