-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2026 at 07:23 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food_order_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `food_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','InActive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `photo_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `food_name`, `category`, `status`, `photo_url`, `created_at`) VALUES
(10, 'Pizza', 'FastFoods', 'Active', '20f54ab212649282c07cd61116609cbb.jpg', '2026-03-31 03:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phonenumber`, `password`, `created_at`, `photo_url`) VALUES
(5, 'Pril Soun', 'sounprill68@gmail.com', '016535593', '$2y$10$F1OiUxCVVMOt.DZdCKpWYeDT3KvYkeEF.LX9DwHKNQIqLhEcIv35q', '2026-04-06 07:18:55', '1775460168_Soun.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `driver_name`, `phone`, `dob`, `address`, `vehicle`, `join_date`) VALUES
(3, 'Sorn Virak', '1111111111', '2026-03-01', 'Earth', 'Motobrike', '2026-03-19 17:00:00'),
(2, 'Lou feng', '1221221212', '2026-03-02', 'Earth', 'Motobrike', '2026-03-13 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `new_foods`
--

DROP TABLE IF EXISTS `new_foods`;
CREATE TABLE IF NOT EXISTS `new_foods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `food_name_english` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_name_khmer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `descrip` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_foods`
--

INSERT INTO `new_foods` (`id`, `food_name_english`, `food_name_khmer`, `price`, `photo`, `food_type`, `category_id`, `created_at`, `descrip`) VALUES
(1, 'Big Burger', 'Burger ខ្នាត់ធំ', 21.00, '../../../public/image/category/96d56f6320ba951fdd1113451a804440.jpg', 'Non-Vegetarian', NULL, '2026-03-30 09:44:48', NULL),
(2, 'Nom pom', 'នុំពុម', 1.00, '../../../public/image/category/Phynic.jpg', 'Vegetarian', NULL, '2026-03-30 09:49:13', 'នុំខ្មែរសុទ្ធ'),
(3, 'Nom pom', 'នុំពុម', 1.00, '../../../public/image/newfood/992c8755c24051b84073c594e234a426.jpg', 'Vegetarian', NULL, '2026-03-30 09:57:37', 'vvvv'),
(4, 'Nom pom', 'នុំពុម', 1.00, '../../../public/image/newfood/d0d4839a7fa7d06480aba24f103d6df2.jpg', 'Vegetarian', NULL, '2026-03-30 15:37:09', 'nnnn'),
(5, 'Big Burger', 'Burger ខ្នាត់ធំ', 12.00, '../../../public/image/newfood/96d56f6320ba951fdd1113451a804440.jpg', 'Non-Vegetarian', 1, '2026-03-30 15:58:27', 'wwwwww'),
(6, 'Nom pom', 'នុំពុម', 1.00, '../../../public/image/newfood/96d56f6320ba951fdd1113451a804440.jpg', 'Non-Vegetarian', 2, '2026-03-30 16:47:15', 'rrrr');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

DROP TABLE IF EXISTS `userlogin`;
CREATE TABLE IF NOT EXISTS `userlogin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `full_name`, `email`, `phone`, `address`, `create_at`) VALUES
(1, 'Sorn Virak', 'sornvirak0@gmail.com', '111111111111', 'Siem Reaap', '2026-03-18 07:26:25'),
(2, 'Sorn Virak', 'sornvirak0@gmail.com', '111111111111', 'Siem Reaap', '2026-03-18 07:26:44'),
(3, 'Sorn Virak', 'sornvirak0@gmail.com', '+855 96 990 8193', 'Siem Reaap', '2026-03-18 07:27:46'),
(17, 'Lou feng ', 'estctrello@gmail.com', '0909099090', 'Siem Reaap', '2026-03-18 08:26:07'),
(5, 'Sorn Virak', 'sornvirak0@gmail.com', '111111111111', 'Siem Reaap', '2026-03-18 07:29:49'),
(18, 'Sorn Virak', 'sornvirak0@gmail.com', '123456789', 'Siem Reaap', '2026-03-21 08:37:30'),
(19, 'Sorn Virak', 'estctrello@gmail.com', '3233232323', 'Siem Reaap', '2026-03-21 08:39:39'),
(16, 'Lou feng ', 'sornvirak706@gmail.com', '21222121', 'Siem Reaap', '2026-03-18 08:13:15'),
(20, 'Sorn Virak', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 09:54:43'),
(21, 'Sorn Virak', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 09:55:15'),
(22, 'Lou feng ', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 10:00:16'),
(23, 'Sorn Virak', 'estctrello@gmail.com', '2332333232', 'Siem Reaap', '2026-03-21 13:37:21'),
(24, 'Sorn Virak', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 13:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '123', '2026-03-13 08:33:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
