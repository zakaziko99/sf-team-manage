-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2017 at 08:33 AM
-- Server version: 5.7.17-0ubuntu0.16.10.1
-- PHP Version: 7.0.13-0ubuntu0.16.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamdbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `diplome`
--

CREATE TABLE `diplome` (
  `id` int(11) NOT NULL,
  `diplome` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diplome`
--

INSERT INTO `diplome` (`id`, `diplome`) VALUES
(1, 'High School'),
(4, 'Doctor'),
(2, 'Bachelor'),
(3, 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `member_at` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `role`, `member_at`, `active`) VALUES
(1, 'Alfred Monroe', 'CEO', '2017-01-17 04:11:19', 1),
(2, 'Steve Colbern', 'Project Manager', '2017-01-18 09:06:46', 1),
(3, 'Matthew Hemsworth', 'Project Manager', '2017-01-20 16:30:06', 1),
(4, 'Dave Cipriani', 'Developper', '2017-01-24 07:36:16', 1),
(5, 'Jon Baldwin', 'Developper', '2017-02-25 15:46:22', 1),
(6, 'Monica Richards', 'CTO', '2017-02-02 14:08:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members_diplomes`
--

CREATE TABLE `members_diplomes` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `mention` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_diplome` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members_diplomes`
--

INSERT INTO `members_diplomes` (`id`, `year`, `mention`, `id_diplome`, `id_member`, `titre`) VALUES
(1, 2004, 'Good', 1, 1, 'Computer science New York'),
(2, 2006, 'Very good', 2, 1, 'Engineering New York'),
(3, 2005, 'Good', 1, 2, 'Computer science California'),
(4, 2007, 'Good', 2, 2, 'Engineering California'),
(5, 1995, 'Almost good', 1, 3, 'Computer science Seattle'),
(6, 1997, 'Almost good', 2, 3, 'Engineering Seattle'),
(7, 1999, 'Almost good', 3, 3, 'Engineering Los Angeles'),
(8, 2008, 'Good', 1, 4, 'Computer science Detroit'),
(9, 2010, 'Good', 2, 4, 'Engineering Detroit'),
(10, 2010, 'Very good', 1, 5, 'Computer science New Orleans'),
(11, 2012, 'Good', 2, 5, 'Engineering New Orleans'),
(12, 2006, 'Good', 1, 6, 'Computer science Los Angeles');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE `project_member` (
  `project_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_EB4C4D4EEB4C4D4E` (`diplome`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_diplomes`
--
ALTER TABLE `members_diplomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B1089F2A35D1E43E` (`id_diplome`),
  ADD KEY `IDX_B1089F2A56D34F95` (`id_member`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2FB3D0EE5E237E06` (`name`);

--
-- Indexes for table `project_member`
--
ALTER TABLE `project_member`
  ADD PRIMARY KEY (`project_id`,`member_id`),
  ADD KEY `IDX_67401132166D1F9C` (`project_id`),
  ADD KEY `IDX_674011327597D3FE` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diplome`
--
ALTER TABLE `diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `members_diplomes`
--
ALTER TABLE `members_diplomes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `members_diplomes`
--
ALTER TABLE `members_diplomes`
  ADD CONSTRAINT `FK_B1089F2A35D1E43E` FOREIGN KEY (`id_diplome`) REFERENCES `diplome` (`id`),
  ADD CONSTRAINT `FK_B1089F2A56D34F95` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`);

--
-- Constraints for table `project_member`
--
ALTER TABLE `project_member`
  ADD CONSTRAINT `FK_67401132166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_674011327597D3FE` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
