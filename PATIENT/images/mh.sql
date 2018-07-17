-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2015 at 06:49 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mh`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `dname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `qulific` varchar(20) NOT NULL,
  `did` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `expert` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `day` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mblno` int(10) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`did`),
  UNIQUE KEY `email` (`email`,`mblno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `uname` varchar(20) NOT NULL,
  `passd` varchar(20) NOT NULL,
  UNIQUE KEY `passd` (`passd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `passd`) VALUES
('maru', '1122'),
('maruthi', 'maru');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `cpwd` varchar(10) NOT NULL,
  `month` varchar(15) NOT NULL,
  `day` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mblno` int(10) NOT NULL,
  UNIQUE KEY `email` (`email`,`mblno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
