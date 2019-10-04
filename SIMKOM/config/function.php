<?php
error_reporting(0);
session_start();
function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}
function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}
function _kd_auto($field,$table,$x) {
$kode_temp = fetch_row("SELECT $field FROM $table where $field LIKE'%".$x."%' ORDER BY $field DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = $x."000001";
	else {
		$jum = substr($kode_temp, 2, 8);
		$jum++;
		if ($jum <= 9)
			$kode = $x."00000" . $jum;
		elseif ($jum <= 99)
			$kode = $x."0000" . $jum;
		elseif ($jum <= 999)
			$kode = $x."000" . $jum;
		elseif ($jum <= 9999)
			$kode = $x."00" . $jum;
		elseif ($jum <= 99999)
			$kode = $x."0" . $jum;
		else
			die("ID melebihi batas");
	}
	return $kode;
}
?>