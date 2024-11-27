-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 06:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis_smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_sekolah` int(250) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_sekolah`, `nama_jurusan`) VALUES
(1, 1, 'Multimedia'),
(2, 1, 'Administrasi Perkantoran'),
(3, 1, 'Akutansi'),
(4, 1, 'Perbankan'),
(5, 3, 'Akuntansi'),
(6, 3, 'Multimedia'),
(7, 4, 'Teknik Komputer dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `role` enum('admin','viewer') DEFAULT 'viewer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `email`, `id_sekolah`, `role`) VALUES
(2, 'Ica', '$2y$10$5DcW2z3kiAZ4PxsBLWjia.YuVHD.D9VQEwU7LpAm81f.1ZpCPLJoC', 'ica@gmail.com', 1, 'admin'),
(3, 'admin', '$2y$10$Xl6jZoO2023oZ2weOWizXekypYMU6LDxdR5lMzdVc01o6nIXIUiFO', 'admin@admin.com', 1, 'admin'),
(4, 'mahasiswi', '$2y$10$MIlHzRaKTFTBJElG5m3n8u7hP9f2UZcGOwEXz2Uw89yykk/czH9W.', 'mahasiswi@mahasiswi.com', 1, 'admin'),
(5, 'Pengunjung', '$2y$10$sQ90rGsUn7j1dSGN6bl1beE6xHuVPi6/OFTR5BQcwr83qezHit.pS', 'pengunjung@info.com', 4, 'viewer');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `kecamatan`, `latitude`, `longitude`, `telepon`, `website`, `email`, `gambar`) VALUES
(1, 'SMK Negeri 1 Soppeng', 'Jalan Merdeka Lapajung', 'Lalabata', '-4.340627', '119.884568', '04111222', 'SMKN1Soppeng.com', 'smkn1@gmail.com', '../uploads/smkn1.jpg'),
(3, 'SMK Negeri 2 Soppeng', 'Jalan Poros Buludua Tanjong', 'Mario Riawawo', '-4.5121649', '119.8624731', '08512311111', 'smkn2soppeng.com', 'smkn2soppeng@sekolah.com', '../uploads/sekolah2.jpeg'),
(4, 'SMKN 3 Soppeng', 'Jl. H. A, Mahmud Cangad', 'Liliriaja', '-4.375417833316881', '119.95025632221156', '(0484) 421875', 'www.smkn3soppeng.sch.id', 'info@smkn3soppeng.sch.id', '../uploads/smkn3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
