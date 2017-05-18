-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2017 at 03:33 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `customer_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`) VALUES
(1, 'Admin', 'admin@admin.com', 'd01014d1a392f09b66c4e27d247d46b9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_slug` varchar(255) NOT NULL,
  `cat_status` int(11) NOT NULL,
  `cat_create_date` datetime NOT NULL,
  `cat_modify_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_slug`, `cat_status`, `cat_create_date`, `cat_modify_date`) VALUES
(7, 'Electronics', '', 1, '2016-12-27 13:42:24', NULL),
(9, 'Bank', '', 1, '2016-12-28 05:43:06', NULL),
(14, 'Travel', '', 1, '2017-05-04 16:19:40', NULL),
(17, 'finndd', '     ', 2, '2017-05-04 16:26:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_description` varchar(255) DEFAULT NULL,
  `company_sub_cat_id` varchar(255) NOT NULL,
  `company_country` varchar(255) NOT NULL,
  `company_address` text NOT NULL,
  `company_tollfree_no` varchar(255) NOT NULL,
  `company_email_id` varchar(255) NOT NULL,
  `company_working_hours` varchar(255) DEFAULT NULL,
  `company_status` int(11) NOT NULL,
  `company_create_date` datetime NOT NULL,
  `company_modify_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_description`, `company_sub_cat_id`, `company_country`, `company_address`, `company_tollfree_no`, `company_email_id`, `company_working_hours`, `company_status`, `company_create_date`, `company_modify_date`) VALUES
(49, 'ONIDA', NULL, '5,15', 'India', '', '39889000', 'risponse@onida.com', NULL, 1, '2017-05-03 05:19:48', NULL),
(50, 'Hitachi', NULL, '15', 'India', '', '1860 258 4848', 'Â customercare@hitachi-hli.com', NULL, 1, '2017-05-04 09:35:15', NULL),
(55, 'JetAirWay', NULL, '17', '', '', '', '', NULL, 1, '2017-05-04 16:24:39', NULL),
(56, 'gfgdf', NULL, '17', '', '', '', '', NULL, 2, '2017-05-04 16:40:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_type`
--

CREATE TABLE IF NOT EXISTS `contact_type` (
`contact_type_id` int(11) NOT NULL,
  `details_id` int(11) NOT NULL,
  `contact_key` varchar(255) NOT NULL,
  `contact_value` text NOT NULL,
  `contact_status` int(11) NOT NULL,
  `contact_status_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`contact_type_id`, `details_id`, `contact_key`, `contact_value`, `contact_status`, `contact_status_date`) VALUES
(17, 12, 'Toll free No.', ' 1-800-3009-9000', 1, '2017-05-03 05:23:17'),
(18, 12, 'Phone Number', ' 0161-3236835', 1, '2017-05-03 05:23:59'),
(19, 12, 'Email', 'risponse@onida.com', 1, '2017-05-03 05:24:37'),
(20, 12, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 05:25:03'),
(21, 16, 'Email', ' risponse@onida.com', 1, '2017-05-03 05:26:17'),
(22, 16, 'Working Time', ' 9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 05:26:36'),
(23, 14, 'Toll free No.', '  184-39889000', 1, '2017-05-03 05:28:04'),
(24, 14, 'Phone Number', '  0184-2220725 / 0184-2220825', 1, '2017-05-03 05:28:29'),
(25, 14, 'Email', 'risponse@onida.com', 1, '2017-05-03 05:30:00'),
(26, 14, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 05:30:13'),
(27, 15, 'Toll free No.', '  011-39889000', 1, '2017-05-03 05:33:29'),
(28, 15, 'Phone Number', '011-49503100 / 011-49503106 / 011-49503108', 1, '2017-05-03 05:33:58'),
(29, 15, 'Email', 'risponse@onida.com', 1, '2017-05-03 05:34:10'),
(30, 15, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 05:34:22'),
(31, 16, 'Phone Number', '9781405115', 1, '2017-05-03 05:43:17'),
(32, 17, 'Phone Number', '0141â€“3988900', 1, '2017-05-03 05:54:31'),
(33, 17, 'Email', 'risponse@onida.com', 1, '2017-05-03 05:54:47'),
(34, 17, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 05:55:04'),
(35, 18, 'Toll free No.', '0522-39889000	', 1, '2017-05-03 05:56:22'),
(36, 18, 'Phone Number', '0522-6556666', 1, '2017-05-03 05:56:29'),
(37, 18, 'Email', 'risponse@onida.com', 1, '2017-05-03 05:56:58'),
(38, 18, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 05:57:08'),
(39, 19, 'Toll free No.', '1800 30099000', 1, '2017-05-03 05:58:42'),
(40, 19, 'Email', 'risponse@onida.com', 1, '2017-05-03 05:58:53'),
(41, 19, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 05:59:06'),
(42, 20, 'Toll free No.', '0361-39889000	 ', 1, '2017-05-03 06:00:07'),
(43, 20, 'Phone Number', '0361 â€“ 2231684', 1, '2017-05-03 06:00:19'),
(44, 20, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:00:31'),
(45, 20, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:00:46'),
(46, 21, 'Toll free No.', '079 â€“ 39889000', 1, '2017-05-03 06:02:54'),
(47, 21, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:03:06'),
(48, 21, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:03:17'),
(49, 22, 'Toll free No.', '0265-39889000	', 1, '2017-05-03 06:05:00'),
(50, 22, 'Phone Number', '0265-2331378', 1, '2017-05-03 06:05:08'),
(51, 22, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:05:17'),
(52, 22, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:05:29'),
(53, 23, 'Toll free No.', '0731-39889000	', 1, '2017-05-03 06:06:26'),
(54, 23, 'Phone Number', '0731-4200702 / 0731-42007023', 1, '2017-05-03 06:06:57'),
(55, 23, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:07:07'),
(56, 23, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:07:16'),
(57, 25, 'Toll free No.', '0651-39889000	', 1, '2017-05-03 06:08:28'),
(58, 25, 'Phone Number', '0651-2547320', 1, '2017-05-03 06:08:39'),
(59, 25, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:08:59'),
(60, 25, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:09:12'),
(61, 26, 'Toll free No.', '033-39889000	', 1, '2017-05-03 06:10:42'),
(62, 26, 'Phone Number', '033-2455-2471 033-2455-0052 / 033-2455-3909 / 033-2476-2474 / 033-2454â€“2472', 1, '2017-05-03 06:11:10'),
(63, 26, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:11:21'),
(64, 26, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:11:33'),
(65, 27, 'Toll free No.', '0674-39889000	', 1, '2017-05-03 06:12:37'),
(66, 27, 'Phone Number', '0674-2587735', 1, '2017-05-03 06:12:46'),
(67, 27, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:13:01'),
(68, 27, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:13:10'),
(69, 28, 'Toll free No.', '0771-39889000	', 1, '2017-05-03 06:14:36'),
(70, 28, 'Phone Number', '0771-6546006', 1, '2017-05-03 06:14:49'),
(71, 28, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:15:01'),
(72, 28, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:15:12'),
(73, 29, 'Toll free No.', '07104-39889000	', 1, '2017-05-03 06:22:06'),
(74, 29, 'Phone Number', '07104-222417 / 07104-221692', 1, '2017-05-03 06:22:18'),
(75, 29, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:22:39'),
(76, 29, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:23:01'),
(77, 30, 'Toll free No.', '240-39889000	', 1, '2017-05-03 06:24:03'),
(78, 30, 'Phone Number', '240-2551458 / 240-2551459', 1, '2017-05-03 06:24:21'),
(79, 30, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:24:34'),
(80, 30, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:24:44'),
(81, 31, 'Toll free No.', '020-39889000	', 1, '2017-05-03 06:25:49'),
(82, 31, 'Phone Number', '020-28375561 /  020-28375562', 1, '2017-05-03 06:26:04'),
(83, 31, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:26:37'),
(84, 31, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:26:49'),
(85, 32, 'Toll free No.', '020-39889000', 1, '2017-05-03 06:27:47'),
(86, 32, 'Phone Number', '020-26136711 /  020-26051721', 1, '2017-05-03 06:27:59'),
(87, 32, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:28:23'),
(88, 32, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:28:41'),
(89, 33, 'Phone Number', ' +91-22-28200435  +91-22-66975777', 1, '2017-05-03 06:41:11'),
(90, 33, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:41:26'),
(91, 33, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:42:06'),
(92, 34, 'Toll free No.', '0866-39889000	', 1, '2017-05-03 06:42:53'),
(93, 34, 'Phone Number', '0866-2540581', 1, '2017-05-03 06:43:03'),
(94, 34, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:43:18'),
(95, 34, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:43:38'),
(96, 35, 'Toll free No.', '0824-39889000	', 1, '2017-05-03 06:50:34'),
(97, 35, 'Phone Number', '0824-2423934 / 0824-3253607', 1, '2017-05-03 06:50:47'),
(98, 35, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:51:03'),
(99, 35, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:51:18'),
(100, 36, 'Toll free No.', '0-80-39889000	', 1, '2017-05-03 06:52:03'),
(101, 36, 'Phone Number', '09341231008', 1, '2017-05-03 06:52:14'),
(102, 36, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:52:26'),
(103, 36, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:52:42'),
(104, 37, 'Toll free No.', '0422-39889000	', 1, '2017-05-03 06:57:18'),
(105, 37, 'Phone Number', '0422 â€“ 2512721', 1, '2017-05-03 06:57:29'),
(106, 37, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:57:40'),
(107, 37, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:57:51'),
(108, 38, 'Toll free No.', '0452-39889000	', 1, '2017-05-03 06:58:49'),
(109, 38, 'Phone Number', '0452 - 2531283', 1, '2017-05-03 06:58:59'),
(110, 38, 'Email', 'risponse@onida.com', 1, '2017-05-03 06:59:09'),
(111, 38, 'Working Time', '9:00 AM - 9:00 PM (Mon - Sun)', 1, '2017-05-03 06:59:19'),
(112, 40, 'Email', ' jetairway.tests@gmail.com', 1, '2017-05-04 17:04:54'),
(113, 40, 'Toll free No.', '1800-00-000', 1, '2017-05-04 17:17:02'),
(114, 41, 'Email', 'jetairway.delhi@gmail.com', 1, '2017-05-04 17:29:41'),
(115, 41, 'Toll free No.', '1800-00-2222', 1, '2017-05-04 17:30:03'),
(116, 42, 'Email', 'noida.refrigerator@gmail.com', 1, '2017-05-04 18:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
`details_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `top_most` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`details_id`, `company_name`, `product_name`, `sub_cat_name`, `location`, `top_most`, `status`, `create_date`, `modify_date`) VALUES
(12, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Ludhiana, Punjab', 1, 1, '2017-05-03 05:21:55', NULL),
(13, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Mohali', 0, 2, '2017-05-03 05:25:38', NULL),
(14, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Haryana', 0, 1, '2017-05-03 05:27:07', NULL),
(15, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'New Delhi', 0, 1, '2017-05-03 05:30:48', NULL),
(16, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Mohali', 1, 1, '2017-05-03 05:42:17', NULL),
(17, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Jaipur, Rajasthan', 0, 1, '2017-05-03 05:45:42', NULL),
(18, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Lucknow, Uttar Pradesh', 0, 1, '2017-05-03 05:55:46', NULL),
(19, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Patna, Bihar', 0, 1, '2017-05-03 05:58:19', NULL),
(20, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Guwahati', 0, 1, '2017-05-03 05:59:43', NULL),
(21, 'ONIDA', 'Air Conditioner', 'Life Insurance', 'Ahemdabad, Gujarat', 0, 1, '2017-05-03 06:02:36', NULL),
(22, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Gujarat', 0, 1, '2017-05-03 06:03:54', NULL),
(23, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Indore(M.P.)', 0, 1, '2017-05-03 06:05:59', NULL),
(25, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Ranchi', 0, 1, '2017-05-03 06:07:54', NULL),
(26, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Kolkata', 0, 1, '2017-05-03 06:09:58', NULL),
(27, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Bhubaneshwar', 0, 1, '2017-05-03 06:12:03', NULL),
(28, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Raipur', 0, 1, '2017-05-03 06:14:12', NULL),
(29, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Nagpur', 0, 1, '2017-05-03 06:21:43', NULL),
(30, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Aurangabad', 0, 1, '2017-05-03 06:23:39', NULL),
(31, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Mumbai', 0, 1, '2017-05-03 06:25:25', NULL),
(32, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Pune', 0, 1, '2017-05-03 06:27:17', NULL),
(33, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Hyderabad', 0, 1, '2017-05-03 06:40:52', NULL),
(34, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Vijayawada', 0, 1, '2017-05-03 06:42:32', NULL),
(35, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Mangalore', 0, 1, '2017-05-03 06:50:13', NULL),
(36, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Bangalore', 0, 1, '2017-05-03 06:51:40', NULL),
(37, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Coimbatore', 0, 1, '2017-05-03 06:56:50', NULL),
(38, 'ONIDA', 'Air Conditioner', 'Air Conditioner', 'Madurai', 0, 1, '2017-05-03 06:58:22', NULL),
(39, 'Hitachi', 'Air Conditioner', 'Air Conditioner', ' Hyderabad, Andhra Pradesh', 0, 1, '2017-05-04 09:40:40', NULL),
(40, 'JetAirWay', 'airlines', 'Airlines', '  Noida', 1, 1, '2017-05-04 16:59:38', NULL),
(41, 'JetAirWay', 'airlines', 'Airlines', '  Delhi', 0, 1, '2017-05-04 17:29:13', NULL),
(42, 'ONIDA', 'Refrigerator', 'Refrigerator', 'Delhi', 0, 1, '2017-05-04 18:39:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_create_date` datetime NOT NULL,
  `product_modify_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `company_id`, `product_name`, `product_status`, `product_create_date`, `product_modify_date`) VALUES
(12, 49, 'Air Conditioner', 1, '2017-05-03 05:20:46', NULL),
(13, 50, 'Air Conditioner', 1, '2017-05-04 09:37:37', NULL),
(16, 49, 'Refrigerator', 1, '2017-05-04 17:41:55', NULL),
(15, 55, 'airlines', 1, '2017-05-04 16:58:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
`sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `sub_cat_slug` varchar(255) NOT NULL,
  `sub_cat_status` int(11) NOT NULL,
  `sub_cat_create_date` datetime NOT NULL,
  `sub_cat_modify_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `sub_cat_slug`, `sub_cat_status`, `sub_cat_create_date`, `sub_cat_modify_date`) VALUES
(5, 7, 'Refrigerator', '', 1, '2016-12-29 11:18:00', NULL),
(7, 9, 'Credit Card', '', 1, '2016-12-29 11:18:44', NULL),
(14, 9, 'Debit Card', '', 1, '2017-01-06 10:32:03', NULL),
(15, 7, 'Air Conditioner', '', 1, '2017-05-03 05:18:53', NULL),
(17, 14, 'Airlines', '', 1, '2017-05-04 16:20:03', NULL),
(18, 17, 'sub tess final tests', '', 2, '2017-05-04 16:30:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `contact_type`
--
ALTER TABLE `contact_type`
 ADD PRIMARY KEY (`contact_type_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
 ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
 ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
MODIFY `contact_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
