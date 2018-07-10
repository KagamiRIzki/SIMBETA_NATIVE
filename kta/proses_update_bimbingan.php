<?php 
//error_reporting(0);
include"../koneksi.php";
//Menerimma data dengan methode post
$id_bimbingan=$_POST['id_bimbingan'];
$nim=$_POST['nim'];
$nama_mhs=$_POST['nama_mhs'];
$nidn_p1=$_POST['nidn_p1'];
$nama_pem1=$_POST['nama_pem1'];
$nidn_p2=$_POST['nidn_p2'];
$nama_pem2=$_POST['nama_pem2'];
$judul_ta=$_POST['judul_ta'];
/*Membuat query logika jika file foto atau gambar berhasil
dimasukan dalama database*/

$ubah="UPDATE bimbingan SET id_bimbingan='$id_bimbingan',nim='$nim',nama_mhs='$nama_mhs',nidn_p1='$nidn_p1',nama_pem1='$nama_pem1',nidn_p2='$nidn_p2',nama_pem2='$nama_pem2',judul_ta='$judul_ta' WHERE id_bimbingan='$id_bimbingan'";


$simpan=mysqli_query($conn, $ubah);

		if($simpan) 
		{
			echo"<script>alert('Data berhasil ubah'); location='lihat_tabel_bimbingan.php';</script>";
		}
		else
		{
			echo"<script>alert('Data gagal ubah'); location='lihat_tabel_bimbingan.php;</script>";
		}

?>

