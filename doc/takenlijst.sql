-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 01 apr 2025 om 07:03
-- Serverversie: 8.0.30
-- PHP-versie: 8.1.10

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
-- Tabelstructuur voor tabel `takenlijst`
--

CREATE TABLE `takenlijst` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `afdeling` varchar(255) NOT NULL,
  `beschrijving` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `takenlijst`
--

INSERT INTO `takenlijst` (`id`, `user_id`, `title`, `afdeling`, `beschrijving`, `status`, `datetime`, `deadline`) VALUES
(23, 2, 'Teamvergadering plannen', 'klantenservice', 'Bespreek nieuwe doelen', 'doing', '2025-03-24 21:34:00', '2025-04-01'),
(24, 1, 'Bestellingen plaatsen', 'inkoop', 'Nieuwe leveringen regelen', 'done', '2025-03-24 21:34:00', '2025-04-05'),
(26, 1, 'Verkoop evaluatie', 'personeel', 'Analyseer de resultaten', 'doing', '2025-03-24 21:34:00', '2025-04-02'),
(28, 2, 'Klantvragen opvolgen', 'klantenservice', 'Beantwoord e-mails van klanten', 'doing', '2025-03-24 21:34:00', '2025-03-29'),
(29, 1, 'Groenonderhoud plannen', 'groen', 'Tuinonderhoud regelen', 'done', '2025-03-24 21:34:00', NULL),
(31, 1, 'Personeelstraining organiseren', 'personeel', 'Regel een nieuwe training', 'doing', '2025-03-24 21:34:00', '2025-04-03'),
(32, 2, 'Nieuwe menu-items ontwikkelen', 'horeca', 'Werk aan nieuwe gerechten', 'done', '2025-03-24 21:34:00', '2025-04-05'),
(34, 2, 'Promoties ontwikkelen', 'klantenservice', 'Creëer nieuwe promoties', 'doing', '2025-03-24 21:34:00', '2025-04-02'),
(35, 1, 'Vastgoed inspecteren', 'inkoop', 'Inspecteer vastgoed aankopen', 'done', '2025-03-24 21:34:00', '2025-03-30'),
(37, 1, 'Onderhoud apparatuur', 'techniek', 'Controleer de machines', 'todo', '2025-03-24 21:34:00', '2025-03-31'),
(38, 2, 'Klantvragen opvolgen', 'klantenservice', 'Beantwoord e-mails van klanten', 'doing', '2025-03-24 21:34:00', '2025-03-29'),
(39, 1, 'Groenonderhoud plannen', 'groen', 'Tuinonderhoud regelen', 'done', '2025-03-24 21:34:00', NULL),
(40, 2, 'Leveringen controleren', 'inkoop', 'Controleer de inkomende producten', 'todo', '2025-03-24 21:34:00', '2025-04-01'),
(41, 1, 'Personeelstraining organiseren', 'personeel', 'Regel een nieuwe training', 'doing', '2025-03-24 21:34:00', '2025-04-03'),
(42, 2, 'Nieuwe menu-items ontwikkelen', 'horeca', 'Werk aan nieuwe gerechten', 'done', '2025-03-24 21:34:00', '2025-04-05'),
(43, 1, 'Technische support bieden', 'techniek', 'Help met de technische problemen', 'todo', '2025-03-24 21:34:00', NULL),
(44, 2, 'Promoties ontwikkelen', 'klantenservice', 'Creëer nieuwe promoties', 'doing', '2025-03-24 21:34:00', '2025-04-02'),
(45, 1, 'Vastgoed inspecteren', 'inkoop', 'Inspecteer vastgoed aankopen', 'done', '2025-03-24 21:34:00', '2025-03-30'),
(46, 2, 'Veiligheid op attracties', 'attracties', 'Controleer veiligheidsprocedures', 'todo', '2025-03-24 21:34:00', '2025-03-28');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `takenlijst`
--
ALTER TABLE `takenlijst`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `takenlijst`
--
ALTER TABLE `takenlijst`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
