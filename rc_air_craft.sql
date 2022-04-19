-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 08:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rc_air_craft`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_by`, `name`, `slug`, `description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 1, 'Competitions', 'competitions', 'Lorem Ipsum', '1', NULL, '2022-04-12 14:56:12', '2022-04-14 13:28:57'),
(7, 1, 'Mini Competitions', 'mini-competitions', NULL, '1', NULL, '2022-04-14 13:28:45', '2022-04-14 13:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` bigint(20) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_purchase` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `title`, `slug`, `coupon_type`, `discount`, `coupon_code`, `max_purchase`, `start_date`, `expire_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 1, 'New Coupon', 'new-coupon', 'fix', 50, '45rdfdf', 10, '2022-04-15', '2022-04-30', '1', NULL, '2022-04-13 15:37:02', '2022-04-13 15:37:02'),
(4, 1, 'New Data', 'new-data', 'percent', 100, '45rdfdf', 30, '2022-04-28', '2022-04-30', '1', NULL, '2022-04-13 15:38:56', '2022-04-13 15:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usages` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `created_by`, `question`, `answer`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 1, 'HOW MANY TIMES CAN I ENTER?', 'A user (One Person) with an active account may enter up to 20-40 times per competition, however if we run bigger competitions with a higher price the amount of entries will reduce to what is stated on the competitions page.', '1', NULL, '2022-04-12 20:11:14', '2022-04-12 20:11:14'),
(8, 1, 'HOW SAFE ARE MY CARD DETAILS AND PRIVACY?', 'We maintain the highest standards when protecting your personal data and card information, we have passed all PCI Compliance with our Payment Gateways and banks to ensure all data is encrypted and safe from cyber attacks, R.C Aircraft Online also has the highest security on the admin account and all login areas are hidden including enabled 2FA (2 Factor Authentication), so any attack globally our sites infrastructure will remotely block the attackers IP address, the same applies if your own account was being attacked.', '1', NULL, '2022-04-12 20:28:43', '2022-04-12 20:28:43'),
(9, 1, 'HOW IS THE WINNER CHOSEN?', 'Once all entries are in and the draw is closed, all entries will then be posted on our facebook page and website within 24 hours. This will include your draw number to the right of your name which is what we will use in the LIVE draw to decide the winner. This means you can watch the live draw with your corresponding number(s) in hand. ​Googles random number generator will then be used to chose a winner, the name linking to the winning number chosen, will be the winner, draw usually take place on wednesday and sunday evening at 7:30 pm', '1', NULL, '2022-04-12 20:29:50', '2022-04-12 20:29:50'),
(10, 1, 'HOW DO I COLLECT MY PRIZE?', 'R.C Aircraft Online prizes will be shipped out to the winner for free, or you can come and collect from our office, we ask that all winners to have a photo taken and the photo to be sent to us for use on our channels and R.C Aircraft Online winners page.', '1', NULL, '2022-04-12 20:30:18', '2022-04-13 19:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `how_to_plays`
--

CREATE TABLE `how_to_plays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_to_plays`
--

INSERT INTO `how_to_plays` (`id`, `created_by`, `title`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 1, 'CHOOSE COMPETITION', 'Choose from our list of current competitions which prize you want to enter for.', '20220418181227.png', '1', NULL, '2022-04-18 13:12:27', '2022-04-18 13:12:27'),
(5, 1, 'ANSWER THE QUESTION', 'Answer the skill based question for your entry to be successful.', '20220418181356.png', '1', NULL, '2022-04-18 13:13:56', '2022-04-18 13:13:56'),
(6, 1, 'ENTER LIVE DRAW', 'Assuming you entered the answer correctly you will be entered into the Facebook Live draw.', '20220418181453.png', '1', NULL, '2022-04-18 13:14:53', '2022-04-18 13:14:53'),
(7, 1, 'FACEBOOK', 'Sit back and watch the live draw on our Facebook Page.', '20220418181538.png', '1', NULL, '2022-04-18 13:15:38', '2022-04-18 13:15:38');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_06_183800_create_permission_tables', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(10, '2022_04_11_172013_create_options_table', 5),
(13, '2022_04_07_181713_create_products_table', 7),
(14, '2022_04_11_172137_create_categories_table', 8),
(15, '2022_04_11_171933_create_questions_table', 9),
(16, '2022_04_12_203003_create_faqs_table', 10),
(18, '2022_04_13_174758_create_coupon_usages_table', 12),
(20, '2022_04_13_171413_create_coupons_table', 13),
(21, '2022_04_15_173238_create_newsletters_table', 14),
(22, '2022_03_14_084656_create_pages_table', 15),
(24, '2022_03_14_143426_create_page_settings_table', 16),
(25, '2022_04_15_232111_create_sliders_table', 17),
(26, '2022_04_15_232323_create_how_to_plays_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `choices` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `choices`, `created_at`, `updated_at`) VALUES
(25, 11, 'B.S.A', '2022-04-12 14:59:37', '2022-04-12 14:59:37'),
(26, 11, 'B.M.C.A', '2022-04-12 14:59:37', '2022-04-12 14:59:37'),
(29, 13, 'B.S.A', '2022-04-12 15:13:55', '2022-04-12 15:13:55'),
(30, 13, 'B.M.C.A', '2022-04-12 15:13:55', '2022-04-12 15:13:55'),
(31, 14, 'B.S.A', '2022-04-13 20:23:32', '2022-04-13 20:23:32'),
(32, 14, 'B.M.C.A', '2022-04-13 20:23:32', '2022-04-13 20:23:32'),
(33, 15, 'B.S.A', '2022-04-14 12:42:57', '2022-04-14 12:42:57'),
(34, 15, 'B.M.C.A', '2022-04-14 12:42:57', '2022-04-14 12:42:57'),
(35, 16, 'B.S.A', '2022-04-14 12:44:58', '2022-04-14 12:44:58'),
(36, 16, 'B.M.C.A', '2022-04-14 12:44:58', '2022-04-14 12:44:58'),
(37, 17, 'Rudyard Christian', '2022-04-14 13:22:47', '2022-04-14 13:22:47'),
(38, 17, 'Martha Barrett', '2022-04-14 13:22:47', '2022-04-14 13:22:47'),
(39, 17, 'Mira Lopez', '2022-04-14 13:22:47', '2022-04-14 13:22:47'),
(40, 18, 'Leah Hendricks', '2022-04-14 13:24:40', '2022-04-14 13:24:40'),
(41, 18, 'Dante Bowers', '2022-04-14 13:24:40', '2022-04-14 13:24:40'),
(42, 18, 'Graham Mclaughlin', '2022-04-14 13:24:40', '2022-04-14 13:24:40'),
(43, 19, 'Lillian Galloway', '2022-04-14 13:29:39', '2022-04-14 13:29:39'),
(44, 19, 'Dakota Ruiz', '2022-04-14 13:29:39', '2022-04-14 13:29:39'),
(45, 19, 'Peter Barlow', '2022-04-14 13:29:39', '2022-04-14 13:29:39'),
(46, 20, 'Griffin Terrell', '2022-04-14 13:37:29', '2022-04-14 13:37:29'),
(47, 20, 'Harrison Gamble', '2022-04-14 13:37:29', '2022-04-14 13:37:29'),
(48, 20, 'Carla Trujillo', '2022-04-14 13:37:29', '2022-04-14 13:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_by`, `title`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'home', 'home', NULL, NULL, NULL, NULL, 1, NULL, '2022-04-15 14:59:54', '2022-04-15 14:59:54'),
(2, 1, 'About', 'about', NULL, NULL, NULL, NULL, 1, NULL, '2022-04-15 15:05:47', '2022-04-15 15:05:47'),
(3, 1, 'Header', 'header', NULL, NULL, NULL, NULL, 1, NULL, '2022-04-18 19:38:45', '2022-04-18 19:38:45'),
(4, 1, 'Footer', 'footer', NULL, NULL, NULL, NULL, 1, NULL, '2022-04-18 19:39:19', '2022-04-18 19:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `parent_slug`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'about', '_token', 'LexneU3h38OEzpix8VZI8T6XaNEkI2MSRC8tZlWP', NULL, '2022-04-15 15:19:32', '2022-04-15 15:19:32'),
(2, 'about', 'parent_slug', 'about', NULL, '2022-04-15 15:19:32', '2022-04-15 15:19:32'),
(3, 'about', 'mt_about', 'ABOUT US', NULL, '2022-04-15 15:19:32', '2022-04-15 15:35:59'),
(4, 'about', 'about_heading', 'RC aircraft online', NULL, '2022-04-15 15:19:32', '2022-04-15 15:22:07'),
(5, 'about', 'about_content', '<p>At<strong>&nbsp;R.C Aircraft Online</strong>, our goal is to create lots of winners up and down the country winning fantastic prizes for less than the cost of a receiver battery. We are supporting UK model shops and UK manufacturers in what we do, which is very important to us.&nbsp; All prizes display a Entry price per Entry and a LIVE draw is done on our Facebook page once all Entries are sold,&nbsp;<strong>Competitions are drawn same week of selling out where possible.</strong>&nbsp;Prizes are then sent to the Winners via courier FREE of charge*&nbsp; &nbsp; Tell your Friends, Family and Club members and come and join the Fun.</p>', NULL, '2022-04-15 15:19:32', '2022-04-15 15:23:09'),
(6, 'about', 'about_status', '1', NULL, '2022-04-15 15:19:32', '2022-04-15 15:20:41'),
(7, 'about', 'form_about', NULL, NULL, '2022-04-15 15:19:32', '2022-04-15 15:19:32'),
(8, 'about', 'image', '15042022203627.jpg', NULL, '2022-04-15 15:19:32', '2022-04-15 15:36:27'),
(9, 'header', '_token', 'A8RZlqu39DRmGfNI0D3DX5fInKlkrfVyqhesARhs', NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(10, 'header', 'parent_slug', 'header', NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(11, 'header', 'header_email', NULL, NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(12, 'header', 'header_phone', NULL, NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(13, 'header', 'form_blog', NULL, NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(14, 'header', 'header_logo', '19042022004912.png', NULL, '2022-04-18 19:49:12', '2022-04-18 19:49:12'),
(15, 'header', 'header_favicon', '19042022005150.png', NULL, '2022-04-18 19:51:50', '2022-04-18 19:51:50'),
(16, 'footer', '_token', 'm4hivUzy6w5ZXgGfc08Ws2qpR67CqUlddBWQnndA', NULL, '2022-04-18 20:15:08', '2022-04-19 11:45:30'),
(17, 'footer', 'parent_slug', 'footer', NULL, '2022-04-18 20:15:08', '2022-04-18 20:15:08'),
(18, 'footer', 'footer_description', '<p>Unlike other competition sites we are supporting the hobby by GIVING AWAY 1 complete trainer package per month to BMFA affiliated clubs to encourage new members into the hobby.</p>', NULL, '2022-04-18 20:15:08', '2022-04-18 20:15:08'),
(19, 'footer', 'footer_email', 'rcaircraftonline@gmail.com', NULL, '2022-04-18 20:15:08', '2022-04-19 11:45:30'),
(21, 'footer', 'footer_facebook', 'https://www.facebook.com/RCAircraftonline/', NULL, '2022-04-18 20:15:08', '2022-04-18 20:15:08'),
(22, 'footer', 'footer_instagram', 'https://www.instagram.com/accounts/login/?next=/rcaircraftonline/', NULL, '2022-04-18 20:15:08', '2022-04-18 20:15:08'),
(23, 'footer', 'form_blog', NULL, NULL, '2022-04-18 20:15:08', '2022-04-18 20:15:08'),
(24, 'footer', 'footer_copy_right_right_side', 'Copyright © 2022 - R.C Aircraft Online - All Rights Reserved', NULL, '2022-04-19 11:45:30', '2022-04-19 11:45:30'),
(25, 'footer', 'footer_copy_right_left_side', '<p>Site Design and Developed by <a href=\"https://www.pixelslogo.co.uk/\">Pixels Logo</a></p>', NULL, '2022-04-19 11:45:30', '2022-04-19 12:05:07'),
(26, 'footer', 'footer_image', '19042022171804.png', NULL, '2022-04-19 11:45:30', '2022-04-19 12:18:04');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `permission`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'permission-list', 'web', 'list', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(10, 'permission-create', 'web', 'create', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(11, 'permission-edit', 'web', 'edit', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(12, 'permission-delete', 'web', 'delete', NULL, '2022-04-07 13:05:11', '2022-04-07 13:05:11'),
(13, 'role-list', 'web', 'list', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(14, 'role-create', 'web', 'create', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(15, 'role-edit', 'web', 'edit', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(16, 'role-delete', 'web', 'delete', NULL, '2022-04-07 13:06:48', '2022-04-07 13:06:48'),
(17, 'product-list', 'web', 'list', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(18, 'product-create', 'web', 'create', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(19, 'product-edit', 'web', 'edit', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(20, 'product-delete', 'web', 'delete', NULL, '2022-04-08 12:52:10', '2022-04-08 12:52:10'),
(21, 'category-list', 'web', 'list', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(22, 'category-create', 'web', 'create', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(23, 'category-edit', 'web', 'edit', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(24, 'category-delete', 'web', 'delete', NULL, '2022-04-11 19:08:09', '2022-04-11 19:08:09'),
(37, 'faq-list', 'web', 'list', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(38, 'faq-create', 'web', 'create', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(39, 'faq-edit', 'web', 'edit', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(40, 'faq-delete', 'web', 'delete', NULL, '2022-04-12 16:26:41', '2022-04-12 16:26:41'),
(41, 'coupon-list', 'web', 'list', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(42, 'coupon-create', 'web', 'create', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(43, 'coupon-edit', 'web', 'edit', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(44, 'coupon-delete', 'web', 'delete', NULL, '2022-04-13 13:05:37', '2022-04-13 13:05:37'),
(45, 'page-list', 'web', 'list', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(46, 'page-create', 'web', 'create', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(47, 'page-edit', 'web', 'edit', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(48, 'page-delete', 'web', 'delete', NULL, '2022-04-15 14:29:33', '2022-04-15 14:29:33'),
(49, 'setting-list', 'web', 'list', NULL, '2022-04-15 14:29:48', '2022-04-15 14:29:48'),
(50, 'slider-list', 'web', 'list', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(51, 'slider-create', 'web', 'create', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(52, 'slider-edit', 'web', 'edit', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(53, 'slider-delete', 'web', 'delete', NULL, '2022-04-15 20:06:49', '2022-04-15 20:06:49'),
(58, 'how_to_play-list', 'web', 'list', NULL, '2022-04-18 12:41:20', '2022-04-18 12:41:20'),
(59, 'how_to_play-create', 'web', 'create', NULL, '2022-04-18 12:41:20', '2022-04-18 12:41:20'),
(60, 'how_to_play-edit', 'web', 'edit', NULL, '2022-04-18 12:41:20', '2022-04-18 12:41:20'),
(61, 'how_to_play-delete', 'web', 'delete', NULL, '2022-04-18 12:41:20', '2022-04-18 12:41:20');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draw_ends` date NOT NULL,
  `min_competition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_competition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_winners` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=inactive,1= active,2= sold out',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_by`, `category_slug`, `name`, `slug`, `price`, `draw_ends`, `min_competition`, `max_competition`, `number_of_winners`, `short_description`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(23, 1, 'competition', 'HRBFG Lipo’s', 'hrbfg-lipos', '2', '2022-04-24', '1', '130', '1', '<p>2 x 6s 4000mah or</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>', '<p>Pilot RC 50-76cc Laser with GP 76 Petrol Engine or<br />SWIWIN 80 Turbine or<br />FMS Hawk + FMS Pitts + FMS Yak + FMS P-51 Red Tail + 2x6s lipos or<br />E-Flight Extra 300 3D + E-Flight Draco + E-Flight Viper 70mm edf + E-Flight Ultimate 3d or<br />Futaba 18SZ with receiver + FMS Avanti + Arrows Edge 540 or<br />Spektrum IX12 + E-Flight A-10 Thunderbolt + E-Flight Focke Wulf bnf basic or<br />Spektrum IX20</p>', '20220414174257.jpg', '1', NULL, '2022-04-14 12:42:57', '2022-04-14 12:42:57'),
(24, 1, 'competition', 'HRWERB Lipo’s', 'hrwerb-lipos', '66', '2022-04-24', '1', '130', '1', '<p>2 x 6s 4000mah or</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>', '<p>Pilot RC 50-76cc Laser with GP 76 Petrol Engine or<br />SWIWIN 80 Turbine or<br />FMS Hawk + FMS Pitts + FMS Yak + FMS P-51 Red Tail + 2x6s lipos or<br />E-Flight Extra 300 3D + E-Flight Draco + E-Flight Viper 70mm edf + E-Flight Ultimate 3d or<br />Futaba 18SZ with receiver + FMS Avanti + Arrows Edge 540 or<br />Spektrum IX12 + E-Flight A-10 Thunderbolt + E-Flight Focke Wulf bnf basic or<br />Spektrum IX20</p>', '20220414174458.jpg', '1', NULL, '2022-04-14 12:44:58', '2022-04-14 12:44:58'),
(25, 1, 'competition', 'Leroy Macdonald', 'leroy-macdonald', '993', '1973-08-14', '1', '182', '10', '<p>serd</p>', '<p>ergtert</p>', '20220414182247.png', '1', NULL, '2022-04-14 13:22:47', '2022-04-14 13:22:47'),
(26, 1, 'competition', 'Anthony Adkins', 'anthony-adkins', '986', '2013-05-28', '1', '190', '6', '<p>2 x 6s 4000mah or asjadddd</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>', '<p>2 x 6s 4000mah or asjadddd</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>\r\n<p>2 x 6s 4000mah or asjadddd</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>\r\n<p>2 x 6s 4000mah or asjadddd</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>', '20220414182440.jpg', '1', NULL, '2022-04-14 13:24:40', '2022-04-14 13:24:40'),
(27, 1, 'competitions', 'Callie Valdez', 'callie-valdez', '249', '1972-07-18', '1', '99', '6', '<p>2 x 6s 4000mah or asjadddd</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>', '<p>2 x 6s 4000mah or asjadddd</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>\r\n<p>2 x 6s 4000mah or asjadddd</p>\r\n<p>2 x 4s 5000mah or&nbsp;</p>\r\n<p>3 x 3s 5000 mah Lipos</p>', '20220414182939.png', '1', NULL, '2022-04-14 13:29:39', '2022-04-14 13:29:39'),
(28, 1, 'mini-competitions', 'Ifeoma Humphrey', 'ifeoma-humphrey', '704', '2007-03-09', '805', '1', '10', '<p>sdfsdggdfgdfgdfgds</p>', '<p>sdgdfgdfgdfgdfgdfg</p>', '20220414183729.png', '1', NULL, '2022-04-14 13:37:29', '2022-04-14 13:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `product_slug`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(11, 'hrb-lipos', 'Who governs model flying in the UK?', 'B.M.F.A', '2022-04-12 14:59:37', '2022-04-12 14:59:37'),
(13, 'hrb-lipos', 'Who governs model flying in the UK?', 'B.M.F.A', '2022-04-12 15:13:55', '2022-04-12 15:13:55'),
(14, 'hrb-lipos', 'Who governs model flying in the UK?', 'B.M.F.A', '2022-04-13 20:23:32', '2022-04-13 20:23:32'),
(15, 'hrbfg-lipos', 'Who governs model flying in the UK?', 'B.M.F.A', '2022-04-14 12:42:57', '2022-04-14 12:42:57'),
(16, 'hrwerb-lipos', 'Who governs model flying in the UK?', 'B.M.F.A', '2022-04-14 12:44:58', '2022-04-14 12:44:58'),
(17, 'leroy-macdonald', 'Explicabo Nihil sit', 'Aladdin Webster', '2022-04-14 13:22:47', '2022-04-14 13:22:47'),
(18, 'anthony-adkins', 'Laudantium veniam', 'Autumn Huffman', '2022-04-14 13:24:40', '2022-04-14 13:24:40'),
(19, 'callie-valdez', 'Necessitatibus excep', 'Fallon Horne', '2022-04-14 13:29:39', '2022-04-14 13:29:39'),
(20, 'ifeoma-humphrey', 'Sapiente laboris obc', 'Merrill Chandler', '2022-04-14 13:37:29', '2022-04-14 13:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', NULL, '2022-04-06 14:41:39', '2022-04-06 14:41:39'),
(2, 'user', 'web', NULL, '2022-04-07 14:06:38', '2022-04-07 14:06:38'),
(3, 'Product', 'web', NULL, '2022-04-08 12:46:39', '2022-04-08 12:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=inactive, 1= active',
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_by`, `title`, `description`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'OUR VALUED WINNERS', 'Here are just a few of our past winners!', '20220418163924.jpg', '1', NULL, '2022-04-18 11:39:24', '2022-04-18 12:14:47'),
(2, 1, NULL, NULL, '20220418212537.jpg', '1', NULL, '2022-04-18 16:25:37', '2022-04-18 16:25:37'),
(3, 1, NULL, NULL, '20220418212548.jpg', '1', NULL, '2022-04-18 16:25:48', '2022-04-18 16:25:48'),
(4, 1, NULL, NULL, '20220418212604.jpg', '1', NULL, '2022-04-18 16:26:04', '2022-04-18 16:26:04'),
(5, 1, NULL, NULL, '20220418212657.jpg', '1', NULL, '2022-04-18 16:26:57', '2022-04-18 16:26:57');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Harry John', 'admin@gmail.com', '2022-04-07 16:49:17', '$2y$10$gsLTUkAldg8nh.d3O57i1uldcyFs1gTT/gDFFE.MrJmAoS4JG6api', NULL, 1, NULL, '2022-04-06 14:56:13', '2022-04-06 14:56:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_to_plays`
--
ALTER TABLE `how_to_plays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `how_to_plays`
--
ALTER TABLE `how_to_plays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
