<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama_alat = $_POST['nama_alat'];
$kondisi = $_POST['kondisi'];
 
// menginput data ke database
mysqli_query($conn,"INSERT into peralatan values(NULL,'$kode','$nama_alat','$kondisi')");
 
// mengalihkan halaman kembali ke index.php
header("location:peralatan.php");
 
?>
