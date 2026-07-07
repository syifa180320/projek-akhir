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
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `notifikasi_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('belum_dibaca','sudah_dibaca') NOT NULL DEFAULT 'belum_dibaca',
  `suara` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`notifikasi_id`, `username`, `pesan`, `status`, `suara`, `tanggal`) VALUES
(35, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Sistem Informasi.', 'belum_dibaca', 1, '2026-06-28 20:18:28'),
(37, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Sistem Informasi.', 'belum_dibaca', 1, '2026-06-28 15:35:14'),
(38, 'syifa', 'Pengajuan peminjaman Anda telah disetujui oleh Admin.', 'belum_dibaca', 0, '2026-06-28 15:36:04'),
(39, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Bisnis Digital.', 'belum_dibaca', 1, '2026-06-28 15:54:00'),
(40, 'himabisdi', 'Pengajuan peminjaman Anda telah disetujui oleh Admin.', 'belum_dibaca', 0, '2026-06-28 15:57:29'),
(41, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Bisnis Digital.', 'belum_dibaca', 1, '2026-06-28 16:14:51'),
(42, 'himabisdi', 'Pengajuan peminjaman Anda telah disetujui oleh Admin.', 'belum_dibaca', 0, '2026-06-28 16:15:27'),
(43, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Sistem Informasi.', 'belum_dibaca', 1, '2026-06-28 16:16:44'),
(44, 'himasi', 'Pengajuan peminjaman Anda telah disetujui oleh Admin.', 'belum_dibaca', 0, '2026-06-28 16:17:20'),
(45, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Sistem Informasi.', 'belum_dibaca', 1, '2026-06-28 16:21:01'),
(46, 'himasi', 'Pengajuan peminjaman Anda ditolak oleh Admin.', 'belum_dibaca', 0, '2026-06-28 16:21:31'),
(47, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Sistem Informasi.', 'belum_dibaca', 1, '2026-06-28 23:19:27'),
(48, 'himasi', 'Pengajuan peminjaman Anda telah disetujui oleh Admin.', 'belum_dibaca', 0, '2026-06-28 23:19:47'),
(49, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Sistem Informasi.', 'belum_dibaca', 1, '2026-06-28 23:32:45'),
(50, 'admin', 'Terdapat pengajuan peminjaman peralatan baru dari Hima Sistem Informasi.', 'belum_dibaca', 1, '2026-06-29 01:01:44'),
(51, 'himasi', 'Pengajuan peminjaman Anda telah disetujui oleh Admin.', 'belum_dibaca', 0, '2026-06-29 01:05:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`notifikasi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `notifikasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
