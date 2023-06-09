-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2023-06-02 03:02:21
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
-- 表的结构 `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `psw` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `psw`) VALUES
(9999, 9999);

-- --------------------------------------------------------

--
-- 表的结构 `bank_card`
--

DROP TABLE IF EXISTS `bank_card`;
CREATE TABLE IF NOT EXISTS `bank_card` (
  `bankcard_id` int(11) NOT NULL,
  `bankcard_money` int(11) NOT NULL,
  `bankcard_type` varchar(11) CHARACTER SET utf8 NOT NULL,
  `bc_password` int(11) NOT NULL,
  PRIMARY KEY (`bankcard_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `bank_card`
--

INSERT INTO `bank_card` (`bankcard_id`, `bankcard_money`, `bankcard_type`, `bc_password`) VALUES
(111, 112, '中国工商银行', 1),
(2, 1000, '中国农业银行', 2);

-- --------------------------------------------------------

--
-- 表的结构 `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_num` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `consume_time` datetime NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `shangjia` varchar(15) NOT NULL,
  `remaining_sum` int(11) NOT NULL,
  PRIMARY KEY (`bill_num`)
) ENGINE=MyISAM AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `bill`
--

INSERT INTO `bill` (`bill_num`, `card_id`, `consume_time`, `product_name`, `price`, `shangjia`, `remaining_sum`) VALUES
(1000, 20021121, '2023-03-24 01:40:16', '小馄饨', 8, '曦园', 35),
(1001, 20021121, '2023-03-25 05:40:48', '羊肉汤', 15, '曦园', 20),
(1002, 0, '2023-06-01 12:16:56', '小馄饨', 8, '曦园', 875),
(1003, 1, '2023-06-02 02:57:06', '羊肉汤', 15, '曦园', 873);

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
-- 表的结构 `card_bind`
--

DROP TABLE IF EXISTS `card_bind`;
CREATE TABLE IF NOT EXISTS `card_bind` (
  `s_id` int(11) NOT NULL,
  `bankcard_id` int(11) NOT NULL,
  `bankcard_type` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `bankcard_money` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `card_bind`
--

INSERT INTO `card_bind` (`s_id`, `bankcard_id`, `bankcard_type`, `bankcard_money`) VALUES
(1, 111, 'ä¸­å›½å·¥å•†é“¶è¡Œ', 112);

-- --------------------------------------------------------

--
-- 表的结构 `chargerecord`
--

DROP TABLE IF EXISTS `chargerecord`;
CREATE TABLE IF NOT EXISTS `chargerecord` (
  `charge_num` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `charge_time` datetime NOT NULL,
  `credit_card_num` int(11) NOT NULL,
  `charge_amount` int(11) NOT NULL,
  `remain_sum` int(11) NOT NULL,
  PRIMARY KEY (`charge_num`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `chargerecord`
--

INSERT INTO `chargerecord` (`charge_num`, `card_id`, `charge_time`, `credit_card_num`, `charge_amount`, `remain_sum`) VALUES
(1, 0, '2023-05-30 23:21:59', 111, 1, 9),
(2, 0, '2023-05-30 23:30:29', 111, 1, 10),
(3, 0, '2023-06-01 20:13:08', 111, 888, 890),
(4, 0, '2023-06-01 20:13:32', 111, 1, 891),
(5, 1, '2023-06-02 10:56:31', 111, 888, 888);

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
(5, '炒豆角', 5, '曦园'),
(6, '黑胡椒烤肠', 3, '超市'),
(7, '冰激凌', 5, '超市');

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `academy` varchar(20) NOT NULL,
  `grade` varchar(6) NOT NULL,
  `password` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `c_psw` int(11) NOT NULL,
  `reset` varchar(10) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
