-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 05:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_booking_history`
--

CREATE TABLE `admin_booking_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_slot` time DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` enum('Accepted','Declined','Pending') DEFAULT NULL,
  `admin_comment` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` int(255) NOT NULL,
  `time_slot` int(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `date`, `time_slot`, `reason`, `day`, `status`) VALUES
(91, 'sheesh', 'canlasaries99@gmail.com', 2024, 8, 'shitttpaypay', '', 'Declined'),
(115, 'daada', 'canlasaries99@gmail.com', 2024, 10, 'Appointment', '', 'Declined'),
(117, 'dadada', 'canlasaries99@gmail.com', 2024, 9, 'dadad', '', 'Declined'),
(118, 'hahaha', 'canlasaries99@gmail.com', 2024, 9, 'Event', '', 'Declined'),
(119, 'asfsfg', 'canlasaries99@gmail.com', 2024, 10, 'dafs', '', 'Declined'),
(120, 'ariescanlas', 'canlasaries99@gmail.com', 2024, 10, 'Meeting', '', 'Declined'),
(121, 'dafd', 'canlasaries99@gmail.com', 2024, 5, 'Appointment', '', 'Accepted'),
(122, 'aries', 'canlasaries99@gmail.com', 2024, 1, 'netmai', '', ''),
(125, 'ada', 'canlasaries99@gmail.com', 2024, 8, 'Event', '', ''),
(126, 'jhbghb', 'canlasaries99@gmail.com', 2024, 9, 'Meeting', '', 'Declined'),
(127, 'ddfasfsd', 'canlasaries99@gmail.com', 2024, 8, 'Appointment', '', 'Declined'),
(128, 'fgvdsgdghfd', 'canlasaries99@gmail.com', 2024, 4, 'Appointment', '', ''),
(129, 'dawf', 'canlasaries99@gmail.com', 2024, 3, 'Meeting', '', 'Declined'),
(130, 'dada', 'canlasaries99@gmail.com', 2024, 4, 'asdad', '', ''),
(131, 'fsfg', 'canlasaries99@gmail.com', 2024, 3, 'Appointment', '', ''),
(132, 'areisacanlas', 'canlasaries99@gmail.com', 2024, 3, 'final defense', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `dish_name` varchar(255) NOT NULL,
  `meal_time` varchar(50) NOT NULL,
  `recipe` text NOT NULL,
  `prep_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studybook`
--

CREATE TABLE `studybook` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `section` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studybook`
--

INSERT INTO `studybook` (`id`, `name`, `date`, `time`, `section`) VALUES
(5, 'ariescanlassimangen', '2024-06-03', '22:21:00', '2-1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `password`) VALUES
(36, 'ctrl-alt-elite', 'ctrl-alt-elite@gmail.com', 0, 'dde058d3a675112a5e4a1c404429f3a37c90432277f78b218614cf65bfa4b50beea642d1330cf70ecb708c8974d347d70a9d', '$2y$10$2sU3WqemEk6jbJlHkP3s1.WWhI86j7CHK3UXDAyUNMM4L4iDnnX6.');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'dada', 'canlasaries99@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(2, 'dada', 'canlasaries99@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'admin'),
(3, 'pek', 'pekpek@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(4, 'dada', 'hulidevelopers@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin'),
(5, 'hayop', 'hayop@gail.com', '25d55ad283aa400af464c76d713c07ad', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_booking_history`
--
ALTER TABLE `admin_booking_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studybook`
--
ALTER TABLE `studybook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_booking_history`
--
ALTER TABLE `admin_booking_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studybook`
--
ALTER TABLE `studybook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
