-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2013 at 08:18 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.1
--
-- Database: ProductTracking
--

-- --------------------------------------------------------

--
-- Table structure for table PriceType
--

CREATE TABLE IF NOT EXISTS PriceType (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Keyword varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  Name varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (ID),
  UNIQUE KEY Keyword (Keyword)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table PriceType
--

INSERT INTO PriceType (ID, Keyword, Name) VALUES
(1, 'amazon', 'Amazon'),
(2, 'amazon-new', '3rd Party New'),
(3, 'amazon-used', '3rd Party Used'),
(4, 'ebay', 'Ebay');

-- --------------------------------------------------------

--
-- Table structure for table Product
--

CREATE TABLE IF NOT EXISTS Product (
  ID int(11) NOT NULL AUTO_INCREMENT,
  ProductCode varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  Name varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  Website varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  Information date DEFAULT NULL,
  PRIMARY KEY (ID),
  UNIQUE KEY ProductID (ProductCode),
  UNIQUE KEY ID (ID),
  UNIQUE KEY ID_2 (ID),
  UNIQUE KEY ID_3 (ID),
  UNIQUE KEY ID_4 (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table Product
--

INSERT INTO Product (ID, ProductCode, Name, Website, Information) VALUES
(1, 'B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon', NULL),
(2, 'B008BEYEL8', 'Apple%2013-inch%20MacBook%20Pro%20(Intel%20Dual%20Core%20i5%202.5GHz,%204GB%20RAM,%20500GB%20HDD,%20', 'amazon', NULL),
(3, 'B008BEYQ2A', 'Apple%2013-inch%20MacBook%20Pro%20(Intel%20Dual%20Core%20i7%202.9GHz,%208GB%20RAM,%20750GB%20HDD,%20', 'amazon', NULL),
(4, 'B0026RQ75W', 'One%20Step%2010miu%20Ultra%20Early%20Pregnancy%20Strip%20Tests%20-%20Pack%20of%2015%20Strips', 'amazon', NULL),
(6, 'B000JQV3QA', 'Alice%27s%20Adventures%20in%20Wonderland', 'amazon', NULL),
(7, 'B004LNSFMM', 'Alice%20%20[Blu-ray]%20[1988]', 'amazon', NULL),
(8, 'B00505QA5Y', 'Conan%20the%20Barbarian%20[DVD]', 'amazon', NULL),
(9, 'B004UPZRTA', 'Conan%20The%20Barbarian%20[Blu-ray]%20[1982]', 'amazon', NULL),
(20, 'B00004Y3Q8', 'Conan the Destroyer [DVD] [1984]', 'amazon', NULL),
(21, 'B004JRQ0ZE', 'Alice [DVD]', 'amazon', NULL),
(22, 'B004U4UHTQ', 'Nikon D5100 Digital SLR Camera with 18-55mm VR Lens Kit (16.2MP) 3 inch LCD', 'amazon', NULL),
(23, '390608342630', 'MARTINON & BERLIOZ test pressing in GERMANY 1973', 'ebay', NULL);

-- --------------------------------------------------------

--
-- Table structure for table Tracking
--

CREATE TABLE IF NOT EXISTS Tracking (
  ID int(11) NOT NULL AUTO_INCREMENT,
  ProductID varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  Time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Saved as timestamp',
  PriceType varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  Price float NOT NULL,
  FormattedPrice varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table Tracking
--

INSERT INTO Tracking (ID, ProductID, Time, PriceType, Price, FormattedPrice) VALUES
(6, 'B00004Y3Q8', '2013-06-14 01:34:03', 'amazon', 6.74, 'Â£6.74'),
(7, 'B00004Y3Q8', '2013-06-14 01:34:03', 'amazon-new', 4.02, 'Â£4.02'),
(8, 'B00004Y3Q8', '2013-06-14 01:34:03', 'amazon-used', 4.02, 'Â£4.02'),
(10, 'B00004Y3Q8', '2013-06-15 01:34:03', 'amazon', 10.74, 'Â£10.74'),
(11, 'B00004Y3Q8', '2013-06-16 01:34:03', 'amazon', 10.01, 'Â£10.01'),
(12, 'B00004Y3Q8', '2013-06-16 10:34:03', 'amazon', 8.01, 'Â£8.01'),
(14, 'B00004Y3Q8', '2013-06-15 01:34:03', 'amazon-new', 6.02, 'Â£6.02'),
(16, 'B004JRQ0ZE', '2013-06-15 01:02:58', 'amazon', 6.01, 'Â£6.01'),
(17, 'B004JRQ0ZE', '2013-06-15 01:02:58', 'amazon-new', 6.06, 'Â£6.06'),
(18, 'B004JRQ0ZE', '2013-06-15 01:02:58', 'amazon-used', 6.06, 'Â£6.06'),
(19, 'B004U4UHTQ', '2013-06-15 02:33:28', 'amazon', 399.99, 'Â£399.99'),
(20, 'B004U4UHTQ', '2013-06-15 02:33:28', 'amazon-new', 385, 'Â£385.00'),
(21, 'B004U4UHTQ', '2013-06-15 02:33:28', 'amazon-used', 385, 'Â£385.00'),
(54, '390608342630', '2013-06-15 17:49:52', 'ebay', 14, '14.0USD'),
(53, 'B004JRQ0ZE', '2013-06-15 03:08:52', 'amazon-used', 5.16, 'Â£5.16'),
(52, 'B004JRQ0ZE', '2013-06-15 03:08:52', 'amazon-new', 5.16, 'Â£5.16'),
(51, 'B00004Y3Q8', '2013-06-15 03:08:51', 'amazon-new', 3.96, 'Â£3.96'),
(50, 'B00004Y3Q8', '2013-06-15 03:08:51', 'amazon', 6.74, 'Â£6.74'),
(49, 'B00004Y3Q8', '2013-06-15 03:08:51', 'amazon-used', 3.96, 'Â£3.96');

-- --------------------------------------------------------

--
-- Table structure for table User
--

CREATE TABLE IF NOT EXISTS User (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Username int(50) NOT NULL,
  Password varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Already encrypted',
  Email int(50) NOT NULL,
  PRIMARY KEY (ID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table User_Tracking
--

CREATE TABLE IF NOT EXISTS User_Tracking (
  ID int(11) NOT NULL AUTO_INCREMENT,
  TrackingID int(11) NOT NULL,
  UserID int(11) NOT NULL,
  DesirePrice float NOT NULL,
  Inform bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (ID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table Website
--

CREATE TABLE IF NOT EXISTS Website (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Keyword varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  Name varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (ID),
  UNIQUE KEY Keyword (Keyword)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table Website
--

INSERT INTO Website (ID, Keyword, Name) VALUES
(1, 'amazon', 'Amazon'),
(2, 'ebay', 'Ebay');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
