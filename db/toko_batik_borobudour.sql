-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2025 at 03:32 PM
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
-- Database: `toko_batik_borobudour`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'kemeja', 'Kemeja Batik Pria Motif kd01 Lengan Panjang', 'Pakaian Pria', 80000, 20, 'Damarwulan_jpg.jpeg'),
(2, 'kemeja', 'Kemeja Batik Pria Motif kd02 Lengan Panjang', 'Pakaian Pria', 85000, 95, 'Merak.jpeg'),
(3, 'kemeja', 'Kemeja Batik Pria Motif kd03 Lengan Panjang', 'Pakaian Pria', 96000, 35, 'WhatsApp_Image_2025-06-23_at_14_21_59_(1).jpeg'),
(4, 'kemeja', 'Kemeja Batik Pria Motif kd04 Lengan Panjang', 'Pakaian Pria', 73000, 10, 'WhatsApp_Image_2025-06-23_at_14_21_59.jpeg'),
(5, 'kemeja', 'Kemeja Batik Pria Motif kd05 Lengan Panjang', 'Pakaian Pria', 85000, 110, 'WhatsApp_Image_2025-06-23_at_14_22_00_(1).jpeg'),
(7, 'kemeja', 'Kemeja Batik Pria Motif kd06 Lengan Panjang', 'Pakaian Pria', 85000, 150, 'WhatsApp_Image_2025-06-23_at_14_22_001.jpeg'),
(8, 'kemeja', 'Kemeja Batik Pria Motif kd07 Lengan Panjang', 'Pakaian Pria', 85000, 100, 'WhatsApp_Image_2025-06-23_at_14_22_01.jpeg'),
(9, 'Atasan ', 'Atasan Batik Wanita Kd01 lengan panjang', 'Pakaian Wanita', 90000, 255, 'WhatsApp_Image_2025-07-17_at_19_57_04_(1).jpeg'),
(10, 'Atasan', 'Atasan Batik Wanita kd02 lengan panjang', 'Pakaian Wanita', 90000, 65, 'WhatsApp_Image_2025-07-17_at_19_57_04_(2).jpeg'),
(11, 'Atasan ', 'Atasan Batik Wanita kd03 lengan panjang', 'Pakaian Wanita', 90000, 130, 'WhatsApp_Image_2025-07-17_at_19_57_05.jpeg'),
(12, 'Atasan ', 'Atasan Batik Wanita kd04 lengan panjang', 'Pakaian Wanita', 90000, 70, 'WhatsApp_Image_2025-07-17_at_19_57_05_(1).jpeg'),
(13, 'Dress ', 'Dress Anak Perempuan kd01', 'Pakaian Anak-anak', 55000, 115, 'WhatsApp_Image_2025-07-17_at_19_57_02.jpeg'),
(14, 'Dress ', 'Dress Anak Perempuan kd02', 'Pakaian Anak-anak', 55000, 100, 'WhatsApp_Image_2025-07-17_at_19_57_03_(1).jpeg'),
(15, 'Dress ', 'Dress Anak Perempuan kd03', 'Pakaian Anak-anak', 55000, 44, 'WhatsApp_Image_2025-07-17_at_19_57_03_(2).jpeg'),
(16, 'Dress ', 'Dress Anak Perempuan kd04', 'Pakaian Anak-anak', 55000, 115, 'WhatsApp_Image_2025-07-17_at_19_57_04.jpeg'),
(17, 'Atasan ', 'Atasan Batik Wanita kd05 lengan panjang', 'Pakaian Wanita', 85000, 76, 'WhatsApp_Image_2025-07-17_at_20_42_17_(1).jpeg'),
(18, 'Atasan ', 'Atasan Batik Wanita kd06 lengan panjang', 'Pakaian Wanita', 85000, 200, 'WhatsApp_Image_2025-07-17_at_20_42_17.jpeg'),
(19, 'Atasan ', 'Atasan Batik Wanita kd07 lengan panjang', 'Pakaian Wanita', 97000, 65, 'WhatsApp_Image_2025-07-17_at_20_42_18_(1).jpeg'),
(20, 'Atasan', 'Atasan Batik Wanita kd08 lengan panjang', 'Pakaian Wanita', 97000, 70, 'WhatsApp_Image_2025-07-17_at_20_42_18.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `jasa_pengiriman` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT 'Menunggu Konfirmasi',
  `status_pengiriman` varchar(50) DEFAULT 'Belum Dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `no_telp`, `jasa_pengiriman`, `bank`, `tgl_pesan`, `batas_bayar`, `bukti_pembayaran`, `status_pembayaran`, `status_pengiriman`) VALUES
(1, 'Dina Istifada', 'wonopringgo', NULL, NULL, NULL, '2025-07-03 23:14:44', '2025-07-04 23:14:44', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(2, 'Dina Istifada', 'wonopringgo', NULL, NULL, NULL, '2025-07-04 13:16:43', '2025-07-05 13:16:43', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(3, '', '', NULL, NULL, NULL, '2025-07-07 10:46:29', '2025-07-08 10:46:29', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(4, 'Al moh', 'kedungwuni', NULL, NULL, NULL, '2025-07-18 13:42:19', '2025-07-19 13:42:19', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(5, '', '', NULL, NULL, NULL, '2025-07-23 17:23:43', '2025-07-24 17:23:43', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(6, '', '', NULL, NULL, NULL, '2025-07-23 17:25:31', '2025-07-24 17:25:31', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(7, 'pppp', '', NULL, NULL, NULL, '2025-07-28 22:45:17', '2025-07-29 22:45:17', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(8, '', '', NULL, NULL, NULL, '2025-07-28 22:47:45', '2025-07-29 22:47:45', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(9, '', '', NULL, NULL, NULL, '2025-07-28 22:59:44', '2025-07-29 22:59:44', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(10, '', '', NULL, NULL, NULL, '2025-07-28 23:13:56', '2025-07-29 23:13:56', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(11, '', '', NULL, NULL, NULL, '2025-07-28 23:15:33', '2025-07-29 23:15:33', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(12, '', '', NULL, NULL, NULL, '2025-07-28 23:15:48', '2025-07-29 23:15:48', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(13, '', '', NULL, NULL, NULL, '2025-07-28 23:23:27', '2025-07-29 23:23:27', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(14, 'kjjg', 'kgg', NULL, NULL, NULL, '2025-07-28 23:31:50', '2025-07-29 23:31:50', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(15, '', '', NULL, NULL, NULL, '2025-07-29 00:40:34', '2025-07-30 00:40:34', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(16, '', '', '', 'JNE', 'BCA', '2025-07-29 01:18:11', '2025-07-30 01:18:11', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(17, '', '', '', 'JNE', 'BCA', '2025-07-29 01:18:32', '2025-07-30 01:18:32', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(18, '', '', '', 'JNE', 'BCA', '2025-07-29 01:36:26', '2025-07-30 01:36:26', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(19, '', '', '', 'JNE', 'BCA', '2025-07-29 01:38:47', '2025-07-30 01:38:47', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(20, '', '', '', 'JNE', 'BCA', '2025-07-29 01:40:46', '2025-07-30 01:40:46', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(21, '', '', '', 'JNE', 'BCA', '2025-07-29 01:47:26', '2025-07-30 01:47:26', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(22, '', '', '', 'JNE', 'BCA', '2025-07-29 01:47:53', '2025-07-30 01:47:53', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(23, '', '', '', 'JNE', 'BCA', '2025-07-29 01:50:29', '2025-07-30 01:50:29', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(24, '', '', '', 'JNE', 'BCA', '2025-07-29 01:53:00', '2025-07-30 01:53:00', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(25, '', '', '', 'JNE', 'BCA', '2025-07-29 01:53:29', '2025-07-30 01:53:29', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(26, '', '', '', 'JNE', 'BCA', '2025-07-29 01:58:13', '2025-07-30 01:58:13', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(27, '', '', '', 'JNE', 'BCA', '2025-07-29 01:58:28', '2025-07-30 01:58:28', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(28, '', '', '', 'JNE', 'BCA', '2025-07-29 01:58:43', '2025-07-30 01:58:43', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(29, '', '', '', 'JNE', 'BCA', '2025-07-29 02:13:31', '2025-07-30 02:13:31', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(30, '', '', '', 'JNE', 'BCA', '2025-07-29 02:19:37', '2025-07-30 02:19:37', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(31, '', '', '', 'JNE', 'BCA', '2025-07-29 02:23:43', '2025-07-30 02:23:43', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(32, '', '', '', 'JNE', 'BCA', '2025-07-29 02:27:01', '2025-07-30 02:27:01', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(33, '', '', '', 'JNE', 'BCA', '2025-07-29 02:28:25', '2025-07-30 02:28:25', NULL, 'Menunggu Konfirmasi', 'Belum Dikirim'),
(34, '', '', '', 'JNE', 'BCA', '2025-07-29 02:32:54', '2025-07-30 02:32:54', 'Screenshot_(73)10.png', 'Menunggu Konfirmasi', 'Belum Dikirim'),
(35, '', '', '', 'JNE', 'BCA', '2025-07-29 02:35:18', '2025-07-30 02:35:18', 'Screenshot_(73)11.png', 'Menunggu Konfirmasi', 'Belum Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'kemeja', 1, 80000, ''),
(2, 2, 1, 'kemeja', 1, 80000, ''),
(3, 3, 2, 'kemeja', 1, 85000, ''),
(4, 4, 2, 'kemeja', 1, 85000, ''),
(5, 5, 2, 'kemeja', 1, 85000, ''),
(6, 6, 1, 'kemeja', 1, 80000, ''),
(7, 7, 1, 'kemeja', 1, 80000, ''),
(8, 8, 1, 'kemeja', 1, 80000, ''),
(9, 10, 1, 'kemeja', 1, 80000, ''),
(10, 13, 1, 'kemeja', 1, 80000, ''),
(11, 14, 1, 'kemeja', 1, 80000, ''),
(12, 15, 1, 'kemeja', 1, 80000, ''),
(13, 16, 1, 'kemeja', 1, 80000, ''),
(14, 19, 1, 'kemeja', 1, 80000, ''),
(15, 22, 1, 'kemeja', 1, 80000, ''),
(16, 25, 9, 'Atasan ', 1, 90000, ''),
(17, 26, 1, 'kemeja', 1, 80000, ''),
(18, 31, 1, 'kemeja', 1, 80000, ''),
(19, 32, 2, 'kemeja', 1, 85000, ''),
(20, 35, 2, 'kemeja', 1, 85000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2),
(3, 'Dina Istifada', 'Dina Istifada', '123', 2),
(4, 'Al moh', 'Al moh', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
