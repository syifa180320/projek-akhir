<?php
include "../koneksi.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    mysqli_query($conn," UPDATE notifikasi SET status='sudah_dibaca' WHERE notifikasi_id='$id'");

    echo "ok";

}else{

    echo "gagal";

}
?>