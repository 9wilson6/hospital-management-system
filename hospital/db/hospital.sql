-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 04:57 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `rec_no` int(11) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `med_condition` text NOT NULL,
  `datetym` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`rec_no`, `doctor_id`, `patient_id`, `med_condition`, `datetym`, `status`) VALUES
(6, 5509, 66667, ' To make someone tired:tire, exhaust, wear out... ', 1542070740, 2),
(8, 5509, 66667, '   hello wilson....wilson', 1542070740, 2),
(12, 5509, 66667, 'pneumonia', 1542157140, 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `rec_no` int(11) NOT NULL,
  `doctor_id` varchar(50) NOT NULL,
  `date_hired` varchar(13) NOT NULL,
  `address` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`rec_no`, `doctor_id`, `date_hired`, `address`, `qualification`, `department`, `name`, `telephone`, `email`, `password`) VALUES
(2, '5509', '0', '1212', 'Primary medical qualifications', 'Microbiology', 'doctor', '0712953780', 'doctor@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(4, '5986', '11/13/2018 01', '5986', 'Primary medical qualifications', 'Haematology', 'Wilson', '0712953780', 'gatheruwilson@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `rec_no` int(11) NOT NULL,
  `expense` varchar(50) NOT NULL,
  `datetym` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `available` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`rec_no`, `expense`, `datetym`, `balance`, `description`, `available`) VALUES
(4, '3000', '1542157140', '80554', 'hello world...', '83554'),
(5, '50000', '1542157140', '-50000', 'hello world', '0'),
(6, '4000', '1542193200', '496000', 'hello world', '0');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `rec_no` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `diagnosis` text NOT NULL,
  `datetym` varchar(50) NOT NULL,
  `drugs` text NOT NULL,
  `recommedation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`rec_no`, `patient_id`, `diagnosis`, `datetym`, `drugs`, `recommedation`) VALUES
(1, 5986, 'malaria', '1541584740', 'Chloroquine (Aralen)\r\n\r\n', 'if you suspect you have malaria or that you\'ve been exposed, you\'re likely to start by seeing your family doctor. \r\n\r\n'),
(4, 66667, 'diagnosis goes here.....', '1542070740', 'Drugs given goes here', 'hello my name is description'),
(5, 66667, 'diagnosis goes here.....', '1542070740', 'Drugs given goes here', 'hello my name is description'),
(6, 66667, 'this is the diagnosis', '1542070740', 'panatella', 'hello world'),
(7, 66667, 'Hmm. Weâ€™re having trouble finding that site.', '1542243540', 'caffeine\r\nnicotine', 'Commonly used illegal drugs include marijuana, heroin, cocaine, amphetamines and methamphetamines and club drugs.'),
(8, 66667, 'pneumonia', '1541465940', 'Antibiotics', 'have vaccines administered '),
(9, 66667, 'hello world', '1540947540', 'test drugs', 'recommendation goes here');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `rec_no` int(11) NOT NULL,
  `nurse_id` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`rec_no`, `nurse_id`, `email`, `telephone`, `name`, `password`) VALUES
(1, '5231', 'nurse@gmail.com', '712953780', 'nurse', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(3, '5986', 'gatheruwilson@gmail.com', '712953780', 'Wilson', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `rec_no` int(11) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `med_condition` text NOT NULL,
  `age` int(5) NOT NULL,
  `datetym` int(40) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`rec_no`, `patient_id`, `name`, `email`, `password`, `gender`, `address`, `med_condition`, `age`, `datetym`, `telephone`) VALUES
(1, '66667', 'patient', 'patient@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'male', '555St', 'hello world', 50, 589686, '0712953780'),
(2, '7898', 'Johnson', 'kasuku96@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'Patient', '55st', 'medical condition goes here', 45, 1542070740, '0712953780');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `rec_no` int(50) NOT NULL,
  `rec_id` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `datetym` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `amount` int(50) NOT NULL,
  `counted` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`rec_no`, `rec_id`, `patient_id`, `payment_id`, `datetym`, `description`, `amount`, `counted`) VALUES
(1, 0, '66667', 'hello', '1542243540', 'hello', 7877, 1),
(2, 0, '66667', 'hello', '1542243540', 'hello', 7877, 1),
(3, 8, '66667', '5657', '1542243540', 'hello', 67800, 1),
(4, 6, '66667', '5778', '1542243540', 'and methamphetamines and club drugs.', 500000, 1),
(6, 0, '66667', '5779', '1542157140', 'test....', 800000, 0),
(7, 11, '66667', '57790', '1542157140', 'hello there', 50000, 0),
(8, 12, '66667', '5780', '1542157140', 'hello world', 5000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`rec_no`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`rec_no`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`rec_no`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`rec_no`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`rec_no`,`nurse_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`rec_no`,`patient_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`rec_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `rec_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `rec_no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
