<?php
//Ketikkan Source Code 1 Disini ..
$server = "localhost";
$username = "root";
$password = "";
$database = "31160014";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
//Batas Akhir Pengetikkan Source Code 1 ..
?>
