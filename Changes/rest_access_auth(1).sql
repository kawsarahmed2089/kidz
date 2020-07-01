-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2016 at 11:28 AM
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
-- Table structure for table `rest_access_auth`
--

CREATE TABLE IF NOT EXISTS `rest_access_auth` (
  `access_auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) NOT NULL,
  `module_name` varchar(20) NOT NULL,
  `value` int(1) NOT NULL,
  `auth_doc` date NOT NULL,
  `auth_creator` int(5) NOT NULL,
  PRIMARY KEY (`access_auth_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `rest_access_auth`
--

INSERT INTO `rest_access_auth` (`access_auth_id`, `user_type`, `module_name`, `value`, `auth_doc`, `auth_creator`) VALUES
(1, 'superadmin', 'pos_terminal', 1, '2016-02-06', 12),
(2, 'superadmin', 'invoice_info', 1, '2016-02-06', 12),
(3, 'superadmin', 'report_infos', 1, '2016-02-06', 12),
(4, 'superadmin', 'credit_transactions', 1, '2016-02-06', 12),
(5, 'superadmin', 'product_catagories', 1, '2016-02-06', 12),
(6, 'superadmin', 'product_info', 1, '2016-02-06', 12),
(7, 'superadmin', 'package_products', 1, '2016-02-06', 12),
(8, 'superadmin', 'table_layout', 1, '2016-02-06', 12),
(9, 'superadmin', 'preparation_options', 1, '2016-02-06', 12),
(10, 'superadmin', 'expense_entry', 1, '2016-02-06', 12),
(11, 'superadmin', 'stock_system', 1, '2016-02-06', 12),
(12, 'superadmin', 'cashbox_system', 1, '2016-02-06', 12),
(13, 'superadmin', 'salary_log', 1, '2016-02-06', 12),
(14, 'superadmin', 'booking_info', 1, '2016-02-06', 12),
(15, 'superadmin', 'entertain_info', 1, '2016-02-06', 12),
(16, 'superadmin', 'order_cancl_raeson', 1, '2016-02-06', 12),
(17, 'superadmin', 'stuff_setup', 1, '2016-02-06', 12),
(33, 'admin', 'pos_terminal', 0, '2016-02-06', 12),
(34, 'admin', 'invoice_info', 0, '2016-02-06', 12),
(35, 'admin', 'report_infos', 0, '2016-02-06', 12),
(36, 'admin', 'credit_transactions', 0, '2016-02-06', 12),
(37, 'admin', 'product_catagories', 0, '2016-02-06', 12),
(38, 'admin', 'product_info', 0, '2016-02-06', 12),
(39, 'admin', 'package_products', 0, '2016-02-06', 12),
(40, 'admin', 'table_layout', 0, '2016-02-06', 12),
(41, 'admin', 'preparation_options', 0, '2016-02-06', 12),
(42, 'admin', 'expense_entry', 0, '2016-02-06', 12),
(43, 'admin', 'stock_system', 0, '2016-02-06', 12),
(44, 'admin', 'cashbox_system', 0, '2016-02-06', 12),
(45, 'admin', 'salary_log', 0, '2016-02-06', 12),
(46, 'admin', 'booking_info', 0, '2016-02-06', 12),
(47, 'admin', 'entertain_info', 0, '2016-02-06', 12),
(48, 'admin', 'order_cancl_raeson', 0, '2016-02-06', 12),
(49, 'admin', 'stuff_setup', 0, '2016-02-06', 12),
(50, 'manager', 'pos_terminal', 0, '2016-02-06', 12),
(51, 'manager', 'invoice_info', 0, '2016-02-06', 12),
(52, 'manager', 'report_infos', 0, '2016-02-06', 12),
(53, 'manager', 'credit_transactions', 0, '2016-02-06', 12),
(54, 'manager', 'product_catagories', 0, '2016-02-06', 12),
(55, 'manager', 'product_info', 0, '2016-02-06', 12),
(56, 'manager', 'package_products', 0, '2016-02-06', 12),
(57, 'manager', 'table_layout', 0, '2016-02-06', 12),
(58, 'manager', 'preparation_options', 0, '2016-02-06', 12),
(59, 'manager', 'expense_entry', 0, '2016-02-06', 12),
(60, 'manager', 'stock_system', 0, '2016-02-06', 12),
(61, 'manager', 'cashbox_system', 0, '2016-02-06', 12),
(62, 'manager', 'salary_log', 0, '2016-02-06', 12),
(63, 'manager', 'booking_info', 0, '2016-02-06', 12),
(64, 'manager', 'entertain_info', 0, '2016-02-06', 12),
(65, 'manager', 'order_cancl_raeson', 0, '2016-02-06', 12),
(66, 'manager', 'stuff_setup', 0, '2016-02-06', 12),
(67, 'accountant', 'pos_terminal', 0, '2016-02-06', 12),
(68, 'accountant', 'invoice_info', 0, '2016-02-06', 12),
(69, 'accountant', 'report_infos', 0, '2016-02-06', 12),
(70, 'accountant', 'credit_transactions', 0, '2016-02-06', 12),
(71, 'accountant', 'product_catagories', 0, '2016-02-06', 12),
(72, 'accountant', 'product_info', 0, '2016-02-06', 12),
(73, 'accountant', 'package_products', 0, '2016-02-06', 12),
(74, 'accountant', 'table_layout', 0, '2016-02-06', 12),
(75, 'accountant', 'preparation_options', 0, '2016-02-06', 12),
(76, 'accountant', 'expense_entry', 0, '2016-02-06', 12),
(77, 'accountant', 'stock_system', 0, '2016-02-06', 12),
(78, 'accountant', 'cashbox_system', 0, '2016-02-06', 12),
(79, 'accountant', 'salary_log', 0, '2016-02-06', 12),
(80, 'accountant', 'booking_info', 0, '2016-02-06', 12),
(81, 'accountant', 'entertain_info', 0, '2016-02-06', 12),
(82, 'accountant', 'order_cancl_raeson', 0, '2016-02-06', 12),
(83, 'accountant', 'stuff_setup', 0, '2016-02-06', 12),
(84, 'stockist', 'pos_terminal', 0, '2016-02-06', 12),
(85, 'stockist', 'invoice_info', 0, '2016-02-06', 12),
(86, 'stockist', 'report_infos', 0, '2016-02-06', 12),
(87, 'stockist', 'credit_transactions', 0, '2016-02-06', 12),
(88, 'stockist', 'product_catagories', 0, '2016-02-06', 12),
(89, 'stockist', 'product_info', 0, '2016-02-06', 12),
(90, 'stockist', 'package_products', 0, '2016-02-06', 12),
(91, 'stockist', 'table_layout', 0, '2016-02-06', 12),
(92, 'stockist', 'preparation_options', 0, '2016-02-06', 12),
(93, 'stockist', 'expense_entry', 0, '2016-02-06', 12),
(94, 'stockist', 'stock_system', 0, '2016-02-06', 12),
(95, 'stockist', 'cashbox_system', 0, '2016-02-06', 12),
(96, 'stockist', 'salary_log', 0, '2016-02-06', 12),
(97, 'stockist', 'booking_info', 0, '2016-02-06', 12),
(98, 'stockist', 'entertain_info', 0, '2016-02-06', 12),
(99, 'stockist', 'order_cancl_raeson', 0, '2016-02-06', 12),
(100, 'stockist', 'stuff_setup', 0, '2016-02-06', 12),
(101, 'seller', 'pos_terminal', 0, '2016-02-06', 12),
(102, 'seller', 'invoice_info', 0, '2016-02-06', 12),
(103, 'seller', 'report_infos', 0, '2016-02-06', 12),
(104, 'seller', 'credit_transactions', 0, '2016-02-06', 12),
(105, 'seller', 'product_catagories', 0, '2016-02-06', 12),
(106, 'seller', 'product_info', 0, '2016-02-06', 12),
(107, 'seller', 'package_products', 0, '2016-02-06', 12),
(108, 'seller', 'table_layout', 0, '2016-02-06', 12),
(109, 'seller', 'preparation_options', 0, '2016-02-06', 12),
(110, 'seller', 'expense_entry', 0, '2016-02-06', 12),
(111, 'seller', 'stock_system', 0, '2016-02-06', 12),
(112, 'seller', 'cashbox_system', 0, '2016-02-06', 12),
(113, 'seller', 'salary_log', 0, '2016-02-06', 12),
(114, 'seller', 'booking_info', 0, '2016-02-06', 12),
(115, 'seller', 'entertain_info', 0, '2016-02-06', 12),
(116, 'seller', 'order_cancl_raeson', 0, '2016-02-06', 12),
(117, 'seller', 'stuff_setup', 0, '2016-02-06', 12),
(118, 'waiter', 'pos_terminal', 0, '2016-02-06', 12),
(119, 'waiter', 'invoice_info', 0, '2016-02-06', 12),
(120, 'waiter', 'report_infos', 0, '2016-02-06', 12),
(121, 'waiter', 'credit_transactions', 0, '2016-02-06', 12),
(122, 'waiter', 'product_catagories', 0, '2016-02-06', 12),
(123, 'waiter', 'product_info', 0, '2016-02-06', 12),
(124, 'waiter', 'package_products', 0, '2016-02-06', 12),
(125, 'waiter', 'table_layout', 0, '2016-02-06', 12),
(126, 'waiter', 'preparation_options', 0, '2016-02-06', 12),
(127, 'waiter', 'expense_entry', 0, '2016-02-06', 12),
(128, 'waiter', 'stock_system', 0, '2016-02-06', 12),
(129, 'waiter', 'cashbox_system', 0, '2016-02-06', 12),
(130, 'waiter', 'salary_log', 0, '2016-02-06', 12),
(131, 'waiter', 'booking_info', 0, '2016-02-06', 12),
(132, 'waiter', 'entertain_info', 0, '2016-02-06', 12),
(133, 'waiter', 'order_cancl_raeson', 0, '2016-02-06', 12),
(134, 'waiter', 'stuff_setup', 0, '2016-02-06', 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
