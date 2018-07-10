<?php 
//error_reporting(0);
include "../koneksi.php";
//Menerimma data dengan methode post
$nidn_lama=$_POST['nidn_lama'];
// echo $nidn_lama;
$nidn=$_POST['nidn'];
// echo $nidn;
$nama_dsn=$_POST['nama_dsn'];
// echo $nama_dsn;
$jk=$_POST['jk'];
// echo $jk;
$email=$_POST['email'];
// echo $email;
$no_telp=$_POST['no_telp'];
// echo $no_telp;

$username_lama=$_POST['nidn_lama'];
// echo $username_lama;
$username=$_POST['nidn'];
// echo $username;
$password=$_POST['password'];
// echo $password;
/*Membuat query logika jika file foto atau gambar berhasil
dimasukan dalama database*/

$ubah_dsn="UPDATE dosen SET nidn='$nidn', nama_dsn='$nama_dsn',email='$email', jk='$jk', no_telp='$no_telp' WHERE nidn='$nidn_lama'";
$ubah_user="UPDATE login SET username='$username', password='$password' WHERE username='$username_lama'";

$simpan_dsn=mysqli_query($conn, $ubah_dsn);

$simpan_user=mysqli_query($conn, $ubah_user);
var_dump($simpan_dsn);
echo $simpan_dsn;
var_dump($simpan_user);

		if($simpan_dsn) 
		{
			if ($simpan_user) {
				# code...
				echo"<script>alert('Data berhasil ubah'); location='lihat_tabel_dsn.php';</script>";
			}else {
				# code...
				echo"<script>alert('Data User gagal ubah'); location='lihat_tabel_dsn.php';</script>";
			}
		}
		else
		{
			echo"<script>alert('Data dosen dan user gagal ubah'); location='lihat_tabel_dsn.php;</script>";
		}

?>

