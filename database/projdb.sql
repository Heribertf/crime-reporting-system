-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 02:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$drIC9UN8s1YAhk8RVzu/weOQt/Nayw3RcklJdZjW574p8WPNgpH8q');

-- --------------------------------------------------------

--
-- Table structure for table `crimes`
--

CREATE TABLE `crimes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `description` varchar(400) NOT NULL,
  `latitude` decimal(10,0) DEFAULT NULL,
  `longitude` decimal(10,0) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `date_reported` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crimes`
--

INSERT INTO `crimes` (`id`, `type`, `location`, `date`, `time`, `description`, `latitude`, `longitude`, `file`, `date_reported`) VALUES
(1, 'theft', 'chuka', '2023-04-11 00:00:00', '01:54:00', 'theft crime', NULL, NULL, NULL, '2023-04-20 01:53:12'),
(2, 'theft', 'meru', '2023-04-11 00:00:00', '01:54:00', 'theft crime', NULL, NULL, NULL, '2023-04-20 01:53:26'),
(3, 'theft', 'meru', '2023-04-05 00:00:00', '04:54:00', 'werhtyjg', NULL, NULL, NULL, '2023-04-20 01:53:43'),
(4, 'hijacking', 'meru', '2023-02-08 00:00:00', '04:54:00', 'werhtyjg', NULL, NULL, NULL, '2023-04-20 01:54:08'),
(5, 'hijacking', 'meru', '2023-02-10 00:00:00', '08:54:00', 'rehrnjghf', NULL, NULL, NULL, '2023-04-20 01:54:28'),
(6, 'hijacking', 'chuka', '2023-04-17 00:00:00', '10:54:00', 'rehrnjghf', NULL, NULL, NULL, '2023-04-20 01:54:49'),
(7, 'vandalism', 'chuka', '2023-04-11 00:00:00', '08:23:00', 'wsedrtfgy', '0', '0', 'uploads/', '2023-04-20 04:24:32'),
(8, 'vandalism', 'chuka', '2023-04-11 00:00:00', '08:23:00', 'wsedrtfgy', '0', '0', 'uploads/', '2023-04-20 10:19:07'),
(9, 'vandalism', 'chuka', '2023-04-11 00:00:00', '08:23:00', 'wsedrtfgy', '0', '0', 'uploads/', '2023-04-20 10:19:10'),
(10, 'burglary', 'nyeri', '2023-04-18 00:00:00', '15:40:00', 'tfyeufijkqejf', NULL, NULL, NULL, '2023-04-20 12:40:29'),
(11, 'robbery', 'nyeri', '2023-04-13 00:00:00', '20:40:00', 'tfyeufijkqejf', '0', '38', 'uploads/', '2023-04-20 12:42:35'),
(12, 'assault', 'chuka', '2023-04-11 00:00:00', '16:49:00', 'restdgh', '0', '38', '', '2023-04-20 12:49:39'),
(13, 'assault', 'chuka', '2023-04-10 00:00:00', '17:54:00', 'weartdfgh', '0', '38', NULL, '2023-04-20 12:54:48'),
(14, 'assault', 'chuka', '2023-04-10 00:00:00', '17:54:00', 'weartdfgh', '0', '38', NULL, '2023-04-20 13:04:43'),
(15, 'assault', 'chuka', '2023-04-10 00:00:00', '17:54:00', 'weartdfgh', '0', '38', NULL, '2023-04-20 13:06:08'),
(16, 'assault', 'chuka', '2023-04-10 00:00:00', '17:54:00', 'weartdfgh', '0', '38', 'uploads/choir snip.png', '2023-04-20 13:09:27'),
(17, 'others', 'meru', '2023-02-17 00:00:00', '18:29:00', 'srdtygh', '0', '0', 'uploads/choir snip.png', '2023-04-20 14:30:37'),
(18, 'others', 'meru', '2023-02-17 00:00:00', '18:29:00', 'srdtygh', '0', '0', 'uploads/logos.png', '2023-04-20 14:32:10'),
(19, 'others', 'meru', '2023-02-17 00:00:00', '18:29:00', 'srdtygh', '0', '0', 'uploads/logos.png', '2023-04-20 14:32:48'),
(20, 'others', 'meru', '2023-02-17 00:00:00', '18:29:00', 'srdtygh', '0', '0', 'uploads/logos.png', '2023-04-20 14:32:50'),
(21, 'others', 'meru', '2023-02-17 00:00:00', '18:29:00', 'srdtygh', '0', '0', 'uploads/logos.png', '2023-04-20 14:32:57'),
(22, 'assault', 'chuka', '2023-04-12 00:00:00', '18:37:00', 'rdtfgyh', '0', '0', 'uploads/jumuia.png', '2023-04-20 14:37:21'),
(23, 'assault', 'chuka', '2023-04-12 00:00:00', '18:37:00', 'rdtfgyh', '0', '0', 'uploads/jumuia.png', '2023-04-20 14:38:36'),
(24, 'assault', 'meru', '2023-04-18 00:00:00', '20:41:00', 'esrtygfhj', '0', '0', 'uploads/MS snip.png', '2023-04-20 15:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'murife', '$2y$10$gs2IyaG8OXUaKwfgHTgMHuumv52llI9SFRTpMf7W3bPYpjoL6Hyqi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `crimes`
--
ALTER TABLE `crimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crimes`
--
ALTER TABLE `crimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
