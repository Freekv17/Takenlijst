-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2025 at 12:51 PM
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
  `title` varchar(255) NOT NULL,
  `afdeling` varchar(255) NOT NULL,
  `beschrijving` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `takenlijst`
--

INSERT INTO `takenlijst` (`id`, `user_id`, `title`, `afdeling`, `beschrijving`, `status`, `datetime`, `deadline`) VALUES
(12, 1, '', 'attracties', 'Dit is eventjes test taakje horeca', 'TODO', '2025-03-19 12:44:16', NULL),
(13, 1, '', 'personeel', 'Naar huis', 'TODO', '2025-03-19 12:47:18', NULL),
(14, 1, 'Test Taak', 'inkoop', 'Dit is eventjes test taakje horeca', 'TODO', '2025-03-19 12:49:56', NULL),
(15, 1, 'BOOOM', 'techniek', 'BOOOMBAAAMBOOOMBAAAMBOOOMBAAAM', 'TODO', '2025-03-19 12:51:12', '2025-03-20 00:00:00');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
