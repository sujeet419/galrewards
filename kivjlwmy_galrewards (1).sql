-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2022 at 03:50 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kivjlwmy_galrewards`
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
-- Table structure for table `agencygroups`
--

CREATE TABLE `agencygroups` (
  `id` int(11) NOT NULL,
  `agency_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agencygroups`
--

INSERT INTO `agencygroups` (`id`, `agency_name`, `country`, `contact_no`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ajmer Agency', 'India', '(+123) 456 789 - (+123) 666 888', 'info@ajmergalreward.com', 'panchshil', 1, '2022-05-09 07:23:48', '2022-05-09 20:57:49'),
(2, 'Ghana agency', 'Ghana', '(+123) 456 789 - (+123) 666 888', 'info@ghanagalreward.com', 'Ghana', 1, '2022-05-09 07:25:00', '2022-05-09 20:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `bonus_points`
--

CREATE TABLE `bonus_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guserid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus_point` bigint(11) NOT NULL DEFAULT '0',
  `bonus_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` int(11) NOT NULL DEFAULT '0',
  `bonus_status` int(11) NOT NULL DEFAULT '1',
  `update_status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_points`
--

INSERT INTO `bonus_points` (`id`, `admin_id`, `guserid`, `pcc`, `sign_on`, `bonus_point`, `bonus_reason`, `bonus_date`, `source`, `bonus_status`, `update_status`, `created_at`, `updated_at`) VALUES
(64, 'admin@admin.com', 'MD20-12SON', NULL, NULL, 400, 'for good work', 'Jan-22', 0, 1, 1, '2022-01-29 05:29:01', NULL),
(66, 'admin@admin.com', 'MG565-BH12', NULL, NULL, 100, 'for good work', 'Jan-22', 0, 1, 1, '2022-01-29 05:49:30', NULL),
(67, 'admin@admin.com', 'PB01234-PB01216', NULL, NULL, 5000, 'for good work', 'Jan-22', 0, 1, 1, '2022-01-29 07:16:51', NULL),
(68, 'admin@admin.com', 'MD20-12SON', NULL, NULL, 400, 'for good work', 'Feb-22', 0, 1, 1, '2022-02-01 04:46:21', NULL),
(69, 'shubhangijaiswal95@gmail.com', 'MD20-12SON', NULL, NULL, 400, 'Successfully Achieved Task', 'Feb-22', 0, 1, 1, '2022-02-11 10:41:35', NULL),
(70, 'admin@admin.com', 'MD20-12SON', NULL, NULL, 100, 'for good work', 'Feb-22', 0, 1, 1, '2022-02-17 07:52:47', NULL),
(71, 'admin@admin.com', 'hQ@-JOQ', NULL, NULL, 450, 'for good work', 'Feb-22', 0, 1, 1, '2022-02-17 07:54:15', NULL),
(72, 'admin@admin.com', 'SWS-SDE', NULL, NULL, 50000, 'for good work', 'Feb-22', 0, 1, 1, '2022-02-17 07:58:38', NULL),
(74, 'admin@admin.com', 'hQ@-JOQ', NULL, NULL, 450, 'Test', 'Mar-22', 0, 1, 1, '2022-03-07 12:17:54', NULL),
(75, 'admin@admin.com', 'hQ@-JOQ', NULL, NULL, 450, 'test', 'Mar-22', 0, 1, 1, '2022-03-07 12:19:09', NULL),
(76, 'admin@admin.com', 'SS@IT-SUMIT002', NULL, NULL, 200, 'for good work', 'Mar-22', 0, 1, 1, '2022-03-08 07:23:21', NULL),
(77, 'admin@admin.com', 'GAHA567-sunny-001', NULL, NULL, 1200, 'testing', 'Mar-22', 0, 1, 1, '2022-03-08 10:02:43', NULL),
(78, 'admin@admin.com', 'MG565-BH12', NULL, NULL, 10, 'y', 'Feb-22', 0, 1, 1, '2022-05-30 18:51:39', NULL),
(79, 'admin@admin.com', 'MG565-BH12', NULL, NULL, 50, 'rr', 'Feb-22', 0, 1, 1, '2022-05-30 18:56:00', NULL),
(80, 'admin@admin.com', 'MG565-BH12', 'MG565', 'BH12', 222, 'demo', 'May-22', 0, 1, 1, '2022-05-30 19:11:47', '2022-05-30 19:11:47'),
(81, 'admin@admin.com', 'PB01234-PB01216', 'PB01234', 'PB01216', 111, 'demo', 'May-22', 0, 1, 1, '2022-05-30 19:11:47', '2022-05-30 19:11:47'),
(82, 'admin@admin.com', 'AJM347-JOQ', 'AJM347', 'JOQ', 1500, 'test', '11-Jun', 0, 1, 1, '2022-06-12 01:22:37', '2022-06-12 01:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` double(8,2) NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `quantity` int(11) NOT NULL,
  `total_point` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `product_name`, `product_thambnail`, `point`, `status`, `quantity`, `total_point`, `created_at`, `updated_at`) VALUES
(27, 9, 75, 'OnePlus Nord 2 5G', 'public/upload/products/thambnail/1718396262555348.jpg', 800.00, '1', 1, 800.00, NULL, '2022-05-13 18:35:30'),
(28, 6, 75, '(Renewed) Dell Optiplex 380 17 inch', 'public/upload/products/thambnail/1712239310857702.jpg', 100.00, '1', 2, 200.00, NULL, '2022-05-13 18:35:31'),
(57, 33, 122, '', '', 200.00, '1', 25, 5000.00, '2022-05-18 00:03:19', NULL),
(58, 33, 122, '', '', 200.00, '1', 2, 400.00, '2022-05-18 00:03:28', NULL),
(59, 33, 122, '', '', 200.00, '1', 2, 400.00, '2022-05-18 00:10:01', NULL),
(60, 33, 122, '', '', 200.00, '1', 25, 5000.00, '2022-05-18 00:10:50', NULL),
(74, 7, 108, 'boAt Airdopes', 'public/upload/products/thambnail/1712239545932988.jpg', 40.00, '1', 2, 80.00, NULL, '2022-06-18 01:49:57'),
(75, 35, 108, 'Testing Product Ajmer', 'public/upload/products/thambnail/1735504771228702.jpg', 2525.00, '1', 6, 15150.00, NULL, '2022-06-18 01:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name_en`, `categories_name_fr`, `country_id`, `image`, `categories_status`, `created_at`, `updated_at`) VALUES
(1, 'Phone Tablets', 'Téléphone & Tablettes', 'Ghana,India', 'public/upload/category/1732323091562606.png', 1, NULL, '2022-05-09 16:24:00'),
(3, 'Health & Beauty', 'Santé & Beauté', 'India', 'public/upload/category/1732532823213044.jpg', 1, NULL, '2022-05-11 23:57:35'),
(5, 'Electronics', 'Électronique', 'India', 'public/upload/category/1732532865420079.jpg', 1, NULL, '2022-06-13 18:41:10'),
(7, 'Computing', 'L\'informatique', '', '', 1, NULL, '2021-09-12 08:00:22'),
(9, 'Gaming', 'Jeux', '', '', 1, NULL, '2021-09-12 08:01:25'),
(11, 'Vouchers', 'Pièces justificatives', 'Ghana,India', 'public/upload/category/1735503238439064.png', 1, NULL, '2022-06-13 18:51:04'),
(21, 'Sports', 'des sports', '', '', 1, '2021-12-09 07:29:39', '2021-12-10 10:27:17'),
(22, 'Test', 'estr', '', '', 0, '2021-12-21 13:14:30', '2022-05-04 17:39:11'),
(23, 'Café Coffee Day Voucher', 'Café Coffee Day Voucher', '', '', 0, '2021-12-22 05:16:36', '2021-12-22 05:17:21'),
(24, 'testpnkj', 'dsfdsgf', '', '', 0, '2022-01-06 13:15:37', '2022-02-24 05:36:17'),
(25, 'téléphone', 'téléphone', '', '', 1, '2022-02-11 16:30:10', '2022-02-24 05:36:09'),
(26, 'Tools', 'Tols', 'Ghana,India', 'public/upload/category/1732322948092170.png', 1, '2022-03-28 17:29:07', '2022-06-12 00:00:52'),
(27, 'test cata', 'test cata', 'India,Nigiria', 'public/upload/category/1732349838116414.jpg', 0, '2022-05-06 18:00:13', '2022-05-09 23:29:07'),
(28, 'Testing Ajmer', 'Ajmer Test', 'France,Franch,Ghana,India,ivorycoast,Nigiria', 'public/upload/category/1735504632746705.jpg', 1, '2022-06-13 19:13:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name_en`, `country_name_fr`, `address_en`, `address_fr`, `contact_no`, `email_address`, `country_status`, `created_at`, `updated_at`) VALUES
(1, 'Nigiria', 'Nigeria', '', '', '', '', 1, '2021-09-13 02:44:52', '2022-05-06 23:08:15'),
(2, 'India', 'India', '45 Satguru Overseas Ajmer India', '45 Satguru Overseas Ajmer Inde', '(+123) 456 789 - (+123) 666 888', 'Contact@galrewards.com', 1, '2021-10-12 04:42:05', '2022-06-17 23:21:46'),
(7, 'France', 'La France', '', '', '', '', 1, '2021-10-22 05:40:56', '2022-02-23 05:49:28'),
(8, 'ivorycoast', 'ivorycoast', '', '', '', '', 1, '2022-03-08 09:56:05', NULL),
(9, 'French', 'Français', NULL, NULL, NULL, NULL, 1, '2022-03-09 07:36:53', '2022-06-15 00:09:12'),
(10, 'Ghana', 'Ghana', 'Osu', 'Osu', '596995015', 'Contactghana@galrewards.com', 1, '2022-03-28 15:54:56', '2022-06-11 23:47:11');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(20, '2021_09_17_073525_create_ticket_statuses_table', 14),
(21, '2021_11_10_113143_createsupplier', 15);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `product_id`, `image_name`, `created_at`, `updated_at`) VALUES
(8, 33, 'public/upload/products/multi-image/1732341978703307.jpg', '2022-05-09 21:24:12', NULL),
(10, 33, 'public/upload/products/multi-image/1732342006005330.jpg', '2022-05-09 21:24:38', NULL),
(12, 3, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(13, 4, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(17, 2, 'public/upload/products/multi-image/1732343351326464.jpg', '2022-05-09 21:46:01', NULL),
(18, 5, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(19, 6, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(20, 7, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(21, 8, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(22, 9, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(23, 10, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(24, 11, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(25, 12, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(26, 19, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(27, 20, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(28, 21, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(29, 22, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(30, 23, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(31, 24, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(32, 25, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(33, 26, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(34, 27, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(37, 30, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(39, 32, 'public/upload/products/multi-image/1732341978636334.jpg', NULL, NULL),
(40, 34, 'public/upload/products/multi-image/1735341949973954.png', '2022-06-12 00:07:27', NULL),
(41, 34, 'public/upload/products/multi-image/1735342464196131.png', '2022-06-12 00:15:38', NULL),
(42, 35, 'public/upload/products/multi-image/1735504771290028.jpg', '2022-06-13 19:15:26', NULL),
(43, 35, 'public/upload/products/multi-image/1735504771349611.jpg', '2022-06-13 19:15:26', NULL),
(44, 35, 'public/upload/products/multi-image/1735504771418564.png', '2022-06-13 19:15:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `narration` text COLLATE utf8mb4_unicode_ci,
  `delivery_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `points`, `email`, `date`, `status`, `narration`, `delivery_type`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ORDW00088', 8000, 'sujeet419@gmail.com', '28-04-2022', 1, NULL, '', '', '2022-04-28 21:58:53', '2022-04-28 21:58:53'),
(70, 'ORDW0001', 200, 'sujeet419@gmail.com', '25-01-2022', 3, 'item not aviable', '', '', '2022-01-25 05:33:16', '2022-01-25 05:33:16'),
(71, 'ORDW00071', 350, 'sujeet419@gmail.com', '25-12-2021', 1, NULL, '', '', '2021-12-25 05:34:30', '2022-01-25 05:34:30'),
(72, 'ORD00072', 200, 'vijaykashyap265@gmail.com', '25-01-2022', 1, NULL, '', '', '2022-01-25 10:24:34', '2022-01-25 10:24:34'),
(73, 'ORDW00073', 200, 'sujeet419@gmail.com', '27-01-2022', 1, NULL, '', '', '2022-01-27 03:43:55', '2022-01-27 03:43:55'),
(74, 'ORDW00074', 350, 'sujeet419@gmail.com', '27-01-2022', 3, 'item not aviable', '', '', '2022-01-27 03:57:21', '2022-01-27 03:57:21'),
(75, 'ORDW00075', 800, 'sujeet419@gmail.com', '31-01-2022', 2, 'item not aviable', '', '', '2022-01-31 05:52:36', '2022-01-31 05:52:36'),
(76, 'ORDW00076', 2340, 'sujeet419@gmail.com', '01-02-2022', 2, 'deliverd', '', '', '2022-02-01 04:47:28', '2022-02-01 04:47:28'),
(77, 'ORDW00077', 1500, 'sujeet419@gmail.com', '07-02-2022', 4, 'item deliverd', '', '', '2022-02-07 11:23:20', '2022-02-07 11:23:20'),
(78, 'ORDW00078', 240, 'sujeet419@gmail.com', '17-02-2022', 4, 'item deliverd', '', '', '2022-02-17 12:36:05', '2022-02-17 12:36:05'),
(79, 'ORDW00079', 400, 'sujeet419@gmail.com', '18-02-2022', 2, 'confirm', '', '', '2022-02-18 08:01:51', '2022-02-18 08:01:51'),
(80, 'ORD00080', 20, 'vijaykashyap265@gmail.com', '25-02-2022', 2, 'confirm order from our team', '', '', '2022-02-25 11:16:37', '2022-02-25 11:16:37'),
(81, 'ORDW00081', 110, 'sujeet419@gmail.com', '26-02-2022', 1, NULL, '', '', '2022-02-26 12:35:15', '2022-02-26 12:35:15'),
(82, 'ORD00082', 20, 'vijaykashyap265@gmail.com', '28-02-2022', 2, 'confirm', '', '', '2022-02-28 07:36:39', '2022-02-28 07:36:39'),
(83, 'ORDW00083', 4000, 'sujeet419@gmail.com', '08-03-2022', 3, 'item not aviable', '', '', '2022-03-08 04:39:04', '2022-03-08 04:39:04'),
(84, 'ORDW00084', 10, 'sumit@gmail.com', '08-03-2022', 1, NULL, '', '', '2022-03-08 07:24:41', '2022-03-08 07:24:41'),
(85, 'ORDW00085', 350, 'sunny.gupta@travelport-cnwa.com', '08-03-2022', 4, 'item deliverd', '', '', '2022-03-08 10:05:40', '2022-03-08 10:05:40'),
(86, 'ORDW00086', 350, 'sunny.gupta@travelport-cnwa.com', '08-03-2022', 3, 'item not aviable', '', '', '2022-03-08 10:08:24', '2022-03-08 10:08:24'),
(87, 'ORD00087', 40, 'vijaykashyap265@gmail.com', '29-03-2022', 1, NULL, '', '', '2022-03-29 06:05:06', '2022-03-29 06:05:06'),
(88, 'ORD0002', 500, 'vijaykashyap265@gmail.com', '02-05-2022', 1, NULL, '', '', '2022-05-02 17:10:57', '2022-05-02 17:10:57'),
(89, 'ORDW00089', 10, 'sujeet419@gmail.com', '04-05-2022', 3, 'item not aviable', '', '', '2022-05-04 21:04:14', '2022-05-04 21:04:14'),
(90, 'ORDW00090', 1000, 'vijaykashyap265@gmail.com', '09-05-2022', 1, NULL, '', '', '2022-05-09 23:43:31', '2022-05-09 23:43:31'),
(91, 'ORDW00091', 860, 'sujeet419@gmail.com', '30-05-2022', 1, NULL, 'office_address', '45 Satguru Overseas Ajmer India', '2022-05-30 18:27:35', '2022-05-30 18:27:35'),
(92, 'ORDW00092', 860, 'sujeet419@gmail.com', '30-05-2022', 1, NULL, 'office_address', '45 Satguru Overseas Ajmer India', '2022-05-30 18:28:56', '2022-05-30 18:28:56'),
(93, 'ORDW00093', 860, 'sujeet419@gmail.com', '30-05-2022', 3, 'item not aviable', 'office_address', '45 Satguru Overseas Ajmer India', '2022-05-30 18:29:29', '2022-05-30 18:29:29'),
(94, 'ORDW00094', 860, 'sujeet419@gmail.com', '30-05-2022', 3, 'item not aviable', 'office_address', '45 Satguru Overseas Ajmer India', '2022-05-30 18:30:43', '2022-05-30 18:30:43'),
(95, 'ORDW00095', 80, 'vijaykashyap265@gmail.com', '30-05-2022', 3, 'item not aviable', 'office_address', '45 Satguru Overseas Ajmer India', '2022-05-30 18:47:42', '2022-05-30 18:47:42'),
(96, 'ORDW00096', 1600, 'swati.bhatt@travelport-ghana.com', '10-06-2022', 1, NULL, 'agency_address', 'Ghana', '2022-06-11 00:38:24', '2022-06-11 00:38:24'),
(97, 'ORDW00097', 2000, 'hiteshkhotwani96@gmail.com', '11-06-2022', 3, 'test', 'office_address', 'Osu', '2022-06-12 00:44:15', '2022-06-12 00:44:15'),
(98, 'ORDW00098', 2000, 'swati.bhatt@travelport-ghana.com', '11-06-2022', 1, NULL, 'agency_address', 'Ghana', '2022-06-12 01:40:17', '2022-06-12 01:40:17'),
(99, 'ORDW00099', 800, 'swati.bhatt@travelport-ghana.com', '11-06-2022', 1, NULL, 'office_address', '45 Satguru Overseas Ajmer India', '2022-06-12 01:47:22', '2022-06-12 01:47:22'),
(100, 'ORDW000100', 5000, 'hiteshkhotwani96@gmail.com', '11-06-2022', 1, NULL, 'office_address', 'Osu', '2022-06-12 02:04:08', '2022-06-12 02:04:08'),
(101, 'ORDW000101', 2525, 'vijaykashyap265@gmail.com', '13-06-2022', 1, NULL, 'office_address', '45 Satguru Overseas Ajmer India', '2022-06-13 19:16:30', '2022-06-13 19:16:30'),
(102, 'ORDW000102', 90, 'sujeet419@gmail.com', '13-06-2022', 1, NULL, 'office_address', '45 Satguru Overseas Ajmer India', '2022-06-13 19:29:40', '2022-06-13 19:29:40'),
(103, 'ORDW000103', 90, 'sujeet419@gmail.com', '13-06-2022', 1, NULL, 'office_address', '45 Satguru Overseas Ajmer India', '2022-06-13 19:30:42', '2022-06-13 19:30:42'),
(104, 'ORDW000104', 2525, 'vijaykashyap265@gmail.com', '13-06-2022', 1, NULL, 'agency_address', 'panchshil', '2022-06-13 19:31:54', '2022-06-13 19:31:54');

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
('vijaykashyap265@gmail.com', '$2y$10$LTEdl8M3b8O5OSci3Khc4eeIXHdycAfacIDyNUzJxt6Y9aTMjz.n.', '2021-10-04 00:26:48'),
('shubhangijaiswal95@gmail.com', '$2y$10$9p9PSIgW.HZ3VKCQdVJyM.kcknZygLB2MW3fQ5ZxZe7RHtfHIUQlO', '2022-02-11 07:37:11'),
('shubhangi.jaiswal@agaatti.com', 'GhyVVahqomYXVsjZWymm1Ptw7uFlzifbXFL920N9QO6NtKQx1rTM4hQxs4GJhjPk', '2022-06-13 18:28:25'),
('shubhangi.jaiswal@agaatti.com', 'jfsdx81QQWJ9urdjAJx0SSWjYEMQEShyRHHsPwNXFhBHhItAEKkOIg6vk4hAHqAP', '2022-06-13 18:47:54');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `points` int(11) NOT NULL DEFAULT '0',
  `guserid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `admin_id`, `sign_on`, `pcc`, `points`, `guserid`, `point_date`, `status`, `created_at`, `updated_at`) VALUES
(197, 'admin@admin.com', '12SON', 'MD20', 600, 'MD20-12SON', 'Jan-22', 1, '2022-01-28 08:09:48', '2022-01-28 08:09:48'),
(198, 'admin@admin.com', 'DMA', 'DM011', 100, 'DM011-DMA', 'Jan-22', 1, '2022-01-28 08:09:48', '2022-01-28 08:09:48'),
(199, 'shubhangijaiswal95@gmail.com', '12SON', 'MD20', 600, 'MD20-12SON', 'Feb-22', 1, '2022-02-11 10:46:16', '2022-02-11 10:46:16'),
(204, 'admin@admin.com', '12SON', 'MD20', 600, 'MD20-12SON', 'Mar-22', 1, '2022-02-11 16:55:10', '2022-02-11 16:55:10'),
(205, 'admin@admin.com', 'BH12', 'MG565', 100, 'MG565-BH12', 'Mar-22', 1, '2022-02-11 16:55:10', '2022-02-11 16:55:10'),
(206, 'admin@admin.com', 'sunny-001', 'GAHA-567', 1500, 'GAHA-567-sunny-001', '22-Mar', 0, '2022-03-28 17:56:56', '2022-03-28 17:56:56'),
(207, 'admin@admin.com', 'BH12', 'MG565', 500, 'MG565-BH12', 'May-22', 1, '2022-05-30 19:15:39', '2022-05-30 19:15:39'),
(208, 'admin@admin.com', 'PB01216', 'PB01234', 100, 'PB01234-PB01216', 'May-22', 1, '2022-05-30 19:15:39', '2022-05-30 19:15:39'),
(209, 'admin@admin.com', 'JOQ', 'AJM347', 2300, 'AJM347-JOQ', '11-Jun', 1, '2022-06-12 00:35:27', '2022-06-12 00:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `point_transfers`
--

CREATE TABLE `point_transfers` (
  `id` int(11) NOT NULL,
  `transfer_type` int(11) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `touser` varchar(255) DEFAULT NULL,
  `fuser_point` int(11) NOT NULL,
  `tuser_point` int(11) DEFAULT NULL,
  `transfer_reason` text NOT NULL,
  `transfer_by` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `point_transfers`
--

INSERT INTO `point_transfers` (`id`, `transfer_type`, `from_user`, `touser`, `fuser_point`, `tuser_point`, `transfer_reason`, `transfer_by`, `created_date`) VALUES
(0, 2, 'SWS-SDE', 'AJM347-JOQ', 45600, 3800, 'test', NULL, '2022-06-11 14:30:21'),
(4, 1, '007-007', NULL, 20000, NULL, 'Employee Shifted to IT Developer.', NULL, '2022-02-12 07:12:18'),
(5, 2, 'PB01234-PB01216', 'MD20-12SON', 5000, 25722, 'Shifted to Africa.', NULL, '2022-02-12 07:15:00'),
(6, 2, 'MG565-BH12', 'PB01234-PB01216', 148491, 0, 'Employee Gifted Points', NULL, '2022-02-12 07:44:20'),
(7, 2, 'PB01234-PB01216', 'MG565-BH12', 148491, 0, 'Point shifted again', NULL, '2022-02-12 07:44:48');

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
  `product_active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `country_id`, `product_name_en`, `product_name_fr`, `points`, `product_thambnail`, `product_description_en`, `product_description_fr`, `product_start_date`, `product_end_date`, `special_deals`, `product_active`, `created_at`, `updated_at`) VALUES
(2, 7, 3, 'India', 'iBall EarWear Sporty Wireless Bluetooth in Ear Headset with', 'iBall EarWear Sporty Casque intra-auriculaire Bluetooth sans fil avec', '10', 'public/upload/products/thambnail/1712238772393373.jpg', NULL, NULL, '2021-09-29', '2022-11-28', 1, 1, '2021-09-29 13:52:21', '2022-03-09 06:35:47'),
(3, 7, 3, 'India', 'Synqe USB Type Headset', 'Synqe USB Type Headset', '30', 'public/upload/products/thambnail/1712238873739925.jpg', NULL, NULL, '2021-09-29', '2022-09-28', 1, 1, '2021-09-29 13:53:57', '2022-03-09 06:36:02'),
(4, 7, 2, 'India', 'HP 15 Thin And Light 11th Gen Intel Core i5', 'HP 15 Thin & Light 11th Gen Intel Core i5', '60', 'public/upload/products/thambnail/1718397352118365.png', NULL, NULL, '2021-01-01', '2023-03-28', 1, 1, '2021-09-29 13:58:21', '2022-02-28 06:00:56'),
(5, 7, 2, 'India', 'MSI Bravo 15 Ryzen', 'MSI Bravo 15 Ryzen', '50', 'public/upload/products/thambnail/1712239202198348.jpg', NULL, NULL, '2021-09-29', '2022-10-28', 1, 1, '2021-09-29 13:59:11', '2022-02-28 06:00:44'),
(6, 7, 2, 'India', '(Renewed) Dell Optiplex 380 17 inch', '(Renewed) Dell Optiplex 380 17 inch', '100', 'public/upload/products/thambnail/1712239310857702.jpg', NULL, NULL, '2021-09-29', '2022-11-30', 1, 1, '2021-09-29 14:00:54', '2022-02-28 06:00:34'),
(7, 5, 11, 'India', 'boAt Airdopes', 'boAt Airdopes', '40', 'public/upload/products/thambnail/1712239545932988.jpg', NULL, NULL, '2021-09-29', '2022-07-28', 1, 1, '2021-09-29 14:04:38', '2022-02-28 06:00:17'),
(8, 3, 7, 'India', 'XX3 Cologne Spray for Men', 'XX3 Cologne Spray for Men', '90', 'public/upload/products/thambnail/1712239737039272.jpg', NULL, NULL, '2021-09-29', '2022-03-28', 1, 1, '2021-09-29 14:07:41', '2022-02-28 06:00:01'),
(9, 1, 4, 'India', 'OnePlus Nord 2 5G', 'OnePlus Nord 2 5G', '800', 'public/upload/products/thambnail/1718396262555348.jpg', NULL, NULL, '2021-09-29', '2022-08-28', 1, 1, '2021-09-29 14:09:34', '2022-02-28 05:59:48'),
(10, 11, 12, 'India', 'Levis - Digital Voucher', 'Levis - Digital Voucher', '90', 'public/upload/products/thambnail/1712240027220262.jpg', NULL, NULL, '2021-09-29', '2022-12-28', NULL, 1, '2021-09-29 14:12:17', '2022-02-28 05:59:33'),
(11, 9, 13, 'India', 'EvoFox Game Box', 'EvoFox Game Box', '80', 'public/upload/products/thambnail/1712240275652884.jpg', NULL, NULL, '2021-09-29', '2022-08-28', 1, 1, '2021-09-29 14:16:14', '2022-02-28 05:59:22'),
(12, 11, 12, 'India', 'demo', 'démo', '1000', 'public/upload/products/thambnail/1712786067186441.png', NULL, NULL, '2021-10-06', '2022-03-31', 1, 1, '2021-10-05 07:51:22', '2022-02-28 05:59:12'),
(19, 7, 2, 'France', 'testing', 'testing', '1500', 'public/upload/products/thambnail/1714297302268616.jpg', NULL, NULL, '2021-10-22', '2022-03-31', NULL, 1, '2021-10-22 05:41:48', '2022-02-28 05:58:42'),
(20, 5, 10, 'India', 'Canon EOS 1500D DSLR Camera with 18-55 mm Lens Kit', 'appareil photo numérique', '350', 'public/upload/products/thambnail/1718574252849002.png', NULL, NULL, '2021-12-08', '2022-02-27', 1, 1, '2021-12-08 10:42:06', '2022-02-14 11:59:24'),
(21, 5, 10, 'France', 'HD Find face camera', 'camero', '2000320', 'public/upload/products/thambnail/1718671268127008.jpg', NULL, NULL, '2021-12-09', '2022-04-30', 1, 1, '2021-12-09 12:24:07', '2022-03-09 06:35:30'),
(22, 3, 7, 'India', 'testing product', 'testing product', '200', 'public/upload/products/thambnail/1720645279407955.jpg', NULL, NULL, '2021-12-31', '2022-04-30', 1, 1, '2021-12-31 07:20:11', '2022-03-09 06:35:21'),
(23, 5, 11, 'India', 'testjan', 'asfasf', '350', 'public/upload/products/thambnail/1721211154247364.jpg', NULL, NULL, '2022-01-06', '2022-04-14', 1, 1, '2022-01-06 13:14:31', '2022-02-14 11:58:28'),
(24, 9, 13, 'India', 'Test', 'Test', '1000', 'public/upload/products/thambnail/1724485299920232.png', NULL, NULL, '2022-02-11', '2022-03-10', NULL, 1, '2022-02-11 16:35:39', '2022-03-09 06:35:02'),
(25, 9, 13, 'France', 'Game', 'Toy', '320', 'public/upload/products/thambnail/1725486212073919.png', NULL, NULL, '2022-02-22', '2022-03-09', 1, 1, '2022-02-22 17:44:44', '2022-03-09 06:34:42'),
(26, 1, 4, 'France,Ghana', 'OnePlus 9RT 5G', 'OnePlus 9RT 5G', '5000', 'public/upload/products/thambnail/1726002274310578.jpg', NULL, NULL, '2022-02-28', '2022-09-30', 1, 1, '2022-02-28 10:27:19', '2022-05-04 19:16:26'),
(27, 1, 4, 'India', 'tag8 Dolphin Smart Bag Tracker', 'tag8 Dolphin Smart Bag Tracker', '2000', 'public/upload/products/thambnail/1726003065505792.jpg', NULL, NULL, '2022-02-28', '2022-09-30', 1, 1, '2022-02-28 10:39:53', '2022-03-09 06:33:34'),
(28, 9, 17, 'France,India', 'XBOX 360 2 player', 'XBOX 360 2 f players', '2000', 'public/upload/products/thambnail/1726652726135385.png', NULL, NULL, '2022-03-07', '2022-03-31', 1, 1, '2022-03-07 14:45:58', '2022-03-09 07:35:15'),
(29, 3, 7, 'Franch,ivorycoast', 'Ella Health & Beauty', 'Ella Health & Beauty', '5000', 'public/upload/products/thambnail/1726710740139975.jpg', NULL, NULL, '2022-03-08', '2022-03-31', NULL, 1, '2022-03-08 06:08:04', '2022-03-28 16:03:47'),
(30, 7, 2, 'ivorycoast,India', 'Acer 100', 'Acer 100', '150', 'public/upload/products/thambnail/1726726864989388.png', NULL, NULL, '2022-03-08', '2022-03-31', NULL, 1, '2022-03-08 10:24:23', '2022-03-09 07:32:17'),
(31, 7, 2, 'India,ivorycoast', 'desktop product', 'desktop product', '5000', 'public/upload/products/thambnail/1726802703706171.jpg', NULL, NULL, '2022-03-09', '2022-06-30', NULL, 1, '2022-03-09 06:29:48', '2022-05-04 17:57:33'),
(32, 26, 18, 'Ghana', 'Round Screw', 'Square Screw', '500', 'public/upload/products/thambnail/1728566183904153.jpg', NULL, NULL, '2022-03-28', '2022-12-29', 1, 1, '2022-03-28 17:39:34', '2022-06-11 23:49:23'),
(33, 1, 4, 'France,Franch,Ghana,India,ivorycoast,Nigiria', 'testing product', 'testing product', '200', 'public/upload/products/thambnail/1732341978601910.jpg', NULL, NULL, '2022-05-09', '2022-07-31', 1, 1, '2022-05-09 21:24:12', '2022-05-11 00:41:40'),
(34, 11, 12, 'Ghana,India', 'MOMO vouchers 100 cedi', 'MOMO vouchers 100 cedi', '100', 'public/upload/products/thambnail/1735341949868325.png', NULL, NULL, '2022-06-11', '2022-06-13', NULL, 1, '2022-06-12 00:07:27', '2022-06-13 19:04:21'),
(35, 28, 19, 'France,Franch,Ghana,India,ivorycoast,Nigiria', 'Testing Product Ajmer', 'Testing Product Ajmer', '2525', 'public/upload/products/thambnail/1735504771228702.jpg', NULL, NULL, '2022-06-13', '2022-06-30', 1, 1, '2022-06-13 19:15:26', '2022-06-13 19:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_histories`
--

CREATE TABLE `product_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `cencel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vender_info` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_histories`
--

INSERT INTO `product_histories` (`id`, `product_id`, `invoice_no`, `product_qty`, `points`, `email`, `subtotal`, `cencel_reason`, `vender_info`, `status`, `created_at`, `updated_at`) VALUES
(179, '22', 'ORDW0001', 1, 200, 'sujeet419@gmail.com', 200, 'item not aviable', NULL, 0, '2022-01-25 05:33:16', '2022-01-25 05:33:16'),
(180, '20', 'ORDW00071', 1, 350, 'sujeet419@gmail.com', 350, NULL, NULL, 1, '2022-01-25 05:34:30', '2022-01-25 05:34:30'),
(181, '2', 'ORD00072', 2, 100, 'vijaykashyap265@gmail.com', 200, NULL, NULL, 1, '2022-01-25 10:24:34', '2022-01-25 10:24:34'),
(182, '22', 'ORDW00073', 1, 200, 'sujeet419@gmail.com', 200, NULL, NULL, 1, '2022-01-27 03:43:55', '2022-01-27 03:43:55'),
(183, '20', 'ORDW00074', 1, 350, 'sujeet419@gmail.com', 350, 'ttttttttt', NULL, 0, '2022-01-27 03:57:21', '2022-01-27 03:57:21'),
(184, '9', 'ORDW00075', 1, 800, 'sujeet419@gmail.com', 800, NULL, NULL, 1, '2022-01-31 05:52:36', '2022-01-31 05:52:36'),
(185, '19', 'ORDW00076', 1, 1500, 'sujeet419@gmail.com', 1500, 'deliverd', 'vijay traders,vijay@gmail.com,995876234', 2, '2022-02-01 04:47:28', '2022-02-01 04:47:28'),
(186, '7', 'ORDW00076', 1, 40, 'sujeet419@gmail.com', 40, 'deliverd', NULL, 2, '2022-02-01 04:47:28', '2022-02-01 04:47:28'),
(187, '9', 'ORDW00076', 1, 800, 'sujeet419@gmail.com', 800, 'deliverd', 'vijay traders,vijay@gmail.com,995876234', 2, '2022-02-01 04:47:28', '2022-02-01 04:47:28'),
(188, '19', 'ORDW00077', 1, 1500, 'sujeet419@gmail.com', 1500, 'item deliverd', NULL, 4, '2022-02-07 11:23:20', '2022-02-07 11:23:20'),
(189, '7', 'ORDW00078', 3, 40, 'sujeet419@gmail.com', 120, 'item deliverd', NULL, 4, '2022-02-17 12:36:05', '2022-02-17 12:36:05'),
(190, '4', 'ORDW00078', 2, 60, 'sujeet419@gmail.com', 120, 'item deliverd', NULL, 4, '2022-02-17 12:36:05', '2022-02-17 12:36:05'),
(191, '22', 'ORDW00079', 2, 200, 'sujeet419@gmail.com', 400, 'confirm', 'satguru', 2, '2022-02-18 08:01:51', '2022-02-18 08:01:51'),
(192, '2', 'ORD00080', 2, 10, 'vijaykashyap265@gmail.com', 20, 'confirm order from our team', 'satguru', 2, '2022-02-25 11:16:37', '2022-02-25 11:16:37'),
(193, '2', 'ORDW00081', 11, 10, 'sujeet419@gmail.com', 110, NULL, 'Gilo', 2, '2022-02-26 12:35:15', '2022-02-26 12:35:15'),
(194, '2', 'ORD00082', 2, 10, 'vijaykashyap265@gmail.com', 20, 'confirm', NULL, 2, '2022-02-28 07:36:39', '2022-02-28 07:36:39'),
(195, '28', 'ORDW00083', 2, 2000, 'sujeet419@gmail.com', 4000, 'item not aviable', NULL, 3, '2022-03-08 04:39:04', '2022-03-08 04:39:04'),
(196, '2', 'ORDW00084', 1, 10, 'sumit@gmail.com', 10, NULL, NULL, 1, '2022-03-08 07:24:41', '2022-03-08 07:24:41'),
(197, '23', 'ORDW00085', 1, 350, 'sunny.gupta@travelport-cnwa.com', 350, 'item deliverd', 'Gilo', 4, '2022-03-08 10:05:40', '2022-03-08 10:05:40'),
(198, '23', 'ORDW00086', 1, 350, 'sunny.gupta@travelport-cnwa.com', 350, 'item not aviable', NULL, 3, '2022-03-08 10:08:24', '2022-03-08 10:08:24'),
(199, '2', 'ORD00087', 2, 20, 'vijaykashyap265@gmail.com', 40, NULL, NULL, 1, '2022-03-29 06:05:06', '2022-03-29 06:05:06'),
(200, '2', 'ORDW00089', 1, 10, 'sujeet419@gmail.com', 10, 'item not aviable', NULL, 3, '2022-05-04 21:04:14', '2022-05-04 21:04:14'),
(201, '33', 'ORDW00090', 1, 200, 'vijaykashyap265@gmail.com', 200, NULL, NULL, 1, '2022-05-09 23:43:31', '2022-05-09 23:43:31'),
(202, '9', 'ORDW00090', 1, 800, 'vijaykashyap265@gmail.com', 800, NULL, NULL, 1, '2022-05-09 23:43:31', '2022-05-09 23:43:31'),
(203, '55', 'ORDW00091', 1, 800, 'sujeet419@gmail.com', 800, NULL, NULL, 1, '2022-05-30 18:27:35', '2022-05-30 18:27:35'),
(204, '61', 'ORDW00091', 1, 60, 'sujeet419@gmail.com', 60, NULL, NULL, 1, '2022-05-30 18:27:35', '2022-05-30 18:27:35'),
(205, '55', 'ORDW00092', 1, 800, 'sujeet419@gmail.com', 800, NULL, NULL, 1, '2022-05-30 18:28:56', '2022-05-30 18:28:56'),
(206, '61', 'ORDW00092', 1, 60, 'sujeet419@gmail.com', 60, NULL, NULL, 1, '2022-05-30 18:28:56', '2022-05-30 18:28:56'),
(207, '55', 'ORDW00093', 1, 800, 'sujeet419@gmail.com', 800, 'item not aviable', NULL, 3, '2022-05-30 18:29:29', '2022-05-30 18:29:29'),
(208, '61', 'ORDW00093', 1, 60, 'sujeet419@gmail.com', 60, 'item not aviable', NULL, 3, '2022-05-30 18:29:29', '2022-05-30 18:29:29'),
(209, '55', 'ORDW00094', 1, 800, 'sujeet419@gmail.com', 800, 'item not aviable', NULL, 3, '2022-05-30 18:30:43', '2022-05-30 18:30:43'),
(210, '61', 'ORDW00094', 1, 60, 'sujeet419@gmail.com', 60, 'item not aviable', NULL, 3, '2022-05-30 18:30:43', '2022-05-30 18:30:43'),
(211, '62', 'ORDW00095', 1, 80, 'vijaykashyap265@gmail.com', 80, 'item not aviable', NULL, 3, '2022-05-30 18:47:42', '2022-05-30 18:47:42'),
(212, '65', 'ORDW00096', 8, 200, 'swati.bhatt@travelport-ghana.com', 1600, NULL, NULL, 1, '2022-06-11 00:38:24', '2022-06-11 00:38:24'),
(213, '66', 'ORDW00097', 4, 500, 'hiteshkhotwani96@gmail.com', 2000, 'test', NULL, 3, '2022-06-12 00:44:15', '2022-06-12 00:44:15'),
(214, '67', 'ORDW00098', 1, 2000, 'swati.bhatt@travelport-ghana.com', 2000, NULL, NULL, 1, '2022-06-12 01:40:17', '2022-06-12 01:40:17'),
(215, '68', 'ORDW00099', 1, 800, 'swati.bhatt@travelport-ghana.com', 800, NULL, NULL, 1, '2022-06-12 01:47:22', '2022-06-12 01:47:22'),
(216, '69', 'ORDW000100', 1, 5000, 'hiteshkhotwani96@gmail.com', 5000, NULL, NULL, 1, '2022-06-12 02:04:08', '2022-06-12 02:04:08'),
(217, '71', 'ORDW000101', 1, 2525, 'vijaykashyap265@gmail.com', 2525, NULL, NULL, 1, '2022-06-13 19:16:30', '2022-06-13 19:16:30'),
(218, '10', 'ORDW000103', 1, 90, 'sujeet419@gmail.com', 90, NULL, NULL, 1, '2022-06-13 19:30:42', '2022-06-13 19:30:42'),
(219, '35', 'ORDW000104', 1, 2525, 'vijaykashyap265@gmail.com', 2525, NULL, NULL, 1, '2022-06-13 19:31:54', '2022-06-13 19:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `p_c_c_s`
--

CREATE TABLE `p_c_c_s` (
  `id` int(11) NOT NULL,
  `pcc_number` varchar(255) NOT NULL,
  `agency_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_c_c_s`
--

INSERT INTO `p_c_c_s` (`id`, `pcc_number`, `agency_name`, `country`, `status`, `created_at`, `updated_at`) VALUES
(3, 'AJM347', 'Ajmer Agency', 'India', 1, '2022-05-09 07:49:04', '2022-05-09 19:19:04'),
(4, 'GAHA567', 'Ghana agency', 'France', 1, '2022-02-24 10:29:40', '2022-02-24 10:29:40'),
(5, 'SS@IT', 'Satguru IT', 'India', 1, '2022-03-05 11:32:26', NULL),
(6, '687s', 'Corp Ltd', 'Ghana', 1, '2022-03-28 17:32:19', NULL),
(7, 'test1233', 'Ghana agency', 'Ghana', 1, '2022-06-11 14:25:23', '2022-06-12 01:55:23');

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
  `points` int(11) NOT NULL DEFAULT '0',
  `closing_bal` int(11) NOT NULL,
  `agency_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guserid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `password_change_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `admin_id`, `first_name`, `last_name`, `email`, `password`, `country_name`, `date_of_birth`, `contact`, `points`, `closing_bal`, `agency_group`, `pcc`, `sign_on`, `guserid`, `end_date`, `source`, `status`, `password_change_at`, `created_at`, `updated_at`) VALUES
(75, 'admin@admin.com', 'Pankaj', 'Baroth', 'barothpankaj93@gmail.com', '123456', 'India', '1993-11-12', '7737630936', 5000, 2211, 'Ajmer Agency', 'PB01234', 'PB01216', 'PB01234-PB01216', NULL, 1, 1, 'yes', '2021-10-09 18:04:03', '2022-05-30 19:12:22'),
(77, 'admin@admin.com', 'Vijay', 'Prajapati', 'vijaykashyap265@gmail.com', 'Vijay', 'India', '2021-10-11', '9876540110', 1500, 142743, 'Ajmer Agency', 'MG565', 'BH12', 'MG565-BH12', '2022-12-31', 1, 1, 'yes', '2021-10-11 18:14:04', '2022-06-13 18:47:10'),
(89, 'admin@admin.com', 'shekhar', 'kelkar', 'shekharkelkar175@gmail.com', 'shekhar123', 'Nigiria', '1995-01-01', '8329438874', 0, 0, 'Ajmer Agency', '007', '007', '007-007', NULL, 1, 1, 'yes', '2021-10-12 17:57:42', '2022-02-01 04:51:15'),
(108, 'admin@admin.com', 'sujeet', 'kumar', 'sujeet419@gmail.com', '123456', 'India', '1983-05-17', '8533886295', 0, 21022, 'Ajmer Agency', 'MD20', '12SON', 'MD20-12SON', '2022-06-30', 1, 1, 'yes', '2022-01-28 06:22:42', '2022-05-30 18:23:44'),
(109, 'admin@admin.com', 'Hitesh', 'Khotwani', 'honeykhotwani96@gmail.com', 'HITESH@123', 'India', '2022-10-11', '097789222', 0, 1780, 'Ghana Agency', 'hQ@', 'JOQ', 'hQ@-JOQ', '2022-12-21', 1, 1, 'yes', '2022-02-11 17:09:33', '2022-03-07 14:30:18'),
(110, 'admin@admin.com', 'Swati', 'Bhatt', 'swati.bhatt@travelport-ghana.com', 'test@123', 'India', '2022-01-31', '898989889', 0, 0, 'Ghana Agency', 'SWS', 'SDE', 'SWS-SDE', '2022-08-30', 1, 1, 'yes', '2022-02-11 17:13:22', '2022-06-11 00:37:11'),
(111, 'admin@admin.com', 'Test', 'Test AJ', 'Test@gmail.com', 'Test@123', 'India', '1999-10-10', '9876543210', 0, 0, 'Ajmer Agency', 'SMTP103', 'PROX123', 'SMTP103-PROX123', '2022-02-23', 1, 1, NULL, '2022-02-15 13:24:28', '2022-02-21 05:31:49'),
(112, 'admin@admin.com', 'Rohit', 'Kumar', 'r.kumar@travelport-ghana.com', 'Rohit@123', 'India', '2022-02-23', '9772610525', 0, 0, 'Ajmer Agency', 'GAHA567', 'ROQ', 'GAHA567-ROQ', NULL, 1, 1, NULL, '2022-02-22 17:56:45', NULL),
(113, 'admin@admin.com', 'sachin', 'kumar', 'sachin@gmail.com', 'sachin@123', 'India', '2022-01-01', '8533886295', 0, 0, 'Ajmer Agency', 'AJM347', '12SOS', 'AJM347-12SOS', NULL, 1, 1, NULL, '2022-02-24 11:23:09', NULL),
(114, 'admin@admin.com', 'demo1', 'demo', 'demo9@demo.com', 'demo1@123', 'india', '01-02-2015', '1234567890', 100, 100, 'Ajmer group', 'DM02', 'DMA', 'DM02-DMA', NULL, 0, 1, NULL, '2022-02-24 11:39:11', '2022-02-24 11:39:11'),
(115, 'shubhangijaiswal95@gmail.com', 'Sanjay', 'Sharma', 'sanjaysharma@gmail.com', 'Sanjay@123', 'India', '1998-12-05', '7014878794', 0, 0, 'Satguru IT', 'SS@IT', 'SSIT@1', 'SS@IT-SSIT@1', NULL, 1, 1, NULL, '2022-03-05 11:33:15', NULL),
(116, 'shubhangijaiswal95@gmail.com', 'Harish', 'Sharma', 'harishsharma22@gmail.com', 'HARISH@123', 'India', '2022-03-05', '7145795847', 0, 0, 'Satguru IT', 'SS@IT', 'SSIT@11', 'SS@IT-SSIT@11', NULL, 1, 1, 'yes', '2022-03-05 12:06:26', NULL),
(117, 'shubhangijaiswal95@gmail.com', 'test', 'testing', 'testing@gmail.com', 'TEST@123', 'India', '2022-03-01', '8475914584', 0, 0, 'Ajmer Agency', 'AJM347', 'TEST121', 'AJM347-TEST121', '2022-03-05', 1, 1, 'yes', '2022-03-05 12:09:13', '2022-03-05 12:12:13'),
(122, 'shubhangijaiswal95@gmail.com', 'shubh', 'jaiswal', 'shubh@gmail.com', 'Shubh@123', 'India', '12-07-1999', '7481547914', 5000, 5000, 'Ajmer Agency', 'AJM347', 'SHU28', 'AJM347-SHU28', NULL, 0, 1, 'yes', '2022-03-05 13:30:23', '2022-03-05 13:30:23'),
(123, 'shubhangijaiswal95@gmail.com', 'abhi', 'kumar', 'abhi@yahoo.com', 'Abhi@123', 'Franch', '10-12-2000', '8457945874', 7000, 7000, 'Ghana Agency', 'GAHA567', 'A18', 'GAHA567-A18', NULL, 0, 1, 'yes', '2022-03-05 13:30:23', '2022-03-05 13:30:23'),
(124, 'shubhangijaiswal95@gmail.com', 'anu', 'kapoor', 'anu@satguru.co.in', 'anu@123', 'India', '15-07-1994', '1245789542', 10000, 10000, 'Ajmer Agency', 'AJM347', 'ANU2', 'AJM347-ANU2', NULL, 0, 1, NULL, '2022-03-05 13:30:23', '2022-03-05 13:30:23'),
(125, 'shubhangijaiswal95@gmail.com', 'sid', 'sharma', 'sid@agaatti.com', 'SID@123', 'Franch', '10-10-1989', '3254789155', 20000, 20000, 'Ghana Agency', 'GAHA567', 'SID31', 'GAHA567-SID31', NULL, 0, 1, 'yes', '2022-03-05 13:30:23', '2022-03-05 13:30:23'),
(126, 'admin@admin.com', 'Om', 'Gidwani', 'omi@travelport-ghana.com', 'Om@123', 'India', '2022-02-28', '979979797', 0, 0, 'Ajmer Agency', 'AJM347', 'OMIGH', 'AJM347-OMIGH', NULL, 1, 1, NULL, '2022-03-07 14:39:50', NULL),
(127, 'admin@admin.com', 'sumit', 'kumar', 'sumit@gmail.com', 'sumit@123', 'India', '2021-07-08', '8533886295', 0, 190, 'Satguru IT', 'SS@IT', 'SUMIT002', 'SS@IT-SUMIT002', NULL, 1, 1, 'yes', '2022-03-08 07:20:58', '2022-03-08 07:23:57'),
(128, 'admin@admin.com', 'ajay', 'kumar', 'ajay1@gmail.com', 'ajay@123', 'India', '2021-12-01', '8533886295', 0, 0, 'Satguru IT', 'SS@IT', 'Ajay001', 'SS@IT-Ajay001', NULL, 1, 1, NULL, '2022-03-08 09:49:16', NULL),
(129, 'admin@admin.com', 'sunny', 'gupta', 'sunny.gupta@travelport-cnwa.com', 'Sunny@1234', 'ivorycoast', '2021-11-17', '8533886295', 0, 850, 'Ghana agency', 'GAHA567', 'sunny-001', 'GAHA567-sunny-001', NULL, 1, 1, 'yes', '2022-03-08 09:56:55', '2022-03-08 10:03:26'),
(130, 'admin@admin.com', 'Ashish', 'Kumar', 'hiteshkhotwani96@gmail.com', '123456', 'Ghana', '2022-03-02', '979979797', 0, 44400, 'Ajmer Agency', 'AJM347', 'JOQ', 'AJM347-JOQ', '2022-09-30', 1, 1, 'yes', '2022-03-28 16:16:05', '2022-06-12 01:23:03'),
(136, 'admin@admin.com', 'sanjeev', 'k', 'sanjeev@gmail.com', 'sanjeev@123', 'India', '2022-02-03', '8533886295', 0, 0, 'Ajmer Agency', 'AJM347', 'df45', 'AJM347-df45', NULL, 0, 1, 'yes', '2022-05-05 23:42:12', NULL),
(137, 'admin@admin.com', 'kgf', 'k', 'kgf@gmail.com', 'Kgf@123', 'ivorycoast', '2021-10-06', '8533886295', 0, 0, 'Satguru IT', 'SS@IT', '12tccv', 'SS@IT-12tccv', NULL, 1, 1, 'yes', '2022-05-06 16:44:56', NULL),
(138, 'admin@admin.com', 'trst', 'test', 'scvdf', 'trst@123', 'India', '2022-06-09', '979979797', 0, 0, 'Corp Ltd', '687s', 'OMIGH', '687s-OMIGH', NULL, 1, 1, NULL, '2022-06-12 02:15:31', NULL),
(139, 'admin@admin.com', 'trst', 'test', 'kgf@gmail.com', 'trst@123', 'India', '2022-06-09', '979979797', 0, 0, 'Ghana agency', 'test1233', 'OMIGH', 'test1233-OMIGH', NULL, 1, 1, NULL, '2022-06-12 02:16:36', NULL);

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
  `revol_image_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `revol_images`
--

INSERT INTO `revol_images` (`id`, `image`, `title_en`, `title_fr`, `description_en`, `description_fr`, `revol_image_status`, `created_at`, `updated_at`) VALUES
(9, 'public/upload/revolving_image/1726710131743630.jpg', 'test', 'test', 'test', 'test', 1, '2022-03-08 05:58:24', NULL),
(10, 'public/upload/revolving_image/1726710148394443.jpg', 'test', 'tt', 'fff', 'test', 1, '2022-03-08 05:58:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JIO5L8bmU3mmoIEy7bgBVeO31giaTy3MRYGZDO4R', NULL, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWNkSlFoM3poRjFvVnJmejNldTE5ZkhtY2tBQlRiTUFEbjRCdFBjMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9teWdhbHJld2FyZHMuY29tL2dhbHJld2FyZHMvZnJvbnRlbmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1655790139),
('AamZWSnyoIrTtRfR5fa0bJ9PxrbANnLbqnKOln5y', NULL, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiQjlJTWJWV0VyY0pOQ3JUakxXbVpZY2pEbVVYWmxXeXhDWFVKUHRHZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1655795646),
('4LsteuMsCWUR1dAbclH8E3nVmMPsyeyxUC5WVnkj', NULL, '103.159.183.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMjUwSkZTMEd0TllKY2VKenRQcGtOcjBiaDYwc2ZDTzRydW02Q1JTNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1655795646);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `slider_status`, `created_at`, `updated_at`) VALUES
(2, 'upload/slider/1711599074970399.png', 0, '2021-09-22 05:24:32', '2021-11-17 11:24:08'),
(3, 'upload/slider/1711678865365668.jpg', 0, '2021-09-23 02:32:52', '2022-03-08 10:29:43'),
(4, 'public/upload/slider/1716674012651923.jpg', 0, '2021-10-12 05:01:21', '2021-11-26 10:47:51'),
(5, 'public/upload/slider/1716673901279980.jpg', 0, '2021-10-12 19:06:33', '2021-11-26 10:47:49'),
(6, 'public/upload/slider/1717487571614078.png', 0, '2021-11-26 10:49:46', '2022-02-26 10:22:15'),
(7, 'public/upload/slider/1717487591682207.png', 1, '2021-11-26 10:50:05', '2022-03-08 10:29:47'),
(8, 'public/upload/slider/1726646655366795.jpg', 1, '2022-03-07 13:09:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategories_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategories_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategories_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategories_name_en`, `subcategories_name_fr`, `country_id`, `subcategories_status`, `created_at`, `updated_at`) VALUES
(1, 7, 'Laptops', 'Portable', '', 1, '2021-09-12 02:29:04', NULL),
(2, 7, 'Desktops', 'Ordinateurs de bureau', '', 1, '2021-09-12 02:32:47', '2021-09-28 17:13:49'),
(3, 7, 'Accessories', 'Accessoires', '', 1, '2021-09-12 02:33:55', '2021-09-28 17:10:51'),
(4, 1, 'Mobile Phones', 'Téléphones portables', 'Ghana,India', 1, '2021-09-29 13:46:28', '2022-05-09 16:25:31'),
(5, 1, 'Tablets', 'Comprimés', 'India', 1, '2021-09-29 13:48:30', '2022-05-06 23:29:01'),
(6, 1, 'Accessories', 'Accessoires', 'India', 1, '2021-09-29 13:48:50', '2022-05-06 23:28:44'),
(7, 3, 'Men Fragrance', 'Parfum Homme', '', 0, '2021-09-29 13:49:09', '2022-05-10 16:43:47'),
(8, 3, 'Women Fragrance', 'Parfum Femme', '', 0, '2021-09-29 13:49:26', '2022-05-10 16:43:43'),
(9, 5, 'Television', 'Télévision', '', 1, '2021-09-29 13:49:43', '2022-02-24 07:23:46'),
(10, 5, 'Digital Camera', 'Appareil photo numérique', '', 1, '2021-09-29 13:49:58', '2022-02-23 05:44:35'),
(11, 5, 'Audio Appliances', 'Appareils audio', '', 0, '2021-09-29 13:51:14', '2022-05-10 16:43:38'),
(12, 11, 'Mobile Top Up', 'Recharge mobile', 'Ghana,India', 1, '2021-09-29 14:11:56', '2022-06-13 18:52:17'),
(13, 9, 'Playstation', 'Playstation', '', 1, '2021-09-29 14:13:22', '2022-02-24 07:23:50'),
(17, 9, 'XBOX 360', 'XBOX 360', '', 0, '2022-03-07 12:28:34', '2022-05-10 16:43:34'),
(18, 26, 'Screw', 'Screwss', 'Ghana,India', 1, '2022-03-28 17:30:36', '2022-05-09 16:25:45'),
(19, 28, 'Sub Testing Ajmer', 'Ajmer Sub Testing', 'France,Franch,Ghana,India,ivorycoast,Nigiria', 1, '2022-06-13 19:13:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refernce_by` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `category_id`, `tax_id`, `refernce_by`, `email`, `supplier_code`, `contact_no`, `address`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'supplier1', '', 'GHq', 'Liquor', 'supplier@gmail.com', 'SUP-8540', '5256569595', 'ajmer', 'France', '1', '2021-11-10 06:21:10', '2022-02-16 05:55:32'),
(2, 'satguru', '', 'tax id', 'liquor', 'satguru@gmail.com', 'SUP-1057', '9696969585', 'ajmer', 'India', '1', '2021-11-13 06:59:07', '2022-02-16 05:55:26'),
(16, 'dss', '', 'esrgfd', 'gefg', 'sujeet419@gmail.com', 'SUP-6857', '8533886245', 'refer', 'France', '0', '2022-02-08 05:09:48', '2022-02-16 05:55:21'),
(17, 'tetsts', '', 'esrgfd', 'gefg', 'sujeet419@gmail.com', 'SUP-0826', '9958613179', 'fdgfgg', 'India', '0', '2022-02-16 05:01:04', '2022-02-25 06:00:22'),
(18, 'Gilo', '', 'ABX898', 'Sam', 'abc@gmail.com', 'SUP-6827', '97717820928', 'for test', 'India', '1', '2022-03-07 10:22:33', NULL),
(19, 'IMEXCO', 'Health & Beauty,Phone Tablets', '797', 'Sam', 'honeykhotwani96@gmail.com', 'SUP-1582', '9772610525', '2637, Teaumal Tejumal Khotwani, SayarOli Market,\r\nNasirabad\r\nRajasthan', 'Franch', '1', '2022-03-28 17:32:46', '2022-06-12 01:49:41'),
(20, 'testing', 'Gaming,Health & Beauty', 'tst001', 'tst', 'tst@test.com', 'SUP-7264', '9586887785', 'krishna boys hostel', 'India', '1', '2022-05-12 23:45:45', '2022-05-12 23:46:14'),
(21, 'Swati', 'Phone Tablets', '342', 'Test', 'swa', 'SUP-1233', '80987675', 'test', 'India', '1', '2022-06-12 01:50:43', '2022-06-12 01:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `tickets` (`id`, `user_id`, `ticket_number`, `need_assistance`, `comment`, `ticket_date`, `status`, `created_at`, `updated_at`) VALUES
(67, 77, '', 'Item Not Delivered/Wrong Item Delivered', 'test', '2021-12-13 11:06:13', '2', '2021-12-13 05:36:13', '2022-01-29 07:08:51'),
(68, 77, '', 'Item Not Delivered/Wrong Item Delivered', 'test', '2021-12-13 15:46:11', '2', '2021-12-13 10:16:11', '2022-02-01 06:55:11'),
(70, 77, '', 'Item Not Delivered/Wrong Item Delivered', 'test', '2021-12-18 20:41:08', '1', '2021-12-18 15:11:08', NULL),
(72, 108, '', 'Item Not Delivered/Wrong Item Delivered', 'test', '2022-02-07 16:59:01', '0', '2022-02-07 11:29:01', NULL),
(73, 110, '', 'Other', 'test issue', '2022-02-12 00:20:38', '0', '2022-02-11 18:50:38', NULL),
(74, 108, '', 'Item Not Delivered/Wrong Item Delivered', 'solved this as soon as', '2022-02-15 10:54:33', '0', '2022-02-15 05:24:33', NULL),
(75, 108, '', 'Item Not Delivered/Wrong Item Delivered', 'solved this as soon as', '2022-02-15 10:56:46', '0', '2022-02-15 05:26:46', NULL),
(76, 108, '', 'Other', 'solved this as soon as', '2022-02-15 11:10:14', '0', '2022-02-15 05:40:14', NULL),
(77, 108, '', 'Other', 'solved this as soon as', '2022-02-15 11:11:46', '1', '2022-02-15 05:41:46', '2022-02-17 11:19:32'),
(78, 111, '', 'Item Not Delivered/Wrong Item Delivered', 'test', '2022-02-15 19:03:22', '0', '2022-02-15 13:33:22', NULL),
(79, 0, '', '', '', '2022-02-16 19:52:38', '0', '2022-02-16 14:22:38', NULL),
(80, 108, '', 'Item Not Delivered/Wrong Item Delivered', 'bhsdfsd', '2022-02-17 16:50:28', '1', '2022-02-17 11:20:28', '2022-02-18 07:34:01'),
(81, 77, '', 'other', 'test', '2022-02-21 13:18:39', '0', '2022-02-21 07:48:39', NULL),
(82, 77, '', 'vijaykashyap265@gmail.com', 'dsdasd', '2022-02-21 17:40:09', '0', '2022-02-21 12:10:09', NULL),
(83, 77, '', 'egerygerg', 'egewgew', '2022-02-21 17:41:48', '0', '2022-02-21 12:11:48', NULL),
(84, 77, '', 'hjrhjtrijtrijtriu', 'tutruttru', '2022-02-21 17:42:30', '0', '2022-02-21 12:12:30', NULL),
(85, 77, '', 'vijaykashyap265@gmail.com', 'tertet', '2022-02-21 17:42:43', '0', '2022-02-21 12:12:43', NULL),
(86, 77, '', 'vijaykashyap265@gmail.com', 'testvijay', '2022-02-21 17:50:53', '0', '2022-02-21 12:20:53', NULL),
(87, 77, '', 'vijaykashyap265@gmail.com', 'yt', '2022-02-21 17:55:48', '0', '2022-02-21 12:25:48', NULL),
(88, 77, '', 'vijay', 'testt', '2022-02-21 18:03:46', '0', '2022-02-21 12:33:46', NULL),
(89, 77, '', 'tr', 'yttt', '2022-02-21 18:05:33', '0', '2022-02-21 12:35:33', NULL),
(90, 0, '', '', '', '2022-02-22 04:48:39', '0', '2022-02-21 23:18:39', NULL),
(91, 0, '', '', '', '2022-02-22 04:48:39', '0', '2022-02-21 23:18:39', NULL),
(92, 77, '', 'Other', 'test', '2022-02-22 17:24:43', '0', '2022-02-22 11:54:43', NULL),
(93, 77, '', 'Discrepancy In Points Earned', 'test vijay', '2022-02-22 17:27:28', '0', '2022-02-22 11:57:28', NULL),
(94, 77, '', 'Other', 'test vijay pankaj ticket', '2022-02-22 17:33:20', '0', '2022-02-22 12:03:20', NULL),
(95, 77, '', 'Other', 'test 23 Feb ticket', '2022-02-23 13:20:24', '0', '2022-02-23 07:50:24', NULL),
(96, 77, '', 'Other', 'test vijay evening', '2022-02-23 16:24:26', '0', '2022-02-23 10:54:26', NULL),
(97, 77, '', 'Item not delivered', 'pnkj ticket check', '2022-02-23 17:37:23', '0', '2022-02-23 12:07:23', NULL),
(98, 109, '', 'discrepancy', 'Points not updated', '2022-03-07 18:19:24', '2', '2022-03-07 12:49:24', '2022-03-07 12:56:42'),
(99, 109, '', 'Item Not Delivered/Wrong Item Delivered', 'solved this issue', '2022-03-08 12:08:49', '2', '2022-03-08 06:38:49', '2022-03-08 06:45:37'),
(100, 129, '', 'Item Not Delivered/Wrong Item Delivered', 'solved this as soon as', '2022-03-08 15:44:33', '2', '2022-03-08 10:14:33', '2022-03-08 10:18:16'),
(101, 108, 'TICK000101', 'Item Not Delivered/Wrong Item Delivered', 'solved this issue', '2022-03-08 17:27:09', '2', '2022-03-08 11:57:09', '2022-03-08 12:21:52'),
(102, 108, 'TICK000102', 'discrepancy', 'solved this issue', '2022-03-08 17:27:47', '0', '2022-03-08 11:57:47', NULL),
(103, 130, 'TICK000103', 'Item Not Delivered/Wrong Item Delivered', 'test', '2022-03-28 22:28:16', '1', '2022-03-28 16:58:16', '2022-03-28 17:21:07'),
(107, 108, 'TICK000104', 'Item Not Delivered/Wrong Item Delivered', 'solved this as soon as', '2022-04-20 16:29:20', '0', '2022-04-20 22:29:20', NULL),
(108, 108, 'TICK000108', 'Other', 'solved this issue', '2022-04-20 16:30:13', '0', '2022-04-20 22:30:13', NULL),
(109, 108, 'TICK000109', 'Item Not Delivered/Wrong Item Delivered', 'solved this issue', '2022-04-20 16:44:11', '0', '2022-04-20 22:44:11', NULL),
(110, 108, 'TICK000110', 'Item Not Delivered/Wrong Item Delivered', 'my product not deliverd', '2022-05-05 15:32:10', '0', '2022-05-05 21:32:10', NULL),
(111, 77, 'TICK000111', 'Other', 'Not having same product what i ordered.', '2022-05-05 15:36:39', '0', '2022-05-05 21:36:39', NULL),
(112, 77, 'TICK000112', 'Item Not Delivered/Wrong Item Delivered', 'Bad Product not working properly.', '2022-05-05 15:56:00', '0', '2022-05-05 21:56:00', NULL),
(113, 108, 'TICK000113', 'Item Not Delivered/Wrong Item Delivered', 'test', '2022-05-16 11:14:23', '0', '2022-05-16 17:14:23', NULL),
(114, 130, 'TICK000114', 'Item Not Delivered/Wrong Item Delivered', 'Not interested', '2022-06-11 20:21:21', '2', '2022-06-12 02:21:21', '2022-06-12 02:26:01');

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
  `note` text COLLATE utf8mb4_unicode_ci,
  `date_Of_closure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`id`, `admin_id`, `user_id`, `ticket_id`, `consultant_first_name`, `consultant_last_name`, `consultant_email`, `contact`, `support_actions`, `final_resolution`, `status`, `elaborate_problems`, `note`, `date_Of_closure`, `created_at`, `updated_at`) VALUES
(16, 'admin@admin.com', 77, 70, 'sujeet', 'kumar', 'sujeet419@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'product not work', '', NULL, '2022-01-29 06:58:55', NULL),
(17, 'admin@admin.com', 77, 68, 'sujeet', 'kumar', 'sujeet419@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'product not work', '', NULL, '2022-01-29 06:59:28', NULL),
(18, 'admin@admin.com', 77, 67, 'sujeet', 'kumar', 'sujeet419@gmail.com', '8533886295', 'check technical team', 'done', '2', 'product not work', '', '2022-01-01', '2022-01-29 07:08:51', NULL),
(19, 'admin@admin.com', 77, 68, 'sujeet', 'kumar', 'sujeet419@gmail.com', '8533886295', 'check technical team sucess', 'your problem solved', '2', 'product  work fine', 'if any issue you can contact', '2022-02-01', '2022-02-01 06:55:11', NULL),
(20, 'admin@admin.com', 77, 70, 'sujeet', 'kumar', 'sujeet419@gmail.com', '8329438874', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact', NULL, '2022-02-14 05:04:56', NULL),
(21, 'admin@admin.com', 77, 70, 'sujeet', 'kumar', 'sujeet419@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing hhhhhhhhhh', 'if any issue you can contact', NULL, '2022-02-14 05:05:48', NULL),
(22, 'admin@admin.com', 108, 77, 'pggg', 'kumar', 'sujeegdgdfgv419@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'product not work', 'if any issue you can contact', NULL, '2022-02-17 11:19:32', NULL),
(23, 'admin@admin.com', 108, 80, 'sujeet kumar', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact again', NULL, '2022-02-18 07:34:01', NULL),
(24, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact again', NULL, '2022-02-18 07:35:49', NULL),
(25, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact again', NULL, '2022-02-18 07:36:52', NULL),
(26, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact again', NULL, '2022-02-18 07:40:13', NULL),
(27, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact again', NULL, '2022-02-18 07:40:19', NULL),
(28, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact', NULL, '2022-02-18 07:43:16', NULL),
(29, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact', NULL, '2022-02-18 07:43:44', NULL),
(30, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'product  work fine', 'if any issue you can contact', NULL, '2022-02-18 07:44:15', NULL),
(31, 'admin@admin.com', 108, 80, 'sujeet', 'kumar', 'pankaj@gmail.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'product  work fine', 'if any issue you can contact', NULL, '2022-02-18 07:44:41', NULL),
(32, 'admin@admin.com', 109, 98, 'HITESH', 'KHOTWANI', 'honeykhotwani96@gmail.com', 'Rohit', 'on process', 'Test', '1', 'Checking the issue with Agent report', 'Test', NULL, '2022-03-07 12:54:04', NULL),
(33, 'admin@admin.com', 109, 98, 'HITESH', 'KHOTWANI', 'honeykhotwani96@gmail.com', '979979797', 'Now Solved', 'Solved & points updated', '0', 'Checking the issue with Agent report', 'Test Updated points', NULL, '2022-03-07 12:55:45', NULL),
(34, 'admin@admin.com', 109, 98, 'HITESH', 'KHOTWANI', 'honeykhotwani96@gmail.com', '979979797', 'Now Solved', 'Test', '2', 'Checking the issue with Agent report', 'Test', '2022-03-30', '2022-03-07 12:56:38', NULL),
(35, 'admin@admin.com', 109, 99, 'admin', 'kumar', 'admin@admin.com', '8533886295', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact', NULL, '2022-03-08 06:39:48', NULL),
(36, 'admin@admin.com', 109, 99, 'admin', 'kumar', 'admin@admin.com', '8533886295', 'check technical team sucess', 'your problem solved', '2', 'product  work fine', 'if any issue you can contact again', '2022-03-08', '2022-03-08 06:45:33', NULL),
(37, 'admin@admin.com', 129, 100, 'admin', 'kumar', 'admin@admin.com', '9785969585', 'check technical team', 'update you as soon as', '1', 'go to technical department testing', 'if any issue you can contact', '2022-03-08', '2022-03-08 10:17:00', NULL),
(38, 'admin@admin.com', 129, 100, 'admin', 'kumar', 'admin@admin.com', '8533886295', 'check technical team', 'update you as soon as', '2', 'go to technical department testing', 'if any issue you can contact', '2022-03-08', '2022-03-08 10:18:11', NULL),
(39, 'admin@admin.com', 108, 101, 'admin', 'kumar', 'admin@admin.com', '8533886295', 'check technical team', 'update you as soon as', '2', 'go to technical department testing', 'if any issue you can contact', '2022-03-08', '2022-03-08 12:21:47', NULL),
(40, 'admin@admin.com', 130, 103, 'admin', 'test', 'admin@admin.com', '9876543', 'on process', 'Test', '0', 'Checking the issue with Agent report', 'Test', '2022-03-28', '2022-03-28 17:19:15', NULL),
(41, 'admin@admin.com', 130, 103, 'admin', 'KHOTWANI', 'admin@admin.com', 'Rohit', 'on process', 'Test', '1', 'Checking the issue with Agent report', 'Test', '2022-03-28', '2022-03-28 17:21:04', NULL),
(42, 'admin@admin.com', 130, 114, 'admin', 'test', 'admin@admin.com', '9876543', 'on process', 'Test', '1', 'uyrtdf', 'test', '2022-06-11', '2022-06-12 02:23:02', NULL),
(43, 'admin@admin.com', 130, 114, 'admin', 'test', 'admin@admin.com', 'test', 'Now Solved', 'Solved & points updated', '2', 'test', 'test', '2022-06-11', '2022-06-12 02:26:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_histories`
--

CREATE TABLE `transaction_histories` (
  `id` int(11) NOT NULL,
  `points` float DEFAULT NULL,
  `bonus_points` float DEFAULT NULL,
  `order_points` float DEFAULT NULL,
  `return_points` float DEFAULT NULL,
  `closing_balance` float DEFAULT NULL,
  `guserid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_histories`
--

INSERT INTO `transaction_histories` (`id`, `points`, `bonus_points`, `order_points`, `return_points`, `closing_balance`, `guserid`, `transaction_date`, `created_at`, `updated_at`) VALUES
(5, NULL, NULL, 860, NULL, 19382, 'MD20-12SON', '2022-05-30', '2022-05-30 18:30:43', NULL),
(6, NULL, NULL, 80, NULL, 146831, 'MG565-BH12', '2022-05-30', '2022-05-30 18:47:42', NULL),
(7, NULL, 100, NULL, NULL, 146931, 'MG565-BH12', '2022-05-30', '2022-05-30 18:49:28', NULL),
(8, NULL, 100, NULL, NULL, 146931, 'MG565-BH12', '2022-05-30', '2022-05-30 18:49:38', NULL),
(9, NULL, 10, NULL, NULL, 146941, 'MG565-BH12', '2022-05-28', '2022-05-30 18:51:39', NULL),
(10, NULL, 10, NULL, NULL, 146941, 'MG565-BH12', '2022-05-30', '2022-05-30 18:52:17', NULL),
(11, NULL, 50, NULL, NULL, 146991, 'MG565-BH12', '2022-05-30', '2022-05-30 18:56:22', NULL),
(12, NULL, 111, NULL, NULL, 2111, 'PB01234-PB01216', '2022-05-30', '2022-05-30 19:12:23', NULL),
(13, NULL, 222, NULL, NULL, 147213, 'MG565-BH12', '2022-05-30', '2022-05-30 19:12:23', NULL),
(14, 100, NULL, NULL, NULL, 2211, 'PB01234-PB01216', '2022-05-30', '2022-05-30 19:16:02', NULL),
(15, 500, NULL, NULL, NULL, 147793, 'MG565-BH12', '2022-05-30', '2022-05-30 19:16:03', NULL),
(16, NULL, NULL, NULL, NULL, 20242, 'MD20-12SON', '2022-05-30', '2022-05-30 19:33:28', NULL),
(17, NULL, NULL, NULL, NULL, 21102, 'MD20-12SON', '2022-05-30', '2022-05-30 19:36:18', NULL),
(18, NULL, NULL, NULL, 10, 21112, 'MD20-12SON', '2022-05-30', '2022-05-30 20:44:43', NULL),
(19, NULL, NULL, 1600, NULL, 48400, 'SWS-SDE', '2022-06-10', '2022-06-11 00:38:24', NULL),
(20, 2300, NULL, NULL, NULL, 2300, 'AJM347-JOQ', '2022-06-11', '2022-06-12 00:36:03', NULL),
(21, NULL, NULL, 2000, NULL, 300, 'AJM347-JOQ', '2022-06-11', '2022-06-12 00:44:15', NULL),
(22, NULL, NULL, NULL, 2000, 2300, 'AJM347-JOQ', '2022-06-11', '2022-06-12 00:51:19', NULL),
(23, NULL, 1500, NULL, NULL, 3800, 'AJM347-JOQ', '2022-06-11', '2022-06-12 01:23:03', NULL),
(24, NULL, NULL, 2000, NULL, 46400, 'SWS-SDE', '2022-06-11', '2022-06-12 01:40:17', NULL),
(25, NULL, NULL, 800, NULL, 45600, 'SWS-SDE', '2022-06-11', '2022-06-12 01:47:22', NULL),
(26, NULL, NULL, 5000, NULL, 44400, 'AJM347-JOQ', '2022-06-11', '2022-06-12 02:04:08', NULL),
(27, NULL, NULL, 2525, NULL, 145268, 'MG565-BH12', '2022-06-13', '2022-06-13 19:16:30', NULL),
(28, NULL, NULL, 90, NULL, 21022, 'MD20-12SON', '2022-06-13', '2022-06-13 19:30:42', NULL),
(29, NULL, NULL, 2525, NULL, 142743, 'MG565-BH12', '2022-06-13', '2022-06-13 19:31:54', NULL);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
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
(6, 'Shekhar', 'shekharkelkar175@gmail.com', NULL, '$2y$10$HoOtH6t9gNQBw2QHu0OI2uoS68mdQHb0XDI7YXyGg32WkzBHoZyOC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'shubhangi', 'shubhangijaiswal95@gmail.com', NULL, '$2y$10$MRCpTFeGPy7lyDE2QyvR4e7lt9LbW.w15W.52qT.GwrNlcETY9mTa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_bonuspointupdates`
--

CREATE TABLE `user_bonuspointupdates` (
  `id` int(11) NOT NULL,
  `guserid` varchar(255) NOT NULL,
  `old_point` int(11) NOT NULL,
  `update_point` int(11) NOT NULL,
  `update_reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_bonuspointupdates`
--

INSERT INTO `user_bonuspointupdates` (`id`, `guserid`, `old_point`, `update_point`, `update_reason`, `created_at`) VALUES
(1, 'MD20-12SON', 100, 200, 'update point', '2022-02-08 09:53:33'),
(2, 'MD20-12SON', 100, 200, 'update point', '2022-02-08 09:55:38'),
(3, 'MD20-12SON', 200, 400, 'test', '2022-02-11 16:52:47'),
(4, 'hQ@-JOQ', 2500, 170, 'Update Bonus', '2022-03-07 12:47:02'),
(5, 'hQ@-JOQ', 170, 450, 'Update new points', '2022-03-07 14:34:00'),
(6, 'GAHA567-sunny-001', 1000, 1200, 'test', '2022-03-08 10:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_pointupdates`
--

CREATE TABLE `user_pointupdates` (
  `id` int(11) NOT NULL,
  `guserid` varchar(255) NOT NULL,
  `old_point` int(11) NOT NULL,
  `update_point` int(11) NOT NULL,
  `update_reason` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_pointupdates`
--

INSERT INTO `user_pointupdates` (`id`, `guserid`, `old_point`, `update_point`, `update_reason`, `created_date`) VALUES
(2, 'MD20-12SON', 500, 600, 'update new', '2022-02-08 07:54:59'),
(3, 'MD20-12SON', 600, 500, 'reversepoint', '2022-02-08 07:57:31'),
(4, 'MD20-12SON', 500, 600, 'tetet', '2022-02-08 08:02:14'),
(5, 'MD20-12SON', 600, 1000, 'for testing', '2022-02-08 12:33:35'),
(6, 'MD20-12SON', 1000, 900, 'Test change', '2022-02-11 16:43:51'),
(7, 'MD20-12SON', 900, 800, 'test', '2022-02-11 16:44:31'),
(8, 'MD20-12SON', 800, 700, 'test', '2022-02-11 16:51:21'),
(16, 'MD20-12SON', 100, 100, 'testttt', '2022-02-16 07:10:37'),
(17, 'MD20-12SON', 100, 200, 'update', '2022-02-16 07:44:06'),
(18, 'MD20-12SON', 200, 600, 'tttt', '2022-02-16 07:45:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acbalances`
--
ALTER TABLE `acbalances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencygroups`
--
ALTER TABLE `agencygroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_points`
--
ALTER TABLE `bonus_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `point_transfers`
--
ALTER TABLE `point_transfers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product_histories`
--
ALTER TABLE `product_histories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `p_c_c_s`
--
ALTER TABLE `p_c_c_s`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `revol_images`
--
ALTER TABLE `revol_images`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_bonuspointupdates`
--
ALTER TABLE `user_bonuspointupdates`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_pointupdates`
--
ALTER TABLE `user_pointupdates`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencygroups`
--
ALTER TABLE `agencygroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bonus_points`
--
ALTER TABLE `bonus_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_histories`
--
ALTER TABLE `product_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `p_c_c_s`
--
ALTER TABLE `p_c_c_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `revol_images`
--
ALTER TABLE `revol_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_bonuspointupdates`
--
ALTER TABLE `user_bonuspointupdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_pointupdates`
--
ALTER TABLE `user_pointupdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
