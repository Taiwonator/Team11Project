-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2021 at 08:49 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `Branch`
--

CREATE TABLE `Branch` (
  `BranchID` int NOT NULL,
  `BranchName` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Telephone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Branch`
--

INSERT INTO `Branch` (`BranchID`, `BranchName`, `City`, `Country`, `Telephone`) VALUES
(121, 'Techtro', 'London', 'England', '07589452789'),
(122, 'Istro', 'France', 'Paris', '07896423587');

-- --------------------------------------------------------

--
-- Table structure for table `Call`
--

CREATE TABLE `Call` (
  `CallID` int NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `CallNotes` varchar(510) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ReasonForCall` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Ext` int DEFAULT NULL,
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Call`
--

INSERT INTO `Call` (`CallID`, `Time`, `Date`, `CallNotes`, `ReasonForCall`, `Name`, `Ext`, `ID`) VALUES
(1, '00:39:04', '2021-01-06', 'No Notes', 'The caller needed to fix their laptop', 'Jennifer Iki', 1, 2),
(28, '13:06:10', '2021-02-18', NULL, 'testing email', 'Bradley Maxwell', 2, 3),
(31, '18:22:00', '2021-01-10', NULL, 'asdasd', 'Jason Marlow', 0, 2),
(32, '18:27:00', '2021-01-10', NULL, 'Dummy reason for call', 'Jason Marlow', 0, 2),
(33, '17:58:00', '2021-02-11', NULL, 'Random reason for a call', 'Jason Marlow', 0, 2),
(34, '20:56:00', '2021-02-13', NULL, 'Employee needs help', 'Jason Marlow', 0, 2),
(35, '12:10:00', '2021-02-17', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eleifend odio ac nunc condimentum ornare. ', 'Jason Marlow', 0, 2),
(36, '12:10:00', '2021-02-17', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eleifend odio ac nunc condimentum ornare. ', 'Jason Marlow', 0, 2),
(41, '18:35:00', '2021-02-17', NULL, 'dfs', 'Jason Marlow', 0, 2),
(42, '20:23:00', '2021-02-17', NULL, 'asf', 'Jennifer Iki', 1, 2),
(43, '09:57:00', '2021-02-19', NULL, 'Reason for Calling', 'Jason Marlow', 0, 2),
(44, '10:03:00', '2021-03-06', NULL, 'asdfasdf', 'Bradley Maxwell', 2, 2),
(45, '14:28:00', '2021-02-11', NULL, 'This problem better show for jennifer', 'Michael \'Chad\' Taiwo', 4589, 2),
(46, '15:16:00', '2021-02-18', NULL, 'dssdgsdg', 'Jennifer Iki', 1, 2),
(47, '12:12:00', '1212-12-12', NULL, '1212', 'Jennifer Iki', 1, 8),
(48, '10:43:00', '2021-02-22', NULL, 'asfasd', 'Michael \'Chad\' Taiwo', 4589, 8),
(49, '10:46:00', '2021-02-22', NULL, 'Problem to reassign', 'Susan Boyle', 256, 8),
(50, '11:11:00', '1111-11-11', NULL, '111111', 'Jason Marlow', 0, 8),
(51, '15:10:00', '2021-02-23', NULL, 'Reason for calling is...', NULL, NULL, 8),
(52, '15:41:00', '2021-02-23', NULL, 'Lorem Ipusm', 'Michael \'Chad\' Taiwo', 4589, 8),
(53, '15:46:00', '2021-02-23', NULL, 'bored', 'Bradley Maxwell', 2, 9),
(54, '15:56:00', '2021-02-23', NULL, 'bfvbfgdfgh', 'Bradley Maxwell', 2, 9),
(55, '11:11:00', '2021-02-22', NULL, 'broken monitor', 'Jennifer Iki', 1, 8),
(56, '10:34:00', '2021-02-24', NULL, 'Microsoft word is not working', 'Jennifer Iki', 1, 9),
(57, '10:34:00', '2021-02-24', NULL, 'Microsoft word is not working', 'Jennifer Iki', 1, 9),
(58, '10:34:00', '2021-02-24', NULL, 'Microsoft word is not working', 'Jennifer Iki', 1, 9),
(59, '10:34:00', '2021-02-24', NULL, 'Microsoft word is not working', 'Jennifer Iki', 1, 9),
(60, '10:49:00', '2021-02-24', NULL, ' The caller has some issues which are preventing them from continuing work.', 'Jennifer Iki', 1, 8),
(61, '11:34:00', '2021-02-24', NULL, 'The caller has some issues which are preventing them from continuing work.', 'Jennifer Iki', 1, 8),
(62, '11:01:00', '2021-02-24', NULL, 'aaaaa', 'Jennifer Iki', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `CallProblem`
--

CREATE TABLE `CallProblem` (
  `CallID` int NOT NULL,
  `ProblemNumber` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `CallProblem`
--

INSERT INTO `CallProblem` (`CallID`, `ProblemNumber`) VALUES
(31, 1),
(31, 18),
(32, 1),
(32, 18),
(32, 19),
(32, 20),
(33, 21),
(34, 25),
(34, 26),
(35, 1),
(36, 27),
(41, 29),
(42, 30),
(28, 31),
(43, 19),
(43, 32),
(43, 33),
(44, 34),
(44, 35),
(45, 36),
(46, 37),
(47, 38),
(48, 39),
(49, 40),
(50, 41),
(51, 1),
(51, 42),
(52, 1),
(52, 43),
(52, 44),
(53, 45),
(54, 46),
(55, 47),
(56, 48),
(57, 49),
(58, 50),
(59, 51),
(60, 1),
(60, 52),
(60, 53),
(61, 1),
(61, 54),
(61, 55),
(62, 56);

-- --------------------------------------------------------

--
-- Table structure for table `Equipment`
--

CREATE TABLE `Equipment` (
  `SerialNumber` int NOT NULL,
  `Type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Make` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Equipment`
--

INSERT INTO `Equipment` (`SerialNumber`, `Type`, `Make`) VALUES
(2, 'Latop', 'Intel'),
(3, 'Keyboard', 'Logitech'),
(4, 'Dryer', 'Nikon'),
(5, 'Type', 'Make'),
(1925, 'Fridge', 'Microsoft'),
(777777, 'toaster', '1eqead');

-- --------------------------------------------------------

--
-- Table structure for table `ExternalSpecialist`
--

CREATE TABLE `ExternalSpecialist` (
  `ExternalID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `ContactNumber` varchar(11) NOT NULL,
  `Expertise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ExternalSpecialist`
--

INSERT INTO `ExternalSpecialist` (`ExternalID`, `Name`, `ContactNumber`, `Expertise`) VALUES
(1, 'Larry Phage', '07854687524', 'Fridges'),
(2, 'James Lambo', '07568745214', 'Printers');

-- --------------------------------------------------------

--
-- Table structure for table `Log-in`
--

CREATE TABLE `Log-in` (
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Log-in`
--

INSERT INTO `Log-in` (`Email`, `Password`) VALUES
('analyst@gmail.com', ''),
('bradleymaxwell12@gmail.com', 'VeryGoodPassword'),
('dummy@gmail.com', '123'),
('dummy2@gmail.com', '123'),
('dummy3@gmail.com', '1234'),
('email@gmail.com', 'no password'),
('email2@gmail.com', 'no password'),
('hello', 'no password'),
('hr@gmail.com', ''),
('melwaniritika@gmail.com', 'no password'),
('michael@gmail.com', '123'),
('michael2@gmail.com', NULL),
('michael3@gmail.com', NULL),
('operator1@gmail.com', '1234'),
('operator2@gmail.com', '1234'),
('specialist1@gmail.com', '1234'),
('specialist2@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `Personnel`
--

CREATE TABLE `Personnel` (
  `ID` int NOT NULL,
  `JobTitle` varchar(255) NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `BranchID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Personnel`
--

INSERT INTO `Personnel` (`ID`, `JobTitle`, `Dept`, `Email`, `BranchID`) VALUES
(1, 'Specialist', 'Technology', 'dummy2@gmail.com', 122),
(2, 'Operator', 'Technology', 'dummy@gmail.com', 121),
(3, 'Coffee Boy', 'Technology', 'bradleymaxwell12@gmail.com', 122),
(4, 'Analyst', 'Technology', 'analyst@gmail.com', 121),
(5, 'Nothing', 'Healthcare', 'email@gmail.com', 122),
(7, 'HR', 'Healthcare', 'hr@gmail.com', 121),
(8, 'Operator', 'Technology', 'operator1@gmail.com', 121),
(9, 'Operator', 'Technology', 'operator2@gmail.com', 122),
(10, 'Specialist', 'Technology', 'specialist1@gmail.com', 121),
(11, 'Specialist', 'Technology', 'specialist2@gmail.com', 122),
(101, 'asd', 'asf', 'michael@gmail.com', 122),
(102, 'asf', 'asf', 'michael2@gmail.com', 122),
(103, 'asf', 'asf', 'michael3@gmail.com', 122);

-- --------------------------------------------------------

--
-- Table structure for table `Personnel_ID`
--

CREATE TABLE `Personnel_ID` (
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ext` int NOT NULL,
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Personnel_ID`
--

INSERT INTO `Personnel_ID` (`Name`, `Ext`, `ID`) VALUES
('Jason Marlow', 0, 1),
('Jennifer Iki', 1, 2),
('Bradley Maxwell', 2, 3),
('Susan Boyle', 256, 4),
('Michael \'Chad\' Taiwo', 4589, 5),
('Brad Pippin', 2481, 7),
('Jolene Parton', 3443, 8),
('Franklin Cosmos', 6399, 9),
('Marty Brown', 2263, 10),
('Annie McPhee', 9977, 11),
('Michael 1', 2131, 101),
('Michael 2 ', 3234235, 102),
('Michael 3', 235, 103);

-- --------------------------------------------------------

--
-- Table structure for table `Problem`
--

CREATE TABLE `Problem` (
  `ProblemNumber` int NOT NULL,
  `Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `BranchID` int NOT NULL,
  `InPerson` tinyint(1) NOT NULL,
  `Priority` varchar(255) DEFAULT NULL,
  `ProbDescription` varchar(510) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `OS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SoftwareName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SerialNumber` int DEFAULT NULL,
  `DateSolved` date DEFAULT NULL,
  `TimeSolved` time DEFAULT NULL,
  `SolveMethod` varchar(510) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SolveNotes` varchar(510) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ProblemType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID` int DEFAULT NULL,
  `ExternalID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Problem`
--

INSERT INTO `Problem` (`ProblemNumber`, `Status`, `BranchID`, `InPerson`, `Priority`, `ProbDescription`, `OS`, `SoftwareName`, `SerialNumber`, `DateSolved`, `TimeSolved`, `SolveMethod`, `SolveNotes`, `ProblemType`, `ID`, `ExternalID`) VALUES
(1, 'solved', 122, 0, NULL, 'Callers Microsoft Word would not open', 'Windows', 'Microsoft Word', 2, '2021-01-08', '23:07:59', 'Turned off device then turned on again', 'other random struff', 'Microsoft', NULL, NULL),
(18, 'pending', 121, 0, 'Medium', 'asfasd', 'Linux', 'Microsoft Excel', 2, NULL, '00:00:00', NULL, NULL, 'General', 1, NULL),
(19, 'pending', 121, 0, 'Medium', 'Dummy problem description', 'Windows', 'Adobe Photoshop', NULL, NULL, '00:00:00', NULL, NULL, 'ASUS Monitor', 1, NULL),
(20, 'solved', 122, 0, 'Medium', 'Dummy problem description', 'Linux', 'Microsoft Excel', 2, '2021-01-10', '18:27:00', 'Dummy solve method', NULL, 'Fridges', NULL, NULL),
(21, 'unsolved', 121, 1, 'Medium', 'Problem with my OS ', 'Linux', 'Adobe Photoshop', NULL, NULL, '00:00:00', NULL, NULL, 'General', NULL, 2),
(22, 'solved', 121, 0, 'Low', 'Ranodm problem desciption', NULL, NULL, 3, '2021-02-12', NULL, NULL, 'WRONG', 'Fridges', NULL, 1),
(23, 'solved', 122, 0, NULL, 'Another dummy problem description', NULL, NULL, 4, '2021-02-02', NULL, 'Another random solve method', 'Here are some notes', 'Laptops', 1, NULL),
(24, 'solved', 122, 0, NULL, 'Pending problem description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS Monitor', 1, NULL),
(25, 'solved', 122, 1, NULL, 'Problem Description 1', NULL, 'Adobe Photoshop', 3, NULL, '00:00:00', NULL, '', 'General', 1, NULL),
(26, 'solved', 122, 0, 'Low', 'opih', 'Linux', 'FL Studio', NULL, NULL, '00:00:00', NULL, NULL, 'General', NULL, 1),
(27, 'solved', 121, 0, 'Medium', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eleifend odio ac nunc condimentum ornare. In ut semper elit, non commodo erat. Phasellus finibus venenatis turpis eget dignissim. Sed feugiat efficitur tellus, sit amet aliquam ex placerat eleifend. Integer dapibus massa a magna dapibus finibus. ', 'Linux', 'FL Studio', NULL, '2021-02-17', '12:10:00', 'asfasf', 'WRONG', 'General', NULL, NULL),
(28, 'solved', 122, 0, NULL, 'Pending problem description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Keyboard', 1, NULL),
(29, 'pending', 122, 0, 'Low', 'sdgsdf', 'iOS', 'Microsoft Word', NULL, NULL, '00:00:00', 'qqqqqqqqqqqq', '', 'General', 1, NULL),
(30, 'pending', 121, 0, 'Low', 'asfasd', 'Windows', 'Microsoft Excel', 3, NULL, '00:00:00', 'asfas', 'asfsad', 'Fridges', 1, NULL),
(31, 'unsolved', 122, 0, NULL, 'testing email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'General', NULL, NULL),
(32, 'pending', 121, 1, 'Medium', 'Random proble desciriton', 'Windows', 'FL Studio', 4, NULL, '00:00:00', NULL, NULL, 'ASUS Monitor', 1, NULL),
(33, 'solved', 121, 0, 'Low', 'asfasf', 'iOS', 'Microsoft Word', 3, '2021-02-19', '09:57:00', 'asfas', 'Actual notes\n', 'Fridges', NULL, NULL),
(34, 'pending', 121, 0, 'Medium', 'asf', 'Linux', 'Microsoft Excel', 3, NULL, '00:00:00', 'THIS IS A SOLUTION', 'BIG SOLUTION', 'Fridges', 1, NULL),
(35, 'unsolved', 122, 1, 'Medium', 'asf', 'iOS', 'Microsoft Excel', 4, NULL, '00:00:00', 'asfas', 'asfasf', 'General', 1, NULL),
(36, 'unsolved', 121, 1, 'Medium', 'asfasd', 'iOS', 'Microsoft Excel', 4, NULL, '00:00:00', NULL, NULL, 'ASUS Monitor', 1, NULL),
(37, 'unsolved', 122, 0, 'Medium', 'erherher', 'Linux', 'Microsoft Excel', 3, NULL, '00:00:00', NULL, NULL, 'Fridges', 1, NULL),
(38, 'solved', 121, 1, 'Medium', '121212', 'Windows', NULL, 4, NULL, '00:00:00', NULL, NULL, 'ASUS Monitor', 10, NULL),
(39, 'solved', 121, 1, 'Medium', 'Problem description', 'Windows', 'FL Studio', 4, NULL, '00:00:00', NULL, NULL, 'Fridges', 1, NULL),
(40, 'pending', 121, 0, 'Medium', 'Problem to reassign', 'iOS', 'Software 2', 2, NULL, '00:00:00', NULL, NULL, 'Fridges', 11, NULL),
(41, 'pending', 121, 0, 'Low', '111111', 'Windows', NULL, 2, NULL, '00:00:00', 'solved', 'solved', 'ASUS Monitor', 10, NULL),
(42, 'pending', 121, 1, 'Medium', 'Unsolved problem for specialist to sort out ', 'iOS', 'Microsoft Excel', 3, NULL, '00:00:00', NULL, NULL, 'ASUS Monitor', 1, NULL),
(43, 'solved', 121, 0, NULL, '....', 'iOS', 'FL Studio', 4, '2021-02-23', '15:41:00', 'asklnasklf', 'aSFasjjfnklsnfklwf', 'General', NULL, NULL),
(44, 'pending', 121, 0, 'Medium', '.......', 'iOS', 'Microsoft Excel', 4, NULL, '00:00:00', NULL, NULL, 'Fridges', 10, NULL),
(45, 'solved', 121, 0, 'High', 'latop overheating', 'Windows', 'Adobe Photoshop', 2, NULL, '00:00:00', 'poured water on it', 'ezpz', 'General', 10, NULL),
(46, 'solved', 121, 0, 'High', 'erfgdf', 'iOS', 'Adobe Photoshop', 2, NULL, '00:00:00', 'off and on again - again', NULL, 'General', 11, NULL),
(47, 'pending', 121, 1, 'Low', '111111', 'Windows', NULL, 2, NULL, '00:00:00', NULL, NULL, 'Fridges', 10, NULL),
(48, 'solved', 121, 1, 'Medium', 'EXAMPLE PROBLEM 1', 'Windows', 'Microsoft Word', 1925, NULL, '00:00:00', 'Off and on', NULL, 'Microsoft', 11, NULL),
(49, 'solved', 121, 1, 'Medium', 'EXAMPLE PROBLEM 2', 'Windows', 'Microsoft Word', 1925, NULL, '00:00:00', 'Off and on', 'Should be standard solution', 'Microsoft', 10, NULL),
(50, 'solved', 121, 1, 'Medium', 'TEST PROBLEM 1', 'Windows', 'Microsoft Word', 1925, NULL, '00:00:00', 'Off and on', 'Off and on', 'Microsoft', 11, NULL),
(51, 'solved', 121, 1, 'Medium', 'TEST PROBLEM 2', 'Windows', 'Microsoft Word', 1925, NULL, '00:00:00', 'Off and on', 'Should be standard solution', 'Microsoft', 10, NULL),
(52, 'solved', 121, 0, 'High', 'Caller\'s Adobe photoshop would show a blank screen for a second and then close down', 'Windows', 'Adobe Photoshop', 2, '2021-02-24', '10:49:00', 'Fix Adobe Products', NULL, 'Adobe', NULL, NULL),
(53, 'unsolved', 121, 0, 'Low', 'The caller’s printer does not print double sided\n', 'Windows', NULL, 2, NULL, '00:00:00', NULL, NULL, 'Printers', NULL, 2),
(54, 'solved', 121, 0, 'High', 'Caller\'s Adobe photoshop would show a blank screen for a second and then close down\n', 'Windows', 'Adobe Photoshop', 2, '2021-02-24', '11:34:00', 'Fix Adobe Products standard solution', NULL, 'Adobe', NULL, NULL),
(55, 'unsolved', 121, 0, 'Low', 'The caller’s printer does not print double sided', 'Windows', NULL, 2, NULL, '00:00:00', NULL, NULL, 'Printers', NULL, 2),
(56, 'unsolved', 121, 0, 'Medium', 'aaaa', 'iOS', 'Microsoft Excel', 5, NULL, '00:00:00', NULL, NULL, 'ASUS Monitor', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ProblemType`
--

CREATE TABLE `ProblemType` (
  `ProblemType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ProblemType`
--

INSERT INTO `ProblemType` (`ProblemType`) VALUES
('Adobe'),
('ASUS Monitor'),
('Fridges'),
('General'),
('Keyboard'),
('Laptops'),
('Microsoft'),
('Microwaves'),
('Printers'),
('WiFi');

-- --------------------------------------------------------

--
-- Table structure for table `Software`
--

CREATE TABLE `Software` (
  `SoftwareName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Licensed` tinyint(1) NOT NULL,
  `Supported` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Software`
--

INSERT INTO `Software` (`SoftwareName`, `Licensed`, `Supported`) VALUES
('Adobe Photoshop', 1, 0),
('FL Studio', 0, 0),
('Microsoft Excel', 1, 1),
('Microsoft Word', 1, 0),
('Software 2', 1, 1),
('Software 5', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Specialist`
--

CREATE TABLE `Specialist` (
  `ID` int NOT NULL,
  `NumJobs` int NOT NULL DEFAULT '0',
  `PartTime` tinyint(1) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `InWork` tinyint(1) NOT NULL,
  `NextInWork` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Specialist`
--

INSERT INTO `Specialist` (`ID`, `NumJobs`, `PartTime`, `Status`, `InWork`, `NextInWork`) VALUES
(1, 1, 0, 'Avaliable', 1, '2121-02-02'),
(10, 2, 0, 'Avaliable', 1, '2021-02-25'),
(11, 1, 0, 'Busy', 0, '7777-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `SpecialistProblemType`
--

CREATE TABLE `SpecialistProblemType` (
  `ID` int NOT NULL,
  `ProblemType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `SpecialistProblemType`
--

INSERT INTO `SpecialistProblemType` (`ID`, `ProblemType`) VALUES
(1, 'General'),
(10, 'Fridges'),
(11, 'Microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `StandardSolutions`
--

CREATE TABLE `StandardSolutions` (
  `SolutionName` varchar(255) NOT NULL,
  `SolutionDescription` varchar(255) NOT NULL,
  `ProblemType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `StandardSolutions`
--

INSERT INTO `StandardSolutions` (`SolutionName`, `SolutionDescription`, `ProblemType`) VALUES
('Fix Adobe Products', 'Open the task manager, close down any adobe creative cloud running programs, and then open them up again and it should work. ', 'Keyboard'),
('New Solution 2', 'Lorem ipsum', 'Fridges'),
('New Solution 3', 'Solution description 2\n', 'General'),
('Off&On', 'Turn the device off and on again', 'General');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Branch`
--
ALTER TABLE `Branch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `Call`
--
ALTER TABLE `Call`
  ADD PRIMARY KEY (`CallID`),
  ADD KEY `ID of Operator` (`ID`),
  ADD KEY `Name of Caller` (`Name`),
  ADD KEY `Extension of Caller` (`Ext`);

--
-- Indexes for table `CallProblem`
--
ALTER TABLE `CallProblem`
  ADD KEY `FK_CallProblem_1` (`CallID`),
  ADD KEY `FK_CallProblem_2` (`ProblemNumber`);

--
-- Indexes for table `Equipment`
--
ALTER TABLE `Equipment`
  ADD PRIMARY KEY (`SerialNumber`);

--
-- Indexes for table `ExternalSpecialist`
--
ALTER TABLE `ExternalSpecialist`
  ADD PRIMARY KEY (`ExternalID`);

--
-- Indexes for table `Log-in`
--
ALTER TABLE `Log-in`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BranchID` (`BranchID`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `Personnel_ID`
--
ALTER TABLE `Personnel_ID`
  ADD PRIMARY KEY (`Name`,`Ext`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `Extension` (`Ext`);

--
-- Indexes for table `Problem`
--
ALTER TABLE `Problem`
  ADD PRIMARY KEY (`ProblemNumber`),
  ADD KEY `BranchID` (`BranchID`),
  ADD KEY `ProblemType` (`ProblemType`),
  ADD KEY `ExternalID` (`ExternalID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `Serial Number` (`SerialNumber`),
  ADD KEY `Software Name` (`SoftwareName`);

--
-- Indexes for table `ProblemType`
--
ALTER TABLE `ProblemType`
  ADD PRIMARY KEY (`ProblemType`);

--
-- Indexes for table `Software`
--
ALTER TABLE `Software`
  ADD PRIMARY KEY (`SoftwareName`);

--
-- Indexes for table `Specialist`
--
ALTER TABLE `Specialist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `SpecialistProblemType`
--
ALTER TABLE `SpecialistProblemType`
  ADD KEY `ID` (`ID`),
  ADD KEY `ProblemType` (`ProblemType`);

--
-- Indexes for table `StandardSolutions`
--
ALTER TABLE `StandardSolutions`
  ADD PRIMARY KEY (`SolutionName`),
  ADD KEY `ProblemType` (`ProblemType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Call`
--
ALTER TABLE `Call`
  MODIFY `CallID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `Problem`
--
ALTER TABLE `Problem`
  MODIFY `ProblemNumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Call`
--
ALTER TABLE `Call`
  ADD CONSTRAINT `Extension of Caller` FOREIGN KEY (`Ext`) REFERENCES `Personnel_ID` (`Ext`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ID of Operator` FOREIGN KEY (`ID`) REFERENCES `Personnel` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Name of Caller` FOREIGN KEY (`Name`) REFERENCES `Personnel_ID` (`Name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `CallProblem`
--
ALTER TABLE `CallProblem`
  ADD CONSTRAINT `FK_CallProblem_1` FOREIGN KEY (`CallID`) REFERENCES `Call` (`CallID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_CallProblem_2` FOREIGN KEY (`ProblemNumber`) REFERENCES `Problem` (`ProblemNumber`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD CONSTRAINT `Personnel_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `Branch` (`BranchID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Personnel_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `Log-in` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Personnel_ID`
--
ALTER TABLE `Personnel_ID`
  ADD CONSTRAINT `Personnel_ID_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Personnel` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Problem`
--
ALTER TABLE `Problem`
  ADD CONSTRAINT `Branch` FOREIGN KEY (`BranchID`) REFERENCES `Branch` (`BranchID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ID of External Specialist` FOREIGN KEY (`ExternalID`) REFERENCES `ExternalSpecialist` (`ExternalID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ID of Specialist` FOREIGN KEY (`ID`) REFERENCES `Specialist` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Problem Type` FOREIGN KEY (`ProblemType`) REFERENCES `ProblemType` (`ProblemType`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Serial Number` FOREIGN KEY (`SerialNumber`) REFERENCES `Equipment` (`SerialNumber`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Software Name` FOREIGN KEY (`SoftwareName`) REFERENCES `Software` (`SoftwareName`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `Specialist`
--
ALTER TABLE `Specialist`
  ADD CONSTRAINT `Specialist_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Personnel` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `SpecialistProblemType`
--
ALTER TABLE `SpecialistProblemType`
  ADD CONSTRAINT `SpecialistProblemType_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Specialist` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `SpecialistProblemType_ibfk_2` FOREIGN KEY (`ProblemType`) REFERENCES `ProblemType` (`ProblemType`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `StandardSolutions`
--
ALTER TABLE `StandardSolutions`
  ADD CONSTRAINT `StandardSolutions_ibfk_1` FOREIGN KEY (`ProblemType`) REFERENCES `ProblemType` (`ProblemType`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
