<?php 
//error_reporting(0);
//Koneksi Database
include "../koneksi.php";

$nim=$_GET['nim'];
// echo $nim;

//Query Hapus
$hapus_mhs="DELETE FROM mahasiswa WHERE nim='$nim'";
$oke_mhs=mysql_query($hapus_mhs);
if ($oke_mhs) {
	# code...
	$hapus_user="DELETE FROM login WHERE username='$nim'";
	$oke_user=mysql_query($hapus_user);
	if ($oke_user) {
		# code...
		echo "<script>alert('Data berhasil mahasiswa dan user terhapus'); location='lihat_tabel_mhs.php';</script>";
	}
	else {
		# code...
		echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_mhs.php';</script>";
	}
}else {
	# code...
	echo "<script>alert('Data gagal di hapus'); location='lihat_tabel_mhs.php';</script>";
}

?>
<!-- <meta http-equiv="refresh" content="1; url=lihat_tabel_mhs.php"> -->
