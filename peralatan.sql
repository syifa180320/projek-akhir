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
-- Struktur dari tabel `peralatan`
--

CREATE TABLE `peralatan` (
  `peralatan_id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `kondisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`peralatan_id`, `kode`, `gambar`, `nama_alat`, `stok`, `kondisi`) VALUES
(1, '', 'soundsystem.PNG', 'Sound System', 2, 'Baik'),
(2, '', 'kamera.PNG', 'Kamera', 3, 'Baik'),
(3, '', 'panggung.PNG', 'Panggung', 2, 'Baik'),
(4, '', 'kursi.PNG', 'Kursi Tamu', 3, 'Baik'),
(5, '', 'proyektor.PNG', 'proyekor', 2, 'baik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`peralatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `peralatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
