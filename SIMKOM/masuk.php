<html>
<head>
<title>TUGAS UTS WEB 2</title>
<link rel="shortcut icon" href="images/albi.jpg">
<style type="text/css"> 
<!-- 
body  {
	font: 100% Verdana, Arial, Helvetica, 
	sans-serif; background: #7FFF00; 
	margin: 0; padding: 0;	
	text-align: center; color: #000000;
}
.mycss #container { 
	width: 65%;	background: #FFFFFF; 
	margin: 30 auto;
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
.style35 {
	font-family: "Arial";
	font-size: 12pt;
	font-weight: bold;
	color: #000000;
}
--> 
</style>
</head>
<body class="mycss">
<div id="container"> 
<div id="header">
<h1 align="center"><font color="#FFFFFF">Sistem Manajemen Komplain</font></h1>
<h2 align="center"><font color="#FFFFFF">PT. Sumber Alfaria Trijaya,Tbk</font></h2><br>
</div>
<br>
	<div id="sidebar1"><h3><font color="#FFFFFF"><a style="text-decoration:none;" href="index.php">D A S H B O A R D</a></font></h3><hr>
		<ul style="color:green; font-weight:bold">
			<li><a style="text-decoration:none;" href="index.php">H O M E</a></li>
			<li><a style="text-decoration:none;" href="masuk.php">L O G I N</a></li><br><hr>			
		</ul>
	
	</div>
	<div id="mainContent">
		<center>
		
		<h2>FORM LOGIN</h2><hr>
		<form action="login.php" method="post" autocomplete="on" />
			<table border="0" align="center" width="80%">
			<thead>
			
			</thead>
			<br>
			<tbody>
			<tr>
				<td><h3><b>USERNAME</b></h3></td>
				<td><input class="style35" name="username" id="username" type="text" placeholder="Isi Login Name" required />
				<br><small>Contoh : admin, dll</small></td>
			</tr>
			<tr>	
				<td><h3><b>PASSWORD</b></h3></td>
				<td><input class="style35" name="password" id="password" type="password" placeholder="************" required />
				<br><small>Contoh : admin, dll</small></td>
			</tr>
			<tr>	
				<td colspan="2"><div align="center">
				<button class="style35" type="submit">L O G I N</button>
				<button class="style35" type="reset" onclick="self.history.back()">B A T A L</button>
				</div></td>
			</tr>	
			</tbody>
			</table>
		</form>
		<p class="style35">Belum Mendaftar ?
			<a style="text-decoration:none;" href="#" class="style35">Daftar Pengguna</a>
		</p>
<div class="clr"></div>

		</center>
		<center><h3><b>NIM : 31160014 <BR> NAMA : ABDULLAH SYAFII</h3></b></center>
	</div>
	<td height="25"><div align="left"><?php echo "Tanggal : ".date("d-M-y");?></div></td>
<br class="clearfloat" />
<div id="footer">
<p align="center"><font color="#000000">Copyright &copy; <?php echo date("Y"); ?> - STMIK IKMI CIREBON</font></p>
</div>
</div>
</body>
</html>
