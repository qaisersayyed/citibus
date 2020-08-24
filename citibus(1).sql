-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2020 at 12:00 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citibus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `license_plate` varchar(15) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `pattern` varchar(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `license_plate`, `no_of_seats`, `pattern`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GA03G1876', 60, '235', 1, '2019-08-27 05:45:26', '2019-08-27 05:45:26', NULL),
(2, 'GA08D4654', 70, '236', 1, '2019-08-27 05:46:00', '2019-08-27 05:46:00', NULL),
(3, 'GA09FD6334', 60, '237', 1, '2019-08-27 05:46:30', '2019-08-27 05:46:30', NULL),
(4, 'GA03G1345', 50, '225', 1, '2019-09-02 07:48:03', '2019-09-02 07:48:03', NULL),
(5, 'GA08G1372', 70, '237', 1, '2019-09-02 07:51:22', '2019-09-02 07:51:22', NULL),
(6, 'GA03G1111', 50, '326', 1, '2019-09-02 09:49:12', '2019-09-02 09:49:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_employee`
--

CREATE TABLE `bus_employee` (
  `bus_employee_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_employee`
--

INSERT INTO `bus_employee` (`bus_employee_id`, `bus_id`, `employee_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, '2020-02-16 16:36:13', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_route`
--

CREATE TABLE `bus_route` (
  `bus_route_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `timing` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_route`
--

INSERT INTO `bus_route` (`bus_route_id`, `bus_id`, `route_id`, `timing`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 6, 1, '10:00:00', '2019-09-02 10:18:40', '2019-09-02 10:18:40', NULL),
(7, 1, 1, '13:00:00', '2019-09-18 14:37:34', '2019-10-12 15:19:58', NULL),
(8, 2, 4, '18:00:00', '2019-09-18 14:40:27', '2019-09-18 14:40:27', NULL),
(9, 5, 4, '15:00:00', '2019-09-18 14:40:42', '2019-09-18 14:40:42', NULL),
(10, 3, 5, '08:00:00', '2019-10-07 05:20:29', '2019-10-07 05:20:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_seats`
--

CREATE TABLE `bus_seats` (
  `bus_seat_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `seat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_type`
--

CREATE TABLE `bus_type` (
  `bus_type_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_type`
--

INSERT INTO `bus_type` (`bus_type_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'L', '2019-09-09 14:54:53', '2019-09-09 14:54:53', NULL),
(2, 'S', '2019-09-09 14:55:00', '2019-09-09 14:55:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `e_wallet` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `name`, `phone_no`, `email_id`, `password`, `e_wallet`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 11, 'test', 467648732, 'test@gmail.com', '$2y$13$SEiutXwiNF3WX', NULL, '2019-10-04 15:31:12', '0000-00-00 00:00:00', NULL),
(3, 12, 'manisha', 98989, 'manisha@gmail.com', '$2y$13$83LWKc4IerSU4', NULL, '2019-11-05 16:37:49', '0000-00-00 00:00:00', NULL),
(4, 21, 'qaiser', 1234343452, 'qaiser@gmail.com', '$2y$13$wuF2fnVCthY040JWzN652.XwEZ4D4kPGXFMnIdshIq2UDFUnXFDZ6', 0, '2020-01-30 13:58:12', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `license_no` varchar(15) NOT NULL,
  `aadhar_card_no` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `user_id`, `name`, `role`, `phone_no`, `license_no`, `aadhar_card_no`, `address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 22, 'john', 'driver', 878787878, '78686787887', 755676556, 'margao', '2020-02-08 16:21:19', '2020-08-16 08:16:47', NULL),
(6, 25, 'emp', 'driver', 456787654, '345678765', 345678654, 'test', '2020-02-27 09:16:53', '0000-00-00 00:00:00', NULL),
(7, 26, 'emp', 'driver', 456787654, '345678765', 345678654, 'test', '2020-08-16 09:44:31', '0000-00-00 00:00:00', NULL),
(8, 27, 'emp', 'driver', 456787654, '345678765', 345678654, 'test', '2020-08-16 09:44:32', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `lat` text NOT NULL,
  `lon` text NOT NULL,
  `bus_employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `lat`, `lon`, `bus_employee_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(110, '15.2652061', '73.954902', 1, '2020-03-17 15:12:54', '0000-00-00 00:00:00', NULL),
(111, '15.2598109', '73.9490241', 1, '2020-08-16 07:47:42', '0000-00-00 00:00:00', NULL),
(112, '15.2598109', '73.9490241', 1, '2020-08-16 07:47:58', '0000-00-00 00:00:00', NULL),
(113, '15.2598109', '73.9490241', 1, '2020-08-16 07:48:13', '0000-00-00 00:00:00', NULL),
(114, '15.2598109', '73.9490241', 1, '2020-08-16 07:48:28', '0000-00-00 00:00:00', NULL),
(115, '15.2598109', '73.9490241', 1, '2020-08-16 07:48:43', '0000-00-00 00:00:00', NULL),
(116, '15.2598109', '73.9490241', 1, '2020-08-16 07:48:57', '0000-00-00 00:00:00', NULL),
(117, '15.2598109', '73.9490241', 1, '2020-08-16 07:49:13', '0000-00-00 00:00:00', NULL),
(118, '15.2598109', '73.9490241', 1, '2020-08-16 07:49:27', '0000-00-00 00:00:00', NULL),
(119, '15.266464', '73.9526978', 1, '2020-08-16 08:58:36', '0000-00-00 00:00:00', NULL),
(120, '15.266464', '73.9526978', 1, '2020-08-16 08:58:51', '0000-00-00 00:00:00', NULL),
(121, '15.266464', '73.9526978', 1, '2020-08-16 08:59:06', '0000-00-00 00:00:00', NULL),
(122, '15.266464', '73.9526978', 1, '2020-08-16 08:59:21', '0000-00-00 00:00:00', NULL),
(123, '15.266464', '73.9526978', 1, '2020-08-16 08:59:39', '0000-00-00 00:00:00', NULL),
(124, '15.266464', '73.9526978', 1, '2020-08-16 08:59:51', '0000-00-00 00:00:00', NULL),
(125, '15.266464', '73.9526978', 1, '2020-08-16 09:00:09', '0000-00-00 00:00:00', NULL),
(126, '15.266464', '73.9526978', 1, '2020-08-16 09:00:21', '0000-00-00 00:00:00', NULL),
(127, '15.266464', '73.9526978', 1, '2020-08-16 09:00:36', '0000-00-00 00:00:00', NULL),
(128, '15.266464', '73.9526978', 1, '2020-08-16 09:00:53', '0000-00-00 00:00:00', NULL),
(129, '15.2656848', '73.9534769', 1, '2020-08-16 09:22:34', '0000-00-00 00:00:00', NULL),
(130, '15.2656848', '73.9534769', 1, '2020-08-16 09:22:34', '0000-00-00 00:00:00', NULL),
(131, '15.2656848', '73.9534769', 1, '2020-08-16 09:22:35', '0000-00-00 00:00:00', NULL),
(132, '15.2656848', '73.9534769', 1, '2020-08-16 09:22:35', '0000-00-00 00:00:00', NULL),
(133, '15.2656848', '73.9534769', 1, '2020-08-16 09:22:35', '0000-00-00 00:00:00', NULL),
(134, '15.2656848', '73.9534769', 1, '2020-08-16 09:22:48', '0000-00-00 00:00:00', NULL),
(135, '15.2691943', '73.9512284', 1, '2020-08-16 09:38:46', '0000-00-00 00:00:00', NULL),
(136, '15.2691943', '73.9512284', 1, '2020-08-16 09:38:58', '0000-00-00 00:00:00', NULL),
(137, '15.2691943', '73.9512284', 1, '2020-08-16 09:39:13', '0000-00-00 00:00:00', NULL),
(138, '15.2691943', '73.9512284', 1, '2020-08-16 09:39:28', '0000-00-00 00:00:00', NULL),
(139, '15.2691943', '73.9512284', 1, '2020-08-16 09:39:43', '0000-00-00 00:00:00', NULL),
(140, '15.2691943', '73.9512284', 1, '2020-08-16 09:39:58', '0000-00-00 00:00:00', NULL),
(141, '15.2691943', '73.9512284', 1, '2020-08-16 09:40:13', '0000-00-00 00:00:00', NULL),
(142, '15.2691943', '73.9512284', 1, '2020-08-16 09:40:28', '0000-00-00 00:00:00', NULL),
(143, '15.2691943', '73.9512284', 1, '2020-08-16 09:40:43', '0000-00-00 00:00:00', NULL),
(144, '15.2691943', '73.9512284', 1, '2020-08-16 09:40:58', '0000-00-00 00:00:00', NULL),
(145, '15.2691943', '73.9512284', 1, '2020-08-16 09:41:13', '0000-00-00 00:00:00', NULL),
(146, '15.2691943', '73.9512284', 1, '2020-08-16 09:41:28', '0000-00-00 00:00:00', NULL),
(147, '15.2691943', '73.9512284', 1, '2020-08-16 09:41:43', '0000-00-00 00:00:00', NULL),
(148, '15.2691943', '73.9512284', 1, '2020-08-16 09:41:58', '0000-00-00 00:00:00', NULL),
(149, '15.2691943', '73.9512284', 1, '2020-08-16 09:42:13', '0000-00-00 00:00:00', NULL),
(150, '15.2691943', '73.9512284', 1, '2020-08-16 09:42:28', '0000-00-00 00:00:00', NULL),
(151, '15.2691943', '73.9512284', 1, '2020-08-16 09:42:44', '0000-00-00 00:00:00', NULL),
(152, '15.2691943', '73.9512284', 1, '2020-08-16 09:43:00', '0000-00-00 00:00:00', NULL),
(153, '15.2691943', '73.9512284', 1, '2020-08-16 09:43:13', '0000-00-00 00:00:00', NULL),
(154, '15.2691943', '73.9512284', 1, '2020-08-16 09:43:28', '0000-00-00 00:00:00', NULL),
(155, '15.2691943', '73.9512284', 1, '2020-08-16 09:43:43', '0000-00-00 00:00:00', NULL),
(156, '15.2691943', '73.9512284', 1, '2020-08-16 09:43:58', '0000-00-00 00:00:00', NULL),
(157, '15.2691943', '73.9512284', 1, '2020-08-16 09:44:13', '0000-00-00 00:00:00', NULL),
(158, '15.2691943', '73.9512284', 1, '2020-08-16 09:44:28', '0000-00-00 00:00:00', NULL),
(159, '15.2691943', '73.9512284', 1, '2020-08-16 09:44:43', '0000-00-00 00:00:00', NULL),
(160, '15.266464', '73.9526978', 1, '2020-08-16 09:44:58', '0000-00-00 00:00:00', NULL),
(161, '15.266464', '73.9526978', 1, '2020-08-16 09:45:15', '0000-00-00 00:00:00', NULL),
(162, '15.266464', '73.9526978', 1, '2020-08-16 09:45:30', '0000-00-00 00:00:00', NULL),
(163, '15.266464', '73.9526978', 1, '2020-08-16 09:45:43', '0000-00-00 00:00:00', NULL),
(164, '15.266464', '73.9526978', 1, '2020-08-16 09:45:59', '0000-00-00 00:00:00', NULL),
(165, '15.266464', '73.9526978', 1, '2020-08-16 09:46:13', '0000-00-00 00:00:00', NULL),
(166, '15.266464', '73.9526978', 1, '2020-08-16 09:46:28', '0000-00-00 00:00:00', NULL),
(167, '15.266464', '73.9526978', 1, '2020-08-16 09:46:46', '0000-00-00 00:00:00', NULL),
(168, '15.266464', '73.9526978', 1, '2020-08-16 09:46:59', '0000-00-00 00:00:00', NULL),
(169, '15.2691943', '73.9512284', 1, '2020-08-16 09:47:07', '0000-00-00 00:00:00', NULL),
(170, '15.2691943', '73.9512284', 1, '2020-08-16 09:47:21', '0000-00-00 00:00:00', NULL),
(171, '15.2691943', '73.9512284', 1, '2020-08-16 09:47:35', '0000-00-00 00:00:00', NULL),
(172, '15.2691943', '73.9512284', 1, '2020-08-16 09:47:51', '0000-00-00 00:00:00', NULL),
(173, '15.2691943', '73.9512284', 1, '2020-08-16 09:48:06', '0000-00-00 00:00:00', NULL),
(174, '15.2691943', '73.9512284', 1, '2020-08-16 09:48:20', '0000-00-00 00:00:00', NULL),
(175, '15.2691943', '73.9512284', 1, '2020-08-16 09:48:35', '0000-00-00 00:00:00', NULL),
(176, '15.2691943', '73.9512284', 1, '2020-08-16 09:48:50', '0000-00-00 00:00:00', NULL),
(177, '15.2691943', '73.9512284', 1, '2020-08-16 09:49:05', '0000-00-00 00:00:00', NULL),
(178, '15.2691943', '73.9512284', 1, '2020-08-16 09:49:20', '0000-00-00 00:00:00', NULL),
(179, '15.2691943', '73.9512284', 1, '2020-08-16 09:49:37', '0000-00-00 00:00:00', NULL),
(180, '15.2691943', '73.9512284', 1, '2020-08-16 09:49:50', '0000-00-00 00:00:00', NULL),
(181, '15.2691943', '73.9512284', 1, '2020-08-16 09:50:06', '0000-00-00 00:00:00', NULL),
(182, '15.2691943', '73.9512284', 1, '2020-08-16 09:50:21', '0000-00-00 00:00:00', NULL),
(183, '15.2691943', '73.9512284', 1, '2020-08-16 09:50:36', '0000-00-00 00:00:00', NULL),
(184, '15.2691943', '73.9512284', 1, '2020-08-16 09:50:50', '0000-00-00 00:00:00', NULL),
(185, '15.2691943', '73.9512284', 1, '2020-08-16 09:51:06', '0000-00-00 00:00:00', NULL),
(186, '15.2691943', '73.9512284', 1, '2020-08-16 09:51:20', '0000-00-00 00:00:00', NULL),
(187, '15.2691943', '73.9512284', 1, '2020-08-16 09:51:35', '0000-00-00 00:00:00', NULL),
(188, '15.2691943', '73.9512284', 1, '2020-08-16 09:51:50', '0000-00-00 00:00:00', NULL),
(189, '15.2691943', '73.9512284', 1, '2020-08-16 09:52:05', '0000-00-00 00:00:00', NULL),
(190, '15.2691943', '73.9512284', 1, '2020-08-16 09:52:20', '0000-00-00 00:00:00', NULL),
(191, '15.2691943', '73.9512284', 1, '2020-08-16 09:52:35', '0000-00-00 00:00:00', NULL),
(192, '15.2691943', '73.9512284', 1, '2020-08-16 09:52:50', '0000-00-00 00:00:00', NULL),
(193, '15.2691943', '73.9512284', 1, '2020-08-16 09:53:07', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `pass_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `up_down` int(11) NOT NULL,
  `fare` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `txn_id` text DEFAULT NULL,
  `txn_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`pass_id`, `customer_id`, `route_id`, `start_date`, `end_date`, `up_down`, `fare`, `order_id`, `txn_id`, `txn_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(94, 4, 5, '2020-08-16', '2020-09-16', 49, 250, 'ORDS531809092', '20200816111212800110168213201794359', '2020-08-16', 1, '2020-08-16 08:45:55', '2020-08-16 09:38:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pass_ride`
--

CREATE TABLE `pass_ride` (
  `pass_ride_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `bus_route_id` int(11) NOT NULL,
  `ride_time` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `from` varchar(25) NOT NULL,
  `to` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `from`, `to`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'margao', 'panjim', '2019-08-27 05:22:32', '2019-09-17 05:32:46', NULL),
(4, 'panjim', 'margao', '2019-08-27 05:23:43', '2019-09-17 05:33:18', NULL),
(5, 'margao', 'ponda', '2019-10-07 05:16:53', '2019-10-07 05:16:53', NULL),
(6, 'ponda', 'margao', '2019-10-07 05:17:07', '2019-10-07 05:17:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `route_stop_type`
--

CREATE TABLE `route_stop_type` (
  `route_stop_type_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `stop_id` int(11) NOT NULL,
  `bus_type_id` int(11) NOT NULL,
  `fare` int(11) NOT NULL,
  `stop_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_stop_type`
--

INSERT INTO `route_stop_type` (`route_stop_type_id`, `route_id`, `stop_id`, `bus_type_id`, `fare`, `stop_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 50, 2, '2019-09-09 15:19:39', '2019-10-10 07:13:21', NULL),
(2, 1, 2, 2, 60, 5, '2019-09-09 15:20:00', '2019-10-10 07:16:00', NULL),
(3, 1, 3, 2, 65, 3, '2019-09-09 15:20:13', '2019-10-10 07:14:00', NULL),
(7, 1, 8, 1, 0, 1, '2019-09-17 06:54:20', '2019-10-10 07:12:42', NULL),
(8, 1, 9, 1, 100, 6, '2019-09-17 06:54:45', '2019-10-10 07:16:14', NULL),
(9, 4, 9, 1, 0, 1, '2019-09-17 06:55:16', '2019-10-10 07:19:02', NULL),
(10, 4, 2, 1, 20, 2, '2019-09-17 06:55:48', '2019-10-10 07:19:38', NULL),
(11, 4, 4, 1, 60, 3, '2019-09-17 06:57:09', '2019-10-10 07:19:57', NULL),
(12, 4, 3, 1, 70, 4, '2019-09-17 06:57:55', '2019-10-10 07:20:17', NULL),
(13, 4, 1, 1, 75, 5, '2019-09-17 06:58:11', '2019-10-10 07:20:42', NULL),
(14, 4, 8, 1, 100, 6, '2019-09-17 06:58:34', '2019-10-10 07:23:17', NULL),
(15, 1, 4, 1, 80, 4, '2019-09-18 15:55:52', '2019-10-10 07:15:38', NULL),
(16, 5, 6, 1, 50, 2, '2019-10-07 05:24:00', '2019-10-10 07:24:07', NULL),
(17, 5, 5, 1, 60, 3, '2019-10-07 05:24:54', '2019-10-10 07:25:02', NULL),
(18, 5, 7, 1, 80, 4, '2019-10-07 05:25:31', '2019-10-10 07:25:16', NULL),
(19, 5, 10, 1, 100, 5, '2019-10-07 05:26:26', '2019-10-10 07:25:30', NULL),
(20, 5, 8, 1, 0, 1, '2019-10-07 05:47:23', '2019-10-10 07:23:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` int(11) NOT NULL,
  `seat_code` varchar(10) NOT NULL,
  `seat_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `stop_id` int(11) NOT NULL,
  `stop_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`stop_id`, `stop_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'verna', '2019-09-02 14:36:45', '2019-09-17 05:20:14', NULL),
(2, 'bambolim', '2019-09-02 14:36:55', '2019-09-17 05:20:53', NULL),
(3, 'pilar', '2019-09-02 14:37:03', '2019-09-17 05:20:24', NULL),
(4, 'cortalim', '2019-09-02 14:37:19', '2019-09-17 05:20:43', NULL),
(5, 'raia', '2019-09-14 08:52:01', '2019-09-17 05:22:16', NULL),
(6, 'arlem', '2019-09-14 08:52:10', '2019-09-17 05:21:41', NULL),
(7, 'borim', '2019-09-14 08:52:21', '2019-09-17 05:22:25', NULL),
(8, 'margao', '2019-09-17 05:19:06', '2019-09-17 05:19:06', NULL),
(9, 'panjim', '2019-09-17 05:19:34', '2019-09-17 05:19:51', NULL),
(10, 'ponda', '2019-09-17 05:21:27', '2019-09-17 05:21:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bus_route_id` int(11) NOT NULL,
  `route_stop_type_id` int(11) NOT NULL,
  `seat_code` varchar(10) NOT NULL,
  `fare` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `customer_id`, `bus_route_id`, `route_stop_type_id`, `seat_code`, `fare`, `date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(101, 4, 8, 14, 'a2', 200, '2020-08-20', 1, '2020-08-16 08:18:27', '0000-00-00 00:00:00', NULL),
(102, 4, 8, 14, 'b2', 200, '2020-08-20', 1, '2020-08-16 08:18:28', '0000-00-00 00:00:00', NULL),
(103, 4, 6, 14, 'a3', 200, '2020-08-16', 0, '2020-08-16 08:33:03', '2020-08-16 08:35:57', NULL),
(104, 4, 6, 14, 'a4', 200, '2020-08-16', 0, '2020-08-16 08:33:03', '2020-08-16 08:35:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `bus_route_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `route_stop_type_id` int(11) DEFAULT NULL,
  `seat_code` varchar(10) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `order_id` varchar(30) DEFAULT NULL,
  `txn_id` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `creted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `bus_route_id`, `customer_id`, `route_stop_type_id`, `seat_code`, `ticket_id`, `order_id`, `txn_id`, `amount`, `date`, `status`, `creted_at`, `updated_at`) VALUES
(132, 8, 4, 14, 'a2', 102, 'ORDS75810463', '20200816111212800110168882601814560', 200, '2020-08-20', 1, '2020-08-16 08:18:14', '2020-08-16 08:18:28'),
(133, 8, 4, 14, 'b2', 102, 'ORDS75810463', '20200816111212800110168882601814560', 200, '2020-08-20', 1, '2020-08-16 08:18:14', '2020-08-16 08:18:28'),
(136, 6, 4, 14, 'a3', 104, 'ORDS68050625', '20200816111212800110168043601974707', 200, '2020-08-16', 1, '2020-08-16 08:32:51', '2020-08-16 08:33:03'),
(137, 6, 4, 14, 'a4', 104, 'ORDS68050625', '20200816111212800110168043601974707', 200, '2020-08-16', 1, '2020-08-16 08:32:51', '2020-08-16 08:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email_id`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'test@gmail.com', '$2y$13$SEiutXwiNF3WX6V2yisGeewMWWm9OTkJoXYwyGFERsh9wnVZsx322', '2019-10-04 15:31:12', '0000-00-00 00:00:00', NULL),
(12, 'manisha@gmail.com', '$2y$13$83LWKc4IerSU4wGO0N3Ab.TIyjNk4042z4RC6RQzCNsbKqeLjGXzO', '2019-11-05 16:37:49', '0000-00-00 00:00:00', NULL),
(13, 'admin@gmail.com', '$2y$13$9wz3hN.pMaUHWfbDGyCWB.qLFlmrWJVl7Mt/1JfgKdkUck4.J6nLy', '2020-01-09 06:31:55', '0000-00-00 00:00:00', NULL),
(15, 'etst', '', '2020-01-30 13:39:41', '0000-00-00 00:00:00', NULL),
(16, 'test', 'test121', '2020-01-30 13:40:20', '0000-00-00 00:00:00', NULL),
(17, 'test535', '$2y$13$Ljf/c.e.xebw7WTBJd.3JuwKTu.WmqA8u0qkZadtGqB2FpgoMWhd2', '2020-01-30 13:45:30', '0000-00-00 00:00:00', NULL),
(18, 'test535', '$2y$13$WL4AHUEXRP2S28Z45p8cUeuYEQxavVIfDtziuspMGjl6hMZCgrzxW', '2020-01-30 13:47:11', '0000-00-00 00:00:00', NULL),
(19, 'test', '$2y$13$CGYKemu6OX4itWizjwKDD.JgbYJFZTXDw.8045pkh.ZDuY1wjd.TG', '2020-01-30 13:48:39', '0000-00-00 00:00:00', NULL),
(21, 'qaiser@gmail.com', '$2y$13$wuF2fnVCthY040JWzN652.XwEZ4D4kPGXFMnIdshIq2UDFUnXFDZ6', '2020-01-30 13:54:04', '0000-00-00 00:00:00', NULL),
(22, 'john@citibus.com', '$2y$13$BZzg4arYR/4KdtZYouM3rO1kXJYfrKef5q.7Tb22WMdQ1G703dd/u', '2020-02-08 16:21:19', '2020-08-16 08:16:31', NULL),
(23, 'test', '$2y$13$KNIU4QbBjOONcbKFzF0TJ.BBUxq6j2gZZDL2j0yPSVdGfQ08LOg2S', '2020-02-12 15:57:53', '0000-00-00 00:00:00', NULL),
(24, 'test', '$2y$13$RjpADAb3J/ANJs9Xea1AtOBBH6Tep1hvN5hkjunq1.rdPFe9sRd4S', '2020-02-12 15:58:38', '0000-00-00 00:00:00', NULL),
(25, 'emp1@citibus.com', '$2y$13$XBHBwUFjyLOjff0vrlmyweqvxgniyKCUQ0oihQAUDymNDujWO17pa', '2020-02-27 09:16:53', '0000-00-00 00:00:00', NULL),
(26, 'emp@citibus.com', '$2y$13$w5ILJwiIKQAOhfb07MUUHe.Q1abI2lwLV8Jy.cNs2vZOxxukb8lli', '2020-08-16 09:44:31', '0000-00-00 00:00:00', NULL),
(27, 'emp@citibus.com', '$2y$13$Z2Dd37UamHVN5yaVJzLQ1.FgFx9zx47397OyLY7Z/KCfnEXRjTXTK', '2020-08-16 09:44:32', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `bus_employee`
--
ALTER TABLE `bus_employee`
  ADD PRIMARY KEY (`bus_employee_id`),
  ADD KEY `bus_2` (`bus_id`),
  ADD KEY `employee_1` (`employee_id`);

--
-- Indexes for table `bus_route`
--
ALTER TABLE `bus_route`
  ADD PRIMARY KEY (`bus_route_id`),
  ADD KEY `route_1` (`route_id`),
  ADD KEY `bus_1` (`bus_id`);

--
-- Indexes for table `bus_seats`
--
ALTER TABLE `bus_seats`
  ADD PRIMARY KEY (`bus_seat_id`),
  ADD KEY `bus_3` (`bus_id`),
  ADD KEY `seat_1` (`seat_id`);

--
-- Indexes for table `bus_type`
--
ALTER TABLE `bus_type`
  ADD PRIMARY KEY (`bus_type_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `user_1` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `user_2` (`user_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `a1` (`bus_employee_id`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`pass_id`),
  ADD KEY `customer_2` (`customer_id`),
  ADD KEY `route_3` (`route_id`);

--
-- Indexes for table `pass_ride`
--
ALTER TABLE `pass_ride`
  ADD PRIMARY KEY (`pass_ride_id`),
  ADD KEY `pass_1` (`pass_id`),
  ADD KEY `bus_route_2` (`bus_route_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `route_stop_type`
--
ALTER TABLE `route_stop_type`
  ADD PRIMARY KEY (`route_stop_type_id`),
  ADD KEY `route_2` (`route_id`),
  ADD KEY `stop_1` (`stop_id`),
  ADD KEY `bus_type_1` (`bus_type_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`stop_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `bus_route_1` (`bus_route_id`),
  ADD KEY `customer_1` (`customer_id`),
  ADD KEY `route_stop_type_1` (`route_stop_type_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus_employee`
--
ALTER TABLE `bus_employee`
  MODIFY `bus_employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus_route`
--
ALTER TABLE `bus_route`
  MODIFY `bus_route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus_seats`
--
ALTER TABLE `bus_seats`
  MODIFY `bus_seat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus_type`
--
ALTER TABLE `bus_type`
  MODIFY `bus_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `pass_ride`
--
ALTER TABLE `pass_ride`
  MODIFY `pass_ride_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `route_stop_type`
--
ALTER TABLE `route_stop_type`
  MODIFY `route_stop_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `stop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus_employee`
--
ALTER TABLE `bus_employee`
  ADD CONSTRAINT `bus_2` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `employee_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `bus_route`
--
ALTER TABLE `bus_route`
  ADD CONSTRAINT `bus_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `route_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);

--
-- Constraints for table `bus_seats`
--
ALTER TABLE `bus_seats`
  ADD CONSTRAINT `bus_3` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `seat_1` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `user_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `user_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `a1` FOREIGN KEY (`bus_employee_id`) REFERENCES `bus_employee` (`bus_employee_id`);

--
-- Constraints for table `pass`
--
ALTER TABLE `pass`
  ADD CONSTRAINT `customer_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `route_3` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);

--
-- Constraints for table `pass_ride`
--
ALTER TABLE `pass_ride`
  ADD CONSTRAINT `bus_route_2` FOREIGN KEY (`bus_route_id`) REFERENCES `bus_route` (`bus_route_id`),
  ADD CONSTRAINT `pass_1` FOREIGN KEY (`pass_id`) REFERENCES `pass` (`pass_id`);

--
-- Constraints for table `route_stop_type`
--
ALTER TABLE `route_stop_type`
  ADD CONSTRAINT `bus_type_1` FOREIGN KEY (`bus_type_id`) REFERENCES `bus_type` (`bus_type_id`),
  ADD CONSTRAINT `route_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`),
  ADD CONSTRAINT `stop_1` FOREIGN KEY (`stop_id`) REFERENCES `stops` (`stop_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `bus_route_1` FOREIGN KEY (`bus_route_id`) REFERENCES `bus_route` (`bus_route_id`),
  ADD CONSTRAINT `customer_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `route_stop_type_1` FOREIGN KEY (`route_stop_type_id`) REFERENCES `route_stop_type` (`route_stop_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
