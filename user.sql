-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql203.infinityfree.com
-- Waktu pembuatan: 07 Jul 2026 pada 02.19
-- Versi server: 11.4.12-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_41998817_bth_pinjam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tlp` int(11) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `gambar`, `username`, `password`, `tlp`, `gmail`, `role`) VALUES
(1, 'Dede Syifa Maspupah', 'syifa.jpeg', 'syifa', '123', 81427213, 'syifa@gmail.com', 'admin'),
(2, 'Hima Sistem Informasi', 'himasi.PNG', 'himasi', '123', 8753323, 'himasi@gmail.com', 'pengguna'),
(6, 'Hima Farmasi', 'kursi.PNG', 'himafar', '123', 84523, 'himafar@gmail.com', 'pengguna'),
(7, 'Hima Bisnis Digital', 'cuci gudang.jpg', 'himabisdi', '123', 82462, 'himabisdi@gmail.com', 'pengguna'),
(8, 'hima gizi', '', 'himagz', '123', 0, '', 'pengguna'),
(9, 'hima kosmetik', '', 'himakos', '123', 0, '', 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
