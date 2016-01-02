-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2015 at 06:36 PM
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
  `latlong` text NOT NULL,
  PRIMARY KEY (`resident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `name`, `mname`, `lname`, `gender`, `bday`, `age`, `citizenship`, `occupation`, `status`, `purok`, `resAddress`, `perAddress`, `email`, `telNum`, `cpNum`, `latlong`) VALUES
(3, 'kllkjlkjl', 'jkljkljkkljpopokpko', 'klklklkljk', 'Female', '1996-09-05', '19', 'Filipino', 'Student', 'Single', 'Mangga', 'Prk. Mangga, Panabo City', 'Prk. Manga, Panabo City', 'ljljljljl@lkjlkjlkj.com', '9994512', '09128574659', ''),
(4, 'pangit', 'kaayo', 'ko', 'Male', '2005-07-17', '10', 'Filipino', 'None', 'Single', 'Kalamansi', 'Prk. Kalamansi, Panabo City', 'Prk. Kalamansi, Panabo City', 'pangitko@gmail.com', '', '09201021020', '7.284513,125.677659'),
(6, 'Jocel', 'Carcosia', 'Malo', 'Female', '1996-02-21', '19', 'Filipino', 'Student', 'Single', 'Kaimito', 'Prk. Kaimito, Panabo City', 'Prk. Kaimito, Panabo City', 'nice_yatz14@yahoo.com', 'N/A', '09207664384', ''),
(10, 'oiqweriowur', 'wouriwueioruiou', 'uwueroiuqweiorui', 'uiuwieurioqwuior', '1990-07-26', '25', 'Filipino', 'Student', 'Separated', 'Prk. Kaimito', 'Prk. Kaimito, Panabo City', 'Prk. Kaimito, Panabo City', 'oiqweriowur', '', '09208844993', ''),
(11, 'Ian Jay', 'asdfads', 'Padios', 'Male', '1987-05-06', '36', 'Filipino', 'Instructor', 'Married', 'Mangga', 'Prk. Mangga, Panabo City', 'Prk. Mangga, Panabo City', 'paddypadios@yahoo.com', '222-5649', '09236291837', ''),
(12, 'Suysuy', 'Manoynoy', 'Patisoy', 'Male', '1985-07-15', '30', 'Filipino', 'Student', 'Single', 'Kasoy', 'Prk, Kasoy, Panabo City', 'Prk, Kasoy, Panabo City', 'suyPatisoy@gmail.com', '', '092399182764', '7.282742,125.682049'),
(13, 'Elizabeth', 'Caitom', 'Smith', 'Female', '1990-09-14', '25', 'Filipino', 'None', 'Married', 'Marang Joesil', 'Prk. Marang Joesil, Panabo City', 'Prk. Marang Joesil, Panabo City', 'eSmith@yahoo.com', '932-9956', '09234883894', '7.282071,125.682757'),
(14, 'Viktor Immanuel', 'Anasco', 'Calonia', 'Male', '1993-11-12', '22', 'Filipino', 'Mobile Software Developer', 'Single', 'Mangosteen', 'Prk. Mangosteen, Cagangohan, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mangosteen, Cagangohan, Panabo City, Davao del Norte, Philippines 8105', 'matadorx44@yahoo.com', '', '09205291897', '7.291548,125.670953'),
(23, 'Lea', 'ambot', 'Salongga', 'Female', '1991-12-12', '24', 'American', 'Singer', 'Married', 'Kaimito', 'Prk. Kaimito, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Kaimito, Panabo City, Davao del Norte, Philippines 8105', 'razor@yahoo.com', '', '091212121212', '7.282056,125.682733'),
(25, 'Danila', 'Entes', 'Terse', 'Female', '1994-12-12', '21', 'Filipino', 'Student', 'Married', 'Melon', 'Prk. Melon, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Melon, Panabo City, Davao del Norte, Philippines 8105', 'dhudx14@yahoo.com', '', '0912345678', '7.284732,125.685388'),
(26, 'Archie', 'Arano', 'Bajeyo', 'Male', '1994-11-08', '21', 'Filipino', 'Student', 'Single', 'Kasoy', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'archiebajeyo@yahoo.com', '', '0930520932', '7.290923,125.683739'),
(27, 'Noel', 'asas', 'Calonia', 'Male', '1995-12-01', '20', 'Filipino', 'Student', 'Single', 'Kasoy', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'razor@yahoo.com', '', '0912345678', '7.291527,125.671001'),
(28, 'Marvin', 'echever', 'Caitom', 'Male', '1995-04-30', '20', 'Filipino', 'Student', 'Single', 'Mangga', 'Prk. Mangga, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mangga, Panabo City, Davao del Norte, Philippines 8105', 'marvin@yahoo.com', '', '0912345678', '7.279576,125.68048'),
(29, 'Danilo', 'Entes', 'Terse', 'Male', '2000-12-12', '15', 'Filipino', 'Student', 'Single', 'Mangga', 'Prk. Mangga, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mangga, Panabo City, Davao del Norte, Philippines 8105', 'razor@yahoo.com', '', '0912222222', '7.2905,125.675132'),
(30, 'Honey', 'G', 'Jane', 'Female', '2000-12-13', '15', 'Filipino', 'None', 'Single', 'Nangka', 'Prk. Nangka, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Nangka, Panabo City, Davao del Norte, Philippines 8105', 'honey@yahoo.com', '', '0912345678', '7.287201,125.683307'),
(31, 'Irene ', 'Ardoña ', 'Sarita ', 'Female', '1962-02-04', '53', 'Filipino', 'Doctor', 'Married', 'Mangosteen', 'Prk. Mangosteen, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mangosteen, Panabo City, Davao del Norte, Philippines 8105', 'Irene@yahoo.com', '', '09178570467 ', '7.291889,125.667946'),
(32, 'Roveric ', 'Carreon ', 'Enriquez ', 'Female', '1972-02-12', '43', 'Filipino', 'Lawyer', 'Married', 'Chico', 'Prk. Chico, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Chico, Panabo City, Davao del Norte, Philippines 8105', 'roveric@yahoo.com', ' 332-4880 ', ' 09162046019', '7.289777,125.671344'),
(33, 'Editha ', 'Magat ', 'Martinez ', 'Female', '1978-09-08', '37', 'Filipino', 'Nurse', 'Married', 'Lanzones', 'Prk. Lanzones, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Lanzones, Panabo City, Davao del Norte, Philippines 8105', 'edith@yahoo.com', '484-9883 ', ' 09182049525', '7.289989,125.669606'),
(34, 'Daisy ', 'Tabilog ', 'Tejada ', 'Female', '1999-03-04', '16', 'Filipino', 'Student', 'Single', 'Sereguellas', 'Prk. Sereguellas, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Sereguellas, Panabo City, Davao del Norte, Philippines 8105', 'daisy@yahoo.com', '808-2391 ', ' 09178842769 ', '7.28975,125.683463'),
(35, 'Arthur ', 'Teves ', 'Barcelona ', 'Male', '1960-04-05', '55', 'Filipino', 'Teacher', 'Married', 'Kasoy', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'arthur@yahoo.com', '', '0906-4940321 ', '7.289915,125.679858'),
(36, 'Catherine ', 'Macandili ', 'Sangalang ', 'Female', '1942-06-07', '73', 'Filipino', 'None', 'Widowed', 'Atis', 'Prk. Atis, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Atis, Panabo City, Davao del Norte, Philippines 8105', 'catherine@yahoo.com', ' 871-8307', '09209248234', '7.292418,125.679286'),
(37, 'Virgilio ', 'Domingo ', 'Fernandez ', 'Male', '1988-02-04', '27', 'Filipino', 'Civil Engineer', 'Single', 'Avocado', 'Prk. Avocado, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Avocado, Panabo City, Davao del Norte, Philippines 8105', 'Virgilio@yahoo.com', ' 845-0567 ', ' 09189074142 ', '7.291692,125.677495'),
(38, 'Melani ', 'Lopez ', 'Pangan ', 'Female', '1976-06-08', '39', 'Filipino', 'Teacher', 'Married', 'Bayabas', 'Prk. Bayabas, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Bayabas, Panabo City, Davao del Norte, Philippines 8105', 'Melani@yahoo.com', ' 843-6540 ', ' 09175203511 ', '7.289617,125.681574'),
(39, 'Ricardo ', 'Torralba ', 'Victoria ', 'Male', '1965-08-09', '50', 'Filipino', 'Police', 'Divorced', 'Boongon', 'Prk. Boongon, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Boongon, Panabo City, Davao del Norte, Philippines 8105', 'Ricardo@yahoo.com', ' 888-5890 ', ' 09178005904', '7.280794,125.684648'),
(40, 'Milagros ', 'Quiambao ', 'Santos ', 'Female', '1972-05-04', '43', 'Filipino', 'Nurse', 'Married', 'Guyabano', 'Prk. Guyabano, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Guyabano, Panabo City, Davao del Norte, Philippines 8105', 'Milagros@yahoo.com', '243-3959 ', ' 09228892829 ', '7.284176,125.682749'),
(41, 'Anthony ', 'Vergara ', 'Dabu ', 'Male', '1980-08-25', '35', 'Filipino', 'Teacher', 'Married', 'Durian', 'Prk. Durian, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Durian, Panabo City, Davao del Norte, Philippines 8105', 'Anthony@yahoo.com', '711-4141 ', '0915-5383812 ', '7.282513,125.688537'),
(42, 'Adelina ', 'Rivera ', 'Rubenecia ', 'Female', '1955-09-08', '60', 'Filipino', 'None', 'Married', 'Lomboy', 'Prk. Lomboy, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Lomboy, Panabo City, Davao del Norte, Philippines 8105', '', ' 243-3959 ', '09228892829 ', '7.282577,125.682025'),
(43, 'Johanns ', 'Villanueva ', 'Yangco ', 'Male', '1989-05-07', '26', 'Filipino', 'Computer Programmer', 'Single', 'Mabolo', 'Prk. Mabolo, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mabolo, Panabo City, Davao del Norte, Philippines 8105', 'Johanns@yahoo.com', '369-4985 ', '0915-5383812 ', '7.281513,125.679394'),
(44, 'Sylvia ', 'Dualan ', 'Sunga ', 'Female', '1966-09-11', '49', 'Filipino', 'None', 'Married', 'Macopa', 'Prk. Macopa, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Macopa, Panabo City, Davao del Norte, Philippines 8105', '', '', ' 0917-3576174', '7.274755,125.683489'),
(45, 'Balgamel ', 'Calara ', 'Frondozo ', 'Male', '1990-05-12', '25', 'Filipino', 'Teacher', 'Single', 'Mansanas', 'Prk. Mansanas, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mansanas, Panabo City, Davao del Norte, Philippines 8105', 'Balgamel@yahoo.com', '', '0919-4694848 ', '7.283391,125.678055'),
(46, 'Florabelle ', 'Castro ', 'Dulay ', 'Female', '1999-06-28', '16', 'Filipino', 'Student', 'Single', 'Marang', 'Prk. Marang, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Marang, Panabo City, Davao del Norte, Philippines 8105', 'Florabelle@yahoo.com', '', '09391286070 ', '7.284341,125.686107'),
(47, 'Jorge ', 'Nicolas ', 'Parfan ', 'Male', '1978-09-15', '37', 'Filipino', 'Manager', 'Single', 'Marang Joesil', 'Prk. Marang Joesil, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Marang Joesil, Panabo City, Davao del Norte, Philippines 8105', '', '', '09178470406 ', '7.281667,125.684691'),
(48, 'Rochelle ', 'Rubio ', 'Brozas ', 'Female', '1993-08-29', '22', 'Filipino', 'Call Center Agent', 'Single', 'Rambutan', 'Prk. Rambutan, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Rambutan, Panabo City, Davao del Norte, Philippines 8105', 'Rochelle@yahoo.com', '', '09178217612 ', '7.291655,125.681899'),
(49, 'Edwin ', 'Santos ', 'Yulo ', 'Male', '1975-04-12', '40', 'Filipino', 'Carpenter', 'Married', 'Pomelo', 'Prk. Pomelo, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Pomelo, Panabo City, Davao del Norte, Philippines 8105', '', '', '09228221773 ', '7.291139,125.677723'),
(50, 'Francine ', 'Palermo ', 'Olarte ', 'Female', '2001-09-05', '14', 'Filipino', 'Student', 'Single', 'Ubas', 'Prk. Ubas, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Ubas, Panabo City, Davao del Norte, Philippines 8105', 'Francine@yahoo.com', '', '09275269899 ', '7.287339,125.678431'),
(51, 'Ryan ', 'Tiongco ', 'Garcera ', 'Male', '1985-02-11', '30', 'Filipino', 'Electrician', 'Married', 'Tambis', 'Prk. Tambis, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Tambis, Panabo City, Davao del Norte, Philippines 8105', '', '', '09275269899 ', '7.288225,125.67095'),
(52, 'Caesar ', 'Gutierrez ', 'Laureta ', 'Male', '1972-11-11', '43', 'Filipino', 'Teacher', 'Married', 'Sunkist', 'Prk. Sunkist, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Sunkist, Panabo City, Davao del Norte, Philippines 8105', '', '', ' 09177933848 ', '7.288805,125.676682'),
(53, 'Joaquin ', 'Madero ', 'Micu ', 'Male', '1983-02-02', '32', 'Filipino', 'Fisherman', 'Married', 'Santol', 'Prk. Santol, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Santol, Panabo City, Davao del Norte, Philippines 8105', '', '', ' 09178543314', '7.283599,125.68943'),
(54, 'Anthony ', 'Salazar ', 'Arguelles ', 'Male', '1975-03-03', '40', 'Filipino', 'Student', 'Single', 'Chico', 'Prk. Chico, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Chico, Panabo City, Davao del Norte, Philippines 8105', '', '', '09209410014 ', '7.290168,125.693585'),
(55, 'Annalissa ', 'Aguila ', 'Aquino ', 'Female', '1975-04-04', '40', 'Filipino', 'Housewife', 'Married', 'Avocado', 'Prk. Avocado, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Avocado, Panabo City, Davao del Norte, Philippines 8105', '', '', '09219972504 ', '7.289622,125.676703'),
(56, 'Charles ', 'Arnaldo ', 'Atienza ', 'Male', '1988-05-05', '27', 'Filipino', 'Teacher', 'Single', 'Kasoy', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'Charles@yahoo.com', '', '09063056031 ', '7.290873,125.680322'),
(57, 'Bella ', 'Ocampo ', 'Calanog ', 'Female', '1996-07-07', '19', 'Filipino', 'Student', 'Single', 'Chico', 'Prk. Chico, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Chico, Panabo City, Davao del Norte, Philippines 8105', '', '', '09178431659 ', '7.289928,125.671331'),
(58, 'Mark ', 'Legaspi ', 'Llarena ', 'Male', '2002-12-03', '13', 'Filipino', 'Student', 'Single', 'Pomelo', 'Prk. Pomelo, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Pomelo, Panabo City, Davao del Norte, Philippines 8105', '', '', ' 09159013888 ', '7.292017,125.678071'),
(59, 'Jose ', 'Lopez ', 'Lampad ', 'Male', '1945-08-08', '70', 'Filipino', 'None', 'Married', 'Kasoy', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Kasoy, Panabo City, Davao del Norte, Philippines 8105', '', '', '09272670104 ', '7.290165,125.679976'),
(60, 'Aldrin ', 'Rubenecia ', 'Santos ', 'Male', '1949-09-09', '66', 'Filipino', 'None', 'Separated', 'Guyabano', 'Prk. Guyabano, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Guyabano, Panabo City, Davao del Norte, Philippines 8105', '', '', '0917-8326509 ', '7.284237,125.680662'),
(61, 'Carlo ', 'Umlas ', 'Villadolid ', 'Male', '1977-10-10', '38', 'Filipino', 'Dentist', 'Married', 'Lomboy', 'Prk. Lomboy, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Lomboy, Panabo City, Davao del Norte, Philippines 8105', '', '', ' 0917-9120912', '7.282271,125.681805'),
(62, 'Mary Rose ', 'Nayan ', 'Capicoy ', 'Female', '1988-11-11', '27', 'Filipino', 'Flight Attendant', 'Single', 'Mansanas', 'Prk. Mansanas, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mansanas, Panabo City, Davao del Norte, Philippines 8105', '', '', '0927-3783045 ', '7.284237,125.677867'),
(63, 'Francis ', 'Abrahan ', 'Berberabe ', 'Male', '1956-12-01', '59', 'Filipino', 'Doctor', 'Single', 'Mansanas', 'Prk. Mansanas, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mansanas, Panabo City, Davao del Norte, Philippines 8105', '', '', '0920-5868338 ', '7.285115,125.677803'),
(64, 'Victor Emmanuel', 'Robin', 'Calonia', 'Male', '1956-08-09', '59', 'Filipino', 'Government Employee', 'Married', 'Kaimito', 'Prk. Kaimito, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Kaimito, Panabo City, Davao del Norte, Philippines 8105', 'caloniavictor@yahoo.com', '', '09207664384', '7.292794,125.676167'),
(65, 'rqwr', 'qwerq', 'wqerqw', 'Male', '2005-07-14', '10', 'Filipino', 'Student', 'Single', 'Mabolo', 'Prk. Mabolo, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Mabolo, Panabo City, Davao del Norte, Philippines 8105', 'qewr@qwer.com', '9388594', '09239998888', '7.283982,125.682304'),
(66, 'Rogie', 'asdf', 'Masangkay', 'Male', '1972-06-20', '43', 'Filipino', 'Instructor', 'Married', 'Boongon', 'Prk. Boongon, Panabo City, Davao del Norte, Philippines 8105', 'Prk. Boongon, Panabo City, Davao del Norte, Philippines 8105', 'rMasangkay@yahoo.com', '', '09287776453', '7.282561,125.681998');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
