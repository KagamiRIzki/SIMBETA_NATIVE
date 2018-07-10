<?php 
//error_reporting(0);
include"../koneksi.php";
//Menerimma data dengan methode post
$npak_lama=$_POST['npak_lama'];
$npak=$_POST['npak'];
$nama_kta=$_POST['nama_kta'];
$jk=$_POST['jk'];
$email=$_POST['email'];
$no_telp=$_POST['no_telp'];
$password=$_POST['password'];
/*Membuat query logika jika file foto atau gambar berhasil
dimasukan dalama database*/

$ubah_kta="UPDATE kta SET npak='$npak',nama_kta='$nama_kta',jk='$jk',email='$email' ,no_telp='$no_telp' WHERE npak='$npak_lama'";
$ubah_user="UPDATE login SET username='$username', password='$password' WHERE username='$username_lama'";


$simpan_kta=mysqli_query($conn, $ubah_kta);
$simpan_user=mysqli_query($conn, $ubah_user);

		if( $simpan_kta && $simpan_user) 
		{
			echo"<script>alert('Data berhasil ubah'); location='lihat_tabel_kta.php';</script>";
		}
		else
		{
			echo"<script>alert('Data gagal ubah'); location='lihat_tabel_kta.php;</script>";
		}

?>

