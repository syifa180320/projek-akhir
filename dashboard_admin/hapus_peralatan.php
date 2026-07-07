<?php
include '../koneksi.php';
$peralatan_id = $_GET['peralatan_id'];

mysqli_query($conn, "DELETE from peralatan WHERE peralatan_id = $peralatan_id");
echo '<script>alert("data berhasil dihapus");</script>';
header("location: peralatan.php");
?>