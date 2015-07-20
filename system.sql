-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2015 at 02:00 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(5) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `is_active`) VALUES
('admin', 'f23871a6106ce52fec86c4b3f4171eb2380a1b03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `geoloc`
--

CREATE TABLE IF NOT EXISTS `geoloc` (
  `resident_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `geoloc` varchar(250) NOT NULL,
  PRIMARY KEY (`resident_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `resident_id` int(2) NOT NULL,
  `name` varchar(150) NOT NULL,
  `nmane` int(150) NOT NULL,
  `lname` int(150) NOT NULL,
  `member_resident_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE IF NOT EXISTS `resident` (
  `resident_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `mname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bday` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `occupation` varchar(60) NOT NULL,
  `status` varchar(30) NOT NULL,
  `purok` varchar(30) NOT NULL,
  `resAddress` varchar(500) NOT NULL,
  `perAddress` varchar(500) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telNum` varchar(13) NOT NULL,
  `cpNum` varchar(13) NOT NULL,
  PRIMARY KEY (`resident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `name`, `mname`, `lname`, `gender`, `bday`, `age`, `citizenship`, `occupation`, `status`, `purok`, `resAddress`, `perAddress`, `email`, `telNum`, `cpNum`) VALUES
(1, 'Noel', 'Anasco', 'Calonia', 'Male', '1995-04-10', '20', 'Filipino', 'Student', 'Single', 'Kaimito', 'Prk. Kaimito, Panabo City', 'Prk. Kaimito, Panabo City', 'emo_noel10@yahoo.com', '2225990', '09127708457'),
(3, 'kllkjlkjl', 'jkljkljkkljpopokpko', 'klklklkljk', 'Female', '1996-09-05', '19', 'Filipino', 'Student', 'Single', 'Mangga', 'Prk. Mangga, Panabo City', 'Prk. Manga, Panabo City', 'ljljljljl@lkjlkjlkj.com', '9994512', '09128574659');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
