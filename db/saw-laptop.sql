-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 02:57 PM
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
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sifat` varchar(255) NOT NULL,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `sifat`, `weight`) VALUES
(1, 'Harga', 'cost', 0.2),
(2, 'Processor', 'benefit', 0.15),
(3, 'RAM', 'benefit', 0.15),
(4, 'Storage', 'benefit', 0.15),
(5, 'Battery Life', 'benefit', 0.1),
(6, 'VGA Card', 'benefit', 0.15),
(7, 'Layar', 'benefit', 0.1);

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
(1, 1, 0.25, '3 - 5 juta'),
(2, 1, 0.5, '5 - 7 juta'),
(3, 1, 0.75, '7 - 9 juta'),
(4, 1, 1, '>= 10 juta'),
(5, 2, 0.2, 'Intel Pentium'),
(6, 2, 0.4, 'Intel I3 atau sejenisnya'),
(7, 2, 0.6, 'Intel I5 atau sejenisnya'),
(8, 2, 0.8, 'Intel I7 atau sejenisnya'),
(9, 2, 1, 'Intel I9 atau sejenisnya'),
(10, 3, 0.2, '1 - 2 GB'),
(11, 3, 0.4, '4 GB'),
(12, 3, 0.6, '8 GB'),
(13, 3, 0.8, '16 GB'),
(14, 3, 1, '>=32 GB'),
(15, 4, 0.25, '256 GB'),
(16, 4, 0.5, '512 GB'),
(17, 4, 0.75, '1 TB'),
(18, 4, 1, '>=2 TB'),
(19, 5, 0.25, 'Tahan 6 jam'),
(20, 5, 0.5, 'Tahan 8 jam'),
(21, 5, 0.75, 'Tahan 10 jam'),
(22, 5, 1, 'Tahan > 12 jam'),
(23, 6, 0.25, 'Tidak memakai VGA Card'),
(24, 6, 0.5, 'NVIDIA seri GeForce atau sejenisnya'),
(25, 6, 0.75, 'Nvidia Seri GTX atau sejenisnya'),
(26, 6, 1, 'NVIDIA Seri RTX atau sejenisnya'),
(27, 7, 0.2, '11 inch'),
(28, 7, 0.4, '12 inch'),
(29, 7, 0.6, '13 inch'),
(30, 7, 0.8, '14 inch'),
(31, 7, 1, '15 inch');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai_kriteria` (`id_nilai`),
  ADD CONSTRAINT `alternatif_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`),
  ADD CONSTRAINT `alternatif_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
