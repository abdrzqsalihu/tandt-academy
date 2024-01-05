-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 09:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tandt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `img` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `classes` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `img`, `password`, `classes`, `status`) VALUES
(1, 'Abdulrazaq Salihu Onoruoiza', 'user@admin.com', '+2348085458632', '+2348085458632_Abdulrazaq Salihu Onoruoiza.jpg', 'qwerty123', '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14', 'SUPER_ADMIN'),
(2, 'King Timothy', 'kingt@gmail.com', '09076543456', '09076543456_9681.jpg', '09076543456', '1,13', 'TEACHER');

-- --------------------------------------------------------

--
-- Table structure for table `basic1`
--

CREATE TABLE `basic1` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `subject_abr` varchar(200) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic1_subjects`
--

CREATE TABLE `basic1_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic1_subjects`
--

INSERT INTO `basic1_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Mathematics', 'MATH', 'Mr. John'),
(2, 'English Studies', 'ENG', 'Mr. John'),
(3, 'Basic Technology', 'B-TECH', 'Mr. John'),
(4, 'Basic Science', 'B-SCI', 'Mr. John'),
(5, 'Physical Health Education', 'PHE', 'Mr. John'),
(6, 'Computer Science', 'COMP', 'Mrs. Tolu'),
(7, 'Christian Religious Studes', 'CRS', 'Mrs. Tolu'),
(8, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(9, 'Civic Education', 'CIVIC', 'Mrs. Tolu'),
(10, 'Cultural and Creative Arts', 'CCA', 'Mrs. Tolu'),
(11, 'Agricultural Science ', 'AGRIC', 'Mr. Mike'),
(12, 'Home Economics', 'H-ECONS', 'Mrs. Tolu'),
(13, 'Exceptional Speech', 'E-SP', 'Mr. Mike'),
(14, 'French', 'FR', 'Mrs. Tolu'),
(15, 'History', 'HIS', 'Mr. Mike'),
(16, 'Literature', 'LIT', 'Mr, John'),
(17, 'Social Studies', 'S-ST', 'Miss. Aisha'),
(18, 'Security Education', 'S-EDU', 'Mrs. Tolu');

-- --------------------------------------------------------

--
-- Table structure for table `basic2`
--

CREATE TABLE `basic2` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic2_subjects`
--

CREATE TABLE `basic2_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic2_subjects`
--

INSERT INTO `basic2_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Mathematics', 'MATH', 'Mr. John'),
(2, 'English Studies', 'ENG', 'Mr. John'),
(3, 'Basic Technology', 'B-TECH', 'Mr. John'),
(4, 'Basic Science', 'B-SCI', 'Mr. John'),
(5, 'Physical Health Education', 'PHE', 'Mr. John'),
(6, 'Computer Science', 'COMP', 'Mrs. Tolu'),
(7, 'Christian Religious Studes', 'CRS', 'Mrs. Tolu'),
(8, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(9, 'Civic Education', 'CIVIC', 'Mrs. Tolu'),
(10, 'Cultural and Creative Arts', 'CCA', 'Mrs. Tolu'),
(11, 'Agricultural Science ', 'AGRIC', 'Mr. Mike'),
(12, 'Home Economics', 'H-ECONS', 'Mrs. Tolu'),
(13, 'Exceptional Speech', 'E-SP', 'Mr. Mike'),
(14, 'French', 'FR', 'Mrs. Tolu'),
(15, 'History', 'HIS', 'Mr. Mike'),
(16, 'Literature', 'LIT', 'Mr, John'),
(17, 'Social Studies', 'S-ST', 'Miss. Aisha'),
(18, 'Security Education', 'S-EDU', 'Mrs. Tolu');

-- --------------------------------------------------------

--
-- Table structure for table `basic3`
--

CREATE TABLE `basic3` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic3_subjects`
--

CREATE TABLE `basic3_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic3_subjects`
--

INSERT INTO `basic3_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Mathematics', 'MATH', 'Mr. John'),
(2, 'English Studies', 'ENG', 'Mr. John'),
(3, 'Basic Technology', 'B-TECH', 'Mr. John'),
(4, 'Basic Science', 'B-SCI', 'Mr. John'),
(5, 'Physical Health Education', 'PHE', 'Mr. John'),
(6, 'Computer Science', 'COMP', 'Mrs. Tolu'),
(7, 'Christian Religious Studes', 'CRS', 'Mrs. Tolu'),
(8, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(9, 'Civic Education', 'CIVIC', 'Mrs. Tolu'),
(10, 'Cultural and Creative Arts', 'CCA', 'Mrs. Tolu'),
(11, 'Agricultural Science ', 'AGRIC', 'Mr. Mike'),
(12, 'Home Economics', 'H-ECONS', 'Mrs. Tolu'),
(13, 'Exceptional Speech', 'E-SP', 'Mr. Mike'),
(14, 'French', 'FR', 'Mrs. Tolu'),
(15, 'History', 'HIS', 'Mr. Mike'),
(16, 'Literature', 'LIT', 'Mr, John'),
(17, 'Social Studies', 'S-ST', 'Miss. Aisha'),
(18, 'Security Education', 'S-EDU', 'Mrs. Tolu');

-- --------------------------------------------------------

--
-- Table structure for table `basic4`
--

CREATE TABLE `basic4` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic4_subjects`
--

CREATE TABLE `basic4_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic4_subjects`
--

INSERT INTO `basic4_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Mathematics', 'MATH', 'Mr. John'),
(2, 'English Studies', 'ENG', 'Mr. John'),
(3, 'Basic Technology', 'B-TECH', 'Mr. John'),
(4, 'Basic Science', 'B-SCI', 'Mr. John'),
(5, 'Physical Health Education', 'PHE', 'Mr. John'),
(6, 'Computer Science', 'COMP', 'Mrs. Tolu'),
(7, 'Christian Religious Studes', 'CRS', 'Mrs. Tolu'),
(8, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(9, 'Civic Education', 'CIVIC', 'Mrs. Tolu'),
(10, 'Cultural and Creative Arts', 'CCA', 'Mrs. Tolu'),
(11, 'Agricultural Science ', 'AGRIC', 'Mr. Mike'),
(12, 'Home Economics', 'H-ECONS', 'Mrs. Tolu'),
(13, 'Exceptional Speech', 'E-SP', 'Mr. Mike'),
(14, 'French', 'FR', 'Mrs. Tolu'),
(15, 'History', 'HIS', 'Mr. Mike'),
(16, 'Literature', 'LIT', 'Mr, John'),
(17, 'Social Studies', 'S-ST', 'Miss. Aisha'),
(18, 'Security Education', 'S-EDU', 'Mrs. Tolu');

-- --------------------------------------------------------

--
-- Table structure for table `basic5`
--

CREATE TABLE `basic5` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic5_subjects`
--

CREATE TABLE `basic5_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basic5_subjects`
--

INSERT INTO `basic5_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Mathematics', 'MATH', 'Mr. John'),
(2, 'English Studies', 'ENG', 'Mr. John'),
(3, 'Basic Technology', 'B-TECH', 'Mr. John'),
(4, 'Basic Science', 'B-SCI', 'Mr. John'),
(5, 'Physical Health Education', 'PHE', 'Mr. John'),
(6, 'Computer Science', 'COMP', 'Mrs. Tolu'),
(7, 'Christian Religious Studes', 'CRS', 'Mrs. Tolu'),
(8, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(9, 'Civic Education', 'CIVIC', 'Mrs. Tolu'),
(10, 'Cultural and Creative Arts', 'CCA', 'Mrs. Tolu'),
(11, 'Agricultural Science ', 'AGRIC', 'Mr. Mike'),
(12, 'Home Economics', 'H-ECONS', 'Mrs. Tolu'),
(13, 'Exceptional Speech', 'E-SP', 'Mr. Mike'),
(14, 'French', 'FR', 'Mrs. Tolu'),
(15, 'History', 'HIS', 'Mr. Mike'),
(16, 'Literature', 'LIT', 'Mr, John'),
(17, 'Social Studies', 'S-ST', 'Miss. Aisha'),
(18, 'Security Education', 'S-EDU', 'Mrs. Tolu');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(200) NOT NULL,
  `classes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classes`) VALUES
(1, 'K G 1'),
(2, 'Pre Nursery'),
(3, 'Nursery 2'),
(4, 'Basic 1'),
(5, 'Basic 2'),
(6, 'Basic 3'),
(7, 'Basic 4'),
(8, 'Basic 5'),
(9, 'JSS 1'),
(10, 'JSS 2'),
(11, 'JSS 3'),
(12, 'SSS 1'),
(13, 'SSS 2'),
(14, 'SSS 3');

-- --------------------------------------------------------

--
-- Table structure for table `jss1`
--

CREATE TABLE `jss1` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jss1_subjects`
--

CREATE TABLE `jss1_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jss2`
--

CREATE TABLE `jss2` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jss2_subjects`
--

CREATE TABLE `jss2_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jss3`
--

CREATE TABLE `jss3` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jss3_subjects`
--

CREATE TABLE `jss3_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kg1`
--

CREATE TABLE `kg1` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kg1_subjects`
--

CREATE TABLE `kg1_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kg1_subjects`
--

INSERT INTO `kg1_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Literacy', 'LIT', 'Miss. Peace'),
(2, 'Numeracy', 'NUM', 'Miss. Peace'),
(3, 'Social Habit', 'S-HAB', 'Miss. Peace'),
(4, 'Health Habit', 'H-HAB', 'Miss. Peace'),
(5, 'Rhymes', 'RHY', 'Miss. Peace'),
(6, 'Fine Arts', 'F-ART', 'Miss. Peace'),
(7, 'Elementary Science', 'E-SCI', 'Miss. Peace'),
(8, 'Exceptional Speech', 'E-SP', 'Miss. Peace'),
(9, 'French', 'FR', 'Miss. Peace'),
(10, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(11, 'Christian Religious Studes', 'CRS', 'Miss. Peace');

-- --------------------------------------------------------

--
-- Table structure for table `nursery2`
--

CREATE TABLE `nursery2` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nursery2_subjects`
--

CREATE TABLE `nursery2_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nursery2_subjects`
--

INSERT INTO `nursery2_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Literacy', 'LIT', 'Miss. Peace'),
(2, 'Numeracy', 'NUM', 'Miss. Peace'),
(3, 'Social Studies', 'S-ST', 'Miss. Peace'),
(4, 'History', 'HIS', 'Miss. Peace'),
(5, 'Agricultural Science', 'AGRIC', 'Miss. Peace'),
(6, 'Fine Arts', 'F-ART', 'Miss. Peace'),
(7, 'Elementary Science', 'E-SCI', 'Miss. Peace'),
(8, 'Exceptional Speech', 'E-SP', 'Miss. Peace'),
(9, 'French', 'FR', 'Miss. Peace'),
(10, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(11, 'Christian Religious Studes', 'CRS', 'Miss. Peace'),
(12, 'Home Economics', 'H-ECONS', 'Mr. Mike'),
(13, 'Civic Education', 'CIVIC', 'Mrs. Tolu'),
(14, 'Health Education', 'H-EDU', 'Miss. Aisha'),
(15, 'Rhymes', 'RHY', 'Miss. Peace'),
(16, 'Computer Science', 'COMP', 'Mr. Mike');

-- --------------------------------------------------------

--
-- Table structure for table `pre_nursery`
--

CREATE TABLE `pre_nursery` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_nursery_subjects`
--

CREATE TABLE `pre_nursery_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_nursery_subjects`
--

INSERT INTO `pre_nursery_subjects` (`id`, `subject`, `subject_abr`, `subject_teacher`) VALUES
(1, 'Literacy', 'LIT', 'Miss. Peace'),
(2, 'Numeracy', 'NUM', 'Miss. Peace'),
(3, 'Social Habit', 'S-HAB', 'Miss. Peace'),
(4, 'Health Habit', 'H-HAB', 'Miss. Peace'),
(5, 'Rhymes', 'RHY', 'Miss. Peace'),
(6, 'Fine Arts', 'F-ART', 'Miss. Peace'),
(7, 'Elementary Science', 'E-SCI', 'Miss. Peace'),
(8, 'Exceptional Speech', 'E-SP', 'Miss. Peace'),
(9, 'French', 'FR', 'Miss. Peace'),
(10, 'Islamic Religious Studies', 'IRS', 'Miss. Aisha'),
(11, 'Christian Religious Studes', 'CRS', 'Miss. Peace');

-- --------------------------------------------------------

--
-- Table structure for table `sss1`
--

CREATE TABLE `sss1` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sss1_subjects`
--

CREATE TABLE `sss1_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sss2`
--

CREATE TABLE `sss2` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sss2_subjects`
--

CREATE TABLE `sss2_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sss3`
--

CREATE TABLE `sss3` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `first_ca` int(11) NOT NULL,
  `second_ca` int(11) NOT NULL,
  `third_ca` int(11) NOT NULL,
  `fourth_ca` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sss3_subjects`
--

CREATE TABLE `sss3_subjects` (
  `id` int(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_abr` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `email`, `p_phone`, `class`, `img`, `password`) VALUES
(1, 'Hanifa', 'Salihu', 'salihu@gmail.com', '+2348085458632', '9', '', '$2y$10$1EUMHv7nYnz4zfelayfttuVDlFaLtOiqu0vEXsig16cZNlCI/ObfS'),
(2, 'Musa ', 'Dikko', 'musa@gmail.com', '09076543456', '6', '', '$2y$10$AoL6lQWf6UoVZ8gMcgH8fuvcAjR/0neRw9UjODdgTOkQKl9ldouvO'),
(3, 'Sherriff', 'Obansa', 'sherriffobansa@gmail.com', '09076543456', '13', '09076543456_5945.jpg', '$2y$10$iJBFrN03uEuBUHBqdaLMgunZeuqzHK448gPQO78xG2kTV.U1eqREu'),
(4, 'Musa', 'Musa', 'oluwaseunomogbehin24@gmail.com', '+2348085458632', '4', '+2348085458632_3727.jpg', '$2y$10$j3DVTD4bTrq4Db7Bow4Xxu.1GQGvntdPtnmqk9IMvH.nG3QqfA.qm'),
(5, 'Abdulrazaq', 'O Salihu', 'abdrzq.salihu@gmail.com', '+2348085458632', '2', '+2348085458632_8605.jpg', '+2348085458632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic1`
--
ALTER TABLE `basic1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic1_subjects`
--
ALTER TABLE `basic1_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic2`
--
ALTER TABLE `basic2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic2_subjects`
--
ALTER TABLE `basic2_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic3`
--
ALTER TABLE `basic3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic3_subjects`
--
ALTER TABLE `basic3_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic4`
--
ALTER TABLE `basic4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic4_subjects`
--
ALTER TABLE `basic4_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic5`
--
ALTER TABLE `basic5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic5_subjects`
--
ALTER TABLE `basic5_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss1`
--
ALTER TABLE `jss1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss1_subjects`
--
ALTER TABLE `jss1_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss2`
--
ALTER TABLE `jss2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss2_subjects`
--
ALTER TABLE `jss2_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss3`
--
ALTER TABLE `jss3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jss3_subjects`
--
ALTER TABLE `jss3_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kg1`
--
ALTER TABLE `kg1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kg1_subjects`
--
ALTER TABLE `kg1_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nursery2`
--
ALTER TABLE `nursery2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nursery2_subjects`
--
ALTER TABLE `nursery2_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_nursery`
--
ALTER TABLE `pre_nursery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pre_nursery_subjects`
--
ALTER TABLE `pre_nursery_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss1`
--
ALTER TABLE `sss1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss1_subjects`
--
ALTER TABLE `sss1_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss2`
--
ALTER TABLE `sss2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss2_subjects`
--
ALTER TABLE `sss2_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss3`
--
ALTER TABLE `sss3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss3_subjects`
--
ALTER TABLE `sss3_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basic1`
--
ALTER TABLE `basic1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic1_subjects`
--
ALTER TABLE `basic1_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `basic2`
--
ALTER TABLE `basic2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic2_subjects`
--
ALTER TABLE `basic2_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `basic3`
--
ALTER TABLE `basic3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic3_subjects`
--
ALTER TABLE `basic3_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `basic4`
--
ALTER TABLE `basic4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic4_subjects`
--
ALTER TABLE `basic4_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `basic5`
--
ALTER TABLE `basic5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic5_subjects`
--
ALTER TABLE `basic5_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jss1_subjects`
--
ALTER TABLE `jss1_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jss2_subjects`
--
ALTER TABLE `jss2_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jss3_subjects`
--
ALTER TABLE `jss3_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kg1_subjects`
--
ALTER TABLE `kg1_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nursery2_subjects`
--
ALTER TABLE `nursery2_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pre_nursery_subjects`
--
ALTER TABLE `pre_nursery_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sss1_subjects`
--
ALTER TABLE `sss1_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sss2_subjects`
--
ALTER TABLE `sss2_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sss3_subjects`
--
ALTER TABLE `sss3_subjects`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
