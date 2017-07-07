-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2015 at 10:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyleave`
--

CREATE TABLE IF NOT EXISTS `applyleave` (
  `names` varchar(80) NOT NULL,
  `staffid` varchar(80) NOT NULL,
  `department` varchar(80) NOT NULL,
  `reason` varchar(80) NOT NULL,
  `period` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applyleave`
--

INSERT INTO `applyleave` (`names`, `staffid`, `department`, `reason`, `period`) VALUES
('julius malema madede', '150', 'Audit', 'Normal leave', '14 working days'),
('jacob juma onyango', '160', 'human resource', 'Sickness', '5 working days'),
('hilary kibet ruto', '720', 'administration', 'Normal leave', '5 working days');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `firstname` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `staffid` varchar(80) NOT NULL,
  `idno` int(80) NOT NULL,
  `department` varchar(80) NOT NULL,
  `supervisor` varchar(80) NOT NULL,
  `dateofbirth` varchar(80) NOT NULL,
  `telephone` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `gender` varchar(80) NOT NULL,
  `level` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`firstname`, `surname`, `lastname`, `staffid`, `idno`, `department`, `supervisor`, `dateofbirth`, `telephone`, `email`, `gender`, `level`, `password`) VALUES
('julius ', 'malema', 'madede', '150', 684780, 'audit', 'Director Audit', '04/02/1960', '0769230201', 'juliusmalema@gmail.com', 'male', 'administrator', '150'),
('jacob', 'juma', 'onyango', '160', 8947450, 'human resource', 'Director Human Resource', '02/01/1973', '0756291035', 'jumaongango@gmail.com', 'male', 'STAFF', '160'),
('charles ', 'kioko', 'mutua', '240', 9576945, 'finance', 'Director Finance', '05/02/1980', '0769092829', 'charleskioko@gmail.com', 'male', 'staff', '240'),
('martin', 'njeru', 'mutheru', '410', 209751, 'finance', 'Director Finance', '09/02/1982', '0745611732', 'martinnjeru@gmail.com', 'male', 'STAFF', '410'),
('ruth', 'matete', 'ngare', '510', 3026718, 'ict', 'Director ICT', '02/01/1970', '0730282910', 'ruthngare@gmail.com', 'female', 'STAFF', '510'),
('hilary', 'kibet', 'ruto', '720', 6571745, 'administration', 'Director Administration', '8/09/1968', '0785554312', 'hilarykibet@gmail.com', 'female', 'Staff', '720'),
('gladys', 'njeri', 'wamae', '850', 369025, 'administration', 'Employee', '11/06/2015', '0768410900', 'gladysnjeri@gmail.com', 'female', 'staff', '850'),
('ton', 'john', 'peter', '900', 546589980, 'ict', 'Director ICT', '09/05/1995', '0976467569', 'tompeter@gmail.com', 'male', 'STAFF', '900'),
('grace', 'njoka', 'njue', '920', 56780, 'human resource', 'Director Human Resource', '03/07/1989', '0715606070', 'gracenjoka@gmail.com', 'female', 'STAFF', '920');

-- --------------------------------------------------------

--
-- Table structure for table `time_in`
--

CREATE TABLE IF NOT EXISTS `time_in` (
  `firstname` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `staffid` varchar(80) NOT NULL,
  `idno` int(80) NOT NULL,
  `department` varchar(80) NOT NULL,
  `supervisor` varchar(80) NOT NULL,
  `time_in` varchar(80) NOT NULL,
  `date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_in`
--

INSERT INTO `time_in` (`firstname`, `surname`, `lastname`, `staffid`, `idno`, `department`, `supervisor`, `time_in`, `date`) VALUES
('jacob', 'juma', 'onyango', '160', 8947450, 'Human Resource', 'Director Human Resource', '8:15', '01/07/2015'),
('ruth', 'matete', 'ngare', '510', 3026718, 'ict', 'Director ICT', '8:05', '02/07/2015'),
('james', 'kuria', 'mathenge', '560', 13243698, 'Audit', 'Director Audit', '7:48', '29/06/2015'),
('hilary', 'kibet', 'ruto', '720', 6571745, 'administration', 'Director Administration', '7:26', '08/07/2015');

-- --------------------------------------------------------

--
-- Table structure for table `time_out`
--

CREATE TABLE IF NOT EXISTS `time_out` (
  `firstname` varchar(80) NOT NULL,
  `surname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `staffid` varchar(80) NOT NULL,
  `idno` int(80) NOT NULL,
  `department` varchar(80) NOT NULL,
  `supervisor` varchar(80) NOT NULL,
  `time_out` varchar(80) NOT NULL,
  `date` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_out`
--

INSERT INTO `time_out` (`firstname`, `surname`, `lastname`, `staffid`, `idno`, `department`, `supervisor`, `time_out`, `date`) VALUES
('ruth', 'matete', 'ngare', '510', 3026718, 'ict', 'Director ICT', '16:36', '02/07/2015'),
('james', 'kuria', 'mathenge', '560', 13243698, 'Audit', 'Director Audit', '17:05', '29/06/2015');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `staffid` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`staffid`, `level`, `pass`) VALUES
('360', 'Staff', '360'),
('670', 'Staff', '670'),
('890', 'Administrator', '890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyleave`
--
ALTER TABLE `applyleave`
 ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `time_in`
--
ALTER TABLE `time_in`
 ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `time_out`
--
ALTER TABLE `time_out`
 ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`staffid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
