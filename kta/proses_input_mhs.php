<?php
// error_reporting(0);
session_start();
$username=$_SESSION['username'];

date_default_timezone_set("Asia/Jakarta");
$date = date("Hmisdmy");
$id = "A.$date";
include "../koneksi.php";

//MENERIMA DATA DG METODE POST
$nim=$_POST['nim'];
// echo $nim;
$nama_mhs=addslashes($_POST['nama_mhs']);
$jk=$_POST['jk'];
$kelas=$_POST['kelas'];
$judul_ta=$_POST['judul_ta'];

$akun_id=$id;
$username=$_POST['nim'];
$akses="mhs";
$password=$_POST['password'];

$panggil = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
$hasil=mysql_num_rows(mysql_query($panggil));
// echo $hasil;
// var_dump($hasil);
if ($hasil > 0) {
	# code...
	echo"<script>alert('Data NIM sudah ada !!'); location='input_mhs.php';</script>";
}else {
	# code...
	$query_mhs = "INSERT INTO mahasiswa (nim, nama_mhs, kelas, judul_ta, jk)
			  VALUES ('$nim', '$nama_mhs','$kelas', '$judul_ta', '$jk')";
	$query_login = "INSERT INTO login (akun_id,username,akses,password)
				VALUES('$akun_id', '$username', '$akses', '$password')";
	$simpan1=mysql_query($query_mhs);
	$simpan2=mysql_query($query_login);

	if( $simpan1 && $simpan2 ) 
	{
		echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_mhs.php';</script>";
	}
	else
	{
		echo"<script>alert('Data gagal diinputkan'); location='lihat_tabel_mhs.php;</script>";
	}
	echo mysql_error();
}

?>