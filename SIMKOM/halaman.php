<?php

include "config/paging.php";
include "config/koneksi.php";
include "config/function.php";

if ($_GET[page]=='home'){
echo "<h1> H O M E </h1>
	<center>
		<h4>Selamat datang $_SESSION[nm_pengguna] !!! 
		di Aplikasi Komplain- <b>PT.Sumber Alfaria Trijaya,Tbk</b>, <br>
		Pilih menu disamping untuk mengolah data..</h4><br>
		<img src='images/albi.jpg' width='600' height='300'>
	</center>
	<center>
		<h3><b>NIM : 31160014 <BR> NAMA : ABDULLAH SYAFII</h3></b>
	</center>";
}

elseif ($_GET[page]=='komplain'){
  include "modul/komplain/komplain.php";
}


elseif ($_GET[page]=='konsumen'){
  include "modul/konsumen/konsumen.php";
}

elseif ($_GET[page]=='toko'){
  include "modul/toko/toko.php";
}

// Bagian Kepegawaian
elseif ($_GET[page]=='pegawai'){
  include "modul/pegawai/pegawai.php";
}
// Batas Akhir Pengetikkan Source Code 4

// Ketikkan Source Code 5 Disini
// Bagian Laporan



// Bagian Pengaturan Pengguna
elseif ($_GET[page]=='user'){
  include "modul/pengguna/user.php";
}

// Keluar Sistem
elseif ($_GET[page]=='logout'){
  include "logout.php";
}
// Batas Akhir Pengetikkan Source Code 5

// Apabila modul tidak ditemukan
else{
if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){
echo"<script>window.location = '404.html'</script> ";
}
}?>
