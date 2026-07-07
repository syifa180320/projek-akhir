<?php
include '../koneksi.php';

$peralatan_id = $_POST['peralatan_id'];
$kode         = $_POST['kode'];
$nama_alat    = $_POST['nama_alat'];
$kondisi      = $_POST['kondisi'];

$nama_file = $_FILES['gambar']['name'];
$tmp_file  = $_FILES['gambar']['tmp_name'];

if($nama_file != ''){
    move_uploaded_file($tmp_file, "../gambar/".$nama_file);

    mysqli_query($conn," UPDATE peralatan SET kode='$kode', gambar='$nama_file', nama_alat='$nama_alat', kondisi='$kondisi' WHERE peralatan_id='$peralatan_id'");
}else{
    mysqli_query($conn," UPDATE peralatan SET kode='$kode', nama_alat='$nama_alat', kondisi='$kondisi' WHERE peralatan_id='$peralatan_id'");
}

header("Location: peralatan.php");
?>