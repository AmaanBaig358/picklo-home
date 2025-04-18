-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2025 at 11:43 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `picklo_homes`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `lead_id` bigint NOT NULL,
  `engineer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `architect` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `landscaper` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `access_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `spec_sheet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `plan_files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('pending','hold','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `lead_id`, `engineer`, `architect`, `landscaper`, `access_code`, `spec_sheet`, `plan_files`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, 'xzczx', 'zxczx', 'zxcz', 'dczcdsf', 'uploads/specification-sheet/1744230445_comics website v2.pdf', 'uploads/plan-files/1744230445_b5d9c46b07722f144dbe4f64c47ae5bf-full.jpg', 'pending', '2025-04-09 15:23:13', '2025-04-09 15:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `client_task`
--

CREATE TABLE `client_task` (
  `id` int NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client_task`
--

INSERT INTO `client_task` (`id`, `client_id`, `task_id`, `created_at`, `updated_at`) VALUES
(6, 1, 32, '2025-04-14 19:16:45', '2025-04-14 19:16:45'),
(7, 1, 33, '2025-04-14 19:16:45', '2025-04-14 19:16:45'),
(10, 1, 30, '2025-04-14 19:18:52', '2025-04-14 19:18:52'),
(11, 1, 31, '2025-04-14 19:20:06', '2025-04-14 19:20:06'),
(12, 1, 28, '2025-04-14 19:20:38', '2025-04-14 19:20:38'),
(13, 1, 29, '2025-04-14 19:20:38', '2025-04-14 19:20:38'),
(14, 9, 28, '2025-04-14 19:40:09', '2025-04-14 19:40:09'),
(15, 9, 29, '2025-04-14 19:40:09', '2025-04-14 19:40:09'),
(16, 9, 30, '2025-04-14 19:40:09', '2025-04-14 19:40:09'),
(17, 9, 31, '2025-04-14 19:40:09', '2025-04-14 19:40:09'),
(18, 9, 32, '2025-04-14 19:40:15', '2025-04-14 19:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `client_todo`
--

CREATE TABLE `client_todo` (
  `id` int NOT NULL,
  `client_id` bigint NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `end_date` date NOT NULL,
  `card_id` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_todo_cards`
--

CREATE TABLE `client_todo_cards` (
  `id` int UNSIGNED NOT NULL,
  `client_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_active` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_user`
--

CREATE TABLE `client_user` (
  `id` int UNSIGNED NOT NULL,
  `client_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_user`
--

INSERT INTO `client_user` (`id`, `client_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 21, 1, '2025-04-09 16:57:14', '2025-04-09 16:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_ups`
--

CREATE TABLE `follow_ups` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `project_id` bigint UNSIGNED DEFAULT NULL,
  `follow_up_type` enum('client','task','project','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `upload_files` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `reminder_date` timestamp NOT NULL,
  `auto_status` enum('Upcoming','Today','Overdue','Complete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Upcoming',
  `status` enum('pending','completed','canceled','in progress') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow_ups`
--

INSERT INTO `follow_ups` (`id`, `user_id`, `task_id`, `client_id`, `project_id`, `follow_up_type`, `title`, `description`, `upload_files`, `reminder_date`, `auto_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 21, NULL, 'client', 'Quibusdam magna arch', 'Temporibus consequun', '[]', '2014-08-03 17:01:00', 'Overdue', 'completed', '2025-04-14 19:22:11', '2025-04-14 19:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_phone` varchar(255) NOT NULL,
  `job_address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `is_approved` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `client_name`, `client_email`, `client_phone`, `job_address`, `status`, `project_type`, `notes`, `is_approved`, `created_at`, `updated_at`) VALUES
(20, 'Test lead', 'cadehaku@mailinator.com', '0300000000', 'Lucius Noel', 'Approved', 'Home', 'Inventore enim magnazxczx', 1, '2025-04-09 15:22:24', '2025-04-09 15:23:13'),
(21, 'Aladdin Delaney', 'satykajy@mailinator.com', 'Jane Gill', 'Imelda Carver', 'pending', 'Addition', 'Magni ut enim amet', 0, '2025-04-09 16:57:06', '2025-04-09 16:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2025_02_27_182440_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2025-02-27 13:49:47', '2025-02-27 13:49:47'),
(2, 'role-create', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(3, 'role-edit', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(4, 'role-delete', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(5, 'user-list', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(6, 'user-create', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(7, 'user-edit', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(8, 'user-delete', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(9, 'profile-list', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48'),
(10, 'profile-edit', 'web', '2025-02-27 13:49:48', '2025-02-27 13:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_categories`
--

CREATE TABLE `pre_categories` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pre_categories`
--

INSERT INTO `pre_categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(14, 'Pre Construction', 'pre-construction', 'Pre Construction', '2025-03-06 13:43:35', '2025-03-06 13:43:35'),
(15, 'Site Prep and Foundation', 'site-prep-and-foundation', 'Site Prep and Foundation', '2025-03-06 13:43:46', '2025-03-06 13:43:46'),
(16, 'Framing', 'framing', 'Framing', '2025-03-06 13:43:55', '2025-03-06 13:43:55'),
(17, 'Mechanicals', 'mechanicals', 'Mechanicals', '2025-03-06 13:44:02', '2025-03-06 13:44:02'),
(18, 'Exterior Finishes', 'exterior-finishes', 'Exterior Finishes', '2025-03-06 13:44:10', '2025-03-06 13:44:10'),
(19, 'Insulation and Sheetrock', 'insulation-and-sheetrock', 'Insulation and Sheetrock', '2025-03-06 13:44:21', '2025-03-06 13:44:21'),
(20, 'Millwork and paint', 'millwork-and-paint', 'Millwork and paint', '2025-03-06 13:44:31', '2025-03-06 13:44:31'),
(21, 'interior Finishes', 'interior-finishes', 'interior Finishes', '2025-03-06 13:44:43', '2025-03-06 13:44:43'),
(22, 'Final', 'final', 'Final', '2025-03-06 13:44:51', '2025-03-06 13:44:51'),
(23, 'Final Punch', 'final-punch', 'Final Punch', '2025-03-06 13:45:01', '2025-03-06 13:45:01'),
(24, 'Warranty', 'warranty', 'Warranty', '2025-03-06 13:45:10', '2025-03-06 13:45:10'),
(25, 'Handwritten Notes', 'handwritten-notes', 'Handwritten Notes', '2025-03-06 13:45:21', '2025-03-06 13:45:21'),
(26, 'Extra Charges', 'extra-charges', 'Extra Charges', '2025-03-06 13:45:38', '2025-03-06 13:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `pre_tasks`
--

CREATE TABLE `pre_tasks` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pre_tasks`
--

INSERT INTO `pre_tasks` (`id`, `category_id`, `title`, `duration`, `created_at`, `updated_at`) VALUES
(28, 14, 'Permits', '10', '2025-03-06 13:46:16', '2025-03-06 13:46:16'),
(29, 14, 'Order brick', '5', '2025-03-06 13:46:30', '2025-03-06 13:46:30'),
(30, 14, 'Order windows', '5', '2025-03-06 13:46:45', '2025-03-06 13:46:45'),
(31, 14, 'Order garage doors', '1', '2025-03-06 13:46:59', '2025-03-06 13:46:59'),
(32, 14, 'Order front door', '10', '2025-03-06 13:47:12', '2025-03-06 13:47:12'),
(33, 14, 'Order appliances', '3', '2025-03-06 13:47:25', '2025-03-06 13:47:25'),
(34, 14, 'Soil test', '1', '2025-03-06 13:47:40', '2025-03-06 13:47:40'),
(35, 14, 'Engineering', NULL, '2025-03-06 13:47:51', '2025-03-06 13:47:51'),
(36, 14, 'Water tap', NULL, '2025-03-06 13:48:04', '2025-03-06 13:48:04'),
(37, 14, 'Gas tap - LP tank', NULL, '2025-03-06 13:48:16', '2025-03-06 13:48:16'),
(38, 14, 'T-pole install', NULL, '2025-03-06 13:48:26', '2025-03-06 13:48:26'),
(39, 14, 'Temporary ES ID #', NULL, '2025-03-06 13:48:37', '2025-03-06 13:48:37'),
(40, 14, 'Temporary electric account #', NULL, '2025-03-06 13:48:53', '2025-03-06 13:48:53'),
(41, 14, 'Temporary electric meter installed', NULL, '2025-03-06 13:49:06', '2025-03-06 13:49:06'),
(42, 14, 'Porta Can', NULL, '2025-03-06 13:49:16', '2025-03-06 13:49:16'),
(43, 14, 'Dumpster', NULL, '2025-03-06 13:49:26', '2025-03-06 13:49:26'),
(44, 15, 'Culverts', NULL, '2025-03-06 13:50:23', '2025-03-06 13:50:23'),
(45, 15, 'Driveway rock', NULL, '2025-03-06 13:50:36', '2025-03-06 13:50:36'),
(46, 15, 'Lot stake', NULL, '2025-03-06 13:50:47', '2025-03-06 13:50:47'),
(47, 15, 'Clear lot', NULL, '2025-03-06 13:50:59', '2025-03-06 13:50:59'),
(48, 15, 'Build pad', NULL, '2025-03-06 13:51:10', '2025-03-06 13:51:10'),
(49, 15, 'Set forms', NULL, '2025-03-06 13:51:20', '2025-03-06 13:51:20'),
(50, 15, 'Fill forms', NULL, '2025-03-06 13:51:29', '2025-03-06 13:51:29'),
(51, 15, 'Dirt knock down', NULL, '2025-03-06 13:51:41', '2025-03-06 13:51:41'),
(52, 15, 'Ground plumbing', NULL, '2025-03-06 13:51:52', '2025-03-06 13:51:52'),
(53, 15, 'Sleeve for water line through foundation', NULL, '2025-03-06 13:52:07', '2025-03-06 13:52:07'),
(54, 15, 'Water line in island', NULL, '2025-03-06 13:52:18', '2025-03-06 13:52:18'),
(55, 15, 'Dig beams', NULL, '2025-03-06 13:52:30', '2025-03-06 13:52:30'),
(56, 15, 'Pre-treat for termite', NULL, '2025-03-06 13:52:40', '2025-03-06 13:52:40'),
(57, 15, 'Slab make ready', NULL, '2025-03-06 13:52:50', '2025-03-06 13:52:50'),
(58, 15, 'Slab electrical', NULL, '2025-03-06 13:53:02', '2025-03-06 13:53:02'),
(59, 15, 'Pre-pour inspection', NULL, '2025-03-06 13:53:11', '2025-03-06 13:53:11'),
(60, 15, 'Order walls, headers, and beams', NULL, '2025-03-06 13:53:22', '2025-03-06 13:53:22'),
(61, 15, 'Pour', NULL, '2025-03-06 13:53:32', '2025-03-06 13:53:32'),
(62, 15, 'Anchor bolts', NULL, '2025-03-06 13:53:41', '2025-03-06 13:53:41'),
(63, 15, 'Vibrate beams', NULL, '2025-03-06 13:53:55', '2025-03-06 13:53:55'),
(64, 15, 'Brush finish on porch', NULL, '2025-03-06 13:54:04', '2025-03-06 13:54:04'),
(65, 15, 'Ufer rod', NULL, '2025-03-06 13:54:14', '2025-03-06 13:54:14'),
(66, 15, 'Wreck forms', NULL, '2025-03-06 13:55:02', '2025-03-06 13:55:02'),
(67, 15, 'Grade foundation perimeter', NULL, '2025-03-06 13:55:12', '2025-03-06 13:55:12'),
(68, 16, 'Framer', NULL, '2025-03-06 14:01:05', '2025-03-06 14:01:05'),
(69, 16, 'Base plate wall flashing per details', NULL, '2025-03-06 14:01:21', '2025-03-06 14:01:21'),
(70, 16, 'Slope window sills towards exterior', NULL, '2025-03-06 14:01:38', '2025-03-06 14:01:38'),
(71, 16, 'No cripples in the middle of windows', NULL, '2025-03-06 14:01:54', '2025-03-06 14:01:54'),
(72, 16, 'Zip stretch tape along bottom and up the sides of the window frame', NULL, '2025-03-06 14:02:08', '2025-03-06 14:02:08'),
(73, 16, 'Caulk top and sides of windows before installation', NULL, '2025-03-06 14:08:51', '2025-03-06 14:08:51'),
(74, 16, 'Tape windows along sides, then top, not the bottom', NULL, '2025-03-06 14:09:04', '2025-03-06 14:09:04'),
(75, 16, 'Flashing behind horizontal butt joints', NULL, '2025-03-06 14:09:19', '2025-03-06 14:09:19'),
(76, 16, 'Well', NULL, '2025-03-06 14:10:05', '2025-03-06 14:10:05'),
(77, 16, 'Stress cables', NULL, '2025-03-06 14:10:22', '2025-03-06 14:10:22'),
(78, 16, 'Cable inspection', NULL, '2025-03-06 14:10:35', '2025-03-06 14:10:35'),
(79, 16, 'Cut and grout cables', NULL, '2025-03-06 14:10:50', '2025-03-06 14:10:50'),
(80, 16, 'Order joist material', NULL, '2025-03-06 14:11:03', '2025-03-06 14:11:03'),
(81, 16, 'Order sheathing', NULL, '2025-03-06 14:11:19', '2025-03-06 14:11:19'),
(82, 16, 'Order windows', NULL, '2025-03-06 14:11:30', '2025-03-06 14:11:30'),
(83, 16, 'Shingle selection', NULL, '2025-03-06 14:11:43', '2025-03-06 14:11:43'),
(84, 16, 'Order exterior, pocket (standard soft close/open), and front door', NULL, '2025-03-06 14:11:55', '2025-03-06 14:11:55'),
(85, 16, 'Order cornice', NULL, '2025-03-06 14:12:13', '2025-03-06 14:12:13'),
(86, 16, 'Order decking', NULL, '2025-03-06 14:12:43', '2025-03-06 14:12:43'),
(87, 16, 'Order fireplace', NULL, '2025-03-06 14:12:56', '2025-03-06 14:12:56'),
(88, 16, 'Plumbing fixture selections', NULL, '2025-03-06 14:13:09', '2025-03-06 14:13:09'),
(89, 16, 'Order roofing material', NULL, '2025-03-06 14:13:22', '2025-03-06 14:13:22'),
(90, 16, 'Roofer', NULL, '2025-03-06 14:13:36', '2025-03-06 14:13:36'),
(91, 16, 'Counter flashing', NULL, '2025-03-06 14:14:18', '2025-03-06 14:14:18'),
(92, 16, 'Water and ice shield in valleys', NULL, '2025-03-06 14:14:33', '2025-03-06 14:14:33'),
(93, 16, 'Synthetic underlayment', NULL, '2025-03-06 14:14:45', '2025-03-06 14:14:45'),
(94, 16, 'Verify kick out flashing again', NULL, '2025-03-06 14:14:57', '2025-03-06 14:14:57'),
(95, 16, 'Caulk nail heads', NULL, '2025-03-06 14:15:09', '2025-03-06 14:15:09'),
(96, 16, 'Stone/Stucco selection', NULL, '2025-03-06 14:15:23', '2025-03-06 14:15:23'),
(97, 16, 'Schedule insulation', NULL, '2025-03-06 14:15:35', '2025-03-06 14:15:35'),
(98, 16, 'Schedule sheetrock', NULL, '2025-03-06 14:15:51', '2025-03-06 14:15:51'),
(99, 16, 'Frame punch', NULL, '2025-03-06 14:16:09', '2025-03-06 14:16:09'),
(100, 16, 'Flashing - kick out, base, wall, etc.', NULL, '2025-03-06 14:16:23', '2025-03-06 14:16:23'),
(101, 16, 'Tape - roll for maximum adhesion', NULL, '2025-03-06 14:16:39', '2025-03-06 14:16:39'),
(102, 16, 'Liquid flash nails and penetrations', NULL, '2025-03-06 14:16:50', '2025-03-06 14:16:50'),
(103, 16, 'Beam and other supports', NULL, '2025-03-06 14:17:02', '2025-03-06 14:17:02'),
(104, 16, 'Fire blocking', NULL, '2025-03-06 14:17:14', '2025-03-06 14:17:14'),
(105, 16, 'Strapping', NULL, '2025-03-06 14:17:23', '2025-03-06 14:17:23'),
(106, 16, 'Blocking for - curtain rods, porch swings, TV mounts, bath hardware, grab bars, barn door hardware, etc.', NULL, '2025-03-06 14:17:38', '2025-03-06 14:17:38'),
(107, 16, 'Build plywood cover for sliding door tracks', NULL, '2025-03-06 14:17:55', '2025-03-06 14:17:55'),
(108, 16, 'Light fixture selections', NULL, '2025-03-06 14:18:06', '2025-03-06 14:18:06'),
(109, 17, 'Plumbing rough', NULL, '2025-03-06 14:18:51', '2025-03-06 14:18:51'),
(110, 17, 'Use copper elbows.', NULL, '2025-03-06 14:19:13', '2025-03-06 14:19:13'),
(111, 17, 'Ensure water shut offs are not located behind appliances, must be located to the side in a cabinet location.', NULL, '2025-03-06 14:19:29', '2025-03-06 14:19:29'),
(112, 17, 'Ensure gas shut offs are not located behind appliances, must be located to the side in a cabinet location.', NULL, '2025-03-06 14:19:43', '2025-03-06 14:19:43'),
(113, 17, 'Gas shut offs should be in an in-wall box.', NULL, '2025-03-06 14:19:55', '2025-03-06 14:19:55'),
(114, 17, 'Use Quickflash products on all exterior penetrations.', NULL, '2025-03-06 14:20:44', '2025-03-06 14:20:44'),
(115, 17, 'Loop water spigots with shut off in the garage', NULL, '2025-03-06 14:21:07', '2025-03-06 14:21:07'),
(116, 17, 'Main water line through foundation sleeve with shut off in garage', NULL, '2025-03-06 14:21:22', '2025-03-06 14:21:22'),
(117, 17, 'Irrigation ground box to hide sewer clean out', NULL, '2025-03-06 14:21:37', '2025-03-06 14:21:37'),
(118, 17, 'Water heater drain pans', NULL, '2025-03-06 14:21:49', '2025-03-06 14:21:49'),
(119, 17, 'Verify wall mount sink dimensions', NULL, '2025-03-06 14:22:03', '2025-03-06 14:22:03'),
(120, 17, 'Verify body spray rough ins and dimensions', NULL, '2025-03-06 14:22:20', '2025-03-06 14:22:20'),
(121, 17, 'Verify p-trap locations', NULL, '2025-03-06 14:22:32', '2025-03-06 14:22:32'),
(122, 17, 'Covert tubs with foam board and plywood', NULL, '2025-03-06 14:22:45', '2025-03-06 14:22:45'),
(123, 17, 'HVAC rough', NULL, '2025-03-06 14:22:58', '2025-03-06 14:22:58'),
(124, 17, 'Line up all supplies with recess cans and/or lights', NULL, '2025-03-06 14:23:12', '2025-03-06 14:23:12'),
(125, 17, 'Electrical rough', NULL, '2025-03-06 14:23:28', '2025-03-06 14:23:28'),
(126, 17, 'Box and can walk first', NULL, '2025-03-06 14:23:45', '2025-03-06 14:23:45'),
(127, 17, 'Locate plugs for appliances to the side of each appliance in a cabinet for ease of access.', NULL, '2025-03-06 14:23:57', '2025-03-06 14:23:57'),
(128, 17, 'Ensure any plugs that are located inside a cabinet are high or low enough to miss internal shelves.', NULL, '2025-03-06 14:24:17', '2025-03-06 14:24:17'),
(129, 17, 'Raco Vapor Barrier electrical boxes on exterior walls – inside and outside', NULL, '2025-03-06 14:24:29', '2025-03-06 14:24:29'),
(130, 17, 'Use Quickflash products on all exterior penetrations.', NULL, '2025-03-06 14:24:41', '2025-03-06 14:24:41'),
(131, 17, 'HVAC breaker requirements', NULL, '2025-03-06 14:24:53', '2025-03-06 14:24:53'),
(132, 17, '2 Ton    25 amp breaker', NULL, '2025-03-06 14:25:08', '2025-03-06 14:25:08'),
(133, 17, '3 Ton    40 amp breaker', NULL, '2025-03-06 14:25:20', '2025-03-06 14:25:20'),
(134, 17, '4 Ton    45 amp breaker', NULL, '2025-03-06 14:25:31', '2025-03-06 14:25:31'),
(135, 17, '5 Ton    50 amp breaker', NULL, '2025-03-06 14:25:42', '2025-03-06 14:25:42'),
(136, 17, 'No jamb lights, use occupancy switches in closet/pantry', NULL, '2025-03-06 14:25:54', '2025-03-06 14:25:54'),
(137, 17, 'Counter plugs to be 46\" off floor to minimize interference with backsplash material', NULL, '2025-03-06 14:26:06', '2025-03-06 14:26:06'),
(138, 17, 'Plugs in cabinets to be 12\" off floor to minimize interference with shelves', NULL, '2025-03-06 14:26:18', '2025-03-06 14:26:18'),
(139, 17, 'Verify light switches are 6\" away from door jambs', NULL, '2025-03-06 14:26:29', '2025-03-06 14:26:29'),
(140, 17, 'Center plugs under windows', NULL, '2025-03-06 14:26:39', '2025-03-06 14:26:39'),
(141, 17, 'Low voltage rough', NULL, '2025-03-06 14:26:50', '2025-03-06 14:26:50'),
(142, 17, 'Central vacuum rough', NULL, '2025-03-06 14:27:02', '2025-03-06 14:27:02'),
(143, 17, 'Frame and mechanical inspection', NULL, '2025-03-06 14:27:13', '2025-03-06 14:27:13'),
(144, 17, 'Frame interior clean', NULL, '2025-03-06 14:28:30', '2025-03-06 14:28:30'),
(145, 18, 'Brick/stone/stucco installation', NULL, '2025-03-06 14:29:54', '2025-03-06 14:29:54'),
(146, 18, 'Gas line', NULL, '2025-03-06 14:30:05', '2025-03-06 14:30:05'),
(147, 19, 'Insulation install', NULL, '2025-03-06 14:30:21', '2025-03-06 14:30:21'),
(148, 19, 'Insulation inspection', NULL, '2025-03-06 14:30:34', '2025-03-06 14:30:34'),
(149, 20, 'Paint exterior', NULL, '2025-03-06 14:30:51', '2025-03-06 14:30:51'),
(150, 20, 'Tile and flooring selections', NULL, '2025-03-06 14:31:06', '2025-03-06 14:31:06'),
(151, 20, 'Granite selections', NULL, '2025-03-06 14:31:18', '2025-03-06 14:31:18'),
(152, 21, 'Granite install', NULL, '2025-03-06 14:31:36', '2025-03-06 14:31:36'),
(153, 21, 'Tile install', NULL, '2025-03-06 14:31:59', '2025-03-06 14:31:59'),
(154, 22, 'Electrical trim', NULL, '2025-03-06 14:32:20', '2025-03-06 14:32:20'),
(155, 22, 'Whole house surge protector', NULL, '2025-03-06 14:32:32', '2025-03-06 14:32:32'),
(156, 23, 'Open every door, window, cabinet door and drawers', NULL, '2025-03-06 14:32:52', '2025-03-06 14:32:52'),
(157, 23, 'Check for sticking or rubbing when you open and close doors', NULL, '2025-03-06 14:33:04', '2025-03-06 14:33:04'),
(159, 18, 'Electrical service build', NULL, '2025-03-13 16:10:20', '2025-03-13 16:10:20'),
(160, 18, 'Electrical underground', NULL, '2025-03-13 16:10:34', '2025-03-13 16:10:34'),
(161, 18, 'Garage doors', NULL, '2025-03-13 16:10:51', '2025-03-13 16:10:51'),
(162, 18, 'Paint selections', NULL, '2025-03-13 16:11:06', '2025-03-13 16:11:06'),
(163, 18, 'Hardware selections', NULL, '2025-03-13 16:11:27', '2025-03-13 16:11:27'),
(164, 18, 'Gutters', NULL, '2025-03-13 16:12:14', '2025-03-13 16:12:14'),
(165, 18, 'Front door', NULL, '2025-03-13 16:12:30', '2025-03-13 16:12:30'),
(166, 18, 'Window screens', NULL, '2025-03-13 16:12:44', '2025-03-13 16:12:44'),
(167, 18, 'Paint selections', NULL, '2025-03-13 16:12:55', '2025-03-13 16:12:55'),
(168, 19, 'Clear out trash before sheetrock - under stairs, wall cavities, around bath tubs,', NULL, '2025-03-13 16:13:32', '2025-03-13 16:13:32'),
(169, 19, 'Sheetrock stocked', NULL, '2025-03-13 16:13:52', '2025-03-13 16:13:52'),
(170, 19, 'Sheetrock install', NULL, '2025-03-13 16:14:07', '2025-03-13 16:14:07'),
(171, 19, 'Mark for niches, access doors, etc.', NULL, '2025-03-13 16:14:24', '2025-03-13 16:14:24'),
(172, 19, 'Order trim material', NULL, '2025-03-13 16:14:39', '2025-03-13 16:14:39'),
(173, 19, 'Schedule trim walk', NULL, '2025-03-13 16:14:54', '2025-03-13 16:14:54'),
(174, 19, 'Tape and float', NULL, '2025-03-13 16:15:07', '2025-03-13 16:15:07'),
(175, 19, 'Sand Sand', NULL, '2025-03-13 16:15:21', '2025-03-13 16:15:21'),
(176, 19, 'Texture', NULL, '2025-03-13 16:15:33', '2025-03-13 16:15:33'),
(177, 19, 'Order hardware', NULL, '2025-03-13 16:15:49', '2025-03-13 16:15:49'),
(178, 19, 'Appliance cut outs', NULL, '2025-03-13 16:16:01', '2025-03-13 16:16:01'),
(179, 20, 'Septic', NULL, '2025-03-13 16:16:49', '2025-03-13 16:16:49'),
(180, 20, 'Gas meter', NULL, '2025-03-13 16:17:01', '2025-03-13 16:17:01'),
(181, 20, 'Permanent ES ID #', NULL, '2025-03-13 16:17:21', '2025-03-13 16:17:21'),
(182, 20, 'Permanent electric account #', NULL, '2025-03-13 16:17:35', '2025-03-13 16:17:35'),
(183, 20, 'Permanent electric meter installed', NULL, '2025-03-13 16:17:52', '2025-03-13 16:17:52'),
(184, 20, 'Trim material delivered', NULL, '2025-03-13 16:18:10', '2025-03-13 16:18:10'),
(185, 20, 'Trim carpenter', NULL, '2025-03-13 16:18:22', '2025-03-13 16:18:22'),
(186, 20, 'Order tubs', NULL, '2025-03-13 16:18:49', '2025-03-13 16:18:49'),
(187, 20, 'Paint interior', NULL, '2025-03-13 16:19:02', '2025-03-13 16:19:02'),
(188, 20, 'Caulk penetrations to sheetrock - light, switches, plugs, pipes, etc.', NULL, '2025-03-13 16:19:15', '2025-03-13 16:19:15'),
(189, 20, 'Order hardware', NULL, '2025-03-13 16:19:31', '2025-03-13 16:19:31'),
(190, 20, 'Clean windows', NULL, '2025-03-13 16:19:43', '2025-03-13 16:19:43'),
(191, 20, 'Window screens', NULL, '2025-03-13 16:19:59', '2025-03-13 16:19:59'),
(192, 21, 'Shower glass and mirror take off', NULL, '2025-03-13 16:20:31', '2025-03-13 16:20:31'),
(193, 21, 'Deliver light fixtures', NULL, '2025-03-13 16:20:50', '2025-03-13 16:20:50'),
(194, 21, 'Deliver plumbing fixtures', NULL, '2025-03-13 16:21:05', '2025-03-13 16:21:05'),
(195, 21, 'Wallpaper', NULL, '2025-03-13 16:21:18', '2025-03-13 16:21:18'),
(196, 21, 'Flatwork', NULL, '2025-03-13 16:21:36', '2025-03-13 16:21:36'),
(197, 21, 'Wood floor install', NULL, '2025-03-13 16:21:48', '2025-03-13 16:21:48'),
(198, 21, 'Carpet', NULL, '2025-03-13 16:21:58', '2025-03-13 16:21:58'),
(199, 22, 'Straighten all plates', NULL, '2025-03-13 16:22:52', '2025-03-13 16:22:52'),
(200, 22, 'Plumbing trim', NULL, '2025-03-13 16:23:07', '2025-03-13 16:23:07'),
(201, 22, 'HVAC trim', NULL, '2025-03-13 16:23:22', '2025-03-13 16:23:22'),
(202, 22, 'Level all exterior escutcheons', NULL, '2025-03-13 16:23:38', '2025-03-13 16:23:38'),
(203, 22, 'Use metal 4\" vent covers', NULL, '2025-03-13 16:23:53', '2025-03-13 16:23:53'),
(204, 22, 'Low voltage trim', NULL, '2025-03-13 16:24:08', '2025-03-13 16:24:08'),
(205, 22, 'Central vacuum trim', NULL, '2025-03-13 16:24:23', '2025-03-13 16:24:23'),
(206, 22, 'Garage door openers', NULL, '2025-03-13 16:43:11', '2025-03-13 16:43:11'),
(207, 22, 'Shower glass and mirror installation', NULL, '2025-03-13 16:49:34', '2025-03-13 16:49:34'),
(208, 22, 'Hardware installation', NULL, '2025-03-13 16:49:59', '2025-03-13 16:49:59'),
(209, 22, 'Fireplace trim', NULL, '2025-03-13 16:50:11', '2025-03-13 16:50:11'),
(210, 22, 'First clean', NULL, '2025-03-13 16:50:25', '2025-03-13 16:50:25'),
(211, 22, 'Final grade', NULL, '2025-03-13 16:50:36', '2025-03-13 16:50:36'),
(212, 22, 'Fence', NULL, '2025-03-13 16:50:47', '2025-03-13 16:50:47'),
(213, 22, 'Landscape', NULL, '2025-03-13 16:50:58', '2025-03-13 16:50:58'),
(214, 22, 'Blower door test', NULL, '2025-03-13 16:51:08', '2025-03-13 16:51:08'),
(215, 22, 'Final Inspection', NULL, '2025-03-13 16:51:21', '2025-03-13 16:51:21'),
(216, 22, 'Second clean', NULL, '2025-03-13 16:51:31', '2025-03-13 16:51:31'),
(217, 22, 'Paint touch up', NULL, '2025-03-13 16:51:51', '2025-03-13 16:51:51'),
(218, 22, 'Final clean', NULL, '2025-03-13 16:52:01', '2025-03-13 16:52:01'),
(219, 23, 'Close and lock all doors', NULL, '2025-03-13 16:55:12', '2025-03-13 16:55:12'),
(220, 23, 'Check for missing trim behind doors', NULL, '2025-03-13 16:55:26', '2025-03-13 16:55:26'),
(221, 23, 'Fully open, close and lock all windows', NULL, '2025-03-13 16:55:40', '2025-03-13 16:55:40'),
(222, 23, 'Window screens free from tears', NULL, '2025-03-13 16:55:55', '2025-03-13 16:55:55'),
(223, 23, 'Windows are caulked', NULL, '2025-03-13 16:56:21', '2025-03-13 16:56:21'),
(224, 23, 'Window scratches or cracks', NULL, '2025-03-13 16:56:38', '2025-03-13 16:56:38'),
(225, 23, 'Put weight on open shelves', NULL, '2025-03-13 16:58:37', '2025-03-13 16:58:37'),
(226, 23, 'Turn on all switches: lights, celling fans, and exhaust fans', NULL, '2025-03-13 16:58:58', '2025-03-13 16:58:58'),
(227, 23, 'Drywall nail pops, cracks, and sloppy/missing texture', NULL, '2025-03-13 16:59:14', '2025-03-13 16:59:14'),
(228, 23, 'Signs of pests such as ants, roaches, or rodents', NULL, '2025-03-13 16:59:33', '2025-03-13 16:59:33'),
(229, 23, 'Wiggle all light fixture to see if they are loose', NULL, '2025-03-13 16:59:47', '2025-03-13 16:59:47'),
(230, 23, 'Carpet stains', NULL, '2025-03-13 17:00:03', '2025-03-13 17:00:03'),
(231, 23, 'Carpet seams are not visible', NULL, '2025-03-13 17:00:20', '2025-03-13 17:00:20'),
(232, 23, 'Carpeted corners don’t have gaps', NULL, '2025-03-13 17:00:39', '2025-03-13 17:00:39'),
(233, 23, 'Uneven floors', NULL, '2025-03-13 17:00:58', '2025-03-13 17:00:58'),
(234, 23, 'Scratches or gaps in the flooring', NULL, '2025-03-13 17:01:25', '2025-03-13 17:01:25'),
(235, 23, 'No hollow sounding tile', NULL, '2025-03-13 17:01:48', '2025-03-13 17:01:48'),
(236, 23, 'Paint and caulking blemishes', NULL, '2025-03-13 17:02:02', '2025-03-13 17:02:02'),
(237, 23, 'Trim ends missing paint', NULL, '2025-03-13 17:02:18', '2025-03-13 17:02:18'),
(238, 23, 'Paint overspray', NULL, '2025-03-13 17:02:33', '2025-03-13 17:02:33'),
(239, 23, 'No missing closet rod (clothes hanger)', NULL, '2025-03-13 17:02:49', '2025-03-13 17:02:49'),
(240, 23, 'Test both heat and A/C', NULL, '2025-03-13 17:03:04', '2025-03-13 17:03:04'),
(241, 23, 'Run the range above the stove', NULL, '2025-03-13 17:03:30', '2025-03-13 17:03:30'),
(242, 23, 'Turn on each burner', NULL, '2025-03-13 17:03:45', '2025-03-13 17:03:45'),
(243, 23, 'Turn on microwave', NULL, '2025-03-13 17:04:08', '2025-03-13 17:04:08'),
(244, 23, 'Turn on the oven', NULL, '2025-03-13 17:04:24', '2025-03-13 17:04:24'),
(245, 23, 'Run hot water to test water heater', NULL, '2025-03-13 17:04:39', '2025-03-13 17:04:39'),
(246, 23, 'Filter in the hood fan', NULL, '2025-03-13 17:04:55', '2025-03-13 17:04:55'),
(247, 23, 'Trim under cabinets', NULL, '2025-03-13 17:05:11', '2025-03-13 17:05:11'),
(248, 23, 'Countertop blemishes', NULL, '2025-03-13 17:05:28', '2025-03-13 17:05:28'),
(249, 23, 'Countertop level', NULL, '2025-03-13 17:05:44', '2025-03-13 17:05:44'),
(250, 23, 'Wiggle plumbing fixtures', NULL, '2025-03-13 17:06:00', '2025-03-13 17:06:00'),
(251, 23, 'Check under sinks to look for leaks', NULL, '2025-03-13 17:06:19', '2025-03-13 17:06:19'),
(252, 23, 'Turn on disposal', NULL, '2025-03-13 17:06:47', '2025-03-13 17:06:47'),
(253, 23, 'Cabinet door alignment', NULL, '2025-03-13 17:07:02', '2025-03-13 17:07:02'),
(254, 23, 'Open and close all cabinet shelves and doors', NULL, '2025-03-13 17:07:24', '2025-03-13 17:07:24'),
(255, 23, 'Paint overspray on cabinets', NULL, '2025-03-13 17:07:37', '2025-03-13 17:07:37'),
(256, 23, 'Any missing cabinet shelving', NULL, '2025-03-13 17:07:51', '2025-03-13 17:07:51'),
(257, 23, 'Level or loose cabinet knobs/handles', NULL, '2025-03-13 17:08:07', '2025-03-13 17:08:07'),
(258, 23, 'Backsplash tile cracks', NULL, '2025-03-13 17:08:20', '2025-03-13 17:08:20'),
(259, 23, 'Backsplash missing grout', NULL, '2025-03-13 17:08:33', '2025-03-13 17:08:33'),
(260, 23, 'Backsplash caulked where it meets countertop', NULL, '2025-03-13 17:08:53', '2025-03-13 17:08:53'),
(261, 23, 'Turn on faucets and let run for 5 minutes, check pipes under the sink for leaks, leaks around faucet, slow draining or clogged drains.', NULL, '2025-03-13 17:09:10', '2025-03-13 17:09:10'),
(262, 23, 'Sink stopper working and holding water', NULL, '2025-03-13 17:09:33', '2025-03-13 17:09:33'),
(263, 23, 'Wiggle all plumbing fixtures', NULL, '2025-03-13 17:09:48', '2025-03-13 17:09:48'),
(264, 23, 'Vanity level', NULL, '2025-03-13 17:10:06', '2025-03-13 17:10:06'),
(265, 23, 'Sit on toilet for a wobble check', NULL, '2025-03-13 17:10:32', '2025-03-13 17:10:32'),
(266, 23, 'Flush toilets with toilet paper', NULL, '2025-03-13 17:10:59', '2025-03-13 17:10:59'),
(267, 23, 'Any leaks around toilet base', NULL, '2025-03-13 17:11:26', '2025-03-13 17:11:26'),
(268, 23, 'Ensure all shower and sink drains close properly', NULL, '2025-03-13 17:11:43', '2025-03-13 17:11:43'),
(269, 23, 'Wiggle towel rod and toilet paper holders', NULL, '2025-03-13 17:11:57', '2025-03-13 17:11:57'),
(270, 23, 'Hollow sounding tile', NULL, '2025-03-13 17:12:13', '2025-03-13 17:12:13'),
(271, 23, 'Missing grout', NULL, '2025-03-13 17:12:47', '2025-03-13 17:12:47'),
(272, 23, 'Turn water on in at least three locations and flush the toilet to check for water pressure', NULL, '2025-03-13 17:13:10', '2025-03-13 17:13:10'),
(273, 23, 'Run the shower/faucets for drainage and water pressure, and leaks. Do they shut off completely?', NULL, '2025-03-13 17:13:26', '2025-03-13 17:13:26'),
(274, 23, 'Mold growth in bathrooms', NULL, '2025-03-13 17:13:40', '2025-03-13 17:13:40'),
(275, 23, 'Test hot water', NULL, '2025-03-13 17:13:54', '2025-03-13 17:13:54'),
(276, 23, 'Rotten wood flooring in attic', NULL, '2025-03-13 17:14:24', '2025-03-13 17:14:24'),
(277, 23, 'Insulation around water pipes', NULL, '2025-03-13 17:14:39', '2025-03-13 17:14:39'),
(278, 23, 'No gaps in ceiling insulation', NULL, '2025-03-13 17:15:06', '2025-03-13 17:15:06'),
(279, 23, 'Sealed attic door', NULL, '2025-03-13 17:15:21', '2025-03-13 17:15:21'),
(280, 23, 'Bathroom fans vent to exterior and not into the attic', NULL, '2025-03-13 17:15:36', '2025-03-13 17:15:36'),
(281, 23, 'Open Garage Doors, check seal. No grinding during operation', NULL, '2025-03-13 17:15:53', '2025-03-13 17:15:53'),
(282, 23, 'Open garage door with remote and wall button', NULL, '2025-03-13 17:16:08', '2025-03-13 17:16:08'),
(283, 23, 'Open and close the garage door', NULL, '2025-03-13 17:16:22', '2025-03-13 17:16:22'),
(284, 23, 'Test doorbell', NULL, '2025-03-13 17:16:35', '2025-03-13 17:16:35'),
(285, 23, 'Exterior door, top and bottom are sealed or painted.', NULL, '2025-03-13 17:16:52', '2025-03-13 17:16:52'),
(286, 23, 'Exterior doors have weather stripping, no light shining through.', NULL, '2025-03-13 17:17:08', '2025-03-13 17:17:08'),
(287, 23, 'Test circuit breakers for proper labeling', NULL, '2025-03-13 17:17:20', '2025-03-13 17:17:20'),
(288, 23, 'Visit the house during rain and look for pooling water, especially near the foundation', NULL, '2025-03-13 17:19:45', '2025-03-13 17:19:45'),
(289, 23, 'Check for any loose brickwork', NULL, '2025-03-13 17:20:00', '2025-03-13 17:20:00'),
(290, 23, 'Meter box not loose', NULL, '2025-03-13 17:20:16', '2025-03-13 17:20:16'),
(291, 23, 'Check for any cracks in the concrete work that are more than 1/4” wide or deep.', NULL, '2025-03-13 17:20:30', '2025-03-13 17:20:30'),
(292, 23, 'Look for big divots in the driveway and sidewalks', NULL, '2025-03-13 17:20:45', '2025-03-13 17:20:45'),
(293, 23, 'Check for paint on all the soffits and cornice boards', NULL, '2025-03-13 17:21:08', '2025-03-13 17:21:08'),
(294, 23, 'Outdoor hose bib working properly', NULL, '2025-03-13 17:21:20', '2025-03-13 17:21:20'),
(295, 23, 'Check exterior light fixtures for caulking, especially where they are subject to rain/water', NULL, '2025-03-13 17:21:34', '2025-03-13 17:21:34'),
(296, 23, 'Exterior lights are functional', NULL, '2025-03-13 17:21:47', '2025-03-13 17:21:47'),
(297, 23, 'Exterior lights are not loose', NULL, '2025-03-13 17:21:59', '2025-03-13 17:21:59'),
(298, 23, 'Check exterior trim for caulking', NULL, '2025-03-13 17:22:15', '2025-03-13 17:22:15'),
(299, 23, 'Check for roof flashing', NULL, '2025-03-13 17:22:31', '2025-03-13 17:22:31'),
(300, 23, 'Gaps around the exterior penetrations (Hose bibs, A/C lines, internet cable, and power conduit)', NULL, '2025-03-13 17:22:45', '2025-03-13 17:22:45'),
(301, 23, 'Porch nails/screws not protruding', NULL, '2025-03-13 17:22:58', '2025-03-13 17:22:58'),
(302, 23, 'Porch rails are sturdy', NULL, '2025-03-13 17:23:10', '2025-03-13 17:23:10'),
(303, 23, 'Porch ceiling free of damage', NULL, '2025-03-13 17:23:22', '2025-03-13 17:23:22'),
(304, 23, 'Porch posts/columns free of damage', NULL, '2025-03-13 17:23:35', '2025-03-13 17:23:35'),
(305, 23, 'Gutters: no gaps or loose connections', NULL, '2025-03-13 17:23:48', '2025-03-13 17:23:48'),
(306, 23, 'Siding is properly caulked, painted, and installed. No damage', NULL, '2025-03-13 17:23:59', '2025-03-13 17:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `client_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('pending','in_progress','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `name`, `description`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, 'update', 'This is updates', '2025-04-10', '2025-04-30', 'pending', '2025-04-09 15:39:31', '2025-04-09 17:50:27'),
(8, 1, 'Adipisci eos nisi iu', 'Udates', '2025-04-10', '2025-04-30', 'pending', '2025-04-09 15:40:26', '2025-04-09 17:28:48'),
(9, 1, 'Test Faisal dsfcdsfsd', 'Test Faisal', '2025-04-10', '2025-04-30', 'pending', '2025-04-09 17:52:20', '2025-04-09 18:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_comments`
--

CREATE TABLE `project_comments` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `commented_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_media`
--

CREATE TABLE `project_media` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `media_type` enum('image','video','document') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `media_url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_media`
--

INSERT INTO `project_media` (`id`, `project_id`, `media_type`, `media_url`, `created_at`, `updated_at`) VALUES
(4, 7, 'image', 'uploads/project-images/Adipisci eos nisi iu/1744231171-1742238235_81w-iwz0I+L._AC_SL1500_.jpg', '2025-04-09 15:39:31', '2025-04-09 15:39:31'),
(5, 7, 'document', 'uploads/project-images/Adipisci eos nisi iu/1744231171-comics website v1.pdf', '2025-04-09 15:39:31', '2025-04-09 15:39:31'),
(6, 8, 'image', 'uploads/project-images/Adipisci eos nisi iu/1744231226-1742238235_81w-iwz0I+L._AC_SL1500_.jpg', '2025-04-09 15:40:26', '2025-04-09 15:40:26'),
(7, 8, 'document', 'uploads/project-images/Adipisci eos nisi iu/1744231226-comics website v1.pdf', '2025-04-09 15:40:26', '2025-04-09 15:40:26'),
(8, 7, 'image', 'uploads/project-images/update/1744239046-81Q5bOpJw+L._AC_SL1500_.jpg', '2025-04-09 17:50:46', '2025-04-09 17:50:46'),
(9, 7, 'document', 'uploads/project-images/update/1744239060-3D-MU_Fixes (1).pdf', '2025-04-09 17:51:00', '2025-04-09 17:51:00'),
(10, 9, 'image', 'uploads/project-images/Test Faisal/1744239140-1744231226-1742238235_81w-iwz0I+L._AC_SL1500_ (1).jpg', '2025-04-09 17:52:20', '2025-04-09 17:52:20'),
(11, 9, 'image', 'uploads/project-images/Test Faisal/1744239140-81Q5bOpJw+L._AC_SL1500_.jpg', '2025-04-09 17:52:20', '2025-04-09 17:52:20'),
(12, 9, 'document', 'uploads/project-images/Test Faisal/1744239140-Request for Proposal.pdf', '2025-04-09 17:52:20', '2025-04-09 17:52:20'),
(13, 9, 'document', 'uploads/project-images/Test Faisal/1744239140-comics website v2.pdf', '2025-04-09 17:52:20', '2025-04-09 17:52:20'),
(14, 9, 'image', 'uploads/project-images/Test Faisal/1744239169-avatar-659651_1280.png', '2025-04-09 17:52:49', '2025-04-09 17:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `role` enum('manager','developer','designer','tester') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `project_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(8, 7, 1, 'manager', '2025-04-09 15:39:31', '2025-04-09 15:39:31'),
(9, 7, 2, 'manager', '2025-04-09 15:39:31', '2025-04-09 15:39:31'),
(11, 8, 1, 'manager', '2025-04-09 15:40:26', '2025-04-09 15:40:26'),
(12, 8, 2, 'manager', '2025-04-09 15:40:26', '2025-04-09 15:40:26'),
(13, 8, 3, 'manager', '2025-04-09 15:40:26', '2025-04-09 15:40:26'),
(14, 7, 3, 'manager', '2025-04-09 17:51:13', '2025-04-09 17:51:13'),
(15, 9, 1, 'manager', '2025-04-09 17:52:20', '2025-04-09 17:52:20'),
(16, 9, 3, 'manager', '2025-04-09 17:52:20', '2025-04-09 17:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `assigned_to` int DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('pending','in_progress','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'web', '2025-03-28 15:31:50', '2025-03-28 15:31:50'),
(5, 'Manager', 'web', '2025-03-28 15:34:12', '2025-03-28 15:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(9, 5),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int UNSIGNED NOT NULL,
  `project_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('pending','completed','cancelled') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `user_id`, `title`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'Permits', '2025-04-19', '2025-04-30', 'pending', '2025-04-18 16:39:18', '2025-04-18 16:39:18'),
(2, 9, 1, 'Order brick', '2025-04-19', '2025-04-30', 'pending', '2025-04-18 16:39:18', '2025-04-18 16:39:18'),
(3, 9, 1, 'Order garage doors', '2025-04-29', '2025-05-10', 'pending', '2025-04-18 16:39:18', '2025-04-18 16:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint DEFAULT '1',
  `is_deleted` tinyint DEFAULT '0',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_active`, `is_deleted`, `address`, `phone_number`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$12$l.FO9MOfq/pWH8VQ0N/WleG.IWmYPtjtIIqgu8s3/ThvMrxGaJ4ke', 1, 0, NULL, NULL, 'uploads/profile-images/1743186657_1742238235_81w-iwz0I+L._AC_SL1500_ (1).jpg', NULL, '2025-03-28 18:26:56', '2025-03-28 14:19:42'),
(2, 'Anthony Lewis', 'huxisuny@mailinator.com', NULL, '$2y$12$HK.YqefpvCATulFUU7znXuHtXW2f6QT0DB7JirhWbeRmNtsjpdWw2', 0, 1, 'Itaque aliquip repre', '+1 (548) 422-1263', 'uploads/profile-images/1743187094_1742238235_81w-iwz0I+L._AC_SL1500_ (1).jpg', NULL, '2025-03-28 13:34:45', '2025-03-28 14:23:42'),
(3, 'Rose Medina', 'qiba@mailinator.com', NULL, '$2y$12$T2/TEzYboSafiwioiMHiguB4s7xmSA51YzLxlMHi8s5s.xjr9w0km', 0, 1, 'Dolore nemo voluptas', '+1 (713) 404-7165', NULL, NULL, '2025-03-28 13:52:07', '2025-03-28 14:22:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_task`
--
ALTER TABLE `client_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_todo`
--
ALTER TABLE `client_todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_todo_cards`
--
ALTER TABLE `client_todo_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_user`
--
ALTER TABLE `client_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `pre_categories`
--
ALTER TABLE `pre_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_tasks`
--
ALTER TABLE `pre_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `project_comments`
--
ALTER TABLE `project_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `project_media`
--
ALTER TABLE `project_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `assigned_to` (`assigned_to`);

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
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_task`
--
ALTER TABLE `client_task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `client_todo`
--
ALTER TABLE `client_todo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_todo_cards`
--
ALTER TABLE `client_todo_cards`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_user`
--
ALTER TABLE `client_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_ups`
--
ALTER TABLE `follow_ups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_categories`
--
ALTER TABLE `pre_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pre_tasks`
--
ALTER TABLE `pre_tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_comments`
--
ALTER TABLE `project_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_media`
--
ALTER TABLE `project_media`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_tasks`
--
ALTER TABLE `project_tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `project_comments`
--
ALTER TABLE `project_comments`
  ADD CONSTRAINT `project_comments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `project_members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_media`
--
ALTER TABLE `project_media`
  ADD CONSTRAINT `project_media_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `project_members_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD CONSTRAINT `project_tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_tasks_ibfk_2` FOREIGN KEY (`assigned_to`) REFERENCES `project_members` (`id`) ON DELETE SET NULL;

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
