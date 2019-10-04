<?php
session_start();
include "../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

if ($page=='konsumen' AND $act=='hapus'){
	mysql_query("DELETE FROM konsumen WHERE idkonsumen='$_GET[id]'");
	header('location:../../utama.php?page='.$page);
}
elseif ($page=='konsumen' AND $act=='input'){
	$D=date("Y-m-d",strtotime($_POST["T5"]));
	mysql_query("INSERT INTO konsumen(idkonsumen,nmkonsumen,
	alkonsumen,email,tgldaftar)VALUES('$_POST[T1]','$_POST[T2]',
	'$_POST[T3]','$_POST[T4]','$D')");
	header('location:../../utama.php?page='.$page);
}
elseif ($page=='konsumen' AND $act=='update'){
	$D=date("Y-m-d",strtotime($_POST["T5"]));
	mysql_query("UPDATE konsumen SET nmkonsumen='$_POST[T2]',
	alkonsumen='$_POST[T3]',email='$_POST[T4]',tgldaftar='$D' WHERE
	idkonsumen='$_POST[T1]'");
	header('location:../../utama.php?page='.$page);
}
?>
