-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2016 at 11:29 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_booking_other`
--

CREATE TABLE IF NOT EXISTS `restaurant_booking_other` (
  `booking_other_id` int(11) NOT NULL AUTO_INCREMENT,
  `other1` varchar(100) DEFAULT NULL,
  `other2` varchar(100) DEFAULT NULL,
  `other3` varchar(100) DEFAULT NULL,
  `other4` varchar(80) DEFAULT NULL,
  `other5` varchar(80) DEFAULT NULL,
  `other6` varchar(80) DEFAULT NULL,
  `other7` varchar(80) DEFAULT NULL,
  `other8` varchar(80) DEFAULT NULL,
  `other9` varchar(80) DEFAULT NULL,
  `other10` varchar(80) DEFAULT NULL,
  `other11` varchar(80) DEFAULT NULL,
  `other12` varchar(80) DEFAULT NULL,
  `booking_id` int(10) NOT NULL,
  PRIMARY KEY (`booking_other_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `restaurant_booking_other`
--

INSERT INTO `restaurant_booking_other` (`booking_other_id`, `other1`, `other2`, `other3`, `other4`, `other5`, `other6`, `other7`, `other8`, `other9`, `other10`, `other11`, `other12`, `booking_id`) VALUES
(27, 'Thala', 'Bashon', 'Glass - 100', '', '', '', '', '', '', '', '', '', 23);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
