-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 04:47 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saw-laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama`, `id_pengguna`) VALUES
(8, 'asdasd', 1),
(9, 'asdasdff', 1),
(10, 'ggg', 1),
(11, 'hdf', 1),
(12, 'jancoeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sifat` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `id_kriteria`, `nama`, `sifat`, `weight`, `id_pengguna`) VALUES
(1, 1, 'Harga', 'Cost', 0.2, 1),
(2, 2, 'Processor', 'benefit', 0.15, 1),
(3, 3, 'RAM', 'benefit', 0.15, 1),
(4, 4, 'Storage', 'benefit', 0.15, 1),
(5, 5, 'Battery Life', 'benefit', 0.1, 1),
(6, 6, 'VGA Card', 'benefit', 0.15, 1),
(7, 7, 'Layar', 'benefit', 0.1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai_alternatif`, `id_alternatif`, `id_kriteria`, `id_nilai`) VALUES
(1, 9, 1, 2),
(2, 9, 2, 8),
(3, 9, 3, 12),
(4, 9, 4, 16),
(5, 9, 5, 21),
(6, 9, 6, 24),
(7, 9, 7, 28),
(8, 10, 1, 3),
(9, 10, 2, 9),
(10, 10, 3, 12),
(11, 10, 4, 17),
(12, 10, 5, 21),
(13, 10, 6, 25),
(14, 10, 7, 29),
(15, 8, 1, 4),
(16, 8, 2, 7),
(17, 8, 3, 12),
(18, 8, 4, 17),
(19, 8, 5, 21),
(20, 8, 6, 25),
(21, 8, 7, 30),
(22, 11, 1, 2),
(23, 11, 2, 8),
(24, 11, 3, 11),
(25, 11, 4, 16),
(26, 11, 5, 19),
(27, 11, 6, 24),
(28, 11, 7, 29),
(29, 12, 1, 2),
(30, 12, 2, 7),
(31, 12, 3, 11),
(32, 12, 4, 16),
(33, 12, 5, 20),
(34, 12, 6, 24),
(35, 12, 7, 28);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilai`, `id_kriteria`, `bobot`, `keterangan`) VALUES
(1, 1, 1, '3 - 5 juta'),
(2, 1, 2, '5 - 7 juta'),
(3, 1, 3, '7 - 9 juta'),
(4, 1, 4, '> 10 juta'),
(5, 2, 1, 'Intel Pentium'),
(6, 2, 2, 'I3 atau sejenisnya'),
(7, 2, 3, 'I5 atau sejenisnya'),
(8, 2, 4, 'i7 atau sejenisnya'),
(9, 2, 5, 'i9 atau sejenisnya'),
(10, 3, 2, '1 - 2 GB'),
(11, 3, 4, '4 GB'),
(12, 3, 8, '8 GB'),
(13, 3, 16, '16 GB'),
(14, 3, 32, '>=32 GB'),
(15, 4, 256, '256 GB'),
(16, 4, 512, '512 GB'),
(17, 4, 1000, '1 TB'),
(18, 4, 2000, '>=2 TB'),
(19, 5, 6, 'Tahan 6 jam'),
(20, 5, 8, 'Tahan 8 jam'),
(21, 5, 10, 'Tahan 10 jam'),
(22, 5, 12, 'Tahan > 12 jam'),
(23, 6, 1, 'Tidak memakai VGA Card'),
(24, 6, 2, 'NVIDIA seri GeForce atau sejenisnya'),
(25, 6, 3, 'NVIDIA Seri GTX atau sejenisnya'),
(26, 6, 4, 'NVIDIA Seri RTX atau sejenisnya'),
(27, 7, 11, '11 inch'),
(28, 7, 12, '12 inch'),
(29, 7, 13, '13 inch'),
(30, 7, 14, '14 inch'),
(31, 7, 15, '15 inch');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$adEF5alThTqBKUpm0Bm0GuZg9HapKklmbeuMNA6Tx0ratl2JlApyS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai_alternatif`),
  ADD KEY `nilai_alternatif_ibfk_1` (`id_alternatif`),
  ADD KEY `nilai_alternatif_ibfk_3` (`id_nilai`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`),
  ADD CONSTRAINT `nilai_alternatif_ibfk_3` FOREIGN KEY (`id_nilai`) REFERENCES `nilai_kriteria` (`id_nilai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
