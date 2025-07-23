-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 12:47 PM
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
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Dina Istifada', 'wonopringgo', '2025-07-03 23:14:44', '2025-07-04 23:14:44'),
(2, 'Dina Istifada', 'wonopringgo', '2025-07-04 13:16:43', '2025-07-05 13:16:43'),
(3, '', '', '2025-07-07 10:46:29', '2025-07-08 10:46:29'),
(4, 'Al moh', 'kedungwuni', '2025-07-18 13:42:19', '2025-07-19 13:42:19'),
(5, '', '', '2025-07-23 17:23:43', '2025-07-24 17:23:43'),
(6, '', '', '2025-07-23 17:25:31', '2025-07-24 17:25:31');

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
(6, 6, 1, 'kemeja', 1, 80000, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
