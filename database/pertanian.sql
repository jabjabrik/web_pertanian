-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2025 at 07:29 PM
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
  `luas_tanah` decimal(2,1) NOT NULL DEFAULT 0.0,
  `jenis_tanaman_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tanaman_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_tanaman_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_sppt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petani`
--

INSERT INTO `petani` (`id_petani`, `nik`, `nama`, `alamat`, `luas_tanah`, `jenis_tanaman_1`, `jenis_tanaman_2`, `jenis_tanaman_3`, `foto_sppt`) VALUES
(1, '3513202309770001', 'NUR HASAN', 'DUSUN BATAAN Rt 5 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(2, '3513201504710001', 'SARWI', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(3, '3513194107650033', 'MARSI', 'DUSUN SUMBERSARI  Rt 16 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(4, '3513201006780001', 'SLAMET', 'DUSUN BATAAN Rt 2 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(5, '3513071107880002', 'DAHLAN', 'DUSUN BATAAN Rt 5 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(6, '3513201505840001', 'SALAM', 'DUSUN KRAJAN Rt 10 Rw 2', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(7, '3513201001910004', 'MAHRUS SALAM', 'DUSUN SUMBERSARI  Rt 15 Rw 3', '2.0', 'PADI', '-', 'JAGUNG', NULL),
(8, '3513200207990001', 'RIZAL WIJAYA', 'Dsn Sumbersari Rt 12 Rw 003 Desa Sumberkledung', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(9, '3513201402780003', 'MUSTOFA', 'Dsn Krajan Rt 010 Rw 002 Desa Sumberkledung Kecamatan Tegalsiwalan', '0.5', 'PADI', '-', '-', NULL),
(10, '3513200112500001', 'MADLAN', 'DUSUN BATAAN Rt 5 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(11, '3513202702550001', 'TUBAN SAMSI', 'DUSUN BATAAN Rt 5 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(12, '3513206809970002', 'SITI FATIMAH', 'Bataan Rt 1 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(13, '3513200101890003', 'FATHUR ROHMAN', 'DUSUN KRAJAN Rt 8 Rw 2', '0.4', 'PADI', '-', '-', NULL),
(14, '3513204101400001', 'ASTIA', 'DUSUN BATAAN Rt 6 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(15, '3513204107460083', 'SANI SAPUR', 'DUSUN BATAAN Rt 5 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(16, '3513202506780002', 'GATOT', 'DUSUN SUMBERSARI Rt 12 Rw 3', '1.2', 'PADI', '-', 'JAGUNG', NULL),
(17, '3513200112510001', 'BEPUR', 'DUSUN BATAAN Rt 5 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(18, '3513202608800002', 'FATHULLAH', 'DUSUN KRAJAN Rt 7 Rw 2', '0.2', 'PADI', '-', '-', NULL),
(19, '3513200107800214', 'SUHENDI', 'DUSUN SUMBERSARI  Rt 13 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(20, '3513200703950004', 'SAIFUL ANWAR', 'DUSUN SUMBERSARI  Rt 13 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(21, '3513200107580156', 'SAHRI', 'DUSUN BATAAN Rt 1 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(22, '3513201806960002', 'ABDUL HANNAN WAHYUDI', 'DUSUN KRAJAN Rt 10 Rw 2', '0.5', 'PADI', '-', 'JAGUNG', NULL),
(23, '3513204906760001', 'SULIATIN', 'DSN SUMBERSARI RT11 RW3', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(24, '3513200507610001', 'SALIM', 'DUSUN SUMBERSARI Rt 11 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(25, '3513210311840002', 'ACHMAD MASTUKI', 'Dusun Sumbersari', '2.0', 'PADI', '-', 'JAGUNG', NULL),
(26, '3513202111940001', 'SAGITA', 'DUSUN BATAAN Rt 6 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(27, '3513190411860009', 'ASEL HERMAWAN', 'DUSUN BATAAN Rt 5 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(28, '3513200605690002', 'HOSIN', 'DUSUN KRAJAN Rt 8 Rw 2', '0.4', 'PADI', '-', '-', NULL),
(29, '3574021705900002', 'BUTENG WAHYUDI', 'DSN KRAJAN Rt 14 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(30, '3513200107770006', 'HUSNUL KHATIM', 'DUSUN KRAJAN Rt 9 Rw 2', '1.0', 'PADI', '-', 'JAGUNG', NULL),
(31, '3513200905620001', 'TOMO', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(32, '3513171909860001', 'SUKIR AHMAD BASORI', 'DUSUN SUMBERSARI  Rt 16 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(33, '3513201607820002', 'PARIN', 'DUSUN BATAAN Rt 5 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(34, '3513200103710002', 'EDY SUTOMO', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(35, '3513202008780001', 'ABDULLAH', 'DUSUN BATAAN Rt 1 Rw 1', '2.0', 'PADI', '-', '-', NULL),
(36, '3509060107950214', 'ERFAN HARDIANTO', 'DUSUN BATAAN Rt 5 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(37, '3513200107780192', 'NILI', 'DUSUN SUMBERSARI Rt 11 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(38, '3513204107840194', 'DEWI RATIH', 'DUSUN KRAJAN Rt 9 Rw 2', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(39, '3513201211740002', 'RAPI\'AT', 'DUSUN BATAAN Rt 5 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(40, '3513200107590115', 'MARHADI', 'DUSUN KRAJAN Rt 9 Rw 2', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(41, '3513200107780238', 'MUHAMMAT TOSEN', 'DUSUN SUMBERSARI  Rt 13 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(42, '3513202004700002', 'HADARI', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(43, '3513201507790001', 'SALIHUDIN', 'DUSUN SUMBERSARI Rt 11 Rw 3', '1.2', 'PADI', '-', 'JAGUNG', NULL),
(44, '3513202303720001', 'SHOLIHIN', 'DUSUN KRAJAN Rt 10 Rw 2', '1.0', 'PADI', '-', 'JAGUNG', NULL),
(45, '3513206509710001', 'SUPIYATI', 'DUSUN BATAAN Rt 4 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(46, '3513190107830148', 'SAMSUL ARIFIN', 'DUSUN SUMBERSARI  Rt 15 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(47, '3513204107560130', 'SAMI', 'DUSUN KRAJAN Rt 9 Rw 2', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(48, '3513200705560002', 'NURPAKI HAMID', 'DUSUN KRAJAN Rt 8 Rw 2', '0.5', 'PADI', '-', '-', NULL),
(49, '3513200109910001', 'HUDA HAIRONO', 'DUSUN SUMBERSARI  Rt 15 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(50, '3513200809690001', 'HAPID', 'DUSUN BATAAN Rt 2 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(51, '3513200107530138', 'SANTOSO', 'DUSUN KRAJAN Rt 9 Rw 2', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(52, '3513200305770001', 'M. SANIN SYAFI\'I', 'DUSUN KRAJAN Rt 10 Rw 2', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(53, '3513201505420001', 'MASDUR', 'Dsn Krajan RT 010 Rw 002 Desa Sumberkledung', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(54, '3513201911770001', 'BAMBANG SUTRISNO', 'DUSUN KRAJAN Rt 7 Rw 2', '0.2', 'PADI', '-', '-', NULL),
(55, '3513201709720002', 'ANAS AMINULLAH', 'DUSUN KRAJAN Rt 8 Rw 2', '2.0', 'PADI', '-', '-', NULL),
(56, '3513201707730001', 'SOLEHUDIN', 'DUSUN KRAJAN Rt 8 Rw 2', '0.8', 'PADI', '-', '-', NULL),
(57, '3513202407870001', 'M. MUKHLISIN', 'DUSUN KRAJAN Rt 8 Rw 2', '0.4', 'PADI', '-', '-', NULL),
(58, '3508102605890001', 'INDRA FERDIAN', 'DUSUN KRAJAN Rt 7 Rw 2', '0.2', 'PADI', '-', '-', NULL),
(59, '3513200503540001', 'BESRI SUNAWI', 'DUSUN KRAJAN Rt 9 Rw 2', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(60, '3513200107800172', 'AHMAD HASAN', 'DUSUN BATAAN Rt 1 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(61, '3513204107450149', 'SANI', 'DUSUN BATAAN Rt 5 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(62, '3513201810890002', 'SUBUR', 'Bataan Rt 4 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(63, '3513206701790001', 'HOLILA', 'DUSUN KRAJAN Rt 9 Rw 2', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(64, '3513206703970001', 'DEVI INDIANI', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(65, '3513204107640208', 'SUHA', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(66, '3513201012720002', 'BUASAN', 'DUSUN BATAAN Rt 5 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(67, '3513202803930002', 'HUSEN', 'DUSUN BATAAN Rt 5 Rw 1', '1.0', 'PADI', '-', '-', NULL),
(68, '3513050610760001', 'ASAN', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(69, '3513204709600004', 'SUHANA', 'DUSUN BATAAN Rt 6 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(70, '3513201705850003', 'SUGIYANTO', 'DUSUN BATAAN Rt 5 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(71, '3513201604860003', 'M. YASIN', 'DUSUN KRAJAN Rt 9 Rw 2', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(72, '3513201805730001', 'NANANG KUSWOYO', 'DUSUN KRAJAN Rt 10 Rw 2', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(73, '3513200805850001', 'SUMIATI', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(74, '3513200105550001', 'ARI', 'DUSUN SUMBERSARI  Rt 16 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(75, '3513200703580001', 'PARDI', 'DUSUN KRAJAN Rt 10 Rw 2', '0.6', 'PADI', '-', 'JAGUNG', NULL),
(76, '3513200107780143', 'SAMO', 'DUSUN BATAAN Rt 4 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(77, '3513201502780002', 'AHMAD ZAILANI', 'DUSUN SUMBERSARI Rt 11 Rw 3', '0.8', 'PADI', '-', 'JAGUNG', NULL),
(78, '3513201601580001', 'ROSIDI', 'DUSUN KRAJAN Rt 10 Rw 2', '0.6', 'PADI', '-', 'JAGUNG', NULL),
(79, '3513200107610144', 'BUNADI', 'DUSUN KRAJAN Rt 9 Rw 2', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(80, '3513204104660001', 'HOTIJA', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.4', 'PADI', '-', 'JAGUNG', NULL),
(81, '3513200212660001', 'ACHMAD BARIZI', 'DUSUN KRAJAN Rt 8 Rw 2', '0.3', 'PADI', '-', '-', NULL),
(82, '3513200805890002', 'ABDUL SALAM', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(83, '3513200506760004', 'SLAMET', 'DUSUN BATAAN Rt 3 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(84, '3524050310730001', 'MUSTAKIM', 'DUSUN KRAJAN Rt 9 Rw 2', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(85, '3513200904730002', 'SAIFUL SARIFUDIN', 'DUSUN KRAJAN Rt 10 Rw 2', '1.4', 'PADI', '-', 'JAGUNG', NULL),
(86, '3513200703890002', 'ARSAD', 'DUSUN BATAAN Rt 2 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(87, '3513201008790003', 'ABDUL BASIR', 'Dusun Bataan', '1.0', 'PADI', '-', '-', NULL),
(88, '3513200707740001', 'SAMUJER', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.5', 'PADI', '-', 'JAGUNG', NULL),
(89, '3513201508880001', 'AMIR HAMZAH', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(90, '3513202505750003', 'SIDIQ', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(91, '3513201205640001', 'AMILIN', 'DUSUN BATAAN Rt 6 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(92, '3513200207640001', 'KATIRAN', 'DUSUN KRAJAN Rt 8 Rw 2', '0.4', 'PADI', '-', '-', NULL),
(93, '3513201703730002', 'ABDURROHIM SIFA\'', 'DUSUN KRAJAN Rt 8 Rw 2', '0.3', 'PADI', '-', '-', NULL),
(94, '3513200206860005', 'SELAMET', 'DUSUN BATAAN Rt 3 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(95, '3513201202720002', 'NURASEN HOLLA', 'DUSUN BATAAN Rt 2 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(96, '3513202512700001', 'MISDI', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(97, '3513200608830001', 'MOCH. SA\'IL', 'DUSUN KRAJAN Rt 10 Rw 2', '2.0', 'PADI', '-', 'JAGUNG', NULL),
(98, '3513200107910110', 'SENEWI', 'DUSUN BATAAN Rt 5 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(99, '3574030802880004', 'RIO SANTOSO', 'DUSUN BATAAN Rt 6 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(100, '3513200705860001', 'SUMAN JAYA', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.5', 'PADI', '-', 'JAGUNG', NULL),
(101, '3513202106790001', 'MATTORI', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.5', 'PADI', '-', 'JAGUNG', NULL),
(102, '3513202109630001', 'SALI ISWANTO', 'DUSUN KRAJAN Rt 8 Rw 2', '0.4', 'PADI', '-', '-', NULL),
(103, '3513202204920001', 'MUHAMMAD DONI', 'DUSUN BATAAN Rt 3 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(104, '3513200311700002', 'SUMAR', 'DUSUN SUMBERSARI  Rt 16 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(105, '3513200106600001', 'SALIHAN', 'DUSUN SUMBERSARI  Rt 16 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(106, '3513200107740123', 'MUHAMMAD UMAR', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(107, '3513200407720001', 'BAMBANG', 'DUSUN SUMBERSARI  Rt 13 Rw 3', '0.6', 'PADI', '-', 'JAGUNG', NULL),
(108, '3513200208840002', 'DODY WIJAYA', 'DUSUN BATAAN Rt 5 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(109, '3513200107810129', 'SANIMAN', 'DUSUN BATAAN Rt 2 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(110, '3513201707890001', 'MUHAMMAD HOLIL', 'Bataan Rt 1 Rw 1', '1.0', 'PADI', '-', '-', NULL),
(111, '3513202604740001', 'BAKAR', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(112, '3513201512540001', 'MARSAM', 'DUSUN KRAJAN Rt 8 Rw 2', '0.6', 'PADI', '-', '-', NULL),
(113, '3513202404980003', 'MUHAMAD SAHDAN BAHARI PUTRA', 'DSN KRAJAN RT 009 RW 002 DESA SUMBERKLEDUNG', '0.5', 'PADI', '-', 'JAGUNG', NULL),
(114, '3574021405870007', 'SAMSUL HADI', 'DUSUN BATAAN Rt 5 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(115, '3513200306780001', 'ASMA\'I', 'DUSUN KRAJAN Rt 10 Rw 2', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(116, '3513201112770001', 'MUSLIM', 'DUSUN KRAJAN Rt 8 Rw 2', '0.6', 'PADI', '-', '-', NULL),
(117, '3513200502900004', 'MUHAMMAD SALEH', 'DUSUN BATAAN Rt 1 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(118, '3513202011680002', 'SARU', 'DUSUN SUMBERSARI  Rt 16 Rw 3', '0.3', 'PADI', '-', 'JAGUNG', NULL),
(119, '3513200107490075', 'NURSIANTO BEBUN', 'DUSUN BATAAN Rt 2 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(120, '3513200107650251', 'SAID', 'DUSUN BATAAN Rt 3 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(121, '3574020107900212', 'JULI HERMANTO', 'DUSUN BATAAN Rt 1 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(122, '3513200107570128', 'SANIN', 'DUSUN BATAAN Rt 1 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(123, '3513200107720008', 'NEMOH', 'DUSUN BATAAN Rt 4 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(124, '3513200506700001', 'SUKARNADI SUCIPTO', 'DUSUN BATAAN Rt 2 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(125, '3513201505700001', 'SUBAIRI SUTARI', 'DUSUN BATAAN Rt 2 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(126, '3513201206730002', 'ACH. NALI ROMANTA', 'DUSUN BATAAN Rt 1 Rw 1', '2.0', 'PADI', '-', '-', NULL),
(127, '3513206404730003', 'JUMA\'ATI', 'dsn Bataan RT 5 Rw 1', '0.3', 'PADI', '0', '0', NULL),
(128, '3513200107590144', 'SLIWAT', 'DUSUN BATAAN Rt 3 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(129, '3513201710860001', 'ZAINUL FATAH', 'DUSUN BATAAN Rt 1 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(130, '3513201606830003', 'SUPARDI', 'DUSUN BATAAN Rt 3 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(131, '3513200412760003', 'ADIYONO', 'DUSUN BATAAN Rt 1 Rw 1', '0.8', 'PADI', '-', '-', NULL),
(132, '3513200107390048', 'RIBA\'I', 'DUSUN BATAAN Rt 1 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(133, '3513200707880001', 'BUDIYONO', 'DUSUN BATAAN Rt 2 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(134, '3513201407790003', 'TOLE HERMANTO', 'DUSUN BATAAN Rt 1 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(135, '3513200107590101', 'SANOM SURYANTO', 'DUSUN BATAAN Rt 4 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(136, '3513200107610120', 'HOLIPA', 'DUSUN BATAAN Rt 2 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(137, '3513201012700002', 'SUPAN', 'DUSUN BATAAN Rt 2 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(138, '3513204107660188', 'SUTI\'A', 'DUSUN BATAAN Rt 2 Rw 1', '0.6', 'PADI', '-', '-', NULL),
(139, '3513200107700211', 'SUGIONO', 'DUSUN BATAAN Rt 3 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(140, '3513200102710003', 'SLAMET', 'DUSUN BATAAN Rt 2 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(141, '3513200505790001', 'EKO WAHYUDI', 'DUSUN BATAAN Rt 3 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(142, '3513200607800002', 'HUSEN', 'DUSUN BATAAN Rt 2 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(143, '3513200107570157', 'SUGITO', 'DUSUN BATAAN Rt 1 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(144, '3513201205770002', 'NASIHIN', 'DUSUN BATAAN Rt 1 Rw 1', '2.0', 'PADI', '-', '-', NULL),
(145, '3513200704890001', 'MOCH. DIDIK', 'DUSUN BATAAN Rt 1 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(146, '3513200107880174', 'RAHMAN', 'DUSUN BATAAN Rt 2 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(147, '3513201908880001', 'AHMAD HUSIN', 'Dsn Krajan Rt 10 Rw 2', '0.5', 'PADI', '-', '-', NULL),
(148, '3513201204770002', 'HAMID', 'DSN SUMBERSARI RT14 RW3', '0.5', 'PADI', '0', 'JAGUNG', NULL),
(149, '3513201708920004', 'SURAHMAN', 'DUSUN BATAAN Rt 1 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(150, '3513204104690001', 'BEBUN', 'DUSUN BATAAN Rt 1 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(151, '3513200105670002', 'KABUL', 'DUSUN BATAAN Rt 4 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(152, '3513202405860002', 'KHOIRUL FATAH', 'DUSUN BATAAN Rt 4 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(153, '3513201806950003', 'DIKI WAHYUDI', 'DUSUN BATAAN Rt 3 Rw 1', '0.4', 'PADI', '-', '-', NULL),
(154, '3513200110580002', 'ATIP', 'DUSUN BATAAN Rt 4 Rw 1', '0.8', 'PADI', '-', '-', NULL),
(155, '3513200701860002', 'HOLIKIN', 'DUSUN BATAAN Rt 4 Rw 1', '0.2', 'PADI', '-', '-', NULL),
(156, '3513200107620176', 'MIRUN', 'DUSUN BATAAN Rt 3 Rw 1', '0.3', 'PADI', '-', '-', NULL),
(157, '3513200107470078', 'SATUREN', 'DUSUN BATAAN Rt 1 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(158, '3513200804930001', 'EKO WAHYUDI', 'Bataan Rt 1 Rw 1', '2.0', 'PADI', '-', '-', NULL),
(159, '3513203005950001', 'TEGUH BUDI UTOMO', 'Bataan Rt 1 Rw 1', '0.5', 'PADI', '-', '-', NULL),
(160, '3513200301810001', 'HASAN SAIFULLAH', 'DUSUN KRAJAN Rt 10 Rw 2', '0.5', 'PADI', '-', 'JAGUNG', NULL),
(161, '3513202509580001', 'SUPENO', 'Dusun Sumbersari', '0.6', 'PADI', '-', 'JAGUNG', NULL),
(162, '3513202108760003', 'MAHMUD', 'DUSUN SUMBERSARI  Rt 15 Rw 3', '2.0', 'PADI', '-', 'JAGUNG', NULL),
(163, '3513200107660194', 'SUTRISNO', 'DUSUN SUMBERSARI  Rt 14 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(164, '3513012403900002', 'SANTO SARIMAN', 'DUSUN SUMBERSARI  Rt 13 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(165, '3513200107670157', 'YOSEF', 'DUSUN KRAJAN Rt 8 Rw 2', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(166, '3513202011760002', 'ARSO', 'DUSUN BATAAN Rt 1 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(167, '3513200505790001', 'EKO WAHYUDI', 'DUSUN BATAAN Rt 3 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(168, '3513200107880174', 'RAHMAN', 'DUSUN BATAAN Rt 2 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(169, '3513200107580156', 'SAHRI', 'DUSUN BATAAN Rt 1 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(170, '3513051509760002', 'SATON', 'DUSUN BATAAN Rt 2 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(171, '3513200107470078', 'SATUREN', 'DUSUN BATAAN Rt 1 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(172, '3513071107880002', 'DAHLAN', 'DUSUN BATAAN Rt 5 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(173, '3513201507880003', 'ABDUR ROHIM', 'DUSUN SUMBERSARI  Rt 16 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(174, '3513203006920001', 'ABDUL ASIS', 'DUSUN SUMBERSARI  Rt 13 Rw 3', '0.2', 'PADI', '-', 'JAGUNG', NULL),
(175, '3513200408870001', 'TAUFIQ ISMAIL', 'Dsn Sumbersari Rt 011 Rw 003 Desa Sumberkledung Kecamatan Tegalsiwalan', '1.3', 'PADI', '-', 'JAGUNG', NULL),
(176, '3513201202740001', 'TUNGGUL', 'Dusun Sumbersari Rt 14 Rw 3', '0.5', 'PADI', '0', '0', NULL),
(177, '3513201202740001', 'TUNGGUL', 'Dusun Sumbersari Rt 14 Rw 3', '0.0', '0', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(178, '3513195605580001', 'MISNI', 'Desa sumbersuko dringu', '1.4', 'PADI', '0', 'JAGUNG', NULL),
(179, '3513050802750001', 'MATASIR', 'DSN KRAJAN SUMBERKLEDUNG', '0.3', 'PADI', '0', 'JAGUNG', NULL),
(180, '3513200801750002', 'AJES', 'DSN TEGAL JUWET RT 20 RW 5', '1.0', 'PADI', '0', 'JAGUNG', NULL),
(181, '3513205202800003', 'TIARNI', 'DUSUN SUMBERSARI  Rt 13 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(182, '3513200107530138', 'SANTOSO', 'DUSUN KRAJAN Rt 9 Rw 2', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(183, '3513200107730226', 'NIWI', 'DUSUN KRAJAN Rt 7 Rw 2', '0.2', 'PADI', '-', '-', NULL),
(184, '3513201509730001', 'SATUMIN', 'DUSUN KRAJAN Rt 8 Rw 2', '0.3', 'PADI', '-', '-', NULL),
(185, '3513201512850002', 'MUHAMMAD HASAN', 'Bataan Rt 1 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(186, '3513200702720001', 'SAMAN', 'DUSUN KRAJAN Rt 10 Rw 2', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(187, '3513204101400001', 'ASTIA', 'DUSUN BATAAN Rt 6 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(188, '3513200605690002', 'HOSIN', 'DUSUN KRAJAN Rt 8 Rw 2', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(189, '3513200107500265', 'MI\'AN LES', 'DUSUN SUMBERSARI Rt 11 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(190, '3513201408780001', 'LUTFI SAIFUL RIZAL H', 'Bataan Rt 1 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(191, '3513200707740001', 'SAMUJER', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(192, '3513200705560002', 'NURPAKI HAMID', 'DUSUN KRAJAN Rt 8 Rw 2', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(193, '3513201008810002', 'KUSNADI', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(194, '3513200306780001', 'ASMA\'I', 'DUSUN KRAJAN Rt 10 Rw 2', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(195, '3513201002620001', 'SAMSUL SUPAERI', 'DUSUN KRAJAN Rt 10 Rw 2', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(196, '3513230505840006', 'NUR YASIN', 'DUSUN BATAAN Rt 5 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(197, '3513201211800001', 'M. HASIN', 'DUSUN SUMBERSARI Rt 11 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(198, '3513204906760001', 'SULIATIN', 'DSN SUMBERSARI RT11 RW3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(199, '3513202505850002', 'NANANG KOSIM', 'DUSUN BATAAN Rt 5 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(200, '3513201203680002', 'MAHFUD', 'DUSUN BATAAN Rt 6 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(201, '3513201504740001', 'UNTUNG HERMANTO', 'DUSUN BATAAN Rt 5 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(202, '3513200202760005', 'USMAN', 'DUSUN SUMBERSARI Rt 11 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(203, '3513202106790001', 'MATTORI', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(204, '3513200904820003', 'SHOLEH', 'DUSUN SUMBERSARI Rt 12 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(205, '3513200101590001', 'NIDIN', 'DUSUN KRAJAN Rt 9 Rw 2', '0.5', 'PADI', '-', 'JAGUNG', NULL),
(206, '3513200502770002', 'FATHUL ARIFIN', 'DUSUN BATAAN Rt 6 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(207, '3513201511790003', 'UNTUNG SUPRIYANTO', 'DUSUN BATAAN Rt 5 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(208, '3513201507790001', 'SALIHUDIN', 'DUSUN SUMBERSARI Rt 11 Rw 3', '0.0', '-', 'BAWANG MERAH', '-', NULL),
(209, '3513200603770001', 'LULUK RIYANTO', 'DUSUN KRAJAN Rt 7 Rw 2', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL),
(210, '3513200708670003', 'SUHARI', 'DUSUN BATAAN Rt 1 Rw 1', '0.0', '-', 'BAWANG MERAH', 'BAWANG MERAH', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsidi_pupuk`
--

CREATE TABLE `subsidi_pupuk` (
  `id_subsidi` bigint(20) UNSIGNED NOT NULL,
  `id_petani` bigint(20) UNSIGNED NOT NULL,
  `jenis_pupuk_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pupuk_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pupuk_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `validasi_bpp` enum('proses','ditolak','disetujui') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses',
  `validasi_desa` enum('proses','ditolak','disetujui') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsidi_pupuk`
--

INSERT INTO `subsidi_pupuk` (`id_subsidi`, `id_petani`, `jenis_pupuk_1`, `jenis_pupuk_2`, `jenis_pupuk_3`, `tanggal`, `validasi_bpp`, `validasi_desa`) VALUES
(1, 1, 'pupuk urea', NULL, NULL, '2024-05-12', 'proses', 'proses'),
(2, 2, 'pupuk NPK', NULL, 'pupuk KCL', '2024-05-17', 'disetujui', 'proses'),
(3, 3, 'pupuk KCL', NULL, 'pupuk urea', '2024-05-20', 'proses', 'disetujui'),
(4, 4, 'pupuk urea', '', '', '2025-05-08', 'proses', 'proses');

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
  ADD PRIMARY KEY (`id_petani`);

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
  MODIFY `id_petani` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `subsidi_pupuk`
--
ALTER TABLE `subsidi_pupuk`
  MODIFY `id_subsidi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
