-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2020 at 04:15 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'srmiltonkhan@gmail.com', '4be3313905b390b00012a32b8486a978');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

DROP TABLE IF EXISTS `tbl_ans`;
CREATE TABLE IF NOT EXISTS `tbl_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesno` int(11) NOT NULL,
  `rightans` int(11) NOT NULL DEFAULT 0,
  `ans` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=238 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesno`, `rightans`, `ans`) VALUES
(183, 12, 1, ' Execution Time'),
(182, 12, 0, ' Delay Time'),
(181, 11, 0, 'Output'),
(180, 11, 0, 'Information'),
(178, 11, 0, 'Storage'),
(179, 11, 1, 'Input'),
(175, 10, 0, ' Graphical Universal Interface'),
(174, 10, 1, ' Graph Use Interface'),
(177, 10, 0, 'Graphical Unique Interface'),
(176, 10, 0, ' GUI stands for '),
(159, 6, 0, ' Programming Intelligence'),
(160, 6, 0, 'System Knowledge'),
(161, 6, 0, 'VVLSI'),
(162, 7, 0, 'Transistor'),
(163, 7, 0, 'VLSI'),
(164, 7, 1, 'Vaccum Tube'),
(165, 7, 0, 'LSI'),
(166, 8, 0, 'Second Generation'),
(167, 8, 1, ' Fourth Generation'),
(168, 8, 0, ' Both (A) and (B)'),
(169, 8, 0, 'Third Generation'),
(170, 9, 0, ' DRAM'),
(171, 9, 0, 'ROM'),
(172, 9, 1, 'All of the above'),
(173, 9, 0, ' None of these  '),
(158, 6, 1, ' Artificial Intelligence'),
(157, 5, 0, '6'),
(147, 3, 0, ' Charles Babbage'),
(148, 3, 0, ' Blaise Pascal'),
(149, 3, 0, ' Garden Moore'),
(150, 4, 0, '$'),
(151, 4, 0, '@'),
(152, 4, 0, ' +'),
(153, 4, 1, '='),
(154, 5, 0, '3'),
(155, 5, 0, '4'),
(156, 5, 1, '5'),
(138, 1, 0, ' Keyboard'),
(139, 1, 0, 'Plotter'),
(140, 1, 1, 'Scanner'),
(141, 1, 0, 'OMR'),
(142, 2, 0, 'FTP'),
(143, 2, 1, ' SMTP'),
(144, 2, 0, 'TELNET'),
(145, 2, 0, ' SNMP'),
(146, 3, 1, ' John Von Neumann'),
(184, 12, 0, 'Real Time'),
(185, 12, 0, 'Execution Time'),
(186, 13, 0, 'Attenuator'),
(187, 13, 0, 'Comparator'),
(188, 13, 0, ' Rectifier'),
(189, 13, 1, 'Flip Flop'),
(190, 14, 1, 'Redhat Linux'),
(191, 14, 0, ' Microsoft Office'),
(192, 14, 0, ' Adobe Pagemaker'),
(193, 14, 0, 'Open Office'),
(194, 15, 0, 'Photoshop is a graphical design tool by Adobe'),
(195, 15, 0, 'Linux is free and open source software'),
(196, 15, 1, 'Linux is owned and sold by Microsoft'),
(197, 15, 0, 'Windows XP is an operating system'),
(198, 16, 0, 'Debug'),
(199, 16, 0, 'Cursor'),
(200, 16, 1, 'Bug'),
(201, 16, 0, 'Icon'),
(202, 17, 0, 'an operating system'),
(203, 17, 0, 'Processing device'),
(204, 17, 1, 'Application software'),
(205, 17, 0, 'an input device'),
(206, 18, 0, 'PT Fransworth'),
(207, 18, 1, 'JH Van Tassell'),
(208, 18, 0, 'Charles Ginsberg'),
(209, 18, 0, 'Charles Babbage'),
(210, 19, 1, 'Icons'),
(211, 19, 0, ' Windows'),
(212, 19, 0, 'Desktop'),
(213, 19, 0, ' Task bar'),
(214, 20, 0, ' Bytes'),
(215, 20, 0, 'Kilobytes'),
(216, 20, 0, ' Decimal bytes'),
(217, 20, 1, 'Bits'),
(218, 21, 0, ' 4.5\" B.'),
(219, 21, 1, '3.5\"'),
(220, 21, 0, ' 3.25\"'),
(221, 21, 0, '5.5\"'),
(222, 22, 0, 'Chomium'),
(223, 22, 0, ' Iron Oxide'),
(224, 22, 0, 'Silica'),
(225, 22, 1, ' Silicon'),
(226, 23, 1, 'OS-2'),
(227, 23, 0, 'Windows'),
(228, 23, 0, ' DOS'),
(229, 23, 0, 'UNIX'),
(230, 24, 0, 'Control     '),
(231, 24, 1, 'ALU'),
(232, 24, 0, ' Register'),
(233, 24, 0, 'Cache Memory'),
(234, 25, 0, 'UNIC'),
(235, 25, 0, 'FUNTRIA'),
(236, 25, 0, 'BRAINIA'),
(237, 25, 1, 'ENIAC');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

DROP TABLE IF EXISTS `tbl_ques`;
CREATE TABLE IF NOT EXISTS `tbl_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Q_cat` varchar(10) NOT NULL,
  `quesno` int(11) NOT NULL,
  `ques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `Q_cat`, `quesno`, `ques`) VALUES
(38, '1', 1, 'A light sensitive device that converts drawing, printed text or other images into digital form is'),
(41, '1', 4, ' In order to tell Excel that we are entering a formula in cell, we must begin with an operator such as'),
(40, '1', 3, 'The basic architecture of computer was developed by'),
(39, '1', 2, 'Which protocol provides e-mail facility among different hosts?'),
(42, '1', 5, 'In how many generations a computer can be classified?'),
(43, '2', 6, 'Fifth generation computers are based on'),
(44, '2', 7, ' First generation of computer was based on which technology?'),
(45, '2', 8, ' Microprocessor was introduced in which generation of computer?'),
(46, '2', 9, 'Which of the following memory is non-volatile?'),
(47, '2', 10, 'Graphical User Interface'),
(48, '3', 11, ' Any data or instruction entered into the memory of a computer is considered as'),
(49, '3', 12, 'Time during which a job is processed by the computer is:'),
(50, '3', 13, ' Which of the following circuit is used as a \'Memory device\' in computers?'),
(51, '3', 14, 'Which one of the following is not an application software package?'),
(52, '3', 15, 'Which of the following statement is wrong?'),
(53, '4', 16, 'An error is also known as:'),
(54, '4', 17, 'Microsoft Word is an example of'),
(55, '4', 18, 'Who invented the super computer?'),
(56, '4', 19, 'Graphical pictures that represent an object like file, folder etc are:'),
(57, '4', 20, 'The 0 and 1 in the binary numbering system are called Binary Digits or'),
(58, '5', 21, ' The size of commonly used floppy disk is'),
(59, '5', 22, 'The \'IC\' chip, used in computers, is made of'),
(60, '5', 23, 'Which of the following operating systems is produced by IBM?'),
(61, '5', 24, 'The processor which performs arithmetical and logical operations is called'),
(62, '5', 25, ' Which was an early mainframe computer?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

DROP TABLE IF EXISTS `tbl_result`;
CREATE TABLE IF NOT EXISTS `tbl_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `p1` varchar(20) NOT NULL DEFAULT '0',
  `j2` varchar(20) NOT NULL DEFAULT '0',
  `c3` varchar(20) NOT NULL DEFAULT '0',
  `p4` varchar(20) NOT NULL DEFAULT '0',
  `o5` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `userid`, `p1`, `j2`, `c3`, `p4`, `o5`) VALUES
(2, 17, '4', '0', '1', '0', '2'),
(5, 8, '5', '6', '0', '0', '0'),
(6, 18, '2', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(25, 'milton', 'srmiltonkhan@gmail.com', '4be3313905b390b00012a32b8486a978', 'milton@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
