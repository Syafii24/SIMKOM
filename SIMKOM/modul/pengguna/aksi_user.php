<?php
//Ketikkan Source Code 1 Disini
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

// Aksi Untuk Hapus Data Tabel pengguna
if ($page=='user' AND $act=='hapus'){
	mysql_query("DELETE FROM user WHERE
	iduser='$_GET[id]'");
	header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Input Data Tabel pengguna
elseif ($page=='user' AND $act=='input'){
	$P=$_POST["T4"];
	$P1 = base64_encode($P); //Enkripsi Metode base64_encode
	$D=date("Y_m_d",strtotime($_POST["T5"]));
	mysql_query("INSERT INTO user(iduser,nm_user,
	username,password,level,blokir,tglentry)VALUES
	('$_POST[T1]','$_POST[T2]','$_POST[T3]','$P1',
	'$_POST[C1]','$_POST[C2]','$D')");
	header('location:../../utama.php?page='.$page);
}

// Aksi Untuk Update Data Tabel pengguna
elseif ($page=='user' AND $act=='update'){
	$P=$_POST["T4"];
	$P1 = base64_encode($P); //Enkripsi Metode base64_decode
	$D=date("Y-m-d",strtotime($_POST["T5"]));
	mysql_query("UPDATE user SET nm_user='$_POST[T2]',
	username='$_POST[T3]',password='$P1',level='$_POST[C1]',
	blokir='$_POST[C2]',tglentry='$D' WHERE
	iduser='$_POST[T1]'");
	header('location:../../utama.php?page='.$page);
}
//Batas Akhir Pengetikkan Source Code 1
?>
