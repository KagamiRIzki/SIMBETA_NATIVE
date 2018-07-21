<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$id_sidang=$_GET['id_sidang'];
// echo "id : $id_sidang";
//Query Hapus
$hapus="DELETE FROM sidang WHERE id_sidang='$id_sidang'";
$oke=mysql_query($hapus);

if ($oke){
	echo "<script>alert('Data berhasil di hapus'); location='lihat_tabel_sidang.php';</script>";
	// echo "<script>alert('Data berhasil di hapus');</script>";
}else{
	echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_sidang.php';</script>";
	// echo "<script>alert('Data gagal di hapus');</script>";
}

?>
<!-- <meta http-equiv="refresh" content="1; url=lihat_tabel_pertemuan.php"> -->
