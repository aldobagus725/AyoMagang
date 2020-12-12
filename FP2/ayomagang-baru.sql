-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 04:25 PM
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
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_pengajuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `student_id`, `company_id`, `vacancies_id`, `company_name`, `vacancy_title`, `company_address`, `company_email`, `student_name`, `student_address`, `status`, `create_time`, `file_pengajuan`) VALUES
(5001, 1000, 2000, 4001, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'persemakmuran@gmail.com', 'I Putu Senna Hakkinanda', 'Pantai Nyanyi, Pandak Gede, Tabanan, Bali', '1', '2020-10-28 02:01:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `chat_message` mediumtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(2, 3003, 18, 'selamat malam admin', '2020-11-29 11:45:24', 2),
(3, 3003, 18, 'selamat malam admin masih bangun?', '2020-11-29 12:20:40', 1),
(4, 3000, 18, 'selamat malam admin masih bangun ?', '2020-11-29 12:21:31', 0),
(5, 3000, 18, 'p', '2020-11-29 12:21:37', 2),
(6, 3000, 18, 'p', '2020-11-29 12:21:48', 2),
(7, 3000, 1, 'halo selamat malam admin!', '2020-11-30 08:00:59', 0),
(8, 1, 3000, 'selamat malam ada yang bisa saya bantu?😀', '2020-11-30 08:02:36', 0),
(9, 3000, 18, 'selamat malam admin, masih ok kah?\n\n', '2020-11-30 08:03:09', 0),
(10, 18, 3000, 'malam, gimana bro?', '2020-11-30 08:04:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `siup` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `aktif` enum('1','0') NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `username`, `password`, `siup`, `address`, `phone`, `email`, `token`, `aktif`, `create_time`, `profile_picture`) VALUES
(2000, 'PT Persemakmuran1', 'margarin', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS', '009-27-102-199', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng1', '081234567891', 'awidyaml@gmail.com', '', '1', '2020-10-17 10:22:17', '704668583_shutterstock_88454563.jpg'),
(2001, 'PT Unilever', 'unilever', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS', '123-456-789-10', '', '', 'unilever@gmail.com', '', '1', '2020-10-17 14:08:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int NOT NULL,
  `user_id` int NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 0, '2020-11-29 22:34:17', 'no'),
(2, 0, '2020-11-30 03:45:41', 'no'),
(3, 0, '2020-11-30 02:46:20', 'no'),
(4, 0, '2020-11-30 02:49:44', 'no'),
(5, 0, '2020-11-30 03:09:55', 'no'),
(6, 0, '2020-11-30 03:10:17', 'no'),
(7, 0, '2020-11-30 03:11:26', 'no'),
(8, 0, '2020-11-30 08:00:30', 'no'),
(9, 3000, '2020-11-30 07:54:21', 'no'),
(10, 3000, '2020-11-30 08:07:09', 'no'),
(11, 18, '2020-11-30 09:02:28', 'no'),
(12, 1, '2020-11-30 09:37:14', 'no'),
(13, 18, '2020-11-30 09:48:33', 'no'),
(14, 2000, '2020-12-02 03:59:54', 'no'),
(15, 2000, '2020-12-02 04:03:00', 'no'),
(16, 2000, '2020-12-02 06:31:48', 'no'),
(17, 1000, '2020-12-02 06:33:50', 'no'),
(18, 2000, '2020-12-02 07:55:43', 'no'),
(19, 2000, '2020-12-06 14:25:33', 'no'),
(20, 2000, '2020-12-07 15:03:54', 'no'),
(21, 3000, '2020-12-07 18:13:09', 'no'),
(22, 1000, '2020-12-08 14:24:11', 'no'),
(23, 2000, '2020-12-08 14:25:57', 'no'),
(24, 1000, '2020-12-08 14:26:32', 'no'),
(25, 3000, '2020-12-08 15:10:57', 'no'),
(26, 2000, '2020-12-09 18:26:55', 'no'),
(27, 1000, '2020-12-11 10:01:49', 'no'),
(28, 2000, '2020-12-11 11:38:36', 'no'),
(29, 3000, '2020-12-11 07:40:51', 'no'),
(30, 1000, '2020-12-11 15:49:01', 'no'),
(31, 2000, '2020-12-11 16:01:01', 'no'),
(32, 2000, '2020-12-11 16:53:03', 'no'),
(33, 3000, '2020-12-11 16:03:39', 'no'),
(34, 1000, '2020-12-11 18:19:43', 'no'),
(35, 1000, '2020-12-11 18:23:03', 'no'),
(36, 1000, '2020-12-11 18:24:44', 'no'),
(37, 1000, '2020-12-12 02:08:18', 'no'),
(38, 3000, '2020-12-11 19:21:13', 'no'),
(39, 1000, '2020-12-12 14:10:23', 'no'),
(40, 2000, '2020-12-12 15:16:20', 'no'),
(41, 1000, '2020-12-12 15:21:07', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `req_id` int NOT NULL,
  `req_title` varchar(100) NOT NULL,
  `req_detail` longtext NOT NULL,
  `status` int NOT NULL,
  `formal_letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`req_id`, `req_title`, `req_detail`, `status`, `formal_letter`) VALUES
(8002, 'Form Pembatalan Pengajuan KP 5001', 'Sorry sir, need to cancel due to covid', 1, NULL),
(8003, 'Form Perubahan NIS/NIM Siswa 1000', 'pindah kampus to UNUD\r\n\rini yang baru:\r\n\r\n123654', 1, NULL),
(8008, 'Form Pembatalan Pengajuan KP 5001', 'Out because of covid sir', 0, NULL),
(8009, 'Form Perubahan NIS/NIM Siswa 1000', 'Pindah kampus pak!\r\nNIM BARU saya 17932423', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resetpasswords`
--

CREATE TABLE `resetpasswords` (
  `id` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_number` varchar(100) DEFAULT NULL,
  `institution_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(100) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `aktif` enum('1','0') NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fullname`, `username`, `password`, `student_number`, `institution_name`, `address`, `phone`, `email`, `course`, `token`, `aktif`, `create_time`, `profile_picture`) VALUES
(1000, 'I Putu Senna Hakkinanda', 'senna', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS', '1700304', 'ITB STIKOM BALI', 'Pantai Nyanyi, Pandak Gede, Tabanan, Bali', '082214619304', 'rivaldo729@gmail.com', 'Akuntansi', '', '1', '2020-10-17 10:22:17', '1196657368_3d - slamet wiyadi.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`superadmin_id`, `fullname`, `username`, `email`, `password`) VALUES
(3000, 'Rivaldo Bagus', 'aldobagus', 'aldo@gmail.com', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS');

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
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `vacancies`
--

INSERT INTO `vacancies` (`vacancies_id`, `company_id`, `company_name`, `vacancy_title`, `company_address`, `company_speciality`, `phone`, `intern_policies`, `author`, `create_time`, `views`) VALUES
(4001, 2000, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'Teknologi', '08123456789', '- Bisa Mikrotik- Paham LAN', 'HRD Teknologi Margarin', '2020-10-17 11:23:02', 1),
(4002, 2000, 'PT Persemakmuran', 'KP Akutansi', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'Akutansi', '08123456789', '- Bisa SPSS - Bisa Excel - Paham ilmu akutansi', 'HRD Akuntansi Margarin', '2020-10-26 12:13:19', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `resetpasswords`
--
ALTER TABLE `resetpasswords`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5005;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2009;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8010;

--
-- AUTO_INCREMENT for table `resetpasswords`
--
ALTER TABLE `resetpasswords`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
