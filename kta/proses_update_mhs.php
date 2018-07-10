<?php 
//error_reporting(0);
include "../koneksi.php";
//Menerimma data dengan methode post
$nim_lama=$_POST['nim_lama'];
$nim=$_POST['nim'];
$nama_mhs=$_POST['nama_mhs'];
$jk=$_POST['jk'];
$kelas=$_POST['kelas'];
$judul_ta=$_POST['judul_ta'];

$username_lama=$_POST['nim_lama'];
$username=$_POST['nim'];
$password=$_POST['password'];
/*Membuat query logika jika file foto atau gambar berhasil
dimasukan dalama database*/

$ubah_mhs="UPDATE mahasiswa SET nim='$nim',nama_mhs='$nama_mhs',jk='$jk',kelas='$kelas' ,judul_ta='$judul_ta' WHERE nim='$nim_lama'";
$ubah_user="UPDATE login SET username='$username', password='$password' WHERE username='$username_lama'";


$simpan_mhs=mysqli_query($conn, $ubah_mhs);
$simpan_user=mysqli_query($conn, $ubah_user);

		if( $simpan_mhs && $simpan_user) 
		{
			echo"<script>alert('Data berhasil ubah'); location='lihat_tabel_mhs.php';</script>";
		}
		else
		{
			echo"<script>alert('Data gagal ubah'); location='lihat_tabel_mhs.php;</script>";
		}

?>

