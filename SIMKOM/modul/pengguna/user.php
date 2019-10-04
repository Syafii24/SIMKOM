<link href="calendar/css/jscal2.css" rel="stylesheet" type="text/css" />
<link href="calendar/css/border-radius.css" rel="stylesheet" type="text/css" />
<link href="calendar/css/steel/steel.css" rel="stylesheet" type="text/css" />
<script src="calendar/js/jscal2.js"></script>
<script src="calendar/js/lang/en.js"></script>
<script type="text/javascript">//<![CDATA[
      var cal = Calendar.setup({
          onSelect: function(cal) { cal.hide() }
      });
      cal.manageFields("f_btn1", "f_date1", "%Y-%m-%d");
      cal.manageFields("f_btn2", "f_date2", "%b %e, %Y");
      cal.manageFields("f_btn3", "f_date3", "%e %B %Y");
      cal.manageFields("f_btn4", "f_date4", "%A, %e %B, %Y");
//]]></script>
<style type="text/css">
<!--
.style35 {
	color: #000000;
	font-size: 9pt;
	font-family: Arial, Helvetica, Verdana, sans-serif;
	font-weight: bold;
}
-->
</style>
<?php

$aksi="modul/pengguna/aksi_user.php";
switch($_GET[act]){
	default: 
?>

<h2>DATA PENGGUNA</h2><hr>
<div>
	<form method="post" action="">
		<input type="text" placeholder="Search..." name="s" id="s" />
        <input type="submit" value="Go" id="searchsubmit" />
	</form>
</div>
<?php

$tblname='user';
$hal = (isset($_REQUEST['hal']) &&
!empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
$per_hal = 5; 
$adjacents = 5;
$offset = ($hal - 1) * $per_hal;
$reload="?page=user";

$count_query = mysql_query("SELECT COUNT(iduser)
AS numrows FROM $tblname");
if($count_query === FALSE){
	die(mysql_error());
}
$row		= mysql_fetch_array($count_query);
$numrows	= $row['numrows']; //dapatkan jumlah data
$total_hals = ceil($numrows/$per_hal);
?>
<table border="1" width="100%">
<thead>
<tr>
	<td colspan="8"><a href="?page=user&act=tambahuser">
	<img src="icon/ButtonAddicon32.png" width="24" height="24" border="0" align="absmiddle" title="Tambah Data User"></a>
	<b>TAMBAH DATA PENGGUNA</b>
	</td>
</tr>
<tr>
	<th><div align="center">NO</div></th>
    <th><div align="center">NAMA LENGKAP</div></th>
	<th><div align="center">USERNAME</div></th>
	<th><div align="center">PASSWORD</div></th>
    <th><div align="center">LEVEL</div></th>
    <th><div align="center">STATUS</div></th>
	<th><div align="center">TANGGAL</div></th>
    <th><div align="center">TOMBOL AKSI</div></th>
</tr>
</thead>   
<tbody>
<?php
//Ketikkan Source Code 3 Disini
$A=$_POST["s"];
if (empty($A)){
	$qry=mysql_query("select * from $tblname order by
	iduser asc LIMIT $offset,$per_hal");
}else{
	$qry=mysql_query("select * from $tblname where
	iduser like '%$A%' || nm_user like '%$A%'
	order by iduser asc LIMIT $offset,$per_hal");
}
$sql=mysql_query("select * from $tblname");
$jumlah = mysql_num_rows($qry);
$jumlah1 = mysql_num_rows($sql);
$no=0;
while($r=mysql_fetch_array($qry)){
	$no=$no+1;
	
	$level=$r[level];
	if ($level==0){
		$level="Konsumen";
	}elseif($level==1){
		$level="Administrator";
	}elseif($level==2){
		$level="Pegawai";
	}else{
		$level="Manager";
	}
	
	$status=$r[blokir];
	if ($status=="T"){
		$status="<span class='label label-success'>
		Active</span>";
	}else{
		$status="<span class='label label-important'>
		Banned</span>";
	}
	
	$Tgl=date("d/m/y",strtotime($r[tglentry]));
	echo"
	<tr>
		<td><div align='center'>$no</div></td>
		<td><div align='center'>$r[nm_user]</div></td>
		<td><div align='center'>$r[username]</div></td>
		<td><div align='center'>$r[password]</div></td>
		<td><div align='center'>$level</div></td>
		<td><div align='center'>$status</div></td>
		<td><div align='center'>$Tgl</div></td>
		<td><div align='center'>
			<a href='?page=user&act=edituser&id=
			$r[iduser]' title='Edit Data'>
			<img src='icon/editicon32.png' align='absmiddle'
			width='20' height='20'></a> |
			<a href='$aksi?page=user&act=hapus&id=
			$r[iduser]' title='Hapus Data'>
			<img src='icon/ButtonDeleteicon32.png'
			align='absmiddle' width='20' height='20'></i></a>
			</div>
		</td>
	</tr>
	";
}
?>
<tr>
	<td colspan="7">
		<div align="right"><b>Jumlah Record</b></div>
	</td>
	<td>
		<div align="center"><b>
		<?php
						
		echo "$jumlah"." dari "."$jumlah1";

		?></b>
		</div>
	</td>
</tr>
</tbody>
</table>
<?php 

echo paginate($reload, $hal, $total_hals, $adjacents);

?>	
<div class="clr"></div><br>

<?php

break; 
?>
<?php

case "tambahuser":

?>
<h2>TAMBAH PENGGUNA</h2><hr>
<form action="modul/pengguna/aksi_user.php?page=user&act=input" method="post" autocomplete="on" />
<?php

$id_pengguna= _kd_auto('iduser','user','U-');

?>
<table border="0" align="center" width="80%">
<thead>
<tr>
	<th colspan="2"><div align="center"><H2>FORM TAMBAH PENGGUNA</H2></div></th>
</tr>
</thead>
<tbody>
<tr>
	
	<td><h3><b>ID USER</b></h3></td>
	<td><input class="style35" name="T1" id="T1" type="text"
	value="<?php echo $id_pengguna; ?>" readonly />
	<small>Contoh : U-000001, dll</small></td>
	
</tr>
<tr>	
	<td><h3><b>NAMA LENGKAP</b></h3></td>
	<td><input class="style35" name="T2" id="T2" type="text" placeholder="Isi Nama Lengkap ..." required />
	<small>Contoh : Pengguna 1, dll</small></td>
</tr>
<tr>	
	<td><h3><b>NAMA PENGGUNA</b></h3></td>
	<td><input class="style35" name="T3" id="T3" type="text" placeholder="Isi Nama Pengguna ..." required />
	<small>Contoh : Pengguna 1, dll</small></td>
</tr>
<tr>	
	<td><h3><b>KATA SANDI</b></h3></td>
	<td><input class="style35" name="T4" id="T4" type="password" placeholder="**************" required />
	<small>Contoh : admin, dll</small></td>
</tr>
<tr>	
	<td><h3><b>LEVEL PENGGUNA</b></h3></td>
	<td><select class="style35" id="C1" name="C1" required>
			<option value="0">Konsumen</option>
			<option value="1">Administrator</option>
			<option value="2">Pegawai</option>
			<option value="3">Manager</option>
		</select><small>Pilih Salah Satu</small></td>
</tr>
<tr>	
	<td><h3><b>STATUS PENGGUNA</b></h3></td>
	<td><select class="style35" id="C2" name="C2" required>
			<option value="Y">Tidak Aktif / Blokir</option>
			<option value="T">Aktif</option>
		</select><small>Pilih Salah Satu</small></td>
</tr>
<tr>	
	<td><h3><b>TANGGAL DAFTAR</b></h3></td>
	<td><input class="style35" type="text" name="T5" id="T5" placeholder="Pilih tanggal.." required />
		<img type="image" src="images/calPick.gif" name="CALTGL1" width="20" height="20" align="absmiddle" id="CALTGL1" style="cursor:pointer;cursor:hand;" /> 
		<script type="text/javascript">
			var cal = Calendar.setup({
				onSelect: function(cal) { cal.hide() }
      		});
			cal.manageFields("CALTGL1", "T5", "%Y-%m-%d");
    	</script>
		<small>dd/mm/yyyy</small></td>
</tr>
<tr>	
	<td colspan="2"><div align="center">
		<button class="style35" type="submit">S I M P A N</button>
		<button class="style35" type="reset" onclick="self.history.back()">B A T A L</button>
	</div></td>
</tr>	
</tbody>
</table>
</form>
<div class="clr"></div>

<?php

break;

?>
<?php
case "edituser":
	$edit = mysql_query("SELECT * FROM user
	WHERE iduser='$_GET[id]'");
	$r	  =mysql_fetch_array($edit);
?>

<h2>UBAH USER</h2><hr>
<form action="modul/pengguna/aksi_user.php?page=user&act=update" method="post" />
<table border="0" align="center" width="80%">
<thead>
<tr>
	<th colspan="2"><div align="center"><H3>FORM UPDATE USER</H3></div></th>
</tr>
</thead>
<tbody>
<tr>

	<td><h3><b>ID USER</b></h3></td>
	<td><input class="style35" name="T1" id="T1" type="text"
	value="<?php echo "$r[iduser]"; ?>" readonly />
	<small>Contoh : U-000001, dll</small></td>
	
</tr>
<tr>
	<!-- Ketikkan Source Code 13 Disini -->
	<td><h3><b>NAMA LENGKAP</b></h3></td>
	<td><input class="style35" name="T2" id="T2" type="text"
	value="<?php echo "$r[nm_user]"; ?>" readonly />
	<small>Contoh : pengguna 1, dll</small></td>
	<!-- Batas Akhir Pengetikkan Source Code 13 -->
</tr>
<tr>
	<!-- Ketikkan Source Code 14 Disini -->
	<td><h3><b>NAMA PENGGUNA</b></h3></td>
	<td><input class="style35" name="T3" id="T3" type="text"
	value="<?php echo "$r[username]"; ?>" readonly />
	<small>Contoh : Pengguna 1, dll</small></td>
	<!-- Batas Akhir Pengetikkan Source Code 14 -->
</tr>
<tr>
	<!-- Ketikkan Source Code 15 Disini -->
	<td><h3><b>KATA SANDI</b></h3></td>
	<td><input class="style35" name="T4" id="T4" type="password"
	value="<?php $t= base64_decode($r[password]); echo $t;?>"
	required />
	<small>Contoh : U-000001,dll</small></td>
	<!-- Batas Akhir Pengetikkan Source Code 15 -->
</tr>
<tr>
	<!-- Ketikkan Source Code 16 Disini -->
	<td><h3><b>LEVEL PENGGUNA</b></h3></td>
	<td><select class="style35" id="C1" name="C1">
			<option value="<? print $r[level] ?>">
			<?
			$status=$r[level];
			if ($status==0){
				$ket='Konsumen';
			}elseif ($status==1){
				$ket='Administrator';
			}elseif ($status==2){
				$ket='Pegawai';
			}else{
				$ket='Manager';
			}
			print $ket?></option>
			<option value="0">Konsumen</option>
			<option value="1">Administrator</option>
			<option value="2">Pegawai</option>
			<option value="3">Manager</option>
		</select><small>Pilih Salah Satu</small>
		</td>
	<!-- Batas Akhir Pengetikkan Source Code 16 -->
</tr>
<tr>
	<!-- Ketikkan Source Code 17 Disini -->
	<td><h3><b>STATUS PENGGUNA</b></h3></td>
	<td><select class="style35" id="C2" name="C2">
			<option value="<? print $r[blokir] ?>">
			<?
			$status=$r[blokir];
			if ($status=='Y'){
				$ket='Tidak Aktif / Blokir';
			}else{
				$ket='Aktif';
			}
			print $ket?></option>
			<option value="Y">Tidak Aktif / Blokir</option>
			<option value="T">Aktif</option>
			</select><small>Pilih Salah Satu</small>
		</td>
	<!-- Batas Akhir Pengetikkan Source Code 17 -->
</tr>
<tr>
	<!-- Ketikkan Source Code 18 Disini -->
	<td><h3><b>TANGGAL MASUK</b></h3></td>
	<td><input class="style35" type="text" name="T5" id="T5"
	value="<?php echo"$r[tglentry]"; ?>" />
	<!-- Batas Akhir Pengetikkan Source Code 18 -->
	<img type="image" src="images/calPick.gif" name="CALTGL1" width="20" height="20" align="absmiddle" id="CALTGL1" style="cursor:pointer;cursor:hand;" /> 
	<script type="text/javascript">
		var cal = Calendar.setup({
			onSelect: function(cal) { cal.hide() }
   		});
		cal.manageFields("CALTGL1", "T5", "%Y-%m-%d");
   	</script>
	<small>dd/mm/yyyy</small></td>
</tr>	
<tr>	
	<td colspan="2"><div align="center">
		<button type="submit" class="style35">U B A H &nbsp; D A T A</button>
		<button type="reset" class="style35" onclick="self.history.back()">B A T A L</button>
	</div></td>
</tr>	
</tbody>
</table>
</form>
<div class="clr"></div>
<!--Akhir Form Edit-->
<!-- End Form Elements -->
<?php
//Ketikkan Source Code 19 Disini
break;
//Batas Akhir Pengetikkan Source Code 19
}  
?>				