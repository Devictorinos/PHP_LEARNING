-- phpMyAdmin SQL Dump
-- version 4.0.9deb1.saucy~ppa.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2014 at 11:23 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.8-3+sury.org~saucy+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testDataBase`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userLogin` varchar(20) NOT NULL,
  `userFirstName` varchar(20) NOT NULL,
  `userLastName` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `userPhoneNumber` varchar(15) NOT NULL,
  `userPassword` varchar(200) NOT NULL,
  `userRegisterDate` datetime DEFAULT NULL,
  `userInfoUpdtaeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userIP` varchar(20) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userLogin`, `userFirstName`, `userLastName`, `userEmail`, `userPhoneNumber`, `userPassword`, `userRegisterDate`, `userInfoUpdtaeDate`, `userIP`) VALUES
(96, 'yoyo', 'fdyfsdfds', 'Ljjjjj', 'aadfdss@xample.com', '057272222', 'pdo_44209a6a592dea91bcf7d4dd53e47a5a', '2014-02-08 17:38:09', '2014-02-08 15:38:09', '127.0.0.1'),
(97, 'yfyo', 'fdyfsdfds', 'Ljjjjj', 'aadkl78@xample.com', '057272222', 'pdo_44209a6a592dea91bcf7d4dd53e47a5a', '2014-02-08 17:51:39', '2014-02-08 15:51:39', '127.0.0.1'),
(98, 'yfffyo', 'fdyfsdfds', 'Ljjjjj', 'aa34@xample.com', '057272222', 'pdo_44209a6a592dea91bcf7d4dd53e47a5a', '2014-02-08 17:57:49', '2014-02-08 15:57:49', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
