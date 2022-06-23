-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 02:55 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
  `bonus_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_point` int(11) NOT NULL DEFAULT 0,
  `bonus_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` int(11) NOT NULL DEFAULT 0,
  `bonus_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_points`
--

INSERT INTO `bonus_points` (`id`, `admin_id`, `user_email`, `bonus_date`, `bonus_point`, `bonus_reason`, `source`, `bonus_status`, `created_at`, `updated_at`) VALUES
(6, 'admin@admin.com', 'admin@admin.com', '16-09-2021', 1500, 'demo', 0, 0, '2021-09-16 00:39:55', '2021-09-16 00:39:55'),
(8, 'admin@admin.com', 'sylviaanim@yahoo.co.uk', '16-09-2021', 100, 'demo', 0, 0, '2021-09-16 05:08:42', '2021-09-16 05:08:42'),
(9, 'admin@admin.com', 'galleyjk@gmail.com', '16-09-2021', 200, 'demo', 0, 0, '2021-09-16 05:08:42', '2021-09-16 05:08:42'),
(10, 'admin@admin.com', 'ewurasidjan@yahoo.com', '16-09-2021', 300, 'demo', 0, 0, '2021-09-16 05:08:42', '2021-09-16 05:08:42'),
(11, 'admin@admin.com', 'patlabelle2008@yahoo.com', '16-09-2021', 500, 'demo', 0, 0, '2021-09-16 05:08:42', '2021-09-16 05:08:42');

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
(1, 'Phone & Tablets', 'Téléphone & Tablettes', 1, NULL, '2021-09-13 06:35:00'),
(3, 'Health & Beauty', 'Santé & Beauté', 1, NULL, '2021-09-12 08:00:47'),
(5, 'Electronics', 'Électronique', 1, NULL, '2021-09-12 08:01:04'),
(7, 'Computing', 'L\'informatique', 1, NULL, '2021-09-12 08:00:22'),
(9, 'Gaming', 'Jeux', 1, NULL, '2021-09-12 08:01:25'),
(11, 'Vouchers', 'Pièces justificatives', 1, NULL, '2021-09-12 08:01:46');

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
(1, 'Nigiria', 'Nigeria', 1, '2021-09-13 02:44:52', NULL);

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
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_histories`
--

INSERT INTO `order_histories` (`id`, `product_id`, `sign_on`, `pcc`, `points`, `email`, `created_at`, `updated_at`) VALUES
(1, '1', 'GHY25', 'GH22', 1500, 'admin@admin.com', NULL, NULL),
(2, '1', 'SA', '7E4J', 100, 'sylviaanim@yahoo.co.uk', NULL, NULL),
(3, '1', '774E', 'JG', 100, 'galleyjk@gmail.com', NULL, NULL),
(4, '1', 'ED', '774w', 100, 'ewurasidjan@yahoo.com', NULL, NULL),
(5, '1', 'PA', '7J1E', 100, 'patlabelle2008@yahoo.com', NULL, NULL),
(6, '1', 'EA', '7E4J', 100, 'kumakate@yahoo.com', NULL, NULL),
(7, '1', 'SN', '3K8J', 100, 'matnoa2000@yahoo.com', NULL, NULL),
(8, '1', 'hg78', 'hj', 50, 'product@product.com', '2021-09-17 06:38:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `months` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `admin_id`, `sign_on`, `pcc`, `points`, `email`, `months`, `year`, `status`, `created_at`, `updated_at`) VALUES
(44, 'admin@admin.com', 'SA', '7E4J', 500, 'sylviaanim@yahoo.co.uk', 'september', '2021', 0, '2021-08-17 12:23:25', '2021-09-20 12:23:25'),
(45, 'admin@admin.com', 'JG', '774E', 1000, 'galleyjk@gmail.com', 'september', '2021', 0, '2021-09-20 12:23:25', '2021-09-20 12:23:25'),
(46, 'admin@admin.com', 'ED', '774w', 1500, 'ewurasidjan@yahoo.com', 'september', '2021', 0, '2021-09-20 12:23:25', '2021-09-20 12:23:25'),
(47, 'admin@admin.com', 'PA', '7J1E', 1200, 'patlabelle2008@yahoo.com', 'september', '2021', 0, '2021-09-20 12:23:25', '2021-09-20 12:23:25'),
(48, 'admin@admin.com', 'EA', '7E4J', 1100, 'kumakate@yahoo.com', 'september', '2021', 0, '2021-09-20 12:23:25', '2021-09-20 12:23:25'),
(49, 'admin@admin.com', 'SN', '3K8J', 999, 'matnoa2000@yahoo.com', 'september', '2021', 0, '2021-09-20 12:23:25', '2021-09-20 12:23:25');

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
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_deals` int(11) NOT NULL,
  `product_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `country_id`, `product_name_en`, `product_name_fr`, `product_qty`, `points`, `product_thambnail`, `product_description_en`, `product_description_fr`, `product_start_date`, `product_end_date`, `special_deals`, `product_active`, `created_at`, `updated_at`) VALUES
(1, 5, 3, '1', 'demo', 'démo', '10', '1000', 'upload/products/thambnail/1710968843720385.webp', NULL, NULL, '2021-09-15', '2021-09-16', 1, 1, '2021-09-15 06:27:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_histories`
--

CREATE TABLE `product_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_histories`
--

INSERT INTO `product_histories` (`id`, `product_id`, `sign_on`, `pcc`, `points`, `email`, `created_at`, `updated_at`) VALUES
(1, '1', 'GHY25', 'GH22', 1500, 'admin@admin.com', NULL, NULL),
(2, '1', 'SA', '7E4J', 100, 'sylviaanim@yahoo.co.uk', NULL, NULL),
(3, '1', '774E', 'JG', 100, 'galleyjk@gmail.com', NULL, NULL),
(4, '1', 'ED', '774w', 100, 'ewurasidjan@yahoo.com', NULL, NULL),
(5, '1', 'PA', '7J1E', 100, 'patlabelle2008@yahoo.com', NULL, NULL),
(6, '1', 'EA', '7E4J', 100, 'kumakate@yahoo.com', NULL, NULL),
(7, '1', 'SN', '3K8J', 100, 'matnoa2000@yahoo.com', NULL, NULL),
(8, '1', 'hg78', 'hj', 50, 'product@product.com', '2021-09-17 06:38:55', NULL);

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
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `closing_bal` int(11) NOT NULL,
  `pcc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `admin_id`, `first_name`, `last_name`, `email`, `password`, `date_of_birth`, `contact`, `points`, `closing_bal`, `pcc`, `sign_on`, `source`, `created_at`, `updated_at`) VALUES
(23, 'admin@admin.com', 'Sylvia', 'Anim     ', 'sylviaanim@yahoo.co.uk', 'Sylvia@123', '01-02-2015', '5859585658', 993, 993, '7E4J', 'SA', 0, '2021-09-18 04:11:04', '2021-09-18 04:11:04'),
(24, 'admin@admin.com', 'Jonathan', 'K. Galley    ', 'galleyjk@gmail.com', 'Jonathan@123', '01-02-2016', '5859585658', 2939, 2939, '774E', 'JG', 0, '2021-09-18 04:11:04', '2021-09-18 04:11:04'),
(25, 'admin@admin.com', 'Ewurasi', 'Djan     ', 'ewurasidjan@yahoo.com', 'Ewurasi@123', '01-02-2017', '5859585658', 32, 32, '774w', 'ED', 0, '2021-09-18 04:11:04', '2021-09-18 04:11:04'),
(26, 'admin@admin.com', 'PATIENCE', 'AGBESI     ', 'patlabelle2008@yahoo.com', 'PATIENCE@123', '01-02-2018', '5859585658', 337, 337, '7J1E', 'PA', 0, '2021-09-18 04:11:04', '2021-09-18 04:11:04'),
(27, 'admin@admin.com', 'Agyei', 'Emmanuel     ', 'kumakate@yahoo.com', 'Agyei@123', '01-02-2019', '5859585658', 550, 550, '7E4J', 'EA', 0, '2021-09-18 04:11:04', '2021-09-18 04:11:04'),
(28, 'admin@admin.com', 'Sylvia', 'Noamesi     ', 'matnoa2000@yahoo.com', 'Sylvia@123', '01-02-2020', '5859585658', 247, 247, '3K8J', 'SN', 0, '2021-09-18 04:11:04', '2021-09-18 04:11:04');

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
(1, 'upload/revolving_image/1710773822627857.jpg', 'Demo title', 'titre de la démo', 'Demo description', 'description de la démo', 1, '2021-09-13 02:47:36', NULL);

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
('8tw6U295qOKycRzaZUi19H1KsMj8ZF3yeCjXxJU4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0wyWk9GUnY1eml0V2R6Zk85V25QREZjd2VyRmEydE1qczEydHNBZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2JhbGFuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1632199515),
('eu0tOURPCH3toe0CiUwxee03CKXzWM5yYx894hNK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1BhS3RLWFR0RkNuUWxWbXBxWGw0Sk93UGEyRzZQNU94eE8xc2FqNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hY2NvdW50L2JhbGFuY2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1632199515),
('OFtYfWeTe4WhzpWtOibg3ZGGEehtWJVmVyrYtB4s', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSmxRVmY0TFRwY2RwdHBwTklhR0Yya1ZmWVd5ZEI1M0hSa2dpYjJzOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0L2hpc3RvcnkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkRHdtQmcyVERFT3dieHN3WVZPaHI3dVd3RnVSWjdDNjRIL0ZObVJNTEVCOUF1djdoR01tclMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJER3bUJnMlRERU93Ynhzd1lWT2hyN3VXd0Z1Ulo3QzY0SC9GTm1STUxFQjlBdXY3aEdNbXJTIjt9', 1632212244),
('xdAr1oiJAaqBQysZLR6inO2XqdxDzJvLGIqT0RjH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMVU0amxVQmVRZzJqTVNCWVE0NlJmSHJyanZ2b2JlN0VSamc2MkRsRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Jhc2UvdGlja2V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJER3bUJnMlRERU93Ynhzd1lWT2hyN3VXd0Z1Ulo3QzY0SC9GTm1STUxFQjlBdXY3aEdNbXJTIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCREd21CZzJUREVPd2J4c3dZVk9ocjd1V3dGdVJaN0M2NEgvRk5tUk1MRUI5QXV2N2hHTW1yUyI7fQ==', 1632223344);

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
(1, 'upload/slider/1710774878627731.png', 1, '2021-09-13 03:04:23', NULL);

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
(1, 7, 'Laptops', 'Portable', 1, '2021-09-12 07:59:04', NULL),
(2, 7, 'Desktops', 'Ordinateurs de bureau', 1, '2021-09-12 08:02:47', NULL),
(3, 7, 'Accessories', 'Accessoires', 1, '2021-09-12 08:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `need_assistance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0=open,1=workinprogress,2=closed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `need_assistance`, `ticket_date`, `status`, `created_at`, `updated_at`) VALUES
(23, 23, 'xyz', '01-20-2021', '1', '2021-09-17 02:00:09', '2021-09-17 05:56:09'),
(24, 16, 'xyz', '01-20-2012', '2', '2021-09-17 02:00:32', '2021-09-17 05:35:16'),
(25, 15, 'xyz', '01-20-2012', '1', '2021-09-17 02:01:59', '2021-09-17 05:42:21'),
(26, 18, 'sjkdhakegfouakfafea', '01-10-2012', '1', '2021-09-17 06:03:44', '2021-09-17 06:04:31'),
(27, 20, 'item not deliverd', '01-10-2012', '0', '2021-09-17 07:58:42', NULL);

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `ticket_statuses` (`id`, `admin_id`, `user_id`, `ticket_id`, `consultant_first_name`, `consultant_last_name`, `email`, `contact`, `support_actions`, `final_resolution`, `status`, `elaborate_problems`, `date_Of_closure`, `created_at`, `updated_at`) VALUES
(4, 'admin@admin.com', 1, 2, 'abc', 'abc', 'admin@admin.com', '1252545455', 'adsasdasdasd', 'asdasdasdasdasd', '2', 'sadasdasdasd', '2021-09-17', '2021-09-17 05:35:16', NULL),
(5, 'admin@admin.com', 1, 3, 'abc', 'abc', 'admin@admin.com', '1252545455', 'adsasdasdasd', 'asdasdasdasdasd', '1', 'sadasdasdasd', '2021-09-17', '2021-09-17 05:42:21', NULL),
(6, 'admin@admin.com', 1, 1, 'abc', 'abc', 'admin@admin.com', '1252545455', 'adsasdasdasd', 'asdasdasdasdasd', '1', 'sadasdasdasd', '2021-09-17', '2021-09-17 05:56:09', NULL),
(7, 'admin@admin.com', 18, 4, 'sfwerfwer', 'werwerwr', 'demo@test.com', '1252545455', 'ewrwerwerw', 'werwerwerw', '1', 'erwerwewe', '2021-09-17', '2021-09-17 06:04:31', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$DwmBg2TDEOwbxswYVOhr7uWwFuRZ7C64H/FNmRMLEB9Auv7hGMmrS', NULL, NULL, NULL, NULL, NULL, '2021-09-10 10:32:56', '2021-09-10 10:32:56');

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
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_histories`
--
ALTER TABLE `product_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `revol_images`
--
ALTER TABLE `revol_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
