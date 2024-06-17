-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 06:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhc`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_details`
--

CREATE TABLE `academic_details` (
  `academic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `university_institution` varchar(255) DEFAULT NULL,
  `year_of_passing` year(4) DEFAULT NULL,
  `percentage_cgpa` decimal(5,2) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_details`
--

INSERT INTO `academic_details` (`academic_id`, `user_id`, `degree`, `degree_name`, `branch`, `university_institution`, `year_of_passing`, `percentage_cgpa`, `class`, `rank`) VALUES
(18, 1, 'Doctorate (PhD)', 'Ph.D', 'Computer Science', 'Bishop Heber College', 2019, '79.68', '1', ''),
(19, 1, 'Master\'s', 'M.Phil', 'Computer Science', 'Bharathidasan University', 2005, '79.68', '1', ''),
(20, 1, 'Master\'s', 'MCA', 'Computer Application', 'Bharathidasan University', 2001, '79.68', '1', ''),
(21, 1, 'Bachelor\'s Degree', 'B.Sc', 'Chemistry', 'Bishop Heber College', 1996, '79.68', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `additional`
--

CREATE TABLE `additional` (
  `add_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards_received`
--

CREATE TABLE `awards_received` (
  `award_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `award_name` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `instituted_by` varchar(255) DEFAULT NULL,
  `presented_by` varchar(255) DEFAULT NULL,
  `amount_received` varchar(50) DEFAULT NULL,
  `month_and_year` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awards_received`
--

INSERT INTO `awards_received` (`award_id`, `user_id`, `award_name`, `level`, `instituted_by`, `presented_by`, `amount_received`, `month_and_year`) VALUES
(2, 1, 'Global Teacher Award', 'International', 'AKS', 'AKS', '', '2019-09-15'),
(3, 1, 'Best Performer', 'College', 'Certify TN', 'Certify TN', '', '2018-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `books_published`
--

CREATE TABLE `books_published` (
  `publication_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `with_or_without_isbn` varchar(20) DEFAULT NULL,
  `title_of_book` varchar(255) DEFAULT NULL,
  `level_of_book` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `published_name` varchar(255) DEFAULT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `ch_in_edited_book` varchar(50) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `place_of_publication` varchar(255) DEFAULT NULL,
  `month_and_year_of_publication` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_published`
--

INSERT INTO `books_published` (`publication_id`, `user_id`, `with_or_without_isbn`, `title_of_book`, `level_of_book`, `author`, `published_name`, `edition`, `ch_in_edited_book`, `isbn`, `place_of_publication`, `month_and_year_of_publication`) VALUES
(1, 1, 'withoutISBN', 'Click’r Computer Information Technology – THIRD Standard', 'college', 'Author', 'Mariya Publication', '', '', '', 'Tamil Nadu ', 'January 1900');

-- --------------------------------------------------------

--
-- Table structure for table `conferences_workshops_seminars_organized`
--

CREATE TABLE `conferences_workshops_seminars_organized` (
  `organized_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `conf_workshop_seminar_type` varchar(50) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `sponsors_name` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conferences_workshops_seminars_organized`
--

INSERT INTO `conferences_workshops_seminars_organized` (`organized_id`, `user_id`, `conf_workshop_seminar_type`, `level`, `title`, `place`, `sponsors_name`, `date_from`, `date_to`) VALUES
(2, 1, 'workshop', 'college', 'Workshop on Angular JS', 'Bishop Heber College', '', '2018-02-24', '2018-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `conference_workshop`
--

CREATE TABLE `conference_workshop` (
  `conf_workshop_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `conf_workshop_type` varchar(50) DEFAULT NULL,
  `conf_workshop_name` varchar(255) DEFAULT NULL,
  `sponsored_by` varchar(255) DEFAULT NULL,
  `organized_by` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conference_workshop`
--

INSERT INTO `conference_workshop` (`conf_workshop_id`, `user_id`, `conf_workshop_type`, `conf_workshop_name`, `sponsored_by`, `organized_by`, `place`, `level`, `date_from`, `date_to`) VALUES
(6, 1, 'workshop', 'Academic and administrative Audit in Pursuit of Excellence in Higher Education', 'IQAC', 'IQAC', 'Bishop Heber College,Trichy', 'college', '2021-06-24', '2021-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `course_certificates`
--

CREATE TABLE `course_certificates` (
  `course_certificate_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `place_of_study` varchar(255) DEFAULT NULL,
  `month_and_year_of_completion` varchar(20) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_certificates`
--

INSERT INTO `course_certificates` (`course_certificate_id`, `user_id`, `course_name`, `place_of_study`, `month_and_year_of_completion`, `duration`) VALUES
(4, 1, 'Software Development Fundamentals', 'Bishop Heber College', 'May 2016', '4 months'),
(5, 1, 'Microsoft Certified Technology Specialist', 'NIIT Computer Center,Trichy', '2014', '5 months'),
(6, 1, 'PGDCA', 'Bishop Heber College', '1997', '1 year'),
(7, 1, '.NET Framework 2.0 Windows Application', 'NIIT Computer Center,Trichy', '2013', '5 months'),
(8, 1, 'Microsoft Office Specialist', 'Bishop Heber College', 'November 30,2019', '2 weeks');

-- --------------------------------------------------------

--
-- Table structure for table `fi_experience`
--

CREATE TABLE `fi_experience` (
  `fi_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `field_industrial` varchar(255) DEFAULT NULL,
  `name_of_organisation` varchar(50) DEFAULT NULL,
  `desgination` varchar(255) DEFAULT NULL,
  `duration_From` varchar(10) DEFAULT NULL,
  `duration_to` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fi_experience`
--

INSERT INTO `fi_experience` (`fi_id`, `user_id`, `field_industrial`, `name_of_organisation`, `desgination`, `duration_From`, `duration_to`) VALUES
(1, 1, 'field', 'NIIT Computer Center', 'Computer Instructor', 'June 2008', 'May 2014');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `user_id` int(11) NOT NULL,
  `mobile_number` int(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `area_of_specialization` varchar(255) DEFAULT NULL,
  `father_or_husband_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address_for_communication` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `languages_known` varchar(255) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `additional_responsibilities` varchar(255) DEFAULT NULL,
  `physically_challenged` varchar(5) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publication_in_book`
--

CREATE TABLE `publication_in_book` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title_of_article` varchar(255) DEFAULT NULL,
  `with_or_without_isbn` varchar(20) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `level_of_book` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publishers_name` varchar(255) DEFAULT NULL,
  `place_of_publication` varchar(255) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `volume` varchar(20) DEFAULT NULL,
  `issue_no` varchar(50) DEFAULT NULL,
  `page_no` varchar(50) DEFAULT NULL,
  `month_and_year` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publication_in_journal`
--

CREATE TABLE `publication_in_journal` (
  `journal_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title_of_article` varchar(255) DEFAULT NULL,
  `with_or_without_issn` varchar(50) DEFAULT NULL,
  `journal_name` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `impact_factor` varchar(25) DEFAULT NULL,
  `citation_index` varchar(50) DEFAULT NULL,
  `h_index` varchar(50) DEFAULT NULL,
  `scopus_index` varchar(50) DEFAULT NULL,
  `issn` varchar(20) DEFAULT NULL,
  `volume` varchar(20) DEFAULT NULL,
  `issue_no` varchar(20) DEFAULT NULL,
  `page_numbers` varchar(20) DEFAULT NULL,
  `date_of_publish` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminder_logs`
--

CREATE TABLE `reminder_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reminder_sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_experience`
--

CREATE TABLE `research_experience` (
  `res_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `research_ug` varchar(255) DEFAULT NULL,
  `research_pg` varchar(50) DEFAULT NULL,
  `research_mphil` varchar(255) DEFAULT NULL,
  `research_phd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_experience`
--

INSERT INTO `research_experience` (`res_id`, `user_id`, `research_ug`, `research_pg`, `research_mphil`, `research_phd`) VALUES
(1, 1, '16 years', '10years', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `research_fellow`
--

CREATE TABLE `research_fellow` (
  `fellow_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `obtained_post_doctoral` varchar(255) DEFAULT NULL,
  `name_of_fellowship` varchar(50) DEFAULT NULL,
  `host_institution` varchar(255) DEFAULT NULL,
  `duration_from` date DEFAULT NULL,
  `duration_to` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_mphil_guide`
--

CREATE TABLE `research_mphil_guide` (
  `guide_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mphil_guide_name` varchar(255) NOT NULL,
  `mphil_part_full_time` varchar(50) DEFAULT NULL,
  `mphil_scholar_name` varchar(255) DEFAULT NULL,
  `mphil_board_area_of_research` varchar(255) DEFAULT NULL,
  `mphil_title_of_dissertation` varchar(255) DEFAULT NULL,
  `mphil_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_paper_presented`
--

CREATE TABLE `research_paper_presented` (
  `paper_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title_of_paper` varchar(255) DEFAULT NULL,
  `name_of_conf` varchar(255) DEFAULT NULL,
  `sponsored_by` varchar(255) DEFAULT NULL,
  `organized_by` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `conference_level` varchar(255) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_paper_presented`
--

INSERT INTO `research_paper_presented` (`paper_id`, `user_id`, `title_of_paper`, `name_of_conf`, `sponsored_by`, `organized_by`, `place`, `conference_level`, `date_from`, `date_to`) VALUES
(3, 1, 'Comparison on Two-Dimensional Ultrasound to Three-Dimensional placenta Image using Segmentation Techniques', 'Blooming Trends in Tech Challenges and Opportunities', 'IEEE Computer Society', 'PG and Research Dept. of Computer Science , National College', 'Trichy', 'international', '2018-09-27', '2018-09-29'),
(4, 1, 'Initialization of optimized K-means Centroids using Divide-and-Conquer Method', 'Modelling , Simulation and Control ICMSC-2015', 'CSIR and ISTE', 'Karpagam College of Engineering', 'Coimbatore,India', 'international', '2015-10-15', '2015-10-16'),
(5, 1, 'A Novel PSS Stemmer for String Similarity Joins', 'World Congress on Computing and Commmunication Technologies', 'Microsoft Research', 'St. Joseph\'s College', 'Trichy', 'international', '2017-02-02', '2017-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `research_phd`
--

CREATE TABLE `research_phd` (
  `phd_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `obtained_phd` varchar(20) DEFAULT NULL,
  `title_of_thesis` varchar(255) DEFAULT NULL,
  `area_of_specialization` varchar(255) DEFAULT NULL,
  `research_supervisor` varchar(255) DEFAULT NULL,
  `research_center` varchar(255) DEFAULT NULL,
  `month_year_reward` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_phd_guide`
--

CREATE TABLE `research_phd_guide` (
  `guide_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phd_guide_name` varchar(255) NOT NULL,
  `phd_part_full_time` varchar(50) DEFAULT NULL,
  `phd_scholar_name` varchar(255) DEFAULT NULL,
  `phd_board_area_of_research` varchar(255) DEFAULT NULL,
  `phd_title_of_dissertation` varchar(255) DEFAULT NULL,
  `phd_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_project`
--

CREATE TABLE `research_project` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title_of_project` varchar(255) DEFAULT NULL,
  `sponsoring_agency` varchar(255) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `project_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_from` varchar(10) DEFAULT NULL,
  `date_to` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_project`
--

INSERT INTO `research_project` (`project_id`, `user_id`, `title_of_project`, `sponsoring_agency`, `duration`, `amount`, `project_type`, `status`, `date_from`, `date_to`) VALUES
(2, 1, 'Face Recognized Student Attendance System for Bishop Heber College', 'BISHOP HEBER COLLEGE', '', '', 'Minor', 'ongoing', '2019-10-23', 'Tilldate');

-- --------------------------------------------------------

--
-- Table structure for table `resource_person`
--

CREATE TABLE `resource_person` (
  `resource_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `date_of_event` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_person`
--

INSERT INTO `resource_person` (`resource_id`, `user_id`, `topic`, `level`, `type`, `place`, `date_of_event`) VALUES
(2, 1, 'J2EE', 'college', 'Seminar', 'Kumbakonam', '2016-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `teaching_experience`
--

CREATE TABLE `teaching_experience` (
  `teach_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `teaching_ug` varchar(255) DEFAULT NULL,
  `teaching_pg` varchar(50) DEFAULT NULL,
  `teaching_mphil` varchar(255) DEFAULT NULL,
  `teaching_phd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaching_experience`
--

INSERT INTO `teaching_experience` (`teach_id`, `user_id`, `teaching_ug`, `teaching_pg`, `teaching_mphil`, `teaching_phd`) VALUES
(5, 1, '16 years', '10 years', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `psword` varchar(10) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `last_profile_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sname`, `uname`, `psword`, `designation`, `department`, `mobile_number`, `email`, `last_profile_update`) VALUES
(1, 'Dr.J.James Manoharan', 'J.James Manoharan', '1234', 'Associate Professor', 'Computer Applications', '9790236903', 'arunkarthik0710@gmail.com', '2024-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `experience_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address_of_institution` text DEFAULT NULL,
  `pay_band_basic_pay` varchar(255) DEFAULT NULL,
  `period_of_service_from` varchar(20) DEFAULT NULL,
  `period_of_service_to` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`experience_id`, `user_id`, `institution_name`, `designation`, `address_of_institution`, `pay_band_basic_pay`, `period_of_service_from`, `period_of_service_to`) VALUES
(25, 1, 'Bishop Heber College', 'Associate Professor', 'Puthur,Trichy-620017', '', 'July 2001', 'till date'),
(26, 1, 'Bishop Heber College', 'Associate Professor & Head', 'Trichy', '', 'July 2001', 'till date');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_details`
--
ALTER TABLE `academic_details`
  ADD PRIMARY KEY (`academic_id`),
  ADD KEY `fk_academic_details_user` (`user_id`);

--
-- Indexes for table `additional`
--
ALTER TABLE `additional`
  ADD PRIMARY KEY (`add_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `awards_received`
--
ALTER TABLE `awards_received`
  ADD PRIMARY KEY (`award_id`),
  ADD KEY `fk_awards_received_user` (`user_id`);

--
-- Indexes for table `books_published`
--
ALTER TABLE `books_published`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `fk_publication_in_book_user` (`user_id`);

--
-- Indexes for table `conferences_workshops_seminars_organized`
--
ALTER TABLE `conferences_workshops_seminars_organized`
  ADD PRIMARY KEY (`organized_id`),
  ADD KEY `fk_conferences_workshops_seminars_organized_user` (`user_id`);

--
-- Indexes for table `conference_workshop`
--
ALTER TABLE `conference_workshop`
  ADD PRIMARY KEY (`conf_workshop_id`),
  ADD KEY `fk_conference_workshop_user` (`user_id`);

--
-- Indexes for table `course_certificates`
--
ALTER TABLE `course_certificates`
  ADD PRIMARY KEY (`course_certificate_id`),
  ADD KEY `fk_course_certificates_user` (`user_id`);

--
-- Indexes for table `fi_experience`
--
ALTER TABLE `fi_experience`
  ADD PRIMARY KEY (`fi_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `publication_in_book`
--
ALTER TABLE `publication_in_book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_books_published_editeds_user` (`user_id`);

--
-- Indexes for table `publication_in_journal`
--
ALTER TABLE `publication_in_journal`
  ADD PRIMARY KEY (`journal_id`),
  ADD KEY `fk_publication_in_journal_user` (`user_id`);

--
-- Indexes for table `reminder_logs`
--
ALTER TABLE `reminder_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `research_experience`
--
ALTER TABLE `research_experience`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `research_fellow`
--
ALTER TABLE `research_fellow`
  ADD PRIMARY KEY (`fellow_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `research_mphil_guide`
--
ALTER TABLE `research_mphil_guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `research_paper_presented`
--
ALTER TABLE `research_paper_presented`
  ADD PRIMARY KEY (`paper_id`),
  ADD KEY `fk_research_paper_presented_user` (`user_id`);

--
-- Indexes for table `research_phd`
--
ALTER TABLE `research_phd`
  ADD PRIMARY KEY (`phd_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `fk_research_details_user` (`user_id`);

--
-- Indexes for table `research_phd_guide`
--
ALTER TABLE `research_phd_guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `research_project`
--
ALTER TABLE `research_project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `fk_research_project_user` (`user_id`);

--
-- Indexes for table `resource_person`
--
ALTER TABLE `resource_person`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `fk_resource_person_user` (`user_id`);

--
-- Indexes for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  ADD PRIMARY KEY (`teach_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `fk_work_experience_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_details`
--
ALTER TABLE `academic_details`
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `additional`
--
ALTER TABLE `additional`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `awards_received`
--
ALTER TABLE `awards_received`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books_published`
--
ALTER TABLE `books_published`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conferences_workshops_seminars_organized`
--
ALTER TABLE `conferences_workshops_seminars_organized`
  MODIFY `organized_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conference_workshop`
--
ALTER TABLE `conference_workshop`
  MODIFY `conf_workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_certificates`
--
ALTER TABLE `course_certificates`
  MODIFY `course_certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fi_experience`
--
ALTER TABLE `fi_experience`
  MODIFY `fi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publication_in_book`
--
ALTER TABLE `publication_in_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publication_in_journal`
--
ALTER TABLE `publication_in_journal`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reminder_logs`
--
ALTER TABLE `reminder_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `research_experience`
--
ALTER TABLE `research_experience`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_fellow`
--
ALTER TABLE `research_fellow`
  MODIFY `fellow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_mphil_guide`
--
ALTER TABLE `research_mphil_guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research_paper_presented`
--
ALTER TABLE `research_paper_presented`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `research_phd`
--
ALTER TABLE `research_phd`
  MODIFY `phd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `research_phd_guide`
--
ALTER TABLE `research_phd_guide`
  MODIFY `guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research_project`
--
ALTER TABLE `research_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resource_person`
--
ALTER TABLE `resource_person`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  MODIFY `teach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic_details`
--
ALTER TABLE `academic_details`
  ADD CONSTRAINT `fk_academic_details_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `additional`
--
ALTER TABLE `additional`
  ADD CONSTRAINT `additional_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `awards_received`
--
ALTER TABLE `awards_received`
  ADD CONSTRAINT `fk_awards_received_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `books_published`
--
ALTER TABLE `books_published`
  ADD CONSTRAINT `fk_publication_in_book_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `conferences_workshops_seminars_organized`
--
ALTER TABLE `conferences_workshops_seminars_organized`
  ADD CONSTRAINT `fk_conferences_workshops_seminars_organized_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `conference_workshop`
--
ALTER TABLE `conference_workshop`
  ADD CONSTRAINT `fk_conference_workshop_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_certificates`
--
ALTER TABLE `course_certificates`
  ADD CONSTRAINT `fk_course_certificates_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `fi_experience`
--
ALTER TABLE `fi_experience`
  ADD CONSTRAINT `fi_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD CONSTRAINT `fk_personal_details_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `publication_in_book`
--
ALTER TABLE `publication_in_book`
  ADD CONSTRAINT `fk_books_published_editeds_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `publication_in_journal`
--
ALTER TABLE `publication_in_journal`
  ADD CONSTRAINT `fk_publication_in_journal_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reminder_logs`
--
ALTER TABLE `reminder_logs`
  ADD CONSTRAINT `reminder_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_experience`
--
ALTER TABLE `research_experience`
  ADD CONSTRAINT `research_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_fellow`
--
ALTER TABLE `research_fellow`
  ADD CONSTRAINT `research_fellow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_mphil_guide`
--
ALTER TABLE `research_mphil_guide`
  ADD CONSTRAINT `research_mphil_guide_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_paper_presented`
--
ALTER TABLE `research_paper_presented`
  ADD CONSTRAINT `fk_research_paper_presented_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_phd`
--
ALTER TABLE `research_phd`
  ADD CONSTRAINT `fk_research_details_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_research_phd_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_phd_guide`
--
ALTER TABLE `research_phd_guide`
  ADD CONSTRAINT `research_phd_guide_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `research_project`
--
ALTER TABLE `research_project`
  ADD CONSTRAINT `fk_research_project_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_person`
--
ALTER TABLE `resource_person`
  ADD CONSTRAINT `fk_resource_person_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `teaching_experience`
--
ALTER TABLE `teaching_experience`
  ADD CONSTRAINT `teaching_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `fk_work_experience_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
