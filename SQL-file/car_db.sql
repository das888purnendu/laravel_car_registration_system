-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2020 at 06:59 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_colors`
--

DROP TABLE IF EXISTS `car_colors`;
CREATE TABLE IF NOT EXISTS `car_colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_colors`
--

INSERT INTO `car_colors` (`id`, `color`) VALUES
(1, 'Red'),
(2, 'White'),
(3, 'Blue'),
(4, 'Black'),
(5, 'Orange'),
(6, 'Green'),
(7, 'Black & White'),
(8, 'Red & Black'),
(9, 'Yellow & Black'),
(10, 'Orange & Black');

-- --------------------------------------------------------

--
-- Table structure for table `car_companies`
--

DROP TABLE IF EXISTS `car_companies`;
CREATE TABLE IF NOT EXISTS `car_companies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_companies`
--

INSERT INTO `car_companies` (`id`, `name`) VALUES
(1, 'Honda'),
(2, 'Hyundai'),
(3, 'TATA'),
(4, 'Suzuki'),
(5, 'Toyota'),
(6, 'Mercedes-Benz'),
(7, 'Volvo'),
(8, 'Eicher'),
(9, 'Ashok layland'),
(10, 'Audi'),
(11, 'BMW');

-- --------------------------------------------------------

--
-- Table structure for table `car_maps`
--

DROP TABLE IF EXISTS `car_maps`;
CREATE TABLE IF NOT EXISTS `car_maps` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_code` int NOT NULL,
  `color_code` int NOT NULL,
  `fuel_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_maps`
--

INSERT INTO `car_maps` (`id`, `model_name`, `company_code`, `color_code`, `fuel_type`) VALUES
(1, 'i20', 2, 3, 'petrol'),
(2, 'Swift', 4, 1, 'petrol'),
(3, 'Vista', 3, 2, 'diesel'),
(4, 'Innova', 5, 4, 'diesel');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

DROP TABLE IF EXISTS `car_models`;
CREATE TABLE IF NOT EXISTS `car_models` (
  `id` int NOT NULL AUTO_INCREMENT,
  `body_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `map_id` int NOT NULL,
  `user_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `body_number`, `map_id`, `user_id`, `time`) VALUES
(1, 'I20UZZZZZZ5555555555', 1, NULL, '2020-08-30 09:04:36'),
(2, 'I20UZZZZZZ666666', 1, NULL, '2020-08-30 09:04:36'),
(3, 'SZ111111111111111111', 2, NULL, '2020-08-30 20:36:28'),
(4, 'TA222222222222222222', 3, '10', '2020-08-30 20:36:59'),
(5, 'TO333333333333333333', 4, NULL, '2020-08-30 20:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE IF NOT EXISTS `registrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registration_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `car_model_id` int NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `registration_number`, `car_model_id`, `time`) VALUES
(3, '1598807757', 4, '2020-08-30 22:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unregistered',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `type`, `status`, `created_at`) VALUES
(1, 'Anku Das', 'admin@gmail.com', '1234567890', '$2y$10$eqHYD29o51sHARVqUFsZneR0T0NiERObr80VaR9d2hXl2mb/BExp.', 'admin', 'registered', '2020-08-28 12:07:12'),
(10, 'Purnendu das', 'anku@gmail.com', '2222222222', '$2y$10$sfZMUhuyLwvntZtf8S3S5Oc2i1zW/ZnWGu9bIteNPP9z93xo/Y6YO', 'user', 'registered', '2020-08-30 22:39:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
