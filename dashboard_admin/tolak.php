<?php
include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($conn,"UPDATE peminjaman SET status='ditolak' WHERE peminjaman_id='$id'");
header("location:index.php");