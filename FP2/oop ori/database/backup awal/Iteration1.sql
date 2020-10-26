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
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `siup` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadmin_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `student_number` varchar(100) NOT NULL,
  `institution_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `vacancies_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_speciality` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `intern_policies` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `vacancies_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);
  
--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);
  
--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadmin_id`);
  
--
-- Indexes for table `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`vacancies_id`);
  
  --
-- Indexes for table `open_app`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);
  
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
  
--
-- AUTO_INCREMENT for table `open_app`
--
ALTER TABLE `vacancies`
  MODIFY `vacancies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000;
  
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;
COMMIT;


--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `username`, `siup`, `address`, `phone`, `email`, `password`) VALUES
('PT Persemakmuran', 'margarin', '009-27-102-199', 'Badung, Bali', '08123456789', 'persemakmuran@gmail.com', 'margarin');

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`fullname`, `username`, `email`, `password`) VALUES
('Rivaldo Bagus', 'admin', 'aldo@gmail.com', 'admin');


--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fullname`, `username`, `student_number`, `institution_name`, `address`, `phone`, `email`, `password`) VALUES
('awidya andika', 'aan', 1700212,'ITB STIKOM Bali', 'jl. aan', '085848834566', 'aan@gmail.com', 'aan'),
('wulan', 'wulan', 1700213, 'Universitas Udayana', 'jl.wulan', '123', 'wulan@gmail.com', 'wulan'),
('ana', 'ana', 1700214,'Universitas Warmadewa', '1234', '1234', 'ana@gmail.com', 'ana');

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`company_id`, `company_name`, `author`, `company_address`, `phone`, `company_speciality`, `intern_policies`) VALUES
(990, 'admin', 'admin', 'jl.admin', '123', 'web', 'web\r\n'),
(991, 'admin', 'admin2', 'jl.admin', '123', 'admin2', 'admin2'),
(992, 'test', 'test', 'jl.test', '456', 'website', 'html'),
(993, 'test', 'test2', 'jl.test', '456', 'marketing', 'bisa ngitung');

-- --------------------------------------------------------



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
