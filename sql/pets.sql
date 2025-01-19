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
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(10) NOT NULL,
  `pet_name` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `rescued` varchar(3) NOT NULL,
  `pet_price` varchar(25) NOT NULL,
  `category` varchar(100) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `vaccine` varchar(200) NOT NULL,
  `pet_image` varchar(300) NOT NULL,
  `decs` varchar(500) NOT NULL,
  `shelter_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `gender`, `rescued`, `pet_price`, `category`, `breed`, `age`, `vaccine`, `pet_image`, `decs`, `shelter_id`) VALUES
(44, 'Charlie', 'Male', 'Yes', 'Resued Pets have no fee', 'Bird', 'Eclectus Parrot', 5, 'Polyomavirus vaccine', '', 'Charlie, the 5-year-old Eclectus parrot, is a vibrant and colorful avian companion. His hobbies include chirping melodiously, exploring his cage, and feasting on juicy fruits.', 1),
(50, 'Shiro', 'Male', 'No', '5999', 'Dog', 'Shiba-Inu', 1, 'Parvovirus,\r\nRabies,\r\nDistemper,\r\nLeptospirosis,\r\nHepatitis,\r\nLyme disease,\r\nInfluenza,\r\nBordetella,\r\nDHPP', '', 'Shiro is a playful and energetic 1-year-old Shiba Inu. He loves spending time outdoors, going for long walks, and playing fetch with his favorite tennis ball. Shiro is very friendly and enjoys meeting new people and other dogs. He is well-trained and knows commands like sit, stay, and shake.', 2),
(51, 'Kiro', 'Male', 'Yes', 'Resued Pets have no fee', 'Cat', 'Indian Billi', 2, 'feline herpesvirus 1 (FHV1), feline calicivirus (FCV), feline panleukopenia virus (FPV), feline leukemia virus (FeLV)', '', 'Meet Kiro: a rescued feline with a heart of gold and a passion for play. This sleek black beauty loves exploring new nooks, cozy cuddles, and indulging in feathered toys. If youre ready for endless fun and affection, Kiro is the purrfect companion for you!', 1),
(52, 'Bunny', 'Female', 'Yes', 'Resued Pets have no fee', 'Rabbit', 'Dutch Rabbit', 2, 'Rabbit Hemorrhagic Disease Virus (RHDV) Vaccine,Myxomatosis Vaccine,Rabbit Calicivirus (RCV),Rabbit Viral Hemorrhagic Disease (RVHD) Vaccine', '', 'Bunny is a charming White Dutch rabbit known for its distinctive markings of a white body with dark ears and a dark nose. With a soft, fluffy coat resembling freshly fallen snow, Bunny exudes elegance and grace. This friendly and playful rabbit is beloved for its endearing personality, often delighting its human companions with its curious nature and affectionate demeanor. Whether hopping around the garden or snuggling up indoors, Bunny brings joy and warmth to any home.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `shelter_id` (`shelter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `shelter_id` FOREIGN KEY (`shelter_id`) REFERENCES `shelters` (`shelter_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
