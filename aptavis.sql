-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 10:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptavis`
--

-- --------------------------------------------------------

--
-- Table structure for table `sett_akses`
--

CREATE TABLE `sett_akses` (
  `id` int(11) NOT NULL,
  `level` enum('Tamu','Member') NOT NULL,
  `nama_menu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sett_akses`
--

INSERT INTO `sett_akses` (`id`, `level`, `nama_menu`) VALUES
(1, 'Tamu', 'Developer'),
(2, 'Tamu', 'Main Menu');

-- --------------------------------------------------------

--
-- Table structure for table `sett_menu`
--

CREATE TABLE `sett_menu` (
  `nama_menu` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sett_menu`
--

INSERT INTO `sett_menu` (`nama_menu`, `id`) VALUES
('Developer', 1),
('Main Menu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sett_submenu`
--

CREATE TABLE `sett_submenu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` enum('Tersedia','Ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sett_submenu`
--

INSERT INTO `sett_submenu` (`id`, `nama_menu`, `title`, `url`, `icon`, `status`) VALUES
(1, 'Developer', 'Profile Developer', '', 'user', 'Tersedia'),
(2, 'Main Menu', 'Data Club', 'tambahKlub', 'file-text', 'Tersedia'),
(3, 'Main Menu', 'Data Skor', 'tambahSkor', 'file-plus', 'Tersedia'),
(4, 'Main Menu', 'Daftar Klasemen', 'lihatKlasemen', 'award', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_klub`
--

CREATE TABLE `tabel_klub` (
  `kode_klub` int(11) NOT NULL,
  `nama_klub` varchar(50) NOT NULL,
  `kota_klub` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_klub`
--

INSERT INTO `tabel_klub` (`kode_klub`, `nama_klub`, `kota_klub`) VALUES
(1, 'Persib Bandung', 'Kota Bandung'),
(2, 'Persija Jakarta', 'Kota Jakarta'),
(3, 'Persebaya Surabaya', 'Kota Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pertandingan`
--

CREATE TABLE `tabel_pertandingan` (
  `kode_pertandingan` int(11) NOT NULL,
  `klub_kandang` varchar(50) DEFAULT NULL,
  `skor_kandang` int(3) DEFAULT NULL,
  `point_kandang` int(1) NOT NULL,
  `klub_tandang` varchar(50) DEFAULT NULL,
  `skor_tandang` int(3) DEFAULT NULL,
  `point_tandang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pertandingan`
--

INSERT INTO `tabel_pertandingan` (`kode_pertandingan`, `klub_kandang`, `skor_kandang`, `point_kandang`, `klub_tandang`, `skor_tandang`, `point_tandang`) VALUES
(8, 'Persib Bandung', 2, 1, 'Persija Jakarta', 2, 1),
(9, 'Persebaya Surabaya', 4, 3, 'Persija Jakarta', 2, 0),
(10, 'Persib Bandung', 1, 0, 'Persebaya Surabaya', 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sett_akses`
--
ALTER TABLE `sett_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_menu` (`nama_menu`);

--
-- Indexes for table `sett_menu`
--
ALTER TABLE `sett_menu`
  ADD PRIMARY KEY (`nama_menu`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sett_submenu`
--
ALTER TABLE `sett_submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_menu` (`nama_menu`);

--
-- Indexes for table `tabel_klub`
--
ALTER TABLE `tabel_klub`
  ADD PRIMARY KEY (`kode_klub`),
  ADD UNIQUE KEY `nama_klub` (`nama_klub`);

--
-- Indexes for table `tabel_pertandingan`
--
ALTER TABLE `tabel_pertandingan`
  ADD PRIMARY KEY (`kode_pertandingan`),
  ADD UNIQUE KEY `klub_kandang` (`klub_kandang`,`klub_tandang`),
  ADD KEY `klub_tandang` (`klub_tandang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sett_akses`
--
ALTER TABLE `sett_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sett_menu`
--
ALTER TABLE `sett_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sett_submenu`
--
ALTER TABLE `sett_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tabel_klub`
--
ALTER TABLE `tabel_klub`
  MODIFY `kode_klub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_pertandingan`
--
ALTER TABLE `tabel_pertandingan`
  MODIFY `kode_pertandingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sett_akses`
--
ALTER TABLE `sett_akses`
  ADD CONSTRAINT `sett_akses_ibfk_1` FOREIGN KEY (`nama_menu`) REFERENCES `sett_menu` (`nama_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sett_submenu`
--
ALTER TABLE `sett_submenu`
  ADD CONSTRAINT `sett_submenu_ibfk_1` FOREIGN KEY (`nama_menu`) REFERENCES `sett_menu` (`nama_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tabel_pertandingan`
--
ALTER TABLE `tabel_pertandingan`
  ADD CONSTRAINT `tabel_pertandingan_ibfk_1` FOREIGN KEY (`klub_kandang`) REFERENCES `tabel_klub` (`nama_klub`),
  ADD CONSTRAINT `tabel_pertandingan_ibfk_2` FOREIGN KEY (`klub_tandang`) REFERENCES `tabel_klub` (`nama_klub`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
