<?php
session_start();
include "../koneksi.php";

if(!isset($_GET['id'])){
    die("ID peminjaman tidak ditemukan");
}

$id = (int)$_GET['id'];
$get = mysqli_query($conn," SELECT p.*, u.username FROM peminjaman p INNER JOIN user u ON p.id = u.id WHERE p.peminjaman_id = '$id' ");

$data = mysqli_fetch_assoc($get);
if(!$data){
    die("Peminjaman tidak ditemukan");
}

$update = mysqli_query($conn," UPDATE peminjaman SET status='diterima' WHERE peminjaman_id='$id'");

if(!$update){
    die(mysqli_error($conn));
}

$username = $data['username'];
$pesan = "Pengajuan peminjaman Anda telah disetujui oleh Admin.";

$insert = mysqli_query($conn," INSERT INTO notifikasi(username, pesan, status) VALUES ('$username','$pesan','belum_dibaca')");

if(!$insert){
    die(mysqli_error($conn));
}

header("Location: index.php");
exit;