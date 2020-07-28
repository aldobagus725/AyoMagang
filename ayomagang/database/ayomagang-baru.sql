-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2020 pada 21.51
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

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
-- Struktur dari tabel `application`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
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
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `username`, `password`, `siup`, `address`, `phone`, `email`) VALUES
(2000, 'PT Persemakmuran', 'margarin', 'margarin', '009-27-102-199', 'Badung, Bali', '08123456789', 'persemakmuran@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `student`
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
-- Dumping data untuk tabel `student`
--

INSERT INTO `student` (`student_id`, `fullname`, `username`, `password`, `student_number`, `institution_name`, `address`, `phone`, `email`) VALUES
(1000, 'awidya andika', 'aan', 'aan', '1700212', 'ITB STIKOM Bali', 'jl. aan', '085848834566', 'aan@gmail.com'),
(1001, 'wulan', 'wulan', 'wulan', '1700213', 'Universitas Udayana', 'jl.wulan', '123', 'wulan@gmail.com'),
(1002, 'ana', 'ana', 'ana', '1700214', 'Universitas Warmadewa', '1234', '1234', 'ana@gmail.com'),
(1003, 'Senna Hakkinanda', 'senna', 'senna', '1700304', 'ITB STIKOM BALI', 'Tabanan', '082214619304', 'senna@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `superadmin`
--

CREATE TABLE `superadmin` (
  `superadmin_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `superadmin`
--

INSERT INTO `superadmin` (`superadmin_id`, `fullname`, `username`, `email`, `password`) VALUES
(3000, 'Rivaldo Bagus', 'admin', 'aldo@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vacancies`
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
-- Dumping data untuk tabel `vacancies`
--

INSERT INTO `vacancies` (`vacancies_id`, `company_id`, `company_name`, `company_address`, `company_speciality`, `phone`, `intern_policies`, `author`) VALUES
(4000, 2000, 'PT Persemakmuran', 'jl.admin', 'web', '123', 'web\r\n', 'admin'),
(4001, 2000, 'PT Persemakmuran', 'jl.admin', 'admin2', '123', 'admin2', 'admin2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indeks untuk tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indeks untuk tabel `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`superadmin_id`);

--
-- Indeks untuk tabel `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`vacancies_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;

--
-- AUTO_INCREMENT untuk tabel `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT untuk tabel `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `superadmin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3001;

--
-- AUTO_INCREMENT untuk tabel `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `vacancies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
