<?php

include "../koneksi.php";

$id = $_GET['id'];

mysqli_query($conn," UPDATE notifikasi SET suara=1 WHERE notifikasi_id='$id'");