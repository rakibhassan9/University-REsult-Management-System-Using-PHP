-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2018 at 02:40 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ucrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

DROP TABLE IF EXISTS `assign_subjects`;
CREATE TABLE IF NOT EXISTS `assign_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `subject_id`, `teacher_id`, `added_on`) VALUES
(34, 3, 39, '2018-05-18 23:32:01'),
(33, 2, 39, '2018-05-18 23:32:01'),
(32, 1, 39, '2018-05-18 23:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `results_exam_controller`
--

DROP TABLE IF EXISTS `results_exam_controller`;
CREATE TABLE IF NOT EXISTS `results_exam_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(3) NOT NULL,
  `attendance` int(2) NOT NULL DEFAULT '0',
  `assignment` int(2) NOT NULL DEFAULT '0',
  `tutorial` int(2) NOT NULL DEFAULT '0',
  `viva` int(2) NOT NULL DEFAULT '0',
  `presentation` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results_exam_controller`
--

INSERT INTO `results_exam_controller` (`id`, `student_id`, `subject_id`, `attendance`, `assignment`, `tutorial`, `viva`, `presentation`, `status`, `added_on`) VALUES
(202, 58, 77, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(201, 58, 76, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(200, 58, 75, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(199, 58, 74, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(198, 58, 73, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(197, 58, 72, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(196, 58, 71, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(195, 58, 70, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(194, 58, 69, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(193, 58, 68, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(192, 58, 67, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(191, 58, 66, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(190, 58, 65, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(189, 58, 64, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(188, 58, 63, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(187, 58, 62, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(186, 58, 61, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(185, 58, 60, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(184, 58, 59, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(183, 58, 58, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(182, 58, 57, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(181, 58, 56, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(180, 58, 55, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(179, 58, 54, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(178, 58, 53, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(177, 58, 52, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(176, 58, 51, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(175, 58, 50, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(174, 58, 49, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(173, 58, 48, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(172, 58, 47, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(171, 58, 46, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(170, 58, 45, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(169, 58, 44, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(168, 58, 43, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(167, 58, 42, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(166, 58, 41, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(165, 58, 40, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(164, 58, 39, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(163, 58, 38, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(162, 58, 37, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(161, 58, 36, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(160, 58, 35, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(159, 58, 34, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(158, 58, 33, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(157, 58, 32, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(156, 58, 31, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(155, 58, 30, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(154, 58, 29, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(153, 58, 28, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(152, 58, 27, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(151, 58, 26, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(150, 58, 25, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(149, 58, 24, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(148, 58, 23, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(147, 58, 22, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(146, 58, 21, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(145, 58, 20, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(144, 58, 19, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(143, 58, 18, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(142, 58, 17, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(141, 58, 16, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(140, 58, 15, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(139, 58, 14, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(138, 58, 13, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(137, 58, 12, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(136, 58, 11, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(135, 58, 10, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(134, 58, 9, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(133, 58, 8, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(132, 58, 7, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(131, 58, 6, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(130, 58, 5, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(129, 58, 4, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(128, 58, 3, 5, 7, 9, 11, 8, 1, '2018-05-25 15:26:51'),
(127, 58, 2, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51'),
(126, 58, 1, 0, 0, 0, 0, 0, 0, '2018-05-25 15:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `results_teacher`
--

DROP TABLE IF EXISTS `results_teacher`;
CREATE TABLE IF NOT EXISTS `results_teacher` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `midterm` int(2) NOT NULL DEFAULT '0',
  `final` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0=unpublished 1=published',
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=MyISAM AUTO_INCREMENT=463 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results_teacher`
--

INSERT INTO `results_teacher` (`result_id`, `student_id`, `subject_id`, `midterm`, `final`, `status`, `added_on`) VALUES
(462, 58, 77, 0, 0, 1, '2018-05-25 15:26:51'),
(461, 58, 76, 0, 0, 1, '2018-05-25 15:26:51'),
(460, 58, 75, 0, 0, 1, '2018-05-25 15:26:51'),
(459, 58, 74, 0, 0, 1, '2018-05-25 15:26:51'),
(458, 58, 73, 0, 0, 1, '2018-05-25 15:26:51'),
(457, 58, 72, 0, 0, 1, '2018-05-25 15:26:51'),
(456, 58, 71, 0, 0, 1, '2018-05-25 15:26:51'),
(455, 58, 70, 0, 0, 1, '2018-05-25 15:26:51'),
(454, 58, 69, 0, 0, 1, '2018-05-25 15:26:51'),
(453, 58, 68, 0, 0, 1, '2018-05-25 15:26:51'),
(452, 58, 67, 0, 0, 1, '2018-05-25 15:26:51'),
(451, 58, 66, 0, 0, 1, '2018-05-25 15:26:51'),
(450, 58, 65, 0, 0, 1, '2018-05-25 15:26:51'),
(449, 58, 64, 0, 0, 1, '2018-05-25 15:26:51'),
(448, 58, 63, 0, 0, 1, '2018-05-25 15:26:51'),
(447, 58, 62, 0, 0, 1, '2018-05-25 15:26:51'),
(446, 58, 61, 0, 0, 1, '2018-05-25 15:26:51'),
(445, 58, 60, 0, 0, 1, '2018-05-25 15:26:51'),
(444, 58, 59, 0, 0, 1, '2018-05-25 15:26:51'),
(443, 58, 58, 0, 0, 1, '2018-05-25 15:26:51'),
(442, 58, 57, 0, 0, 1, '2018-05-25 15:26:51'),
(441, 58, 56, 0, 0, 1, '2018-05-25 15:26:51'),
(440, 58, 55, 0, 0, 1, '2018-05-25 15:26:51'),
(439, 58, 54, 0, 0, 1, '2018-05-25 15:26:51'),
(438, 58, 53, 0, 0, 1, '2018-05-25 15:26:51'),
(437, 58, 52, 0, 0, 1, '2018-05-25 15:26:51'),
(436, 58, 51, 0, 0, 1, '2018-05-25 15:26:51'),
(435, 58, 50, 0, 0, 1, '2018-05-25 15:26:51'),
(434, 58, 49, 0, 0, 1, '2018-05-25 15:26:51'),
(433, 58, 48, 0, 0, 1, '2018-05-25 15:26:51'),
(432, 58, 47, 0, 0, 1, '2018-05-25 15:26:51'),
(431, 58, 46, 0, 0, 1, '2018-05-25 15:26:51'),
(430, 58, 45, 0, 0, 1, '2018-05-25 15:26:51'),
(429, 58, 44, 0, 0, 1, '2018-05-25 15:26:51'),
(428, 58, 43, 0, 0, 1, '2018-05-25 15:26:51'),
(427, 58, 42, 0, 0, 1, '2018-05-25 15:26:51'),
(426, 58, 41, 0, 0, 1, '2018-05-25 15:26:51'),
(425, 58, 40, 0, 0, 1, '2018-05-25 15:26:51'),
(424, 58, 39, 0, 0, 1, '2018-05-25 15:26:51'),
(423, 58, 38, 0, 0, 1, '2018-05-25 15:26:51'),
(422, 58, 37, 0, 0, 1, '2018-05-25 15:26:51'),
(421, 58, 36, 0, 0, 1, '2018-05-25 15:26:51'),
(420, 58, 35, 0, 0, 1, '2018-05-25 15:26:51'),
(419, 58, 34, 0, 0, 1, '2018-05-25 15:26:51'),
(418, 58, 33, 0, 0, 1, '2018-05-25 15:26:51'),
(417, 58, 32, 0, 0, 1, '2018-05-25 15:26:51'),
(416, 58, 31, 0, 0, 1, '2018-05-25 15:26:51'),
(415, 58, 30, 0, 0, 1, '2018-05-25 15:26:51'),
(414, 58, 29, 0, 0, 1, '2018-05-25 15:26:51'),
(413, 58, 28, 0, 0, 1, '2018-05-25 15:26:51'),
(412, 58, 27, 0, 0, 1, '2018-05-25 15:26:51'),
(411, 58, 26, 0, 0, 1, '2018-05-25 15:26:51'),
(410, 58, 25, 0, 0, 1, '2018-05-25 15:26:51'),
(409, 58, 24, 0, 0, 1, '2018-05-25 15:26:51'),
(408, 58, 23, 0, 0, 1, '2018-05-25 15:26:51'),
(407, 58, 22, 0, 0, 1, '2018-05-25 15:26:51'),
(406, 58, 21, 0, 0, 1, '2018-05-25 15:26:51'),
(405, 58, 20, 0, 0, 1, '2018-05-25 15:26:51'),
(404, 58, 19, 0, 0, 1, '2018-05-25 15:26:51'),
(403, 58, 18, 0, 0, 1, '2018-05-25 15:26:51'),
(402, 58, 17, 0, 0, 1, '2018-05-25 15:26:51'),
(401, 58, 16, 0, 0, 1, '2018-05-25 15:26:51'),
(400, 58, 15, 0, 0, 1, '2018-05-25 15:26:51'),
(399, 58, 14, 0, 0, 1, '2018-05-25 15:26:51'),
(398, 58, 13, 0, 0, 1, '2018-05-25 15:26:51'),
(397, 58, 12, 0, 0, 1, '2018-05-25 15:26:51'),
(396, 58, 11, 0, 0, 1, '2018-05-25 15:26:51'),
(395, 58, 10, 0, 0, 1, '2018-05-25 15:26:51'),
(394, 58, 9, 0, 0, 1, '2018-05-25 15:26:51'),
(393, 58, 8, 0, 0, 1, '2018-05-25 15:26:51'),
(392, 58, 7, 0, 0, 1, '2018-05-25 15:26:51'),
(391, 58, 6, 0, 0, 1, '2018-05-25 15:26:51'),
(390, 58, 5, 0, 0, 1, '2018-05-25 15:26:51'),
(389, 58, 4, 0, 0, 1, '2018-05-25 15:26:51'),
(388, 58, 3, 20, 40, 1, '2018-05-25 15:26:51'),
(387, 58, 2, 0, 0, 1, '2018-05-25 15:26:51'),
(386, 58, 1, 0, 0, 1, '2018-05-25 15:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `students_profile`
--

DROP TABLE IF EXISTS `students_profile`;
CREATE TABLE IF NOT EXISTS `students_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `roll` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `current_semester` int(2) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_profile`
--

INSERT INTO `students_profile` (`id`, `user_id`, `roll`, `current_semester`, `created_on`) VALUES
(1, 58, '201619292', 1, '2018-05-25 15:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_name` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` int(2) NOT NULL,
  `added_on` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `subject_name`, `semester`, `added_on`) VALUES
(1, 'BCH-101', 'Bangladesh:  Culture & Heritage', 1, '2018-04-21 20:14:39'),
(2, 'ENG-1101', 'English Foundation-l', 1, '2018-04-21 20:15:02'),
(3, 'ENG-1102', 'English Foundation-ll', 1, '2018-04-21 20:15:13'),
(4, 'ENG-1103', 'English Foundation-lll', 1, '2018-04-21 20:21:49'),
(5, 'CSE-102L', 'Computer Application Lab', 1, '2018-04-21 20:22:02'),
(6, 'CSE 115L', 'Computer Programming in  C/C++ Lab', 2, '2018-04-21 20:22:24'),
(7, 'CSE 115', 'Computer Programming in C/C++', 2, '2018-04-21 20:22:41'),
(8, 'MATH 104', 'Integral Calculus', 2, '2018-04-21 20:22:51'),
(9, 'ACC 101', 'Accounting', 2, '2018-04-21 20:22:59'),
(10, 'CSE 103', 'DC Electrical Circuits', 2, '2018-04-21 20:23:08'),
(11, 'PHY 101', 'Physics', 2, '2018-04-21 20:23:17'),
(12, 'MATH 103', 'Differential Calculus', 2, '2018-04-21 20:23:25'),
(13, 'CSE 101', 'Computer Fundamentals', 2, '2018-04-21 20:23:33'),
(14, 'CSE 107L', 'Engineering Drawing Using Software Lab', 3, '2018-04-21 20:23:50'),
(15, 'MATH 105', 'Linear Algebra & Geometry', 3, '2018-04-21 20:23:59'),
(16, 'CSE 108', 'Data Structures & Algorithms I', 3, '2018-04-21 20:24:06'),
(17, 'CSE 108L', 'Data Structures & Algorithms I Lab', 3, '2018-04-21 20:24:14'),
(18, 'CSE 105', 'Object Oriented Programming', 3, '2018-04-21 20:24:23'),
(19, 'CSE 105L', 'Object Oriented Programming Lab', 3, '2018-04-21 20:24:31'),
(20, 'CSE 112', 'Electrical Circuit', 3, '2018-04-21 20:24:39'),
(21, 'CSE 209', 'Data Structures & Algorithms II', 4, '2018-04-21 20:24:47'),
(22, 'CSE 209L', 'Data Structures & Algorithms II Lab', 4, '2018-04-21 20:24:55'),
(23, 'CSE 206', 'Visual Programming using JAVA', 4, '2018-04-21 20:25:03'),
(24, 'CSE 202', 'Analog Electronics', 4, '2018-04-21 20:25:12'),
(25, 'CSE 202L', 'Analog Electronics Lab', 4, '2018-04-21 20:25:21'),
(26, 'MATH 201', 'Discrete Mathematics', 4, '2018-04-21 20:25:29'),
(27, 'ECO 201', 'Economics', 4, '2018-04-21 20:25:39'),
(28, 'HUM 201', 'Business Communications', 5, '2018-04-21 20:26:25'),
(29, 'CSE 208', 'Communication Engineering', 5, '2018-04-21 20:26:33'),
(30, 'CSE 203', 'Database Management System', 5, '2018-04-21 20:26:41'),
(31, 'CSE 203L', 'Database Management System Lab', 5, '2018-04-21 20:26:49'),
(32, 'CSE 204', 'Digital Electronics and Logic Design', 5, '2018-04-21 20:26:59'),
(33, 'CSE 204L', 'Digital Electronics and Logic Design Lab', 5, '2018-04-21 20:27:07'),
(34, 'MATH 202', 'Numerical Analysis', 5, '2018-04-21 20:27:16'),
(35, 'MATH 202L', 'Numerical Analysis Lab', 5, '2018-04-21 20:27:24'),
(36, 'CSE 205', 'Operating System and System Programming', 6, '2018-04-21 20:27:32'),
(37, 'CSE 205L', 'Operating System and System Programming Lab', 6, '2018-04-21 20:27:41'),
(38, 'STAT 201', 'Statistics', 6, '2018-04-21 20:27:48'),
(39, 'CSE 201', 'Computer Organization and Architecture', 6, '2018-04-21 20:27:58'),
(40, 'CSE 211', 'System Analysis & Design', 6, '2018-04-21 20:28:08'),
(41, 'CSE 210', 'Data and Telecommunications', 6, '2018-04-21 20:28:17'),
(42, 'CSE 305', 'Design & Analysis of Algorithms', 7, '2018-04-21 20:28:26'),
(43, 'CSE 305L', 'Design & Analysis of Algorithms Lab', 7, '2018-04-21 20:28:34'),
(44, 'CSE 310', 'Software Engineering', 7, '2018-04-21 20:28:42'),
(45, 'CSE 309', 'Microprocessor & Assembly Language', 7, '2018-04-21 20:28:51'),
(46, 'CSE 309L', 'Microprocessor & Assembly Language Lab', 7, '2018-04-21 20:29:00'),
(47, 'CSE 304', 'Computer Networks', 7, '2018-04-21 20:29:08'),
(48, 'CSE 304L', 'Computer Network Lab', 7, '2018-04-21 20:29:16'),
(49, 'PSY 301', 'Psychology', 7, '2018-04-21 20:29:25'),
(50, 'CSE 303', 'Internet Technology', 8, '2018-04-21 20:29:34'),
(51, 'CSE 303L', 'Internet Technology Lab', 8, '2018-04-21 20:29:42'),
(52, 'CSE 301', 'Automata Theory', 8, '2018-04-21 20:29:50'),
(53, 'CSE 311', 'Peripherals & Interfacing', 8, '2018-04-21 20:29:58'),
(54, 'CSE 311L', 'Peripheral & Interfacing Lab', 8, '2018-04-21 20:30:06'),
(55, 'CSE 307', 'RDBMS using ORACLE', 8, '2018-04-21 20:30:14'),
(56, 'CSE 307L', 'RDBMS using ORACLE Lab', 8, '2018-04-21 20:30:24'),
(57, 'MIS 301', 'Management Information System', 8, '2018-04-21 20:30:31'),
(58, 'CSE 306', 'Digital Signal Processing', 9, '2018-04-21 20:30:39'),
(59, 'CSE302', 'Artificial Intelligence', 9, '2018-04-21 20:30:40'),
(60, 'CSE 302L', 'Artificial Intelligence Lab', 9, '2018-04-21 20:31:35'),
(61, 'CSE 308', 'Compiler Design', 9, '2018-04-21 20:35:19'),
(62, 'CSE 312', 'E-commerce and Web Design', 9, '2018-04-21 20:35:43'),
(63, 'CSE 312L', 'E-commerce and Web Design Lab', 9, '2018-04-21 20:35:52'),
(64, 'MAR 301', 'Principle of Marketing', 9, '2018-04-21 20:36:09'),
(65, 'CSE 404 IT', 'IT Organization & Management', 10, '2018-04-21 20:36:18'),
(66, 'CSE 402', 'Neural Networks', 10, '2018-04-21 20:36:25'),
(67, 'CSE 402L', 'Neural Networks Lab', 10, '2018-04-21 20:36:32'),
(68, 'CSE 403', 'Computer Graphics', 10, '2018-04-21 20:36:39'),
(69, 'CSE 403L', 'Computer Graphics Lab', 10, '2018-04-21 20:36:46'),
(70, 'CSE 407', 'UNIX Programming', 10, '2018-04-21 20:36:54'),
(71, 'CSE 407L', 'UNIX Programming Lab', 10, '2018-04-21 20:37:01'),
(72, 'CSE 408', 'Industrial Training (4 Weeks)', 11, '2018-04-21 20:37:08'),
(73, 'CSE 401', 'Multimedia', 11, '2018-04-21 20:37:15'),
(74, 'CSE 401L', 'Multimedia Lab', 11, '2018-04-21 20:37:23'),
(75, 'CSE 406', 'VLSI Design & Testing', 11, '2018-04-21 20:37:29'),
(76, 'CSE 410', 'Project/Thesis', 11, '2018-04-21 20:37:38'),
(77, 'CSE 411', 'Project/Thesis with Seminar', 12, '2018-04-21 20:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `users_credentials`
--

DROP TABLE IF EXISTS `users_credentials`;
CREATE TABLE IF NOT EXISTS `users_credentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(2) NOT NULL COMMENT '1=super admin, 2=exam controller, 3=teacher, 4=student',
  `verification_status` int(1) NOT NULL DEFAULT '0',
  `registered_on` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_credentials`
--

INSERT INTO `users_credentials` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `verification_status`, `registered_on`) VALUES
(7, 'Super', 'Admin', 'superone@admin.com', '$2y$10$LJNwXaQinwBiqq5Re.7V5.XSbXaCOjBAhm26YONQPHkyvKS//vp0S', 1, 1, '2018-04-29 06:18:01'),
(58, 'Student', 'One', 'studentone@student.com', '$2y$10$41ZtKU7KaI8NzsB7QYfnqeHPCWYwbKRAJRzsar4MUyZsXdvcRGW7K', 4, 1, '2018-05-25 09:26:51'),
(23, 'Exam', 'Controller', 'examone@controller.com', '$2y$10$VCpgKC.K6liL0/1fP/Nshul1w0s.eenCooZ/pE6lZfzN5saoZKVHm', 2, 1, '2018-05-05 08:30:00'),
(39, 'Teacher', 'One', 'teacherone@teacher.com', '$2y$10$IfaS36LMMRRV5gyD59OzeuecqrDkfiANtCR5hdB0aGKYXJX4tHimq', 3, 1, '2018-05-08 18:32:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
