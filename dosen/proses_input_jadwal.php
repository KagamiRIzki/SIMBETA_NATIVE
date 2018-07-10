<?php
//error_reporting(0);
include "../koneksi.php";
session_start();
$username=$_SESSION['username'];
$nidn=$_SESSION['nidn'];
$nama_dsn=$_SESSION['nama_dsn'];
//MENERIMA DATA DG METODE POST
$id_jadwal=$_POST['id_jadwal'];
$nidn=$_POST['nidn'];
$nama_dsn=$_POST['nama_dsn'];
$senen=$_POST['senen'];
// var_dump($senen);
$selasa=$_POST['selasa'];
// var_dump($selasa);
$rabu=$_POST['rabu'];
// var_dump($rabu);
$kamis=$_POST['kamis'];
// var_dump($kamis);
$jumat=$_POST['jumat'];
// var_dump($jumat);

$panggil="SELECT * from jadwal WHERE nidn=$nidn" ;
$hasil=mysql_num_rows( mysql_query($panggil) );


if ($hasil > 0) {
	# code...
	echo"<script>alert('Sudah Ada Jadwal !!!'); location='lihat_tabel_jadwal.php';</script>";
}
else {
	# code...
	$query = "INSERT INTO jadwal (id_jadwal, nidn, nama_dsn, senen, selasa, rabu, kamis, jumat)
		  VALUES ('$id_jadwal', '$nidn', '$nama_dsn', '$senen', '$selasa', '$rabu', '$kamis', '$jumat')";
	$simpan=mysql_query($query);

	if($simpan) 
	{
		echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_jadwal.php';</script>";
	}
	else
	{
		echo"<script>alert('Data gagal diinputkan'); location='lihat_tabel_jadwal.php';</script>";
	}
	echo mysql_error();
}

?>