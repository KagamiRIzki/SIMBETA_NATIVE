<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$id_jadwal=$_GET['id_jadwal'];
echo $id_jadwal;
//Query Hapus
$hapus_jdw="DELETE FROM jadwal WHERE id_jadwal='$id_jadwal'";
$oke=mysql_query($hapus_jdw);

if ($oke){
	// echo "1";
	echo "<script>alert('Data berhasil di hapus'); location='lihat_tabel_jadwal.php';</script>";
}else{
	// echo "2";
	echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_jadwal.php';</script>";
}

?>
<!-- <meta http-equiv="refresh" content="1; url=lihat_tabel_jadwal.php"> -->
