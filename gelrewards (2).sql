-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 06:19 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gelrewards`
--

-- --------------------------------------------------------

--
-- Table structure for table `acbalances`
--

CREATE TABLE `acbalances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_earned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_used` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_added` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_earned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_points`
--

CREATE TABLE `bonus_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_point` bigint(11) NOT NULL DEFAULT 0,
  `bonus_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` int(11) NOT NULL DEFAULT 0,
  `bonus_status` int(11) NOT NULL DEFAULT 1,
  `update_status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_points`
--

INSERT INTO `bonus_points` (`id`, `admin_id`, `user_email`, `bonus_point`, `bonus_reason`, `bonus_date`, `source`, `bonus_status`, `update_status`, `created_at`, `updated_at`) VALUES
(52, 'admin@admin.com', 'demo@demo.com', 1000, 'test', 'Oct-21', 0, 1, 1, '2021-10-19 11:31:03', NULL),
(53, 'admin@admin.com', 'vijaykashyap265@gmail.com', 1000, 'Excellent Work', 'Nov-21', 0, 1, 1, '2021-11-15 13:55:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name_en`, `categories_name_fr`, `categories_status`, `created_at`, `updated_at`) VALUES
(1, 'Phone & Tablets', 'Téléphone & Tablettes', 1, NULL, '2021-10-12 18:50:19'),
(3, 'Health & Beauty', 'Santé & Beauté', 1, NULL, '2021-09-21 23:53:49'),
(5, 'Electronics', 'Électronique', 1, NULL, '2021-09-12 08:01:04'),
(7, 'Computing', 'L\'informatique', 1, NULL, '2021-09-12 08:00:22'),
(9, 'Gaming', 'Jeux', 1, NULL, '2021-09-12 08:01:25'),
(11, 'Vouchers', 'Pièces justificatives', 1, NULL, '2021-09-12 08:01:46'),
(19, 'Sports', 'Sporte', 1, '2021-10-12 18:52:11', '2021-10-19 11:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name_en`, `country_name_fr`, `country_status`, `created_at`, `updated_at`) VALUES
(1, 'Nigiria', 'Nigeria', 1, '2021-09-13 02:44:52', '2021-10-12 01:03:17'),
(2, 'India', 'India', 1, '2021-10-12 04:42:05', '2021-10-19 11:15:17'),
(7, 'French', 'frnce', 1, '2021-10-22 05:40:56', '2021-11-01 06:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_09_10_153812_create_sessions_table', 1),
(7, '2021_09_11_052440_create_categories_table', 2),
(8, '2021_09_12_084449_create_subcategories_table', 3),
(9, '2021_09_13_050456_create_countries_table', 4),
(10, '2021_09_13_054912_create_points_table', 5),
(11, '2021_09_13_063556_create_product_histories_table', 6),
(12, '2021_09_13_071649_create_revol_images_table', 7),
(13, '2021_09_13_082030_create_sliders_table', 8),
(14, '2021_09_13_102056_create_registers_table', 9),
(15, '2021_09_13_120034_create_acbalances_table', 10),
(16, '2021_09_14_045038_create_products_table', 10),
(17, '2021_09_15_052743_create_bonus_points_table', 11),
(18, '2021_09_15_110941_create_tickets_table', 12),
(19, '2021_09_17_065635_create_tickets_table', 13),
(20, '2021_09_17_073525_create_ticket_statuses_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `points`, `email`, `status`, `created_at`, `updated_at`) VALUES
(9, 'PUR0001', 500, 'vijaykashyap265@gmail.com', 1, '2021-11-13 07:05:53', '2021-11-13 07:05:53'),
(10, 'PUR00010', 200, 'vijaykashyap265@gmail.com', 1, '2021-11-15 12:55:46', '2021-11-15 12:55:46'),
(11, 'PUR00011', 240, 'vijaykashyap265@gmail.com', 1, '2021-11-15 13:02:03', '2021-11-15 13:02:03'),
(12, 'PUR00012', 440, 'vijaykashyap265@gmail.com', 1, '2021-11-15 13:02:16', '2021-11-15 13:02:16'),
(13, 'PUR00013', 100, 'vijaykashyap265@gmail.com', 1, '2021-11-15 13:35:12', '2021-11-15 13:35:12'),
(14, 'PUR00014', 980, 'vijaykashyap265@gmail.com', 1, '2021-11-16 11:23:59', '2021-11-16 11:23:59'),
(15, 'ORD00015', 200, 'vijaykashyap265@gmail.com', 1, '2021-11-17 06:12:37', '2021-11-17 06:12:37'),
(16, 'ORD00016', 200, 'vijaykashyap265@gmail.com', 1, '2021-11-17 06:30:06', '2021-11-17 06:30:06'),
(17, 'ORD00017', 200, 'vijaykashyap265@gmail.com', 1, '2021-11-17 06:35:15', '2021-11-17 06:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$F26VjzC1eKailcx0ZV6s6eM07OxRpzh9n/NomP1dnEX09jpKNJAx2', '2021-09-28 22:46:09'),
('vijaykashyap265@gmail.com', '$2y$10$LTEdl8M3b8O5OSci3Khc4eeIXHdycAfacIDyNUzJxt6Y9aTMjz.n.', '2021-10-04 00:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `admin_id`, `sign_on`, `pcc`, `points`, `email`, `point_date`, `status`, `created_at`, `updated_at`) VALUES
(187, 'admin@admin.com', 'BH12', 'MG565', 3000, 'vijaykashyap265@gmail.com', 'Sep-21', 1, '2021-10-15 10:03:50', '2021-10-15 10:03:50'),
(188, 'admin@admin.com', 'BH12', 'MG565', 1000, 'vijaykashyap265@gmail.com', 'Oct-21', 1, '2021-10-15 10:09:17', '2021-10-15 10:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `product_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `country_id`, `product_name_en`, `product_name_fr`, `points`, `product_thambnail`, `product_description_en`, `product_description_fr`, `product_start_date`, `product_end_date`, `special_deals`, `product_active`, `created_at`, `updated_at`) VALUES
(2, 7, 3, '1', 'iBall EarWear Sporty Wireless Bluetooth in Ear Headset with', 'iBall EarWear Sporty Wireless Bluetooth in Ear Headset with', '10', 'upload/products/thambnail/1712238772393373.jpg', NULL, NULL, '2021-09-29', NULL, 1, 1, '2021-09-29 13:52:21', NULL),
(3, 7, 3, '1', 'Synqe USB Type Headset', 'Synqe USB Type Headset', '40', 'upload/products/thambnail/1712238873739925.jpg', NULL, NULL, '2021-09-29', NULL, 1, 1, '2021-09-29 13:53:57', NULL),
(4, 7, 2, '1', 'HP 15 Thin And Light 11th Gen Intel Core i5', 'HP 15 Thin & Light 11th Gen Intel Core i5', '90', 'upload/products/thambnail/1712239150476517.jpg', NULL, NULL, '2021-01-01', NULL, NULL, 1, '2021-09-29 13:58:21', '2021-11-09 14:16:47'),
(5, 7, 2, '1', 'MSI Bravo 15 Ryzen', 'MSI Bravo 15 Ryzen', '40', 'upload/products/thambnail/1712239202198348.jpg', NULL, NULL, '2021-09-29', NULL, 1, 1, '2021-09-29 13:59:11', '2021-10-04 06:55:56'),
(6, 7, 2, '1', '(Renewed) Dell Optiplex 380 17 inch', '(Renewed) Dell Optiplex 380 17 inch', '100', 'upload/products/thambnail/1712239310857702.jpg', NULL, NULL, '2021-09-29', NULL, NULL, 1, '2021-09-29 14:00:54', '2021-11-09 12:02:06'),
(7, 5, 11, '1', 'boAt Airdopes', 'boAt Airdopes', '40', 'upload/products/thambnail/1712239545932988.jpg', NULL, NULL, '2021-09-29', NULL, 1, 1, '2021-09-29 14:04:38', '2021-10-18 07:00:34'),
(8, 3, 7, '1', 'XX3 Cologne Spray for Men', 'XX3 Cologne Spray for Men', '90', 'upload/products/thambnail/1712239737039272.jpg', NULL, NULL, '2021-09-29', NULL, NULL, 1, '2021-09-29 14:07:41', NULL),
(9, 1, 4, '1', 'OnePlus Nord 2 5G', 'OnePlus Nord 2 5G', '800', 'upload/products/thambnail/1712239855736460.jpg', NULL, NULL, '2021-09-29', NULL, NULL, 1, '2021-09-29 14:09:34', NULL),
(10, 11, 12, '1', 'Levis - Digital Voucher', 'Levis - Digital Voucher', '90', 'upload/products/thambnail/1712240027220262.jpg', NULL, NULL, '2021-09-29', NULL, 1, 1, '2021-09-29 14:12:17', '2021-10-05 09:14:22'),
(11, 9, 13, '1', 'EvoFox Game Box', 'EvoFox Game Box', '80', 'upload/products/thambnail/1712240275652884.jpg', NULL, NULL, '2021-09-29', NULL, NULL, 1, '2021-09-29 14:16:14', '2021-11-09 08:15:25'),
(12, 11, 12, '1', 'demo', 'démo', '1000', 'upload/products/thambnail/1712786067186441.png', NULL, NULL, '2021-10-06', NULL, 1, 1, '2021-10-05 07:51:22', '2021-10-14 22:10:23'),
(19, 7, 2, '7,1', 'testing', 'testing', '1500', 'public/upload/products/thambnail/1714297302268616.jpg', NULL, NULL, '2021-10-22 11:11:48', NULL, NULL, 1, '2021-10-22 05:41:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_histories`
--

CREATE TABLE `product_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `cencel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_histories`
--

INSERT INTO `product_histories` (`id`, `product_id`, `invoice_no`, `product_qty`, `points`, `email`, `subtotal`, `cencel_reason`, `status`, `created_at`, `updated_at`) VALUES
(108, '2', 'PUR0001', 2, 100, 'vijaykashyap265@gmail.com', 200, '0', 1, '2021-11-13 07:05:53', '2021-11-13 07:05:53'),
(109, '3', 'PUR0001', 3, 100, 'vijaykashyap265@gmail.com', 300, '0', 1, '2021-11-13 07:05:53', '2021-11-13 07:05:53'),
(110, '2', 'PUR00010', 2, 100, 'vijaykashyap265@gmail.com', 200, '0', 1, '2021-11-15 12:55:46', '2021-11-15 12:55:46'),
(111, '2', 'PUR00011', 2, 100, 'vijaykashyap265@gmail.com', 200, NULL, 0, '2021-11-15 13:02:03', '2021-11-15 13:02:03'),
(112, '5', 'PUR00011', 1, 40, 'vijaykashyap265@gmail.com', 40, '0', 1, '2021-11-15 13:02:03', '2021-11-15 13:02:03'),
(113, '2', 'PUR00012', 2, 100, 'vijaykashyap265@gmail.com', 200, '0', 1, '2021-11-15 13:02:16', '2021-11-15 13:02:16'),
(114, '5', 'PUR00012', 1, 40, 'vijaykashyap265@gmail.com', 40, '0', 1, '2021-11-15 13:02:16', '2021-11-15 13:02:16'),
(115, '6', 'PUR00012', 1, 100, 'vijaykashyap265@gmail.com', 200, '0', 1, '2021-11-15 13:02:16', '2021-11-15 13:02:16'),
(116, '6', 'PUR00013', 1, 100, 'vijaykashyap265@gmail.com', 100, '0', 1, '2021-11-15 13:35:12', '2021-11-15 13:35:12'),
(117, '10', 'PUR00014', 2, 90, 'vijaykashyap265@gmail.com', 180, 'test', 0, '2021-11-16 11:23:59', '2021-11-16 11:23:59'),
(118, '9', 'PUR00014', 1, 800, 'vijaykashyap265@gmail.com', 800, '0', 1, '2021-11-16 11:23:59', '2021-11-16 11:23:59'),
(119, '6', 'ORD00015', 2, 100, 'vijaykashyap265@gmail.com', 200, 'testing', 0, '2021-11-17 06:12:37', '2021-11-17 06:12:37'),
(120, '6', 'ORD00016', 2, 100, 'vijaykashyap265@gmail.com', 200, 'cancel for testing', 0, '2021-11-17 06:30:06', '2021-11-17 06:30:06'),
(121, '6', 'ORD00017', 1, 100, 'vijaykashyap265@gmail.com', 100, '0', 1, '2021-11-17 06:35:15', '2021-11-17 06:35:15'),
(122, '6', 'ORD00017', 1, 100, 'vijaykashyap265@gmail.com', 100, '0', 1, '2021-11-17 06:35:15', '2021-11-17 06:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `closing_bal` int(11) NOT NULL,
  `pcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `admin_id`, `first_name`, `last_name`, `email`, `password`, `country_name`, `date_of_birth`, `contact`, `points`, `closing_bal`, `pcc`, `sign_on`, `end_date`, `source`, `status`, `created_at`, `updated_at`) VALUES
(75, 'admin@admin.com', 'Pankaj', 'Baroth', 'barothpankaj93@gmail.com', '123456', 'India', '1993-11-12', '7737630936', 5000, 0, 'PB01234', 'PB01216', NULL, 1, 1, '2021-10-09 18:04:03', NULL),
(77, 'admin@admin.com', 'Vijay', 'Prajapati', 'vijaykashyap265@gmail.com', 'vijay', 'india', '2021-10-11', '00000000', 1500, 620, 'MG565', 'BH12', NULL, 1, 1, '2021-10-11 18:14:04', '2021-11-15 13:55:29'),
(89, 'admin@admin.com', 'shekhar', 'kelkar', 'shekharkelkar175@gmail.com', 'shekhar123', 'USA', '1995-01-01', '8329438874', 0, 20000, '007', '007', '2021-10-14', 1, 1, '2021-10-12 17:57:42', '2021-10-14 17:51:54'),
(102, 'admin@admin.com', 'demo', 'demo', 'demo@demo.com', 'demo@123', 'india', '01-02-2015', '1234567890', 100, 1700, 'DM01', 'DM', NULL, 0, 1, '2021-10-19 10:35:22', '2021-10-19 11:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `revol_images`
--

CREATE TABLE `revol_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revol_image_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revol_images`
--

INSERT INTO `revol_images` (`id`, `image`, `title_en`, `title_fr`, `description_en`, `description_fr`, `revol_image_status`, `created_at`, `updated_at`) VALUES
(1, 'upload/revolving_image/1710773822627857.jpg', 'Demo title', 'titre de la démo', 'Demo description', 'description de la démo', 1, '2021-09-13 02:47:36', '2021-10-19 14:32:21'),
(2, 'public/upload/revolving_image/1713329275298949.png', 'revolving title', 'rev title', 'reevolving description', 'rev description', 0, '2021-10-12 01:45:25', '2021-11-17 11:34:54'),
(3, 'public/upload/revolving_image/1713329361084025.png', 'revolving title', 'rev title', 'reevolving description', 'rev description', 1, '2021-10-12 01:46:47', '2021-10-19 11:37:39'),
(5, 'public/upload/revolving_image/1716674447451251.jpg', 'Company Name :Hp', 'nhvb', 'HP Laptop I5 7th Generation', 'jhgjh', 1, '2021-10-19 14:25:57', '2021-11-17 11:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9HF5JCURZqEHF9DONds6xX6wi6QQWL7ma1BsJpQM', 1, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibnJEV3FrczhLNWwwWE9PRmxqVzVKaU5mZklzMnpVMjJOVGFySEhaSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL29yZGVyL3ZpZXcvT1JEMDAwMTciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFcwc3pyOU9YOFJRWFRWa0pMVW4wbE96VVFQWENybkhxY1ovM1ZyalBwT0FQS3AvaE93YTBxIjt9', 1637150155),
('BltyyA5TC37QNYFpgWVcfiE7cGM1vFr9iJhDtWoV', 1, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoid0FQZkMyOUNTQzNJd3dGNjdHeHdSaHZjOUNwblczampJcHhkSFkwUCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQyOiJodHRwOi8vMTAzLjE1OS4xODMuMTgvZ2FscmV3YXJkcy9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFcwc3pyOU9YOFJRWFRWa0pMVW4wbE96VVFQWENybkhxY1ovM1ZyalBwT0FQS3AvaE93YTBxIjt9', 1637731605),
('bPMOn9zALklNPm4QduJD6LkBOCW6uunXr5NCX6E5', 1, '154.160.14.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVlJXYzZWOW9MVDRxdE8zdk1TSWtLVlJ5aHFaYXpwSGdpNWZoQWg3RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL2FjY291bnQvYmFsYW5jZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRXMHN6cjlPWDhSUVhUVmtKTFVuMGxPelVRUFhDcm5IcWNaLzNWcmpQcE9BUEtwL2hPd2EwcSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO30=', 1637766252),
('ceSj5Zg1uKdTYehoinCd6oNJEUeS4fytp9uW5Zoz', NULL, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0VlU0NZSXo5QlpvVWVpZ1JzdHlLbnoyRlJYVzM5RlN0Zkg3WTRJcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9saXF1b3IvcHJvZHVjdC9kZXRhaWxzLzIxL2JsYW5kZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1637143987),
('E7HQCRlYHiEIv4bAQzvkW71N7VIiFIyQJ9Q4Ezag', 1, '154.160.14.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidmZBdmYwQUtxWnkzaEFiNDZaTTFHcldxYXZIakR2VU5wdUludkxDVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL3Byb2R1Y3QvaGlzdG9yeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRXMHN6cjlPWDhSUVhUVmtKTFVuMGxPelVRUFhDcm5IcWNaLzNWcmpQcE9BUEtwL2hPd2EwcSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO30=', 1637674010),
('hM5PG2mddrkwUckE8shthHfdvMqhpX9TuADq0EJ9', 1, '157.47.157.183', 'Mozilla/5.0 (Linux; Android 10; SM-A507FN) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.105 Mobile Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicjhKMmljR0NlUElpYjJodWRWbDJWZ0ZURUpVTmkzYzhMSEMzSGhjeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL29yZGVyL3ZpZXcvT1JEMDAwMTYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFcwc3pyOU9YOFJRWFRWa0pMVW4wbE96VVFQWENybkhxY1ovM1ZyalBwT0FQS3AvaE93YTBxIjt9', 1637163862),
('I6HVEITV2moW4F9L45Sqe9nGUFvfhHcgvTF03fj8', 1, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiWENwVUNjVTRMQWZmUk1naDR5T1lFdm1OSVk4RngyTW1hdEY3N0VKSyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ4OiJodHRwOi8vMTAzLjE1OS4xODMuMTgvZ2FscmV3YXJkcy9wcm9kdWN0L2hpc3RvcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFcwc3pyOU9YOFJRWFRWa0pMVW4wbE96VVFQWENybkhxY1ovM1ZyalBwT0FQS3AvaE93YTBxIjt9', 1637673989),
('lxJx0xmwWPqq9dK4RcyZ2HD1bI9O8NxkTeDgyF4R', 1, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSjZ2WHlQaUtXN1BXbXdRelZQQjBzbWhUd08xdlBFalVhWjhiQkl4OCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQyOiJodHRwOi8vMTAzLjE1OS4xODMuMTgvZ2FscmV3YXJkcy9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFcwc3pyOU9YOFJRWFRWa0pMVW4wbE96VVFQWENybkhxY1ovM1ZyalBwT0FQS3AvaE93YTBxIjt9', 1637758256),
('QHdGC1G709Cs7Ujl7jkPThznMnk1Nma5NRTXZVhZ', NULL, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGUxWXdaVTI1WGt4TXp4Q0l2bHQ1ZHhhc0huT1UxcEZnbHZJNllXTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1637316513),
('R5GJrrGTsaz9RMKQDaDNYPLCSbkAbHAwBXBTXvVZ', 1, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidWszTWt0Q05YT2lydlp4VElFUW1JVG9Ec2JNV1lmOUdJNklEN3J0byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL3VzZXIvdGlja2V0L3ZpZXc1MiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRXMHN6cjlPWDhSUVhUVmtKTFVuMGxPelVRUFhDcm5IcWNaLzNWcmpQcE9BUEtwL2hPd2EwcSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO30=', 1637152850),
('sCHvRnhwmTFVcDueZzX0qtA7qwU3jtO3Lvwf5Kjm', 1, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSnVUaWZSbDZtWnZOeEwyQTZOVmxjOEhHOGJwQVdxSTRyaGVHWkxCQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFcwc3pyOU9YOFJRWFRWa0pMVW4wbE96VVFQWENybkhxY1ovM1ZyalBwT0FQS3AvaE93YTBxIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRXMHN6cjlPWDhSUVhUVmtKTFVuMGxPelVRUFhDcm5IcWNaLzNWcmpQcE9BUEtwL2hPd2EwcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL3Byb2R1Y3RzIjt9fQ==', 1637155561),
('V1PLHTZA0tV1l7tx9bMDeuRD7fzuEVx8XrTjvDxg', 1, '154.160.14.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiU3gyWHJ6OWxKbzhWc1JXWFM3bDF6OHRWRUF4RjFFekNSdWp0WWpTVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL3JlZ2lzdHJhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRXMHN6cjlPWDhSUVhUVmtKTFVuMGxPelVRUFhDcm5IcWNaLzNWcmpQcE9BUEtwL2hPd2EwcSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkVzBzenI5T1g4UlFYVFZrSkxVbjBsT3pVUVBYQ3JuSHFjWi8zVnJqUHBPQVBLcC9oT3dhMHEiO30=', 1637773721),
('YwVqkfOtQwz6Grwxpr3Wuf1o8KEsv941DXL31D5k', 1, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaTJEU3VpMnNhdHZPUFVvd01POEt3YTlSN2h3NUttajlGYjNwRFpDYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFcwc3pyOU9YOFJRWFRWa0pMVW4wbE96VVFQWENybkhxY1ovM1ZyalBwT0FQS3AvaE93YTBxIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRXMHN6cjlPWDhSUVhUVmtKTFVuMGxPelVRUFhDcm5IcWNaLzNWcmpQcE9BUEtwL2hPd2EwcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMDMuMTU5LjE4My4xOC9nYWxyZXdhcmRzL3VzZXIvcmFzZS90aWNrZXQiO319', 1637310412);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `slider_status`, `created_at`, `updated_at`) VALUES
(2, 'upload/slider/1711599074970399.png', 0, '2021-09-22 05:24:32', '2021-11-17 11:24:08'),
(3, 'upload/slider/1711678865365668.jpg', 1, '2021-09-23 02:32:52', '2021-10-11 02:21:02'),
(4, 'public/upload/slider/1716674012651923.jpg', 1, '2021-10-12 05:01:21', '2021-11-17 11:18:35'),
(5, 'public/upload/slider/1716673901279980.jpg', 1, '2021-10-12 19:06:33', '2021-11-17 11:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategories_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategories_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategories_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategories_name_en`, `subcategories_name_fr`, `subcategories_status`, `created_at`, `updated_at`) VALUES
(1, 7, 'Laptops', 'Portable', 1, '2021-09-12 02:29:04', NULL),
(2, 7, 'Desktops', 'Ordinateurs de bureau', 1, '2021-09-12 02:32:47', '2021-09-28 17:13:49'),
(3, 7, 'Accessories', 'Accessoires', 1, '2021-09-12 02:33:55', '2021-09-28 17:10:51'),
(4, 1, 'Mobile Phones', 'Téléphones portables', 1, '2021-09-29 13:46:28', NULL),
(5, 1, 'Tablets', 'Comprimés', 1, '2021-09-29 13:48:30', NULL),
(6, 1, 'Accessories', 'Accessoires', 1, '2021-09-29 13:48:50', NULL),
(7, 3, 'Men Fragrance', 'Parfum Homme', 1, '2021-09-29 13:49:09', NULL),
(8, 3, 'Women Fragrance', 'Parfum Femme', 1, '2021-09-29 13:49:26', NULL),
(9, 5, 'Television', 'Télévision', 1, '2021-09-29 13:49:43', NULL),
(10, 5, 'Digital Camera', 'Appareil photo numérique', 1, '2021-09-29 13:49:58', NULL),
(11, 5, 'Audio Appliances', 'Appareils audio', 1, '2021-09-29 13:51:14', NULL),
(12, 11, 'Mobile Top Up', 'Recharge mobile', 1, '2021-09-29 14:11:56', NULL),
(13, 9, 'Playstation', 'Playstation', 1, '2021-09-29 14:13:22', NULL),
(15, 19, 'Cricket', 'Crickete', 1, '2021-10-12 18:58:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `need_assistance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=open,1=workinprogress,2=closed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `need_assistance`, `comment`, `ticket_date`, `status`, `created_at`, `updated_at`) VALUES
(49, 75, 'discrepancy', 'test', '2021-10-13 11:32:55', '1', '2021-10-13 18:32:55', '2021-10-14 01:08:04'),
(50, 77, 'Item Not Delivered/Wrong Item Delivered', 'test', '2021-10-21 13:27:33', '0', '2021-10-21 07:57:33', NULL),
(51, 0, '', '', '2021-10-29 16:51:59', '0', '2021-10-29 11:21:59', NULL),
(52, 77, 'Item Not Delivered/Wrong Item Delivered', 'test', '2021-11-17 17:43:34', '0', '2021-11-17 12:13:34', NULL),
(53, 0, '', '', '2021-11-17 21:10:27', '0', '2021-11-17 15:40:27', NULL),
(54, 0, '', '', '2021-11-17 21:11:50', '0', '2021-11-17 15:41:50', NULL),
(55, 0, '', '', '2021-11-19 11:48:17', '0', '2021-11-19 06:18:17', NULL),
(56, 0, '', '', '2021-11-23 22:11:21', '0', '2021-11-23 16:41:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `consultant_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_actions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_resolution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `elaborate_problems` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_Of_closure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`id`, `admin_id`, `user_id`, `ticket_id`, `consultant_first_name`, `consultant_last_name`, `consultant_email`, `contact`, `support_actions`, `final_resolution`, `status`, `elaborate_problems`, `date_Of_closure`, `created_at`, `updated_at`) VALUES
(9, 'admin@admin.com', 75, 49, 'test', 'test01', 'test@gmail.com', '98878749747', 'fdsfgdsgd', 'dgdsg', '0', 'sdgsg', '2021-10-15', '2021-10-13 18:34:30', NULL),
(10, 'admin@admin.com', 75, 49, 'Pankaj', 'Baroth', 'pankajbaroth93@gmail.com', '6585958565', 'work in process', 'complete', '1', 'work in process', '2021-10-15', '2021-10-14 01:08:04', NULL),
(11, 'admin@admin.com', 77, 50, 'Vijay', 'Kashyap', 'vijay@test.com', '879978978', 'test ticket', 'complete', '0', 'done test', '2021-10-23', '2021-10-21 08:00:36', NULL),
(12, 'admin@admin.com', 77, 52, 'Pankaj', 'Baroth', 'pankaj@test.com', '9876543210', 'ajmer development', 'open', '0', 'testing done', '2021-11-20', '2021-11-17 12:40:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$W0szr9OX8RQXTVkJLUn0lOzUQPXCrnHqcZ/3VrjPpOAPKp/hOwa0q', NULL, NULL, NULL, NULL, NULL, '', '2021-09-10 10:32:56', '2021-10-19 11:55:27'),
(3, 'vijay', 'vijaykashyap265@gmail.com', NULL, '$2y$10$pJfe1Oa03oxCYf5eu1IU8.W.OhkWJEGUMAnRvyrurybCSdtJW/GXS', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(6, 'Shekhar', 'shekharkelkar175@gmail.com', NULL, '$2y$10$HoOtH6t9gNQBw2QHu0OI2uoS68mdQHb0XDI7YXyGg32WkzBHoZyOC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acbalances`
--
ALTER TABLE `acbalances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_points`
--
ALTER TABLE `bonus_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_histories`
--
ALTER TABLE `product_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registers_email_unique` (`email`);

--
-- Indexes for table `revol_images`
--
ALTER TABLE `revol_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acbalances`
--
ALTER TABLE `acbalances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonus_points`
--
ALTER TABLE `bonus_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_histories`
--
ALTER TABLE `product_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `revol_images`
--
ALTER TABLE `revol_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
