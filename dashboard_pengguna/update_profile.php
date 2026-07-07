<?php
include '../koneksi.php';

$id       = $_POST['id'];
$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$tlp      = $_POST['tlp'];
$gmail    = $_POST['gmail'];


if($_FILES['gambar']['name'] != ''){

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../gambar/".$gambar
    );

    if(!empty($password)){
        mysqli_query($conn," UPDATE user SET nama='$nama', username='$username', gmail='$gmail', tlp='$tlp', password='$password', gambar='$gambar' WHERE id='$id'");

    }else{
        mysqli_query($conn," UPDATE user SET nama='$nama', username='$username', gmail='$gmail', tlp='$tlp', gambar='$gambar' WHERE id='$id'");
    }

}else{

    if(!empty($password)){
        mysqli_query($conn,"UPDATE user SET nama='$nama', username='$username', gmail='$gmail', tlp='$tlp', password='$password' WHERE id='$id'");

    }else{

        mysqli_query($conn," UPDATE user SET nama='$nama', username='$username', gmail='$gmail', tlp='$tlp'WHERE id='$id'");
    }
}

header("Location: profile.php");
?>