-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 27, 2021 lúc 03:31 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `school`
--
CREATE DATABASE IF NOT EXISTS `school` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `school`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_term`
--

CREATE TABLE `exam_term` (
  `id` int(12) NOT NULL,
  `name` varchar(450) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `exam_term`
--

INSERT INTO `exam_term` (`id`, `name`) VALUES
(6, 'mid_term_1'),
(5, 'first_term');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(12) NOT NULL,
  `website_name` varchar(400) NOT NULL,
  `website_address` varchar(500) NOT NULL,
  `website_phone1` varchar(30) NOT NULL,
  `website_phone2` varchar(30) NOT NULL,
  `website_email1` varchar(200) NOT NULL,
  `website_email2` varchar(200) NOT NULL,
  `website_start` varchar(25) NOT NULL,
  `web_about` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `general_setting`
--

INSERT INTO `general_setting` (`id`, `website_name`, `website_address`, `website_phone1`, `website_phone2`, `website_email1`, `website_email2`, `website_start`, `web_about`) VALUES
(5, 'HiKy', 'banhvanky', '0366898146', '0973905834', 'banhvanky150899@gmail.com', 'banhvanky150899@gmail.com', '2000', 'not you');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `exam_term`
--
ALTER TABLE `exam_term`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `exam_term`
--
ALTER TABLE `exam_term`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
