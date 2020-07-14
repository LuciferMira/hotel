-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2020 pada 19.56
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tipe`
--

CREATE TABLE `tbl_tipe` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tarif` double NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `kamar_tersedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tipe`
--

INSERT INTO `tbl_tipe` (`id_tipe`, `nama_tipe`, `deskripsi`, `tarif`, `foto`, `kamar_tersedia`) VALUES
(1, 'Ekonomi', '1 tempat tidur, 1 kamar mandi, kipas angin', 160000, 'WhatsApp Image 2020-06-08 at 22.09.49.jpeg', 20),
(2, 'Deluxe', '1 kamar tidur, 1 kamar mandi, AC', 400000, 'WhatsApp Image 2020-06-08 at 22.09.50.jpeg', 10),
(3, 'Standart', '1 tempat tidur kecil, 1 kamar mandi, AC', 200000, 'WhatsApp Image 2020-06-08 at 22.09.50 1.jpeg', 10),
(4, 'Superior', '1 tempat tidur, 1 kamar mandi, AC', 250000, 'WhatsApp Image 2020-06-08 at 22.09.52.jpeg', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `tgl_psn` date DEFAULT NULL,
  `tgl_in` date NOT NULL,
  `tgl_out` date NOT NULL,
  `total` double NOT NULL,
  `bayar` double DEFAULT NULL,
  `sisa` double DEFAULT NULL,
  `status` enum('book','done','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jns_kelamin` enum('L','P') DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `no_telp` varchar(18) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `akses` enum('adm','usr') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `tgl_lahir`, `jns_kelamin`, `nik`, `no_telp`, `alamat`, `email`, `password`, `akses`) VALUES
(1, 'Administrator', '1999-08-07', 'L', '786787365376487', '087856437789', 'Jl Cut Meutia 8', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'adm'),
(2, 'User', '1999-06-03', 'P', '98748386768353', '089756789976', 'Jl Semangka 10', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'usr');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
