-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 03:49 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayomagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int NOT NULL,
  `student_id` int NOT NULL,
  `company_id` int NOT NULL,
  `vacancies_id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `vacancy_title` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `student_id`, `company_id`, `vacancies_id`, `company_name`, `vacancy_title`, `company_address`, `company_email`, `student_name`, `student_address`, `status`, `create_time`) VALUES
(5001, 1000, 2000, 4001, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'persemakmuran@gmail.com', 'I Putu Senna Hakkinanda', 'Pantai Nyanyi, Pandak Gede, Tabanan, Bali', '1', '2020-10-28 02:01:39'),
(5002, 1001, 2000, 4001, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'persemakmuran@gmail.com', 'Rukma Wira', 'Ratna, Denpasar, Bali, Indonesia', '1', '2020-10-28 22:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `siup` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `username`, `password`, `siup`, `address`, `phone`, `email`, `create_time`) VALUES
(2000, 'PT Persemakmuran', 'margarin', '0787fc61120663910846377982559f8c', '009-27-102-199', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', '08123456789', 'persemakmuran@gmail.com', '2020-10-17 10:22:17'),
(2001, 'PT Unilever', 'unilever', '01286de8e07e6e4aa33b773f9d89c3bf', '123-456-789-10', '', '', 'unilever@gmail.com', '2020-10-17 14:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int NOT NULL,
  `req_title` varchar(100) NOT NULL,
  `req_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `req_title`, `req_detail`, `status`) VALUES
(8002, 'Form Pembatalan Pengajuan KP 5001', 'COVISDNYA GILA CUK!', 1),
(8003, 'Form Perubahan NIS/NIM Siswa 1000', 'pindah kampus cuk\r\n\r\nni yang baru:\r\n\r\n123654', 1),
(8004, 'Form Pembatalan Pengajuan KP 5001', 'COVID CUk! Gak Punya Bensin gak bisa pergi!', 1),
(8005, 'Form Pembatalan Pengajuan KP 5001', 'CUK MAU jalan cuk! mantap', 1),
(8006, 'Form Pembatalan Pengajuan KP 5002', 'Kemarin ken a PHK pak, sya dropout maaf', 1),
(8007, 'Form Pembatalan Pengajuan KP 5002', 'Mohon pak supaya bisa diperbaiki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `student_number` varchar(100) NOT NULL,
  `institution_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fullname`, `username`, `password`, `student_number`, `institution_name`, `address`, `phone`, `email`, `course`, `create_time`) VALUES
(1000, 'I Putu Senna Hakkinanda', 'senna', '202cb962ac59075b964b07152d234b70', '1700304', 'ITB STIKOM BALI', 'Pantai Nyanyi, Pandak Gede, Tabanan, Bali', '082214619304', 'senna@gmail.com', 'Teknologi', '2020-10-17 10:22:17'),
(1001, 'Rukma Wira', 'rukma', '0e3b9179e7a26c1007ac81b803ec191e', '1709123891', 'ITB STIKOM BALI', 'Ratna, Denpasar, Bali, Indonesia', '08123642113', 'rukma@gmail.com', 'Akuntansi', '2020-10-17 13:43:55'),
(1002, 'Wulandari Maharani', 'wulan', 'e10adc3949ba59abbe56e057f20f883e', '17211231', 'ITB STIKOM Bali', 'Jln. Badak Agung, Renon, Denpasar, Bali', '08123642113', 'wulan@wulan.com', 'Teknologi', '2020-10-23 01:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `superadmin_id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superadmin_id`, `fullname`, `username`, `email`, `password`) VALUES
(3000, 'Rivaldo Bagus', 'admin', 'aldo@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `vacancies`
--

CREATE TABLE `vacancies` (
  `vacancies_id` int NOT NULL,
  `company_id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `vacancy_title` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_speciality` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `intern_policies` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`vacancies_id`, `company_id`, `company_name`, `vacancy_title`, `company_address`, `company_speciality`, `phone`, `intern_policies`, `author`, `create_time`) VALUES
(4000, 2000, 'PT Persemakmuran', 'KP Web Developer di PT Persemakmuran', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'Web Developer', '08123456789', 'Bisa PHP, HTML5, CSS3', 'admin', '2020-10-17 10:22:17'),
(4001, 2000, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'Teknologi', '08123456789', '- Bisa Mikrotik- Paham LAN', 'HRD Teknologi Margarin', '2020-10-17 11:23:02'),
(4002, 2000, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'Akutansi', '08123456789', '- Bisa SPSS - Bisa Excel - Paham ilmu akutansi', 'HRD Akuntansi Margarin', '2020-10-26 12:13:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5003;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8008;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadmin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3001;

--
-- AUTO_INCREMENT for table `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `vacancies_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
