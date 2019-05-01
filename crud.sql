-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 08:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `a_id` int(11) NOT NULL,
  `address` varchar(110) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`a_id`, `address`, `id`) VALUES
(7, 'dvds', 37),
(8, 'sdhdshdghsghfgh', 38),
(9, 'hfjwhbfkjhbewf', 39);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `passcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `passcode`) VALUES
(0, 'admin', '21232f297a57a5a743894a0e4a801f');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `hobby` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `gender`, `address`, `hobby`, `country`) VALUES
(10, 'fwfw', 'fwef@gmail.com', 'male', 'wf', 'music', 'Austrlia'),
(12, 'fwfw', 'fwef@gmail.com', 'male', 'wf', 'music', 'Austrlia'),
(13, 'surya mohan menda', 'varmaharshendra@gamil.com', 'male', 'dsagfadsg', 'Movies', 'India'),
(16, 'gfhdf', 'sghsghgksnfghnfslhnlfngh@asg.c', '', 'dfh', '', 'India'),
(20, 'udvjhvds', 'dsv@gmail.com', 'male', 'vds', 'music', 'India'),
(21, 'udvjhvds', 'dsv@gmail.com', 'male', 'vds', 'music', 'India'),
(22, 'udvjhvds', 'dsv@gmail.com', 'male', 'vds', 'music', 'India'),
(23, 'asvdas', 'asdv@gmail.com', 'male', 'asdv', 'music', 'India'),
(24, 'asvdas', 'asdv@gmail.com', 'male', 'asdv', 'music', 'India'),
(25, 'ADSF', 'afgffasg@gmail.com', 'male', 'asgsda', 'music', 'India'),
(26, 'fdasfasdf', 'varmaharshendra@gamil.com', 'male', 'asd', 'music', 'India'),
(27, 'fdasfasdf', 'varmaharshendra@gamil.com', 'male', 'asd', 'music', 'India'),
(28, 'fadsfads', 'varmaharshendra@gamil.com', 'male', 'asdf', 'music', 'India'),
(37, 'harshendra', 'varmaharshendra@gamil.com', 'male', '', 'music,Games', 'Pakistan'),
(38, 'surya m', 'varmaharshendra@gamil.com', 'male', '', 'music', 'Japan'),
(39, 'rahul', 'rahul@gmail.com', 'male', '', 'music', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
