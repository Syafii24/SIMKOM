<?php

include "config/koneksi.php";
$T1=$_POST["username"];
$T2=$_POST["password"];
$T2ACAK=base64_encode($T2);

$cari=mysql_query("SELECT * FROM user WHERE username='$T1' AND password='$T2ACAK' AND blokir='T'");
$data=mysql_num_rows($cari);
$read=mysql_fetch_array($cari);


if ($data > 0){
  session_start();
  ("iduser");
  ("nm_user");
  ("username");
  ("password");
  ("level");
  ("blokir");
  ("tgldaftar");

  $_SESSION[iduser] = $read[iduser];
  $_SESSION[nm_user]= $read[nm_user];
  $_SESSION[username]	= $read[username];
  $_SESSION[password]	= $read[password];
  $_SESSION[level]		= $read[level];
  $_SESSION[blokir]		= $read[blokir];
  $_SESSION[tgldaftar]	= $read[tgldaftar];
  
  header('location:utama.php?page=home');
}else{
	echo "<title>..::PT. Sumber Alfaria Trijaya,Tbk - Nama Aplikasi::..</title>";
	echo "<link rel='shortcut icon' href='images/albi.jpg' />";	
  	echo "<link href='css/style2.css' rel='stylesheet' type='text/css'><center>LOGIN GAGAL! <br>
			Username atau Password Anda tidak benar.<br>
			Atau account Anda sedang diblokir.<br>";
  	echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}

?>