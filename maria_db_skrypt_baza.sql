-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Gru 2021, 16:10
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `charter_db`
--
CREATE DATABASE IF NOT EXISTS `charter_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci;
USE `charter_db`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `reservation_start` date NOT NULL,
  `reservation_end` date NOT NULL,
  `id_yacht` int(11) NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_polish_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `reservation_start`, `reservation_end`, `id_yacht`, `phone_number`, `name`, `surname`) VALUES
(1, '1000-01-01', '1000-02-02', 3, '123 123 123', 'Ala', 'Makota'),
(2, '1000-01-01', '1000-02-02', 3, '123 123 123', 'Ala', 'Makota'),
(3, '2022-01-01', '2022-02-02', 3, '123 123 123', 'Ala', 'Makota'),
(4, '2023-01-01', '2023-02-02', 3, '123 123 123', 'Ala', 'Makota');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `yacht`
--

CREATE TABLE `yacht` (
  `id_yacht` int(11) NOT NULL,
  `yacht_model` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `price_per_24h_in_pln` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `yacht`
--

INSERT INTO `yacht` (`id_yacht`, `yacht_model`, `price_per_24h_in_pln`) VALUES
(1, 'Twister 800N', 270),
(2, 'Focus 730', 320),
(3, 'Maxus 33', 420),
(4, 'Bavaria 46', 460),
(5, 'Bavaria 36', 510),
(6, 'Lagoon 39', 780);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Indeksy dla tabeli `yacht`
--
ALTER TABLE `yacht`
  ADD PRIMARY KEY (`id_yacht`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `yacht`
--
ALTER TABLE `yacht`
  MODIFY `id_yacht` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
