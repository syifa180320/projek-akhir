-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql203.infinityfree.com
-- Waktu pembuatan: 07 Jul 2026 pada 02.18
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
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pj` varchar(50) NOT NULL,
  `peralatan_id` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `keperluan` text NOT NULL,
  `status` enum('menunggu','diterima','ditolak') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `id`, `nama`, `pj`, `peralatan_id`, `tgl_pinjam`, `tgl_kembali`, `keperluan`, `status`, `created_at`) VALUES
(49, 7, 'Hima Bisnis Digital', 'zahra', '1,2,3,4,5', '2026-06-09', '2026-06-11', 'seminar design', 'diterima', '2026-06-28 23:15:27'),
(50, 2, 'Hima Sistem Informasi', 'syifa', '2', '2026-06-22', '2026-06-23', 'vlog', 'diterima', '2026-06-28 23:17:20'),
(51, 2, 'Hima Sistem Informasi', 'fahri', '1,2,3', '2026-07-14', '2026-07-15', 'konser', 'ditolak', '2026-06-28 23:21:31'),
(52, 2, 'Hima Sistem Informasi', 'dina', '1,2', '2026-07-14', '2026-07-15', 'lomba religi', 'diterima', '2026-06-29 06:19:47'),
(53, 2, 'Hima Sistem Informasi', 'putri', '1,2,3', '2026-07-30', '2026-07-31', 'dj ', 'menunggu', '2026-06-29 06:32:45'),
(54, 2, 'Hima Sistem Informasi', 'fadwa', '1', '2026-06-18', '2026-06-19', 'latihan nyanyi', 'diterima', '2026-06-29 08:05:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
