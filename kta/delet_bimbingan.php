<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$id_bimbingan=$_GET['id_bimbingan'];

//Query Hapus
$hapus="DELETE FROM bimbingan WHERE id_bimbingan='$id_bimbingan'";
$oke=mysql_query($hapus);

if ($oke){
	echo "<script>alert('Data berhasil di hapus'); location='lihat_tabel_bimbingan.php';</script>";
}else{
	echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_bimbingan.php';</script>";
}

?>
<meta http-equiv="refresh" content="1; url=lihat_tabel_bimbingan.php">
