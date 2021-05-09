CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `sifat` varchar(255) NOT NULL,
  `weight` float NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nilai_alternatif` (
  `id_nilai_alternatif` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `nilai_kriteria` (
  `id_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai_alternatif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

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
