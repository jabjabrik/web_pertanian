-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 05:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertanian`
--

-- --------------------------------------------------------

--
-- Table structure for table `petani`
--

CREATE TABLE `petani` (
  `id_petani` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_tanah` decimal(2,1) NOT NULL DEFAULT 0.0,
  `jenis_tanaman_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tanaman_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tanaman_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_sppt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`id_petani`, `nik`, `nama`, `alamat`, `rt`, `rw`, `luas_tanah`, `jenis_tanaman_1`, `jenis_tanaman_2`, `jenis_tanaman_3`, `foto_sppt`) VALUES
(1, '3574046665682140', 'abdul karim', 'sumberkledung', '02', '04', '3.5', 'jagung', 'jagung', 'jagung', 'sppt_1122.png'),
(2, '3574046665685576', 'bambang edi', 'sumberkledung', '02', '04', '4.2', 'padi', 'padi', 'jagung', 'sppt_1144.png'),
(3, '3574046665686645', 'agus selamet', 'sumberkledung', '01', '04', '5.3', 'jagung', 'bawang', 'padi', 'sppt_1456.png'),
(4, '3574046665681123', 'ahmad budi', 'sumberkledung', '02', '03', '3.5', 'jagung', 'bawang', 'padi', 'sppt_1654.png'),
(5, '3574046665644673', 'winarto', 'sumberkledung', '01', '04', '3.5', 'padi', 'jagung', 'bawang', 'sppt_3322.png');

-- --------------------------------------------------------

--
-- Table structure for table `subsidi_pupuk`
--

CREATE TABLE `subsidi_pupuk` (
  `id_subsidi` bigint(20) UNSIGNED NOT NULL,
  `id_petani` bigint(20) UNSIGNED NOT NULL,
  `jenis_pupuk_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pupuk_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pupuk_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `validasi_bpp` enum('proses','ditolak','disetujui') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `validasi_desa` enum('proses','ditolak','disetujui') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsidi_pupuk`
--

INSERT INTO `subsidi_pupuk` (`id_subsidi`, `id_petani`, `jenis_pupuk_1`, `jenis_pupuk_2`, `jenis_pupuk_3`, `tanggal`, `validasi_bpp`, `validasi_desa`) VALUES
(1, 1, 'pupuk urea', 'pupuk NPK', 'pupuk urea', '2024-05-12', 'proses', 'proses'),
(2, 2, 'pupuk NPK', 'pupuk NPK', 'pupuk KCL', '2024-05-17', 'disetujui', 'proses'),
(3, 3, 'pupuk KCL', 'pupuk NPK', 'pupuk urea', '2024-05-20', 'proses', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('kelompok tani','bpp','desa','masyarakat') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'desa', '123', 'desa'),
(2, 'bpp', '123', 'bpp'),
(3, 'kelompok_tani1', '123', 'kelompok tani'),
(4, 'kelompok_tani2', '123', 'kelompok tani'),
(5, '3574046665682140', '12345', 'masyarakat'),
(6, '3574046665685576', '12345', 'masyarakat'),
(7, '3574046665686645', '12345', 'masyarakat'),
(8, '3574046665681123', '12345', 'masyarakat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id_petani`),
  ADD UNIQUE KEY `petani_nik_unique` (`nik`);

--
-- Indexes for table `subsidi_pupuk`
--
ALTER TABLE `subsidi_pupuk`
  ADD PRIMARY KEY (`id_subsidi`),
  ADD KEY `subsidi_pupuk_id_petani_foreign` (`id_petani`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petani`
--
ALTER TABLE `petani`
  MODIFY `id_petani` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subsidi_pupuk`
--
ALTER TABLE `subsidi_pupuk`
  MODIFY `id_subsidi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subsidi_pupuk`
--
ALTER TABLE `subsidi_pupuk`
  ADD CONSTRAINT `subsidi_pupuk_id_petani_foreign` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id_petani`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
