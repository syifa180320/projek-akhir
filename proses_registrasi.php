<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$tlp = $_POST['tlp'];
$gmail = $_POST['gmail'];
$role = $_POST['role'];

 
// menginput data ke database
mysqli_query($conn,"INSERT into user values(NULL, '$nama','$username','$password','$tlp','$gmail','$role')");
 
// mengalihkan halaman kembali ke index.php

 header("location:dashboard_admin/index.php");
?>
