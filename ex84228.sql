-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 16 mei 2022 om 17:04
-- Serverversie: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP-versie: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ex84228`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `reisID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `data`
--

INSERT INTO `data` (`id`, `name`, `location`, `reisID`) VALUES
(2, 'Test 1 ', 'test1', 1),
(7, 'Test 2', 'Test2', 2),
(11, 'test 3', 'test3', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inschrijvingen`
--

CREATE TABLE `inschrijvingen` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `studentennummer` int(11) NOT NULL,
  `reisID` int(11) NOT NULL,
  `opmerkingen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reizen`
--

CREATE TABLE `reizen` (
  `reisID` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `bestemming` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `inschrijvingen` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `reizen`
--

INSERT INTO `reizen` (`reisID`, `titel`, `bestemming`, `omschrijving`, `begindatum`, `einddatum`, `inschrijvingen`) VALUES
(1, 'Test project', 'Test', 'Dit is een omschrijving om te testen of alles werkt ', '2022-05-17', '2022-05-19', 10),
(2, 'Test Project', 'Test 1 ', 'Dit is een omschrijving voor de test', '2022-05-16', '2022-05-16', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `naam` varchar(26) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`id`, `level`, `naam`, `wachtwoord`, `email`) VALUES
(1, 2, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@glr.nl'),
(2, 1, 'Gebruiker', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@glr.nl');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`reisID`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reizen`
--
ALTER TABLE `reizen`
  MODIFY `reisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
