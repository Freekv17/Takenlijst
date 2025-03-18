-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2025 at 08:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `takenlijst`
--

CREATE TABLE `takenlijst` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `afdeling` varchar(255) NOT NULL,
  `beschrijving` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `takenlijst`
--

INSERT INTO `takenlijst` (`id`, `user_id`, `afdeling`, `beschrijving`, `status`, `datetime`) VALUES
(1, 0, 'horeca', NULL, 'TODO', '2025-03-17 08:49:53'),
(2, 0, 'horeca', NULL, 'TODO', '2025-03-17 08:51:12'),
(3, 0, 'inkoop', NULL, 'TODO', '2025-03-17 08:52:14'),
(4, 0, 'groen', NULL, 'TODO', '2025-03-17 09:09:24'),
(5, 0, 'personeel', NULL, 'TODO', '2025-03-17 09:11:25'),
(6, 0, 'techniek', 'Dit is een beschrijving', 'TODO', '2025-03-17 09:12:30'),
(7, 0, 'personeel', '', 'TODO', '2025-03-18 07:57:49'),
(8, 0, 'horeca', 'Dit is eventjes test taakje horeca', 'TODO', '2025-03-18 07:59:23'),
(9, 0, 'klantenservice', 'ahdouahsidu', 'TODO', '2025-03-18 08:32:49'),
(10, 0, 'attracties', 'Testttt', 'TODO', '2025-03-18 08:49:57'),
(11, 3, 'horeca', 'BOOOOMMBOOOOMMBOOOOMMBOOOOMMBOOOOMM', 'TODO', '2025-03-18 08:53:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `takenlijst`
--
ALTER TABLE `takenlijst`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `takenlijst`
--
ALTER TABLE `takenlijst`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
