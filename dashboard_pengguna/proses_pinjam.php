<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['id'])) {
    die("Silakan login terlebih dahulu.");
}

$id = $_SESSION['id'];

$nama         = $_POST['nama'] ?? '';
$pj           = $_POST['pj'] ?? '';
$tgl_pinjam   = $_POST['tgl_pinjam'] ?? '';
$tgl_kembali  = $_POST['tgl_kembali'] ?? '';
$keperluan    = $_POST['keperluan'] ?? '';

if (empty($_POST['peralatan_id'])) {
    die("Silakan pilih minimal satu peralatan.");
}

$peralatan_id = implode(",", $_POST['peralatan_id']);
$sql = mysqli_query($conn,"INSERT INTO peminjaman(id,nama,pj,peralatan_id,tgl_pinjam,tgl_kembali,keperluan,status)VALUES('$id','$nama','$pj','$peralatan_id','$tgl_pinjam','$tgl_kembali','$keperluan','menunggu')");

if(!$sql){
    die(mysqli_error($conn));
}

/* Notifikasi Admin */

$pesan = "Terdapat pengajuan peminjaman peralatan baru dari ".$nama.".";

$notif = mysqli_query($conn," INSERT INTO notifikasi(username,pesan,status)VALUES('admin','$pesan','belum_dibaca')");

if(!$notif){
    die(mysqli_error($conn));
}

header("Location: status_peminjaman.php");
exit;