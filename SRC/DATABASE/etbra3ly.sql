-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 01:10 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etbra3ly`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendcamp`
--

CREATE TABLE `attendcamp` (
  `attendcampID` int(20) NOT NULL,
  `campID` int(11) NOT NULL,
  `donorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendcamp`
--

INSERT INTO `attendcamp` (`attendcampID`, `campID`, `donorID`) VALUES
(2, 12, 27);

-- --------------------------------------------------------

--
-- Table structure for table `bloodbag`
--

CREATE TABLE `bloodbag` (
  `bloodBagID` int(200) NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `collectionDate` varchar(20) NOT NULL,
  `expiryDate` varchar(20) NOT NULL,
  `outDate` varchar(20) DEFAULT NULL,
  `organizationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbag`
--

INSERT INTO `bloodbag` (`bloodBagID`, `bloodGroup`, `amount`, `collectionDate`, `expiryDate`, `outDate`, `organizationID`) VALUES
(42, 'A+', 'Small', '01-06-2018', '24-06-2018', NULL, 4),
(43, 'A+', 'Small', '01-06-2018', '30-06-2018', ' 27-06-2018 ', 3),
(44, 'A+', 'Large', '01-06-2018', '30-06-2018', NULL, 1),
(45, 'A+', 'Medium', '27-06-2018', '23-08-2018', NULL, 3),
(46, 'A+', 'Small', '', '28-06-2018', ' 29-06-2018 ', 3),
(47, 'A+', 'Large', '', '30-06-2018', NULL, 3),
(48, 'A-', 'Small', '', '30-07-2018', '28-06-2018', 3),
(49, 'A+', 'Large', '', '29-06-2018', ' 29-06-2018 ', 3),
(50, 'A+', 'Small', '01-06-2018', '29-06-2018', NULL, 3),
(51, 'A+', 'Small', '', '02-07-2018', NULL, 4),
(52, 'A+', 'Small', '', '02-07-2018', NULL, 4),
(53, 'A+', 'Large', '01-07-2018', '31-07-2018', NULL, 1),
(54, 'A+', 'Large', '01-07-2018', '27-07-2018', NULL, 1),
(55, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(56, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(57, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(58, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(59, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(60, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(61, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(62, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(63, 'A+', 'Medium', '01-07-2018', '31-07-2018', NULL, 1),
(64, 'A+', 'Large', '01-07-2018', '31-07-2018', NULL, 1),
(65, 'A+', 'Large', '01-07-2018', '31-07-2018', NULL, 1),
(66, 'A+', 'Small', '01-07-2018', '31-07-2018', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest` (
  `bloodrequestID` int(200) NOT NULL,
  `neededOrganizationID` int(20) NOT NULL,
  `donatedOrganizationID` int(20) NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `numberOfBags` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`bloodrequestID`, `neededOrganizationID`, `donatedOrganizationID`, `bloodGroup`, `amount`, `numberOfBags`, `date`, `view`) VALUES
(4, 1, 4, 'A+', 'Small', 1, '25-06-2018', 1),
(5, 3, 4, 'A+', 'Small', 1, '27-06-2018', 0),
(6, 3, 4, 'A+', 'Small', 1, '29-06-2018', 0),
(7, 3, 1, 'A+', 'Small', 1, '30-06-2018', 0),
(8, 3, 4, 'A+', 'Small', 3, '01-07-2018', 0);

-- --------------------------------------------------------

--
-- Table structure for table `camp`
--

CREATE TABLE `camp` (
  `campID` int(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `moreDetails` text NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `hospitalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camp`
--

INSERT INTO `camp` (`campID`, `name`, `address`, `district`, `city`, `date`, `time`, `moreDetails`, `visible`, `hospitalID`) VALUES
(3, 'OM El Misreen', '', '', 'Alabama', '-06-2018', '12:00 AM', '', 0, 3),
(4, 'Abraam', '', '', '', '-04-2018', '12:15 AM', '', 0, 3),
(5, 'messi  messi  messi  messi  ', 'messi  messi  messi  ', 'messi  ', 'Alabama', '-06-2018', '11:15 AM', '', 0, 3),
(8, 'camp name', 'camp address', 'Omranya', 'Gizeh', '01-06-2018', '02:00 AM', 'Morils More Details More Details ', 1, 3),
(9, 'camp name', 'camp address', 'Omranya', 'Gizeh', '01-06-2018', '02:00 AM', 'More Details More Details More Details More Details MoMore Details More Details ', 0, 3),
(10, 'camp name', 'camp address', 'Omranya', 'Gizeh', '01-06-2018', '02:00 AM', 'More Details More Details More Details More Details More DetaiMore Details More Details ', 1, 3),
(11, 'camp name', 'camp address', 'Omranya', 'Gizeh', '01-06-2018', '02:00 AM', 'More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details More Details ', 0, 3),
(12, 'camp name', 'camp address', 'messimessi', 'Gizeh', '30-04-2018', '02:30 AM', '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(200) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `donorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `comment`, `date`, `visible`, `donorID`) VALUES
(1, 'messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi ', '26-06-2018', 1, 4),
(2, 'messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi ', '26-06-2018', 1, 4),
(3, 'messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi ', '26-06-2018', 0, 4),
(4, 'messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi ', '02-07-2018', 0, 27);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donorID` int(10) NOT NULL,
  `SSN` int(20) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `middleName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `dateOfBirth` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phoneNo` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `photo` varchar(500) NOT NULL DEFAULT 'default_profile.jpg',
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `lastDonationDate` varchar(20) DEFAULT NULL,
  `bloodBankID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donorID`, `SSN`, `firstName`, `middleName`, `lastName`, `dateOfBirth`, `gender`, `district`, `city`, `phoneNo`, `email`, `bloodGroup`, `photo`, `username`, `password`, `lastDonationDate`, `bloodBankID`) VALUES
(4, 123, 'Abraam', 'Emad', 'Reda', '27-11-1996', 'Male', 'district', 'Gizeh', 1278055444, 'email', 'A+', 'default_profile.jpg', 'a', 'a', '01-01-2018', NULL),
(8, 123, 'Abraam', 'Emad', 'Reda', '--', 'Male', 'messimessi', 'Alabama', 127, 'email@dfvd.comm', 'A+', 'default_profile.jpg', NULL, NULL, NULL, NULL),
(9, 123, 'Abraam', 'Emad', 'Reda', '--', 'Male', 'Omranya', 'Alabama', 127, 'email@dfvd.comm', 'AB+', 'default_profile.jpg', NULL, NULL, NULL, NULL),
(10, 123, 'Abraam', 'Emad', 'Reda', '--', 'Male', 'messimessi', 'Gizeh', 127, 'email@dfvd.comm', 'A+', 'default_profile.jpg', NULL, NULL, NULL, 1),
(12, 123, 'Abraam', 'Emad', 'Reda', '07-05-2018', 'Male', 'messimessi', 'Alabama', 0, 'email@dfvd.comm', 'A+', 'default_profile.jpg', NULL, NULL, NULL, 1),
(16, 123, 'Abraam', 'Emad', 'Reda', '27-11-1996', 'Male', 'Omranya', 'Beni Suef', 127, 'email@dfvd.comm', 'A+', 'default_profile.jpg', 'h', 'h', NULL, NULL),
(17, 123, 'Abraam', 'Emad', 'Reda', '29-06-2018', 'Male', 'Omranya', 'Asyut', 127, 'email@dfvd.comm', 'A+', 'default_profile.jpg', 'h', 'h', NULL, NULL),
(18, 0, '$this->firstNam', '$this->middleNa', '$this->lastName', '$this->dateOfBirth', '$this->gen', '$this->district', '$this->city', 0, '$this->email', '$this->blo', 'default_profile.jpg', '$this->username', '$this->password', NULL, NULL),
(19, 123, 'Abraam', 'Emad', 'Reda', '29-06-2018', 'Male', 'messimessi', 'Luxor', 127, 'email@dfvd.comm', 'A+', '1530029486', 'h', 'h', NULL, NULL),
(20, 2147483647, 'Abraam', 'Emad', 'Reda', '27-11-1996', 'Male', 'Omranya', 'Alabama', 0, 'abraamaj27@gmail.com', 'A+', 'default_profile.jpg', NULL, NULL, NULL, 1),
(21, 2147483647, 'Abraam', 'Emad', 'Reda', '12-07-2018', 'Male', 'Omranya', 'Gizeh', 127, 'email@dfvd.comm', 'A+', '1530482823', 'aa', 'aa', NULL, NULL),
(22, 2147483647, 'Abraam', 'Emad', 'Reda', '15-06-2018', 'Male', 'messimessi', 'Cairo', 127, 'abraamaj27@gmail.com', 'A+', 'default_profile.jpg', 'aa', 'a', NULL, NULL),
(23, 123, 'Abraam', 'peter', 'Reda', '12-07-2018', 'Male', 'Omranya', 'Cairo', 127, 'email@dfvd.comm', 'A+', 'default_profile.jpg', 'aaaaaa', 'aaaaaaaaa', NULL, NULL),
(24, 123, 'Abraam', 'Emad', 'Reda', '27-11-1996', 'Male', 'Omranya', 'Gizeh', 127, 'email@dfvd.comm', 'A+', 'default_profile.jpg', 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', NULL, NULL),
(25, 2147483647, 'peter', 'Emad', 'Reda', '14-06-2018', 'Male', 'Omranya', 'Gizeh', 127, 'abraamaj27@gmail.com', 'B+', 'default_profile.jpg', 'apppppppppppppp', 'appppppppppppppp', NULL, NULL),
(26, 182640, 'Abraam', 'peter', 'Reda', '27-11-1996', 'Male', 'a', 'Aswan', 127, 'email@dfvd.comm', 'A-', 'default_profile.jpg', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaa', NULL, NULL),
(27, 182640, 'Abraam', 'peter', 'Reda', '29-06-2018', 'Male', 'messimessi', 'Gizeh ', 127, 'email@dfvd.comm', 'O-', '1530484753', 'ahhhhhhhhhhhhhh', 'ahhhhhhhhhhhhhhhhhhh', NULL, NULL),
(28, 182640, 'Abraam', 'Emad', 'Reda', '15-06-2018', 'Male', 'Omranya', 'Tanta', 127, 'email@dfvd.comm', 'AB-', 'default_profile.jpg', 'Admin', 'Admin,blkkjvjvj', NULL, NULL),
(29, 123, 'peter', 'peter', 'Reda', '14-06-2018', 'Male', 'Omranya', 'Damanhur', 127, 'email@dfvd.comm', 'B-', '1530504895', 'Adminlkvkjeqkbk', 'Admin,sbckjsdbvksdbvjksda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `moreDetails` text NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `foundationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `title`, `content`, `date`, `time`, `address`, `district`, `city`, `moreDetails`, `view`, `foundationID`) VALUES
(1, 'messi', 'messi messi messi', '02-07-2018', '5:30 PM', 'messi', 'messimessi', 'Alaska', 'messimessimessi', 1, 2),
(2, 'messi', 'messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi ', '10-05-2018', '2:15 AM', 'messi', 'messimessi', 'Alabama', 'messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi ', 0, 2),
(3, 'messi', 'messi messi messi messi messiv v messi messi messi', '15-05-2018', '9:15 AM', 'messi  messi  messi  ', 'messimessi', 'Alaska', 'messi messi messi messi messi messi messi messi messi messi messi messi', 0, 2),
(4, 'event event event event event event v', 'event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event event ', '02-07-2018', '1:15 AM', 'messi', 'messimessi', 'Alabama', 'event event event event event event event event event event event event event event event event event event event event event event event event event event event ', 1, 2),
(5, 'title ', 'title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title v', '23-06-2018', '11:00 AM', 'title title title title ', 'title title ', 'Cairo', 'title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title title ', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryID` int(11) NOT NULL,
  `campID` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`galleryID`, `campID`, `image`) VALUES
(1, 8, 'default_profile.jpg'),
(2, 10, 'default_profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageID`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Om el misr', 'email@dfvd.comm', 'a', ''),
(2, 'OM El Misreen', 'abraamaj27@gmail.com', 'a', ''),
(3, 'Om El Misreen', 'abraam@gmail.com', 'a', ''),
(4, 'Abraam', 'email@dfvd.comm', 'a', 'messi messi messi messi messi messi messi messi messi messi s'),
(5, 'Abraam', 'email@dfvd.comm', 'a', '');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organizationID` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone1` int(20) NOT NULL,
  `phone2` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organizationID`, `name`, `address`, `district`, `city`, `phone1`, `phone2`, `email`, `username`, `password`, `logo`, `type`) VALUES
(1, 'Om El Misreen', 'messi messi.jpgmessi.jpg messi.jpg messi.jpg messi.jpg messi.jpg', 'Omranya', 'Gizeh ', 1200000000, 1278055444, 'abraam@gmail.com', 'b', 'b', '153040858724852249_1244141385720708_698577115718296928_n.jpg', 'Blood Bank'),
(2, 'Foundation', 'Foundation Foundation Foundation', 'Foundation', 'Giza', 0, 0, 'email@dfvd.comm', 'f', 'f', 'default_profile.jpg', 'Foundation'),
(3, 'Om el misr', 'messi  messi  messi  ', 'Omranya', 'Gizeh', 1200000000, 2111111111, 'abraamaj27@gmail.com', 'h', 'h', '153047030823435727_1774435279264175_1436096405_n.jpg', 'Hospital'),
(4, 'hospital 1', 'hospital 1', 'hospital 1', 'Gizeh ', 1200000000, 456, 'abraam@gmail.com', 'hospital1', 'hospital1', '', 'Blood Bank'),
(5, 'OM El Misreen', 'title title title title ', 'Omranya', 'Cairo', 123, 0, 'email@dfvd.comm', 'l', 'l', '1530500118', 'Hospital'),
(6, 'blood bank', 'bank', 'Omranya', 'Alexandria', 123, 2111111111, 'abraamaj27@gmail.com', 'aaa', 'aaa', '1530509927', 'Blood Bank');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `processID` int(20) NOT NULL,
  `donorID` int(20) NOT NULL,
  `organizationID` int(20) NOT NULL,
  `donatedBloodBagID` int(20) NOT NULL,
  `neededBloodBagID` int(20) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `processType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`processID`, `donorID`, `organizationID`, `donatedBloodBagID`, `neededBloodBagID`, `date`, `processType`) VALUES
(1, 4, 1, 42, NULL, '27-06-1997', 'Donation'),
(2, 4, 1, 53, NULL, '01-07-2018', 'Donation'),
(11, 4, 1, 60, 50, '01-07-2018', 'Exchange'),
(14, 27, 1, 66, NULL, '01-07-2018', 'Donation');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `deadline` varchar(50) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `foundationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `title`, `details`, `deadline`, `view`, `foundationID`) VALUES
(1, 'messi', 'messi messi', '10-05-2018', 1, 2),
(2, 'messi', 'messi', '10-05-2018', 0, 2),
(3, 'messi1', 'messi1messi1messi1messi1messi1messi1messi1messi1 messi1  messi1messi1 messi1messi1 messi1', '10-05-2018', 0, 2),
(4, 'messi', 'messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi messi ', '10-05-2018', 0, 2),
(5, 'Report Report Report Report Report Report Report Report Report Report Report Report Report Report Re', 'Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report Report ', '23-06-2018', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(11) NOT NULL,
  `donorID` int(20) NOT NULL,
  `organizationID` int(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `neededBloodGroup` varchar(10) DEFAULT NULL,
  `numberOfBags` int(10) DEFAULT NULL,
  `amount` varchar(10) DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `requestType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `donorID`, `organizationID`, `date`, `neededBloodGroup`, `numberOfBags`, `amount`, `view`, `requestType`) VALUES
(2, 4, 1, '29-06-2018', NULL, NULL, NULL, 1, 'Donation'),
(6, 4, 3, '30-06-2018', NULL, NULL, NULL, 1, 'Donation'),
(7, 4, 1, '30-06-2018', 'A+', 3, 'Small', 1, 'Exchange'),
(8, 4, 1, '01-07-2018', 'A+', 2, 'Large', 1, 'Exchange'),
(9, 27, 1, '--', '', NULL, 'Medium', 0, 'Exchange'),
(10, 27, 3, '12-07-2018', NULL, NULL, NULL, 1, 'Donation');

-- --------------------------------------------------------

--
-- Table structure for table `requestforblood`
--

CREATE TABLE `requestforblood` (
  `requestforbloodID` int(200) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contactNO` int(20) NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `needBloodDate` varchar(20) NOT NULL,
  `needBloodAddress` varchar(100) NOT NULL,
  `needBloodDisrict` varchar(20) NOT NULL,
  `needBloodCity` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestforblood`
--

INSERT INTO `requestforblood` (`requestforbloodID`, `name`, `contactNO`, `bloodGroup`, `amount`, `needBloodDate`, `needBloodAddress`, `needBloodDisrict`, `needBloodCity`, `message`, `visible`) VALUES
(2, 'Abraam', 1278055444, 'A+', 'Small', '07-05-2018', 'el shazly', 'Omranya', 'Gizeh', ' abraam abraam abraam abraam abraam abraam abraam abraam ab', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendcamp`
--
ALTER TABLE `attendcamp`
  ADD PRIMARY KEY (`attendcampID`),
  ADD KEY `donorID` (`donorID`),
  ADD KEY `campID` (`campID`);

--
-- Indexes for table `bloodbag`
--
ALTER TABLE `bloodbag`
  ADD PRIMARY KEY (`bloodBagID`),
  ADD KEY `organizationID` (`organizationID`);

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`bloodrequestID`),
  ADD KEY `donatedOrganizationID` (`donatedOrganizationID`),
  ADD KEY `neededOrganizationID` (`neededOrganizationID`);

--
-- Indexes for table `camp`
--
ALTER TABLE `camp`
  ADD PRIMARY KEY (`campID`),
  ADD KEY `hospitalID` (`hospitalID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `accountID` (`donorID`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donorID`),
  ADD KEY `bloodBankID` (`bloodBankID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `foundationID` (`foundationID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryID`),
  ADD KEY `campID` (`campID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organizationID`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`processID`),
  ADD KEY `donatedBloodBagID` (`donatedBloodBagID`),
  ADD KEY `donorID` (`donorID`),
  ADD KEY `neededBloodBagID` (`neededBloodBagID`),
  ADD KEY `organizationID` (`organizationID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `foundationID` (`foundationID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `donorID` (`donorID`),
  ADD KEY `organizationID` (`organizationID`);

--
-- Indexes for table `requestforblood`
--
ALTER TABLE `requestforblood`
  ADD PRIMARY KEY (`requestforbloodID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendcamp`
--
ALTER TABLE `attendcamp`
  MODIFY `attendcampID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bloodbag`
--
ALTER TABLE `bloodbag`
  MODIFY `bloodBagID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `bloodrequestID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `camp`
--
ALTER TABLE `camp`
  MODIFY `campID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donorID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organizationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `processID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `requestforblood`
--
ALTER TABLE `requestforblood`
  MODIFY `requestforbloodID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendcamp`
--
ALTER TABLE `attendcamp`
  ADD CONSTRAINT `attendcamp_ibfk_1` FOREIGN KEY (`donorID`) REFERENCES `donor` (`donorID`),
  ADD CONSTRAINT `attendcamp_ibfk_2` FOREIGN KEY (`campID`) REFERENCES `camp` (`campID`);

--
-- Constraints for table `bloodbag`
--
ALTER TABLE `bloodbag`
  ADD CONSTRAINT `bloodbag_ibfk_1` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`);

--
-- Constraints for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD CONSTRAINT `bloodrequest_ibfk_1` FOREIGN KEY (`donatedOrganizationID`) REFERENCES `organization` (`organizationID`),
  ADD CONSTRAINT `bloodrequest_ibfk_2` FOREIGN KEY (`neededOrganizationID`) REFERENCES `organization` (`organizationID`);

--
-- Constraints for table `camp`
--
ALTER TABLE `camp`
  ADD CONSTRAINT `camp_ibfk_1` FOREIGN KEY (`hospitalID`) REFERENCES `organization` (`organizationID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`donorID`) REFERENCES `donor` (`donorID`);

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`bloodBankID`) REFERENCES `organization` (`organizationID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`foundationID`) REFERENCES `organization` (`organizationID`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`campID`) REFERENCES `camp` (`campID`);

--
-- Constraints for table `process`
--
ALTER TABLE `process`
  ADD CONSTRAINT `process_ibfk_1` FOREIGN KEY (`donatedBloodBagID`) REFERENCES `bloodbag` (`bloodBagID`),
  ADD CONSTRAINT `process_ibfk_2` FOREIGN KEY (`donorID`) REFERENCES `donor` (`donorID`),
  ADD CONSTRAINT `process_ibfk_3` FOREIGN KEY (`neededBloodBagID`) REFERENCES `bloodbag` (`bloodBagID`),
  ADD CONSTRAINT `process_ibfk_4` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`foundationID`) REFERENCES `organization` (`organizationID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`donorID`) REFERENCES `donor` (`donorID`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`organizationID`) REFERENCES `organization` (`organizationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
