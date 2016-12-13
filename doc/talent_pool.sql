-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2016 at 11:37 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talent_pool`
--

-- --------------------------------------------------------

--
-- Table structure for table `Apply_activity`
--

CREATE TABLE `Apply_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Apply_activity`
--

INSERT INTO `Apply_activity` (`id`, `user_id`, `project_id`, `created_at`) VALUES
(1, 5, 1, '0000-00-00 00:00:00'),
(2, 5, 2, '0000-00-00 00:00:00'),
(3, 5, 4, '0000-00-00 00:00:00'),
(4, 5, 6, '0000-00-00 00:00:00'),
(5, 5, 8, '0000-00-00 00:00:00'),
(6, 5, 11, '0000-00-00 00:00:00'),
(7, 5, 9, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `content` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education_detail`
--

CREATE TABLE `education_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `certificate_degree_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Institute_university_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `starting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `completion_date` timestamp NULL DEFAULT NULL,
  `cgpa` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education_detail`
--

INSERT INTO `education_detail` (`id`, `user_id`, `certificate_degree_name`, `major`, `Institute_university_name`, `starting_date`, `completion_date`, `cgpa`) VALUES
(1, 2, 'Associate''s Degrees', 'IT', 'FPT University', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 2, 'Bachelor''s Degrees', 'IT', 'NP', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8.8),
(3, 5, 'Associate''s Degrees', 'FPT University', 'FPT University', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8.5);

-- --------------------------------------------------------

--
-- Table structure for table `experience_detail`
--

CREATE TABLE `experience_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_current_job` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `job_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `job_location_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `job_location_country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(4000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `job_type` varchar(20) NOT NULL,
  `project_summary` varchar(500) NOT NULL,
  `project_photo` varchar(200) DEFAULT NULL,
  `requirement` varchar(500) NOT NULL,
  `salary_range` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `info` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `user_id`, `project_name`, `job_type`, `project_summary`, `project_photo`, `requirement`, `salary_range`, `is_active`, `created_at`, `info`) VALUES
(1, 2, 'Wizlearn', 'Full-time', 'Works in partnership with Account Managers to provide convincing IT advices to meet customers’ business objectives.\r\nMeeting with customers to determine requirements and to define the project scope of works.\r\nRequirement analysis, solution design and proposal compilations.\r\nProposal submission and presentation.\r\nSelection and procurement processes guidance. ', 'Uploads/noImage.jpg', 'Proven experience in IT projects deal closure\r\nPractical skills and experience in Microsoft platform environment and network architecture\r\nExperience in IT projects tender process\r\nGood communication skills\r\nEfficient problem solver\r\nGood service oriented manner  ', '10000$', 'Y', '2016-12-12 06:30:21', ''),
(2, 1, 'EscapeRoom', 'Internship', 'Believing neglected so so allowance existence departure in. In design active temper be uneasy. Thirty for remove plenty regard you summer though. He preference connection astonished on of ye. Partiality on or continuing in particular principles as. Do believing oh disposing to supported allowance we. ', 'Uploads/noImage.jpg', 'Know C/C++', '2000$', 'Y', '2016-12-13 10:36:12', 'Please contact me: SM Company'),
(4, 1, 'Talent Pool', 'Part-time', 'Yourself off its pleasant ecstatic now law. Ye their mirth seems of songs. Prospect out bed contempt separate. Her inquietude our shy yet sentiments collecting. Cottage fat beloved himself arrived old. Grave widow hours among him ?no you led. Power had these met least nor young. Yet match drift wrong his our. \r\n\r\nShe wholly fat who window extent either formal. Removing welcomed civility or hastened is. Justice elderly but perhaps expense six her are another passage. Full her ten open fond walk n', 'Uploads/noImage.jpg', 'Saw yet kindness too replying whatever marianne. Old sentiments resolution admiration unaffected its mrs literature. Behaviour new set existence dashwoods. It satisfied to mr commanded consisted disposing engrossed. Tall snug do of till on easy. Form not calm new fail. \r\n\r\nYourself off its pleasant ecstatic now law. Ye their mirth seems of songs. Prospect out bed contempt separate. Her inquietude our shy yet sentiments collecting. Cottage fat beloved himself arrived old. Grave widow hours among ', '5000$ - 6000$', 'Y', '2016-12-01 23:48:06', NULL),
(6, 2, '43254', 'Part-time', 'abcdf', 'Uploads/noImage.jpg', 'asdas', '5000$ - 6000$', 'Y', '2016-12-12 02:09:36', NULL),
(8, 1, 'Demo', 'Part-time', 'aaa', 'Uploads/noImage.jpg', 'a', '3000$', 'Y', '2016-12-01 23:21:32', NULL),
(9, 1, 'SOFTWARE ENGINEER (C++)', 'Full-time', 'Responsible for the development of software components of fare collection devices that are parts of Singapore’s Automatic Fare Collection (AFC) system.', 'Uploads/noImage.jpg', 'Working in a team, you will be responsible for the development of software components of fare collection devices that are parts of Singapore''s Automatic Fare Collection (AFC) system responsible for the daily processing of millions of commuters Contact less Smart Card transactions. \r\nYou will be part of a team and will be involved in the requirements definition, design solution''s, implementation and testing of the fare collection devices functions and performance. ', '4000$', 'Y', '2016-12-08 06:21:17', NULL),
(10, 3, 'tada', 'Internship', 'dsd', 'Uploads/noImage.jpg', 'sd', '10000$', 'Y', '2016-12-09 00:35:50', NULL),
(11, 3, 'demo', 'Part-time', 'haha', 'Uploads/noImage.jpg', 'hoa la canh', '9000$', 'Y', '2016-12-09 00:36:39', NULL),
(12, 3, '123', 'Part-time', '123', 'Uploads/noImage.jpg', '123', '123$', 'Y', '2016-12-09 00:53:49', NULL),
(13, 5, 'IIG', 'Internship', 'everything', 'Uploads/noImage.jpg', 'df', '1000$', 'Y', '2016-12-11 18:41:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `skill_name`) VALUES
(1, 'coding'),
(2, 'algorithm'),
(3, 'Android'),
(4, 'StartUp'),
(5, 'C/C++'),
(6, 'Php'),
(7, 'AWS'),
(8, 'BigData'),
(9, 'Android App'),
(10, 'Web design');

-- --------------------------------------------------------

--
-- Table structure for table `skill_set`
--

CREATE TABLE `skill_set` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_set`
--

INSERT INTO `skill_set` (`id`, `user_id`, `skill_id`, `created_at`) VALUES
(1, 1, 1, '2016-12-05 06:28:05'),
(2, 1, 2, '2016-12-05 06:28:05'),
(3, 1, 3, '2016-12-05 07:14:43'),
(4, 1, 4, '2016-12-05 08:32:50'),
(5, 2, 5, '2016-12-05 08:41:51'),
(6, 2, 6, '2016-12-05 08:41:51'),
(7, 2, 7, '2016-12-05 08:41:51'),
(8, 2, 8, '2016-12-05 08:41:51'),
(9, 2, 9, '2016-12-06 00:58:10'),
(10, 2, 1, '2016-12-06 06:12:47'),
(11, 2, 2, '2016-12-06 06:12:47'),
(12, 2, 3, '2016-12-06 06:12:47'),
(13, 2, 4, '2016-12-06 06:12:47'),
(14, 5, 1, '2016-12-12 01:38:32'),
(15, 5, 2, '2016-12-12 01:38:32'),
(16, 5, 3, '2016-12-12 01:38:32'),
(17, 5, 4, '2016-12-12 01:38:32'),
(18, 5, 5, '2016-12-12 01:38:32'),
(19, 5, 6, '2016-12-12 01:38:32'),
(20, 5, 7, '2016-12-12 01:38:32'),
(21, 5, 8, '2016-12-12 01:38:32'),
(22, 5, 9, '2016-12-12 01:38:32'),
(23, 8, 1, '2016-12-12 06:51:55'),
(24, 8, 2, '2016-12-12 06:51:55'),
(25, 8, 3, '2016-12-12 06:51:55'),
(26, 8, 4, '2016-12-12 06:51:55'),
(27, 8, 5, '2016-12-12 06:51:55'),
(28, 8, 6, '2016-12-12 06:51:55'),
(29, 8, 7, '2016-12-12 06:51:55'),
(30, 8, 8, '2016-12-12 06:51:55'),
(31, 8, 9, '2016-12-12 06:51:55'),
(32, 3, 10, '2016-12-13 10:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`) VALUES
(1, 'C/C++'),
(2, 'Android'),
(3, 'ios'),
(4, 'MySQL'),
(5, 'Php'),
(6, 'MVC'),
(7, 'AngularJS'),
(8, 'linux'),
(9, 'AWS'),
(10, 'Andruino'),
(11, 'beacon');

-- --------------------------------------------------------

--
-- Table structure for table `tag_set`
--

CREATE TABLE `tag_set` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_set`
--

INSERT INTO `tag_set` (`id`, `project_id`, `tag_id`) VALUES
(7, 6, 1),
(9, 6, 3),
(15, 4, 5),
(19, 1, 4),
(20, 1, 5),
(25, 8, 6),
(26, 4, 4),
(27, 4, 6),
(28, 2, 6),
(29, 1, 7),
(30, 9, 1),
(31, 9, 2),
(32, 9, 5),
(33, 10, 2),
(34, 10, 5),
(35, 10, 8),
(36, 11, 9),
(37, 11, 10),
(38, 12, 11),
(39, 13, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '10',
  `summary` text,
  `education` text,
  `experience` text,
  `user_image` blob,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `summary`, `education`, `experience`, `user_image`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', 'zTaCsnNMZbF18Ik1zf-KVkFXMp5yZVwp', '$2y$13$yODwm0hubJdXG1WX.br2qOOifCDhcwmA62Vunhb.X6wBBFg6pTB8a', NULL, 'phuonghoatink22@gmail.com', 40, '', '', NULL, 0x55706c6f6164732f6e6f496d6167652e6a7067, '2016-12-12 09:10:57', '0000-00-00 00:00:00', 10),
(2, 'demo', 'Gu1xmpCSHXkfKUXwD6OWEReN2MZIUOiI', '$2y$13$ZE0N9Hx1WawrWmeZS8jeEuBfau4H4Pxh1c90iLEWzPPq6fQsT/Agq', NULL, 'demo@gmail.com', 30, 'I can do everything', 'Bachelor of Science in Electrical Engineering\r\nManhattan College, Riverdale, NY ', '- Lead Technical Support Specialist – Thomson Reuters Eikon Desktop	2013–Present\r\n- Vice President – Front Office Application Trade Floor Support	2011–2012', 0x55706c6f6164732f6e6f496d6167652e6a7067, '2016-12-12 23:36:14', '2016-12-13 06:36:14', 10),
(3, 'test', '9kHxhVQGhdU-yPyDARRVA_y_02isjHZc', '$2y$13$lHnf0F6P55cSVeWnrdUwGuURqRdEEDg6XSVmZ9RxIxlZfJ2XVxFvq', NULL, 'test@gmail.com', 20, 'A conscientious, hard working and reliable engineer, at all times I try to ensure my work activities are completed on time & within budget complying with the required high engineering and safety standards. I enjoy meeting people and have a proven track record as a team player. I can adapt readily to any environment and like to contribute positively to any work situation.', 'Master of DEF School ', '8 years for web design', 0x55706c6f6164732f6e6f496d6167652e6a7067, '2016-12-13 03:24:46', '2016-12-13 10:24:46', 10),
(4, 'haha', 'FJYYon006tSu31QQXfwx-dWEtEIzv3aD', '$2y$13$ohD/i0TCOvT0bpvhsZlofOVr0XP9tb0P.ievFEu/8XVV55fcFYcnW', NULL, 'abc@gmail.com', 20, '', '', NULL, NULL, '2016-12-12 08:31:39', '0000-00-00 00:00:00', 10),
(5, 'hoalacanh', '-bFVVOUlE9LTmcgEyk8EljZ9d7hgCJAp', '$2y$13$PFjc39gNrqrg01Jen/9Pz.yM5gH2F6K5dxwLJlB4AVHoSw/TFr/Fe', NULL, 'hoanpse03457@fpt.edu.vn', 20, 'I can do everything', 'Bachelor of Science in Electrical Engineering\r\nManhattan College, Riverdale, NY ', '- Lead Technical Support Specialist – Thomson Reuters Eikon Desktop	2013–Present\r\n- Vice President – Front Office Application Trade Floor Support	2011–2012', 0x55706c6f6164732f6e6f496d6167652e6a7067, '2016-12-13 00:18:12', '2016-12-13 07:18:12', 10),
(6, 'hahaha', 'DD0oJVPj4B0Q8no3ciPjZw9iFeQDDKmZ', '$2y$13$4YDseGRCaky4ptQf8.vcaucOs3QYA9i55P2xzcKqVsvGIgCr34dd2', NULL, 'haha@gmail.com', 40, '', '', NULL, NULL, '2016-12-12 02:05:34', '2016-12-12 02:05:34', 10),
(7, 'ahaha', 'KZToYdumPd9hFv-V17SuPngvvgoQdgfz', '$2y$13$scD86ortRDbpSypDuX9Pb.6bZhk6i2N5PQdcGLzZniWkf6eNjNlri', NULL, 'ahaha@gmail.com', 40, '', '', NULL, NULL, '2016-12-12 02:07:26', '2016-12-12 02:07:26', 10),
(8, 'demo123', 'MNr4OfAZcyBw6lAY42HUbUgEvGWfzraX', '$2y$13$Xk9wNkzDhspXi91MTawyde7LoTzBeHmmGlKFjrnDmko9fxsj06Cn6', NULL, 'demo321@gmail.com', 20, 'abcdef', '', NULL, 0x55706c6f6164732f6e6f496d6167652e6a7067, '2016-12-12 01:09:43', '2016-12-12 08:09:43', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Apply_activity`
--
ALTER TABLE `Apply_activity`
  ADD PRIMARY KEY (`id`,`user_id`,`project_id`),
  ADD KEY `Apply_activity_project` (`project_id`),
  ADD KEY `Apply_activity_user` (`user_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_project` (`project_id`);

--
-- Indexes for table `education_detail`
--
ALTER TABLE `education_detail`
  ADD PRIMARY KEY (`id`,`certificate_degree_name`,`major`),
  ADD KEY `education_detail_user` (`user_id`);

--
-- Indexes for table `experience_detail`
--
ALTER TABLE `experience_detail`
  ADD PRIMARY KEY (`id`,`start_date`,`end_date`),
  ADD KEY `experience_detail_user` (`user_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user` (`user_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_set`
--
ALTER TABLE `skill_set`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Skill_set_skill` (`skill_id`),
  ADD KEY `Skill_set_user` (`user_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_set`
--
ALTER TABLE `tag_set`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_set_project` (`project_id`),
  ADD KEY `tag_set_tag` (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Apply_activity`
--
ALTER TABLE `Apply_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_detail`
--
ALTER TABLE `education_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `experience_detail`
--
ALTER TABLE `experience_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `skill_set`
--
ALTER TABLE `skill_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tag_set`
--
ALTER TABLE `tag_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Apply_activity`
--
ALTER TABLE `Apply_activity`
  ADD CONSTRAINT `Apply_activity_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Apply_activity_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education_detail`
--
ALTER TABLE `education_detail`
  ADD CONSTRAINT `education_detail_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experience_detail`
--
ALTER TABLE `experience_detail`
  ADD CONSTRAINT `experience_detail_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill_set`
--
ALTER TABLE `skill_set`
  ADD CONSTRAINT `Skill_set_skill` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Skill_set_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_set`
--
ALTER TABLE `tag_set`
  ADD CONSTRAINT `tag_set_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_set_tag` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
