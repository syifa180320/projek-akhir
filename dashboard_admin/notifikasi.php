<?php
include "../koneksi.php";

$query = mysqli_query($conn," SELECT * FROM notifikasi WHERE username='admin' AND suara=0 ORDER BY notifikasi_id ASC LIMIT 1");
$data = [];

while($row=mysqli_fetch_assoc($query)){
    $data[]=$row;
}

echo json_encode($data);