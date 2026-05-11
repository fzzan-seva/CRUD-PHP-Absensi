-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2026 at 01:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_siswa_xipplg2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa_xipplg2`
--

CREATE TABLE `absensi_siswa_xipplg2` (
  `id` int NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `absensi_siswa_xipplg2`
--

INSERT INTO `absensi_siswa_xipplg2` (`id`, `nama_siswa`, `keterangan`, `tanggal`) VALUES
(6, 'rapliiirodi', 'Hadir', '2026-05-08'),
(7, 'fauzansepppppp', 'Hadir', '2026-05-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_siswa_xipplg2`
--
ALTER TABLE `absensi_siswa_xipplg2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_siswa_xipplg2`
--
ALTER TABLE `absensi_siswa_xipplg2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
