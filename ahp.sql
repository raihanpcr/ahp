-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 08:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ir`
--

CREATE TABLE `ir` (
  `jumlah` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ir`
--

INSERT INTO `ir` (`jumlah`, `nilai`) VALUES
(1, 0),
(2, 0),
(3, 0.58),
(4, 0.9),
(5, 1.12),
(6, 1.24),
(7, 1.32),
(8, 1.41),
(9, 1.45),
(10, 1.49),
(11, 1.51),
(12, 1.48),
(13, 1.56),
(14, 1.57),
(15, 1.59);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`) VALUES
(19, 'Nanda Sudrajat'),
(20, 'Rahman Widodo'),
(21, 'Nasir Isran');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(33, 'Inovasi'),
(32, 'Prestasi'),
(31, 'Motivasi'),
(34, 'Kerja Sama Tim'),
(35, 'Disiplin'),
(36, 'Service Oriented'),
(37, 'Key Performance Indicator');

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_karyawan`
--

CREATE TABLE `perbandingan_karyawan` (
  `id` int(11) NOT NULL,
  `karyawan1` int(11) NOT NULL,
  `karyawan2` int(11) NOT NULL,
  `pembanding` int(11) NOT NULL,
  `penting` int(11) NOT NULL,
  `nilai_kepentingan` tinyint(4) NOT NULL,
  `nilai` float NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_karyawan`
--

INSERT INTO `perbandingan_karyawan` (`id`, `karyawan1`, `karyawan2`, `pembanding`, `penting`, `nilai_kepentingan`, `nilai`, `id_periode`) VALUES
(1, 19, 20, 31, 20, 2, 0.5, 2),
(2, 19, 21, 31, 19, 2, 2, 2),
(3, 20, 21, 31, 20, 3, 3, 2),
(4, 19, 20, 32, 20, 4, 0.25, 2),
(5, 19, 21, 32, 19, 3, 3, 2),
(6, 20, 21, 32, 20, 6, 6, 2),
(7, 19, 20, 33, 20, 3, 0.333333, 2),
(8, 19, 21, 33, 19, 3, 3, 2),
(9, 20, 21, 33, 20, 4, 4, 2),
(10, 19, 20, 34, 20, 2, 0.5, 2),
(11, 19, 21, 34, 19, 3, 3, 2),
(12, 20, 21, 34, 20, 6, 6, 2),
(13, 19, 20, 35, 20, 4, 0.25, 2),
(14, 19, 21, 35, 19, 3, 3, 2),
(15, 20, 21, 35, 20, 6, 6, 2),
(16, 19, 20, 36, 20, 4, 0.25, 2),
(17, 19, 21, 36, 19, 3, 3, 2),
(18, 20, 21, 36, 20, 8, 8, 2),
(19, 19, 20, 37, 20, 2, 0.5, 2),
(20, 19, 21, 37, 21, 3, 0.333333, 2),
(21, 20, 21, 37, 21, 3, 0.333333, 2);

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria1` int(11) NOT NULL,
  `kriteria2` int(11) NOT NULL,
  `penting` int(11) NOT NULL,
  `nilai_kepentingan` tinyint(4) NOT NULL,
  `nilai` float NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1`, `kriteria2`, `penting`, `nilai_kepentingan`, `nilai`, `id_periode`) VALUES
(1, 31, 32, 31, 3, 3, 2),
(2, 31, 33, 31, 3, 3, 2),
(3, 31, 34, 31, 5, 5, 2),
(4, 31, 35, 31, 3, 3, 2),
(5, 31, 36, 31, 5, 5, 2),
(6, 31, 37, 31, 4, 4, 2),
(7, 32, 33, 32, 2, 2, 2),
(8, 32, 34, 32, 3, 3, 2),
(9, 32, 35, 32, 3, 3, 2),
(10, 32, 36, 32, 2, 2, 2),
(11, 32, 37, 32, 3, 3, 2),
(12, 33, 34, 33, 3, 3, 2),
(13, 33, 35, 33, 5, 5, 2),
(14, 33, 36, 33, 4, 4, 2),
(15, 33, 37, 33, 2, 2, 2),
(16, 34, 35, 34, 2, 2, 2),
(17, 34, 36, 34, 1, 1, 2),
(18, 34, 37, 34, 3, 3, 2),
(19, 35, 36, 35, 2, 2, 2),
(20, 35, 37, 35, 1, 1, 2),
(21, 36, 37, 36, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `nama_periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `nama_periode`) VALUES
(2, '2020'),
(3, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `pv_karyawan`
--

CREATE TABLE `pv_karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_karyawan`
--

INSERT INTO `pv_karyawan` (`id`, `id_karyawan`, `id_kriteria`, `nilai`, `id_periode`) VALUES
(1, 19, 31, 0.297258, 2),
(2, 20, 31, 0.538961, 2),
(3, 21, 31, 0.163781, 2),
(4, 19, 32, 0.221324, 2),
(5, 20, 32, 0.685294, 2),
(6, 21, 32, 0.0933824, 2),
(7, 19, 33, 0.272099, 2),
(8, 20, 33, 0.607962, 2),
(9, 21, 33, 0.119939, 2),
(10, 19, 34, 0.3, 2),
(11, 20, 34, 0.6, 2),
(12, 21, 34, 0.1, 2),
(13, 19, 35, 0.221324, 2),
(14, 20, 35, 0.685294, 2),
(15, 21, 35, 0.0933824, 2),
(16, 19, 36, 0.206439, 2),
(17, 20, 36, 0.714646, 2),
(18, 21, 36, 0.0789141, 2),
(19, 19, 37, 0.159259, 2),
(20, 20, 37, 0.251852, 2),
(21, 21, 37, 0.588889, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pv_kriteria`
--

CREATE TABLE `pv_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pv_kriteria`
--

INSERT INTO `pv_kriteria` (`id_kriteria`, `nilai`, `id_periode`) VALUES
(31, 0.345262, 2),
(32, 0.184857, 2),
(33, 0.181276, 2),
(34, 0.0900188, 2),
(35, 0.0715707, 2),
(36, 0.069599, 2),
(37, 0.0574165, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_karyawan` int(11) NOT NULL,
  `nilai` float NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_karyawan`, `nilai`, `id_periode`) VALUES
(19, 0.259228, 2),
(20, 0.59023, 2),
(21, 0.150541, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('Admin','Pimpinan','HRD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `password`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin', 'Admin'),
(3, 'Pimpinan', 'pimpinan', 'pimpinan', 'Pimpinan'),
(4, 'HRD', 'hrd', 'hrd', 'HRD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ir`
--
ALTER TABLE `ir`
  ADD PRIMARY KEY (`jumlah`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_karyawan`
--
ALTER TABLE `perbandingan_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_karyawan`
--
ALTER TABLE `pv_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pv_kriteria`
--
ALTER TABLE `pv_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `perbandingan_karyawan`
--
ALTER TABLE `perbandingan_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pv_karyawan`
--
ALTER TABLE `pv_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
