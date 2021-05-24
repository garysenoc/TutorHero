-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 05:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorhero_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `subject_users`
--

CREATE TABLE `subject_users` (
  `id` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_users`
--

INSERT INTO `subject_users` (`id`, `subjectid`, `userid`) VALUES
(28, 1, 6),
(29, 5, 6),
(30, 3, 8),
(31, 1, 8),
(32, 5, 8),
(33, 2, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject_users`
--
ALTER TABLE `subject_users`
  ADD PRIMARY KEY (`subjectid`,`userid`),
  ADD UNIQUE KEY `UNIQUE` (`id`),
  ADD KEY `su_user` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject_users`
--
ALTER TABLE `subject_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject_users`
--
ALTER TABLE `subject_users`
  ADD CONSTRAINT `su_subject` FOREIGN KEY (`subjectid`) REFERENCES `subject_topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `su_user` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
