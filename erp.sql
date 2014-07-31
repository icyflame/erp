-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2014 at 08:59 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp`
--
CREATE DATABASE IF NOT EXISTS `erp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `erp`;

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `alumid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `hall` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `alumSince` int(11) NOT NULL,
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumid`, `name`, `hall`, `dept`, `alumSince`) VALUES
(1, 'John Doe', 'CS', 'Rajendra Prasad Hall', 1965),
(2, 'Atanu Das', 'CS', 'Rajendra Prasad Hall', 1965),
(3, 'B K Tariyal', 'CS', '', 1965),
(4, 'Jyoti Parshad Banerjee', 'CS', '', 1965),
(5, 'K K Saxena', 'CS', 'Rajendra Prasad Hall', 1965),
(6, 'Kiran Sankar Sahu', 'CS', '', 1965),
(7, 'Mithilesh Kumar Sinha', 'CS', 'Azad Hall', 1965),
(8, 'Satish Bansal', 'CS', 'Nehru Hall', 1965),
(9, 'Tapash Kumar Pal', 'CS', 'Rajendra Prasad Hall', 1965),
(10, 'Amitava De', 'CS', 'Lala Lajpat Rai Hall', 1975),
(11, 'Ashok Kumar Ghosh', 'CS', 'Lala Lajpat Rai Hall', 1975),
(12, 'Niladri Nirjhar Biswas', 'CS', '', 1975),
(13, 'Partha Sen', 'ME', 'Rajendra Prasad Hall', 1975),
(14, 'Pramod Kumar Gupta', 'ME', 'Vidya Sagar Hall', 1975),
(15, 'Shyam Sunder Verma', 'ME', 'Vidya Sagar Hall', 1975),
(16, 'Sudip Sen', 'ME', 'Nehru Hall', 1975),
(17, 'Sushim Kumar Dasgupta', 'ME', 'Patel Hall', 1975),
(18, 'Tirthankar Banerjee', 'ME', 'Patel Hall', 1975),
(19, 'Swapan Guha', 'ME', 'Rajendra Prasad Hall', 1975),
(20, 'Vinod Rai Juthani', 'ME', '', 1975),
(21, 'S Anand', 'ME', 'Azad Hall', 1990),
(22, 'Ashis Kumar Roy', 'ME', 'Azad Hall', 1990),
(23, 'Dinesh Shastri', 'ME', 'Patel Hall', 1990),
(24, 'J Ramesh', 'ME', 'Radhakrishnan Hall', 1990),
(25, 'Jayanta Kumar Rudra', 'ME', '', 1990),
(26, 'Peshwa Acharya', 'ME', 'Rajendra Prasad Hall', 1990),
(27, 'Pradeep Kumar Bhalla', 'ME', 'Lala Lajpat Rai Hall', 1990),
(28, 'Rajeev Kumar Saraf', 'CH', 'Nehru Hall', 1990),
(29, 'Rakesh Chandubhai Pandya', 'CH', 'Rajendra Prasad Hall', 1990),
(30, 'Ramakrishna Manne', 'CH', 'Azad Hall', 1990),
(31, 'Ravindra Kumar Sinha', 'CH', 'Vidya Sagar Hall', 1990),
(32, 'Sanjay Prakash Gupta', 'CH', 'Rajendra Prasad Hall', 1990),
(33, 'Sanjay Dutt', 'CH', 'Lala Lajpat Rai Hall', 1990),
(34, 'Sanjiv Kumar Singh', 'CH', 'Rajendra Prasad Hall', 1990),
(35, 'Shambhu Sharan', 'CH', '', 1990),
(36, 'Sibasish Padhi', 'CH', 'Vidya Sagar Hall', 1990),
(37, 'Sujit Bhattacharyya', 'CH', 'Nehru Hall', 1990),
(38, 'Sumit Das', 'CH', 'Lala Lajpat Rai Hall', 1990),
(39, 'Sumit Chakraborty', 'CH', 'Radhakrishnan Hall', 1990),
(40, 'Suresh Adina', 'CH', 'Azad Hall', 1990),
(41, 'Tapash Kumar Gupta', 'CH', 'Patel Hall', 1975),
(42, 'Chiranjit Ghosh', 'CH', 'Patel Hall', 1975),
(43, 'L Ravindra Rao', 'CH', 'Patel Hall', 1975),
(44, 'Samir Biswas', 'CH', '', 1975),
(45, 'Kunal Bhattacharya', 'MF', 'Patel Hall', 1975),
(46, 'Ranjit Kumar Jana', 'MF', 'Patel Hall', 1975),
(47, 'Chandra Sekhar Bandyopadhyay', 'MF', 'Patel Hall', 1975);

-- --------------------------------------------------------

--
-- Table structure for table `alumnifulldata`
--

CREATE TABLE IF NOT EXISTS `alumnifulldata` (
  `alumid` int(11) NOT NULL AUTO_INCREMENT,
  `dateofbirth` date NOT NULL,
  `rollnumber` varchar(50) NOT NULL,
  `company` varchar(80) NOT NULL,
  `designation` varchar(80) NOT NULL,
  `address_office` varchar(150) NOT NULL,
  `address_home` varchar(150) NOT NULL,
  `phone_office` varchar(20) NOT NULL,
  `phone_home` varchar(20) NOT NULL,
  `email_office` varchar(50) NOT NULL,
  `email_personal` varchar(50) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `alumnifulldata`
--

INSERT INTO `alumnifulldata` (`alumid`, `dateofbirth`, `rollnumber`, `company`, `designation`, `address_office`, `address_home`, `phone_office`, `phone_home`, `email_office`, `email_personal`, `remarks`) VALUES
(1, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(2, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(3, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(4, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(5, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(6, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(7, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(8, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(9, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(10, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(11, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(12, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(13, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(14, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(15, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(16, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(17, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(18, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(19, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(20, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(21, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(22, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(23, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(24, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(25, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(26, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(27, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(28, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(29, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(30, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(31, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(32, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(33, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(34, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(35, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(36, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(37, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(38, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(39, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(40, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(41, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(42, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(43, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(44, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(45, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(46, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', ''),
(47, '0000-00-00', 'XXXXX000X', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `calling`
--

CREATE TABLE IF NOT EXISTS `calling` (
  `alumid` int(11) NOT NULL,
  `followup` date NOT NULL DEFAULT '2014-07-20',
  `lastdate` date NOT NULL DEFAULT '2014-07-01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calling`
--

INSERT INTO `calling` (`alumid`, `followup`, `lastdate`) VALUES
(1, '2014-07-20', '2014-07-01'),
(2, '2014-07-20', '2014-07-01'),
(3, '2014-07-20', '2014-07-01'),
(4, '2014-07-20', '2014-07-01'),
(5, '2014-07-20', '2014-07-01'),
(6, '2014-07-20', '2014-07-01'),
(7, '2014-07-20', '2014-07-01'),
(8, '2014-07-20', '2014-07-01'),
(9, '2014-07-20', '2014-07-01'),
(10, '2014-07-20', '2014-07-01'),
(11, '2014-07-20', '2014-07-01'),
(12, '2014-07-20', '2014-07-01'),
(13, '2014-07-20', '2014-07-01'),
(14, '2014-07-20', '2014-07-01'),
(15, '2014-07-20', '2014-07-01'),
(16, '2014-07-20', '2014-07-01'),
(17, '2014-07-20', '2014-07-01'),
(18, '2014-07-20', '2014-07-01'),
(19, '2014-07-20', '2014-07-01'),
(20, '2014-07-20', '2014-07-01'),
(21, '2014-07-20', '2014-07-01'),
(22, '2014-07-20', '2014-07-01'),
(23, '2014-07-20', '2014-07-01'),
(24, '2014-07-20', '2014-07-01'),
(25, '2014-07-20', '2014-07-01'),
(26, '2014-07-20', '2014-07-01'),
(27, '2014-07-20', '2014-07-01'),
(28, '2014-07-20', '2014-07-01'),
(29, '2014-07-20', '2014-07-01'),
(30, '2014-07-20', '2014-07-01'),
(31, '2014-07-20', '2014-07-01'),
(32, '2014-07-20', '2014-07-01'),
(33, '2014-07-20', '2014-07-01'),
(34, '2014-07-20', '2014-07-01'),
(35, '2014-07-20', '2014-07-01'),
(36, '2014-07-20', '2014-07-01'),
(37, '2014-07-20', '2014-07-01'),
(38, '2014-07-20', '2014-07-01'),
(39, '2014-07-20', '2014-07-01'),
(40, '2014-07-20', '2014-07-01'),
(41, '2014-07-20', '2014-07-01'),
(42, '2014-07-20', '2014-07-01'),
(43, '2014-07-20', '2014-07-01'),
(44, '2014-07-20', '2014-07-01'),
(45, '2014-07-20', '2014-07-01'),
(46, '2014-07-20', '2014-07-01'),
(47, '2014-07-20', '2014-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `alumid` int(11) NOT NULL AUTO_INCREMENT,
  `search` int(11) NOT NULL,
  `called` int(11) NOT NULL,
  `register` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `touserid` int(11) NOT NULL,
  PRIMARY KEY (`alumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='stores status about the alumni' AUTO_INCREMENT=49 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`alumid`, `search`, `called`, `register`, `pay`, `touserid`) VALUES
(1, 2, 4, 1, 2, 8),
(2, 1, 2, 1, 2, 10),
(3, 4, 4, 2, 1, 9),
(4, 1, 3, 1, 1, 9),
(5, 1, 4, 1, 1, 6),
(6, 2, 1, 2, 2, 8),
(7, 1, 2, 1, 2, 10),
(8, 4, 2, 2, 2, 6),
(9, 1, 4, 1, 2, 10),
(10, 1, 3, 2, 1, 10),
(11, 4, 3, 1, 2, 10),
(12, 1, 3, 1, 2, 6),
(13, 4, 4, 2, 1, 8),
(14, 4, 3, 1, 2, 6),
(15, 3, 1, 1, 1, 10),
(16, 3, 4, 2, 1, 8),
(17, 3, 4, 2, 1, 9),
(18, 1, 1, 1, 1, 9),
(19, 2, 4, 2, 1, 9),
(20, 3, 1, 1, 2, 10),
(21, 3, 1, 1, 2, 6),
(22, 3, 1, 2, 2, 6),
(23, 2, 2, 1, 1, 7),
(24, 4, 1, 1, 2, 9),
(25, 2, 3, 2, 1, 9),
(26, 1, 3, 2, 1, 6),
(27, 2, 1, 1, 1, 8),
(28, 4, 4, 2, 2, 6),
(29, 4, 1, 2, 1, 7),
(30, 2, 1, 1, 1, 8),
(31, 1, 4, 2, 1, 10),
(32, 2, 4, 2, 1, 6),
(33, 1, 4, 1, 1, 9),
(34, 2, 3, 1, 1, 6),
(35, 3, 1, 2, 1, 8),
(36, 3, 3, 1, 2, 9),
(37, 2, 3, 1, 1, 6),
(38, 2, 3, 1, 2, 9),
(39, 1, 1, 2, 2, 7),
(40, 1, 4, 1, 1, 9),
(41, 2, 1, 1, 1, 8),
(42, 1, 3, 1, 2, 8),
(43, 3, 3, 2, 1, 10),
(44, 2, 3, 2, 2, 6),
(45, 2, 2, 2, 1, 6),
(46, 3, 2, 1, 2, 10),
(47, 3, 3, 1, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privilege` int(11) NOT NULL COMMENT 'can have 4 values',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `password`, `privilege`, `email`) VALUES
(1, 'Admin', 'admin', '33ee7e1eb504b6619c1b445ca1442c21', 3, 'mishra.rahul1712@gmail.com'),
(2, 'Arpit', 'arpit', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'arpit366@gmail.com'),
(3, 'Rahul', 'root', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'namannishesh@gmail.com'),
(4, 'testuser', 'test', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'user@user.com'),
(5, 'GSEC 1', 'gsec', '33ee7e1eb504b6619c1b445ca1442c21', 1, 'kannan.siddharth12@gmail.com'),
(6, 'MEMBER', 'mem6', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'kannan.siddharth12@gmail.com'),
(7, 'MEMBER 7', 'mem7', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'kannan.siddharth12@gmail.com'),
(8, 'MEMBER 8', 'mem8', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'kannan.siddharth12@gmail.com'),
(9, 'MEMBER 9', 'mem9', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'kannan.siddharth12@gmail.com'),
(10, 'MEMBER 10', 'mem10', '33ee7e1eb504b6619c1b445ca1442c21', 2, 'kannan.siddharth12@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints
--

ALTER TABLE `alumnifulldata`
ADD CONSTRAINT `alumnifulldata_ibfk_1` FOREIGN KEY (`alumid`) REFERENCES `alumni` (`alumid`);

ALTER TABLE `calling`
ADD CONSTRAINT `calling_ibfk_1` FOREIGN KEY (`alumid`) REFERENCES `alumni` (`alumid`);

ALTER TABLE `status`
ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`alumid`) REFERENCES `alumni` (`alumid`);

ALTER TABLE `status`
ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`touserid`) REFERENCES `users` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
