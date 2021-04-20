-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 10:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `participant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL COMMENT 'primary key',
  `name` varchar(255) NOT NULL COMMENT 'Name',
  `age` int(10) DEFAULT NULL,
  `dob` date NOT NULL COMMENT 'Date of Birth',
  `profession` varchar(20) DEFAULT NULL,
  `locality` varchar(20) DEFAULT NULL,
  `guests` int(2) NOT NULL COMMENT 'employee salary',
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='participants table';

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `name`, `age`, `dob`, `profession`, `locality`, `guests`, `address`) VALUES
(1, 'Mahesh', 31, '1990-04-03', 'Student', 'Hyderabad', 0, 'Vanastalipuram'),
(2, 'Test', 34, '1987-04-01', 'Employee', 'Khammam', 1, 'Khamma Main Road');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `first_name` varchar(100) NOT NULL COMMENT 'First Name',
  `last_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `user_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `password` varchar(255) NOT NULL COMMENT 'Password',
  `address` text NOT NULL,
  `dob` varchar(15) NOT NULL COMMENT 'Date Of Birth',
  `contact_no` varchar(16) NOT NULL COMMENT 'Contact No',
  `url` int(255) DEFAULT NULL,
  `verification_code` varchar(255) NOT NULL COMMENT 'verification Code',
  `created_date` varchar(12) NOT NULL COMMENT 'created timestamp',
  `modified_date` varchar(12) NOT NULL COMMENT 'modified timestamp',
  `status` char(1) NOT NULL COMMENT '0=pending, 1=active, 2=delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `address`, `dob`, `contact_no`, `url`, `verification_code`, `created_date`, `modified_date`, `status`) VALUES
(1, 'Demo', 'Demo', 'demo', 'demo@demo.com', '$2y$10$jnsHMT.l7WhIYpMxyuSt0ewQkoV/P4/79MucCyd8zxZADoIw34/nW', 'India', '01-02-1990', '9000000001', NULL, '1', '1559545393', '1559545393', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
