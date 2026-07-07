<?php
include '../koneksi.php';

$nama_alat = $_POST['nama_alat'];
$kondisi   = $_POST['kondisi'];

$nama_file = $_FILES['gambar']['name'];
$tmp_file  = $_FILES['gambar']['tmp_name'];

if(!empty($nama_file)){

    move_uploaded_file(
        $tmp_file,
        "../gambar/".$nama_file
    );

    mysqli_query($conn,"
        INSERT INTO peralatan (nama_alat,gambar,kondisi) VALUES('$nama_alat','$nama_file','$kondisi')
    ");

}else{

    mysqli_query($conn,"
        INSERT INTO peralatan (nama_alat,kondisi) VALUES ('$nama_alat','$kondisi')
    ");
}

header("Location: peralatan.php");
exit;
?>