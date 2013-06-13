-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2013 at 02:57 AM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ProductTracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `PriceType`
--

CREATE TABLE IF NOT EXISTS `PriceType` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Keyword` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Keyword` (`Keyword`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `PriceType`
--

INSERT INTO `PriceType` (`ID`, `Keyword`, `Name`) VALUES
(1, 'amazon', 'Amazon'),
(2, 'amazon-new', '3rd Party New'),
(3, 'amazon-used', '3rd Party Used'),
(4, 'ebay', 'Ebay');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Website` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Information` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ProductID` (`ProductCode`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `ID_2` (`ID`),
  UNIQUE KEY `ID_3` (`ID`),
  UNIQUE KEY `ID_4` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Tracking`
--

CREATE TABLE IF NOT EXISTS `Tracking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Saved as timestamp',
  `PriceType` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `FormattedPrice` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` int(50) NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Already encrypted',
  `Email` int(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User_Tracking`
--

CREATE TABLE IF NOT EXISTS `User_Tracking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TrackingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DesirePrice` float NOT NULL,
  `Inform` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Website`
--

CREATE TABLE IF NOT EXISTS `Website` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Keyword` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Keyword` (`Keyword`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Website`
--

INSERT INTO `Website` (`ID`, `Keyword`, `Name`) VALUES
(1, 'amazon', 'Amazon'),
(2, 'ebay', 'Ebay');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
