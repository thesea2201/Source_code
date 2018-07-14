-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2016 at 04:45 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qlgv`
--

-- --------------------------------------------------------

--
-- Table structure for table `bomon`
--

CREATE TABLE IF NOT EXISTS `bomon` (
  `MABOMON` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `TENBOMON` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `MAKHOA` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bomon`
--

INSERT INTO `bomon` (`MABOMON`, `TENBOMON`, `MAKHOA`) VALUES
('MBM01', 'Hệ Thống Thông Tin Quản Lý', 'MK01'),
('MBM02', 'Hệ Thống Thông Tin Thông Minh', 'MK01'),
('BM_001', 'Thương mại điện tử ', 'MK01'),
('0909', 'thương mại', 'MK01');

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE IF NOT EXISTS `giaovien` (
  `MAGIAOVIEN` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `TENGIAOVIEN` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `GIOITINH` tinyint(1) NOT NULL,
  `MABOMON` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`MAGIAOVIEN`, `TENGIAOVIEN`, `GIOITINH`, `MABOMON`) VALUES
('98', 'akhk ', 1, 'MBM01'),
('MGV01', 'Nguyễn Văn Tín ', 1, 'MBM01'),
('MGV02', 'Nguyễn Hữu Toàn', 1, 'MBM01'),
('MGV03', 'Lê Thị Vi', 0, 'MBM01'),
('MGV04', 'Trần Thị Nhung', 0, 'MBM02'),
('MGV05', 'Trần Thị Tú', 0, 'MBM02');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE IF NOT EXISTS `khoa` (
  `MAKHOA` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `TENKHOA` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MAKHOA`, `TENKHOA`) VALUES
('MK01', 'Khoa Hệ Thống Thông Tin'),
('MK02', 'Khoa Mạng Máy Tính và Truyền Thông'),
('MK03', 'Khoa công Nghệ Phần Mềm'),
('MK04', 'Khoa Kỹ Thuật Máy Tính');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bomon`
--
ALTER TABLE `bomon`
 ADD PRIMARY KEY (`MABOMON`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
 ADD PRIMARY KEY (`MAGIAOVIEN`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
 ADD PRIMARY KEY (`MAKHOA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
