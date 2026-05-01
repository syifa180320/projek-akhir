<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database = "bth_pinjam";

$conn = mysqli_connect($server_name, $username, $password, $database);
if(mysqli_connect_errno()){
	echo " Aplikasi belum konek / koneksi gagal : ". mysqli_connect_errno();
}
?>