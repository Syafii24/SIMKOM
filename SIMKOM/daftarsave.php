<?php
// Ketikkan Source Code 1 Disini
$A=$_POST["H1"];
$B=$_POST["nama_lengkap"];
$C=$_POST["username"];
$D=$_POST["password"];
$D1 = base64_encode($D);
$D2=$_POST["email"];
$E=0;
$F="Y";
$G=date("Y-m-d");
// Batas akhir pengetikkan Source Code 1
if(empty($A)){
echo "<script>alert('Id Pengguna Tidak Boleh Kosong, Silahkan Isi Dulu');
document.location.href='index.php';</script>";
}elseif(empty($B)){
echo "<script>alert('Nama Lengkap Tidak Boleh Kosong, Silahkan Isi Dulu');
document.location.href='index.php';</script>";
}elseif(empty($C)){
echo "<script>alert('Nama Pengguna Tidak Boleh Kosong, Silahkan Isi Dulu');
document.location.href='index.php';</script>";
}elseif(empty($D)){
echo "<script>alert('Kata Sandi Tidak Boleh Kosong, Silahkan Isi Dulu');
document.location.href='index.php';</script>";
}elseif(empty($D2)){
echo "<script>alert('Alamat Email Tidak Boleh Kosong, Silahkan Isi Dulu');
document.location.href='index.php';</script>";
}else{

// Ketikkan Source Code 2 Disini ..
include('config/koneksi.php');
$nama_tbl="user";
$cari=mysql_query("select * from $nama_tbl where iduser='$A'");
$data=mysql_fetch_array($cari);

if($A!="$data[idpengguna]"){
$masuk="INSERT INTO pengguna(iduser,nm_user,username,password,email,level,blokir,tgldaftar)VALUES
('$_POST[H1]','$_POST[nama_lengkap]','$_POST[username]','$D1','$D2','$E','$F','$G')";
mysql_query($masuk);
echo "<script>alert('Data Anda Sudah Berhasil Disimpan ...Harap Hubungi Administrator Untuk Mengaktifkan ...'); 
document.location.href='index.php';</script>";
}else{
echo "<script>alert('Data Gagal Ditambah'); document.location.href='index.php';</script>";
}
}
// Batas akhir pengetikkan Source Code 2
?>