<?php
include '../koneksi.php';

$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

$sql = mysqli_query($conn," INSERT INTO user (nama, username, password, role)
    VALUES ('$nama', '$username', '$password', '$role')
");

if(!$sql){
    die("Error: ".mysqli_error($conn));
}

header("Location: pengguna.php");
exit;
?>