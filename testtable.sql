-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-07-02 09:51:30
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

-- --------------------------------------------------------

--
-- テーブルの構造 `testtable`
--

DROP TABLE IF EXISTS `table1`;
CREATE TABLE `table1` (
  `id` int(11) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `hwork` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `remonth` date(11) NOT NULL,
  `fixcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `table2`;
CREATE TABLE `table2` (
  `id` int(11) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `worktime` date(11) NOT NULL,
  `inget` int(11) NOT NULL,
  `vercost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- テーブルのデータのダンプ `testtable`
--

INSERT INTO `table1` (`id`, `pass`, `hwork`, `target`, `remonth`, `fixcost`) VALUES
(1, `GFAGA`, 850, 200000, 20201010, 15000);
INSERT INTO `table2` (`id`, `pass`, `worktime`, `inget`,`vercost`) VALUES
(1, `GFAGA`, 85, 50000, 5000);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `testtable`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `table2`
  ADD PRIMARY KEY (`id`);
--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `testtable`
--
ALTER TABLE `table1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
ALTER TABLE `table2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
