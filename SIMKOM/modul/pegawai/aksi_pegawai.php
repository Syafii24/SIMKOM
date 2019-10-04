<?php
//Ketikkan Source Code 1 aksi_bagian.php Disini
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi untuk Hapus Data tabel pegawai
if ($page=='pegawai' AND $act=='hapus'){
	mysql_query("DELETE FROM pegawai WHERE idpegawai='$_GET[id]'");
	header('location:../../utama.php?page='.$page);
}
// Aksi untuk input Data tabel pegawai
elseif ($page=='pegawai' AND $act=='input'){
	$D=date("Y-m-d",strtotime($_POST["T7"]));
	mysql_query("INSERT INTO pegawai(idpegawai,nmpegawai,
	jkel,alpegawai,email,no_kontak,tglmasuk)VALUES('$_POST[T1]','$_POST[T2]',
	'$_POST[T3]','$_POST[T4]','$_POST[T5]','$_POST[T6]','$D')");
	header('location:../../utama.php?page='.$page);
}
// Aksi untuk Update Data tabel pegawai
elseif ($page=='pegawai' AND $act=='update'){
	$D=date("Y-m-d",strtotime($_POST["T7"]));
	mysql_query("UPDATE pegawai SET nmpegawai='$_POST[T2]',
	jkel='$_POST[T3]',alpegawai='$_POST[T4]',email='$_POST[T5]',no_kontak='$_POST[T6]',tglmasuk='$D' WHERE
	idpegawai='$_POST[T1]'");
	header('location:../../utama.php?page='.$page);
}
//Batas Akhir Pengetikkan Source Code 1 aksi_bagian.php
?>
