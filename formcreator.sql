-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 07:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formcreator`
--

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

CREATE TABLE `creators` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `creators`
--

INSERT INTO `creators` (`Id`, `Email`, `Password`, `CreatedAt`) VALUES
(1, '', '', '2023-09-18 12:58:45'),
(2, 'test@test.com', '1432014320', '2023-09-18 13:00:45'),
(9, 'demo1@email.com', '12345678', '2023-09-19 13:17:56'),
(10, 'test@email.com', '12345678', '2023-09-19 16:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Deadline` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `OwnerId` int(11) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`Id`, `Name`, `Deadline`, `OwnerId`, `CreatedAt`) VALUES
(4, 'Testing1', '2023-09-19 13:32:23', 2, '2023-09-18 13:06:51'),
(22, 'formname', '2023-09-19 13:47:00', 9, '2023-09-19 13:44:21'),
(26, 'This is the new form which I am creating', '2023-09-20 06:10:00', 2, '2023-09-19 15:20:02'),
(27, 'form1', '2023-09-20 16:17:00', 10, '2023-09-19 16:17:17'),
(28, 'form2', '2023-09-20 16:17:00', 10, '2023-09-19 16:17:43'),
(29, 'form3', '2023-09-20 16:17:00', 10, '2023-09-19 16:17:55'),
(30, 'form4', '2023-09-20 16:18:00', 10, '2023-09-19 16:18:52'),
(31, 'form5', '2023-09-20 16:19:00', 10, '2023-09-19 16:19:08'),
(32, 'form6', '2023-09-20 16:19:00', 10, '2023-09-19 16:19:19'),
(33, 'form7', '2023-09-20 16:19:00', 10, '2023-09-19 16:19:28'),
(34, 'form8', '2023-09-20 16:19:00', 10, '2023-09-19 16:19:38'),
(35, 'form9', '2023-09-20 16:19:00', 10, '2023-09-19 16:19:48'),
(36, 'form10', '2023-09-20 16:19:00', 10, '2023-09-19 16:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `form_questions`
--

CREATE TABLE `form_questions` (
  `Id` int(11) NOT NULL,
  `Question` text NOT NULL,
  `AnswerType` varchar(50) NOT NULL,
  `Options` varchar(200) DEFAULT NULL,
  `FormId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form_questions`
--

INSERT INTO `form_questions` (`Id`, `Question`, `AnswerType`, `Options`, `FormId`) VALUES
(1, 'Test Updated', 'TextShort', '', 4),
(2, 'Hello', 'TextLong', '', 4),
(3, 'DropDown', 'Dropdown', 'Testing 1,Testing 2', 4),
(4, 'Checkbox', 'Checkbox', 'Check 1, Check 2', 4),
(7, 'radio', 'Radio', 'tested,testing', 4),
(34, 'This is dropdown question I am adding', 'Dropdown', 'option 1, option 2, option 3, option 4, option 5,', 26),
(35, 'This is text short question', 'TextShort', '', 26),
(36, 'This is text long question', 'TextLong', '', 26),
(37, 'This is check box question', 'Checkbox', 'box 1, box 2, box 3,', 26),
(38, 'This is radio question', 'Radio', 'radio 1, radio2, radio 3,', 26),
(39, 'question 1', 'Dropdown', 'op1, op2,', 27),
(40, 'Question 2', 'TextShort', '', 27),
(41, 'Question 3', 'TextLong', '', 27),
(42, 'Question 4', 'Checkbox', 'op1, op2,', 27),
(43, 'Question 5', 'Radio', 'op1, op2,', 27),
(44, 'Q6', 'TextShort', '', 27),
(45, 'Q7', 'TextShort', '', 27),
(46, 'Q8', 'TextShort', '', 27),
(54, 'Q9', 'TextShort', '', 27),
(55, 'Q10', 'TextShort', '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `Id` int(11) NOT NULL,
  `SubmissionId` text NOT NULL,
  `QuestionId` int(11) NOT NULL,
  `Answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`Id`, `SubmissionId`, `QuestionId`, `Answer`) VALUES
(32, '1695126052', 1, 'filler'),
(33, '1695126052', 2, 'diller'),
(34, '1695126052', 3, 'Testing 1'),
(35, '1695126052', 4, 'Check 1'),
(36, '1695126052', 7, 'tested'),
(37, '1695131453', 1, 'ans1'),
(38, '1695131453', 2, 'ans2'),
(39, '1695131453', 3, 'Testing 1'),
(40, '1695131453', 4, 'Check 1,  Check 2'),
(41, '1695131453', 7, 'testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creators`
--
ALTER TABLE `creators`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `OwnerId` (`OwnerId`);

--
-- Indexes for table `form_questions`
--
ALTER TABLE `form_questions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FormId` (`FormId`);

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `QuestionId` (`QuestionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creators`
--
ALTER TABLE `creators`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `form_questions`
--
ALTER TABLE `form_questions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`OwnerId`) REFERENCES `creators` (`Id`);

--
-- Constraints for table `form_questions`
--
ALTER TABLE `form_questions`
  ADD CONSTRAINT `form_questions_ibfk_1` FOREIGN KEY (`FormId`) REFERENCES `forms` (`Id`);

--
-- Constraints for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD CONSTRAINT `form_submissions_ibfk_1` FOREIGN KEY (`QuestionId`) REFERENCES `form_questions` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
