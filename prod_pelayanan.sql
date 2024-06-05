-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2024 at 09:16 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prod_pelayanan`
--

DROP DATABASE IF EXISTS `prod_pelayanan`;
CREATE DATABASE `prod_pelayanan`;
USE `prod_pelayanan`;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id_galeri` int NOT NULL,
  `Tanggal_galeri` date DEFAULT NULL,
  `Nama_galeri` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Foto` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `Tanggal_galeri`, `Nama_galeri`, `Foto`) VALUES
(1, '2023-05-20', 'Festival Desa', 'foto_festival.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `id_informasi` int NOT NULL,
  `Tanggal_informasi` date DEFAULT NULL,
  `Nama_informasi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Isi` text COLLATE utf8mb4_general_ci,
  `Foto` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `Tanggal_informasi`, `Nama_informasi`, `Isi`, `Foto`) VALUES
(1, '2023-05-20', 'Pembangunan Jalan Desa', 'Pembangunan jalan desa akan dimulai pada bulan Juni.', 'foto_pembangunan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_kelahiran`
--

DROP TABLE IF EXISTS `keterangan_kelahiran`;

CREATE TABLE `keterangan_kelahiran` (
  `id_keterangankelahiran` int NOT NULL,
  `Tanggal_keterangankelahiran` date DEFAULT NULL,
  `Nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Jenis_kelamin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nama_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nama_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kk` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_keterangankelahiran` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keterangan_kelahiran`
--

INSERT INTO `keterangan_kelahiran` (`id_keterangankelahiran`, `Tanggal_keterangankelahiran`, `Nama`, `Ttl`, `Jenis_kelamin`, `Agama`, `Alamat`, `Nama_ayah`, `Nama_ibu`, `kk`, `Status_keterangankelahiran`, `created_id`, `updated_id`) VALUES
(1, '2023-05-20', 'Bayu', 'Jakarta, 3 Maret 2023', 'Laki-laki', 'Islam', 'Jl. Merdeka No. 20', 'Bapak Bayu', 'Ibu Bayu', 'kk_bayu.jpg', 'Terverifikasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_kematian`
--

DROP TABLE IF EXISTS `keterangan_kematian`;

CREATE TABLE `keterangan_kematian` (
  `id_keterangankematian` int NOT NULL,
  `Tanggal_keterangankematian` date DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Jenis_kelamin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Hari_kematian` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Tanggal_kematian` date DEFAULT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nama_pelapor` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Hubungan_pelapor` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_keterangankematian` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keterangan_kematian`
--

INSERT INTO `keterangan_kematian` (`id_keterangankematian`, `Tanggal_keterangankematian`, `Nik`, `Nama`, `Ttl`, `Jenis_kelamin`, `Pekerjaan`, `Agama`, `Alamat`, `Hari_kematian`, `Tanggal_kematian`, `ktp`, `Nama_pelapor`, `Hubungan_pelapor`, `Status_keterangankematian`, `created_id`, `updated_id`) VALUES
(1, '2023-05-20', 1234567890123456, 'Udin', 'Jakarta, 4 April 1950', 'Laki-laki', 'Pensiunan', 'Islam', 'Jl. Merdeka No. 30', 'Senin', '2023-04-15', 'ktp_udin.jpg', 'Abdur', 'Anak kandung', 'Terverifikasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_tidak_mampu`
--

DROP TABLE IF EXISTS `keterangan_tidak_mampu`;

CREATE TABLE `keterangan_tidak_mampu` (
  `id_keterangantidakmampu` int NOT NULL,
  `Tanggal_keterangantidakmampu` date DEFAULT NULL,
  `No_kk` bigint DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Jenis_kelamin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kk` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_keterangantidakmampu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keterangan_tidak_mampu`
--

INSERT INTO `keterangan_tidak_mampu` (`id_keterangantidakmampu`, `Tanggal_keterangantidakmampu`, `No_kk`, `Nik`, `Nama`, `Ttl`, `Jenis_kelamin`, `Agama`, `Alamat`, `kk`, `Status_keterangantidakmampu`, `created_id`, `updated_id`) VALUES
(1, '2023-05-20', 1234567890123456, 1234567890123456, 'Siti', 'Jakarta, 2 Februari 2000', 'Perempuan', 'Islam', 'Jl. Merdeka No. 10', 'kk_siti.jpg', 'Terverifikasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id_kontak` int NOT NULL,
  `Alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Telepon` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `Alamat`, `Email`, `Telepon`) VALUES
(1, 'Jl. Raya Desa No. 1', 'kontak@desa.id', 123456789012);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `id_pengaduan` int NOT NULL,
  `Tanggal_pengaduan` date DEFAULT NULL,
  `Nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Isi_pengaduan` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `Tanggal_pengaduan`, `Nama`, `Isi_pengaduan`) VALUES
(1, '2023-05-20', 'Ani', 'Jalan desa rusak parah.');

-- --------------------------------------------------------

--
-- Table structure for table `pengantar_nikah`
--

DROP TABLE IF EXISTS `pengantar_nikah`;

CREATE TABLE `pengantar_nikah` (
  `id_pengantarnikah` int NOT NULL,
  `Tanggal_pengantarnikah` date DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Jenis_kelamin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_kawin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Anak_ke` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nama_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nama_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ktp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Kk` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_pengantarnikah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengantar_nikah`
--

INSERT INTO `pengantar_nikah` (`id_pengantarnikah`, `Tanggal_pengantarnikah`, `Nik`, `Nama`, `Ttl`, `Jenis_kelamin`, `Pekerjaan`, `Agama`, `Status_kawin`, `Alamat`, `Anak_ke`, `Nama_ayah`, `Ttl_ayah`, `Agama_ayah`, `Pekerjaan_ayah`, `Alamat_ayah`, `Nama_ibu`, `Ttl_ibu`, `Agama_ibu`, `Pekerjaan_ibu`, `Alamat_ibu`, `Ktp`, `Kk`, `Status_pengantarnikah`, `created_id`, `updated_id`) VALUES
(1, '2023-05-20', 1212121234345656, 'Joko', 'Jakarta, 5 Mei 1990', 'Laki-laki', 'Karyawan Swasta', 'Islam', 'Belum Kawin', 'Jl. Merdeka No. 40', '1', 'Bapak Joko', 'Bandung, 1 Januari 1960', 'Islam', 'Petani', 'Jl. Desa No. 1', 'Ibu Joko', 'Surabaya, 1 Januari 1965', 'Islam', 'Ibu Rumah Tangga', 'Jl. Desa No. 1', 'ktp_joko.jpg', 'kk_joko.jpg', 'Terverifikasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan_orang_tua`
--

DROP TABLE IF EXISTS `penghasilan_orang_tua`;

CREATE TABLE `penghasilan_orang_tua` (
  `id_penghasilan` int NOT NULL,
  `Tanggal_penghasilan` date DEFAULT NULL,
  `No_kk` bigint DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Jenis_kelamin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Nik_ayah` bigint DEFAULT NULL,
  `Nama_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan_ayah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Penghasilan_ayah` int DEFAULT NULL,
  `Nik_ibu` bigint DEFAULT NULL,
  `Nama_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan_ibu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Penghasilan_ibu` int DEFAULT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kk` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_penghasilanorangtua` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penghasilan_orang_tua`
--

INSERT INTO `penghasilan_orang_tua` (`id_penghasilan`, `Tanggal_penghasilan`, `No_kk`, `Nik`, `Nama`, `Ttl`, `Jenis_kelamin`, `Agama`, `Alamat`, `Pekerjaan`, `Nik_ayah`, `Nama_ayah`, `Ttl_ayah`, `Agama_ayah`, `Pekerjaan_ayah`, `Penghasilan_ayah`, `Nik_ibu`, `Nama_ibu`, `Ttl_ibu`, `Agama_ibu`, `Pekerjaan_ibu`, `Penghasilan_ibu`, `ktp`, `kk`, `Status_penghasilanorangtua`, `created_id`, `updated_id`) VALUES
(1, '2023-05-20', 1234567890123456, 1234567890123456, 'Andi', 'Jakarta, 1 Januari 2000', 'Laki-laki', 'Islam', 'Jl. Mawar Indah No. 13', 'Wiraswasta', 2345678901234567, 'Bapak Andi', 'Bandung, 1 Januari 1970', 'Islam', 'Petani', 3000000, 3456789012345678, 'Ibu Andi', 'Surabaya, 1 Januari 1975', 'Islam', 'Ibu Rumah Tangga', 2000000, 'ktp_andi.jpg', 'kk_andi.jpg', 'Terverifikasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id_profil` int NOT NULL,
  `Tanggal_profil` date DEFAULT NULL,
  `Sambutan_kepaladesa` text COLLATE utf8mb4_general_ci,
  `Visi` text COLLATE utf8mb4_general_ci,
  `Misi` text COLLATE utf8mb4_general_ci,
  `Jam_kerja` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `Tanggal_profil`, `Sambutan_kepaladesa`, `Visi`, `Misi`, `Jam_kerja`) VALUES
(1, '2023-05-20', 'Selamat datang di kantorDesa Lauwa.', 'Menjadi desa yang makmur dan sejahtera.', 'Meningkatkan kesejahteraan masyarakat.', 'Senin-Jumat 08:00-16:00');

-- --------------------------------------------------------

--
-- Table structure for table `spkck`
--

DROP TABLE IF EXISTS `spkck`;

CREATE TABLE `spkck` (
  `id_pengantarskck` int NOT NULL,
  `Tanggal_pengantarskck` date DEFAULT NULL,
  `Nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Ttl` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Jenis_kelamin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pekerjaan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Agama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_kawin` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `No_kk` bigint DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Ktp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Status_pengantarskck` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spkck`
--

INSERT INTO `spkck` (`id_pengantarskck`, `Tanggal_pengantarskck`, `Nama`, `Ttl`, `Jenis_kelamin`, `Pekerjaan`, `Agama`, `Status_kawin`, `Alamat`, `No_kk`, `Nik`, `Ktp`, `Status_pengantarskck`, `created_id`, `updated_id`) VALUES
(1, '2023-05-20', 'Tono', 'Jakarta, 6 Juni 1985', 'Laki-laki', 'Wiraswasta', 'Islam', 'Belum Kawin', 'Jl. Merdeka No. 50', 6543211234567890, 1234567890123456, 'ktp_tono.jpg', 'Terverifikasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `Nama_user` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Username` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `Nama_user`, `Username`, `Password`, `level`) VALUES
(1, 'Super Admin', 'admin', '0192023a7bbd73250516f069df18b500', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `keterangan_kelahiran`
--
ALTER TABLE `keterangan_kelahiran`
  ADD PRIMARY KEY (`id_keterangankelahiran`);

--
-- Indexes for table `keterangan_kematian`
--
ALTER TABLE `keterangan_kematian`
  ADD PRIMARY KEY (`id_keterangankematian`);

--
-- Indexes for table `keterangan_tidak_mampu`
--
ALTER TABLE `keterangan_tidak_mampu`
  ADD PRIMARY KEY (`id_keterangantidakmampu`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `pengantar_nikah`
--
ALTER TABLE `pengantar_nikah`
  ADD PRIMARY KEY (`id_pengantarnikah`);

--
-- Indexes for table `penghasilan_orang_tua`
--
ALTER TABLE `penghasilan_orang_tua`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `spkck`
--
ALTER TABLE `spkck`
  ADD PRIMARY KEY (`id_pengantarskck`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keterangan_kelahiran`
--
ALTER TABLE `keterangan_kelahiran`
  MODIFY `id_keterangankelahiran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keterangan_kematian`
--
ALTER TABLE `keterangan_kematian`
  MODIFY `id_keterangankematian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keterangan_tidak_mampu`
--
ALTER TABLE `keterangan_tidak_mampu`
  MODIFY `id_keterangantidakmampu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengantar_nikah`
--
ALTER TABLE `pengantar_nikah`
  MODIFY `id_pengantarnikah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penghasilan_orang_tua`
--
ALTER TABLE `penghasilan_orang_tua`
  MODIFY `id_penghasilan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spkck`
--
ALTER TABLE `spkck`
  MODIFY `id_pengantarskck` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
