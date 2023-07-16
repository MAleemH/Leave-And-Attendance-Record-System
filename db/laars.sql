-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 07:46 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laars`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied_leaves`
--

CREATE TABLE `applied_leaves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `leave_type` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `attendance_date`, `time_in`, `time_out`, `status`) VALUES
(1, 5, '2023-07-15', '08:00:00', '17:00:00', 'Present'),
(2, 5, '2023-07-16', '08:00:00', '17:00:00', 'Present'),
(3, 5, '2023-07-01', '08:00:00', '17:00:00', 'Present'),
(4, 5, '2023-06-01', '08:00:00', '17:00:00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) NOT NULL,
  `leave_description` varchar(255) NOT NULL,
  `leave_total` int(100) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leave_description`, `leave_total`, `leave_from`, `leave_to`) VALUES
(2, 'Casual Leave', 10, '2023-07-14', '2023-12-31'),
(3, 'Medical Leave', 20, '2023-07-14', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `user_address` text NOT NULL,
  `user_contact` varchar(12) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_image`, `user_address`, `user_contact`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'Muhammad Aleem', 'IMG_2424.jpg', 'Mirpur AJ&K', '03445387545', 'aleemhashmi4321@gmail.com', 'aleem', 'Admin'),
(5, 'Mohsin Akram', 'meme.png', 'Jatlan, Mirpur AJK', '03431122332', 'mohsin@gmail.com', 'mohsin', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_leaves`
--
ALTER TABLE `applied_leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
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
-- AUTO_INCREMENT for table `applied_leaves`
--
ALTER TABLE `applied_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied_leaves`
--
ALTER TABLE `applied_leaves`
  ADD CONSTRAINT `applied_leaves_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
