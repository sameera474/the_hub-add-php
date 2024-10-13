-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_slips`
--

CREATE TABLE `payment_slips` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `slip_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `applying_country` varchar(255) NOT NULL,
  `no_of_adults` int(11) NOT NULL,
  `no_of_kids` int(11) NOT NULL,
  `main_fullname` varchar(255) NOT NULL,
  `main_dob` date NOT NULL,
  `main_gender` enum('male','female') NOT NULL,
  `main_passport_no` varchar(50) NOT NULL,
  `main_passport_expiry` date NOT NULL,
  `main_marital_status` enum('single','married') NOT NULL,
  `main_ielts_results` varchar(50) DEFAULT NULL,
  `main_degree` varchar(255) DEFAULT NULL,
  `main_study_field` varchar(255) DEFAULT NULL,
  `main_job` varchar(255) DEFAULT NULL,
  `main_highest_qualification` varchar(255) DEFAULT NULL,
  `main_qualification_details` text DEFAULT NULL,
  `main_experience` varchar(255) DEFAULT NULL,
  `spouse_fullname` varchar(255) DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `spouse_gender` enum('male','female') DEFAULT NULL,
  `spouse_passport_no` varchar(50) DEFAULT NULL,
  `spouse_passport_expiry` date DEFAULT NULL,
  `spouse_ielts_results` varchar(50) DEFAULT NULL,
  `spouse_degree` varchar(255) DEFAULT NULL,
  `spouse_study_field` varchar(255) DEFAULT NULL,
  `spouse_job` varchar(255) DEFAULT NULL,
  `spouse_highest_qualification` varchar(255) DEFAULT NULL,
  `spouse_qualification_details` text DEFAULT NULL,
  `spouse_experience` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `applying_country`, `no_of_adults`, `no_of_kids`, `main_fullname`, `main_dob`, `main_gender`, `main_passport_no`, `main_passport_expiry`, `main_marital_status`, `main_ielts_results`, `main_degree`, `main_study_field`, `main_job`, `main_highest_qualification`, `main_qualification_details`, `main_experience`, `spouse_fullname`, `spouse_dob`, `spouse_gender`, `spouse_passport_no`, `spouse_passport_expiry`, `spouse_ielts_results`, `spouse_degree`, `spouse_study_field`, `spouse_job`, `spouse_highest_qualification`, `spouse_qualification_details`, `spouse_experience`) VALUES
(1, 'sri lanka', 1, 1, 'dhanushika', '2024-10-20', 'male', '45666', '2024-10-24', 'single', 'ddd', 'vvvvv', 'vvv', 'vbbbb', 'ddddd', 'gg', '22', 'ccccccccc', '2024-10-22', 'male', 'ddddddddd', '2024-10-19', 'ccccccccccc', 'vvvvvvv', 'fffff', '    cvvvv', 'vvvvvv', 'rrrrrrrr', 'fffff'),
(2, 'sri lanka', 1, 1, 'dhanushika', '2024-10-23', 'male', '22', '2024-10-29', 'single', 'ddd', 'vvvvv', 'vvv', 'ddddddd', 'cvvvv', '11', 'cccccc', 'ccccccccc', '2024-10-28', 'male', '33333', '2024-10-23', 'ccccccccccc', 'vvvvvvv', 'fffff', '    cvvvv', 'vvvvvv', '1', '111'),
(5, 'sri lanka', 1, 2, 'dhanushika', '2024-10-16', 'male', '2233', '2024-10-17', 'single', 'AAA', 'vvvvv', 'vvv', 'vbbbb', 'cvvvv', 'rrrr', 'cccccc', 'ccccccccc', '2024-10-07', 'male', '', '0000-00-00', 'r', 'r', 'r', 'r', 'r', 'r', 'r'),
(6, 'sri lankah', 5, 4, 'dhanushika', '2024-10-13', 'male', '45666', '2024-10-23', 'single', 'ddd', 'vvvvv', 'vvv', 'vbbbb', 'cvvvv', 'k', 'kk', 'kk', '2024-10-15', 'male', 'k', '2024-10-24', 'k', 'kkk', 'kkk', 'k', 'k', 'k', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Dhanushika Madushani', 'danushikam804@gmail.com', '$2y$10$NEyXwYagOzvPVMXAiyQHk.M.aB5cS.2zpYMyA/BhxQK3ocOz4MhAu'),
(6, 'ishara', 'kumudu@gmail.com', '$2y$10$3Fdnewx7WYhHRMQ.dIVyBeli8c7llFJTXAEI.00OF0LwZw.G7cI0q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_slips`
--
ALTER TABLE `payment_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_slips`
--
ALTER TABLE `payment_slips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
