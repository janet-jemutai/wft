-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 02:09 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(23) DEFAULT NULL,
  `work_id` varchar(32) DEFAULT NULL,
  `branch` varchar(23) DEFAULT NULL,
  `role` varchar(23) DEFAULT NULL,
  `email` varchar(23) DEFAULT NULL,
  `password` varchar(23) DEFAULT NULL,
  `phonenumer` int(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `champion`
--

CREATE TABLE `champion` (
  `name` varchar(32) DEFAULT NULL,
  `work_id` varchar(23) NOT NULL,
  `branch` varchar(21) DEFAULT NULL,
  `role` varchar(23) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `password` varchar(17) DEFAULT NULL,
  `confirm_password` varchar(17) DEFAULT NULL,
  `phone_numer` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `champion`
--

INSERT INTO `champion` (`name`, `work_id`, `branch`, `role`, `email`, `password`, `confirm_password`, `phone_numer`) VALUES
('janet sato', '1234', 'eldoret', 'champion', 'janet@gmail.com', '81dc9bdb52d04dc20', NULL, 2147483647),
('jemutai sato', '23435', 'eldoret', 'champion', 'hau@gmail.com', '81dc9bdb52d04dc20', NULL, 2147483647),
('jemutai', '4545', 'hujr', 'champion', 'jjj@gmail.com', '81dc9bdb52d04dc20', NULL, 2147483647),
('jemutai', '9999', 'head office', 'champion', 'jemutai@gmail.c', '4260678f87b81a022', NULL, 711256927);

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `name` varchar(32) DEFAULT NULL,
  `code` varchar(17) NOT NULL,
  `claim_type` varchar(21) DEFAULT NULL,
  `claim_description` mediumtext,
  `amount` int(46) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`name`, `code`, `claim_type`, `claim_description`, `amount`) VALUES
('janet jemutai', '3352', 'Sports', 'Sports fee', NULL),
('audia  mwangi', '7878', 'Remidials', 'remedials  fee', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `name` varchar(32) DEFAULT NULL,
  `work_id` varchar(23) NOT NULL,
  `school` varchar(43) DEFAULT NULL,
  `role` varchar(32) DEFAULT NULL,
  `email` varchar(23) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `confirm_password` varchar(10) DEFAULT NULL,
  `phone_numer` int(21) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`name`, `work_id`, `school`, `role`, `email`, `password`, `confirm_password`, `phone_numer`) VALUES
('brian kiprotich', '23334', 'tuiyo', 'coordinator', 'bryo@gmail.com', '81dc9bdb52', NULL, 987654321),
('jann', '4567', 'kmgt', 'coordinator', 'kmgt@gmail.com', '1234', NULL, 2147483647),
('sato', '9090', 'high', 'coordinator', 'jjjj@gmail.com', '1e48c4420b', NULL, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(45) NOT NULL,
  `username` varchar(54) NOT NULL,
  `password` varchar(52) NOT NULL,
  `role` varchar(67) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
('1234', 'janet sato', '81dc9bdb52d04dc20036dbd8313ed055', 'champion'),
('23334', 'brian kiprotich', '81dc9bdb52d04dc20036dbd8313ed055', 'coordinator'),
('23435', 'jemutai sato', '81dc9bdb52d04dc20036dbd8313ed055', 'champion'),
('4545', 'jemutai', '81dc9bdb52d04dc20036dbd8313ed055', 'champion'),
('4567', 'jann', '81dc9bdb52d04dc20036dbd8313ed055', 'coordinator'),
('9090', 'sato', '1e48c4420b7073bc11916c6c1de226bb', 'coordinator'),
('9999', 'super admin', '4260678f87b81a022b813b7ab18dd6b4', 'champion');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `name` varchar(32) DEFAULT NULL,
  `admission` int(23) NOT NULL,
  `mathematics` varchar(6) DEFAULT NULL,
  `english` varchar(6) DEFAULT NULL,
  `kiswahili` varchar(6) DEFAULT NULL,
  `chemistry` varchar(6) DEFAULT NULL,
  `biology` varchar(6) DEFAULT NULL,
  `physics` varchar(6) DEFAULT NULL,
  `religious_education` varchar(6) DEFAULT NULL,
  `history` varchar(6) DEFAULT '**',
  `geography` varchar(6) DEFAULT '**',
  `agriculture` varchar(6) DEFAULT '**',
  `business` varchar(6) DEFAULT '**',
  `home_science` varchar(6) DEFAULT '**',
  `art_drawing` varchar(6) DEFAULT '**',
  `french` varchar(6) DEFAULT '**',
  `music` varchar(6) DEFAULT '**',
  `mean_grade` varchar(6) DEFAULT NULL,
  `class_position` int(6) DEFAULT NULL,
  `overal_position` int(6) DEFAULT NULL,
  `attendance` varchar(600) DEFAULT NULL,
  `behavior` varchar(600) DEFAULT NULL,
  `perfomance` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`name`, `admission`, `mathematics`, `english`, `kiswahili`, `chemistry`, `biology`, `physics`, `religious_education`, `history`, `geography`, `agriculture`, `business`, `home_science`, `art_drawing`, `french`, `music`, `mean_grade`, `class_position`, `overal_position`, `attendance`, `behavior`, `perfomance`) VALUES
('kelvin', 5689, 'A-(11)', 'B+(10)', 'A-(11)', 'B+(10)', 'B-(8)', 'C+(7)', 'B(9)', 'A(12)', '', '', 'A-(11)', 'A(12)', '', '', '', 'B+(10)', 23, 34, 'good', 'good', 'good'),
('mathew', 23345, 'C+(7)', 'C(6)', 'B-(8)', 'C+(7)', 'C+(7)', 'C+(7)', 'C+(7)', '', '', '', 'B-(8)', '', '', '', '', 'B-(8)', 34, 34, 'sdfghjkl;', 'zxcvbnm,', 'qwerftghjk');

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `name` varchar(32) DEFAULT NULL,
  `admission` int(23) NOT NULL,
  `branch` varchar(32) DEFAULT NULL,
  `form` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholar`
--

INSERT INTO `scholar` (`name`, `admission`, `branch`, `form`) VALUES
('sammy', 2333, 'moyale', 2),
('janet jeptoo', 3352, 'kabarnet', 3),
('chepkirui mercy', 4545, 'bomet', 3),
('justoo', 7654, 'eldoret', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `champion`
--
ALTER TABLE `champion`
  ADD PRIMARY KEY (`work_id`),
  ADD UNIQUE KEY `work_id` (`work_id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`admission`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`admission`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
