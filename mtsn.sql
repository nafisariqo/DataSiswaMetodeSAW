-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2021 at 11:43 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mtsn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(2, 'mantap', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'solimi', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `kode_alternatif` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `juara` int(11) DEFAULT NULL,
  `sikap` int(11) DEFAULT NULL,
  `organisasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_siswa`, `kode_alternatif`, `nilai`, `juara`, `sikap`, `organisasi`) VALUES
(2, 1, 'A1', 3, 3, 2, 1),
(5, 4, 'A2', 4, 3, 1, 1),
(6, 5, 'A3', 4, 2, 2, 1),
(7, 6, 'A4', 3, 2, 2, 2),
(8, 7, 'A5', 4, 1, 1, 1),
(9, 8, 'A6', 2, 3, 2, 2),
(10, 9, 'A7', 3, 4, 1, 2),
(11, 10, 'A8', 3, 1, 1, 2),
(12, 11, 'A9', 4, 3, 1, 2),
(13, 12, 'A10', 4, 2, 2, 1),
(14, 13, 'A11', 4, 3, 1, 1),
(15, 14, 'A12', 4, 2, 2, 2),
(16, 15, 'A13', 3, 3, 2, 1),
(17, 16, 'A14', 4, 2, 1, 1),
(18, 17, 'A15', 3, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `hasil` double DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(30) DEFAULT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `atribut` varchar(50) DEFAULT NULL,
  `bobot` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `atribut`, `bobot`) VALUES
(1, 'C1', 'Nilai Rata-rata Rapot', 'Benefit', '0.3'),
(3, 'C2', 'Juara', 'Benefit', '0.27'),
(4, 'C3', 'Sikap', 'Benefit', '0.23'),
(5, 'C4', 'Organisasi', 'Benefit', '0.2');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` int(11) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `nilai_siswa` decimal(5,0) DEFAULT NULL,
  `juara` varchar(100) DEFAULT NULL,
  `sikap` varchar(30) DEFAULT NULL,
  `organisasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `status`, `nilai_siswa`, `juara`, `sikap`, `organisasi`) VALUES
(1, 18979110, 'ALVIN GOZALI', 'AKTIF', '87', 'Juara harapan 1 tingkat nasional', 'sangat baik', 'aktif'),
(4, 27811023, 'BAGUS PANUNTUN', 'AKTIF', '93', 'Juara 3 tingkat nasional', 'baik', 'tidak aktif'),
(5, 14561330, 'AMELIA', 'AKTIF', '90', 'Juara 1 tingkat provinsi', 'sangat baik', 'tidak aktif'),
(6, 99230067, 'BOB YANUAR', 'AKTIF', '84', 'Juara 2 tingkat provinsi', 'sangat baik', 'aktif'),
(7, 18538221, 'CHRISTIANA HALIM', 'AKTIF', '93', 'Juara 1 tingkat kota', 'baik', 'tidak aktif'),
(8, 73446770, 'DANNY NUGROHO', 'AKTIF', '80', 'Juara 2 tingkat nasional', 'sangat baik', 'aktif'),
(9, 55711009, 'KAZAN GUNAWAN', 'AKTIF', '82', 'Juara 3 tingkat internasional', 'baik', 'aktif'),
(10, 78003454, 'OSCAR GONZALO', 'AKTIF', '85', 'Juara 1 tingkat kota', 'baik', 'aktif'),
(11, 41137760, 'RANDY HIRAWAN', 'AKTIF', '92', 'Juara 2 tingkat nasional', 'baik', 'aktif'),
(12, 16560090, 'RATNA ANGGRAINI', 'AKTIF', '94', 'Juara 2 tingkat provinsi', 'sangat baik', 'tidak aktif'),
(13, 68247700, 'SAPARUDDIN', 'AKTIF', '95', 'Juara harapan 2 tingkat nasional', 'baik', 'tidak aktif'),
(14, 29808245, 'SHINTA MOETIARA', 'AKTIF', '94', 'Juara 1 tingkat provinsi', 'sangat baik', 'aktif'),
(15, 76568320, 'SIGIT ISWANDI', 'AKTIF', '83', 'Juara 3 tingkat nasional', 'sangat baik', 'tidak aktif'),
(16, 84430025, 'TEDY JEFFREY', 'AKTIF', '90', 'Juara harapan 2 tingkat provinsi', 'sangat baik', 'tidak aktif'),
(17, 33926712, 'M. FADHIL BAIHAQI', 'AKTIF', '88', 'Juara 3 tingkat provinsi', 'baik', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
