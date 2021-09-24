-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 03:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webthuctap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Huu Manh', 'huumanh.edu@gmail.com', 'manhadmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admissions`
--

CREATE TABLE IF NOT EXISTS `tbl_admissions` (
`admId` int(11) NOT NULL,
  `admName` varchar(255) NOT NULL,
  `admPhone` varchar(255) NOT NULL,
  `admDate` date NOT NULL,
  `admAddress` varchar(255) NOT NULL,
  `admParents` varchar(255) NOT NULL,
  `admPhoneparents` varchar(255) NOT NULL,
  `admHometown` varchar(255) NOT NULL,
  `admGender` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admissions`
--

INSERT INTO `tbl_admissions` (`admId`, `admName`, `admPhone`, `admDate`, `admAddress`, `admParents`, `admPhoneparents`, `admHometown`, `admGender`) VALUES
(18, 'Chu Há»¯u Máº¡nh', '0397052700', '1998-08-02', '233 Pháº¡m VÄƒn Äá»“ng,Kon Tum', 'Nguyá»…n VÄƒn A', '0981447787', 'Nam Äá»‹nh', 'Nam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_binhluan`
--

CREATE TABLE IF NOT EXISTS `tbl_binhluan` (
`binhluan_Id` int(11) NOT NULL,
  `forum_Id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `binhluan` varchar(255) NOT NULL,
  `rep_Id` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`binhluan_Id`, `forum_Id`, `id`, `adminId`, `binhluan`, `rep_Id`) VALUES
(87, 14, 4, 0, 'Há»— trá»£ nhÆ° tháº¿ nÃ o', ''),
(88, 14, 5, 0, 'Äá»£i admin xá»­ lÃ½', '87'),
(89, 14, 5, 0, 'Em muá»‘n Ä‘Æ°á»£c há»— trá»£', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`ct_Id` int(11) NOT NULL,
  `ct_Name` varchar(255) NOT NULL,
  `ct_Phone` varchar(255) NOT NULL,
  `ct_Email` varchar(255) NOT NULL,
  `ct_Address` varchar(255) NOT NULL,
  `ct_Inbox` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`ct_Id`, `ct_Name`, `ct_Phone`, `ct_Email`, `ct_Address`, `ct_Inbox`) VALUES
(9, 'BÃ nh VÄƒn Ká»³', '0321569854', 'kyky@gmail.com', '710 Phan ÄÃ¬nh PhÃ¹ng, thÃ nh phá»‘ Kon Tum', 'Em cÃ³ tháº¯c máº¯c vá» há»c phÃ­ nÄƒm nay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
`departmentId` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`departmentId`, `departmentName`) VALUES
(3, 'CÃ´ng chá»©ng'),
(4, 'HÃ nh chÃ­nh'),
(5, 'TÃ i chÃ­nh'),
(6, 'CTHSSV'),
(7, 'HÃ nh chÃ­nh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum`
--

CREATE TABLE IF NOT EXISTS `tbl_forum` (
`forum_Id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc_forum` varchar(300) NOT NULL,
  `date_forum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_forum` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_forum`
--

INSERT INTO `tbl_forum` (`forum_Id`, `id`, `title`, `desc_forum`, `date_forum`, `file_forum`) VALUES
(14, 6, 'Há»— trá»£ sinh viÃªn chá»‹u tÃ¡c Ä‘á»™ng trá»±c tiáº¿p bá»Ÿi dá»‹ch Covid-19 Ä‘á»£t 2', '<p><strong>Nh&agrave; trÆ°á»ng d&agrave;nh nguá»“n kinh ph&iacute; 2,2 tá»· há»— trá»£ t&agrave;i ch&iacute;nh cho sinh vi&ecirc;n bá»‹ áº£nh hÆ°á»Ÿng trá»±c tiáº¿p bá»Ÿi Ä‘áº¡i dá»‹ch Covid-19 Ä‘á»£t 2 nÄƒm 2020.</strong></p>\r\n', '2021-09-21 01:56:56', 'K12TT-Chu Huu Manh-Tuan 1 9-8-2021_15-8-2021.pdf'),
(15, 4, 'Sinh viÃªn thuá»™c diá»‡n há»— trá»£ covid', '<p>Em thuá»™c diá»‡n Ä‘Æ°á»£c há»— trá»£ t&agrave;i ch&iacute;nh do covid 19 Ä‘á»£t 2 th&igrave; bao giá» Ä‘Æ°á»£c nháº­n trá»£ cáº¥p áº¡</p>\r\n', '2021-09-21 02:13:46', 'K12TT-Chu Huu Manh-Tuan 2 16-8-2021_22-8-2021.pdf'),
(16, 5, 'Xin báº£o lÆ°u', '<p>Muá»‘n xin báº£o lÆ°u th&igrave; cáº§n xin giáº¥y tá» á»Ÿ Ä‘&acirc;u áº¡.</p>\r\n', '2021-09-21 02:16:05', 'K12TT-Chu Huu Manh-Tuan 2 16-8-2021_22-8-2021.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_papers`
--

CREATE TABLE IF NOT EXISTS `tbl_papers` (
`papersId` int(11) NOT NULL,
  `papersName` varchar(255) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `papers_desc` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_papers`
--

INSERT INTO `tbl_papers` (`papersId`, `papersName`, `departmentId`, `papers_desc`, `file`) VALUES
(18, 'Phiáº¿u xin nghá»‰ há»c pháº§n Ä‘Äƒng kÃ½', 6, '<p>Phiáº¿u há»§y há»c pháº§n</p>\r\n', 'Phieu xin huy.doc'),
(19, 'Phiáº¿u Ä‘á» nghá»‹ chuyá»ƒn há»c pháº§n Ä‘Ã£ Ä‘Äƒng kÃ½', 6, '<p>Chuyá»ƒn há»c pháº§n</p>\r\n', 'Phieu xin chuyen.doc'),
(20, 'Phiáº¿u Ä‘Äƒng kÃ½ tÃ­n chá»‰', 4, '<p>Chá»‰ d&agrave;nh cho sinh vi&ecirc;n Ä‘Äƒng k&yacute; t&iacute;n chá»‰ bá»• sung</p>\r\n', 'Phieu dang ky tin chi bo sung.doc'),
(21, 'Giáº¥y thanh toÃ¡n ra trÆ°á»ng', 5, '<p>Thanh to&aacute;n ra trÆ°á»ng</p>\r\n', 'THANH TOAN RA TRUONG.doc'),
(22, 'ÄÆ¡n xin quay trá»Ÿ láº¡i há»c', 3, '<p>D&agrave;nh cho sinh vi&ecirc;n báº£o lÆ°u</p>\r\n', 'DON XIN HOC TRO LAI.doc'),
(23, 'ÄÆ¡n xin thÃ´i há»c', 6, '<p>ÄÆ¡n xin th&ocirc;i há»c</p>\r\n', 'DON XIN THOI HOC.doc'),
(24, 'ÄÆ¡n xin Ä‘iá»u chá»‰nh thÃ´ng tin cÃ¡ nhÃ¢n', 6, '<p>Äiá»u chá»‰nh th&ocirc;ng tin</p>\r\n', 'DON XIN DIEU CHINH THONG TIN SAI.doc'),
(25, 'ÄÆ¡n xin chuyá»ƒn trÆ°á»ng', 3, '<p>ÄÆ¡n xin chuyá»ƒn trÆ°á»ng</p>\r\n', 'DON XIN CHUYEN TRUONG.doc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scanf`
--

CREATE TABLE IF NOT EXISTS `tbl_scanf` (
`scanf_Id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `scanf_desc` varchar(255) NOT NULL,
  `scanf_file` varchar(255) NOT NULL,
  `scanf_Date` date NOT NULL,
  `cmt` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `date_scanf` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_scanf`
--

INSERT INTO `tbl_scanf` (`scanf_Id`, `id`, `departmentId`, `scanf_desc`, `scanf_file`, `scanf_Date`, `cmt`, `status`, `date_scanf`) VALUES
(49, 4, 6, '<p>Em muá»‘n xin báº£ng Ä‘iá»ƒm</p>\r\n', 'K12TT-Chu Huu Manh-Tuan 1 9-8-2021_15-8-2021.pdf', '0000-00-00', '', 0, '2021-09-21'),
(50, 4, 6, '<p>Em muá»‘n xin báº£o lÆ°u</p>\r\n', 'K12TT-Chu Huu Manh-Tuan 2 16-8-2021_22-8-2021.pdf', '2021-09-22', 'PhÃ²ng H301', 2, '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
`sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(2, 'slide 1', 'e6cab47088.jpg', 1),
(3, 'slide 2', '5681a521e1.jpg', 1),
(6, 'slide 3', '7e5c2b5156.jpg', 1),
(7, 'slide 4', 'de360cdf23.jpg', 1),
(8, 'slide 5', 'cbe821ab96.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `mssv` varchar(30) NOT NULL,
  `class` varchar(200) NOT NULL,
  `department` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `address`, `city`, `country`, `mssv`, `class`, `department`, `phone`, `email`, `password`) VALUES
(4, 'Chu Há»¯u Máº¡nh', '233 Pháº¡m VÄƒn Äá»“ng', 'Kon Tum', 'VN', '1817480201017', 'K12TT', 'KTNN', '0397052777', 'chmanh98@gmail.com', '6c63bc87c542f064de323412d5c30054'),
(5, 'BÃ nh VÄƒn Ká»³', 'TiÃªn PhÆ°á»›c', 'Quáº£ng Nam', 'VN', '1817480201010', 'K12TT', 'SP', '0345213254', 'kyky@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Admin', '', '', '', 'manhadmin', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_admissions`
--
ALTER TABLE `tbl_admissions`
 ADD PRIMARY KEY (`admId`);

--
-- Indexes for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
 ADD PRIMARY KEY (`binhluan_Id`), ADD KEY `forum_binhluan` (`forum_Id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`ct_Id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
 ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `tbl_forum`
--
ALTER TABLE `tbl_forum`
 ADD PRIMARY KEY (`forum_Id`), ADD KEY `id_forum` (`id`);

--
-- Indexes for table `tbl_papers`
--
ALTER TABLE `tbl_papers`
 ADD PRIMARY KEY (`papersId`);

--
-- Indexes for table `tbl_scanf`
--
ALTER TABLE `tbl_scanf`
 ADD PRIMARY KEY (`scanf_Id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
 ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admissions`
--
ALTER TABLE `tbl_admissions`
MODIFY `admId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
MODIFY `binhluan_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `ct_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_forum`
--
ALTER TABLE `tbl_forum`
MODIFY `forum_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_papers`
--
ALTER TABLE `tbl_papers`
MODIFY `papersId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_scanf`
--
ALTER TABLE `tbl_scanf`
MODIFY `scanf_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
ADD CONSTRAINT `forum_binhluan` FOREIGN KEY (`forum_Id`) REFERENCES `tbl_forum` (`forum_Id`);

--
-- Constraints for table `tbl_forum`
--
ALTER TABLE `tbl_forum`
ADD CONSTRAINT `id_forum` FOREIGN KEY (`id`) REFERENCES `tbl_student` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
