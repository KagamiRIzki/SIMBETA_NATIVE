<?php 
//error_reporting(0);
include"../koneksi.php";
//Menerimma data dengan methode post
$akun_id=$_POST['akun_id'];
$username=$_POST['username'];
$akses=$_POST['akses'];
$password=$_POST['password'];
/*Membuat query logika jika file foto atau gambar berhasil
dimasukan dalama database*/

$ubah="UPDATE login SET akun_id='$akun_id',username='$username',akses='$akses',password='$password' WHERE akun_id='$akun_id'";


$simpan=mysqli_query($conn, $ubah);

		if($simpan) 
		{
			echo"<script>alert('Data berhasil ubah'); location='lihat_tabel_user.php';</script>";
		}
		else
		{
			echo"<script>alert('Data gagal ubah'); location='lihat_tabel_user.php;</script>";
		}

?>

