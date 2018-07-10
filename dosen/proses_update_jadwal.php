<?php
// error_reporting(0);
include "../koneksi.php";
session_start();
$username=$_SESSION['username'];
$nidn=$_SESSION['nidn'];
$nama_dsn=$_SESSION['nama_dsn'];
//MENERIMA DATA DG METODE POST
$id_jadwal=$_POST['id_jadwal'];
$nidn=$_POST['nidn'];
$nama_dsn=$_POST['nama_dsn'];

// $senen = $_POST['senen'];
if (isset($_POST['senen'])) {
	# code...
	$senen = 1;
}else {
	# code...
	$senen =0;
}
// $selasa =$_POST['selasa'];
if (isset($_POST['selasa'])) {
	# code...
	$selasa = 1;
}else {
	# code...
	$selasa =0;
}
// $rabu =$_POST['rabu'];
if (isset($_POST['rabu'])) {
	# code...
	$rabu =1;
}else {
	# code...
	$rabu =0;
}
// $kamis =$_POST['kamis'];
if (isset($_POST['kamis'])) {
	# code...
	$kamis = 1;
}else {
	# code...
	$kamis =0;
}
// $jumat =$_POST['jumat'];
if (isset($_POST['jumat'])) {
	# code...
	$jumat = 1;
}else {
	# code...
	$jumat =0;
}

$update = "UPDATE jadwal SET senen='$senen', selasa='$selasa',rabu='$rabu', kamis='$kamis', jumat='$jumat' WHERE nidn='$username'";

// $panggil="UPDATE * from jadwal WHERE nidn=$nidn" ;
// $hasil=mysql_num_rows( mysql_query($update) );
// var_dump($update);
$update_jadwal=mysqli_query($conn, $update);
// var_dump($update_jadwal);
if( $update_jadwal) {
	echo"<script>alert('Data berhasil ubah'); location='lihat_tabel_jadwal.php';</script>";
}
else {
	echo"<script>alert('Data gagal ubah'); location='lihat_tabel_jadwal.php;</script>";
}

?>