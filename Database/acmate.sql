-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-10-21 23:21:56
-- 服务器版本： 5.6.49-log
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `acmate`
--

-- --------------------------------------------------------

--
-- 表的结构 `acmate_danmaku_gift_type`
--

CREATE TABLE `acmate_danmaku_gift_type` (
  `id` int(11) NOT NULL,
  `add_date` int(11) NOT NULL,
  `gift_name` text NOT NULL,
  `gift_avatar_url` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `acmate_mate_type`
--

CREATE TABLE `acmate_mate_type` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `acmate_user_configuration`
--

CREATE TABLE `acmate_user_configuration` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `up_id` int(11) NOT NULL,
  `mate_type` int(11) NOT NULL,
  `add_date` int(11) NOT NULL,
  `last_date` int(11) NOT NULL,
  `token` text NOT NULL,
  `status` int(11) NOT NULL,
  `configuration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `acmate_user_data`
--

CREATE TABLE `acmate_user_data` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `up_id` int(11) NOT NULL,
  `add_date` int(11) NOT NULL,
  `last_login_date` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `acmate_danmaku_gift_type`
--
ALTER TABLE `acmate_danmaku_gift_type`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `acmate_mate_type`
--
ALTER TABLE `acmate_mate_type`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `acmate_user_configuration`
--
ALTER TABLE `acmate_user_configuration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 表的索引 `acmate_user_data`
--
ALTER TABLE `acmate_user_data`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `acmate_danmaku_gift_type`
--
ALTER TABLE `acmate_danmaku_gift_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `acmate_mate_type`
--
ALTER TABLE `acmate_mate_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `acmate_user_configuration`
--
ALTER TABLE `acmate_user_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `acmate_user_data`
--
ALTER TABLE `acmate_user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
