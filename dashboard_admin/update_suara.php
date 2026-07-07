<?php
include "../koneksi.php";

if(isset($_GET['id']) && $_GET['id'] != ''){

    $id = $_GET['id'];
    mysqli_query($conn," UPDATE notifikasi SET suara = 1 WHERE notifikasi_id = '$id' AND suara = 0 ");
    echo "ok";

} else {
    echo "id kosong";
}
?>