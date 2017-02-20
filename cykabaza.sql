-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 03 Lut 2016, 00:01
-- Wersja serwera: 5.6.24
-- Wersja PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `cykabaza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` bigint(20) NOT NULL,
  `imie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nazwisko` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefon` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tor` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `do` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `od` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_rezerwacji` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` smallint(5) unsigned NOT NULL,
  `room_id` smallint(5) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `reservation_from` int(11) NOT NULL,
  `reservation_to` int(11) NOT NULL,
  `ammount_of_days` smallint(6) NOT NULL,
  `ammount_of_people` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `name`, `surname`, `phone`, `reservation_from`, `reservation_to`, `ammount_of_days`, `ammount_of_people`) VALUES
(17, 1, 'sdasdsd', 'sfdbfgn', '456544455', 1454626800, 1454713200, 1, 1),
(18, 1, 'sdasdsd', 'sfdbfgn', '456544455', 1454713200, 1454799600, 1, 1),
(19, 3, 'sdasdsd', 'sfdbfgn', '456544455', 1454713200, 1454886000, 2, 1),
(20, 3, 'sdasdsd', 'sfdbfgn', '456544455', 1454626800, 1455231600, 7, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` smallint(5) unsigned NOT NULL,
  `place_to_store` smallint(6) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rooms`
--

INSERT INTO `rooms` (`id`, `place_to_store`, `image`) VALUES
(1, 2, 'room.jpg'),
(3, 2, 'room2.jpg'),
(4, 2, 'room3.jpg'),
(5, 2, 'room4.jpg'),
(6, 2, 'room5.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`), ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `registration`
--
ALTER TABLE `registration`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
