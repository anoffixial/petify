-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 06:06 AM
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
-- Database: `petify`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `phone`, `password`, `addr`) VALUES
(15, 'Arya', '6666666666', '$2y$10$qGvf8mXxDmSfteTBe2itY.LkxOtxqY3p2uecosr218XdBi9xQCHqi', ''),
(16, 'Amartya', '7777777777', '$2y$10$e.ChFg7vnJ80YBSSRvCh4uOq2Lh4RpPPinmsmaMvv1w5BRCGD338u', ''),
(18, 'Archana', '8888888888', '$2y$10$WqFWCs1Otdc1aboQtToaIu4VCyyai0EgznAMf4KU6o8rtRx69Zqz6', ''),
(19, 'Sneha', '9999999999', '$2y$10$pg3PZKnteE4LnnfnkA4AbO27rWjJY9kp7FaZCzx9R/xtn/OaIAZF2', ''),
(21, 'Yash Padwal', '5555555555', '$2y$10$ZznbSLtc7qWo7xpeXv.siuXO7aMED6JldkLg1I8oN.MRmp1dYkqs.', ''),
(24, 'Babu', '9850871011', '$2y$10$zeLDIZ1f/n1mxG2IhYnp1OrO9oWwgv5IYKzVgTLuILU7iirmkO8Ia', ''),
(27, 'Ammu', '8020202020', '$2y$10$1lxNqSQw0IwALcsbBX9FYuTlwn27meTwjO0Xc8jPfN2YJYPopqzFy', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
