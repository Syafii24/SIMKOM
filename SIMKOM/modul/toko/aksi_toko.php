<?php
//Ketikkan Source Code 1 aksi_bagian.php Disini
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi untuk Hapus Data tabel bagian
if ($page=='toko' AND $act=='hapus'){
	mysql_query("DELETE FROM toko WHERE idtoko='$_GET[id]'");
	header('location:../../utama.php?page='.$page);
}
// Aksi untuk input Data tabel bagian
elseif ($page=='toko' AND $act=='input'){
	$D=date("Y-m-d",strtotime($_POST["T5"]));
	mysql_query("INSERT INTO toko(idtoko,nmtoko,
	alamat_toko,kontak_toko,tgl_buat)VALUES('$_POST[T1]','$_POST[T2]',
	'$_POST[T3]','$_POST[T4]','$D')");
	header('location:../../utama.php?page='.$page);
}
// Aksi untuk Update Data tabel bagian
elseif ($page=='toko' AND $act=='update'){
	$D=date("Y-m-d",strtotime($_POST["T5"]));
	mysql_query("UPDATE toko SET nmtoko='$_POST[T2]',
	alamat_toko='$_POST[T3]',kontak_toko='$_POST[T4]',tgl_buat='$D' WHERE
	idtoko='$_POST[T1]'");
	header('location:../../utama.php?page='.$page);
}
//Batas Akhir Pengetikkan Source Code 1 aksi_toko.php
?>
