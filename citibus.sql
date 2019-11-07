-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 06:56 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `license_plate`, `no_of_seats`, `pattern`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GA03G1876', 60, '235', '2019-08-27 05:45:26', '2019-08-27 05:45:26', NULL),
(2, 'GA08D4654', 70, '236', '2019-08-27 05:46:00', '2019-08-27 05:46:00', NULL),
(3, 'GA09FD6334', 60, '237', '2019-08-27 05:46:30', '2019-08-27 05:46:30', NULL),
(4, 'GA03G1345', 50, '225', '2019-09-02 07:48:03', '2019-09-02 07:48:03', NULL),
(5, 'GA08G1372', 70, '237', '2019-09-02 07:51:22', '2019-09-02 07:51:22', NULL),
(6, 'GA03G1111', 50, '326', '2019-09-02 09:49:12', '2019-09-02 09:49:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_employee`
--

CREATE TABLE `bus_employee` (
  `bus_employee_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_route`
--

CREATE TABLE `bus_route` (
  `bus_route_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `timing` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_type`
--

CREATE TABLE `bus_type` (
  `bus_type_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
  `password` varchar(20) NOT NULL,
  `e_wallet` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_id`, `name`, `phone_no`, `email_id`, `password`, `e_wallet`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 11, 'test', 467648732, 'test@gmail.com', '$2y$13$SEiutXwiNF3WX', NULL, '2019-10-04 15:31:12', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(15) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `license_no` varchar(15) NOT NULL,
  `aadhar_card_no` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `up` int(11) NOT NULL,
  `down` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pass_ride`
--

CREATE TABLE `pass_ride` (
  `pass_ride_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `bus_route_id` int(11) NOT NULL,
  `ride_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `stop_id` int(11) NOT NULL,
  `stop_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `customer_id`, `bus_route_id`, `route_stop_type_id`, `seat_code`, `fare`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, 6, 1, 'a2', 100, '2019-10-17 16:07:48', '0000-00-00 00:00:00', NULL),
(5, 2, 6, 1, 'a4', 100, '2019-10-17 16:07:48', '0000-00-00 00:00:00', NULL),
(6, 2, 6, 1, 'a2', 100, '2019-10-17 16:11:53', '0000-00-00 00:00:00', NULL),
(7, 2, 6, 1, 'a4', 100, '2019-10-17 16:11:53', '0000-00-00 00:00:00', NULL),
(8, 2, 6, 1, 'a2', 100, '2019-10-17 16:12:37', '0000-00-00 00:00:00', NULL),
(9, 2, 6, 1, 'a4', 100, '2019-10-17 16:12:37', '0000-00-00 00:00:00', NULL),
(10, 2, 6, 1, 'a2', 100, '2019-10-17 16:14:34', '0000-00-00 00:00:00', NULL),
(11, 2, 6, 1, 'a4', 100, '2019-10-17 16:14:34', '0000-00-00 00:00:00', NULL);

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
  `txn_id` text,
  `amount` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `creted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `bus_route_id`, `customer_id`, `route_stop_type_id`, `seat_code`, `ticket_id`, `order_id`, `txn_id`, `amount`, `date`, `status`, `creted_at`, `updated_at`) VALUES
(1, 6, 2, 1, 'a1', NULL, 'ORDS45992549', NULL, 50, NULL, 0, '2019-10-17 07:09:00', '0000-00-00 00:00:00'),
(2, 6, 2, 1, 'b2', NULL, 'ORDS41824332', NULL, 100, NULL, 0, '2019-10-17 07:10:37', '0000-00-00 00:00:00'),
(10, 6, 2, 1, 'b3', NULL, 'ORDS98659578', NULL, 100, NULL, 0, '2019-10-17 12:25:24', '0000-00-00 00:00:00'),
(11, 6, 2, 1, 'b5', NULL, 'ORDS98659578', NULL, 100, NULL, 0, '2019-10-17 12:25:24', '0000-00-00 00:00:00'),
(12, 6, 2, 1, 'b3', NULL, 'ORDS88447022', NULL, 100, NULL, 0, '2019-10-17 12:26:49', '0000-00-00 00:00:00'),
(13, 6, 2, 1, 'b2', NULL, 'ORDS88447022', NULL, 100, NULL, 0, '2019-10-17 12:26:49', '0000-00-00 00:00:00'),
(14, 6, 2, 1, 'a2', 5, 'ORDS91005056', '20191017111212800110168089801966743', 100, '2019-10-16 18:30:00', 1, '2019-10-17 14:35:33', '2019-10-17 16:14:34'),
(15, 6, 2, 1, 'a4', 5, 'ORDS91005056', '20191017111212800110168089801966743', 100, '2019-10-16 18:30:00', 1, '2019-10-17 14:35:33', '2019-10-17 16:14:34'),
(16, 6, 2, 1, 'e5', NULL, 'ORDS68215062', NULL, 50, NULL, 0, '2019-10-17 16:36:41', '0000-00-00 00:00:00'),
(17, 6, 2, 1, 'a1', NULL, 'ORDS7320432', NULL, 50, NULL, 0, '2019-10-30 05:37:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email_id`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'test@gmail.com', '$2y$13$SEiutXwiNF3WX6V2yisGeewMWWm9OTkJoXYwyGFERsh9wnVZsx322', '2019-10-04 15:31:12', '0000-00-00 00:00:00', NULL);

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
  MODIFY `bus_employee_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
