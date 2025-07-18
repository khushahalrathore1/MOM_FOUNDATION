-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 05:58 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mom_foundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `childern_forms`
--

CREATE TABLE `childern_forms` (
  `childern_form_id` int(11) NOT NULL,
  `child_first_name` varchar(100) DEFAULT NULL,
  `child_unique_id` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `orphan_category` varchar(50) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `alternate_contact` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `current_education_status` varchar(20) DEFAULT NULL,
  `name_where_studying` varchar(150) DEFAULT NULL,
  `child_story` text,
  `leaving_date` date DEFAULT NULL,
  `leaving_reason` text,
  `leaving_to` varchar(150) DEFAULT NULL,
  `current_status` varchar(50) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `spouse_occupation` varchar(100) DEFAULT NULL,
  `husband_living` varchar(100) DEFAULT NULL,
  `child_group_photo` varchar(255) DEFAULT NULL,
  `child_full_photo` varchar(255) DEFAULT NULL,
  `child_small_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childern_forms`
--

INSERT INTO `childern_forms` (`childern_form_id`, `child_first_name`, `child_unique_id`, `dob`, `age`, `sex`, `orphan_category`, `father_name`, `mother_name`, `guardian_name`, `joining_date`, `contact_no`, `alternate_contact`, `email`, `current_education_status`, `name_where_studying`, `child_story`, `leaving_date`, `leaving_reason`, `leaving_to`, `current_status`, `occupation`, `marital_status`, `spouse_name`, `spouse_occupation`, `husband_living`, `child_group_photo`, `child_full_photo`, `child_small_photo`, `created_at`) VALUES
(1, 'Dummy Child Name', '', '0000-00-00', 3, 'Male', 'Social Orphan', 'Dummy Father Name ', 'Dummy Mother Name', '', '2025-07-01', '96607844455', '', 'dummy@gmail.com', 'College', 'dummy College Name', 'Once Upon A time There was a crow', '2025-07-05', 'Once Upon A time There was a crow Leaving ', 'Jungle', 'Working', 'Working Occupation', 'Married', 'Dummy Spouse', 'Spouse Occupation', 'Spouse living', NULL, NULL, NULL, '2025-07-07 10:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `donor_managment`
--

CREATE TABLE `donor_managment` (
  `donor_managment_id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_status` enum('Student','Working') NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `visit_date` date DEFAULT NULL,
  `donated_description` text,
  `reason_for_donating` text,
  `memory_name` varchar(255) DEFAULT NULL,
  `memory_dob` date DEFAULT NULL,
  `memory_dod` date DEFAULT NULL,
  `marital_status` enum('Married','Unmarried') DEFAULT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `marriage_date` date DEFAULT NULL,
  `spouse_occupation` varchar(255) DEFAULT NULL,
  `spouse_living_location` varchar(255) DEFAULT NULL,
  `donor_photo_first` varchar(255) DEFAULT NULL,
  `donor_photo_second` varchar(255) DEFAULT NULL,
  `donor_photo_third` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_managment`
--

INSERT INTO `donor_managment` (`donor_managment_id`, `donor_name`, `donor_status`, `occupation`, `dob`, `age`, `contact_no`, `email`, `address`, `visit_date`, `donated_description`, `reason_for_donating`, `memory_name`, `memory_dob`, `memory_dod`, `marital_status`, `spouse_name`, `marriage_date`, `spouse_occupation`, `spouse_living_location`, `donor_photo_first`, `donor_photo_second`, `donor_photo_third`, `created_at`) VALUES
(1, 'sdfsdf', 'Student', '', '2025-07-02', NULL, '234234234', 'sgfdfg@hmak.com', 'kljhkhljlkjl', '2025-07-03', 'fdgdfg', 'dfgdfg', 'dffgdfg', '2025-07-03', '2025-07-03', 'Unmarried', '', NULL, '', '', 'event_photo_first_1_9D0gV.jpg', '', '', '2025-07-18 11:10:26'),
(2, 'sdfsdf', 'Student', '', '2025-07-02', NULL, '234234234', 'sgfdfg@hmak.com', 'kljhkhljlkjl', '2025-07-03', 'fdgdfg', 'dfgdfg', 'dffgdfg', '2025-07-03', '2025-07-03', 'Unmarried', '', NULL, '', '', 'event_photo_first_2_wOrhu.jpg', '', '', '2025-07-18 11:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `foreigner_managment`
--

CREATE TABLE `foreigner_managment` (
  `foreigner_managment_id` int(11) NOT NULL,
  `foreigner_name` varchar(200) DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `visa_type` varchar(100) DEFAULT NULL,
  `duration_of_stay` varchar(100) DEFAULT NULL,
  `home_visit_from` date DEFAULT NULL,
  `home_visit_till` date DEFAULT NULL,
  `foreigner_status` varchar(50) DEFAULT NULL,
  `foreigner_occupation` varchar(150) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` text,
  `any_donation` text,
  `donation_reason` text,
  `contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `purpose_of_visit` varchar(200) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `spouse_name` varchar(150) DEFAULT NULL,
  `marriage_date` date DEFAULT NULL,
  `spouse_occupation` varchar(150) DEFAULT NULL,
  `spouse_living_location` varchar(150) DEFAULT NULL,
  `foreigner_photo_first` varchar(200) DEFAULT NULL,
  `foreigner_photo_second` varchar(200) DEFAULT NULL,
  `foreigner_photo_third` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foreigner_managment`
--

INSERT INTO `foreigner_managment` (`foreigner_managment_id`, `foreigner_name`, `passport_number`, `visa_type`, `duration_of_stay`, `home_visit_from`, `home_visit_till`, `foreigner_status`, `foreigner_occupation`, `dob`, `age`, `address`, `any_donation`, `donation_reason`, `contact_number`, `email`, `purpose_of_visit`, `marital_status`, `spouse_name`, `marriage_date`, `spouse_occupation`, `spouse_living_location`, `foreigner_photo_first`, `foreigner_photo_second`, `foreigner_photo_third`, `created_at`) VALUES
(1, 'Foreigner Name', '15665464', 'HELLo', '2', '2025-07-01', '2025-07-02', 'Student', '', '2025-07-17', 0, 'Addrees', 'Donation', 'Donation Reason', '9660784289', 'khushahalrathore@gmail.com', 'ESE HI', 'Unmarried', '', NULL, '', '', 'foreigner_photo_first_1_687a3a05927e5.jpeg', '', '', '2025-07-18 12:11:49'),
(2, 'Foreigner Name', '15665464', 'HELLo', '2', '2025-07-01', '2025-07-02', 'Student', '', '2025-07-17', 0, 'Addrees', 'Donation', 'Donation Reason', '9660784289', 'khushahalrathore@gmail.com', 'ESE HI', 'Unmarried', '', NULL, '', '', 'foreigner_photo_first_2_687a3a49ee17e.jpeg', '', '', '2025-07-18 12:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_managment`
--

CREATE TABLE `volunteer_managment` (
  `volunteer_managment_id` int(11) NOT NULL,
  `volunteer_name` varchar(255) NOT NULL,
  `volunteer_type` varchar(50) DEFAULT NULL,
  `volunteer_country` varchar(100) DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `visa_type` varchar(100) DEFAULT NULL,
  `duration_of_stay` varchar(100) DEFAULT NULL,
  `home_visit_from` date DEFAULT NULL,
  `home_visit_till` date DEFAULT NULL,
  `volunteer_status` varchar(50) DEFAULT NULL,
  `volunteer_occupation` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text,
  `volunteering_reason` text,
  `marital_status` varchar(20) DEFAULT NULL,
  `spouse_name` varchar(255) DEFAULT NULL,
  `marriage_date` date DEFAULT NULL,
  `spouse_occupation` varchar(255) DEFAULT NULL,
  `spouse_living_location` varchar(255) DEFAULT NULL,
  `volunteer_photo_first` varchar(255) DEFAULT NULL,
  `volunteer_photo_second` varchar(255) DEFAULT NULL,
  `volunteer_photo_third` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteer_managment`
--

INSERT INTO `volunteer_managment` (`volunteer_managment_id`, `volunteer_name`, `volunteer_type`, `volunteer_country`, `passport_number`, `visa_type`, `duration_of_stay`, `home_visit_from`, `home_visit_till`, `volunteer_status`, `volunteer_occupation`, `dob`, `age`, `visit_date`, `contact_number`, `email`, `address`, `volunteering_reason`, `marital_status`, `spouse_name`, `marriage_date`, `spouse_occupation`, `spouse_living_location`, `volunteer_photo_first`, `volunteer_photo_second`, `volunteer_photo_third`) VALUES
(1, 'khushahal', 'Foreigner', 'kuulasjd', '156531', 'dfsdf', '120', '2025-07-03', '2025-07-25', 'Student', '', '2025-07-03', NULL, '2025-07-03', '9660484289', 'ljdfl@kuhsdd.dsfdsf', 'fsdfsdf', 'sdfsdf', 'Married', 'dfssdf', '2025-07-02', 'dsfsdf', 'sdfsdf', 'volunteer_photo_first_1_XSkqv.jpeg', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `childern_forms`
--
ALTER TABLE `childern_forms`
  ADD PRIMARY KEY (`childern_form_id`);

--
-- Indexes for table `donor_managment`
--
ALTER TABLE `donor_managment`
  ADD PRIMARY KEY (`donor_managment_id`);

--
-- Indexes for table `foreigner_managment`
--
ALTER TABLE `foreigner_managment`
  ADD PRIMARY KEY (`foreigner_managment_id`);

--
-- Indexes for table `volunteer_managment`
--
ALTER TABLE `volunteer_managment`
  ADD PRIMARY KEY (`volunteer_managment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `childern_forms`
--
ALTER TABLE `childern_forms`
  MODIFY `childern_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `donor_managment`
--
ALTER TABLE `donor_managment`
  MODIFY `donor_managment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foreigner_managment`
--
ALTER TABLE `foreigner_managment`
  MODIFY `foreigner_managment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `volunteer_managment`
--
ALTER TABLE `volunteer_managment`
  MODIFY `volunteer_managment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
