<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$akun_id=$_GET['akun_id'];

//Query Hapus
$hapus="DELETE FROM login WHERE akun_id='$akun_id'";
$oke=mysql_query($hapus);

if ($oke){
	echo "<script>alert('Data berhasil di hapus'); location='lihat_tabel_user.php';</script>";
}else{
	echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_user.php';</script>";
}

?>
<meta http-equiv="refresh" content="1; url=lihat_tabel_user.php">
