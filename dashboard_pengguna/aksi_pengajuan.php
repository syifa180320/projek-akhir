<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$pj = $_POST['penanggung_jawab'];
$peralatan = $_POST['peralatan_id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$keperluan = $_POST['keperluan'];

mysqli_query($conn,"INSERT INTO peminjaman 
VALUES(NULL,'$nama','$pj','$peralatan','$tgl_pinjam','$tgl_kembali','$keperluan','menunggu',NOW())");

header("location:status_pengguna.php");
?>