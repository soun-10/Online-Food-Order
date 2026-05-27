-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2026 at 05:14 PM
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
-- Database: `online_food_order_app`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_users` ()   BEGIN
  SELECT * FROM customers ORDER BY id ASC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `food_name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT 'Active',
  `photo_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `food_name`, `category`, `status`, `photo_url`, `created_at`) VALUES
(10, 'Pizza', 'FastFoods', 'Active', '20f54ab212649282c07cd61116609cbb.jpg', '2026-03-31 03:55:41'),
(11, 'Pizza', 'FastFoods', 'Active', '20f54ab212649282c07cd61116609cbb.jpg', '2026-03-31 11:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `photo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phonenumber`, `password`, `created_at`, `photo_url`) VALUES
(13, 'Pril Soun', 'sounprill68@gmail.com', '016535593', '$2y$10$dWuGExZTpSCCGf4bnh3xLOW8crddIb1SBBmcRMq7UkiQo8ysKOpkG', '2026-04-06 09:13:12', '1779801885_Soun.jpg'),
(14, 'Sorn Virak', 'sornvirak0@gmail.com', '0989888885', '$2y$10$ciMjrKUqvv3eU0A1IZN2V..AqyDgWtsXtHIq0ma39.VGOuIArxFni', '2026-04-10 11:14:14', '1775819670_96d56f6320ba951fdd1113451a804440.jpg'),
(15, 'Sorn Virak', 'estctrello@gmail.com', '0989888885', '$2y$10$rl4OMFtcSqOXX3LZSSuFAeoebFT46jspTIOP5XIuj99qR.1oWfCri', '2026-04-15 05:20:57', NULL),
(23, 'Sorn Virak', 'sornvirak706@gmail.com', '0989888885', '$2y$10$1P0zzeo.IjyZP3UtlrMTneIXNildG4sBtpCYyOP852ft2BIqgTbGO', '2026-04-15 05:41:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `vehicle` varchar(50) DEFAULT NULL,
  `join_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `driver_name`, `phone`, `dob`, `address`, `vehicle`, `join_date`) VALUES
(2, 'Lou feng', '1221221212', '2026-03-02', 'Earth', 'Motobrike', '2026-03-13 17:00:00'),
(3, 'Sorn Virak', '1111111111', '2026-03-01', 'Earth', 'Motobrike', '2026-03-19 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `new_foods`
--

CREATE TABLE `new_foods` (
  `id` int(11) NOT NULL,
  `food_name_english` varchar(100) DEFAULT NULL,
  `food_name_khmer` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `food_type` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `descrip` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','completed','cancelled') DEFAULT 'pending',
  `payment_method` varchar(50) DEFAULT 'cash',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_amount`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 13, 1.00, 'pending', 'cash', '2026-05-26 13:45:38', '2026-05-26 13:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `food_id`, `quantity`, `price`, `subtotal`, `created_at`) VALUES
(1, 1, 3, 1, 1.00, 1.00, '2026-05-26 13:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `full_name`, `email`, `phone`, `address`, `create_at`) VALUES
(1, 'Sorn Virak', 'sornvirak0@gmail.com', '111111111111', 'Siem Reaap', '2026-03-18 07:26:25'),
(2, 'Sorn Virak', 'sornvirak0@gmail.com', '111111111111', 'Siem Reaap', '2026-03-18 07:26:44'),
(3, 'Sorn Virak', 'sornvirak0@gmail.com', '+855 96 990 8193', 'Siem Reaap', '2026-03-18 07:27:46'),
(5, 'Sorn Virak', 'sornvirak0@gmail.com', '111111111111', 'Siem Reaap', '2026-03-18 07:29:49'),
(16, 'Lou feng ', 'sornvirak706@gmail.com', '21222121', 'Siem Reaap', '2026-03-18 08:13:15'),
(17, 'Lou feng ', 'estctrello@gmail.com', '0909099090', 'Siem Reaap', '2026-03-18 08:26:07'),
(18, 'Sorn Virak', 'sornvirak0@gmail.com', '123456789', 'Siem Reaap', '2026-03-21 08:37:30'),
(19, 'Sorn Virak', 'estctrello@gmail.com', '3233232323', 'Siem Reaap', '2026-03-21 08:39:39'),
(20, 'Sorn Virak', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 09:54:43'),
(21, 'Sorn Virak', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 09:55:15'),
(22, 'Lou feng ', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 10:00:16'),
(23, 'Sorn Virak', 'estctrello@gmail.com', '2332333232', 'Siem Reaap', '2026-03-21 13:37:21'),
(24, 'Sorn Virak', 'sornvirak0@gmail.com', '1111111111', 'Siem Reaap', '2026-03-21 13:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '123', '2026-03-13 08:33:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_foods`
--
ALTER TABLE `new_foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_foods`
--
ALTER TABLE `new_foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `new_foods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `new_foods` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
