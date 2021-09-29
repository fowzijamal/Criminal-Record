-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2019 at 05:05 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE IF NOT EXISTS `court` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`id`, `name`, `description`) VALUES
(15, 'Gobolka banaadir', 'Maxkamada gobolka'),
(16, 'Maxkamada sare', 'Maxkamada sare \r\n'),
(17, 'Maxkamada degmada', 'Tan degmada');

-- --------------------------------------------------------

--
-- Table structure for table `courttype`
--

CREATE TABLE IF NOT EXISTS `courttype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courttype`
--

INSERT INTO `courttype` (`id`, `name`, `description`) VALUES
(2, 'Sare ', 'Mida sare'),
(3, 'Hoose', 'Mida hoose');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE IF NOT EXISTS `crime` (
  `id` int(11) NOT NULL,
  `criminal_ID` int(11) DEFAULT NULL,
  `crimeType` varchar(250) DEFAULT NULL,
  `crimeCategory` varchar(250) DEFAULT NULL,
  `prision` varchar(250) DEFAULT NULL,
  `court` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `place` varchar(250) DEFAULT NULL,
  `description` longtext,
  `police_Id` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `uploads_on` datetime NOT NULL,
  `punishment` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`id`, `criminal_ID`, `crimeType`, `crimeCategory`, `prision`, `court`, `date`, `place`, `description`, `police_Id`, `image`, `uploads_on`, `punishment`) VALUES
(13, 8, 'Tuug', 'Mid abaabulan', 'Gobolka banaadir', 'Maxkamada degmada', '2019-01-28', 'wardhiiglee', 'waxuu ku kacay tuugnimo', 8, 'uploads/crime/51786624_2071417102913394_8382334921091317760_n.jpg', '2019-02-23 11:42:54', ''),
(14, 9, 'Dhac ', 'Mid kali ah ', 'Godka jilacow', 'Maxkamada sare', '2019-02-22', 'hamar bile ', 'waxbuu dhacay', 9, 'uploads/crime/49074755_2295846623819003_8395068184863965184_o.jpg', '2019-02-23 11:44:05', ''),
(15, 10, 'Dil ', 'Mid abaabulan', 'Xabsiga dhexe ', 'Maxkamada sare', '2018-02-20', 'wadajir ', 'dil bareer ah', 10, 'uploads/crime/49899769_1881491621961184_7659292415353683968_n.jpg', '2019-02-23 11:44:56', ''),
(16, 11, 'Musuq maasuq', 'Mid kali ah ', 'Godka jilacow', 'Gobolka banaadir', '2017-05-07', 'yaaqshid', 'wax isdaba marin', 11, 'uploads/crime/41715310_2002379793153645_7625833267203145728_n.jpg', '2019-02-23 11:46:17', ''),
(17, 12, 'Dil ', 'Mid abaabulan', 'Xabsiga gobolka banaadir ', 'Maxkamada sare', '2016-08-27', 'wadajir ', 'dil kama ah', 9, 'uploads/crime/38461282_2021470667923268_4471169476074668032_n.jpg', '2019-02-23 11:47:18', ''),
(18, 13, 'Musuq maasuq', 'Mid abaabulan', 'Xabsiga gobolka banaadir ', 'Maxkamada sare', '2019-01-19', 'xafiiska madaxweynaha', 'xafiiska madaxweynaha', 9, 'uploads/crime/36570768_1714704068626902_7087067810769141760_n.jpg', '2019-02-23 11:52:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `crimecategory`
--

CREATE TABLE IF NOT EXISTS `crimecategory` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimecategory`
--

INSERT INTO `crimecategory` (`id`, `name`, `description`) VALUES
(3, 'Mid abaabulan', 'Si koox koox ah \r\n'),
(4, 'Mid kali ah ', 'Mid shaqsi ah ');

-- --------------------------------------------------------

--
-- Table structure for table `crimetype`
--

CREATE TABLE IF NOT EXISTS `crimetype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimetype`
--

INSERT INTO `crimetype` (`id`, `name`, `description`) VALUES
(3, 'Tuug', 'Tuugnimo ama wax xadid '),
(4, 'Dhac ', 'Dhac si toos ah aad qof u dhacdo'),
(5, 'Dil ', 'Dil aad qof disho '),
(6, 'Musuq maasuq', 'Inaad wax musuq maasuqdo ( sida inaad canshuur lunsato \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE IF NOT EXISTS `criminal` (
  `id` int(11) NOT NULL,
  `fName` varchar(250) NOT NULL,
  `lName` varchar(250) NOT NULL,
  `height` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `eayColor` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `zipCode` varchar(200) DEFAULT NULL,
  `poneNumber` varchar(50) DEFAULT NULL,
  `dateOFbirth` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `uploads_on` datetime NOT NULL,
  `fathersName` varchar(250) NOT NULL,
  `mothersName` varchar(250) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `symbol` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`id`, `fName`, `lName`, `height`, `weight`, `eayColor`, `address`, `city`, `state`, `zipCode`, `poneNumber`, `dateOFbirth`, `email`, `website`, `image`, `uploads_on`, `fathersName`, `mothersName`, `contactno`, `symbol`) VALUES
(8, 'Aamir ', 'Deylaf', '6.9"', '45', 'Red', 'Mogadisho, wardhiigle, somalia', 'Muqdisho', 'Banaadir', '6354', '06155563747', '1998-12-23', 'biike@gmail.com', '', 'uploads/criminal/51786624_2071417102913394_8382334921091317760_n.jpg', '2019-02-23 11:33:02', '', '', '', ''),
(9, 'Abdullahi', 'Noor', '7.9"', '70', 'Green', 'Mogadisho, wardhiigle, somalia', 'Muqdisho', 'Banaadir', '6354', '0615738291', '1995-02-20', 'noor@gmail.com', '', 'uploads/criminal/49074755_2295846623819003_8395068184863965184_o.jpg', '2019-02-23 11:34:55', '', '', '', ''),
(10, 'Ahmed ', 'Siid', '6.7"', '72', 'Gray', 'Wadajir, mogadisho, somalia', 'Muqdisho', 'Banaadir', '6354', '0615728372', '1992-11-12', 'moha@gmail.com', '', 'uploads/criminal/49899769_1881491621961184_7659292415353683968_n.jpg', '2019-02-23 11:36:03', '', '', '', ''),
(11, 'Salman ', 'Kulmie', '7.9"', '99', 'Black', 'Mugadisho, buulhubey, somalia', 'Muqdisho', 'Banaadir', '6354', '0615475847', '1985-09-23', 'salman@gmail.com', '', 'uploads/criminal/41715310_2002379793153645_7625833267203145728_n.jpg', '2019-02-23 11:38:05', '', '', '', ''),
(12, 'Abdirizak', 'Tahliil', '6.7"', '79', 'Black', 'Wadajir, mogadisho, somalia', 'Muqdisho', 'Banaadir', '6354', '0615738473', '1994-12-21', 'geesey@gmail.com', '', 'uploads/criminal/38461282_2021470667923268_4471169476074668032_n.jpg', '2019-02-23 11:39:32', '', '', '', ''),
(13, 'Fowzi ', 'Kaazi', '6.7"', '94', 'Black', 'Wadajir, mogadisho, somalia', 'Muqdisho', 'Banaadir', '6354', '0615843458', '1994-02-04', 'geesey@gmail.com', '', 'uploads/criminal/36570768_1714704068626902_7087067810769141760_n.jpg', '2019-02-23 11:51:39', '', '', '', ''),
(14, 'Helan', ' Alam', '5.6"', '56', 'Black', '121 Agrabad\r\nChittagong', 'Chittagong', 'Chattogram', '4200', '989556324', '2019-03-09', 'mdjnnn@gmail.com', NULL, 'uploads/criminal/badsha.jpg', '2019-03-09 23:57:21', 'Azizul', 'Helena', '0123456', 'bad'),
(15, 'Yaxye', 'Ibrahim', '6.7"', '72', 'Gray', 'Mugadisho, buulhubey, somalia', 'Muqdisho', 'Banaadir', '6354', '0099909090', '2019-04-07', 'salman@gmail.com', NULL, 'uploads/criminal/images.png', '2019-03-11 18:25:57', 'ibrahim', 'muumino', '0615475847', 'black sybot in face');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE IF NOT EXISTS `police` (
  `id` int(11) NOT NULL,
  `fName` varchar(250) DEFAULT NULL,
  `lName` varchar(250) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `eayColor` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `zipCode` varchar(200) DEFAULT NULL,
  `poneNumber` varchar(50) DEFAULT NULL,
  `dateOFbirth` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `uploads_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`id`, `fName`, `lName`, `height`, `weight`, `eayColor`, `address`, `city`, `state`, `zipCode`, `poneNumber`, `dateOFbirth`, `email`, `website`, `image`, `uploads_on`) VALUES
(8, 'Salman ', 'Jamal', '6.9"', '70', 'Black', 'Mogdisho, wadajir, somalia', 'Muqdisho', 'Banaadir', '2345', '06154738492', '1992-02-20', 'salman@hotmail.com', '', 'uploads/police/52364116_836865199989560_5356482009533251584_n.jpg', '2019-02-22 18:32:47'),
(9, 'Abdi karim ', 'Mohamud', '6.7"', '85', 'Black', 'Mugadisho, buulhubey, somalia', 'Muqdisho', 'Banaadir', '6354', '0615637298', '1990-02-25', 'biike@gmail.com', '', 'uploads/police/46518826_1929370223827052_6063125118953979904_n.jpg', '2019-02-23 11:24:25'),
(10, 'Mohamed', 'Jamal', '6.3"', '72', 'Amber eyes', 'Wadajir, mogadisho, somalia', 'Muqdisho', 'Banaadir', '6354', '0615635564', '1994-12-21', 'moha@gmail.com', '', 'uploads/police/39940996_1796757823786769_30984778836606976_n.jpg', '2019-02-23 11:27:45'),
(11, 'Jaabir', 'Jamal', '6.3"', '65', 'Gray', 'Hamarweyne, mogadisho, somalia', 'Muqdisho', 'Banaadir', '6354', '0615738722', '2000-12-23', 'jaabir@gmail.com', '', 'uploads/police/33073608_10156458418294533_1557861045727395840_n.jpg', '2019-02-23 11:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `prision`
--

CREATE TABLE IF NOT EXISTS `prision` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prision`
--

INSERT INTO `prision` (`id`, `name`, `description`) VALUES
(2, 'Gobolka banaadir', 'Maxkamada gobolka banaadir'),
(3, 'Ciidanka qalbka sida', 'Maxkamada ciidanka qalabka sida'),
(4, 'Maxkamada sare', 'Maxkamada sare ee wadanka'),
(5, 'Xabsiga dhexe ', 'Xabsiga dhexe ee asluubta \r\n'),
(6, 'Xabsiga gobolka banaadir ', 'Xabsiga gobolka'),
(7, 'Godka jilacow', 'Godka jilacow ee NISA');

-- --------------------------------------------------------

--
-- Table structure for table `roletype`
--

CREATE TABLE IF NOT EXISTS `roletype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roletype`
--

INSERT INTO `roletype` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'police'),
(4, 'court');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `fName` varchar(250) DEFAULT NULL,
  `lName` varchar(250) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userRoll` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `username`, `email`, `password`, `userRoll`) VALUES
(1, 'Rashedul', '', 'dev', 'shawon.my@gmail.com', '37d1703157da260a648d24613032bc8f', 'admin'),
(6, 'fowzi', 'jamal', 'admin', 'ozil2m@hotmail.com', '5730bb1ef815d9007df14d136e107614', 'admin'),
(7, 'jabir ', 'jamal', 'jaabir', 'uuyare@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(8, 'ali ', 'bile ', 'alibile', 'ali@hotmail.com', '86318e52f5ed4801abe1d13d509443de', 'user'),
(9, 'jaabir', 'jamal', 'barrow1', 'geesey@gmail.com', '5730bb1ef815d9007df14d136e107614', 'user'),
(10, 'abdirizak', 'tahliil', 'jaabir', 'geesey@gmail.com', '5730bb1ef815d9007df14d136e107614', 'police');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courttype`
--
ALTER TABLE `courttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `police_Id` (`police_Id`),
  ADD KEY `criminal_ID` (`criminal_ID`);

--
-- Indexes for table `crimecategory`
--
ALTER TABLE `crimecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimetype`
--
ALTER TABLE `crimetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prision`
--
ALTER TABLE `prision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roletype`
--
ALTER TABLE `roletype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `courttype`
--
ALTER TABLE `courttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `crimecategory`
--
ALTER TABLE `crimecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `crimetype`
--
ALTER TABLE `crimetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `prision`
--
ALTER TABLE `prision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roletype`
--
ALTER TABLE `roletype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_ibfk_1` FOREIGN KEY (`police_Id`) REFERENCES `police` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `crime_ibfk_2` FOREIGN KEY (`criminal_ID`) REFERENCES `criminal` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
