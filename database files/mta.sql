-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2016 at 06:43 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mta`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `userid` int(8) NOT NULL,
  `linenames` varchar(10000) NOT NULL,
  `lastUpdated` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`userid`, `linenames`, `lastUpdated`) VALUES
(1, 'subway_0,subway_1,subway_2,subway_3,bus_0,bus_1,bus_2', '2016-03-17 17:12:36'),
(2, 'subway_0,subway_1,bus_1,bus_2', '2016-03-17 15:33:35'),
(3, 'subway_0', '2016-03-17 16:51:29'),
(4, 'subway_0,subway_1,subway_2,bus_0,bus_1,bus_2,MetroNorth_0,MetroNorth_1,MetroNorth_2', '2016-03-17 17:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(8) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'Chinmay', 'Dighe', 'aa', 'aa'),
(2, 'john', 'doe', 'ss', 'ss'),
(3, 'Chinmay1', 'Dighe1', 'asd', '123'),
(4, 'John', 'Smith', 'johnSmith@yahoo.com', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
