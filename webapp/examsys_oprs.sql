-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 04:56 PM
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
-- Database: `examsys_oprs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_actions_log`
--

CREATE TABLE `tbl_actions_log` (
  `id` int(11) NOT NULL,
  `action` int(2) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_user` text DEFAULT NULL,
  `affected_file` int(11) DEFAULT NULL,
  `affected_account` int(11) DEFAULT NULL,
  `affected_file_name` text DEFAULT NULL,
  `affected_account_name` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_actions_log`
--

INSERT INTO `tbl_actions_log` (`id`, `action`, `owner_id`, `owner_user`, `affected_file`, `affected_account`, `affected_file_name`, `affected_account_name`, `details`, `timestamp`) VALUES
(1, 0, 1, 'admin', NULL, NULL, NULL, NULL, NULL, '2022-12-21 05:28:20'),
(2, 49, 1, NULL, NULL, NULL, NULL, NULL, '{\"database_version\":\"2022102601\"}', '2022-12-21 05:28:23'),
(3, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 05:28:35'),
(4, 29, 1, 'admin', NULL, NULL, NULL, NULL, NULL, '2022-12-21 05:30:55'),
(5, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"branding\"}', '2022-12-21 05:30:56'),
(6, 29, 1, 'admin', NULL, NULL, NULL, NULL, NULL, '2022-12-21 06:26:56'),
(7, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"branding\"}', '2022-12-21 06:26:56'),
(8, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:28:31'),
(9, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:33:42'),
(10, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"general\"}', '2022-12-21 06:35:53'),
(11, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:36:49'),
(12, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:41:45'),
(13, 50, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"icon\",\"language\":\"html\"}', '2022-12-21 06:46:16'),
(14, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"icon\",\"language\":\"html\"}', '2022-12-21 06:46:26'),
(15, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:46:55'),
(16, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:48:34'),
(17, 50, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:50:59'),
(18, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:51:10'),
(19, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:51:16'),
(20, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:51:41'),
(21, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:51:43'),
(22, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:52:31'),
(23, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:52:33'),
(24, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:53:24'),
(25, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:54:20'),
(26, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:57:21'),
(27, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:57:30'),
(28, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:57:35'),
(29, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:57:37'),
(30, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:57:45'),
(31, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:58:17'),
(32, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:58:30'),
(33, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:59:01'),
(34, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:59:04'),
(35, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 06:59:26'),
(36, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 06:59:37'),
(37, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:00:46'),
(38, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:02:11'),
(39, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:02:36'),
(40, 48, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"header_footer\"}', '2022-12-21 07:08:36'),
(41, 48, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"header_footer\"}', '2022-12-21 07:12:03'),
(42, 48, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"header_footer\"}', '2022-12-21 07:12:18'),
(43, 23, 1, 'admin', NULL, 1, NULL, 'LET', NULL, '2022-12-21 07:17:08'),
(44, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:17:24'),
(45, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:17:35'),
(46, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:19:58'),
(47, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:24:08'),
(48, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"general\"}', '2022-12-21 07:25:24'),
(49, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"general\"}', '2022-12-21 07:25:31'),
(50, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 07:27:30'),
(51, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 07:28:35'),
(52, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:28:49'),
(53, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:29:02'),
(54, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 07:29:34'),
(55, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 07:38:46'),
(56, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 07:38:49'),
(57, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 08:13:57'),
(58, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 08:14:37'),
(59, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 08:16:19'),
(60, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 08:16:32'),
(61, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 08:30:15'),
(62, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 08:30:23'),
(63, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 12:36:02'),
(64, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 12:39:10'),
(65, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 12:40:54'),
(66, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 12:55:13'),
(67, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 12:56:53'),
(68, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:13:33'),
(69, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:13:55'),
(70, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"general\"}', '2022-12-21 13:16:12'),
(71, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"general\"}', '2022-12-21 13:16:43'),
(72, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"general\"}', '2022-12-21 13:17:11'),
(73, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:19:01'),
(74, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:29:17'),
(75, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:30:03'),
(76, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:30:30'),
(77, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:30:52'),
(78, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:31:16'),
(79, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:31:18'),
(80, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:31:26'),
(81, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:31:40'),
(82, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:31:51'),
(83, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:32:02'),
(84, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:32:35'),
(85, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:32:44'),
(86, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:33:15'),
(87, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:34:19'),
(88, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:34:33'),
(89, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:35:26'),
(90, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:35:32'),
(91, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:35:54'),
(92, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:36:03'),
(93, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:36:14'),
(94, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:36:37'),
(95, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:37:29'),
(96, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:39:20'),
(97, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:39:34'),
(98, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:39:38'),
(99, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:54:52'),
(100, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:55:21'),
(101, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:55:47'),
(102, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:57:00'),
(103, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:58:13'),
(104, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 13:58:31'),
(105, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:58:35'),
(106, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 13:59:10'),
(107, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 14:02:45'),
(108, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 14:03:34'),
(109, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 14:04:24'),
(110, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 14:04:40'),
(111, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 14:05:29'),
(112, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 14:05:37'),
(113, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:06:07'),
(114, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:07:06'),
(115, 51, 1, 'admin', NULL, NULL, NULL, NULL, '{\"title\":\"Header\",\"language\":\"css\"}', '2022-12-21 14:07:46'),
(116, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:07:54'),
(117, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:08:29'),
(118, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 14:13:56'),
(119, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:13:58'),
(120, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:14:22'),
(121, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 14:17:34'),
(122, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 14:18:27'),
(123, 18, 1, 'admin', NULL, NULL, NULL, 'LET', NULL, '2022-12-21 14:28:17'),
(124, 23, 1, 'admin', NULL, 2, NULL, 'Civil Service Reviewers', NULL, '2022-12-21 14:28:54'),
(125, 15, 1, 'admin', NULL, 2, NULL, 'Civil Service Reviewers', NULL, '2022-12-21 14:28:57'),
(126, 23, 1, 'admin', NULL, 3, NULL, 'LET Reviewers', NULL, '2022-12-21 14:29:16'),
(127, 15, 1, 'admin', NULL, 3, NULL, 'LET Reviewers', NULL, '2022-12-21 14:29:24'),
(128, 23, 1, 'admin', NULL, 4, NULL, 'LET Reviewers - ELEMENTARY', NULL, '2022-12-21 14:31:33'),
(129, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"security\"}', '2022-12-21 14:34:54'),
(130, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"security\"}', '2022-12-21 14:35:08'),
(131, 5, 1, 'admin', 1, NULL, 'exam_question_tbl.csv', 'admin', NULL, '2022-12-21 14:35:23'),
(132, 26, 1, 'admin', 1, 2, 'exam_question_tbl.csv', 'Civil Service Reviewers', NULL, '2022-12-21 14:35:54'),
(133, 32, 1, 'admin', 1, NULL, 'exam_question_tbl.csv', NULL, NULL, '2022-12-21 14:35:54'),
(134, 34, 1, 'admin', NULL, 1, NULL, 'ELEMENTARY', NULL, '2022-12-21 14:39:32'),
(135, 18, 1, 'admin', NULL, NULL, NULL, 'LET Reviewers - ELEMENTARY', NULL, '2022-12-21 14:40:13'),
(136, 18, 1, 'admin', NULL, NULL, NULL, 'LET Reviewers', NULL, '2022-12-21 14:40:13'),
(137, 36, 1, 'admin', NULL, NULL, NULL, 'ELEMENTARY', NULL, '2022-12-21 14:40:32'),
(138, 34, 1, 'admin', NULL, 2, NULL, 'Civil Service Reviewers', NULL, '2022-12-21 14:40:48'),
(139, 34, 1, 'admin', NULL, 3, NULL, 'Licensure Examination for Teachers', NULL, '2022-12-21 14:43:27'),
(140, 34, 1, 'admin', NULL, 4, NULL, 'Elementary', NULL, '2022-12-21 14:43:45'),
(141, 34, 1, 'admin', NULL, 5, NULL, 'Secondary', NULL, '2022-12-21 14:43:56'),
(142, 36, 1, 'admin', NULL, NULL, NULL, 'Elementary', NULL, '2022-12-21 14:44:10'),
(143, 36, 1, 'admin', NULL, NULL, NULL, 'Secondary', NULL, '2022-12-21 14:44:10'),
(144, 35, 1, 'admin', NULL, 4, NULL, 'Elementary', NULL, '2022-12-21 14:44:49'),
(145, 34, 1, 'admin', NULL, 6, NULL, 'Elementary', NULL, '2022-12-21 14:44:59'),
(146, 34, 1, 'admin', NULL, 7, NULL, 'Secondary', NULL, '2022-12-21 14:45:08'),
(147, 34, 1, 'admin', NULL, 8, NULL, 'Mathematics', NULL, '2022-12-21 14:45:33'),
(148, 34, 1, 'admin', NULL, 9, NULL, 'English', NULL, '2022-12-21 14:46:23'),
(149, 34, 1, 'admin', NULL, 10, NULL, 'MAPEH', NULL, '2022-12-21 14:47:00'),
(150, 34, 1, 'admin', NULL, 11, NULL, 'Filipino', NULL, '2022-12-21 14:47:12'),
(151, 34, 1, 'admin', NULL, 12, NULL, 'Physical Science', NULL, '2022-12-21 14:47:30'),
(152, 34, 1, 'admin', NULL, 13, NULL, 'Social Studies', NULL, '2022-12-21 14:47:42'),
(153, 34, 1, 'admin', NULL, 14, NULL, 'TLE', NULL, '2022-12-21 14:47:55'),
(154, 34, 1, 'admin', NULL, 15, NULL, 'Value Education', NULL, '2022-12-21 14:48:12'),
(155, 32, 1, 'admin', 1, NULL, 'exam_question_tbl.csv', NULL, NULL, '2022-12-21 14:48:55'),
(156, 23, 1, 'admin', NULL, 5, NULL, 'Licensure Examination for Teachers Reviewers', NULL, '2022-12-21 14:49:54'),
(157, 15, 1, 'admin', NULL, 5, NULL, 'LET Reviewers', NULL, '2022-12-21 14:50:12'),
(158, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:50:28'),
(159, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:51:20'),
(160, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 14:52:22'),
(161, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:52:26'),
(162, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:52:51'),
(163, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-21 14:54:06'),
(164, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:54:26'),
(165, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:55:27'),
(166, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 14:57:01'),
(167, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 14:58:19'),
(168, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 14:58:25'),
(169, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:03:48'),
(170, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 15:04:27'),
(171, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:06:21'),
(172, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:29:47'),
(173, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:30:09'),
(174, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:32:04'),
(175, 3, 1, 'admin', NULL, NULL, NULL, 'Robymar Louise', NULL, '2022-12-21 15:32:58'),
(176, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:35:01'),
(177, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"external_login\"}', '2022-12-21 15:35:23'),
(178, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 15:36:48'),
(179, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:38:12'),
(180, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:38:30'),
(181, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:40:32'),
(182, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:42:06'),
(183, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:42:55'),
(184, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 15:44:38'),
(185, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:45:52'),
(186, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 15:48:51'),
(187, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:50:03'),
(188, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:50:37'),
(189, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 15:50:49'),
(190, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"external_login\"}', '2022-12-21 15:50:56'),
(191, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:51:11'),
(192, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:53:26'),
(193, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 15:53:43'),
(194, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 15:53:48'),
(195, 4, 2, 'louisemanaloto', NULL, 2, NULL, 'bhemax', NULL, '2022-12-21 16:10:25'),
(196, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:10:34'),
(197, 17, 1, 'admin', NULL, NULL, NULL, NULL, NULL, '2022-12-21 16:11:08'),
(198, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 16:11:19'),
(199, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:11:21'),
(200, 4, 3, 'louisemanaloto', NULL, 3, NULL, 'bhemax', NULL, '2022-12-21 16:11:46'),
(201, 1, 3, 'louisemanaloto', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:11:46'),
(202, 6, 3, 'louisemanaloto', 2, NULL, 'exam_question_tbl.csv', 'louisemanaloto', NULL, '2022-12-21 16:12:31'),
(203, 33, 3, 'louisemanaloto', 2, NULL, 'exam_question_tbl.csv', NULL, NULL, '2022-12-21 16:12:38'),
(204, 31, 3, 'louisemanaloto', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:13:06'),
(205, 1, 3, 'louisemanaloto', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:13:20'),
(206, 31, 3, 'louisemanaloto', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:13:22'),
(207, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:13:27'),
(208, 39, 1, 'admin', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:14:12'),
(209, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:14:21'),
(210, 1, 3, 'louisemanaloto', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:14:28'),
(211, 31, 3, 'louisemanaloto', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:14:47'),
(212, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:14:52'),
(213, 17, 1, 'admin', NULL, NULL, NULL, 'bhemax', NULL, '2022-12-21 16:15:12'),
(214, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:15:29'),
(215, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:16:15'),
(216, 32, 1, 'admin', 1, NULL, 'exam_question_tbl.csv', NULL, NULL, '2022-12-21 16:16:30'),
(217, 32, 1, 'admin', 1, NULL, 'exam_question_tbl.csv', NULL, NULL, '2022-12-21 16:16:39'),
(218, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"email\"}', '2022-12-21 16:16:57'),
(219, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"clients\"}', '2022-12-21 16:18:46'),
(220, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-21 16:20:09'),
(221, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-22 09:03:02'),
(222, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-22 09:09:14'),
(223, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-22 14:20:49'),
(224, 47, 1, 'admin', NULL, NULL, NULL, NULL, '{\"section\":\"privacy\"}', '2022-12-22 14:21:14'),
(225, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-22 14:21:19'),
(226, 1, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-23 14:45:02'),
(227, 31, 1, 'admin', NULL, NULL, NULL, 'admin', NULL, '2022-12-23 14:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authentication_codes`
--

CREATE TABLE `tbl_authentication_codes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `code` int(6) NOT NULL,
  `used` int(1) NOT NULL DEFAULT 0,
  `used_timestamp` timestamp NULL DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` varchar(60) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `parent`, `description`, `created_by`, `timestamp`) VALUES
(2, 'Civil Service Reviewers', NULL, NULL, 'admin', '2022-12-21 14:40:48'),
(3, 'Licensure Examination for Teache', NULL, NULL, 'admin', '2022-12-21 14:43:27'),
(6, 'Elementary', 3, NULL, 'admin', '2022-12-21 14:44:59'),
(7, 'Secondary', 3, NULL, 'admin', '2022-12-21 14:45:08'),
(8, 'Mathematics', 7, NULL, 'admin', '2022-12-21 14:45:33'),
(9, 'English', 7, NULL, 'admin', '2022-12-21 14:46:23'),
(10, 'MAPEH', 7, NULL, 'admin', '2022-12-21 14:47:00'),
(11, 'Filipino', 7, NULL, 'admin', '2022-12-21 14:47:12'),
(12, 'Physical Science', 7, NULL, 'admin', '2022-12-21 14:47:30'),
(13, 'Social Studies', 7, NULL, 'admin', '2022-12-21 14:47:42'),
(14, 'TLE', 7, NULL, 'admin', '2022-12-21 14:47:54'),
(15, 'Value Education', 7, NULL, 'admin', '2022-12-21 14:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories_relations`
--

CREATE TABLE `tbl_categories_relations` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_categories_relations`
--

INSERT INTO `tbl_categories_relations` (`id`, `file_id`, `cat_id`, `timestamp`) VALUES
(1, 1, 2, '2022-12-21 14:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cron_log`
--

CREATE TABLE `tbl_cron_log` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `sapi` varchar(32) NOT NULL,
  `results` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_assets`
--

CREATE TABLE `tbl_custom_assets` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(500) NOT NULL,
  `content` text DEFAULT NULL,
  `language` varchar(32) NOT NULL,
  `location` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `enabled` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_custom_assets`
--

INSERT INTO `tbl_custom_assets` (`id`, `timestamp`, `title`, `content`, `language`, `location`, `position`, `enabled`) VALUES
(1, '2022-12-21 06:46:16', 'icon', '<link rel=\"icon\" type=\"image/x-icon\" href=\"icon.ico\">', 'html', 'all', 'head', 1),
(2, '2022-12-21 06:50:58', 'Header', 'a{\r\n	color: #142850;\r\n}\r\n\r\n:root{\r\n    --main_color: #142850;\r\n	--main_lighten: #27496D;\r\n  	--top_bar_hover: #27496D;\r\n  --side_menu_selected_parent_bg: #A0E4CB;\r\n  --side_menu_selected_parent_color: #0D4C92;\r\n  --side_menu_current_subitem_bg_hover: #CFF5E7;\r\n  --font_body:\"Lato\", sans-serif;\r\n  \r\n}', 'css', 'all', 'head', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_downloads`
--

CREATE TABLE `tbl_downloads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_id` int(11) NOT NULL,
  `remote_ip` varchar(45) DEFAULT NULL,
  `remote_host` text DEFAULT NULL,
  `anonymous` tinyint(1) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `url` text NOT NULL,
  `original_url` text NOT NULL,
  `filename` text NOT NULL,
  `description` text DEFAULT NULL,
  `uploader` varchar(60) NOT NULL,
  `expires` int(1) NOT NULL DEFAULT 0,
  `expiry_date` timestamp NOT NULL DEFAULT '2022-12-31 16:00:00',
  `public_allow` int(1) NOT NULL DEFAULT 0,
  `public_token` varchar(32) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `user_id`, `url`, `original_url`, `filename`, `description`, `uploader`, `expires`, `expiry_date`, `public_allow`, `public_token`, `timestamp`) VALUES
(1, 1, '1671633323-d033e22ae348aeb5660fc2140aec35850c4da997-exam_question_tbl.csv', 'exam_question_tbl.csv', 'exam_question_tbl.csv', '', 'admin', 0, '2023-01-19 16:00:00', 1, 'uOonElKT7R2qdiiXvJONUlwXYJyLP5Aq', '2022-12-21 14:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files_relations`
--

CREATE TABLE `tbl_files_relations` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `hidden` int(1) NOT NULL,
  `download_count` int(16) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_files_relations`
--

INSERT INTO `tbl_files_relations` (`id`, `file_id`, `client_id`, `group_id`, `folder_id`, `hidden`, `download_count`, `timestamp`) VALUES
(1, 1, NULL, 2, NULL, 0, 0, '2022-12-21 14:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_folders`
--

CREATE TABLE `tbl_folders` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `client_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text DEFAULT NULL,
  `public` tinyint(1) NOT NULL DEFAULT 0,
  `public_token` varchar(32) DEFAULT NULL,
  `created_by` varchar(32) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `name`, `description`, `public`, `public_token`, `created_by`, `timestamp`) VALUES
(2, 'Civil Service Reviewers', NULL, 1, 'ooKUlxmGJCAOZyR1xgvOR0RoJ6dtqqus', 'admin', '2022-12-21 14:28:54'),
(5, 'LET Reviewers', NULL, 1, 'hh5zgwREH5g7LxtcibYv7U1wvuFzRJAJ', 'admin', '2022-12-21 14:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins_failed`
--

CREATE TABLE `tbl_logins_failed` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `attempted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `added_by` varchar(32) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_requests`
--

CREATE TABLE `tbl_members_requests` (
  `id` int(11) NOT NULL,
  `requested_by` varchar(32) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `denied` int(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `upload_type` int(11) NOT NULL,
  `sent_status` int(2) NOT NULL,
  `times_failed` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`id`, `name`, `value`) VALUES
(1, 'base_uri', '/bhemax_functions/OPRS/'),
(2, 'max_thumbnail_width', '100'),
(3, 'max_thumbnail_height', '100'),
(4, 'thumbnails_folder', '../../assets/img/custom/thumbs/'),
(5, 'thumbnail_default_quality', '90'),
(6, 'max_logo_width', '300'),
(7, 'max_logo_height', '300'),
(8, 'this_install_title', 'Bhemax4IT - Online PDF Repository System'),
(9, 'selected_clients_template', 'pinboxes'),
(10, 'logo_thumbnails_folder', '/assets/img/custom/thumbs'),
(11, 'timezone', 'Asia/Singapore'),
(12, 'timeformat', 'd/m/Y'),
(13, 'allowed_file_types', '.csv,7z,ace,ai,avi,bin,bmp,bz2,cdr,csv,doc,docm,docx,eps,fla,flv,gif,gz,gzip,htm,html,iso,jpeg,jpg,mp3,mp4,mpg,odt,oog,pdf,png,pps,ppsx,ppt,pptm,pptx,psd,rar,rtf,tar,tgz,tif,tiff,txt,wav,xls,xlsm,xlsx,xz,zip'),
(14, 'logo_filename', 'Artboard-2.png'),
(15, 'admin_email_address', 'louisemanaloto123@gmail.com'),
(16, 'clients_can_register', '1'),
(17, 'last_update', '1605'),
(18, 'database_version', '2022102601'),
(19, 'mail_system_use', 'gmail'),
(20, 'mail_smtp_host', ''),
(21, 'mail_smtp_port', ''),
(22, 'mail_smtp_user', 'louisemanaloto123@gmail.com'),
(23, 'mail_smtp_pass', 'oldaccount'),
(24, 'mail_from_name', 'Bhemax4IT - Online PDF Repository System'),
(25, 'thumbnails_use_absolute', '0'),
(26, 'mail_copy_user_upload', '0'),
(27, 'mail_copy_client_upload', '0'),
(28, 'mail_copy_main_user', '0'),
(29, 'mail_copy_addresses', ''),
(30, 'version_last_check', '21-12-2022'),
(31, 'version_new_found', '0'),
(32, 'version_new_number', ''),
(33, 'version_new_url', ''),
(34, 'version_new_chlog', ''),
(35, 'version_new_security', ''),
(36, 'version_new_features', ''),
(37, 'version_new_important', ''),
(38, 'clients_auto_approve', '1'),
(39, 'clients_auto_group', '0'),
(40, 'clients_can_upload', '1'),
(41, 'clients_can_set_expiration_date', '1'),
(42, 'email_new_file_by_user_customize', '0'),
(43, 'email_new_file_by_client_customize', '0'),
(44, 'email_new_client_by_user_customize', '0'),
(45, 'email_new_client_by_self_customize', '0'),
(46, 'email_new_user_customize', '0'),
(47, 'email_new_file_by_user_text', ''),
(48, 'email_new_file_by_client_text', ''),
(49, 'email_new_client_by_user_text', ''),
(50, 'email_new_client_by_self_text', ''),
(51, 'email_new_user_text', ''),
(52, 'email_header_footer_customize', '0'),
(53, 'email_header_text', ''),
(54, 'email_footer_text', ''),
(55, 'email_pass_reset_customize', '0'),
(56, 'email_pass_reset_text', ''),
(57, 'expired_files_hide', '1'),
(58, 'notifications_max_tries', '2'),
(59, 'notifications_max_days', '15'),
(60, 'file_types_limit_to', 'all'),
(61, 'pass_require_upper', '0'),
(62, 'pass_require_lower', '0'),
(63, 'pass_require_number', '0'),
(64, 'pass_require_special', '0'),
(65, 'mail_smtp_auth', 'none'),
(66, 'use_browser_lang', '0'),
(67, 'clients_can_delete_own_files', '1'),
(68, 'google_client_id', ''),
(69, 'google_client_secret', ''),
(70, 'google_signin_enabled', 'false'),
(71, 'recaptcha_enabled', '0'),
(72, 'recaptcha_site_key', ''),
(73, 'recaptcha_secret_key', ''),
(74, 'clients_can_select_group', 'all'),
(75, 'files_descriptions_use_ckeditor', '0'),
(76, 'enable_landing_for_all_files', '0'),
(77, 'footer_custom_enable', '1'),
(78, 'footer_custom_content', 'Copyright 2022 © Bhemax4IT'),
(79, 'email_new_file_by_user_subject_customize', '0'),
(80, 'email_new_file_by_client_subject_customize', '0'),
(81, 'email_new_client_by_user_subject_customize', '0'),
(82, 'email_new_client_by_self_subject_customize', '0'),
(83, 'email_new_user_subject_customize', '0'),
(84, 'email_pass_reset_subject_customize', '0'),
(85, 'email_new_file_by_user_subject', ''),
(86, 'email_new_file_by_client_subject', ''),
(87, 'email_new_client_by_user_subject', ''),
(88, 'email_new_client_by_self_subject', ''),
(89, 'email_new_user_subject', ''),
(90, 'email_pass_reset_subject', ''),
(91, 'privacy_noindex_site', '0'),
(92, 'email_account_approve_subject_customize', '0'),
(93, 'email_account_deny_subject_customize', '0'),
(94, 'email_account_approve_customize', '0'),
(95, 'email_account_deny_customize', '0'),
(96, 'email_account_approve_subject', ''),
(97, 'email_account_deny_subject', ''),
(98, 'email_account_approve_text', ''),
(99, 'email_account_deny_text', ''),
(100, 'email_client_edited_subject_customize', '0'),
(101, 'email_client_edited_customize', '0'),
(102, 'email_client_edited_subject', ''),
(103, 'email_client_edited_text', ''),
(104, 'public_listing_page_enable', '1'),
(105, 'public_listing_logged_only', '1'),
(106, 'public_listing_show_all_files', '1'),
(107, 'public_listing_use_download_link', '1'),
(108, 'svg_show_as_thumbnail', '0'),
(109, 'pagination_results_per_page', '10'),
(110, 'login_ip_whitelist', ''),
(111, 'login_ip_blacklist', ''),
(112, 'cron_enable', '0'),
(113, 'cron_key', 'd10d4b27213cc27a34a52bd576779514dc9b37410789f596'),
(114, 'cron_send_emails', '0'),
(115, 'cron_delete_expired_files', '0'),
(116, 'cron_delete_orphan_files', '0'),
(117, 'notifications_max_emails_at_once', '0'),
(118, 'cron_command_line_only', '1'),
(119, 'cron_email_summary_send', '0'),
(120, 'cron_email_summary_address_to', ''),
(121, 'notifications_send_when_saving_files', '0'),
(122, 'cron_save_log_database', '1'),
(123, 'cron_delete_orphan_files_types', 'not_allowed'),
(124, 'files_default_expire', '0'),
(125, 'files_default_expire_days_after', '30'),
(126, 'privacy_record_downloads_ip_address', 'all'),
(127, 'public_listing_enable_preview', '1'),
(128, 'authentication_require_email_code', '0'),
(129, 'email_2fa_code_subject_customize', '0'),
(130, 'email_2fa_code_subject', ''),
(131, 'email_2fa_code_customize', '0'),
(132, 'email_2fa_code_text', ''),
(133, 'public_listing_home_show_link', '0'),
(134, 'show_upgrade_success_message', 'false'),
(135, 'section', 'privacy'),
(136, 'MAX_FILE_SIZE', '1000000000'),
(137, 'download_method', 'php'),
(138, 'xsendfile_enable', '0'),
(139, 'csrf_token', 'b4ed11baddb6f59500237a2cede1a14c0646c7a8b6ad2668557c59489b15a789'),
(140, 'submit', ''),
(141, 'clients_can_set_public', 'allowed'),
(142, 'clients_new_default_can_set_public', '0'),
(143, 'ip_whitelist', ''),
(144, 'ip_blacklist', ''),
(145, 'mail_ssl_verify_peer', '0'),
(146, 'mail_ssl_verify_peer_name', '0'),
(147, 'mail_ssl_allow_self_signed', '0'),
(148, 'facebook_signin_enabled', 'false'),
(149, 'facebook_client_id', ''),
(150, 'facebook_client_secret', ''),
(151, 'linkedin_signin_enabled', 'false'),
(152, 'linkedin_client_id', ''),
(153, 'linkedin_client_secret', ''),
(154, 'twitter_signin_enabled', 'false'),
(155, 'twitter_client_id', ''),
(156, 'twitter_client_secret', ''),
(157, 'windowslive_signin_enabled', 'false'),
(158, 'windowslive_client_id', ''),
(159, 'windowslive_client_secret', ''),
(160, 'yahoo_signin_enabled', 'false'),
(161, 'yahoo_client_id', ''),
(162, 'yahoo_client_secret', ''),
(163, 'microsoftgraph_signin_enabled', 'false'),
(164, 'microsoftgraph_client_id', ''),
(165, 'microsoftgraph_client_secret', ''),
(166, 'microsoftgraph_client_tenant', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_reset`
--

CREATE TABLE `tbl_password_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(32) NOT NULL,
  `used` int(1) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 0,
  `address` text DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT 0,
  `contact` text DEFAULT NULL,
  `created_by` varchar(60) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `account_requested` tinyint(1) NOT NULL DEFAULT 0,
  `account_denied` tinyint(1) NOT NULL DEFAULT 0,
  `max_file_size` int(20) NOT NULL DEFAULT 0,
  `can_upload_public` int(20) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user`, `password`, `name`, `email`, `level`, `address`, `phone`, `notify`, `contact`, `created_by`, `active`, `account_requested`, `account_denied`, `max_file_size`, `can_upload_public`, `timestamp`) VALUES
(1, 'admin', '$2y$08$c1IeCoWcVnrke0COuo8WLOocH7lmEJNNgepSFWLwJkK8WyfbQ6.RO', 'admin', 'robymarlouise@gmail.com', 9, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 0, 0, '2022-12-21 05:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_limit_upload_to`
--

CREATE TABLE `tbl_user_limit_upload_to` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_meta`
--

CREATE TABLE `tbl_user_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_actions_log`
--
ALTER TABLE `tbl_actions_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_authentication_codes`
--
ALTER TABLE `tbl_authentication_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `tbl_categories_relations`
--
ALTER TABLE `tbl_categories_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_cron_log`
--
ALTER TABLE `tbl_cron_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_custom_assets`
--
ALTER TABLE `tbl_custom_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_downloads`
--
ALTER TABLE `tbl_downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_files_relations`
--
ALTER TABLE `tbl_files_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexes for table `tbl_folders`
--
ALTER TABLE `tbl_folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logins_failed`
--
ALTER TABLE `tbl_logins_failed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `tbl_members_requests`
--
ALTER TABLE `tbl_members_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_limit_upload_to`
--
ALTER TABLE `tbl_user_limit_upload_to`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `tbl_user_meta`
--
ALTER TABLE `tbl_user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_actions_log`
--
ALTER TABLE `tbl_actions_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `tbl_authentication_codes`
--
ALTER TABLE `tbl_authentication_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_categories_relations`
--
ALTER TABLE `tbl_categories_relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cron_log`
--
ALTER TABLE `tbl_cron_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_custom_assets`
--
ALTER TABLE `tbl_custom_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_downloads`
--
ALTER TABLE `tbl_downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_files_relations`
--
ALTER TABLE `tbl_files_relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_folders`
--
ALTER TABLE `tbl_folders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_logins_failed`
--
ALTER TABLE `tbl_logins_failed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_members_requests`
--
ALTER TABLE `tbl_members_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_limit_upload_to`
--
ALTER TABLE `tbl_user_limit_upload_to`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_meta`
--
ALTER TABLE `tbl_user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_authentication_codes`
--
ALTER TABLE `tbl_authentication_codes`
  ADD CONSTRAINT `tbl_authentication_codes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD CONSTRAINT `tbl_categories_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_categories_relations`
--
ALTER TABLE `tbl_categories_relations`
  ADD CONSTRAINT `tbl_categories_relations_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `tbl_files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_categories_relations_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_downloads`
--
ALTER TABLE `tbl_downloads`
  ADD CONSTRAINT `tbl_downloads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_downloads_ibfk_2` FOREIGN KEY (`file_id`) REFERENCES `tbl_files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD CONSTRAINT `tbl_files_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_files_relations`
--
ALTER TABLE `tbl_files_relations`
  ADD CONSTRAINT `tbl_files_relations_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `tbl_files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_files_relations_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_files_relations_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_files_relations_ibfk_4` FOREIGN KEY (`folder_id`) REFERENCES `tbl_folders` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_folders`
--
ALTER TABLE `tbl_folders`
  ADD CONSTRAINT `tbl_folders_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_folders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_folders_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_folders_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD CONSTRAINT `tbl_members_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_members_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_members_requests`
--
ALTER TABLE `tbl_members_requests`
  ADD CONSTRAINT `tbl_members_requests_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_members_requests_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD CONSTRAINT `tbl_notifications_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `tbl_files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_notifications_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  ADD CONSTRAINT `tbl_password_reset_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_limit_upload_to`
--
ALTER TABLE `tbl_user_limit_upload_to`
  ADD CONSTRAINT `tbl_user_limit_upload_to_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_user_limit_upload_to_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_meta`
--
ALTER TABLE `tbl_user_meta`
  ADD CONSTRAINT `tbl_user_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
