<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user
WHERE username='$username' AND password='$password'");

// CEK DATA
$cek = mysqli_num_rows($query);

if ($cek > 0) {

    $data = mysqli_fetch_assoc($query);

    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];

    // arahkan sesuai role
    if ($data['role'] == "admin") {
        header("Location: dashboard_admin/index.php");
    } else {
        header("Location: dashboard_pengguna/index.php");
    } exit;

} else {
    header("Location: index.php?pesan=gagal");
    exit;
}
?>