-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2019 at 11:27 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `exp`
--

DROP TABLE IF EXISTS `exp`;
CREATE TABLE IF NOT EXISTS `exp` (
  `eno` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`eno`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exp`
--

INSERT INTO `exp` (`eno`, `description`, `price`, `date`, `id`) VALUES
(12, 'Birthday', 500, '2019-03-06', 1),
(11, 'Goa', 1000, '2019-09-06', 1),
(4, 'Shetty Canteen', 45, '2019-10-06', 2),
(5, 'sadguru', 40, '2019-07-07', 1),
(6, 'book', 90, '2017-10-06', 1),
(7, 'Costume', 880, '2019-09-06', 1),
(8, 'Ex', 89, '2019-10-01', 1),
(9, 'Web app', 30, '2019-10-04', 1),
(10, 'Water', 45, '2019-10-06', 1),
(13, 'Sirsi Trip', 2000, '2019-01-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Password` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Password`) VALUES
(1, 'Abhishek', 12345),
(2, 'Raju', 123),
(3, 'mangesh', 12345),
(4, 'mangeshi', 56),
(5, 'ram', 27),
(6, '456', 456),
(7, 'Shrivatsa', 4567);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
