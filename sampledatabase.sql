-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 29, 2014 at 08:16 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agentfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_type`
--

CREATE TABLE IF NOT EXISTS `agent_type` (
  `agent_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_type` varchar(255) NOT NULL,
  PRIMARY KEY (`agent_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `agent_type`
--

INSERT INTO `agent_type` (`agent_type_id`, `agent_type`) VALUES
(1, 'Ecocash'),
(2, 'Telecash'),
(3, 'Onewallet');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `agent_type_id` int(11) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `agent_type_id`, `approved`) VALUES
(1, 'OK First Street', 'OK Supermarket.\nCorner First Street/Nelson', -17.829309, 31.049355, 'grocery_or_supermarket', 1, 1),
(3, 'Telecel Shop', 'Inside Joina City Shopping Mall', -17.831985, 31.046831, 'shopping_mall', 1, 1),
(11, 'Tuck Shop', 'Tuck Shop Near Corner shops,\nZengeza 5,\nChitungwiza', -18.006605, 31.051188, 'store', 1, 1),
(21, 'Bon Marche Belgravia', 'Bon Marche, \nBelgravia Shopping Centre', -17.794462, 31.043999, 'grocery_or_supermarket', 1, 1),
(31, 'Zimpost Avondale', 'Zimpost Avondale', -17.803871, 31.038109, 'store', 1, 1),
(41, 'Bon Marche Avondale', 'Bon Marche,\nAvondale Shopping Centre', -17.803213, 31.038897, 'grocery_or_supermarket', 1, 1),
(51, 'Ok Marimba', 'OK Marimba,\nBelvedere Shopping Centre', -17.829433, 31.009317, 'grocery_or_supermarket', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
