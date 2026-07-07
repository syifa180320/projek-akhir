<?php
session_start();
include "../koneksi.php";

$username = $_SESSION['username'];

$query = mysqli_query($conn," SELECT * FROM notifikasi WHERE username='$username' AND suara=0 ORDER BY notifikasi_id ASC LIMIT 1");
$data = [];

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data);