-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2025 at 06:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kartu_kuning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kec`
--

CREATE TABLE `tbl_kec` (
  `id` int(11) NOT NULL,
  `nm_kec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kec`
--

INSERT INTO `tbl_kec` (`id`, `nm_kec`) VALUES
(1, 'Harjamukti'),
(2, 'Kejaksan'),
(3, 'Kesambi'),
(4, 'Lemahwungkuk'),
(5, 'Pekalipan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kel`
--

CREATE TABLE `tbl_kel` (
  `id` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `nm_kel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kel`
--

INSERT INTO `tbl_kel` (`id`, `id_kec`, `nm_kel`) VALUES
(1, 1, 'Argasunya'),
(2, 1, 'Harjamukti'),
(3, 1, 'Kalijaga'),
(4, 1, 'Kecapi'),
(5, 1, 'Larangan'),
(6, 2, 'Kebonbaru'),
(7, 2, 'Kejaksan'),
(8, 2, 'Kesenden'),
(9, 2, 'Sukapura'),
(10, 3, 'Drajat'),
(11, 3, 'Karyamulya'),
(12, 3, 'Kesambi'),
(13, 3, 'Pekiringan'),
(14, 3, 'Sunyaragi'),
(15, 4, 'Kasepuhan'),
(16, 4, 'Lemahwungkuk'),
(17, 4, 'Panjunan'),
(18, 4, 'Pegambiran'),
(19, 5, 'Jagasatru'),
(20, 5, 'Pekalangan'),
(21, 5, 'Pekalipan'),
(22, 5, 'Pulasaren');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `no_pendaftaran` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `kecamatan` int(11) DEFAULT NULL,
  `kelurahan` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `no_telpon` varchar(20) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `status_kawin` varchar(20) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `foto_profile` varchar(255) DEFAULT NULL,
  `foto_ijazah` varchar(255) DEFAULT NULL,
  `status_validasi` varchar(20) DEFAULT NULL,
  `id_tanda_tangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id`, `nama`, `email`, `password`, `nik`, `jk`, `no_pendaftaran`, `tgl_lahir`, `tempat_lahir`, `kecamatan`, `kelurahan`, `alamat`, `pendidikan`, `jurusan`, `no_telpon`, `level`, `agama`, `status_kawin`, `foto_ktp`, `foto_profile`, `foto_ijazah`, `status_validasi`, `id_tanda_tangan`) VALUES
(1, 'zahra', 'nok_zahra@gmail.com', '123', '1222', 'Perempuan', '001', '0000-00-00', NULL, NULL, NULL, 'Cirebon, Mundu pasar', NULL, NULL, '08977761611', 'admin', 'Islam', 'Lajang', 'CamScanner 07-05-2022 16.23.jpg', 'elf_jpg.jpg', 'CamScanner 07-05-2022 16.23.jpg', '3', 0),
(2, 'Melly Iskanadar', 'melly@gmail.com', '123', '1234567890123456', 'Perempuan', '12309', '2023-05-16', 'Cirebon', 1, 4, 'Jln. jendral ahmad yani SUnter pasar baru jakarta utara DKI jakarta', 'SMK NEGRI 2 CRB', 'TKJ', '081717111255', 'user', 'Islam', 'Kawin', 'CamScanner 07-05-2022 16.23.jpg', 'melly-goeslaw-5_43.png', 'kartu kuning pencari kerja.png', '3', 2),
(3, 'muh. Suleman', 'sule@gmail.com', '123', '122111111111019', 'Laki-laki', '716191999191', '2023-05-31', NULL, NULL, NULL, 'Cirebon, Kalitanjung Cirebon Kota', NULL, NULL, '08971717111', 'user', 'Islam', 'Kawin', 'kartu kuning pencari kerja.png', '067325600_1657266909-Sule_9.jpg', 'kartu kuning pencari kerja.png', '3', 1),
(10, 'imam', 'iman@gmail.com', '123', '1234567890123456', 'Laki-laki', '', '0000-00-00', NULL, NULL, NULL, 'Mundu Pesisir', NULL, NULL, '089191111', 'user', 'Islam', 'Kawin', 'kartu kuning pencari kerja.png', 'Ariel_NOAH_Live_Makassar,_25_Nov_2022.jpg', 'elf_jpg.jpg', '3', 0),
(13, 'dadang', 'dadang2@gmail.com', '123', '1091911', 'Laki-laki', '2311', '2023-06-05', NULL, NULL, NULL, 'kaba cirebon', NULL, NULL, '089111', 'user', 'Islam', 'Kawin', NULL, '326274575_158279240322148_253640-20230124104005.jpg', NULL, '3', 1),
(17, 'Jaki', 'jazi@gmail.com', '123', '1241112011676444', 'Laki-laki', '2868', '2023-06-13', 'Cirebon', 1, 5, 'Perumnas kota cirebon', 'S1', 'Sistem Informasi', '087171788819', 'user', 'Islam', 'Kawin', 'obat_panas.jpg', '067325600_1657266909-Sule_9.jpg', 'Screenshot (109).png', '2', 0),
(18, 'Imamah', 'imamah@gmail.com', '202cb962ac59075b964b07152d234b70', '1222234567888898', 'Perempuan', '4066', '2023-06-12', 'Cirebon', 2, 8, 'Kesenden no.09 Kota Cirebon', 'D3', 'Manajemen Informatik', '085624383800', 'user', 'Islam', 'Kawin', 'kartu kuning pencari kerja.png', '025585500_1490074024-NIKE_ARDILLA_2.jpg', 'obat batuk.jpg', '2', 0),
(19, 'Rojacky', 'rojacky@gmail.com', '202cb962ac59075b964b07152d234b70', '122333333', 'Laki-laki', '3826', '2002-02-27', 'Cirebon', 0, 0, 'Kota Cirebon', 'S!', 'Tekink Informatika', '08989898', 'user', 'Islam', 'Lajang', 'h.png', 'g.png', 'f.png', '3', 1),
(20, 'akua', 'akua@gmail.com', '202cb962ac59075b964b07152d234b70', '35464264666262', 'Laki-laki', '9921', '2025-07-08', '21-11-2006', 1, 1, 'cirebon', 'SMA', 'IPA', '808098474', 'user', 'Islam', 'Kawin', 'Renggo.jpg', 'signal-2023-06-27-195851.jpeg', 'Screenshot 2024-01-19 12-56-16.png', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanda_tangan`
--

CREATE TABLE `tbl_tanda_tangan` (
  `id` int(11) NOT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `nama_petugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_tanda_tangan`
--

INSERT INTO `tbl_tanda_tangan` (`id`, `nip`, `nama_petugas`) VALUES
(1, 12311111212, 'SUPRI'),
(2, 31231321222, 'YUSUF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kec`
--
ALTER TABLE `tbl_kec`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_kel`
--
ALTER TABLE `tbl_kel`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_tanda_tangan`
--
ALTER TABLE `tbl_tanda_tangan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kec`
--
ALTER TABLE `tbl_kec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kel`
--
ALTER TABLE `tbl_kel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_tanda_tangan`
--
ALTER TABLE `tbl_tanda_tangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
