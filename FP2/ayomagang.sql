-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 07:03 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
--
-- Dumping data untuk tabel `application`
--
INSERT INTO `application` (`application_id`, `student_id`, `company_id`, `vacancies_id`, `company_name`, `vacancy_title`, `company_address`, `company_email`, `student_name`, `student_address`, `status`, `create_time`) VALUES
(5001, 1000, 2000, 4001, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'persemakmuran@gmail.com', 'I Putu Senna Hakkinanda', 'Pantai Nyanyi, Pandak Gede, Tabanan, Bali', '1', '2020-10-28 02:01:39');
--
-- Table structure for table `chat_message`
--
CREATE TABLE `chat_message` (
  `chat_message_id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `chat_message` mediumtext CHARACTER SET utf8mb4 NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data for table `chat_message`
--
INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(2, 3003, 18, 'selamat malam admin', '2020-11-29 19:45:24', 2),
(3, 3003, 18, 'selamat malam admin masih bangun?', '2020-11-29 20:20:40', 1),
(4, 3000, 18, 'selamat malam admin masih bangun ?', '2020-11-29 20:21:31', 0),
(5, 3000, 18, 'p', '2020-11-29 20:21:37', 2),
(6, 3000, 18, 'p', '2020-11-29 20:21:48', 2),
(7, 3000, 1, 'halo selamat malam admin!', '2020-11-30 16:00:59', 0),
(8, 1, 3000, 'selamat malam ada yang bisa saya bantu?😀', '2020-11-30 16:02:36', 0),
(9, 3000, 18, 'selamat malam admin, masih ok kah?\n\n', '2020-11-30 16:03:09', 0),
(10, 18, 3000, 'malam, gimana bro?', '2020-11-30 16:04:17', 0);
-- --------------------------------------------------------
--
-- Table structure for table `company`
--
CREATE TABLE `company` (
  `company_id` int NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `siup` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `aktif` enum('1','0') NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data untuk tabel `company`
--
INSERT INTO `company` (`company_id`, `company_name`, `username`, `password`, `siup`, `address`, `phone`, `email`, `token`, `aktif`, `create_time`) VALUES
(2000, 'PT Persemakmuran1', 'margarin', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS', '009-27-102-199', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng1', '081234567891', 'awidyaml@gmail.com', '', '1', '2020-10-17 10:22:17'),
(2001, 'PT Unilever', 'unilever', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS', '123-456-789-10', '', '', 'unilever@gmail.com', '', '1', '2020-10-17 14:08:22');
-- --------------------------------------------------------
--
-- Table structure for table `login_details`
--
CREATE TABLE `login_details` (
  `login_details_id` int NOT NULL,
  `user_id` int NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data for table `login_details`
--
INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 0, '2020-11-30 06:34:17', 'no'),
(2, 0, '2020-11-30 11:45:41', 'no'),
(3, 0, '2020-11-30 10:46:20', 'no'),
(4, 0, '2020-11-30 10:49:44', 'no'),
(5, 0, '2020-11-30 11:09:55', 'no'),
(6, 0, '2020-11-30 11:10:17', 'no'),
(7, 0, '2020-11-30 11:11:26', 'no'),
(8, 0, '2020-11-30 16:00:30', 'no'),
(9, 3000, '2020-11-30 15:54:21', 'no'),
(10, 3000, '2020-11-30 16:07:09', 'no'),
(11, 18, '2020-11-30 17:02:28', 'no'),
(12, 1, '2020-11-30 17:37:14', 'no'),
(13, 18, '2020-11-30 17:48:33', 'no');
-- -------------------------------------------------------
--
-- Table structure for table `request`
--
CREATE TABLE `request` (
  `req_id` int NOT NULL,
  `req_title` varchar(100) NOT NULL,
  `req_detail` longtext NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
--
-- Dumping data untuk tabel `request`
--
INSERT INTO `request` (`req_id`, `req_title`, `req_detail`, `status`) VALUES
(8002, 'Form Pembatalan Pengajuan KP 5001', 'Sorry sir, need to cancel due to covid', 1),
(8003, 'Form Perubahan NIS/NIM Siswa 1000', 'pindah kampus to UNUD\r\n\r\ini yang baru:\r\n\r\n123654', 1);

--
-- Table structure for table `resetpasswords`
--
CREATE TABLE `resetpasswords` (
  `id` int NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `student`
--
CREATE TABLE `student` (
  `student_id` int NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `student_number` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `institution_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `aktif` enum('1','0') NOT NULL,
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
--
-- Dumping data untuk tabel `student`
--
INSERT INTO `student` (`student_id`, `fullname`, `username`, `password`, `student_number`, `institution_name`, `address`, `phone`, `email`, `course`, `token`, `aktif`, `create_time`) VALUES
(1000, 'I Putu Senna Hakkinanda', 'senna', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS', '1700304', 'ITB STIKOM BALI', 'Pantai Nyanyi, Pandak Gede, Tabanan, Bali', '082214619304', 'senna@gmail.com', 'Teknologi', '', '1', '2020-10-17 10:22:17');
--
-- Table structure for table `superadmin`
--
CREATE TABLE `superadmin` (
  `superadmin_id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
--
-- Dumping data untuk tabel `superadmin`
--
INSERT INTO `superadmin` (`superadmin_id`, `fullname`, `username`, `email`, `password`) VALUES
(3000, 'Rivaldo Bagus', 'aldobagus', 'aldo@gmail.com', '$2y$10$N.z5rBBOnMHY8vhNvPLSJeVbWLCTYJRVS4Qdi9AaiAad.HccUfWGS');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Dumping data untuk tabel `vacancies`
--
INSERT INTO `vacancies` (`vacancies_id`, `company_id`, `company_name`, `vacancy_title`, `company_address`, `company_speciality`, `phone`, `intern_policies`, `author`, `create_time`) VALUES
(4001, 2000, 'PT Persemakmuran', 'KP Networking', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'Teknologi', '08123456789', '- Bisa Mikrotik- Paham LAN', 'HRD Teknologi Margarin', '2020-10-17 11:23:02'),
(4002, 2000, 'PT Persemakmuran', 'KP Akutansi', 'Ki. Moch. Toha No. 731, Gorontalo 28888, JaTeng', 'Akutansi', '08123456789', '- Bisa SPSS - Bisa Excel - Paham ilmu akutansi', 'HRD Akuntansi Margarin', '2020-10-26 12:13:19');
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
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5003;

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
  MODIFY `login_details_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `req_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8008;

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
