<?php 
//error_reporting(0);
include "../koneksi.php";
//Menerimma data dengan methode post
$id_pertemuan=$_POST['id_pertemuan'];
$bab=$_POST['bab'];
$status=$_POST['status'];
$catatan=$_POST['catatan'];
/*Membuat query logika jika file foto atau gambar berhasil
dimasukan dalama database*/

$ubah="UPDATE pertemuan SET bab='$bab', status='$status',catatan='$catatan' WHERE id_pertemuan='$id_pertemuan'";

$simpan=mysqli_query($conn, $ubah);
		if($simpan) 
		{
			echo"<script>alert('Data berhasil ubah'); location='pilih_pertemuan2.php';</script>";
		}
		else
		{
			echo"<script>alert('Data dosen dan user gagal ubah'); location='pilih_pertemuan2.php';</script>";
		}

?>

