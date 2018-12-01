-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2018-11-22 06:34:56
-- 服务器版本： 10.1.36-MariaDB
-- PHP 版本： 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `phptest`
--

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE `login` (
  `user` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`user`, `password`, `flag`) VALUES
('test01', 'test01', 0);

-- --------------------------------------------------------

--
-- 表的结构 `lost_found`
--

CREATE TABLE `lost_found` (
  `Number` int(11) NOT NULL,
  `id` varchar(6) NOT NULL,
  `name_pickup` varchar(15) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `contactType` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `fromStuno` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lost_found`
--

INSERT INTO `lost_found` (`Number`, `id`, `name_pickup`, `Type`, `description`, `url`, `contactType`, `contact`, `fromStuno`, `timestamp`) VALUES
(1, '4', '姓名', '类型', '描述', 'http://phi28j82d.bkt.clouddn.com/lost-found/image/test/2699CC543C1C32C31A5EE283835BB554.jpg', '微信', '111', 0, 1542260275),
(2, 'jjDAWm', '1', '类型', '描述', 'http://phi28j82d.bkt.clouddn.com/lost-found/image/test/04ECE64FB4865C9A97854FF0F2D2B7A0.jpg', '微信', '12', 0, 1542297288),
(3, 'VDek4u', '1', '类型', '描述', 'http://phi28j82d.bkt.clouddn.com/lost-found/image/test/3007B29B92B9561463DDDDFE31224EF2.jpg', 'QQ', '134', 0, 1542816631);

-- --------------------------------------------------------

--
-- 表的结构 `lost_found_idcard`
--

CREATE TABLE `lost_found_idcard` (
  `Number` int(11) NOT NULL,
  `id` varchar(6) NOT NULL,
  `name_owner` varchar(10) NOT NULL,
  `stuno` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `name_pickup` varchar(10) NOT NULL,
  `contactType` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `fromStuno` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lost_found_idcard`
--

INSERT INTO `lost_found_idcard` (`Number`, `id`, `name_owner`, `stuno`, `description`, `url`, `name_pickup`, `contactType`, `contact`, `fromStuno`, `timestamp`) VALUES
(1, 'l3PeBY', '姓名', 17051804, '一卡通', 'http://phi28j82d.bkt.clouddn.com/lost-found/image/test/20171121223745.jpg', '姓名', '微信', '13243546', 0, 1542262082);

--
-- 转储表的索引
--

--
-- 表的索引 `lost_found`
--
ALTER TABLE `lost_found`
  ADD PRIMARY KEY (`Number`,`id`);

--
-- 表的索引 `lost_found_idcard`
--
ALTER TABLE `lost_found_idcard`
  ADD PRIMARY KEY (`Number`,`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `lost_found`
--
ALTER TABLE `lost_found`
  MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `lost_found_idcard`
--
ALTER TABLE `lost_found_idcard`
  MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
