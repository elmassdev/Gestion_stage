-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 10:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameH` varchar(255) NOT NULL,
  `dayH` tinyint(3) UNSIGNED NOT NULL,
  `monthH` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `nameH`, `dayH`, `monthH`, `created_at`, `updated_at`) VALUES
(1, '11 Janvier', 11, 1, '2024-01-11 21:32:41', '2024-01-11 21:32:41'),
(2, 'Nouvel An Amazigh', 14, 1, '2024-01-11 21:32:41', '2024-01-11 21:32:41'),
(3, 'Nouvel An', 1, 1, '2024-01-11 21:32:41', '2024-01-11 21:32:41'),
(4, 'Fête de Travail', 1, 5, '2024-01-11 21:32:41', '2024-01-11 21:32:41'),
(5, 'Fête du Trône', 30, 7, NULL, NULL),
(6, '14 Août', 14, 8, NULL, NULL),
(7, '20 Août', 20, 8, NULL, NULL),
(8, '21 Août', 21, 8, NULL, NULL),
(9, 'Marche verte', 6, 11, NULL, NULL),
(10, 'Independance', 18, 11, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
