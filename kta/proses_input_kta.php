<?php
// error_reporting(0);
include "../koneksi.php";
            
session_start();
$username=$_SESSION['username'];

$date = date("Hmisdmy");
$id = "A.$date";
//MENERIMA DATA DG METODE POST
$npak=$_POST['npak'];
$nama_kta=addslashes($_POST['nama_kta']);
$email=$_POST['email'];
$no_telp=$_POST['no_telp'];
$jk=$_POST['jk'];

$akun_id=$id;
$username=$_POST['npak'];
$password=$_POST['password'];
$akses="kta";

$panggil = "SELECT * FROM kta WHERE npak=$npak";
$hasil=mysql_num_rows(mysql_query($panggil)) ;
// echo $hasil;
if ($hasil > 0) {
	# code...
	echo"<script>alert('Data NPAK sudah ada !!'); location='input_mhs.php';</script>";
}else {
	# code...
	$query_kta = "INSERT INTO kta (npak, nama_kta, email, no_telp, jk)
		 	 	VALUES ('$npak', '$nama_kta', '$email', '$no_telp', '$jk')";
	$query_user = "INSERT INTO login (akun_id, username, password, akses)
			  	VALUES ('$akun_id', '$username', '$password', '$akses')";
	$simpan_kta=mysql_query($query_kta);
	$simpan_user=mysql_query($query_user);

	if( $simpan_kta && $simpan_user )
	{
		echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_kta.php';</script>";
	}
	else
	{
		echo"<script>alert('Data gagal diinputkan'); location='lihat_tabel_kta.php;</script>";
	}

}
?>