-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 03:06 PM
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
-- Database: `db_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `password`, `pertanyaan`, `jawaban`) VALUES
('g2M4T9', 'roni', '$2y$10$K4akA7TpiHh7YcMr23JPbeobvX6SAVGTO6Ptc7gHFee8OFFRYonE6', 'Siapa nama ibu anda ?', 'wdasd'),
('Syahroni', 'ronay', '$2y$10$TRmQpaixC2y/JQ4jijLZyOzCLi.pWqDMzuprDVLJ9KuPy1o60Qgpe', 'Apa nama hewan peliharaan anda ?', 'kucing'),
('y3I6S4', 'Syahroni', '$2y$10$tSiHD8CLK67iKmcFvwnx0.w0VarYfBOpZmUgKcCPlUb59N6jX0rF6', 'Apa nama hewan peliharaan anda ?', 'kucing');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelanggaran`
--

CREATE TABLE `data_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(255) NOT NULL,
  `jenis_pelanggaran` varchar(255) NOT NULL,
  `bobot_pelanggaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pelanggaran`
--

INSERT INTO `data_pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `jenis_pelanggaran`, `bobot_pelanggaran`) VALUES
(3, 'tidur', 'Ringan', 1),
(5, 'tidak masuk sekolah', 'Sedang', 2),
(6, 'Merokok', 'Sedang', 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_sanksi`
--

CREATE TABLE `data_sanksi` (
  `id_sanksi` int(11) NOT NULL,
  `jenis_sanksi` varchar(255) NOT NULL,
  `deskripsi_sanksi` varchar(255) NOT NULL,
  `min_skor` float NOT NULL,
  `max_skor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_sanksi`
--

INSERT INTO `data_sanksi` (`id_sanksi`, `jenis_sanksi`, `deskripsi_sanksi`, `min_skor`, `max_skor`) VALUES
(2, 'Berat', 'belajar lagi tong', 0.81, 0.85),
(6, 'Sedang', 'Nasehat dan Menghafal 25 kosa kata B. Inggris dan B. Arab + Sholawat Nariyah 33×', 0.6, 0.65),
(7, 'Sedang', 'Menghafal Surat Pilihan pada Juz 30 + Mengumpulkan Aqua Gelas \r\nsepanjang 15 cm', 0.66, 0.7),
(8, 'Sedang', 'Membersihkan lingkungan Pondok yang telah ditentukan + Menghafal \r\nSurah Pilihan pada Juz 30', 0.71, 0.75),
(9, 'Berat', 'Membersihkan seluruh ruangan kamar mandi + Baca Sholawat Nariyah 300 kali', 0.76, 0.8),
(10, 'Berat', 'Diserahkan ke Koordinator Keamanan atau Kepala Sekolah', 0.86, 1),
(11, 'Ringan', 'Nasehat', 0, 0.2),
(12, 'Ringan', 'Nasehat + Menghafal 10 kosa kata B. Inggris dan B. Arab', 0.21, 0.4),
(13, 'Ringan', 'Menghafal 25 kosa kata B. Inggris dan B. Arab + Sholawat Nariyah 33×', 0.41, 0.59);

-- --------------------------------------------------------

--
-- Table structure for table `data_santri`
--

CREATE TABLE `data_santri` (
  `id_santri` int(11) NOT NULL,
  `nama_santri` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_santri`
--

INSERT INTO `data_santri` (`id_santri`, `nama_santri`, `alamat`, `kelas`, `tahun_ajaran`) VALUES
(3, 'ajaib', 'asdawdsd', '21', '2021'),
(5, 'joni', 'asdawd', '3A', '2021'),
(6, 'jono', 'sfads', '3A', '2011');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_santri`
--

CREATE TABLE `pelanggaran_santri` (
  `id_pelanggaran_santri` int(11) NOT NULL,
  `nama_pelanggaran` varchar(255) NOT NULL,
  `c1` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `waktu` date NOT NULL,
  `nilai_akhir` float NOT NULL,
  `c2` int(11) NOT NULL,
  `c3` int(11) NOT NULL,
  `c4` int(11) NOT NULL,
  `c5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggaran_santri`
--

INSERT INTO `pelanggaran_santri` (`id_pelanggaran_santri`, `nama_pelanggaran`, `c1`, `id_santri`, `waktu`, `nilai_akhir`, `c2`, `c3`, `c4`, `c5`) VALUES
(14, 'merokok', 2, 5, '2025-02-25', 0.6, 1, 2, 2, 3),
(15, 'tidur', 1, 6, '2025-03-14', 0.43, 1, 2, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `data_sanksi`
--
ALTER TABLE `data_sanksi`
  ADD PRIMARY KEY (`id_sanksi`);

--
-- Indexes for table `data_santri`
--
ALTER TABLE `data_santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `pelanggaran_santri`
--
ALTER TABLE `pelanggaran_santri`
  ADD PRIMARY KEY (`id_pelanggaran_santri`),
  ADD KEY `id_pelanggaran` (`c1`),
  ADD KEY `id_santri` (`id_santri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pelanggaran`
--
ALTER TABLE `data_pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_sanksi`
--
ALTER TABLE `data_sanksi`
  MODIFY `id_sanksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_santri`
--
ALTER TABLE `data_santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggaran_santri`
--
ALTER TABLE `pelanggaran_santri`
  MODIFY `id_pelanggaran_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggaran_santri`
--
ALTER TABLE `pelanggaran_santri`
  ADD CONSTRAINT `pelanggaran_santri_ibfk_3` FOREIGN KEY (`id_santri`) REFERENCES `data_santri` (`id_santri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
