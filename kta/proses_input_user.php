<?php
//error_reporting(0);
include "../koneksi.php";

//MENERIMA DATA DG METODE POST
$akun_id=$_POST['akun_id'];
$username=$_POST['username'];
$akses=$_POST['akses'];
$password=$_POST['password'];

$query = "INSERT INTO login (akun_id, username, akses, password)
		  VALUES ('$akun_id', '$username', '$akses', '$password')";
$simpan=mysql_query($query);

if($simpan) 
{
	echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_user.php';</script>";
}
else
{
	echo"<script>alert('Data gagal diinputkan'); location='lihat_tabel_user.php;</script>";
}
echo mysql_error();

?>