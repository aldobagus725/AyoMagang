-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 09:08 PM
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
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `siup` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_perusahaan`, `nama_perusahaan`, `username`, `siup`, `alamat`, `telepon`, `email`, `password`) VALUES
(3, 'admin', 'admin', 123, 'jl.admin', '123', 'admin@gmail.com', 'admin'),
(4, 'test', 'test', 456, 'jl.test', '456', 'test@gmail.com', 'test');

-- --------------------------------------------------------

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
-- Dumping data for table `open_app`
--

INSERT INTO `open_app` (`id_openapp`, `id_perusahaan`, `nama_perusahaan`, `author`, `alamat_perusahaan`, `telepon`, `bidang_perusahaan`, `syarat_magang`) VALUES
(7, 4, 'test', 'lesti test', 'jl.test', '456', 'website', 'bisa buat web\r\n'),
(8, 3, 'admin', 'admin', 'jl.admin', '123', 'web', 'web\r\n'),
(10, 3, 'admin', 'admin2', 'jl.admin', '123', 'admin2', 'admin2'),
(11, 4, 'test', 'test2', 'jl.test', '456', 'test2', 'test2'),
(12, 4, 'test', 'test3', 'jl.test', '456', 'test3', 'test3');

-- --------------------------------------------------------

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
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `nama_lengkap`, `username`, `nis`, `alamat`, `telepon`, `email`, `password`) VALUES
(1, 'awidya andika', 'aan', 123, 'jl. aan', '085848834566', 'aan@gmail.com', 'aan'),
(4, 'wulan', 'wulan', 123, 'jl.wulan', '123', 'wulan@gmail.com', 'wulan'),
(5, 'ana', 'ana', 1234, '1234', '1234', 'ana@gmail.com', 'ana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `open_app`
--
ALTER TABLE `open_app`
  ADD PRIMARY KEY (`id_openapp`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `open_app`
--
ALTER TABLE `open_app`
  MODIFY `id_openapp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
