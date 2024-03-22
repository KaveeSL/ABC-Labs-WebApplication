-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2024 at 03:07 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abclabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aemail` varchar(255) NOT NULL,
  `apassword` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aemail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aemail`, `apassword`) VALUES
('admin@abc.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appoid` int NOT NULL AUTO_INCREMENT,
  `pid` int DEFAULT NULL,
  `apponum` int DEFAULT NULL,
  `scheduleid` int DEFAULT NULL,
  `appodate` date DEFAULT NULL,
  PRIMARY KEY (`appoid`),
  KEY `pid` (`pid`),
  KEY `scheduleid` (`scheduleid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoid`, `pid`, `apponum`, `scheduleid`, `appodate`) VALUES
(6, 1, 3, 1, '2024-03-09'),
(4, 1, 2, 1, '2024-03-09'),
(5, 1, 2, 1, '2024-03-09'),
(8, 2, 4, 1, '2024-03-09'),
(11, 1, 1, 9, '2024-03-11'),
(10, 1, 5, 1, '2024-03-11'),
(12, 1, 2, 9, '2024-03-12'),
(13, 3, 6, 1, '2024-03-12'),
(14, 3, 3, 9, '2024-03-12'),
(15, 5, 1, 10, '2024-03-14'),
(17, 1, 2, 10, '2024-03-16'),
(18, 3, 3, 10, '2024-03-16'),
(19, 3, 1, 11, '2024-03-16'),
(20, 5, 2, 11, '2024-03-16'),
(21, 5, 1, 12, '2024-03-16'),
(22, 5, 4, 10, '2024-03-16'),
(24, 5, 3, 11, '2024-03-17'),
(25, 3, 4, 11, '2024-03-18'),
(27, 6, 5, 11, '2024-03-18'),
(28, 3, 1, 13, '2024-03-18'),
(29, 3, 6, 11, '2024-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

DROP TABLE IF EXISTS `card_details`;
CREATE TABLE IF NOT EXISTS `card_details` (
  `CardID` int NOT NULL AUTO_INCREMENT,
  `PatientID` int DEFAULT NULL,
  `CardHolder` varchar(255) DEFAULT NULL,
  `CardNumber` varchar(255) DEFAULT NULL,
  `ExpiryDate` varchar(10) DEFAULT NULL,
  `CVC` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`CardID`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `docid` int NOT NULL AUTO_INCREMENT,
  `docemail` varchar(255) DEFAULT NULL,
  `docname` varchar(255) DEFAULT NULL,
  `docpassword` varchar(255) DEFAULT NULL,
  `docnic` varchar(15) DEFAULT NULL,
  `doctel` varchar(15) DEFAULT NULL,
  `specialties` int DEFAULT NULL,
  PRIMARY KEY (`docid`),
  KEY `specialties` (`specialties`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `docemail`, `docname`, `docpassword`, `docnic`, `doctel`, `specialties`) VALUES
(3, 'nb@gmail.com', 'Dr.Namal Balachandra ', '123', '09089738002', '0778267102', 6),
(2, 'sadunpe@gmail.com', 'Dr. Sadun Perera', '123', '10203040', '0710000000', 1),
(4, 'cp@gmail.com', 'Dr.Chathura Prabath', '123', '1234556654', '0771678289', 4),
(5, 'drmuditha@gmail.com', 'Dr.Muditha Rajakaruna', '123', '09786457v', '0776756235', 3);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pid` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `upload_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_patient` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `email`, `pid`, `filename`, `filepath`, `upload_date`) VALUES
(1, '', 0, '65fd00ef352ac_Blood_Report_P-3.pdf', 'uploads/65fd00ef352ac_Blood_Report_P-3.pdf', '2024-03-22 03:54:23'),
(2, '', 0, '65fd012da45a1_doc.pdf', 'uploads/65fd012da45a1_doc.pdf', '2024-03-22 03:55:25'),
(3, 'kasmirakaveesha@gmail.com', 0, '65fd018ef2fb9_doc.pdf', 'uploads/65fd018ef2fb9_doc.pdf', '2024-03-22 03:57:02'),
(4, 'kasmirakaveesha@gmail.com', 0, '65fd0273dc832_Blood_Report_P-3.pdf', 'uploads/65fd0273dc832_Blood_Report_P-3.pdf', '2024-03-22 04:00:51'),
(5, 'kasmirakaveesha@gmail.com', 0, '65fd027a363f7_Blood_Sugar_Report_P-5.pdf', 'uploads/65fd027a363f7_Blood_Sugar_Report_P-5.pdf', '2024-03-22 04:00:58'),
(6, 'cp@gmail.com', 0, '65fd0282ee9c1_Blood_Sugar_Report_P-5.pdf', 'uploads/65fd0282ee9c1_Blood_Sugar_Report_P-5.pdf', '2024-03-22 04:01:06'),
(7, 'kasmirakaveesha@gmail.com', 0, '65fd0772a8028_Blood_Report_P-3.pdf', 'uploads/65fd0772a8028_Blood_Report_P-3.pdf', '2024-03-22 04:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pemail` varchar(255) DEFAULT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `ppassword` varchar(255) DEFAULT NULL,
  `paddress` varchar(255) DEFAULT NULL,
  `pnic` varchar(15) DEFAULT NULL,
  `pdob` date DEFAULT NULL,
  `ptel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pemail`, `pname`, `ppassword`, `paddress`, `pnic`, `pdob`, `ptel`) VALUES
(3, 'lal@gmail.com', 'lal Nanayakkara', '123', '43/40 bomaluw road,nivitigala,Ratnapura', '333333333333', '2024-03-21', '0716789076'),
(6, 'testp1@abc.com', 'Test patient  1', '123', 'Colombo 6', '09826786v', '2002-06-18', '0752787567');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `card_number` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(10) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `scheduleid` int NOT NULL AUTO_INCREMENT,
  `docid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `scheduledate` date DEFAULT NULL,
  `scheduletime` time DEFAULT NULL,
  `nop` int DEFAULT NULL,
  PRIMARY KEY (`scheduleid`),
  KEY `docid` (`docid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `docid`, `title`, `scheduledate`, `scheduletime`, `nop`) VALUES
(1, '1', 'Test Session', '2050-01-01', '18:00:00', 50),
(11, '4', 'Blood Gas Analysis', '2024-04-11', '11:35:00', 20),
(12, '3', 'Liver Function Tests (LFTs)', '2024-04-17', '00:00:00', 20),
(10, '2', 'Complete Blood Count (CBC)', '2024-04-10', '09:35:00', 20),
(13, '5', 'Kidney Sample', '2024-03-19', '16:43:00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

DROP TABLE IF EXISTS `specialties`;
CREATE TABLE IF NOT EXISTS `specialties` (
  `id` int NOT NULL,
  `sname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Infectious Disease Specialist'),
(2, 'Cardiologist'),
(3, 'Immunologist'),
(4, 'Microbiologist'),
(5, 'Microbiologist'),
(6, 'Clinical Pathologist'),
(7, 'Clinical biology');

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

DROP TABLE IF EXISTS `webuser`;
CREATE TABLE IF NOT EXISTS `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` char(1) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@abc.com', 'a'),
('nb@gmail.com', 'd'),
('sadunpe@gmail.com', 'd'),
('lal@gmail.com', 'p'),
('drmuditha@gmail.com', 'd'),
('testp1@abc.com', 'p'),
('cp@gmail.com', 'd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
