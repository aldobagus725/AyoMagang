-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 02:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayomagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--


CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `siup` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `superadmin`
--


CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nis` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `open_app`
--

CREATE TABLE `open_app` (
  `id_openapp` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `bidang_perusahaan` varchar(100) NOT NULL,
  `syarat_magang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id_aplikasi` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat_perusahaan` varchar(100) NOT NULL,
  `nama_murid` varchar(100) NOT NULL,
  `alamat murid` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `bidang_perusahaan` varchar(100) NOT NULL,
  `syarat_magang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `open_app`
--
ALTER TABLE `open_app`
  ADD PRIMARY KEY (`id_openapp`);
  
  --
-- Indexes for table `open_app`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_openapp`);
  
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
  
--
-- AUTO_INCREMENT for table `open_app`
--
ALTER TABLE `open_app`
  MODIFY `id_openapp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000;
  
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;
COMMIT;


--
-- Dumping data for table `company`
--

INSERT INTO `company` (`nama_perusahaan`, `username`, `siup`, `alamat`, `telepon`, `email`, `password`) VALUES
('PT Persemakmuran', 'margarin', 123, '123', '123', 'margarin@gmail.com', 'margarin');

-- --------------------------------------------------------

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`fullname`, `username`, `email`, `password`) VALUES
('Margarin', 'admin', 'margarin@gmail.com', 'margarin');

-- --------------------------------------------------------

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nama_lengkap`, `username`, `nis`, `alamat`, `telepon`, `email`, `password`) VALUES
('awidya andika', 'aan', 123, 'jl. aan', '085848834566', 'aan@gmail.com', 'aan'),
('wulan', 'wulan', 123, 'jl.wulan', '123', 'wulan@gmail.com', 'wulan'),
('ana', 'ana', 1234, '1234', '1234', 'ana@gmail.com', 'ana');

--
-- Dumping data for table `open_app`
--

INSERT INTO `open_app` (`id_perusahaan`, `nama_perusahaan`, `author`, `alamat_perusahaan`, `telepon`, `bidang_perusahaan`, `syarat_magang`) VALUES
(990, 'admin', 'admin', 'jl.admin', '123', 'web', 'web\r\n'),
(991, 'admin', 'admin2', 'jl.admin', '123', 'admin2', 'admin2'),
(992, 'test', 'test', 'jl.test', '456', 'website', 'html'),
(993, 'test', 'test2', 'jl.test', '456', 'marketing', 'bisa ngitung');

-- --------------------------------------------------------



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
