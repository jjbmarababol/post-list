-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2019 at 03:26 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `marababol`
--

DROP TABLE IF EXISTS `marababol`;
CREATE TABLE IF NOT EXISTS `marababol` (
  `mId` int(11) NOT NULL AUTO_INCREMENT,
  `mtitle` varchar(100) NOT NULL,
  `intro` varchar(100) NOT NULL,
  `ending` varchar(100) NOT NULL,
  `imageurl` text,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`mId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marababol`
--

INSERT INTO `marababol` (`mId`, `mtitle`, `intro`, `ending`, `imageurl`, `dateCreated`) VALUES
(1, 'First Post', 'Hi', 'World!', '612814user-2.png', '2019-03-19 03:23:10'),
(2, 'Second Post', 'Hi', 'World!', '69687user-4.png', '2019-03-19 03:23:27'),
(3, 'Third Post', 'Hello', 'World and Web!', NULL, '2019-03-19 03:23:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
