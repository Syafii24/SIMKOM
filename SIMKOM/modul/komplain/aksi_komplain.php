<?php

session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi untuk Hapus Data tabel komplain
if ($page=='komplain' AND $act=='hapus'){
	mysql_query("DELETE FROM komplain WHERE idkomplain='$_GET[id]'");
	header('location:../../utama.php?page='.$page);
}
// Aksi untuk input Data tabel komplain
elseif ($page=='komplain' AND $act=='input'){
	$D=date("Y-m-d",strtotime($_POST["T5"]));
	mysql_query("INSERT INTO komplain(idkomplain,nm_konsumen,
	judul_komplain,desk_komplain,tgl_buat)VALUES('$_POST[T1]','$_POST[T2]',
	'$_POST[T3]','$_POST[T4]','$D')");
	header('location:../../utama.php?page='.$page);
}
// Aksi untuk Update Data tabel komplain
elseif ($page=='komplain' AND $act=='update'){
	$D=date("Y-m-d",strtotime($_POST["T5"]));
	mysql_query("UPDATE komplain SET nm_konsumen='$_POST[T2]',
	judul_komplain='$_POST[T3]',desk_komplain='$_POST[T4]',tglentry='$D' WHERE
	idkomplain='$_POST[T1]'");
	header('location:../../utama.php?page='.$page);
}

?>
