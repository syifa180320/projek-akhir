CREATE DATABASE IF NOT EXISTS bth_pinjam;
USE bth_pinjam;

-- Tabel user
CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(255) NOT NULL,
  tlp VARCHAR(20),
  gmail VARCHAR(50),
  role VARCHAR(20) NOT NULL
);

-- Data default (aman)
INSERT INTO user (nama, username, password, role) VALUES
('Administrator', 'admin', '123', 'admin');

-- Tabel peralatan
CREATE TABLE peralatan (
  peralatan_id INT AUTO_INCREMENT PRIMARY KEY,
  kode VARCHAR(20) NOT NULL,
  nama_alat VARCHAR(50) NOT NULL,
  kondisi VARCHAR(20) NOT NULL
);

-- Contoh data
INSERT INTO peralatan (kode, nama_alat, kondisi) VALUES
('D001', 'Sound System', 'Baik'),
('D002', 'Kamera', 'Baik');

-- Tabel peminjaman
CREATE TABLE peminjaman (
  peminjaman_id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  penanggung_jawab VARCHAR(50) NOT NULL,
  peralatan_id INT NOT NULL,
  tanggal DATE NOT NULL,
  jam_mulai TIME NOT NULL,
  jam_selesai TIME NOT NULL,
  keperluan TEXT NOT NULL,
  status ENUM('menunggu','diterima','ditolak') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (peralatan_id) REFERENCES peralatan(peralatan_id)
);