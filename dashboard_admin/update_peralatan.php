<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$peralatan_id = $_POST['peralatan_id'];
$kode = $_POST['kode'];
$nama_alat = $_POST['nama_alat'];
$kondisi = $_POST['kondisi'];
 
// menginput data ke database
mysqli_query($conn,"UPDATE peralatan set kode='$kode', nama_alat='$nama_alat', kondisi='$kondisi' where peralatan_id='$peralatan_id'");
 
// mengalihkan halaman kembali ke index.php
header("location:peralatan.php");
 
?>
