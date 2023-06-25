-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 03:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `service_id` int(4) NOT NULL,
  `appt_date` date NOT NULL,
  `appt_time` time NOT NULL,
  `payment_fee` double NOT NULL,
  `appt_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `cust_id`, `service_id`, `appt_date`, `appt_time`, `payment_fee`, `appt_status`) VALUES
(26810, 2019304, 1001, '2023-01-22', '10:00:00', 75, 1),
(26811, 2019309, 1003, '2023-01-03', '09:00:00', 100, 2),
(26812, 2019309, 1002, '2022-12-15', '16:00:00', 75, 2),
(26813, 2019309, 1001, '2022-12-21', '10:00:00', 180, 2),
(26814, 2019309, 1001, '2022-12-01', '14:00:00', 130, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `price_session` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`type_id`, `type_name`, `price_session`) VALUES
(1, 'Regular', 10),
(2, 'VIP', 60);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(60) NOT NULL,
  `cust_gender` char(1) DEFAULT NULL,
  `cust_phonenum` int(15) DEFAULT NULL,
  `cust_birthdate` date DEFAULT NULL,
  `cust_regdate` date NOT NULL,
  `membership` varchar(7) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_gender`, `cust_phonenum`, `cust_birthdate`, `cust_regdate`, `membership`, `password`) VALUES
(2019304, 'FATIMAH BINTI HASSAN', 'F', 121474836, '1994-08-08', '2023-01-02', 'VIP', ''),
(2019306, 'MUHAMMAD AKMAL', 'M', 192634628, '1995-11-05', '2023-01-13', 'VIP', '123'),
(2019307, 'NIK ZURAZNITA', 'F', 127662518, '2000-04-03', '2023-01-18', 'Regular', 'aaa'),
(2019309, 'FATIN NATASHA', 'F', 139102141, '2002-01-01', '2023-01-17', 'VIP', '123'),
(2019310, 'NUR AQILAH', 'F', 192634628, '2000-06-04', '2023-01-20', 'VIP', 'aaa'),
(2019311, 'CHEDAH SALLIM', 'F', 196352821, '2000-12-16', '2023-01-20', 'Regular', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(4) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_price`) VALUES
(1001, 'Massages', 99),
(1002, 'Body Therapies', 90),
(1003, 'Facials', 75),
(1004, 'Waxing', 50);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(6) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `password`) VALUES
(202301, 'Hasya Mahmood', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `statusappt`
--

CREATE TABLE `statusappt` (
  `appt_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statusappt`
--

INSERT INTO `statusappt` (`appt_status`, `status`) VALUES
(1, 'Upcoming'),
(2, 'Completed'),
(3, 'Cancelled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `appt_status` (`appt_status`),
  ADD KEY `booking_ibfk_1` (`cust_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `statusappt`
--
ALTER TABLE `statusappt`
  ADD PRIMARY KEY (`appt_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26815;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019312;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202302;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`appt_status`) REFERENCES `statusappt` (`appt_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
