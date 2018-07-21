<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$nidn=$_GET['nidn'];

//Query Hapus
$hapus_dsn="DELETE FROM dosen WHERE nidn='$nidn'";
$oke_dsn=mysql_query($hapus_dsn);
if ($oke_dsn) {
	# code...
	$hapus_user="DELETE FROM login WHERE username='$nidn'";
	$oke_user=mysql_query($hapus_user);
	if ($oke_user) {
		# code...
		echo "<script>alert('Data berhasil dosen dan user terhapus'); location='lihat_tabel_dsn.php';</script>";
	}
	else {
		# code...
		echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_dsn.php';</script>";
	}
}else {
	# code...
	echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_dsn.php';</script>";
}

?>
<meta http-equiv="refresh" content="1; url=lihat_tabel_dsn.php">

