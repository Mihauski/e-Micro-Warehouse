-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Cze 2019, 21:23
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
-- Struktura tabeli dla tabeli `alarms`
--

CREATE TABLE `alarms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prod_id` int(11) NOT NULL,
  `prog` int(11) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `alarms`
--

INSERT INTO `alarms` (`id`, `created_at`, `updated_at`, `prod_id`, `prog`, `deadline`) VALUES
(3, '2019-05-31 19:12:39', '2019-06-05 18:16:03', 29, 12, NULL),
(13, '2019-05-31 20:53:03', '2019-06-05 18:15:52', 1, 20, NULL),
(16, '2019-05-31 20:56:16', '2019-06-05 18:37:04', 28, NULL, '2019-06-05 22:40:00'),
(22, '2019-06-03 17:26:55', '2019-06-05 18:18:26', 33, 5, '2019-06-05 23:13:00'),
(23, '2019-06-07 16:55:07', '2019-06-07 16:55:07', 26, 5, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_21_111344_create_stock_table', 1),
(4, '2019_05_21_114049_create_alarms_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019-05-22 10:10:04', '2019-06-05 18:15:52', 'Mąka ryżowa', 'Mąka', 20, 'kg', 1, 'Nieopłacona faktura! Opłacić przed zakupem kolejnych!'),
(2, '2019-05-22 16:35:36', '2019-05-28 13:50:01', 'Cukier gruboziarnisty', 'Cukier', 24, 'kg', 0, NULL),
(8, '2019-05-24 16:01:38', '2019-05-27 17:40:59', 'Syrop klonowy', 'Syrop', 22, 'l', 0, 'Zbyt mała lepkość.'),
(21, '2019-05-28 13:50:57', '2019-05-28 16:49:27', 'test10', 'test', 3, 'szt', 0, NULL),
(22, '2019-05-28 13:51:28', '2019-05-28 13:51:28', 'test10', 'test', 52, 'kg', 0, NULL),
(24, '2019-05-28 13:54:01', '2019-05-28 13:54:01', 'test11', 'test', 7, 'ml', 0, 'test'),
(25, '2019-05-31 16:56:43', '2019-05-31 16:56:43', 'test', 'test2', 5, 'g', 0, NULL),
(26, '2019-05-31 16:57:07', '2019-06-07 16:55:07', 'item11', 'test', 25, 'szt', 0, 'test'),
(28, '2019-05-31 19:10:42', '2019-06-05 18:40:20', 'Test autoalarmu (deadline)', 'test', 31, 'szt', 1, 'test123'),
(29, '2019-05-31 19:12:39', '2019-06-05 18:16:03', 'Test autoalarmu (ilosc)', 'test', 12, 'kg', 1, NULL),
(32, '2019-06-03 17:24:41', '2019-06-05 18:51:25', 'test', 'test15', 22, 'szt', 0, 'test'),
(33, '2019-06-03 17:26:55', '2019-06-06 13:24:08', 'test16', 'test', 6, 'szt', 1, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Michał Michalski', 'm.mic.michalski@gmail.com', '$2y$10$N44v2UEYS2FsQ78wUFq6wet4w.fK6fpwL.aG1j/aqB4SaClwtGdn2', NULL, 'fViiIx678Z0KbmqhMqZRKrulhvPsuhPvpLM2KrTfCu0zVi8IUasxTvkok7O1', '2019-05-24 18:57:19', '2019-06-07 16:34:04', 'admin'),
(2, 'Michał', 'czarny.aster@gmail.com', '$2y$10$2azcHwJoEAP9GkAILhYQn.VXWEVioAUA0RQjqJbS6L9uhBvLpt12m', NULL, NULL, '2019-05-24 18:59:55', '2019-05-24 18:59:55', 'user'),
(4, 'Test Iksiński', 'test@test.tes', '$2y$10$dPGRAivkeEU8T7w67ANkF.BmA783XpXw74rIyPvHlCqQ/PKc/2ZOa', NULL, NULL, '2019-06-07 15:41:17', '2019-06-07 15:41:29', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `alarms`
--
ALTER TABLE `alarms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksy dla tabeli `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `alarms`
--
ALTER TABLE `alarms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
