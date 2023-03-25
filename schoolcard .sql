-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-03-25 05:48:31
-- 服务器版本： 5.7.26
-- PHP 版本： 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `schoolcard`
--

-- --------------------------------------------------------

--
-- 表的结构 `bank_card`
--

DROP TABLE IF EXISTS `bank_card`;
CREATE TABLE IF NOT EXISTS `bank_card` (
  `s_id` int(11) NOT NULL,
  `credit_card_num` int(11) NOT NULL,
  `b_password` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_num` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `consume_time` datetime NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `shangjia` varchar(15) NOT NULL,
  `remaining_sum` int(11) NOT NULL,
  PRIMARY KEY (`bill_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `bill`
--

INSERT INTO `bill` (`bill_num`, `card_id`, `consume_time`, `product_name`, `price`, `shangjia`, `remaining_sum`) VALUES
(1000, 20021121, '2023-03-24 01:40:16', '小馄饨', 8, '曦园', 5),
(1001, 20021121, '2023-03-25 05:40:48', '羊肉汤', 15, '曦园', 5);

-- --------------------------------------------------------

--
-- 表的结构 `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `card_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `remaining_sum` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `chargerecord`
--

DROP TABLE IF EXISTS `chargerecord`;
CREATE TABLE IF NOT EXISTS `chargerecord` (
  `charge_num` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `charge_time` datetime NOT NULL,
  `credit_card_num` int(11) NOT NULL,
  `charge_amount` int(11) NOT NULL,
  `remain_sum` int(11) NOT NULL,
  PRIMARY KEY (`charge_num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `shangjia` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`product_id`, `product_name`, `price`, `shangjia`) VALUES
(1, '小馄饨', 8, '曦园'),
(2, '土豆炒鸡肉', 6, '曦园'),
(3, '回锅肉', 6, '曦园'),
(4, '羊肉汤', 15, '曦园'),
(5, '炒豆角', 5, '曦园');

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(15) NOT NULL,
  `sex` varchar(5) NOT NULL,
  `academy` varchar(20) NOT NULL,
  `grade` varchar(6) NOT NULL,
  `password` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `reset` varchar(10) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
