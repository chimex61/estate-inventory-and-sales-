-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2012 at 01:23 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'adminpass');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY  (`cust_id`)
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

CREATE TABLE `goods` (
  `goods_id` int(11) NOT NULL auto_increment,
  `goods_name` varchar(50) NOT NULL,
  `goods_cat_id` int(11) NOT NULL,
  `goods_description` text NOT NULL,
  `goods_cost` varchar(50) NOT NULL,
  `goods_selling_price` varchar(50) NOT NULL,
  `dateTimeEntered` varchar(50) NOT NULL,
  `numberInStock` varchar(50) NOT NULL,
  `goodsPicture` varchar(50) NOT NULL,
  PRIMARY KEY  (`goods_id`),
  KEY `goods_cat_id` (`goods_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`goods_id`, `goods_name`, `goods_cat_id`, `goods_description`, `goods_cost`, `goods_selling_price`, `dateTimeEntered`, `numberInStock`, `goodsPicture`) VALUES
(4, 'Apple Ipod', 4, 'Very Good Music Player', '400', '450', '22-02-2012  3:18:57 PM', '12', 'b0f8c80fd89e474'),
(5, 'Digital Camera', 3, 'Very Good Product', '250', '450', '22-02-2012  10:21:35 PM', '24', 'b219235e0925ec1'),
(6, 'Ipad Touch', 3, 'Very Good Product', '400', '550', '22-02-2012  10:22:08 PM', '24', '64d84ed2361d633'),
(7, 'New Phone', 3, 'Very Good Product', '600', '750', '23-02-2012  10:53:37 AM', '12', 'a832ee07b22ec94'),
(8, 'Cam 2350', 4, 'Digital Camera', '5000', '5500', '01-03-2012  9:38:31 PM', '15', 'fc8003c3a4d7216'),
(9, 'Cam 5050', 4, 'Digital Camera', '6500', '7000', '01-03-2012  9:39:52 PM', '20', '7d8b3940f0f8e11'),
(10, 'Makintosh', 3, 'Laptop computer', '90000', '100000', '01-03-2012  9:42:27 PM', '45', '844601a4e0e190d'),
(11, 'HP New', 3, 'Screen touch', '800000', '900000', '01-03-2012  9:44:16 PM', '23', '40528e3e0e79246');

-- --------------------------------------------------------

--
-- Table structure for table `goodscategory`
--

CREATE TABLE `goodscategory` (
  `goods_cat_id` int(11) NOT NULL auto_increment,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`goods_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `goodscategory`
--

INSERT INTO `goodscategory` (`goods_cat_id`, `cat_name`) VALUES
(3, 'Computer Accessories'),
(4, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `points_id` int(11) NOT NULL auto_increment,
  `cust_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY  (`points_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`points_id`, `cust_id`, `points`) VALUES
(1, 1, 14),
(2, 2, 3),
(3, 19, 15),
(4, 20, 0),
(5, 26, 6),
(6, 27, 2),
(7, 29, 0),
(8, 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pointsvalue`
--

CREATE TABLE `pointsvalue` (
  `valueId` int(11) NOT NULL auto_increment,
  `pointStart` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `gift` varchar(50) NOT NULL,
  PRIMARY KEY  (`valueId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pointsvalue`
--

INSERT INTO `pointsvalue` (`valueId`, `pointStart`, `discount`, `gift`) VALUES
(1, 50, 10, '2000 Naira'),
(2, 60, 12, '2500 Naira'),
(3, 70, 15, '3000 Naira'),
(4, 80, 18, '3500 Naira / Nokia 1200'),
(5, 90, 20, '4000 Naira / Nokia 1300'),
(6, 100, 25, '5000 Naira / MP6'),
(7, 20, 10, '200');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL auto_increment,
  `cust_id` int(11) NOT NULL,
  `goodsId` int(11) NOT NULL,
  `dateTime` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `totalAmount` varchar(50) NOT NULL,
  PRIMARY KEY  (`sales_id`),
  KEY `goodsId` (`goodsId`),
  KEY `cust_id` (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cust_id`, `goodsId`, `dateTime`, `number`, `totalAmount`) VALUES
(4, 2, 4, '26-02-2012  12:24:57 PM', '3', '1350'),
(5, 19, 4, '28-02-2012  4:07:54 PM', '6', '2700'),
(6, 19, 6, '28-02-2012  4:07:54 PM', '9', '4950'),
(7, 26, 8, '01-03-2012  10:03:47 PM', '3', '16500'),
(8, 26, 11, '01-03-2012  10:03:47 PM', '1', '900000'),
(9, 26, 4, '01-03-2012  10:03:47 PM', '2', '900'),
(10, 27, 11, '02-03-2012  12:08:50 PM', '1', '900000'),
(11, 27, 5, '02-03-2012  12:08:50 PM', '1', '450'),
(12, 31, 5, '03-03-2012  12:01:45 PM', '1', '450'),
(13, 31, 4, '03-03-2012  12:01:45 PM', '1', '450');

-- --------------------------------------------------------

--
-- Table structure for table `temptable`
--

CREATE TABLE `temptable` (
  `tempId` int(11) NOT NULL auto_increment,
  `goodsId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `totalAmount` varchar(50) NOT NULL,
  PRIMARY KEY  (`tempId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `temptable`
--


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
