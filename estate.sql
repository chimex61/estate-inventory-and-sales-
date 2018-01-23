-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2014 at 09:06 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estate`
--
CREATE DATABASE IF NOT EXISTS `estate` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estate`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `address`, `title`, `username`, `password`, `phone`, `sex`, `email`) VALUES
(2, 'Maiyama Kabir', 'Kasaraea Area, Sokoto', 'Mr', 'maiyama', 'maiyama', '8036509472', 'Male', 'email@add.com'),
(4, 'Ibrahim Umar', 'Arkilla low cost, sokoto.', 'Mr', 'malam', 'malam', '8066677723', 'Male', 'ibrahimumar18@gmail.com'),
(5, 'Salisu Modi', 'Shagari Local government Sokoto.', 'Mr', 'modi', 'modii', '7032834653', 'Male', 'modee24@yahoo.com'),
(8, 'Mahmoda Ibrahim', 'Arkilla low cost, Sokoto', 'Prof', 'professor', 'mahmod', '8076543219', 'Male', 'professor@rocketmail.com'),
(18, 'jhhghghj', 'gffgfff', 'Mr', 'asj', 'aaa', '8098765432', 'Male', 'hdhfj@yahoo.com'),
(19, 'SAKINA UBALE ', 'MANURI ROAD, SOKOTO', 'Mr', 'sakina', 'ubale', '8033657867', 'Male', 'sakinauba@yahoo.com'),
(20, 'fada', 'dasa', 'Mr', 'das', 'das', '9876543321', 'Male', 'saiduubaletukur@yahoo.com'),
(21, '4575734895', 'fgdjryet7', 'Mrs', 'gfg', 'gfg', '12345677787', 'Female', 'saiduubaletu@yahoo.com'),
(22, 'Zahadeen Ibrahim', 'House No: 34b Mabera Area, Sokoto  ', 'Mr', 'Dan vice', 'vice', '8038795764', 'Male', 'zahara@yahoo.com'),
(23, 'Babangida T Balarabe', 'Hungumawa Area, Sokoto. ', 'Mr', 'babangida', 'balarabe24', '8033445675', 'Male', 'babangida@gmail.com'),
(24, 'Shafa''atu T Balarabe', 'Lokoja Road, Sokoto.', 'Mrs', 'shafa', 'shafa', '8097654321', 'Female', 'shafa@yahoo.com'),
(25, 'Haruna Tukur Balarabe', 'Manuri Road, Sokoto.', 'Engr', 'joshowa', 'haruna', '7034345454', 'Male', 'joshowa@rocketmail.com'),
(26, 'Sakina Saidu Tukur', 'House NO: 005A New City, Kebbi State.', 'Miss', 'Couplation', 'husband', '8133366689', 'Female', 'couple@propose.com'),
(27, 'Jamila Balarabe', 'Mabera Area, Sokoto.', 'Dr', 'jamila', 'fatima', '8023234556', 'Female', 'jamila@gmail.com'),
(28, 'Anas Tukur Balarabe', 'Manuri Road, Sokoto.', 'Mr', 'salafiya', 'salafiya', '7055443232', 'Male', 'anastb@yahoo.com'),
(29, 'Sulaiman Dan Ashibi', 'Ambursa, Kebbi State', 'Mr', 'DanAshibi', 'ambursa', '8036200079', 'Male', 'sulaiman@yahoo.com'),
(30, 'Maiyama', 'Kebbi State', 'Mr', 'kmaiyama', 'maiyama1', '0803546743s', 'Male', 'maiyama@gmail.com'),
(31, 'Maiyama', 'Kebbi State', 'Mr', 'kkmaiyama', 'maiyama', '0803546743s', 'Male', 'maiyama@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(50) NOT NULL,
  `goods_cat_id` int(11) NOT NULL,
  `goods_description` text NOT NULL,
  `goods_cost` varchar(50) NOT NULL,
  `goods_selling_price` varchar(50) NOT NULL,
  `dateTimeEntered` varchar(50) NOT NULL,
  `numberInStock` varchar(50) NOT NULL,
  `goodsPicture` varchar(50) NOT NULL,
  PRIMARY KEY (`goods_id`),
  KEY `goods_cat_id` (`goods_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`goods_id`, `goods_name`, `goods_cat_id`, `goods_description`, `goods_cost`, `goods_selling_price`, `dateTimeEntered`, `numberInStock`, `goodsPicture`) VALUES
(4, 'italian style condominium', 4, 'Very well finished concrete design ', '23000000', '30000000', '13-12-2014  6:52:28 PM', '12', 'ac30f51d9db06b1'),
(5, 'storeys', 3, 'carefully crafted building', '15000000', '20000000', '13-12-2014  6:52:59 PM', '24', 'a67c0b5e70e2781'),
(6, 'arabian style condominium', 3, 'next generation architect', '25000000', '600000000', '13-12-2014  6:54:53 PM', '24', '033c6ed896f7eca'),
(7, 'New design', 3, 'Very eye catching design', '600000', '75000000', '13-12-2014  6:55:38 PM', '12', '4c2664e73519d86'),
(8, 'brazilian design', 4, 'The All Rounder', '50000000', '550000000', '13-12-2014  6:56:04 PM', '15', '05f06d2a1c9f72e'),
(9, 'Camaplux', 4, 'the omega', '6500000', '700000000', '13-12-2014  6:56:21 PM', '20', '9db9b23643816b0'),
(10, 'Malmilian', 3, 'story estate', '90000000', '10000000', '13-12-2014  6:56:43 PM', '45', '292a6626ab5647f'),
(11, 'Hamshire volb', 3, 'the begining', '80000000', '90000000', '13-12-2014  6:57:09 PM', '23', 'dbb7f31766d595d'),
(12, 'bongalow', 5, 'carefull designed', '10900000', '150000000', '13-12-2014  7:00:05 PM', '19', 'a43c281b863b316');

-- --------------------------------------------------------

--
-- Table structure for table `goodscategory`
--

CREATE TABLE IF NOT EXISTS `goodscategory` (
  `goods_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`goods_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `goodscategory`
--

INSERT INTO `goodscategory` (`goods_cat_id`, `cat_name`) VALUES
(3, 'estate'),
(4, 'condominium'),
(5, 'Duplex');

-- --------------------------------------------------------

--
-- Table structure for table `php_users_login`
--

CREATE TABLE IF NOT EXISTS `php_users_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `content` text,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `php_users_login`
--

INSERT INTO `php_users_login` (`id`, `email`, `password`, `name`, `phone`, `content`, `last_login`) VALUES
(1, 'chime61@gmail.com', 'pass', 'francis john', '+0123456789', 'text content for Demo1 user.', NULL),
(2, 'demo2@demo.com', 'pass', 'Demo', '+2348176543210', 'another text content for Demo2 user', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `points_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`points_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`points_id`, `cust_id`, `points`) VALUES
(1, 1, 14),
(2, 2, 3),
(3, 19, 15),
(9, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pointsvalue`
--

CREATE TABLE IF NOT EXISTS `pointsvalue` (
  `valueId` int(11) NOT NULL AUTO_INCREMENT,
  `pointStart` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `gift` varchar(50) NOT NULL,
  PRIMARY KEY (`valueId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pointsvalue`
--

INSERT INTO `pointsvalue` (`valueId`, `pointStart`, `discount`, `gift`) VALUES
(1, 50, 10, 'N20000'),
(2, 60, 12, 'N25000'),
(3, 70, 15, 'N30000'),
(4, 80, 18, 'N35000'),
(5, 90, 20, 'N40000'),
(6, 100, 25, 'N50000'),
(7, 20, 10, 'N20000');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `goodsId` int(11) NOT NULL,
  `dateTime` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `totalAmount` varchar(50) NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `goodsId` (`goodsId`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cust_id`, `goodsId`, `dateTime`, `number`, `totalAmount`) VALUES
(4, 2, 4, '26-12-2014  12:24:57 PM', '3', '135000000'),
(5, 19, 4, '28-11-2014  4:07:54 PM', '6', '97000000'),
(13, 31, 4, '03-12-2014  12:01:45 PM', '1', '92170000'),
(14, 20, 4, '13-12-2014  7:02:56 PM', '1', '30000000'),
(15, 20, 5, '13-12-2014  7:02:56 PM', '1', '20000000'),
(16, 20, 8, '13-12-2014  7:02:56 PM', '1', '550000000'),
(17, 20, 11, '13-12-2014  7:02:56 PM', '1', '90000000'),
(18, 20, 12, '13-12-2014  7:02:56 PM', '1', '150000000');

-- --------------------------------------------------------

--
-- Table structure for table `temptable`
--

CREATE TABLE IF NOT EXISTS `temptable` (
  `tempId` int(11) NOT NULL AUTO_INCREMENT,
  `goodsId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `totalAmount` varchar(50) NOT NULL,
  PRIMARY KEY (`tempId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`goods_cat_id`) REFERENCES `goodscategory` (`goods_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`goodsId`) REFERENCES `goods` (`goods_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
