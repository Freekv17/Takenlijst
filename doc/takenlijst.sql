-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2025 at 09:13 AM
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
  `afdeling` varchar(255) NOT NULL,
  `beschrijving` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `takenlijst`
--

INSERT INTO `takenlijst` (`id`, `afdeling`, `beschrijving`, `status`, `datetime`) VALUES
(1, 'horeca', NULL, 'TODO', '2025-03-17 08:49:53'),
(2, 'horeca', NULL, 'TODO', '2025-03-17 08:51:12'),
(3, 'inkoop', NULL, 'TODO', '2025-03-17 08:52:14'),
(4, 'groen', NULL, 'TODO', '2025-03-17 09:09:24'),
(5, 'personeel', NULL, 'TODO', '2025-03-17 09:11:25'),
(6, 'techniek', 'Dit is een beschrijving', 'TODO', '2025-03-17 09:12:30');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
