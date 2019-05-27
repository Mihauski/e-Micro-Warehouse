-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Maj 2019, 23:15
-- Wersja serwera: 10.1.30-MariaDB
-- Wersja PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `emw`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nazwa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typ` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `jednostka` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alarm` tinyint(1) DEFAULT '0',
  `uwagi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `stocks`
--

INSERT INTO `stocks` (`id`, `created_at`, `updated_at`, `nazwa`, `typ`, `ilosc`, `jednostka`, `alarm`, `uwagi`) VALUES
(1, '2019-05-22 10:10:04', '2019-05-24 18:36:59', 'Mąka ryżowa', 'Mąka', 20, 'kg', 1, 'Nieopłacona faktura! Opłacić przed zakupem kolejnych!'),
(2, '2019-05-22 16:35:36', '2019-05-27 16:46:53', 'Cukier gruboziarnisty', 'Cukier', 24, 'kg', 0, NULL),
(8, '2019-05-24 16:01:38', '2019-05-27 17:40:59', 'Syrop klonowy', 'Syrop', 22, 'l', 0, 'Zbyt mała lepkość.'),
(12, '2019-05-27 18:19:26', '2019-05-27 18:19:56', 'test3', 'test', 3, 'kg', 1, 'testowa uwaga'),
(13, '2019-05-27 18:20:23', '2019-05-27 18:56:36', 'test4', 'test', 154, 'szt', 0, NULL),
(14, '2019-05-27 18:20:41', '2019-05-27 18:49:40', 'test5', 'test', 5, 'szt', 0, NULL),
(15, '2019-05-27 18:23:53', '2019-05-27 18:58:39', 'test6', 'test', 21, 'l', 0, 'test'),
(17, '2019-05-27 18:50:06', '2019-05-27 18:50:06', 'test8', 'test', 66, 'l', 0, NULL),
(18, '2019-05-27 18:59:51', '2019-05-27 18:59:51', 'Jeszcze inny test', 'testy', 6, 'szt', 0, 'To tylko test, rozejść się.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
