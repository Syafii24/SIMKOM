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
//Ketikkan Source Code 1 Disini
$aksi="modul/toko/aksi_toko.php";
switch($_GET[act]){
	default: //awal pilihan
//Batas Akhir Pengetikkan Source Code 1   
?>
<!-- Awal Blok Untuk Menampilkan Data Dari Tabel -->
<h2>DAFTAR TOKO</h2><hr>
<div>
	<form method="post" action="">
		<input type="text" class="style35" placeholder="Search..." name="s" id="s" />
        <input type="submit" class="style35" value="Go" id="searchsubmit" />
	</form><!--/searchform -->
</div>
<?php
//Ketikkan Source Code 2 Disini 
$tblname='toko';
$hal = (isset($_REQUEST['hal']) &&
!empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
$per_hal = 5; //berapa banyak blok
$adjacents = 5;
$offset = ($hal - 1) * $per_hal;
$reload="?page=toko";
//cari berapa banyak jumlah data*/
$count_query = mysql_query("SELECT COUNT(idtoko)
As numrows FROM $tblname");
if($count_query === FALSE) {
	die(mysql_error());
}
$row	= mysql_fetch_array($count_query);
$numrows = $row['numrows']; //dapatkan jumlah data*/
$total_hals = ceil($numrows/$per_hal);
//Batas Akhir Pengetikkan Source Code 2
?>
<table border="1" width="100%">
<thead>
<tr>
	<td colspan="7"><a href="?page=toko&act=tambahtoko">
	<img src="icon/ButtonAddicon32.png" width="24" height="24" border="0" align="absmiddle" title="Tambah Data toko"></a>
	<b>TAMBAH TOKO</b>
	</td>
</tr>
<tr>
	<th><div align="center">NO</div></th>
    <th><div align="center">ID TOKO</div></th>
	<th><div align="center">NAMA TOKO</div></th>
	<th><div align="center">ALAMAT</div></th>
	<th><div align="center">NO KONTAK</div></th>
	<th><div align="center">TANGGAL BUAT</div></th>
    <th><div align="center">TOMBOL AKSI</div></th>
</tr>
</thead>   
<tbody>
<?php
//Ketikkan Source Code 3 Disini
$A=$_POST["s"];
if (empty ($A)){
	$qry=mysql_query("select * from $tblname order by 
	idtoko asc LIMIT $offset,$per_hal");
}else{
	$qry=mysql_query("select * from $tblname where 
	idtoko like '%$A%'|| nmtoko like '%$A%'
	order by idtoko asc LIMIT $offset,$per_hal");
}
$sql=mysql_query("select * from $tblname");
$jumlah = mysql_num_rows($qry);
$jumlah1 = mysql_num_rows($qry);
$no=0;

while($r=mysql_fetch_array($qry)){
	$no=$no+1;
	$Tgl=date("d/m/Y",strtotime($r[tgl_buat]));
	echo"
	<tr>
		<td><div align='center'>$no</div></td>
		<td><div align='center'>$r[idtoko]</div></td>
		<td><div align='center'>$r[nmtoko]</div></td>
		<td><div align='center'>$r[alamat_toko]</div></td>
		<td><div align='center'>$r[kontak_toko]</div></td>
		<td><div align='center'>$Tgl</div></td>
		<td><div align='center'>
		<a href='?page=toko&act=edittoko&id=
		$r[idtoko]' title='Edit Data'>
		<img src='icon/editicon32.png' align='absmiddle'
		width='20' height='20'></a> |
		<a href='$aksi?page=toko&act=hapus&id=
		$r[idtoko]' title='Hapus Data'>
		<img src='icon/ButtonDeleteicon32.png' align='absmiddle'
		width='20' height='20'></i></a></div>
</td>
</tr>
";
}
		
//Batas Akhir Pengetikkan Source Code 3	
?>
<tr>
	<td colspan="6"><div align="right"><b>Jumlah Record</b></div></td>
	<td><div align="center"><b>
	<?php
		//Ketikkan Source Code 4 Disini
		echo "$jumlah"." dari "."$jumlah1";
		//Batas Akhir Pengetikkan Source Code 4
	?></b></div>
	</td>
</tr>
</tbody>
</table>
<?php 
//Ketikkan Source Code 5 Disini
echo paginate($reload, $hal, $total_hals, $adjacents);
//Batas Akhir Pengetikkan Source Code 5	
?>	
<div class="clr"></div><br>
<!-- Akhir Blok Untuk Menampilkan Data Dari Tabel -->
<?php
//Ketikkan Source Code 6 Disini
break; //Akhir Pilihan | Awal blok 
//Batas Akhir Pengetikkan Source Code 6
?>
<?php
//Ketikkan Source Code 7 Disini
	case "tambahtoko":
//Batas Akhir Pengetikkan Source Code 7	
?>
<!-- Awal Form Tambah -->
<h2>TAMBAH TOKO</h2><hr>
<form action="modul/toko/aksi_toko.php?page=toko&act=input" method="post" autocomplete="on" />
<?php
//Ketikkan Source Code 8 Disini 
$id_toko= _kd_auto('idtoko','toko','T-');
//Batas Akhir Pengetikkan Source Code 8
?>
<table border="0" align="center" width="80%">
<thead>
	<tr>
		<th colspan="2"><div align="center"><H2>FORM TAMBAH TOKO</H2></div></th>
	</tr>
</thead>
<tbody>
<!-- Ketikkan Source Code 9 Disini -->
<tr> 
	<td><h3><b>ID TOKO</b></h3></td>
	<td><input class="style35" name="T1" id="T1" type="text"
	value="<?php echo $id_toko; ?>" readonly />
<small>Contoh : T-000001, dll</small></td>
</tr>
<tr>
	<td><h3><b>NAMA TOKO</b></h3></td>
	<td><input class="style35" name="T2" id="T2" type="text"
	placeholder="Isi Nama toko ..." required />
	<small>Contoh : toko 1, dll</small></td>
</tr>
<tr>
	<td><h3><b>ALAMAT</b></h3></td>
	<td><textarea class="style35" name="T3" id="T3" type="text"
	placeholder="Isi Alamat ..." required /></textarea>
</tr>
<tr>
	<td><h3><b>NO KONTAK</b></h3></td>
	<td><input class="style35" name="T4" id="T4" type="text"
	placeholder="Isi Kontak toko ..." required />
	<small>Contoh : 085660xxxxxx, dll</small></td>
</tr>
<tr>
	<td><h3><b>TANGGAL BUAT</b></h3></td>
	<td><input class="style35" type="text" name="T5" id="T5" 
	placeholder="Pilih Tanggal ..." required />
	<img type="image" src="images/calPick.gif" name="CALTGL1"
	width="20" height="20" align="absmiddle" id="CALTGL1"
	style="cursor:pointer;cursor:hand;" />
	<script type="text/javascript">
		var cal = Calendar.setup({
			onSelect: function(cal) { cal.hide() }
		})
		cal.manageFields("CALTGL1", "T5", "%Y-%m-%d");
	</script>
	<small>yyyy-mm-dd</small></td>
</tr>
<tr>
	<td colspan="2"><div align="center">
	<button class="style35" type="submit">S I M P A N</button>
	<button class="style35" type="reset"
	onclick="self.history.back()">B A T A L</button>
	</div></td>
</tr>
<!-- Batas Akhir Pengetikkan Source Code 9 -->	
</tbody>
</table>
</form>
<div class="clr"></div>
<!--Akhir Form Tambah-->
<!-- End Form Elements -->
<?php
//Ketikkan Source Code 10 Disini
break;
//Batas Akhir Pengetikkan Source Code 10	
?>
<?php
//Ketikkan Source Code 11 Disini
case "edittoko":
$edit = mysql_query("SELECT * FROM toko WHERE idtoko='$_GET[id]'");
$r	= mysql_fetch_array($edit);

//Batas Akhir Pengetikkan Source Code 11	
?>
<!-- Awal Form Edit -->
<h2>UBAH TOKO</h2><hr>
<form action="modul/toko/aksi_toko.php?page=toko&act=update" method="post" />
<table border="0" align="center" width="80%">
<thead>
<tr>
	<th colspan="2"><div align="center"><H3>FORM UPDATE TOKO</H3></div></th>
</tr>
</thead>
<tbody>
<!-- Ketikkan Source Code 12 Disini -->
<tr> 
	<td><h3><b>ID TOKO</b></h3></td>
	<td><input class="style35" name="T1" id="T1" type="text"
	value="<?php echo "$r[idtoko]"; ?>" readonly />
	<small>Contoh : T-000001, dll</small></td>
</tr>
<tr> 
	<td><h3><b>NAMA TOKO</b></h3></td>
	<td><input class="style35" name="T2" id="T2" type="text"
	value="<?php echo "$r[nmtoko]"; ?>" />
	<small>Contoh : toko 1, dll</small></td>
</tr>
<tr>
	<td><h3><b>ALAMAT</b></h3></td>
	<td><textarea class="style35" name="T3" id="T3" type="text" />
	<?php echo "$r[alamat_toko]"; ?></textarea>
</tr>
<tr>
	<td><h3><b>NO KONTAK</b></h3></td>
	<td><input class="style35" name="T4" id="T4" type="text"
	placeholder="Isi Kontak toko ..." required />
	<small>Contoh : 085 *** *** ***, dll</small></td>
</tr>
<tr>
	<td><h3><b>TANGGAL BUAT</b></h3></td>
	<td><input class="style35" type="text" name="T5" id="T5" 
	value="<?php echo"$r[tgl_buat]"; ?>" />
	<img type="image" src="images/calPick.gif" name="CALTGL1"
	width="20" height="20" align="absmiddle" id="CALTGL1"
	style="cursor:pointer;cursor:hand;" />
	<script type="text/javascript">
		var cal = Calendar.setup({
			onSelect: fuction(cal) { cal.hide() }
		})
		cal.manageFields("CALTGL1", "T5", "%Y-%m-%d");
	</script>
	<small>yyyy-mm-dd</small></td>
</tr>
	
<!-- Batas Akhir Pengetikkan Source Code 12 -->	
<tr>	
	<td colspan="2"><div align="center">
	<button type="submit" class="style35">U B A H 
	&nbsp; D A T A</button>
	<button type="reset" class="style35" 
	onclick="self.history.back()">B A T A L</button>
	</div></td>
</tr>	
</tbody>
</table>
</form>
<div class="clr"></div>
<!--Akhir Form Edit-->
<!-- End Form Elements -->
<?php
//Ketikkan Source Code 13 Disini
break;
}
// Batas Akhir Pengetikkan Source Code 13  
?>				