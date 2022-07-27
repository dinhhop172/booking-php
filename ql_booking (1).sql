-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2022 at 09:08 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `roles` enum('admin','user','staff') CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT 'user',
  `verification_code` text,
  `email_verified_at` datetime DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `phone_number`, `sex`, `address`, `roles`, `verification_code`, `email_verified_at`, `status`) VALUES
(1, 'Admin', '$2y$10$j1yDxP/2/Gs/SQmquEZDcudcfkcUtFYWn7gBMRC.XVdfRy5CN8wmS', 'dinhhop172@gmail.com', 123123123, 'male', 'Hue city', 'admin', '147776', '2022-07-19 16:12:43', 1),
(2, 'Staff', '$2y$10$9P3UiXwp8jPmQ.rhNns.TuWFW9Htb89x2aJvPubjPk0t6kq1P2k8C', 'keiradom296@gmail.com', 1231231231, 'male', 'Hue city', 'staff', '71b2a3fbf86f5d0ad469545e63c5d3248093', NULL, 1),
(3, 'User', '$2y$10$mAs38OaawAAn0DNfHU/e9ODVXUkhpWIAoISWFTtkPiePVJmFm.01W', 'nhatthang1702@gmail.com', 1231231231, 'male', 'Hue city', 'user', 'c9e9b0e37b5f8060661f8f0f1727fbd67871', '2022-07-18 10:57:04', 1),
(14, 'kayleight', '$2y$10$xLxlIgSzyuL60qeE.MhzkudtgAg6Iet2eRm52KYxivE0N3MGNOErC', 'nhatthang1720@gmail.com', 123123123, 'male', 'Hue city', 'user', 'fef8682ec96e236397d75d93cfe6c593478', '2022-07-21 11:43:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `account_id` int NOT NULL,
  `room_id` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `total_day` int DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `account_id`, `room_id`, `check_in`, `check_out`, `total_day`, `total_price`, `status`) VALUES
(21, 3, 1, '2022-07-19', '2022-07-22', 3, 1500, 1),
(22, 14, 2, '2022-07-22', '2022-07-30', 8, 8000, 1),
(23, 3, 3, '2022-07-22', '2022-07-20', -2, -12000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `price`, `status`) VALUES
(1, 'room 1', 500, 2),
(2, 'Room 2', 1000, 2),
(3, 'Room 3', 6000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_ibfk_1` (`room_id`),
  ADD KEY `booking_ibfk_2` (`account_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
