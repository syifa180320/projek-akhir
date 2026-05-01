<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$pj = $_POST['penanggung_jawab'];
$peralatan = $_POST['peralatan_id'];
$tanggal = $_POST['tanggal'];
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$keperluan = $_POST['keperluan'];

mysqli_query($conn,"INSERT INTO peminjaman 
VALUES(NULL,'$nama','$pj','$peralatan','$tanggal','$jam_mulai','$jam_selesai','$keperluan','menunggu',NOW())");

header("location:status_pengguna.php");
?>