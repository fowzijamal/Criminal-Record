-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 11:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminal_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`id`, `name`, `description`) VALUES
(15, 'Gobolka banaadir', 'Maxkamada gobolka'),
(16, 'Maxkamada sare', 'Maxkamada sare \r\n'),
(17, 'Maxkamada degmada', 'Tan degmada'),
(18, 'National Army Force', 'Waa maxkamada ciidanka qalabka sida'),
(19, 'Ali Hassan court', 'Maxkamad'),
(20, 'Hassan', 'Hhh'),
(21, 'High Court', 'High Court of Somalia'),
(22, 'State Court', 'State Court of Somalia');

-- --------------------------------------------------------

--
-- Table structure for table `courttype`
--

CREATE TABLE `courttype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `crime` (
  `id` int(11) NOT NULL,
  `caseno` varchar(255) DEFAULT NULL,
  `criminal_ID` int(11) DEFAULT NULL,
  `crimeType` varchar(250) DEFAULT NULL,
  `crimeCategory` varchar(250) DEFAULT NULL,
  `prision` varchar(250) DEFAULT NULL,
  `court` varchar(250) DEFAULT NULL,
  `date` varchar(12) DEFAULT NULL,
  `location` varchar(3) DEFAULT NULL,
  `place` varchar(250) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `police_Id` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `uploads_on` datetime DEFAULT NULL,
  `judge_name` varchar(255) DEFAULT NULL,
  `punishment` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`id`, `caseno`, `criminal_ID`, `crimeType`, `crimeCategory`, `prision`, `court`, `date`, `location`, `place`, `description`, `police_Id`, `image`, `uploads_on`, `judge_name`, `punishment`) VALUES
(50, '12345', 26, 'Violent crime', ' Only one', 'Mogadishu Central Prison', 'National Army Force', '0000-00-00', NULL, 'Ctg, BD', 'N/A', 14, 'uploads/crime/02.jpg', '2020-01-04 15:17:26', 'Abdul Aziz', 'One Year'),
(51, 'CTG-20/01/05--06', 24, 'Killer ', 'Personal killer', 'Mogadishu Central Prison', 'National Army Force', '0000-00-00', NULL, 'Bangladesh', 'Killer man', 15, 'uploads/crime/abshir phot.jpeg', '2020-01-05 19:28:39', 'Abdul Aziz', 'kill sentence'),
(52, 'DHK 20/01/02   07', 25, 'Robbery', ' An organized one', 'CID Prison', 'High Court', '0000-00-00', NULL, 'Ctg, BD', 'he is criminal person', 14, 'uploads/crime/75580547_2760893640804297_2029504834863890432_n.jpg', '2020-01-06 15:37:33', NULL, NULL),
(55, 'DHK-2020/08/25-1', 18, 'Tuug', 'Mid abaabulan', 'Ciidanka qalbka sida', 'Gobolka banaadir', '2020/08/25', 'DHK', 'dhaka', 'hahahahah', 12, 'uploads/crime/20200224_130607.jpg', '2020-08-31 21:21:35', 'fowzi jamal', 'dil toogasho'),
(56, '-2020/09/21-1', 32, 'Tuug', 'Mid abaabulan', 'Ciidanka qalbka sida', 'Gobolka banaadir', '2020/09/21', '', 'wabax', 'yes', 12, 'uploads/crime/20200224_130607.jpg', '2020-09-07 01:43:27', 'fowzi', 'for ever'),
(57, '-2020/09/03-1', 32, 'Tuug', 'Mid kali ah ', 'Maxkamada sare', 'National Army Force', '2020/09/03', '', 'wabax', 'hasha', 13, 'uploads/crime/20200224_130607.jpg', '2020-09-07 01:49:46', NULL, NULL),
(58, '-2020/09/30-1', 32, 'Tuug', 'Mid abaabulan', 'Ciidanka qalbka sida', 'Gobolka banaadir', '2020/09/30', '', 'Garowe,', 'yes', 14, 'uploads/crime/20200224_130607.jpg', '2020-09-07 01:59:48', NULL, NULL),
(59, 'DHK-2020/09/02-1', 32, 'Tuug', 'Mid abaabulan', 'Ciidanka qalbka sida', 'Gobolka banaadir', '2020/09/02', '', 'wabax', 'haa', 12, 'uploads/crime/20200224_130607.jpg', '2020-09-07 02:06:22', NULL, NULL),
(60, 'BUR-2020/09/29-1', 32, 'Tuug', 'Mid abaabulan', 'Ciidanka qalbka sida', 'State Court', '2020/09/29', '', 'wabax', 'la qabtay', 14, 'uploads/crime/20200224_130607.jpg', '2020-09-07 02:14:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crimecategory`
--

CREATE TABLE `crimecategory` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimecategory`
--

INSERT INTO `crimecategory` (`id`, `name`, `description`) VALUES
(3, 'Mid abaabulan', 'Si koox koox ah \r\n'),
(4, 'Mid kali ah ', 'Mid shaqsi ah '),
(5, 'Personal killer', 'Waaaw'),
(6, ' An organized one', 'It is organized Crime Category '),
(7, ' Only one', '\r\nOnly one Crime Category');

-- --------------------------------------------------------

--
-- Table structure for table `crimetype`
--

CREATE TABLE `crimetype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimetype`
--

INSERT INTO `crimetype` (`id`, `name`, `description`) VALUES
(3, 'Tuug', 'Tuugnimo ama wax xadid '),
(4, 'Dhac ', 'Dhac si toos ah aad qof u dhacdo'),
(5, 'Dil ', 'Dil aad qof disho '),
(6, 'Musuq maasuq', 'Inaad wax musuq maasuqdo ( sida inaad canshuur lunsato \r\n'),
(7, 'Killer ', 'Trertrsdfchchghgv'),
(8, 'ROBBERY', 'NEAR GC MORE AREA'),
(9, 'Robbery', 'A robbery is when someone takes something from you with violence or threats â€“ usually (but not always) in the street or another public place.\r\n'),
(10, 'Terrorism', 'Terrorist attacks are sudden and unpredictable and generally calculated to create a climate of fear or terror among the public.A terror attack can lead to an ongoing feeling of insecurity.'),
(11, 'Violent crime', 'A violent crime is when someone physically hurts or threatens to hurt someone, and also includes crimes where a weapon is used.'),
(12, 'Organized Crime', 'Organized crime refers to criminal activity by groups or organizations whose major purpose for existing is to commit such crime.'),
(13, 'Crimes Against Persons', 'Crimes against persons also called personal crimes, include murder, aggravated assault, rape, and robbery.');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
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
  `VNID` varchar(50) DEFAULT NULL,
  `dateOFbirth` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `uploads_on` datetime DEFAULT NULL,
  `fathersName` varchar(250) DEFAULT NULL,
  `mothersName` varchar(250) DEFAULT NULL,
  `VName` varchar(20) DEFAULT NULL,
  `CNID` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`id`, `fName`, `lName`, `height`, `weight`, `eayColor`, `address`, `city`, `state`, `zipCode`, `VNID`, `dateOFbirth`, `email`, `website`, `image`, `uploads_on`, `fathersName`, `mothersName`, `VName`, `CNID`) VALUES
(18, 'ABSHIR', 'Hassan', '', '', '', 'MOGADISHU', 'MOGADISHU', 'MOGADISHU', '252', '1999990009', '2019-10-31', 'ali@gmail.com', NULL, 'uploads/criminal/abshir phot.jpeg', '2019-10-29 23:29:38', 'ahmed', 'fadumo', '01998877661', 'No'),
(20, 'Ayyub', 'Ali', '', '', '', 'Buulhubey somalia', 'Mogadisho', 'Banaadir', '5326', '1999990332', '2019-10-27', 'ali44@gmail.com', NULL, 'uploads/criminal/03.jpg', '2019-10-29 23:39:19', 'abdi', 'qamar', '0188991711', 'No'),
(21, 'Ali', 'Hossain', '', '', '', 'Buulhubey somalia', 'Mogadisho', 'Banaadir', '5326', '1999990078', '2019-10-29', 'ali33@gmail.com', NULL, 'uploads/criminal/image5174347x.jpg', '2019-10-30 01:07:57', 'ahmed', 'fadumo', '01998877676', 'No'),
(24, 'Abshir', 'Farah', '', '', '', 'Xamar jadid, Somalia', 'Mogadishu', 'Somalia', '+252', '1203459687', '1990-11-11', 'abshir@gmail.com', NULL, 'uploads/criminal/abshir phot.jpeg', '2019-11-25 23:45:09', 'Yasin', 'Hibo', '01991344556', 'left hand disable '),
(25, 'Abdirahman ', 'Dhiga', '', '', '', 'Ctg,Bd', 'Chattogram', 'Chittagong', '+88', 'SO777121', '2019-12-01', 'liban1@gmail.com', NULL, 'uploads/criminal/76697413_2760893644137630_6228338028201377792_n.jpg', '2019-12-04 15:27:24', 'Ahmed', 'habibo', '01998187711', 'No'),
(26, 'Abdisalan', 'Hassan', '', '', '', 'Khulshi, Ctg', 'Chittogram', 'Chattogram', '+88', 'SO12131415', '1990-12-01', 'qadaramir1@hotmail.com', NULL, 'uploads/criminal/02.jpg', '2019-12-10 15:22:05', 'Ali', 'maryan', '01920978454', 'No Symbol'),
(28, 'Fowzi', 'Jamal', NULL, NULL, NULL, 'Hahah', 'Dhaka', 'Dhaka', '1204', '888888', '2020-09-27', 'marufpritum123@gmail.com', NULL, 'uploads/criminal/20200224_130607.jpg', '2020-09-01 19:24:07', 'barrow', 'faadumo', 'yasin', '111222'),
(30, 'Jaabir', 'Jamal', NULL, NULL, NULL, 'Hahah', 'Dhaka', 'Dhaka', '1204', '12343', '2020-09-06', 'marufpritum123@gmail.com', NULL, 'uploads/criminal/20200224_130607.jpg', '2020-09-07 01:10:04', 'barrow', 'faadumo', 'yasin', '0989979'),
(31, 'Ismail', 'Jamal', NULL, NULL, NULL, 'Hahah', 'Dhaka', 'Dhaka', '1204', '', '2020-09-15', 'marufpritum123@gmail.com', NULL, 'uploads/criminal/20200224_130607.jpg', '2020-09-07 01:22:26', 'barrow', 'faadumo', 'yasin', '839282'),
(32, 'Salman', 'Jamal', NULL, NULL, NULL, 'Hahah', 'Dhaka', 'Dhaka', '1204', '78688', '2020-09-27', 'marufpritum123@gmail.com', NULL, 'uploads/criminal/20200224_130607.jpg', '2020-09-07 01:25:35', 'barrow', 'faadumo', 'kaazi', '68799');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
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
  `jobid` varchar(50) DEFAULT NULL,
  `polisestation` varchar(255) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `uploads_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`id`, `fName`, `lName`, `height`, `weight`, `eayColor`, `address`, `city`, `state`, `zipCode`, `poneNumber`, `dateOFbirth`, `email`, `website`, `jobid`, `polisestation`, `image`, `uploads_on`) VALUES
(12, 'Tommy', 'Tester', '5 5', '80', 'Blue', 'Adasdasd', 'Chittogram', 'Chattogram', '+88', '1234567890', '2019-12-28', 'tommy@gmail.com', '', '222', 'Ambagan', 'uploads/police/70772041_753138935204712_2386447682659942400_n.jpg', '2019-12-28 17:12:16'),
(13, 'Abdisalan Ali', 'Hassan', '5.10', '60', 'Blue', 'Bahda, Adaado, Galgaduud, Somalia ', 'Mogadishu', 'Galmudug state', '+252', 'SO12131417', '0000-00-00', 'dhamas@gmail.com', 'www.dhamas.com', '121313', 'Khulshi', 'uploads/police/64662978_2305993872820621_2211249902162280448_n.jpg', '2019-12-28 19:40:58'),
(14, 'Omar ', 'Ahmed', '5.11', '65', 'Black', 'CTG, BD', 'Chattogram', 'Ctg', '+880', '1112228', '0000-00-00', 'omar@gmail.com', '##', '11223', 'Dambara', 'uploads/police/images.jpg', '2019-12-28 21:43:07'),
(15, 'Muhyidin', 'Bashir', '5.8', '70', 'Blue', 'Kalkacayo', 'Kalkacayo', 'Galmudug state', '+252', '1788661', '0000-00-00', 'bashir@gmail.com', '###', '11224', 'KM4', 'uploads/police/images (1).jpg', '2019-12-28 21:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `prision`
--

CREATE TABLE `prision` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prision`
--

INSERT INTO `prision` (`id`, `name`, `description`) VALUES
(3, 'Ciidanka qalbka sida', 'Maxkamada ciidanka qalabka sida'),
(4, 'Maxkamada sare', 'Maxkamada sare ee wadanka'),
(7, 'Godka jilacow', 'Godka jilacow ee NISA'),
(8, 'Godka jilacoow', 'Xabsi'),
(9, 'CID Prison', 'Waa xabsi waqti dheer dhisan'),
(10, 'Mogadishu Central Prison', 'Mogadishu Central Prison celebrates the Mandela Prison Rules because it serves as a tool to educate the prison staff how to observe the human rights of the prisoners and respect human dignity.');

-- --------------------------------------------------------

--
-- Table structure for table `roletype`
--

CREATE TABLE `roletype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fName` varchar(250) DEFAULT NULL,
  `lName` varchar(250) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userRoll` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fName`, `lName`, `username`, `email`, `password`, `userRoll`) VALUES
(6, 'fowzi', 'jamal', 'admin', 'ozil2m@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(17, 'fowzi', 'Ali', 'fowzi', 'fawzi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'sub-admin'),
(18, 'Hamza', 'Mustafa', 'Hamza', 'yung@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'police'),
(19, 'jamal ', 'barrow', 'jamal', 'jamal@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'police'),
(20, 'Ahmed ', 'Abdi', 'ahmed', 'ahmed@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(21, 'Liban', 'Ahmed', 'Liban', 'liban@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sub-admin'),
(22, 'Ali', 'ahmed', 'fiqi', 'fiqi@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'court'),
(23, 'Hamza', 'Abdi', 'police', 'hamza@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'police'),
(24, 'Ali', 'Hassan', 'court', 'ali@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'court'),
(25, 'yasin', 'hashi', 'kaazi12', 'marufpritum123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'police');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `courttype`
--
ALTER TABLE `courttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crime`
--
ALTER TABLE `crime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `crimecategory`
--
ALTER TABLE `crimecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crimetype`
--
ALTER TABLE `crimetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `criminal`
--
ALTER TABLE `criminal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `police`
--
ALTER TABLE `police`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prision`
--
ALTER TABLE `prision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roletype`
--
ALTER TABLE `roletype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crime`
--
ALTER TABLE `crime`
  ADD CONSTRAINT `crime_ibfk_1` FOREIGN KEY (`police_Id`) REFERENCES `police` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `crime_ibfk_2` FOREIGN KEY (`criminal_ID`) REFERENCES `criminal` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
