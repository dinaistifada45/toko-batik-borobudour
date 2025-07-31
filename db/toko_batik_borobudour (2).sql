-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2025 pada 16.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

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
-- Struktur dari tabel `tb_barang`
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
-- Dumping data untuk tabel `tb_barang`
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
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jasa_pengiriman` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `status_pengiriman` varchar(50) DEFAULT 'Belum Dikirim',
  `status_konfirmasi` varchar(50) DEFAULT 'Belum Dikonfirmasi',
  `status_pembayaran` varchar(50) DEFAULT 'Belum Dikonfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `no_telp`, `jasa_pengiriman`, `bank`, `tgl_pesan`, `batas_bayar`, `bukti_pembayaran`, `status_pengiriman`, `status_konfirmasi`, `status_pembayaran`) VALUES
(12, 'p', 'p', 'p', 'JNE', 'BCA', '2025-07-31 21:34:56', '2025-08-01 21:34:56', 'Screenshot_(73)12.png', 'Belum Dikirim', 'Belum Dikonfirmasi', 'Belum Dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
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
-- Dumping data untuk tabel `tb_pesanan`
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
(20, 35, 2, 'kemeja', 1, 85000, ''),
(21, 36, 1, 'kemeja', 1, 80000, ''),
(22, 1, 1, 'kemeja', 1, 80000, ''),
(23, 4, 1, 'kemeja', 1, 80000, ''),
(24, 7, 1, 'kemeja', 1, 80000, ''),
(25, 8, 1, 'kemeja', 1, 80000, ''),
(26, 9, 1, 'kemeja', 1, 80000, ''),
(27, 10, 1, 'kemeja', 1, 80000, ''),
(28, 11, 1, 'kemeja', 1, 80000, ''),
(29, 12, 1, 'kemeja', 1, 80000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
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
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
