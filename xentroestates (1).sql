-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 09:40 AM
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
-- Database: `xentroestates`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_contents`
--

CREATE TABLE `about_us_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `id` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`, `profile_pic`, `email`, `id`) VALUES
('admin1', '$2y$12$5lfHSLFV7KPKYNZWA909cOlxZ4Jj6nQEIJCnZjO.TNM/8Bq1MFxX2', 'profile_pics/PKdXOP92matJASSfAc1GNabOTaHnMkKkVWiJsQ8s.png', 'admin@example.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdivision_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `subdivision_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 116, 'Pool', '2025-03-09 23:47:20', '2025-03-09 23:47:20'),
(6, 116, 'house', '2025-03-09 23:47:20', '2025-03-09 23:47:20'),
(7, 118, 'Pool', '2025-04-10 21:30:24', '2025-04-10 21:30:24'),
(8, 118, 'Seperated', '2025-04-10 21:30:24', '2025-04-10 21:30:24'),
(9, 119, 'Pool', '2025-04-10 21:30:46', '2025-04-10 21:30:46'),
(10, 119, 'Seperated', '2025-04-10 21:30:46', '2025-04-10 21:30:46'),
(11, 120, 'Pool', '2025-04-10 21:32:05', '2025-04-10 21:32:05'),
(12, 120, 'Seperated', '2025-04-10 21:32:05', '2025-04-10 21:32:05'),
(13, 121, 'Pool', '2025-04-10 21:44:48', '2025-04-10 21:44:48'),
(14, 121, 'Seperated', '2025-04-10 21:44:48', '2025-04-10 21:44:48'),
(15, 122, 'Pool', '2025-04-10 21:45:12', '2025-04-10 21:45:12'),
(16, 122, 'Seperated', '2025-04-10 21:45:12', '2025-04-10 21:45:12'),
(17, 123, 'Pool', '2025-04-10 21:47:20', '2025-04-10 21:47:20'),
(18, 123, 'Seperated', '2025-04-10 21:47:20', '2025-04-10 21:47:20'),
(19, 124, 'Pool', '2025-04-10 21:49:42', '2025-04-10 21:49:42'),
(20, 124, 'Seperated', '2025-04-10 21:49:42', '2025-04-10 21:49:42'),
(21, 125, 'Pool', '2025-04-10 21:50:58', '2025-04-10 21:50:58'),
(22, 125, 'Seperated', '2025-04-10 21:50:58', '2025-04-10 21:50:58'),
(23, 126, 'Pool', '2025-04-10 21:54:15', '2025-04-10 21:54:15'),
(24, 126, 'Seperated', '2025-04-10 21:54:15', '2025-04-10 21:54:15'),
(25, 127, 'Pool', '2025-04-10 21:55:21', '2025-04-10 21:55:21'),
(26, 127, 'Seperated', '2025-04-10 21:55:21', '2025-04-10 21:55:21'),
(27, 128, 'Pool', '2025-04-10 22:08:10', '2025-04-10 22:08:10'),
(28, 128, 'Seperated', '2025-04-10 22:08:10', '2025-04-10 22:08:10'),
(29, 129, 'Pool', '2025-04-10 22:56:51', '2025-04-10 22:56:51'),
(30, 129, 'Seperated', '2025-04-10 22:56:51', '2025-04-10 22:56:51'),
(31, 130, 'Pool', '2025-04-11 00:49:58', '2025-04-11 00:49:58'),
(32, 130, 'Seperated', '2025-04-11 00:49:58', '2025-04-11 00:49:58'),
(33, 131, 'Pool', '2025-04-11 22:00:39', '2025-04-11 22:00:39'),
(34, 131, 'Seperated', '2025-04-11 22:00:39', '2025-04-11 22:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdivision_id` bigint(20) UNSIGNED NOT NULL,
  `block_area` decimal(11,0) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `subdivision_id`, `block_area`, `created_at`, `updated_at`) VALUES
(44, 97, 1000, '2025-03-07 19:18:45', '2025-04-11 17:08:45'),
(48, 111, 234, '2025-03-07 22:23:42', '2025-03-07 22:23:42'),
(52, 116, 232, '2025-03-09 23:47:20', '2025-03-09 23:47:20'),
(53, 119, 17283, '2025-04-10 21:30:46', '2025-04-10 21:30:46'),
(54, 120, 123333, '2025-04-10 21:32:05', '2025-04-10 21:32:05'),
(55, 121, 1233, '2025-04-10 21:44:48', '2025-04-10 21:44:48'),
(56, 122, 1233, '2025-04-10 21:45:12', '2025-04-10 21:45:12'),
(57, 123, 1233, '2025-04-10 21:47:20', '2025-04-10 21:47:20'),
(58, 124, 1002, '2025-04-10 21:49:42', '2025-04-10 21:49:42'),
(59, 125, 2323, '2025-04-10 21:50:58', '2025-04-10 21:50:58'),
(60, 126, 1029, '2025-04-10 21:54:15', '2025-04-10 21:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `property` varchar(255) NOT NULL,
  `inquiring` varchar(255) NOT NULL,
  `communication` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`communication`)),
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `fname`, `lname`, `email`, `phone`, `property`, `inquiring`, `communication`, `notes`, `created_at`, `updated_at`) VALUES
(10, 'EARL MIKE', 'SARABIA', 'sarabiaearlmike14@gmail.com', '09925318606', 'You', 'self', '[\"whatsapp\",\"viber\"]', 'asdasd', '2025-04-11 22:20:52', '2025-04-11 22:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_price`, `created_at`, `updated_at`) VALUES
(1, 'NGV Prime', 6500, '2025-04-10 19:16:08', '2025-04-11 17:07:02'),
(2, 'Corner', 6500, '2025-04-10 19:16:35', '2025-04-10 21:22:40'),
(4, 'Inner', 5500, '2025-04-10 21:22:30', '2025-04-10 23:23:56'),
(5, 'NGH Special Lots', 1850, '2025-04-11 17:07:29', '2025-04-11 17:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_name` int(255) DEFAULT NULL,
  `cat_price` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_subs`
--

CREATE TABLE `gallery_subs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `subdivision_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subdivision_id` bigint(20) UNSIGNED NOT NULL,
  `block_id` bigint(20) UNSIGNED NOT NULL,
  `assigned_house_number` int(11) NOT NULL,
  `house_area` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `house_price` decimal(10,2) DEFAULT NULL,
  `house_status` varchar(255) NOT NULL DEFAULT 'Available',
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `subdivision_id`, `block_id`, `assigned_house_number`, `house_area`, `created_at`, `updated_at`, `house_price`, `house_status`, `category`) VALUES
(90, 111, 48, 324, 3242.00, '2025-03-07 22:23:42', '2025-03-07 22:23:42', 34.00, 'Available', NULL),
(94, 116, 52, 232, 232.00, '2025-03-09 23:47:20', '2025-04-11 18:21:17', 21312.00, 'Available', 'NGV Prime'),
(95, 97, 44, 1, 1000.00, '2025-04-10 19:36:59', '2025-04-11 17:08:45', 123123.00, 'Reserved', 'NGH Special Lots'),
(96, 119, 53, 123, 1232.11, '2025-04-10 21:30:46', '2025-04-10 21:30:46', 123123.00, 'Reserved', NULL),
(97, 120, 54, 123, 123.22, '2025-04-10 21:32:05', '2025-04-10 21:32:05', 23231.00, 'Available', NULL),
(98, 122, 56, 123, 1234.22, '2025-04-10 21:45:12', '2025-04-10 21:45:12', NULL, 'Available', NULL),
(99, 123, 57, 123, 1111.22, '2025-04-10 21:47:20', '2025-04-10 21:47:20', NULL, 'Reserved', NULL),
(100, 124, 58, 123, 1233.11, '2025-04-10 21:49:42', '2025-04-10 21:49:42', NULL, 'Available', NULL),
(101, 125, 59, 123, 1233.11, '2025-04-10 21:50:58', '2025-04-10 21:50:58', NULL, 'Available', NULL),
(102, 126, 60, 123, 1233.11, '2025-04-10 21:54:15', '2025-04-10 21:54:15', NULL, 'Reserved', '1'),
(109, 116, 52, 233, 400.00, '2025-04-11 16:50:09', '2025-04-11 16:50:09', NULL, 'Available', 'Corner');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `housing_type` varchar(255) DEFAULT NULL,
  `custom_housing_type` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `liked_sessions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `description`, `category`, `housing_type`, `custom_housing_type`, `type`, `price`, `address`, `city`, `state`, `zip`, `bedrooms`, `bathrooms`, `area`, `status`, `is_featured`, `image`, `created_at`, `updated_at`, `latitude`, `longitude`, `contact_name`, `contact_email`, `contact_phone`, `likes`, `liked_sessions`) VALUES
(36, 'New Generation', 'New modern house', 'Housing', NULL, NULL, 'sale', 1200000.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 12, 3, 120000, 'pending', 1, 'images/hqWvax9l2780qr9h0DF88lou3amgiYtujGvXpL88.jpg', '2025-03-05 21:19:58', '2025-04-09 18:07:31', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 1, '[\"eeQyH57l4v5kfb4f1jHroq6yJ5edznldKwSYWMeS\"]'),
(37, 'New Era', 'New generation housing for you and me.', 'Housing', 'Office Property', NULL, 'sale', 25000.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 12, 1, 14009, 'pending', 1, 'listings/op6BU5PpL42yhK54AVwjTIwsfVnM3ZYfYdCTAyTn.jpg', '2025-03-09 18:04:14', '2025-04-10 18:35:02', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 1, '[\"198V4cHFQgLP8ERfynyPKtSkmqoQMsy1H99St17W\"]'),
(38, 'History', 'Historical housing that you will never forget.', 'Housing', 'Office Property', NULL, 'sale', 24566.00, 'Tiptip', 'Tagbilaran', 'Bohol', '6300', 6, 3, 2312312, 'pending', 1, 'listings/QisXRdpV1OKrSrybgpc3dhcywTZPZiJoCuUCZD6J.jpg', '2025-03-09 18:05:49', '2025-04-07 21:28:40', 10.36305200, 123.73263070, 'Earl Mike Sarabia', 'peterkyle.gingo@bisu.edu.ph', '09207080240', 1, '[\"eeQyH57l4v5kfb4f1jHroq6yJ5edznldKwSYWMeS\"]');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(24, '2025_03_03_033313_create_ngh_table', 1),
(25, '2025_03_05_003802_add_assigned_house_number_to_houses_table', 2),
(26, '2025_03_06_031220_add_house_price_to_houses_table', 3),
(27, '2025_03_06_083031_add_block_id_to_houses_table', 4),
(29, '2025_03_07_011059_add_house_status_to_houses_table', 5),
(31, '2025_03_07_012043_update_block_house_number_in_ngh', 6),
(32, '2025_03_07_020236_update_block_id_in_houses', 7),
(33, '2025_03_08_060447_add_plot_to_ngh_table', 8),
(34, '2025_03_08_064448_create_sub_query_table', 9),
(35, '2025_03_10_011704_create_amenities_table', 10),
(36, '2025_04_10_011607_create_bookings_table', 11),
(37, '2025_04_11_025428_create_categories_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ngh`
--

CREATE TABLE `ngh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `plot` varchar(255) DEFAULT NULL,
  `block_number` int(11) DEFAULT NULL,
  `block_area` decimal(8,2) NOT NULL DEFAULT 0.00,
  `house_number` int(11) DEFAULT NULL,
  `house_area` decimal(10,2) DEFAULT NULL,
  `house_status` varchar(255) NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ngh`
--

INSERT INTO `ngh` (`id`, `sub_name`, `price`, `image`, `plot`, `block_number`, `block_area`, `house_number`, `house_area`, `house_status`, `created_at`, `updated_at`, `location`, `description`, `status`, `category`) VALUES
(97, 'North Grand Heights', NULL, 'subdivision_images/L8ao2xCAaejMDqNJGdzNuNZx60YzmvNdkNmbHbAp.png', 'subdivision_plots/Kc7NeFL6yXq6nCg46bfMCZXDJKgzdEEr3EAnSz8j.png', 1, 0.00, 1, 0.00, 'Available', '2025-03-06 21:19:02', '2025-04-10 19:36:59', 'Banban,Bogo City', 'Best place to dwell, where the future is free', NULL, NULL),
(116, 'Lindavillerers', NULL, 'subdivision_images/bb9y1IBlP6KHC7x4GMcTnNhOkYmQWi4E39gc1NEG.png', 'subdivision_plots/GMEzD0SgxWW20lX3MX9xSw1P4xS98H6O2EVhi4ka.png', 1, 0.00, 2, 0.00, 'Available', '2025-03-09 23:47:20', '2025-04-11 16:50:09', 'Tagbilaran', 'Best place to dwell in town.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_companies`
--

CREATE TABLE `related_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('04Lsb3hlqicd3HHYBjk6NNSXMaN5oNccDdf2D1i3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieFZOZ2RReDhzcXhXWTAwNFdwVnpTa1lnOEZLalBwM3dlNmpaQ0ZGTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly94ZW50cm8uZXN0YXRlcy50ZXN0L25naC1zdWJkaXZpc2lvbi8xMTYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE1OiJhZG1pbl9sb2dnZWRfaW4iO2I6MTt9', 1744443565);

-- --------------------------------------------------------

--
-- Table structure for table `sub_query`
--

CREATE TABLE `sub_query` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `lot` varchar(255) NOT NULL,
  `subdivision_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_query`
--

INSERT INTO `sub_query` (`id`, `name`, `phone_number`, `email`, `purpose`, `lot`, `subdivision_id`, `created_at`, `updated_at`, `address`, `block`) VALUES
(14, 'Earl Mike Hilot Sarabia', '09925318606', 'sarabiaearlmike14@gmail.com', 'asdasd', '2', 97, '2025-04-09 18:23:41', '2025-04-09 18:23:41', '0544-I, R. Enerio Street Upper Candait Barangay Dampas', '2');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `motto` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_contents`
--
ALTER TABLE `about_us_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amenities_subdivision_id_foreign` (`subdivision_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery_subs`
--
ALTER TABLE `gallery_subs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngh`
--
ALTER TABLE `ngh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_query`
--
ALTER TABLE `sub_query`
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
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_subs`
--
ALTER TABLE `gallery_subs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ngh`
--
ALTER TABLE `ngh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `sub_query`
--
ALTER TABLE `sub_query`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
