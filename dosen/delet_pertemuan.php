<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$id_pertemuan=$_GET['id_pertemuan'];
echo "id : $id_pertemuan";
//Query Hapus
$hapus="DELETE FROM pertemuan WHERE id_pertemuan='$id_pertemuan'";
$oke=mysql_query($hapus);

if ($oke){
	echo "<script>alert('Data berhasil di hapus'); location='pilih_pertemuan2.php';</script>";
	// echo "<script>alert('Data berhasil di hapus');</script>";
}else{
	echo "<script>alert('Data gagal di hapus'); location='pilih_pertemuan2.php';</script>";
	// echo "<script>alert('Data gagal di hapus');</script>";
}

?>
<!-- <meta http-equiv="refresh" content="1; url=lihat_tabel_pertemuan.php"> -->
