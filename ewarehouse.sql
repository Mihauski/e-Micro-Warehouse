-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Maj 2019, 11:31
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ewarehouse`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sys_alarms`
--

CREATE TABLE `sys_alarms` (
  `prod_id` int(10) NOT NULL,
  `threshold` int(5) DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sys_stock`
--

CREATE TABLE `sys_stock` (
  `id` int(10) NOT NULL,
  `nazwa` varchar(128) NOT NULL,
  `typ` varchar(128) NOT NULL,
  `ilosc` int(10) NOT NULL,
  `jednostka` varchar(3) NOT NULL,
  `alarm` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sys_users`
--

CREATE TABLE `sys_users` (
  `id` int(10) NOT NULL,
  `login` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `imie` varchar(16) NOT NULL,
  `nazwisko` varchar(32) NOT NULL,
  `rola` varchar(10) NOT NULL DEFAULT 'user',
  `token` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `sys_alarms`
--
ALTER TABLE `sys_alarms`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indeksy dla tabeli `sys_stock`
--
ALTER TABLE `sys_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `sys_stock`
--
ALTER TABLE `sys_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
