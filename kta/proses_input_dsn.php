<?php
//error_reporting(0);
session_start();
// $username=$_SESSION['username'];
include "../koneksi.php";

date_default_timezone_set("Asia/Jakarta");
$date = date("Hmisdmy");
$id = "A.$date";

//MENERIMA DATA DG METODE POST
$nidn=$_POST['nidn'];
$nama_dsn=addslashes($_POST['nama_dsn']);
$email=$_POST['email'];
$no_telp=$_POST['no_telp'];
$jk=$_POST['jk'];

$akun_id = $id;
$username=$_POST['nidn'];
$akses="dosen";
$password=$_POST['password'];

$panggil = "SELECT * FROM dosen WHERE nidn=$nidn";
$hasil=mysql_num_rows(mysql_query($panggil)) ;

if ($hasil > 0) {
	# code...
	echo"<script>alert('Data NIDN sudah ada !!'); location='input_dsn.php';</script>";
}else {
	# code...
	$query_dsn = "INSERT INTO dosen (nidn, nama_dsn, email, no_telp, jk)
		  VALUES ('$nidn', '$nama_dsn', '$email', '$no_telp', '$jk')";
	$query_user = "INSERT INTO login (akun_id, username, akses, password)
		  VALUES ('$akun_id', '$username', '$akses', '$password')";
	$simpan_dsn  =mysql_query($query_dsn);
	$simpan_user =mysql_query($query_user);

	if( $simpan_dsn && $simpan_user ) 
	{
		echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_dsn.php';</script>";
	}
	else
	{
		echo"<script>alert('Data gagal diinputkan'); location='lihat_tabel_dsn.php;</script>";
	}
	echo mysql_error();
}

?>