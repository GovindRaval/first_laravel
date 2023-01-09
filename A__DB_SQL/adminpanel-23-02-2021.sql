-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2021 at 03:00 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset_token` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `password_reset_token`, `remember_token`, `profile_picture`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Super Admin', 'superadmin', 'superadmin@gmail.com', NULL, '$2y$10$GegN7yAWgYJwTImDRhga2Ot5d2CcZk457/JM8Gf.Lwh1jLAMygiSm', NULL, NULL, 'public/profile/FRIkUqfmEMWMNBo9lx9oEn8ZmDUoBtls4JmDRNAD.jpg', 1, '2021-02-18 04:14:42', '2021-02-18 04:22:35', NULL, NULL, NULL, NULL),
(2, 'Admin', 'admin', 'admin@neogeninfotech.com', NULL, '$2y$10$7U7rv18Bofs0NEfcX1SWVe4a2B8ejcd5WyDSvq1ZPbHk8iVECwdre', NULL, NULL, NULL, 1, '2021-02-18 04:14:42', '2021-02-18 04:14:42', NULL, NULL, NULL, NULL),
(3, 'Camp Admin', 'campadmin', 'info@testrel.com', NULL, '$2y$10$umdUAURw9llCzQnY.XsbkulXHe3Z1EoBqj8xkjMP/ocjvZ4BkdxQu', '', NULL, NULL, 1, '2021-02-18 04:14:42', '2021-02-18 04:56:43', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_city`
--

CREATE TABLE `admin_city` (
  `id` int(10) UNSIGNED NOT NULL,
  `sorting` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL COMMENT 'FK = admin_country',
  `is_default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_city_description`
--

CREATE TABLE `admin_city_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL DEFAULT '0' COMMENT 'FK = admin_city',
  `language_id` int(11) NOT NULL COMMENT 'FK = admin_languages',
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_country`
--

CREATE TABLE `admin_country` (
  `id` int(10) UNSIGNED NOT NULL,
  `sorting` int(11) DEFAULT NULL,
  `is_default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_country_description`
--

CREATE TABLE `admin_country_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '0' COMMENT 'FK = admin_country',
  `language_id` int(11) NOT NULL COMMENT 'FK = admin_languages',
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_languages`
--

CREATE TABLE `admin_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `direction` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'LTR / RTL',
  `is_default` tinyint(1) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_languages`
--

INSERT INTO `admin_languages` (`id`, `name`, `code`, `image`, `direction`, `is_default`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'English', 'en', NULL, 'LTR', 1, 1, '2021-02-18 04:15:08', '2021-02-18 04:15:08', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sorting` int(11) NOT NULL,
  `setting_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_val` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_multi_lang` tinyint(1) NOT NULL DEFAULT '0',
  `img_height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_require` tinyint(1) NOT NULL DEFAULT '0',
  `can_edit` tinyint(1) NOT NULL DEFAULT '1',
  `validation` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `sorting`, `setting_key`, `setting_val`, `description`, `is_multi_lang`, `img_height`, `img_width`, `img_size`, `is_require`, `can_edit`, `validation`, `type`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'App Name', 'Neogen Infotech', 'Application/Site name', 0, '', '', '', 1, 1, '', 'text', 1, '2021-02-18 06:21:24', '2021-02-23 07:05:02', NULL, NULL, NULL, NULL),
(2, 2, 'App Logo', 'public/logo/3wOdcotoidLphk98ZGasSrPaedUgqLxIlTALXcVp.jpg', 'Application/Site Logo (Size 360x360 pixels)', 0, '360', '360', '', 0, 1, '', 'file', 1, '2021-02-18 06:21:24', '2021-02-18 06:21:58', NULL, NULL, NULL, NULL),
(3, 3, 'App Logo (For Email and Print Page in PNG Format)', '1', 'Logo to show in Mail and Print (Size 360x360 pixels, Allowed Format : PNG)', 0, '360', '360', '', 0, 1, '', 'file', 1, '2021-02-18 06:21:24', '2021-02-23 07:08:14', NULL, NULL, NULL, NULL),
(4, 4, 'FavIcon', 'public/images/MYm9GlqBz6VXsuhi0Mc9pf5gmNDwAG0kCvnh2iNj.jpg', 'Application/Site FavIcon (Size 16x16 pixels)', 0, '16', '16', '', 0, 1, '', 'file', 1, '2021-02-18 06:21:24', '2021-02-18 06:22:44', NULL, NULL, NULL, NULL),
(5, 5, 'Admin Email', 'info@neogeninfotech.com', 'Communication Email ID of Administrator', 0, '', '', '', 1, 1, '', 'text', 1, '2021-02-18 06:21:24', '2021-02-18 06:21:24', NULL, NULL, NULL, NULL),
(6, 6, 'Mail From (Sender Email)', 'noreply@neogeninfotech.com', 'Communication Email for order, All Email will sent from this Email ID', 0, '', '', '', 1, 1, '', 'text', 1, '2021-02-18 06:21:24', '2021-02-18 06:21:24', NULL, NULL, NULL, NULL),
(7, 7, 'Footer App Name', '&copy; #year# Neogen Infotech', 'Web Footer App Name (It will display on footer of your website, Example  : &copy; 2020 Your Site Name)', 0, '', '', '', 0, 1, '', 'textarea', 1, '2021-02-18 06:21:24', '2021-02-23 07:05:21', NULL, NULL, NULL, NULL),
(8, 8, 'Footer Company Name', 'Designed by <a href=\"http://www.neogeninfotech.com/\" target=\"_blank\">Neogen Infotech</a>', 'Web Footer Company Name (It will display on footer of your website)', 0, '', '', '', 0, 1, '', 'textarea', 1, '2021-02-18 06:21:24', '2021-02-18 06:21:24', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings_description`
--

CREATE TABLE `admin_settings_description` (
  `id` int(10) UNSIGNED NOT NULL,
  `settings_id` int(11) NOT NULL COMMENT 'FK = admin_settings',
  `language_id` int(11) NOT NULL COMMENT 'FK = admin_languages',
  `setting_key` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_val` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_level_1`
--

CREATE TABLE `menu_level_1` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level_1`
--

INSERT INTO `menu_level_1` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2021-02-18 04:14:44', '2021-02-18 04:14:44'),
(2, 'Admin', '2021-02-18 04:14:52', '2021-02-18 04:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `menu_level_2`
--

CREATE TABLE `menu_level_2` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_level_1_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level_2`
--

INSERT INTO `menu_level_2` (`id`, `menu_level_1_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Role', '2021-02-18 04:14:45', '2021-02-18 04:14:45'),
(2, 1, 'Permission', '2021-02-18 04:14:47', '2021-02-18 04:14:47'),
(3, 1, 'Role - Permission', '2021-02-18 04:14:49', '2021-02-18 04:14:49'),
(4, 1, 'User - Role', '2021-02-18 04:14:50', '2021-02-18 04:14:50'),
(5, 2, 'Dashboard', '2021-02-18 04:14:54', '2021-02-18 04:14:54'),
(6, 2, 'Profile', '2021-02-18 04:14:55', '2021-02-18 04:14:55'),
(7, 2, 'Master', '2021-02-18 04:14:57', '2021-02-18 04:14:57'),
(8, 2, 'General Setting', '2021-02-18 04:15:02', '2021-02-18 04:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `menu_level_3`
--

CREATE TABLE `menu_level_3` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_level_2_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_level_3`
--

INSERT INTO `menu_level_3` (`id`, `menu_level_2_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 7, 'Countries', '2021-02-18 04:14:59', '2021-02-18 04:14:59'),
(2, 7, 'City', '2021-02-18 04:15:00', '2021-02-18 04:15:00'),
(3, 8, 'Settings', '2021-02-18 04:15:03', '2021-02-18 04:15:03');

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
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2020_07_27_110140_create_permission_tables', 1),
(18, '2020_07_29_121510_create_menu_level', 1),
(19, '2020_09_28_064943_create_admin_settings_table', 1),
(20, '2020_09_30_060117_create_admin_languages_table', 1),
(21, '2020_11_04_053319_create_admins_table', 1),
(22, '2020_11_09_055902_create_admin_country_table', 1),
(23, '2020_11_09_055921_create_admin_country_description_table', 1),
(24, '2020_11_09_142252_create_admin_city_table', 1),
(25, '2020_11_09_142344_create_admin_city_description_table', 1),
(26, '2020_11_23_111804_create_admin_settings_description_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 1),
(2, 'App\\Admin', 2),
(2, 'App\\Admin', 3),
(3, 'App\\Admin', 2),
(3, 'App\\Admin', 3);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `menu_level_1_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_level_2_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_level_3_id` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `menu_level_1_id`, `menu_level_2_id`, `menu_level_3_id`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'View_1', 'admin', 'View-Super Admin', 1, NULL, NULL, 1, '2021-02-18 04:14:44', '2021-02-18 04:14:44', NULL, NULL, NULL, NULL),
(2, 'Create_1', 'admin', 'Create-Super Admin', 1, NULL, NULL, 1, '2021-02-18 04:14:44', '2021-02-18 04:14:44', NULL, NULL, NULL, NULL),
(3, 'Edit_1', 'admin', 'Edit-Super Admin', 1, NULL, NULL, 1, '2021-02-18 04:14:44', '2021-02-18 04:14:44', NULL, NULL, NULL, NULL),
(4, 'Delete_1', 'admin', 'Delete-Super Admin', 1, NULL, NULL, 1, '2021-02-18 04:14:45', '2021-02-18 04:14:45', NULL, NULL, NULL, NULL),
(5, 'View_1_1', 'admin', 'View-Super Admin-Role', 1, 1, NULL, 1, '2021-02-18 04:14:45', '2021-02-18 04:14:45', NULL, NULL, NULL, NULL),
(6, 'Create_1_1', 'admin', 'Create-Super Admin-Role', 1, 1, NULL, 1, '2021-02-18 04:14:45', '2021-02-18 04:14:45', NULL, NULL, NULL, NULL),
(7, 'Edit_1_1', 'admin', 'Edit-Super Admin-Role', 1, 1, NULL, 1, '2021-02-18 04:14:46', '2021-02-18 04:14:46', NULL, NULL, NULL, NULL),
(8, 'Delete_1_1', 'admin', 'Delete-Super Admin-Role', 1, 1, NULL, 1, '2021-02-18 04:14:46', '2021-02-18 04:14:46', NULL, NULL, NULL, NULL),
(9, 'View_1_2', 'admin', 'View-Super Admin-Permission', 1, 2, NULL, 1, '2021-02-18 04:14:47', '2021-02-18 04:14:47', NULL, NULL, NULL, NULL),
(10, 'Create_1_2', 'admin', 'Create-Super Admin-Permission', 1, 2, NULL, 1, '2021-02-18 04:14:47', '2021-02-18 04:14:47', NULL, NULL, NULL, NULL),
(11, 'Edit_1_2', 'admin', 'Edit-Super Admin-Permission', 1, 2, NULL, 1, '2021-02-18 04:14:48', '2021-02-18 04:14:48', NULL, NULL, NULL, NULL),
(12, 'Delete_1_2', 'admin', 'Delete-Super Admin-Permission', 1, 2, NULL, 1, '2021-02-18 04:14:48', '2021-02-18 04:14:48', NULL, NULL, NULL, NULL),
(13, 'View_1_3', 'admin', 'View-Super Admin-Role - Permission', 1, 3, NULL, 1, '2021-02-18 04:14:49', '2021-02-18 04:14:49', NULL, NULL, NULL, NULL),
(14, 'Create_1_3', 'admin', 'Create-Super Admin-Role - Permission', 1, 3, NULL, 1, '2021-02-18 04:14:49', '2021-02-18 04:14:49', NULL, NULL, NULL, NULL),
(15, 'Edit_1_3', 'admin', 'Edit-Super Admin-Role - Permission', 1, 3, NULL, 1, '2021-02-18 04:14:49', '2021-02-18 04:14:49', NULL, NULL, NULL, NULL),
(16, 'Delete_1_3', 'admin', 'Delete-Super Admin-Role - Permission', 1, 3, NULL, 1, '2021-02-18 04:14:50', '2021-02-18 04:14:50', NULL, NULL, NULL, NULL),
(17, 'View_1_4', 'admin', 'View-Super Admin-User - Role', 1, 4, NULL, 1, '2021-02-18 04:14:50', '2021-02-18 04:14:50', NULL, NULL, NULL, NULL),
(18, 'Create_1_4', 'admin', 'Create-Super Admin-User - Role', 1, 4, NULL, 1, '2021-02-18 04:14:51', '2021-02-18 04:14:51', NULL, NULL, NULL, NULL),
(19, 'Edit_1_4', 'admin', 'Edit-Super Admin-User - Role', 1, 4, NULL, 1, '2021-02-18 04:14:51', '2021-02-18 04:14:51', NULL, NULL, NULL, NULL),
(20, 'Delete_1_4', 'admin', 'Delete-Super Admin-User - Role', 1, 4, NULL, 1, '2021-02-18 04:14:52', '2021-02-18 04:14:52', NULL, NULL, NULL, NULL),
(21, 'View_2', 'admin', 'View-Admin', 2, NULL, NULL, 1, '2021-02-18 04:14:52', '2021-02-18 04:14:52', NULL, NULL, NULL, NULL),
(22, 'Create_2', 'admin', 'Create-Admin', 2, NULL, NULL, 1, '2021-02-18 04:14:52', '2021-02-18 04:14:52', NULL, NULL, NULL, NULL),
(23, 'Edit_2', 'admin', 'Edit-Admin', 2, NULL, NULL, 1, '2021-02-18 04:14:53', '2021-02-18 04:14:53', NULL, NULL, NULL, NULL),
(24, 'Delete_2', 'admin', 'Delete-Admin', 2, NULL, NULL, 1, '2021-02-18 04:14:54', '2021-02-18 04:14:54', NULL, NULL, NULL, NULL),
(25, 'View_2_5', 'admin', 'View-Admin-Dashboard', 2, 5, NULL, 1, '2021-02-18 04:14:54', '2021-02-18 04:14:54', NULL, NULL, NULL, NULL),
(26, 'Create_2_5', 'admin', 'Create-Admin-Dashboard', 2, 5, NULL, 1, '2021-02-18 04:14:54', '2021-02-18 04:14:54', NULL, NULL, NULL, NULL),
(27, 'Edit_2_5', 'admin', 'Edit-Admin-Dashboard', 2, 5, NULL, 1, '2021-02-18 04:14:55', '2021-02-18 04:14:55', NULL, NULL, NULL, NULL),
(28, 'Delete_2_5', 'admin', 'Delete-Admin-Dashboard', 2, 5, NULL, 1, '2021-02-18 04:14:55', '2021-02-18 04:14:55', NULL, NULL, NULL, NULL),
(29, 'View_2_6', 'admin', 'View-Admin-Profile', 2, 6, NULL, 1, '2021-02-18 04:14:55', '2021-02-18 04:14:55', NULL, NULL, NULL, NULL),
(30, 'Create_2_6', 'admin', 'Create-Admin-Profile', 2, 6, NULL, 1, '2021-02-18 04:14:56', '2021-02-18 04:14:56', NULL, NULL, NULL, NULL),
(31, 'Edit_2_6', 'admin', 'Edit-Admin-Profile', 2, 6, NULL, 1, '2021-02-18 04:14:56', '2021-02-18 04:14:56', NULL, NULL, NULL, NULL),
(32, 'Delete_2_6', 'admin', 'Delete-Admin-Profile', 2, 6, NULL, 1, '2021-02-18 04:14:57', '2021-02-18 04:14:57', NULL, NULL, NULL, NULL),
(33, 'View_2_7', 'admin', 'View-Admin-Master', 2, 7, NULL, 1, '2021-02-18 04:14:57', '2021-02-18 04:14:57', NULL, NULL, NULL, NULL),
(34, 'Create_2_7', 'admin', 'Create-Admin-Master', 2, 7, NULL, 1, '2021-02-18 04:14:58', '2021-02-18 04:14:58', NULL, NULL, NULL, NULL),
(35, 'Edit_2_7', 'admin', 'Edit-Admin-Master', 2, 7, NULL, 1, '2021-02-18 04:14:58', '2021-02-18 04:14:58', NULL, NULL, NULL, NULL),
(36, 'Delete_2_7', 'admin', 'Delete-Admin-Master', 2, 7, NULL, 1, '2021-02-18 04:14:58', '2021-02-18 04:14:58', NULL, NULL, NULL, NULL),
(37, 'View_2_7_1', 'admin', 'View-Admin-Master-Countries', 2, 7, 7, 1, '2021-02-18 04:14:59', '2021-02-18 04:14:59', NULL, NULL, NULL, NULL),
(38, 'Create_2_7_1', 'admin', 'Create-Admin-Master-Countries', 2, 7, 7, 1, '2021-02-18 04:14:59', '2021-02-18 04:14:59', NULL, NULL, NULL, NULL),
(39, 'Edit_2_7_1', 'admin', 'Edit-Admin-Master-Countries', 2, 7, 7, 1, '2021-02-18 04:14:59', '2021-02-18 04:14:59', NULL, NULL, NULL, NULL),
(40, 'Delete_2_7_1', 'admin', 'Delete-Admin-Master-Countries', 2, 7, 7, 1, '2021-02-18 04:15:00', '2021-02-18 04:15:00', NULL, NULL, NULL, NULL),
(41, 'View_2_7_2', 'admin', 'View-Admin-Master-City', 2, 7, 7, 1, '2021-02-18 04:15:00', '2021-02-18 04:15:00', NULL, NULL, NULL, NULL),
(42, 'Create_2_7_2', 'admin', 'Create-Admin-Master-City', 2, 7, 7, 1, '2021-02-18 04:15:01', '2021-02-18 04:15:01', NULL, NULL, NULL, NULL),
(43, 'Edit_2_7_2', 'admin', 'Edit-Admin-Master-City', 2, 7, 7, 1, '2021-02-18 04:15:01', '2021-02-18 04:15:01', NULL, NULL, NULL, NULL),
(44, 'Delete_2_7_2', 'admin', 'Delete-Admin-Master-City', 2, 7, 7, 1, '2021-02-18 04:15:01', '2021-02-18 04:15:01', NULL, NULL, NULL, NULL),
(45, 'View_2_8', 'admin', 'View-Admin-General Setting', 2, 8, NULL, 1, '2021-02-18 04:15:02', '2021-02-18 04:15:02', NULL, NULL, NULL, NULL),
(46, 'Create_2_8', 'admin', 'Create-Admin-General Setting', 2, 8, NULL, 1, '2021-02-18 04:15:02', '2021-02-18 04:15:02', NULL, NULL, NULL, NULL),
(47, 'Edit_2_8', 'admin', 'Edit-Admin-General Setting', 2, 8, NULL, 1, '2021-02-18 04:15:03', '2021-02-18 04:15:03', NULL, NULL, NULL, NULL),
(48, 'Delete_2_8', 'admin', 'Delete-Admin-General Setting', 2, 8, NULL, 1, '2021-02-18 04:15:03', '2021-02-18 04:15:03', NULL, NULL, NULL, NULL),
(49, 'View_2_8_3', 'admin', 'View-Admin-General Setting-Settings', 2, 8, 8, 1, '2021-02-18 04:15:04', '2021-02-18 04:15:04', NULL, NULL, NULL, NULL),
(50, 'Create_2_8_3', 'admin', 'Create-Admin-General Setting-Settings', 2, 8, 8, 1, '2021-02-18 04:15:04', '2021-02-18 04:15:04', NULL, NULL, NULL, NULL),
(51, 'Edit_2_8_3', 'admin', 'Edit-Admin-General Setting-Settings', 2, 8, 8, 1, '2021-02-18 04:15:05', '2021-02-18 04:15:05', NULL, NULL, NULL, NULL),
(52, 'Delete_2_8_3', 'admin', 'Delete-Admin-General Setting-Settings', 2, 8, 8, 1, '2021-02-18 04:15:05', '2021-02-18 04:15:05', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'super-admin', 'admin', 1, '2021-02-18 04:14:43', '2021-02-18 04:14:43', NULL, NULL, NULL, NULL),
(2, 'admin', 'admin', 1, '2021-02-18 04:14:43', '2021-02-18 04:14:43', NULL, NULL, NULL, NULL),
(3, 'camp-admin', 'admin', 1, '2021-02-18 04:14:43', '2021-02-18 04:14:43', NULL, NULL, NULL, NULL),
(4, 'master admin', 'admin', 1, '2021-02-23 05:33:51', '2021-02-23 05:33:51', NULL, 1, NULL, NULL);

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
(1, 1),
(1, 4),
(2, 1),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 3),
(5, 4),
(6, 1),
(6, 3),
(6, 4),
(7, 1),
(7, 3),
(7, 4),
(8, 1),
(8, 3),
(8, 4),
(9, 1),
(9, 3),
(9, 4),
(10, 1),
(10, 3),
(10, 4),
(11, 1),
(11, 3),
(11, 4),
(12, 1),
(12, 3),
(12, 4),
(13, 1),
(13, 3),
(13, 4),
(14, 1),
(14, 3),
(14, 4),
(15, 1),
(15, 3),
(15, 4),
(16, 1),
(16, 3),
(16, 4),
(17, 1),
(17, 3),
(17, 4),
(18, 1),
(18, 3),
(18, 4),
(19, 1),
(19, 3),
(19, 4),
(20, 1),
(20, 3),
(20, 4),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(23, 1),
(23, 2),
(23, 3),
(23, 4),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(26, 1),
(26, 2),
(26, 3),
(26, 4),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(31, 1),
(31, 2),
(31, 3),
(31, 4),
(32, 1),
(32, 2),
(32, 3),
(32, 4),
(33, 1),
(33, 2),
(33, 3),
(33, 4),
(34, 1),
(34, 2),
(34, 3),
(34, 4),
(35, 1),
(35, 2),
(35, 3),
(35, 4),
(36, 1),
(36, 2),
(36, 3),
(36, 4),
(37, 1),
(37, 2),
(37, 3),
(37, 4),
(38, 1),
(38, 2),
(38, 3),
(38, 4),
(39, 1),
(39, 2),
(39, 3),
(39, 4),
(40, 1),
(40, 2),
(40, 3),
(40, 4),
(41, 1),
(41, 2),
(41, 3),
(41, 4),
(42, 1),
(42, 2),
(42, 3),
(42, 4),
(43, 1),
(43, 2),
(43, 3),
(43, 4),
(44, 1),
(44, 2),
(44, 3),
(44, 4),
(45, 1),
(45, 2),
(45, 3),
(45, 4),
(46, 1),
(46, 2),
(46, 3),
(46, 4),
(47, 1),
(47, 2),
(47, 3),
(47, 4),
(48, 1),
(48, 2),
(48, 3),
(48, 4),
(49, 1),
(49, 2),
(49, 3),
(49, 4),
(50, 1),
(50, 2),
(50, 3),
(50, 4),
(51, 1),
(51, 2),
(51, 3),
(51, 4),
(52, 1),
(52, 2),
(52, 3),
(52, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_type` enum('website','google','facebook') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'website',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `password_reset_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `locale` int(11) DEFAULT NULL COMMENT 'User selected language ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `social_id`, `login_type`, `email`, `email_verified_at`, `password`, `mobile`, `birth_date`, `country`, `password_reset_token`, `remember_token`, `profile_picture`, `is_active`, `last_login`, `locale`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Mitesh', 'Panchal', 'mitesh', NULL, 'website', 'mitesh@gmail.com', NULL, '$2y$10$7U7rv18Bofs0NEfcX1SWVe4a2B8ejcd5WyDSvq1ZPbHk8iVECwdre', '9409614701', NULL, NULL, NULL, NULL, NULL, 1, '2021-02-23 13:54:25', NULL, NULL, '2021-02-23 08:24:25', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_city`
--
ALTER TABLE `admin_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_city_description`
--
ALTER TABLE `admin_city_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_country`
--
ALTER TABLE `admin_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_country_description`
--
ALTER TABLE `admin_country_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_languages`
--
ALTER TABLE `admin_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_LANGUAGES_NAME` (`name`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_settings_description`
--
ALTER TABLE `admin_settings_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_level_1`
--
ALTER TABLE `menu_level_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_level_2`
--
ALTER TABLE `menu_level_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_level_2_menu_level_1_id_foreign` (`menu_level_1_id`);

--
-- Indexes for table `menu_level_3`
--
ALTER TABLE `menu_level_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_level_3_menu_level_2_id_foreign` (`menu_level_2_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_city`
--
ALTER TABLE `admin_city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_city_description`
--
ALTER TABLE `admin_city_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_country`
--
ALTER TABLE `admin_country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_country_description`
--
ALTER TABLE `admin_country_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_languages`
--
ALTER TABLE `admin_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_settings_description`
--
ALTER TABLE `admin_settings_description`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_level_1`
--
ALTER TABLE `menu_level_1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_level_2`
--
ALTER TABLE `menu_level_2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_level_3`
--
ALTER TABLE `menu_level_3`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_level_2`
--
ALTER TABLE `menu_level_2`
  ADD CONSTRAINT `menu_level_2_menu_level_1_id_foreign` FOREIGN KEY (`menu_level_1_id`) REFERENCES `menu_level_1` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_level_3`
--
ALTER TABLE `menu_level_3`
  ADD CONSTRAINT `menu_level_3_menu_level_2_id_foreign` FOREIGN KEY (`menu_level_2_id`) REFERENCES `menu_level_2` (`id`) ON DELETE CASCADE;

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
