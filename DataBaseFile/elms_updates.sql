-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 23 يناير 2021 الساعة 15:17
-- إصدار الخادم: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elms_updates`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`, `email`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2021-01-13 16:01:41', 'hanadiokla@gmail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'Human Resource', 'HR', 'HR001', '2017-11-01 07:16:25'),
(2, 'Information Technology', 'IT', 'IT001', '2017-11-01 07:19:37'),
(3, 'Operations', 'OP', 'OP1', '2017-12-02 21:28:56');

-- --------------------------------------------------------

--
-- بنية الجدول `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` date DEFAULT '0000-00-00',
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Country` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Passport_valid` date DEFAULT NULL,
  `idcard_valid` date DEFAULT NULL,
  `Visa_valid` date DEFAULT NULL,
  `roll` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `City`, `Country`, `Phonenumber`, `Status`, `RegDate`, `Passport_valid`, `idcard_valid`, `Visa_valid`, `roll`) VALUES
(4, '0130', 'Qais', 'Abd Alhadi', 'qais209@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Male', '0000-00-00', 'Human Resource', 'Damascus', 'Damascus', 'United Kingdom', '4123456789', 1, '2020-12-31 18:43:13', '2022-08-04', '2022-08-04', '2021-02-01', 1),
(82, '324', 'dania', 'essa', 'daniaessa87@outlook.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Female', '1987-05-30', 'Information Technology', 'test', 'test', 'test', '0999999999', 1, '2021-01-19 00:04:38', '2021-01-21', '2021-01-21', '2021-01-21', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `tblevents`
--

CREATE TABLE `tblevents` (
  `id` int(11) NOT NULL,
  `Events_Name` varchar(255) NOT NULL,
  `DateOfEvents` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `tblevents`
--

INSERT INTO `tblevents` (`id`, `Events_Name`, `DateOfEvents`) VALUES
(0, 'Test1', '2020-01-11'),
(1, 'Test1', '2020-01-11'),
(2, 'Test2', '2020-03-23'),
(3, 'Test3', '2020-06-21');

-- --------------------------------------------------------

--
-- بنية الجدول `tbleventsemployee`
--

CREATE TABLE `tbleventsemployee` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `tbleventsemployee`
--

INSERT INTO `tbleventsemployee` (`id`, `emp_id`, `event_id`) VALUES
(0, 3, 0),
(1, 3, 1),
(2, 3, 2),
(3, 4, 0),
(4, 4, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `leaveTime` varchar(120) NOT NULL,
  `comeTime` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `AdminRemarkDate`, `Status`, `IsRead`, `empid`, `leaveTime`, `comeTime`) VALUES
(85, 'Restricted Holiday(RH)', '', '', 'tst\r\n', '2021-01-19 00:01:36', NULL, NULL, 0, 0, 4, '22/02/2022 22:22', '30/03/2033 03:33'),
(86, 'Medical Leave test', '', '', 'test', '2021-01-19 01:25:39', NULL, NULL, 0, 0, 82, '22/02/2022 22:22', '30/03/2033 03:33'),
(87, 'Medical Leave test', '', '', 'test', '2021-01-19 01:27:30', NULL, NULL, 0, 0, 82, '22/02/2022 22:22', '30/03/2033 03:33'),
(88, 'Medical Leave test', '', '', 'test', '2021-01-19 05:12:39', NULL, NULL, 0, 0, 82, '22/02/2022 22:22', '30/03/2033 03:33'),
(89, 'Restricted Holiday(RH)', '', '', 'test', '2021-01-19 09:05:51', NULL, NULL, 0, 0, 82, '22/02/2022 22:22', '22/03/2023 20:20'),
(90, 'Medical Leave test', '', '', 'test', '2021-01-19 09:18:16', NULL, NULL, 0, 0, 82, '20/02/2020 20:02', '20/02/2023 20:20'),
(91, 'Medical Leave test', '', '', '????', '2021-01-19 09:49:54', NULL, NULL, 0, 0, 82, '20/02/2022 20:02', '30/01/2024 20:20'),
(92, 'Medical Leave test', '', '', 'test', '2021-01-19 09:51:39', NULL, NULL, 0, 0, 82, '20/02/2020 20:20', '30/01/2025 20:20'),
(93, 'Medical Leave test', '', '', 'test', '2021-01-19 09:56:47', NULL, NULL, 0, 0, 82, '20/02/2020 20:20', '30/01/2023 20:20'),
(94, 'Medical Leave test', '', '', 'test', '2021-01-19 10:27:38', NULL, NULL, 0, 0, 82, '20/02/2020 20:20', '30/01/2030 20:20'),
(95, 'Medical Leave test', '', '', 'test', '2021-01-19 10:31:06', NULL, NULL, 0, 0, 82, '20/02/2020 20:20', '30/01/2025 20:20'),
(96, 'Medical Leave test', '', '', 'kkkkkkk', '2021-01-19 10:32:00', NULL, NULL, 0, 0, 82, '20/02/2020 20:20', '30/01/2030 20:20'),
(97, 'Medical Leave test', '', '', 'hhhhhhh', '2021-01-19 17:05:52', NULL, NULL, 0, 0, 82, '30/12/2021 21:22', '30/12/2022 22:22'),
(98, 'Medical Leave test', '', '', 'test', '2021-01-19 17:07:15', NULL, NULL, 0, 0, 82, '20/02/2021 20:20', '20/02/2022 22:22'),
(99, 'Medical Leave test', '', '', 'eeeeeeee', '2021-01-19 17:08:18', NULL, NULL, 0, 0, 82, '20/02/2022 20:20', '20/02/2023 20:20'),
(100, 'Medical Leave test', '', '', 'test', '2021-01-19 18:38:34', NULL, NULL, 0, 0, 82, '23/05/2054 04:32', '25/12/2055 22:22'),
(101, 'Medical Leave test', '', '', 'test', '2021-01-19 18:54:34', NULL, NULL, 0, 0, 82, '23/05/2054 04:32', '25/12/2055 22:22'),
(102, 'Medical Leave test', '', '', 'rrrrr', '2021-01-19 18:55:22', NULL, NULL, 0, 0, 82, '20/02/2022 20:20', '20/02/2023 20:20'),
(103, 'Medical Leave test', '', '', 'eee', '2021-01-19 18:56:52', NULL, NULL, 0, 0, 82, '20/02/2020 22:02', '30/01/2023 20:20'),
(104, 'Medical Leave test', '', '', 'test', '2021-01-19 20:02:51', NULL, NULL, 0, 0, 82, '20/02/2020 22:02', '20/02/2023 20:20'),
(105, 'Casual Leave', '', '', 'test', '2021-01-19 20:05:35', NULL, NULL, 0, 1, 82, '23/05/2022 10:20', '31/03/2033 20:20'),
(106, 'Medical Leave test', '', '', 'test', '2021-01-23 15:11:47', NULL, NULL, 0, 0, 82, '22/02/2022 22:22', '22/04/2023 22:22'),
(107, '', '', '', 'tste', '2021-01-23 15:12:27', NULL, NULL, 0, 0, 82, '22/02/2022 10:30', '22/04/2023 10:30'),
(108, '', '', '', 'tste', '2021-01-23 15:12:30', NULL, NULL, 0, 0, 82, '22/02/2022 10:30', '22/04/2023 10:30'),
(109, '', '', '', 'tste', '2021-01-23 15:12:31', NULL, NULL, 0, 0, 82, '22/02/2022 10:30', '22/04/2023 10:30');

-- --------------------------------------------------------

--
-- بنية الجدول `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `CreationDate`) VALUES
(1, 'Casual Leave', 'Casual Leave ', '2017-11-01 12:07:56'),
(2, 'Medical Leave test', 'Medical Leave  test', '2017-11-06 13:16:09'),
(3, 'Restricted Holiday(RH)', 'Restricted Holiday(RH)', '2017-11-06 13:16:38'),
(4, 'Schedule Time', 'Add hour leave time', '2021-01-10 21:01:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevents`
--
ALTER TABLE `tblevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbleventsemployee`
--
ALTER TABLE `tbleventsemployee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empid` (`emp_id`),
  ADD KEY `eventid` (`event_id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `tbleventsemployee`
--
ALTER TABLE `tbleventsemployee`
  ADD CONSTRAINT `eventid` FOREIGN KEY (`event_id`) REFERENCES `tblevents` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
