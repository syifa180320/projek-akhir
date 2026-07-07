<?php
session_start();
include '../koneksi.php';

$id = $_POST['id'];
$password_lama = $_POST['password_lama'];
$password_baru = $_POST['password_baru'];
$konfirmasi = $_POST['konfirmasi_password'];

$data = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
$user = mysqli_fetch_assoc($data);

if (!$user) {
    die("User tidak ditemukan");
}

if ($password_lama != $user['password']) {
    echo "<script>
            alert('Password lama salah!');
            window.location='profile.php';
          </script>";
    exit;
}

if ($password_baru != $konfirmasi) {
    echo "<script>
            alert('Konfirmasi password tidak sesuai!');
            window.location='profile.php';
          </script>";
    exit;
}

mysqli_query($conn, " UPDATE user SET password='$password_baru' WHERE id='$id'");

echo "<script>
        alert('Password berhasil diubah');
        window.location='profile.php';
      </script>";
?>