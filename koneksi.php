<?php
$server_name = "sql203.infinityfree.com";
$username = "if0_41998817";
$password = "l4c9gPI9JC";
$database = "if0_41998817_bth_pinjam";

$conn = mysqli_connect($server_name, $username, $password, $database);
if(mysqli_connect_errno()){
	echo " Aplikasi belum konek / koneksi gagal : ". mysqli_connect_errno();
}
?>