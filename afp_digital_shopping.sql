-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 02:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afp_digital_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','staff') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `role`, `password`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '019584585655', 'admin', '$2y$10$9Dxz5snuWavYtGZXFcQf1Oebj4CfOlbKpYQ558o9fNsHzxXB0c7Uy', 'Banglamotor Dhaka', 'lamvbdvjcd1655888432.png', '2022-02-24 02:10:48', '2022-06-22 03:00:33'),
(6, 'Hiron', 'hiron@gmail.com', '0195845856555', 'staff', '$2y$10$0WyG3g5uQu8lTUK0DCQvo.YtFODu7RwmuIHsKVYqPiB5Rzk2gDh/W', 'Banglamoro', 'ptadqebmwa1645859225.jpg', '2022-02-26 00:05:32', '2022-02-26 01:07:05'),
(7, 'marif', 'maruf@gmail.com', NULL, 'staff', '$2y$10$mfTkoj0ABmAqiZjIbTgRSuRqxF6Sma1HwZbj0kxwxQm2i92o1R2zm', '', NULL, '2022-02-27 03:08:35', '2022-02-27 03:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('feature','best','new','trending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `type`, `created_at`, `updated_at`) VALUES
(2, 'yxnynj3rju1655811183.png', NULL, 'new', '2022-06-21 05:33:03', '2022-06-21 05:33:03'),
(3, 'pitfhl0htk1655811190.png', NULL, 'trending', '2022-06-21 05:33:11', '2022-06-21 05:33:11'),
(4, 'mrsggzoqi41655811200.png', NULL, 'best', '2022-06-21 05:33:21', '2022-06-21 05:33:21'),
(5, 'ppjvqxdlaz1655812241.jpg', NULL, 'feature', '2022-06-21 05:45:25', '2022-06-21 05:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `user_id`, `order_id`, `customer_email`, `customer_name`, `customer_phone`, `customer_address`, `city`, `zip_code`, `created_at`, `updated_at`) VALUES
(74, 5, 4, 'developer1000486@gmail.com', 'Artsoft Developer', '01964719349', 'Banglamotor Dhaka', 'Dhaka', '1200', '2022-06-21 02:51:21', '2022-06-21 02:51:21'),
(75, 5, 5, 'developer1000486@gmail.com', 'Artsoft Developer', '01964719349', 'Banglamotor Dhaka', 'Dhaka', '1200', '2022-06-21 03:08:14', '2022-06-21 03:08:14'),
(76, 5, 6, 'developer1000486@gmail.com', 'Artsoft Developer', '01964719349', 'Banglamotor Dhaka', 'Dhaka', '1200', '2022-06-21 03:11:17', '2022-06-21 03:11:17'),
(77, 5, 7, 'developer1000486@gmail.com', 'Artsoft Developer', '01964719349', 'Banglamotor Dhaka', 'Dhaka', '1200', '2022-06-21 03:11:24', '2022-06-21 03:11:24'),
(78, 5, 8, 'developer1000486@gmail.com', 'Artsoft Developer', '01964719349', 'Banglamotor Dhaka', 'Dhaka', '1200', '2022-06-21 03:11:56', '2022-06-21 03:11:56'),
(79, 5, 9, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:12:51', '2022-06-21 03:12:51'),
(80, 5, 10, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:17:32', '2022-06-21 03:17:32'),
(81, 5, 11, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:18:10', '2022-06-21 03:18:10'),
(82, 5, 12, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:18:44', '2022-06-21 03:18:44'),
(83, 5, 13, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:19:13', '2022-06-21 03:19:13'),
(84, 5, 14, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:19:43', '2022-06-21 03:19:43'),
(85, 5, 15, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:20:42', '2022-06-21 03:20:42'),
(86, 5, 16, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'fdgdf', 'Rajshahi', '200', '2022-06-21 03:21:16', '2022-06-21 03:21:16'),
(87, 5, 17, 'raselrana1147@gmail.com', 'Rasel Rana', '01964719349', 'sdfdsfgsd', 'Rangpur', 'jhkjhk', '2022-06-22 02:55:39', '2022-06-22 02:55:39'),
(88, 5, 18, 'developer1000486@gmail.com', 'Artsoft Developer', '01964719349', 'Banglamotor Dhaka', 'Dhaka', '1200', '2022-06-22 02:57:18', '2022-06-22 02:57:18'),
(89, 5, 19, 'developer1000486@gmail.com', 'Artsoft Developer', '01964719349', 'Banglamotor Dhaka', 'Dhaka', '1200', '2022-06-25 00:38:00', '2022-06-25 00:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `type` enum('feature','new_arrival','trending','best_sale') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `image`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Easy', 'yz9gisdiki1655638235.png', 0, 'feature', '2021-11-20 02:00:51', '2022-06-19 05:30:36'),
(4, 'SaRa', 'pylru48vjp1655638274.png', 0, 'trending', '2021-11-20 02:02:16', '2022-06-19 05:32:19'),
(5, 'Bata', 'lcnynzu8n91655638284.jpg', 0, 'trending', '2021-11-20 02:02:23', '2022-06-19 05:33:08'),
(6, 'Apex', 'sv28kcg9w11655638296.png', 0, 'best_sale', '2021-11-20 02:02:26', '2022-06-19 05:32:29'),
(9, 'Zara', 'yveodxgzpn1655638175.png', 0, 'best_sale', '2021-11-20 02:03:11', '2022-06-19 05:36:59'),
(10, 'Princed', 'vy5zdfiaud1655638168.png', 0, 'feature', '2021-11-20 02:03:29', '2022-06-19 05:29:28'),
(12, 'Sony', '3y39xj7nc31655638158.png', 0, 'feature', '2021-12-28 06:23:40', '2022-06-19 05:29:19'),
(13, 'nagad', '8he6wxocf61655638149.png', 0, 'new_arrival', '2021-12-28 06:29:46', '2022-06-19 05:32:41'),
(14, 'union', 'wmmgty3ifj1655638140.png', 0, 'best_sale', '2022-02-27 02:01:17', '2022-06-19 05:37:15'),
(15, 'Unilever', 'ymjbnwiwqs1655638133.png', 0, 'new_arrival', '2022-05-07 16:34:43', '2022-06-19 05:28:53'),
(16, 'Square', 'vx21egh8um1655638126.png', 0, 'new_arrival', '2022-05-07 16:36:05', '2022-06-19 05:28:46'),
(17, 'Keya', 'zhjljuimes1655638119.png', 0, 'new_arrival', '2022-05-07 16:37:17', '2022-06-19 05:32:51'),
(18, 'Non Brand', 'djc6nik7bn1655541925.png', 0, 'trending', '2022-06-18 02:45:26', '2022-06-19 05:18:07'),
(19, 'DDD', 'ndb3krx4ny1655639524.png', 0, 'trending', '2022-06-19 05:52:04', '2022-06-19 05:52:04'),
(20, 'DDDD', 'fopmnf7ylc1655639551.png', 0, 'best_sale', '2022-06-19 05:52:31', '2022-06-19 05:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_flash_deal` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=not flash deal,1=flash deal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `coupon_id`, `user_id`, `ip_address`, `quantity`, `color`, `size`, `is_flash_deal`, `created_at`, `updated_at`) VALUES
(244, 23, NULL, 5, '::1', 1, NULL, NULL, 0, '2022-06-29 01:22:26', '2022-06-29 01:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Electronics', 'ypepsjqhzv1637146436.jpg', 0, '2021-11-17 04:53:56', '2021-11-17 04:53:56'),
(6, 'Furniture', 'pyvp3up9py1637146840.jpg', 0, '2021-11-17 05:00:41', '2021-11-17 05:00:41'),
(7, 'Cooking', 'dbrouqs59k1651962410.jpeg', 0, '2021-11-17 05:01:04', '2022-05-07 16:26:50'),
(8, 'Clothing', 'crmqclteqr1637146904.jpg', 0, '2021-11-17 05:01:45', '2021-11-17 05:01:45'),
(9, 'Home Appliances', '6t7rwwyxw21651962247.jpeg', 0, '2021-11-17 05:02:24', '2022-05-07 16:24:07'),
(10, 'Healthy & Beauty', 'u6fn3hj1fj1652874635.jpg', 0, '2021-11-17 05:02:34', '2022-05-18 05:50:36'),
(17, 'Nutrition', 'qo8gkjecsp1646166911.jpg', 0, '2022-03-01 14:35:11', '2022-03-01 14:35:11'),
(18, 'Food & Suppliment', NULL, 0, '2022-06-21 04:36:57', '2022-06-21 04:36:57'),
(19, 'Mom & Baby', NULL, 0, '2022-06-21 04:37:12', '2022-06-21 04:37:12'),
(20, 'Medicine and Treatment', NULL, 0, '2022-06-21 04:38:21', '2022-06-21 04:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `child_cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_categories`
--

INSERT INTO `child_categories` (`id`, `sub_category_id`, `child_cat_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 13, 'New Arrival', NULL, 0, '2021-11-20 01:06:10', '2021-11-20 01:16:28'),
(6, 13, 'All test', NULL, 0, '2021-11-20 01:06:10', '2021-11-20 01:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `compare_lists`
--

CREATE TABLE `compare_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compare_lists`
--

INSERT INTO `compare_lists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(26, 56, 5, '2022-05-22 05:53:29', '2022-05-22 05:53:29'),
(27, 56, 6, '2022-05-22 05:53:30', '2022-05-22 05:53:30'),
(28, 56, 8, '2022-05-22 05:53:31', '2022-05-22 05:53:31'),
(29, 56, 17, '2022-05-22 06:07:46', '2022-05-22 06:07:46'),
(30, 56, 13, '2022-05-22 06:07:54', '2022-05-22 06:07:54'),
(31, 57, 17, '2022-05-25 06:11:39', '2022-05-25 06:11:39'),
(32, 57, 8, '2022-05-25 06:12:27', '2022-05-25 06:12:27'),
(33, 57, 20, '2022-05-25 06:12:31', '2022-05-25 06:12:31'),
(34, 57, 22, '2022-05-30 04:16:49', '2022-05-30 04:16:49'),
(35, 1, 17, '2022-06-05 06:41:24', '2022-06-05 06:41:24'),
(36, 1, 21, '2022-06-05 06:41:28', '2022-06-05 06:41:28'),
(37, 1, 19, '2022-06-05 06:41:42', '2022-06-05 06:41:42'),
(38, 1, 16, '2022-06-05 06:41:51', '2022-06-05 06:41:51'),
(39, 1, 18, '2022-06-05 06:41:53', '2022-06-05 06:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_amount` double(11,2) NOT NULL,
  `discount` double(11,2) NOT NULL DEFAULT 0.00,
  `type` enum('flat','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `coupon_code`, `description`, `shopping_amount`, `discount`, `type`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Baishak', 'CO964714', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 800.00, 10.00, 'percent', '2022-01-24', '2022-02-13', 0, '2022-01-25 00:35:52', '2022-01-25 00:35:52'),
(9, 'sds', 'CO635264', 'sddsd\"', 222.00, 22.00, 'percent', '2022-05-31', '2022-02-12', 0, '2022-02-08 23:06:45', '2022-05-08 05:01:53'),
(10, '111', 'CO151834', 'sasdsd', 11.00, 11.00, 'percent', '2022-02-12', '2022-02-12', 0, '2022-02-08 23:07:31', '2022-02-08 23:07:31'),
(11, 'eee', 'CO844610', 'ddsfsd', 33.00, 22.00, 'flat', '2022-02-12', '2022-02-12', 0, '2022-02-09 01:12:15', '2022-02-09 01:12:15'),
(12, 'Big save', 'CO987715', 'sdadsads', 5000.00, 10.00, 'percent', '2022-02-12', '2022-02-19', 0, '2022-02-09 01:24:47', '2022-02-09 01:24:47'),
(13, 'Big save', 'CO285287', 'dsdsd\"\"\"\"', 500.00, 150.00, 'flat', '2022-05-08', '2022-05-31', 0, '2022-02-09 01:26:08', '2022-05-08 05:02:10'),
(14, 'Ramadan', 'CO887514', 'cfjdshfjsdhgjfdhgjdfh\"\"', 500.00, 10.00, 'flat', '2022-04-17', '2022-04-30', 0, '2022-02-27 02:40:53', '2022-04-17 03:38:41'),
(15, 'test', 'CO324651', 'kjhghg\"\"', 500.00, 10.00, 'percent', '2022-04-17', '2022-04-30', 0, '2022-02-27 02:46:02', '2022-04-17 03:38:26'),
(16, 'hggc', 'CO326123', 'hhg\"\"\"\"', 1000.00, 10.00, 'flat', '2022-04-17', '2022-05-31', 0, '2022-02-28 23:22:25', '2022-05-08 05:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(44, 16, 'b5sa4lkglg1645702661.jpeg', '2022-02-24 05:37:41', '2022-02-24 05:37:41'),
(45, 17, 'sajifnk8j01645949693.jpeg', '2022-02-27 02:14:54', '2022-02-27 02:14:54'),
(46, 16, 'o8gmvlpulc1645949816.jpeg', '2022-02-27 02:16:56', '2022-02-27 02:16:56'),
(47, 16, 'b5zm4rckrp1645949894.jpeg', '2022-02-27 02:18:14', '2022-02-27 02:18:14'),
(48, 21, 'nlvrrnitjs1652095144.jpg', '2022-05-09 05:19:05', '2022-05-09 05:19:05'),
(49, 7, 'l5ijrbumah1652095177.jpg', '2022-05-09 05:19:38', '2022-05-09 05:19:38'),
(50, 24, 'v9gqt5mcfq1655549656.jpg', '2022-06-18 04:20:24', '2022-06-18 04:54:17'),
(52, 18, 'usi7cn36no1655708896.jpg', '2022-06-20 01:08:18', '2022-06-20 01:08:18'),
(53, 18, 'kvzf17nwis1655708905.jpg', '2022-06-20 01:08:26', '2022-06-20 01:08:26'),
(54, 18, 'ahtbvcq4na1655708913.jpg', '2022-06-20 01:08:34', '2022-06-20 01:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` double(11,2) DEFAULT NULL,
  `shipping_charge` double(11,2) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_api_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `favicon`, `site_name`, `tax`, `shipping_charge`, `title`, `copyright`, `currency`, `default_image`, `company_address`, `description`, `firebase_api_key`, `company_phone`, `company_email`, `created_at`, `updated_at`) VALUES
(1, 'pdsr8mnkjk1655972671.png', NULL, 'TunaTuni', 10.00, 40.00, '70', NULL, '৳', 'default.png', NULL, NULL, 'AAAAV_mMv6Y:APA91bGshXdTfy0g4DXsauiuyUxSxU0Is9icF3zl-V5nkHHaNiYK2pR04TuT_0ZHEEkvKMeDdAqIK1UrZtESOHNAkXTUMCQDcvogsdbQbfNTO2f0vGfg2tYNcjcwkxq-qQi5gcm4PKgG', NULL, NULL, NULL, '2022-06-23 02:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `meta_name`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 'tax', '10', NULL, NULL),
(2, 'shipping_charge', '70', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_11_14_043524_create_categories_table', 1),
(8, '2021_11_14_055113_create_sub_categories_table', 1),
(9, '2021_11_14_055538_create_child_categories_table', 1),
(10, '2021_11_14_055749_create_brands_table', 1),
(13, '2021_11_14_062055_create_galleries_table', 1),
(17, '2021_11_14_063158_create_payments_table', 1),
(24, '2021_11_29_073008_create_metas_table', 4),
(25, '2021_11_29_073410_create_general_settings_table', 5),
(26, '2021_11_30_094613_create_payment_details_table', 6),
(28, '2021_12_05_071229_create_wishlists_table', 8),
(35, '2022_01_25_044127_create_coupons_table', 10),
(38, '2021_11_14_064415_create_carts_table', 12),
(43, '2021_11_14_070415_create_billing_details_table', 14),
(45, '2021_11_14_065723_create_order_details_table', 15),
(46, '2022_02_01_120437_create_compare_lists_table', 16),
(47, '2022_02_06_064013_create_sliders_table', 17),
(49, '2021_11_12_170427_create_admins_table', 19),
(50, '2021_11_14_060250_create_products_table', 20),
(51, '2022_05_30_092808_create_social_links_table', 21),
(52, '2014_10_12_000000_create_users_table', 22),
(53, '2022_06_15_085634_create_sellers_table', 23),
(54, '2022_06_15_090059_create_shops_table', 24),
(55, '2021_11_14_065140_create_orders_table', 25),
(56, '2022_06_21_103951_create_banners_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `tax` double(4,2) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `shipping_charge` double(8,2) NOT NULL,
  `grand_total` double(11,2) NOT NULL,
  `total_item_total` double(11,2) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cash_on_delivery` tinyint(4) DEFAULT NULL,
  `status` enum('pending','processing','confirmed','delivered','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `coupon_id`, `quantity`, `amount`, `tax`, `sub_total`, `shipping_charge`, `grand_total`, `total_item_total`, `order_number`, `transaction_number`, `order_note`, `cash_on_delivery`, `status`, `created_at`, `updated_at`) VALUES
(4, 5, 7, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '61215', '1245842668852225555', 'THis is very argent', NULL, 'pending', '2022-06-21 02:51:21', '2022-06-21 02:51:21'),
(5, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '93145', '1245842668852225555', NULL, NULL, 'pending', '2022-06-21 03:08:14', '2022-06-21 03:08:14'),
(6, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '89664', '1245842668852225555', NULL, NULL, 'pending', '2022-06-21 03:11:17', '2022-06-21 03:11:17'),
(7, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '78648', '1245842668852225555', NULL, NULL, 'pending', '2022-06-21 03:11:24', '2022-06-21 03:11:24'),
(8, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '76186', '1245842668852225555', NULL, NULL, 'pending', '2022-06-21 03:11:56', '2022-06-21 03:11:56'),
(9, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '90125', NULL, NULL, NULL, 'declined', '2022-06-21 03:12:51', '2022-06-22 02:58:19'),
(10, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '81838', NULL, NULL, NULL, 'pending', '2022-06-21 03:17:32', '2022-06-21 03:17:32'),
(11, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '61086', NULL, NULL, NULL, 'confirmed', '2022-06-21 03:18:10', '2022-06-22 02:58:15'),
(12, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '15824', NULL, NULL, NULL, 'pending', '2022-06-21 03:18:44', '2022-06-21 03:18:44'),
(13, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '17825', NULL, NULL, NULL, 'delivered', '2022-06-21 03:19:13', '2022-06-22 02:58:14'),
(14, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '77721', NULL, NULL, NULL, 'pending', '2022-06-21 03:19:43', '2022-06-21 03:19:43'),
(15, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '15911', NULL, NULL, NULL, 'pending', '2022-06-21 03:20:42', '2022-06-21 03:20:42'),
(16, 5, 8, NULL, 3, 5300.00, 50.00, 5300.00, 70.00, 5420.00, 5300.00, '33098', NULL, NULL, NULL, 'confirmed', '2022-06-21 03:21:16', '2022-06-22 02:58:17'),
(17, 5, 9, NULL, 2, 10200.00, 50.00, 10200.00, 70.00, 10320.00, 10200.00, '62949', '1245842668852225555', NULL, NULL, 'delivered', '2022-06-22 02:55:38', '2022-06-22 02:58:12'),
(18, 5, 8, NULL, 2, 10200.00, 50.00, 10200.00, 70.00, 10320.00, 10200.00, '10579', NULL, 'fdsf', NULL, 'confirmed', '2022-06-22 02:57:18', '2022-06-22 02:58:10'),
(19, 5, 8, NULL, 2, 5200.00, 99.99, 5200.00, 40.00, 5760.00, 5200.00, '16985', NULL, NULL, NULL, 'pending', '2022-06-25 00:37:59', '2022-06-25 00:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `order_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(167, 5, 4, 23, 1, '2022-06-21 02:51:21', '2022-06-21 02:51:21'),
(168, 5, 4, 21, 1, '2022-06-21 02:51:21', '2022-06-21 02:51:21'),
(169, 5, 4, 22, 1, '2022-06-21 02:51:21', '2022-06-21 02:51:21'),
(170, 5, 5, 23, 1, '2022-06-21 03:08:14', '2022-06-21 03:08:14'),
(171, 5, 5, 21, 1, '2022-06-21 03:08:14', '2022-06-21 03:08:14'),
(172, 5, 5, 22, 1, '2022-06-21 03:08:14', '2022-06-21 03:08:14'),
(173, 5, 6, 23, 1, '2022-06-21 03:11:17', '2022-06-21 03:11:17'),
(174, 5, 6, 21, 1, '2022-06-21 03:11:17', '2022-06-21 03:11:17'),
(175, 5, 6, 22, 1, '2022-06-21 03:11:17', '2022-06-21 03:11:17'),
(176, 5, 7, 23, 1, '2022-06-21 03:11:24', '2022-06-21 03:11:24'),
(177, 5, 7, 21, 1, '2022-06-21 03:11:24', '2022-06-21 03:11:24'),
(178, 5, 7, 22, 1, '2022-06-21 03:11:24', '2022-06-21 03:11:24'),
(179, 5, 8, 23, 1, '2022-06-21 03:11:56', '2022-06-21 03:11:56'),
(180, 5, 8, 21, 1, '2022-06-21 03:11:56', '2022-06-21 03:11:56'),
(181, 5, 8, 22, 1, '2022-06-21 03:11:56', '2022-06-21 03:11:56'),
(182, 5, 9, 23, 1, '2022-06-21 03:12:51', '2022-06-21 03:12:51'),
(183, 5, 9, 21, 1, '2022-06-21 03:12:51', '2022-06-21 03:12:51'),
(184, 5, 9, 22, 1, '2022-06-21 03:12:51', '2022-06-21 03:12:51'),
(185, 5, 10, 23, 1, '2022-06-21 03:17:32', '2022-06-21 03:17:32'),
(186, 5, 10, 21, 1, '2022-06-21 03:17:32', '2022-06-21 03:17:32'),
(187, 5, 10, 22, 1, '2022-06-21 03:17:32', '2022-06-21 03:17:32'),
(188, 5, 11, 23, 1, '2022-06-21 03:18:10', '2022-06-21 03:18:10'),
(189, 5, 11, 21, 1, '2022-06-21 03:18:10', '2022-06-21 03:18:10'),
(190, 5, 11, 22, 1, '2022-06-21 03:18:10', '2022-06-21 03:18:10'),
(191, 5, 12, 23, 1, '2022-06-21 03:18:44', '2022-06-21 03:18:44'),
(192, 5, 12, 21, 1, '2022-06-21 03:18:44', '2022-06-21 03:18:44'),
(193, 5, 12, 22, 1, '2022-06-21 03:18:44', '2022-06-21 03:18:44'),
(194, 5, 13, 23, 1, '2022-06-21 03:19:13', '2022-06-21 03:19:13'),
(195, 5, 13, 21, 1, '2022-06-21 03:19:13', '2022-06-21 03:19:13'),
(196, 5, 13, 22, 1, '2022-06-21 03:19:13', '2022-06-21 03:19:13'),
(197, 5, 14, 23, 1, '2022-06-21 03:19:43', '2022-06-21 03:19:43'),
(198, 5, 14, 21, 1, '2022-06-21 03:19:43', '2022-06-21 03:19:43'),
(199, 5, 14, 22, 1, '2022-06-21 03:19:43', '2022-06-21 03:19:43'),
(200, 5, 15, 23, 1, '2022-06-21 03:20:42', '2022-06-21 03:20:42'),
(201, 5, 15, 21, 1, '2022-06-21 03:20:42', '2022-06-21 03:20:42'),
(202, 5, 15, 22, 1, '2022-06-21 03:20:42', '2022-06-21 03:20:42'),
(203, 5, 16, 23, 1, '2022-06-21 03:21:16', '2022-06-21 03:21:16'),
(204, 5, 16, 21, 1, '2022-06-21 03:21:16', '2022-06-21 03:21:16'),
(205, 5, 16, 22, 1, '2022-06-21 03:21:16', '2022-06-21 03:21:16'),
(206, 5, 17, 22, 2, '2022-06-22 02:55:38', '2022-06-22 02:55:38'),
(207, 5, 17, 21, 1, '2022-06-22 02:55:39', '2022-06-22 02:55:39'),
(208, 5, 18, 22, 2, '2022-06-22 02:57:18', '2022-06-22 02:57:18'),
(209, 5, 18, 21, 1, '2022-06-22 02:57:18', '2022-06-22 02:57:18'),
(210, 5, 19, 22, 1, '2022-06-25 00:37:59', '2022-06-25 00:37:59'),
(211, 5, 19, 21, 1, '2022-06-25 00:38:00', '2022-06-25 00:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('personal','agent','mmerchant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'personal',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active=1inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_name`, `account_number`, `ref_number`, `image`, `type`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Bkash', '01964719349', '1234', 'fmilmjfeew1643703910.png', 'personal', 0, '2022-02-01 02:25:11', '2022-06-23 01:19:49'),
(8, 'Cash one Delivery', NULL, NULL, NULL, 'personal', 0, '2022-02-01 02:25:41', '2022-02-01 02:25:41'),
(9, 'Roket', '01620193118', '123', 'ynlygjd3se1643704075.jpg', 'personal', 0, '2022-02-01 02:27:55', '2022-06-23 01:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `previous_price` double(11,5) NOT NULL DEFAULT 0.00000,
  `current_price` double(11,5) NOT NULL DEFAULT 0.00000,
  `discount` double(11,2) NOT NULL DEFAULT 0.00,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_order` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ordered_at` timestamp NULL DEFAULT NULL,
  `sale_type` enum('retail','whole') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'retail',
  `whole_sale_quantity` int(11) DEFAULT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_policy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flash_deal` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=flash deal,1=Not Flash deal',
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(11,2) DEFAULT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=featured,1=Not Featured',
  `best_sale` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=best sale,1=Not Best sale',
  `hot` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=hot,1=Not Hot',
  `top_sale` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=top sale,1=Not top sale',
  `big_save` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=big save,1=Not Big save',
  `new_arrival` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=new arrival,1=Not New arrival',
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=trending,1=Not Trending',
  `publish` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Publish,1=NotPublish',
  `check_attributes` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=yes,1=no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `author_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `previous_price`, `current_price`, `discount`, `thumbnail`, `slug`, `view`, `model`, `total_order`, `stock`, `size`, `color`, `last_ordered_at`, `sale_type`, `whole_sale_quantity`, `tag`, `meta_title`, `meta_keyword`, `meta_description`, `description`, `specification`, `return_policy`, `flash_deal`, `end_date`, `price`, `featured`, `best_sale`, `hot`, `top_sale`, `big_save`, `new_arrival`, `trending`, `publish`, `check_attributes`, `created_at`, `updated_at`) VALUES
(1, 'Half Silk Saree for Women', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 8, NULL, 7, 5000.00000, 5000.00000, 0.00, 'ppo0lnlzbw1645702562.jpg', 'half-silk-saree-for-women-nor1sw0', 0, '83419', 2, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"ds\",\"dfwf\",\"fwefr\",\"rew\"]', 'this is for seo', '[\"fdsf\",\"rewqr\",\"rewr\",\"rwer\"]', '<p>fsdfds</p>', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 04:50:23', '2022-06-13 02:30:07'),
(2, 'this is test product', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 5, 5, NULL, 4, 4000.00000, 4000.00000, 0.00, 'eqrgryfsgx1653906956.jpg', 'this-is-test-product-lqx2cc2', 0, '93983', 1, NULL, NULL, NULL, NULL, 'retail', 10, '[\"this\",\"is\",\"new\",\"p\"]', 'this is for seo', '[\"dsd\",\"dsa\"]', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 1, 0, 0, '2022-02-24 04:54:04', '2022-06-13 02:30:04'),
(3, 'this is test product', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 8, 13, 3, 10, 10000.00000, 1000.00000, 0.00, 'eitxs00joe1645702518.jpg', 'this-is-test-product-9rh3fnc', 0, '48738', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"csaf\",\"fdsfg\",\"gfdg\"]', 'this is for seo', '[\"gfg\",\"gfd\"]', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 04:57:24', '2022-06-13 02:29:57'),
(4, 'baby fashion', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 5, 5, NULL, 5, 500.00000, 500.00000, 0.00, 'i4dtaunymd1645702491.jpg', 'baby-fashion-mlw4gqy', 0, '46443', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fdgf\",\"tret\",\"terter\",\"tt\",\"tert35tfgds\",\"gfdgdf\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 04:59:24', '2022-06-13 02:29:45'),
(5, 'Half Silk Saree for Women', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 8, 14, NULL, 4, 5000.00000, 500.00000, 0.00, 's1lghqseij1645702459.jpg', 'half-silk-saree-for-women-rmz53pg', 0, '81214', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"gfdg\",\"gfdsg\",\"werew\",\"rwe\",\"ewqe\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:00:45', '2022-06-13 02:29:42'),
(6, 'this is test product', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 8, 13, 3, 6, 7000.00000, 7000.00000, 0.00, 'jpgih89yz51645702409.jpg', 'this-is-test-product-8sn6obs', 0, '11775', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"dsdsa\",\"dsadf\",\"sdrewrew\"]', 'fdf', '[\"fdfg\",\"gdfg\",\"rwet\"]', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:03:38', '2022-06-13 02:29:51'),
(7, 'test new product new', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 9, NULL, 9, 500.00000, 499.00000, 0.00, 'exxgxywlws1653906930.jpg', 'test-new-product-new-nhm7tby', 0, '62658', 0, NULL, NULL, NULL, NULL, 'retail', 20, '[\"dsadf\",\"fdsf\",\"fsdf\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:04:41', '2022-06-13 02:29:38'),
(8, 'this is test product', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 9, NULL, 4, 7000.00000, 7000.00000, 0.00, 'wbvusfzpbe1645702327.jpg', 'this-is-test-product-7ru82ju', 0, '55089', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"dasd\",\"fdsaf\",\"fasf\",\"wqeewq\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:06:20', '2022-06-13 02:29:35'),
(9, 'this is test product', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 8, NULL, 4, 1000.00000, 1000.00000, 0.00, 'uebvmmzs5c1653906904.jpg', 'this-is-test-product-dyi9fth', 0, '49048', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"dxsdsa\",\"dsaf\",\"fdsaf\",\"fdsf\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:08:35', '2022-06-13 02:29:32'),
(10, 'Half Silk Saree for Women', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 9, NULL, 9, 1999.00000, 1999.00000, 0.00, '9ssqwdqipi1653906883.jpg', 'half-silk-saree-for-women-ngo10xqn', 0, '74826', 2, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"cvdsfsd\",\"gsfdg\",\"fsedfsd\",\"fdsa\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:11:26', '2022-06-13 02:29:28'),
(11, 'Half Silk Saree for Women', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 9, NULL, 5, 1000.00000, 1000.00000, 0.00, 'rjs6elemi01653906863.jpg', 'half-silk-saree-for-women-tbo11n5x', 0, '64069', 1, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fdsf\",\"gdfg\",\"rew\",\"rwe\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:13:25', '2022-06-13 02:29:25'),
(12, 'this is test product', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 8, 13, 3, 1, 4000.00000, 4000.00000, 0.00, '5ngzibwf8x1653906816.jpg', 'this-is-test-product-z4912vfx', 0, '73976', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fds\",\"fgdsfg\",\"rwer\",\"rew\"]', NULL, NULL, NULL, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:14:47', '2022-06-13 02:29:21'),
(13, 'he standard Lorem Ipsum passage', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 12, NULL, NULL, 10, 10000.00000, 1000.00000, 0.00, 'awe3aykwdv1653906804.jpg', 'he-standard-lorem-ipsum-passage-uka13hqz', 0, '78902', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fdsg\",\"gfdg\",\"gdf\"]', NULL, NULL, NULL, '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:19:08', '2022-06-13 02:29:06'),
(14, 'Finibus Bonorum et Malorum', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 7, 11, NULL, 4, 200.00000, 200.00000, 0.00, 'j5gk517hls1653906760.jpg', 'finibus-bonorum-et-malorum-bkp14ns9', 0, '91975', 1, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fdsf\",\"gfdsgd\",\"rewr\"]', NULL, NULL, NULL, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:20:31', '2022-06-13 02:29:02'),
(15, 'translation by H. Rackham', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 7, NULL, 6, 100.00000, 100.00000, 0.00, 'tohsx8unn21653906749.jpg', 'translation-by-h-rackham-laa15hxk', 0, '62960', 2, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fdsf\",\"gfdg\",\"rwe\",\"re\",\"fsdf\",\"rwevxcv\",\"gfdsg\",\"sadasdas\"]', NULL, NULL, NULL, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:21:37', '2022-06-13 02:28:58'),
(16, 'translation by H. Rackham', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 6, 9, NULL, 6, 420.00000, 420.00000, 0.00, '3xi1sg5hwz1653906738.jpg', 'translation-by-h-rackham-ruu16k0u', 0, '73301', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fgrfg\",\"gh\",\"rfsedfg\"]', NULL, NULL, NULL, 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains', '<h3 style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><span style=\"font-weight: 400; text-align: justify;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</span><br></h3>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains</span><br></p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-24 05:22:54', '2022-06-13 02:28:54');
INSERT INTO `products` (`id`, `name`, `title`, `author_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `previous_price`, `current_price`, `discount`, `thumbnail`, `slug`, `view`, `model`, `total_order`, `stock`, `size`, `color`, `last_ordered_at`, `sale_type`, `whole_sale_quantity`, `tag`, `meta_title`, `meta_keyword`, `meta_description`, `description`, `specification`, `return_policy`, `flash_deal`, `end_date`, `price`, `featured`, `best_sale`, `hot`, `top_sale`, `big_save`, `new_arrival`, `trending`, `publish`, `check_attributes`, `created_at`, `updated_at`) VALUES
(17, 'alovara shampui', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 10, 20, NULL, 14, 400.00000, 400.00000, 10.00, 'fsvqnmeuxp1653906728.jpg', 'alovara-shampui-r8t17bnk', 0, '19602', 1, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"tag\",\"raf\"]', 'ecoome3rce site bd', '[\"jsdff\",\"fds\",\"gfd\"]', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 0, '2022-06-18', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-27 02:09:12', '2022-06-13 02:28:50'),
(18, 'test', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 7, 11, NULL, 1, 500.00000, 500.00000, 0.00, 'nirecqj5k51653906715.jpg', 'test-wmt18gbd', 0, '17776', 0, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"xsds\"]', NULL, NULL, NULL, 'hgfhhgfhfg', '<p>hgfh</p>', '<p>hgf</p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-02-28 23:02:39', '2022-06-13 02:28:46'),
(19, 'Union Honey', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 17, NULL, NULL, 14, 750.00000, 700.00000, 10.00, '7g6mrafnb51653906704.jpg', 'union-honey-jrj19alg', 0, '92514', 2, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"Union\",\"Honey\"]', NULL, NULL, NULL, 'yt', '<p>yjtfy</p>', '<p>u76i</p>', 0, '2022-06-18', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-03-01 14:42:19', '2022-06-13 00:36:24');
INSERT INTO `products` (`id`, `name`, `title`, `author_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `previous_price`, `current_price`, `discount`, `thumbnail`, `slug`, `view`, `model`, `total_order`, `stock`, `size`, `color`, `last_ordered_at`, `sale_type`, `whole_sale_quantity`, `tag`, `meta_title`, `meta_keyword`, `meta_description`, `description`, `specification`, `return_policy`, `flash_deal`, `end_date`, `price`, `featured`, `best_sale`, `hot`, `top_sale`, `big_save`, `new_arrival`, `trending`, `publish`, `check_attributes`, `created_at`, `updated_at`) VALUES
(20, 'Relax Tone Spain', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod	                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni', 1, 10, 20, NULL, 14, 1480.00000, 1480.00000, 10.00, '44i6z8nw7v1653906467.jpg', 'relax-tone-spain-body-massager-tct20xik', 0, '13072', 1, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"#beauty\",\"#skin\",\"#therapy\",\"#massger\"]', NULL, NULL, NULL, 'Very nice products', '<p><img src=\"data:image/jpeg;base64,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\" style=\"width: 238px;\" data-filename=\"IMG-20220507-WA0014.jpg\"><br></p>', '<p>Good products</p>', 0, '2022-06-18', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-05-07 09:32:17', '2022-06-13 02:28:25');
INSERT INTO `products` (`id`, `name`, `title`, `author_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `previous_price`, `current_price`, `discount`, `thumbnail`, `slug`, `view`, `model`, `total_order`, `stock`, `size`, `color`, `last_ordered_at`, `sale_type`, `whole_sale_quantity`, `tag`, `meta_title`, `meta_keyword`, `meta_description`, `description`, `specification`, `return_policy`, `flash_deal`, `end_date`, `price`, `featured`, `best_sale`, `hot`, `top_sale`, `big_save`, `new_arrival`, `trending`, `publish`, `check_attributes`, `created_at`, `updated_at`) VALUES
(21, 'Union', 'orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod sadfsdfdsdsada                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim a', 1, 10, NULL, NULL, 14, 250.00000, 200.00000, 0.00, 'eaqtsbcxvm1653906428.png', 'union-tbu21fb4', 0, '49290', 2, NULL, NULL, NULL, NULL, 'retail', 10, '[\"#union\"]', NULL, NULL, NULL, 'ত্বকের উজ্জ্বল বৃদ্ধি করে ১০০% গ্যারান্টি', '<p>আগে ব্যবহার করুন পরে বিশ্বাস করুন</p>', '<p>মানিব্যাগ গ্যারান্টি</p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-05-07 17:03:00', '2022-06-23 02:49:46'),
(22, 'my test', 'fdsf fdsfs', 1, 17, NULL, NULL, 15, 5000.00000, 5000.00000, 0.00, 'z9rjbkmaiz1653906407.jpg', 'my-test-9fd22axa', 0, '21737', 2, NULL, NULL, NULL, NULL, 'retail', NULL, '[\"fgdg\"]', 'fdgfdg', '[\"gdfg\",\"gdfs\"]', '<p>gdfg</p>', 'gdfgdfg', '<p>gdfg</p>', '<p>gfdg</p>', 1, NULL, NULL, 0, 1, 0, 0, 0, 1, 0, 0, 0, '2022-05-24 02:07:33', '2022-06-22 02:58:14'),
(23, 'New seller product updated', 'This is new seller product for me', 1, 17, NULL, NULL, 18, 1000.00000, 100.00000, 0.00, 'xwlvqyry3x1655636560.jpg', 'new-seller-product-yaj23piz', 0, '41426', 1, NULL, '[\"m\",\"l\",\"s\"]', '[\"RED\",\"BLUE\"]', NULL, 'retail', NULL, '[\"Tag\",\"seller\",\"new\"]', NULL, NULL, NULL, 'vcgvfgd', '<p>gdfg</p>', '<p>gfdg</p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-18 02:50:59', '2022-06-22 02:58:14'),
(24, 'Test seller product', 'Test seller product', 1, 17, NULL, NULL, 18, 100.00000, 100.10000, 0.00, 'uuyz8fedg11655636575.jpg', 'test-seller-product-tlc24rzw', 0, '78243', 0, NULL, '[\"M\",\"L\",\"Xl\"]', '[\"Red\",\"Blue\"]', NULL, 'retail', NULL, '[\"cxzc\",\"fvsd\"]', NULL, NULL, NULL, 'gfgdf', '<p>gdfgd</p>', '<p>gdfg</p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, '2022-06-18 03:38:35', '2022-06-25 05:47:15'),
(25, 'Artsoft Developer', 'bvcbn', 1, 18, NULL, NULL, 1, 0.01000, 0.01000, 0.00, 'a8l0lxivzf1656139824.jpg', 'artsoft-developer-li625r8e', 0, '62963', 0, NULL, '[\"fgjy\"]', '[\"vdsfg\"]', NULL, 'retail', NULL, '[\"dcsaf\",\"fds\",\"gsdfg\"]', NULL, NULL, NULL, '<p>hfg</p>', '<p>hfg</p>', '<p>hfg</p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2022-06-25 00:50:25', '2022-06-25 00:50:25'),
(26, 'Artsoft Developer', 'dcdd', 1, 17, NULL, NULL, 4, 0.25500, 0.00100, 0.00, 'tc5pdnhw2r1656141718.jpg', 'artsoft-developer-32s26yj4', 0, '29847', 0, NULL, '[\"gdfgd\",\"vxvc\"]', '[\"vcxv\",\"vxcv\"]', NULL, 'retail', NULL, '[\"vcxsd\",\"gdsfg\"]', NULL, NULL, NULL, 'gdf', '<p>gdf</p>', '<p>gfd</p>', 1, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-25 01:21:59', '2022-06-25 05:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet` double(11,2) NOT NULL DEFAULT 0.00,
  `pending_balance` double(11,2) NOT NULL DEFAULT 0.00,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `phone`, `password`, `wallet`, `pending_balance`, `avatar`, `created_at`, `updated_at`) VALUES
(2, 'seller1', 'seller1@gmail.com', '01964719349', '$2y$10$8Ospr8MBBBdWSvoSlPWOD.decyUu/NrJGjuqkN32L5YTfs46mQxV6', 0.00, 0.00, '', '2022-06-16 01:38:48', '2022-06-16 01:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('main','mini','feature','new','best','trending','top') COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title_1`, `title_2`, `tag`, `type`, `button_title`, `url`, `image`, `created_at`, `updated_at`) VALUES
(13, NULL, NULL, NULL, 'top', NULL, NULL, 'xk6mjsdcby1655805187.png', '2022-06-21 03:52:21', '2022-06-21 03:53:07'),
(14, NULL, NULL, NULL, 'top', NULL, NULL, 'iqjz6ku3yc1655805293.png', '2022-06-21 03:54:53', '2022-06-21 03:54:53'),
(15, NULL, NULL, NULL, 'top', NULL, NULL, 'a3e5sp2eix1655805321.png', '2022-06-21 03:55:21', '2022-06-21 03:55:21'),
(17, NULL, NULL, NULL, 'main', NULL, NULL, 'dprol5hhyc1655806337.jpg', '2022-06-21 04:02:47', '2022-06-21 04:12:18'),
(18, NULL, NULL, NULL, 'main', NULL, NULL, 'r4tefoiebc1655806251.jpg', '2022-06-21 04:04:08', '2022-06-21 04:10:52'),
(19, 'This is very mega offer', '10 % big discount one selected item', NULL, 'mini', NULL, 'http://localhost/afp_digital_shopping/product_detail/union-tbu21fb4', 'kydrstfzrr1655806035.jpg', '2022-06-21 04:07:15', '2022-06-21 04:07:15'),
(20, 'This is very mega offer', '52 % big discount all item', NULL, 'mini', NULL, NULL, 'uoekey17hv1655806390.png', '2022-06-21 04:13:11', '2022-06-21 04:13:11'),
(21, 'This is very mega offer', '10 % big discount one selected item', NULL, 'mini', NULL, 'http://localhost/afp_digital_shopping/product_detail/union-tbu21fb4', '72vtftgefd1655806441.jpg', '2022-06-21 04:14:01', '2022-06-21 04:14:01'),
(22, 'This is very mega offer', '10 % big discount one selected item', NULL, 'mini', NULL, 'http://localhost/afp_digital_shopping/product_detail/union-tbu21fb4', 'ljyopx5bdb1655806471.jpg', '2022-06-21 04:14:32', '2022-06-21 04:14:32'),
(23, NULL, NULL, NULL, 'main', NULL, NULL, 'gmeugcy1dl1655806527.jpg', '2022-06-21 04:15:27', '2022-06-21 04:15:27'),
(24, NULL, NULL, NULL, 'feature', NULL, NULL, 'oc5jjxahu91655806706.jpg', '2022-06-21 04:18:27', '2022-06-21 04:18:27'),
(25, NULL, NULL, NULL, 'feature', NULL, NULL, 'mtbyxuyaq01655806734.jpg', '2022-06-21 04:18:55', '2022-06-21 04:18:55'),
(26, NULL, NULL, NULL, 'feature', NULL, 'http://localhost/afp_digital_shopping/product_detail/union-tbu21fb4', 'dqtgifhhiy1655806747.jpg', '2022-06-21 04:19:08', '2022-06-21 04:19:08'),
(27, NULL, NULL, NULL, 'new', NULL, NULL, 'aidpzloy1p1655807385.jpg', '2022-06-21 04:29:45', '2022-06-21 04:29:45'),
(28, NULL, NULL, NULL, 'new', NULL, NULL, '8owbzeups51655807396.jpg', '2022-06-21 04:29:56', '2022-06-21 04:29:56'),
(29, NULL, NULL, NULL, 'new', NULL, NULL, 'uexiwg5szg1655807404.jpg', '2022-06-21 04:30:05', '2022-06-21 04:30:05'),
(30, NULL, NULL, NULL, 'trending', NULL, NULL, 'bmqyqfjkdc1655807503.jpg', '2022-06-21 04:31:44', '2022-06-21 04:31:44'),
(31, NULL, NULL, NULL, 'trending', NULL, NULL, 'lofblixfu41655807512.jpg', '2022-06-21 04:31:52', '2022-06-21 04:31:52'),
(32, NULL, NULL, NULL, 'trending', NULL, NULL, 'pzshhsuix71655807520.jpg', '2022-06-21 04:32:00', '2022-06-21 04:32:00'),
(33, NULL, NULL, NULL, 'best', NULL, NULL, 'wvt7t1cnz11655807672.jpg', '2022-06-21 04:34:33', '2022-06-21 04:34:33'),
(34, NULL, NULL, NULL, 'best', NULL, NULL, 'z5gebrtyle1655807682.jpg', '2022-06-21 04:34:42', '2022-06-21 04:34:42'),
(35, NULL, NULL, NULL, 'best', NULL, NULL, 'iunbieipdy1655807690.jpg', '2022-06-21 04:34:51', '2022-06-21 04:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `title`, `image`, `link`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'jwojsuk5t01653904051.png', 'https://www.facebook.com/', 'fa fa-facebook', '2022-05-30 03:47:31', '2022-05-30 03:51:56'),
(2, 'Twiiter', NULL, 'https://twitter.com/', 'fa fa-twitter', '2022-05-30 03:52:48', '2022-05-30 03:52:48'),
(3, 'Youtube', NULL, 'https://youtube.com/', 'fa fa-youtube', '2022-05-30 03:53:22', '2022-05-30 03:53:22'),
(4, 'Linkedin', NULL, 'https://www.linkedin.com/', 'fa fa-linkedin', '2022-05-30 03:53:58', '2022-05-30 03:54:54'),
(5, 'Instragram', NULL, 'https://www.instragram.com/', 'fa fa-instagram', '2022-05-30 03:56:30', '2022-05-30 03:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=active,1=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_cat_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 5, 'Cell Phones', 'm5uoysjgtc1637147095.jpg', 0, '2021-11-17 05:04:55', '2021-11-17 05:04:55'),
(5, 5, 'TV & Video', NULL, 0, '2021-11-17 05:14:36', '2021-11-17 05:14:36'),
(6, 6, 'Bedroom', NULL, 0, '2021-11-17 05:15:09', '2021-11-17 05:15:09'),
(7, 6, 'Living Room', NULL, 0, '2021-11-17 05:15:25', '2021-11-17 05:15:25'),
(8, 6, 'Office', NULL, 0, '2021-11-17 05:16:08', '2021-11-17 05:16:08'),
(9, 6, 'Dining Sets', NULL, 0, '2021-11-17 05:16:27', '2021-11-17 05:16:27'),
(11, 7, 'Dinnerware & Tabletop', NULL, 0, '2021-11-17 05:16:49', '2021-11-17 05:16:49'),
(12, 8, 'Cooking Appliances', NULL, 0, '2021-11-17 05:17:01', '2021-11-17 05:17:01'),
(13, 8, 'Women', NULL, 0, '2021-11-17 05:17:14', '2021-11-17 05:17:14'),
(14, 8, 'Men', NULL, 0, '2021-11-17 05:17:26', '2021-11-17 05:17:26'),
(19, 6, 'Bedroom', 'ici4wft3d71645948586.jpg', 0, '2022-02-27 01:56:27', '2022-02-27 01:56:27'),
(20, 10, 'cosnetice', NULL, 0, '2022-02-27 02:00:16', '2022-02-27 02:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avatar`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Rasel Rana', 'raselrana1147@gmail.com', '01964719349', NULL, '$2y$10$ai.SYrqBqqsfZvxoLTdbmufAu2cna/A5F7ix2yw90TEmEsDKiXmpi', NULL, NULL, '2022-06-20 06:33:22', '2022-06-20 06:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(41, 56, 12, '2022-05-22 05:35:15', '2022-05-22 05:35:15'),
(42, 56, 11, '2022-05-22 05:36:46', '2022-05-22 05:36:46'),
(43, 56, 17, '2022-05-22 06:07:48', '2022-05-22 06:07:48'),
(44, 56, 13, '2022-05-22 06:07:52', '2022-05-22 06:07:52'),
(45, 56, 5, '2022-05-22 06:08:06', '2022-05-22 06:08:06'),
(46, 56, 3, '2022-05-22 06:08:09', '2022-05-22 06:08:09'),
(47, 56, 6, '2022-05-22 06:08:25', '2022-05-22 06:08:25'),
(48, 56, 8, '2022-05-22 06:08:27', '2022-05-22 06:08:27'),
(52, 57, 20, '2022-05-30 04:08:06', '2022-05-30 04:08:06'),
(53, 57, 22, '2022-05-30 04:16:15', '2022-05-30 04:16:15'),
(54, 1, 20, '2022-06-05 06:41:12', '2022-06-05 06:41:12'),
(62, 5, 22, '2022-06-21 23:22:46', '2022-06-21 23:22:46'),
(63, 5, 21, '2022-06-21 23:22:47', '2022-06-21 23:22:47'),
(64, 5, 24, '2022-06-21 23:22:48', '2022-06-21 23:22:48'),
(65, 5, 6, '2022-06-21 23:47:41', '2022-06-21 23:47:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_details_user_id_foreign` (`user_id`),
  ADD KEY `billing_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_categories_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `compare_lists`
--
ALTER TABLE `compare_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compare_lists_user_id_foreign` (`user_id`),
  ADD KEY `compare_lists_product_id_foreign` (`product_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_details_payment_id_foreign` (`payment_id`),
  ADD KEY `payment_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_author_id_foreign` (`author_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_child_category_id_foreign` (`child_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`),
  ADD UNIQUE KEY `sellers_phone_unique` (`phone`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `compare_lists`
--
ALTER TABLE `compare_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
