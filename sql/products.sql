-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 06:05 AM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(5) NOT NULL,
  `decs` varchar(400) NOT NULL,
  `quantity` int(3) NOT NULL,
  `image` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `price`, `decs`, `quantity`, `image`) VALUES
(1, 'Playing Ball', 300, '\"Keep your furry friend active and entertained with our selection of high-quality dog balls for endless fun and exercise.\"', 5, 'ball.jpg'),
(2, 'Collar Belt', 600, '\"Elevate your pup\'s style and safety with our range of durable and fashionable dog collar belts.\"\r\n\r\n\r\n\r\n\r\n', 5, 'collar.jpg'),
(3, 'Eating Bowl', 500, '\"Discover durable and stylish dog bowls designed to satisfy your pet\'s appetite and style preferences.\"', 5, 'bowl.jpg'),
(4, 'Ducky Toy', 300, '\"Quack up your pup\'s playtime with our adorable and durable dog ducky toy!\"', 5, 'duckytoy.jpg'),
(5, 'Cat\'s Post', 1000, '\"Provide your feline friend with endless entertainment and exercise with our versatile and sturdy cat playing stand.\"', 5, 'catstand.jpg'),
(6, 'Pedigree ', 1000, '\"Fuel your dog\'s vitality with nutritious Pedigree dog food, crafted to support their health and happiness.\"', 5, 'pedigree.png'),
(7, 'Litter Box', 250, 'Litter box to keep surroundings clean', 5, 'litterbox.jpg'),
(8, 'Pet Shampo', 500, 'Organic Pet Shampoo to keep your loved one hygine and clean.', 5, 'petshampoo.png'),
(9, 'Pet Brush', 150, 'Hair brush for regular hair grooming.', 5, 'petbrush.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
