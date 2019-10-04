<?php
//Ketikkan Source Code 1 Disini
error_reporting(0);
session_start();
if (empty($_SESSION[username])
	AND empty ($_SESSION[password])){
		header('location:./');
	}else{

//Batas Akhir Pengetikkan Source Code 1
?>
<html>
<head>
<title>TUGAS UTS WEB 2</title>
<link rel="shortcut icon" href="images/icon.png">
<style type="text/css"> 
<!-- 
body  {
	font: 100% Verdana, Arial, Helvetica, 
	sans-serif; background: #7FFF00; 
	margin: 0; padding: 0;	
	text-align: center; color: #000000;
}
.mycss #container { 
	width: 90%;	background: #FFFFFF; 
	margin: 20 auto;
	border: 1px solid #000000; 
	text-align: left; 
} 
.mycss #header { 
	background:#FF1000; padding: 0 10px;  
} 
.mycss #header h1 {
	margin: 0; padding: 10px 0;
}
.mycss #sidebar1 {
	float: left; width: 24%; 
	background:#69F; padding: 15px 0;
}
.mycss #sidebar1 h3, 
.mycss #sidebar1 p {
	margin-left: 10px; margin-right: 10px;
}
.mycss #mainContent { 
	margin: 0 20px 0 26%;
} 
.mycss #footer { 
	padding: 0 10px; background:yellow;
} 
.mycss #footer p {
	margin: 0; padding: 10px 0; 
}
/* Lain-Lain */
.fltrt { 
	float: right; margin-left: 8px;
}
.fltlft {
	float: left; margin-right: 8px;
}
.clearfloat { 
	clear:both; height:0; 
	font-size: 1px; line-height: 0px;
}
--> 
</style>
</head>
<body class="mycss">
<div id="container"> 
<div id="header">
<h1 align="center"><font color="#FFFFFF">Sistem Manajemen Komplain</font></h1>
<h2 align="center"><font color="#FFFFFF">PT. Sumber Alfaria Trijaya,Tbk</font></h2>
<h2 align="center"><font color="#FFFFFF">Jl. Raya Cirebon-bandung no. 2 Gempol Cirebon</font></h2>
<!-- end #header --></div>
	<div id="sidebar1"><h3><font color="#FFFFFF"><a style="text-decoration:none;" href="?page=home">D A S H B O A R D</a></font></h3><hr>
		<ul style="color:green; font-weight:bold">
			<li><a style="text-decoration:none;" href="?page=home">H O M E</a></li>
			<!-- Ketikkan Source Code 2 Disini -->
			<!-- Menu Master / Data Master -->
			<?php if ($_SESSION['level']==1 or $_SESSION['level']==2 or $_SESSION['level']==0){ ?>
			<li><a style="text-decoration:none;"
			href="?page=konsumen">DATA KONSUMEN</a></li>
			<!-- Akhir Menu Master / Data Master -->
			<?php } ?>
			<!-- Batas Akhir Pengetikkan Source Code 2 -->
			
			<!-- Ketikkan Source Code 3 Disini -->
			<!-- Menu Transaksi / Data Transaksi -->
			<?php if($_SESSION['level']==1 or $_SESSION['level']==2){ ?>
			<li><a style="text-decoration:none;"
			href="?page=pegawai">DATA PEGAWAI</a></li>
			<!-- Menu Transaksi / Data Transaksi -->
			<?php } ?>
			<!-- Batas Akhir Pengetikkan Source Code 3 -->
			
			<!-- Ketikkan Source Code 4 Disini -->
			<!-- Menu Laporan -->
			<?php if($_SESSION['level']==1 or $_SESSION['level']==2 or $_SESSION['level']==3){ ?>
			<li><a style="text-decoration:none;"
			href="?page=komplain">LIHAT KOMPLAIN</a></li>
			<!-- Akhir Menu LAPORAN -->
			<?php } ?>
			<!-- Batas Akhir Pengetikkan Source Code 4 -->
			<?php if($_SESSION['level']==0){ ?>
			<li><a style="text-decoration:none;"
			href="?page=komplain">MEMBUAT KOMPLAIN</a></li>
			<?php } ?>
			<?php if($_SESSION['level']==0){ ?>
			<li><a style="text-decoration:none;"
			href="?page=Skomplain">STATUS KOMPLAIN</a></li>
			<?php } ?>
			<!-- Ketikkan Source Code 5 Disini -->
			<!-- Menu Pengguna / Data Pengguna -->
			<?php if($_SESSION['level']==1){ ?>
			<li><a style="text-decoration:none;"
			href="?page=user">DATA ADMIN</a></li>
			<?php } ?>
			<?php if($_SESSION['level']==1){ ?>
			<li><a style="text-decoration:none;"
			href="?page=toko">DAFTAR TOKO</a></li>
			<?php } ?>
			<li><a style="text-decoration:none;"
			href="?page=logout">LOGOUT</a></li><br><hr>
			<!-- Batas Akhir Pengetikkan Source Code 5 -->
		</ul>
		<!-- end #sidebar1 -->
	</div>
	<div id="mainContent">
		<!-- Ketikkan Source Code 6 Disini -->
		<?php include "halaman.php"; ?>
		
		<!-- Batas Akhir Pengetikkan Source Code 6 -->
	<!-- end #mainContent -->
	</div>
<br class="clearfloat" />
<div id="footer">
<p align="center"><font color="#000000">Copyright &copy; <?php echo date("Y"); ?> - STMIK IKMI CIREBON</font></p>
<!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
<?php
//Ketikkan Source Code 7 Disini
	}
//Batas Akhir Pengetikkan Source Code 7
?>