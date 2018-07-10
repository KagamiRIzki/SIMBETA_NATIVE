<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$npak=$_GET['npak'];

//Query Hapus
$hapus_kta="DELETE FROM kta WHERE npak='$npak'";
$oke_kta=mysql_query($hapus_kta);
if ($oke_kta) {
	# code...
	$hapus_user="DELETE FROM login WHERE username='$nim'";
	$oke_user=mysql_query($hapus_user);
	if ($oke_user) {
		# code...
		echo "<script>alert('Data berhasil KTA dan user terhapus'); location='lihat_tabel_kta.php';</script>";
	}
	else {
		# code...
		echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_kta.php';</script>";
	}
}else {
	# code...
	echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_kta.php';</script>";
}

?>
<meta http-equiv="refresh" content="1; url=lihat_tabel_kta.php">

