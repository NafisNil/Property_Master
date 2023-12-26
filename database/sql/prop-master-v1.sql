-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2023 at 06:32 PM
-- Server version: 5.7.24
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_opt`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  `name` varchar(125) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_default` tinyint(4) DEFAULT '0',
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `school_id`, `name`, `start_date`, `end_date`, `is_default`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-24', '2023-01-01', '2023-12-31', 0, 1, '2023-04-29 17:45:42', '2023-05-12 09:34:26'),
(2, 1, '2021-22', '2021-01-01', '2021-12-31', 1, 1, '2023-04-30 06:56:03', '2023-05-12 09:34:40'),
(3, 1, '2023-24', '2023-05-01', '2024-04-30', 0, 1, '2023-05-09 16:03:44', '2023-05-09 16:03:44'),
(4, 1, '2016-17', '2023-05-12', '2023-05-17', 0, 1, '2023-05-09 16:08:33', '2023-05-09 16:08:33'),
(5, 1, '2024', '2024-01-01', '2024-12-31', 0, 1, '2023-09-23 16:26:42', '2023-09-23 16:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `account_holder_licenses`
--

CREATE TABLE `account_holder_licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_holder_id` bigint(20) UNSIGNED NOT NULL,
  `license_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_holder_licenses`
--

INSERT INTO `account_holder_licenses` (`id`, `account_holder_id`, `license_id`, `created_at`, `updated_at`) VALUES
(1, 5, 24, '2023-03-22 16:55:52', '2023-03-22 16:55:52'),
(2, 5, 25, '2023-03-22 16:55:52', '2023-03-22 16:55:52'),
(3, 6, 26, '2023-03-23 12:29:21', '2023-03-23 12:29:21'),
(4, 6, 27, '2023-03-23 12:29:21', '2023-03-23 12:29:21'),
(5, 7, 28, '2023-03-23 12:31:04', '2023-03-23 12:31:04'),
(6, 7, 29, '2023-03-23 12:31:04', '2023-03-23 12:31:04'),
(7, 8, 30, '2023-03-24 16:18:06', '2023-03-24 16:18:06'),
(8, 8, 31, '2023-03-24 16:18:06', '2023-03-24 16:18:06'),
(9, 9, 32, '2023-03-24 16:52:47', '2023-03-24 16:52:47'),
(10, 9, 33, '2023-03-24 16:52:47', '2023-03-24 16:52:47'),
(11, 10, 34, '2023-04-04 15:04:40', '2023-04-04 15:04:40'),
(12, 10, 35, '2023-04-04 15:04:40', '2023-04-04 15:04:40'),
(13, 11, 36, '2023-04-04 15:10:08', '2023-04-04 15:10:08'),
(14, 11, 37, '2023-04-04 15:10:08', '2023-04-04 15:10:08'),
(15, 12, 38, '2023-04-05 16:45:08', '2023-04-05 16:45:08'),
(16, 12, 39, '2023-04-05 16:45:08', '2023-04-05 16:45:08'),
(17, 13, 40, '2023-04-05 16:45:18', '2023-04-05 16:45:18'),
(18, 13, 41, '2023-04-05 16:45:18', '2023-04-05 16:45:18'),
(19, 14, 42, '2023-04-05 16:45:41', '2023-04-05 16:45:41'),
(20, 14, 43, '2023-04-05 16:45:41', '2023-04-05 16:45:41'),
(21, 15, 44, '2023-04-08 17:33:47', '2023-04-08 17:33:47'),
(22, 15, 45, '2023-04-08 17:33:47', '2023-04-08 17:33:47'),
(23, 16, 46, '2023-04-08 17:34:15', '2023-04-08 17:34:15'),
(24, 16, 47, '2023-04-08 17:34:15', '2023-04-08 17:34:15'),
(25, 15, 60, '2023-04-10 17:52:29', '2023-04-10 17:52:29'),
(26, 15, 61, '2023-04-10 17:52:29', '2023-04-10 17:52:29'),
(27, 16, 62, '2023-04-12 14:52:20', '2023-04-12 14:52:20'),
(28, 16, 63, '2023-04-12 14:52:20', '2023-04-12 14:52:20'),
(29, 17, 64, '2023-04-12 17:27:28', '2023-04-12 17:27:28'),
(30, 17, 65, '2023-04-12 17:27:28', '2023-04-12 17:27:28'),
(31, 18, 66, '2023-04-12 17:27:39', '2023-04-12 17:27:39'),
(32, 18, 67, '2023-04-12 17:27:39', '2023-04-12 17:27:39'),
(33, 19, 68, '2023-04-12 17:27:51', '2023-04-12 17:27:51'),
(34, 19, 69, '2023-04-12 17:27:51', '2023-04-12 17:27:51'),
(35, 20, 70, '2023-04-12 17:28:06', '2023-04-12 17:28:06'),
(36, 20, 71, '2023-04-12 17:28:06', '2023-04-12 17:28:06'),
(37, 21, 72, '2023-04-12 17:28:19', '2023-04-12 17:28:19'),
(38, 21, 73, '2023-04-12 17:28:19', '2023-04-12 17:28:19'),
(39, 22, 74, '2023-04-12 17:28:32', '2023-04-12 17:28:32'),
(40, 22, 75, '2023-04-12 17:28:32', '2023-04-12 17:28:32'),
(41, 23, 76, '2023-04-12 17:28:46', '2023-04-12 17:28:46'),
(42, 23, 77, '2023-04-12 17:28:46', '2023-04-12 17:28:46'),
(43, 26, 78, '2023-04-12 17:47:50', '2023-04-12 17:47:50'),
(44, 26, 79, '2023-04-12 17:47:50', '2023-04-12 17:47:50'),
(45, 27, 80, '2023-04-12 17:48:06', '2023-04-12 17:48:06'),
(46, 27, 81, '2023-04-12 17:48:06', '2023-04-12 17:48:06'),
(47, 32, 82, '2023-04-13 11:50:18', '2023-04-13 11:50:18'),
(48, 32, 83, '2023-04-13 11:50:18', '2023-04-13 11:50:18'),
(49, 33, 84, '2023-04-13 11:50:30', '2023-04-13 11:50:30'),
(50, 33, 85, '2023-04-13 11:50:30', '2023-04-13 11:50:30'),
(51, 50, 86, '2023-05-14 18:40:48', '2023-05-14 18:40:48'),
(52, 50, 87, '2023-05-14 18:40:48', '2023-05-14 18:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `unique_no` varchar(50) DEFAULT NULL,
  `amount` decimal(15,4) NOT NULL,
  `type` enum('credit','debit') NOT NULL,
  `sub_type` varchar(125) DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_reconciled` tinyint(4) DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transfer_transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text,
  `bank_slip_no` varchar(50) DEFAULT NULL,
  `transaction_no` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_transactions`
--

INSERT INTO `account_transactions` (`id`, `school_id`, `account_id`, `unique_no`, `amount`, `type`, `sub_type`, `payment_id`, `is_reconciled`, `transaction_id`, `transfer_transaction_id`, `note`, `created_at`, `updated_at`, `description`, `bank_slip_no`, `transaction_no`, `date`, `deleted_at`) VALUES
(1, 1, 1, NULL, 1260.0000, 'debit', NULL, 4, NULL, 38, NULL, NULL, '2023-04-26 17:58:14', '2023-04-26 17:58:14', NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, NULL, 171.3600, 'debit', NULL, 5, NULL, 39, NULL, NULL, '2023-04-26 18:42:56', '2023-04-26 18:42:56', NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, NULL, 518.6500, 'debit', NULL, 6, NULL, 49, NULL, NULL, '2023-04-27 20:45:00', '2023-04-27 20:45:00', NULL, NULL, NULL, NULL, NULL),
(4, 1, 1, NULL, 600.0000, 'credit', 'deposit', NULL, NULL, NULL, NULL, NULL, '2023-08-18 18:27:22', '2023-08-18 18:27:22', 'Veniam enim consect', 'Perspiciatis reicie', 'Architecto deserunt', NULL, NULL),
(5, 1, 1, NULL, 600.0000, 'credit', 'deposit', NULL, NULL, NULL, NULL, NULL, '2023-08-18 18:34:51', '2023-08-18 18:34:51', 'Veniam enim consect', 'Perspiciatis reicie', 'Architecto deserunt', NULL, NULL),
(6, 1, 1, 'Occaecat rerum et no5', 700.0000, 'credit', 'deposit', NULL, NULL, NULL, NULL, NULL, '2023-08-18 18:49:00', '2023-08-19 14:31:27', 'Maiores fugiat illo', 'Sit est hic voluptat', 'Et accusamus possimu', '2005-10-24 03:00:00', NULL),
(7, 1, 1, '64f2226eba8f4', 600.0000, 'credit', 'deposit', NULL, 1, NULL, NULL, NULL, '2023-09-01 17:42:24', '2023-09-01 17:42:24', 'Irure et exercitatio', 'Eiusmod a facere exp', 'Veritatis error quas', '2007-09-06 21:02:00', NULL),
(8, 1, 1, NULL, 900.0000, 'credit', 'reconciliation', NULL, NULL, NULL, NULL, NULL, '2023-11-01 16:23:31', '2023-11-01 17:12:14', NULL, NULL, NULL, '1982-01-24 18:28:00', '2023-11-01 17:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `addition_deductions`
--

CREATE TABLE `addition_deductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(125) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_id` bigint(20) DEFAULT NULL,
  `is_taxable` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addition_deductions`
--

INSERT INTO `addition_deductions` (`id`, `quotation_id`, `type`, `title`, `amount`, `created_at`, `updated_at`, `item_id`, `is_taxable`) VALUES
(59, 14, 'addition', 'goods', 20.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 52, NULL),
(60, 14, 'addition', 'goods and services', 40.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 52, NULL),
(61, 14, 'deduction', 'services', 50.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 52, NULL),
(62, 14, 'addition', 'goods', 40.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 53, NULL),
(63, 14, 'addition', 'goods and services', 10.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 53, NULL),
(64, 14, 'deduction', 'services', 10.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 53, NULL),
(65, 14, 'addition', 'goods', 10.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 54, NULL),
(66, 14, 'addition', 'goods and services', 4.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 54, NULL),
(67, 14, 'deduction', 'services', 6.00, '2023-09-11 14:22:19', '2023-09-11 14:22:19', 54, NULL),
(82, 16, 'addition', 'services', 56.00, '2023-09-11 18:12:49', '2023-09-11 18:12:49', 60, NULL),
(83, 16, 'addition', 'goods and services', 46.00, '2023-09-11 18:12:49', '2023-09-11 18:12:49', 60, NULL),
(84, 16, 'deduction', 'services', 56.00, '2023-09-11 18:12:49', '2023-09-11 18:12:49', 60, NULL),
(85, 16, 'addition', 'services', 46.00, '2023-09-11 18:12:49', '2023-09-11 18:12:49', 61, NULL),
(86, 16, 'addition', 'goods and services', 45.00, '2023-09-11 18:12:49', '2023-09-11 18:12:49', 61, NULL),
(87, 16, 'deduction', 'services', 0.00, '2023-09-11 18:12:49', '2023-09-11 18:12:49', 61, NULL),
(91, 18, 'addition', 'services', 70.00, '2023-09-13 17:35:38', '2023-09-13 17:35:38', 64, NULL),
(92, 18, 'deduction', 'deduction', 53.00, '2023-09-13 17:35:38', '2023-09-13 17:35:38', 64, NULL),
(93, 19, 'addition', 'goods', 70.00, '2023-09-17 17:58:53', '2023-09-17 17:58:53', 65, NULL),
(94, 19, 'deduction', 'deduction', 40.00, '2023-09-17 17:58:53', '2023-09-17 17:58:53', 65, NULL),
(95, 20, 'addition', 'goods', 80.00, '2023-09-17 18:28:13', '2023-09-17 18:28:13', 66, NULL),
(96, 20, 'deduction', 'deduction', 40.00, '2023-09-17 18:28:13', '2023-09-17 18:28:13', 66, NULL),
(97, 20, 'addition', 'goods', 30.00, '2023-09-17 18:28:13', '2023-09-17 18:28:13', 67, NULL),
(98, 20, 'deduction', 'deduction', 23.00, '2023-09-17 18:28:13', '2023-09-17 18:28:13', 67, NULL),
(99, 1, 'addition', 'goods', 56.00, '2023-11-04 16:54:18', '2023-11-04 16:54:18', 1, NULL),
(100, 1, 'deduction', 'fsadfdsaf', 54.00, '2023-11-04 16:54:18', '2023-11-04 16:54:18', 1, NULL),
(101, 2, 'addition', 'goods', 50.00, '2023-11-10 16:41:30', '2023-11-10 16:41:30', 2, NULL),
(102, 2, 'deduction', 'discount', 54.00, '2023-11-10 16:41:30', '2023-11-10 16:41:30', 2, NULL),
(103, 2, 'addition', 'goods', 40.00, '2023-11-10 16:41:30', '2023-11-10 16:41:30', 3, NULL),
(104, 2, 'deduction', 'discount', 32.00, '2023-11-10 16:41:30', '2023-11-10 16:41:30', 3, NULL),
(114, 4, 'addition', 'goods', 100.00, '2023-11-11 13:57:48', '2023-11-11 13:57:48', 9, NULL),
(115, 4, 'deduction', 'services', 10.00, '2023-11-11 13:57:48', '2023-11-11 13:57:48', 9, NULL),
(116, 4, 'addition', 'goods', 5.00, '2023-11-11 13:57:48', '2023-11-11 13:57:48', 10, NULL),
(117, 4, 'deduction', 'services', 5.00, '2023-11-11 13:57:48', '2023-11-11 13:57:48', 10, NULL),
(118, 5, 'addition', 'fasfd', 4.00, '2023-11-11 14:21:30', '2023-11-11 14:21:30', 11, NULL),
(119, 5, 'deduction', 'fasxd', 1.00, '2023-11-11 14:21:30', '2023-11-11 14:21:30', 11, NULL),
(120, 5, 'addition', 'fasfd', 5.00, '2023-11-11 14:21:30', '2023-11-11 14:21:30', 12, NULL),
(121, 5, 'deduction', 'fasxd', 2.00, '2023-11-11 14:21:30', '2023-11-11 14:21:30', 12, NULL),
(122, 6, 'addition', 'tt', 100.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 13, NULL),
(123, 6, 'addition', 'ss', 150.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 13, NULL),
(124, 6, 'deduction', 'discount', 100.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 13, NULL),
(125, 6, 'addition', 'tt', 150.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 14, NULL),
(126, 6, 'addition', 'ss', 250.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 14, NULL),
(127, 6, 'deduction', 'discount', 50.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 14, NULL),
(128, 6, 'addition', 'tt', 250.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 15, NULL),
(129, 6, 'addition', 'ss', 400.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 15, NULL),
(130, 6, 'deduction', 'discount', 150.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 15, NULL),
(131, 7, 'addition', 'tt', 100.00, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 16, NULL),
(132, 7, 'deduction', 'discount', 150.00, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 16, NULL),
(133, 7, 'addition', 'tt', 150.00, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 17, NULL),
(134, 7, 'deduction', 'discount', 100.00, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 17, NULL),
(135, 7, 'addition', 'tt', 250.00, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 18, NULL),
(136, 7, 'deduction', 'discount', 150.00, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 18, NULL),
(137, 10, 'addition', 'type1', 10.00, '2023-11-12 16:30:45', '2023-11-12 16:30:45', 19, 1),
(138, 10, 'deduction', 'fagsg', 20.00, '2023-11-12 16:30:45', '2023-11-12 16:30:45', 19, 0),
(139, 10, 'addition', 'type1', 20.00, '2023-11-12 16:30:45', '2023-11-12 16:30:45', 20, 1),
(140, 10, 'deduction', 'fagsg', 15.00, '2023-11-12 16:30:45', '2023-11-12 16:30:45', 20, 0),
(145, 11, 'addition', 'td', 50.00, '2023-11-12 18:10:03', '2023-11-12 18:10:03', 23, 0),
(146, 11, 'deduction', 'gfdsa', 42.00, '2023-11-12 18:10:03', '2023-11-12 18:10:03', 23, 1),
(147, 11, 'addition', 'td', 10.00, '2023-11-12 18:10:03', '2023-11-12 18:10:03', 24, 0),
(148, 11, 'deduction', 'gfdsa', 43.00, '2023-11-12 18:10:03', '2023-11-12 18:10:03', 24, 1),
(157, 12, 'addition', 'ttt', 15.00, '2023-11-12 18:26:16', '2023-11-12 18:26:16', 29, 1),
(158, 12, 'deduction', 'deduction', 53.00, '2023-11-12 18:26:16', '2023-11-12 18:26:16', 29, 1),
(159, 12, 'addition', 'ttt', 20.00, '2023-11-12 18:26:16', '2023-11-12 18:26:16', 30, 1),
(160, 12, 'deduction', 'deduction', 50.00, '2023-11-12 18:26:16', '2023-11-12 18:26:16', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `name` text,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `name`, `country`, `state`, `city`, `street`, `zip`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'na', 'Bahrain', 'Capital Governorate', 'Manama', 'test', '123', 1, 1, 1, '2022-11-26 02:02:33', '2022-11-26 02:02:33'),
(2, 'na', 'Bahrain', 'Capital Governorate', 'Manama', 'test', '123', 1, 1, 1, '2022-11-26 02:07:42', '2022-11-26 02:07:42'),
(3, 'na', 'Bahrain', 'Capital Governorate', 'Manama', 'test', '123', 1, 1, 1, '2022-11-26 02:50:07', '2022-11-26 02:50:07'),
(4, 'na', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-26 02:50:07', '2022-11-26 02:50:07'),
(5, 'rrrfasad', 'United States', 'Delaware', 'Bear', 'na', '1234', 1, 1, 1, '2022-11-26 03:01:43', '2022-11-26 03:01:43'),
(6, 'na', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-26 03:01:43', '2022-11-26 03:01:43'),
(7, 'Lon', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-26 14:39:30', '2022-11-26 14:39:30'),
(8, 'Lon', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-26 14:41:15', '2022-11-26 14:41:15'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-27 08:21:28', '2022-11-27 08:21:28'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-27 08:21:28', '2022-11-27 08:21:28'),
(11, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-12-11 00:46:52', '2022-12-11 00:46:52'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-12-11 00:46:52', '2022-12-11 00:46:52'),
(13, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-12-11 00:46:58', '2022-12-11 00:46:58'),
(14, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-12-11 04:53:03', '2022-12-11 04:53:03'),
(15, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2022-12-17 11:16:59', '2022-12-17 11:16:59'),
(16, 'Flat# 4/102, Eastern Palace,', 'India', 'Maharashtra', 'Agar Panchaitan', 'Flat# 4/102, Eastern Palace,', '1230', 1, 1, 1, '2023-01-21 16:41:35', '2023-01-21 16:41:35'),
(17, 'Na', 'United States', 'Nebraska', 'Alliance', 'na', '12343', 1, 1, 1, '2023-03-02 00:25:31', '2023-03-02 00:25:31'),
(18, 'na', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-03-02 00:25:31', '2023-03-02 00:25:31'),
(19, 'Dhaka, Bangladesh', 'United States', 'Alaska', 'Badger', 'Moghbazar wireless', '1209', 1, 1, 1, '2023-03-04 12:26:35', '2023-03-04 12:26:35'),
(20, 'na', 'United States', 'Texas', 'Addison', 'na', '23', 1, 1, 1, '2023-03-10 23:24:37', '2023-03-10 23:24:37'),
(21, 'na', 'Canada', 'New Brunswick', 'Campbellton', 'na', '34', 1, 1, 1, '2023-03-16 22:28:25', '2023-03-16 22:28:25'),
(22, 'test', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-03-16 22:28:25', '2023-03-16 22:28:25'),
(23, 'Ut nemo dolorum et s', NULL, NULL, NULL, 'In autem quis evenie', '59581', 1, 1, 1, '2023-03-16 23:49:04', '2023-03-16 23:49:04'),
(24, 'Nobis corporis quis', 'Tanzania', 'Simiyu', 'Kisesa', 'Quia reprehenderit d', '48526', 1, 1, 1, '2023-03-17 10:42:37', '2023-03-17 10:42:37'),
(25, '72 Helena monjil', 'The Bahamas', 'Inagua', 'Matthew Town', 'Moghbazar wireless, Dhaka', '2340', 1, 1, 1, '2023-03-17 10:45:31', '2023-03-17 10:45:31'),
(26, '72 Helena monjil', 'The Bahamas', 'Inagua', 'Matthew Town', 'Moghbazar wireless, Dhaka', '2340', 1, 1, 1, '2023-03-17 10:47:02', '2023-03-17 10:47:02'),
(27, '72 Helena monjil', 'The Bahamas', 'Inagua', 'Matthew Town', 'Moghbazar wireless, Dhaka', '2340', 1, 1, 1, '2023-03-17 10:47:29', '2023-03-17 10:47:29'),
(28, '72 Helena monjil', 'The Bahamas', 'Inagua', 'Matthew Town', 'Moghbazar wireless, Dhaka', '2340', 1, 1, 1, '2023-03-17 10:52:17', '2023-03-17 10:52:17'),
(29, '72 Helena monjil', 'The Bahamas', 'Inagua', 'Matthew Town', 'Moghbazar wireless, Dhaka', '2340', 1, 1, 1, '2023-03-17 10:52:57', '2023-03-17 10:52:57'),
(30, '72 Helena monjil', 'The Bahamas', 'Inagua', 'Matthew Town', 'Moghbazar wireless, Dhaka', '2340', 1, 1, 1, '2023-03-17 10:53:29', '2023-03-17 10:53:29'),
(31, '72 helena monjil', 'United States', 'Kansas', 'Auburn', 'Moghbazar wireless, Dhaka', '1240', 1, 1, 1, '2023-03-17 10:55:49', '2023-03-17 10:55:49'),
(32, '72 helena monjil', 'Austria', 'Styria', 'Apfelberg', 'Moghbazar wireless, Dhaka', '1206', 1, 1, 1, '2023-03-17 11:01:12', '2023-03-17 11:01:12'),
(33, '72 Helena Monjil', 'Armenia', 'Ararat Province', 'Aralez', 'Moghbazar wireless, Dhaka', '1205', 1, 1, 1, '2023-03-17 11:09:29', '2023-03-17 11:09:29'),
(34, '72 Helena Monjil', 'Australia', 'Tasmania', 'Burnie', 'Moghbazar wireless, Dhaka', '1205', 1, 1, 1, '2023-03-17 11:27:39', '2023-03-17 11:27:39'),
(35, '72 Helena Monjil', 'Armenia', 'Ararat Province', 'Bardzrashen', 'Moghbazar wireless, Dhaka', '1205', 1, 1, 1, '2023-03-17 11:30:09', '2023-03-17 11:30:09'),
(36, 'Deleniti eum ipsum', NULL, NULL, NULL, NULL, '41490', 1, 1, 1, '2023-03-22 21:10:02', '2023-03-22 21:10:02'),
(37, 'Sit enim itaque pers', NULL, NULL, NULL, NULL, '66793', 1, 1, 1, '2023-03-22 21:11:14', '2023-03-22 21:11:14'),
(38, 'Duis dicta sed recus', NULL, NULL, NULL, NULL, '38636', 1, 1, 1, '2023-03-22 21:12:08', '2023-03-22 21:12:08'),
(39, 'Dolor doloribus exer', NULL, NULL, NULL, NULL, '57901', 1, 1, 1, '2023-03-22 21:12:08', '2023-03-22 21:12:08'),
(40, 'Ducimus nisi labore', NULL, NULL, NULL, NULL, '50154', 1, 1, 1, '2023-03-22 21:13:16', '2023-03-22 21:13:16'),
(41, 'Aut dicta enim numqu', NULL, NULL, NULL, NULL, '95450', 1, 1, 1, '2023-03-22 21:13:16', '2023-03-22 21:13:16'),
(42, 'Velit ea itaque moll', NULL, NULL, NULL, NULL, '87536', 1, 1, 1, '2023-03-22 21:17:38', '2023-03-22 21:17:38'),
(43, 'Soluta vitae neque e', NULL, NULL, NULL, NULL, '94922', 1, 1, 1, '2023-03-22 21:17:38', '2023-03-22 21:17:38'),
(44, 'Ipsa aspernatur ill', NULL, NULL, NULL, NULL, '26342', 1, 1, 1, '2023-03-22 21:17:57', '2023-03-22 21:17:57'),
(45, 'Maiores ea officia t', NULL, NULL, NULL, NULL, '63429', 1, 1, 1, '2023-03-22 21:17:58', '2023-03-22 21:17:58'),
(46, 'Sit necessitatibus', NULL, NULL, NULL, NULL, '62327', 1, 1, 1, '2023-03-22 21:19:29', '2023-03-22 21:19:29'),
(47, 'Sequi nulla impedit', NULL, NULL, NULL, NULL, '62155', 1, 1, 1, '2023-03-22 21:19:29', '2023-03-22 21:19:29'),
(48, 'Minus non sed numqua', NULL, NULL, NULL, NULL, '52971', 1, 1, 1, '2023-03-22 21:19:29', '2023-03-22 21:19:29'),
(49, 'Repudiandae quam cup', NULL, NULL, NULL, NULL, '71236', 1, 1, 1, '2023-03-22 21:22:00', '2023-03-22 21:22:00'),
(50, 'Dicta officiis fugia', NULL, NULL, NULL, NULL, '93448', 1, 1, 1, '2023-03-22 21:22:00', '2023-03-22 21:22:00'),
(51, 'Molestias incidunt', NULL, NULL, NULL, NULL, '39082', 1, 1, 1, '2023-03-22 21:22:00', '2023-03-22 21:22:00'),
(52, 'Amet qui numquam vo', NULL, NULL, NULL, NULL, '79340', 1, 1, 1, '2023-03-22 21:23:18', '2023-03-22 21:23:18'),
(53, 'Incididunt consequat', NULL, NULL, NULL, NULL, '12283', 1, 1, 1, '2023-03-22 21:23:18', '2023-03-22 21:23:18'),
(54, 'Officia vel et quae', NULL, NULL, NULL, NULL, '84109', 1, 1, 1, '2023-03-22 21:23:18', '2023-03-22 21:23:18'),
(55, 'Natus dolor duis qua', NULL, NULL, NULL, NULL, '65304', 1, 1, 1, '2023-03-22 21:24:34', '2023-03-22 21:24:34'),
(56, 'Qui quis eiusmod odi', NULL, NULL, NULL, NULL, '77298', 1, 1, 1, '2023-03-22 21:24:34', '2023-03-22 21:24:34'),
(57, 'Dolorem illo dolor n', NULL, NULL, NULL, NULL, '40876', 1, 1, 1, '2023-03-22 21:24:34', '2023-03-22 21:24:34'),
(58, 'Impedit maxime volu', NULL, NULL, NULL, NULL, '96745', 1, 1, 1, '2023-03-22 21:25:10', '2023-03-22 21:25:10'),
(59, 'Fuga Veniam neque', NULL, NULL, NULL, NULL, '89068', 1, 1, 1, '2023-03-22 21:25:10', '2023-03-22 21:25:10'),
(60, 'Ea aut qui minus id', NULL, NULL, NULL, NULL, '41420', 1, 1, 1, '2023-03-22 21:25:10', '2023-03-22 21:25:10'),
(61, 'Nisi et inventore qu', 'Bangladesh', NULL, NULL, NULL, '91477', 1, 1, 1, '2023-03-22 21:25:10', '2023-03-22 21:25:10'),
(62, 'Cumque eiusmod quas', NULL, NULL, NULL, NULL, '62805', 1, 1, 1, '2023-03-22 21:25:48', '2023-03-22 21:25:48'),
(63, 'Sit mollitia iusto', NULL, NULL, NULL, NULL, '93302', 1, 1, 1, '2023-03-22 21:25:48', '2023-03-22 21:25:48'),
(64, 'Quia sed eu laborum', NULL, NULL, NULL, NULL, '84625', 1, 1, 1, '2023-03-22 21:25:48', '2023-03-22 21:25:48'),
(65, 'Sed nostrum est fugi', NULL, NULL, NULL, NULL, '55489', 1, 1, 1, '2023-03-22 21:25:48', '2023-03-22 21:25:48'),
(66, 'Velit et id ex quas', 'Burundi', 'Kirundo Province', 'Kirundo', NULL, '22370', 1, 1, 1, '2023-03-22 22:00:10', '2023-03-22 22:00:10'),
(67, 'Omnis omnis laborios', 'Argentina', 'Jujuy', 'Ingenio La Esperanza', NULL, '45607', 1, 1, 1, '2023-03-22 22:00:10', '2023-03-22 22:00:10'),
(68, 'Similique ut eos et', 'Bulgaria', 'Kardzhali Province', 'Obshtina Kardzhali', NULL, '32507', 1, 1, 1, '2023-03-22 22:00:10', '2023-03-22 22:00:10'),
(69, 'Reprehenderit ut omn', 'Andorra', 'Ordino', 'Ordino', NULL, '57258', 1, 1, 1, '2023-03-22 22:00:10', '2023-03-22 22:00:10'),
(70, 'Quo dolor incidunt', NULL, NULL, NULL, NULL, '49295', 1, 1, 1, '2023-03-22 22:51:44', '2023-03-22 22:51:44'),
(71, 'In ex assumenda qui', NULL, NULL, NULL, NULL, '85082', 1, 1, 1, '2023-03-22 22:51:44', '2023-03-22 22:51:44'),
(72, 'Suscipit iste rerum', NULL, NULL, NULL, NULL, '25616', 1, 1, 1, '2023-03-22 22:51:44', '2023-03-22 22:51:44'),
(73, 'Laboriosam rerum et', 'Cambodia', NULL, NULL, NULL, '58191', 1, 1, 1, '2023-03-22 22:51:44', '2023-03-22 22:51:44'),
(74, 'Itaque odit et perfe', NULL, NULL, NULL, NULL, '15113', 1, 1, 1, '2023-03-22 22:54:36', '2023-03-22 22:54:36'),
(75, 'Vero quasi voluptate', NULL, NULL, NULL, NULL, '38590', 1, 1, 1, '2023-03-22 22:54:36', '2023-03-22 22:54:36'),
(76, 'Exercitation sint a', NULL, NULL, NULL, NULL, '86109', 1, 1, 1, '2023-03-22 22:54:36', '2023-03-22 22:54:36'),
(77, 'Ea doloremque blandi', 'Swaziland', NULL, NULL, NULL, '49510', 1, 1, 1, '2023-03-22 22:54:36', '2023-03-22 22:54:36'),
(78, 'Laboris quo dolor in', NULL, NULL, NULL, NULL, '19369', 1, 1, 1, '2023-03-22 22:55:52', '2023-03-22 22:55:52'),
(79, 'Autem debitis quos e', NULL, NULL, NULL, NULL, '63059', 1, 1, 1, '2023-03-22 22:55:52', '2023-03-22 22:55:52'),
(80, 'Tempor ratione itaqu', NULL, NULL, NULL, NULL, '23120', 1, 1, 1, '2023-03-22 22:55:52', '2023-03-22 22:55:52'),
(81, 'Aute et anim enim vo', 'Spain', NULL, NULL, NULL, '84735', 1, 1, 1, '2023-03-22 22:55:52', '2023-03-22 22:55:52'),
(82, 'Eu facilis eius inci', NULL, NULL, NULL, NULL, '35213', 1, 1, 1, '2023-03-23 18:29:21', '2023-03-23 18:29:21'),
(83, 'Non optio ea esse r', NULL, NULL, NULL, NULL, '44938', 1, 1, 1, '2023-03-23 18:29:21', '2023-03-23 18:29:21'),
(84, 'Voluptatum occaecat', NULL, NULL, NULL, NULL, '56568', 1, 1, 1, '2023-03-23 18:29:21', '2023-03-23 18:29:21'),
(85, 'Duis consequat Face', 'Norfolk Island', NULL, NULL, NULL, '36380', 1, 1, 1, '2023-03-23 18:29:21', '2023-03-23 18:29:21'),
(86, 'Eu facilis eius inci', NULL, NULL, NULL, NULL, '35213', 1, 1, 1, '2023-03-23 18:31:04', '2023-03-23 18:31:04'),
(87, 'Non optio ea esse r', NULL, NULL, NULL, NULL, '44938', 1, 1, 1, '2023-03-23 18:31:04', '2023-03-23 18:31:04'),
(88, 'Voluptatum occaecat', NULL, NULL, NULL, NULL, '56568', 1, 1, 1, '2023-03-23 18:31:04', '2023-03-23 18:31:04'),
(89, 'Duis consequat Face', NULL, NULL, NULL, NULL, '36380', 1, 1, 1, '2023-03-23 18:31:04', '2023-03-23 18:31:04'),
(90, 'Ducimus ex sint est', 'Austria', 'Vorarlberg', 'Bezau', NULL, '59313', 1, 1, 1, '2023-03-24 22:18:06', '2023-03-24 22:18:06'),
(91, 'Voluptates laborum a', 'Dominica', 'Saint Joseph Parish', 'Salisbury', NULL, '56636', 1, 1, 1, '2023-03-24 22:18:06', '2023-03-24 22:18:06'),
(92, 'Sint ipsam sit labo', 'Armenia', 'Shirak Region', 'Dzit’hank’ov', NULL, '14087', 1, 1, 1, '2023-03-24 22:18:06', '2023-03-24 22:18:06'),
(93, 'Repellendus Sit si', NULL, NULL, NULL, NULL, '98423', 1, 1, 1, '2023-03-24 22:18:06', '2023-03-24 22:38:22'),
(94, 'Quod culpa voluptat', 'Kenya', 'Kwale', 'Kwale', NULL, '62844', 1, 1, 1, '2023-03-24 22:52:47', '2023-03-24 22:52:47'),
(95, 'A quis veritatis occ', 'Bangladesh', 'Rajshahi District', 'Naogaon', NULL, '66860', 1, 1, 1, '2023-03-24 22:52:47', '2023-03-24 22:52:47'),
(96, 'Doloribus neque qui', 'Guatemala', 'Totonicapán Department', 'San Bartolo', NULL, '10489', 1, 1, 1, '2023-03-24 22:52:47', '2023-03-24 22:52:47'),
(97, 'Sunt amet pariatur', NULL, NULL, NULL, NULL, '98258', 1, 1, 1, '2023-03-24 22:52:47', '2023-03-24 22:54:45'),
(98, 'Rem culpa quisquam n', NULL, NULL, NULL, NULL, '65422', 1, 1, 1, '2023-04-04 21:04:40', '2023-04-04 21:04:40'),
(99, 'Consectetur volupta', NULL, NULL, NULL, NULL, '69746', 1, 1, 1, '2023-04-04 21:04:40', '2023-04-04 21:04:40'),
(100, 'Nihil cupiditate sol', NULL, NULL, NULL, NULL, '58281', 1, 1, 1, '2023-04-04 21:04:40', '2023-04-04 21:04:40'),
(101, 'Sapiente dolor sit c', 'Austria', NULL, NULL, NULL, '17219', 1, 1, 1, '2023-04-04 21:04:40', '2023-04-04 21:04:40'),
(102, 'Eum nihil fugit lab', NULL, NULL, NULL, NULL, '32291', 1, 1, 1, '2023-04-04 21:10:07', '2023-04-04 21:10:07'),
(103, 'Aut sapiente facere', NULL, NULL, NULL, NULL, '60600', 1, 1, 1, '2023-04-04 21:10:07', '2023-04-04 21:10:07'),
(104, 'Ea neque veniam a a', NULL, NULL, NULL, NULL, '37888', 1, 1, 1, '2023-04-04 21:10:08', '2023-04-04 21:10:08'),
(105, 'Autem qui quibusdam', 'Iran', NULL, NULL, NULL, '13951', 1, 1, 1, '2023-04-04 21:10:08', '2023-04-04 21:10:08'),
(106, 'Quo voluptatem offic', NULL, NULL, NULL, NULL, '59118', 1, 1, 1, '2023-04-05 22:45:08', '2023-04-05 22:45:08'),
(107, 'Id voluptate in beat', NULL, NULL, NULL, NULL, '42983', 1, 1, 1, '2023-04-05 22:45:08', '2023-04-05 22:45:08'),
(108, 'Exercitation vero vo', NULL, NULL, NULL, NULL, '57522', 1, 1, 1, '2023-04-05 22:45:08', '2023-04-05 22:45:08'),
(109, 'Molestias nihil elit', 'Swaziland', NULL, NULL, NULL, '24410', 1, 1, 1, '2023-04-05 22:45:08', '2023-04-05 22:45:08'),
(110, 'Enim repudiandae sun', NULL, NULL, NULL, NULL, '17603', 1, 1, 1, '2023-04-05 22:45:18', '2023-04-05 22:45:18'),
(111, 'Id et eveniet sed i', NULL, NULL, NULL, NULL, '10502', 1, 1, 1, '2023-04-05 22:45:18', '2023-04-05 22:45:18'),
(112, 'Consectetur molliti', NULL, NULL, NULL, NULL, '35218', 1, 1, 1, '2023-04-05 22:45:18', '2023-04-05 22:45:18'),
(113, 'Nulla esse commodo q', NULL, NULL, NULL, NULL, '31834', 1, 1, 1, '2023-04-05 22:45:18', '2023-04-05 22:45:18'),
(114, 'Deleniti deserunt cu', NULL, NULL, NULL, NULL, '25664', 1, 1, 1, '2023-04-05 22:45:41', '2023-04-05 22:45:41'),
(115, 'Aliquip laboris aliq', NULL, NULL, NULL, NULL, '60184', 1, 1, 1, '2023-04-05 22:45:41', '2023-04-05 22:45:41'),
(116, 'Aut blanditiis porro', NULL, NULL, NULL, NULL, '44330', 1, 1, 1, '2023-04-05 22:45:41', '2023-04-05 22:45:41'),
(117, 'Cupidatat consectetu', NULL, NULL, NULL, NULL, '31970', 1, 1, 1, '2023-04-05 22:45:41', '2023-04-05 22:45:41'),
(118, 'Ea ipsa nobis sit u', NULL, NULL, NULL, NULL, '32287', 1, 1, 1, '2023-04-08 23:33:47', '2023-04-08 23:33:47'),
(119, 'Sed aliquam minima a', NULL, NULL, NULL, NULL, '30436', 1, 1, 1, '2023-04-08 23:33:47', '2023-04-08 23:33:47'),
(120, 'Obcaecati commodo fu', NULL, NULL, NULL, NULL, '26876', 1, 1, 1, '2023-04-08 23:33:47', '2023-04-08 23:33:47'),
(121, 'Voluptate ea volupta', NULL, NULL, NULL, NULL, '97788', 1, 1, 1, '2023-04-08 23:33:47', '2023-04-08 23:33:47'),
(122, 'Illo accusantium odi', NULL, NULL, NULL, NULL, '51875', 1, 1, 1, '2023-04-08 23:34:15', '2023-04-08 23:34:15'),
(123, 'Optio do et dolor e', NULL, NULL, NULL, NULL, '81622', 1, 1, 1, '2023-04-08 23:34:15', '2023-04-08 23:34:15'),
(124, 'Sit pariatur Molest', NULL, NULL, NULL, NULL, '53610', 1, 1, 1, '2023-04-08 23:34:15', '2023-04-08 23:34:15'),
(125, 'Non quis quisquam be', 'Saint Lucia', NULL, NULL, NULL, '65084', 1, 1, 1, '2023-04-08 23:34:15', '2023-04-08 23:34:15'),
(126, 'Reprehenderit except', NULL, NULL, NULL, NULL, '79100', 1, 1, 1, '2023-04-10 23:39:29', '2023-04-10 23:39:29'),
(127, 'Perferendis ut paria', NULL, NULL, NULL, NULL, '70750', 1, 1, 1, '2023-04-10 23:39:29', '2023-04-10 23:39:29'),
(128, 'Aut aliquam eum qui', NULL, NULL, NULL, NULL, '42983', 1, 1, 1, '2023-04-10 23:39:29', '2023-04-10 23:39:29'),
(129, 'Corrupti expedita n', NULL, NULL, NULL, NULL, '31645', 1, 1, 1, '2023-04-10 23:39:29', '2023-04-10 23:39:29'),
(130, 'Minus ex beatae odio', NULL, NULL, NULL, NULL, '25210', 1, 1, 1, '2023-04-10 23:41:00', '2023-04-10 23:41:00'),
(131, 'Aut sed omnis eius o', NULL, NULL, NULL, NULL, '66556', 1, 1, 1, '2023-04-10 23:41:00', '2023-04-10 23:41:00'),
(132, 'Ut et adipisicing re', NULL, NULL, NULL, NULL, '37181', 1, 1, 1, '2023-04-10 23:41:00', '2023-04-10 23:41:00'),
(133, 'Totam est vel rerum', NULL, NULL, NULL, NULL, '38143', 1, 1, 1, '2023-04-10 23:41:00', '2023-04-10 23:41:00'),
(134, 'Labore dignissimos v', NULL, NULL, NULL, NULL, '67518', 1, 1, 1, '2023-04-10 23:41:50', '2023-04-10 23:41:50'),
(135, 'Est sint accusanti', NULL, NULL, NULL, NULL, '19502', 1, 1, 1, '2023-04-10 23:41:50', '2023-04-10 23:41:50'),
(136, 'Qui quia illum inve', NULL, NULL, NULL, NULL, '31397', 1, 1, 1, '2023-04-10 23:41:50', '2023-04-10 23:41:50'),
(137, 'Inventore et quod ni', NULL, NULL, NULL, NULL, '82793', 1, 1, 1, '2023-04-10 23:41:50', '2023-04-10 23:41:50'),
(138, 'Anim minus maxime in', NULL, NULL, NULL, NULL, '63786', 1, 1, 1, '2023-04-10 23:44:45', '2023-04-10 23:44:45'),
(139, 'Exercitation blandit', NULL, NULL, NULL, NULL, '59870', 1, 1, 1, '2023-04-10 23:44:45', '2023-04-10 23:44:45'),
(140, 'Dolor consequuntur l', NULL, NULL, NULL, NULL, '57359', 1, 1, 1, '2023-04-10 23:44:45', '2023-04-10 23:44:45'),
(141, 'Qui est do minima a', NULL, NULL, NULL, NULL, '53148', 1, 1, 1, '2023-04-10 23:44:45', '2023-04-10 23:44:45'),
(142, 'Sapiente quod volupt', NULL, NULL, NULL, NULL, '42382', 1, 1, 1, '2023-04-10 23:46:12', '2023-04-10 23:46:12'),
(143, 'Perferendis delectus', NULL, NULL, NULL, NULL, '54888', 1, 1, 1, '2023-04-10 23:46:12', '2023-04-10 23:46:12'),
(144, 'Dolor sed quidem cor', NULL, NULL, NULL, NULL, '22367', 1, 1, 1, '2023-04-10 23:46:12', '2023-04-10 23:46:12'),
(145, 'Dolorem nulla eos vo', NULL, NULL, NULL, NULL, '61893', 1, 1, 1, '2023-04-10 23:46:12', '2023-04-10 23:46:12'),
(146, 'Sed ex dolores magni', NULL, NULL, NULL, NULL, '64898', 1, 1, 1, '2023-04-10 23:48:20', '2023-04-10 23:48:20'),
(147, 'Quis veniam digniss', NULL, NULL, NULL, NULL, '30650', 1, 1, 1, '2023-04-10 23:48:20', '2023-04-10 23:48:20'),
(148, 'Libero fugit magni', NULL, NULL, NULL, NULL, '72965', 1, 1, 1, '2023-04-10 23:48:20', '2023-04-10 23:48:20'),
(149, 'Et similique laborum', NULL, NULL, NULL, NULL, '14699', 1, 1, 1, '2023-04-10 23:48:20', '2023-04-10 23:48:20'),
(150, 'Consectetur blanditi', NULL, NULL, NULL, NULL, '84498', 1, 1, 1, '2023-04-10 23:52:29', '2023-04-10 23:52:29'),
(151, 'Eiusmod incidunt si', NULL, NULL, NULL, NULL, '12764', 1, 1, 1, '2023-04-10 23:52:29', '2023-04-10 23:52:29'),
(152, 'Qui officia laborum', NULL, NULL, NULL, NULL, '39572', 1, 1, 1, '2023-04-10 23:52:29', '2023-04-10 23:52:29'),
(153, 'Mollit culpa labori', NULL, NULL, NULL, NULL, '50117', 1, 1, 1, '2023-04-10 23:52:29', '2023-04-10 23:52:29'),
(154, 'Eum ut velit incidun', NULL, NULL, NULL, NULL, '17322', 1, 1, 1, '2023-04-12 20:52:20', '2023-04-12 20:52:20'),
(155, 'In libero officiis c', NULL, NULL, NULL, NULL, '22979', 1, 1, 1, '2023-04-12 20:52:20', '2023-04-12 20:52:20'),
(156, 'Eos consequatur cup', NULL, NULL, NULL, NULL, '20077', 1, 1, 1, '2023-04-12 20:52:20', '2023-04-12 20:52:20'),
(157, 'Assumenda cillum rep', 'Israel', NULL, NULL, NULL, '33692', 1, 1, 1, '2023-04-12 20:52:20', '2023-04-12 20:52:20'),
(158, 'Quis facilis dolor a', NULL, NULL, NULL, NULL, '79162', 1, 1, 1, '2023-04-12 23:27:28', '2023-04-12 23:27:28'),
(159, 'Quia error nobis sim', NULL, NULL, NULL, NULL, '62853', 1, 1, 1, '2023-04-12 23:27:28', '2023-04-12 23:27:28'),
(160, 'Nulla laborum Saepe', NULL, NULL, NULL, NULL, '15298', 1, 1, 1, '2023-04-12 23:27:28', '2023-04-12 23:27:28'),
(161, 'Nam quasi ex ut qui', NULL, NULL, NULL, NULL, '93332', 1, 1, 1, '2023-04-12 23:27:28', '2023-04-12 23:27:28'),
(162, 'Aspernatur accusanti', NULL, NULL, NULL, NULL, '48299', 1, 1, 1, '2023-04-12 23:27:39', '2023-04-12 23:27:39'),
(163, 'Omnis error nulla od', NULL, NULL, NULL, NULL, '32699', 1, 1, 1, '2023-04-12 23:27:39', '2023-04-12 23:27:39'),
(164, 'Consequatur Quam ma', NULL, NULL, NULL, NULL, '80687', 1, 1, 1, '2023-04-12 23:27:39', '2023-04-12 23:27:39'),
(165, 'Ea fugiat qui iure a', NULL, NULL, NULL, NULL, '20542', 1, 1, 1, '2023-04-12 23:27:39', '2023-04-12 23:27:39'),
(166, 'Recusandae Architec', NULL, NULL, NULL, NULL, '53258', 1, 1, 1, '2023-04-12 23:27:51', '2023-04-12 23:27:51'),
(167, 'Cumque eos dolorum r', NULL, NULL, NULL, NULL, '62772', 1, 1, 1, '2023-04-12 23:27:51', '2023-04-12 23:27:51'),
(168, 'Sed provident disti', NULL, NULL, NULL, NULL, '28205', 1, 1, 1, '2023-04-12 23:27:51', '2023-04-12 23:27:51'),
(169, 'Eum nesciunt dignis', NULL, NULL, NULL, NULL, '58345', 1, 1, 1, '2023-04-12 23:27:51', '2023-04-12 23:27:51'),
(170, 'Illo natus veritatis', NULL, NULL, NULL, NULL, '30178', 1, 1, 1, '2023-04-12 23:28:06', '2023-04-12 23:28:06'),
(171, 'Laboris itaque quas', NULL, NULL, NULL, NULL, '69453', 1, 1, 1, '2023-04-12 23:28:06', '2023-04-12 23:28:06'),
(172, 'Iste officia itaque', NULL, NULL, NULL, NULL, '60387', 1, 1, 1, '2023-04-12 23:28:06', '2023-04-12 23:28:06'),
(173, 'Maxime earum adipisi', NULL, NULL, NULL, NULL, '59764', 1, 1, 1, '2023-04-12 23:28:06', '2023-04-12 23:28:06'),
(174, 'Aut ullamco ipsam ul', NULL, NULL, NULL, NULL, '81955', 1, 1, 1, '2023-04-12 23:28:19', '2023-04-12 23:28:19'),
(175, 'Et ea fugiat provide', NULL, NULL, NULL, NULL, '83519', 1, 1, 1, '2023-04-12 23:28:19', '2023-04-12 23:28:19'),
(176, 'Nemo est cum laborum', NULL, NULL, NULL, NULL, '63908', 1, 1, 1, '2023-04-12 23:28:19', '2023-04-12 23:28:19'),
(177, 'Autem ipsa deserunt', NULL, NULL, NULL, NULL, '22190', 1, 1, 1, '2023-04-12 23:28:19', '2023-04-12 23:28:19'),
(178, 'Deleniti eum porro v', NULL, NULL, NULL, NULL, '54396', 1, 1, 1, '2023-04-12 23:28:32', '2023-04-12 23:28:32'),
(179, 'Consequatur ut amet', NULL, NULL, NULL, NULL, '83167', 1, 1, 1, '2023-04-12 23:28:32', '2023-04-12 23:28:32'),
(180, 'Consequatur non lib', NULL, NULL, NULL, NULL, '78562', 1, 1, 1, '2023-04-12 23:28:32', '2023-04-12 23:28:32'),
(181, 'Totam quo perspiciat', 'Equatorial Guinea', NULL, NULL, NULL, '95581', 1, 1, 1, '2023-04-12 23:28:32', '2023-04-12 23:28:32'),
(182, 'Dolores eos qui pro', NULL, NULL, NULL, NULL, '43892', 1, 1, 1, '2023-04-12 23:28:46', '2023-04-12 23:28:46'),
(183, 'Est quis neque repe', NULL, NULL, NULL, NULL, '19404', 1, 1, 1, '2023-04-12 23:28:46', '2023-04-12 23:28:46'),
(184, 'Molestias architecto', NULL, NULL, NULL, NULL, '95350', 1, 1, 1, '2023-04-12 23:28:46', '2023-04-12 23:28:46'),
(185, 'Hic veritatis in obc', 'Somalia', NULL, NULL, NULL, '73307', 1, 1, 1, '2023-04-12 23:28:46', '2023-04-12 23:28:46'),
(186, 'Dignissimos dicta ap', 'Australia', NULL, NULL, NULL, '62439', 1, 1, 1, '2023-04-12 23:45:25', '2023-04-12 23:45:25'),
(187, 'Quod quia incidunt', 'Gambia The', NULL, NULL, NULL, '97950', 1, 1, 1, '2023-04-12 23:46:48', '2023-04-12 23:46:48'),
(188, 'Ipsum dolore assumen', NULL, NULL, NULL, NULL, '10640', 1, 1, 1, '2023-04-12 23:47:50', '2023-04-12 23:47:50'),
(189, 'Repudiandae ut disti', NULL, NULL, NULL, NULL, '65205', 1, 1, 1, '2023-04-12 23:47:50', '2023-04-12 23:47:50'),
(190, 'Sed sed quaerat quos', NULL, NULL, NULL, NULL, '11404', 1, 1, 1, '2023-04-12 23:47:50', '2023-04-12 23:47:50'),
(191, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-04-12 23:47:50', '2023-07-10 00:48:46'),
(192, 'Magnam ullam eius pe', NULL, NULL, NULL, NULL, '67258', 1, 1, 1, '2023-04-12 23:48:06', '2023-04-12 23:48:06'),
(193, 'Consequat Omnis qui', NULL, NULL, NULL, NULL, '19209', 1, 1, 1, '2023-04-12 23:48:06', '2023-04-12 23:48:06'),
(194, 'Facilis fugiat volu', NULL, NULL, NULL, NULL, '79204', 1, 1, 1, '2023-04-12 23:48:06', '2023-04-12 23:48:06'),
(195, 'Culpa culpa est qui', 'Sao Tome and Principe', NULL, NULL, NULL, '73327', 1, 1, 1, '2023-04-12 23:48:06', '2023-04-12 23:48:06'),
(196, 'Nulla qui voluptatib', 'Albania', NULL, NULL, NULL, '85650', 1, 1, 1, '2023-04-13 00:05:09', '2023-04-13 00:05:09'),
(197, 'Aute ut aliqua Quia', 'Morocco', NULL, NULL, NULL, '44592', 1, 1, 1, '2023-04-13 00:07:09', '2023-04-13 00:07:09'),
(198, 'Nulla veniam id vo', NULL, NULL, NULL, NULL, '14183', 1, 1, 1, '2023-04-13 00:09:52', '2023-04-13 00:09:52'),
(199, 'Eu corrupti porro n', 'Brazil', NULL, NULL, NULL, '36765', 1, 1, 1, '2023-04-13 00:11:23', '2023-04-13 00:11:23'),
(200, 'Mollitia aperiam ess', NULL, NULL, NULL, NULL, '28747', 1, 1, 1, '2023-04-13 17:50:18', '2023-04-13 17:50:18'),
(201, 'Quis voluptas volupt', NULL, NULL, NULL, NULL, '29393', 1, 1, 1, '2023-04-13 17:50:18', '2023-04-13 17:50:18'),
(202, 'Praesentium rem sapi', NULL, NULL, NULL, NULL, '69375', 1, 1, 1, '2023-04-13 17:50:18', '2023-04-13 17:50:18'),
(203, 'Placeat sint dolor', NULL, NULL, NULL, NULL, '79839', 1, 1, 1, '2023-04-13 17:50:18', '2023-04-13 17:50:18'),
(204, 'Id rem qui pariatur', NULL, NULL, NULL, NULL, '93717', 1, 1, 1, '2023-04-13 17:50:29', '2023-04-13 17:50:29'),
(205, 'Provident qui nobis', NULL, NULL, NULL, NULL, '67279', 1, 1, 1, '2023-04-13 17:50:29', '2023-04-13 17:50:29'),
(206, 'Culpa quos cupiditat', NULL, NULL, NULL, NULL, '56461', 1, 1, 1, '2023-04-13 17:50:29', '2023-04-13 17:50:29'),
(207, 'Aspernatur laborum', NULL, NULL, NULL, NULL, '74565', 1, 1, 1, '2023-04-13 17:50:29', '2023-04-13 17:50:29'),
(208, 'Id dolor dolorem of', 'Georgia', NULL, NULL, NULL, '12803', 1, 1, 1, '2023-04-14 00:57:14', '2023-04-14 00:57:14'),
(209, 'Quis aut quaerat qui', 'Zambia', NULL, NULL, NULL, '40422', 1, 1, 1, '2023-04-15 15:11:08', '2023-04-15 15:11:08'),
(210, 'Dolorem voluptate es', NULL, NULL, NULL, NULL, '64137', 1, 1, 1, '2023-04-15 15:11:42', '2023-04-15 15:11:42'),
(211, 'Molestiae aliquam cu', 'Hong Kong S.A.R.', NULL, NULL, NULL, '44166', 1, 1, 1, '2023-04-15 15:16:22', '2023-04-15 15:16:22'),
(212, 'Nihil cillum minim u', 'Greece', NULL, NULL, NULL, '21353', 1, 1, 1, '2023-04-15 15:30:43', '2023-04-15 15:30:43'),
(213, 'Quos dolor eos volu', NULL, NULL, NULL, NULL, '53173', 1, 1, 1, '2023-04-15 15:45:52', '2023-04-15 17:44:39'),
(214, 'Ut omnis corporis ex', NULL, NULL, NULL, 'Molestiae nostrum ma', '68006', 1, 1, 1, '2023-05-06 23:49:24', '2023-05-06 23:49:24'),
(215, 'Temporibus ipsum ita', NULL, NULL, NULL, 'Ut ducimus autem a', '63778', 1, 1, 1, '2023-05-06 23:49:43', '2023-05-06 23:49:43'),
(216, 'Iusto ut quasi sint', NULL, NULL, NULL, 'Quis quod nobis moll', '11994', 1, 1, 1, '2023-05-06 23:49:57', '2023-05-06 23:49:57'),
(217, 'Provident temporibu', NULL, NULL, NULL, 'Commodo qui fugiat e', '96583', 1, 1, 1, '2023-05-06 23:50:05', '2023-05-06 23:50:05'),
(218, 'Voluptatem saepe lib', NULL, NULL, NULL, 'Enim rerum explicabo', '55576', 1, 1, 1, '2023-05-06 23:50:13', '2023-05-06 23:50:13'),
(219, 'Nam ratione veritati', NULL, NULL, NULL, 'Sunt libero modi ea', '29515', 1, 1, 1, '2023-05-14 18:28:23', '2023-05-14 18:28:23'),
(224, 'Possimus voluptas m', NULL, NULL, NULL, 'Error nobis tempor a', '28105', 1, 1, 1, '2023-05-14 21:21:48', '2023-05-14 21:21:48'),
(227, 'Aliquam tempor occae', NULL, NULL, NULL, 'Iusto sit quis rerum', '58288', 1, 1, 1, '2023-05-14 23:02:30', '2023-05-14 23:02:30'),
(228, 'Qui quas obcaecati q', NULL, NULL, NULL, NULL, '69693', 1, 1, 1, '2023-05-15 00:40:48', '2023-05-15 00:40:48'),
(229, 'Enim nostrum est dol', NULL, NULL, NULL, NULL, '53855', 1, 1, 1, '2023-05-15 00:40:48', '2023-05-15 00:40:48'),
(230, 'Reprehenderit recusa', NULL, NULL, NULL, NULL, '52290', 1, 1, 1, '2023-05-15 00:40:48', '2023-05-15 00:40:48'),
(231, 'Nisi ut neque aut si', NULL, NULL, NULL, NULL, '52167', 1, 1, 1, '2023-05-15 00:40:48', '2023-05-15 00:40:48'),
(236, 'Mollit facere et har', NULL, NULL, NULL, 'Quis aliquam molliti', '10272', 1, 1, 1, '2023-05-28 23:09:54', '2023-05-28 23:09:54'),
(237, 'Enim amet sed saepe', NULL, NULL, NULL, 'Sit optio consequu', '16174', 1, 1, 1, '2023-06-09 23:42:00', '2023-06-09 23:42:00'),
(238, 'Eiusmod facilis aute', NULL, NULL, NULL, 'Vel qui totam Nam ne', '79121', 1, 1, 1, '2023-06-22 21:26:08', '2023-06-22 21:26:08'),
(239, 'Amet est beatae atq', NULL, NULL, NULL, 'Aut minim quam sequi', '95473', 1, 1, 1, '2023-06-22 21:28:53', '2023-06-22 21:28:53'),
(240, 'Laboris aut nulla au', NULL, NULL, NULL, 'Id ex dolore incidun', '14686', 1, 1, 1, '2023-06-22 21:31:50', '2023-06-22 21:31:50'),
(241, 'Ea officiis obcaecat', NULL, NULL, NULL, 'Tempora id iusto mod', '24240', 1, 1, 1, '2023-06-22 21:42:04', '2023-06-22 21:42:04'),
(242, 'Dicta aut anim exerc', NULL, NULL, NULL, 'Sit aute quod autem', '44433', 1, 1, 1, '2023-06-22 23:11:34', '2023-06-22 23:11:34'),
(247, 'Quia officia modi ex', NULL, NULL, NULL, 'Enim molestiae aute', '41532', 1, 1, 1, '2023-06-26 14:51:20', '2023-06-26 14:51:20'),
(250, 'Consequuntur excepte', NULL, NULL, NULL, 'Totam cupiditate seq', '74538', 1, 1, 1, '2023-06-26 14:56:37', '2023-06-26 14:56:37'),
(251, 'Anim labore cupidita', NULL, NULL, NULL, 'Doloremque architect', '33654', 1, 1, 1, '2023-06-26 15:35:55', '2023-06-26 15:35:55'),
(252, 'Et doloremque culpa', NULL, NULL, NULL, 'Rerum neque blanditi', '17893', 1, 1, 1, '2023-06-26 15:42:49', '2023-06-26 15:42:49'),
(253, 'Reprehenderit est', NULL, NULL, NULL, 'Ea consequatur Cons', '86055', 1, 1, 1, '2023-06-26 15:44:51', '2023-06-26 15:44:51'),
(254, 'Aperiam ipsa irure', NULL, NULL, NULL, 'Exercitationem persp', '86307', 1, 1, 1, '2023-06-26 15:46:35', '2023-06-26 15:46:35'),
(261, 'Aute optio sed ut f', NULL, NULL, NULL, 'Cumque quia repudian', '42673', 1, 1, 1, '2023-06-26 15:54:39', '2023-06-26 15:54:39'),
(262, 'Non laboriosam aspe', NULL, NULL, NULL, 'Nesciunt saepe ut a', '57718', 1, 1, 1, '2023-06-26 15:57:09', '2023-06-26 15:57:09'),
(263, 'Velit nihil nemo ea', NULL, NULL, NULL, 'Non eligendi cupidat', '11183', 1, 1, 1, '2023-06-26 15:58:15', '2023-06-26 15:58:15'),
(268, 'Dicta sint laborum', NULL, NULL, NULL, 'Maxime aliqua Aut v', '79065', 1, 1, 1, '2023-06-26 16:19:16', '2023-06-26 16:19:16'),
(269, 'Corporis et incidunt', NULL, NULL, NULL, 'Proident nobis blan', '43022', 1, 1, 1, '2023-06-26 16:20:28', '2023-06-26 16:20:28'),
(270, 'Sint dolores ullam e', NULL, NULL, NULL, 'Sunt aut rerum quia', '61995', 1, 1, 1, '2023-06-26 16:22:29', '2023-06-26 16:22:29'),
(271, 'Non nostrud amet od', NULL, NULL, NULL, 'Quo nemo impedit ni', '78048', 1, 1, 1, '2023-06-26 16:23:52', '2023-06-26 16:23:52'),
(274, 'Nesciunt similique', 'The Bahamas', 'Long Island', 'Clarence Town', 'Sunt itaque rem omn', '77014', 1, 1, 1, '2023-07-05 20:09:16', '2023-07-05 20:09:16'),
(278, NULL, 'South Sudan', NULL, NULL, 'Ut aut dolor consect', '92783', 1, 1, 1, '2023-07-06 02:10:17', '2023-07-06 02:10:17'),
(279, NULL, 'Saint-Barthelemy', NULL, NULL, 'Aut enim quasi ab pe', '28544', 1, 1, 1, '2023-07-06 02:11:27', '2023-07-06 02:11:27'),
(282, 'Vitae excepturi nihi', NULL, NULL, NULL, NULL, '67585', 1, 1, 1, '2023-07-07 22:31:21', '2023-07-07 22:31:21'),
(284, 'Nostrum quae eum dol', NULL, NULL, NULL, NULL, '94110', 1, 1, 1, '2023-07-07 23:27:17', '2023-07-07 23:27:17'),
(285, 'Quod error consequat', NULL, NULL, NULL, NULL, '72280', 1, 1, 1, '2023-07-08 22:26:18', '2023-07-08 22:26:18'),
(286, 'Ratione culpa tempo', NULL, NULL, NULL, NULL, '27650', 1, 1, 1, '2023-07-08 22:33:05', '2023-07-08 22:33:05'),
(287, 'Aut asperiores nulla', NULL, NULL, NULL, NULL, '75931', 1, 1, 1, '2023-07-08 23:00:53', '2023-07-08 23:00:53'),
(288, 'Minus amet iste exp', NULL, NULL, NULL, NULL, '52816', 1, 1, 1, '2023-07-08 23:00:53', '2023-07-08 23:00:53'),
(289, 'Dolores consectetur', NULL, NULL, NULL, NULL, '84913', 1, 1, 1, '2023-07-08 23:00:53', '2023-07-08 23:00:53'),
(290, 'Nostrum vel sed volu', NULL, NULL, NULL, NULL, '92056', 1, 1, 1, '2023-07-08 23:02:04', '2023-07-08 23:02:04'),
(291, 'Dolore qui voluptate', NULL, NULL, NULL, NULL, '30555', 1, 1, 1, '2023-07-08 23:02:04', '2023-07-08 23:02:04'),
(292, 'Quam eveniet ad est', NULL, NULL, NULL, NULL, '50099', 1, 1, 1, '2023-07-08 23:02:04', '2023-07-08 23:02:04'),
(293, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-07-08 23:03:23', '2023-07-13 23:05:31'),
(294, 'Quae dignissimos duc', NULL, NULL, NULL, NULL, '49914', 1, 1, 1, '2023-07-08 23:03:23', '2023-07-08 23:03:23'),
(295, 'Fugiat amet aut ni', NULL, NULL, NULL, NULL, '68507', 1, 1, 1, '2023-07-08 23:03:23', '2023-07-08 23:03:23'),
(296, 'Lorem et adipisicing', NULL, NULL, NULL, NULL, '97639', 1, 1, 1, '2023-07-08 23:05:08', '2023-07-08 23:05:08'),
(297, 'Ut commodi consectet', NULL, NULL, NULL, NULL, '98445', 1, 1, 1, '2023-07-08 23:05:08', '2023-07-08 23:05:08'),
(298, 'Qui id ullam culpa', NULL, NULL, NULL, NULL, '59288', 1, 1, 1, '2023-07-08 23:05:08', '2023-07-08 23:05:08'),
(299, 'Enim in exercitation', 'Iraq', NULL, NULL, 'Est quod exercitatio', '74674', 1, 1, 1, '2023-07-08 23:39:38', '2023-07-08 23:39:38'),
(300, 'Voluptatem excepteu', 'Canada', NULL, NULL, 'Et delectus similiq', '77533', 1, 1, 1, '2023-07-08 23:40:12', '2023-07-08 23:40:12'),
(301, 'Mollitia sunt qui d', NULL, NULL, NULL, NULL, '76692', 1, 1, 1, '2023-07-09 19:28:41', '2023-07-09 19:28:41'),
(302, 'Omnis est consequat', NULL, NULL, NULL, NULL, '86849', 1, 1, 1, '2023-07-09 19:28:53', '2023-07-09 19:28:53'),
(306, 'Cumque quo consequat', NULL, NULL, NULL, 'Fugit nemo perspici', '86776', 1, 1, 1, '2023-07-09 20:45:56', '2023-07-09 20:45:56'),
(307, 'Ut et voluptatem qui', NULL, NULL, NULL, 'Quis accusantium id', '91325', 1, 1, 1, '2023-07-09 20:47:52', '2023-07-09 20:47:52'),
(309, 'Impedit dolores sin', NULL, NULL, NULL, 'Non aute autem cillu', '74364', 1, 1, 1, '2023-07-09 20:50:14', '2023-07-09 20:50:14'),
(310, 'Sit nisi aliquid pr', NULL, NULL, NULL, 'Sit quia nesciunt i', '81103', 1, 1, 1, '2023-07-09 20:51:44', '2023-07-09 20:51:44'),
(311, 'Ut omnis praesentium', NULL, NULL, NULL, 'Dolores voluptatum s', '62126', 1, 1, 1, '2023-07-09 21:07:16', '2023-07-09 21:07:16'),
(312, 'Temporibus ipsam est', NULL, NULL, NULL, 'Aut sint autem anim', '63252', 1, 1, 1, '2023-07-09 21:31:31', '2023-07-09 21:31:31'),
(313, 'Fugiat eos in quidem', NULL, NULL, NULL, 'Est id est voluptate', '26594', 1, 1, 1, '2023-07-09 21:51:28', '2023-07-09 21:51:28'),
(315, 'Et Nam et dolor mini', NULL, NULL, NULL, 'Laudantium quae ips', '61879', 1, 1, 1, '2023-07-09 22:20:40', '2023-07-09 22:20:40'),
(316, 'Delectus quae non q', NULL, NULL, NULL, 'Quia quos in sint mo', '99339', 1, 1, 1, '2023-07-09 22:57:10', '2023-07-09 22:57:10'),
(317, 'Illo beatae velit no', NULL, NULL, NULL, 'Neque assumenda ad d', '53879', 1, 1, 1, '2023-07-09 22:57:38', '2023-07-09 22:57:38'),
(318, 'Reprehenderit simili', NULL, NULL, NULL, 'Nemo mollitia qui ac', '54238', 1, 1, 1, '2023-07-09 23:05:56', '2023-07-09 23:05:56'),
(321, 'Impedit officia lor', NULL, NULL, NULL, 'Ipsum voluptate exer', '22554', 1, 1, 1, '2023-07-09 23:12:24', '2023-07-09 23:12:24'),
(322, 'Laboriosam deserunt', NULL, NULL, NULL, 'Esse qui nisi conse', '73060', 1, 1, 1, '2023-07-10 16:57:28', '2023-07-10 18:02:19'),
(324, 'Nirala road#4', NULL, NULL, NULL, 'Maxime exercitation', NULL, 1, 1, 1, '2023-07-10 18:06:56', '2023-07-10 18:33:46'),
(326, 'Minim dicta dolorum', 'Democratic Republic of the Congo', NULL, NULL, 'Et reprehenderit an', '72241', 1, 1, 1, '2023-07-10 21:07:25', '2023-07-10 21:07:25'),
(327, 'Consequatur Esse oc', 'French Guiana', NULL, NULL, 'Debitis nesciunt ve', '66231', 1, 1, 1, '2023-07-10 21:11:27', '2023-07-10 21:11:27'),
(328, 'Ipsa eos nisi volup', NULL, NULL, NULL, 'Nostrum doloribus su', '39002', 1, 1, 1, '2023-07-10 21:12:54', '2023-07-10 21:14:29'),
(329, 'In voluptatem est b', 'Tajikistan', NULL, NULL, 'Quia corporis nihil', '73133', 1, 1, 1, '2023-07-10 21:21:24', '2023-07-10 21:21:51'),
(330, 'Sint assumenda maior', 'Saint-Martin (French part)', NULL, NULL, 'Commodi quod in omni', '43443', 1, 1, 1, '2023-07-10 21:27:22', '2023-07-10 21:27:22'),
(331, 'Est eligendi sunt mi', NULL, NULL, NULL, 'Sint facilis dolor q', '20201', 1, 1, 1, '2023-07-10 21:31:29', '2023-07-10 21:31:37'),
(332, 'Quisquam omnis labor', 'Sierra Leone', NULL, NULL, 'Vel beatae dolor sap', '18979', 1, 1, 1, '2023-07-10 21:31:44', '2023-07-10 21:31:44'),
(333, 'Ipsum in dolore qui', 'Argentina', 'Corrientes', 'Cruz de los Milagros', 'In quidem at vel par', '61017', 1, 1, 1, '2023-07-10 21:32:03', '2023-07-10 21:32:03'),
(334, 'Sunt impedit anim q', 'Kazakhstan', NULL, NULL, 'Voluptas aute enim q', '83931', 1, 1, 1, '2023-07-10 21:33:14', '2023-07-10 21:33:14'),
(335, 'Incididunt et rem mo', 'Mozambique', NULL, NULL, 'Autem incididunt dol', '83798', 1, 1, 1, '2023-07-10 21:34:23', '2023-07-10 21:34:23'),
(336, 'Numquam fugit sit', 'Bosnia and Herzegovina', NULL, NULL, 'Nesciunt mollitia d', '46557', 1, 1, 1, '2023-07-10 21:35:25', '2023-07-10 21:35:25'),
(339, 'Nulla magni nihil de', NULL, NULL, NULL, 'Quia quis exercitati', '49923', 1, 1, 1, '2023-07-10 21:38:21', '2023-07-10 21:38:31'),
(340, 'Praesentium ea magni', NULL, NULL, NULL, NULL, '96524', 1, 1, 1, '2023-07-10 22:11:22', '2023-07-10 22:11:22'),
(342, 'Consequat Officia e', NULL, NULL, NULL, NULL, '58327', 1, 1, 1, '2023-07-10 22:23:40', '2023-07-10 22:23:40'),
(343, 'Est provident ipsu', 'Saint-Barthelemy', NULL, NULL, 'Ab eaque odit asperi', '75065', 1, 1, 1, '2023-07-11 23:55:25', '2023-07-11 23:55:25'),
(344, 'Et quo culpa totam i', NULL, NULL, NULL, NULL, '21749', 1, 1, 1, '2023-07-12 21:06:05', '2023-07-12 22:25:52'),
(345, 'Laborum Nostrud ten', NULL, NULL, NULL, 'Nam magni magna quis5', '546', 1, 1, 1, '2023-07-12 21:06:29', '2023-07-12 22:09:47'),
(346, 'Fugiat ad fugit eaq', NULL, NULL, NULL, 'Veniam aut aut dolo', '87400', 1, 1, 1, '2023-07-12 21:14:43', '2023-07-12 21:17:13'),
(347, 'Fugit nisi commodo', 'Czech Republic', NULL, NULL, 'Proident aut at off', '43484', 1, 1, 1, '2023-07-12 21:15:23', '2023-07-12 21:15:23'),
(355, 'Sit quis voluptatem', NULL, NULL, NULL, NULL, '68899', 1, 1, 1, '2023-07-12 23:05:28', '2023-07-12 23:05:28'),
(356, 'Incidunt sed quis a', NULL, NULL, NULL, NULL, '72814', 1, 1, 1, '2023-07-12 23:07:08', '2023-07-12 23:07:08'),
(357, 'Nisi dolore Nam repr', NULL, NULL, NULL, NULL, '41559', 1, 1, 1, '2023-07-12 23:41:15', '2023-07-12 23:41:15'),
(358, 'Temporibus aut ut ob', NULL, NULL, NULL, NULL, '66899', 1, 1, 1, '2023-07-12 23:41:15', '2023-07-12 23:41:15'),
(359, 'Laboriosam veniam', NULL, NULL, NULL, NULL, '66435', 1, 1, 1, '2023-07-12 23:41:15', '2023-07-12 23:41:15'),
(360, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2023-07-13 23:06:56', '2023-07-13 23:15:13'),
(361, 'Nostrum velit minima', NULL, NULL, NULL, NULL, '32740', 1, 1, 1, '2023-07-13 23:06:56', '2023-07-13 23:06:56'),
(362, 'Ut et est culpa mo', NULL, NULL, NULL, NULL, '20199', 1, 1, 1, '2023-07-13 23:06:56', '2023-07-13 23:06:56'),
(363, 'Distinctio Voluptas', NULL, NULL, NULL, 'Aut neque pariatur', '61100', 1, 1, 1, '2023-07-20 22:07:47', '2023-07-20 22:07:47'),
(364, 'Autem excepturi accu', NULL, NULL, NULL, 'Similique sint rem', '13964', 1, 1, 1, '2023-07-20 22:08:02', '2023-07-20 22:08:02'),
(365, 'At id consequat Na', 'Panama', NULL, NULL, 'Voluptas consequatur', '83049', 1, 1, 1, '2023-07-20 23:14:16', '2023-07-20 23:14:16'),
(366, 'Aliquam nostrum dolo', 'Benin', NULL, NULL, 'Qui sit facere esse', '51128', 1, 1, 1, '2023-07-20 23:14:22', '2023-07-20 23:14:22'),
(369, 'Ea ut dolorem enim e', 'Sint tempora ullamc', 'Aliqua Praesentium', 'Pariatur Molestiae', 'Quis veniam dolores', '71718', 1, 1, 1, '2023-08-04 17:42:30', '2023-08-04 17:42:30'),
(371, 'Deleniti totam vitae', 'Aut ex pariatur Vol', 'Ut ipsam facilis qui', 'Dolores asperiores t', 'Omnis doloremque qua', '90930', 1, 1, 1, '2023-08-04 18:04:19', '2023-08-04 18:04:19'),
(372, 'Deleniti totam vitae', 'Aut ex pariatur Vol', 'Ut ipsam facilis qui', 'Dolores asperiores t', 'Omnis doloremque qua', '90930', 1, 1, 1, '2023-08-04 18:11:52', '2023-08-04 18:11:52'),
(374, 'Rerum earum dignissi', 'Accusamus iure volup', 'Delectus unde dolor', 'Aliquid fugiat et ar', 'Esse numquam sint r', '50951', 1, 1, 1, '2023-08-04 19:54:33', '2023-08-04 19:54:33'),
(376, 'Id sunt in debitis', 'Dolores sit dolores', 'Distinctio Sint ips', 'Distinctio Ea ullam', 'Quam sequi illum se', '90596', 1, 1, 1, '2023-08-04 20:36:39', '2023-08-04 20:36:39'),
(381, 'Nemo fugit facere q', 'Deserunt adipisci mo', 'Delectus consequatu', 'Quasi fugiat sunt ne', 'Labore consequat Au', '80937', 1, 1, 1, '2023-08-04 23:58:44', '2023-08-04 23:58:44'),
(393, 'Voluptas ex consequa', 'A rerum minima dolor', 'Perferendis assumend', 'Laboris harum quam o', 'A deserunt tempora s', '21569', 1, 1, 1, '2023-08-06 23:08:50', '2023-08-06 23:08:50'),
(398, 'Sit accusantium cil', 'Lorem dicta error en', 'Assumenda velit des', 'Quasi aspernatur ame', 'Adipisci minima ipsa', '21070', 1, 1, 1, '2023-08-11 01:46:05', '2023-08-11 01:46:05'),
(399, 'Et magni qui repelle', 'Enim modi asperiores', 'Eum reprehenderit qu', 'Ut deleniti nulla si', 'Possimus vel quod v', '28883', 1, 1, 1, '2023-08-11 15:44:33', '2023-08-11 15:44:33'),
(403, 'Necessitatibus et od', 'Illum id adipisci l', 'In ut unde nesciunt', 'Sunt similique odit', 'Nemo est illo qui vo', '82246', 1, 1, 1, '2023-08-11 16:36:00', '2023-08-11 16:36:00'),
(404, 'Nobis Nam do eveniet', 'Exercitationem nisi', 'Esse ut aliquip pro', 'Nesciunt ab qui rer', 'Quo similique qui it', '55503', 1, 1, 1, '2023-08-11 16:36:47', '2023-08-11 16:36:47'),
(405, 'Pariatur Sit obcae', 'Reprehenderit vero', 'Temporibus ut ea deb', 'Sunt exercitationem', 'Esse et est sunt', '70966', 1, 1, 1, '2023-08-11 16:58:29', '2023-08-11 17:12:53'),
(406, 'Aperiam do omnis vol', 'Beatae omnis ut id', 'Qui et eveniet exce', 'Eu dolor quis conseq', 'Commodi quo officiis', '92689', 1, 1, 1, '2023-08-11 23:22:51', '2023-08-11 23:22:51'),
(407, 'Dicta eum omnis ipsa', NULL, NULL, NULL, NULL, '26753', 1, 1, 1, '2023-09-08 23:39:15', '2023-09-08 23:39:15'),
(408, 'Accusamus voluptate', NULL, NULL, NULL, NULL, '28210', 1, 1, 1, '2023-09-08 23:39:15', '2023-09-08 23:39:15'),
(409, 'Ad odio perferendis', NULL, NULL, NULL, NULL, '42835', 1, 1, 1, '2023-09-08 23:39:15', '2023-09-08 23:39:15'),
(410, 'Et exercitation est', 'Heard Island and McDonald Islands', NULL, NULL, 'Eaque in itaque cons', '88043', 1, 1, 1, '2023-09-13 22:51:13', '2023-09-13 22:51:13'),
(411, 'Error possimus cons', 'Eritrea', NULL, NULL, 'Molestias facilis ex', '90457', 1, 1, 1, '2023-09-16 17:36:37', '2023-09-16 17:36:37'),
(412, 'Alias nulla facere a', 'Virgin Islands (US)', NULL, NULL, 'Adipisicing voluptat', '26775', 1, 1, 1, '2023-09-20 23:01:42', '2023-09-20 23:01:42'),
(413, 'Neque aliquid except', 'Romania', NULL, NULL, 'Voluptas incididunt', '91940', 1, 1, 1, '2023-09-23 21:57:57', '2023-09-23 21:57:57'),
(414, 'Molestiae voluptas a', 'Blanditiis aut ex su', 'Illo at quis suscipi', 'Quia ullam sint mol', 'Vero ullam natus qui', '57464', 1, 1, 1, '2023-09-24 00:58:05', '2023-09-24 00:58:05'),
(415, 'Molestiae maiores nu', 'Azerbaijan', NULL, NULL, 'Quis voluptate asper', '73014', 1, 1, 1, '2023-09-29 22:02:45', '2023-09-29 22:02:45'),
(416, 'Cum blanditiis sint', 'Cape Verde', 'São Miguel', NULL, 'Blanditiis ut quisqu', '71794', 1, 1, 1, '2023-09-29 23:30:59', '2023-09-29 23:30:59'),
(417, 'Debitis voluptatum i', 'Albania', NULL, NULL, 'Reiciendis ratione p', '42511', 1, 1, 1, '2023-09-30 23:28:19', '2023-09-30 23:28:19'),
(418, 'Enim rerum consequun', NULL, NULL, NULL, NULL, '32261', 1, 1, 1, '2023-09-30 23:35:49', '2023-09-30 23:35:49'),
(419, 'Architecto ut velit', 'Bolivia', NULL, NULL, 'Amet aut eiusmod ir', '95367', 1, 1, 1, '2023-10-12 21:13:05', '2023-10-12 21:13:05'),
(423, NULL, 'Soluta libero odio s', 'Voluptatem illo volu', 'Velit sed voluptatem', 'Aut sed perferendis', '66738', 1, 1, 1, '2023-10-12 23:09:44', '2023-10-12 23:09:44'),
(424, NULL, 'Est dicta non recusa', 'Reiciendis fugiat pr', 'Et qui velit enim ni', 'Ut quia incidunt ap', '11102', 1, 1, 1, '2023-10-12 23:15:29', '2023-10-12 23:15:29'),
(425, NULL, 'Reprehenderit magna', 'Laborum dolor volupt', 'Reprehenderit irure', 'Quos incidunt ex la', '83288', 1, 1, 1, '2023-10-12 23:45:36', '2023-10-12 23:45:36'),
(426, NULL, 'Reprehenderit magna', 'Laborum dolor volupt', 'Reprehenderit irure', 'Quos incidunt ex la', '83288', 1, 1, 1, '2023-10-12 23:48:36', '2023-10-12 23:48:36'),
(427, 'Lorem quidem commodo', NULL, NULL, NULL, NULL, '93034', 1, 1, 1, '2023-10-12 23:59:53', '2023-10-12 23:59:53'),
(432, 'Sunt nulla iure ut d', 'Nisi vero exercitati', 'Omnis deserunt dolor', 'Qui laudantium temp', 'Saepe quam quod fugi', '92643', 1, 1, 1, '2023-10-25 21:45:01', '2023-10-25 21:45:01'),
(433, 'Est aut consequatur', 'Rerum qui suscipit r', 'Dolor eum laboriosam', 'Architecto cupidatat', 'A ipsum in quis illo', '35060', 1, 1, 1, '2023-10-25 21:55:10', '2023-10-25 21:55:10'),
(434, 'Repellendus Tempor', 'Aut voluptate omnis', 'Non laboriosam iust', 'Aut omnis tempora se', 'Illo in delectus pa', '20855', 1, 1, 1, '2023-10-25 22:54:47', '2023-10-25 22:54:47'),
(435, 'Officia veniam enim', NULL, NULL, NULL, NULL, '27304', 1, 1, 1, '2023-10-30 22:25:24', '2023-10-30 22:25:24'),
(436, 'Qui accusantium sunt', NULL, NULL, NULL, NULL, '43046', 1, 1, 1, '2023-10-30 22:25:38', '2023-10-30 22:25:38'),
(437, 'Incididunt consequun', NULL, NULL, NULL, NULL, '74637', 1, 1, 1, '2023-10-30 22:25:53', '2023-10-30 22:25:53'),
(438, 'Dolorum reprehenderi', NULL, NULL, NULL, NULL, '22193', 1, 1, 1, '2023-10-30 22:26:05', '2023-10-30 22:26:05'),
(439, 'Eveniet et impedit', NULL, NULL, NULL, NULL, '14179', 1, 1, 1, '2023-10-30 22:26:19', '2023-10-30 22:26:19'),
(440, 'Ut et voluptas nostr', NULL, NULL, NULL, NULL, '81022', 1, 1, 1, '2023-10-30 22:26:35', '2023-10-30 22:26:35'),
(441, 'Minima illum minim', NULL, NULL, NULL, NULL, '71490', 1, 1, 1, '2023-10-30 22:26:49', '2023-10-30 22:26:49'),
(442, 'Quia ut qui a quia d', NULL, NULL, NULL, NULL, '90987', 1, 1, 1, '2023-10-30 22:27:04', '2023-10-30 22:27:04'),
(443, 'Ut quis eiusmod hic', NULL, NULL, NULL, NULL, '90058', 1, 1, 1, '2023-10-30 22:27:20', '2023-10-30 22:27:20'),
(444, 'Corrupti non do qui', 'Quo reprehenderit d', 'Quibusdam qui a cons', 'Qui ut irure porro q', 'Voluptatem laboriosa', '38893', 1, 1, 1, '2023-10-30 22:28:58', '2023-10-30 22:28:58'),
(445, 'Rem vero maxime veni', 'Qui accusamus dolore', 'Incididunt fugiat f', 'Et laboriosam conse', 'Consectetur placeat', '69573', 1, 1, 1, '2023-10-30 22:29:41', '2023-10-30 22:29:41'),
(446, 'Et tenetur est non', 'Anim tempore eum si', 'Aperiam neque earum', 'Obcaecati cumque sed', 'Mollit vel enim in i', '84659', 1, 1, 1, '2023-10-30 22:30:14', '2023-10-30 22:30:14'),
(447, 'Corporis aut laborum', NULL, NULL, NULL, NULL, '25695', 1, 1, 1, '2023-10-30 22:32:56', '2023-10-30 22:32:56'),
(448, 'Et quis dolorem enim', NULL, NULL, NULL, NULL, '17201', 1, 1, 1, '2023-11-04 22:15:32', '2023-11-04 22:15:32'),
(449, 'Dolore adipisicing f', NULL, NULL, NULL, NULL, '63004', 1, 1, 1, '2023-11-04 22:15:32', '2023-11-04 22:15:32'),
(450, 'Quidem consequuntur', NULL, NULL, NULL, NULL, '77871', 1, 1, 1, '2023-11-04 22:15:32', '2023-11-04 22:15:32'),
(451, 'Non culpa minim acc', NULL, NULL, NULL, NULL, '77947', 1, 1, 1, '2023-11-04 22:15:38', '2023-11-04 22:15:38'),
(452, 'Et modi odio quibusd', NULL, NULL, NULL, NULL, '86400', 1, 1, 1, '2023-11-04 22:15:38', '2023-11-04 22:15:38'),
(453, 'Voluptatibus fugiat', NULL, NULL, NULL, NULL, '24758', 1, 1, 1, '2023-11-04 22:15:38', '2023-11-04 22:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$FPdwUwDnG0GW2JOAkEB/q.garvJwSeGD4NPZiemUnklgVlBNAGwDO', '2023-07-02 16:15:18', '2023-07-02 16:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `announcent`
--

CREATE TABLE `announcent` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcent`
--

INSERT INTO `announcent` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Welcome Message', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Classes Schedulles ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Competition Program ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Critical Codes', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Emergency ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Field trip', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Graduation ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Health ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Library', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Meeting ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'New Term/ Semester ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Parking ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Policy and rules', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Registration ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Safety and Security ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'School Close Day ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Students Assessments', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Training ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Transportation ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Volunteering', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Custom', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(5, 1, 26, 'fasdf fa fsdaf ds fds fds f af s fdasf sdfasd faf', '2023-05-28 18:36:45', '2023-05-28 18:36:45'),
(6, 1, 26, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n5\r\n	paragraphs\r\n	words\r\n	bytes\r\n	lists\r\n	Start with \'Lorem\r\nipsum dolor sit amet...\'', '2023-05-28 18:44:36', '2023-05-28 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` bigint(20) NOT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `assessment_type_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(200) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `instruction` varchar(50) DEFAULT NULL,
  `mark` float NOT NULL,
  `late_submission_policy` varchar(50) DEFAULT NULL,
  `posted_date` datetime DEFAULT NULL,
  `submission_due_date` datetime DEFAULT NULL,
  `class_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semester_id` varchar(50) DEFAULT NULL,
  `academic_year_id` varchar(50) DEFAULT NULL,
  `submission_type` enum('online','offline') DEFAULT NULL,
  `extended_due_date` datetime DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `school_id`, `unique_id`, `assessment_type_id`, `title`, `created_by`, `instruction`, `mark`, `late_submission_policy`, `posted_date`, `submission_due_date`, `class_id`, `created_at`, `updated_at`, `semester_id`, `academic_year_id`, `submission_type`, `extended_due_date`, `course_id`) VALUES
(6, 1, 'c920e82b-c32f-42da-a2e8-f2a556373e77', 1, 'Englisth Assessment 1', 2, 'Dolores cumque id ea', 50, 'Late is not allowed', '2023-10-30 22:43:06', '2023-10-31 00:00:00', 30, '2023-10-30 16:43:07', '2023-10-30 16:43:07', NULL, NULL, 'offline', '2023-11-02 00:00:00', 41),
(7, 1, '0fd7b392-0a76-4cd5-af03-c298ee4fef2e', 10, 'En#0342', 2, 'Cumque et molestiae', 100, 'Mollitia atque dolor', '2023-11-02 00:34:50', '2000-11-06 00:00:00', 30, '2023-11-01 18:34:50', '2023-11-01 18:34:50', NULL, NULL, 'offline', '1974-10-05 00:00:00', 41);

-- --------------------------------------------------------

--
-- Table structure for table `assessments_schedule_dates`
--

CREATE TABLE `assessments_schedule_dates` (
  `id` int(11) NOT NULL,
  `assessments_type` int(11) DEFAULT NULL,
  `assessment_date` date DEFAULT NULL,
  `assessment_day` varchar(125) DEFAULT NULL,
  `assessment_time` time DEFAULT NULL,
  `assessment_classroom_no` int(11) DEFAULT NULL,
  `assessment_classroom_location` int(11) DEFAULT NULL,
  `assessment_post_date` timestamp NULL DEFAULT NULL,
  `assessment_due_on` timestamp NULL DEFAULT NULL,
  `assessment_mark_date` timestamp NULL DEFAULT NULL,
  `mark_grade` varchar(125) DEFAULT NULL,
  `mark_percentage` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments_schedule_dates`
--

INSERT INTO `assessments_schedule_dates` (`id`, `assessments_type`, `assessment_date`, `assessment_day`, `assessment_time`, `assessment_classroom_no`, `assessment_classroom_location`, `assessment_post_date`, `assessment_due_on`, `assessment_mark_date`, `mark_grade`, `mark_percentage`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 7, '2008-07-01', 'Friday', '20:34:00', 17, 3, '2011-04-22 19:41:00', '1974-12-10 14:38:00', '1984-05-13 02:37:00', '67', '72', 1, NULL, NULL, '2023-03-13 10:40:46', '2023-03-16 07:01:53'),
(8, 2, '1988-08-10', 'Monday', '13:48:00', 18, 2, '2010-01-26 00:32:00', '1972-07-23 16:21:00', '2019-05-09 19:36:00', '78', '69', 1, NULL, NULL, '2023-03-16 06:01:31', '2023-03-16 06:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_notifications`
--

CREATE TABLE `assessment_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assessment_notifications`
--

INSERT INTO `assessment_notifications` (`id`, `assessment_id`, `user_type_id`, `created_at`, `updated_at`) VALUES
(33, 32, 1, '2023-03-09 19:46:41', '2023-03-09 19:46:41'),
(34, 32, 4, '2023-03-09 19:46:41', '2023-03-09 19:46:41'),
(35, 32, 5, '2023-03-09 19:46:41', '2023-03-09 19:46:41'),
(36, 33, 2, '2023-03-23 16:53:04', '2023-03-23 16:53:04'),
(37, 33, 4, '2023-03-23 16:53:04', '2023-03-23 16:53:04'),
(38, 34, 2, '2023-03-23 18:37:28', '2023-03-23 18:37:28'),
(39, 34, 4, '2023-03-23 18:37:28', '2023-03-23 18:37:28'),
(40, 35, 1, '2023-03-24 16:58:02', '2023-03-24 16:58:02'),
(41, 35, 3, '2023-03-24 16:58:02', '2023-03-24 16:58:02'),
(42, 35, 4, '2023-03-24 16:58:02', '2023-03-24 16:58:02'),
(43, 35, 5, '2023-03-24 16:58:02', '2023-03-24 16:58:02'),
(44, 35, 6, '2023-03-24 16:58:02', '2023-03-24 16:58:02'),
(45, 39, 4, '2023-05-18 16:24:30', '2023-05-18 16:24:30'),
(46, 39, 7, '2023-05-18 16:24:30', '2023-05-18 16:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_reminders`
--

CREATE TABLE `assessment_reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `assessment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assessment_reminders`
--

INSERT INTO `assessment_reminders` (`id`, `date`, `assessment_id`, `created_at`, `updated_at`) VALUES
(12, '2023-03-15 00:00:00', 32, '2023-03-09 19:46:41', '2023-03-09 19:46:41'),
(13, '2023-03-16 00:00:00', 33, '2023-03-23 16:53:04', '2023-03-23 16:53:04'),
(14, '2023-03-29 00:00:00', 34, '2023-03-23 18:37:28', '2023-03-23 18:37:28'),
(15, '2023-03-25 00:00:00', 35, '2023-03-24 16:58:02', '2023-03-24 16:58:02'),
(16, '2023-03-25 00:00:00', 35, '2023-03-24 16:58:02', '2023-03-24 16:58:02'),
(17, '2023-05-18 00:00:00', 35, '2023-05-15 08:59:17', '2023-05-15 08:59:17'),
(18, '2022-06-29 00:00:00', 38, '2023-05-15 09:25:20', '2023-05-15 09:25:20'),
(19, '2019-03-23 00:00:00', 39, '2023-05-18 16:24:30', '2023-05-18 16:24:30'),
(20, '2012-07-19 00:00:00', 40, '2023-06-09 16:40:56', '2023-06-09 16:40:56'),
(21, '1999-09-17 00:00:00', 41, '2023-06-09 17:30:03', '2023-06-09 17:30:03'),
(22, '2000-09-23 00:00:00', 42, '2023-06-09 17:44:30', '2023-06-09 17:44:30'),
(23, '1972-04-28 00:00:00', 43, '2023-06-14 19:42:44', '2023-06-14 19:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_students`
--

CREATE TABLE `assessment_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assessment_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `status` varchar(125) NOT NULL DEFAULT 'assigned',
  `mark` double(4,2) DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assessment_students`
--

INSERT INTO `assessment_students` (`id`, `assessment_id`, `student_id`, `status`, `mark`, `submitted_at`, `created_at`, `updated_at`) VALUES
(71, 38, 49, 'assigned', 35.00, NULL, '2023-05-15 14:12:19', '2023-05-15 14:15:45'),
(72, 39, 49, 'submitted', 10.00, '2023-05-18 23:07:07', '2023-05-18 16:24:30', '2023-05-18 17:07:07'),
(73, 42, 61, 'submitted', 75.00, '2023-06-10 00:06:20', '2023-06-09 17:44:30', '2023-06-09 18:44:59'),
(74, 48, 61, 'assigned', NULL, NULL, '2023-06-15 13:57:47', '2023-06-15 13:57:47'),
(75, 61, 61, 'assigned', NULL, NULL, '2023-06-15 14:59:00', '2023-06-15 14:59:00'),
(76, 62, 61, 'assigned', NULL, NULL, '2023-06-19 17:37:13', '2023-06-19 17:37:13'),
(77, 2, 151, 'assigned', NULL, NULL, '2023-10-26 16:51:12', '2023-10-26 16:51:12'),
(78, 2, 162, 'assigned', NULL, NULL, '2023-10-26 16:51:12', '2023-10-26 16:51:12'),
(79, 3, 163, 'assigned', NULL, NULL, '2023-10-28 19:23:52', '2023-10-28 19:23:52'),
(80, 3, 164, 'assigned', NULL, NULL, '2023-10-28 19:23:52', '2023-10-28 19:23:52'),
(81, 6, 174, 'submitted', 25.00, '2023-10-30 22:49:00', '2023-10-30 16:43:07', '2023-11-01 17:33:30'),
(82, 6, 175, 'submitted', 40.00, '2023-10-30 22:49:00', '2023-10-30 16:43:07', '2023-10-30 17:21:11'),
(83, 6, 176, 'submitted', 40.00, '2023-10-30 22:49:00', '2023-10-30 16:43:07', '2023-10-30 17:21:11'),
(84, 7, 174, 'submitted', 60.00, '2023-11-02 00:35:46', '2023-11-01 18:34:50', '2023-11-01 18:35:46'),
(85, 7, 175, 'submitted', 70.00, '2023-11-02 00:35:46', '2023-11-01 18:34:50', '2023-11-01 18:35:46'),
(86, 7, 176, 'submitted', 50.00, '2023-11-02 00:35:46', '2023-11-01 18:34:50', '2023-11-01 18:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_types`
--

CREATE TABLE `assessment_types` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_types`
--

INSERT INTO `assessment_types` (`id`, `name`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Class works', 'class-work', 1, NULL, NULL, NULL, '2022-12-29 19:06:42'),
(2, 'Presenation', 'presentation', 1, NULL, NULL, NULL, '2022-12-29 19:06:42'),
(3, 'Workshops', 'workshop', 1, NULL, NULL, NULL, '2022-12-29 19:07:14'),
(4, 'Homework', 'homework', 1, NULL, NULL, NULL, '2022-12-29 19:07:14'),
(5, 'Assignment', 'assignment', 1, NULL, NULL, NULL, '2022-12-29 19:07:49'),
(6, 'Quizzes', 'quize', 1, NULL, NULL, NULL, '2022-12-29 19:07:49'),
(7, 'Projects', 'project', 1, NULL, NULL, NULL, '2022-12-29 19:08:43'),
(8, 'Research', 'research', 1, NULL, NULL, NULL, '2022-12-29 19:08:43'),
(9, 'Mid-Term', 'mid-term', 1, NULL, NULL, NULL, '2022-12-29 19:09:21'),
(10, 'Final Exam', 'final-exam', 1, NULL, NULL, NULL, '2022-12-29 19:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `asset_name`
--

CREATE TABLE `asset_name` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_name`
--

INSERT INTO `asset_name` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Chairs', 1, NULL, NULL, NULL, '2023-03-09 08:17:47'),
(2, 'Air Condition', 1, NULL, NULL, NULL, '2023-03-09 08:17:47'),
(3, 'Blackboard', 1, NULL, NULL, NULL, '2023-03-09 08:19:23'),
(4, 'Bookshelf', 1, NULL, NULL, NULL, '2023-03-09 08:19:23'),
(5, 'Clock', 1, NULL, NULL, NULL, '2023-03-09 08:19:23'),
(6, 'Computer Desktop', 1, NULL, NULL, NULL, '2023-03-09 08:20:01'),
(7, 'Desk', 1, NULL, NULL, NULL, '2023-03-09 08:20:01'),
(8, 'Fan', 1, NULL, NULL, NULL, '2023-03-09 08:20:01'),
(9, 'Garbage Bin', 1, NULL, NULL, NULL, '2023-03-09 08:20:54'),
(10, 'Hole Punch', 1, NULL, NULL, NULL, '2023-03-09 08:20:54'),
(11, 'IPAD', 1, NULL, NULL, NULL, '2023-03-09 08:20:54'),
(12, 'Laptop', 1, NULL, NULL, NULL, '2023-03-09 08:21:37'),
(13, 'Locker', 1, NULL, NULL, NULL, '2023-03-09 08:21:37'),
(14, 'Microphone', 1, NULL, NULL, NULL, '2023-03-09 08:21:37'),
(15, 'Projector', 1, NULL, NULL, NULL, '2023-03-09 08:22:11'),
(16, 'Speakers', 1, NULL, NULL, NULL, '2023-03-09 08:22:11'),
(17, 'Whiteboard', 1, NULL, NULL, NULL, '2023-03-09 08:22:11'),
(18, 'Other ( Please specify )', 1, NULL, NULL, NULL, '2023-03-09 08:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `asset_transfers`
--

CREATE TABLE `asset_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) UNSIGNED NOT NULL,
  `from_room_id` bigint(20) UNSIGNED NOT NULL,
  `to_room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asset_transfers`
--

INSERT INTO `asset_transfers` (`id`, `asset_id`, `from_room_id`, `to_room_id`, `created_at`, `updated_at`) VALUES
(1, 34, 15, 14, '2023-08-15 15:05:21', '2023-08-15 15:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_task`
--

CREATE TABLE `assigned_task` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `task_no` varchar(125) DEFAULT NULL,
  `task_date` timestamp NULL DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `cc_user_id` int(11) DEFAULT NULL,
  `priority_levels` varchar(125) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `message` text,
  `instruction` varchar(150) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_task`
--

INSERT INTO `assigned_task` (`id`, `school_id`, `task_no`, `task_date`, `account_type`, `from_user_id`, `to_user_id`, `cc_user_id`, `priority_levels`, `subject`, `message`, `instruction`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 1, '1678092702', '2023-03-04 08:51:00', NULL, 12, 6, 9, 'High', '1', 'cweracfzs', 'srvtaeswfa', 1, 2, 2, '2023-03-06 08:53:02', '2023-03-07 05:33:42'),
(3, 1, '1678167244', '2023-03-10 05:34:00', NULL, 10, 5, 11, 'Low', '1', 'love', 'love2', 1, 2, 2, '2023-03-07 05:35:08', '2023-03-07 05:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `attachable`
--

CREATE TABLE `attachable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment_id` bigint(20) UNSIGNED NOT NULL,
  `attachable_id` bigint(20) UNSIGNED NOT NULL,
  `attachable_type` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachable`
--

INSERT INTO `attachable` (`id`, `attachment_id`, `attachable_id`, `attachable_type`, `created_at`, `updated_at`) VALUES
(2, 23, 61, 'App\\Models\\Assessment', NULL, NULL),
(3, 24, 7, 'App\\Models\\MarkAppeal', NULL, NULL),
(4, 25, 8, 'App\\Models\\MarkAppeal', NULL, NULL),
(5, 26, 10, 'App\\Models\\MarkAppeal', NULL, NULL),
(6, 27, 11, 'App\\Models\\MarkAppeal', NULL, NULL),
(7, 28, 12, 'App\\Models\\MarkAppeal', NULL, NULL),
(8, 40, 70, 'App\\Models\\User', NULL, NULL),
(9, 42, 71, 'App\\Models\\User', NULL, NULL),
(10, 44, 72, 'App\\Models\\User', NULL, NULL),
(11, 48, 73, 'App\\Models\\User', NULL, NULL),
(12, 49, 73, 'App\\Models\\User', NULL, NULL),
(13, 50, 73, 'App\\Models\\User', NULL, NULL),
(14, 52, 74, 'App\\Models\\User', NULL, NULL),
(15, 53, 74, 'App\\Models\\User', NULL, NULL),
(16, 55, 75, 'App\\Models\\User', NULL, NULL),
(17, 56, 75, 'App\\Models\\User', NULL, NULL),
(18, 57, 75, 'App\\Models\\User', NULL, NULL),
(19, 67, 77, 'App\\Models\\User', NULL, NULL),
(20, 68, 77, 'App\\Models\\User', NULL, NULL),
(21, 69, 78, 'App\\Models\\User', NULL, NULL),
(22, 70, 78, 'App\\Models\\User', NULL, NULL),
(23, 71, 78, 'App\\Models\\User', NULL, NULL),
(24, 72, 79, 'App\\Models\\User', NULL, NULL),
(25, 73, 79, 'App\\Models\\User', NULL, NULL),
(26, 74, 79, 'App\\Models\\User', NULL, NULL),
(27, 76, 80, 'App\\Models\\User', NULL, NULL),
(28, 77, 80, 'App\\Models\\User', NULL, NULL),
(29, 80, 11, 'App\\Models\\School', NULL, NULL),
(30, 81, 11, 'App\\Models\\School', NULL, NULL),
(31, 87, 13, 'App\\Models\\School', NULL, NULL),
(32, 88, 14, 'App\\Models\\School', NULL, NULL),
(33, 89, 14, 'App\\Models\\School', NULL, NULL),
(34, 91, 6, 'App\\Models\\Room', NULL, NULL),
(35, 98, 58, 'App\\Models\\Transaction', NULL, NULL),
(36, 99, 59, 'App\\Models\\Transaction', NULL, NULL),
(37, 100, 60, 'App\\Models\\Transaction', NULL, NULL),
(38, 101, 61, 'App\\Models\\Transaction', NULL, NULL),
(39, 102, 69, 'App\\Models\\Transaction', NULL, NULL),
(40, 103, 74, 'App\\Models\\Transaction', NULL, NULL),
(41, 104, 75, 'App\\Models\\Transaction', NULL, NULL),
(42, 105, 77, 'App\\Models\\Transaction', NULL, NULL),
(43, 106, 52, 'App\\Models\\Transaction', NULL, NULL),
(44, 107, 77, 'App\\Models\\Transaction', NULL, NULL),
(45, 108, 84, 'App\\Models\\Transaction', NULL, NULL),
(46, 109, 84, 'App\\Models\\Transaction', NULL, NULL),
(47, 110, 86, 'App\\Models\\Transaction', NULL, NULL),
(48, 111, 92, 'App\\Models\\Transaction', NULL, NULL),
(49, 112, 64, 'App\\Models\\Assessment', NULL, NULL),
(50, 113, 1, 'App\\Models\\Assessment', NULL, NULL),
(51, 114, 61, 'App\\Models\\Transaction', NULL, NULL),
(52, 115, 5, 'App\\Models\\Assessment', NULL, NULL),
(53, 116, 6, 'App\\Models\\Assessment', NULL, NULL),
(54, 117, 7, 'App\\Models\\Assessment', NULL, NULL),
(55, 118, 1, 'App\\Models\\Transaction', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_name` varchar(125) NOT NULL,
  `file_path` varchar(125) NOT NULL,
  `mime_type` varchar(125) DEFAULT NULL,
  `disk` varchar(125) NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `school_id`, `owner_id`, `file_name`, `file_path`, `mime_type`, `disk`, `size`, `created_at`, `updated_at`) VALUES
(13, 1, 2, '996ac074-966c-4ff7-9902-0b7e17c1762c.pdf', '1/996ac074-966c-4ff7-9902-0b7e17c1762c.pdf', 'application/pdf', 'local', 407083, '2023-06-15 14:02:24', '2023-06-15 14:02:24'),
(22, 1, 2, '996ac76a-f3e7-43bf-a7e8-e4ec5feeedf7.pdf', '1/996ac76a-f3e7-43bf-a7e8-e4ec5feeedf7.pdf', 'application/pdf', 'local', 407083, '2023-06-15 14:21:52', '2023-06-15 14:21:52'),
(23, 1, 2, '996ad4b3-1049-4258-9f5c-20725d428e15.pdf', '1/996ad4b3-1049-4258-9f5c-20725d428e15.pdf', 'application/pdf', 'local', 527586, '2023-06-15 14:59:00', '2023-06-15 14:59:00'),
(24, 1, 2, '996b1bea-d295-4ac5-a2e4-b2a426238703.pdf', '1/996b1bea-d295-4ac5-a2e4-b2a426238703.pdf', 'application/pdf', 'local', 407083, '2023-06-15 18:18:09', '2023-06-15 18:18:09'),
(25, 1, 2, '996d3c66-7a06-4679-8340-edfe28771417.xlsx', '1/996d3c66-7a06-4679-8340-edfe28771417.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'local', 25399, '2023-06-16 19:40:38', '2023-06-16 19:40:38'),
(26, 1, 2, '99731758-9343-4979-8f94-0f1585b9725f.pdf', '1/99731758-9343-4979-8f94-0f1585b9725f.pdf', 'application/pdf', 'local', 58447, '2023-06-19 17:31:59', '2023-06-19 17:31:59'),
(27, 1, 2, '9973188e-2bb0-40d2-9284-878faed99aba.pdf', '1/9973188e-2bb0-40d2-9284-878faed99aba.pdf', 'application/pdf', 'local', 58447, '2023-06-19 17:35:22', '2023-06-19 17:35:22'),
(28, 1, 2, '99731984-9553-4b3c-877d-bbfc816bd073.pdf', '1/99731984-9553-4b3c-877d-bbfc816bd073.pdf', 'application/pdf', 'local', 58447, '2023-06-19 17:38:04', '2023-06-19 17:38:04'),
(29, 1, 2, '9978f8ff-2f7a-4962-9e5f-7c8590396982.jpeg', '1/9978f8ff-2f7a-4962-9e5f-7c8590396982.jpeg', 'image/jpeg', 'local', 61230, '2023-06-22 15:42:06', '2023-06-22 15:42:06'),
(30, 1, 2, '9978f900-2a50-4a6b-a688-6e81a114733d.pdf', '1/9978f900-2a50-4a6b-a688-6e81a114733d.pdf', 'application/pdf', 'local', 26581, '2023-06-22 15:42:06', '2023-06-22 15:42:06'),
(31, 1, 2, '997918fe-353b-47fb-b0a8-bb202556b59a.jpg', '1/997918fe-353b-47fb-b0a8-bb202556b59a.jpg', 'image/jpeg', 'local', 67342, '2023-06-22 17:11:34', '2023-06-22 17:11:34'),
(32, 1, 2, '997918fe-40e2-4e78-9527-0056074e42a6.pdf', '1/997918fe-40e2-4e78-9527-0056074e42a6.pdf', 'application/pdf', 'local', 58447, '2023-06-22 17:11:34', '2023-06-22 17:11:34'),
(36, 1, 2, 'VwsHVT54IVsfNUrAtJ8dtXEwHMlAeW.jpg', '1/2023-06/VwsHVT54IVsfNUrAtJ8dtXEwHMlAeW.jpg', 'image/jpeg', 'local', 67342, '2023-06-26 08:51:20', '2023-06-26 08:51:20'),
(37, 1, 2, '4sxgAJOtnYiLF6i9SS8VRYJKqJrjA3.jpg', '1/2023-06/4sxgAJOtnYiLF6i9SS8VRYJKqJrjA3.jpg', 'image/jpeg', 'uploads', 42374, '2023-06-26 08:56:37', '2023-06-26 08:56:37'),
(38, 1, 2, 'l0rIJ1BONwBmOAt0ftMbj0IuaInUYi.jpg', '1/2023-06/l0rIJ1BONwBmOAt0ftMbj0IuaInUYi.jpg', 'image/jpeg', 'public', 10013, '2023-06-26 09:35:55', '2023-06-26 09:35:55'),
(39, 1, 2, 'S1feEjghqzMkabp7FIlfKwTa3mRqbv.jpg', '1/2023-06/S1feEjghqzMkabp7FIlfKwTa3mRqbv.jpg', 'image/jpeg', 'public', 3727, '2023-06-26 09:42:49', '2023-06-26 09:42:49'),
(40, 1, 2, 'HPwCNi6bQuUoUsTunFSpkV5N4D6qtf.pdf', '1/2023-06/HPwCNi6bQuUoUsTunFSpkV5N4D6qtf.pdf', 'application/pdf', 'files', 58447, '2023-06-26 09:42:50', '2023-06-26 09:42:50'),
(41, 1, 2, 'Vsd4dYDVEwO7gr6UGvEU9yz40nAuww.jpg', '1/2023-06/Vsd4dYDVEwO7gr6UGvEU9yz40nAuww.jpg', 'image/jpeg', 'public', 7030, '2023-06-26 09:44:51', '2023-06-26 09:44:51'),
(42, 1, 2, 'k5vygPqQk2OZMGktasXgMZzVMiP6zh.pdf', '1/2023-06/k5vygPqQk2OZMGktasXgMZzVMiP6zh.pdf', 'application/pdf', 'files', 58447, '2023-06-26 09:44:51', '2023-06-26 09:44:51'),
(43, 1, 2, 'ydYiODsILdrb0oAeKBXVlLuck68qAz.jpg', '1/2023-06/ydYiODsILdrb0oAeKBXVlLuck68qAz.jpg', 'image/jpeg', 'public', 14038, '2023-06-26 09:46:35', '2023-06-26 09:46:35'),
(44, 1, 2, 'P7uT1BivVh5V78sKczk4aNyQPCXVV2.pdf', '1/2023-06/P7uT1BivVh5V78sKczk4aNyQPCXVV2.pdf', 'application/pdf', 'files', 58447, '2023-06-26 09:46:35', '2023-06-26 09:46:35'),
(48, 1, 2, '12VVUwondlO6Hc9TnVh9p5wcznqPsB.pdf', '1/2023-06/12VVUwondlO6Hc9TnVh9p5wcznqPsB.pdf', 'application/pdf', 'files', 4852, '2023-06-26 09:54:39', '2023-06-26 09:54:39'),
(49, 1, 2, '4vItP6fhU5outrq55VI8J48Oaomd0C.pdf', '1/2023-06/4vItP6fhU5outrq55VI8J48Oaomd0C.pdf', 'application/pdf', 'files', 407083, '2023-06-26 09:54:39', '2023-06-26 09:54:39'),
(50, 1, 2, 'K3MHXiUiPFlDCynJ4XnRkxDJcXkbpC.pdf', '1/2023-06/K3MHXiUiPFlDCynJ4XnRkxDJcXkbpC.pdf', 'application/pdf', 'files', 58447, '2023-06-26 09:54:39', '2023-06-26 09:54:39'),
(51, 1, 2, 'yomBf0Y35mtN30UmdToeJKMWTSUcc1.jpg', '1/2023-06/yomBf0Y35mtN30UmdToeJKMWTSUcc1.jpg', 'image/jpeg', 'public', 12967, '2023-06-26 09:57:09', '2023-06-26 09:57:09'),
(52, 1, 2, 'UBD7Cf0BK6y2TIX5fgEDTQaXbTwNbs.pdf', '1/2023-06/UBD7Cf0BK6y2TIX5fgEDTQaXbTwNbs.pdf', 'application/pdf', 'files', 4852, '2023-06-26 09:57:09', '2023-06-26 09:57:09'),
(53, 1, 2, 'ltbpwhd0rVE9jOr6MpJmO8t2SwCelE.pdf', '1/2023-06/ltbpwhd0rVE9jOr6MpJmO8t2SwCelE.pdf', 'application/pdf', 'files', 407083, '2023-06-26 09:57:09', '2023-06-26 09:57:09'),
(54, 1, 2, 'geXhJhgVQ8hu4UjrXESDR4YJ1uOXoE.jpg', '1/2023-06/geXhJhgVQ8hu4UjrXESDR4YJ1uOXoE.jpg', 'image/jpeg', 'public', 6664, '2023-06-26 09:58:15', '2023-06-26 09:58:15'),
(55, 1, 2, 'RiNzk0CVCGbYl4yvnjZ6eBfThPeV8Z.pdf', '1/2023-06/RiNzk0CVCGbYl4yvnjZ6eBfThPeV8Z.pdf', 'application/pdf', 'files', 4852, '2023-06-26 09:58:15', '2023-06-26 09:58:15'),
(56, 1, 2, 'qFBBYfH4TVz1ZCFuHRQpWjDINcwaVa.pdf', '1/2023-06/qFBBYfH4TVz1ZCFuHRQpWjDINcwaVa.pdf', 'application/pdf', 'files', 407083, '2023-06-26 09:58:15', '2023-06-26 09:58:15'),
(57, 1, 2, 'qgb0wC1XNaWxY0GrKcdY40ssDwEwN3.pdf', '1/2023-06/qgb0wC1XNaWxY0GrKcdY40ssDwEwN3.pdf', 'application/pdf', 'files', 58447, '2023-06-26 09:58:15', '2023-06-26 09:58:15'),
(67, 1, 2, 'g5LdYviXMbWocag5gPWE1pNfqPYj0B.pdf', '1/2023-06/g5LdYviXMbWocag5gPWE1pNfqPYj0B.pdf', 'application/pdf', 'local', 4353247, '2023-06-26 10:19:16', '2023-06-26 10:19:16'),
(68, 1, 2, 'qcdcEKFTNJwaKx9wt2Qoa4TUD4Xbbp.pdf', '1/2023-06/qcdcEKFTNJwaKx9wt2Qoa4TUD4Xbbp.pdf', 'application/pdf', 'local', 441590, '2023-06-26 10:19:16', '2023-06-26 10:19:16'),
(69, 1, 2, 'RZmPDnVpNUwLgCU72T2vXm530Dus06.pdf', '1/2023-06/RZmPDnVpNUwLgCU72T2vXm530Dus06.pdf', 'application/pdf', 'local', 1055570, '2023-06-26 10:20:28', '2023-06-26 10:20:28'),
(70, 1, 2, 'Oh3hJIWuECccQMMLHn0awDlv0Cq3M9.pdf', '1/2023-06/Oh3hJIWuECccQMMLHn0awDlv0Cq3M9.pdf', 'application/pdf', 'local', 407083, '2023-06-26 10:20:28', '2023-06-26 10:20:28'),
(71, 1, 2, 'a3bTdNaJT9MZz5emfvSf2sUuBSVy6L.pdf', '1/2023-06/a3bTdNaJT9MZz5emfvSf2sUuBSVy6L.pdf', 'application/pdf', 'local', 441590, '2023-06-26 10:20:28', '2023-06-26 10:20:28'),
(72, 1, 2, 'PlcWaIgKmXXsNN4iiaY83GGU9oNFfo.pdf', '1/2023-06/PlcWaIgKmXXsNN4iiaY83GGU9oNFfo.pdf', 'application/pdf', 'files', 1055570, '2023-06-26 10:22:29', '2023-06-26 10:22:29'),
(73, 1, 2, '6gHsx85mml6XmxIG4Cjf9pUqODnwh4.pdf', '1/2023-06/6gHsx85mml6XmxIG4Cjf9pUqODnwh4.pdf', 'application/pdf', 'files', 407083, '2023-06-26 10:22:29', '2023-06-26 10:22:29'),
(74, 1, 2, 'TuEqMuZc9oVCPCXhPNmcFsGFW5JwJ7.pdf', '1/2023-06/TuEqMuZc9oVCPCXhPNmcFsGFW5JwJ7.pdf', 'application/pdf', 'files', 441590, '2023-06-26 10:22:29', '2023-06-26 10:22:29'),
(75, 1, 2, 'sKZcY8ALVXA3XWweFhN6N7XAfKze19.jpg', '1/2023-06/sKZcY8ALVXA3XWweFhN6N7XAfKze19.jpg', 'image/jpeg', 'public', 12967, '2023-06-26 10:23:52', '2023-06-26 10:23:52'),
(76, 1, 2, 'Kz7kfQSnu06Vtl6aULzenwhV7Xs0Nl.pdf', '1/2023-06/Kz7kfQSnu06Vtl6aULzenwhV7Xs0Nl.pdf', 'application/pdf', 'files', 4852, '2023-06-26 10:23:52', '2023-06-26 10:23:52'),
(77, 1, 2, 'cNz1RAp69FzmOQfsEFW4i9mVq41fNh.pdf', '1/2023-06/cNz1RAp69FzmOQfsEFW4i9mVq41fNh.pdf', 'application/pdf', 'files', 58447, '2023-06-26 10:23:52', '2023-06-26 10:23:52'),
(78, 11, 88, 'eCqxV8P6YoYVrb4mGtVFYoOYSnxSse.pdf', '11/2023-07/eCqxV8P6YoYVrb4mGtVFYoOYSnxSse.pdf', 'application/pdf', 'files', 3523, '2023-07-06 07:15:30', '2023-07-06 07:15:30'),
(79, 11, 88, 'x9WNxb5yjq6X0uhkGZKFSIzCG25XLV.pdf', '11/2023-07/x9WNxb5yjq6X0uhkGZKFSIzCG25XLV.pdf', 'application/pdf', 'files', 4852, '2023-07-06 07:15:30', '2023-07-06 07:15:30'),
(80, 11, 88, 'uj0SWIVKtlp8oPbkR4b4ehXxWWA3cl.pdf', '11/2023-07/uj0SWIVKtlp8oPbkR4b4ehXxWWA3cl.pdf', 'application/pdf', 'files', 3523, '2023-07-06 07:15:49', '2023-07-06 07:15:49'),
(81, 11, 88, 'UmHwR4d1gBtXyx9KGc1ZXSICscz02a.pdf', '11/2023-07/UmHwR4d1gBtXyx9KGc1ZXSICscz02a.pdf', 'application/pdf', 'files', 4852, '2023-07-06 07:15:49', '2023-07-06 07:15:49'),
(83, 1, 2, 'F3AvFqFD1JPLAEbMGWNG5xklwBcexA.jpg', '1/2023-07/F3AvFqFD1JPLAEbMGWNG5xklwBcexA.jpg', 'image/jpeg', 'public', 4333, '2023-07-07 16:31:21', '2023-07-07 16:31:21'),
(84, 1, 2, 'E3uyEjy6HPDY7sZ9bFXmME7F3yCrKG.jpg', '1/2023-07/E3uyEjy6HPDY7sZ9bFXmME7F3yCrKG.jpg', 'image/jpeg', 'public', 14038, '2023-07-07 16:31:21', '2023-07-07 16:31:21'),
(85, 1, 2, 'tFJKXIAAQXfXHW0Mfb3v4VkX0UFcRD.jpeg', '1/2023-07/tFJKXIAAQXfXHW0Mfb3v4VkX0UFcRD.jpeg', 'image/jpeg', 'public', 132828, '2023-07-08 16:26:18', '2023-07-08 16:26:18'),
(86, 1, 2, 'yMnKnMI1rWNiFC4zqpJDnBQMx3FwJW.jpg', '1/2023-07/yMnKnMI1rWNiFC4zqpJDnBQMx3FwJW.jpg', 'image/jpeg', 'public', 5894, '2023-07-08 16:33:05', '2023-07-08 16:33:05'),
(87, 13, 99, 'kr15mgR5gToE7rNNd5CAm0dajSPVmx.jpg', '13/2023-07/kr15mgR5gToE7rNNd5CAm0dajSPVmx.jpg', 'image/jpeg', 'public', 32912, '2023-07-08 17:55:04', '2023-07-08 17:55:04'),
(88, 14, 120, 'TYhVwPwIn2g78td89Cp11TZaZJIOTT.png', '14/2023-07/TYhVwPwIn2g78td89Cp11TZaZJIOTT.png', 'image/png', 'public', 237841, '2023-07-10 14:35:09', '2023-07-10 14:35:09'),
(89, 14, 120, 'N0zv4VJIVPlSqbfcV8U3FyFw5HxjP4.png', '14/2023-07/N0zv4VJIVPlSqbfcV8U3FyFw5HxjP4.png', 'image/png', 'public', 122484, '2023-07-10 14:35:09', '2023-07-10 14:35:09'),
(90, 1, 2, 'ONb7memIfBQOaGWRyklOKI9rCihwWP.jpeg', '1/2023-08/ONb7memIfBQOaGWRyklOKI9rCihwWP.jpeg', 'image/jpeg', 'public', 72565, '2023-08-03 18:07:40', '2023-08-03 18:07:40'),
(91, 1, 2, '4cPD6WoggIhCxBHkSRRJrVkjGex6HQ.jpeg', '1/2023-08/4cPD6WoggIhCxBHkSRRJrVkjGex6HQ.jpeg', 'image/jpeg', 'public', 72565, '2023-08-03 18:08:02', '2023-08-03 18:08:02'),
(96, 1, 2, '25bbyXTnZxUhOhVHfAkFjFzbiYVER7.jpg', '1/2023-08/25bbyXTnZxUhOhVHfAkFjFzbiYVER7.jpg', 'image/jpeg', 'public', 62842, '2023-08-06 17:08:50', '2023-08-06 17:08:50'),
(97, 1, 2, 'Kgzj9GaRFHFJpBscTUtC3U9wtujF8c.jpg', '1/2023-08/Kgzj9GaRFHFJpBscTUtC3U9wtujF8c.jpg', 'image/jpeg', 'public', 7151, '2023-08-11 17:22:51', '2023-08-11 17:22:51'),
(98, 1, 2, '0xdqMzgBVXYXl2aCu3JY4PrCaeqW9l.png', '1/2023-08/0xdqMzgBVXYXl2aCu3JY4PrCaeqW9l.png', 'image/png', 'public', 122484, '2023-08-27 14:39:42', '2023-08-27 14:39:42'),
(99, 1, 2, 'QsOKx6zXE3RHBXlypzdryXcvrXKiep.png', '1/2023-08/QsOKx6zXE3RHBXlypzdryXcvrXKiep.png', 'image/png', 'public', 122484, '2023-08-27 15:30:49', '2023-08-27 15:30:49'),
(100, 1, 2, 'qqlqtu5hL96QNRdpc6hBlwMwCnPMFI.png', '1/2023-08/qqlqtu5hL96QNRdpc6hBlwMwCnPMFI.png', 'image/png', 'public', 72821, '2023-08-27 15:37:43', '2023-08-27 15:37:43'),
(101, 1, 2, 'y66eAtZsD9205HVC2JrfdSy2U5J7hU.png', '1/2023-08/y66eAtZsD9205HVC2JrfdSy2U5J7hU.png', 'image/png', 'public', 39249, '2023-08-27 16:20:57', '2023-08-27 16:20:57'),
(102, 1, 2, '6pMwrE1FNtPvXVatr2Roc5MRgOwQ5w.png', '1/2023-08/6pMwrE1FNtPvXVatr2Roc5MRgOwQ5w.png', 'image/png', 'public', 122484, '2023-08-29 18:20:33', '2023-08-29 18:20:33'),
(103, 1, 2, '25H83J57T8ESdjXL2eQajH8ANj87ot.png', '1/2023-08/25H83J57T8ESdjXL2eQajH8ANj87ot.png', 'image/png', 'public', 122484, '2023-08-30 17:42:19', '2023-08-30 17:42:19'),
(104, 1, 2, '8vXR0WbzUp9Zfq9s4Mat9JDonWBXGh.png', '1/2023-08/8vXR0WbzUp9Zfq9s4Mat9JDonWBXGh.png', 'image/png', 'public', 237841, '2023-08-30 17:51:56', '2023-08-30 17:51:56'),
(105, 1, 2, 'Va4ipFT33d9qjhXqJay5z9GVsejJdj.png', '1/2023-08/Va4ipFT33d9qjhXqJay5z9GVsejJdj.png', 'image/png', 'public', 72821, '2023-08-30 18:03:00', '2023-08-30 18:03:00'),
(106, 1, 2, 'BDzqnYLdstlutXSgQHiidGjyVh79Mj.png', '1/2023-08/BDzqnYLdstlutXSgQHiidGjyVh79Mj.png', 'image/png', 'public', 70811, '2023-08-31 08:13:20', '2023-08-31 08:13:20'),
(107, 1, 2, 'vkw02Hh93HijB7V70AfmZslI85Pscv.pdf', '1/2023-08/vkw02Hh93HijB7V70AfmZslI85Pscv.pdf', 'application/pdf', 'files', 82349, '2023-08-31 08:33:23', '2023-08-31 08:33:23'),
(108, 1, 2, 'X9otq5PXCTRA6hpSlfMQEWvIJS9Hd5.png', '1/2023-09/X9otq5PXCTRA6hpSlfMQEWvIJS9Hd5.png', 'image/png', 'public', 167193, '2023-09-01 17:10:50', '2023-09-01 17:10:50'),
(109, 1, 2, 'vXBoooiXktiT5xJ0j8E3wtDBNt2dC8.png', '1/2023-09/vXBoooiXktiT5xJ0j8E3wtDBNt2dC8.png', 'image/png', 'public', 237841, '2023-09-01 17:10:50', '2023-09-01 17:10:50'),
(110, 1, 2, 'lGjI5M6l3o6dKcBJlxZZDiwdSMtAC2.png', '1/2023-09/lGjI5M6l3o6dKcBJlxZZDiwdSMtAC2.png', 'image/png', 'public', 26946, '2023-09-05 19:43:29', '2023-09-05 19:43:29'),
(111, 1, 2, 'NVIlEYRpy4K57NvzfTdA5LfVg9WY93.png', '1/2023-09/NVIlEYRpy4K57NvzfTdA5LfVg9WY93.png', 'image/png', 'public', 175035, '2023-09-13 17:38:30', '2023-09-13 17:38:30'),
(112, 1, 2, 'pfmPNsDbx6O9WJkoW7v8UWkm2UZkAZ.jpg', '1/2023-10/pfmPNsDbx6O9WJkoW7v8UWkm2UZkAZ.jpg', 'image/jpeg', 'public', 42846, '2023-10-03 18:00:33', '2023-10-03 18:00:33'),
(113, 1, 2, 'o1DdZePuELKjMIP5MgYTA47K9bu8tF.pdf', '1/2023-10/o1DdZePuELKjMIP5MgYTA47K9bu8tF.pdf', 'application/pdf', 'files', 17937769, '2023-10-21 13:50:30', '2023-10-21 13:50:30'),
(114, 1, 2, 'SwkmMddV90DFctUMwdABDNMQ5AKwad.pdf', '1/2023-10/SwkmMddV90DFctUMwdABDNMQ5AKwad.pdf', 'application/pdf', 'files', 18020113, '2023-10-27 16:50:17', '2023-10-27 16:50:17'),
(115, 1, 2, 'hoMalNaKT7rAXxucQPLNjrjGsId4G2.pdf', '1/2023-10/hoMalNaKT7rAXxucQPLNjrjGsId4G2.pdf', 'application/pdf', 'files', 620120, '2023-10-29 16:57:12', '2023-10-29 16:57:12'),
(116, 1, 2, '6pIkbKNUTgQeeiISUiZWGLNmnLtwfk.png', '1/2023-10/6pIkbKNUTgQeeiISUiZWGLNmnLtwfk.png', 'image/png', 'public', 122484, '2023-10-30 16:43:06', '2023-10-30 16:43:06'),
(117, 1, 2, 'ri791ognGrIalQeGpYSgRSzyDit3nF.jpg', '1/2023-11/ri791ognGrIalQeGpYSgRSzyDit3nF.jpg', 'image/jpeg', 'public', 448098, '2023-11-01 18:34:50', '2023-11-01 18:34:50'),
(118, 1, 2, 'UnbJCZIbkenrmUFavljZiWtj9LUFzL.png', '1/2023-11/UnbJCZIbkenrmUFavljZiWtj9LUFzL.png', 'image/png', 'public', 823, '2023-11-04 18:12:48', '2023-11-04 18:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `account_no` varchar(125) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(125) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `school_id`, `name`, `account_no`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bank accc12', 'Illum cupidatat nos', 2, 'active', '2023-04-13 18:21:00', '2023-04-13 18:27:31'),
(2, 1, 'Rooney Sharp', 'Optio aspernatur ve', 2, 'active', '2023-09-23 18:01:11', '2023-09-23 18:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `request_type` varchar(125) NOT NULL,
  `request_description` text,
  `request_date` datetime NOT NULL,
  `special_request` text,
  `additional_note` text,
  `payment_required` tinyint(1) NOT NULL,
  `payment_refundable` tinyint(1) NOT NULL,
  `status` varchar(125) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `requester_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_charges`
--

CREATE TABLE `booking_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(125) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `net_amount` decimal(15,2) NOT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_charges`
--

INSERT INTO `booking_charges` (`id`, `booking_id`, `title`, `amount`, `discount`, `net_amount`, `comment`, `created_at`, `updated_at`) VALUES
(1, 8, 'Eos enim provident', 90.00, 7.00, 83.00, 'Earum sequi aliquid', '2023-08-13 19:39:17', '2023-08-13 19:39:17'),
(4, 9, 'In maxime esse expe', 100.00, 9.00, 91.00, 'Sit do consectetur', '2023-08-18 14:58:09', '2023-08-18 14:58:09'),
(5, 9, 'Cumque cillum pariat', 200.00, 8.00, 192.00, 'Ullam iste vero laud', '2023-08-18 14:58:09', '2023-08-18 14:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `booking_participants`
--

CREATE TABLE `booking_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `type` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_participants`
--

INSERT INTO `booking_participants` (`id`, `booking_id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(8, 8, 'Montana Talley', 'Nobis repellendus E', '2023-08-13 19:39:17', '2023-08-13 19:39:17'),
(10, 9, 'Madonna Middleton', 'Tempora qui et neces', '2023-08-18 14:58:09', '2023-08-18 14:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `booking_payments`
--

CREATE TABLE `booking_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt_no` varchar(125) NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `date` datetime NOT NULL,
  `payment_method` varchar(125) NOT NULL,
  `paid_by` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_payments`
--

INSERT INTO `booking_payments` (`id`, `receipt_no`, `booking_id`, `amount`, `date`, `payment_method`, `paid_by`, `created_at`, `updated_at`) VALUES
(8, 'Omnis perspiciatis', 8, 83.00, '1986-04-25 18:04:00', 'Dolores harum omnis', NULL, '2023-08-13 19:39:17', '2023-08-13 19:39:17'),
(9, 'Ut inventore dolorib', 9, 293.00, '2001-09-05 11:06:00', 'Cillum quia anim vel', NULL, '2023-08-14 15:23:30', '2023-08-18 14:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `book_name`
--

CREATE TABLE `book_name` (
  `id` int(11) NOT NULL,
  `book_name` varchar(125) DEFAULT NULL,
  `book_level` tinyint(4) DEFAULT NULL,
  `parent_book` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_name`
--

INSERT INTO `book_name` (`id`, `book_name`, `book_level`, `parent_book`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Textbook 1', 0, 0, 1, NULL, NULL, NULL, '2023-03-15 02:14:47'),
(2, 'Code', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 02:14:47'),
(3, 'Book Name', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 02:16:25'),
(4, 'Author(s) Name', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 02:16:25'),
(5, 'ISBN No', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 02:17:04'),
(6, 'Copyright', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 02:17:04'),
(7, 'Publisher', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 02:17:46'),
(8, 'Edition No', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 02:17:46'),
(9, 'Textbook 2', 0, 0, 1, NULL, NULL, NULL, '2023-03-15 02:14:47'),
(10, 'Code', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 02:14:47'),
(11, 'Book Name', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 02:16:25'),
(12, 'Author(s) Name', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 02:16:25'),
(13, 'ISBN No', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 02:17:04'),
(14, 'Copyright', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 02:17:04'),
(15, 'Publisher', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 02:17:46'),
(16, 'Edition No', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 02:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `calssroom_seat_occupant`
--

CREATE TABLE `calssroom_seat_occupant` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calssroom_seat_occupant`
--

INSERT INTO `calssroom_seat_occupant` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Student', 1, NULL, NULL, NULL, '2023-01-27 19:06:41'),
(2, 'Teacher/Instructor', 1, NULL, NULL, NULL, '2023-01-27 19:06:41'),
(3, 'Visitors', 1, NULL, NULL, NULL, '2023-01-27 19:07:12'),
(4, 'Auditor', 1, NULL, NULL, NULL, '2023-01-27 19:07:12'),
(5, 'Staff', 1, NULL, NULL, NULL, '2023-01-27 19:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `campus_code` varchar(125) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_office` varchar(125) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `fax` varchar(125) DEFAULT NULL,
  `cost_center` varchar(125) DEFAULT NULL,
  `income_center` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`id`, `school_id`, `name`, `campus_code`, `address`, `phone_office`, `email`, `fax`, `cost_center`, `income_center`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Campus1', 'cam-78953', '3', '880174643646', 'test@gmail.com', '89897245', 'test1', 'test-2', 1, 1, 1, NULL, '2022-12-28 19:09:42'),
(2, 1, 'Campus2', 'cam-09845', '5', '880174548932', 'jdkas@gmail.com', '9856463', 'texs-1', 'test2', 1, 1, 1, NULL, '2022-12-28 19:09:42'),
(3, 1, 'Head Office', 'cam-712372', '16', '8801746555579', 'gsoroar233@gmail.com', '4355446', 'test1', 'test2', 1, NULL, NULL, '2023-01-21 16:41:35', '2023-01-21 10:41:35'),
(4, 1, 'Campus-03', 'cam-387463', '7', '+88016795543', 'sample@gmail.com', '098435234', 'sample-5', 'sample-8', 1, NULL, NULL, '2023-03-04 12:26:35', '2023-03-04 06:26:35'),
(5, 1, 'Kenneth Meadows', 'cam-961717', NULL, '+1 (838) 218-1802', 'sypepafe@mailinator.com', '+1 (979) 867-2593', 'Eos error adipisicin', '785', 1, NULL, NULL, '2023-09-13 22:51:14', '2023-09-13 16:51:14'),
(6, 1, 'Neville Hansen', 'cam-588448', NULL, '+1 (224) 417-2627', 'homuk@mailinator.com', '+1 (317) 896-4594', 'Saepe excepturi cons', '359', 1, NULL, NULL, '2023-09-16 17:36:37', '2023-09-16 11:36:37'),
(7, 1, 'Cynthia Blackburn', 'cam-894559', NULL, '+1 (757) 573-6114', 'xejukob@mailinator.com', '+1 (421) 703-4895', 'Ipsum nulla modi et', '903', 1, NULL, NULL, '2023-09-20 23:01:42', '2023-09-20 17:01:42'),
(8, 1, 'Rosalyn Decker', 'cam-985832', NULL, '+1 (707) 315-1284', 'rula@mailinator.com', '+1 (258) 431-7627', 'Sit deserunt sit i', '787', 1, NULL, NULL, '2023-09-23 21:57:57', '2023-09-23 15:57:57'),
(9, 1, 'Jocelyn Stevenson', 'cam-414189', NULL, '+1 (679) 964-8351', 'tidokal@mailinator.com', '+1 (558) 692-3286', 'Est molestiae tempor', '913', 1, NULL, NULL, '2023-10-12 21:13:05', '2023-10-12 15:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `car_no` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `plate_no` varchar(50) DEFAULT NULL,
  `policy_no` varchar(50) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_type_id` bigint(20) DEFAULT NULL,
  `vehicle_insurance_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `image`, `car_no`, `model`, `color`, `plate_no`, `policy_no`, `expiry_date`, `created_at`, `updated_at`, `vehicle_type_id`, `vehicle_insurance_id`) VALUES
(1, 'Craig Galloway', NULL, NULL, 'Assumenda qui consec', 'Ipsum sed temporibu', 'In exercitationem ni', NULL, NULL, '2023-07-09 14:45:56', '2023-07-09 14:45:56', NULL, NULL),
(2, 'Colby Johns', NULL, NULL, 'Iusto amet quo volu', 'Ducimus corporis no', 'Facilis voluptatem p', NULL, NULL, '2023-07-09 14:47:52', '2023-07-09 14:47:52', NULL, NULL),
(4, 'Cailin Logan', NULL, NULL, 'Modi dolor qui nulla', 'Et nulla distinctio', 'Fugit laudantium s', NULL, NULL, '2023-07-09 14:50:14', '2023-07-09 14:50:14', NULL, NULL),
(5, 'Savannah Shields', NULL, NULL, 'Vitae autem ut ut re', 'Adipisci tempore di', 'Odit voluptatem quas', NULL, NULL, '2023-07-09 14:51:44', '2023-07-09 14:51:44', NULL, NULL),
(6, 'Kevin Graves', NULL, NULL, 'Et cupiditate omnis', 'Sint aperiam quis be', 'At soluta id enim ir', NULL, NULL, '2023-07-09 15:07:17', '2023-07-09 15:07:17', NULL, NULL),
(7, 'Sage Bryant', NULL, NULL, 'Qui hic et modi ulla', 'Perferendis sunt at', 'Cupiditate excepteur', NULL, NULL, '2023-07-09 15:31:31', '2023-07-09 15:31:31', NULL, NULL),
(8, 'Jorden Kinney', NULL, NULL, 'Adipisicing mollit d', 'Sit totam qui aut eu', 'Tempore nobis magna', 'tewxtg', NULL, '2023-07-09 15:51:28', '2023-07-09 15:51:28', NULL, NULL),
(9, 'Belle Avila', NULL, NULL, 'Adipisci ut assumend', 'Sed odio cumque cupi', 'Voluptate qui offici', 'Ipsum fugit et dolo', '1997-06-28', '2023-07-09 16:20:40', '2023-07-09 16:20:40', NULL, NULL),
(10, 'Mannix Wolf', NULL, NULL, 'Quae alias aliqua T', 'Incididunt qui aut r', 'Est est fugiat veni', 'Aut earum aspernatur', '1983-03-24', '2023-07-09 16:57:10', '2023-07-09 16:57:10', NULL, NULL),
(11, 'Alexandra Harvey', NULL, NULL, 'Est et sunt lorem ni', 'Dolore officia tempo', 'Voluptas nemo aspern', 'Aliqua Natus recusa', '2023-01-27', '2023-07-09 16:57:38', '2023-07-09 16:57:38', NULL, NULL),
(12, 'Wanda Pate', NULL, NULL, 'Deserunt libero quia', 'Est voluptatibus har', 'Atque aut eu sunt qu', 'Incididunt est nostr', '2009-07-02', '2023-07-09 17:05:56', '2023-07-09 17:05:56', NULL, NULL),
(15, 'Marny Fry', NULL, NULL, 'Placeat autem harum', 'Voluptatem ut ipsum', 'Numquam et maiores m', 'Ea qui voluptates at', '1990-03-13', '2023-07-09 17:12:24', '2023-07-09 17:12:24', NULL, NULL),
(22, 'Jesse Mooney', NULL, NULL, 'Incididunt aut sit e', 'Velit ab blanditiis', 'Qui perferendis erro', 'Ullamco aut voluptat', '1997-04-27', '2023-07-12 17:05:28', '2023-07-12 17:05:28', NULL, NULL),
(23, 'Amir Long', NULL, NULL, 'Dolor qui qui ut lib', 'Nemo esse maxime vo', 'Debitis eum vero adi', 'Eu deserunt exercita', '2008-05-22', '2023-07-12 17:07:08', '2023-07-12 17:07:08', NULL, NULL),
(24, NULL, NULL, '806', 'Molestiae consequatu', 'Voluptas eaque error', 'Et molestiae unde re', NULL, NULL, '2023-08-10 19:46:05', '2023-08-10 19:46:05', NULL, NULL),
(25, NULL, NULL, '359', 'Rerum odio expedita', 'Qui quae tenetur tot', 'In aut quaerat culpa', NULL, NULL, '2023-08-11 09:44:33', '2023-08-11 09:44:33', 1, 2),
(26, 'Diana Stephenson', NULL, NULL, 'Quia aut sit vel dic', 'Reprehenderit exerc', 'Est do impedit esse', 'Accusamus molestiae', '1991-07-31', '2023-09-23 18:58:05', '2023-09-23 18:58:05', NULL, NULL),
(27, 'Chaney Stewart', NULL, NULL, 'Nam qui est laboris', 'Quaerat commodi amet', 'Quasi tempore totam', 'Facilis aut voluptat', '1981-03-13', '2023-09-30 17:35:49', '2023-09-30 17:35:49', NULL, NULL),
(28, 'Brett Burris', NULL, NULL, 'Tempora recusandae', 'Sunt esse ut accusan', 'Vel dolorem ut rerum', 'Cupiditate non ullam', '1972-01-24', '2023-10-12 17:59:53', '2023-10-12 17:59:53', NULL, NULL),
(33, 'Haviva Farley', NULL, NULL, 'Voluptatem sint per', 'Maiores est labore', 'Dolore libero non ea', 'Nobis quam laborum', '2009-11-12', '2023-10-25 15:45:01', '2023-10-25 15:45:01', NULL, NULL),
(34, 'Conan Saunders', NULL, NULL, 'Quia cupidatat digni', 'Et obcaecati consect', 'Et voluptates id in', 'Excepteur quia ad vo', '2023-02-12', '2023-10-25 15:55:10', '2023-10-25 15:55:10', NULL, NULL),
(35, 'Tamekah Hebert', NULL, NULL, 'Et voluptas inventor', 'Vitae nostrum et ver', 'Nobis esse non prov', 'Magna iste et soluta', '1987-01-25', '2023-10-25 16:54:47', '2023-10-25 16:54:47', NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:25:24', '2023-10-30 16:25:24', NULL, NULL),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:25:38', '2023-10-30 16:25:38', NULL, NULL),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:25:53', '2023-10-30 16:25:53', NULL, NULL),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:26:05', '2023-10-30 16:26:05', NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:26:19', '2023-10-30 16:26:19', NULL, NULL),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:26:35', '2023-10-30 16:26:35', NULL, NULL),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:26:49', '2023-10-30 16:26:49', NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:27:04', '2023-10-30 16:27:04', NULL, NULL),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:27:20', '2023-10-30 16:27:20', NULL, NULL),
(45, 'Mari Morse', NULL, NULL, 'Tempore ut accusamu', 'Ea et error velit qu', 'Illo illum impedit', 'Dolores non ad error', '1985-09-01', '2023-10-30 16:28:58', '2023-10-30 16:28:58', NULL, NULL),
(46, 'Chaney Frank', NULL, NULL, 'Ullamco laudantium', 'Qui mollit cum accus', 'Pariatur Voluptate', 'Temporibus nisi mole', '2000-03-03', '2023-10-30 16:29:41', '2023-10-30 16:29:41', NULL, NULL),
(47, 'Adrian Keith', NULL, NULL, 'Ut ipsum asperiores', 'Perspiciatis sapien', 'Nam esse nemo odit b', 'Sunt iste consequatu', '1981-06-18', '2023-10-30 16:30:14', '2023-10-30 16:30:14', NULL, NULL),
(48, 'Myra Olsen', NULL, NULL, 'Ut dolorum id sit a', 'Dolor nulla deleniti', 'Sed dolor similique', 'Cumque saepe asperna', '1970-04-23', '2023-10-30 16:32:56', '2023-10-30 16:32:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_mileage_logs`
--

CREATE TABLE `car_mileage_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `vehicle_id` varchar(125) NOT NULL,
  `driver_name` varchar(125) NOT NULL,
  `start_location` varchar(125) NOT NULL,
  `end_location` varchar(125) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `start_mileage` decimal(15,2) NOT NULL,
  `end_mileage` decimal(15,2) NOT NULL,
  `purpose` text NOT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chart_accounts`
--

CREATE TABLE `chart_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `account_no` varchar(125) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `category_id` bigint(20) DEFAULT '0',
  `sub_category_id` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart_accounts`
--

INSERT INTO `chart_accounts` (`id`, `school_id`, `name`, `account_no`, `created_by`, `created_at`, `updated_at`, `level`, `status`, `category_id`, `sub_category_id`) VALUES
(1, 1, 'Account 1', 'a0001', 2, '2023-04-04 18:03:21', '2023-04-04 18:03:21', NULL, 'active', 15, 16),
(2, 1, 'account 2', 'fsaf45', 2, '2023-04-04 18:03:47', '2023-04-04 18:03:47', NULL, 'active', 15, 16),
(3, 1, 'Bank 1', 'fsfsadfsadfsf', 2, '2023-04-13 11:40:07', '2023-04-13 11:40:07', NULL, 'active', 15, 16),
(7, 1, 'Charde Frost', 'In ratione enim elit', 2, '2023-09-23 17:59:58', '2023-09-23 17:59:58', NULL, 'active', 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chart_account_categories`
--

CREATE TABLE `chart_account_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart_account_categories`
--

INSERT INTO `chart_account_categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `school_id`) VALUES
(2, 'Current Liabilities', NULL, '2023-03-28 18:19:55', '2023-03-28 18:19:55', 1),
(8, 'Fixed assets', NULL, '2023-03-30 20:29:56', '2023-03-30 20:29:56', 1),
(9, 'Other assets', NULL, '2023-03-30 20:30:15', '2023-03-30 20:30:15', 1),
(11, 'Long-term Liabilities ', NULL, '2023-03-30 20:30:49', '2023-03-30 20:30:49', 1),
(12, 'Stockholders\' Equity', NULL, '2023-03-30 20:31:08', '2023-03-30 20:31:08', 1),
(13, 'Revenues ', NULL, '2023-03-30 20:31:22', '2023-03-30 20:31:22', 1),
(14, 'Expenses', NULL, '2023-03-30 20:31:35', '2023-03-30 20:31:35', 1),
(15, 'Current Assets', NULL, '2023-03-30 20:32:49', '2023-03-30 20:32:49', 1),
(16, 'Bank Accounts', 15, '2023-03-30 20:33:03', '2023-03-30 20:33:03', 1),
(17, 'Land', 8, '2023-04-13 19:22:56', '2023-04-13 19:22:56', 1),
(18, 'John Lambert', 12, '2023-09-23 18:01:55', '2023-09-23 18:01:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes_scheduled_days`
--

CREATE TABLE `classes_scheduled_days` (
  `id` int(11) NOT NULL,
  `class_schedule_no` varchar(125) DEFAULT NULL,
  `class_schedule_topic` varchar(256) DEFAULT NULL,
  `class_schedule_date` date DEFAULT NULL,
  `class_schedule_day` varchar(125) DEFAULT NULL,
  `class_schedule_time_from` time DEFAULT NULL,
  `class_schedule_time_to` time DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes_scheduled_days`
--

INSERT INTO `classes_scheduled_days` (`id`, `class_schedule_no`, `class_schedule_topic`, `class_schedule_date`, `class_schedule_day`, `class_schedule_time_from`, `class_schedule_time_to`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, '23', 'Eligendi delectus q', '2018-08-21', 'Saturday', '09:34:00', '07:08:00', 1, NULL, NULL, '2023-03-13 10:40:46', '2023-03-13 10:40:46'),
(8, '22', 'Fay Russo', '2022-03-10', 'Sunday', '19:23:00', '06:23:00', 1, NULL, NULL, '2023-03-16 06:01:31', '2023-03-16 06:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `classes_schedules`
--

CREATE TABLE `classes_schedules` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `class_no` varchar(125) DEFAULT NULL,
  `campus` int(11) DEFAULT NULL,
  `from_date` varchar(125) DEFAULT NULL,
  `to_date` varchar(125) DEFAULT NULL,
  `from_time` varchar(125) DEFAULT NULL,
  `to_time` varchar(125) DEFAULT NULL,
  `course_code` int(11) DEFAULT NULL,
  `teacher_instructor_name` int(11) DEFAULT NULL,
  `created_by` varchar(125) DEFAULT NULL,
  `updated_by` varchar(125) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes_schedules`
--

INSERT INTO `classes_schedules` (`id`, `school_id`, `class_no`, `campus`, `from_date`, `to_date`, `from_time`, `to_time`, `course_code`, `teacher_instructor_name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Class12', 2, '2019-07-01', '2019-09-30', '7:00 AM', '4:00 PM', 1, 10, NULL, '2', '2022-12-29 01:47:57', '2022-12-28 20:36:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `classroom_no` varchar(100) NOT NULL,
  `classroom_category` tinyint(2) DEFAULT NULL COMMENT '1=Actual 2=Virtual ',
  `classroom_type` int(11) DEFAULT NULL,
  `teacher_instructor_qty` varchar(125) DEFAULT NULL,
  `teacher_instructor_assistant_qty` varchar(125) DEFAULT NULL,
  `typical_student_qty` varchar(125) DEFAULT NULL,
  `handicapped_students_qty` varchar(125) DEFAULT NULL,
  `special_needs_students_qty` varchar(125) DEFAULT NULL,
  `visitors_qty` varchar(125) DEFAULT NULL,
  `guest_qty` varchar(125) DEFAULT NULL,
  `total_qty` varchar(125) DEFAULT NULL,
  `campus` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT ' 0=In-Active, 1=Active',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `school_id`, `classroom_no`, `classroom_category`, `classroom_type`, `teacher_instructor_qty`, `teacher_instructor_assistant_qty`, `typical_student_qty`, `handicapped_students_qty`, `special_needs_students_qty`, `visitors_qty`, `guest_qty`, `total_qty`, `campus`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(17, 1, '790', 1, 9, '491', '458', '213', '862', '11', '67', '654', '453', 2, 1, NULL, NULL, '2023-03-12 13:21:23', '2023-03-12 13:21:23'),
(18, 1, '205', 2, 7, '850', '302', '189', '71', '488', '442', '627', '726', 3, 1, NULL, 2, '2023-03-12 13:26:52', '2023-04-08 09:08:28'),
(19, 1, '310', 1, 4, '371', '246', '538', '368', '855', '899', '412', '470', 1, 1, 2, 2, '2023-04-08 09:04:37', '2023-04-08 09:04:37'),
(20, 1, 'Rerum nihil quod dol', 2, 7, '520', '429', '587', '892', '624', '385', '78', '553', 4, 1, 2, 2, '2023-09-23 19:04:55', '2023-09-23 19:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_fixed_assets`
--

CREATE TABLE `classroom_fixed_assets` (
  `id` int(11) NOT NULL,
  `asset_name` varchar(125) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `model` varchar(125) DEFAULT NULL,
  `color` varchar(125) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `serial_number` varchar(125) DEFAULT NULL,
  `asset_condition` varchar(125) DEFAULT NULL,
  `comment` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_fixed_assets`
--

INSERT INTO `classroom_fixed_assets` (`id`, `asset_name`, `quantity`, `name`, `model`, `color`, `size`, `serial_number`, `asset_condition`, `comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(19, '6', '779', 'Urielle Thornton', 'Soluta sint qui veri', 'Est et consectetur', 'Deleniti tempore vo', '82', 'Distinctio Ex quis', 'Obcaecati proident', 1, NULL, NULL, '2023-03-12 13:21:23', '2023-03-12 13:21:23'),
(20, '7', '160', 'Ciaran Rogers', 'Nisi numquam est dig', 'Laborum Laboriosam', 'Eaque est sit conse', '342', 'Dignissimos veritati', 'Ut quisquam enim duc', 1, NULL, NULL, '2023-03-12 13:26:52', '2023-03-15 06:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_for_accounting`
--

CREATE TABLE `classroom_for_accounting` (
  `id` int(11) NOT NULL,
  `account_no` varchar(125) DEFAULT NULL,
  `cost_center` varchar(125) DEFAULT NULL,
  `income_center` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_for_accounting`
--

INSERT INTO `classroom_for_accounting` (`id`, `account_no`, `cost_center`, `income_center`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, '435984533', 'Iure est illo digni', '728', 1, NULL, NULL, '2023-03-12 13:21:23', '2023-03-12 13:21:23'),
(10, 'Aut commodi rerum an', 'Quis est sapiente ip', '795', 1, NULL, NULL, '2023-03-12 13:26:52', '2023-03-15 06:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_safety_and_security_devices`
--

CREATE TABLE `classroom_safety_and_security_devices` (
  `id` int(11) NOT NULL,
  `safety_item` int(11) DEFAULT NULL,
  `campus` int(11) DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `serial_no` varchar(125) DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `renew_date` timestamp NULL DEFAULT NULL,
  `inspection_cycle` varchar(125) DEFAULT NULL,
  `inspection_due_on` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_safety_and_security_devices`
--

INSERT INTO `classroom_safety_and_security_devices` (`id`, `safety_item`, `campus`, `qty`, `serial_no`, `expiry_date`, `renew_date`, `inspection_cycle`, `inspection_due_on`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, 8, 2, '493', 'Cillum et non et mag', '2017-12-22 14:34:00', '1992-02-16 08:57:00', 'Molestias quis aute', 'Voluptatem reiciendi', 1, NULL, NULL, '2023-03-12 13:21:23', '2023-03-12 13:21:23'),
(10, 5, 1, '562', 'Dolor aliquip esse', '2020-08-27 21:51:00', '2008-12-19 12:03:00', 'Eum maxime enim sit', 'Quis esse ea fugiat', 1, NULL, NULL, '2023-03-12 13:26:52', '2023-03-15 06:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_seats`
--

CREATE TABLE `classroom_seats` (
  `id` int(11) NOT NULL,
  `seat_no` varchar(125) DEFAULT NULL,
  `occupant` int(11) DEFAULT NULL,
  `id_no` varchar(125) DEFAULT NULL,
  `first_name` varchar(125) DEFAULT NULL,
  `middle_name` varchar(125) DEFAULT NULL,
  `last_name` varchar(125) DEFAULT NULL,
  `photo` text,
  `ph_no` varchar(125) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `student_type` varchar(125) DEFAULT NULL,
  `seat_status` varchar(125) DEFAULT NULL,
  `comments` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_seats`
--

INSERT INTO `classroom_seats` (`id`, `seat_no`, `occupant`, `id_no`, `first_name`, `middle_name`, `last_name`, `photo`, `ph_no`, `email`, `student_type`, `seat_status`, `comments`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(15, 'Modi ullam doloremqu', 1, 'Et officia sit quam', 'Oprah', 'Dillon Garrett', 'Irwin', 'public/assets/uploads/ClassroomSeat/2023/1678627283.jpg', '+1 (587) 768-8952', 'gyseqav@mailinator.com', 'Typical', 'Reserved', 'Corporis ex non non', 1, NULL, NULL, '2023-03-12 13:21:23', '2023-03-12 13:21:23'),
(16, 'Aut incidunt nobis', 5, 'Magni molestiae mole', 'George', 'Idona Jenkins', 'Jennings', NULL, '+1 (667) 378-1584', 'hifewosyfi@mailinator.com', 'Special Needs', 'Vacant', 'Dolore voluptas tene', 1, NULL, NULL, '2023-03-12 13:24:29', '2023-03-12 13:24:29'),
(17, 'Maiores ea dolor cup', 3, 'Duis et ad aliquip q', 'Blaine', 'Jerome Malone', 'Webb', 'public/assets/uploads/ClassroomSeat/2023/1678860454.jpg', '+1 (759) 949-1562', 'lydy@mailinator.com', 'Typical', 'Occupied', 'Aspernatur ut duis v', 1, NULL, NULL, '2023-03-12 13:26:52', '2023-03-15 06:07:34'),
(18, 'Ut sit accusamus qu', 3, 'Sed reprehenderit e', 'Cassandra', 'Alice Moody', 'Suarez', 'public/assets/uploads/ClassroomSeat/2023/1678860233.jpg', '+1 (624) 903-2974', 'zozytuh@mailinator.com', 'Special Needs', 'Reserved', 'Illum quia aut volu', 1, NULL, NULL, '2023-03-15 06:02:53', '2023-03-15 06:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_type`
--

CREATE TABLE `classroom_type` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_type`
--

INSERT INTO `classroom_type` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Lecture  ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Case Study  ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Competition ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Dialog', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Interactive Computer  ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Opened area', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Seminar ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Traditional ', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Training', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Workshop', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Other ( Please specify )', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `class_attendances`
--

CREATE TABLE `class_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_hanged_up` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_attendances`
--

INSERT INTO `class_attendances` (`id`, `school_id`, `class_id`, `student_id`, `date`, `type`, `created_at`, `updated_at`, `is_hanged_up`) VALUES
(51, 1, 18, 41, '2023-05-10', 'present', '2023-05-10 07:40:33', '2023-05-10 07:40:33', 1),
(52, 1, 18, 39, '2023-05-10', 'present', '2023-05-10 07:40:33', '2023-05-10 07:40:33', 0),
(53, 1, 18, 40, '2023-05-10', 'absent', '2023-05-10 07:40:33', '2023-05-10 07:40:33', 1),
(54, 1, 18, 42, '2023-05-10', 'present', '2023-05-10 07:40:33', '2023-05-10 07:40:33', 0),
(55, 1, 18, 43, '2023-05-10', 'absent', '2023-05-10 07:40:33', '2023-05-10 07:40:33', 0),
(56, 1, 18, 44, '2023-05-10', 'absent', '2023-05-10 07:40:33', '2023-05-10 07:40:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_closed_days`
--

CREATE TABLE `class_closed_days` (
  `id` int(11) NOT NULL,
  `close_date` timestamp NULL DEFAULT NULL,
  `description` text,
  `comment` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_closed_days`
--

INSERT INTO `class_closed_days` (`id`, `close_date`, `description`, `comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, '2023-03-30 07:01:00', 'Sapiente sint rerum', 'Officia qui magna ip', 1, NULL, NULL, '2023-03-13 10:40:46', '2023-03-16 07:01:53'),
(8, '2004-04-19 18:00:00', 'Magni sunt vel quis', 'Et eius adipisci dol', 1, NULL, NULL, '2023-03-16 06:01:31', '2023-03-16 06:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `class_schedules`
--

CREATE TABLE `class_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `type` enum('weekly','daily') NOT NULL,
  `day` varchar(125) NOT NULL,
  `room_id` bigint(20) DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_schedules`
--

INSERT INTO `class_schedules` (`id`, `school_id`, `class_id`, `type`, `day`, `room_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(10, 1, 17, 'weekly', 'mon', 17, '13:00:00', '14:00:00', '2023-05-07 17:57:13', '2023-05-07 17:57:13'),
(11, 1, 17, 'weekly', 'wed', 17, '14:00:00', '15:00:00', '2023-05-07 17:57:13', '2023-05-07 17:57:13'),
(12, 1, 17, 'weekly', 'fri', 17, '12:00:00', '13:00:00', '2023-05-07 17:57:13', '2023-05-07 17:57:13'),
(13, 1, 17, 'daily', '2023-05-11', 17, '21:21:00', '21:20:00', '2023-05-09 15:18:49', '2023-05-09 15:18:49'),
(36, 1, 19, 'daily', '2023-05-11', 17, '10:31:00', '10:31:00', '2023-05-10 05:04:26', '2023-05-10 05:04:26'),
(37, 1, 19, 'daily', '2023-05-16', 18, '10:31:00', '10:31:00', '2023-05-10 05:04:26', '2023-05-10 05:04:26'),
(38, 1, 19, 'daily', '2023-05-25', 18, '10:00:00', '10:01:00', '2023-05-10 05:04:26', '2023-05-10 05:04:26'),
(39, 1, 19, 'daily', '2023-05-27', 18, '10:01:00', '10:02:00', '2023-05-10 05:04:26', '2023-05-10 05:04:26'),
(44, 1, 18, 'daily', '2023-05-04', 18, '19:57:00', '19:58:00', '2023-05-24 13:55:58', '2023-05-24 13:55:58'),
(45, 1, 18, 'daily', '2023-05-25', 17, '19:59:00', '19:59:00', '2023-05-24 13:55:58', '2023-05-24 13:55:58'),
(46, 1, 24, 'daily', '2023-05-10', 18, '21:38:00', '19:42:00', '2023-05-24 14:03:48', '2023-05-24 14:03:48'),
(47, 1, 24, 'daily', '2023-05-17', 18, '19:41:00', '19:42:00', '2023-05-24 14:03:48', '2023-05-24 14:03:48'),
(48, 1, 24, 'daily', '2023-05-10', 18, '19:40:00', '19:41:00', '2023-05-24 14:03:48', '2023-05-24 14:03:48'),
(49, 1, 24, 'daily', '2023-05-26', 19, '20:07:00', '13:03:00', '2023-05-24 14:03:48', '2023-05-24 14:03:48'),
(50, 1, 25, 'weekly', 'tue', 18, '23:44:00', '23:45:00', '2023-06-09 17:40:32', '2023-06-09 17:40:32'),
(51, 1, 25, 'weekly', 'tue', 19, '23:45:00', '23:45:00', '2023-06-09 17:40:32', '2023-06-09 17:40:32'),
(52, 1, 29, 'daily', '2023-09-20', 18, '01:08:00', '01:12:00', '2023-09-23 19:08:25', '2023-09-23 19:08:25'),
(53, 1, 23, 'daily', '2023-05-26', 19, '18:31:00', '22:28:00', '2023-10-12 17:57:40', '2023-10-12 17:57:40'),
(54, 1, 23, 'daily', '2023-10-13', 19, '13:57:00', '14:57:00', '2023-10-12 17:57:40', '2023-10-12 17:57:40'),
(55, 1, 30, 'weekly', 'mon', 18, '13:40:00', '14:30:00', '2023-10-30 16:37:42', '2023-10-30 16:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `closing_in_education_team`
--

CREATE TABLE `closing_in_education_team` (
  `id` int(11) NOT NULL,
  `closing_position` int(11) DEFAULT NULL,
  `closing_user_id` int(11) DEFAULT NULL,
  `closing_email` varchar(125) DEFAULT NULL,
  `closing_message` text,
  `closing_date` timestamp NULL DEFAULT NULL,
  `closing_reason` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closing_in_education_team`
--

INSERT INTO `closing_in_education_team` (`id`, `closing_position`, `closing_user_id`, `closing_email`, `closing_message`, `closing_date`, `closing_reason`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-30 22:47:38', '2023-05-30 16:47:38'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-05-30 23:13:45', '2023-05-30 17:13:45'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-05-30 23:14:14', '2023-05-30 17:14:14'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-10-12 21:30:49', '2023-10-12 15:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `legal_name` varchar(125) NOT NULL,
  `registration_no` varchar(125) NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `legal_name`, `registration_no`, `school_id`, `address_id`, `contact_id`, `created_at`, `updated_at`) VALUES
(1, 'Merrill Tanner', 'Minim elit quae vel', 11, 278, 172, '2023-07-05 20:10:17', '2023-07-05 20:10:17'),
(2, 'Kay Sparks', 'Non ex doloribus ver', 11, 279, 173, '2023-07-05 20:11:27', '2023-07-05 20:11:27'),
(3, 'Elmo Gillespie', 'Labore ut ipsum quid', 14, 324, 257, '2023-07-10 12:06:56', '2023-07-10 12:06:56'),
(4, 'Carissa Gates', 'Nobis laudantium ve', 22, 332, 260, '2023-07-10 15:31:44', '2023-07-10 15:31:44'),
(5, 'Mercedes Walter', 'Voluptas harum nulla', 22, 333, 261, '2023-07-10 15:32:03', '2023-07-10 15:32:03'),
(6, 'Aphrodite Guerrero', 'Ullamco voluptate ni', 22, 334, 262, '2023-07-10 15:33:14', '2023-07-10 15:33:14'),
(7, 'Zena Alford', 'Officia voluptate ad', 22, 335, 263, '2023-07-10 15:34:23', '2023-07-10 15:34:23'),
(8, 'Connor Coleman', 'Expedita lorem tempo', 22, 336, 264, '2023-07-10 15:35:25', '2023-07-10 15:35:25'),
(11, 'Tallulah Cline', 'Magni sit quas at ne', 22, 339, 267, '2023-07-10 15:38:21', '2023-07-10 15:38:21'),
(12, 'Kirby Farrell', 'Molestiae exercitati', 24, 345, 282, '2023-07-12 15:06:29', '2023-07-12 15:06:29'),
(13, 'Brady Whitehead', 'Consectetur eaque om', 25, 347, 285, '2023-07-12 15:15:23', '2023-07-12 15:15:23'),
(14, 'Gillian Hopkins', 'Incididunt adipisci', 26, 364, 310, '2023-07-20 16:08:02', '2023-07-20 16:08:02'),
(15, 'Macon Lopez', 'Nihil placeat volup', 27, 366, 312, '2023-07-20 17:14:22', '2023-07-20 17:14:22'),
(16, 'Amos Powers', 'Velit non est sunt', 28, 416, 360, '2023-09-29 17:30:59', '2023-09-29 17:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `phone` varchar(125) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `mobile` varchar(125) DEFAULT NULL,
  `website` varchar(125) DEFAULT NULL,
  `fax` varchar(125) DEFAULT NULL,
  `office` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `emergency_phone` varchar(50) DEFAULT NULL,
  `is_cp` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `school_id`, `name`, `phone`, `email`, `mobile`, `website`, `fax`, `office`, `created_at`, `updated_at`, `relation`, `address`, `image`, `user_id`, `type`, `emergency_phone`, `is_cp`) VALUES
(1, 1, NULL, '+1 (153) 592-5481', 'cihulu@mailinator.com', 'Ullamco omnis labore', 'https://www.bikibejybedopas.tv', '+1 (922) 356-1781', '+1 (411) 188-5372', '2023-03-22 15:10:02', '2023-03-22 15:10:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, NULL, '+1 (569) 999-2872', 'xohegosi@mailinator.com', 'Reprehenderit aliqu', 'https://www.tyloxu.mobi', '+1 (406) 928-1252', '+1 (364) 861-8354', '2023-03-22 15:11:14', '2023-03-22 15:11:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, NULL, '+1 (955) 113-1465', 'mopic@mailinator.com', 'Quia sequi qui simil', 'https://www.byjem.org.uk', '+1 (513) 585-3837', '+1 (798) 624-8716', '2023-03-22 15:12:08', '2023-03-22 15:12:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, '+1 (833) 608-5134', 'leresumuha@mailinator.com', 'Iste id iure pariatu', 'https://www.bidoxytetyrox.ca', '+1 (831) 529-2157', '+1 (958) 807-4104', '2023-03-22 15:12:08', '2023-03-22 15:12:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, NULL, NULL, NULL, 'Quia est est rerum e', 'https://www.qujenis.org.uk', '+1 (989) 269-6673', '+1 (619) 944-8323', '2023-03-22 15:13:16', '2023-07-10 16:28:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, NULL, '+1 (234) 959-7809', 'qydeqam@mailinator.com', 'Et sint laborum cons', 'https://www.dicijeryjyp.ca', '+1 (599) 648-3854', '+1 (815) 361-9819', '2023-03-22 15:13:16', '2023-03-22 15:13:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, NULL, '+1 (863) 727-1445', 'pumamep@mailinator.com', 'Quasi labore suscipi', 'https://www.peryxolicycum.com.au', '+1 (641) 215-8046', '+1 (671) 339-9041', '2023-03-22 15:17:38', '2023-03-22 15:17:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, NULL, '+1 (473) 291-4762', 'maxelo@mailinator.com', 'Occaecat ullam id li', 'https://www.gasamajubewib.com.au', '+1 (884) 764-8635', '+1 (589) 907-3426', '2023-03-22 15:17:38', '2023-03-22 15:17:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, NULL, '+1 (143) 122-1022', 'hehyx@mailinator.com', 'Nisi eaque elit ea', 'https://www.tumohage.com.au', '+1 (392) 989-3317', '+1 (819) 891-7459', '2023-03-22 15:17:57', '2023-03-22 15:17:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, NULL, '+1 (614) 808-3112', 'tisene@mailinator.com', 'Ut ut omnis sit sit', 'https://www.namefecumicyziz.tv', '+1 (899) 112-1568', '+1 (253) 417-1495', '2023-03-22 15:17:58', '2023-03-22 15:17:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, NULL, '+1 (159) 243-9941', 'pizovasoba@mailinator.com', 'Quis non ex vitae ab', 'https://www.rocul.in', '+1 (694) 178-5986', '+1 (705) 655-5053', '2023-03-22 15:19:29', '2023-03-22 15:19:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, NULL, '+1 (462) 864-8304', 'gosur@mailinator.com', 'Quasi odit eligendi', 'https://www.qobiqezi.cm', '+1 (946) 264-7869', '+1 (114) 178-9579', '2023-03-22 15:19:29', '2023-03-22 15:19:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, NULL, '+1 (784) 393-6218', 'juvacitebe@mailinator.com', 'Aut non ut quis amet', NULL, '+1 (272) 684-6849', '+1 (567) 208-1806', '2023-03-22 15:19:29', '2023-03-22 15:19:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, NULL, '+1 (235) 269-4691', 'hoziheg@mailinator.com', 'Laboriosam ut est', 'https://www.myhiwaxigy.org.au', '+1 (438) 378-9949', '+1 (694) 441-6742', '2023-03-22 15:22:00', '2023-03-22 15:22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, NULL, '+1 (945) 911-6401', 'lyheqe@mailinator.com', 'Quibusdam perspiciat', 'https://www.reqivolupe.co.uk', '+1 (416) 916-9705', '+1 (883) 192-1055', '2023-03-22 15:22:00', '2023-03-22 15:22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, NULL, '+1 (722) 328-1056', 'nixihidat@mailinator.com', 'Qui odio dolor dolor', NULL, '+1 (819) 278-1396', '+1 (583) 647-8332', '2023-03-22 15:22:00', '2023-03-22 15:22:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, NULL, '+1 (996) 389-4652', 'pyvomite@mailinator.com', 'Quo voluptate do tot', 'https://www.poban.cc', '+1 (587) 628-4572', '+1 (446) 802-5748', '2023-03-22 15:23:18', '2023-03-22 15:23:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, NULL, '+1 (279) 455-6662', 'sahe@mailinator.com', 'Ullam laborum eum te', 'https://www.jyfemel.net', '+1 (163) 852-1693', '+1 (979) 791-4238', '2023-03-22 15:23:18', '2023-03-22 15:23:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, NULL, '+1 (504) 812-7733', 'myren@mailinator.com', 'Labore dolor similiq', NULL, '+1 (142) 538-3182', '+1 (298) 739-2139', '2023-03-22 15:23:18', '2023-03-22 15:23:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, NULL, '+1 (998) 563-4171', 'fyfuwo@mailinator.com', 'Magna enim quaerat q', 'https://www.maruhyj.cm', '+1 (544) 163-9088', '+1 (114) 413-3829', '2023-03-22 15:24:34', '2023-03-22 15:24:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, NULL, '+1 (376) 748-8836', 'soxavamy@mailinator.com', 'Voluptatem Cillum i', 'https://www.xukavivehynemyc.ca', '+1 (375) 766-6493', '+1 (822) 127-7203', '2023-03-22 15:24:34', '2023-03-22 15:24:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, NULL, '+1 (358) 404-8102', 'zepujy@mailinator.com', 'Minim exercitation v', NULL, '+1 (635) 215-6253', '+1 (287) 994-7047', '2023-03-22 15:24:34', '2023-03-22 15:24:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, NULL, '+1 (216) 456-8655', 'voqew@mailinator.com', 'Dolore voluptatem ve', 'https://www.gicugypubywynu.tv', '+1 (195) 774-7376', '+1 (976) 804-4317', '2023-03-22 15:25:10', '2023-03-22 15:25:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, NULL, '+1 (701) 254-2211', 'dejasyqy@mailinator.com', 'Accusamus sunt atque', 'https://www.hakulubimyva.us', '+1 (272) 956-3945', '+1 (101) 584-1446', '2023-03-22 15:25:10', '2023-03-22 15:25:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, NULL, '+1 (712) 993-1289', 'busixo@mailinator.com', 'Qui reprehenderit q', NULL, '+1 (399) 612-2343', '+1 (772) 157-1131', '2023-03-22 15:25:10', '2023-03-22 15:25:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, NULL, '+1 (737) 646-1698', 'vodyke@mailinator.com', 'Deserunt illum id o', 'https://www.cozavorywugixiq.org', '+1 (264) 519-7389', '+1 (461) 323-5017', '2023-03-22 15:25:10', '2023-03-22 15:25:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, NULL, '+1 (325) 771-6836', 'tykysera@mailinator.com', 'Amet omnis et ad ea', 'https://www.fytumasyxo.ws', '+1 (233) 517-9343', '+1 (139) 276-8863', '2023-03-22 15:25:48', '2023-03-22 15:25:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, NULL, '+1 (448) 816-3523', 'tawiba@mailinator.com', 'Temporibus et evenie', 'https://www.hykelute.in', '+1 (639) 395-5774', '+1 (675) 286-5202', '2023-03-22 15:25:48', '2023-03-22 15:25:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, NULL, '+1 (449) 248-9069', 'sujafok@mailinator.com', 'Dolores eum voluptat', NULL, '+1 (439) 228-2296', '+1 (585) 977-5966', '2023-03-22 15:25:48', '2023-03-22 15:25:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, NULL, '+1 (691) 854-6571', 'rypytefetu@mailinator.com', 'Corporis est in sed', 'https://www.kawazuryne.com', '+1 (189) 311-3349', '+1 (587) 752-2984', '2023-03-22 15:25:48', '2023-03-22 15:25:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, NULL, '+1 (442) 936-2109', 'xijegikox@mailinator.com', 'Quas pariatur Corru', 'https://www.suhiwenapykujyl.me', '+1 (952) 981-7409', '+1 (151) 775-2604', '2023-03-22 16:00:10', '2023-03-22 16:00:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, NULL, '+1 (574) 803-3988', 'hijoly@mailinator.com', 'Eos tempor consequa', 'https://www.rikaziniz.mobi', '+1 (389) 432-5964', '+1 (437) 321-2273', '2023-03-22 16:00:10', '2023-03-22 16:00:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1, NULL, '+1 (131) 916-2693', 'xunis@mailinator.com', 'Fugiat aperiam omni', NULL, '+1 (621) 735-1929', '+1 (571) 982-5872', '2023-03-22 16:00:10', '2023-03-22 16:00:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, NULL, '+1 (957) 687-8597', 'ninasazi@mailinator.com', 'Libero neque in repr', 'https://www.junocukoxipa.info', '+1 (662) 684-8798', '+1 (284) 365-6833', '2023-03-22 16:00:10', '2023-03-22 16:00:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1, NULL, '+1 (891) 325-4242', 'wytafoho@mailinator.com', 'Et temporibus distin', 'https://www.qevukuby.com.au', '+1 (582) 208-4096', '+1 (349) 794-6302', '2023-03-22 16:51:44', '2023-03-22 16:51:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 1, NULL, '+1 (649) 305-1045', 'pijezi@mailinator.com', 'Saepe non quia magni', 'https://www.mimocidybade.co.uk', '+1 (952) 819-9151', '+1 (705) 278-6931', '2023-03-22 16:51:44', '2023-03-22 16:51:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, NULL, '+1 (804) 772-1004', 'duvyw@mailinator.com', 'Recusandae Doloremq', NULL, '+1 (818) 744-4121', '+1 (444) 402-7899', '2023-03-22 16:51:44', '2023-03-22 16:51:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, NULL, '+1 (535) 709-3367', 'qina@mailinator.com', 'Aspernatur consequat', 'https://www.wikenipivojyzo.cm', '+1 (346) 103-4632', '+1 (747) 254-3049', '2023-03-22 16:51:44', '2023-03-22 16:51:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, NULL, '+1 (395) 997-8778', 'xofonolesi@mailinator.com', 'Mollitia et sit dig', 'https://www.logilaquvy.org', '+1 (269) 359-9138', '+1 (405) 204-5987', '2023-03-22 16:54:36', '2023-03-22 16:54:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 1, NULL, '+1 (774) 563-1779', 'nepyronig@mailinator.com', 'Ex consectetur labo', 'https://www.qivigohipije.cc', '+1 (791) 381-8622', '+1 (684) 127-1138', '2023-03-22 16:54:36', '2023-03-22 16:54:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 1, NULL, '+1 (522) 399-4656', 'zixu@mailinator.com', 'Placeat reprehender', NULL, '+1 (631) 924-4783', '+1 (961) 428-2327', '2023-03-22 16:54:36', '2023-03-22 16:54:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 1, NULL, '+1 (982) 474-1021', 'vaweqyhohi@mailinator.com', 'Dolor elit officiis', 'https://www.cojogoqadetavo.com.au', '+1 (483) 992-4495', '+1 (397) 889-2861', '2023-03-22 16:54:36', '2023-03-22 16:54:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 1, NULL, '+1 (668) 651-6315', 'lejyhavu@mailinator.com', 'Voluptatem et culpa', 'https://www.syfozaqamobu.cc', '+1 (406) 511-8703', '+1 (206) 718-4395', '2023-03-22 16:55:52', '2023-03-22 16:55:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 1, NULL, '+1 (797) 513-8927', 'rizoha@mailinator.com', 'Voluptate maxime com', 'https://www.retyjycaqap.org', '+1 (155) 745-3723', '+1 (788) 725-1179', '2023-03-22 16:55:52', '2023-03-22 16:55:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 1, NULL, '+1 (874) 693-8757', 'zexohuzoqa@mailinator.com', 'Est eos et laudanti', NULL, '+1 (861) 264-1882', '+1 (602) 987-4028', '2023-03-22 16:55:52', '2023-03-22 16:55:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 1, NULL, '+1 (217) 866-9638', 'vegybuj@mailinator.com', 'Aut anim voluptas ob', 'https://www.jyxav.cm', '+1 (339) 924-4001', '+1 (776) 339-7659', '2023-03-22 16:55:52', '2023-03-22 16:55:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 1, NULL, '+1 (342) 244-6794', 'wedare@mailinator.com', 'Aut distinctio Cons', 'https://www.xipe.cc', '+1 (441) 896-7127', '+1 (966) 625-5632', '2023-03-23 12:29:21', '2023-03-23 12:29:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 1, NULL, '+1 (682) 591-7803', 'hacapumuni@mailinator.com', 'Ipsa culpa Nam sit', 'https://www.jywec.co.uk', '+1 (621) 141-7529', '+1 (809) 941-1353', '2023-03-23 12:29:21', '2023-03-23 12:29:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 1, NULL, '+1 (381) 804-2732', 'tovefi@mailinator.com', 'Quam officiis non di', NULL, '+1 (612) 733-2394', '+1 (472) 546-6841', '2023-03-23 12:29:21', '2023-03-23 12:29:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 1, NULL, '+1 (772) 665-9659', 'dabyzolaj@mailinator.com', 'Occaecat deserunt in', 'https://www.cyrileru.info', '+1 (322) 185-7595', '+1 (765) 251-3986', '2023-03-23 12:29:21', '2023-03-23 12:29:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 1, NULL, '+1 (342) 244-6794', 'wedare@mailinator.com', 'Aut distinctio Cons', 'https://www.xipe.cc', '+1 (441) 896-7127', '+1 (966) 625-5632', '2023-03-23 12:31:04', '2023-03-23 12:31:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 1, NULL, '+1 (682) 591-7803', 'hacapumuni@mailinator.com', 'Ipsa culpa Nam sit', 'https://www.jywec.co.uk', '+1 (621) 141-7529', '+1 (809) 941-1353', '2023-03-23 12:31:04', '2023-03-23 12:31:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 1, NULL, '+1 (381) 804-2732', 'tovefi@mailinator.com', 'Quam officiis non di', NULL, '+1 (612) 733-2394', '+1 (472) 546-6841', '2023-03-23 12:31:04', '2023-03-23 12:31:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 1, NULL, '+1 (772) 665-9659', 'dabyzolaj@mailinator.com', 'Occaecat deserunt in', 'https://www.cyrileru.info', '+1 (322) 185-7595', '+1 (765) 251-3986', '2023-03-23 12:31:04', '2023-03-23 12:31:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 1, NULL, '+1 (118) 568-3928', 'muzyhefar@mailinator.com', 'Aliquid impedit odi', 'https://www.joxido.mobi', '+1 (843) 323-7336', '+1 (385) 959-2979', '2023-03-24 16:18:06', '2023-03-24 16:18:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 1, NULL, '+1 (364) 629-2808', 'qazuhi@mailinator.com', 'Commodi ipsa aut no', 'https://www.muzapyq.mobi', '+1 (208) 818-1043', '+1 (503) 621-1574', '2023-03-24 16:18:06', '2023-03-24 16:18:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 1, NULL, '+1 (926) 827-8768', 'jyho@mailinator.com', 'Libero ad velit cons', NULL, '+1 (156) 383-1537', '+1 (257) 189-7238', '2023-03-24 16:18:06', '2023-03-24 16:18:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 1, NULL, '+1 (109) 789-5125', 'dahu@mailinator.com', 'Recusandae Est quas', 'https://www.kijepijevetefy.co.uk', '+1 (214) 278-3352', '+1 (869) 422-1977', '2023-03-24 16:18:06', '2023-03-24 16:18:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 1, NULL, '+1 (603) 592-9724', 'zacew@mailinator.com', 'Ex quia culpa omnis', 'https://www.kojegypeluxatoh.org.uk', '+1 (976) 237-5887', '+1 (398) 148-3501', '2023-03-24 16:52:47', '2023-03-24 16:52:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 1, NULL, '+1 (168) 228-8538', 'tacosevyt@mailinator.com', 'Adipisicing quaerat', 'https://www.lecy.ws', '+1 (601) 419-1053', '+1 (222) 794-6614', '2023-03-24 16:52:47', '2023-03-24 16:52:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 1, NULL, '+1 (388) 421-4304', 'xatelu@mailinator.com', 'Quia sit reiciendis', NULL, '+1 (984) 967-8883', '+1 (663) 256-8799', '2023-03-24 16:52:47', '2023-03-24 16:52:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 1, NULL, '+1 (583) 562-6417', 'hocuzi@mailinator.com', 'Et voluptas hic modi', 'https://www.tybihyx.us', '+1 (853) 267-6341', '+1 (409) 971-4449', '2023-03-24 16:52:47', '2023-03-24 16:52:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 1, NULL, '+1 (279) 871-2074', 'nyqydo@mailinator.com', 'Aut rerum duis do do', 'https://www.tydixapymipefav.com.au', '+1 (701) 203-9929', '+1 (667) 777-6532', '2023-04-04 15:04:40', '2023-04-04 15:04:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 1, NULL, '+1 (599) 185-4041', 'meruxe@mailinator.com', 'Beatae libero harum', 'https://www.qap.net', '+1 (495) 166-3118', '+1 (574) 197-7271', '2023-04-04 15:04:40', '2023-04-04 15:04:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 1, NULL, '+1 (319) 958-2474', 'figesehif@mailinator.com', 'Soluta aut labore eo', NULL, '+1 (128) 361-1786', '+1 (951) 785-8037', '2023-04-04 15:04:40', '2023-04-04 15:04:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 1, NULL, '+1 (514) 175-3635', 'fybeda@mailinator.com', 'Soluta saepe sed exe', 'https://www.masawevulenir.info', '+1 (699) 966-4275', '+1 (539) 403-2323', '2023-04-04 15:04:40', '2023-04-04 15:04:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 1, NULL, '+1 (538) 152-4206', 'fudacewyte@mailinator.com', 'Nesciunt ut tempora', 'https://www.dyhuhyvifasumiw.in', '+1 (745) 942-5892', '+1 (807) 962-1507', '2023-04-04 15:10:07', '2023-04-04 15:10:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 1, NULL, '+1 (876) 446-3878', 'wubecevixe@mailinator.com', 'Commodo aute incidun', 'https://www.qufoceg.mobi', '+1 (803) 467-9365', '+1 (677) 276-7546', '2023-04-04 15:10:07', '2023-04-04 15:10:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 1, NULL, '+1 (997) 397-3581', 'wuxelexyq@mailinator.com', 'Quae illo id non ip', NULL, '+1 (875) 932-7664', '+1 (337) 677-8593', '2023-04-04 15:10:08', '2023-04-04 15:10:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 1, NULL, '+1 (265) 366-9893', 'sopysiwu@mailinator.com', 'Incididunt veniam e', 'https://www.turofudafecuwin.us', '+1 (784) 248-8132', '+1 (804) 373-8579', '2023-04-04 15:10:08', '2023-04-04 15:10:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 1, NULL, '+1 (272) 206-7671', 'file@mailinator.com', 'Dolor porro aperiam', 'https://www.hapuvigev.org', '+1 (328) 233-5627', '+1 (585) 519-2277', '2023-04-05 16:45:08', '2023-04-05 16:45:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 1, NULL, '+1 (591) 155-2644', 'fode@mailinator.com', 'Quas in aliquid aute', 'https://www.gano.org.uk', '+1 (776) 893-6961', '+1 (578) 761-5113', '2023-04-05 16:45:08', '2023-04-05 16:45:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 1, NULL, '+1 (509) 812-1813', 'genoz@mailinator.com', 'Nihil nisi ipsa acc', NULL, '+1 (511) 696-1263', '+1 (274) 185-2649', '2023-04-05 16:45:08', '2023-04-05 16:45:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 1, NULL, '+1 (459) 848-3791', 'fomoput@mailinator.com', 'Temporibus adipisici', 'https://www.bohulifopybep.ca', '+1 (741) 653-6725', '+1 (379) 321-8082', '2023-04-05 16:45:08', '2023-04-05 16:45:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 1, NULL, '+1 (122) 731-1567', 'niradibok@mailinator.com', 'Et animi voluptate', 'https://www.pygekajodi.me', '+1 (722) 404-1312', '+1 (113) 899-5013', '2023-04-05 16:45:18', '2023-04-05 16:45:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 1, NULL, '+1 (235) 504-9139', 'gidy@mailinator.com', 'Voluptatem Velit au', 'https://www.zocozybebi.mobi', '+1 (734) 637-5452', '+1 (966) 396-8856', '2023-04-05 16:45:18', '2023-04-05 16:45:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 1, NULL, '+1 (319) 807-7562', 'many@mailinator.com', 'Aute sunt vitae et e', NULL, '+1 (285) 485-3325', '+1 (155) 852-8673', '2023-04-05 16:45:18', '2023-04-05 16:45:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 1, NULL, '+1 (809) 457-7605', 'kybatezyx@mailinator.com', 'Aliqua Deleniti do', 'https://www.bepymihixe.net', '+1 (435) 262-1558', '+1 (823) 612-8848', '2023-04-05 16:45:18', '2023-04-05 16:45:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 1, NULL, '+1 (182) 675-8121', 'lowygeve@mailinator.com', 'Nihil hic exercitati', 'https://www.duxeheqibi.co.uk', '+1 (575) 106-9257', '+1 (541) 586-5832', '2023-04-05 16:45:41', '2023-04-05 16:45:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 1, NULL, '+1 (892) 234-3396', 'qazyne@mailinator.com', 'Voluptas aliquip et', 'https://www.bemobasufe.me', '+1 (846) 425-8074', '+1 (184) 526-9022', '2023-04-05 16:45:41', '2023-04-05 16:45:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 1, NULL, '+1 (552) 866-2497', 'qufofiwi@mailinator.com', 'Et eaque asperiores', NULL, '+1 (411) 793-9178', '+1 (284) 431-8352', '2023-04-05 16:45:41', '2023-04-05 16:45:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 1, NULL, '+1 (255) 598-3063', 'rejide@mailinator.com', 'Consectetur architec', 'https://www.jedewigowehet.biz', '+1 (437) 275-5594', '+1 (543) 705-7816', '2023-04-05 16:45:41', '2023-04-05 16:45:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 1, NULL, '+1 (304) 174-2187', 'gabilybugi@mailinator.com', 'Voluptate eveniet d', 'https://www.sibykofuliv.org.uk', '+1 (618) 725-8083', '+1 (618) 889-5827', '2023-04-08 17:33:47', '2023-04-08 17:33:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 1, NULL, '+1 (238) 972-8034', 'lopy@mailinator.com', 'Accusamus eiusmod il', 'https://www.gud.me', '+1 (524) 847-8364', '+1 (975) 305-1457', '2023-04-08 17:33:47', '2023-04-08 17:33:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 1, NULL, '+1 (725) 321-9029', 'mucyc@mailinator.com', 'Natus aspernatur est', NULL, '+1 (751) 403-4697', '+1 (336) 729-5378', '2023-04-08 17:33:47', '2023-04-08 17:33:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 1, NULL, '+1 (401) 203-6496', 'jilu@mailinator.com', 'Consequatur Quos ra', 'https://www.pefy.tv', '+1 (806) 474-9565', '+1 (257) 896-8792', '2023-04-08 17:33:47', '2023-04-08 17:33:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 1, NULL, '+1 (217) 891-4756', 'guvekyq@mailinator.com', 'Qui ipsam neque fugi', 'https://www.daqe.co', '+1 (523) 727-4283', '+1 (851) 965-2619', '2023-04-08 17:34:15', '2023-04-08 17:34:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 1, NULL, '+1 (249) 599-9468', 'wyxebel@mailinator.com', 'Aut sint veritatis', 'https://www.garybowa.me.uk', '+1 (584) 783-8655', '+1 (633) 121-6825', '2023-04-08 17:34:15', '2023-04-08 17:34:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 1, NULL, '+1 (718) 484-7722', 'gejymuvut@mailinator.com', 'Dicta ex ex ex conse', NULL, '+1 (428) 546-5913', '+1 (931) 113-8661', '2023-04-08 17:34:15', '2023-04-08 17:34:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 1, NULL, '+1 (395) 182-6565', 'jumof@mailinator.com', 'Earum ea veniam vol', 'https://www.jiqylyjecuf.in', '+1 (268) 144-4878', '+1 (434) 717-6886', '2023-04-08 17:34:15', '2023-04-08 17:34:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 1, NULL, '+1 (924) 511-6038', 'bahe@mailinator.com', 'Non a laborum Delec', 'https://www.xifuparupa.me.uk', '+1 (559) 489-2446', '+1 (388) 597-2302', '2023-04-10 17:39:29', '2023-04-10 17:39:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 1, NULL, '+1 (787) 218-3478', 'sicuti@mailinator.com', 'Inventore veritatis', 'https://www.rymidihopeholuz.me', '+1 (198) 101-5145', '+1 (117) 506-2847', '2023-04-10 17:39:29', '2023-04-10 17:39:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 1, NULL, '+1 (919) 207-4135', 'doreli@mailinator.com', 'Vel incidunt in aut', NULL, '+1 (656) 262-9407', '+1 (499) 229-8845', '2023-04-10 17:39:29', '2023-04-10 17:39:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 1, NULL, '+1 (831) 674-4445', 'raqec@mailinator.com', 'Magnam culpa qui om', 'https://www.judisasys.me', '+1 (796) 994-3341', '+1 (615) 301-5278', '2023-04-10 17:39:29', '2023-04-10 17:39:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 1, NULL, '+1 (106) 737-5742', 'qovabivap@mailinator.com', 'Mollitia et dolores', 'https://www.xyxepefitav.me', '+1 (715) 623-1778', '+1 (814) 861-7468', '2023-04-10 17:41:00', '2023-04-10 17:41:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 1, NULL, '+1 (333) 465-8621', 'dedy@mailinator.com', 'Sit placeat sed et', 'https://www.jiwybydyxeqe.com', '+1 (393) 239-2385', '+1 (225) 696-6134', '2023-04-10 17:41:00', '2023-04-10 17:41:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 1, NULL, '+1 (536) 693-9107', 'tubuv@mailinator.com', 'Sit non facilis tem', NULL, '+1 (853) 803-6412', '+1 (845) 802-8493', '2023-04-10 17:41:00', '2023-04-10 17:41:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 1, NULL, '+1 (796) 815-4453', 'cudytyga@mailinator.com', 'Laboriosam est in', 'https://www.zebox.com', '+1 (931) 806-9825', '+1 (909) 867-7935', '2023-04-10 17:41:00', '2023-04-10 17:41:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 1, NULL, '+1 (459) 838-1628', 'belyjoqete@mailinator.com', 'Earum incidunt proi', 'https://www.hupyp.mobi', '+1 (942) 111-8368', '+1 (971) 833-8267', '2023-04-10 17:41:50', '2023-04-10 17:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 1, NULL, '+1 (152) 455-8895', 'neruz@mailinator.com', 'Officia architecto i', 'https://www.laluqaw.com.au', '+1 (547) 195-1493', '+1 (682) 907-8114', '2023-04-10 17:41:50', '2023-04-10 17:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 1, NULL, '+1 (207) 781-4102', 'dici@mailinator.com', 'Saepe ex architecto', NULL, '+1 (652) 476-7181', '+1 (798) 489-1536', '2023-04-10 17:41:50', '2023-04-10 17:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 1, NULL, '+1 (192) 371-7963', 'dusi@mailinator.com', 'Iusto ut omnis alias', 'https://www.xocuzo.cm', '+1 (641) 801-7856', '+1 (129) 529-8736', '2023-04-10 17:41:50', '2023-04-10 17:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 1, NULL, '+1 (956) 951-6126', 'xurajo@mailinator.com', 'Sunt laborum Asperi', 'https://www.facararozor.org.uk', '+1 (494) 924-3736', '+1 (509) 789-1302', '2023-04-10 17:44:45', '2023-04-10 17:44:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 1, NULL, '+1 (174) 518-3456', 'kolocygef@mailinator.com', 'Sit in amet quia ha', 'https://www.nemymuqoxozuh.co', '+1 (332) 168-3593', '+1 (506) 339-9501', '2023-04-10 17:44:45', '2023-04-10 17:44:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 1, NULL, '+1 (917) 944-2661', 'gopoliso@mailinator.com', 'Consectetur et asper', NULL, '+1 (241) 613-5441', '+1 (978) 463-8546', '2023-04-10 17:44:45', '2023-04-10 17:44:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 1, NULL, '+1 (845) 632-6775', 'xahys@mailinator.com', 'Repudiandae dolores', 'https://www.karaq.org.au', '+1 (728) 169-4996', '+1 (257) 886-5699', '2023-04-10 17:44:45', '2023-04-10 17:44:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 1, NULL, '+1 (607) 676-3367', 'hylypa@mailinator.com', 'Eveniet magni omnis', 'https://www.luhyvujonene.com.au', '+1 (808) 807-7881', '+1 (683) 572-9685', '2023-04-10 17:46:12', '2023-04-10 17:46:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 1, NULL, '+1 (458) 233-3599', 'teqyn@mailinator.com', 'Rerum in rerum provi', 'https://www.poqinysunewa.info', '+1 (508) 755-8686', '+1 (594) 891-5264', '2023-04-10 17:46:12', '2023-04-10 17:46:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 1, NULL, '+1 (738) 789-9297', 'miwohy@mailinator.com', 'Porro reprehenderit', NULL, '+1 (871) 928-2553', '+1 (589) 111-8619', '2023-04-10 17:46:12', '2023-04-10 17:46:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 1, NULL, '+1 (834) 598-4352', 'kupymom@mailinator.com', 'Voluptatem Ea quaer', 'https://www.pufevyhedowyjo.us', '+1 (613) 494-6102', '+1 (773) 334-4364', '2023-04-10 17:46:12', '2023-04-10 17:46:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 1, NULL, '+1 (346) 486-1321', 'cypygap@mailinator.com', 'Quis eos velit ut m', 'https://www.kunu.me', '+1 (262) 977-2302', '+1 (809) 871-3732', '2023-04-10 17:48:20', '2023-04-10 17:48:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 1, NULL, '+1 (662) 961-1267', 'kyhomowy@mailinator.com', 'Deleniti enim molest', 'https://www.zonahyva.ca', '+1 (575) 454-3685', '+1 (912) 386-9134', '2023-04-10 17:48:20', '2023-04-10 17:48:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 1, NULL, '+1 (528) 952-6096', 'puwidepu@mailinator.com', 'Est voluptatem repu', NULL, '+1 (483) 239-1692', '+1 (994) 877-5626', '2023-04-10 17:48:20', '2023-04-10 17:48:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 1, NULL, '+1 (872) 701-5854', 'bufi@mailinator.com', 'Quis adipisci modi s', 'https://www.pyfecitaman.com.au', '+1 (175) 749-7103', '+1 (718) 845-1701', '2023-04-10 17:48:20', '2023-04-10 17:48:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 1, NULL, '+1 (755) 758-6607', 'qokelogu@mailinator.com', 'In sed eu sequi laud', 'https://www.tesocenahydoga.net', '+1 (611) 264-4838', '+1 (812) 921-6021', '2023-04-10 17:52:29', '2023-04-10 17:52:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 1, NULL, '+1 (847) 165-4126', 'tuwudaze@mailinator.com', 'Dolorem delectus do', 'https://www.gypitodev.cc', '+1 (989) 138-6328', '+1 (706) 536-4627', '2023-04-10 17:52:29', '2023-04-10 17:52:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 1, NULL, '+1 (777) 738-5357', 'vyfazofex@mailinator.com', 'Impedit odit evenie', NULL, '+1 (636) 409-7735', '+1 (292) 685-4117', '2023-04-10 17:52:29', '2023-04-10 17:52:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 1, NULL, '+1 (821) 269-7613', 'wanud@mailinator.com', 'Quo temporibus solut', 'https://www.cikycupavehapec.org.uk', '+1 (997) 643-8726', '+1 (775) 951-5327', '2023-04-10 17:52:29', '2023-04-10 17:52:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 1, NULL, '+1 (987) 183-1162', 'foguk@mailinator.com', 'Quo eos ipsam sequi', 'https://www.cogiqypyqera.cc', '+1 (688) 728-2511', '+1 (697) 916-6717', '2023-04-12 14:52:20', '2023-04-12 14:52:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 1, NULL, '+1 (442) 329-8514', 'ziwikazowa@mailinator.com', 'Error est adipisci u', 'https://www.jolo.co', '+1 (923) 351-9939', '+1 (801) 214-6821', '2023-04-12 14:52:20', '2023-04-12 14:52:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 1, NULL, '+1 (356) 114-2414', 'hiwejaseqo@mailinator.com', 'Dicta in eos qui ea', NULL, '+1 (176) 701-1581', '+1 (996) 239-1394', '2023-04-12 14:52:20', '2023-04-12 14:52:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 1, NULL, '+1 (529) 138-5071', 'somy@mailinator.com', 'Tenetur tempor imped', 'https://www.vyjik.net', '+1 (914) 532-2434', '+1 (906) 876-7722', '2023-04-12 14:52:20', '2023-04-12 14:52:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 1, NULL, '+1 (798) 131-3517', 'qudapoxyb@mailinator.com', 'Quae est natus dolor', 'https://www.sicidip.org.uk', '+1 (435) 735-8487', '+1 (299) 742-6485', '2023-04-12 17:27:28', '2023-04-12 17:27:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 1, NULL, '+1 (622) 551-9358', 'huqyt@mailinator.com', 'Ipsum animi non fug', 'https://www.xun.ws', '+1 (132) 698-6494', '+1 (713) 727-7606', '2023-04-12 17:27:28', '2023-04-12 17:27:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 1, NULL, '+1 (273) 589-9953', 'jynegogub@mailinator.com', 'Architecto reprehend', NULL, '+1 (863) 938-9758', '+1 (126) 434-3031', '2023-04-12 17:27:28', '2023-04-12 17:27:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 1, NULL, '+1 (953) 104-1231', 'nymeqoxep@mailinator.com', 'Suscipit nihil et be', 'https://www.niwaryqihepifin.cm', '+1 (337) 912-1989', '+1 (228) 565-4419', '2023-04-12 17:27:28', '2023-04-12 17:27:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 1, NULL, '+1 (148) 587-2887', 'dogejag@mailinator.com', 'Cumque molestiae quo', 'https://www.vidaqikoqopu.me.uk', '+1 (658) 492-7082', '+1 (479) 735-9371', '2023-04-12 17:27:39', '2023-04-12 17:27:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 1, NULL, '+1 (533) 649-6451', 'lafyj@mailinator.com', 'Nostrud ratione natu', 'https://www.qod.co', '+1 (986) 223-5355', '+1 (235) 354-5132', '2023-04-12 17:27:39', '2023-04-12 17:27:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 1, NULL, '+1 (119) 559-6183', 'vojumelive@mailinator.com', 'Nesciunt sed distin', NULL, '+1 (563) 557-3448', '+1 (788) 954-6722', '2023-04-12 17:27:39', '2023-04-12 17:27:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 1, NULL, '+1 (638) 563-7046', 'tajebak@mailinator.com', 'Pariatur Tenetur ut', 'https://www.nexysefa.org.uk', '+1 (961) 705-7895', '+1 (979) 935-7186', '2023-04-12 17:27:39', '2023-04-12 17:27:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 1, NULL, '+1 (767) 364-7946', 'tofak@mailinator.com', 'Quis aut deserunt co', 'https://www.qajyvyjatogykap.me.uk', '+1 (804) 424-3988', '+1 (454) 807-3181', '2023-04-12 17:27:51', '2023-04-12 17:27:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 1, NULL, '+1 (649) 207-5309', 'cukily@mailinator.com', 'Voluptas duis offici', 'https://www.xozyj.me.uk', '+1 (894) 513-1858', '+1 (515) 678-7783', '2023-04-12 17:27:51', '2023-04-12 17:27:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 1, NULL, '+1 (595) 377-7024', 'remady@mailinator.com', 'Sed in ab ut asperio', NULL, '+1 (587) 745-3272', '+1 (356) 592-1861', '2023-04-12 17:27:51', '2023-04-12 17:27:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 1, NULL, '+1 (675) 304-4768', 'tupov@mailinator.com', 'Odio consequatur ea', 'https://www.lawyfu.cc', '+1 (143) 153-3012', '+1 (958) 312-8682', '2023-04-12 17:27:51', '2023-04-12 17:27:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 1, NULL, '+1 (879) 203-6463', 'gukony@mailinator.com', 'Eum quos excepturi c', 'https://www.fonagorepyw.com.au', '+1 (261) 861-3215', '+1 (349) 306-7537', '2023-04-12 17:28:06', '2023-04-12 17:28:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 1, NULL, '+1 (105) 472-2619', 'gywydizema@mailinator.com', 'Provident dolor quo', 'https://www.pusyhetewaz.org.au', '+1 (851) 436-1966', '+1 (461) 321-8803', '2023-04-12 17:28:06', '2023-04-12 17:28:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 1, NULL, '+1 (841) 746-9106', 'gemajizy@mailinator.com', 'Eum et est dolorum c', NULL, '+1 (331) 459-3997', '+1 (531) 915-9665', '2023-04-12 17:28:06', '2023-04-12 17:28:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 1, NULL, '+1 (153) 526-4292', 'wuna@mailinator.com', 'Voluptas aut anim re', 'https://www.rodipisyx.mobi', '+1 (319) 594-5359', '+1 (469) 443-4957', '2023-04-12 17:28:06', '2023-04-12 17:28:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 1, NULL, '+1 (973) 772-6099', 'lydaseha@mailinator.com', 'Voluptatum et omnis', 'https://www.towyno.org.au', '+1 (435) 102-8415', '+1 (461) 958-7276', '2023-04-12 17:28:19', '2023-04-12 17:28:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 1, NULL, '+1 (125) 622-2577', 'pukibab@mailinator.com', 'Voluptatem non sit', 'https://www.pekynur.tv', '+1 (783) 453-5484', '+1 (256) 568-2341', '2023-04-12 17:28:19', '2023-04-12 17:28:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 1, NULL, '+1 (231) 896-9357', 'pocijome@mailinator.com', 'Irure assumenda mole', NULL, '+1 (701) 621-2396', '+1 (506) 265-5533', '2023-04-12 17:28:19', '2023-04-12 17:28:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 1, NULL, '+1 (569) 194-4178', 'lutisesi@mailinator.com', 'Excepturi rerum repu', 'https://www.pygu.co.uk', '+1 (432) 842-4099', '+1 (132) 552-9269', '2023-04-12 17:28:19', '2023-04-12 17:28:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 1, NULL, '+1 (212) 803-5801', 'tiruz@mailinator.com', 'Rerum in atque tempo', 'https://www.xazakywahutatab.me', '+1 (384) 851-8717', '+1 (107) 414-9242', '2023-04-12 17:28:32', '2023-04-12 17:28:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 1, NULL, '+1 (553) 508-9885', 'lejodutyv@mailinator.com', 'Laboris accusamus se', 'https://www.cahefisofyfixo.info', '+1 (607) 285-3496', '+1 (155) 418-6211', '2023-04-12 17:28:32', '2023-04-12 17:28:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 1, NULL, '+1 (966) 423-8436', 'femu@mailinator.com', 'Qui et dolore lorem', NULL, '+1 (421) 683-2913', '+1 (792) 739-5614', '2023-04-12 17:28:32', '2023-04-12 17:28:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 1, NULL, '+1 (881) 402-3665', 'zoxyvurazy@mailinator.com', 'Perspiciatis offici', 'https://www.nyxijusuqe.me', '+1 (445) 285-2376', '+1 (549) 549-3725', '2023-04-12 17:28:32', '2023-04-12 17:28:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 1, NULL, '+1 (766) 849-8469', 'zumogo@mailinator.com', 'Earum duis aut est', 'https://www.ziwelufyxusahaz.co.uk', '+1 (766) 672-1883', '+1 (723) 171-2016', '2023-04-12 17:28:46', '2023-04-12 17:28:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 1, NULL, '+1 (129) 958-9867', 'kazec@mailinator.com', 'Officia ipsum labor', 'https://www.teduhapegyxen.in', '+1 (441) 365-1953', '+1 (531) 599-1248', '2023-04-12 17:28:46', '2023-04-12 17:28:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 1, NULL, '+1 (605) 734-7337', 'qaqyjo@mailinator.com', 'Necessitatibus corpo', NULL, '+1 (896) 413-8546', '+1 (221) 605-4308', '2023-04-12 17:28:46', '2023-04-12 17:28:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 1, NULL, '+1 (882) 746-3528', 'zekuhycal@mailinator.com', 'Repudiandae autem eu', 'https://www.qabol.biz', '+1 (749) 641-4936', '+1 (493) 317-3656', '2023-04-12 17:28:46', '2023-04-12 17:28:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 1, NULL, '+1 (985) 892-3823', 'nevop@mailinator.com', 'Exercitation aliquam', 'https://www.lumageqo.mobi', '+1 (342) 323-7169', '+1 (217) 581-5855', '2023-04-12 17:47:50', '2023-04-12 17:47:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 1, NULL, '+1 (209) 902-7488', 'vufaruqi@mailinator.com', 'Voluptate sed lorem', 'https://www.qykicen.co', '+1 (583) 811-3036', '+1 (856) 654-3404', '2023-04-12 17:47:50', '2023-04-12 17:47:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 1, NULL, '+1 (535) 361-7157', 'wybi@mailinator.com', 'Lorem eiusmod autem', NULL, '+1 (696) 166-2969', '+1 (199) 661-7023', '2023-04-12 17:47:50', '2023-04-12 17:47:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 1, NULL, '+1 (674) 155-6736', 'xogena@mailinator.com', 'Fuga Labore atque e', 'https://www.qoboxo.biz', '+1 (337) 244-6421', '+1 (171) 969-9247', '2023-04-12 17:47:50', '2023-04-12 17:47:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 1, NULL, '+1 (112) 864-3599', 'kymota@mailinator.com', 'Hic iusto nisi est v', 'https://www.kaxapifuvose.ca', '+1 (272) 786-9028', '+1 (949) 684-1903', '2023-04-12 17:48:06', '2023-04-12 17:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 1, NULL, '+1 (451) 974-6715', 'gaditumam@mailinator.com', 'Beatae consequatur', 'https://www.cejibany.co.uk', '+1 (379) 399-9606', '+1 (389) 694-2479', '2023-04-12 17:48:06', '2023-04-12 17:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 1, NULL, '+1 (883) 461-5076', 'hejuciw@mailinator.com', 'Dolores impedit fac', NULL, '+1 (911) 251-4561', '+1 (396) 264-3807', '2023-04-12 17:48:06', '2023-04-12 17:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 1, NULL, '+1 (797) 816-9428', 'weborofaw@mailinator.com', 'Voluptas expedita de', 'https://www.wijakokyqu.cm', '+1 (716) 954-3827', '+1 (569) 655-5621', '2023-04-12 17:48:06', '2023-04-12 17:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 1, NULL, '+1 (528) 116-4395', 'qynoqy@mailinator.com', 'In ipsum magna dolor', 'https://www.fagyro.me.uk', '+1 (863) 377-8581', '+1 (921) 189-9239', '2023-04-13 11:50:18', '2023-04-13 11:50:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 1, NULL, '+1 (296) 533-2936', 'mavusihivu@mailinator.com', 'Incididunt voluptate', 'https://www.ticyqubizete.me.uk', '+1 (269) 844-2277', '+1 (782) 483-9956', '2023-04-13 11:50:18', '2023-04-13 11:50:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 1, NULL, '+1 (524) 507-8072', 'qufuli@mailinator.com', 'Possimus aliquam pe', NULL, '+1 (854) 494-6463', '+1 (776) 508-3294', '2023-04-13 11:50:18', '2023-04-13 11:50:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 1, NULL, '+1 (666) 122-6752', 'megosyquru@mailinator.com', 'In suscipit voluptat', 'https://www.rurogezevutaho.ca', '+1 (377) 861-9514', '+1 (539) 955-3797', '2023-04-13 11:50:18', '2023-04-13 11:50:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 1, NULL, '+1 (505) 413-5609', 'luhapybod@mailinator.com', 'Repellendus Quo qui', 'https://www.nocez.co.uk', '+1 (599) 965-9212', '+1 (922) 258-7841', '2023-04-13 11:50:29', '2023-04-13 11:50:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 1, NULL, '+1 (878) 909-9735', 'sugalupo@mailinator.com', 'Itaque aut tempore', 'https://www.rifuqukivonuniw.biz', '+1 (856) 418-6434', '+1 (876) 442-6492', '2023-04-13 11:50:29', '2023-04-13 11:50:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 1, NULL, '+1 (305) 187-8111', 'nuribari@mailinator.com', 'Nulla ea dolore aute', NULL, '+1 (298) 766-5208', '+1 (512) 443-7457', '2023-04-13 11:50:29', '2023-04-13 11:50:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 1, NULL, '+1 (606) 515-2843', 'tepa@mailinator.com', 'Nemo numquam sit om', 'https://www.zedu.cc', '+1 (411) 766-8468', '+1 (763) 519-2843', '2023-04-13 11:50:29', '2023-04-13 11:50:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 1, NULL, '+1 (797) 731-2141', 'gepoduta@mailinator.com', 'Odio a quo iure vel', 'https://www.wyhatucotawix.mobi', '+1 (188) 921-6295', '+1 (567) 357-5104', '2023-05-14 18:40:48', '2023-05-14 18:40:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 1, NULL, '+1 (715) 475-2028', 'vilidosimy@mailinator.com', 'Atque quas lorem eu', 'https://www.hukygeny.org', '+1 (853) 471-8042', '+1 (348) 193-8493', '2023-05-14 18:40:48', '2023-05-14 18:40:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 1, NULL, '+1 (853) 617-9351', 'comecimupy@mailinator.com', 'Ea nulla qui quod te', NULL, '+1 (611) 315-8556', '+1 (818) 813-5669', '2023-05-14 18:40:48', '2023-05-14 18:40:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 1, NULL, '+1 (468) 427-3089', 'rivesev@mailinator.com', 'Laboris ut impedit', 'https://www.jibyvypo.org', '+1 (503) 683-1036', '+1 (705) 148-8227', '2023-05-14 18:40:48', '2023-05-14 18:40:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 11, NULL, NULL, 'vodamol@mailinator.com', '+1 (883) 239-2086', 'https://www.xoluroqeliqa.org.uk', '+1 (117) 403-1075', '+1 (168) 285-3442', '2023-07-05 20:10:17', '2023-07-05 20:10:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 11, NULL, NULL, 'wenaxyky@mailinator.com', '+1 (951) 486-6928', 'https://www.junegalyw.co', '+1 (781) 429-2365', '+1 (452) 786-4813', '2023-07-05 20:11:27', '2023-07-05 20:11:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 11, 'David Levine', NULL, 'dazyko@mailinator.com', 'Et voluptatibus eos', NULL, '+1 (952) 847-9678', 'Debitis autem nisi a', '2023-07-05 20:35:32', '2023-07-05 20:35:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 11, 'Phillip Cooper', NULL, 'vutenavew@mailinator.com', 'Dolor anim ratione i', NULL, '+1 (607) 991-6159', 'Libero ut omnis opti', '2023-07-05 20:37:13', '2023-07-05 20:37:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 11, 'Sylvia Henson', NULL, 'rojega@mailinator.com', 'Distinctio Duis dol', NULL, '+1 (228) 112-6489', 'Nesciunt quaerat au', '2023-07-05 20:37:13', '2023-07-05 20:37:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 1, NULL, '+1 (762) 125-7911', 'vyceb@mailinator.com', 'Esse eum est omnis', 'https://www.vuc.biz', '+1 (439) 609-9306', '+1 (925) 774-8613', '2023-07-07 16:31:21', '2023-07-07 16:31:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 1, NULL, '+1 (959) 751-4248', 'pysusosak@mailinator.com', 'Quidem veritatis nih', 'https://www.zegi.org.uk', '+1 (453) 218-9253', '+1 (503) 953-8189', '2023-07-07 17:27:17', '2023-07-07 17:27:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 1, NULL, '+1 (518) 942-9499', 'mesadadu@mailinator.com', 'Beatae sed qui expli', 'https://www.lyqisewivo.info', '+1 (438) 189-2973', '+1 (427) 552-1837', '2023-07-08 16:26:18', '2023-07-08 16:26:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 1, NULL, '+1 (332) 459-4417', 'kyxysyt@mailinator.com', 'Placeat elit persp', 'https://www.gedofahoh.com', '+1 (645) 377-1066', '+1 (692) 554-6788', '2023-07-08 16:33:05', '2023-07-08 16:33:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 1, NULL, '+1 (814) 759-4325', 'puvifu@mailinator.com', 'Quae eaque velit non', 'https://www.teqeqedify.com.au', '+1 (651) 527-3101', '+1 (865) 887-6623', '2023-07-08 17:00:53', '2023-07-08 17:00:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 1, NULL, '+1 (771) 379-1807', 'zygazoku@mailinator.com', 'Amet maxime et enim', 'https://www.wubateny.cm', '+1 (101) 713-2126', '+1 (426) 334-4634', '2023-07-08 17:00:53', '2023-07-08 17:00:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 1, NULL, '+1 (919) 721-9306', 'demotukur@mailinator.com', 'Do temporibus dolor', 'https://www.tida.ca', '+1 (246) 866-2211', '+1 (641) 849-7074', '2023-07-08 17:00:53', '2023-07-08 17:00:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 1, NULL, '+1 (232) 946-5557', 'wesagafo@mailinator.com', 'Cupidatat excepturi', 'https://www.xizuxuvetu.ws', '+1 (459) 227-1739', '+1 (987) 589-1801', '2023-07-08 17:02:04', '2023-07-08 17:02:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 1, NULL, '+1 (897) 979-4456', 'kenesuga@mailinator.com', 'Minus minim et est', 'https://www.defivykocazupe.ca', '+1 (258) 674-5131', '+1 (719) 111-8654', '2023-07-08 17:02:04', '2023-07-08 17:02:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 1, NULL, '+1 (602) 657-8159', 'wuxavabez@mailinator.com', 'Eaque non qui odit p', 'https://www.kuzasobanywom.info', '+1 (431) 776-5992', '+1 (771) 164-7439', '2023-07-08 17:02:04', '2023-07-08 17:02:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 1, NULL, '+1 (469) 259-7468', 'gogafylaj@mailinator.com', 'Labore veniam irure', 'https://www.mapitopysuwi.mobi', '+1 (686) 238-2786', '+1 (879) 133-6046', '2023-07-08 17:03:23', '2023-07-08 17:03:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 1, NULL, '+1 (996) 146-3868', 'pefadu@mailinator.com', 'Adipisci ipsa cum d', 'https://www.xuwiqyvaw.biz', '+1 (781) 577-8716', '+1 (726) 435-1915', '2023-07-08 17:03:23', '2023-07-08 17:03:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 1, NULL, '+1 (872) 765-3079', 'xalacun@mailinator.com', 'Aut eligendi commodo', 'https://www.rusewesoxiv.info', '+1 (243) 182-6326', '+1 (376) 764-5577', '2023-07-08 17:03:23', '2023-07-08 17:03:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 1, NULL, '+1 (145) 297-9474', 'meba@mailinator.com', 'Corrupti consectetu', 'https://www.lixybanezupyl.info', '+1 (145) 477-8729', '+1 (739) 192-9321', '2023-07-08 17:05:08', '2023-07-08 17:05:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 1, NULL, '+1 (453) 386-6576', 'hivagaw@mailinator.com', 'Eu ea porro officia', 'https://www.sehabiwehijome.info', '+1 (145) 422-8974', '+1 (212) 553-1695', '2023-07-08 17:05:08', '2023-07-08 17:05:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 1, NULL, '+1 (528) 129-4972', 'buzucuzaca@mailinator.com', 'Culpa esse blanditii', 'https://www.dyzo.ws', '+1 (215) 282-9254', '+1 (161) 915-3205', '2023-07-08 17:05:08', '2023-07-08 17:05:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 13, 'Dante Spencer', NULL, 'wibyr@mailinator.com', 'Repudiandae eos exer', NULL, '+1 (716) 744-9466', 'Sit quasi dolore qu', '2023-07-08 17:46:16', '2023-07-08 17:46:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 13, 'Dante Spencer', NULL, 'wibyr@mailinator.com', 'Repudiandae eos exer', NULL, '+1 (716) 744-9466', 'Sit quasi dolore qu', '2023-07-08 17:46:16', '2023-07-08 17:46:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 1, NULL, '+1 (658) 693-9329', 'sutus@mailinator.com', 'Neque dolor cum et q', 'https://www.bihe.net', '+1 (968) 251-5949', '+1 (837) 756-3843', '2023-07-09 13:28:41', '2023-07-09 13:28:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 1, NULL, '+1 (452) 542-5714', 'bynoba@mailinator.com', 'Exercitation volupta', 'https://www.zagive.com.au', '+1 (119) 844-9057', '+1 (707) 558-2665', '2023-07-09 13:28:53', '2023-07-09 13:28:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 1, 'Ann Gibbs', '+1 (553) 193-8315', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:45:56', '2023-07-09 14:45:56', NULL, 'Iure non voluptatum', NULL, NULL, NULL, NULL, NULL),
(204, 1, 'Amelia Frye', '+1 (954) 502-5723', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:45:56', '2023-07-09 14:45:56', NULL, 'Ut libero et qui cup', NULL, NULL, NULL, NULL, NULL),
(205, 1, 'Wallace Dennis', '+1 (544) 806-3152', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:45:57', '2023-07-09 14:45:57', 'Aliqua Nihil conseq', 'Id eos voluptatem', NULL, 105, NULL, NULL, NULL),
(206, 1, 'Bianca Santiago', '+1 (635) 616-5741', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:47:52', '2023-07-09 14:47:52', NULL, 'Molestias ut id sint', NULL, NULL, NULL, NULL, NULL),
(207, 1, 'Anthony Franco', '+1 (736) 704-7496', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:47:52', '2023-07-09 14:47:52', NULL, 'Accusantium deleniti', NULL, NULL, NULL, NULL, NULL),
(208, 1, 'Josiah Hines', '+1 (954) 305-6459', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:47:52', '2023-07-09 14:47:52', 'Proident et volupta', 'Commodi ipsa labori', NULL, 106, NULL, NULL, NULL),
(211, 1, 'Lillith Roy', '+1 (804) 269-9852', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:50:14', '2023-07-09 14:50:14', NULL, 'Quia blanditiis ipsa', NULL, NULL, NULL, NULL, NULL),
(212, 1, 'Clinton Ortiz', '+1 (179) 569-2304', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:50:14', '2023-07-09 14:50:14', NULL, 'Ullam similique inci', NULL, NULL, NULL, NULL, NULL),
(213, 1, 'Timothy Daugherty', '+1 (748) 599-5034', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:50:14', '2023-07-09 14:50:14', 'Proident quis qui a', 'Sit est aliqua Max', NULL, 108, 'family_member', NULL, NULL),
(214, 1, 'Chelsea Atkinson', '+1 (647) 867-1086', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:51:44', '2023-07-09 14:51:44', NULL, 'Delectus labore ut', NULL, NULL, NULL, NULL, NULL),
(215, 1, 'Evan Gonzales', '+1 (562) 148-5049', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:51:44', '2023-07-09 14:51:44', NULL, 'Ut aspernatur id qui', NULL, NULL, NULL, NULL, NULL),
(216, 1, 'Noel Mendez', '+1 (451) 706-3028', NULL, NULL, NULL, NULL, NULL, '2023-07-09 14:51:44', '2023-07-09 14:51:44', 'Dolor natus ipsum et', 'Odio commodo tempor', NULL, 109, 'family_member', NULL, NULL),
(217, 1, 'Luke Moody', '+1 (288) 967-5312', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:07:16', '2023-07-09 15:07:16', NULL, 'Hic omnis Nam quae c', NULL, NULL, NULL, NULL, NULL),
(218, 1, 'Courtney Estes', '+1 (171) 943-2864', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:07:16', '2023-07-09 15:07:16', NULL, 'Officia in est et ex', NULL, NULL, NULL, NULL, NULL),
(219, 1, 'Breanna Bonner', '+1 (449) 473-1925', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:07:17', '2023-07-09 15:07:17', 'Anim est esse cupida', 'Expedita hic ad sunt', NULL, 110, 'family_member', NULL, NULL),
(220, 1, 'Jeanette Fuentes', '+1 (834) 401-3201', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:31:31', '2023-07-09 15:31:31', 'Cupiditate officia s', 'Facere rem sint occa', NULL, NULL, NULL, NULL, NULL),
(221, 1, 'Lisandra Lott', '+1 (634) 568-9333', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:31:31', '2023-07-09 15:31:31', NULL, 'Officia mollitia lab', NULL, NULL, NULL, NULL, NULL),
(222, 1, 'Rhoda Berg', '+1 (995) 201-5954', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:31:31', '2023-07-09 15:31:31', 'Non nostrud proident', 'Voluptates pariatur', NULL, 111, 'family_member', NULL, NULL);
INSERT INTO `contacts` (`id`, `school_id`, `name`, `phone`, `email`, `mobile`, `website`, `fax`, `office`, `created_at`, `updated_at`, `relation`, `address`, `image`, `user_id`, `type`, `emergency_phone`, `is_cp`) VALUES
(223, 1, 'Abbot Meyer', '+1 (333) 717-5959', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:51:28', '2023-07-09 15:51:28', 'A dolorem eum ex lab', 'Aperiam esse dicta', NULL, NULL, NULL, NULL, NULL),
(224, 1, 'Allen Cooley', '+1 (755) 925-8244', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:51:28', '2023-07-09 15:51:28', NULL, 'Corporis ut facere n', NULL, NULL, NULL, NULL, NULL),
(225, 1, 'Imelda Davenport', '+1 (673) 345-8673', NULL, NULL, NULL, NULL, NULL, '2023-07-09 15:51:28', '2023-07-09 15:51:28', 'Do totam nemo cupidi', 'Quae non qui laboris', NULL, 112, 'family_member', NULL, NULL),
(228, 1, 'Hermione Mcleod', '+1 (347) 481-1464', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:20:40', '2023-07-09 16:20:40', 'Blanditiis obcaecati', 'Voluptatem sunt eaq', NULL, NULL, NULL, NULL, NULL),
(229, 1, 'Kaitlin Whitney', '+1 (827) 853-2871', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:20:40', '2023-07-09 16:20:40', NULL, 'Lorem repudiandae pa', NULL, NULL, NULL, NULL, NULL),
(230, 1, 'Rhonda Lang', '+1 (899) 235-7839', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:20:40', '2023-07-09 16:20:40', 'Nemo est labore veli', 'Doloribus laudantium', NULL, 113, 'family_member', NULL, NULL),
(231, 1, 'Shea Ingram', '+1 (784) 798-1407', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:20:40', '2023-07-09 16:20:40', 'Sit repudiandae et a', 'Voluptatem anim arch', NULL, 113, 'family_member', NULL, NULL),
(232, 1, 'Violet Day', '+1 (114) 991-1858', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:20:40', '2023-07-09 16:20:40', 'Quas labore quia exe', 'Dicta totam sit sae', NULL, 113, 'family_member', NULL, NULL),
(233, 1, 'Bryar Cantrell', '+1 (353) 338-6976', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:20:40', '2023-07-09 16:20:40', 'Consectetur impedit', 'Consequuntur omnis a', NULL, 113, 'family_member', NULL, NULL),
(234, 1, 'Candace Jarvis', '+1 (472) 263-1481', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:57:10', '2023-07-09 16:57:10', 'Excepturi fugiat de', 'In voluptatem Dolor', NULL, NULL, NULL, NULL, NULL),
(235, 1, 'Shelly Horton', '+1 (884) 799-6469', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:57:10', '2023-07-09 16:57:10', NULL, 'Dolores sint necess', NULL, NULL, NULL, NULL, NULL),
(236, 1, 'Ignatius Fox', '+1 (911) 174-9241', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:57:10', '2023-07-09 16:57:10', 'Pariatur Provident', 'Possimus eu non imp', NULL, 114, 'family_member', NULL, NULL),
(237, 1, 'Ignatius Fox', '+1 (911) 174-9241', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:57:10', '2023-07-09 16:57:10', 'Pariatur Providenttf', 'Possimus eu non imp', NULL, 114, 'family_member', NULL, NULL),
(238, 1, 'Ignatius Fox', '+1 (911) 174-9241', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:57:10', '2023-07-09 16:57:10', 'Pariatur Provident56', 'Possimus eu non imp', NULL, 114, 'family_member', NULL, NULL),
(239, 1, 'Lee Dickson', '+1 (263) 449-5607', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:57:38', '2023-07-09 16:57:38', 'Unde sint magna qui', 'Sint id consectetur', NULL, NULL, NULL, NULL, NULL),
(240, 1, 'Garrison Brewer', '+1 (422) 204-3717', NULL, NULL, NULL, NULL, NULL, '2023-07-09 16:57:38', '2023-07-09 16:57:38', NULL, 'Velit repudiandae sa', NULL, NULL, NULL, NULL, NULL),
(244, 1, 'Roanna Ellis', '+1 (797) 691-5858', NULL, NULL, NULL, NULL, NULL, '2023-07-09 17:05:56', '2023-07-09 17:05:56', 'Blanditiis ea sit e', 'Accusantium adipisic', NULL, NULL, NULL, NULL, NULL),
(245, 1, 'Duncan Mcdowell', '+1 (861) 226-5133', NULL, NULL, NULL, NULL, NULL, '2023-07-09 17:05:56', '2023-07-09 17:05:56', NULL, 'Velit do ut eos qua', NULL, NULL, NULL, NULL, NULL),
(246, 1, 'Hammett Cannon', '+1 (535) 919-1943', NULL, NULL, NULL, NULL, NULL, '2023-07-09 17:05:56', '2023-07-09 17:05:56', 'Adipisci illo occaec', 'Corrupti aut quaera', NULL, 116, 'family_member', NULL, NULL),
(251, 1, 'Yardley Osborn', '+1 (947) 568-5144', NULL, NULL, NULL, NULL, NULL, '2023-07-09 17:12:24', '2023-07-09 17:12:24', 'Et vel qui do dolor', 'Accusantium ipsum p', NULL, NULL, NULL, NULL, NULL),
(252, 1, 'Moana Rogers', '+1 (881) 249-9016', NULL, NULL, NULL, NULL, NULL, '2023-07-09 17:12:24', '2023-07-09 17:12:24', NULL, 'Dolores ad consequun', NULL, NULL, NULL, NULL, NULL),
(255, 1, 'Ralph Rasmussen', '+1 (477) 539-2776', NULL, NULL, NULL, NULL, NULL, '2023-07-09 17:24:53', '2023-07-09 17:24:53', 'Ex est eius voluptas', 'Labore qui nisi sed', NULL, 119, 'family_member', NULL, NULL),
(257, 14, NULL, NULL, 'soda@mailinator.com', '+1 (395) 541-6102', 'https://www.foruv.me', 'soda@mailinator.com', '458562174', '2023-07-10 12:06:56', '2023-07-10 12:27:48', NULL, NULL, NULL, NULL, NULL, '+1 (112) 606-9892', NULL),
(258, 14, 'Asher Newman', NULL, 'niwom@mailinator.com', 'Fugiat harum quam e', NULL, '+1 (667) 506-7968', 'Reiciendis ut non in', '2023-07-10 14:01:34', '2023-07-10 14:01:34', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(259, 14, 'Emerald Woodward65', NULL, 'vyze@mailinator.com', 'Dolorem culpa molest', NULL, '+1 (266) 855-5576', 'Adipisci iusto offic', '2023-07-10 14:01:34', '2023-07-10 14:08:02', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(260, 22, NULL, NULL, 'ritelyce@mailinator.com', '+1 (926) 638-1336', 'https://www.kukini.in', '+1 (234) 935-7951', '+1 (651) 896-9219', '2023-07-10 15:31:44', '2023-07-10 15:31:44', NULL, NULL, NULL, NULL, NULL, '+1 (858) 479-3079', NULL),
(261, 22, NULL, NULL, 'vefofol@mailinator.com', '+1 (797) 106-9316', 'https://www.requdu.com', '+1 (188) 342-4844', '+1 (496) 864-5485', '2023-07-10 15:32:03', '2023-07-10 15:32:03', NULL, NULL, NULL, NULL, NULL, '+1 (836) 562-7415', NULL),
(262, 22, NULL, NULL, 'jigyqefe@mailinator.com', '+1 (182) 584-9883', 'https://www.senadovyg.com.au', '+1 (618) 815-3822', '+1 (892) 243-9311', '2023-07-10 15:33:14', '2023-07-10 15:33:14', NULL, NULL, NULL, NULL, NULL, '+1 (907) 137-1345', NULL),
(263, 22, NULL, NULL, 'jafim@mailinator.com', '+1 (171) 545-7627', 'https://www.dudy.mobi', '+1 (904) 599-3781', '+1 (305) 761-5079', '2023-07-10 15:34:23', '2023-07-10 15:34:23', NULL, NULL, NULL, NULL, NULL, '+1 (932) 391-6506', NULL),
(264, 22, NULL, NULL, 'kapoxor@mailinator.com', '+1 (997) 808-2968', 'https://www.niqypipo.in', '+1 (946) 937-1874', '+1 (352) 541-4976', '2023-07-10 15:35:25', '2023-07-10 15:35:25', NULL, NULL, NULL, NULL, NULL, '+1 (755) 179-9999', NULL),
(267, 22, NULL, NULL, 'tadidel@mailinator.com', '+1 (662) 129-5986', 'https://www.mavo.ca', 'tadidel@mailinator.com', '(232) 576-2725', '2023-07-10 15:38:21', '2023-07-10 15:38:31', NULL, NULL, NULL, NULL, NULL, '+1 (361) 351-6722', NULL),
(268, 22, 'Buckminster Yang', NULL, 'fyki@mailinator.com', 'Recusandae Culpa n', NULL, '+1 (397) 746-4294', 'Aut velit omnis vit', '2023-07-10 15:38:38', '2023-07-10 15:38:38', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(269, 22, 'Hillary Ochoa', NULL, 'gozu@mailinator.com', 'Voluptas non consect', NULL, '+1 (163) 196-1974', 'Ut quia do error non', '2023-07-10 15:38:38', '2023-07-10 15:38:38', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(270, 22, 'Marcia Duncan', NULL, 'rowiqer@mailinator.com', 'Qui ullam ducimus d', NULL, '+1 (655) 355-3547', 'Non dolore quisquam', '2023-07-10 15:46:33', '2023-07-10 15:46:33', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(271, 22, 'Lavinia Deleon', NULL, 'wavu@mailinator.com', 'Quibusdam anim tempo', NULL, '+1 (861) 517-8639', 'Non sed omnis deleni', '2023-07-10 15:46:33', '2023-07-10 15:56:17', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(272, 1, NULL, '+1 (723) 303-5698', 'zeky@mailinator.com', 'Praesentium necessit', 'https://www.symuhexycyput.ca', '+1 (658) 982-6088', '+1 (918) 856-8418', '2023-07-10 16:11:22', '2023-07-10 16:11:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, 1, NULL, '+1 (674) 626-7212', 'nati@mailinator.com', 'Et ad modi repudiand', 'https://www.cigewonykeferu.com.au', '+1 (563) 398-4512', '+1 (546) 262-5667', '2023-07-10 16:23:40', '2023-07-10 16:23:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, NULL, 'Cade Harvey', '+1 (197) 471-1204', 'kabofade@mailinator.com', NULL, NULL, NULL, NULL, '2023-07-10 16:23:40', '2023-07-10 16:23:40', 'Et omnis provident', 'Sunt voluptatem cupi', NULL, NULL, NULL, NULL, NULL),
(279, 1, 'Daryl Harris', '+1 (317) 937-1829', NULL, NULL, NULL, NULL, NULL, '2023-07-10 18:43:25', '2023-07-10 18:43:25', 'Fugiat reprehenderit', 'Ex enim architecto n', NULL, 115, 'family_member', NULL, NULL),
(280, 1, 'Roanna Wilkins', '+1 (689) 828-9976', NULL, NULL, NULL, NULL, NULL, '2023-07-10 18:43:25', '2023-07-10 18:43:25', 'Debitis ut nulla non', 'Quo quia distinctio', NULL, 115, 'family_member', NULL, NULL),
(281, 1, 'Violet Mathis', '+1 (764) 442-9964', NULL, NULL, NULL, NULL, NULL, '2023-07-10 18:43:25', '2023-07-10 18:43:25', 'Omnis voluptatem Mo', 'Ad commodi anim plac', NULL, 115, 'family_member', NULL, NULL),
(282, 24, NULL, NULL, 'mibizuk@mailinator.com', '(893) 177-7699', NULL, 'https://www.kixohez.mobi', '(453) 223-3476', '2023-07-12 15:06:29', '2023-07-12 16:09:47', NULL, NULL, NULL, NULL, NULL, '(219) 617-2822', NULL),
(283, 24, 'Craig Kirby', NULL, 'natoseqa@mailinator.com', 'Et error velit reici', NULL, '+1 (154) 138-1268', 'Praesentium impedit', '2023-07-12 15:06:45', '2023-07-12 15:06:45', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(284, 24, 'Sophia Henderson', NULL, 'misupudixy@mailinator.com', 'Asperiores laboris f', NULL, '+1 (694) 934-6847', 'Id ea et commodi co', '2023-07-12 15:06:45', '2023-07-12 15:06:53', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(285, 25, NULL, NULL, 'zybetydali@mailinator.com', '+1 (314) 848-5017', 'https://www.gituvycoheme.ws', '+1 (156) 918-7911', '+1 (964) 956-9381', '2023-07-12 15:15:23', '2023-07-12 15:15:23', NULL, NULL, NULL, NULL, NULL, '+1 (846) 849-9628', NULL),
(300, 24, NULL, '+1 (965) 721-7629', 'rorepetygy@mailinator.com', 'Deserunt ullam ratio', 'https://www.qarik.biz', '+1 (376) 214-5143', '+1 (815) 426-1944', '2023-07-12 17:05:28', '2023-07-12 17:05:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, NULL, 'Irene Carr', '+1 (595) 825-8888', 'tixelunidy@mailinator.com', NULL, NULL, NULL, NULL, '2023-07-12 17:05:28', '2023-07-12 17:05:28', 'Quis reiciendis volu', 'Rem sit repudiandae', NULL, NULL, NULL, NULL, NULL),
(302, 24, NULL, '+1 (508) 496-2502', 'qadim@mailinator.com', 'Soluta numquam recus', 'https://www.wubowafab.biz', '+1 (645) 938-2886', '+1 (826) 819-2911', '2023-07-12 17:07:08', '2023-07-12 17:07:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, NULL, 'Sonia Mccullough', '+1 (841) 959-8144', 'vami@mailinator.com', NULL, NULL, NULL, NULL, '2023-07-12 17:07:08', '2023-07-12 17:07:08', 'Sunt soluta in quis', 'Saepe ea delectus d', NULL, NULL, NULL, NULL, NULL),
(304, 24, NULL, '+1 (907) 601-3091', 'pyty@mailinator.com', 'Cillum delectus imp', 'https://www.rati.us', '+1 (783) 541-8061', '+1 (239) 199-2315', '2023-07-12 17:41:15', '2023-07-12 17:41:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, 24, NULL, '+1 (707) 525-7093', 'sohupyvis@mailinator.com', 'Rem est numquam dele', 'https://www.bexawerazew.com', '+1 (726) 866-2424', '+1 (554) 605-3105', '2023-07-12 17:41:15', '2023-07-12 17:41:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, 24, NULL, '+1 (202) 268-2745', 'qavocuwoc@mailinator.com', 'Asperiores rerum qui', 'https://www.visemydeles.tv', '+1 (306) 963-9679', '+1 (718) 166-4706', '2023-07-12 17:41:15', '2023-07-12 17:41:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, 1, NULL, '+1 (842) 891-1899', 'duhika@mailinator.com', 'Ex consequatur repel', 'https://www.desoh.co.uk', '+1 (101) 806-7134', '+1 (264) 879-5263', '2023-07-13 17:06:56', '2023-07-13 17:06:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 1, NULL, '+1 (955) 862-5698', 'ninekanitu@mailinator.com', 'Cillum pariatur Quo', 'https://www.fizypixyryx.com.au', '+1 (179) 885-5435', '+1 (411) 851-8481', '2023-07-13 17:06:56', '2023-07-13 17:06:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 1, NULL, '+1 (522) 185-8289', 'kexas@mailinator.com', 'Ut fugiat deserunt q', 'https://www.hytus.co', '+1 (244) 999-3178', '+1 (405) 825-2459', '2023-07-13 17:06:56', '2023-07-13 17:06:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, 26, NULL, NULL, 'xesedabo@mailinator.com', '+1 (246) 984-6767', 'https://www.komyp.org.uk', '+1 (164) 635-5602', '+1 (576) 278-2069', '2023-07-20 16:08:02', '2023-07-20 16:08:02', NULL, NULL, NULL, NULL, NULL, '+1 (871) 191-3589', NULL),
(311, 26, 'Serina Wooten', NULL, 'vysi@mailinator.com', 'Dolores duis sit il', NULL, '+1 (967) 995-8104', 'Laboriosam harum vo', '2023-07-20 16:08:07', '2023-07-20 16:08:07', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(312, 27, NULL, NULL, 'bixopo@mailinator.com', '+1 (239) 184-5826', 'https://www.bovygihasi.org.uk', '+1 (921) 953-1297', '+1 (861) 422-8459', '2023-07-20 17:14:22', '2023-07-20 17:14:22', NULL, NULL, NULL, NULL, NULL, '+1 (406) 269-3492', NULL),
(313, 27, 'Kasimir Marks', NULL, 'wuhawozy@mailinator.com', 'Laborum distinctio', NULL, '+1 (536) 501-7197', 'Ullamco ad veniam s', '2023-07-20 17:14:26', '2023-07-20 17:14:26', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(316, NULL, 'Jana Cook', '+1 (158) 656-2344', NULL, 'Nostrum dolore volup', 'https://www.talevixav.net', NULL, '+1 (522) 564-6234', '2023-08-04 11:42:30', '2023-08-04 11:42:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(318, 1, 'Remedios Cobb', '+1 (132) 734-9867', NULL, 'Tempor eum voluptas', 'https://www.keku.in', NULL, '+1 (882) 813-2089', '2023-08-04 12:04:19', '2023-08-04 12:04:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(319, 1, 'Remedios Cobb', '+1 (132) 734-9867', NULL, 'Tempor eum voluptas', 'https://www.keku.in', NULL, '+1 (882) 813-2089', '2023-08-04 12:11:52', '2023-08-04 12:11:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(321, 1, 'Victoria Burks', '+1 (126) 656-6988', 'tupu@mailinator.com', 'Quae culpa anim ass', 'https://www.hixaryteb.me.uk', NULL, '+1 (292) 552-7157', '2023-08-04 13:54:33', '2023-08-04 13:54:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(323, 1, 'Ila Browning', '+1 (803) 701-4255', 'zinif@mailinator.com', 'Est non et non accus', 'https://www.gohapipejo.cm', NULL, '+1 (496) 843-8767', '2023-08-04 14:36:39', '2023-08-04 14:36:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(328, 1, 'Brielle Bell', '+1 (553) 234-4113', 'keqenolul@mailinator.com', 'Beatae dolore minim', 'https://www.syhuxyfanihi.org.au', NULL, '+1 (646) 941-6872', '2023-08-04 17:58:44', '2023-08-04 17:58:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(340, 1, 'Ava Morales', '+1 (524) 327-6738', 'sudozejo@mailinator.com', 'Eu mollit qui accusa', 'https://www.buxone.cm', NULL, '+1 (499) 776-1269', '2023-08-06 17:08:50', '2023-08-06 17:08:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(345, 1, NULL, NULL, 'mapoqomyda@mailinator.com', '+1 (331) 794-8699', NULL, NULL, '+1 (125) 168-8639', '2023-08-10 19:46:05', '2023-08-10 19:46:05', NULL, NULL, NULL, NULL, NULL, '+1 (416) 824-1888', NULL),
(346, 1, NULL, NULL, 'socoketuce@mailinator.com', '+1 (205) 311-9426', NULL, NULL, '+1 (285) 491-5217', '2023-08-11 09:44:33', '2023-08-11 09:44:33', NULL, NULL, NULL, NULL, NULL, '+1 (182) 502-5182', NULL),
(350, 1, NULL, NULL, 'bamexa@mailinator.com', '+1 (467) 494-5824', NULL, NULL, '+1 (685) 701-7287', '2023-08-11 10:36:00', '2023-08-11 10:36:00', NULL, NULL, NULL, NULL, NULL, '+1 (792) 824-9224', NULL),
(351, 1, NULL, NULL, 'tuvujaqy@mailinator.com', '+1 (318) 171-4248', NULL, NULL, '+1 (221) 927-9095', '2023-08-11 10:36:47', '2023-08-11 10:36:47', NULL, NULL, NULL, NULL, NULL, '+1 (713) 456-6216', NULL),
(352, 1, NULL, NULL, 'cydiciwy@mailinator.com', '+1 (972) 652-8499', NULL, NULL, '+1 (746) 973-8022', '2023-08-11 10:58:29', '2023-08-11 11:12:53', NULL, NULL, NULL, NULL, NULL, '+1 (409) 798-3327', NULL),
(353, 1, 'Liberty Clemons', '+1 (988) 826-6632', 'fowo@mailinator.com', 'Animi magna impedit', 'https://www.lunym.tv', NULL, '+1 (505) 191-4461', '2023-08-11 17:22:51', '2023-08-11 17:22:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(354, 1, NULL, '+1 (698) 472-5903', 'ppp@gmail.com', 'Eos atque veritatis', 'https://www.visidyvaqe.org.au', '+1 (982) 601-8472', '+1 (626) 366-9634', '2023-09-08 17:39:15', '2023-09-08 17:39:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(355, 1, NULL, '+1 (613) 227-1994', 'jeqiku@mailinator.com', 'Dolore sit hic conse', 'https://www.sivyregu.mobi', '+1 (273) 466-2242', '+1 (468) 838-4307', '2023-09-08 17:39:15', '2023-09-08 17:39:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, 1, NULL, '+1 (557) 781-4399', 'pijifytydy@mailinator.com', 'Magnam odit cupidita', 'https://www.kagyguqywip.ws', '+1 (136) 688-1515', '+1 (776) 556-8579', '2023-09-08 17:39:15', '2023-09-08 17:39:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(357, 1, 'Michael Kline', '+1 (966) 208-3451', NULL, NULL, NULL, NULL, NULL, '2023-09-23 18:58:05', '2023-09-23 18:58:05', 'Ipsum adipisicing ut', 'Est duis est dolore', NULL, NULL, NULL, NULL, NULL),
(358, 1, 'Winter Burt', '+1 (689) 216-5552', NULL, NULL, NULL, NULL, NULL, '2023-09-23 18:58:05', '2023-09-23 18:58:05', NULL, 'Laboriosam est dig', NULL, NULL, NULL, NULL, NULL),
(359, 1, 'Zenia Clayton', '+1 (102) 936-7588', NULL, NULL, NULL, NULL, NULL, '2023-09-23 18:58:05', '2023-09-23 18:58:05', 'Elit maxime aliquip', 'Et dignissimos error', NULL, 151, 'family_member', NULL, NULL),
(360, 28, NULL, NULL, 'wavov@mailinator.com', '+1 (342) 458-6257', 'https://www.zago.info', '+1 (692) 401-3927', '+1 (263) 627-3345', '2023-09-29 17:30:59', '2023-09-29 17:30:59', NULL, NULL, NULL, NULL, NULL, '+1 (126) 797-9066', NULL),
(361, 28, 'Mary Conrad', NULL, 'naraqaqi@mailinator.com', 'Ex et suscipit porro', NULL, '+1 (147) 999-7823', 'Sed et saepe odit do', '2023-09-29 17:31:04', '2023-09-29 17:31:04', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(362, 1, NULL, '+1 (457) 633-8633', 'levupexufo@mailinator.com', 'Vel laboriosam reic', 'https://www.tewyp.com', '+1 (627) 635-7029', '+1 (541) 848-1039', '2023-09-30 17:35:49', '2023-09-30 17:35:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(363, NULL, 'Jillian English', '+1 (404) 143-5951', 'finygazop@mailinator.com', NULL, NULL, NULL, NULL, '2023-09-30 17:35:49', '2023-09-30 17:35:49', 'Illum hic pariatur', 'Nesciunt ea cumque', NULL, NULL, NULL, NULL, NULL),
(367, NULL, NULL, '+1 (729) 396-1939', 'wakukyv@mailinator.com', 'Enim natus voluptate', 'https://www.gumulyhehuv.org.au', NULL, '+1 (221) 822-5569', '2023-10-12 17:09:44', '2023-10-12 17:09:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(368, NULL, NULL, '+1 (202) 974-7742', 'xoquza@mailinator.com', 'Sunt tenetur sit i', 'https://www.kykepoxype.ca', NULL, '+1 (317) 591-2326', '2023-10-12 17:15:29', '2023-10-12 17:15:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(369, 1, NULL, '+1 (808) 534-6087', 'memeve@mailinator.com', 'Dicta hic aspernatur', 'https://www.dejiqoguva.mobi', NULL, '+1 (982) 746-2628', '2023-10-12 17:45:36', '2023-10-12 17:45:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(370, 1, NULL, '+1 (808) 534-6087', 'memeve@mailinator.com', 'Dicta hic aspernatur', 'https://www.dejiqoguva.mobi', NULL, '+1 (982) 746-2628', '2023-10-12 17:48:36', '2023-10-12 17:48:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(371, 1, NULL, '+1 (301) 516-9435', 'taleca@mailinator.com', 'Similique nihil dign', 'https://www.wacet.ws', '+1 (464) 312-6282', '+1 (103) 235-7161', '2023-10-12 17:59:53', '2023-10-12 17:59:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(372, NULL, 'Rylee Kirby', '+1 (351) 765-2211', 'cikavebob@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-12 17:59:53', '2023-10-12 17:59:53', 'Magna cumque exercit', 'Eum consequatur eni', NULL, NULL, NULL, NULL, NULL),
(385, 1, 'Ila Rutledge', '+1 (582) 666-4788', NULL, NULL, NULL, NULL, NULL, '2023-10-25 15:45:01', '2023-10-25 15:45:01', 'Repudiandae molestia', 'Minim aperiam est vo', NULL, NULL, NULL, NULL, NULL),
(386, 1, 'Ava Ball', '+1 (532) 515-6037', NULL, NULL, NULL, NULL, NULL, '2023-10-25 15:45:01', '2023-10-25 15:45:01', NULL, 'Voluptates duis labo', NULL, NULL, NULL, NULL, NULL),
(387, 1, 'Lana Colon', '+1 (161) 935-1602', NULL, NULL, NULL, NULL, NULL, '2023-10-25 15:45:01', '2023-10-25 15:45:01', 'Labore qui dolore be', 'Eu qui doloribus fug', NULL, 162, 'family_member', NULL, NULL),
(388, 1, 'Rudyard Freeman', '+1 (977) 433-5024', NULL, NULL, NULL, NULL, NULL, '2023-10-25 15:55:10', '2023-10-25 15:55:10', 'Exercitationem dolor', 'Voluptatum ex qui ap', NULL, NULL, NULL, NULL, NULL),
(389, 1, 'Frances Ramirez', '+1 (186) 179-3349', NULL, NULL, NULL, NULL, NULL, '2023-10-25 15:55:10', '2023-10-25 15:55:10', NULL, 'Ut soluta illum vol', NULL, NULL, NULL, NULL, NULL),
(390, 1, 'Paul Wiley', '+1 (687) 507-7548', NULL, NULL, NULL, NULL, NULL, '2023-10-25 15:55:10', '2023-10-25 15:55:10', 'In sit non est quod', 'In et ratione reicie', NULL, 163, 'family_member', NULL, NULL),
(391, 1, 'Bell Everett', '+1 (859) 561-2259', NULL, NULL, NULL, NULL, NULL, '2023-10-25 16:54:47', '2023-10-25 16:54:47', 'Doloribus aut et a h', 'Molestias quibusdam', NULL, NULL, NULL, NULL, NULL),
(392, 1, 'Yoshio Dotson', '+1 (299) 368-7773', NULL, NULL, NULL, NULL, NULL, '2023-10-25 16:54:47', '2023-10-25 16:54:47', NULL, 'Autem ad ipsum labor', NULL, NULL, NULL, NULL, NULL),
(393, 1, 'Oleg Meyers', '+1 (113) 774-7533', NULL, NULL, NULL, NULL, NULL, '2023-10-25 16:54:47', '2023-10-25 16:54:47', 'In eveniet vel dese', 'Pariatur Soluta qui', NULL, 164, 'family_member', NULL, NULL),
(394, 1, NULL, '+1 (455) 285-7803', 'wolov@mailinator.com', 'Sed dolor quo error', 'https://www.zehyvimadyqe.cm', '+1 (742) 138-8878', '+1 (744) 432-9834', '2023-10-30 16:25:24', '2023-10-30 16:25:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, NULL, 'Kenneth Moore', '+1 (926) 486-9362', 'zobito@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:25:24', '2023-10-30 16:25:24', 'Autem quo optio qui', 'Vitae ab rem sequi v', NULL, NULL, NULL, NULL, NULL),
(396, 1, NULL, '+1 (403) 263-9476', 'jegik@mailinator.com', 'Ut id omnis vel magn', 'https://www.biwafu.biz', '+1 (617) 298-7238', '+1 (114) 553-6929', '2023-10-30 16:25:38', '2023-10-30 16:25:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, NULL, 'Germaine Aguirre', '+1 (116) 684-8198', 'kizo@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:25:38', '2023-10-30 16:25:38', 'Dicta distinctio Ma', 'Nulla excepteur sed', NULL, NULL, NULL, NULL, NULL),
(398, 1, NULL, '+1 (777) 233-6893', 'gobysug@mailinator.com', 'Neque optio sunt mi', 'https://www.jepovapi.net', '+1 (481) 922-6948', '+1 (155) 985-7173', '2023-10-30 16:25:53', '2023-10-30 16:25:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(399, NULL, 'Amy Bright', '+1 (111) 935-3042', 'myvelipupy@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:25:53', '2023-10-30 16:25:53', 'Dolor dolorum aliqua', 'Nemo est sequi dolor', NULL, NULL, NULL, NULL, NULL),
(400, 1, NULL, '+1 (811) 485-6142', 'pyvig@mailinator.com', 'Doloremque ex corrup', 'https://www.lise.in', '+1 (653) 347-6642', '+1 (374) 594-4072', '2023-10-30 16:26:05', '2023-10-30 16:26:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(401, NULL, 'Baxter Hatfield', '+1 (917) 492-9062', 'vyko@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:26:05', '2023-10-30 16:26:05', 'Quibusdam reprehende', 'Facilis in dolorem q', NULL, NULL, NULL, NULL, NULL),
(402, 1, NULL, '+1 (162) 651-1438', 'repi@mailinator.com', 'Officia in distincti', 'https://www.woniketecosaru.org.au', '+1 (695) 347-1713', '+1 (979) 736-4881', '2023-10-30 16:26:19', '2023-10-30 16:26:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(403, NULL, 'Breanna Frye', '+1 (685) 449-6287', 'cacoj@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:26:19', '2023-10-30 16:26:19', 'Quibusdam voluptatem', 'Natus quibusdam impe', NULL, NULL, NULL, NULL, NULL),
(404, 1, NULL, '+1 (397) 133-1801', 'viqecuzyju@mailinator.com', 'Commodi quia obcaeca', 'https://www.majom.co.uk', '+1 (274) 817-1377', '+1 (258) 259-2917', '2023-10-30 16:26:35', '2023-10-30 16:26:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(405, NULL, 'Erich Mclaughlin', '+1 (532) 818-4403', 'rana@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:26:35', '2023-10-30 16:26:35', 'Consequatur mollitia', 'Minim inventore et N', NULL, NULL, NULL, NULL, NULL),
(406, 1, NULL, '+1 (778) 637-5988', 'doxubytid@mailinator.com', 'Aperiam est nihil qu', 'https://www.dusitevegixim.cm', '+1 (943) 463-3854', '+1 (576) 226-2091', '2023-10-30 16:26:49', '2023-10-30 16:26:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(407, NULL, 'Kylan Riddle', '+1 (629) 905-6143', 'zyve@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:26:49', '2023-10-30 16:26:49', 'Exercitationem liber', 'Dolores nihil velit', NULL, NULL, NULL, NULL, NULL),
(408, 1, NULL, '+1 (101) 452-3701', 'byqyg@mailinator.com', 'Qui iusto dignissimo', 'https://www.zotuwohucuko.ca', '+1 (833) 979-3895', '+1 (994) 913-4333', '2023-10-30 16:27:04', '2023-10-30 16:27:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(409, NULL, 'Harriet Doyle', '+1 (934) 899-9307', 'fohin@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:27:04', '2023-10-30 16:27:04', 'Ullam est laboriosa', 'Nostrud qui iure dol', NULL, NULL, NULL, NULL, NULL),
(410, 1, NULL, '+1 (296) 248-1664', 'povo@mailinator.com', 'Inventore rerum hic', 'https://www.cepupyfuk.net', '+1 (411) 598-9667', '+1 (683) 156-4903', '2023-10-30 16:27:20', '2023-10-30 16:27:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(411, NULL, 'Mercedes Neal', '+1 (322) 607-6006', 'lurohi@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:27:20', '2023-10-30 16:27:20', 'Minima eius non est', 'Aut fugit nulla sap', NULL, NULL, NULL, NULL, NULL),
(412, 1, 'Helen Hayden', '+1 (741) 833-8718', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:28:58', '2023-10-30 16:28:58', 'Irure maiores rerum', 'Ut aut velit quaerat', NULL, NULL, NULL, NULL, NULL),
(413, 1, 'Jason Spencer', '+1 (812) 523-4154', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:28:58', '2023-10-30 16:28:58', NULL, 'Quisquam ipsum animi', NULL, NULL, NULL, NULL, NULL),
(414, 1, 'Flynn Mclean', '+1 (372) 653-5235', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:28:58', '2023-10-30 16:28:58', 'Omnis sint ea repreh', 'Voluptate delectus', NULL, 174, 'family_member', NULL, NULL),
(415, 1, 'Clarke Prince', '+1 (315) 428-1106', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:29:41', '2023-10-30 16:29:41', 'Quis qui hic nihil q', 'Rem architecto cillu', NULL, NULL, NULL, NULL, NULL),
(416, 1, 'Gretchen Parsons', '+1 (806) 379-5371', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:29:41', '2023-10-30 16:29:41', NULL, 'Officia est molestia', NULL, NULL, NULL, NULL, NULL),
(417, 1, 'Cameron Grimes', '+1 (462) 823-2728', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:29:41', '2023-10-30 16:29:41', 'Iusto magna irure qu', 'Laudantium quis quo', NULL, 175, 'family_member', NULL, NULL),
(418, 1, 'Dominic Cash', '+1 (838) 432-5583', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:30:14', '2023-10-30 16:30:14', 'Aut cillum eum labor', 'Dolor exercitation q', NULL, NULL, NULL, NULL, NULL),
(419, 1, 'Angelica Shields', '+1 (946) 862-1421', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:30:14', '2023-10-30 16:30:14', NULL, 'Amet inventore libe', NULL, NULL, NULL, NULL, NULL),
(420, 1, 'Jacob Guthrie', '+1 (264) 386-9021', NULL, NULL, NULL, NULL, NULL, '2023-10-30 16:30:14', '2023-10-30 16:30:14', 'Quae adipisicing qua', 'Ut nisi reprehenderi', NULL, 176, 'family_member', NULL, NULL),
(421, 1, NULL, '+1 (782) 401-6581', 'vudo@mailinator.com', 'Voluptatum animi cu', 'https://www.vyjaw.com.au', '+1 (731) 593-4081', '+1 (526) 164-4974', '2023-10-30 16:32:56', '2023-10-30 16:32:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(422, NULL, 'Basia Conrad', '+1 (832) 386-1635', 'qocy@mailinator.com', NULL, NULL, NULL, NULL, '2023-10-30 16:32:56', '2023-10-30 16:32:56', 'Sit officia sed esse', 'Qui tempor praesenti', NULL, NULL, NULL, NULL, NULL),
(423, 1, NULL, '+1 (463) 404-8579', 'qahu@mailinator.com', 'Ipsa dolores Nam ve', 'https://www.nohawahagesuq.ws', '+1 (114) 497-5184', '+1 (733) 305-1656', '2023-11-04 16:15:32', '2023-11-04 16:15:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(424, 1, NULL, '+1 (793) 692-2513', 'gikolifar@mailinator.com', 'Enim illum ut dolor', 'https://www.hasipazumejuke.co.uk', '+1 (323) 473-2089', '+1 (565) 557-4419', '2023-11-04 16:15:32', '2023-11-04 16:15:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(425, 1, NULL, '+1 (648) 704-6737', 'dyby@mailinator.com', 'Tempora repellendus', 'https://www.purudisiha.mobi', '+1 (555) 344-1359', '+1 (823) 314-8379', '2023-11-04 16:15:32', '2023-11-04 16:15:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(426, 1, NULL, '+1 (626) 809-7074', 'wiqikid@mailinator.com', 'Quis sunt ullam quis', 'https://www.dytabaj.ca', '+1 (989) 384-4628', '+1 (595) 825-4102', '2023-11-04 16:15:38', '2023-11-04 16:15:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(427, 1, NULL, '+1 (225) 417-8237', 'herome@mailinator.com', 'Nobis commodo dolore', 'https://www.fefyzigos.biz', '+1 (852) 212-7526', '+1 (843) 877-9901', '2023-11-04 16:15:38', '2023-11-04 16:15:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(428, 1, NULL, '+1 (104) 381-9221', 'xulezuhifi@mailinator.com', 'Velit qui dolor aut', 'https://www.wotehaj.com', '+1 (294) 652-8312', '+1 (361) 778-4404', '2023-11-04 16:15:38', '2023-11-04 16:15:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `corporations`
--

CREATE TABLE `corporations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `business_no` varchar(125) DEFAULT NULL,
  `office_country` varchar(125) DEFAULT NULL,
  `office_state` varchar(125) DEFAULT NULL,
  `office_city` varchar(125) DEFAULT NULL,
  `logo` varchar(125) DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_license_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `corporations`
--

INSERT INTO `corporations` (`id`, `school_id`, `name`, `business_no`, `office_country`, `office_state`, `office_city`, `logo`, `address_id`, `contact_id`, `created_at`, `updated_at`, `business_license_id`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 38, 3, '2023-03-22 15:12:08', '2023-03-22 15:12:08', NULL),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 40, 5, '2023-03-22 15:13:16', '2023-03-22 15:13:16', NULL),
(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, 42, 7, '2023-03-22 15:17:38', '2023-03-22 15:17:38', NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 44, 9, '2023-03-22 15:17:58', '2023-03-22 15:17:58', NULL),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, 46, 11, '2023-03-22 15:19:29', '2023-03-22 15:19:29', NULL),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, 49, 14, '2023-03-22 15:22:00', '2023-03-22 15:22:00', NULL),
(7, 1, NULL, NULL, NULL, NULL, NULL, NULL, 52, 17, '2023-03-22 15:23:18', '2023-03-22 15:23:18', NULL),
(8, 1, NULL, NULL, NULL, NULL, NULL, NULL, 55, 20, '2023-03-22 15:24:34', '2023-03-22 15:24:34', NULL),
(9, 1, NULL, NULL, NULL, NULL, NULL, NULL, 58, 23, '2023-03-22 15:25:10', '2023-03-22 15:25:10', NULL),
(10, 1, NULL, NULL, NULL, NULL, NULL, NULL, 62, 27, '2023-03-22 15:25:48', '2023-03-22 15:25:48', NULL),
(11, 1, NULL, NULL, NULL, NULL, NULL, NULL, 66, 31, '2023-03-22 16:00:10', '2023-03-22 16:00:10', NULL),
(12, 1, 'Troy Skinner', 'Magni consequatur n', NULL, NULL, NULL, NULL, 70, 35, '2023-03-22 16:51:44', '2023-03-22 16:51:44', NULL),
(13, 1, 'Catherine Gibbs', 'Aut et inventore et', NULL, NULL, NULL, NULL, 74, 39, '2023-03-22 16:54:36', '2023-03-22 16:54:36', NULL),
(14, 1, 'Oprah Wilkerson', 'Enim magnam aliquid', NULL, NULL, NULL, NULL, 78, 43, '2023-03-22 16:55:52', '2023-03-22 16:55:52', NULL),
(15, 1, 'Marny Trujillo', 'Fugiat distinctio E', NULL, NULL, NULL, NULL, 82, 47, '2023-03-23 12:29:21', '2023-03-23 12:29:21', NULL),
(16, 1, 'Marny Trujillo', 'Fugiat distinctio E', NULL, NULL, NULL, NULL, 86, 51, '2023-03-23 12:31:04', '2023-03-23 12:31:04', NULL),
(17, 1, 'Amela Bruce', 'Sit saepe dolorem n', 'Haiti', 'Nord-Est', NULL, NULL, 90, 55, '2023-03-24 16:18:06', '2023-03-24 16:18:06', NULL),
(18, 1, 'Patience Bush', 'Excepturi atque esse', 'Denmark', 'Central Denmark Region', NULL, NULL, 94, 59, '2023-03-24 16:52:47', '2023-03-24 16:52:47', NULL),
(19, 1, 'Selma William', 'Laboriosam impedit', NULL, NULL, NULL, NULL, 98, 63, '2023-04-04 15:04:40', '2023-04-04 15:04:40', NULL),
(20, 1, 'Carl Herrera', 'Maiores aut eaque at', NULL, NULL, NULL, NULL, 102, 67, '2023-04-04 15:10:07', '2023-04-04 15:10:07', NULL),
(21, 1, 'Jackson Blanchard', 'At aliquam est sit l', NULL, NULL, NULL, NULL, 106, 71, '2023-04-05 16:45:08', '2023-04-05 16:45:08', NULL),
(22, 1, 'Samuel Howe', 'Similique quisquam u', NULL, NULL, NULL, NULL, 110, 75, '2023-04-05 16:45:18', '2023-04-05 16:45:18', NULL),
(23, 1, 'Aiko Moore', 'Officia iste qui eos', NULL, NULL, NULL, NULL, 114, 79, '2023-04-05 16:45:41', '2023-04-05 16:45:41', NULL),
(24, 1, 'Alana Solis', 'In cupiditate omnis', NULL, NULL, NULL, NULL, 118, 83, '2023-04-08 17:33:47', '2023-04-08 17:33:47', NULL),
(25, 1, 'Lee Booth', 'Aliqua Earum obcaec', NULL, NULL, NULL, NULL, 122, 87, '2023-04-08 17:34:15', '2023-04-08 17:34:15', NULL),
(26, 1, 'Brenda Porter', 'Expedita aliquid cup', NULL, NULL, NULL, NULL, 126, 91, '2023-04-10 17:39:29', '2023-04-10 17:39:29', NULL),
(27, 1, 'Bethany Watts', 'Iusto commodo cillum', NULL, NULL, NULL, NULL, 130, 95, '2023-04-10 17:41:00', '2023-04-10 17:41:00', NULL),
(28, 1, 'Serina Franco', 'Porro doloribus occa', NULL, NULL, NULL, NULL, 134, 99, '2023-04-10 17:41:50', '2023-04-10 17:41:50', NULL),
(29, 1, 'Ira Hahn', 'Eu tenetur harum cil', NULL, NULL, NULL, NULL, 138, 103, '2023-04-10 17:44:45', '2023-04-10 17:44:45', NULL),
(30, 1, 'Raja Kramer', 'Incididunt sunt par', NULL, NULL, NULL, NULL, 142, 107, '2023-04-10 17:46:12', '2023-04-10 17:46:12', NULL),
(31, 1, 'Cleo Villarreal', 'Cupiditate architect', NULL, NULL, NULL, NULL, 146, 111, '2023-04-10 17:48:20', '2023-04-10 17:48:20', NULL),
(32, 1, 'Diana Mayo', 'Beatae nemo aut reic', NULL, NULL, NULL, NULL, 150, 115, '2023-04-10 17:52:29', '2023-04-10 17:52:29', NULL),
(33, 1, 'Omar Spencer', 'Magni anim ut cupidi', NULL, NULL, NULL, NULL, 154, 119, '2023-04-12 14:52:20', '2023-04-12 14:52:20', NULL),
(34, 1, 'Blake Nash', 'Et dolores odit labo', NULL, NULL, NULL, NULL, 158, 123, '2023-04-12 17:27:28', '2023-04-12 17:27:28', NULL),
(35, 1, 'Anjolie Rasmussen', 'Ullamco alias sit et', NULL, NULL, NULL, NULL, 162, 127, '2023-04-12 17:27:39', '2023-04-12 17:27:39', NULL),
(36, 1, 'Hollee Hayden', 'Assumenda expedita c', NULL, NULL, NULL, NULL, 166, 131, '2023-04-12 17:27:51', '2023-04-12 17:27:51', NULL),
(37, 1, 'Kylee Rowland', 'Ipsum dolor minima', NULL, NULL, NULL, NULL, 170, 135, '2023-04-12 17:28:06', '2023-04-12 17:28:06', NULL),
(38, 1, 'Dara Christensen', 'Enim necessitatibus', NULL, NULL, NULL, NULL, 174, 139, '2023-04-12 17:28:19', '2023-04-12 17:28:19', NULL),
(39, 1, 'Marny Kennedy', 'Deleniti obcaecati t', NULL, NULL, NULL, NULL, 178, 143, '2023-04-12 17:28:32', '2023-04-12 17:28:32', NULL),
(40, 1, 'Chadwick Bailey', 'Pariatur Et impedit', NULL, NULL, NULL, NULL, 182, 147, '2023-04-12 17:28:46', '2023-04-12 17:28:46', NULL),
(41, 1, 'Clinton Mayer', 'Tempor voluptas offi', NULL, NULL, NULL, NULL, 188, 151, '2023-04-12 17:47:50', '2023-04-12 17:47:50', NULL),
(42, 1, 'Rhea Wiley', 'Illo ut laboriosam', NULL, NULL, NULL, NULL, 192, 155, '2023-04-12 17:48:06', '2023-04-12 17:48:06', NULL),
(43, 1, 'Laura William', 'Eius qui ea reiciend', NULL, NULL, NULL, NULL, 200, 159, '2023-04-13 11:50:18', '2023-04-13 11:50:18', NULL),
(44, 1, 'Declan Phillips', 'Enim culpa doloremq', NULL, NULL, NULL, NULL, 204, 163, '2023-04-13 11:50:29', '2023-04-13 11:50:29', NULL),
(45, 1, 'Maisie Mcintyre', 'Sit ex nesciunt mag', NULL, NULL, NULL, NULL, 228, 167, '2023-05-14 18:40:48', '2023-05-14 18:40:48', NULL),
(46, 1, 'Christine Cummings', 'Repudiandae quibusda', NULL, NULL, NULL, NULL, 288, 184, '2023-07-08 17:00:53', '2023-07-08 17:00:53', NULL),
(47, 1, 'Gannon Gilbert', 'Occaecat ipsam est', NULL, NULL, NULL, NULL, 291, 187, '2023-07-08 17:02:04', '2023-07-08 17:02:04', NULL),
(48, 1, 'Kevyn Cooley', 'Sunt irure incidunt', NULL, NULL, NULL, NULL, 294, 190, '2023-07-08 17:03:23', '2023-07-08 17:03:23', NULL),
(49, 1, 'Cailin Foster', 'Architecto est sed i', NULL, NULL, NULL, NULL, 297, 193, '2023-07-08 17:05:08', '2023-07-08 17:05:08', 91),
(50, 24, 'Steven Hayes', 'Eaque et aute harum', NULL, NULL, NULL, NULL, 358, 305, '2023-07-12 17:41:15', '2023-07-12 17:41:15', 92),
(51, 1, 'Hedda Beck', 'Nulla mollit laudant', NULL, NULL, NULL, NULL, 361, 308, '2023-07-13 17:06:56', '2023-07-13 17:06:56', 93),
(52, 1, 'Ppp', 'Laborum Ut animi e', NULL, NULL, NULL, NULL, 408, 355, '2023-09-08 17:39:15', '2023-09-08 17:39:15', 94),
(53, 1, 'Clinton Davis', 'Quas quaerat necessi', NULL, NULL, NULL, NULL, 449, 424, '2023-11-04 16:15:32', '2023-11-04 16:15:32', 95),
(54, 1, 'Ila Booker', 'Eum consectetur null', NULL, NULL, NULL, NULL, 452, 427, '2023-11-04 16:15:38', '2023-11-04 16:15:38', 96);

-- --------------------------------------------------------

--
-- Table structure for table `cost_type`
--

CREATE TABLE `cost_type` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost_type`
--

INSERT INTO `cost_type` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Tuition', 1, NULL, NULL, NULL, '2023-03-08 13:43:30'),
(2, 'Textbook', 1, NULL, NULL, NULL, '2023-03-08 13:44:23'),
(3, 'Supplies', 1, NULL, NULL, NULL, '2023-03-08 13:44:23'),
(4, 'Fees', 1, NULL, NULL, NULL, '2023-03-08 13:44:54'),
(5, 'Other Charges', 1, NULL, NULL, NULL, '2023-03-08 13:44:54'),
(6, 'Total Payable', 1, NULL, NULL, NULL, '2023-03-08 13:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `course_assessment_grade_scales`
--

CREATE TABLE `course_assessment_grade_scales` (
  `id` bigint(20) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `assessment_type_id` int(11) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assessment_grade_scales`
--

INSERT INTO `course_assessment_grade_scales` (`id`, `course_id`, `assessment_type_id`, `grade`, `description`, `value`, `created_at`, `updated_at`) VALUES
(1, 29, 1, 'Pass/fail', 'Facere est aliqua D', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(2, 29, 2, 'Letter', 'Asperiores alias ass', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(3, 29, 3, 'Pass/fail', 'Ad non ipsum dolor o', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(4, 29, 4, 'Letter', 'Dolorem quidem autem', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(5, 29, 5, 'Numeric', 'Rerum in placeat ar', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(6, 29, 6, 'Letter', 'Obcaecati quasi corp', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(7, 29, 7, 'Pass/fail', 'Soluta lorem alias a', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(8, 29, 8, 'Standards-based', 'Unde consequatur qui', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(9, 29, 9, 'Pass/fail', 'Aut in recusandae A', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(10, 29, 10, 'Letter', 'Quis odio explicabo', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(11, 29, 11, 'Pass/fail', 'Numquam in vel dolor', NULL, '2023-05-19 13:35:57', '2023-05-19 13:35:57'),
(12, 30, 1, 'Letter', 'Eos rerum ut ad reru5555555555', NULL, '2023-05-19 14:30:47', '2023-05-19 14:59:58'),
(13, 30, 2, 'Numeric', 'Exercitationem exerc', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(14, 30, 3, 'Pass/fail', 'Eu accusantium ut si', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(15, 30, 4, 'Percentage', 'Veniam non quos eum', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(16, 30, 5, 'Pass/fail', 'Saepe sed Nam optio', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(17, 30, 6, 'Standards-based', 'Est ad in delectus', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(18, 30, 7, 'Numeric', 'Id dolor doloribus a', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(19, 30, 8, 'Percentage', 'Eveniet ullamco ass', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(20, 30, 9, 'Pass/fail', 'Ea sunt optio est', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(21, 30, 10, 'Standards-based', 'Tempor a laboris et', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(22, 30, 11, 'Numeric', 'Corrupti culpa nost', NULL, '2023-05-19 14:30:47', '2023-05-19 14:30:47'),
(23, 31, 1, 'Percentage', 'Aliquip cillum magna', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(24, 31, 2, 'Letter', 'Labore velit dolorib', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(25, 31, 3, 'Letter', 'Qui natus fugiat in', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(26, 31, 4, 'Percentage', 'Vel et nulla ea tota', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(27, 31, 5, 'Standards-based', 'Fuga Quidem volupta', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(28, 31, 6, 'Percentage', 'In harum magnam aut', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(29, 31, 7, 'Standards-based', 'Ipsum in voluptatum', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(30, 31, 8, 'Numeric', 'Nam perspiciatis au', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(31, 31, 9, 'Percentage', 'Sint quam sit ad se', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(32, 31, 10, 'Pass/fail', 'Consequatur Sunt e', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(33, 31, 11, 'Standards-based', 'Et perspiciatis ven', NULL, '2023-05-19 15:11:42', '2023-05-19 15:11:42'),
(34, 32, 1, 'Letter', 'Officia amet offici', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(35, 32, 2, 'Letter', 'Explicabo Necessita', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(36, 32, 3, 'Percentage', 'Ullam nulla harum si', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(37, 32, 4, 'Standards-based', 'Non dolor magni vel', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(38, 32, 5, 'Numeric', 'Nulla qui iste error', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(39, 32, 6, 'Numeric', 'Vel voluptatem Culp', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(40, 32, 7, 'Percentage', 'Omnis soluta quis nu', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(41, 32, 8, 'Standards-based', 'Dolores dolor offici', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(42, 32, 9, 'Letter', 'Temporibus vel maior', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(43, 32, 10, 'Numeric', 'Nemo ipsum nihil do', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(44, 32, 11, 'Pass/fail', 'Unde quos molestiae', NULL, '2023-05-19 16:21:42', '2023-05-19 16:21:42'),
(45, 33, 1, 'Numeric', 'Sapiente fuga Dolor', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(46, 33, 2, 'Standards-based', 'Ad aliquip in et qui', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(47, 33, 3, 'Numeric', 'Sint doloremque sint', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(48, 33, 4, 'Pass/fail', 'Aliquid enim saepe d', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(49, 33, 5, 'Standards-based', 'Similique quisquam d', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(50, 33, 6, 'Pass/fail', 'Eiusmod expedita exe', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(51, 33, 7, 'Pass/fail', 'Accusantium voluptat', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(52, 33, 8, 'Pass/fail', 'Dolore et cillum nih', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(53, 33, 9, 'Pass/fail', 'Et consequuntur volu', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(54, 33, 10, 'Standards-based', 'Quae aspernatur et q', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(55, 33, 11, 'Numeric', 'Ducimus enim except', NULL, '2023-06-09 17:39:00', '2023-06-09 17:39:00'),
(56, 34, 1, 'Percentage', 'Eveniet est sequi', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(57, 34, 2, 'Pass/fail', 'Consequuntur dolore', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(58, 34, 3, 'Pass/fail', 'Culpa voluptate dol', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(59, 34, 4, 'Numeric', 'Rerum consequatur c', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(60, 34, 5, 'Letter', 'Blanditiis sit sequi', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(61, 34, 6, 'Numeric', 'Maiores dolores assu', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(62, 34, 7, 'Percentage', 'Eos totam explicabo', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(63, 34, 8, 'Percentage', 'Ipsum modi saepe sa', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(64, 34, 9, 'Letter', 'Omnis obcaecati ut f', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(65, 34, 10, 'Letter', 'Dolorem beatae nostr', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(66, 34, 11, 'Standards-based', 'Assumenda dolor est', NULL, '2023-08-19 18:48:56', '2023-08-19 18:48:56'),
(67, 35, 1, 'Standards-based', 'Debitis voluptas rat', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(68, 35, 2, 'Pass/fail', 'Dolores tempor tenet', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(69, 35, 3, 'Percentage', 'Quas officia quo lab', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(70, 35, 4, 'Letter', 'Saepe ullam fugiat f', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(71, 35, 5, 'Percentage', 'Et in veniam nemo s', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(72, 35, 6, 'Percentage', 'Provident quae nost', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(73, 35, 7, 'Letter', 'Aperiam et ex qui di', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(74, 35, 8, 'Numeric', 'Error reprehenderit', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(75, 35, 9, 'Numeric', 'Occaecat voluptates', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(76, 35, 10, 'Standards-based', 'Et consequatur sit v', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(77, 35, 11, 'Standards-based', 'Doloremque aut duis', NULL, '2023-09-21 17:12:39', '2023-09-21 17:12:39'),
(78, 36, 1, 'Numeric', 'Omnis dolor ullamco', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(79, 36, 2, 'Percentage', 'Facere doloremque si', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(80, 36, 3, 'Numeric', 'Ratione anim ut plac', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(81, 36, 4, 'Letter', 'Eiusmod ut ullamco d', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(82, 36, 5, 'Numeric', 'Irure maxime exercit', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(83, 36, 6, 'Percentage', 'Tempora aut quos pro', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(84, 36, 7, 'Numeric', 'Omnis voluptas id ir', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(85, 36, 8, 'Percentage', 'Porro aut aut quia t', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(86, 36, 9, 'Letter', 'Cupiditate inventore', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(87, 36, 10, 'Pass/fail', 'Autem adipisci volup', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(88, 36, 11, 'Pass/fail', 'Quis similique cupid', NULL, '2023-09-23 16:00:21', '2023-09-23 16:00:21'),
(89, 37, 1, 'Letter', 'Incididunt molestias', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(90, 37, 2, 'Numeric', 'Laboris laudantium', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(91, 37, 3, 'Pass/fail', 'Modi nihil delectus', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(92, 37, 4, 'Standards-based', 'Saepe id earum archi', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(93, 37, 5, 'Percentage', 'Doloribus velit dist', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(94, 37, 6, 'Standards-based', 'Adipisci obcaecati v', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(95, 37, 7, 'Standards-based', 'Maiores placeat sin', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(96, 37, 8, 'Percentage', 'Aut labore ea odit n', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(97, 37, 9, 'Standards-based', 'Enim proident sed e', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(98, 37, 10, 'Percentage', 'Exercitationem magni', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(99, 37, 11, 'Numeric', 'Iusto voluptates sus', NULL, '2023-10-05 17:08:03', '2023-10-05 17:08:03'),
(100, 38, 1, 'Numeric', 'Deleniti temporibus', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(101, 38, 2, 'Pass/fail', 'Dolorem commodi in m', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(102, 38, 3, 'Numeric', 'Nulla incidunt ab s', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(103, 38, 4, 'Standards-based', 'Nihil aut laboriosam', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(104, 38, 5, 'Letter', 'Consequatur Quam re', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(105, 38, 6, 'Pass/fail', 'Nisi temporibus aliq', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(106, 38, 7, 'Pass/fail', 'Vero autem illum nu', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(107, 38, 8, 'Percentage', 'Et explicabo Occaec', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(108, 38, 9, 'Pass/fail', 'Doloribus labore adi', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(109, 38, 10, 'Letter', 'Eaque repudiandae ma', NULL, '2023-10-25 17:20:05', '2023-10-25 17:20:05'),
(110, 39, 1, 'Percentage', 'Qui quas est id fugi', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(111, 39, 2, 'Percentage', 'Lorem quia qui ipsum', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(112, 39, 3, 'Percentage', 'Voluptates minim ali', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(113, 39, 4, 'Pass/fail', 'Ut elit architecto', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(114, 39, 5, 'Percentage', 'Ipsum cupiditate et', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(115, 39, 6, 'Percentage', 'Officiis fugit adip', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(116, 39, 7, 'Pass/fail', 'Sit accusamus minus', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(117, 39, 8, 'Percentage', 'Sunt dolores aut id', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(118, 39, 9, 'Pass/fail', 'Non ex voluptatem re', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(119, 39, 10, 'Percentage', 'Anim cillum ea illo', NULL, '2023-10-26 15:55:19', '2023-10-26 15:55:19'),
(120, 40, 1, 'Pass/fail', 'Culpa omnis quos qu', 5, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(121, 40, 2, 'Percentage', 'Voluptas excepteur q', 10, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(122, 40, 3, 'Pass/fail', 'Corrupti lorem quos', 15, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(123, 40, 4, 'Percentage', 'Sequi mollitia ipsam', 9, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(124, 40, 5, 'Pass/fail', 'Quibusdam aut nemo a', 12, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(125, 40, 6, 'Percentage', 'Dolores qui aperiam', 10, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(126, 40, 7, 'Percentage', 'Omnis suscipit ad in', 10, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(127, 40, 8, 'Pass/fail', 'Ad facilis aliquam a', 8, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(128, 40, 9, 'Percentage', 'Dolorum sunt et est', 9, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(129, 40, 10, 'Pass/fail', 'Aute dignissimos ex', 12, '2023-10-26 15:58:28', '2023-10-26 15:58:28'),
(130, 41, 1, 'Percentage', 'Neque magna soluta n', 15, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(131, 41, 2, 'Percentage', 'Velit aspernatur iur', 25, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(132, 41, 3, 'Pass/fail', 'Nisi dolore sit sit', 0, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(133, 41, 4, 'Pass/fail', 'Eaque neque saepe eu', 0, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(134, 41, 5, 'Percentage', 'Sequi sit et quia co', 25, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(135, 41, 6, 'Pass/fail', 'Qui nihil repudianda', 0, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(136, 41, 7, 'Percentage', 'Optio excepturi in', 5, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(137, 41, 8, 'Percentage', 'Repudiandae consequa', 10, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(138, 41, 9, 'Percentage', 'Magnam in fugit dig', 5, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(139, 41, 10, 'Percentage', 'Sit ab in aspernatu', 15, '2023-10-30 16:20:18', '2023-10-30 16:20:18'),
(140, 42, 1, 'Percentage', 'Tenetur hic ullam do', 25, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(141, 42, 2, 'Pass/fail', 'Aliquip occaecat qui', 0, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(142, 42, 3, 'Pass/fail', 'Quia cum qui non ips', 0, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(143, 42, 4, 'Percentage', 'Do ut quae maiores a', 10, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(144, 42, 5, 'Percentage', 'Nihil quis quam pari', 15, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(145, 42, 6, 'Pass/fail', 'Qui quia dolorum ani', 0, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(146, 42, 7, 'Percentage', 'Dolor enim nisi cupi', 10, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(147, 42, 8, 'Percentage', 'Vitae sit possimus', 15, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(148, 42, 9, 'Pass/fail', 'Et sed ea non autem', 0, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(149, 42, 10, 'Pass/fail', 'Veniam dolores in s', 25, '2023-10-30 16:21:45', '2023-10-30 16:21:45'),
(150, 43, 1, 'Percentage', 'Sint dignissimos se', 15, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(151, 43, 2, 'Percentage', 'Unde quia est archi', 10, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(152, 43, 3, 'Pass/fail', 'Quo sunt debitis nis', 0, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(153, 43, 4, 'Percentage', 'Numquam quibusdam no', 10, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(154, 43, 5, 'Pass/fail', 'Culpa deleniti a do', 0, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(155, 43, 6, 'Pass/fail', 'Iste molestias ipsum', 5, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(156, 43, 7, 'Percentage', 'Nulla quia hic sunt', 15, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(157, 43, 8, 'Pass/fail', 'Et in dicta odit rep', 15, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(158, 43, 9, 'Percentage', 'Earum est aut aliqui', 5, '2023-10-30 16:22:59', '2023-10-30 16:22:59'),
(159, 43, 10, 'Percentage', 'Sapiente sed quo com', 25, '2023-10-30 16:22:59', '2023-10-30 16:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `course_outlines`
--

CREATE TABLE `course_outlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `description` varchar(125) DEFAULT NULL,
  `course_id` varchar(125) NOT NULL,
  `course_format` varchar(125) NOT NULL,
  `requirements` varchar(125) NOT NULL,
  `delivery_method` varchar(125) NOT NULL,
  `learning_outcomes` varchar(125) NOT NULL,
  `learning_objectives` varchar(125) NOT NULL,
  `pass_mark` varchar(125) NOT NULL,
  `credit_transferable` varchar(125) NOT NULL,
  `credit_accreditable` tinyint(1) NOT NULL,
  `registration_note` longtext,
  `important_information` longtext,
  `report_progress` tinyint(1) NOT NULL,
  `duration` varchar(125) NOT NULL,
  `policy` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_outlines`
--

INSERT INTO `course_outlines` (`id`, `school_id`, `semester_id`, `academic_year_id`, `name`, `description`, `course_id`, `course_format`, `requirements`, `delivery_method`, `learning_outcomes`, `learning_objectives`, `pass_mark`, `credit_transferable`, `credit_accreditable`, `registration_note`, `important_information`, `report_progress`, `duration`, `policy`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 'Jena Curry', NULL, '9', '8', 'Porro magna aperiam', '3', 'A cum porro a volupt', 'Consequatur Nam eni', 'Aliquip tenetur occa', '0', 0, NULL, NULL, 0, 'Quasi in adipisci na', NULL, '2023-05-01 11:57:14', '2023-05-01 11:57:14'),
(2, 1, NULL, 1, 'Course Outline Software-eng 2022', NULL, '8', '0', 'Saepe laudantium es', '0', 'Est qui ad temporibu', 'Aspernatur ducimus', 'Autem possimus dolo', '0', 0, NULL, NULL, 1, 'Deleniti corrupti v', NULL, '2023-05-01 12:04:00', '2023-05-01 12:04:00'),
(3, 1, NULL, 1, 'Aimee Edwards', NULL, '3', '3', 'Tenetur cupidatat Na', '2', 'Mollitia quis vero n', 'Hic esse vel volupta', 'Ullamco qui lorem el', '1', 0, NULL, NULL, 1, 'Iusto earum dolore s', NULL, '2023-05-01 16:04:17', '2023-05-01 16:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Certificate', 1, NULL, NULL, NULL, '2022-12-24 06:45:24'),
(2, 'Diploma', 1, NULL, NULL, NULL, '2022-12-24 06:45:24'),
(3, 'Bachelor Degree', 1, NULL, NULL, NULL, '2022-12-24 06:45:47'),
(4, 'Master Degree', 1, NULL, NULL, NULL, '2022-12-24 06:45:47'),
(5, 'Ph.D. Degree', 1, NULL, NULL, NULL, '2022-12-24 06:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `report_no` varchar(50) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `comment` text,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`id`, `school_id`, `report_no`, `name`, `account_type`, `department_id`, `date`, `start_time`, `end_time`, `comment`, `status`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1677522378', 'South Africa', 5, 7, '2023-02-21 18:00:00', '2023-08-19 00:28:00', '2023-08-19 04:26:00', 'tewst', 1, NULL, 2, 2, '2023-02-27 18:27:14', '2023-03-06 09:14:19'),
(2, 1, '1678957574', 'Fulton Casey', 2, 4, '1984-03-21 18:00:00', '2023-08-19 06:11:00', '2023-08-19 21:49:00', 'Nostrum voluptatem q', 1, NULL, 2, 2, '2023-03-16 09:06:24', '2023-03-16 09:06:24'),
(3, 1, NULL, 'Mara Ford', NULL, NULL, NULL, NULL, NULL, 'Aliqua Vero corrupt', 1, NULL, NULL, NULL, '2023-08-19 14:53:51', '2023-08-19 14:53:51'),
(4, 1, '1692457015', 'Alyssa Boyle', NULL, 9, '1977-12-05 01:29:00', '2020-12-15 20:48:00', '2015-08-27 18:31:00', 'Fugit eveniet quod', 1, 'Consequuntur beatae', NULL, NULL, '2023-08-19 14:57:04', '2023-08-19 15:20:30'),
(5, 1, '1696608845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-10-06 16:14:11', '2023-10-06 16:14:11'),
(6, 1, '1696608858', 'Macey Lindsey', NULL, 16, '2012-07-07 11:27:00', '2021-10-13 01:10:00', '2020-08-13 06:10:00', 'Corrupti quibusdam', 1, 'Cupidatat voluptas o', NULL, NULL, '2023-10-06 16:14:26', '2023-10-06 17:29:09'),
(7, 1, NULL, 'Thaddeus Bray', NULL, 14, '2011-07-18 20:50:00', NULL, NULL, 'Odio sint minus non', 1, 'Excepturi eaque qui', NULL, NULL, '2023-10-06 16:35:30', '2023-10-06 16:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `dates_and_deadlines_in_school_program`
--

CREATE TABLE `dates_and_deadlines_in_school_program` (
  `id` int(11) NOT NULL,
  `information_session` timestamp NULL DEFAULT NULL,
  `accepting_application` timestamp NULL DEFAULT NULL,
  `registration` timestamp NULL DEFAULT NULL,
  `stating_program` timestamp NULL DEFAULT NULL,
  `ending_program` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dates_and_deadlines_in_school_program`
--

INSERT INTO `dates_and_deadlines_in_school_program` (`id`, `information_session`, `accepting_application`, `registration`, `stating_program`, `ending_program`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, '2013-02-10 01:23:00', '1983-07-21 20:16:00', '1976-05-24 17:43:00', '1992-10-07 14:14:00', '1970-07-02 19:34:00', 1, NULL, NULL, '2023-03-16 05:51:17', '2023-03-16 05:55:43'),
(5, '1983-02-24 17:07:00', '2019-02-08 08:15:00', '1986-06-13 11:53:00', '1983-10-15 05:10:00', '2021-10-23 23:31:00', 1, NULL, NULL, '2023-03-16 05:57:07', '2023-03-16 05:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `deadlines`
--

CREATE TABLE `deadlines` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `event_code` varchar(125) DEFAULT NULL,
  `event_name` varchar(125) DEFAULT NULL,
  `due_on` varchar(125) DEFAULT NULL,
  `recuring_cycle` varchar(125) DEFAULT NULL,
  `comment` text,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deadlines`
--

INSERT INTO `deadlines` (`id`, `school_id`, `event_code`, `event_name`, `due_on`, `recuring_cycle`, `comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'event001', 'Event 1', '2023-03-10', 'test y', 'test', 1, 2, 2, '2022-12-30 00:18:19', '2022-12-29 18:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `declaration`
--

CREATE TABLE `declaration` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `declaration`
--

INSERT INTO `declaration` (`id`, `name`, `user_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.', 2, 1, 1, '2022-11-26 02:50:07', '2022-11-26 02:50:07'),
(2, 'I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.', 4, 1, 1, '2022-11-26 03:01:43', '2022-11-26 03:01:43'),
(3, 'I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.', 7, 1, 1, '2022-11-27 08:21:28', '2022-11-27 08:21:28'),
(4, 'I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.', 8, 1, 1, '2022-12-11 00:46:52', '2022-12-11 00:46:52'),
(5, 'I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.', 11, 1, 1, '2023-03-02 00:25:31', '2023-03-02 00:25:31'),
(6, 'I .... as an authorized person certify that provided information on this account is correct, completed and prepared by authorized person from business owner or company director.', 13, 1, 1, '2023-03-16 22:28:25', '2023-03-16 22:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_method`
--

CREATE TABLE `delivery_method` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_method`
--

INSERT INTO `delivery_method` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Online', 1, NULL, NULL, NULL, '2022-12-24 06:49:31'),
(2, 'In Person', 1, NULL, NULL, NULL, '2022-12-24 06:49:31'),
(3, 'Off Line', 1, NULL, NULL, NULL, '2022-12-24 06:49:53'),
(4, 'Online- In Person', 1, NULL, NULL, NULL, '2022-12-24 06:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL DEFAULT '' COMMENT '1=Administrative Departments, 2=Educational Departments ',
  `head` varchar(125) DEFAULT NULL,
  `campus_id` bigint(20) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `operation_hour` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `unique_id`, `name`, `school_id`, `type`, `head`, `campus_id`, `phone`, `email`, `operation_hour`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, '5e69f605-5d53-4823-ba40-cdc7c699e86f', 'Camilla Rodgers', 1, 'Administrative', 'Quam quia placeat u', NULL, '+1 (396) 467-5234', 'gililyqi@mailinator.com', '80', 1, 2, NULL, '2023-09-15 16:13:25', '2023-09-15 16:13:25'),
(14, 'b92a8a9b-a44d-4906-aaac-4d4253363fec', 'Simon Wooten', 1, 'Administrative', 'Vel id magnam aperia', NULL, '+1 (848) 446-9018', 'cenekitob@mailinator.com', '60', 1, 2, NULL, '2023-09-15 16:17:18', '2023-09-15 16:17:18'),
(15, 'ad5bb2fc-8f19-441b-be28-7939511b2a4e', 'Sean Booth', 1, 'Administrative', 'Ipsam sit velit iru', NULL, '+1 (261) 932-9264', 'cefi@mailinator.com', '30', 1, 2, NULL, '2023-09-15 16:18:47', '2023-09-15 16:18:47'),
(16, '6f2cb0d3-fb1f-47d6-8a2d-6f0e70ba16d1', 'Fulton Woods', 1, 'Educational', 'Nostrud hic quidem a', NULL, '+1 (998) 528-2147', 'japebyvoha@mailinator.com', '67', 1, 2, NULL, '2023-09-15 16:19:46', '2023-09-15 16:19:46'),
(17, '7c5d4c5d-3919-4439-9947-cf9e645c03d4', 'Virginia Page', 1, 'Administrative', 'Cupidatat neque dign', 1, '+1 (111) 974-7834', 'lada@mailinator.com', '70', 1, 2, NULL, '2023-09-15 16:21:37', '2023-09-15 16:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `education_levels`
--

CREATE TABLE `education_levels` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_grade` varchar(50) DEFAULT NULL,
  `end_grade` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_levels`
--

INSERT INTO `education_levels` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `start_grade`, `end_grade`, `description`) VALUES
(1, 'Pre-School', 0, NULL, NULL, NULL, '2023-07-06 11:05:49', NULL, NULL, NULL),
(2, 'Primary School', 1, NULL, NULL, NULL, '2022-12-24 06:42:23', NULL, NULL, NULL),
(3, 'Collage', 1, NULL, NULL, NULL, '2022-12-24 06:43:17', NULL, NULL, NULL),
(4, 'Institute of Technology', 1, NULL, NULL, NULL, '2022-12-24 06:43:17', NULL, NULL, NULL),
(5, 'University', 1, NULL, NULL, NULL, '2022-12-24 06:43:54', NULL, NULL, NULL),
(6, 'Professional Association', 1, NULL, NULL, NULL, '2022-12-24 06:43:54', NULL, NULL, NULL),
(7, 'Kelsey Leach', 1, NULL, NULL, '2023-07-06 16:46:13', '2023-07-06 10:46:13', NULL, NULL, NULL),
(8, 'Fletcher Gilbert', 1, NULL, NULL, '2023-07-06 17:04:54', '2023-07-06 11:04:54', NULL, NULL, NULL),
(9, 'Hayley Wiley', 0, NULL, NULL, '2023-07-06 17:05:41', '2023-07-06 11:05:41', 'Nisi et anim dolorem', 'Id quos temporibus v', 'Qui omnis dolorem su');

-- --------------------------------------------------------

--
-- Table structure for table `education_team`
--

CREATE TABLE `education_team` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `team_no` varchar(125) DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT NULL,
  `closing_date` timestamp NULL DEFAULT NULL,
  `net_operating_days` varchar(125) DEFAULT NULL,
  `current_status` varchar(125) DEFAULT NULL,
  `team_group` int(11) DEFAULT NULL,
  `goal` varchar(125) DEFAULT NULL,
  `team_type` int(11) DEFAULT NULL,
  `team_learder_user_id` int(11) DEFAULT NULL,
  `education_level` varchar(125) DEFAULT NULL,
  `about_me` text,
  `team_leader_email` varchar(125) DEFAULT NULL,
  `team_leader_phone` varchar(125) DEFAULT NULL,
  `team_leader_positions` varchar(125) DEFAULT NULL,
  `rule_no` varchar(125) DEFAULT NULL,
  `rule_description` text,
  `restrictions_no` varchar(125) DEFAULT NULL,
  `restrictions_description` text,
  `manage_participants_in_education_team` int(11) DEFAULT NULL,
  `participants_availability_and_contacts_in_education_team` int(11) DEFAULT NULL,
  `task_assigner_in_education_team` int(11) DEFAULT NULL,
  `closing_in_education_team` int(11) DEFAULT NULL,
  `reopening_in_education_team` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_team`
--

INSERT INTO `education_team` (`id`, `school_id`, `team_no`, `creation_date`, `closing_date`, `net_operating_days`, `current_status`, `team_group`, `goal`, `team_type`, `team_learder_user_id`, `education_level`, `about_me`, `team_leader_email`, `team_leader_phone`, `team_leader_positions`, `rule_no`, `rule_description`, `restrictions_no`, `restrictions_description`, `manage_participants_in_education_team`, `participants_availability_and_contacts_in_education_team`, `task_assigner_in_education_team`, `closing_in_education_team`, `reopening_in_education_team`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1685466820', '2019-10-20 14:05:00', NULL, '9', 'In-Processes', 3, 'Quidem in tempora do', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-05-30 23:14:14', '2023-05-30 17:14:14'),
(2, 1, '1697124596', '2011-04-16 17:09:00', NULL, '9', 'Closed', 3, 'Et earum voluptas do', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-10-12 21:30:49', '2023-10-12 15:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `relation` varchar(125) NOT NULL,
  `image` varchar(125) DEFAULT NULL,
  `address` varchar(125) DEFAULT NULL,
  `phone` varchar(125) NOT NULL,
  `email` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `name`, `relation`, `image`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Rebecca Barber', 'Reprehenderit conseq', NULL, 'Doloribus sed quo sa', '+1 (855) 887-1726', 'visedarod@mailinator.com', '2023-07-07 16:31:21', '2023-07-07 16:31:21'),
(3, 'Mariko Buchanan', 'Esse consequatur cu', NULL, 'Enim aspernatur irur', '+1 (467) 954-5873', 'sijepagy@mailinator.com', '2023-07-07 17:27:17', '2023-07-07 17:27:17'),
(4, 'Regina Marshall', 'Id laborum reprehen', NULL, 'Sed eveniet aut qui', '+1 (569) 755-4467', 'qowybuban@mailinator.com', '2023-07-08 16:26:18', '2023-07-08 16:26:18'),
(5, 'Willa Bradford', 'Harum vel non verita', NULL, 'Ut cillum dicta aut', '+1 (297) 877-6528', 'pyfojug@mailinator.com', '2023-07-08 16:33:05', '2023-07-08 16:33:05'),
(6, 'Thane Boone', 'Fugiat ipsum aliqu', NULL, 'Sed est fuga Et id', '+1 (395) 593-5307', 'xypab@mailinator.com', '2023-07-09 13:28:41', '2023-07-09 13:28:41'),
(7, 'Amaya Slater', 'Ab aspernatur qui co', NULL, 'Voluptate sit tempor', '+1 (894) 335-5756', 'mepujid@mailinator.com', '2023-07-09 13:28:53', '2023-07-09 13:28:53'),
(8, 'Xenos Brady', 'Nulla qui optio odi', NULL, 'Blanditiis adipisici', '+1 (632) 842-1973', 'kopumoxef@mailinator.com', '2023-07-10 16:11:22', '2023-07-10 16:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(125) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `school_id`, `employee_name`, `time_in`, `time_out`, `created_at`, `updated_at`, `date`) VALUES
(1, 1, 'Sophia Lawrence', '07:54:00', '11:38:00', '2023-06-01 18:27:02', '2023-06-01 18:27:02', NULL),
(2, 1, 'Maia Johns45', '23:19:00', '14:15:00', '2023-06-06 18:14:18', '2023-06-06 18:14:54', '2005-02-27 03:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_date`
--

CREATE TABLE `event_date` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `event_id` varchar(125) DEFAULT NULL,
  `from_date_time` timestamp NULL DEFAULT NULL,
  `to_date_time` timestamp NULL DEFAULT NULL,
  `title` varchar(125) DEFAULT NULL,
  `post_in_edudip` varchar(125) DEFAULT NULL,
  `post_in_admdip` varchar(125) DEFAULT NULL,
  `post_in_accounthold` varchar(125) DEFAULT NULL,
  `comments` text,
  `required_action` text,
  `first_reminder_date_time` timestamp NULL DEFAULT NULL,
  `second_reminder_date_time` timestamp NULL DEFAULT NULL,
  `third_reminder_date_time` timestamp NULL DEFAULT NULL,
  `fourth_reminder_date_time` timestamp NULL DEFAULT NULL,
  `reminder_method` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `recurrence_pattern` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_date`
--

INSERT INTO `event_date` (`id`, `school_id`, `event_id`, `from_date_time`, `to_date_time`, `title`, `post_in_edudip`, `post_in_admdip`, `post_in_accounthold`, `comments`, `required_action`, `first_reminder_date_time`, `second_reminder_date_time`, `third_reminder_date_time`, `fourth_reminder_date_time`, `reminder_method`, `status`, `recurrence_pattern`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '223344', '2023-03-08 18:52:00', '2023-03-23 18:52:00', '18', '7', 'Select Educational Departments', '2', 'test1', 'Love you', '2023-03-27 18:53:00', '2023-03-28 18:53:00', '2023-03-29 18:53:00', '2023-03-30 18:53:00', '2', 1, NULL, 2, 2, '2023-02-28 19:09:57', '2023-03-16 09:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `fees_and_charges`
--

CREATE TABLE `fees_and_charges` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `fee_domestic` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fee_international` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fee_special_needs` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comment` text,
  `refundable` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=no, 1=yes',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(50) DEFAULT NULL,
  `program_id` bigint(20) DEFAULT NULL,
  `grade_year_id` bigint(20) DEFAULT NULL,
  `academic_year_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees_and_charges`
--

INSERT INTO `fees_and_charges` (`id`, `school_id`, `category_id`, `name`, `fee_domestic`, `fee_international`, `fee_special_needs`, `comment`, `refundable`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `title`, `program_id`, `grade_year_id`, `academic_year_id`) VALUES
(1, 1, 4, 'Parking Fee t', 250.00, 200.00, 300.00, 'test', 0, 1, NULL, 2, '2022-12-24 23:17:27', '2022-12-28 18:13:03', NULL, NULL, NULL, NULL),
(2, 1, NULL, 'Winter Roberson', 4005.00, 545.00, 534.00, 'Asperiores illum in', 0, 1, NULL, 2, '2023-07-15 22:48:45', '2023-07-15 16:52:33', NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, 0.00, 1500.00, 500.00, 'gaggasgsa', 0, 1, NULL, NULL, '2023-07-26 17:19:52', '2023-07-26 11:19:52', NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, 0.00, 1500.00, 500.00, 'gaggasgsa', 0, 1, NULL, NULL, '2023-07-26 17:20:11', '2023-07-26 11:20:11', NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, 0.00, 50.00, 534.00, 'gagagg', 0, 1, NULL, NULL, '2023-07-26 17:20:44', '2023-07-26 11:20:44', NULL, NULL, NULL, NULL),
(6, 1, 2, NULL, 0.00, 1500.00, 534.00, NULL, 1, 1, NULL, NULL, '2023-07-26 17:29:47', '2023-07-26 12:21:52', NULL, 16, 40, 2),
(7, 1, 5, NULL, 0.00, 1500.00, 500.00, NULL, 0, 1, NULL, NULL, '2023-07-29 01:04:20', '2023-10-05 18:27:07', NULL, 16, 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `parent_id` bigint(20) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `status`, `parent_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Text Books', 1, NULL, NULL, NULL, NULL, '2022-12-24 16:43:17'),
(2, 'Supplies', 1, NULL, NULL, NULL, NULL, '2022-12-24 16:43:17'),
(4, 'Service Charges', 1, NULL, NULL, NULL, NULL, '2022-12-24 16:43:46'),
(5, 'Tuition', 1, NULL, NULL, NULL, '2023-07-26 13:52:49', '2023-07-26 07:52:49'),
(6, 'Tate Byers', 1, 5, NULL, NULL, '2023-10-05 23:51:14', '2023-10-05 17:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `financial_in_student_registration`
--

CREATE TABLE `financial_in_student_registration` (
  `id` int(11) NOT NULL,
  `cost_type` int(11) DEFAULT NULL,
  `amount` varchar(125) DEFAULT NULL,
  `due_date` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_in_student_registration`
--

INSERT INTO `financial_in_student_registration` (`id`, `cost_type`, `amount`, `due_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 2, '5635', '2009-02-05T17:07', 1, NULL, NULL, '2023-03-16 17:49:04', '2023-03-16 17:49:04'),
(8, 4, '34522', '1979-04-19T10:44', 1, NULL, NULL, '2023-03-17 04:42:37', '2023-03-17 04:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets`
--

CREATE TABLE `fixed_assets` (
  `id` int(11) NOT NULL,
  `asset_name` varchar(125) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `asset_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asset_sub_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(125) DEFAULT NULL,
  `color` varchar(125) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `serial_number` varchar(125) DEFAULT NULL,
  `asset_condition` varchar(125) DEFAULT NULL,
  `comment` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `weight` decimal(10,2) DEFAULT NULL,
  `length` decimal(10,2) DEFAULT NULL,
  `width` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_assets`
--

INSERT INTO `fixed_assets` (`id`, `asset_name`, `label`, `quantity`, `name`, `asset_type_id`, `asset_sub_type_id`, `school_id`, `model`, `color`, `size`, `serial_number`, `asset_condition`, `comment`, `created_by`, `updated_by`, `created_at`, `updated_at`, `weight`, `length`, `width`) VALUES
(33, 'Christine Sullivan2', NULL, NULL, NULL, 2, NULL, 1, 'Cumque sapiente eaqu', NULL, 'Aperiam assumenda in', '840', 'Under Repair', NULL, NULL, NULL, '2023-03-30 20:15:43', '2023-03-30 20:23:09', NULL, NULL, NULL),
(34, 'Imelda Rutledge', NULL, NULL, NULL, 1, NULL, 1, 'Et nisi dolore labor', NULL, 'Aut tenetur commodi', '667', NULL, NULL, NULL, NULL, '2023-04-13 19:06:01', '2023-04-13 19:06:01', NULL, NULL, NULL),
(35, 'Sarah Potts', NULL, NULL, NULL, 1, NULL, 1, 'Possimus voluptate', NULL, 'Occaecat aut tenetur', '618', NULL, NULL, NULL, NULL, '2023-09-23 18:18:18', '2023-09-23 18:18:18', NULL, NULL, NULL),
(36, 'Nita Hutchinson', NULL, NULL, NULL, 1, NULL, 1, 'Iste quaerat ad in a', NULL, 'Ipsa irure officia', '164', NULL, NULL, NULL, NULL, '2023-09-23 18:22:12', '2023-09-23 18:22:12', NULL, NULL, NULL),
(37, 'Jeanette Harrell', NULL, NULL, NULL, 1, 3, 1, 'Quia quidem non labo', NULL, 'Cillum rem amet et', '280', NULL, NULL, NULL, NULL, '2023-09-23 18:23:13', '2023-09-23 18:23:13', NULL, NULL, NULL),
(38, 'Athena Bryan', NULL, NULL, NULL, 1, 3, 1, 'Suscipit voluptatem', NULL, '70', '331', NULL, NULL, NULL, NULL, '2023-09-23 18:27:23', '2023-09-23 18:27:23', 90.00, 90.00, 80.00),
(39, 'Alisa Hewitt', NULL, NULL, NULL, 1, 3, 1, 'Dolore nemo sequi om', NULL, '10', '389', 'Sold', NULL, NULL, NULL, '2023-10-06 15:55:24', '2023-10-06 15:55:24', 80.00, 50.00, 40.00);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_asset_types`
--

CREATE TABLE `fixed_asset_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fixed_asset_types`
--

INSERT INTO `fixed_asset_types` (`id`, `school_id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Appliance', NULL, '2023-03-29 15:08:40', '2023-03-29 15:08:40'),
(2, 1, 'Air Conditioner', 1, '2023-03-29 15:13:10', '2023-03-30 20:24:56'),
(3, 1, 'Fan', 1, '2023-04-13 19:01:57', '2023-04-13 19:01:57'),
(4, 1, 'Wanda Serrano', 1, '2023-09-23 18:16:30', '2023-09-23 18:16:30'),
(5, 1, 'Ava Schwartz', 1, '2023-10-05 17:42:27', '2023-10-05 17:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `form_type`
--

CREATE TABLE `form_type` (
  `id` int(11) NOT NULL,
  `form_name` varchar(125) DEFAULT NULL,
  `form_level` tinyint(4) NOT NULL DEFAULT '0',
  `parent_form` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_type`
--

INSERT INTO `form_type` (`id`, `form_name`, `form_level`, `parent_form`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Student Registration', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 18:51:29'),
(2, 'Consent forms', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 18:52:22'),
(3, 'Background Check', 1, 2, 1, NULL, NULL, NULL, '2023-03-02 18:53:39'),
(4, 'Credit Check', 1, 2, 1, NULL, NULL, NULL, '2023-03-02 18:55:46'),
(5, 'References', 1, 2, 1, NULL, NULL, NULL, '2023-03-02 18:56:06'),
(6, 'Work History', 1, 2, 1, NULL, NULL, NULL, '2023-03-02 18:56:27'),
(7, 'Defer', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 18:57:19'),
(8, 'Students Assessments', 1, 7, 1, NULL, NULL, NULL, '2023-03-02 18:58:12'),
(9, 'Owing Balance', 1, 7, 1, NULL, NULL, NULL, '2023-03-02 18:58:50'),
(10, 'Extended Absence', 1, 7, 1, NULL, NULL, NULL, '2023-03-02 18:59:13'),
(11, 'Request ', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 18:59:39'),
(12, 'Sick Days', 1, 11, 1, NULL, NULL, NULL, '2023-03-02 19:00:22'),
(13, 'Vacation', 1, 11, 1, NULL, NULL, NULL, '2023-03-02 19:03:44'),
(14, 'Hourly Off time', 1, 11, 1, NULL, NULL, NULL, '2023-03-02 19:04:12'),
(15, 'Advance Payment', 1, 11, 1, NULL, NULL, NULL, '2023-03-02 19:04:56'),
(16, 'Scholarships', 1, 11, 1, NULL, NULL, NULL, '2023-03-02 19:05:19'),
(17, 'Scholarships', 1, 11, 1, NULL, NULL, NULL, '2023-03-02 19:05:23'),
(18, 'Unpaid Owing Balance', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:06:25'),
(19, 'Mark Appeal', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:11:25'),
(20, 'Transfer Subjects/ Course', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:12:58'),
(21, 'Feedback', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:14:42'),
(22, 'Student', 1, 21, 1, NULL, NULL, NULL, '2023-03-02 19:21:44'),
(23, 'Teacher/Instructor', 1, 21, 1, NULL, NULL, NULL, '2023-03-02 19:22:04'),
(24, 'School Staff', 1, 21, 1, NULL, NULL, NULL, '2023-03-02 19:22:35'),
(25, 'Subject/ Course Evaluation', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:23:10'),
(26, 'Scholarship Application Form', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:23:37'),
(27, 'Library Item Hold Request Form', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:24:06'),
(28, 'Recommendation Form', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:24:23'),
(29, 'Interview Evaluation Form', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:24:43'),
(30, 'Suggestion/Recommendation', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:25:06'),
(31, 'Facility Rental Request Forms', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:25:26'),
(32, 'Information Update Forms', 0, 0, 1, NULL, NULL, NULL, '2023-03-02 19:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `grade_scales`
--

CREATE TABLE `grade_scales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade_scales`
--

INSERT INTO `grade_scales` (`id`, `school_id`, `unique_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '58ddc92b-205a-4a03-8948-bdf51463610e', 'John Melendez', 1, '2023-10-26 17:59:59', '2023-10-26 17:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `grade_scale_items`
--

CREATE TABLE `grade_scale_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_scale_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade_scale_items`
--

INSERT INTO `grade_scale_items` (`id`, `grade_scale_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(5, 2, 'A+', 80, '2023-10-26 19:22:30', '2023-10-26 19:22:30'),
(6, 2, 'A', 75, '2023-10-26 19:22:30', '2023-10-26 19:22:30'),
(7, 2, 'A-', 70, '2023-10-26 19:22:30', '2023-10-26 19:22:30'),
(8, 2, 'B+', 65, '2023-10-26 19:22:30', '2023-10-26 19:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `grade_years`
--

CREATE TABLE `grade_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `code` varchar(125) NOT NULL,
  `delivery_method` varchar(125) NOT NULL,
  `type` enum('year','grade') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entrance_requirements` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade_years`
--

INSERT INTO `grade_years` (`id`, `school_id`, `name`, `code`, `delivery_method`, `type`, `created_at`, `updated_at`, `entrance_requirements`, `description`) VALUES
(9, 1, 'Marvin Serrano', 'Abraham Emerson', '2', 'year', '2023-05-10 14:27:35', '2023-05-10 14:27:35', NULL, NULL),
(10, 1, 'Chelsea Cabrera', 'Mollie Mccormick', '3', 'year', '2023-05-10 14:32:03', '2023-05-10 14:32:03', 'Optio aliquid possi', NULL),
(11, 1, 'Dustin Tillman', 'Heather Crosby', '4', 'year', '2023-05-10 14:33:22', '2023-05-10 14:33:22', 'Aliqua Et corrupti', 'Mollit ipsum enim d'),
(12, 1, 'Camille Parker', 'Audrey Alvarez', '1', 'year', '2023-05-11 13:40:31', '2023-05-11 13:40:31', 'Quo recusandae Volu', 'Quod nisi ipsa volu'),
(13, 1, 'Melanie Wilcox', 'Kenyon Benton', '4', 'year', '2023-05-11 13:41:43', '2023-05-11 13:41:43', 'Voluptatem ullamco e', 'Nostrum aliquip fugi'),
(14, 1, 'Melyssa Horton', 'Hannah Burke4', '4', 'year', '2023-05-11 13:42:19', '2023-05-11 13:59:29', 'Cupidatat distinctio', 'Est consequuntur op');

-- --------------------------------------------------------

--
-- Table structure for table `incident_reports`
--

CREATE TABLE `incident_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `incident_no` varchar(125) NOT NULL,
  `noticed_by` varchar(125) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `report_to` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(125) NOT NULL,
  `incident_location` varchar(125) NOT NULL,
  `incident_time` datetime NOT NULL,
  `cause` text,
  `description` text,
  `people_involved` text,
  `immediate_actions_take` text,
  `emergency_called` tinyint(1) NOT NULL DEFAULT '0',
  `police_file_no` varchar(125) DEFAULT NULL,
  `fire_department_file_no` varchar(125) DEFAULT NULL,
  `injured` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incident_reports`
--

INSERT INTO `incident_reports` (`id`, `school_id`, `date`, `incident_no`, `noticed_by`, `name`, `department_id`, `report_to`, `title`, `incident_location`, `incident_time`, `cause`, `description`, `people_involved`, `immediate_actions_take`, `emergency_called`, `police_file_no`, `fire_department_file_no`, `injured`, `created_at`, `updated_at`) VALUES
(1, 1, '1977-10-12 17:50:00', 'Iste possimus nobis', 'Veniam saepe nihil', NULL, 9, NULL, 'Cupidatat sunt eum q', 'Hic dolore fugiat n', '2019-01-27 00:06:00', 'Aut ullam magnam eve', 'Consequatur digniss', 'Rem adipisicing pers', NULL, 1, 'Sequi numquam rerum', 'Autem ut et tenetur', 'Sed fugit sunt recu', '2023-06-06 08:09:37', '2023-06-06 08:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `information_session`
--

CREATE TABLE `information_session` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `date` varchar(125) DEFAULT NULL,
  `information` varchar(200) DEFAULT NULL,
  `departments` int(11) DEFAULT NULL,
  `who_should_attend` int(11) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `booking` varchar(100) DEFAULT NULL,
  `add_to_calender` varchar(250) DEFAULT NULL,
  `contact` varchar(125) DEFAULT NULL,
  `comments` text,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information_session`
--

INSERT INTO `information_session` (`id`, `school_id`, `date`, `information`, `departments`, `who_should_attend`, `location`, `time`, `booking`, `add_to_calender`, `contact`, `comments`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '12/31/2022', '12/31/2022', 1, 2, 'test', '6:00 PM', 'etst', 'https://bootstrap-datepicker.readthedocs.io/en/latest/', '3454566', 'tesfff', 1, NULL, 2, '2022-12-24 01:41:36', '2022-12-23 21:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `policy_no` varchar(125) NOT NULL,
  `maximum_coverage` varchar(125) NOT NULL,
  `issuer_name` varchar(125) NOT NULL,
  `issuer_country` varchar(125) DEFAULT NULL,
  `issuer_state` varchar(125) DEFAULT NULL,
  `issuer_city` varchar(125) DEFAULT NULL,
  `issue_date` date NOT NULL,
  `renew_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `school_id`, `name`, `policy_no`, `maximum_coverage`, `issuer_name`, `issuer_country`, `issuer_state`, `issuer_city`, `issue_date`, `renew_date`, `expiry_date`, `address_id`, `contact_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Sunt amet minus vo', 'Nihil quaerat in duc', 'Summer Frost', NULL, NULL, NULL, '1995-02-16', '1995-02-16', '1983-05-08', 60, 25, '2023-03-22 15:25:10', '2023-03-22 15:25:10'),
(2, 1, NULL, 'Ullamco mollitia Nam', 'Quis tempora modi qu', 'Ina Klein', NULL, NULL, NULL, '2004-02-09', '2004-02-09', '2007-10-13', 64, 29, '2023-03-22 15:25:48', '2023-03-22 15:25:48'),
(3, 1, NULL, 'Odit enim excepturi', 'A sint numquam tempo', 'Ila Dorsey', 'Azerbaijan', 'Kalbajar District', 'Kerbakhiar', '1981-06-21', '1981-06-21', '1997-01-26', 68, 33, '2023-03-22 16:00:10', '2023-03-22 16:00:10'),
(4, 1, NULL, 'Eum veritatis ea pra', 'Excepturi sit cumqu', 'Rina Davenport', NULL, NULL, NULL, '1983-01-10', '1983-01-10', '1997-04-24', 72, 37, '2023-03-22 16:51:44', '2023-03-22 16:51:44'),
(5, 1, NULL, 'Nisi ipsum cillum m', 'Tempora ex tenetur i', 'Wing Love', NULL, NULL, NULL, '1989-02-23', '1989-02-23', '2004-12-19', 76, 41, '2023-03-22 16:54:36', '2023-03-22 16:54:36'),
(6, 1, NULL, 'Officia autem quia a', 'Quidem nihil asperio', 'Josiah Torres', NULL, NULL, NULL, '2018-02-12', '2018-02-12', '2005-06-14', 80, 45, '2023-03-22 16:55:52', '2023-03-22 16:55:52'),
(7, 1, NULL, 'Accusamus inventore', 'Impedit similique s', 'Orli Jennings', NULL, NULL, NULL, '2018-01-14', '2018-01-14', '1975-11-01', 84, 49, '2023-03-23 12:29:21', '2023-03-23 12:29:21'),
(8, 1, NULL, 'Accusamus inventore', 'Impedit similique s', 'Orli Jennings', NULL, NULL, NULL, '2018-01-14', '2018-01-14', '1975-11-01', 88, 53, '2023-03-23 12:31:04', '2023-03-23 12:31:04'),
(9, 1, NULL, 'Incididunt quidem la', 'Repudiandae amet se', 'Armand Higgins', 'United States', 'Alabama', 'Andalusia', '2003-02-27', '2003-02-27', '1985-05-13', 92, 57, '2023-03-24 16:18:06', '2023-03-24 16:18:06'),
(10, 1, NULL, 'Velit consequatur d', 'Accusamus enim magni', 'Joy Norton', 'Mongolia', 'Bayankhongor Province', 'Bayanhongor', '1993-06-15', '1993-06-15', '2009-08-28', 96, 61, '2023-03-24 16:52:47', '2023-03-24 16:52:47'),
(11, 1, NULL, 'Vitae error laborum', 'Exercitationem ratio', 'Rigel Vang', NULL, NULL, NULL, '2011-01-07', '2011-01-07', '2006-08-04', 100, 65, '2023-04-04 15:04:40', '2023-04-04 15:04:40'),
(12, 1, NULL, 'Adipisci consequat', 'Modi iste ratione qu', 'Catherine Saunders', NULL, NULL, NULL, '1970-11-02', '1970-11-02', '2021-05-24', 104, 69, '2023-04-04 15:10:08', '2023-04-04 15:10:08'),
(13, 1, NULL, 'Totam consectetur c', 'Consectetur possimu', 'Madaline Riley', NULL, NULL, NULL, '1979-07-10', '1979-07-10', '2022-04-23', 108, 73, '2023-04-05 16:45:08', '2023-04-05 16:45:08'),
(14, 1, NULL, 'Distinctio Maxime n', 'Eos nihil ducimus', 'Paula Eaton', NULL, NULL, NULL, '2012-04-20', '2012-04-20', '1981-10-17', 112, 77, '2023-04-05 16:45:18', '2023-04-05 16:45:18'),
(15, 1, NULL, 'Consectetur recusan', 'Deserunt rerum conse', 'Claudia Hayden', NULL, NULL, NULL, '1980-03-04', '1980-03-04', '1989-11-21', 116, 81, '2023-04-05 16:45:41', '2023-04-05 16:45:41'),
(16, 1, NULL, 'Eligendi voluptatem', 'Illum rem quia aut', 'Constance Albert', NULL, NULL, NULL, '1984-01-30', '1984-01-30', '1997-07-23', 120, 85, '2023-04-08 17:33:47', '2023-04-08 17:33:47'),
(17, 1, NULL, 'Deserunt natus sed e', 'Est recusandae Et s', 'Raven Hardy', NULL, NULL, NULL, '1975-12-23', '1975-12-23', '1985-01-09', 124, 89, '2023-04-08 17:34:15', '2023-04-08 17:34:15'),
(18, 1, NULL, 'Nihil cupiditate lab', 'Ipsam debitis labori', 'Mason Franks', NULL, NULL, NULL, '2015-11-09', '2015-11-09', '1986-02-26', 128, 93, '2023-04-10 17:39:29', '2023-04-10 17:39:29'),
(19, 1, NULL, 'Sapiente voluptas fu', 'Amet dolor eu eiusm', 'Ulla Tate', NULL, NULL, NULL, '1990-05-11', '1990-05-11', '2016-08-07', 132, 97, '2023-04-10 17:41:00', '2023-04-10 17:41:00'),
(20, 1, NULL, 'Temporibus voluptatu', 'Eu voluptas obcaecat', 'Kelly Warner', NULL, NULL, NULL, '1970-10-26', '1970-10-26', '1980-04-20', 136, 101, '2023-04-10 17:41:50', '2023-04-10 17:41:50'),
(21, 1, NULL, 'Nostrum praesentium', 'Asperiores officia e', 'Beck Simpson', NULL, NULL, NULL, '1970-07-30', '1970-07-30', '1974-01-12', 140, 105, '2023-04-10 17:44:45', '2023-04-10 17:44:45'),
(22, 1, NULL, 'Consequat Reprehend', 'Praesentium non repr', 'Ryan Quinn', NULL, NULL, NULL, '1999-12-20', '1999-12-20', '1983-04-15', 144, 109, '2023-04-10 17:46:12', '2023-04-10 17:46:12'),
(23, 1, NULL, 'Voluptates quia itaq', 'Et amet enim ut inc', 'Haviva Michael', NULL, NULL, NULL, '1993-10-26', '1993-10-26', '1983-07-09', 148, 113, '2023-04-10 17:48:20', '2023-04-10 17:48:20'),
(24, 1, NULL, 'Officia vitae id est', 'Soluta nisi nulla la', 'Ria Grimes', NULL, NULL, NULL, '2010-08-07', '2010-08-07', '2013-11-20', 152, 117, '2023-04-10 17:52:29', '2023-04-10 17:52:29'),
(25, 1, NULL, 'Ipsa excepteur eaqu', 'Et excepturi assumen', 'Colorado Tyler', NULL, NULL, NULL, '2020-07-14', '2020-07-14', '2008-10-22', 156, 121, '2023-04-12 14:52:20', '2023-04-12 14:52:20'),
(26, 1, NULL, 'Rerum et doloremque', 'Hic tempore debitis', 'Edward Ochoa', NULL, NULL, NULL, '1993-03-14', '1993-03-14', '2005-04-04', 160, 125, '2023-04-12 17:27:28', '2023-04-12 17:27:28'),
(27, 1, NULL, 'Nisi laboriosam qui', 'Ea rerum omnis repel', 'Lance Moss', NULL, NULL, NULL, '2008-12-01', '2008-12-01', '2013-06-26', 164, 129, '2023-04-12 17:27:39', '2023-04-12 17:27:39'),
(28, 1, NULL, 'Consectetur quisquam', 'Et sit eiusmod dolor', 'Noel Blanchard', NULL, NULL, NULL, '2012-03-03', '2012-03-03', '1989-03-31', 168, 133, '2023-04-12 17:27:51', '2023-04-12 17:27:51'),
(29, 1, NULL, 'Facere minus qui eli', 'Aliquid voluptas vel', 'Richard Mcfadden', NULL, NULL, NULL, '1998-08-12', '1998-08-12', '1978-07-31', 172, 137, '2023-04-12 17:28:06', '2023-04-12 17:28:06'),
(30, 1, NULL, 'Esse culpa et dolor', 'Earum est ex omnis d', 'Lydia Carpenter', NULL, NULL, NULL, '2019-07-18', '2019-07-18', '2006-08-26', 176, 141, '2023-04-12 17:28:19', '2023-04-12 17:28:19'),
(31, 1, NULL, 'Saepe mollit culpa v', 'In aut quisquam iste', 'Cade Clark', NULL, NULL, NULL, '1988-04-08', '1988-04-08', '1998-06-10', 180, 145, '2023-04-12 17:28:32', '2023-04-12 17:28:32'),
(32, 1, NULL, 'Distinctio Aut fugi', 'In aute voluptate pr', 'Garth Farrell', NULL, NULL, NULL, '1987-04-15', '1987-04-15', '2017-11-13', 184, 149, '2023-04-12 17:28:46', '2023-04-12 17:28:46'),
(33, 1, NULL, 'Sed qui sit amet ne', 'Est elit est haru', 'Brenna Carlson', NULL, NULL, NULL, '1978-05-31', '1978-05-31', '1974-11-14', 190, 153, '2023-04-12 17:47:50', '2023-04-12 17:47:50'),
(34, 1, NULL, 'Aliquam velit autem', 'Voluptate dolores te', 'Denton Hendricks', NULL, NULL, NULL, '2001-11-24', '2001-11-24', '1977-02-08', 194, 157, '2023-04-12 17:48:06', '2023-04-12 17:48:06'),
(35, 1, NULL, 'Neque eiusmod ut mol', 'Ad numquam debitis c', 'Heidi Duncan', NULL, NULL, NULL, '2015-04-21', '2015-04-21', '1993-08-31', 202, 161, '2023-04-13 11:50:18', '2023-04-13 11:50:18'),
(36, 1, NULL, 'Quam ut adipisicing', 'Eaque ullamco id qua', 'Channing Mercado', NULL, NULL, NULL, '1971-05-07', '1971-05-07', '1982-03-22', 206, 165, '2023-04-13 11:50:29', '2023-04-13 11:50:29'),
(37, 1, NULL, 'Voluptatem qui ut au', 'Eum vero in assumend', 'Jarrod Callahan', NULL, NULL, NULL, '1997-09-06', '1997-09-06', '2021-03-08', 230, 169, '2023-05-14 18:40:48', '2023-05-14 18:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_items`
--

CREATE TABLE `inventory_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `stock_qty` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory_items`
--

INSERT INTO `inventory_items` (`id`, `school_id`, `code`, `name`, `stock_qty`, `created_at`, `updated_at`) VALUES
(1, 2, 'A#002', 'fdsfsaf', 50.00, '2023-04-13 19:09:26', '2023-04-13 19:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_trackers`
--

CREATE TABLE `invoice_trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quotation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `return_id` bigint(20) UNSIGNED DEFAULT NULL,
  `debit_memo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `credit_memo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_trackers`
--

INSERT INTO `invoice_trackers` (`id`, `offer_id`, `quotation_id`, `invoice_id`, `order_id`, `return_id`, `debit_memo_id`, `credit_memo_id`, `created_at`, `updated_at`) VALUES
(1, 2, 5, NULL, 21, NULL, 9, NULL, '2023-11-09 16:49:20', '2023-11-11 14:22:48'),
(2, 3, 7, 15, 22, NULL, 13, NULL, '2023-11-11 15:44:58', '2023-11-11 18:08:15'),
(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-11 18:56:29', '2023-11-11 18:56:29'),
(4, 5, 12, NULL, NULL, NULL, NULL, NULL, '2023-11-12 08:01:29', '2023-11-12 18:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(125) DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `description` text,
  `cost` decimal(12,2) NOT NULL,
  `item_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `school_id`, `code`, `type_id`, `description`, `cost`, `item_type`) VALUES
(2, 'Destiny Cortez', 1, 1, 1, '2023-03-30 19:01:27', '2023-04-13 19:08:43', 1, 'Ullam placeat dolor', 3, NULL, 59.00, 'service'),
(3, 'Oscar Hoffman', 0, 1, 1, '2023-04-04 18:35:57', '2023-04-04 18:35:57', 1, 'Ratione quibusdam ac', 2, 'Ut doloremque qui vo', 80.00, 'service'),
(4, 'Jameson Gross', 1, 1, 1, '2023-04-13 19:07:51', '2023-04-13 19:07:51', 1, 'Veniam nobis provid', 3, 'Officia magna esse c', 43.00, 'service'),
(5, 'Dalton Burks', 0, 1, 1, '2023-04-15 15:23:47', '2023-04-15 15:23:47', 1, 'In vel nostrud repud', 4, 'Sint dolorem illo qu', 18.00, 'service'),
(6, 'Philip Armstrong', 1, 1, 1, '2023-10-05 17:41:40', '2023-10-05 17:41:40', 1, 'Eaque aut nostrum di', 3, 'Laboris dolor quas l', 87.00, 'service');

-- --------------------------------------------------------

--
-- Table structure for table `item_requests`
--

CREATE TABLE `item_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `request_no` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(125) NOT NULL,
  `position` varchar(125) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `priority_level` varchar(125) NOT NULL,
  `description` text,
  `status` varchar(125) NOT NULL,
  `comment` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_requests`
--

INSERT INTO `item_requests` (`id`, `school_id`, `request_no`, `date`, `department_id`, `section`, `position`, `user_id`, `type`, `priority_level`, `description`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cumque libero commod4', '1974-09-03 18:54:00', 5, 'Et et ipsum ea vel', 'Et incididunt eum si', 65, 'Veniam amet suscip', 'High', 'Ut provident lorem', 'Itaque dolorem sed v', 'Beatae esse elit ex', '2023-08-18 16:10:07', '2023-08-18 16:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `item_types`
--

CREATE TABLE `item_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_types`
--

INSERT INTO `item_types` (`id`, `type`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 'service', 'safdsafsadf', NULL, '2023-04-13 19:06:53', '2023-04-13 19:06:53'),
(4, 'service', 'Lilah Oneil', NULL, '2023-04-13 19:07:06', '2023-04-13 19:07:06'),
(5, 'service', 'SErvice fsaf4', NULL, '2023-04-15 14:52:11', '2023-04-15 14:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `job_orders`
--

CREATE TABLE `job_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `job_order_no` varchar(50) NOT NULL DEFAULT '',
  `requested_by` varchar(50) NOT NULL DEFAULT '',
  `requested_date` datetime NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '',
  `phone_number` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `priority_level` varchar(125) NOT NULL,
  `service_type` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_location` varchar(50) DEFAULT NULL,
  `other_information` varchar(50) DEFAULT NULL,
  `is_first` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_orders`
--

INSERT INTO `job_orders` (`id`, `school_id`, `job_order_no`, `requested_by`, `requested_date`, `department_id`, `status`, `phone_number`, `description`, `priority_level`, `service_type`, `created_at`, `updated_at`, `service_location`, `other_information`, `is_first`) VALUES
(5, 1, 'Et sed itaque molest', 'Aut sint ex laudant', '1975-09-19 16:49:00', 1, 'Veritatis maxime pro', '+1 (289) 226-8319', 'Explicabo Dolore ut', 'Critical', 'Et sint eos ea veri', '2023-06-05 17:23:27', '2023-06-05 17:23:27', 'Voluptate explicabo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `license_no` varchar(125) DEFAULT NULL,
  `issuer_name` varchar(125) NOT NULL,
  `issuer_country` varchar(125) DEFAULT NULL,
  `issuer_state` varchar(125) DEFAULT NULL,
  `issuer_city` varchar(125) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `renew_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `type`, `name`, `license_no`, `issuer_name`, `issuer_country`, `issuer_state`, `issuer_city`, `issue_date`, `renew_date`, `expiry_date`, `contact_id`, `created_at`, `updated_at`, `address_id`) VALUES
(1, 'professional', NULL, NULL, 'Yael Rice', NULL, NULL, NULL, '2015-12-12', '2015-12-12', '2006-04-09', NULL, '2023-03-22 15:10:02', '2023-03-22 15:10:02', NULL),
(2, 'professional', NULL, NULL, 'Adele Deleon', NULL, NULL, NULL, '1998-09-07', '1998-09-07', '1980-03-31', NULL, '2023-03-22 15:11:14', '2023-03-22 15:11:14', NULL),
(3, 'professional', NULL, NULL, 'Travis Dominguez', NULL, NULL, NULL, '2004-08-29', '2004-08-29', '1984-11-14', NULL, '2023-03-22 15:12:08', '2023-03-22 15:12:08', NULL),
(4, 'professional', NULL, NULL, 'Sarah Alvarado', NULL, NULL, NULL, '1980-12-26', '1980-12-26', '2018-02-26', NULL, '2023-03-22 15:13:16', '2023-03-22 15:13:16', NULL),
(5, 'professional', NULL, NULL, 'Joel Doyle', NULL, NULL, NULL, '2011-03-13', '2011-03-13', '2018-10-30', NULL, '2023-03-22 15:17:38', '2023-03-22 15:17:38', NULL),
(6, 'professional', NULL, NULL, 'Jeremy Justice', NULL, NULL, NULL, '1970-06-06', '1970-06-06', '2006-11-10', NULL, '2023-03-22 15:17:57', '2023-03-22 15:17:57', NULL),
(7, 'professional', NULL, NULL, 'Josephine Serrano', NULL, NULL, NULL, '1972-11-22', '1972-11-22', '2000-12-29', NULL, '2023-03-22 15:19:29', '2023-03-22 15:19:29', NULL),
(8, 'professional', NULL, NULL, 'Kyle Forbes', NULL, NULL, NULL, '1997-05-03', '1997-05-03', '1970-08-15', NULL, '2023-03-22 15:22:00', '2023-03-22 15:22:00', NULL),
(9, 'business', NULL, NULL, 'Oprah Manning', NULL, NULL, NULL, NULL, NULL, NULL, 15, '2023-03-22 15:22:00', '2023-03-22 15:22:00', NULL),
(10, 'professional', NULL, NULL, 'Caldwell Cannon', NULL, NULL, NULL, '1997-10-31', '1997-10-31', '2012-06-25', NULL, '2023-03-22 15:23:18', '2023-03-22 15:23:18', NULL),
(11, 'business', NULL, NULL, 'Chastity Rowland', NULL, NULL, NULL, NULL, NULL, NULL, 18, '2023-03-22 15:23:18', '2023-03-22 15:23:18', NULL),
(12, 'professional', NULL, NULL, 'Suki Woods', NULL, NULL, NULL, '2019-02-02', '2019-02-02', '2000-05-13', NULL, '2023-03-22 15:24:34', '2023-03-22 15:24:34', NULL),
(13, 'business', NULL, NULL, 'Amber Moore', NULL, NULL, NULL, NULL, NULL, NULL, 21, '2023-03-22 15:24:34', '2023-03-22 15:24:34', NULL),
(14, 'professional', NULL, NULL, 'Jamalia Stevens', NULL, NULL, NULL, '2002-08-05', '2002-08-05', '1987-02-16', NULL, '2023-03-22 15:25:10', '2023-03-22 15:25:10', NULL),
(15, 'business', NULL, NULL, 'Gregory Nicholson', NULL, NULL, NULL, NULL, NULL, NULL, 24, '2023-03-22 15:25:10', '2023-03-22 15:25:10', NULL),
(16, 'professional', NULL, NULL, 'Paki Richmond', NULL, NULL, NULL, '1975-08-29', '1975-08-29', '1974-01-03', NULL, '2023-03-22 15:25:48', '2023-03-22 15:25:48', NULL),
(17, 'business', NULL, NULL, 'Kieran Foreman', NULL, NULL, NULL, NULL, NULL, NULL, 28, '2023-03-22 15:25:48', '2023-03-22 15:25:48', NULL),
(18, 'professional', NULL, NULL, 'Demetrius Duke', 'Australia', 'Australian Capital Territory', 'Bruce', '2021-03-06', '2021-03-06', '1999-05-04', NULL, '2023-03-22 16:00:10', '2023-03-22 16:00:10', NULL),
(19, 'business', NULL, NULL, 'Mia Livingston', 'Australia', 'Tasmania', 'Cambridge', NULL, NULL, NULL, 32, '2023-03-22 16:00:10', '2023-03-22 16:00:10', NULL),
(20, 'professional', NULL, NULL, 'Urielle Morin', NULL, NULL, NULL, '2013-10-29', '2013-10-29', '2019-01-01', NULL, '2023-03-22 16:51:44', '2023-03-22 16:51:44', NULL),
(21, 'business', NULL, NULL, 'Leroy Gomez', NULL, NULL, NULL, NULL, NULL, NULL, 36, '2023-03-22 16:51:44', '2023-03-22 16:51:44', NULL),
(22, 'professional', NULL, NULL, 'Bradley Pate', NULL, NULL, NULL, '2002-06-17', '2002-06-17', '1976-01-03', NULL, '2023-03-22 16:54:36', '2023-03-22 16:54:36', NULL),
(23, 'business', NULL, NULL, 'Rajah Cotton', NULL, NULL, NULL, NULL, NULL, NULL, 40, '2023-03-22 16:54:36', '2023-03-22 16:54:36', NULL),
(24, 'professional', NULL, NULL, 'Jamal Kemp', NULL, NULL, NULL, '2017-06-20', '2017-06-20', '2015-10-05', NULL, '2023-03-22 16:55:52', '2023-03-22 16:55:52', NULL),
(25, 'business', NULL, NULL, 'Meghan Bauer', NULL, NULL, NULL, NULL, NULL, NULL, 44, '2023-03-22 16:55:52', '2023-03-22 16:55:52', NULL),
(26, 'professional', NULL, NULL, 'Chiquita Bullock', NULL, NULL, NULL, '1973-10-10', '1973-10-10', '1984-09-04', NULL, '2023-03-23 12:29:21', '2023-03-23 12:29:21', NULL),
(27, 'business', NULL, NULL, 'Courtney Fernandez', NULL, NULL, NULL, NULL, NULL, NULL, 48, '2023-03-23 12:29:21', '2023-03-23 12:29:21', NULL),
(28, 'professional', NULL, NULL, 'Chiquita Bullock', NULL, NULL, NULL, '1973-10-10', '1973-10-10', '1984-09-04', NULL, '2023-03-23 12:31:04', '2023-03-23 12:31:04', NULL),
(29, 'business', NULL, NULL, 'Courtney Fernandez', NULL, NULL, NULL, NULL, NULL, NULL, 52, '2023-03-23 12:31:04', '2023-03-23 12:31:04', NULL),
(30, 'professional', NULL, NULL, 'Skyler Le', 'Bahrain', 'Muharraq Governorate', 'Al Muharraq', '1974-07-13', '1974-07-13', '2004-08-23', NULL, '2023-03-24 16:18:06', '2023-03-24 16:18:06', NULL),
(31, 'business', NULL, NULL, 'Josephine Wilder', 'Argentina', 'Catamarca', 'Departamento de Santa María', NULL, NULL, NULL, 56, '2023-03-24 16:18:06', '2023-03-24 16:18:06', NULL),
(32, 'professional', NULL, NULL, 'Karen Ryan', 'Argentina', 'Santa Cruz', 'Puerto Deseado', '1970-05-02', '1970-05-02', '2001-01-10', NULL, '2023-03-24 16:52:47', '2023-03-24 16:52:47', NULL),
(33, 'business', NULL, NULL, 'Dora Bradford', 'Argentina', 'Chaco', 'Colonias Unidas', NULL, NULL, NULL, 60, '2023-03-24 16:52:47', '2023-03-24 16:52:47', NULL),
(34, 'professional', NULL, NULL, 'Shelley Calhoun', NULL, NULL, NULL, '1979-07-01', '1979-07-01', '1980-02-01', NULL, '2023-04-04 15:04:40', '2023-04-04 15:04:40', NULL),
(35, 'business', NULL, NULL, 'Chantale Sykes', NULL, NULL, NULL, NULL, NULL, NULL, 64, '2023-04-04 15:04:40', '2023-04-04 15:04:40', NULL),
(36, 'professional', NULL, NULL, 'Mannix Miranda', NULL, NULL, NULL, '1996-08-19', '1996-08-19', '2009-09-08', NULL, '2023-04-04 15:10:07', '2023-04-04 15:10:07', NULL),
(37, 'business', NULL, NULL, 'Yolanda Moss', NULL, NULL, NULL, NULL, NULL, NULL, 68, '2023-04-04 15:10:08', '2023-04-04 15:10:08', NULL),
(38, 'professional', NULL, NULL, 'Kathleen Joyner', NULL, NULL, NULL, '1974-07-13', '1974-07-13', '1989-12-29', NULL, '2023-04-05 16:45:08', '2023-04-05 16:45:08', NULL),
(39, 'business', NULL, NULL, 'Jana Chambers', NULL, NULL, NULL, NULL, NULL, NULL, 72, '2023-04-05 16:45:08', '2023-04-05 16:45:08', NULL),
(40, 'professional', NULL, NULL, 'Colt Deleon', NULL, NULL, NULL, '1971-10-29', '1971-10-29', '1971-04-03', NULL, '2023-04-05 16:45:18', '2023-04-05 16:45:18', NULL),
(41, 'business', NULL, NULL, 'Brett Melendez', NULL, NULL, NULL, NULL, NULL, NULL, 76, '2023-04-05 16:45:18', '2023-04-05 16:45:18', NULL),
(42, 'professional', NULL, NULL, 'Sarah Jimenez', NULL, NULL, NULL, '1993-03-16', '1993-03-16', '1979-12-10', NULL, '2023-04-05 16:45:41', '2023-04-05 16:45:41', NULL),
(43, 'business', NULL, NULL, 'Ciara Delgado', NULL, NULL, NULL, NULL, NULL, NULL, 80, '2023-04-05 16:45:41', '2023-04-05 16:45:41', NULL),
(44, 'professional', NULL, NULL, 'Cameron Cunningham', NULL, NULL, NULL, '2002-12-19', '2002-12-19', '2004-02-03', NULL, '2023-04-08 17:33:47', '2023-04-08 17:33:47', NULL),
(45, 'business', NULL, NULL, 'Casey Meadows', NULL, NULL, NULL, NULL, NULL, NULL, 84, '2023-04-08 17:33:47', '2023-04-08 17:33:47', NULL),
(46, 'professional', NULL, NULL, 'TaShya Duke', NULL, NULL, NULL, '2004-09-03', '2004-09-03', '1979-10-29', NULL, '2023-04-08 17:34:15', '2023-04-08 17:34:15', NULL),
(47, 'business', NULL, NULL, 'Sophia Gray', NULL, NULL, NULL, NULL, NULL, NULL, 88, '2023-04-08 17:34:15', '2023-04-08 17:34:15', NULL),
(48, 'professional', NULL, NULL, 'Rhona Franklin', NULL, NULL, NULL, '1978-06-20', '1978-06-20', '1977-07-05', NULL, '2023-04-10 17:39:29', '2023-04-10 17:39:29', NULL),
(49, 'business', NULL, NULL, 'Sonia James', NULL, NULL, NULL, NULL, NULL, NULL, 92, '2023-04-10 17:39:29', '2023-04-10 17:39:29', NULL),
(50, 'professional', NULL, NULL, 'Hope Phillips', NULL, NULL, NULL, '2010-02-08', '2010-02-08', '2005-04-08', NULL, '2023-04-10 17:41:00', '2023-04-10 17:41:00', NULL),
(51, 'business', NULL, NULL, 'Asher Dawson', NULL, NULL, NULL, NULL, NULL, NULL, 96, '2023-04-10 17:41:00', '2023-04-10 17:41:00', NULL),
(52, 'professional', NULL, NULL, 'Quemby Gay', NULL, NULL, NULL, '2014-05-27', '2014-05-27', '2005-06-06', NULL, '2023-04-10 17:41:50', '2023-04-10 17:41:50', NULL),
(53, 'business', NULL, NULL, 'Knox Sexton', NULL, NULL, NULL, NULL, NULL, NULL, 100, '2023-04-10 17:41:50', '2023-04-10 17:41:50', NULL),
(54, 'professional', NULL, NULL, 'Neville Humphrey', NULL, NULL, NULL, '1991-08-12', '1991-08-12', '1992-05-06', NULL, '2023-04-10 17:44:45', '2023-04-10 17:44:45', NULL),
(55, 'business', NULL, NULL, 'Nita Hudson', NULL, NULL, NULL, NULL, NULL, NULL, 104, '2023-04-10 17:44:45', '2023-04-10 17:44:45', NULL),
(56, 'professional', NULL, NULL, 'Katelyn Warren', NULL, NULL, NULL, '1999-01-14', '1999-01-14', '1988-01-08', NULL, '2023-04-10 17:46:12', '2023-04-10 17:46:12', NULL),
(57, 'business', NULL, NULL, 'Macy Clemons', NULL, NULL, NULL, NULL, NULL, NULL, 108, '2023-04-10 17:46:12', '2023-04-10 17:46:12', NULL),
(58, 'professional', NULL, NULL, 'Jade Mullins', NULL, NULL, NULL, '2015-03-21', '2015-03-21', '1974-06-05', NULL, '2023-04-10 17:48:20', '2023-04-10 17:48:20', NULL),
(59, 'business', NULL, NULL, 'Kirsten Cline', NULL, NULL, NULL, NULL, NULL, NULL, 112, '2023-04-10 17:48:20', '2023-04-10 17:48:20', NULL),
(60, 'professional', NULL, NULL, 'Rhoda Galloway', NULL, NULL, NULL, '2020-06-25', '2020-06-25', '1985-09-17', NULL, '2023-04-10 17:52:29', '2023-04-10 17:52:29', NULL),
(61, 'business', NULL, NULL, 'Damian Durham', NULL, NULL, NULL, NULL, NULL, NULL, 116, '2023-04-10 17:52:29', '2023-04-10 17:52:29', NULL),
(62, 'professional', NULL, NULL, 'Sybill Rivas', NULL, NULL, NULL, '1996-04-08', '1996-04-08', '1989-06-15', NULL, '2023-04-12 14:52:20', '2023-04-12 14:52:20', NULL),
(63, 'business', NULL, NULL, 'Ivan Ellis', NULL, NULL, NULL, NULL, NULL, NULL, 120, '2023-04-12 14:52:20', '2023-04-12 14:52:20', NULL),
(64, 'professional', NULL, NULL, 'Chancellor Whitehead', NULL, NULL, NULL, '1993-01-27', '1993-01-27', '2003-04-27', NULL, '2023-04-12 17:27:28', '2023-04-12 17:27:28', NULL),
(65, 'business', NULL, NULL, 'Ryan Hart', NULL, NULL, NULL, NULL, NULL, NULL, 124, '2023-04-12 17:27:28', '2023-04-12 17:27:28', NULL),
(66, 'professional', NULL, NULL, 'Philip Hansen', NULL, NULL, NULL, '1971-04-07', '1971-04-07', '1990-12-07', NULL, '2023-04-12 17:27:39', '2023-04-12 17:27:39', NULL),
(67, 'business', NULL, NULL, 'Macaulay Crosby', NULL, NULL, NULL, NULL, NULL, NULL, 128, '2023-04-12 17:27:39', '2023-04-12 17:27:39', NULL),
(68, 'professional', NULL, NULL, 'Alisa Campos', NULL, NULL, NULL, '1986-05-29', '1986-05-29', '2010-01-21', NULL, '2023-04-12 17:27:51', '2023-04-12 17:27:51', NULL),
(69, 'business', NULL, NULL, 'Marvin Marks', NULL, NULL, NULL, NULL, NULL, NULL, 132, '2023-04-12 17:27:51', '2023-04-12 17:27:51', NULL),
(70, 'professional', NULL, NULL, 'Joy Powell', NULL, NULL, NULL, '1987-04-04', '1987-04-04', '1990-06-14', NULL, '2023-04-12 17:28:06', '2023-04-12 17:28:06', NULL),
(71, 'business', NULL, NULL, 'Deirdre Griffith', NULL, NULL, NULL, NULL, NULL, NULL, 136, '2023-04-12 17:28:06', '2023-04-12 17:28:06', NULL),
(72, 'professional', NULL, NULL, 'Lucas Frazier', NULL, NULL, NULL, '2008-05-24', '2008-05-24', '2014-08-28', NULL, '2023-04-12 17:28:19', '2023-04-12 17:28:19', NULL),
(73, 'business', NULL, NULL, 'Pamela Gill', NULL, NULL, NULL, NULL, NULL, NULL, 140, '2023-04-12 17:28:19', '2023-04-12 17:28:19', NULL),
(74, 'professional', NULL, NULL, 'Callie Lopez', NULL, NULL, NULL, '1981-12-21', '1981-12-21', '1987-02-17', NULL, '2023-04-12 17:28:32', '2023-04-12 17:28:32', NULL),
(75, 'business', NULL, NULL, 'Kareem Mckinney', NULL, NULL, NULL, NULL, NULL, NULL, 144, '2023-04-12 17:28:32', '2023-04-12 17:28:32', NULL),
(76, 'professional', NULL, NULL, 'Macey Cunningham', NULL, NULL, NULL, '2012-06-16', '2012-06-16', '1998-09-11', NULL, '2023-04-12 17:28:46', '2023-04-12 17:28:46', NULL),
(77, 'business', NULL, NULL, 'Germaine Stone', NULL, NULL, NULL, NULL, NULL, NULL, 148, '2023-04-12 17:28:46', '2023-04-12 17:28:46', NULL),
(78, 'professional', NULL, NULL, 'Zelda Durham', NULL, NULL, NULL, '1994-12-06', '1994-12-06', '1986-05-21', NULL, '2023-04-12 17:47:50', '2023-04-12 17:47:50', NULL),
(79, 'business', NULL, NULL, 'Aretha Reyes', NULL, NULL, NULL, NULL, NULL, NULL, 152, '2023-04-12 17:47:50', '2023-04-12 17:47:50', NULL),
(80, 'professional', NULL, NULL, 'Lani Moody', NULL, NULL, NULL, '2023-01-05', '2023-01-05', '1981-02-11', NULL, '2023-04-12 17:48:06', '2023-04-12 17:48:06', NULL),
(81, 'business', NULL, NULL, 'Erasmus Holmes', NULL, NULL, NULL, NULL, NULL, NULL, 156, '2023-04-12 17:48:06', '2023-04-12 17:48:06', NULL),
(82, 'professional', NULL, NULL, 'Benjamin Maynard', NULL, NULL, NULL, '2005-03-15', '2005-03-15', '1981-10-14', NULL, '2023-04-13 11:50:18', '2023-04-13 11:50:18', NULL),
(83, 'business', NULL, NULL, 'Medge Acosta', NULL, NULL, NULL, NULL, NULL, NULL, 160, '2023-04-13 11:50:18', '2023-04-13 11:50:18', NULL),
(84, 'professional', NULL, NULL, 'Castor Aguilar', NULL, NULL, NULL, '2016-01-04', '2016-01-04', '2008-02-21', NULL, '2023-04-13 11:50:29', '2023-04-13 11:50:29', NULL),
(85, 'business', NULL, NULL, 'Naida Alford', NULL, NULL, NULL, NULL, NULL, NULL, 164, '2023-04-13 11:50:29', '2023-04-13 11:50:29', NULL),
(86, 'professional', NULL, NULL, 'Bethany Bailey', NULL, NULL, NULL, '2013-08-15', '2013-08-15', '2013-11-29', NULL, '2023-05-14 18:40:48', '2023-05-14 18:40:48', NULL),
(87, 'business', NULL, NULL, 'Abraham Moore', NULL, NULL, NULL, NULL, NULL, NULL, 168, '2023-05-14 18:40:48', '2023-05-14 18:40:48', NULL),
(88, 'business', NULL, NULL, 'Mari Tucker', NULL, NULL, NULL, NULL, NULL, NULL, 185, '2023-07-08 17:00:53', '2023-07-08 17:00:53', NULL),
(89, 'business', NULL, NULL, 'Pascale Cooley', NULL, NULL, NULL, NULL, NULL, NULL, 188, '2023-07-08 17:02:04', '2023-07-08 17:02:04', NULL),
(90, 'business', NULL, NULL, 'Nomlanga Harrington', NULL, NULL, NULL, NULL, NULL, NULL, 191, '2023-07-08 17:03:23', '2023-07-08 17:03:23', NULL),
(91, 'business', NULL, NULL, 'Barry Whitfield', NULL, NULL, NULL, NULL, NULL, NULL, 194, '2023-07-08 17:05:08', '2023-07-08 17:05:08', NULL),
(92, 'business', NULL, NULL, 'Sylvia Neal', NULL, NULL, NULL, NULL, NULL, NULL, 306, '2023-07-12 17:41:15', '2023-07-12 17:41:15', NULL),
(93, 'business', NULL, 'gsdfgdh', 'Colt Vance', NULL, NULL, NULL, NULL, NULL, NULL, 309, '2023-07-13 17:06:56', '2023-07-13 17:15:13', 362),
(94, 'business', NULL, 'Officiis laborum qui', 'Sara Byers', NULL, NULL, NULL, NULL, NULL, NULL, 356, '2023-09-08 17:39:15', '2023-09-08 17:39:15', 409),
(95, 'business', NULL, 'Eum sed consectetur', 'Kelsie Hoover', NULL, NULL, NULL, NULL, NULL, NULL, 425, '2023-11-04 16:15:32', '2023-11-04 16:15:32', 450),
(96, 'business', NULL, 'Sed iure amet dolor', 'Jade Marks', NULL, NULL, NULL, NULL, NULL, NULL, 428, '2023-11-04 16:15:38', '2023-11-04 16:15:38', 453);

-- --------------------------------------------------------

--
-- Table structure for table `lockers`
--

CREATE TABLE `lockers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `storage_id` bigint(20) UNSIGNED NOT NULL,
  `locker_no` varchar(125) NOT NULL,
  `storage_holder_type` varchar(125) NOT NULL,
  `dedicated_no` varchar(125) DEFAULT NULL,
  `location` varchar(125) NOT NULL,
  `vacant` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lockers`
--

INSERT INTO `lockers` (`id`, `school_id`, `storage_id`, `locker_no`, `storage_holder_type`, `dedicated_no`, `location`, `vacant`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Odit quia ea quo dol', 'Teachers', '46', 'Dignissimos dolore i', 0, '2023-08-04 15:00:29', '2023-08-04 15:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `log_car_mileage`
--

CREATE TABLE `log_car_mileage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `vehicle_id` varchar(125) NOT NULL,
  `driver_name` varchar(125) NOT NULL,
  `start_location` varchar(125) NOT NULL,
  `end_location` varchar(125) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `start_mileage` decimal(15,2) NOT NULL,
  `end_mileage` decimal(15,2) NOT NULL,
  `purpose` varchar(125) NOT NULL,
  `note` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_car_mileage`
--

INSERT INTO `log_car_mileage` (`id`, `school_id`, `date`, `vehicle_id`, `driver_name`, `start_location`, `end_location`, `start_time`, `end_time`, `start_mileage`, `end_mileage`, `purpose`, `note`, `created_at`, `updated_at`) VALUES
(3, 1, '2017-11-12 23:17:00', 'Ut est animi offici', 'Upton Lester', 'Dolor incidunt volu3', 'Cumque debitis omnis', '1978-07-07 06:00:00', '1991-04-11 19:27:00', 60.00, 69.00, 'Fugiat dolor quis i', 'Vero tempora ut volu', '2023-06-04 16:43:48', '2023-06-04 16:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `log_key`
--

CREATE TABLE `log_key` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(125) NOT NULL,
  `key_no` varchar(125) NOT NULL,
  `time_in` datetime NOT NULL,
  `returned_time` datetime NOT NULL,
  `purpose` varchar(125) NOT NULL,
  `stuff_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_mail`
--

CREATE TABLE `log_mail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `tracking_no` varchar(125) NOT NULL,
  `sender` varchar(125) NOT NULL,
  `recipient` varchar(125) NOT NULL,
  `employee_name` varchar(125) NOT NULL,
  `description` text,
  `date_received` datetime NOT NULL,
  `content` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_mail`
--

INSERT INTO `log_mail` (`id`, `school_id`, `date`, `tracking_no`, `sender`, `recipient`, `employee_name`, `description`, `date_received`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-08-23 02:57:00', 'Id nostrum qui exped45', 'Quos velit in commo', 'Exercitationem deser', 'Ayanna Burt', 'Deserunt delectus b', '1998-07-27 09:49:00', NULL, '2023-06-04 18:24:37', '2023-06-04 18:29:57'),
(2, 1, '1981-09-19 12:15:00', 'Placeat ullamco vol', 'Sunt doloribus nesc', 'Aliqua Culpa fugiat', 'Whilemina Dean', 'Voluptatibus occaeca', '2021-02-25 14:06:00', NULL, '2023-06-05 09:37:26', '2023-06-05 09:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `log_visitor`
--

CREATE TABLE `log_visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `visitor_name` varchar(125) NOT NULL,
  `purpose` varchar(125) NOT NULL,
  `meeting_with` varchar(125) DEFAULT NULL,
  `department` varchar(125) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_visitor`
--

INSERT INTO `log_visitor` (`id`, `school_id`, `date`, `visitor_name`, `purpose`, `meeting_with`, `department`, `time_in`, `time_out`, `created_at`, `updated_at`) VALUES
(1, 1, '1996-10-01 00:41:00', 'Skyler Barber3', 'Voluptate labore quo', 'Ullam vel voluptas e', 'Perspiciatis non im', '2019-09-02 11:12:00', '1979-02-10 22:27:00', '2023-06-04 17:27:30', '2023-06-04 17:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_checklists`
--

CREATE TABLE `maintenance_checklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `checklist_no` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `scheduled_period` varchar(125) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manage_participants_in_education_team`
--

CREATE TABLE `manage_participants_in_education_team` (
  `id` int(11) NOT NULL,
  `members` int(11) DEFAULT NULL,
  `manage_user_id` int(11) DEFAULT NULL,
  `invitation_date` timestamp NULL DEFAULT NULL,
  `invitation_message` text,
  `invitation_action` varchar(125) DEFAULT NULL,
  `manage_status` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_participants_in_education_team`
--

INSERT INTO `manage_participants_in_education_team` (`id`, `members`, `manage_user_id`, `invitation_date`, `invitation_message`, `invitation_action`, `manage_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-30 22:47:38', '2023-05-30 16:47:38'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-05-30 23:13:45', '2023-05-30 17:13:45'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-05-30 23:14:14', '2023-05-30 17:14:14'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-10-12 21:30:48', '2023-10-12 15:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `marks_structure`
--

CREATE TABLE `marks_structure` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `assesment_type` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `school` int(11) DEFAULT NULL,
  `grade` varchar(125) DEFAULT NULL,
  `percent` varchar(125) DEFAULT NULL,
  `passing_marks` varchar(125) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_structure`
--

INSERT INTO `marks_structure` (`id`, `school_id`, `assesment_type`, `course`, `school`, `grade`, `percent`, `passing_marks`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 1, NULL, '5', '60', '80', 2, 2, '2022-12-30 01:56:08', '2022-12-29 20:21:19', 1),
(2, 1, 10, 1, NULL, 'b', '70', '40', 2, 2, '2023-03-20 16:15:36', '2023-03-20 10:15:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark_appeals`
--

CREATE TABLE `mark_appeals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_no` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `from_student_id` bigint(20) UNSIGNED NOT NULL,
  `to_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `cc_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assessment_id` bigint(20) UNSIGNED NOT NULL,
  `mark_post_date` datetime NOT NULL,
  `received_mark` decimal(8,2) NOT NULL,
  `comment` text NOT NULL,
  `appeal_reason` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `course_id` bigint(20) DEFAULT NULL,
  `semester_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark_appeals`
--

INSERT INTO `mark_appeals` (`id`, `file_no`, `date`, `from_student_id`, `to_teacher_id`, `cc_id`, `assessment_id`, `mark_post_date`, `received_mark`, `comment`, `appeal_reason`, `created_at`, `updated_at`, `status`, `course_id`, `semester_id`) VALUES
(12, 'Commodo corrupti et', '2018-08-05 09:26:00', 2, 2, NULL, 62, '2010-07-07 09:31:00', 15.00, 'Eos velit modi aliq', 'Obcaecati voluptate', '2023-06-19 17:38:04', '2023-06-19 17:38:04', 'pending', 33, 5),
(13, '26-Jan-1993', '1973-05-23 22:49:00', 2, 2, NULL, 60, '1979-01-24 22:46:00', 21.00, '25-Jan-2010', 'Non esse quisquam r', '2023-06-20 07:17:00', '2023-06-20 07:17:00', 'pending', NULL, 4),
(14, '11-Nov-1970', '2021-10-11 10:16:00', 2, 2, NULL, 43, '1992-12-26 20:21:00', 83.00, '21-Oct-2008', 'Enim voluptatibus si', '2023-06-20 17:17:28', '2023-06-20 17:17:28', 'pending', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mark_appeal_results`
--

CREATE TABLE `mark_appeal_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mark_appeal_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `cc` bigint(20) UNSIGNED DEFAULT NULL,
  `reassessed_date` datetime NOT NULL,
  `reassessed_mark` decimal(8,2) NOT NULL,
  `comment` text NOT NULL,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mark_appeal_results`
--

INSERT INTO `mark_appeal_results` (`id`, `mark_appeal_id`, `date`, `from_user_id`, `to_user_id`, `cc`, `reassessed_date`, `reassessed_mark`, `comment`, `description`, `created_at`, `updated_at`) VALUES
(1, 7, '2019-10-15 14:21:00', 2, 2, NULL, '2005-04-12 01:00:00', 37.00, 'Laboriosam aut cons', 'In dolor aliquip eiu', '2023-06-17 19:03:16', '2023-06-17 19:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `file_name` varchar(125) NOT NULL,
  `mime_type` varchar(125) DEFAULT NULL,
  `disk` varchar(125) NOT NULL,
  `conversions_disk` varchar(125) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `memorandum`
--

CREATE TABLE `memorandum` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `memo_no` varchar(125) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `priority_level` varchar(125) DEFAULT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `cc_id` int(11) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `action_date` datetime DEFAULT NULL,
  `re_case_no` varchar(125) DEFAULT NULL,
  `message` text,
  `calender_url` varchar(250) DEFAULT NULL,
  `calendar_date` timestamp NULL DEFAULT NULL,
  `calendar` varchar(125) DEFAULT NULL,
  `required_action` varchar(125) DEFAULT NULL,
  `comments` text,
  `prepare_by` varchar(125) DEFAULT NULL,
  `approve_by` varchar(125) DEFAULT NULL,
  `publish_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memorandum`
--

INSERT INTO `memorandum` (`id`, `school_id`, `memo_no`, `date`, `priority_level`, `from_id`, `to_id`, `cc_id`, `subject`, `action_date`, `re_case_no`, `message`, `calender_url`, `calendar_date`, `calendar`, `required_action`, `comments`, `prepare_by`, `approve_by`, `publish_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1692208331', '2006-11-11 03:57:00', 'High', 1, 2, 3, 'Quas hic dolorum vel', NULL, NULL, 'Totam enim enim cill', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-16 17:52:30', '2023-08-16 17:52:30'),
(2, 1, '1692209150', '2001-04-21 01:34:00', 'Medium', 6, 7, 8, 'Nobis doloribus opti', NULL, NULL, 'Incididunt fugiat de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-08-16 18:05:56', '2023-08-16 18:25:02'),
(4, 1, '1696616553', '1995-04-04 23:15:00', 'Normal', 14, 15, 16, 'Dolorem non velit qu', NULL, NULL, 'Nam consectetur fugi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-10-06 18:22:37', '2023-10-06 18:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `memorandum_recipients`
--

CREATE TABLE `memorandum_recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(125) NOT NULL,
  `position` varchar(125) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `memorandum_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memorandum_recipients`
--

INSERT INTO `memorandum_recipients` (`id`, `department_id`, `section`, `position`, `user_id`, `memorandum_id`, `created_at`, `updated_at`) VALUES
(1, 9, 'Aliquid aut in elit', 'Aut quae non soluta', 18, NULL, '2023-08-16 17:52:30', '2023-08-16 17:52:30'),
(2, 9, 'Dolore qui neque asp', 'Doloremque excepteur', 49, NULL, '2023-08-16 17:52:30', '2023-08-16 17:52:30'),
(3, 2, 'Animi perspiciatis', 'Aut qui voluptates i', 120, NULL, '2023-08-16 17:52:30', '2023-08-16 17:52:30'),
(4, 4, 'Harum totam ex ut mo', 'Ut et animi harum e', 60, 1, '2023-08-16 17:52:30', '2023-08-16 17:52:30'),
(5, 9, 'Cumque ipsam vel adi', 'Totam at non rerum c', 63, 1, '2023-08-16 17:52:30', '2023-08-16 17:52:30'),
(6, 2, 'Quae error reiciendi', 'Qui dolorem eum aute', 116, NULL, '2023-08-16 18:05:56', '2023-08-16 18:05:56'),
(7, 5, 'Neque eius et proide', 'Et dolore pariatur', 95, NULL, '2023-08-16 18:05:56', '2023-08-16 18:05:56'),
(8, 2, 'Cupidatat dolor tota', 'Est et sed fugiat a', 143, NULL, '2023-08-16 18:05:56', '2023-08-16 18:25:02'),
(10, 1, 'Quis inventore fugia', 'Lorem sapiente exped', 101, 2, '2023-08-16 18:25:02', '2023-08-16 18:25:02'),
(14, 13, 'Duis esse ut a et', 'Nostrum consequatur', 62, NULL, '2023-10-06 18:22:37', '2023-10-06 18:22:37'),
(15, 17, 'Nostrud amet omnis', 'Sed reprehenderit e', 49, NULL, '2023-10-06 18:22:37', '2023-10-06 18:22:37'),
(16, 13, 'Architecto animi au', 'Necessitatibus iusto', 80, NULL, '2023-10-06 18:22:37', '2023-10-06 18:22:37'),
(18, 16, 'Voluptate in blandit', 'Voluptatum fuga Imp', 102, 4, '2023-10-06 18:23:41', '2023-10-06 18:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(125) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_user_manager_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_09_03_052131_create_samples_table', 1),
(4, '2021_09_14_133026_create_permission_tables', 1),
(5, '2022_05_30_114010_create_registered_users_table', 2),
(6, '2022_06_01_105110_create_temp_otps_table', 3),
(7, '2023_03_20_194726_create_address_table', 0),
(8, '2023_03_20_194726_create_announcent_table', 0),
(9, '2023_03_20_194726_create_assesment_type_table', 0),
(10, '2023_03_20_194726_create_assessment_notifications_table', 0),
(11, '2023_03_20_194726_create_assessment_reminders_table', 0),
(12, '2023_03_20_194726_create_assessment_students_table', 0),
(13, '2023_03_20_194726_create_assessments_table', 0),
(14, '2023_03_20_194726_create_assessments_schedule_dates_table', 0),
(15, '2023_03_20_194726_create_asset_name_table', 0),
(16, '2023_03_20_194726_create_assigned_task_table', 0),
(17, '2023_03_20_194726_create_board_of_directors_table', 0),
(18, '2023_03_20_194726_create_calssroom_seat_occupant_table', 0),
(19, '2023_03_20_194726_create_campus_table', 0),
(20, '2023_03_20_194726_create_class_closed_days_table', 0),
(21, '2023_03_20_194726_create_classes_scheduled_days_table', 0),
(22, '2023_03_20_194726_create_classes_schedules_table', 0),
(23, '2023_03_20_194726_create_classroom_table', 0),
(24, '2023_03_20_194726_create_classroom_fixed_assets_table', 0),
(25, '2023_03_20_194726_create_classroom_for_accounting_table', 0),
(26, '2023_03_20_194726_create_classroom_safety_and_security_devices_table', 0),
(27, '2023_03_20_194726_create_classroom_seats_table', 0),
(28, '2023_03_20_194726_create_classroom_type_table', 0),
(29, '2023_03_20_194726_create_closing_in_education_team_table', 0),
(30, '2023_03_20_194726_create_cost_type_table', 0),
(31, '2023_03_20_194726_create_course_outlines_table', 0),
(32, '2023_03_20_194726_create_credential_table', 0),
(33, '2023_03_20_194726_create_daily_report_table', 0),
(34, '2023_03_20_194726_create_dates_and_deadlines_in_school_program_table', 0),
(35, '2023_03_20_194726_create_deadlines_table', 0),
(36, '2023_03_20_194726_create_declaration_table', 0),
(37, '2023_03_20_194726_create_delivery_method_table', 0),
(38, '2023_03_20_194726_create_departments_table', 0),
(39, '2023_03_20_194726_create_education_team_table', 0),
(40, '2023_03_20_194726_create_event_date_table', 0),
(41, '2023_03_20_194726_create_fees_and_charges_table', 0),
(42, '2023_03_20_194726_create_fees_category_table', 0),
(43, '2023_03_20_194726_create_financial_in_school_program_table', 0),
(44, '2023_03_20_194726_create_financial_in_student_registration_table', 0),
(45, '2023_03_20_194726_create_fixed_assets_table', 0),
(46, '2023_03_20_194726_create_form_type_table', 0),
(47, '2023_03_20_194726_create_information_session_table', 0),
(48, '2023_03_20_194726_create_job_orders_table', 0),
(49, '2023_03_20_194726_create_manage_participants_in_education_team_table', 0),
(50, '2023_03_20_194726_create_marks_structure_table', 0),
(51, '2023_03_20_194726_create_memorandum_table', 0),
(52, '2023_03_20_194726_create_my_payment_in_school_program_table', 0),
(53, '2023_03_20_194726_create_my_payment_in_student_registration_table', 0),
(54, '2023_03_20_194726_create_notices_type_table', 0),
(55, '2023_03_20_194726_create_pages_table', 0),
(56, '2023_03_20_194726_create_participants_availability_and_contacts_in_education_team_table', 0),
(57, '2023_03_20_194726_create_permissions_table', 0),
(58, '2023_03_20_194726_create_personal_access_tokens_table', 0),
(59, '2023_03_20_194726_create_program_in_student_registration_table', 0),
(60, '2023_03_20_194726_create_programs_table', 0),
(61, '2023_03_20_194726_create_registered_users_table', 0),
(62, '2023_03_20_194726_create_reopening_in_education_team_table', 0),
(63, '2023_03_20_194726_create_role_has_permissions_table', 0),
(64, '2023_03_20_194726_create_roles_table', 0),
(65, '2023_03_20_194726_create_safety_securities_table', 0),
(66, '2023_03_20_194726_create_safety_security_item_table', 0),
(67, '2023_03_20_194726_create_samples_table', 0),
(68, '2023_03_20_194726_create_school_table', 0),
(69, '2023_03_20_194726_create_school_announcment_table', 0),
(70, '2023_03_20_194726_create_school_class_table', 0),
(71, '2023_03_20_194726_create_school_closed_days_table', 0),
(72, '2023_03_20_194726_create_school_form_table', 0),
(73, '2023_03_20_194726_create_school_level_table', 0),
(74, '2023_03_20_194726_create_school_message_table', 0),
(75, '2023_03_20_194726_create_school_notices_table', 0),
(76, '2023_03_20_194726_create_school_program_table', 0),
(77, '2023_03_20_194726_create_service_providers_table', 0),
(78, '2023_03_20_194726_create_services_table', 0),
(79, '2023_03_20_194726_create_staff_directory_table', 0),
(80, '2023_03_20_194726_create_student_registration_table', 0),
(81, '2023_03_20_194726_create_study_option_table', 0),
(82, '2023_03_20_194726_create_subject_course_table', 0),
(83, '2023_03_20_194726_create_subject_course_in_student_registration_table', 0),
(84, '2023_03_20_194726_create_subject_course_text_books_table', 0),
(85, '2023_03_20_194726_create_subjects_courses_in_school_program_table', 0),
(86, '2023_03_20_194726_create_task_assigner_in_education_team_table', 0),
(87, '2023_03_20_194726_create_team_group_table', 0),
(88, '2023_03_20_194726_create_team_type_table', 0),
(89, '2023_03_20_194726_create_temp_otps_table', 0),
(90, '2023_03_20_194726_create_term_semester_table', 0),
(91, '2023_03_20_194726_create_text_books_table', 0),
(92, '2023_03_20_194726_create_tuition_table', 0),
(93, '2023_03_20_194726_create_user_has_permissions_table', 0),
(94, '2023_03_20_194726_create_user_has_roles_table', 0),
(95, '2023_03_20_194726_create_user_type_table', 0),
(96, '2023_03_20_194726_create_users_table', 0),
(97, '2023_03_20_194726_create_workshop_table', 0),
(98, '2023_03_20_194726_create_workshop_fixed_assets_table', 0),
(99, '2023_03_20_194726_create_workshop_for_accounting_table', 0),
(100, '2023_03_20_194726_create_workshop_rules_and_policies_table', 0),
(101, '2023_03_20_194726_create_workshop_safety_and_insurance_protection_table', 0),
(102, '2023_03_20_194726_create_workshop_safety_and_security_devices_table', 0),
(103, '2023_03_20_194726_create_workshop_seats_table', 0),
(104, '2023_03_20_194726_create_announcement_table', 4),
(105, '2023_03_22_200132_create_contacts_table', 4),
(106, '2023_03_22_205422_create_insurances_table', 4),
(107, '2023_03_22_210232_create_licenses_table', 4),
(108, '2023_03_22_210410_create_corporations_table', 4),
(109, '2023_03_22_210439_create_account_holders_table', 4),
(110, '2023_03_22_221022_create_account_holder_licenses_table', 5),
(111, '2023_03_23_174516_create_account_holder_types_table', 6),
(112, '2023_03_23_174829_add_account_holder_type_id_to_account_holders_table', 6),
(113, '2023_03_27_224656_create_inventory_items_table', 7),
(114, '2023_03_23_132823_rename_school_announcement_table', 8),
(115, '2023_03_23_135947_modify_datatype_of_school_announcement_table', 8),
(116, '2023_03_28_230943_create_chart_accounts_table', 9),
(117, '2023_03_28_224925_create_chart_account_categories_table', 10),
(118, '2023_03_29_175603_create_transactions_table', 11),
(119, '2023_03_29_205427_create_fixed_asset_types_table', 12),
(120, '2023_03_29_010057_create_textbooks_table', 13),
(121, '2023_03_30_222945_modify_fixed_assets_table', 14),
(122, '2023_03_31_000342_create_service_types_table', 15),
(123, '2023_03_31_002110_modify_services_table', 16),
(124, '2023_04_01_214127_create_room_types_table', 17),
(125, '2023_04_01_233335_create_rooms_table', 17),
(126, '2023_04_04_163223_create_school_information_table', 18),
(127, '2023_04_04_213452_add_account_holder_id_to_transactions_table', 19),
(128, '2023_04_05_235144_create_transaction_services_table', 20),
(129, '2023_04_10_224310_drop_account_holder_types_table', 21),
(130, '2023_04_10_224451_drop_account_holders_table', 21),
(131, '2023_04_10_224607_add_some_columns_to_users_table', 21),
(132, '2023_04_13_175907_create_reference_counts_table', 22),
(133, '2023_04_13_180435_add_invoice_no_to_transactions_table', 23),
(134, '2023_04_13_195221_create_tax_types_table', 24),
(135, '2023_04_13_195245_create_taxes_table', 24),
(136, '2023_04_13_235156_create_bank_accounts_table', 25),
(137, '2023_04_14_001927_add_bank_account_id_to_transactions_table', 25),
(138, '2023_04_15_150804_create_student_details_table', 26),
(139, '2023_04_15_204620_rename_service_types_table', 27),
(140, '2023_04_15_202806_create_offers_table', 28),
(141, '2023_04_15_212640_create_offer_items_table', 29),
(142, '2023_04_17_004149_add_transaction_id_to_transaction_items_table', 30),
(143, '2023_04_18_155112_create_transaction_taxes_table', 31),
(144, '2023_04_18_143915_add_some_columns_to_transactions_table', 32),
(145, '2023_04_26_223043_create_payments_table', 33),
(146, '2023_04_26_223503_create_account_transactions_table', 34),
(147, '2023_04_29_225400_create_academic_years_table', 35),
(148, '2023_05_01_104411_create_course_outlines_table', 36),
(149, '2023_05_03_203503_create_program_years_table', 37),
(150, '2023_05_03_211353_create_program_grade_years_table', 38),
(151, '2023_05_04_140014_create_class_schedules_table', 39),
(152, '2023_05_06_203117_create_class_attendances_table', 40),
(153, '2023_05_14_144851_create_student_records_table', 41),
(155, '2023_05_14_221201_create_sections_table', 42),
(156, '2023_05_16_213819_create_notes_table', 43),
(157, '2023_05_17_231854_create_questions_table', 44),
(158, '2023_05_20_151308_create_program_dates_table', 45),
(159, '2023_05_29_002334_create_answers_table', 46),
(160, '2023_06_01_233247_create_employee_attendances_table', 47),
(161, '2023_06_04_200741_create_car_mileage_logs_table', 48),
(163, '2023_06_04_202143_create_log_car_mileage_table', 49),
(164, '2023_06_04_231144_create_log_visitor_table', 50),
(165, '2023_06_04_233540_create_log_key_table', 51),
(166, '2023_06_05_000607_create_log_mail_table', 52),
(172, '2023_06_05_235610_create_incident_reports_table', 53),
(176, '2023_06_06_151757_create_time_sheet_items_table', 55),
(175, '2023_06_06_150714_create_time_sheet_reports_table', 54),
(177, '2023_06_06_195723_create_projects_table', 56),
(178, '2023_06_06_200731_create_project_durations_table', 57),
(179, '2023_06_06_201027_create_project_budgets_table', 58),
(180, '2023_06_06_201432_create_project_timelines_table', 59),
(181, '2023_06_06_201619_create_payment_schedules_table', 60),
(182, '2023_06_06_201619_create_project_payments_table', 61),
(184, '2023_06_14_210406_create_mark_appeals_table', 62),
(185, '2023_06_15_124620_create_media_table', 63),
(187, '2023_06_15_123413_create_attachments_table', 64),
(188, '2023_06_15_184134_create_model_has_attachments_table', 65),
(190, '2023_06_15_184134_create_attachable_table', 66),
(191, '2023_06_18_000138_create_mark_appeal_results_table', 67),
(192, '2023_07_02_122739_create_admins_table', 68),
(193, '2023_07_06_004017_create_companies_table', 69),
(194, '2023_07_06_115853_create_school_education_levels_table', 70),
(195, '2023_07_07_220152_create_emergency_contacts_table', 71),
(197, '2023_07_18_232801_create_laravel_permissions', 72),
(198, '2023_07_26_193545_create_tuition_invoice_settings_table', 73),
(199, '2023_08_03_230029_create_student_messages_table', 74),
(200, '2023_08_04_134212_create_storage_lockers_table', 75),
(201, '2023_08_04_201452_create_lockers_table', 76),
(202, '2023_08_04_230541_create_parking_lots_table', 77),
(203, '2023_08_06_160930_create_parking_stalls_table', 78),
(204, '2023_08_06_154259_create_parker_types_table', 79),
(205, '2023_08_06_201413_create_parkers_table', 80),
(206, '2023_08_09_222205_create_template_builders_table', 81),
(207, '2023_08_10_224559_create_vehicle_types_table', 82),
(208, '2023_08_11_004235_create_vehicle_insurances_table', 83),
(212, '2023_08_11_161809_create_vehicles_table', 84),
(213, '2023_08_11_191734_create_parking_rates_table', 85),
(216, '2023_08_11_221324_create_parking_stall_allocations_table', 86),
(217, '2023_08_14_000501_create_booking_participants_table', 87),
(219, '2023_08_14_000533_create_booking_payments_table', 88),
(220, '2023_08_12_204633_create_bookings_table', 89),
(221, '2023_08_14_003201_create_booking_charges_table', 90),
(222, '2023_08_14_154259_create_schedule_types_table', 91),
(223, '2023_08_14_225948_create_schedules_table', 92),
(224, '2023_08_14_230427_create_scheule_recurrences_table', 93),
(225, '2023_08_14_223524_create_schedule_participants_table', 94),
(226, '2023_08_15_193212_create_room_devices_table', 95),
(227, '2023_08_15_204005_create_asset_transfers_table', 96),
(230, '2023_08_15_213540_create_parking_logs_table', 97),
(231, '2023_08_15_230745_create_shipping_logs_table', 98),
(232, '2023_08_15_234045_create_receiving_logs_table', 99),
(234, '2023_08_16_225815_create_memorandum_recipients_table', 100),
(235, '2023_08_18_213010_create_item_requests_table', 101),
(236, '2023_08_19_224504_create_maintenance_checklists_table', 102),
(237, '2023_08_25_214951_create_receipts_table', 103),
(238, '2023_08_31_202739_create_receive_items_table', 104),
(239, '2023_09_05_230747_create_offer_discounts_table', 105),
(240, '2023_09_29_230837_create_payment_infos_table', 106),
(242, '2023_10_12_213614_create_utility_accounts_table', 107),
(243, '2023_10_25_212654_create_transaction_charges_table', 108),
(244, '2023_05_18_233042_create_grade_scales_table', 109),
(245, '2023_10_26_225634_create_grade_scale_items_table', 110),
(246, '2023_11_08_224808_create_invoice_trackers_table', 111),
(247, '2023_11_09_165430_create_shipping_items_table', 112),
(248, '2023_11_09_164022_create_shippings_table', 113);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_attachments`
--

CREATE TABLE `model_has_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attachment_id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(125) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(7, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 16),
(10, 'App\\Models\\User', 16),
(6, 'App\\Models\\User', 17),
(9, 'App\\Models\\User', 17),
(10, 'App\\Models\\User', 17),
(11, 'App\\Models\\User', 17),
(6, 'App\\Models\\User', 142),
(7, 'App\\Models\\User', 148),
(9, 'App\\Models\\User', 177);

-- --------------------------------------------------------

--
-- Table structure for table `my_payment_in_school_program`
--

CREATE TABLE `my_payment_in_school_program` (
  `id` int(11) NOT NULL,
  `total_payable` varchar(125) DEFAULT NULL,
  `payment_method` varchar(125) DEFAULT NULL,
  `money_order` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_payment_in_school_program`
--

INSERT INTO `my_payment_in_school_program` (`id`, `total_payable`, `payment_method`, `money_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Kiara Middleton', 'Debit Card', 'Certified Check', 1, NULL, NULL, '2023-03-16 05:51:17', '2023-03-16 05:51:17'),
(6, '36467', 'Credit Card', 'Debit card', 1, NULL, NULL, '2023-03-16 05:57:07', '2023-03-16 05:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `my_payment_in_student_registration`
--

CREATE TABLE `my_payment_in_student_registration` (
  `id` int(11) NOT NULL,
  `total_payable` varchar(125) DEFAULT NULL,
  `payment_method` varchar(125) DEFAULT NULL,
  `money_order` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_payment_in_student_registration`
--

INSERT INTO `my_payment_in_student_registration` (`id`, `total_payable`, `payment_method`, `money_order`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, '25435', 'Debit Card', 'Certified Check', 1, NULL, NULL, '2023-03-16 17:49:04', '2023-03-16 17:49:04'),
(8, '468554', 'Debit Card', 'Online banking', 1, NULL, NULL, '2023-03-17 04:42:37', '2023-03-17 04:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(125) NOT NULL,
  `content` longtext NOT NULL,
  `action_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `date`, `title`, `content`, `action_date`, `created_at`, `updated_at`) VALUES
(4, 2, '2023-05-18 19:42:09', 'Numquam et quod et p sdfsdaf asfdsaf asdfsadfsdaf', 'Ratione est aut arcf asdfas dfafsadf asdf asdfasdf asfsdaf sa df', '2023-05-18 19:42:25', '2023-05-18 13:42:29', '2023-05-18 13:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `notices_type`
--

CREATE TABLE `notices_type` (
  `id` int(11) NOT NULL,
  `notice_name` varchar(125) DEFAULT NULL,
  `notice_level` tinyint(4) DEFAULT NULL,
  `parent_notice` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notices_type`
--

INSERT INTO `notices_type` (`id`, `notice_name`, `notice_level`, `parent_notice`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Absence', 0, 0, 1, NULL, NULL, NULL, '2023-03-03 15:34:16'),
(2, 'Student', 1, 1, 1, NULL, NULL, NULL, '2023-03-03 15:34:16'),
(3, 'Teacher/Instructor', 1, 1, 1, NULL, NULL, NULL, '2023-03-03 15:35:18'),
(4, 'Staff', 1, 1, 1, NULL, NULL, NULL, '2023-03-03 15:35:18'),
(5, 'Academic Misconduct', 0, 0, 1, NULL, NULL, NULL, '2023-03-03 15:35:57'),
(6, 'Cheating', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:35:57'),
(7, 'Classroom Disturbances', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:38:55'),
(8, 'Duplicate Submission', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:40:07'),
(9, 'Falsification', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:40:07'),
(10, 'Misrepresentation', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:41:26'),
(11, 'Plagiarism', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:41:26'),
(12, 'Classmate Harassment', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:42:15'),
(13, 'Unauthorized Collaboration', 1, 5, 1, NULL, NULL, NULL, '2023-03-03 15:42:15'),
(14, 'Violation Regulations', 0, 0, 1, NULL, NULL, NULL, '2023-03-03 15:43:23'),
(15, 'Unpaid Owing Balance', 0, 0, 1, NULL, NULL, NULL, '2023-03-03 15:43:23'),
(16, 'Complaint', 0, 0, 1, NULL, NULL, NULL, '2023-03-03 15:44:27'),
(17, 'Dismissal', 0, 0, 1, NULL, NULL, NULL, '2023-03-03 15:44:27'),
(18, 'Student', 1, 17, 1, NULL, NULL, NULL, '2023-03-03 15:45:44'),
(19, 'Teacher/Instructor', 1, 17, 1, NULL, NULL, NULL, '2023-03-03 15:45:44'),
(20, 'Staff', 1, 17, 1, NULL, NULL, NULL, '2023-03-03 15:46:28'),
(21, 'Infraction Fine', 1, 17, 1, NULL, NULL, NULL, '2023-03-03 15:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `issue_date` datetime DEFAULT NULL,
  `expiry_date` datetime NOT NULL,
  `quotation_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `type` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `campus_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `back_ordered` tinyint(4) DEFAULT NULL,
  `scheduled_delivery_date` datetime DEFAULT NULL,
  `delivery_location` varchar(50) DEFAULT NULL,
  `delivery_instruction` text,
  `payment_due_date` datetime DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `is_check_acceptable` tinyint(4) DEFAULT NULL,
  `late_payment_penalty` decimal(20,6) DEFAULT NULL,
  `hidden_cost` decimal(20,6) DEFAULT NULL,
  `shipping_cost_paid_by` varchar(50) DEFAULT NULL,
  `staff_note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `unique_id`, `school_id`, `date`, `issue_date`, `expiry_date`, `quotation_id`, `order_id`, `type`, `status`, `created_by`, `amount`, `description`, `created_at`, `updated_at`, `user_id`, `code`, `comment`, `item_type`, `campus_id`, `project_id`, `back_ordered`, `scheduled_delivery_date`, `delivery_location`, `delivery_instruction`, `payment_due_date`, `payment_method`, `is_check_acceptable`, `late_payment_penalty`, `hidden_cost`, `shipping_cost_paid_by`, `staff_note`) VALUES
(1, 'b8db4b22-a982-4709-81f8-558b64ed0df8', 1, '2023-11-04 22:25:05', NULL, '1984-03-16 22:48:00', 1, NULL, 'purchase', 'approved', 2, 87.00, 'Harum quia aspernatu', '2023-11-04 16:26:43', '2023-11-04 16:54:18', 179, 'PO-2023-000178', NULL, 'services', 4, 14, 1, NULL, 'Cupidatat est verit', 'Earum non fugiat sin', '2014-06-03 19:49:00', 'online-bank', 1, 80.000000, 80.000000, 'customer', 'Illum consequuntur'),
(2, '50e59078-5069-469a-9d8f-f453ab4e935d', 1, '2023-11-09 22:48:58', NULL, '1998-08-25 12:22:00', 5, NULL, 'purchase', 'approved', 2, 98.00, 'Adipisci veniam non', '2023-11-09 16:49:20', '2023-11-11 14:21:30', 178, 'PO-2023-000179', NULL, 'goods', 4, 14, 1, NULL, 'Minus doloribus cum', 'Consectetur magnam a', '2006-03-20 12:00:00', 'certified-check', 0, 70.000000, 70.000000, 'seller', 'Voluptas ut quibusda'),
(3, 'ba01403b-f0d6-4f7c-845f-eba6a2ede0df', 1, '2023-11-11 21:43:54', NULL, '2023-12-25 13:36:00', 7, NULL, 'purchase', 'approved', 2, 26000.00, 'Laboriosam ipsum t', '2023-11-11 15:44:58', '2023-11-11 16:10:52', 178, 'PO-2023-000180', NULL, 'goods', 7, 14, 0, NULL, 'Corporis asperiores', 'Odio sit quos sint e', '2010-02-10 18:24:00', 'online-bank', 1, 70.000000, 60.000000, 'customer', 'Dolorum dicta vero e'),
(4, 'd635f43f-3ee4-4041-ab8e-59593319c030', 1, '2023-11-12 00:55:49', NULL, '2010-03-05 12:42:00', NULL, NULL, 'purchase', 'pending', 2, 1235.00, 'A aut ut dicta asper', '2023-11-11 18:56:29', '2023-11-11 18:56:29', 178, 'PO-2023-000181', NULL, 'goods', 6, 14, 0, NULL, 'Qui nesciunt provid', 'Dolore asperiores qu', '1996-10-11 15:07:00', NULL, 0, 100.000000, 50.000000, 'seller', 'Accusantium tempore'),
(5, '65c3eb5e-639c-45ca-a460-f5ec529e4127', 1, '2023-11-12 14:00:51', NULL, '2022-03-20 21:58:00', 12, NULL, 'purchase', 'pending', 2, 2330.00, 'Quia vel sequi quod', '2023-11-12 08:01:29', '2023-11-12 18:18:27', 178, 'PO-2023-000182', NULL, 'goods', NULL, NULL, 0, NULL, 'Enim facere tempor t', 'Ipsum qui sint offi', '2018-02-09 00:33:00', NULL, 0, 70.000000, 60.000000, 'seller', 'Eveniet non deserun');

-- --------------------------------------------------------

--
-- Table structure for table `offer_discounts`
--

CREATE TABLE `offer_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(125) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer_discounts`
--

INSERT INTO `offer_discounts` (`id`, `offer_id`, `title`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quia anim excepturi', 97.00, '2023-11-04 16:26:43', '2023-11-04 16:26:43'),
(2, 2, 'Nisi adipisicing vol', 71.00, '2023-11-09 16:49:21', '2023-11-09 16:49:21'),
(3, 3, 'Corporis id laborios', 5.00, '2023-11-11 15:44:58', '2023-11-11 15:44:58'),
(4, 4, 'Perferendis fugiat o', 42.00, '2023-11-11 18:56:29', '2023-11-11 18:56:29'),
(5, 5, 'Est explicabo Labor', 62.00, '2023-11-12 08:01:29', '2023-11-12 08:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `offer_items`
--

CREATE TABLE `offer_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(125) DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `description` text,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `addition` decimal(20,6) DEFAULT NULL,
  `deduction` decimal(20,6) DEFAULT NULL,
  `sub_total` decimal(20,6) DEFAULT NULL,
  `tax` decimal(20,6) DEFAULT NULL,
  `total` decimal(20,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer_items`
--

INSERT INTO `offer_items` (`id`, `item_code`, `item_id`, `quantity`, `cost`, `description`, `account_id`, `created_at`, `updated_at`, `offer_id`, `project_id`, `addition`, `deduction`, `sub_total`, `tax`, `total`) VALUES
(2, 'Eaque aut nostrum di', 6, 1.00, 87.00, NULL, NULL, '2023-11-04 16:28:49', '2023-11-04 16:28:49', 1, NULL, NULL, NULL, NULL, NULL, 87.000000),
(3, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-11-09 16:49:20', '2023-11-09 16:49:20', 2, NULL, NULL, NULL, NULL, NULL, 80.000000),
(4, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-11-09 16:49:20', '2023-11-09 16:49:20', 2, NULL, NULL, NULL, NULL, NULL, 18.000000),
(5, 'Ullam placeat dolor', 2, 100.00, 59.00, NULL, NULL, '2023-11-11 15:44:58', '2023-11-11 15:44:58', 3, NULL, NULL, NULL, NULL, NULL, 5900.000000),
(6, 'In vel nostrud repud', 5, 150.00, 18.00, NULL, NULL, '2023-11-11 15:44:58', '2023-11-11 15:44:58', 3, NULL, NULL, NULL, NULL, NULL, 2700.000000),
(7, 'Eaque aut nostrum di', 6, 200.00, 87.00, NULL, NULL, '2023-11-11 15:44:58', '2023-11-11 15:44:58', 3, NULL, NULL, NULL, NULL, NULL, 17400.000000),
(8, 'Ratione quibusdam ac', 3, 10.00, 80.00, NULL, NULL, '2023-11-11 18:56:29', '2023-11-11 18:56:29', 4, NULL, NULL, NULL, NULL, NULL, 800.000000),
(9, 'Eaque aut nostrum di', 6, 5.00, 87.00, NULL, NULL, '2023-11-11 18:56:29', '2023-11-11 18:56:29', 4, NULL, NULL, NULL, NULL, NULL, 435.000000),
(10, 'Ullam placeat dolor', 2, 10.00, 59.00, NULL, NULL, '2023-11-12 08:01:29', '2023-11-12 08:01:29', 5, NULL, NULL, NULL, NULL, NULL, 590.000000),
(11, 'Eaque aut nostrum di', 6, 20.00, 87.00, NULL, NULL, '2023-11-12 08:01:29', '2023-11-12 08:01:29', 5, NULL, NULL, NULL, NULL, NULL, 1740.000000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `issue_date` datetime NOT NULL,
  `type` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL,
  `offer_id` bigint(20) NOT NULL DEFAULT '0',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `is_packed` tinyint(4) NOT NULL DEFAULT '0',
  `shipping_company` varchar(50) DEFAULT NULL,
  `shipping_vehicle` varchar(50) DEFAULT NULL,
  `shipping_driver` varchar(50) DEFAULT NULL,
  `invoice_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `unique_id`, `code`, `school_id`, `quotation_id`, `date`, `issue_date`, `type`, `status`, `offer_id`, `created_by`, `amount`, `description`, `created_at`, `updated_at`, `user_id`, `comment`, `is_packed`, `shipping_company`, `shipping_vehicle`, `shipping_driver`, `invoice_id`) VALUES
(18, '97fe2315-2aef-4c17-8df8-b16b067f2ff7', 'POR-2023-000013', 1, 1, '2023-11-16 23:24:00', '2023-11-21 23:24:00', 'purchase', 'pending', 0, 2, 89.00, 'fsdagsda', '2023-11-04 18:04:45', '2023-11-04 18:12:48', 179, 'gsadgsa', 1, 'abc shipping company', 'fsagds', 'gsadgsa', 1),
(20, '065981c3-7e29-4d58-b17e-cde30cc2a877', 'POR-2023-000014', 1, 2, '2023-11-21 22:46:00', '2023-11-24 22:46:00', 'purchase', 'pending', 0, 2, 102.00, 'fsfdsa', '2023-11-10 16:46:29', '2023-11-10 16:46:29', 179, 'fdsafdas', 0, NULL, NULL, NULL, NULL),
(21, 'd7216832-03c2-44ed-9f38-4862fb065d47', 'POR-2023-000015', 1, 5, '2023-11-29 20:22:00', '2023-11-22 20:22:00', 'purchase', 'pending', 0, 2, 104.00, 'fas', '2023-11-11 14:22:48', '2023-11-11 14:22:48', 179, 'gasdgsa', 0, NULL, NULL, NULL, NULL),
(22, 'b928c32a-b572-4437-8aea-e0cc0a22a426', 'POR-2023-000016', 1, 7, '2023-11-14 22:11:00', '2023-11-08 22:11:00', 'purchase', 'pending', 0, 2, 27542.50, 'fsdf', '2023-11-11 16:11:58', '2023-11-11 16:11:58', 179, 'fasfsadf', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(125) DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `description` text,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `addition` decimal(20,2) DEFAULT NULL,
  `deduction` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `tax` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `shipped_quantity` int(11) DEFAULT NULL,
  `credit_quantity` int(11) DEFAULT NULL,
  `returned_quantity` int(11) DEFAULT NULL,
  `debit_quantity` int(11) DEFAULT NULL,
  `addition_rate` decimal(15,2) DEFAULT NULL,
  `deduction_rate` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `item_code`, `item_id`, `quantity`, `cost`, `description`, `account_id`, `created_at`, `updated_at`, `order_id`, `project_id`, `addition`, `deduction`, `sub_total`, `tax`, `total`, `shipped_quantity`, `credit_quantity`, `returned_quantity`, `debit_quantity`, `addition_rate`, `deduction_rate`) VALUES
(1, NULL, 62, 1.00, 80.00, NULL, NULL, '2023-08-26 10:37:34', '2023-08-26 10:37:34', 4, NULL, NULL, 1.00, 84.00, 5.00, 89.00, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 63, 1.00, 18.00, NULL, NULL, '2023-08-26 10:37:34', '2023-08-26 10:37:34', 4, NULL, NULL, 5.00, 13.00, 12.00, 25.00, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'In vel nostrud repud', 74, 1.00, 18.00, NULL, NULL, '2023-08-27 13:50:45', '2023-08-27 13:50:45', 5, NULL, NULL, 20.00, 18.00, 25.00, 63.00, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Ratione quibusdam ac', 75, 1.00, 80.00, NULL, NULL, '2023-08-27 13:50:45', '2023-08-27 13:50:45', 5, NULL, NULL, 10.00, 80.00, 15.00, 115.00, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'In vel nostrud repud', 74, 1.00, 18.00, NULL, NULL, '2023-08-27 13:52:57', '2023-08-27 13:52:57', 6, NULL, NULL, 20.00, 18.00, 25.00, 63.00, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Ratione quibusdam ac', 75, 1.00, 80.00, NULL, NULL, '2023-08-27 13:52:57', '2023-08-27 13:52:57', 6, NULL, NULL, 10.00, 80.00, 15.00, 115.00, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'In vel nostrud repud', 74, 1.00, 18.00, NULL, NULL, '2023-08-27 14:06:36', '2023-08-27 14:06:36', 7, NULL, NULL, 20.00, 18.00, 25.00, 63.00, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Ratione quibusdam ac', 75, 1.00, 80.00, NULL, NULL, '2023-08-27 14:06:36', '2023-08-27 14:06:36', 7, NULL, NULL, 10.00, 80.00, 15.00, 115.00, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'In vel nostrud repud', 74, 1.00, 18.00, NULL, NULL, '2023-08-27 14:07:01', '2023-08-27 14:07:01', 8, NULL, NULL, 20.00, 18.00, 25.00, 63.00, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Ratione quibusdam ac', 75, 1.00, 80.00, NULL, NULL, '2023-08-27 14:07:01', '2023-08-27 14:07:01', 8, NULL, NULL, 10.00, 80.00, 15.00, 115.00, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'In vel nostrud repud', 74, 1.00, 18.00, NULL, NULL, '2023-08-27 14:07:59', '2023-08-27 14:07:59', 9, NULL, NULL, 20.00, 18.00, 25.00, 63.00, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Ratione quibusdam ac', 75, 1.00, 80.00, NULL, NULL, '2023-08-27 14:07:59', '2023-08-27 14:07:59', 9, NULL, NULL, 10.00, 80.00, 15.00, 115.00, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Ratione quibusdam ac', 78, 1.00, 80.00, NULL, NULL, '2023-08-30 17:13:31', '2023-08-30 17:13:31', 10, NULL, NULL, 5.00, 80.00, 15.00, 135.00, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'In vel nostrud repud', 79, 1.00, 18.00, NULL, NULL, '2023-08-30 17:13:31', '2023-08-30 17:13:31', 10, NULL, NULL, 5.00, 18.00, 10.00, 58.00, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-08-30 18:02:15', '2023-08-30 18:02:15', 12, NULL, 35.00, 10.00, 105.00, 50.00, 155.00, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-08-30 18:02:15', '2023-08-30 18:02:15', 12, NULL, 15.00, 5.00, 28.00, 2.00, 30.00, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-09-05 19:42:23', '2023-09-05 19:42:23', 13, NULL, 10.00, 2.00, 88.00, 5.00, 93.00, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-09-05 19:42:23', '2023-09-05 19:42:23', 13, NULL, 20.00, 3.00, 35.00, 2.00, 37.00, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Ullam placeat dolor', 2, 1.00, 59.00, NULL, NULL, '2023-09-11 14:38:21', '2023-09-11 14:38:21', 14, NULL, 60.00, 50.00, 69.00, 10.00, 79.00, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-09-11 14:38:21', '2023-09-11 14:38:21', 14, NULL, 50.00, 10.00, 58.00, 40.00, 98.00, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-09-11 14:38:21', '2023-09-11 14:38:21', 14, NULL, 14.00, 6.00, 88.00, 5.00, 93.00, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-09-13 17:37:44', '2023-09-13 17:37:44', 15, NULL, 70.00, 53.00, 97.00, 10.00, 107.00, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-09-17 19:18:36', '2023-09-17 19:18:36', 16, NULL, 80.00, 40.00, 58.00, NULL, 58.00, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-09-17 19:18:36', '2023-09-17 19:18:36', 16, NULL, 30.00, 23.00, 87.00, NULL, 87.00, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Eaque aut nostrum di', 6, 1.00, 87.00, NULL, NULL, '2023-11-04 17:08:34', '2023-11-04 17:08:34', 17, NULL, 56.00, 54.00, 89.00, NULL, 89.00, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Eaque aut nostrum di', 6, 10.00, 87.00, NULL, NULL, '2023-11-04 18:04:45', '2023-11-04 18:04:45', 18, NULL, 56.00, 54.00, 89.00, NULL, 890.00, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-11-10 16:46:29', '2023-11-10 16:46:29', 20, NULL, 50.00, 54.00, 76.00, NULL, 76.00, NULL, NULL, NULL, NULL, 50.00, 54.00),
(30, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-11-10 16:46:29', '2023-11-10 16:46:29', 20, NULL, 40.00, 32.00, 26.00, NULL, 26.00, NULL, NULL, NULL, NULL, 40.00, 32.00),
(31, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-11-11 14:22:48', '2023-11-11 14:22:48', 21, NULL, 4.00, 1.00, 83.00, 0.00, 83.00, NULL, NULL, NULL, NULL, 4.00, 1.00),
(32, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-11-11 14:22:48', '2023-11-11 14:22:48', 21, NULL, 5.00, 2.00, 21.00, 0.00, 21.00, NULL, NULL, NULL, NULL, 5.00, 2.00),
(33, 'Ullam placeat dolor', 2, 100.00, 59.00, NULL, NULL, '2023-11-11 16:11:58', '2023-11-11 16:35:59', 22, NULL, 100.00, 150.00, 5850.00, 292.50, 6142.50, 90, NULL, NULL, NULL, 1.00, 1.50),
(34, 'In vel nostrud repud', 5, 150.00, 18.00, NULL, NULL, '2023-11-11 16:11:58', '2023-11-11 16:35:59', 22, NULL, 150.00, 100.00, 2750.00, 275.00, 3025.00, 120, NULL, NULL, NULL, 1.00, 0.67),
(35, 'Eaque aut nostrum di', 6, 200.00, 87.00, NULL, NULL, '2023-11-11 16:11:58', '2023-11-11 16:35:59', 22, NULL, 250.00, 150.00, 17500.00, 875.00, 18375.00, 150, NULL, NULL, NULL, 1.25, 0.75);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `school_id` int(11) NOT NULL,
  `url` varchar(125) NOT NULL,
  `content` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `school_id`, `url`, `content`, `created_by`, `updated_by`, `created_at`, `status`, `updated_at`) VALUES
(1, 'Process', 1, 'process', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, '2022-12-29 03:59:17', 0, '2022-12-28 22:12:17'),
(2, 'Requirements', 1, 'requirements', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\'', NULL, NULL, '2022-12-29 04:14:18', 0, '2022-12-28 22:14:29'),
(3, 'Rules policies and procedures', 1, 'rules-policies-and-procedures', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-29 23:36:28', 0, '2022-12-29 17:36:28'),
(4, 'Code of conduct', 1, 'code-of-conduct', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many', NULL, NULL, '2022-12-29 23:39:37', 0, '2022-12-29 17:39:51'),
(5, 'Rights and responsibilities', 1, 'rights-and-responsibilities', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-29 23:40:27', 0, '2022-12-29 17:40:27'),
(6, 'Competition program', 1, 'competition-program', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 00:54:32', 0, '2022-12-29 18:54:32'),
(7, 'Advanced placement', 1, 'advanced-placement', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 00:54:52', 0, '2022-12-29 18:54:52'),
(8, 'Credential assessments', 1, 'credential-assessments', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 00:55:01', 0, '2022-12-29 18:55:01'),
(9, 'Dismissal', 1, 'dismissal', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 00:55:13', 0, '2022-12-29 18:55:13'),
(10, 'Ethics and compliance', 1, 'ethics-and-compliance', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 00:55:22', 0, '2022-12-29 18:55:22'),
(11, 'Mark appeals', 1, 'mark-appeals', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 00:55:31', 0, '2022-12-29 18:55:31'),
(12, 'Refund cancelation and withdraw', 1, 'refund-cancelation-and-withdraw', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 02:28:41', 0, '2022-12-29 20:28:41'),
(13, 'Scholarships grants and bursaries', 1, 'scholarships-grants-and-bursaries', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 02:28:48', 0, '2022-12-29 20:28:48'),
(14, 'Students assessments', 1, 'students-assessments', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL, '2022-12-30 02:28:56', 0, '2022-12-29 20:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `parkers`
--

CREATE TABLE `parkers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `image` varchar(100) NOT NULL,
  `license_no` varchar(125) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `document` varchar(125) DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parker_type_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parkers`
--

INSERT INTO `parkers` (`id`, `school_id`, `name`, `image`, `license_no`, `expiry_date`, `document`, `contact_id`, `address_id`, `created_at`, `updated_at`, `parker_type_id`) VALUES
(1, 1, 'Idona Brooks', '1/2023-08/25bbyXTnZxUhOhVHfAkFjFzbiYVER7.jpg', 'Temporibus eum facil', '1996-11-15 00:00:00', NULL, 340, 393, '2023-08-06 17:08:50', '2023-08-06 17:33:02', NULL),
(2, 1, 'Harriet Burch', '1/2023-08/Kgzj9GaRFHFJpBscTUtC3U9wtujF8c.jpg', 'Iusto et nostrum ull', '1999-02-18 00:00:00', NULL, 353, 406, '2023-08-11 17:22:51', '2023-08-11 17:22:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parker_types`
--

CREATE TABLE `parker_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parker_types`
--

INSERT INTO `parker_types` (`id`, `school_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Emergency', 1, '2023-08-06 11:24:36', '2023-08-06 11:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `parking_logs`
--

CREATE TABLE `parking_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `stall_no` varchar(125) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `make` varchar(125) NOT NULL,
  `model` varchar(125) NOT NULL,
  `color` varchar(125) NOT NULL,
  `plate_no` varchar(125) NOT NULL,
  `driver_name` varchar(125) NOT NULL,
  `phone` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `purpose_of_visit` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking_logs`
--

INSERT INTO `parking_logs` (`id`, `date`, `stall_no`, `start_time`, `end_time`, `make`, `model`, `color`, `plate_no`, `driver_name`, `phone`, `email`, `purpose_of_visit`, `created_at`, `updated_at`) VALUES
(1, '1972-08-12 09:36:00', 'Minima exercitation', '1973-03-07 20:15:00', '1978-01-22 11:49:00', 'Sint laborum Et nem', 'Aut qui dolor minima', 'Aut qui dolor minima', 'Non est voluptate fu', 'Cassandra Brock', '+1 (139) 579-2417', 'qyjyxo@mailinator.com', 'Molestias dolore sim', '2023-08-15 16:18:56', '2023-08-15 16:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `parking_lots`
--

CREATE TABLE `parking_lots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `lot_no` varchar(125) NOT NULL,
  `lot_name` varchar(125) NOT NULL,
  `total_stalls` int(11) NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking_lots`
--

INSERT INTO `parking_lots` (`id`, `school_id`, `lot_no`, `lot_name`, `total_stalls`, `contact_id`, `address_id`, `created_at`, `updated_at`) VALUES
(1, 1, '381', 'Geraldine Snow', 70, 328, 381, '2023-08-04 17:58:44', '2023-08-04 17:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `parking_rates`
--

CREATE TABLE `parking_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `parker_type_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `amount_after_tax` decimal(15,2) NOT NULL,
  `expire_rate` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking_rates`
--

INSERT INTO `parking_rates` (`id`, `school_id`, `parker_type_id`, `amount`, `tax`, `amount_after_tax`, `expire_rate`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 870.00, 70.00, 940.00, 80.00, '2023-08-11 14:14:41', '2023-08-11 14:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `parking_stalls`
--

CREATE TABLE `parking_stalls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `lot_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `dedicated_no` varchar(125) NOT NULL,
  `parker_type_id` bigint(20) NOT NULL DEFAULT '0',
  `location` varchar(125) NOT NULL,
  `size` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vacant` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking_stalls`
--

INSERT INTO `parking_stalls` (`id`, `school_id`, `lot_id`, `name`, `dedicated_no`, `parker_type_id`, `location`, `size`, `created_at`, `updated_at`, `vacant`) VALUES
(1, 1, 1, 'Chester Richmond', '7605', 2, 'Dolor unde placeat', 'Voluptatem Necessit', '2023-08-06 13:35:18', '2023-08-06 14:02:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parking_stall_allocations`
--

CREATE TABLE `parking_stall_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `stall_id` bigint(20) UNSIGNED NOT NULL,
  `parker_id` bigint(20) UNSIGNED NOT NULL,
  `parker_type_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking_stall_allocations`
--

INSERT INTO `parking_stall_allocations` (`id`, `school_id`, `stall_id`, `parker_id`, `parker_type_id`, `vehicle_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, NULL, '2023-08-12 06:06:48', '2023-08-12 06:06:48'),
(2, 1, 1, 2, 2, 2, '2023-08-12 09:32:29', '2023-08-12 09:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `participants_availability_and_contacts_in_education_team`
--

CREATE TABLE `participants_availability_and_contacts_in_education_team` (
  `id` int(11) NOT NULL,
  `participants_position` int(11) DEFAULT NULL,
  `participants_user_id` int(11) DEFAULT NULL,
  `availability_date_day` timestamp NULL DEFAULT NULL,
  `participants_phone` varchar(125) DEFAULT NULL,
  `participants_email` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants_availability_and_contacts_in_education_team`
--

INSERT INTO `participants_availability_and_contacts_in_education_team` (`id`, `participants_position`, `participants_user_id`, `availability_date_day`, `participants_phone`, `participants_email`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-30 22:47:38', '2023-05-30 16:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_no` varchar(50) DEFAULT NULL,
  `unique_no` varchar(50) DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `method` varchar(125) DEFAULT NULL,
  `date` datetime NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `is_reconciled` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_no`, `unique_no`, `transaction_id`, `school_id`, `account_id`, `method`, `date`, `amount`, `created_by`, `user_id`, `note`, `created_at`, `updated_at`, `type`, `status`, `is_reconciled`) VALUES
(4, NULL, NULL, 38, 1, 1, 'cash', '2023-04-26 23:31:00', 1260.00, 2, NULL, NULL, '2023-04-26 17:58:14', '2023-04-26 17:58:14', NULL, NULL, NULL),
(5, NULL, NULL, 39, 1, 1, 'cash', '2023-04-27 00:05:00', 171.36, 2, NULL, NULL, '2023-04-26 18:42:56', '2023-04-26 18:42:56', NULL, NULL, NULL),
(6, NULL, NULL, 49, 1, 1, 'cash', '2023-04-28 02:44:00', 518.65, 2, NULL, NULL, '2023-04-27 20:45:00', '2023-04-27 20:45:00', NULL, NULL, NULL),
(7, NULL, NULL, NULL, 1, NULL, NULL, '1977-04-01 07:53:00', 90.00, 2, NULL, NULL, '2023-08-25 12:02:14', '2023-08-25 12:02:14', 'petty-cash-initial-payment', NULL, NULL),
(8, NULL, NULL, NULL, 1, NULL, 'Quis doloremque dolo', '2002-03-10 14:13:00', 800.00, 2, NULL, NULL, '2023-08-25 12:05:00', '2023-08-25 12:05:00', 'petty-cash-initial-payment', 'Tempore est eligend', NULL),
(9, 'Omnis aut rerum dolo', '64e89c7db131f', NULL, 1, NULL, 'Check', '1988-12-09 07:11:00', 900.00, 2, NULL, NULL, '2023-08-25 12:20:21', '2023-08-25 12:20:21', 'petty-cash-initial-payment', 'Void', NULL),
(10, 'Beatae nisi reprehen', '64e89f5615764', NULL, 1, NULL, NULL, '2023-08-19 01:13:00', 800.00, 2, NULL, NULL, '2023-08-25 12:32:30', '2023-08-25 12:32:30', 'reimbursement', 'Void', NULL),
(11, 'Est dicta praesenti', '64e8ba38c0cf9', NULL, 1, NULL, 'cheque', '1988-03-04 03:11:00', 90.00, 2, NULL, NULL, '2023-08-25 15:12:32', '2023-08-25 15:12:32', 'indirect', NULL, NULL),
(12, 'Nobis lorem voluptas', '64e8d8bb135b8', NULL, 1, 1, 'Check', '1979-10-08 07:16:00', 900.00, 2, NULL, NULL, '2023-08-25 16:37:21', '2023-08-25 16:37:21', 'receipt', NULL, NULL),
(13, NULL, '64ecbfa573db2', 59, 1, NULL, 'cash', '2023-08-31 21:30:00', 80.00, 2, NULL, NULL, '2023-08-28 15:39:17', '2023-08-28 15:39:17', 'indirect', NULL, NULL),
(14, NULL, '64ecbfa57b6b1', 61, 1, NULL, 'cash', '2023-08-31 21:30:00', 70.00, 2, NULL, NULL, '2023-08-28 15:39:17', '2023-08-28 15:39:17', 'indirect', NULL, NULL),
(15, NULL, '64f076af8e035', 77, 1, 1, 'cash', '2023-08-23 17:05:00', 600.00, 2, NULL, NULL, '2023-08-31 11:17:03', '2023-08-31 11:17:03', 'indirect', NULL, NULL),
(16, NULL, '64f080a31bf72', 77, 1, 1, 'cheque', '2023-09-01 17:59:00', 200.00, 2, NULL, NULL, '2023-08-31 11:59:31', '2023-08-31 11:59:31', 'indirect', NULL, NULL),
(19, 'PAY-2023-000001', '64f224dfbdb55', NULL, 1, NULL, 'cash', '1999-07-24 05:28:00', 800.00, 2, 62, NULL, '2023-09-01 17:52:58', '2023-09-01 17:52:58', 'indirect', NULL, 1),
(20, 'PAY-2023-000002', '64f225b384234', 65, 1, 1, 'cash', '2023-09-20 23:55:00', 45.00, 2, NULL, NULL, '2023-09-01 17:56:03', '2023-09-01 17:56:03', 'indirect', NULL, NULL),
(21, 'PAY-2023-000003', '64f225b3863ce', 66, 1, 1, 'cash', '2023-09-20 23:55:00', 35.00, 2, NULL, NULL, '2023-09-01 17:56:03', '2023-09-01 17:56:03', 'indirect', NULL, NULL),
(22, 'PAY-2023-000004', '650099af53ccc', 64, 1, 1, 'cash', '2023-09-14 22:54:00', 50.00, 2, NULL, NULL, '2023-09-12 17:02:39', '2023-09-12 17:02:39', 'indirect', NULL, NULL),
(23, 'PAY-2023-000005', '65009f778d55a', 86, 1, 1, 'cheque', '2023-09-15 23:27:00', 100.00, 2, 33, NULL, '2023-09-12 17:27:19', '2023-09-12 17:27:19', 'indirect', NULL, NULL),
(24, 'PAY-2023-000006', '6501f3e340dc6', 92, 1, 1, 'cash', '2023-09-20 23:39:00', 50.00, 2, 150, NULL, '2023-09-13 17:39:47', '2023-09-13 17:39:47', 'indirect', NULL, NULL),
(25, 'PAY-2023-000007', '653bea93b491a', 61, 1, 1, 'cheque', '2023-10-11 22:51:00', 100.00, 2, NULL, NULL, '2023-10-27 16:51:31', '2023-10-27 16:51:31', 'indirect', NULL, NULL),
(26, 'PAY-2023-000008', '653c087015ff1', 99, 1, 2, 'cheque', '2023-10-29 00:58:00', 1700.00, 2, 164, NULL, '2023-10-27 18:58:56', '2023-10-27 18:58:56', 'indirect', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_infos`
--

CREATE TABLE `payment_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `card_no` varchar(125) NOT NULL,
  `card_type` varchar(125) NOT NULL,
  `expiration` date NOT NULL,
  `cvv` varchar(125) NOT NULL,
  `card_holder_name` varchar(125) NOT NULL,
  `billing_address` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_infos`
--

INSERT INTO `payment_infos` (`id`, `user_id`, `card_no`, `card_type`, `expiration`, `cvv`, `card_holder_name`, `billing_address`, `created_at`, `updated_at`) VALUES
(1, 152, 'Ut facilis molestiae', 'MALE', '2021-08-07', 'Nisi nisi eum aut in', 'Lani Cochran', NULL, '2023-09-29 17:14:43', '2023-09-29 17:14:43'),
(2, 152, 'Ut facilis molestiae', 'MALE', '2021-08-07', 'Nisi nisi eum aut in', 'Lani Cochran', 'Ipsum dicta dolor qu', '2023-09-29 17:23:21', '2023-09-29 17:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment_schedules`
--

CREATE TABLE `payment_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `payment_no` varchar(125) NOT NULL,
  `due_date` datetime NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `status` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `guard_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'program.view', 'web', '2023-07-18 17:36:20', '2023-07-18 17:36:20'),
(2, 'program.create', 'web', '2023-07-18 17:36:20', '2023-07-18 17:36:20'),
(3, 'program.edit', 'web', '2023-07-18 17:36:20', '2023-07-18 17:36:20'),
(4, 'program.post', 'web', '2023-07-18 17:36:20', '2023-07-18 17:36:20'),
(5, 'program.repost', 'web', '2023-07-18 17:36:20', '2023-07-18 17:36:20'),
(6, 'activity-log.view', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(7, 'activity-log.create', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(8, 'activity-log.edit', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(9, 'activity-log.post', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(10, 'inventory-item.view', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(11, 'inventory-item.create', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(12, 'inventory-item.edit', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(13, 'inventory-item.post', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(14, 'service-item.view', 'web', '2023-07-18 18:13:00', '2023-07-18 18:13:00'),
(15, 'class-attendance.view', 'web', '2023-07-20 16:49:25', '2023-07-20 16:49:25'),
(16, 'class-attendance.create', 'web', '2023-07-20 16:49:25', '2023-07-20 16:49:25'),
(17, 'program.delete', 'web', '2023-07-22 05:47:07', '2023-07-22 05:47:07'),
(18, 'assessment.view', 'web', '2023-10-30 16:40:01', '2023-10-30 16:40:01'),
(19, 'assessment.create', 'web', '2023-10-30 16:40:01', '2023-10-30 16:40:01'),
(20, 'assessment.edit', 'web', '2023-10-30 16:40:01', '2023-10-30 16:40:01'),
(21, 'assessment.post', 'web', '2023-10-30 16:40:01', '2023-10-30 16:40:01'),
(22, 'assessment.repost', 'web', '2023-10-30 16:40:01', '2023-10-30 16:40:01'),
(23, 'assessment.delete', 'web', '2023-10-30 16:40:01', '2023-10-30 16:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(125) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\RegisteredUser', 1, '01713053336', '4b9046da9a052fdc0776224903dd8068c4dd62db8272df8eb43fd8b4869ba860', '[\"*\"]', NULL, '2022-05-30 23:05:32', '2022-05-30 23:05:32'),
(4, 'App\\Models\\RegisteredUser', 1, '01928645981', 'a2dec0937dba32afe2eb1126a9767a06b20fb1e7eb7a61d97ac1d3657c84a9ba', '[\"*\"]', NULL, '2022-06-02 14:55:56', '2022-06-02 14:55:56'),
(6, 'App\\Models\\RegisteredUser', 1, '01928645981', 'f85768d00924b104dd36db8eeea0d153b5a09d5d150df221d78cf9a5fdc12e0d', '[\"*\"]', NULL, '2022-06-02 15:07:31', '2022-06-02 15:07:31'),
(7, 'App\\Models\\RegisteredUser', 1, '01928645981', 'aa1b2fad7073a9f83226c6b41ada1402419f3682dd58681e68f49b613f98090c', '[\"*\"]', NULL, '2022-06-02 16:27:12', '2022-06-02 16:27:12'),
(8, 'App\\Models\\RegisteredUser', 1, '01928645981', 'd17e923cf210175b3e3228b3d8de4a315ab446c6bbfd177e0cb35bfdee53640a', '[\"*\"]', NULL, '2022-06-02 16:32:16', '2022-06-02 16:32:16'),
(9, 'App\\Models\\RegisteredUser', 1, '01928645981', '08b32152f889905a0dce34935cc1ef3fe99f7cc8c85f2c818a94bb825c9c4eaa', '[\"*\"]', NULL, '2022-06-02 16:34:06', '2022-06-02 16:34:06'),
(10, 'App\\Models\\RegisteredUser', 1, '01928645981', '068e372a9b0a918d28bfe13d157980d69ea8c485aef64d1fd1f7ba1859b8b7f4', '[\"*\"]', NULL, '2022-06-02 16:35:10', '2022-06-02 16:35:10'),
(11, 'App\\Models\\RegisteredUser', 1, '01928645981', 'dd8cf4cb00a78965478eeb1f85d49222eecc0cd7096af59351d9c31235c66d27', '[\"*\"]', NULL, '2022-06-02 16:36:31', '2022-06-02 16:36:31'),
(12, 'App\\Models\\RegisteredUser', 1, '01928645981', '1212125b1ee8b122e038aa9a2c86bb9b550410833ca93ed183a268747a679f57', '[\"*\"]', NULL, '2022-06-02 16:37:15', '2022-06-02 16:37:15'),
(13, 'App\\Models\\RegisteredUser', 1, '01928645981', '87274df9f0d5787df4eb49c22b4ea4b77e9fc56083ed1027a6628dc526f82f5f', '[\"*\"]', NULL, '2022-06-02 16:38:15', '2022-06-02 16:38:15'),
(14, 'App\\Models\\RegisteredUser', 1, '01928645981', 'f6c836015bb45519beb61681f75f4de340bd898e03dc5ab77027ab8246459857', '[\"*\"]', NULL, '2022-06-02 16:39:17', '2022-06-02 16:39:17'),
(15, 'App\\Models\\RegisteredUser', 1, '01928645981', '55f144f6f6604068e0d4913c9414850751a83933458f32e01f2efb28932efa16', '[\"*\"]', NULL, '2022-06-02 16:40:29', '2022-06-02 16:40:29'),
(16, 'App\\Models\\RegisteredUser', 1, '01928645981', '73480a5912e82645d380e3357a27da25ac43c8fb39ebf24edd09954ea6a81a71', '[\"*\"]', NULL, '2022-06-02 16:41:46', '2022-06-02 16:41:46'),
(19, 'App\\Models\\RegisteredUser', 3, '01952887322', '9732d8d6a2bc528803c5ac06a8f19946895a950b67b5ddb30f4358c215351b61', '[\"*\"]', NULL, '2022-06-02 20:40:42', '2022-06-02 20:40:42'),
(24, 'App\\Models\\RegisteredUser', 1, '01928645981', 'c4233119eee1f0f040495ff6fd6cb080ba2dbe1a2a06952674e50398cc90ea37', '[\"*\"]', NULL, '2022-06-03 10:07:46', '2022-06-03 10:07:46'),
(30, 'App\\Models\\RegisteredUser', 1, '01928645981', '177e55cb349ad0d89eff257f3716c67d49ee6c67b644564f922b61e1e8875aed', '[\"*\"]', NULL, '2022-06-03 15:59:38', '2022-06-03 15:59:38'),
(31, 'App\\Models\\RegisteredUser', 1, '01928645981', 'aef63e6cf8acae9ae8094f2dccf3d5c8cb034fe0d549696d62b1b07bf23e366a', '[\"*\"]', NULL, '2022-06-03 17:16:12', '2022-06-03 17:16:12'),
(37, 'App\\Models\\RegisteredUser', 1, '01928645981', 'b9a830509a33ff3b4b09313d48f16dcbe5cefeb7d7fe45c7cac1097a86cfd209', '[\"*\"]', NULL, '2022-06-03 17:35:03', '2022-06-03 17:35:03'),
(49, 'App\\Models\\RegisteredUser', 15, '01746555579', '7a1b4953f30926c1e00861a4833bfef6263aa3e5f61e4662d6217e72255847c6', '[\"*\"]', NULL, '2022-08-28 18:00:18', '2022-08-28 18:00:18'),
(43, 'App\\Models\\RegisteredUser', 4, '01746555579', 'e811172279ffe9ce249aa82a4b13c17c4262288ae4fcef4afcea7d8e9a425b8f', '[\"*\"]', NULL, '2022-06-04 12:53:35', '2022-06-04 12:53:35'),
(46, 'App\\Models\\RegisteredUser', 1, '01928645981', 'a69ad671bb83a7f0af9371167bafba070e3bb060d6cf4db98ccdb18a5b590d2c', '[\"*\"]', NULL, '2022-06-22 06:02:49', '2022-06-22 06:02:49'),
(48, 'App\\Models\\RegisteredUser', 12, '01713053336', '8d3f183a944c1368194e1b3365b7430940b7c34aab98a05a5788518dcd4db33e', '[\"*\"]', NULL, '2022-06-23 04:07:23', '2022-06-23 04:07:23'),
(50, 'App\\Models\\RegisteredUser', 15, '01746555579', 'ad94ec75888ba43cd315c2aa2db380bf0184a160c4056a0d9b415cd6373d1f5a', '[\"*\"]', NULL, '2022-08-31 15:31:29', '2022-08-31 15:31:29'),
(51, 'App\\Models\\RegisteredUser', 15, '01746555579', '7c5d55fbf9a82897367b262b418d6451a66aa4b322f47a2eb3c83eecca6d9013', '[\"*\"]', NULL, '2022-08-31 16:03:30', '2022-08-31 16:03:30'),
(52, 'App\\Models\\RegisteredUser', 15, '01746555579', '257faaa0b1818e091513ea56ba80e449a2dd8e1cfdfd49b872bce966a8e57b38', '[\"*\"]', NULL, '2022-09-04 12:10:53', '2022-09-04 12:10:53'),
(53, 'App\\Models\\RegisteredUser', 15, '01746555579', '756668fd1e2fb0fd9ed1dcc0c7fdc4687633cde69e000a220e198f0f8199f6dd', '[\"*\"]', NULL, '2022-09-04 12:11:15', '2022-09-04 12:11:15'),
(54, 'App\\Models\\RegisteredUser', 15, '01746555579', '7f8439d334f95114af4c76c165e3d98af78f20476536fdd699e84e0a800ba531', '[\"*\"]', NULL, '2022-09-04 12:11:27', '2022-09-04 12:11:27'),
(55, 'App\\Models\\RegisteredUser', 15, '01746555579', '7426d254665ec7cbca9f62091ef3e7faba5af207a262b1221a87c1694d1fe5a5', '[\"*\"]', NULL, '2022-09-04 13:49:24', '2022-09-04 13:49:24'),
(56, 'App\\Models\\RegisteredUser', 15, '01746555579', 'cfbde5987a5639cfaface036d7859a140b803f9039a8445748ca680241daeb05', '[\"*\"]', NULL, '2022-09-06 12:44:59', '2022-09-06 12:44:59'),
(57, 'App\\Models\\RegisteredUser', 15, '01746555579', 'ff859ccd518444c431f0296b124cfb6850afe48616b5c928465de1c3b0484cbb', '[\"*\"]', NULL, '2022-09-06 14:02:37', '2022-09-06 14:02:37'),
(58, 'App\\Models\\RegisteredUser', 15, '01746555579', '3acd12f42226ba2061b55b7505e37acf061fe6420b45a9e1d40ed885890762bb', '[\"*\"]', NULL, '2022-09-06 14:10:59', '2022-09-06 14:10:59'),
(59, 'App\\Models\\RegisteredUser', 15, '01746555579', '077dd9712b08518299ddad60f68413da3424109d37825bba0932cc3fa6f3bdc5', '[\"*\"]', NULL, '2022-09-06 15:09:48', '2022-09-06 15:09:48'),
(60, 'App\\Models\\RegisteredUser', 15, '01746555579', '027efb14da5c4b6594230f879deb80a85dc5d9151616f576922628f8bc31efb9', '[\"*\"]', NULL, '2022-09-06 15:50:43', '2022-09-06 15:50:43'),
(61, 'App\\Models\\RegisteredUser', 15, '01746555579', '1ce0b0f2b3ffda1fa8798c1f658695701ee6d65a9706d273fe8cd05a95b8aaaf', '[\"*\"]', NULL, '2022-09-06 15:51:50', '2022-09-06 15:51:50'),
(62, 'App\\Models\\RegisteredUser', 15, '01746555579', '37c56db1dc47c77a27d95b60ce487b1c3a84596122b4d1895d72fed4364ecbbf', '[\"*\"]', NULL, '2022-09-06 15:52:03', '2022-09-06 15:52:03'),
(63, 'App\\Models\\RegisteredUser', 15, '01746555579', '85cd67d39825275927b9b90a2aaec06967c657b11156ba540ad76901a076218b', '[\"*\"]', NULL, '2022-09-06 15:54:09', '2022-09-06 15:54:09'),
(64, 'App\\Models\\RegisteredUser', 15, '01746555579', '6153a8b06d7a9974f0828dca4cc1911553561010e24b67914061c40b206d7f79', '[\"*\"]', NULL, '2022-09-06 16:04:07', '2022-09-06 16:04:07'),
(65, 'App\\Models\\RegisteredUser', 15, '01746555579', '3da1c9f86e33af9cd697dd301d148bfd2508b40dfb53c8188c0fffe0c8c6b78c', '[\"*\"]', NULL, '2022-09-06 17:19:10', '2022-09-06 17:19:10'),
(66, 'App\\Models\\RegisteredUser', 15, '01746555579', '3a0b70fcc012e5a25c6e38167073ac6ba34f390f4a754d5c2cf19dac4177baf5', '[\"*\"]', NULL, '2022-09-06 18:03:58', '2022-09-06 18:03:58'),
(67, 'App\\Models\\RegisteredUser', 15, '01746555579', '4634ddeb14c12ed9a40806e240be5ced5d55cf9093ad031158244649b818301d', '[\"*\"]', NULL, '2022-09-07 13:01:42', '2022-09-07 13:01:42'),
(68, 'App\\Models\\RegisteredUser', 15, '01746555579', 'b203309c0bff181b214d56b39bd0c74f442a626612846b19e10166e4ad6855b9', '[\"*\"]', NULL, '2022-09-07 13:02:27', '2022-09-07 13:02:27'),
(69, 'App\\Models\\RegisteredUser', 15, '01746555579', '4695507841ce5ebd611977e0b3554e98c98b7ea090440938ad4b3c30e9522a3a', '[\"*\"]', NULL, '2022-09-07 15:39:46', '2022-09-07 15:39:46'),
(70, 'App\\Models\\RegisteredUser', 15, '01746555579', 'fcd4c085a847a9f75f12241454aded486a464732b3488bbd5b031f797cc70af6', '[\"*\"]', NULL, '2022-09-13 03:41:07', '2022-09-13 03:41:07'),
(71, 'App\\Models\\RegisteredUser', 15, '01746555579', '8cdd57f1a061c91616de862b516f035d7b88c1f220c4d1c14f1721711000cf2e', '[\"*\"]', NULL, '2022-09-13 03:41:07', '2022-09-13 03:41:07'),
(72, 'App\\Models\\RegisteredUser', 15, '01746555579', 'be48c60f2cbbee61d46ec833043ad79e3996504aa75d98ee60d3c6933f2738e9', '[\"*\"]', NULL, '2022-09-20 13:22:22', '2022-09-20 13:22:22'),
(73, 'App\\Models\\RegisteredUser', 15, '01746555579', '46077c72230baf39b8089af7852c658df5633fb480fb80db3ae05f39ce942b12', '[\"*\"]', NULL, '2022-09-20 13:23:05', '2022-09-20 13:23:05'),
(74, 'App\\Models\\RegisteredUser', 15, '01746555579', '6a036606a58cd31bc2e47df70c2a20250a17820435304b1cc534fbea0434fc58', '[\"*\"]', NULL, '2022-09-20 13:26:43', '2022-09-20 13:26:43'),
(75, 'App\\Models\\RegisteredUser', 15, '01746555579', 'fc70f158fc019c529da843dcc15b1b17acfbca3be090fd810f0d973ba6e6ccba', '[\"*\"]', NULL, '2022-09-20 15:25:47', '2022-09-20 15:25:47'),
(76, 'App\\Models\\RegisteredUser', 15, '01746555579', 'f1fefd2f2d2d654313f7493044b9caecd18613d47f727871646bc98736d3a969', '[\"*\"]', NULL, '2022-09-20 15:36:43', '2022-09-20 15:36:43'),
(77, 'App\\Models\\RegisteredUser', 15, '01746555579', '12609942ab6d24aaff1336b558a671028ea5114a948dd4d6f5ea7b12d8d620eb', '[\"*\"]', NULL, '2022-09-20 15:57:34', '2022-09-20 15:57:34'),
(78, 'App\\Models\\RegisteredUser', 15, '01746555579', '89d9949e990d2dcf2c88e293179abe20a66d1a2dd212480788ef8d2b5e8b2258', '[\"*\"]', NULL, '2022-09-20 15:58:16', '2022-09-20 15:58:16'),
(79, 'App\\Models\\RegisteredUser', 15, '01746555579', 'ab32b29230cd18d3fadabc996b01eb9269537b1056439fe15ad79b617e394a79', '[\"*\"]', NULL, '2022-09-20 16:23:18', '2022-09-20 16:23:18'),
(80, 'App\\Models\\RegisteredUser', 15, '01746555579', 'e8bcabbf2e8ee3cc278ffcf96a06603109921f01c5916d9abeadfa3a1925702a', '[\"*\"]', NULL, '2022-09-20 16:45:51', '2022-09-20 16:45:51'),
(81, 'App\\Models\\RegisteredUser', 15, '01746555579', 'b40d55226e3dcbab4452b35d9586711805737b2f6e72128bd049098b7dee0219', '[\"*\"]', NULL, '2022-09-20 16:49:55', '2022-09-20 16:49:55'),
(82, 'App\\Models\\RegisteredUser', 15, '01746555579', '67ea04d53456322e18ee004b870e1b12b89fd1d41687bb83d1da03b82a0be079', '[\"*\"]', NULL, '2022-09-20 16:53:49', '2022-09-20 16:53:49'),
(83, 'App\\Models\\RegisteredUser', 15, '01746555579', 'e3854db9abc41779c54c15115e74160aca18adb65f51712037f58f651adb14a7', '[\"*\"]', NULL, '2022-09-20 17:53:25', '2022-09-20 17:53:25'),
(84, 'App\\Models\\RegisteredUser', 15, '01746555579', '25c2a64a48e4173bbea40355c4df4813d35979eed839e1594db2f93ff3dadd93', '[\"*\"]', NULL, '2022-09-20 18:01:51', '2022-09-20 18:01:51'),
(85, 'App\\Models\\RegisteredUser', 15, '01746555579', '54185c7c2925ce3b7132f17b7dc04f48120006911de0398f24fc2b5175f9a916', '[\"*\"]', NULL, '2022-09-20 18:10:59', '2022-09-20 18:10:59'),
(86, 'App\\Models\\RegisteredUser', 15, '01746555579', '281473d1e2f82c1570ed309b38fa5bc78654102b52331fdd61304371421bffce', '[\"*\"]', NULL, '2022-09-20 19:31:25', '2022-09-20 19:31:25'),
(87, 'App\\Models\\RegisteredUser', 17, '01521492331', '440b22ef72e54b9fff2ec2d55c0a26d3ebcf8191432ce348b04b5f3629238a80', '[\"*\"]', NULL, '2022-09-20 20:33:34', '2022-09-20 20:33:34'),
(88, 'App\\Models\\RegisteredUser', 17, '01521492331', 'beb6bfafb5f8c4380393c84ab1b32bfdcf78fb8a1b89944769f8d0ebc6a39610', '[\"*\"]', NULL, '2022-09-21 02:12:09', '2022-09-21 02:12:09'),
(89, 'App\\Models\\RegisteredUser', 17, '01521492331', '3feac888eedb6a86a899addffed70e699833f20f57073e884ade2d1e793e8d39', '[\"*\"]', NULL, '2022-09-21 02:13:56', '2022-09-21 02:13:56'),
(90, 'App\\Models\\RegisteredUser', 17, '01521492331', '1d20184131896fe6887536fb8a896fca1cc10f9befae4866e1856e4afe2fc03e', '[\"*\"]', NULL, '2022-09-21 02:35:11', '2022-09-21 02:35:11'),
(91, 'App\\Models\\RegisteredUser', 17, '01521492331', 'b7b1b463cdffd0ff675308efbd8fd2dde2c8fe347d382971312a297d0ecc361b', '[\"*\"]', NULL, '2022-09-21 06:36:54', '2022-09-21 06:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `program_courses`
--

CREATE TABLE `program_courses` (
  `id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `tuition` decimal(20,6) DEFAULT NULL,
  `textbooks` int(11) DEFAULT NULL,
  `other_fees` varchar(125) DEFAULT NULL,
  `total` varchar(125) DEFAULT NULL,
  `comment` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_courses`
--

INSERT INTO `program_courses` (`id`, `program_id`, `course_id`, `tuition`, `textbooks`, `other_fees`, `total`, `comment`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 14, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 17:37:08'),
(2, 14, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 17:37:08'),
(3, 14, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 17:37:08'),
(4, 15, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 19:14:19'),
(5, 16, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 19:15:01'),
(6, 17, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 19:15:57'),
(7, 18, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 19:16:35'),
(8, 19, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 19:17:16'),
(9, 20, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 20:08:09'),
(10, 20, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 20:08:09'),
(11, 21, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 20:09:57'),
(12, 22, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-19 20:11:16'),
(13, 23, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-20 06:34:28'),
(14, 24, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-20 06:35:00'),
(15, 25, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-20 06:35:17'),
(16, 28, 21, 50.000000, 58, '43', '151', NULL, NULL, NULL, NULL, '2023-05-20 06:44:48'),
(17, 29, 13, 100.000000, 42, '131', '273', 'fsadfas', NULL, NULL, NULL, '2023-05-20 08:20:00'),
(18, 29, 18, 45.000000, 23, '42', '110', 'faxd', NULL, NULL, NULL, '2023-05-20 08:20:00'),
(19, 30, 13, 100.000000, 100, '131', '273', 'fsadfas', NULL, NULL, NULL, '2023-05-20 08:20:25'),
(20, 30, 18, 45.000000, 45, '42', '110', 'faxd', NULL, NULL, NULL, '2023-05-20 08:20:25'),
(21, 30, 24, 60.000000, 54, '536', '650', '35fg', NULL, NULL, NULL, '2023-05-20 08:42:31'),
(32, 38, 16, 56.000000, 56, '480', '578', 'fsadfas', NULL, NULL, NULL, '2023-05-20 09:28:03'),
(33, 38, 32, 45.000000, 45, '42', '129', 'fadf', NULL, NULL, NULL, '2023-05-20 09:28:03'),
(35, 40, 17, 50.000000, 50, '480', '986', '35', NULL, NULL, NULL, '2023-05-23 14:25:52'),
(37, 42, 17, 50.000000, 70, '35', '155', 'fsadfas', NULL, NULL, NULL, '2023-05-23 14:34:28'),
(38, 44, 17, 5994.000000, 53, '543', '6590', NULL, NULL, NULL, NULL, '2023-05-28 15:14:05'),
(39, 45, 18, 453.000000, 4, '3', '460', NULL, NULL, NULL, NULL, '2023-05-28 15:14:25'),
(40, 46, 34, 50.000000, 5, '6', '61', 'dgdsa', NULL, NULL, NULL, '2023-09-13 16:57:50'),
(42, 48, 33, 90.000000, 90, '70', '250', NULL, NULL, NULL, NULL, '2023-09-20 19:46:29'),
(43, 49, 35, 60.000000, 8, '08', '76', 'Velit ex eos quas e', NULL, NULL, NULL, '2023-09-23 16:04:52'),
(44, 49, 34, 80.000000, 70, '87', '237', 'Mollit excepteur dol', NULL, NULL, NULL, '2023-09-23 16:04:52'),
(45, 50, 35, 40.000000, 40, '56', '130', NULL, NULL, NULL, NULL, '2023-10-30 14:50:43'),
(46, 51, 36, 400.000000, 100, '50', '550', NULL, NULL, NULL, NULL, '2023-10-30 14:52:15'),
(47, 52, 33, 200.000000, 400, '50', '650', NULL, NULL, NULL, NULL, '2023-10-30 16:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `program_dates`
--

CREATE TABLE `program_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_dates`
--

INSERT INTO `program_dates` (`id`, `program_id`, `name`, `date`, `created_at`, `updated_at`) VALUES
(7, 38, 'Autumn Rojas', '1985-08-09', '2023-05-20 10:04:56', '2023-05-20 10:04:56'),
(8, 38, 'falfsfldf', '2023-05-30', '2023-05-20 10:04:56', '2023-05-20 10:04:56'),
(9, 38, 'faxfgas', '2023-05-25', '2023-05-20 10:04:56', '2023-05-20 10:04:56'),
(11, 42, 'Sacha Jackson', '2018-09-12', '2023-05-23 14:34:28', '2023-05-23 14:34:28'),
(12, 40, 'Colton Neal', '2008-08-20', '2023-05-23 18:18:28', '2023-05-23 18:18:28'),
(13, 44, 'Noah Weber', '1977-03-14', '2023-05-28 15:14:05', '2023-05-28 15:14:05'),
(14, 45, 'Hall Page', '1982-07-22', '2023-05-28 15:14:25', '2023-05-28 15:14:25'),
(15, 46, 'Kasimir Farmer', '1989-08-28', '2023-09-13 16:57:50', '2023-09-13 16:57:50'),
(18, 48, 'Camille Foley', '2023-09-25', '2023-09-21 16:20:20', '2023-09-21 16:20:20'),
(19, 49, 'Eric Donaldson', '1991-09-08', '2023-09-23 16:04:52', '2023-09-23 16:04:52'),
(21, 51, 'Evan Richardson', '1971-08-02', '2023-10-30 14:52:15', '2023-10-30 14:52:15'),
(22, 50, 'ev', '2023-10-26', '2023-10-30 16:15:54', '2023-10-30 16:15:54'),
(23, 52, 'Rhona Nixon', '2007-02-23', '2023-10-30 16:17:23', '2023-10-30 16:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `program_fee_categories`
--

CREATE TABLE `program_fee_categories` (
  `id` int(11) NOT NULL,
  `fee_category_id` bigint(20) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `amount` decimal(20,6) DEFAULT NULL,
  `due_date` varchar(125) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_fee_categories`
--

INSERT INTO `program_fee_categories` (`id`, `fee_category_id`, `program_id`, `amount`, `due_date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(17, 1, 30, 450.000000, '2023-05-17', NULL, NULL, NULL, '2023-05-20 08:20:25'),
(18, 4, 30, 435.000000, '2023-05-17', NULL, NULL, NULL, '2023-05-20 08:20:25'),
(19, 3, 30, 535.000000, '2023-05-24', NULL, NULL, NULL, '2023-05-20 08:40:03'),
(27, 4, 38, 80.000000, '2006-01-03', NULL, NULL, NULL, '2023-05-20 09:28:03'),
(28, 2, 38, 90.000000, '2001-12-18', NULL, NULL, NULL, '2023-05-20 09:28:03'),
(29, 3, 40, 70.000000, '1973-11-29', NULL, NULL, NULL, '2023-05-23 14:25:52'),
(30, 4, 42, 700.000000, '2005-03-19', NULL, NULL, NULL, '2023-05-23 14:34:28'),
(31, 3, 44, 543.000000, '2003-08-27', NULL, NULL, NULL, '2023-05-28 15:14:05'),
(32, 1, 45, 44.000000, '2019-11-08', NULL, NULL, NULL, '2023-05-28 15:14:25'),
(33, 1, 46, 50.000000, '1975-01-26', NULL, NULL, NULL, '2023-09-13 16:57:50'),
(34, 4, 48, 20.000000, '2023-09-05', NULL, NULL, NULL, '2023-09-20 19:46:29'),
(35, 4, 49, 0.000000, '1998-04-04', NULL, NULL, NULL, '2023-09-23 16:04:52'),
(36, 1, 50, 0.000000, '2023-10-18', NULL, NULL, NULL, '2023-10-30 14:50:43'),
(37, 4, 51, 100.000000, '1996-04-13', NULL, NULL, NULL, '2023-10-30 14:52:15'),
(38, 6, 52, 0.000000, '1981-06-19', NULL, NULL, NULL, '2023-10-30 16:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `program_grade_years`
--

CREATE TABLE `program_grade_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_grade_years`
--

INSERT INTO `program_grade_years` (`id`, `program_id`, `year_id`, `created_at`, `updated_at`) VALUES
(5, 14, 10, NULL, NULL),
(6, 10, 11, NULL, NULL),
(7, 12, 12, NULL, NULL),
(8, 13, 10, NULL, NULL),
(9, 10, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_lengths`
--

CREATE TABLE `program_lengths` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program_lengths`
--

INSERT INTO `program_lengths` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Years', 1, NULL, NULL, NULL, '2023-04-08 09:36:04'),
(2, 'Months', 1, NULL, NULL, NULL, '2023-04-08 09:36:04'),
(3, 'Weeks', 1, NULL, NULL, NULL, '2023-04-08 09:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `project_no` varchar(125) NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL,
  `location` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `school_id`, `project_no`, `name`, `status`, `location`, `created_at`, `updated_at`) VALUES
(14, 1, 'Tempora id eum reici', 'Branden Albert34', 'Behind Schedule', 'Reprehenderit deleni', '2023-06-06 16:14:03', '2023-06-06 17:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_budgets`
--

CREATE TABLE `project_budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `description` text NOT NULL,
  `amount_before_tax` decimal(20,2) NOT NULL,
  `tax_amount` decimal(15,2) NOT NULL,
  `amount_after_tax` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_budgets`
--

INSERT INTO `project_budgets` (`id`, `project_id`, `type`, `description`, `amount_before_tax`, `tax_amount`, `amount_after_tax`, `created_at`, `updated_at`) VALUES
(8, 14, 'addition', 'Quasi perspiciatis', 400.00, 200.00, 600.00, '2023-06-06 17:44:33', '2023-06-06 17:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_durations`
--

CREATE TABLE `project_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `comment` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_durations`
--

INSERT INTO `project_durations` (`id`, `project_id`, `description`, `start_date`, `end_date`, `comment`, `created_at`, `updated_at`) VALUES
(15, 14, 'Quisquam voluptate e', '2023-03-18 02:45:00', '1988-07-24 15:55:00', 'Voluptas accusamus l', '2023-06-06 17:44:33', '2023-06-06 17:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_payments`
--

CREATE TABLE `project_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `payment_no` varchar(125) NOT NULL,
  `due_date` datetime NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `balance` decimal(8,2) NOT NULL,
  `status` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_payments`
--

INSERT INTO `project_payments` (`id`, `project_id`, `payment_no`, `due_date`, `amount`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(2, 14, 'Veniam commodo laud', '1979-07-08 18:40:00', 300.00, 200.00, 'Exercitationem eos a', '2023-06-06 17:44:33', '2023-06-06 17:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_timelines`
--

CREATE TABLE `project_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(125) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` varchar(125) NOT NULL,
  `comment` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_timelines`
--

INSERT INTO `project_timelines` (`id`, `project_id`, `task_name`, `start_date`, `end_date`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(6, 14, 'Rowan May', '2023-06-12 02:58:00', '1973-08-01 15:39:00', 'Porro culpa enim ita', 'Vel eius ut exercita', '2023-06-06 17:44:33', '2023-06-06 17:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `asked_by` bigint(20) UNSIGNED NOT NULL,
  `asked_to` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(125) NOT NULL,
  `description` longtext,
  `status` varchar(125) NOT NULL DEFAULT 'not answered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `school_id`, `asked_by`, `asked_to`, `date`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 26, '2023-05-18 17:07:21', 'Minus ratione velit3', 'Totam qui voluptatem', 'not answered', '2023-05-17 17:39:05', '2023-05-18 11:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `issue_date` datetime DEFAULT NULL,
  `expiry_date` datetime NOT NULL,
  `type` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `campus_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `back_ordered` tinyint(4) DEFAULT NULL,
  `scheduled_delivery_date` datetime DEFAULT NULL,
  `delivery_location` varchar(50) DEFAULT NULL,
  `delivery_instruction` text,
  `payment_due_date` datetime DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `is_check_acceptable` tinyint(4) DEFAULT NULL,
  `late_payment_penalty` decimal(20,6) DEFAULT '0.000000',
  `hidden_cost` decimal(20,6) DEFAULT '0.000000',
  `shipping_cost_paid_by` varchar(50) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `staff_note` text,
  `offer_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `unique_id`, `school_id`, `date`, `issue_date`, `expiry_date`, `type`, `status`, `created_by`, `amount`, `description`, `created_at`, `updated_at`, `user_id`, `code`, `comment`, `item_type`, `campus_id`, `project_id`, `back_ordered`, `scheduled_delivery_date`, `delivery_location`, `delivery_instruction`, `payment_due_date`, `payment_method`, `is_check_acceptable`, `late_payment_penalty`, `hidden_cost`, `shipping_cost_paid_by`, `order_id`, `staff_note`, `offer_id`) VALUES
(1, 'feb88564-d033-4c30-b564-c37ab3f7b201', 1, '2023-11-04 22:52:57', NULL, '2023-11-14 22:53:00', 'purchase', 'accepted', 179, 89.00, 'fsfdsa', '2023-11-04 16:54:18', '2023-11-04 18:04:45', 179, 'PQ-2023-000015', NULL, 'services', NULL, NULL, 0, NULL, NULL, '5456', '2023-11-09 22:53:00', 'bank-transfer', 0, 50.000000, 75.000000, 'customer', 18, 'fasdf', 1),
(2, '412d172e-03a1-4a36-b6fc-280b046a81e8', 1, '2023-11-10 22:38:46', NULL, '2023-11-15 22:41:00', 'purchase', 'accepted', 2, 102.00, 'fsafsdaf', '2023-11-10 16:41:30', '2023-11-10 16:46:29', 179, 'PQ-2023-000016', NULL, 'goods', NULL, NULL, 0, NULL, NULL, 'fsdfsf', '2023-11-16 22:39:00', 'email-transfer', 0, 50.000000, 57.000000, 'customer', 20, 'fsafdsa', 2),
(4, 'bdd0d8c2-ae30-48e5-9e08-16f6c227600e', 1, '2023-11-11 19:47:54', NULL, '2023-11-16 19:49:00', 'purchase', 'accepted', 2, 202.77, NULL, '2023-11-11 13:50:23', '2023-11-11 14:11:50', 179, 'PQ-2023-000017', NULL, 'goods', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-23 19:50:00', 'personal-check', NULL, 10.000000, 50.000000, 'seller', NULL, NULL, 2),
(5, '8e1c4cd9-6243-4935-bf1e-236747d3610b', 1, '2023-11-11 20:20:35', NULL, '2023-11-09 20:21:00', 'purchase', 'accepted', 2, 104.00, 'fsadfsafsadf', '2023-11-11 14:21:30', '2023-11-11 14:22:48', 179, 'PQ-2023-000018', NULL, 'goods', NULL, NULL, 0, NULL, NULL, 'fsdafdsf', '2023-11-14 20:21:00', 'online-bank', 0, 50.000000, 40.000000, 'seller', 21, 'fsdfsa', 2),
(7, 'bff75ccd-06f7-4cdd-8371-be1b4c1aa097', 1, '2023-11-11 22:09:23', NULL, '2023-11-12 22:09:00', 'purchase', 'accepted', 2, 27542.50, NULL, '2023-11-11 16:10:52', '2023-11-11 16:11:58', 179, 'PQ-2023-000020', NULL, 'goods', NULL, NULL, 0, NULL, NULL, 'fsdfsafd', '2023-11-14 22:10:00', 'email-transfer', 1, 50.000000, 60.000000, 'customer', 22, NULL, 3),
(10, '18ae70a8-f8e9-45b2-9122-a2a9f91c3f5a', 1, '2023-11-12 22:29:57', NULL, '1998-11-21 08:33:00', 'purchase', 'pending', 2, 2640.75, 'Cupidatat consequatu', '2023-11-12 16:30:45', '2023-11-12 16:30:45', 178, 'PQ-2023-000021', NULL, 'goods', NULL, NULL, 1, NULL, NULL, 'Quaerat dolore qui d', '1975-08-25 22:09:00', 'debit-card', 0, 100.000000, 150.000000, 'customer', NULL, 'Mollitia laborum nis', 5),
(11, '07585c92-491d-4955-8f41-b1ff5d9e9cbb', 1, '2023-11-13 00:08:29', NULL, '1992-10-05 11:04:00', 'purchase', 'pending', 2, 2456.50, 'Aliquip non corporis', '2023-11-12 18:09:21', '2023-11-12 18:10:03', 178, 'PQ-2023-000022', NULL, 'goods', NULL, NULL, 1, NULL, NULL, 'Tenetur tempor eum l', '2012-09-25 20:12:00', 'bank-transfer', 0, 300.000000, 500.000000, 'seller', NULL, 'Commodo quia qui ill', 5),
(12, 'a354dcc2-6c24-43d1-a75c-e7203c3e85e4', 1, '2023-11-13 00:17:45', NULL, '1983-03-06 09:14:00', 'purchase', 'pending', 2, 2397.20, 'fsadfsa', '2023-11-12 18:18:27', '2023-11-12 18:26:16', 178, 'PQ-2023-000023', NULL, 'goods', NULL, NULL, 1, NULL, 'fsfdsa', 'fsfsdaf', '2023-12-22 08:22:00', 'certified-check', 1, 43.000000, 45.000000, 'customer', NULL, 'fasfds', 5);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_discounts`
--

CREATE TABLE `quotation_discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(125) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_taxable` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotation_discounts`
--

INSERT INTO `quotation_discounts` (`id`, `quotation_id`, `title`, `amount`, `created_at`, `updated_at`, `is_taxable`) VALUES
(1, 1, 'fsdafsd', 5.00, '2023-11-04 16:54:18', '2023-11-04 16:54:18', NULL),
(2, 2, 'fdsfdsf', 5.00, '2023-11-10 16:41:30', '2023-11-10 16:41:30', NULL),
(4, 4, 'ta', 5.00, '2023-11-11 13:57:48', '2023-11-11 13:57:48', NULL),
(5, 5, 'fdsfsfd', 5.00, '2023-11-11 14:21:30', '2023-11-11 14:21:30', NULL),
(6, 6, '1-5', 5.00, '2023-11-11 16:03:41', '2023-11-11 16:03:41', NULL),
(7, 7, 'dd', 5.00, '2023-11-11 16:10:52', '2023-11-11 16:10:52', NULL),
(8, 10, 'fdsaxgdas', 5.00, '2023-11-12 16:30:45', '2023-11-12 16:30:45', NULL),
(10, 11, 'fasfs', 50.00, '2023-11-12 18:10:03', '2023-11-12 18:10:03', NULL),
(13, 12, 'Ut necessitatibus vo', 5.00, '2023-11-12 18:26:16', '2023-11-12 18:26:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_code` varchar(125) DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `description` text,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quotation_id` bigint(20) DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `addition` decimal(20,2) DEFAULT NULL,
  `deduction` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `tax_percent` decimal(5,2) DEFAULT NULL,
  `tax` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `taxable_addition` decimal(20,2) DEFAULT NULL,
  `taxable_deduction` decimal(20,2) DEFAULT NULL,
  `taxable_subtotal` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`id`, `item_code`, `item_id`, `quantity`, `cost`, `description`, `account_id`, `created_at`, `updated_at`, `quotation_id`, `project_id`, `addition`, `deduction`, `sub_total`, `tax_percent`, `tax`, `total`, `taxable_addition`, `taxable_deduction`, `taxable_subtotal`) VALUES
(1, 'Eaque aut nostrum di', 6, 1.00, 87.00, NULL, NULL, '2023-11-04 16:54:18', '2023-11-04 16:54:18', 1, NULL, 56.00, 54.00, 89.00, NULL, NULL, 89.00, NULL, NULL, NULL),
(2, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-11-10 16:41:30', '2023-11-10 16:41:30', 2, NULL, 50.00, 54.00, 76.00, NULL, NULL, 76.00, NULL, NULL, NULL),
(3, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-11-10 16:41:30', '2023-11-10 16:41:30', 2, NULL, 40.00, 32.00, 26.00, NULL, NULL, 26.00, NULL, NULL, NULL),
(9, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-11-11 13:57:48', '2023-11-11 13:57:48', 4, NULL, 100.00, 10.00, 170.00, NULL, 8.50, 184.45, NULL, NULL, NULL),
(10, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-11-11 13:57:48', '2023-11-11 13:57:48', 4, NULL, 5.00, 5.00, 18.00, NULL, 1.80, 18.32, NULL, NULL, NULL),
(11, 'Ratione quibusdam ac', 3, 1.00, 80.00, NULL, NULL, '2023-11-11 14:21:30', '2023-11-11 14:21:30', 5, NULL, 4.00, 1.00, 83.00, NULL, 0.00, 83.00, NULL, NULL, NULL),
(12, 'In vel nostrud repud', 5, 1.00, 18.00, NULL, NULL, '2023-11-11 14:21:30', '2023-11-11 14:21:30', 5, NULL, 5.00, 2.00, 21.00, NULL, 0.00, 21.00, NULL, NULL, NULL),
(13, 'Ullam placeat dolor', 2, 100.00, 59.00, NULL, NULL, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 6, NULL, 250.00, 100.00, 6050.00, 5.00, 302.50, 24351.25, NULL, NULL, NULL),
(14, 'In vel nostrud repud', 5, 150.00, 18.00, NULL, NULL, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 6, NULL, 400.00, 50.00, 3050.00, 5.00, 152.50, 7701.25, NULL, NULL, NULL),
(15, 'Eaque aut nostrum di', 6, 200.00, 87.00, NULL, NULL, '2023-11-11 16:03:41', '2023-11-11 16:03:41', 6, NULL, 650.00, 150.00, 17900.00, 5.00, 895.00, 178105.00, NULL, NULL, NULL),
(16, 'Ullam placeat dolor', 2, 100.00, 59.00, NULL, NULL, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 7, NULL, 100.00, 150.00, 5850.00, 5.00, 292.50, 6142.50, NULL, NULL, NULL),
(17, 'In vel nostrud repud', 5, 150.00, 18.00, NULL, NULL, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 7, NULL, 150.00, 100.00, 2750.00, 10.00, 275.00, 3025.00, NULL, NULL, NULL),
(18, 'Eaque aut nostrum di', 6, 200.00, 87.00, NULL, NULL, '2023-11-11 16:10:52', '2023-11-11 16:10:52', 7, NULL, 250.00, 150.00, 17500.00, 5.00, 875.00, 18375.00, NULL, NULL, NULL),
(19, 'Ullam placeat dolor', 2, 10.00, 59.00, NULL, NULL, '2023-11-12 16:30:45', '2023-11-12 16:30:45', 10, NULL, 10.00, 20.00, 580.00, 10.00, 57.00, 637.00, NULL, NULL, 580.00),
(20, 'Eaque aut nostrum di', 6, 20.00, 87.00, NULL, NULL, '2023-11-12 16:30:45', '2023-11-12 16:30:45', 10, NULL, 20.00, 15.00, 1745.00, 15.00, 258.75, 2003.75, NULL, NULL, 1745.00),
(23, 'Ullam placeat dolor', 2, 10.00, 59.00, NULL, NULL, '2023-11-12 18:10:03', '2023-11-12 18:10:03', 11, NULL, 50.00, 42.00, 598.00, 10.00, 64.00, 662.00, NULL, 0.00, 598.00),
(24, 'Eaque aut nostrum di', 6, 20.00, 87.00, NULL, NULL, '2023-11-12 18:10:03', '2023-11-12 18:10:03', 11, NULL, 10.00, 43.00, 1707.00, 5.00, 87.50, 1794.50, NULL, 0.00, 1707.00),
(29, 'Ullam placeat dolor', 2, 10.00, 59.00, NULL, NULL, '2023-11-12 18:26:16', '2023-11-12 18:26:16', 12, NULL, 15.00, 53.00, 552.00, 10.00, 55.20, 607.20, 15.00, 53.00, 552.00),
(30, 'Eaque aut nostrum di', 6, 20.00, 87.00, NULL, NULL, '2023-11-12 18:26:16', '2023-11-12 18:26:16', 12, NULL, 20.00, 50.00, 1710.00, 5.00, 85.50, 1795.50, 20.00, 50.00, 1710.00);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `unique_no` varchar(125) NOT NULL,
  `receipt_no` varchar(125) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(125) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `received_from_id` varchar(125) DEFAULT NULL,
  `payment_method` varchar(125) DEFAULT NULL,
  `deposit_to_id` varchar(125) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receive_items`
--

CREATE TABLE `receive_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_item_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `received_by` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receive_items`
--

INSERT INTO `receive_items` (`id`, `transaction_item_id`, `item_id`, `transaction_id`, `date`, `received_by`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 95, 3, 77, '2023-08-17 20:24:00', 18, 1, '2023-08-31 14:35:24', '2023-08-31 14:35:24'),
(2, 96, 5, 77, '2023-08-17 20:24:00', 18, 1, '2023-08-31 14:35:24', '2023-08-31 14:35:24'),
(3, 95, 3, 77, '2023-09-22 23:58:00', 94, 1, '2023-09-01 17:58:21', '2023-09-01 17:58:21'),
(4, 96, 5, 77, '2023-09-22 23:58:00', 94, 1, '2023-09-01 17:58:21', '2023-09-01 17:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `receiving_logs`
--

CREATE TABLE `receiving_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `receiving_no` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `items` text NOT NULL,
  `sender_name` varchar(125) NOT NULL,
  `sender_phone` varchar(125) NOT NULL,
  `sender_address` varchar(125) NOT NULL,
  `courier_company` varchar(125) NOT NULL,
  `confirmation_no` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receiving_logs`
--

INSERT INTO `receiving_logs` (`id`, `school_id`, `receiving_no`, `date`, `items`, `sender_name`, `sender_phone`, `sender_address`, `courier_company`, `confirmation_no`, `created_at`, `updated_at`) VALUES
(1, 2, 'Eveniet vitae dolor4', '2014-03-09 20:29:00', 'Debitis quia eaque d', 'Regina Holcomb', '+1 (244) 553-5177', 'Impedit ut est odio', 'Gaines Valencia Inc', 'Gaines Valencia Inc', '2023-08-15 18:16:44', '2023-08-16 16:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `reference_counts`
--

CREATE TABLE `reference_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reference_counts`
--

INSERT INTO `reference_counts` (`id`, `school_id`, `type`, `count`, `created_at`, `updated_at`) VALUES
(1, 1, 'transaction', 235, NULL, '2023-08-28 16:25:26'),
(2, 1, 'offer', 182, NULL, '2023-11-12 08:01:29'),
(6, 1, 'invoice', 13, '2023-08-26 15:25:44', '2023-11-04 18:12:48'),
(7, 1, 'order', 16, '2023-08-27 13:52:57', '2023-11-11 16:11:58'),
(8, 1, 'return', 13, '2023-08-29 17:10:10', '2023-11-11 16:38:58'),
(15, 1, 'credit_note', 8, '2023-08-30 14:35:16', '2023-09-11 17:20:14'),
(16, 1, 'debit_note', 10, '2023-09-01 17:22:36', '2023-11-11 16:48:31'),
(20, 1, 'payment', 8, '2023-09-01 17:52:58', '2023-10-27 18:58:56'),
(24, 1, 'quotation', 23, '2023-09-08 20:33:33', '2023-11-12 18:18:27'),
(27, 1, 'student-charge', 6, '2023-10-25 15:45:01', '2023-10-30 16:30:14'),
(28, 1, 'purchase', 1, '2023-11-11 18:08:15', '2023-11-11 18:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(125) NOT NULL,
  `last_name` varchar(125) DEFAULT NULL,
  `mobile` varchar(125) DEFAULT NULL,
  `password` varchar(125) NOT NULL,
  `email` varchar(125) DEFAULT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'Y',
  `create_by` varchar(125) DEFAULT NULL,
  `update_by` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `first_name`, `last_name`, `mobile`, `password`, `email`, `active`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'MD', 'Faysal', '01928645981', '$2y$10$bLNUzW/66VQ4f5eoki4DFe/.Z3fQPOGj/FySkuL24FRY6aTQ8u9Fi', '', 'Y', 'system', NULL, '2022-06-02 11:07:53', '2022-06-02 11:08:30'),
(2, '01755566441', '01755566441', '01755566441', '$2y$10$rh8Yj0dWcv.nDoCuekjybuc/F1tedsrLV5PNzgvNf02K/4jc9xehu', '', 'N', 'system', NULL, '2022-06-02 16:48:55', '2022-06-02 16:51:28'),
(3, 'fgh', 'fh', '01952887322', '$2y$10$cja..81nIQdRUQjv/PSNWuwdjnHbGV6rWNy9o.SBAo7vZM52B/B/q', '', 'Y', 'system', NULL, '2022-06-02 20:26:04', '2022-06-02 20:40:17'),
(5, 'text', 'text', 'text', '$2y$10$.qx.AbbHZItMPols6pHMoO.nwWaQH2kQGmPOYEt/guVoqCNi/jsjO', '', 'N', 'system', NULL, '2022-06-03 16:38:23', '2022-06-03 16:38:23'),
(6, 'test', 'test', '1928645981', '$2y$10$eDZEi.pU8ScEJlxQgXDeIOJlTDuWJw.3Qfun0bX.182nWdgd3waa2', '', 'Y', 'system', NULL, '2022-06-03 17:47:39', '2022-06-03 17:48:16'),
(7, 'Kumar', 'saha', '01999075616', '$2y$10$WfV8o0lfrY3RBH95E8gQ9OSXqgt3rhsWPi0obpl7pWEhu7IUWgHMm', '', 'Y', 'system', NULL, '2022-06-03 18:20:10', '2022-06-03 18:20:40'),
(8, 'minhaz', 'abedin', '1946728099', '$2y$10$aWRJDjnta5PRSh9v3qD3ZObZqHbS5DlMfJvNE8/G7RoNpq81cA5Vu', '', 'Y', 'system', NULL, '2022-06-04 08:48:18', '2022-06-04 08:48:50'),
(9, 'minhazul abadin', 'riaz', '1758083343', '$2y$10$dusjhbev8nWzRHmrzf8g4OIgy2nzqA3fG0QdeKb3ycmvMDuuJuBb2', '', 'N', 'system', NULL, '2022-06-04 08:54:12', '2022-06-04 08:56:52'),
(10, 'rifat', 'ahmed', '1755534991', '$2y$10$/f6Hknhc1KjFpGC5caUUkOZte1sAdy933p53Zw.BOaqB/6pdT6vzu', '', 'Y', 'system', NULL, '2022-06-05 04:32:10', '2022-06-05 04:32:44'),
(11, 'Nafis', 'Arnob', '01324732755', '$2y$10$.k/shjJt3KbSRTuTdFyfOuOL9LogjPMRiBlQ/drecQkzYqyPhp4Am', '', 'N', 'system', NULL, '2022-06-22 05:57:35', '2022-06-22 05:57:35'),
(12, 'KMS', 'Zamil', '01713053336', '$2y$10$OkxnirYTW2/OK6tdHZAklONBntycqmfY8sPzBqC2lFf7uglbZIdte', '', 'Y', 'system', NULL, '2022-06-23 03:47:35', '2022-06-23 04:07:15'),
(15, 'Ripon', 'Soroar', '01746555579', '$2y$10$V3VgfuALh4sAy6nRX4Z0LOXonz94fmvd6YzzjRSp2PblyFW4VR1yW', 'gsoroar@gmail.com', 'Y', 'system', NULL, '2022-08-28 17:59:19', '2022-08-28 17:59:57'),
(16, 'Shihab Uddin', NULL, '01871429133', '$2y$10$WdFsXH0laAB3tKPwZFzAb.U32VmK10PVuUd9a7TfaycRmimB4AFvy', 'tomd@gmail.com', 'Y', 'system', NULL, '2022-09-04 18:45:50', '2022-09-21 11:06:54'),
(17, 'Test', NULL, '01521492331', '$2y$10$bm1VVRTw75FilAnQj0yZB.Mqco6HVeD/9KAAhsmPoZPGryLo.nNgG', 'test@gmail.com', 'Y', 'system', NULL, '2022-09-20 20:30:54', '2022-09-20 20:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `reopening_in_education_team`
--

CREATE TABLE `reopening_in_education_team` (
  `id` int(11) NOT NULL,
  `reopening_position` int(11) DEFAULT NULL,
  `reopening_user_id` int(11) DEFAULT NULL,
  `reopening_email` varchar(125) DEFAULT NULL,
  `reopening_message` text,
  `reopening_date` timestamp NULL DEFAULT NULL,
  `reopening_reason` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reopening_in_education_team`
--

INSERT INTO `reopening_in_education_team` (`id`, `reopening_position`, `reopening_user_id`, `reopening_email`, `reopening_message`, `reopening_date`, `reopening_reason`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-30 22:47:38', '2023-05-30 16:47:38'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-05-30 23:13:45', '2023-05-30 17:13:45'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-05-30 23:14:14', '2023-05-30 17:14:14'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-10-12 21:30:49', '2023-10-12 15:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `guard_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `school_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `status`, `school_id`) VALUES
(1, 'admin', 'web', '2023-07-18 17:36:09', '2023-07-18 17:36:09', 1, NULL),
(5, 'admin#26', 'web', '2023-07-20 16:29:42', '2023-07-20 16:29:42', 1, 26),
(6, 'Student5#1', 'web', '2023-07-20 16:42:59', '2023-07-20 16:52:26', 1, 1),
(7, 'SuperAdmin', 'web', '2023-07-20 17:11:46', '2023-07-20 17:11:46', 1, NULL),
(8, 'admin#27', 'web', '2023-07-20 17:17:51', '2023-07-20 17:17:51', 1, 27),
(9, 'Teacher#1', 'web', '2023-07-22 14:35:56', '2023-07-22 14:35:56', 1, 1),
(10, 'Parent#1', 'web', '2023-07-22 14:36:06', '2023-07-22 14:36:06', 1, 1),
(11, 'Stuff#1', 'web', '2023-07-22 14:36:15', '2023-07-22 14:36:15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 6),
(16, 6),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(7, 8),
(8, 8),
(9, 8),
(10, 8),
(11, 8),
(12, 8),
(13, 8),
(14, 8),
(17, 8),
(18, 9),
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(125) NOT NULL DEFAULT 'active',
  `quantity` int(11) DEFAULT NULL,
  `location` varchar(125) DEFAULT NULL,
  `department_id` varchar(125) DEFAULT NULL,
  `room_no` varchar(125) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `campus_id` bigint(20) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `temperature` decimal(10,2) DEFAULT NULL,
  `reading_meters` varchar(50) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `cost_center` varchar(50) DEFAULT NULL,
  `schedule_inspection_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `type_id`, `sub_type_id`, `status`, `quantity`, `location`, `department_id`, `room_no`, `name`, `created_at`, `updated_at`, `campus_id`, `capacity`, `temperature`, `reading_meters`, `account`, `cost_center`, `schedule_inspection_date`) VALUES
(3, 2, NULL, 'active', NULL, 'fafsdf', '5', '43f', NULL, '2023-04-01 18:29:32', '2023-04-06 19:34:48', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, NULL, 'active', NULL, 'Molestias eos dolor', '6', '955', NULL, '2023-04-06 17:44:43', '2023-04-06 17:44:43', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 4, 'active', NULL, 'fafsdf', '4', '43', 'gasgsag', '2023-08-03 18:08:02', '2023-08-03 18:08:02', 2, 54, 5465.00, NULL, NULL, NULL, NULL),
(9, 3, 4, 'active', NULL, 'Aut optio et delect', '3', '343', 'Jane Padilla', '2023-08-15 13:42:12', '2023-08-15 13:42:12', 2, 467, 70.00, NULL, NULL, NULL, NULL),
(13, 1, NULL, 'active', NULL, 'Neque sit eius optio', NULL, '71', 'Colby Bolton', '2023-08-15 13:50:03', '2023-08-15 13:50:03', NULL, 684, 90.00, NULL, NULL, NULL, NULL),
(14, 1, NULL, 'active', NULL, 'Neque sit eius optio', NULL, '71', 'Colby Bolton', '2023-08-15 14:00:57', '2023-08-15 14:00:57', NULL, 684, 90.00, NULL, NULL, NULL, NULL),
(15, 3, NULL, 'active', NULL, 'Optio tempore culp', NULL, '957', 'Lee Heath', '2023-08-15 14:16:33', '2023-08-15 14:16:33', NULL, 369, 70.00, NULL, NULL, NULL, NULL),
(17, 2, NULL, 'active', NULL, 'Inventore aliquid ir', NULL, '148', 'Garrett Cain', '2023-08-15 14:27:06', '2023-08-15 14:27:06', NULL, 809, 90.00, 'Deserunt iusto fuga', 'Corrupti in quidem', 'Et dolore veniam ex', '1996-01-18 22:24:00'),
(18, 1, NULL, 'active', NULL, 'Nesciunt similique', '14', '48', 'Wynter Pennington', '2023-10-12 18:01:30', '2023-10-12 18:01:30', 3, 131, 30.00, 'Porro eveniet iusto', 'Sed qui et similique', 'Quis fugit qui aliq', '1994-02-24 03:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `room_assets`
--

CREATE TABLE `room_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `asset_id` bigint(20) DEFAULT NULL,
  `location` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_assets`
--

INSERT INTO `room_assets` (`id`, `room_id`, `asset_id`, `location`, `created_at`, `updated_at`, `type`) VALUES
(3, 9, NULL, 'Est velit earum tene', '2023-08-15 13:42:12', '2023-08-15 13:42:12', NULL),
(4, 9, NULL, 'Asperiores maiores q', '2023-08-15 13:42:12', '2023-08-15 13:42:12', NULL),
(5, 13, 33, 'Pariatur Tenetur do', '2023-08-15 13:50:03', '2023-08-15 13:50:03', NULL),
(6, 13, 34, 'Ab tenetur velit en', '2023-08-15 13:50:03', '2023-08-15 13:50:03', NULL),
(7, 14, 33, 'Pariatur Tenetur do', '2023-08-15 14:00:57', '2023-08-15 14:00:57', NULL),
(8, 14, 34, 'Ab tenetur velit en', '2023-08-15 14:00:57', '2023-08-15 14:00:57', NULL),
(13, 17, 33, 'Aliquip quod nulla e', '2023-08-15 14:27:06', '2023-08-15 14:27:06', 'asset'),
(14, 17, 34, 'Dolore nostrum volup', '2023-08-15 14:27:06', '2023-08-15 14:27:06', 'asset'),
(15, 17, 33, 'Aliquip quod nulla e', '2023-08-15 14:27:06', '2023-08-15 14:27:06', 'device'),
(16, 17, 34, 'Dolore nostrum volup', '2023-08-15 14:27:06', '2023-08-15 14:27:06', 'device'),
(17, 18, 34, 'fdsagas', '2023-10-12 18:01:30', '2023-10-12 18:01:30', 'asset'),
(18, 18, 38, 'gsadgsa', '2023-10-12 18:01:30', '2023-10-12 18:01:30', 'asset'),
(19, 18, 34, 'fdsagas', '2023-10-12 18:01:30', '2023-10-12 18:01:30', 'device'),
(20, 18, 38, 'gsadgsa', '2023-10-12 18:01:30', '2023-10-12 18:01:30', 'device');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `school_id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'room typ1', NULL, '2023-04-01 18:00:08', '2023-04-01 18:00:08'),
(2, 1, 'room typ1', NULL, '2023-04-01 18:00:20', '2023-04-01 18:00:20'),
(3, 1, 'Administrative', NULL, '2023-08-03 17:31:56', '2023-08-03 17:31:56'),
(4, 1, 'Admission', 3, '2023-08-03 17:32:21', '2023-08-03 17:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `safety_securities`
--

CREATE TABLE `safety_securities` (
  `id` int(11) NOT NULL,
  `safety_item` varchar(125) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `serial_number` varchar(125) DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `renew_date` timestamp NULL DEFAULT NULL,
  `inspection_cycle` timestamp NULL DEFAULT NULL,
  `inspection_due_on` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `safety_security_item`
--

CREATE TABLE `safety_security_item` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `safety_security_item`
--

INSERT INTO `safety_security_item` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Fire Extinguisher', 1, NULL, NULL, NULL, '2023-01-28 18:15:15'),
(2, 'Sprinkler Head', 1, NULL, NULL, NULL, '2023-01-28 18:15:15'),
(3, 'Smoke Detector', 1, NULL, NULL, NULL, '2023-01-28 18:15:55'),
(4, 'Sprinkler', 1, NULL, NULL, NULL, '2023-01-28 18:15:55'),
(5, 'Fire alarm', 1, NULL, NULL, NULL, '2023-01-28 18:16:19'),
(6, 'Emergency bell ring', 1, NULL, NULL, NULL, '2023-01-28 18:16:19'),
(7, 'Emergency Lights', 1, NULL, NULL, NULL, '2023-01-28 18:16:42'),
(8, 'First Aid', 1, NULL, NULL, NULL, '2023-01-28 18:16:42'),
(9, 'Emergency phone', 1, NULL, NULL, NULL, '2023-01-28 18:17:16'),
(10, 'Security Camera', 1, NULL, NULL, NULL, '2023-01-28 18:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_no` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(125) NOT NULL,
  `schedule_type_id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(125) NOT NULL,
  `prepared_by` bigint(20) UNSIGNED NOT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `school_id`, `schedule_no`, `date`, `title`, `schedule_type_id`, `location`, `prepared_by`, `approved_by`, `created_at`, `updated_at`, `comment`) VALUES
(2, 1, 'Consequatur aliqua', '2014-05-10 08:00:00', 'Dolore voluptatem om', 1, 'Et aliquip consequat', 72, NULL, '2023-08-14 17:45:50', '2023-08-15 08:49:49', 'Non praesentium cill4');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_participants`
--

CREATE TABLE `schedule_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `type` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_participants`
--

INSERT INTO `schedule_participants` (`id`, `schedule_id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(3, 2, 'TaShya Herman5', 'Voluptate dolore vel', '2023-08-15 08:49:49', '2023-08-15 08:49:49'),
(4, 2, 'Tucker Maynard', 'Sunt consequat In4', '2023-08-15 08:49:49', '2023-08-15 08:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_recurrences`
--

CREATE TABLE `schedule_recurrences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pattern` varchar(125) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `comment` varchar(125) DEFAULT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_recurrences`
--

INSERT INTO `schedule_recurrences` (`id`, `pattern`, `start_date`, `end_date`, `comment`, `schedule_id`, `created_at`, `updated_at`) VALUES
(5, 'Weekly', '1999-09-11 05:44:00', '1990-07-02 22:23:00', 'Ullam voluptas modi', 2, '2023-08-15 08:49:49', '2023-08-15 08:49:49'),
(6, 'Daily', '1972-08-21 14:51:00', '1989-11-21 06:51:00', 'Ducimus alias vero', 2, '2023-08-15 08:49:49', '2023-08-15 08:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_types`
--

CREATE TABLE `schedule_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule_types`
--

INSERT INTO `schedule_types` (`id`, `school_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quinn Casey2', 1, '2023-08-14 16:25:40', '2023-08-14 16:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `school_code` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `welcome` text,
  `about` text,
  `services` text,
  `rules` text,
  `policies` text,
  `procedures` text,
  `code_of_conduct` text,
  `rights_and_responsibilities` text,
  `reg_step` int(11) NOT NULL DEFAULT '1',
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `authorized_by` bigint(20) DEFAULT NULL,
  `reg_status` varchar(50) DEFAULT NULL,
  `agreed_service_contract` tinyint(4) DEFAULT NULL,
  `aggreed_user_aggreement` tinyint(4) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `time_format` varchar(50) DEFAULT NULL,
  `date_format` varchar(50) DEFAULT NULL,
  `time_zone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `school_code`, `email`, `phone`, `website`, `address_id`, `welcome`, `about`, `services`, `rules`, `policies`, `procedures`, `code_of_conduct`, `rights_and_responsibilities`, `reg_step`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `authorized_by`, `reg_status`, `agreed_service_contract`, `aggreed_user_aggreement`, `company_id`, `time_format`, `date_format`, `time_zone`) VALUES
(1, 'The york school', '1669404545', 'york@gmail.com', '112344', 'www.york.com', 3, 'We love to form a team, work with enthusiastic, creative people, and have a great learning attitude. And hear that you fit the bill perfectly. It\'s great to have you with us. Warmest welcome! We love to form a team, work with enthusiastic, creative people, and have a great learning attitude. And hear that you fit the bill perfectly. It\'s great to have you with us. Warmest welcome!', 'A school is an educational institution designed to provide learning spaces and learning environments for the teaching of students under the direction of teachers. Most countries have systems of formal education, which is sometimes compulsory. In these systems, students progress through a series of schools5.', 'School Startup and Management - What could you accomplish with best in class management and operations at your school? ISS has a proven track record in helping schools reach their fullest potential. Get started today with ISS school consulting, management and operations services.2', 'Est et labore ea pa', 'At accusantium volup', 'Numquam quis ipsum f', 'Nulla minus tempore', 'Natus dolorem repell', 12, 1, 1, 1, '2022-11-25 20:50:07', '2023-10-06 15:17:12', NULL, 'complete', NULL, NULL, NULL, 'h:i:s', 'd-m-Y', 'America/St_Lucia'),
(2, 'My school', '1669409969', 'myschool@gmail.com', '6534566', 'www.york.com', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2022-11-25 21:01:43', '2022-11-25 21:01:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Amanda', '1669515596', NULL, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2022-11-27 02:21:28', '2022-11-27 02:21:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'California School', '1670697905', NULL, '6043467461', NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2022-12-10 18:46:52', '2022-12-10 18:46:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'California School', '1670697905', NULL, '6043467461', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2022-12-10 18:46:58', '2022-12-10 18:46:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'VCL', '1670712704', 'shawn.doosti@yahoo.ca', '6043467461', NULL, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2022-12-10 22:53:03', '2022-12-10 22:53:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'jjj', '1671254161', NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2022-12-17 05:16:59', '2022-12-17 05:16:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'School23', '1677694967', 'school223@gmail.com', '4353464577', 'www.school223.com', 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2023-03-01 18:25:31', '2023-03-01 18:25:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'test9school', '1678468949', 'test9@gmail.com', '43564546557', 'www.test9.com', 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2023-03-10 17:24:37', '2023-03-10 17:24:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Test school for reg', '1678983901', 'testschool@gmail.com', '24535', 'www.testschool.com', 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2023-03-16 16:28:25', '2023-03-16 16:28:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'liwuzim@mailinator.com', '1688566135', NULL, NULL, NULL, 274, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 1, 1, 1, '2023-07-05 14:09:16', '2023-07-06 08:06:12', 90, 'complete', 1, 1, NULL, NULL, NULL, NULL),
(12, 'hebyqazix@mailinator.com', '1688837777', NULL, NULL, NULL, 299, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 1, 1, '2023-07-08 17:39:38', '2023-07-08 17:59:07', 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'fedeq@mailinator.com', '1688837978', NULL, NULL, NULL, 300, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1, 1, 1, '2023-07-08 17:40:12', '2023-07-08 17:59:33', 101, 'complete', 1, 1, NULL, NULL, NULL, NULL),
(14, 'gdhjc', '1688986578', 'zumixyxim@mailinator.com', '+1 (188) 614-5899', NULL, 322, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, 1, 1, '2023-07-10 10:57:28', '2023-07-10 14:35:09', 121, NULL, NULL, 1, 3, NULL, NULL, NULL),
(15, 'kezav@mailinator.com', '1689001562', 'wogeluv@mailinator.com', '+1 (792) 768-9916', 'https://www.cyn.cc', 326, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2023-07-10 15:07:25', '2023-07-10 15:07:25', 123, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'zyjuwe@mailinator.com', '1689001814', 'qisyrefa@mailinator.com', '+1 (847) 352-1053', 'https://www.goribepoho.info', 327, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2023-07-10 15:11:27', '2023-07-10 15:11:27', 125, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'hunebyzi@mailinator.com', '1689001967', 'kyrugiruv@mailinator.com', '+1 (332) 437-4602', 'https://www.xazuj.co.uk', 328, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1, '2023-07-10 15:12:54', '2023-07-10 15:12:54', 127, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'hunebyzi@mailinator.com', '1689001967', 'kyrugiruv@mailinator.com', '+1 (332) 437-4602', 'https://www.xazuj.co.uk', 328, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2023-07-10 15:14:29', '2023-07-10 15:14:29', 127, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'nizyqegoce@mailinator.com', '1689002475', 'jypoloho@mailinator.com', '+1 (992) 795-4608', 'https://www.heg.info', 329, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1, '2023-07-10 15:21:24', '2023-07-10 15:21:24', 129, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'qahykic@mailinator.com', '1689002475', 'mysyrybe@mailinator.com', '+1 (665) 646-5353', 'https://www.quryminopuwuwak.co', 329, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2023-07-10 15:21:51', '2023-07-10 15:21:51', 129, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'qehif@mailinator.com', '1689002837', 'jumyvo@mailinator.com', '+1 (734) 588-7673', 'https://www.gydozyhiwon.org', 330, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2023-07-10 15:27:22', '2023-07-10 15:27:22', 131, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'zarivopec@mailinator.com', '1689003077', 'banacidu@mailinator.com', '+1 (842) 462-2581', 'https://www.rygefenezorut.biz', 331, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, 1, 1, '2023-07-10 15:31:29', '2023-07-10 15:46:33', 133, NULL, 1, 1, 11, NULL, NULL, NULL),
(23, 'toqydojyd@mailinator.com', '1689097972', 'wyvenydari@mailinator.com', '+1 (787) 627-4912', 'https://www.quwopedi.cc', 343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1, '2023-07-11 17:55:25', '2023-07-11 17:55:25', 137, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'test school', '1689174354', 'kacetyfoz@mailinator.com', '+1 (132) 152-2021', 'https://www.farymirodydyma.ws', 344, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1, 1, 1, '2023-07-12 15:06:06', '2023-07-12 16:25:52', 139, 'complete', 1, 1, 12, NULL, NULL, NULL),
(25, 'lewux@mailinator.com', '1689174762', 'mohyta@mailinator.com', '+1 (201) 481-7335', 'https://www.hecavy.org.au', 346, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, 1, 1, '2023-07-12 15:14:43', '2023-07-12 15:15:23', 141, NULL, NULL, NULL, 13, NULL, NULL, NULL),
(26, 'belagoso@mailinator.com', '1689869260', 'sazuw@mailinator.com', '+1 (844) 639-1714', 'https://www.kynoqaqobohaha.me.uk', 363, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1, 1, 1, '2023-07-20 16:07:47', '2023-07-20 16:29:42', 147, 'complete', 1, 1, 14, NULL, NULL, NULL),
(27, 'wece@mailinator.com', '1689873250', 'xeqifugup@mailinator.com', '+1 (357) 594-4616', 'https://www.xixun.org', 365, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 1, 1, 1, '2023-07-20 17:14:16', '2023-07-20 17:17:51', 149, 'complete', 1, 1, 15, NULL, NULL, NULL),
(28, 'rybubyhulet@test.com', '1696003326', 'bugeteq@test.com', '+1 (752) 578-3013', 'https://www.xidytareca.com', 415, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, 1, 1, '2023-09-29 16:02:46', '2023-09-29 17:31:14', 153, NULL, NULL, NULL, 16, NULL, NULL, NULL),
(29, 'zabugiba@mailinator.com', '1696094890', 'walawytupe@mailinator.com', '+1 (976) 183-3647', 'https://www.zufe.me.uk', 417, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 1, 1, '2023-09-30 17:28:20', '2023-09-30 17:28:20', 155, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_announcement`
--

CREATE TABLE `school_announcement` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `event_id` varchar(100) DEFAULT NULL,
  `post_date_time` timestamp NULL DEFAULT NULL,
  `from_date_time` timestamp NULL DEFAULT NULL,
  `to_date_time` timestamp NULL DEFAULT NULL,
  `expaire_date_time` timestamp NULL DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `post_in_edudip` varchar(125) DEFAULT NULL,
  `post_in_admdip` varchar(125) DEFAULT NULL,
  `post_in_accounthold` varchar(125) DEFAULT NULL,
  `comments` text,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_announcement`
--

INSERT INTO `school_announcement` (`id`, `school_id`, `event_id`, `post_date_time`, `from_date_time`, `to_date_time`, `expaire_date_time`, `title`, `post_in_edudip`, `post_in_admdip`, `post_in_accounthold`, `comments`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ev-433842', '2023-01-21 07:30:00', '2023-01-21 19:31:00', '2023-01-28 07:31:00', '2023-01-31 07:31:00', '10', '1', '7', '6', 'na', 1, NULL, 2, '2023-01-21 07:40:43', '2023-01-21 08:11:20'),
(2, 1, 'ev-247897', '2023-01-21 08:11:00', '2023-01-31 20:12:00', '2023-02-21 08:12:00', '2023-02-22 08:12:00', '10', '8', '9', '2', 'Here', 1, NULL, 2, '2023-01-21 08:13:01', '2023-03-10 04:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `school_class`
--

CREATE TABLE `school_class` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `academic_year_id` bigint(20) DEFAULT NULL,
  `participants_limitations` varchar(125) DEFAULT NULL,
  `subject_course_id` int(11) DEFAULT NULL,
  `year_id` bigint(20) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teacher_id` bigint(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `semester_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_class`
--

INSERT INTO `school_class` (`id`, `school_id`, `code`, `name`, `academic_year_id`, `participants_limitations`, `subject_course_id`, `year_id`, `program_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `teacher_id`, `start_date`, `end_date`, `semester_id`) VALUES
(18, 1, 'Et aute eum aperiam', 'Malik Perkins45', 3, NULL, 15, 5, 13, 1, 2, 2, '2023-05-09 17:25:18', '2023-05-09 17:50:31', 27, '1985-03-13', '1987-10-26', NULL),
(19, 1, 'Possimus deserunt e', 'Sharon Fuller', 2, NULL, 14, 6, 12, 1, 2, NULL, '2023-05-09 17:59:49', '2023-05-09 17:59:49', 27, '2001-08-03', '2001-04-09', 4),
(20, 1, 'Sit ut commodo dolor', 'Idona Garrett', 3, NULL, 14, 9, 10, 1, 2, NULL, '2023-05-12 15:54:39', '2023-05-12 15:54:39', 27, '2020-07-13', '1984-03-09', 5),
(21, 1, 'with st', 'Olga Chang', 4, NULL, 14, 10, 12, 1, 2, NULL, '2023-05-14 17:07:03', '2023-05-14 17:07:03', 27, '2007-09-29', '1986-09-02', 5),
(22, 1, 'Eum similique ut rem', 'Jolene Bentley', 1, NULL, 21, 10, 31, 0, 2, NULL, '2023-05-20 17:16:39', '2023-05-20 17:16:39', 9, '1978-03-10', '2003-02-23', 5),
(23, 1, 'Amet quisquam moles', 'Kimberly Riley', 1, NULL, 19, 40, 23, 0, 2, NULL, '2023-05-24 13:37:53', '2023-05-24 13:37:53', 26, '1994-02-08', '1993-04-19', 5),
(24, 1, 'Temporibus culpa ips 5535', 'Allistair Guerrero', 1, NULL, 18, 40, 38, 1, 2, 2, '2023-05-24 13:39:00', '2023-05-24 14:01:30', 9, '1973-04-11', '1975-12-19', 5),
(25, 1, 'c-001', 'English', 1, NULL, 33, 44, 10, 1, 2, NULL, '2023-06-09 17:40:31', '2023-06-09 17:40:31', 26, '2023-06-05', '2023-06-28', 4),
(26, 1, 'Ad veniam error rep', 'Aileen Sanders', 3, NULL, 35, 46, 19, 1, 2, NULL, '2023-09-23 16:17:46', '2023-09-23 16:17:46', 92, '1977-11-05', '1981-04-13', 8),
(27, 1, 'Beatae rerum dolor i', 'Jonah Weeks', 2, NULL, 35, 46, 16, 1, 2, NULL, '2023-09-23 19:05:55', '2023-09-23 19:05:55', 91, '1985-02-01', '2008-01-28', 8),
(28, 1, 'Beatae rerum dolor i', 'Jonah Weeks', 2, NULL, 35, 46, 16, 1, 2, NULL, '2023-09-23 19:07:50', '2023-09-23 19:07:50', 91, '1985-02-01', '2008-01-28', 8),
(29, 1, 'Veniam eu commodo o', 'Cody Roach', 4, NULL, 34, 40, 23, 1, 2, NULL, '2023-09-23 19:08:25', '2023-09-23 19:08:25', 92, '2001-01-20', '1977-09-05', 8),
(30, 1, 'EN#23', 'English#23', 1, NULL, 41, NULL, 50, 1, 2, NULL, '2023-10-30 16:37:42', '2023-10-30 16:37:42', 177, '2023-10-01', '2023-10-31', 8);

-- --------------------------------------------------------

--
-- Table structure for table `school_closed_days`
--

CREATE TABLE `school_closed_days` (
  `id` int(11) NOT NULL,
  `date` varchar(125) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `event_name` varchar(125) DEFAULT NULL,
  `comment` text,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_closed_days`
--

INSERT INTO `school_closed_days` (`id`, `date`, `school_id`, `event_name`, `comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '12/25/2022', 1, 'X mass', 'test 3', 1, 2, 2, '2022-12-30 11:12:54', '2022-12-30 05:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `school_education_levels`
--

CREATE TABLE `school_education_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `education_level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_education_levels`
--

INSERT INTO `school_education_levels` (`id`, `school_id`, `education_level_id`, `created_at`, `updated_at`) VALUES
(2, 11, 2, NULL, NULL),
(3, 11, 3, NULL, NULL),
(6, 11, 4, '2023-07-06 06:06:31', '2023-07-06 06:06:31'),
(7, 13, 1, '2023-07-08 17:46:24', '2023-07-08 17:46:24'),
(8, 13, 5, '2023-07-08 17:46:24', '2023-07-08 17:46:24'),
(9, 13, 6, '2023-07-08 17:46:24', '2023-07-08 17:46:24'),
(10, 13, 7, '2023-07-08 17:46:24', '2023-07-08 17:46:24'),
(11, 14, 1, '2023-07-10 14:10:43', '2023-07-10 14:10:43'),
(12, 14, 2, '2023-07-10 14:10:43', '2023-07-10 14:10:43'),
(13, 14, 5, '2023-07-10 14:10:43', '2023-07-10 14:10:43'),
(14, 14, 6, '2023-07-10 14:10:43', '2023-07-10 14:10:43'),
(15, 14, 9, '2023-07-10 14:10:43', '2023-07-10 14:10:43'),
(16, 14, 3, '2023-07-10 14:23:48', '2023-07-10 14:23:48'),
(17, 14, 7, '2023-07-10 14:23:48', '2023-07-10 14:23:48'),
(18, 22, 2, '2023-07-10 15:38:47', '2023-07-10 15:38:47'),
(19, 22, 3, '2023-07-10 15:38:47', '2023-07-10 15:38:47'),
(20, 22, 6, '2023-07-10 15:38:47', '2023-07-10 15:38:47'),
(21, 22, 7, '2023-07-10 15:38:47', '2023-07-10 15:38:47'),
(22, 24, 2, '2023-07-12 15:06:59', '2023-07-12 15:06:59'),
(23, 24, 6, '2023-07-12 15:06:59', '2023-07-12 15:06:59'),
(24, 24, 7, '2023-07-12 15:06:59', '2023-07-12 15:06:59'),
(25, 26, 2, '2023-07-20 16:08:13', '2023-07-20 16:08:13'),
(26, 26, 7, '2023-07-20 16:08:13', '2023-07-20 16:08:13'),
(27, 27, 2, '2023-07-20 17:14:30', '2023-07-20 17:14:30'),
(28, 27, 3, '2023-07-20 17:14:30', '2023-07-20 17:14:30'),
(29, 28, 2, '2023-09-29 17:31:08', '2023-09-29 17:31:08'),
(30, 28, 6, '2023-09-29 17:31:08', '2023-09-29 17:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `school_form`
--

CREATE TABLE `school_form` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `form_type_id` int(11) DEFAULT NULL,
  `form_no` varchar(125) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `from_account_type_id` int(11) DEFAULT NULL,
  `to_account_type_id` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `cc_user_id` int(11) DEFAULT NULL,
  `priority_level` varchar(125) DEFAULT NULL,
  `subject` text,
  `re` varchar(125) DEFAULT NULL,
  `message` text,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_form`
--

INSERT INTO `school_form` (`id`, `school_id`, `form_type_id`, `form_no`, `date`, `from_account_type_id`, `to_account_type_id`, `from_user_id`, `to_user_id`, `cc_user_id`, `priority_level`, `subject`, `re`, `message`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 1, 18, '1685869946', '2005-07-05 18:45:00', 8, NULL, 19, 26, NULL, 'Low', 'Molestiae rerum iust', NULL, 'Aspernatur porro aut', 1, 2, 2, '2023-06-04 09:12:49', '2023-06-04 09:12:49'),
(8, 1, 13, '1685870207', '2023-11-01 15:25:00', 8, 9, 20, 54, NULL, 'Low', 'Sit vel ex quidem 56', NULL, 'Aliqua Debitis tota', 1, 2, 2, '2023-06-04 09:17:09', '2023-06-04 09:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `school_information`
--

CREATE TABLE `school_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `content` text NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_information`
--

INSERT INTO `school_information` (`id`, `school_id`, `type`, `content`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'deadline', 'fasfasdfasdffasdfsdaf dafsadfasdf', 2, '2023-04-04 11:01:36', '2023-04-04 11:01:36'),
(2, 1, 'program', 'Program information 2fafsa fasfasdf sfd45', 2, '2023-04-04 11:03:36', '2023-09-16 11:28:53'),
(3, 1, 'subject-course', 'Subject course informtationfsadfsadfsadf', NULL, '2023-04-04 11:22:42', '2023-04-04 11:22:49'),
(4, 1, 'information-sessions', 'fsdagdsagsg', NULL, '2023-09-16 11:34:21', '2023-09-16 11:34:21'),
(5, 1, 'dismissal', 'test', NULL, '2023-09-23 15:19:34', '2023-09-23 15:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `school_message`
--

CREATE TABLE `school_message` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `message_no` varchar(125) DEFAULT NULL,
  `message_date` timestamp NULL DEFAULT NULL,
  `from_user_type_id` bigint(20) DEFAULT NULL,
  `to_user_type_id` bigint(20) DEFAULT NULL,
  `cc_user_type_id` bigint(20) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `cc_user_id` int(11) DEFAULT NULL,
  `priority_level` varchar(125) DEFAULT NULL,
  `subject` varchar(125) DEFAULT NULL,
  `re` varchar(125) DEFAULT NULL,
  `message` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_message`
--

INSERT INTO `school_message` (`id`, `school_id`, `message_no`, `message_date`, `from_user_type_id`, `to_user_type_id`, `cc_user_type_id`, `from_user_id`, `to_user_id`, `cc_user_id`, `priority_level`, `subject`, `re`, `message`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 2, 'Ad ipsum explicabo', '2022-07-23 00:09:00', NULL, NULL, NULL, 92, 96, 33, 'Medium', 'Maiores et rem eos', 'Amet lorem quod ips', 'Culpa enim tempor n', 0, NULL, NULL, '2023-09-14 17:29:50', '2023-09-14 17:29:50'),
(4, 1, 'Voluptas ea autem in', '1992-10-22 16:23:00', NULL, NULL, NULL, 103, 142, 144, 'Low', 'Unde maxime expedita', 'Aut iusto culpa et n', 'Dolorem nihil ad et', 0, NULL, NULL, '2023-09-14 17:39:53', '2023-09-14 17:39:53'),
(5, 1, 'Culpa illum porro m', '1987-12-13 10:56:00', 9, 11, 12, 43, 145, 50, 'Low', 'Sunt illo est libero', 'Est exercitationem l', 'Ex quo consequatur o4', 0, NULL, NULL, '2023-09-14 18:05:06', '2023-09-14 18:09:07'),
(6, 1, 'Corporis tempor quia', '1990-09-03 09:51:00', 4, 13, 6, 96, 103, 92, 'Normal', 'Amet quisquam sapie', 'Voluptatem Dolorem', 'Dolore dolor est pa', 0, NULL, NULL, '2023-09-14 19:42:43', '2023-09-14 19:42:43'),
(7, 1, 'Vitae mollit ut vel', '2002-04-22 06:06:00', 13, 15, 10, 104, 142, 150, 'Normal', 'Reprehenderit et nul', 'Anim sed consequatur', 'Delectus eos ipsum', 0, NULL, NULL, '2023-09-17 10:27:08', '2023-09-17 10:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `school_notices`
--

CREATE TABLE `school_notices` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `notice_type` int(11) DEFAULT NULL,
  `notice_no` varchar(125) DEFAULT NULL,
  `notice_date_time` timestamp NULL DEFAULT NULL,
  `priority_levels` varchar(125) DEFAULT NULL,
  `account_type` int(11) DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `cc_user_id` int(11) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `re_case_no` varchar(125) DEFAULT NULL,
  `message` text,
  `calender_url` varchar(250) DEFAULT NULL,
  `calendar_date` timestamp NULL DEFAULT NULL,
  `calendar` varchar(125) DEFAULT NULL,
  `required_action` varchar(125) DEFAULT NULL,
  `comments` text,
  `prepare_by` varchar(125) DEFAULT NULL,
  `approve_by` varchar(125) DEFAULT NULL,
  `publish_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_notices`
--

INSERT INTO `school_notices` (`id`, `school_id`, `notice_type`, `notice_no`, `notice_date_time`, `priority_levels`, `account_type`, `from_user_id`, `to_user_id`, `cc_user_id`, `subject`, `re_case_no`, `message`, `calender_url`, `calendar_date`, `calendar`, `required_action`, `comments`, `prepare_by`, `approve_by`, `publish_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '1678168799', '2023-03-25 06:00:00', 'Medium', NULL, 5, 9, 4, '1', 'test-01', 'school', NULL, '2023-03-25 06:01:00', 'Service Provider', 'test-02', 'optimizer', 'mehedi', 'ripon', '2023-03-23 06:01:00', 1, 2, 2, '2023-03-07 06:07:41', '2023-03-07 06:13:23'),
(2, 1, 18, '1678169633', '2023-03-07 06:19:00', NULL, NULL, 9, 3, 8, '1', 'test-03', 'love means', NULL, '2023-03-31 06:15:00', 'Employee', 'test-04', 'valobasa', 'ripon', 'khalid', '2023-03-31 06:15:00', 1, 2, 2, '2023-03-07 06:15:43', '2023-03-07 06:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `school_program`
--

CREATE TABLE `school_program` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `program_code` varchar(125) DEFAULT NULL,
  `program_name` varchar(125) DEFAULT NULL,
  `program_description` text,
  `school_level_id` int(11) DEFAULT NULL,
  `student_type_id` tinyint(2) DEFAULT NULL,
  `credential_id` int(11) DEFAULT NULL,
  `study_choice_id` int(11) DEFAULT NULL,
  `delivery_method_id` int(11) DEFAULT NULL,
  `entrance_requirements` varchar(125) DEFAULT NULL,
  `term` varchar(125) DEFAULT NULL,
  `semester` varchar(125) DEFAULT NULL,
  `program_length` varchar(50) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `semester_count` int(11) DEFAULT NULL,
  `has_semesters` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_program`
--

INSERT INTO `school_program` (`id`, `school_id`, `program_code`, `program_name`, `program_description`, `school_level_id`, `student_type_id`, `credential_id`, `study_choice_id`, `delivery_method_id`, `entrance_requirements`, `term`, `semester`, `program_length`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `semester_count`, `has_semesters`, `parent_id`, `capacity`) VALUES
(50, 1, 'Program-01', 'program-01', 'Quia maiores similiq', 7, 1, 5, NULL, 3, 'Qui sunt amet magna', NULL, 'Aliquip est eu quis', '100 Months', 1, NULL, NULL, '2023-10-30 14:50:43', '2023-10-30 16:15:54', NULL, NULL, NULL, NULL),
(51, 1, 'Program-02', 'program-02', 'Et do excepteur sunt', 9, 2, 1, NULL, 1, 'Quasi porro ex et ad', NULL, 'Pariatur Dolorem qu', '100 Years', 1, NULL, NULL, '2023-10-30 14:52:15', '2023-10-30 14:52:15', NULL, NULL, NULL, NULL),
(52, 1, 'Program-03', 'program-03', 'Ipsum non nihil volu', 8, 1, 4, NULL, 2, 'Necessitatibus sed e', NULL, 'Dolores dicta labore', '100 Years', 1, NULL, NULL, '2023-10-30 16:17:23', '2023-10-30 16:17:23', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `unique_id`, `school_id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fasgsgsgsxgdagds', 1, 'A3', 1, '2023-05-14 16:45:54', '2023-05-14 16:50:09', NULL),
(2, '56cf1458-e0c5-4712-aee3-de0c0027c0ed', 1, 'B', 1, '2023-09-23 16:09:38', '2023-09-23 16:09:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `phone` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `contact_person_name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `school_id`, `name`, `phone`, `email`, `contact_person_name`, `created_at`, `updated_at`) VALUES
(3, 1, 'provider1', '01343932342', 'provider@mail.com', 'provider person', '2023-03-09 19:48:10', '2023-03-09 19:48:10'),
(4, 1, 'Service Provider 1', '01343932342', 'water-admin@gmail.com', 'farhad', '2023-03-21 16:47:54', '2023-03-21 16:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `company_name` varchar(125) NOT NULL,
  `company_phone` varchar(125) NOT NULL,
  `company_address` varchar(125) NOT NULL,
  `driver_name` varchar(125) NOT NULL,
  `driver_mobile` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `date`, `company_name`, `company_phone`, `company_address`, `driver_name`, `driver_mobile`, `created_at`, `updated_at`) VALUES
(6, 18, '1989-09-21 10:37:00', 'Mcgee and Patton Co', 'Branch Cunningham Traders', 'Sellers Terrell Traders', 'Medge Glover', 'Dolor velit quo quo', '2023-11-09 18:29:10', '2023-11-09 18:29:10'),
(7, 18, '1979-11-25 12:13:00', 'Dorsey and Dale Co', 'Oconnor and Burris Inc', 'Clayton and Lopez Trading', 'Laura Stout', 'Ad neque et ad volup', '2023-11-09 18:34:15', '2023-11-09 18:34:15'),
(8, 18, '2020-01-10 11:15:00', 'Gilbert Haney Plc', 'Mckee Madden LLC', 'Calderon Gibbs Trading', 'Quyn Gibbs', 'Qui excepturi anim s', '2023-11-10 09:55:58', '2023-11-10 09:55:58'),
(9, 20, '2021-04-28 08:35:00', 'Rios and Osborne LLC', 'Burt Booth Traders', 'Crane and Poole Inc', 'Jermaine Ayala', 'Maxime aspernatur au', '2023-11-10 16:47:17', '2023-11-10 16:47:17'),
(10, 21, '1970-09-19 05:14:00', 'Foster Sharpe LLC', 'Winters Campos Plc', 'Levine Weiss Associates', 'Laurel Britt', 'Odit voluptatibus cu', '2023-11-11 14:25:20', '2023-11-11 14:25:20'),
(12, 22, '1993-03-11 22:53:00', 'Logan and Anderson Inc', 'Hayes Molina LLC', 'Johnston Acosta Inc', 'Adrienne Mason', 'Quos enim ut ipsum', '2023-11-11 16:34:53', '2023-11-11 16:34:53'),
(13, 22, '1982-09-01 10:30:00', 'Mccall Meyers LLC', 'Delacruz Thompson Traders', 'Fitzgerald Guthrie Inc', 'Illiana Martin', 'Et voluptatem labor', '2023-11-11 16:35:59', '2023-11-11 16:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_items`
--

CREATE TABLE `shipping_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_items`
--

INSERT INTO `shipping_items` (`id`, `order_item_id`, `quantity`, `created_at`, `updated_at`, `shipping_id`) VALUES
(4, 28, 4.00, '2023-11-09 18:29:10', '2023-11-09 18:29:10', NULL),
(5, 28, 3.00, '2023-11-09 18:34:15', '2023-11-09 18:34:15', NULL),
(6, 28, 3.00, '2023-11-10 09:55:58', '2023-11-10 09:55:58', NULL),
(7, 29, 1.00, '2023-11-10 16:47:17', '2023-11-10 16:47:17', 9),
(8, 30, 1.00, '2023-11-10 16:47:17', '2023-11-10 16:47:17', 9),
(9, 31, 1.00, '2023-11-11 14:25:20', '2023-11-11 14:25:20', 10),
(10, 32, 1.00, '2023-11-11 14:25:20', '2023-11-11 14:25:20', 10),
(11, 33, 40.00, '2023-11-11 16:34:53', '2023-11-11 16:34:53', 12),
(12, 34, 50.00, '2023-11-11 16:34:53', '2023-11-11 16:34:53', 12),
(13, 35, 100.00, '2023-11-11 16:34:53', '2023-11-11 16:34:53', 12),
(14, 33, 50.00, '2023-11-11 16:35:59', '2023-11-11 16:35:59', 13),
(15, 34, 70.00, '2023-11-11 16:35:59', '2023-11-11 16:35:59', 13),
(16, 35, 50.00, '2023-11-11 16:35:59', '2023-11-11 16:35:59', 13);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_logs`
--

CREATE TABLE `shipping_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_no` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `items` text NOT NULL,
  `recipient_name` varchar(125) NOT NULL,
  `recipient_phone` varchar(125) NOT NULL,
  `recipient_address` varchar(125) NOT NULL,
  `courier_company` varchar(125) NOT NULL,
  `confirmation_no` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_logs`
--

INSERT INTO `shipping_logs` (`id`, `shipping_no`, `date`, `items`, `recipient_name`, `recipient_phone`, `recipient_address`, `courier_company`, `confirmation_no`, `created_at`, `updated_at`, `school_id`) VALUES
(1, 'Eius mollitia nemo v', '2012-02-05 01:55:00', 'Ea quo aut est neces', 'Dara Mays', '+1 (428) 374-3241', 'Officia qui aut repu', 'Carpenter and England Inc', 'Carpenter and England Inc', '2023-08-15 17:25:23', '2023-08-15 17:46:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_directory`
--

CREATE TABLE `staff_directory` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(30) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `nick_name` varchar(125) DEFAULT NULL,
  `department` varchar(125) DEFAULT NULL,
  `country` varchar(125) DEFAULT NULL,
  `educational_level` varchar(125) DEFAULT NULL,
  `university_name` varchar(125) DEFAULT NULL,
  `years_in_field` varchar(30) DEFAULT NULL,
  `phone_office` varchar(125) DEFAULT NULL,
  `phone_cell` varchar(125) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `fax` varchar(124) DEFAULT NULL,
  `photo` varchar(125) DEFAULT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_directory`
--

INSERT INTO `staff_directory` (`id`, `staff_id`, `school_id`, `name`, `nick_name`, `department`, `country`, `educational_level`, `university_name`, `years_in_field`, `phone_office`, `phone_cell`, `email`, `fax`, `photo`, `designation`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '101-3700', 1, 'Matthew', 'Rubin', 'cse', 'United States', 'M.Sc.', 'Canada', '23', '11565756657', '1143545466', 'matt@gmail.com', '4355446', 'public/images/staff/dir-1-1671282451.jpg', 'na', 1, 1, 1, '2022-12-17 13:07:31', '2022-12-17 13:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `storage_lockers`
--

CREATE TABLE `storage_lockers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `storage_no` varchar(125) NOT NULL,
  `storage_name` varchar(125) NOT NULL,
  `total_lockers` int(11) NOT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storage_lockers`
--

INSERT INTO `storage_lockers` (`id`, `storage_no`, `storage_name`, `total_lockers`, `contact_id`, `address_id`, `created_at`, `updated_at`) VALUES
(5, '479', 'Cally Trevino', 70, 323, 376, '2023-08-04 14:36:39', '2023-08-04 14:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(11) NOT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `course_id`, `student_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 1, 49, NULL, NULL, NULL, '2023-05-14 17:02:30'),
(9, 3, 49, NULL, NULL, NULL, '2023-05-14 17:02:30'),
(10, 4, 49, NULL, NULL, NULL, '2023-05-14 17:02:30'),
(11, 5, 49, NULL, NULL, NULL, '2023-05-14 17:02:30'),
(14, 8, 49, NULL, NULL, NULL, '2023-05-14 17:02:30'),
(15, 9, 49, NULL, NULL, NULL, '2023-05-14 17:02:30'),
(58, 12, 60, NULL, NULL, NULL, '2023-05-28 17:09:54'),
(59, 0, 60, NULL, NULL, NULL, '2023-05-28 17:09:54'),
(60, 16, 60, NULL, NULL, NULL, '2023-05-28 17:09:54'),
(61, 17, 60, NULL, NULL, NULL, '2023-05-28 17:09:54'),
(62, 18, 60, NULL, NULL, NULL, '2023-05-28 17:09:54'),
(63, 19, 60, NULL, NULL, NULL, '2023-05-28 17:09:54'),
(64, 30, 60, NULL, NULL, NULL, '2023-05-28 17:09:54'),
(65, 33, 61, NULL, NULL, NULL, '2023-06-09 17:42:00'),
(66, 33, 62, NULL, NULL, NULL, '2023-06-22 15:26:08'),
(67, 33, 63, NULL, NULL, NULL, '2023-06-22 15:28:53'),
(68, 33, 64, NULL, NULL, NULL, '2023-06-22 15:31:50'),
(69, 33, 65, NULL, NULL, NULL, '2023-06-22 15:42:06'),
(70, 33, 66, NULL, NULL, NULL, '2023-06-22 17:11:34'),
(71, 33, 67, NULL, NULL, NULL, '2023-06-26 08:51:21'),
(72, 0, 68, NULL, NULL, NULL, '2023-06-26 08:56:37'),
(73, 33, 69, NULL, NULL, NULL, '2023-06-26 09:35:55'),
(74, 33, 70, NULL, NULL, NULL, '2023-06-26 09:42:50'),
(75, 33, 71, NULL, NULL, NULL, '2023-06-26 09:44:51'),
(76, 33, 72, NULL, NULL, NULL, '2023-06-26 09:46:35'),
(77, 0, 73, NULL, NULL, NULL, '2023-06-26 09:54:39'),
(78, 0, 74, NULL, NULL, NULL, '2023-06-26 09:57:09'),
(79, 0, 75, NULL, NULL, NULL, '2023-06-26 09:58:15'),
(81, 33, 77, NULL, NULL, NULL, '2023-06-26 10:19:16'),
(82, 0, 78, NULL, NULL, NULL, '2023-06-26 10:20:28'),
(83, 0, 79, NULL, NULL, NULL, '2023-06-26 10:22:29'),
(84, 0, 80, NULL, NULL, NULL, '2023-06-26 10:23:52'),
(85, 33, 105, NULL, NULL, NULL, '2023-07-09 14:45:57'),
(86, 0, 106, NULL, NULL, NULL, '2023-07-09 14:47:52'),
(88, 33, 108, NULL, NULL, NULL, '2023-07-09 14:50:14'),
(89, 33, 109, NULL, NULL, NULL, '2023-07-09 14:51:44'),
(90, 0, 110, NULL, NULL, NULL, '2023-07-09 15:07:17'),
(91, 33, 111, NULL, NULL, NULL, '2023-07-09 15:31:31'),
(92, 33, 112, NULL, NULL, NULL, '2023-07-09 15:51:28'),
(93, 33, 113, NULL, NULL, NULL, '2023-07-09 16:20:40'),
(94, 33, 114, NULL, NULL, NULL, '2023-07-09 16:57:10'),
(95, 0, 115, NULL, NULL, NULL, '2023-07-09 16:57:38'),
(96, 0, 116, NULL, NULL, NULL, '2023-07-09 17:05:56'),
(98, 0, 119, NULL, NULL, NULL, '2023-07-09 17:24:03'),
(99, 0, 151, NULL, NULL, NULL, '2023-09-23 18:58:05'),
(100, 34, 151, NULL, NULL, NULL, '2023-09-23 18:58:05'),
(117, 0, 162, NULL, NULL, NULL, '2023-10-25 15:45:01'),
(118, 34, 162, NULL, NULL, NULL, '2023-10-25 15:45:01'),
(119, 36, 162, NULL, NULL, NULL, '2023-10-25 15:45:01'),
(120, 0, 163, NULL, NULL, NULL, '2023-10-25 15:55:10'),
(121, 35, 163, NULL, NULL, NULL, '2023-10-25 15:55:10'),
(122, 37, 163, NULL, NULL, NULL, '2023-10-25 15:55:10'),
(123, 33, 164, NULL, NULL, NULL, '2023-10-25 16:54:47'),
(124, 0, 164, NULL, NULL, NULL, '2023-10-25 16:54:47'),
(125, 35, 164, NULL, NULL, NULL, '2023-10-25 16:54:47'),
(126, 36, 164, NULL, NULL, NULL, '2023-10-25 16:54:47'),
(127, 41, 174, NULL, NULL, NULL, '2023-10-30 16:28:58'),
(128, 42, 174, NULL, NULL, NULL, '2023-10-30 16:28:58'),
(129, 43, 174, NULL, NULL, NULL, '2023-10-30 16:28:58'),
(130, 41, 175, NULL, NULL, NULL, '2023-10-30 16:29:41'),
(131, 0, 175, NULL, NULL, NULL, '2023-10-30 16:29:41'),
(132, 41, 176, NULL, NULL, NULL, '2023-10-30 16:30:14'),
(133, 0, 176, NULL, NULL, NULL, '2023-10-30 16:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `mother_id` int(11) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `guardian_id` bigint(20) DEFAULT NULL,
  `student_id_no` varchar(125) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `phone_office` varchar(125) DEFAULT NULL,
  `student_type_id` bigint(20) DEFAULT NULL,
  `academic_year_id` varchar(125) DEFAULT NULL,
  `semester_id` bigint(20) DEFAULT NULL,
  `section_id` bigint(20) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade_year_id` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `emergency_contact_name` varchar(50) DEFAULT NULL,
  `emergency_contact_gender` varchar(50) DEFAULT NULL,
  `emergency_contact_relation` varchar(50) DEFAULT NULL,
  `emergency_contact_address` varchar(50) DEFAULT NULL,
  `emergency_contact_phone` varchar(50) DEFAULT NULL,
  `has_medical_condition` tinyint(4) DEFAULT NULL,
  `medical_description` text,
  `has_special_needs` tinyint(4) DEFAULT NULL,
  `special_needs_description` text,
  `blood_group` varchar(50) DEFAULT NULL,
  `photo_attachment_id` bigint(20) DEFAULT NULL,
  `transportation_information` varchar(100) DEFAULT NULL,
  `special_services` varchar(200) DEFAULT NULL,
  `application_status` varchar(50) DEFAULT NULL,
  `application_remarks` text,
  `message_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `school_id`, `user_id`, `mother_id`, `father_id`, `guardian_id`, `student_id_no`, `address`, `program_id`, `phone_office`, `student_type_id`, `academic_year_id`, `semester_id`, `section_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `grade_year_id`, `dob`, `nationality`, `religion`, `emergency_contact_name`, `emergency_contact_gender`, `emergency_contact_relation`, `emergency_contact_address`, `emergency_contact_phone`, `has_medical_condition`, `medical_description`, `has_special_needs`, `special_needs_description`, `blood_group`, `photo_attachment_id`, `transportation_information`, `special_services`, `application_status`, `application_remarks`, `message_status`) VALUES
(1, 1, 40, 20, 17, 22, 'Eu culpa voluptas im', NULL, 10, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-06 23:49:24', '2023-05-06 17:49:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 41, 21, 17, 17, 'Quia quasi dolor non', NULL, 10, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-06 23:49:43', '2023-05-06 17:49:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 42, 23, 19, 19, 'Quod eum et doloremq', NULL, 10, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-06 23:49:57', '2023-05-06 17:49:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 43, 23, 17, 23, 'Error occaecat eius', NULL, 12, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-06 23:50:05', '2023-05-06 17:50:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 44, 20, 18, 18, 'Nesciunt aperiam po', NULL, 10, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-06 23:50:13', '2023-05-06 17:50:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 46, 23, 19, NULL, 'Dolorum exercitation', NULL, NULL, NULL, NULL, '4', 4, NULL, 1, NULL, NULL, '2023-05-14 21:21:48', '2023-05-14 15:21:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 49, 20, 17, NULL, 'Vel officia sunt lab', NULL, 10, NULL, NULL, '3', 5, 1, 1, NULL, NULL, '2023-05-14 23:02:30', '2023-05-14 17:02:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 60, NULL, NULL, NULL, 'Quas ea rerum Nam la', NULL, 27, NULL, NULL, '4', NULL, NULL, 1, NULL, NULL, '2023-05-28 23:09:54', '2023-05-28 17:09:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 61, 21, 17, NULL, 'Vitae enim quis quid', NULL, 10, NULL, NULL, '1', 4, 1, 1, NULL, NULL, '2023-06-09 23:42:00', '2023-06-09 17:42:00', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 62, NULL, NULL, NULL, 'Jeanette', NULL, 24, NULL, NULL, '4', 4, 1, 1, NULL, NULL, '2023-06-22 21:26:08', '2023-06-22 15:26:08', 44, '1992-11-13', 'Lillith', 'Islam', 'Summer', 'male', NULL, 'Yetta', 'Lacota', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 63, 21, 18, NULL, 'Grace', NULL, 15, NULL, NULL, '3', NULL, NULL, 1, NULL, NULL, '2023-06-22 21:28:53', '2023-06-22 15:28:53', NULL, '2022-04-22', 'Robert', 'Buddhism', 'Nicole', 'other', NULL, 'Quamar', 'Ferdinand', 1, NULL, 1, 'fsxdfgasdfsgasdf', 'O+', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 64, 20, 19, NULL, 'McKenzie', NULL, 16, NULL, NULL, '4', NULL, NULL, 1, NULL, NULL, '2023-06-22 21:31:50', '2023-06-22 15:31:50', NULL, '1990-08-04', 'Byron', 'Islam', 'Imani', 'male', NULL, 'Yeo', 'Cole', 1, NULL, 1, 'xgsafsxg', 'B+', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 65, 22, 18, NULL, 'Ima', NULL, 21, NULL, NULL, '1', 5, 1, 1, NULL, NULL, '2023-06-22 21:42:06', '2023-06-22 15:42:06', NULL, '1979-11-14', 'Janna', 'Hindu', 'Finn', 'female', NULL, 'Brenna', 'Athena', 1, NULL, 0, NULL, 'B+', 29, NULL, NULL, NULL, NULL, NULL),
(21, 1, 66, 21, 18, NULL, 'Rama', NULL, 22, NULL, NULL, '3', NULL, NULL, 1, NULL, NULL, '2023-06-22 23:11:34', '2023-06-22 17:11:34', NULL, '2022-12-23', 'Avye', 'Islam', 'Amity', 'other', NULL, 'Basia', 'Fallon', 1, NULL, 1, 'fsxgdfas', 'A-', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 67, NULL, NULL, NULL, 'Ex pariatur Dolorib', NULL, 17, NULL, NULL, '4', NULL, NULL, 1, NULL, NULL, '2023-06-26 14:51:21', '2023-06-26 08:51:21', NULL, '2011-05-19', 'Vero asperiores aut', 'Christian', 'Carlos Levine', 'male', NULL, 'Et voluptas molestia', '+1 (299) 824-7317', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 68, NULL, NULL, NULL, 'Lorem magni ut nulla', NULL, 20, NULL, NULL, '1', NULL, NULL, 1, NULL, NULL, '2023-06-26 14:56:37', '2023-06-26 08:56:37', NULL, '1992-03-05', 'In perferendis in as', 'Buddhism', 'Craig Lewis', 'male', NULL, 'Modi illum et paria', '+1 (346) 681-9794', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 69, NULL, NULL, NULL, 'Qui similique dolore', NULL, 25, NULL, NULL, '4', NULL, NULL, 1, NULL, NULL, '2023-06-26 15:35:55', '2023-06-26 09:35:55', NULL, '2018-08-15', 'Atque voluptate sunt', 'Christian', 'Erica Blackwell', 'other', NULL, 'Nam doloribus et in', '+1 (719) 429-3751', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 70, NULL, NULL, NULL, 'Ducimus dolorem pra', NULL, 31, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-06-26 15:42:50', '2023-06-26 09:42:50', NULL, '2018-03-03', 'Unde voluptate minim', 'Buddhism', 'Zenaida Bailey', 'male', NULL, 'Sapiente irure dolor', '+1 (118) 127-6002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 71, NULL, NULL, NULL, 'Accusantium laboris', NULL, 25, NULL, NULL, '4', NULL, NULL, 1, NULL, NULL, '2023-06-26 15:44:51', '2023-06-26 09:44:51', NULL, '2021-11-24', 'Pariatur In volupta', 'Buddhism', 'Addison Moreno', 'male', NULL, 'Eu numquam officia n', '+1 (447) 568-4735', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, 72, NULL, NULL, NULL, 'Dolor accusamus itaq', NULL, 23, NULL, NULL, '3', NULL, NULL, 1, NULL, NULL, '2023-06-26 15:46:35', '2023-06-26 09:46:35', NULL, '1985-02-08', 'Voluptatem A mollit', 'Buddhism', 'Lesley Harvey', 'male', NULL, 'Dolore excepturi aut', '+1 (417) 233-2594', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, 73, NULL, NULL, NULL, 'Pariatur Est explic', NULL, 12, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-06-26 15:54:39', '2023-06-26 09:54:39', NULL, '1988-08-11', 'Voluptatibus dolores', 'Christian', 'Mannix Strong', 'male', NULL, 'Earum pariatur Quam', '+1 (459) 711-8914', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, 74, NULL, NULL, NULL, 'Distinctio Aliquam', NULL, 25, NULL, NULL, '1', NULL, NULL, 1, NULL, NULL, '2023-06-26 15:57:09', '2023-06-26 09:57:09', NULL, '1999-06-19', 'Incididunt dicta aut', 'Buddhism', 'Noel Evans', 'other', NULL, 'Unde odio molestias', '+1 (273) 342-8725', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, 75, NULL, NULL, NULL, 'Iusto fugit dolores', NULL, 31, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-06-26 15:58:15', '2023-06-26 09:58:15', NULL, '2018-11-09', 'Atque perferendis cu', 'Other', 'Gail Poole', 'male', NULL, 'Fugiat assumenda ull', '+1 (445) 718-1791', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, 77, NULL, NULL, NULL, 'Reprehenderit molli', NULL, 19, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-06-26 16:19:16', '2023-06-26 10:19:16', NULL, '1977-05-04', 'Assumenda veritatis', 'Hindu', 'Henry Goff', 'male', NULL, 'Delectus doloribus', '+1 (437) 278-7333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1, 78, NULL, NULL, NULL, 'Deserunt necessitati', NULL, 18, NULL, NULL, '1', NULL, NULL, 1, NULL, NULL, '2023-06-26 16:20:28', '2023-06-26 10:20:28', NULL, '2001-11-20', 'Ad sapiente illo ill', 'Hindu', 'Tanner Whitfield', 'female', NULL, 'Veniam laboris quia', '+1 (816) 875-4028', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, 79, NULL, NULL, NULL, 'Sed voluptates vel v', NULL, 24, NULL, NULL, '4', NULL, NULL, 1, NULL, NULL, '2023-06-26 16:22:29', '2023-06-26 10:22:29', NULL, '1992-06-23', 'Quod similique sunt', 'Buddhism', 'Chaney Norton', 'male', NULL, 'Est dolor alias deb', '+1 (401) 957-1247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 1, 80, NULL, NULL, NULL, 'Fugiat odio unde id', NULL, 19, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-06-26 16:23:52', '2023-08-03 17:16:29', NULL, '2021-03-15', 'Aut alias in ad offi', 'Christian', 'Clark Duran', 'other', NULL, 'Id laborum et nisi', '+1 (578) 389-2736', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sent'),
(36, 1, 105, 21, 94, NULL, 'Fugiat inventore en', NULL, 22, NULL, NULL, '4', NULL, NULL, 1, NULL, NULL, '2023-07-09 20:45:57', '2023-08-03 12:41:26', NULL, '2003-10-04', 'Molestias eaque occa', NULL, 'Ann Gibbs', NULL, NULL, 'Iure non voluptatum', '+1 (553) 193-8315', 0, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Approved', NULL, NULL),
(37, 1, 106, 23, 18, NULL, 'Enim quas sed nulla', NULL, 38, NULL, NULL, '1', NULL, NULL, 1, NULL, NULL, '2023-07-09 20:47:52', '2023-08-06 18:05:38', NULL, '1979-02-24', 'Maxime deserunt dele', NULL, 'Bianca Santiago', NULL, NULL, 'Molestias ut id sint', '+1 (635) 616-5741', 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Declined', 'fgasgsa', NULL),
(39, 1, 108, 21, 18, NULL, 'Laboriosam tempor s', NULL, 27, NULL, NULL, '3', NULL, NULL, 1, NULL, NULL, '2023-07-09 20:50:14', '2023-07-09 14:50:14', NULL, '1996-01-18', 'Anim iste non cillum', NULL, 'Lillith Roy', NULL, NULL, 'Quia blanditiis ipsa', '+1 (804) 269-9852', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 1, 109, 20, 17, NULL, 'Ut officiis et et et', NULL, 16, NULL, NULL, '1', NULL, NULL, 1, NULL, NULL, '2023-07-09 20:51:44', '2023-07-09 14:51:44', NULL, '1990-09-22', 'Eum id voluptas mag', NULL, 'Chelsea Atkinson', NULL, NULL, 'Delectus labore ut', '+1 (647) 867-1086', 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 1, 110, 22, 19, 50, 'Sequi neque magna il', NULL, 20, NULL, NULL, '3', 4, 1, 1, NULL, NULL, '2023-07-09 21:07:17', '2023-07-09 15:07:17', NULL, '1979-06-30', 'Ducimus nihil expli', NULL, 'Luke Moody', NULL, NULL, 'Hic omnis Nam quae c', '+1 (288) 967-5312', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 1, 111, 21, 18, 18, 'Odit cupidatat volup', NULL, 16, NULL, NULL, '3', NULL, NULL, 1, NULL, NULL, '2023-07-09 21:31:31', '2023-07-09 15:31:31', 40, '2021-09-05', 'Consequatur Eum aut', NULL, 'Jeanette Fuentes', NULL, 'Cupiditate officia s', 'Facere rem sint occa', '+1 (834) 401-3201', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 1, 112, 21, 19, 50, 'Minus necessitatibus', NULL, 16, NULL, NULL, '1', NULL, NULL, 1, NULL, NULL, '2023-07-09 21:51:28', '2023-07-09 15:51:28', 40, '1979-09-21', 'Sunt omnis suscipit', NULL, 'Abbot Meyer', NULL, 'A dolorem eum ex lab', 'Aperiam esse dicta', '+1 (333) 717-5959', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 1, 113, 23, 94, 94, 'Eum repellendus Rec', NULL, 16, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-07-09 22:20:40', '2023-07-09 16:20:40', 40, '1986-04-02', 'Sequi exercitationem', NULL, 'Hermione Mcleod', NULL, 'Blanditiis obcaecati', 'Voluptatem sunt eaq', '+1 (347) 481-1464', 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 1, 114, 22, 18, 22, 'Excepturi eiusmod es', NULL, 16, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-07-09 22:57:10', '2023-07-09 16:57:10', 40, '1973-12-06', NULL, NULL, 'Candace Jarvis', NULL, 'Excepturi fugiat de', 'In voluptatem Dolor', '+1 (472) 263-1481', 1, NULL, 0, NULL, NULL, NULL, 'Alias dolore volupta', 'Labore inventore con', NULL, NULL, NULL),
(46, 1, 115, 21, 19, NULL, 'Dolor culpa pariatu', NULL, 16, NULL, 1, '4', 5, 1, 1, NULL, NULL, '2023-07-09 22:57:38', '2023-07-10 18:36:28', 40, '1970-07-12', NULL, NULL, 'Lee Dickson', NULL, 'Unde sint magna qui', 'Sint id consectetur', '+1 (263) 449-5607', 0, NULL, 0, NULL, NULL, NULL, 'Dolorem minus labori', NULL, NULL, NULL, NULL),
(47, 1, 116, 20, 17, 20, 'Quia vitae itaque do', NULL, 16, NULL, NULL, '2', NULL, NULL, 1, NULL, NULL, '2023-07-09 23:05:56', '2023-07-09 17:05:56', 40, '2006-08-23', NULL, NULL, 'Roanna Ellis', NULL, 'Blanditiis ea sit e', 'Accusantium adipisic', '+1 (797) 691-5858', 0, NULL, 1, NULL, NULL, NULL, 'Ut voluptatem et fug', 'Voluptatibus veritat', NULL, NULL, NULL),
(48, 1, 119, 20, 18, NULL, 'Eligendi iusto ratio', NULL, 16, NULL, 1, '1', NULL, NULL, 1, NULL, NULL, '2023-07-09 23:12:24', '2023-07-09 17:24:03', 40, '1993-07-21', NULL, NULL, 'Yardley Osborn', NULL, 'Et vel qui do dolor', 'Accusantium ipsum p', '+1 (947) 568-5144', 1, NULL, 0, NULL, NULL, NULL, 'Magna ipsa dolore d', NULL, NULL, NULL, NULL),
(49, 1, 151, 22, 19, 50, 'Et hic qui ipsam dol', NULL, 24, NULL, 1, '1', NULL, NULL, 1, NULL, NULL, '2023-09-24 00:58:05', '2023-09-23 18:58:05', NULL, '1972-09-29', NULL, NULL, 'Michael Kline', NULL, 'Ipsum adipisicing ut', 'Est duis est dolore', '+1 (966) 208-3451', 1, NULL, 1, NULL, NULL, NULL, 'Id voluptatum incidi', 'Mollitia adipisicing', NULL, NULL, NULL),
(54, 1, 162, 23, 18, 50, 'Sed qui beatae porro', NULL, 12, NULL, 2, '2', 8, 2, 1, NULL, NULL, '2023-10-25 21:45:01', '2023-10-25 15:45:01', 46, '1995-07-25', NULL, NULL, 'Ila Rutledge', NULL, 'Repudiandae molestia', 'Minim aperiam est vo', '+1 (582) 666-4788', 1, NULL, 1, 'Sed suscipit occaeca', NULL, NULL, 'Qui ratione ipsum as', 'Accusamus in qui qui', NULL, NULL, NULL),
(55, 1, 163, 20, 19, 19, 'Ea quam blanditiis u', NULL, 22, NULL, 2, '2', NULL, NULL, 1, NULL, NULL, '2023-10-25 21:55:10', '2023-10-25 15:55:10', NULL, '2015-04-27', NULL, NULL, 'Rudyard Freeman', NULL, 'Exercitationem dolor', 'Voluptatum ex qui ap', '+1 (977) 433-5024', 1, NULL, 0, NULL, NULL, NULL, 'Expedita dolores ali', 'In doloremque et vel', NULL, NULL, NULL),
(56, 1, 164, 23, 18, 18, 'Ad nostrud expedita', NULL, 38, NULL, 2, '1', NULL, NULL, 1, NULL, NULL, '2023-10-25 22:54:47', '2023-10-25 16:54:47', NULL, '1987-12-21', NULL, NULL, 'Bell Everett', NULL, 'Doloribus aut et a h', 'Molestias quibusdam', '+1 (859) 561-2259', 0, NULL, 1, 'Maxime id ullamco at', NULL, NULL, 'Ut nisi ut alias mol', 'Cumque dolore Nam ex', NULL, NULL, NULL),
(57, 1, 174, 172, 168, 172, 'EN-23001', NULL, 50, NULL, 2, '1', 8, 1, 1, NULL, NULL, '2023-10-30 22:28:58', '2023-10-30 16:28:58', NULL, '2005-12-17', NULL, NULL, 'Helen Hayden', NULL, 'Irure maiores rerum', 'Ut aut velit quaerat', '+1 (741) 833-8718', 1, NULL, 1, NULL, NULL, NULL, 'Optio sit tenetur e', 'Cupidatat animi pra', NULL, NULL, NULL),
(58, 1, 175, 172, 167, 172, 'EN-23002', NULL, 50, NULL, 2, '1', NULL, NULL, 1, NULL, NULL, '2023-10-30 22:29:41', '2023-10-30 16:29:41', NULL, '2012-02-07', NULL, NULL, 'Clarke Prince', NULL, 'Quis qui hic nihil q', 'Rem architecto cillu', '+1 (315) 428-1106', 0, NULL, 1, NULL, NULL, NULL, 'Voluptatibus veniam', 'Voluptas qui ut in l', NULL, NULL, NULL),
(59, 1, 176, 170, 168, 170, 'EN-23003', NULL, 50, NULL, 2, '1', NULL, NULL, 1, NULL, NULL, '2023-10-30 22:30:14', '2023-10-30 16:30:14', NULL, '1975-05-15', NULL, NULL, 'Dominic Cash', NULL, 'Aut cillum eum labor', 'Dolor exercitation q', '+1 (838) 432-5583', 0, NULL, 0, NULL, NULL, NULL, 'Culpa incidunt omn', 'Beatae est officia', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_messages`
--

CREATE TABLE `student_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text,
  `cc_mother_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cc_father_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_messages`
--

INSERT INTO `student_messages` (`id`, `student_id`, `subject`, `description`, `cc_mother_id`, `cc_father_id`, `created_at`, `updated_at`) VALUES
(1, 35, 'fsagas', 'gsagasg', NULL, NULL, '2023-08-03 17:16:29', '2023-08-03 17:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `academic_year_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id_no` varchar(125) NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `mother_id` int(11) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `student_id_no` varchar(125) DEFAULT NULL,
  `address_id` bigint(20) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `academic_year_id` bigint(20) DEFAULT NULL,
  `semester_id` bigint(20) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `school_id`, `user_id`, `mother_id`, `father_id`, `student_id_no`, `address_id`, `program_id`, `category_id`, `academic_year_id`, `semester_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 1, 30, 20, 18, 'dafasfdsadf', NULL, 5, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-13 00:09:52', '2023-04-12 18:09:52'),
(12, 1, 31, 21, 18, 'dafasfdsadf', NULL, 4, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-13 00:11:23', '2023-04-12 18:11:23'),
(13, 1, 34, 23, 18, 'dafasfdsadf', NULL, 4, NULL, NULL, NULL, 1, NULL, NULL, '2023-04-14 00:57:14', '2023-04-13 18:57:14'),
(14, 1, NULL, 20, 19, 'Quasi sapiente tempo', 219, NULL, NULL, 3, 5, 0, NULL, NULL, '2023-05-14 18:28:23', '2023-05-14 12:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_types`
--

CREATE TABLE `student_types` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_types`
--

INSERT INTO `student_types` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Domestic', 1, NULL, NULL, NULL, '2023-04-08 10:20:24'),
(2, 'International', 1, NULL, NULL, NULL, '2023-04-08 10:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `study_option`
--

CREATE TABLE `study_option` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study_option`
--

INSERT INTO `study_option` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', 1, NULL, NULL, NULL, '2022-12-24 06:48:07'),
(2, 'Part Time', 1, NULL, NULL, NULL, '2022-12-24 06:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `subject_course`
--

CREATE TABLE `subject_course` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `course_no` varchar(100) DEFAULT NULL,
  `title` varchar(125) DEFAULT NULL,
  `description` text,
  `topics` text,
  `course_format` varchar(50) DEFAULT NULL,
  `prerequisites` text,
  `requirements` text,
  `delivery_method_id` int(11) DEFAULT NULL,
  `study_option_id` tinyint(2) DEFAULT NULL COMMENT '1=Full Time, 2=Part Time ',
  `tuition_id` tinyint(4) DEFAULT NULL COMMENT '1=Domestic, 2=International',
  `learning_outcomes` longtext,
  `learning_objectives` longtext,
  `number_of_credits` varchar(125) DEFAULT NULL,
  `pass_mark` varchar(125) DEFAULT NULL,
  `maximum_times_to_take` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` varchar(50) DEFAULT NULL,
  `vip_dates` varchar(50) DEFAULT NULL,
  `policy` text,
  `credit_accreditable` tinyint(4) DEFAULT NULL,
  `credit_transferable` tinyint(4) DEFAULT NULL,
  `important_information` longtext,
  `registration_note` longtext,
  `report_progress` tinyint(4) DEFAULT NULL,
  `offer_to_id` bigint(20) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_course`
--

INSERT INTO `subject_course` (`id`, `school_id`, `course_no`, `title`, `description`, `topics`, `course_format`, `prerequisites`, `requirements`, `delivery_method_id`, `study_option_id`, `tuition_id`, `learning_outcomes`, `learning_objectives`, `number_of_credits`, `pass_mark`, `maximum_times_to_take`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `duration`, `vip_dates`, `policy`, `credit_accreditable`, `credit_transferable`, `important_information`, `registration_note`, `report_progress`, `offer_to_id`, `capacity`) VALUES
(41, 1, 'cn-01', 'English', 'Sed ut omnis velit n', 'Explicabo Ut iure e', 'Flipped Classroom', 'Et at nemo repellend', 'Eveniet assumenda s', 1, 1, 1, 'Minim architecto ape', 'Consequatur non ulla', '878', '21', 'Est et nesciunt au', 1, 2, NULL, '2023-10-30 16:20:18', '2023-10-30 16:20:18', '100 Total Hours', '23-Oct-1985', 'Aliqua Libero beata', 1, 1, 'Eum nihil tenetur re', 'Recusandae Enim ani', 1, NULL, NULL),
(42, 1, 'cn-02', 'Programming', 'Saepe asperiores est', 'Ut et eligendi eum o', 'Project-based learning', 'Aut optio est quib', 'Ea velit dolorum sun', 2, 2, 1, 'Consequuntur fugit', 'Magna similique non', '985', '86', 'Voluptate quidem vol', 1, 2, NULL, '2023-10-30 16:21:45', '2023-10-30 16:21:45', '40 Total Classes', '22-Oct-1985', 'Perspiciatis conseq', 0, 1, 'Dolorem id anim fugi', 'Delectus nulla simi', 0, NULL, NULL),
(43, 1, 'cn-03', 'Data Structure', 'Nostrum harum invent', 'Ea ut recusandae Do', 'Practical Training', 'Quis ut eveniet aut', 'Tenetur numquam eum', 3, 1, 2, 'Cupidatat tempora ra', 'Reprehenderit eu at', '75', '6', 'Eaque atque lorem al', 1, 2, NULL, '2023-10-30 16:22:59', '2023-10-30 16:22:59', '93 Total Weeks', '10-Dec-1988', 'Et aliquam est sunt', 1, 1, 'Voluptate accusamus', 'Amet autem in ea di', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_course_text_books`
--

CREATE TABLE `subject_course_text_books` (
  `id` int(11) NOT NULL,
  `book_id` bigint(20) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `mandatory` varchar(125) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_course_text_books`
--

INSERT INTO `subject_course_text_books` (`id`, `book_id`, `course_id`, `mandatory`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 2, 23, 'on', NULL, NULL, NULL, '2023-05-19 13:27:13'),
(8, 1, 25, '0', NULL, NULL, NULL, '2023-05-19 13:32:12'),
(12, 2, 29, '0', NULL, NULL, NULL, '2023-05-19 13:35:57'),
(13, 2, 30, '0', NULL, NULL, NULL, '2023-05-19 14:30:47'),
(14, 2, 30, '0', NULL, NULL, NULL, '2023-05-19 14:30:47'),
(15, 2, 30, '0', NULL, NULL, NULL, '2023-05-19 14:49:59'),
(16, 1, 31, '0', NULL, NULL, NULL, '2023-05-19 15:11:42'),
(17, 2, 31, '1', NULL, NULL, NULL, '2023-05-19 15:11:42'),
(18, 1, 32, '0', NULL, NULL, NULL, '2023-05-19 16:21:42'),
(19, 2, 32, '1', NULL, NULL, NULL, '2023-05-20 10:16:32'),
(20, 1, 33, '1', NULL, NULL, NULL, '2023-06-09 17:39:00'),
(21, 1, 34, '0', NULL, NULL, NULL, '2023-08-19 18:48:56'),
(22, 1, 35, '0', NULL, NULL, NULL, '2023-09-21 17:12:39'),
(23, 3, 36, '0', NULL, NULL, NULL, '2023-09-23 16:00:21'),
(24, 2, 37, '0', NULL, NULL, NULL, '2023-10-05 17:08:03'),
(25, 1, 38, '0', NULL, NULL, NULL, '2023-10-25 17:20:05'),
(26, 2, 39, '0', NULL, NULL, NULL, '2023-10-26 15:55:19'),
(27, 2, 40, '0', NULL, NULL, NULL, '2023-10-26 15:58:28'),
(28, 6, 41, '0', NULL, NULL, NULL, '2023-10-30 16:20:18'),
(29, 3, 42, '0', NULL, NULL, NULL, '2023-10-30 16:21:45'),
(30, 5, 43, '0', NULL, NULL, NULL, '2023-10-30 16:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `task_assigner_in_education_team`
--

CREATE TABLE `task_assigner_in_education_team` (
  `id` int(11) NOT NULL,
  `task` int(11) DEFAULT NULL,
  `assign_to_user_id` int(11) DEFAULT NULL,
  `assign_to_deadline` timestamp NULL DEFAULT NULL,
  `assign_to_comment` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_assigner_in_education_team`
--

INSERT INTO `task_assigner_in_education_team` (`id`, `task`, `assign_to_user_id`, `assign_to_deadline`, `assign_to_comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-05-30 22:47:38', '2023-05-30 16:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `tax_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `code` varchar(125) DEFAULT NULL,
  `rate` decimal(8,4) NOT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `office_name` varchar(125) DEFAULT NULL,
  `office_address` varchar(125) DEFAULT NULL,
  `office_phone` varchar(125) DEFAULT NULL,
  `office_email` varchar(125) DEFAULT NULL,
  `office_website` varchar(125) DEFAULT NULL,
  `reporting_type` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `school_id`, `tax_type_id`, `name`, `code`, `rate`, `account_id`, `office_name`, `office_address`, `office_phone`, `office_email`, `office_website`, `reporting_type`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'VAT', 'Asperiores nesciunt', 15.0000, NULL, 'Desirae Hooper', 'Dolor totam velit re', '+1 (657) 307-2906', 'zuhaki@mailinator.com', 'https://www.hivuqeludebis.us', NULL, '2023-04-13 14:40:41', '2023-04-13 14:59:12'),
(3, 1, 1, 'Sylvia Workman', 'Sint quam et molliti', 53.0000, NULL, 'Sophia Collins', 'Dolores iure volupta', '+1 (272) 158-2319', 'gufu@mailinator.com', 'https://www.rugomixowex.me', NULL, '2023-04-13 19:10:58', '2023-04-13 19:11:14'),
(4, 1, 1, 'Wing Hester', 'Nihil molestiae debi', 6.0000, NULL, 'Rosalyn Doyle', 'Maiores rem dolor se', '+1 (842) 554-8337', 'salirotuwo@mailinator.com', 'https://www.wokivyba.com.au', NULL, '2023-10-05 17:29:01', '2023-10-05 17:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tax_types`
--

CREATE TABLE `tax_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax_types`
--

INSERT INTO `tax_types` (`id`, `school_id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Purchase Tax', NULL, '2023-04-13 14:11:05', '2023-04-13 14:11:05'),
(2, 1, 'Property Tax', NULL, '2023-04-13 14:11:24', '2023-04-13 19:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `team_group`
--

CREATE TABLE `team_group` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_group`
--

INSERT INTO `team_group` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Staff - Staff', 1, NULL, NULL, NULL, '2023-03-18 07:41:42'),
(2, 'Parents- Parents', 1, NULL, NULL, NULL, '2023-03-18 07:41:42'),
(3, 'Parents- Staff', 1, NULL, NULL, NULL, '2023-03-18 07:42:17'),
(4, 'Students-Students', 1, NULL, NULL, NULL, '2023-03-18 07:42:17'),
(5, 'Students-Teachers', 1, NULL, NULL, NULL, '2023-03-18 07:42:48'),
(6, 'Teachers- Parents', 1, NULL, NULL, NULL, '2023-03-18 07:42:48'),
(7, 'Teachers- Teachers', 1, NULL, NULL, NULL, '2023-03-18 07:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `team_type`
--

CREATE TABLE `team_type` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_type`
--

INSERT INTO `team_type` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Problem Solving', 1, NULL, NULL, NULL, '2023-03-17 15:16:11'),
(2, 'Improvement', 1, NULL, NULL, NULL, '2023-03-17 15:16:11'),
(3, 'Marketing', 1, NULL, NULL, NULL, '2023-03-17 15:16:47'),
(4, 'Sales', 1, NULL, NULL, NULL, '2023-03-17 15:16:47'),
(5, 'Athletic Activity', 1, NULL, NULL, NULL, '2023-03-17 15:17:17'),
(6, 'Workshop Activity', 1, NULL, NULL, NULL, '2023-03-17 15:17:17'),
(7, 'Research and Development', 1, NULL, NULL, NULL, '2023-03-17 15:17:47'),
(8, 'Custom', 1, NULL, NULL, NULL, '2023-03-17 15:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `template_builders`
--

CREATE TABLE `template_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `type` varchar(125) NOT NULL,
  `user_type_id` bigint(20) UNSIGNED NOT NULL,
  `fields` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template_builders`
--

INSERT INTO `template_builders` (`id`, `name`, `type`, `user_type_id`, `fields`, `created_at`, `updated_at`) VALUES
(1, 'Alice Thompson', 'Notice', 4, '[{\"type\":\"password\",\"name\":\"Declan Espinoza\",\"is_required\":\"no\"}]', '2023-08-09 17:40:23', '2023-08-09 17:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `temp_otps`
--

CREATE TABLE `temp_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `otp_for` varchar(125) NOT NULL,
  `otp` varchar(125) NOT NULL,
  `expire_at` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_otps`
--

INSERT INTO `temp_otps` (`id`, `otp_for`, `otp`, `expire_at`, `created_at`, `updated_at`, `type`) VALUES
(1, '01928645981', '648736', '2022-06-02 17:10:13', '2022-06-02 11:07:53', '2022-06-02 11:07:53', NULL),
(2, '01755566441', '285682', '2022-06-02 22:51:15', '2022-06-02 16:48:56', '2022-06-02 16:48:56', NULL),
(3, '01755566441', '904582', '2022-06-02 22:52:52', '2022-06-02 16:50:32', '2022-06-02 16:50:32', NULL),
(4, '01755566441', '659450', '2022-06-02 22:53:48', '2022-06-02 16:51:29', '2022-06-02 16:51:29', NULL),
(5, '01952887322', '298057', '2022-06-03 02:28:24', '2022-06-02 20:26:05', '2022-06-02 20:26:05', NULL),
(6, '01952887322', '652758', '2022-06-03 02:29:45', '2022-06-02 20:27:25', '2022-06-02 20:27:25', NULL),
(7, '01952887322', '564327', '2022-06-03 02:29:56', '2022-06-02 20:27:37', '2022-06-02 20:27:37', NULL),
(8, '01952887322', '431153', '2022-06-03 02:30:21', '2022-06-02 20:28:02', '2022-06-02 20:28:02', NULL),
(9, '01952887322', '730731', '2022-06-03 02:33:01', '2022-06-02 20:30:42', '2022-06-02 20:30:42', NULL),
(10, '01952887322', '864373', '2022-06-03 02:39:18', '2022-06-02 20:36:59', '2022-06-02 20:36:59', NULL),
(11, '01952887322', '882167', '2022-06-03 02:39:57', '2022-06-02 20:37:38', '2022-06-02 20:37:38', NULL),
(12, '01952887322', '994629', '2022-06-03 02:40:30', '2022-06-02 20:38:11', '2022-06-02 20:38:11', NULL),
(13, '01952887322', '705482', '2022-06-03 02:41:42', '2022-06-02 20:39:23', '2022-06-02 20:39:23', NULL),
(14, '01746555579', '475897', '2022-06-03 20:10:24', '2022-06-03 14:08:05', '2022-06-03 14:08:05', NULL),
(15, '1928645981', '249483', '2022-06-03 23:49:59', '2022-06-03 17:47:40', '2022-06-03 17:47:40', NULL),
(16, '01999075616', '839929', '2022-06-04 00:22:30', '2022-06-03 18:20:10', '2022-06-03 18:20:10', NULL),
(17, '1946728099', '698022', '2022-06-04 14:50:38', '2022-06-04 08:48:19', '2022-06-04 08:48:19', NULL),
(18, '1758083343', '780974', '2022-06-04 14:56:32', '2022-06-04 08:54:13', '2022-06-04 08:54:13', NULL),
(19, '1758083343', '676641', '2022-06-04 14:57:31', '2022-06-04 08:55:12', '2022-06-04 08:55:12', NULL),
(20, '1758083343', '669026', '2022-06-04 14:57:39', '2022-06-04 08:55:19', '2022-06-04 08:55:19', NULL),
(21, '1758083343', '741762', '2022-06-04 14:59:12', '2022-06-04 08:56:53', '2022-06-04 08:56:53', NULL),
(22, '1755534991', '682750', '2022-06-05 10:34:30', '2022-06-05 04:32:11', '2022-06-05 04:32:11', NULL),
(23, '01713053336', '504216', '2022-06-07 11:11:54', '2022-06-07 05:09:35', '2022-06-07 05:09:35', NULL),
(24, '01324732755', '453258', '2022-06-22 11:59:55', '2022-06-22 05:57:36', '2022-06-22 05:57:36', NULL),
(25, '1324732755', '647199', '2022-06-22 12:00:53', '2022-06-22 05:58:34', '2022-06-22 05:58:34', NULL),
(26, '01713053336', '449330', '2022-06-23 09:49:55', '2022-06-23 03:47:35', '2022-06-23 03:47:35', NULL),
(27, '1713053336', '924517', '2022-06-23 09:50:42', '2022-06-23 03:48:22', '2022-06-23 03:48:22', NULL),
(28, '01713053336', '642445', '2022-06-23 10:09:03', '2022-06-23 04:06:44', '2022-06-23 04:06:44', NULL),
(29, '01746555576', '592175', '2022-08-28 23:35:28', '2022-08-28 17:33:09', '2022-08-28 17:33:09', NULL),
(30, '01746555579', '267784', '2022-08-28 23:45:21', '2022-08-28 17:43:02', '2022-08-28 17:43:02', NULL),
(31, '01746555579', '451249', '2022-08-28 23:48:54', '2022-08-28 17:46:36', '2022-08-28 17:46:36', NULL),
(32, '01746555576', '186500', '2022-08-29 00:00:53', '2022-08-28 17:58:35', '2022-08-28 17:58:35', NULL),
(33, '01746555579', '547685', '2022-08-29 00:01:39', '2022-08-28 17:59:22', '2022-08-28 17:59:22', NULL),
(34, '01746555579', '312256', '2022-08-29 00:01:55', '2022-08-28 17:59:37', '2022-08-28 17:59:37', NULL),
(35, '01871429133', '288083', '2022-09-05 00:48:10', '2022-09-04 18:45:51', '2022-09-04 18:45:51', NULL),
(36, '01871429133', '129527', '2022-09-05 01:53:17', '2022-09-04 19:50:58', '2022-09-04 19:50:58', NULL),
(37, '01871429133', '128613', '2022-09-20 21:34:20', '2022-09-20 15:32:01', '2022-09-20 15:32:01', NULL),
(38, '01871429133', '572357', '2022-09-20 21:48:51', '2022-09-20 15:46:32', '2022-09-20 15:46:32', NULL),
(39, '01871429133', '778639', '2022-09-21 02:26:08', '2022-09-20 20:23:49', '2022-09-20 20:23:49', NULL),
(40, '01521492331', '105651', '2022-09-21 02:33:14', '2022-09-20 20:30:54', '2022-09-20 20:30:54', NULL),
(41, '01871429133', '740323', '2022-09-21 08:26:00', '2022-09-21 02:23:41', '2022-09-21 02:23:41', NULL),
(42, '01871429133', '758189', '2022-09-21 08:33:19', '2022-09-21 02:31:00', '2022-09-21 02:31:00', NULL),
(43, '01871429133', '943862', '2022-09-21 08:33:50', '2022-09-21 02:31:31', '2022-09-21 02:31:31', NULL),
(44, '01871429133', '481155', '2022-09-21 08:34:11', '2022-09-21 02:31:52', '2022-09-21 02:31:52', NULL),
(45, '01871429133', '630811', '2022-09-21 08:34:25', '2022-09-21 02:32:08', '2022-09-21 02:32:08', NULL),
(46, '01871429133', '487693', '2022-09-21 08:40:57', '2022-09-21 02:38:37', '2022-09-21 02:38:37', NULL),
(47, '01871429133', '309976', '2022-09-21 16:11:14', '2022-09-21 10:08:55', '2022-09-21 10:08:55', NULL),
(48, '01871429133', '540132', '2022-09-21 16:28:00', '2022-09-21 10:25:40', '2022-09-21 10:25:40', NULL),
(49, '01871429133', '933728', '2022-09-21 16:59:33', '2022-09-21 10:57:14', '2022-09-21 10:57:14', NULL),
(50, '01871429133', '511993', '2022-09-21 17:08:12', '2022-09-21 11:05:53', '2022-09-21 11:05:53', NULL),
(51, 'cawy@mailinator.com', '655941', NULL, '2023-07-04 17:36:28', '2023-07-04 17:36:28', 'email'),
(52, '+1 (528) 809-2458', '879419', NULL, '2023-07-04 17:36:28', '2023-07-04 17:36:28', 'mobile'),
(53, 'wizuf@mailinator.com', '847886', NULL, '2023-07-05 07:23:08', '2023-07-05 07:23:08', 'email'),
(54, '+1 (897) 169-7368', '457628', NULL, '2023-07-05 07:23:08', '2023-07-05 07:23:08', 'mobile'),
(55, 'test@gmail.com', '858554', NULL, '2023-07-05 08:00:31', '2023-07-05 08:00:31', 'email'),
(56, '+1 (532) 508-8237', '255596', NULL, '2023-07-05 08:00:31', '2023-07-05 08:00:31', 'mobile'),
(57, 'test1@gmail.com', '967980', '2023-07-05 15:16:25', '2023-07-05 08:46:25', '2023-07-05 08:46:25', 'email'),
(58, '+1 (679) 886-3293', '625229', '2023-07-05 15:16:25', '2023-07-05 08:46:25', '2023-07-05 08:46:25', 'mobile'),
(59, 'test1@gmail.com', '265343', '2023-07-05 15:24:53', '2023-07-05 08:54:53', '2023-07-05 08:54:53', 'email'),
(60, 'test1@gmail.com', '608428', '2023-07-05 15:26:37', '2023-07-05 08:56:37', '2023-07-05 08:56:37', 'email'),
(61, '+1 (211) 608-7826', '931894', '2023-07-05 15:26:37', '2023-07-05 08:56:37', '2023-07-05 08:56:37', 'mobile'),
(62, 'test2@gmail.com', '899278', '2023-07-05 20:12:49', '2023-07-05 13:42:49', '2023-07-05 13:42:49', 'email'),
(63, '+1 (223) 864-5227', '666071', '2023-07-05 20:12:49', '2023-07-05 13:42:49', '2023-07-05 13:42:49', 'mobile'),
(64, 'test5@gmail.com', '465820', '2023-07-09 00:04:58', '2023-07-08 17:34:58', '2023-07-08 17:34:58', 'email'),
(65, '+1 (692) 313-4565', '647974', '2023-07-09 00:04:58', '2023-07-08 17:34:58', '2023-07-08 17:34:58', 'mobile'),
(66, 'susosu@mailinator.com', '378716', '2023-07-09 01:06:45', '2023-07-08 18:36:45', '2023-07-08 18:36:45', 'email'),
(67, '+1 (307) 486-8295', '295729', '2023-07-09 01:06:45', '2023-07-08 18:36:45', '2023-07-08 18:36:45', 'mobile'),
(68, 'kuhydyz@mailinator.com', '625117', '2023-07-10 17:25:17', '2023-07-10 10:55:17', '2023-07-10 10:55:17', 'email'),
(69, '+1 (856) 123-6609', '917617', '2023-07-10 17:25:17', '2023-07-10 10:55:17', '2023-07-10 10:55:17', 'mobile'),
(70, 'lujitod@mailinator.com', '498301', '2023-07-10 21:35:32', '2023-07-10 15:05:32', '2023-07-10 15:05:32', 'email'),
(71, '+1 (193) 353-2777', '916169', '2023-07-10 21:35:32', '2023-07-10 15:05:32', '2023-07-10 15:05:32', 'mobile'),
(72, 'diveguje@mailinator.com', '474493', '2023-07-10 21:39:59', '2023-07-10 15:09:59', '2023-07-10 15:09:59', 'email'),
(73, '+1 (924) 748-9535', '495648', '2023-07-10 21:39:59', '2023-07-10 15:09:59', '2023-07-10 15:09:59', 'mobile'),
(74, 'zamumid@mailinator.com', '123897', '2023-07-10 21:42:33', '2023-07-10 15:12:33', '2023-07-10 15:12:33', 'email'),
(75, '+1 (865) 298-9357', '857906', '2023-07-10 21:42:33', '2023-07-10 15:12:33', '2023-07-10 15:12:33', 'mobile'),
(76, 'basur@mailinator.com', '564077', '2023-07-10 21:50:48', '2023-07-10 15:20:48', '2023-07-10 15:20:48', 'email'),
(77, '+1 (779) 714-2725', '482605', '2023-07-10 21:50:48', '2023-07-10 15:20:48', '2023-07-10 15:20:48', 'mobile'),
(78, 'sejalo@mailinator.com', '336115', '2023-07-10 21:55:57', '2023-07-10 15:25:57', '2023-07-10 15:25:57', 'email'),
(79, '+1 (278) 209-8371', '793581', '2023-07-10 21:55:57', '2023-07-10 15:25:57', '2023-07-10 15:25:57', 'mobile'),
(80, 'redo@mailinator.com', '775699', '2023-07-10 22:00:11', '2023-07-10 15:30:11', '2023-07-10 15:30:11', 'email'),
(81, '+1 (416) 891-2928', '188520', '2023-07-10 22:00:11', '2023-07-10 15:30:11', '2023-07-10 15:30:11', 'mobile'),
(82, 'kudyhipux@mailinator.com', '356472', '2023-07-12 00:22:39', '2023-07-11 17:52:39', '2023-07-11 17:52:39', 'email'),
(83, '+1 (489) 698-2028', '961216', '2023-07-12 00:22:39', '2023-07-11 17:52:39', '2023-07-11 17:52:39', 'mobile'),
(84, 'test11@gmail.com', '749860', '2023-07-12 21:35:42', '2023-07-12 15:05:42', '2023-07-12 15:05:42', 'email'),
(85, '+1 (453) 446-8938', '874463', '2023-07-12 21:35:42', '2023-07-12 15:05:42', '2023-07-12 15:05:42', 'mobile'),
(86, 'rolepiwav@mailinator.com', '772175', '2023-07-12 21:42:27', '2023-07-12 15:12:27', '2023-07-12 15:12:27', 'email'),
(87, '+1 (443) 927-4717', '837016', '2023-07-12 21:42:27', '2023-07-12 15:12:27', '2023-07-12 15:12:27', 'mobile'),
(88, 'test_account@gmail.com', '934533', '2023-07-20 22:37:26', '2023-07-20 16:07:26', '2023-07-20 16:07:26', 'email'),
(89, '+1 (594) 781-6287', '973357', '2023-07-20 22:37:26', '2023-07-20 16:07:26', '2023-07-20 16:07:26', 'mobile'),
(90, 'test-account2@gmail.com', '690007', '2023-07-20 23:43:58', '2023-07-20 17:13:58', '2023-07-20 17:13:58', 'email'),
(91, '+1 (395) 467-1394', '919333', '2023-07-20 23:43:58', '2023-07-20 17:13:58', '2023-07-20 17:13:58', 'mobile'),
(92, 'test456365@gmail.com', '217778', '2023-09-29 21:55:02', '2023-09-29 15:25:02', '2023-09-29 15:25:02', 'email'),
(93, '+1 (878) 201-6744', '578835', '2023-09-29 21:55:02', '2023-09-29 15:25:02', '2023-09-29 15:25:02', 'mobile'),
(94, 'wimatojev@mailinator.com', '948629', '2023-09-30 23:57:58', '2023-09-30 17:27:58', '2023-09-30 17:27:58', 'email'),
(95, '+1 (569) 987-6848', '821226', '2023-09-30 23:57:58', '2023-09-30 17:27:58', '2023-09-30 17:27:58', 'mobile');

-- --------------------------------------------------------

--
-- Table structure for table `term_semester`
--

CREATE TABLE `term_semester` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `code` varchar(125) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(50) DEFAULT NULL,
  `academic_year_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term_semester`
--

INSERT INTO `term_semester` (`id`, `unique_id`, `school_id`, `campus_id`, `code`, `start_date`, `end_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `type`, `academic_year_id`) VALUES
(8, '0369b864-1fef-4794-bb21-72da600302dc', 1, 3, 'Iusto veniam ex cil', '1991-11-06', '2023-05-04', 1, NULL, NULL, '2023-09-16 17:10:01', '2023-09-16 17:10:01', NULL, 2),
(9, 'a59387c0-c073-4fbf-9082-b93763b12373', 1, 4, 'Qui non ut incidunt', '1997-09-28', '1996-10-03', 1, NULL, NULL, '2023-10-05 17:06:12', '2023-10-05 17:06:12', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `textbooks`
--

CREATE TABLE `textbooks` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `book_code` varchar(125) DEFAULT NULL,
  `book_name` varchar(125) DEFAULT NULL,
  `author_name` varchar(125) DEFAULT NULL,
  `isbn_no` varchar(125) DEFAULT NULL,
  `copyright` varchar(125) DEFAULT NULL,
  `publisher` varchar(125) DEFAULT NULL,
  `edition_no` varchar(125) DEFAULT NULL,
  `program` int(10) UNSIGNED DEFAULT NULL,
  `term` int(10) UNSIGNED DEFAULT NULL,
  `semester` int(10) UNSIGNED DEFAULT NULL,
  `subject_course` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=In-active',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `textbooks`
--

INSERT INTO `textbooks` (`id`, `school_id`, `book_code`, `book_name`, `author_name`, `isbn_no`, `copyright`, `publisher`, `edition_no`, `program`, `term`, `semester`, `subject_course`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ut inventore ratione', 'Honorato Lambert', 'Hayden Haynes', 'Ab ipsam possimus t', 'Autem laborum quod d', 'Quis at nisi natus c', 'Sint mollitia quos d', 12, 13, 12, 8, 0, 2, 2, '2023-05-19 16:53:06', '2023-05-19 10:53:06'),
(2, 1, 'Sunt sed dignissimos', 'Urielle Howell', 'Seth Tucker', 'Aut fuga Ad quisqua', 'Enim enim necessitat', 'Hic in quis ullam fa', 'Officia eiusmod temp', 13, 12, 12, 3, 0, 2, 2, '2023-05-19 16:53:14', '2023-05-19 10:53:14'),
(3, 1, 'Dolore velit eu cons', 'Frances Bryant', 'Bertha Baldwin', NULL, 'Placeat blanditiis', 'Ut sit commodi non i', 'Voluptas duis perfer', NULL, NULL, NULL, NULL, 1, 2, 2, '2023-09-13 23:22:24', '2023-09-13 17:22:24'),
(4, 1, 'Possimus quisquam e', 'Sylvia Finch', 'Buffy Todd', '90', 'Quo sit ut dolor ad', 'Est est natus et nih', 'Eveniet omnis eaque', NULL, NULL, NULL, NULL, 1, 2, 2, '2023-09-13 23:22:36', '2023-09-23 16:24:39'),
(5, 1, 'Illo facere ducimus', 'Xaviera Keller', 'Clarke Serrano', 'Et ut architecto mol', 'Qui eos reiciendis', 'Vitae et ut ipsam re', 'Est in officiis ut', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-09-14 19:07:11', '2023-09-14 13:07:11'),
(6, 1, 'Quidem quibusdam lab', 'Cyrus Thornton', 'Iliana Mckee', 'Provident voluptate', 'Recusandae Adipisci', 'Velit mollit ut saep', 'Et deserunt aut fuga', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-09-23 22:24:17', '2023-09-23 16:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `text_books`
--

CREATE TABLE `text_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(125) DEFAULT NULL,
  `book_level` tinyint(4) DEFAULT NULL,
  `parent_book` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text_books`
--

INSERT INTO `text_books` (`id`, `book_name`, `book_level`, `parent_book`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Textbook 1', 0, 0, 1, NULL, NULL, NULL, '2023-03-15 08:14:47'),
(2, 'Code', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 08:14:47'),
(3, 'Book Name', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 08:16:25'),
(4, 'Author(s) Name', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 08:16:25'),
(5, 'ISBN No', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 08:17:04'),
(6, 'Copyright', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 08:17:04'),
(7, 'Publisher', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 08:17:46'),
(8, 'Edition No', 1, 1, 1, NULL, NULL, NULL, '2023-03-15 08:17:46'),
(9, 'Textbook 2', 0, 0, 1, NULL, NULL, NULL, '2023-03-15 08:14:47'),
(10, 'Code', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 08:14:47'),
(11, 'Book Name', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 08:16:25'),
(12, 'Author(s) Name', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 08:16:25'),
(13, 'ISBN No', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 08:17:04'),
(14, 'Copyright', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 08:17:04'),
(15, 'Publisher', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 08:17:46'),
(16, 'Edition No', 1, 9, 1, NULL, NULL, NULL, '2023-03-15 08:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `time_sheet_items`
--

CREATE TABLE `time_sheet_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_sheet_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_sheet_items`
--

INSERT INTO `time_sheet_items` (`id`, `time_sheet_id`, `date`, `time_in`, `time_out`, `created_at`, `updated_at`) VALUES
(6, 2, '2023-06-30 19:39:00', '2023-07-21 19:39:00', '2023-06-21 19:39:00', '2023-06-06 13:40:08', '2023-06-06 13:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `time_sheet_reports`
--

CREATE TABLE `time_sheet_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `employee_name` varchar(125) NOT NULL,
  `start_period` decimal(20,2) NOT NULL,
  `end_period` decimal(20,2) NOT NULL,
  `pay_period` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `sheet_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_sheet_reports`
--

INSERT INTO `time_sheet_reports` (`id`, `school_id`, `date`, `employee_name`, `start_period`, `end_period`, `pay_period`, `created_at`, `updated_at`, `department_id`, `sheet_no`) VALUES
(2, 1, '1973-01-28 22:51:00', 'Maite Phillips', 8.00, 78.00, 80.00, '2023-06-06 13:39:50', '2023-06-06 13:40:08', 5, 'Occaecat dicta do as');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `offer_id` bigint(20) DEFAULT NULL,
  `bank_account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `campus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_url` varchar(50) DEFAULT NULL,
  `method` varchar(125) DEFAULT NULL,
  `amount` double(15,2) NOT NULL,
  `type` varchar(125) NOT NULL,
  `sub_type` varchar(125) DEFAULT NULL,
  `account_type` varchar(125) DEFAULT NULL,
  `status` varchar(125) NOT NULL,
  `note` text,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_no` varchar(125) DEFAULT NULL,
  `return_transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_tax` decimal(20,6) DEFAULT NULL,
  `item_received` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `comment` text,
  `shipping_address_line1` varchar(100) DEFAULT NULL,
  `shipping_address_line2` varchar(100) DEFAULT NULL,
  `shipping_address_city` varchar(100) DEFAULT NULL,
  `shipping_address_state` varchar(100) DEFAULT NULL,
  `shipping_address_zip` varchar(100) DEFAULT NULL,
  `billing_address_line1` varchar(100) DEFAULT NULL,
  `billing_address_line2` varchar(100) DEFAULT NULL,
  `billing_address_city` varchar(100) DEFAULT NULL,
  `billing_address_state` varchar(100) DEFAULT NULL,
  `billing_address_zip` varchar(100) DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `shipping_method` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT 'due'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `school_id`, `unique_id`, `date`, `user_id`, `account_id`, `transaction_id`, `item_type`, `order_id`, `offer_id`, `bank_account_id`, `project_id`, `campus_id`, `file_url`, `method`, `amount`, `type`, `sub_type`, `account_type`, `status`, `note`, `created_by`, `created_at`, `updated_at`, `invoice_no`, `return_transaction_id`, `total_tax`, `item_received`, `description`, `comment`, `shipping_address_line1`, `shipping_address_line2`, `shipping_address_city`, `shipping_address_state`, `shipping_address_zip`, `billing_address_line1`, `billing_address_line2`, `billing_address_city`, `billing_address_state`, `billing_address_zip`, `due_date`, `message`, `shipping_method`, `payment_status`) VALUES
(9, 1, '16d5608e-38c6-412e-b83d-1dba9efa9ab0', '1999-08-28 05:45:00', 179, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, 102.00, 'purchase_debit_memo', NULL, NULL, 'pending', 'Consequatur Volupta', 2, '2023-11-11 11:15:34', '2023-11-11 11:15:34', 'PCN-2023-000008', NULL, NULL, NULL, NULL, 'Quis accusamus porro', '454 West Old Avenue', 'Pariatur Do volupta', 'Deleniti est unde co', 'Sint atque ut ullam', '63253', '45 White Clarendon Court', 'Neque ipsum laudanti', 'Molestiae eos quaera', 'Repudiandae consecte', '46066', '2000-05-06 23:54:00', 'Soluta in necessitat', 'Dignissimos porro sa', 'due'),
(10, 1, '64231ba4-70a0-4e33-84e3-7693b8cd219d', '1977-03-06 07:51:00', 179, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 83.00, 'purchase-return', NULL, NULL, 'pending', NULL, 2, '2023-11-11 15:01:57', '2023-11-11 15:12:32', 'PR-2023-000012', NULL, NULL, NULL, NULL, NULL, '810 South New Extension', 'Nulla magni sed mini', 'Voluptatibus illum', 'Pariatur Nam quod f', '87566', '728 Clarendon Extension', 'Asperiores quam ex e', 'Sequi nostrum deleni', 'Atque libero soluta', '43053', '2015-05-17 19:32:00', NULL, 'Vero laborum officia', 'due'),
(11, 1, '9d116e28-20de-4adc-8bee-5df1f9dfeb48', '1994-01-26 23:33:00', 179, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, 2994.15, 'purchase-return', NULL, NULL, 'pending', 'Nihil mollit rerum v', 2, '2023-11-11 16:38:58', '2023-11-11 16:38:58', 'PR-2023-000013', NULL, NULL, NULL, NULL, 'Temporibus quaerat s', '888 East First Drive', 'Qui quisquam qui cum', 'Velit saepe optio', 'Adipisicing dolores', '42532', '764 Nobel Parkway', 'Aliquip facilis nobi', 'Non excepturi blandi', 'Ipsam expedita est f', '19306', '1979-12-11 01:35:00', 'Proident fuga Prae', 'Fugiat in aut repudi', 'due'),
(12, 1, 'feb41493-1861-469c-a37c-14b5ba93e737', '1984-06-03 06:39:00', 179, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, 2264.15, 'purchase_debit_memo', NULL, NULL, 'pending', 'Temporibus exercitat', 2, '2023-11-11 16:42:04', '2023-11-11 16:42:04', 'PCN-2023-000009', NULL, NULL, NULL, NULL, 'Sit voluptatem fac', '96 West Oak Lane', 'Similique recusandae', 'Cum consequatur cul', 'Earum accusantium pa', '17582', '53 South Rocky First Drive', 'Aut voluptate aliqua', 'Eu eaque voluptatibu', 'Aliquid aliqua Sed', '14956', '2002-05-01 21:23:00', 'Dolore quo ex do hic', 'Quis incididunt sed', 'due'),
(13, 1, '7209b1ac-5884-4e8f-b53e-31d85d5aef98', '2009-08-22 23:18:00', 179, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, 2904.14, 'purchase_credit_memo', NULL, NULL, 'pending', 'Iusto magna distinct', 2, '2023-11-11 16:48:31', '2023-11-11 16:48:31', 'PCN-2023-000010', NULL, NULL, NULL, NULL, 'Quis aliqua Autem d', '43 North Second Lane', 'Enim irure laboriosa', 'Illo quis cumque dol', 'Exercitation in et l', '52039', '341 West New Parkway', 'Suscipit iure et nis', 'Fuga Odit a soluta', 'Est voluptates adipi', '86564', '1971-10-17 07:32:00', 'Tempore dolore cons', 'Obcaecati eius tempo', 'due'),
(15, 1, '02bb6332-ce7a-4e9a-9ca5-1e05172f5e32', '2023-11-12 00:08:15', NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, 20770.02, 'purchase', NULL, NULL, 'pending', NULL, NULL, '2023-11-11 18:08:15', '2023-11-11 18:08:15', 'INV-2023-000001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'due');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_charges`
--

CREATE TABLE `transaction_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(125) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `order_item_id` bigint(20) DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL,
  `account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `addition` decimal(20,2) DEFAULT NULL,
  `deduction` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `tax` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
  `transaction_item_id` bigint(20) DEFAULT NULL,
  `received_qty` int(11) DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `received_by` bigint(20) DEFAULT NULL,
  `addition_rate` decimal(15,2) DEFAULT NULL,
  `deduction_rate` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `item_id`, `quantity`, `order_item_id`, `cost`, `account_id`, `created_at`, `updated_at`, `transaction_id`, `addition`, `deduction`, `sub_total`, `tax`, `total`, `transaction_item_id`, `received_qty`, `received_at`, `received_by`, `addition_rate`, `deduction_rate`) VALUES
(1, 6, 1.00, NULL, 87.00, NULL, '2023-11-04 18:12:49', '2023-11-04 18:12:49', 1, 56.00, 54.00, 89.00, NULL, 89.00, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 29, 1.00, NULL, 80.00, NULL, '2023-11-10 19:44:49', '2023-11-10 19:44:49', 4, NULL, NULL, 80.00, NULL, 80.00, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 29, 1.00, NULL, 80.00, NULL, '2023-11-10 19:44:49', '2023-11-10 19:44:49', 5, NULL, NULL, 80.00, NULL, 80.00, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 29, 1.00, NULL, 80.00, NULL, '2023-11-11 09:32:33', '2023-11-11 09:32:33', 7, 50.00, 54.00, 76.00, 0.00, 76.00, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, 1.00, 5, 80.00, NULL, '2023-11-11 11:11:15', '2023-11-11 11:11:15', 8, 50.00, 54.00, 76.00, 0.00, 76.00, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 5, 1.00, 6, 18.00, NULL, '2023-11-11 11:11:15', '2023-11-11 11:11:15', 8, 40.00, 32.00, 26.00, 0.00, 26.00, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 3, 1.00, 29, 80.00, NULL, '2023-11-11 11:15:34', '2023-11-11 11:15:34', 9, 50.00, 54.00, 76.00, 0.00, 76.00, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 5, 1.00, 30, 18.00, NULL, '2023-11-11 11:15:34', '2023-11-11 11:15:34', 9, 40.00, 32.00, 26.00, 0.00, 26.00, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 3, 1.00, 31, 80.00, NULL, '2023-11-11 15:12:32', '2023-11-11 15:12:32', 10, 4.00, 1.00, 83.00, 0.00, 83.00, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 2, 10.00, 33, 59.00, NULL, '2023-11-11 16:38:58', '2023-11-11 16:38:58', 11, 10.00, 15.00, 585.00, 292.50, 877.50, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 5, 5.00, 34, 18.00, NULL, '2023-11-11 16:38:58', '2023-11-11 16:38:58', 11, 5.00, 3.35, 91.65, 275.00, 366.65, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 6, 10.00, 35, 87.00, NULL, '2023-11-11 16:38:58', '2023-11-11 16:38:58', 11, 12.50, 7.50, 875.00, 875.00, 1750.00, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 2, 5.00, 33, 59.00, NULL, '2023-11-11 16:42:04', '2023-11-11 16:42:04', 12, 5.00, 7.50, 292.50, 292.50, 585.00, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 5, 5.00, 34, 18.00, NULL, '2023-11-11 16:42:04', '2023-11-11 16:42:04', 12, 5.00, 3.35, 91.65, 275.00, 366.65, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 6, 5.00, 35, 87.00, NULL, '2023-11-11 16:42:04', '2023-11-11 16:42:04', 12, 6.25, 3.75, 437.50, 875.00, 1312.50, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 2, 15.00, 33, 59.00, NULL, '2023-11-11 16:48:31', '2023-11-11 16:48:31', 13, 15.00, 22.50, 877.50, 292.50, 1170.00, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 5, 8.00, 34, 18.00, NULL, '2023-11-11 16:48:31', '2023-11-11 16:48:31', 13, 8.00, 5.36, 146.64, 275.00, 421.64, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 6, 5.00, 35, 87.00, NULL, '2023-11-11 16:48:31', '2023-11-11 16:48:31', 13, 6.25, 3.75, 437.50, 875.00, 1312.50, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 2, 90.00, 33, 59.00, NULL, '2023-11-11 18:06:44', '2023-11-11 18:06:44', 14, 90.00, 135.00, 5265.00, 263.25, 5528.25, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 5, 118.00, 34, 18.00, NULL, '2023-11-11 18:06:44', '2023-11-11 18:06:44', 14, 118.00, 79.06, 2162.94, 216.33, 2379.27, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 6, 140.00, 35, 87.00, NULL, '2023-11-11 18:06:44', '2023-11-11 18:06:44', 14, 175.00, 105.00, 12250.00, 612.50, 12862.50, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 2, 90.00, 33, 59.00, NULL, '2023-11-11 18:08:15', '2023-11-11 18:08:15', 15, 90.00, 135.00, 5265.00, 263.25, 5528.25, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 5, 118.00, 34, 18.00, NULL, '2023-11-11 18:08:15', '2023-11-11 18:08:15', 15, 118.00, 79.06, 2162.94, 216.33, 2379.27, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 6, 140.00, 35, 87.00, NULL, '2023-11-11 18:08:15', '2023-11-11 18:08:15', 15, 175.00, 105.00, 12250.00, 612.50, 12862.50, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_taxes`
--

CREATE TABLE `transaction_taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `tax_id` bigint(20) UNSIGNED NOT NULL,
  `percent` decimal(8,2) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tuition`
--

CREATE TABLE `tuition` (
  `id` int(11) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` varchar(125) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition`
--

INSERT INTO `tuition` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Domestic Students ', 1, NULL, NULL, NULL, '2023-01-29 19:18:59'),
(2, 'International Students', 1, NULL, NULL, NULL, '2023-01-29 19:19:21'),
(3, 'Especial Needs Student', 1, NULL, NULL, NULL, '2023-01-29 19:19:42'),
(4, 'Handicapped Students', 1, NULL, NULL, NULL, '2023-01-29 19:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `tuition_invoice_settings`
--

CREATE TABLE `tuition_invoice_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `has_late_fee` tinyint(1) DEFAULT '0',
  `late_fee` decimal(15,2) DEFAULT NULL,
  `has_cumulative_late_fee` tinyint(1) DEFAULT '0',
  `interval` int(11) DEFAULT NULL,
  `cumulative_late_fee` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  `program_id` bigint(20) DEFAULT NULL,
  `grade_year_id` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tuition_invoice_settings`
--

INSERT INTO `tuition_invoice_settings` (`id`, `date`, `due_date`, `has_late_fee`, `late_fee`, `has_cumulative_late_fee`, `interval`, `cumulative_late_fee`, `created_at`, `updated_at`, `school_id`, `program_id`, `grade_year_id`, `status`) VALUES
(1, '2023-07-07 00:00:00', '2023-07-08 00:00:00', 1, 50.00, 1, 7, 50.00, '2023-07-26 15:30:15', '2023-07-26 16:52:40', 1, 19, 40, 1),
(5, '2023-07-06 00:00:00', '2023-07-07 00:00:00', 0, NULL, NULL, NULL, NULL, '2023-07-26 16:33:12', '2023-07-26 16:33:12', 1, 16, 40, 0),
(6, '2023-07-06 00:00:00', '2023-07-13 00:00:00', 1, 500.00, 1, 5, 50.00, '2023-07-28 19:02:31', '2023-07-28 19:02:31', 1, 16, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(125) DEFAULT NULL,
  `nick_name` varchar(125) DEFAULT NULL,
  `designation` varchar(125) DEFAULT NULL,
  `email` varchar(125) NOT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `office_phone` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  `address` text,
  `user_type` int(5) NOT NULL DEFAULT '99',
  `picture` varchar(100) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `active` varchar(1) NOT NULL DEFAULT 'Y',
  `create_by` varchar(125) DEFAULT '1',
  `name` varchar(50) DEFAULT NULL,
  `update_by` varchar(125) DEFAULT '1',
  `first_name` varchar(125) DEFAULT NULL,
  `last_name` varchar(125) DEFAULT NULL,
  `middle_name` varchar(125) DEFAULT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `education` varchar(125) DEFAULT NULL,
  `corporation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `insurance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `allow_login` tinyint(4) DEFAULT '1',
  `gender` varchar(50) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `emergency_contact_id` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `born_in_country` varchar(50) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `languages_spoken` varchar(50) DEFAULT NULL,
  `citizenship_status` varchar(50) DEFAULT NULL,
  `teaching_experience` text,
  `certification_and_training` text,
  `last_credit_check` date DEFAULT NULL,
  `last_criminal_bg_check` date DEFAULT NULL,
  `last_drug_check` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `feedback` text,
  `comment` text,
  `languages_spken` varchar(200) DEFAULT NULL,
  `bike_info` text,
  `volunteer_activities` text,
  `locker_no` varchar(50) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `car_id` bigint(20) DEFAULT NULL,
  `case_manager_id` bigint(20) DEFAULT NULL,
  `special_services` varchar(200) DEFAULT NULL,
  `awards_and_achievments` text,
  `parking_stall_no` varchar(50) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `unique_id` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `nick_name`, `designation`, `email`, `mobile_phone`, `office_phone`, `fax`, `password`, `verified_at`, `school_id`, `address`, `user_type`, `picture`, `status`, `active`, `create_by`, `name`, `update_by`, `first_name`, `last_name`, `middle_name`, `address_id`, `contact_id`, `education`, `corporation_id`, `insurance_id`, `created_at`, `updated_at`, `allow_login`, `gender`, `image_path`, `emergency_contact_id`, `dob`, `nationality`, `born_in_country`, `hire_date`, `languages_spoken`, `citizenship_status`, `teaching_experience`, `certification_and_training`, `last_credit_check`, `last_criminal_bg_check`, `last_drug_check`, `termination_date`, `department`, `feedback`, `comment`, `languages_spken`, `bike_info`, `volunteer_activities`, `locker_no`, `doctor_id`, `car_id`, `case_manager_id`, `special_services`, `awards_and_achievments`, `parking_stall_no`, `last_login_at`, `ip`, `unique_id`) VALUES
(1, 'Super Admin', NULL, 'Admin', 'gsoroar@gmail.com', NULL, NULL, NULL, '$2y$10$odMcbxNh9VhO9MMcZNzFJ.T.Yi/iFDxnxUGkIkYnFG/k90iiGuAFu', NULL, 0, NULL, 99, NULL, 1, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-30 04:40:42', '2022-05-30 04:40:42', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'test3', NULL, NULL, 'test3@gmail.com', '233445', NULL, NULL, '$2a$12$mrZi64YWLSGGMkrF3GL.O.1z1rebwYdBfbnT.tcoDUQvUtrCoJi4i', NULL, 1, '3', 3, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-25 20:50:07', '2023-11-12 10:53:19', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-12 16:53:19', '127.0.0.1', NULL),
(3, 'test4', NULL, 'ceo', 'test4@gmail.com', '34445', '34565', NULL, '$2y$10$odMcbxNh9VhO9MMcZNzFJ.T.Yi/iFDxnxUGkIkYnFG/k90iiGuAFu', NULL, 1, '4', 4, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-25 20:50:07', '2022-11-25 20:50:07', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Test5', NULL, NULL, 'test55@gmail.com', '35464566', NULL, NULL, '$2y$10$8aMjsX7IDuYrtQfkUDkz..L4.eFIDtBYDXfS6qLiAxo6.DM87xWva', NULL, 2, '5', 3, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-25 21:01:43', '2022-11-25 21:01:43', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Rashed', NULL, 'ceo', 'test66@gmail.com', '4355546', '3455545', NULL, '$2y$10$ZaHKU9F9obRfU0dyELhFcObVBpzm/qIX2Ywpu3K7VxH/NU7A24P5S', NULL, 2, '6', 4, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-25 21:01:43', '2022-11-25 21:01:43', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Director1', NULL, 'Director', 'director1@gmail.com', '+8801746555579', '+8801746555578', NULL, '$2y$10$aDiDOdtvm8CWBd2Z0/QTB.wsww3GM91tM.jsVFe2ZRd8JoXThMMF6', NULL, 1, '8', 5, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-26 08:41:15', '2022-11-26 08:41:15', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'shawn', NULL, NULL, 'shawn.doosti@yahoo.ca', '6043467461', NULL, NULL, '$2y$10$oaRvXLaDXBZjc/0uDagTvOlWG4MbPLTennBb8hCt7z4qdj7pq3eaK', NULL, 3, '9', 3, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-27 02:21:28', '2022-11-27 02:21:28', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'SHAWN', NULL, NULL, 'cityofautism@gmail.com', '6043467461', NULL, NULL, '$2y$10$NsiURdPZIzzUR1HUHKZJ1eGi46qa5PExhQ.Dt9ZF2QfaX6FVMQUcy', NULL, 4, '11', 3, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 18:46:52', '2022-12-10 18:46:52', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, NULL, NULL, NULL, 'wiqikid@mailinator.com', NULL, NULL, NULL, '$2y$10$vXRKdchdTwRs98mMJKgweOy3.mUuins2/mKr..40v.j0xZ6KygtNu', NULL, 1, NULL, 10, NULL, 0, 'Y', '1', NULL, '1', 'Ezekiel', 'Matthews', 'Illiana Little', 451, 426, 'Consequatur Modi po', 54, NULL, '2023-11-04 16:15:39', '2023-11-04 16:35:07', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'In aliquam aliquam a', 'Quidem eligendi assu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-04 22:35:07', '127.0.0.1', NULL),
(178, NULL, NULL, NULL, 'qahu@mailinator.com', NULL, NULL, NULL, '$2y$10$rplaPcQlpHOfmEJiIzdEXOL4apex5yt7O.LCaAAU2ZMxXw3DVYxN6', NULL, 1, NULL, 11, NULL, 0, 'Y', '1', NULL, '1', 'Indigo', 'Carpenter', 'Nita Dunn', 448, 423, 'Id qui qui iste ea r', 53, NULL, '2023-11-04 16:15:32', '2023-11-04 16:15:32', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Libero voluptate tem', 'Eos officia fugiat p', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'creator23', NULL, NULL, 'creator23@gmail.com', '01746555579', NULL, NULL, '$2y$10$qViosXRdvnZlrQ3o3JLzmOyYygY2joqWVKw5E89xylWfrG7OkoId2', NULL, 8, '17', 3, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 18:25:31', '2023-03-01 18:25:31', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Golam Soroar', NULL, 'na', 'gsoroar34@gmail.com', '01746555579', NULL, NULL, '$2y$10$wIdXMsyr8WyiqEp1VDZ71./O1oKrs/BgRSwmqQWFTPccRmZSJlt1i', NULL, 8, '18', 4, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 18:25:31', '2023-03-01 18:25:31', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Rifat', NULL, NULL, 'rifat@gmail.com', '43554', NULL, NULL, '$2y$10$1x8ooA4pnFqJpjyAbfF/cebc/wdzwmfFQb02lr/6gQaQzUupl.SyO', NULL, 10, '21', 3, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 16:28:25', '2023-03-16 16:28:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Rahat', NULL, 'ceo', 'rahat@gmail.com', '2344455r', '44554365465', NULL, '$2y$10$6D.Kpg.YTDyKbMKj4Ce02.kscfm2y8f36rIjhaCXNjz4HKQIZgyKy', NULL, 10, '22', 4, NULL, 1, 'Y', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 16:28:25', '2023-03-16 16:28:25', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, NULL, NULL, NULL, 'wolov@mailinator.com', NULL, NULL, NULL, '$2y$10$Kkf3llolzjzQ1sFQhtp.pOv4IRLohUqpQxQ5I9QC4UVyOP0inoO1W', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Nayda', 'Gomez', 'Gareth Bond', 435, 394, 'Vel corrupti quis o', NULL, NULL, '2023-10-30 16:25:25', '2023-10-30 16:25:25', 1, 'other', NULL, 395, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, NULL, NULL, NULL, 'jegik@mailinator.com', NULL, NULL, NULL, '$2y$10$54C9px/MpnAHvCC3KXNX7O.Sb34OBBNgKcKakhwY/jea6OjxFlpUq', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Hayley', 'Sampson', 'Kellie Houston', 436, 396, 'Doloremque delectus', NULL, NULL, '2023-10-30 16:25:38', '2023-10-30 16:25:38', 1, 'female', NULL, 397, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, NULL, NULL, NULL, 'gobysug@mailinator.com', NULL, NULL, NULL, '$2y$10$/GWc6yFInjKCpRXbH6rVl.TYUY3Z8s5RBCUDhjcwYW13vd6uABRae', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Rinah', 'Goff', 'Davis Bennett', 437, 398, 'Aperiam aperiam aliq', NULL, NULL, '2023-10-30 16:25:54', '2023-10-30 16:25:54', 1, 'male', NULL, 399, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, NULL, NULL, NULL, 'pyvig@mailinator.com', NULL, NULL, NULL, '$2y$10$bhVOZ5OKkC08JydaIBb9iOl0k1l7Unx8iuECCDj9qEDZVFssZhMBC', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Barbara', 'Ferguson', 'Denton Sears', 438, 400, 'Duis eligendi fugiat', NULL, NULL, '2023-10-30 16:26:05', '2023-10-30 16:26:05', 1, 'male', NULL, 401, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, NULL, NULL, NULL, 'repi@mailinator.com', NULL, NULL, NULL, '$2y$10$xTOY8Iadzke.0s5YwhJGZOvr91RcTdVoWCX8qAL1Dgc82c5.Ay4Wu', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Elton', 'Foley', 'Jamal Soto', 439, 402, 'Labore tempora saepe', NULL, NULL, '2023-10-30 16:26:19', '2023-10-30 16:26:19', 1, 'female', NULL, 403, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, NULL, NULL, NULL, 'viqecuzyju@mailinator.com', NULL, NULL, NULL, '$2y$10$SOl.FRb.cvWLHF.rjcVOcO8rUBevI//vq4HIgfrTLJqUdYjjv0JEO', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Ryder', 'York', 'Prescott Waller', 440, 404, 'Et cupidatat delectu', NULL, NULL, '2023-10-30 16:26:35', '2023-10-30 16:26:35', 1, 'female', NULL, 405, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, NULL, NULL, NULL, 'doxubytid@mailinator.com', NULL, NULL, NULL, '$2y$10$9Qp39/GMFutPKxQK/fIVOubvtJSVrv0ibzrhBRy1apo0V4XTvHr8G', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Hop', 'Cummings', 'Armando Knapp', 441, 406, 'Ut ipsam qui ipsa c', NULL, NULL, '2023-10-30 16:26:49', '2023-10-30 16:26:49', 1, 'male', NULL, 407, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, NULL, NULL, NULL, 'byqyg@mailinator.com', NULL, NULL, NULL, '$2y$10$Idnh3lHMhKUaRTwG8QCaU.JF2uiEdk8P5XkmmPCx4Up/AEnKYpGUm', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Althea', 'Vinson', 'Hope Ayala', 442, 408, 'Eum placeat reprehe', NULL, NULL, '2023-10-30 16:27:04', '2023-10-30 16:27:04', 1, 'female', NULL, 409, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, NULL, NULL, NULL, 'povo@mailinator.com', NULL, NULL, NULL, '$2y$10$mXlWCf1dHhsOMUSkzSjituA2UcWS2o8EAnKKyClBeBL7uH3QAXvWa', NULL, 1, NULL, 8, NULL, 0, 'Y', '1', NULL, '1', 'Halee', 'Snyder', 'Lance Lane', 443, 410, 'Dicta veniam quas v', NULL, NULL, '2023-10-30 16:27:20', '2023-10-30 16:27:20', 1, 'female', NULL, 411, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, NULL, NULL, NULL, 'qyhocefedo@mailinator.com', '+1 (479) 567-4264', NULL, NULL, '$2y$10$vXVM22M85PzDRbh.eIc92ObVlnfdQYYHnQ/KF5x1EBH82HINCIdoW', NULL, 1, NULL, 9, NULL, 1, 'Y', '1', NULL, '1', 'Robert', 'Mcfadden', 'Myles Downs', 444, NULL, NULL, NULL, NULL, '2023-10-30 16:28:58', '2023-10-30 16:28:58', 1, 'other', NULL, 412, '2005-12-17', 'Omnis et ipsum nemo', 'Fugit mollitia et p', NULL, NULL, 'Perspiciatis fugiat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laborum Expedita te', 'Deserunt dolore inci', NULL, 'Possimus praesentiu', 'Odio unde atque in a', 'Consequatur Quis no', 413, 45, NULL, NULL, NULL, 'Ut a nostrud neque r', NULL, NULL, NULL),
(175, NULL, NULL, NULL, 'zanilyp@mailinator.com', '+1 (689) 401-5524', NULL, NULL, '$2y$10$jstv1H3bPCrprjtnRLbuU.CoUzIfFOegJNmhOacWkrF8vPh4A6zqG', NULL, 1, NULL, 9, NULL, 1, 'Y', '1', NULL, '1', 'Zahir', 'Barker', 'Ingrid Gilmore', 445, NULL, NULL, NULL, NULL, '2023-10-30 16:29:41', '2023-10-30 16:29:41', 1, 'other', NULL, 415, '2012-02-07', 'Quia dicta deleniti', 'Eius adipisicing rep', NULL, NULL, 'Itaque est quisquam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Minim amet nihil id', 'Delectus in qui et', NULL, 'Molestiae est ut per', 'Enim voluptas deseru', 'Aliqua Aut placeat', 416, 46, NULL, NULL, NULL, 'Ex atque est vero l', NULL, NULL, NULL),
(176, NULL, NULL, NULL, 'worilyzo@mailinator.com', '+1 (186) 737-8006', NULL, NULL, '$2y$10$znAI6KvXiMUD5ZtpjJKBTuGyRdK7oHoE1Eaf2KIO6GRt3CCe/mFby', NULL, 1, NULL, 9, NULL, 1, 'Y', '1', NULL, '1', 'Ramona', 'Cotton', 'Kirby Vinson', 446, NULL, NULL, NULL, NULL, '2023-10-30 16:30:14', '2023-10-30 16:30:14', 1, 'other', NULL, 418, '1975-05-15', 'Exercitationem dolor', 'Esse suscipit et qu', NULL, NULL, 'Sit dolor ipsam in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Placeat aliquid qui', 'Qui nihil delectus', NULL, 'Aut lorem ea aliqua', 'Ut aut ad temporibus', 'Odio asperiores quos', 419, 47, NULL, NULL, NULL, 'Omnis repellendus M', NULL, NULL, NULL),
(177, NULL, NULL, 'Tempora qui dicta qu', 'teacher@gmail.com', NULL, NULL, NULL, '$2y$10$TZ8VS/CPDMDOW6FCfzl5UuEA7nK5fT0O534hAzgrSHZZqXTY1jOwi', NULL, 1, NULL, 6, NULL, 0, 'Y', '1', NULL, '1', 'Hunter', 'Sweeney', 'Cedric Finley', 447, 421, 'Pariatur Perferendi', NULL, NULL, '2023-10-30 16:32:56', '2023-11-01 17:25:23', 1, 'other', NULL, 422, '1977-02-01', 'Voluptas amet facil', 'Labore modi occaecat', '2012-08-13', 'Laudantium sed et p', 'Aliquam quam corrupt', 'Labore ad necessitat', 'Laborum quis enim vo', '1995-12-16', '2012-11-21', '1986-06-10', '1975-02-24', 'Provident deserunt', 'Accusamus nisi proid', 'Veniam quidem vero', NULL, 'Esse est commodo na', 'Lorem saepe vitae no', 'Excepturi aut qui la', NULL, 48, NULL, NULL, NULL, 'Amet qui suscipit b', '2023-11-01 23:25:23', '127.0.0.1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `public` tinyint(2) NOT NULL DEFAULT '1',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `slug`, `public`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, 1, 1, 1, 1, '2022-11-26 02:40:35', '2022-11-26 02:40:35'),
(2, 'Admin', NULL, 1, 1, 1, 1, '2022-11-26 02:41:25', '2022-11-26 02:41:25'),
(3, 'School Creator', NULL, 1, 1, 1, 1, '2022-11-26 02:41:25', '2022-11-26 02:41:25'),
(4, 'Authorize Person', NULL, 1, 1, 1, 1, '2022-11-26 02:41:25', '2022-11-26 02:41:25'),
(5, 'Board of Directors', 'board-of-director', 0, 1, 1, 1, '2022-11-26 13:46:00', '2022-11-26 13:46:00'),
(6, 'Teacher', 'teacher', 1, 1, 1, 1, '2022-12-29 01:32:39', '2022-12-29 01:32:39'),
(7, 'Bank', 'bank', 1, 1, 1, 1, '2023-04-10 23:22:42', '2023-04-10 23:22:42'),
(8, 'Parent', 'parent', 1, 1, 1, 1, '2023-04-10 23:22:58', '2023-04-10 23:22:58'),
(9, 'Student', 'student', 1, 1, 1, 1, '2023-04-10 23:23:11', '2023-04-10 23:23:11'),
(10, 'Service Provider', 'service-provider', 1, 1, 1, 1, '2023-04-13 17:49:52', '2023-04-13 17:49:52'),
(11, 'Seller', 'seller', 1, 1, 1, 1, '2023-04-13 17:50:04', '2023-04-13 17:50:04'),
(12, 'Guardian', 'guardian', 1, 1, 1, 1, '2023-05-15 00:35:31', '2023-05-15 00:35:31'),
(13, 'Case Manager', 'case-manager', 1, 1, 1, 1, '2023-07-09 18:59:37', '2023-07-09 18:59:37'),
(14, 'Resource Teacher', 'resource-teacher', 1, 1, 1, 1, '2023-07-09 18:59:54', '2023-07-09 18:59:54'),
(15, 'Employee', 'employee', 1, 1, 1, 1, '2023-07-12 23:05:09', '2023-07-12 23:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `utility_accounts`
--

CREATE TABLE `utility_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(125) NOT NULL,
  `account_no` varchar(125) NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `charge_amount` decimal(15,2) NOT NULL,
  `comment` text,
  `service_type` varchar(125) DEFAULT NULL,
  `payment_due_date` datetime DEFAULT NULL,
  `expected-due-date` datetime DEFAULT NULL,
  `service_start_date` datetime DEFAULT NULL,
  `service_end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utility_accounts`
--

INSERT INTO `utility_accounts` (`id`, `school_id`, `name`, `account_no`, `contact_id`, `address_id`, `charge_amount`, `comment`, `service_type`, `payment_due_date`, `expected-due-date`, `service_start_date`, `service_end_date`, `created_at`, `updated_at`) VALUES
(2, 1, 'Burke Wilder', 'Nemo eum iure exerci', 369, 425, 900.00, 'Non non animi aut e', 'Internet', '1995-06-19 14:45:00', NULL, '1986-03-18 00:50:00', '1989-07-17 06:22:00', '2023-10-12 17:45:36', '2023-10-12 17:45:36'),
(3, 1, 'Burke Wilder', 'Nemo eum iure exerci', 370, 426, 900.00, 'Non non animi aut e', 'Internet', '1995-06-19 14:45:00', NULL, '1986-03-18 00:50:00', '1989-07-17 06:22:00', '2023-10-12 17:48:36', '2023-10-12 17:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_no` varchar(125) NOT NULL,
  `make` varchar(125) NOT NULL,
  `color` varchar(125) NOT NULL,
  `model` varchar(125) NOT NULL,
  `year` varchar(125) NOT NULL,
  `plate_no` varchar(125) NOT NULL,
  `image` varchar(125) DEFAULT NULL,
  `vehicle_insurance_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `school_id`, `vehicle_no`, `make`, `color`, `model`, `year`, `plate_no`, `image`, `vehicle_insurance_id`, `vehicle_type_id`, `created_at`, `updated_at`) VALUES
(2, 1, '420', 'Dolorem error dolore', 'Ut aut labore occaec', 'Perspiciatis provid', '2011', 'Consequatur accusam', NULL, 8, 1, '2023-08-11 10:58:29', '2023-08-11 10:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_insurances`
--

CREATE TABLE `vehicle_insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(125) NOT NULL,
  `policy_no` varchar(125) NOT NULL,
  `expire_date` datetime NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `document` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL,
  `address_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_insurances`
--

INSERT INTO `vehicle_insurances` (`id`, `school_id`, `company_name`, `policy_no`, `expire_date`, `expired`, `document`, `created_at`, `updated_at`, `contact_id`, `address_id`) VALUES
(1, 1, 'Watson and Todd Associates', '844', '1986-10-07 00:00:00', 0, NULL, '2023-08-10 19:46:05', '2023-08-10 19:46:05', NULL, NULL),
(2, 1, 'Maxwell Cohen Traders', '478', '1989-03-26 00:00:00', 0, NULL, '2023-08-11 09:44:33', '2023-08-11 09:44:33', NULL, NULL),
(6, 1, 'Mcguire Griffin Plc', '182', '1987-03-26 00:00:00', 0, NULL, '2023-08-11 10:36:00', '2023-08-11 10:36:00', NULL, NULL),
(7, 1, 'Baird and Patrick Co', '365', '1997-12-22 00:00:00', 0, NULL, '2023-08-11 10:36:47', '2023-08-11 10:36:47', NULL, NULL),
(8, 1, 'Ware Patel Associates', '252', '2023-08-22 00:00:00', 0, NULL, '2023-08-11 10:58:29', '2023-08-11 11:12:53', 352, 405);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `school_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'MacKenzie Fitzpatrick', '2023-08-10 17:18:52', '2023-08-10 17:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `workshop_no` varchar(125) DEFAULT NULL,
  `workshop_type` tinyint(2) DEFAULT NULL COMMENT '1=actual, 2=virtual',
  `teacher_instructor_qty` decimal(4,0) DEFAULT NULL,
  `teacher_instructor_ssistant_qty` decimal(4,0) DEFAULT NULL,
  `typical_student_qty` decimal(4,0) DEFAULT NULL,
  `handicapped_students_qty` decimal(4,0) DEFAULT NULL,
  `special_needs_students_qty` decimal(4,0) DEFAULT NULL,
  `visitors_qty` varchar(125) DEFAULT NULL,
  `guest_qty` varchar(125) DEFAULT NULL,
  `total_qty` decimal(5,0) DEFAULT NULL,
  `workshop_campus` int(11) DEFAULT NULL,
  `workshop_seats` int(11) DEFAULT NULL,
  `workshop_fixed_asset` int(11) DEFAULT NULL,
  `workshop_safety_and_security` int(11) DEFAULT NULL,
  `workshop_safety_and_insurance_protection` int(11) DEFAULT NULL,
  `workshop_for_accounting` int(11) DEFAULT NULL,
  `workshop_rules_and_policies` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1=yes, 0=no',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`id`, `school_id`, `workshop_no`, `workshop_type`, `teacher_instructor_qty`, `teacher_instructor_ssistant_qty`, `typical_student_qty`, `handicapped_students_qty`, `special_needs_students_qty`, `visitors_qty`, `guest_qty`, `total_qty`, `workshop_campus`, `workshop_seats`, `workshop_fixed_asset`, `workshop_safety_and_security`, `workshop_safety_and_insurance_protection`, `workshop_for_accounting`, `workshop_rules_and_policies`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 1, '567', 1, 761, 331, 267, 481, 239, '435', '342', 458, 2, 11, 28, 10, 9, 9, 9, 1, NULL, NULL, '2023-03-14 06:31:32', '2023-03-14 06:31:32'),
(7, 1, '459', 2, 548, 676, 825, 742, 830, '761', '549', 331, 4, 12, 29, 11, 10, 10, 10, 1, NULL, NULL, '2023-03-14 07:23:57', '2023-03-16 08:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_fixed_assets`
--

CREATE TABLE `workshop_fixed_assets` (
  `id` int(11) NOT NULL,
  `asset_name` varchar(125) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `name` varchar(125) DEFAULT NULL,
  `model` varchar(125) DEFAULT NULL,
  `color` varchar(125) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `serial_number` varchar(125) DEFAULT NULL,
  `asset_condition` varchar(125) DEFAULT NULL,
  `comment` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop_fixed_assets`
--

INSERT INTO `workshop_fixed_assets` (`id`, `asset_name`, `quantity`, `name`, `model`, `color`, `size`, `serial_number`, `asset_condition`, `comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(28, '12', '36', 'Arthur Berg', 'Odio autem do eum as', 'Facilis ipsam non al', 'Sint commodi nisi ip', '570', 'Inventore quo libero', 'Nihil aliquid dolore', 1, NULL, NULL, '2023-03-14 06:31:32', '2023-03-14 06:31:32'),
(29, '16', '401', 'Candice Casey', 'Reprehenderit et fug', 'Nulla ipsum ut conse', '23', '811', 'Libero est assumenda', 'Qui ipsam nihil repr', 1, NULL, NULL, '2023-03-14 07:23:57', '2023-03-16 08:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_for_accounting`
--

CREATE TABLE `workshop_for_accounting` (
  `id` int(11) NOT NULL,
  `account_no` varchar(125) DEFAULT NULL,
  `cost_center` varchar(125) DEFAULT NULL,
  `income_center` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop_for_accounting`
--

INSERT INTO `workshop_for_accounting` (`id`, `account_no`, `cost_center`, `income_center`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, '34280956', 'Cupidatat omnis offi', '984', 1, NULL, NULL, '2023-03-14 06:31:32', '2023-03-14 06:31:32'),
(10, '59478435', 'Culpa quos esse veli', '461', 1, NULL, NULL, '2023-03-14 07:23:57', '2023-03-14 07:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_rules_and_policies`
--

CREATE TABLE `workshop_rules_and_policies` (
  `id` int(11) NOT NULL,
  `rules_and_policies` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop_rules_and_policies`
--

INSERT INTO `workshop_rules_and_policies` (`id`, `rules_and_policies`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, 'Laboriosam adipisci', 1, NULL, NULL, '2023-03-14 06:31:32', '2023-03-14 06:31:32'),
(10, 'Cum necessitatibus f', 1, NULL, NULL, '2023-03-14 07:23:57', '2023-03-14 07:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_safety_and_insurance_protection`
--

CREATE TABLE `workshop_safety_and_insurance_protection` (
  `id` int(11) NOT NULL,
  `insurance_type` varchar(125) DEFAULT NULL,
  `staff` varchar(125) DEFAULT NULL,
  `students` varchar(125) DEFAULT NULL,
  `fixed_assets` varchar(125) DEFAULT NULL,
  `property` varchar(125) DEFAULT NULL,
  `insurer` varchar(125) DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop_safety_and_insurance_protection`
--

INSERT INTO `workshop_safety_and_insurance_protection` (`id`, `insurance_type`, `staff`, `students`, `fixed_assets`, `property`, `insurer`, `expiry_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(9, 'Work Place', 'Veritatis aut dolore', 'Velit aut lorem est', 'Laborum Culpa itaqu', 'Provident aut beata', 'Lorem voluptate nost', '2005-01-27 18:00:00', 1, NULL, NULL, '2023-03-14 06:31:32', '2023-03-14 06:31:32'),
(10, 'Long term Disability', 'Sit amet ea sit v', 'Veniam non pariatur', 'Ex molestias alias v', 'In esse velit culpa', 'Rerum proident nece', '1993-06-08 18:00:00', 1, NULL, NULL, '2023-03-14 07:23:57', '2023-03-16 08:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_safety_and_security_devices`
--

CREATE TABLE `workshop_safety_and_security_devices` (
  `id` int(11) NOT NULL,
  `safety_item` int(11) DEFAULT NULL,
  `campus` int(11) DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `serial_no` varchar(125) DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `renew_date` timestamp NULL DEFAULT NULL,
  `inspection_cycle` varchar(125) DEFAULT NULL,
  `inspection_due_on` varchar(125) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop_safety_and_security_devices`
--

INSERT INTO `workshop_safety_and_security_devices` (`id`, `safety_item`, `campus`, `qty`, `serial_no`, `expiry_date`, `renew_date`, `inspection_cycle`, `inspection_due_on`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 8, 1, '352', 'Nostrum ipsum excep', '2005-01-27 18:00:00', '1993-09-16 03:29:00', 'In sed qui molestiae', 'Et sed eligendi inve', 1, NULL, NULL, '2023-03-14 06:31:32', '2023-03-14 06:31:32'),
(11, 4, 3, '643', '435298', '1993-06-08 18:00:00', '2019-06-21 10:37:00', 'Qui porro voluptas e', 'Recusandae Sit per', 1, NULL, NULL, '2023-03-14 07:23:57', '2023-03-16 08:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_seats`
--

CREATE TABLE `workshop_seats` (
  `id` int(11) NOT NULL,
  `seat_no` varchar(125) DEFAULT NULL,
  `occupant` int(11) DEFAULT NULL,
  `id_no` varchar(125) DEFAULT NULL,
  `first_name` varchar(125) DEFAULT NULL,
  `middle_name` varchar(125) DEFAULT NULL,
  `last_name` varchar(125) DEFAULT NULL,
  `photo` text,
  `ph_no` varchar(125) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `student_type` varchar(125) DEFAULT NULL,
  `seat_status` varchar(125) DEFAULT NULL,
  `comment` text,
  `status` tinyint(2) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop_seats`
--

INSERT INTO `workshop_seats` (`id`, `seat_no`, `occupant`, `id_no`, `first_name`, `middle_name`, `last_name`, `photo`, `ph_no`, `email`, `student_type`, `seat_status`, `comment`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, '56', 1, '5344767', 'Gavin', 'Brooke Schwartz', 'Day', 'public/assets/uploads/WorkshopSeat/2023/1678775492.jpg', '+1 (612) 226-2606', 'silecidat@mailinator.com', 'Typical', '1', 'love you', 1, NULL, NULL, '2023-03-14 06:31:32', '2023-03-14 06:31:32'),
(12, '45', 4, 'Nihil vero qui labor', 'Darrel', 'Dawn Barr', 'Booker', 'public/assets/uploads/WorkshopSeat/2023/1678955966.jpg', '+1 (674) 669-6998', 'gybuz@mailinator.com', 'Handicapped', '1', NULL, 1, NULL, NULL, '2023-03-14 07:23:57', '2023-03-16 08:39:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_holder_licenses`
--
ALTER TABLE `account_holder_licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addition_deductions`
--
ALTER TABLE `addition_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcent`
--
ALTER TABLE `announcent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessments_schedule_dates`
--
ALTER TABLE `assessments_schedule_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_notifications`
--
ALTER TABLE `assessment_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_reminders`
--
ALTER TABLE `assessment_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_students`
--
ALTER TABLE `assessment_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_types`
--
ALTER TABLE `assessment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_name`
--
ALTER TABLE `asset_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_transfers`
--
ALTER TABLE `asset_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_task`
--
ALTER TABLE `assigned_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachable`
--
ALTER TABLE `attachable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_charges`
--
ALTER TABLE `booking_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_participants`
--
ALTER TABLE `booking_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_payments`
--
ALTER TABLE `booking_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calssroom_seat_occupant`
--
ALTER TABLE `calssroom_seat_occupant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_mileage_logs`
--
ALTER TABLE `car_mileage_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_accounts`
--
ALTER TABLE `chart_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_account_categories`
--
ALTER TABLE `chart_account_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_scheduled_days`
--
ALTER TABLE `classes_scheduled_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes_schedules`
--
ALTER TABLE `classes_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_fixed_assets`
--
ALTER TABLE `classroom_fixed_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_for_accounting`
--
ALTER TABLE `classroom_for_accounting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_safety_and_security_devices`
--
ALTER TABLE `classroom_safety_and_security_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_seats`
--
ALTER TABLE `classroom_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_type`
--
ALTER TABLE `classroom_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_attendances`
--
ALTER TABLE `class_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_closed_days`
--
ALTER TABLE `class_closed_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_schedules`
--
ALTER TABLE `class_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closing_in_education_team`
--
ALTER TABLE `closing_in_education_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporations`
--
ALTER TABLE `corporations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_type`
--
ALTER TABLE `cost_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_assessment_grade_scales`
--
ALTER TABLE `course_assessment_grade_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_outlines`
--
ALTER TABLE `course_outlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dates_and_deadlines_in_school_program`
--
ALTER TABLE `dates_and_deadlines_in_school_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deadlines`
--
ALTER TABLE `deadlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declaration`
--
ALTER TABLE `declaration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_levels`
--
ALTER TABLE `education_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_team`
--
ALTER TABLE `education_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_date`
--
ALTER TABLE `event_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_and_charges`
--
ALTER TABLE `fees_and_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_in_student_registration`
--
ALTER TABLE `financial_in_student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_assets`
--
ALTER TABLE `fixed_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_asset_types`
--
ALTER TABLE `fixed_asset_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_type`
--
ALTER TABLE `form_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_scales`
--
ALTER TABLE `grade_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_scale_items`
--
ALTER TABLE `grade_scale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_years`
--
ALTER TABLE `grade_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_reports`
--
ALTER TABLE `incident_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information_session`
--
ALTER TABLE `information_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_items`
--
ALTER TABLE `inventory_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_trackers`
--
ALTER TABLE `invoice_trackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_requests`
--
ALTER TABLE `item_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_types`
--
ALTER TABLE `item_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_orders`
--
ALTER TABLE `job_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lockers`
--
ALTER TABLE `lockers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_car_mileage`
--
ALTER TABLE `log_car_mileage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_key`
--
ALTER TABLE `log_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_mail`
--
ALTER TABLE `log_mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_visitor`
--
ALTER TABLE `log_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_checklists`
--
ALTER TABLE `maintenance_checklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_participants_in_education_team`
--
ALTER TABLE `manage_participants_in_education_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_structure`
--
ALTER TABLE `marks_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_appeals`
--
ALTER TABLE `mark_appeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_appeal_results`
--
ALTER TABLE `mark_appeal_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `memorandum`
--
ALTER TABLE `memorandum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memorandum_recipients`
--
ALTER TABLE `memorandum_recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_attachments`
--
ALTER TABLE `model_has_attachments`
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
-- Indexes for table `my_payment_in_school_program`
--
ALTER TABLE `my_payment_in_school_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_payment_in_student_registration`
--
ALTER TABLE `my_payment_in_student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices_type`
--
ALTER TABLE `notices_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_discounts`
--
ALTER TABLE `offer_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_items`
--
ALTER TABLE `offer_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkers`
--
ALTER TABLE `parkers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parker_types`
--
ALTER TABLE `parker_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_logs`
--
ALTER TABLE `parking_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_lots`
--
ALTER TABLE `parking_lots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_rates`
--
ALTER TABLE `parking_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_stalls`
--
ALTER TABLE `parking_stalls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_stall_allocations`
--
ALTER TABLE `parking_stall_allocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants_availability_and_contacts_in_education_team`
--
ALTER TABLE `participants_availability_and_contacts_in_education_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_infos`
--
ALTER TABLE `payment_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_schedules`
--
ALTER TABLE `payment_schedules`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `program_courses`
--
ALTER TABLE `program_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_dates`
--
ALTER TABLE `program_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_fee_categories`
--
ALTER TABLE `program_fee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_grade_years`
--
ALTER TABLE `program_grade_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_lengths`
--
ALTER TABLE `program_lengths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_budgets`
--
ALTER TABLE `project_budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_durations`
--
ALTER TABLE `project_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_payments`
--
ALTER TABLE `project_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_timelines`
--
ALTER TABLE `project_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_discounts`
--
ALTER TABLE `quotation_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_items`
--
ALTER TABLE `receive_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiving_logs`
--
ALTER TABLE `receiving_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference_counts`
--
ALTER TABLE `reference_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reopening_in_education_team`
--
ALTER TABLE `reopening_in_education_team`
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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_assets`
--
ALTER TABLE `room_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safety_securities`
--
ALTER TABLE `safety_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safety_security_item`
--
ALTER TABLE `safety_security_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_participants`
--
ALTER TABLE `schedule_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_recurrences`
--
ALTER TABLE `schedule_recurrences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_types`
--
ALTER TABLE `schedule_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_announcement`
--
ALTER TABLE `school_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_class`
--
ALTER TABLE `school_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_closed_days`
--
ALTER TABLE `school_closed_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_education_levels`
--
ALTER TABLE `school_education_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_form`
--
ALTER TABLE `school_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_information`
--
ALTER TABLE `school_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_message`
--
ALTER TABLE `school_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_notices`
--
ALTER TABLE `school_notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_program`
--
ALTER TABLE `school_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_items`
--
ALTER TABLE `shipping_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_logs`
--
ALTER TABLE `shipping_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_directory`
--
ALTER TABLE `staff_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage_lockers`
--
ALTER TABLE `storage_lockers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_messages`
--
ALTER TABLE `student_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_types`
--
ALTER TABLE `student_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_option`
--
ALTER TABLE `study_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_course`
--
ALTER TABLE `subject_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_course_text_books`
--
ALTER TABLE `subject_course_text_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_assigner_in_education_team`
--
ALTER TABLE `task_assigner_in_education_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_types`
--
ALTER TABLE `tax_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_group`
--
ALTER TABLE `team_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_type`
--
ALTER TABLE `team_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_builders`
--
ALTER TABLE `template_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_otps`
--
ALTER TABLE `temp_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_semester`
--
ALTER TABLE `term_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textbooks`
--
ALTER TABLE `textbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_books`
--
ALTER TABLE `text_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_sheet_items`
--
ALTER TABLE `time_sheet_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_sheet_reports`
--
ALTER TABLE `time_sheet_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `transaction_charges`
--
ALTER TABLE `transaction_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_taxes`
--
ALTER TABLE `transaction_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition`
--
ALTER TABLE `tuition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition_invoice_settings`
--
ALTER TABLE `tuition_invoice_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility_accounts`
--
ALTER TABLE `utility_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_insurances`
--
ALTER TABLE `vehicle_insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_fixed_assets`
--
ALTER TABLE `workshop_fixed_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_for_accounting`
--
ALTER TABLE `workshop_for_accounting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_rules_and_policies`
--
ALTER TABLE `workshop_rules_and_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_safety_and_insurance_protection`
--
ALTER TABLE `workshop_safety_and_insurance_protection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_safety_and_security_devices`
--
ALTER TABLE `workshop_safety_and_security_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshop_seats`
--
ALTER TABLE `workshop_seats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `account_holder_licenses`
--
ALTER TABLE `account_holder_licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `addition_deductions`
--
ALTER TABLE `addition_deductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcent`
--
ALTER TABLE `announcent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assessments_schedule_dates`
--
ALTER TABLE `assessments_schedule_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assessment_notifications`
--
ALTER TABLE `assessment_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `assessment_reminders`
--
ALTER TABLE `assessment_reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `assessment_students`
--
ALTER TABLE `assessment_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `assessment_types`
--
ALTER TABLE `assessment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `asset_name`
--
ALTER TABLE `asset_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `asset_transfers`
--
ALTER TABLE `asset_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_task`
--
ALTER TABLE `assigned_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attachable`
--
ALTER TABLE `attachable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_charges`
--
ALTER TABLE `booking_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_participants`
--
ALTER TABLE `booking_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking_payments`
--
ALTER TABLE `booking_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `calssroom_seat_occupant`
--
ALTER TABLE `calssroom_seat_occupant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `car_mileage_logs`
--
ALTER TABLE `car_mileage_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chart_accounts`
--
ALTER TABLE `chart_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chart_account_categories`
--
ALTER TABLE `chart_account_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `classes_scheduled_days`
--
ALTER TABLE `classes_scheduled_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classes_schedules`
--
ALTER TABLE `classes_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `classroom_fixed_assets`
--
ALTER TABLE `classroom_fixed_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `classroom_for_accounting`
--
ALTER TABLE `classroom_for_accounting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classroom_safety_and_security_devices`
--
ALTER TABLE `classroom_safety_and_security_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classroom_seats`
--
ALTER TABLE `classroom_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `classroom_type`
--
ALTER TABLE `classroom_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class_attendances`
--
ALTER TABLE `class_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `class_closed_days`
--
ALTER TABLE `class_closed_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class_schedules`
--
ALTER TABLE `class_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `closing_in_education_team`
--
ALTER TABLE `closing_in_education_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=429;

--
-- AUTO_INCREMENT for table `corporations`
--
ALTER TABLE `corporations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cost_type`
--
ALTER TABLE `cost_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_assessment_grade_scales`
--
ALTER TABLE `course_assessment_grade_scales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `course_outlines`
--
ALTER TABLE `course_outlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `credential`
--
ALTER TABLE `credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dates_and_deadlines_in_school_program`
--
ALTER TABLE `dates_and_deadlines_in_school_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deadlines`
--
ALTER TABLE `deadlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `declaration`
--
ALTER TABLE `declaration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_method`
--
ALTER TABLE `delivery_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `education_levels`
--
ALTER TABLE `education_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education_team`
--
ALTER TABLE `education_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_date`
--
ALTER TABLE `event_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fees_and_charges`
--
ALTER TABLE `fees_and_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `financial_in_student_registration`
--
ALTER TABLE `financial_in_student_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fixed_assets`
--
ALTER TABLE `fixed_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `fixed_asset_types`
--
ALTER TABLE `fixed_asset_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form_type`
--
ALTER TABLE `form_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `grade_scales`
--
ALTER TABLE `grade_scales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade_scale_items`
--
ALTER TABLE `grade_scale_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grade_years`
--
ALTER TABLE `grade_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `incident_reports`
--
ALTER TABLE `incident_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `information_session`
--
ALTER TABLE `information_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `inventory_items`
--
ALTER TABLE `inventory_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_trackers`
--
ALTER TABLE `invoice_trackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_requests`
--
ALTER TABLE `item_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_types`
--
ALTER TABLE `item_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_orders`
--
ALTER TABLE `job_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `lockers`
--
ALTER TABLE `lockers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_car_mileage`
--
ALTER TABLE `log_car_mileage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_key`
--
ALTER TABLE `log_key`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_mail`
--
ALTER TABLE `log_mail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_visitor`
--
ALTER TABLE `log_visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenance_checklists`
--
ALTER TABLE `maintenance_checklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_participants_in_education_team`
--
ALTER TABLE `manage_participants_in_education_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks_structure`
--
ALTER TABLE `marks_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mark_appeals`
--
ALTER TABLE `mark_appeals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mark_appeal_results`
--
ALTER TABLE `mark_appeal_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memorandum`
--
ALTER TABLE `memorandum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memorandum_recipients`
--
ALTER TABLE `memorandum_recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `model_has_attachments`
--
ALTER TABLE `model_has_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `my_payment_in_school_program`
--
ALTER TABLE `my_payment_in_school_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `my_payment_in_student_registration`
--
ALTER TABLE `my_payment_in_student_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notices_type`
--
ALTER TABLE `notices_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offer_discounts`
--
ALTER TABLE `offer_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offer_items`
--
ALTER TABLE `offer_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `parkers`
--
ALTER TABLE `parkers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parker_types`
--
ALTER TABLE `parker_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parking_logs`
--
ALTER TABLE `parking_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parking_lots`
--
ALTER TABLE `parking_lots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parking_rates`
--
ALTER TABLE `parking_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parking_stalls`
--
ALTER TABLE `parking_stalls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parking_stall_allocations`
--
ALTER TABLE `parking_stall_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `participants_availability_and_contacts_in_education_team`
--
ALTER TABLE `participants_availability_and_contacts_in_education_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment_infos`
--
ALTER TABLE `payment_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_schedules`
--
ALTER TABLE `payment_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `program_courses`
--
ALTER TABLE `program_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `program_dates`
--
ALTER TABLE `program_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `program_fee_categories`
--
ALTER TABLE `program_fee_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `program_grade_years`
--
ALTER TABLE `program_grade_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `program_lengths`
--
ALTER TABLE `program_lengths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_budgets`
--
ALTER TABLE `project_budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_durations`
--
ALTER TABLE `project_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project_payments`
--
ALTER TABLE `project_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_timelines`
--
ALTER TABLE `project_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quotation_discounts`
--
ALTER TABLE `quotation_discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_items`
--
ALTER TABLE `receive_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receiving_logs`
--
ALTER TABLE `receiving_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reference_counts`
--
ALTER TABLE `reference_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reopening_in_education_team`
--
ALTER TABLE `reopening_in_education_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `room_assets`
--
ALTER TABLE `room_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `safety_securities`
--
ALTER TABLE `safety_securities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `safety_security_item`
--
ALTER TABLE `safety_security_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule_participants`
--
ALTER TABLE `schedule_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule_recurrences`
--
ALTER TABLE `schedule_recurrences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule_types`
--
ALTER TABLE `schedule_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `school_announcement`
--
ALTER TABLE `school_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_class`
--
ALTER TABLE `school_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `school_closed_days`
--
ALTER TABLE `school_closed_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_education_levels`
--
ALTER TABLE `school_education_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `school_form`
--
ALTER TABLE `school_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_information`
--
ALTER TABLE `school_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_message`
--
ALTER TABLE `school_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_notices`
--
ALTER TABLE `school_notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_program`
--
ALTER TABLE `school_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping_items`
--
ALTER TABLE `shipping_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shipping_logs`
--
ALTER TABLE `shipping_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_directory`
--
ALTER TABLE `staff_directory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `storage_lockers`
--
ALTER TABLE `storage_lockers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `student_messages`
--
ALTER TABLE `student_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_records`
--
ALTER TABLE `student_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_types`
--
ALTER TABLE `student_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `study_option`
--
ALTER TABLE `study_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject_course`
--
ALTER TABLE `subject_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `subject_course_text_books`
--
ALTER TABLE `subject_course_text_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `task_assigner_in_education_team`
--
ALTER TABLE `task_assigner_in_education_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tax_types`
--
ALTER TABLE `tax_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_group`
--
ALTER TABLE `team_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_type`
--
ALTER TABLE `team_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `template_builders`
--
ALTER TABLE `template_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_otps`
--
ALTER TABLE `temp_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `term_semester`
--
ALTER TABLE `term_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `textbooks`
--
ALTER TABLE `textbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `text_books`
--
ALTER TABLE `text_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `time_sheet_items`
--
ALTER TABLE `time_sheet_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `time_sheet_reports`
--
ALTER TABLE `time_sheet_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaction_charges`
--
ALTER TABLE `transaction_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transaction_taxes`
--
ALTER TABLE `transaction_taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tuition`
--
ALTER TABLE `tuition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tuition_invoice_settings`
--
ALTER TABLE `tuition_invoice_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `utility_accounts`
--
ALTER TABLE `utility_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_insurances`
--
ALTER TABLE `vehicle_insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workshop_fixed_assets`
--
ALTER TABLE `workshop_fixed_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `workshop_for_accounting`
--
ALTER TABLE `workshop_for_accounting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workshop_rules_and_policies`
--
ALTER TABLE `workshop_rules_and_policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workshop_safety_and_insurance_protection`
--
ALTER TABLE `workshop_safety_and_insurance_protection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `workshop_safety_and_security_devices`
--
ALTER TABLE `workshop_safety_and_security_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `workshop_seats`
--
ALTER TABLE `workshop_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
