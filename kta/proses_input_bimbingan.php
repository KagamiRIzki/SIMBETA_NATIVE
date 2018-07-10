<?php
//error_reporting(0);
include "../koneksi.php";

//MENERIMA DATA DG METODE POST
$id_bimbingan=$_POST['id_bimbingan'];
//mahasiswa
$nim=$_POST['nim'];
$panggil_mhs="SELECT * From mahasiswa WHERE nim = '$nim'";
$hasil=mysql_query($panggil_mhs);
// var_dump($hasil);
while ($tampil=mysql_fetch_array($hasil)){
$nim=$tampil['nim'];
$nama_mhs=$tampil['nama_mhs'];
$judul_ta=$tampil['judul_ta'];
} 

// echo $nim;
// echo $nama_mhs;
// echo $judul_ta;
// pembimbing 1
$nidn_p1=$_POST['nidn_p1'];
$panggil_dsn="SELECT * FROM dosen WHERE nidn='$nidn_p1'";
$hasil=mysql_query($panggil_dsn);

while ($tampil=mysql_fetch_array($hasil)){
$nama_pem1=$tampil['nama_dsn'];
}

// echo $nidn_p1;
// echo $nama_pem1;

// pembimbing 2
$nidn_p2=$_POST['nidn_p2'];
$panggil_dsn="SELECT * FROM dosen WHERE nidn='$nidn_p2'";
$hasil=mysql_query($panggil_dsn);

while ($tampil=mysql_fetch_array($hasil)){
$nama_pem2=$tampil['nama_dsn'];
}

// echo $nidn_p2;
// echo $nama_pem2;

if ($nidn_p1!=$nidn_p2) {
	# code...
	$panggil_bimbingan="SELECT nim FROM bimbingan";
	$cek=mysql_num_rows(mysql_query( "SELECT * FROM bimbingan WHERE nim='$nim'"));
	// $hasil=mysql_query($panggil_bimbingan);
	// $tampil=mysql_fetch_array($hasil);
	// echo $cek;
	if ($cek==0) {
		# code...
		$query = "INSERT INTO bimbingan (id_bimbingan, nim, nama_mhs, nidn_p1, nama_pem1, nidn_p2, nama_pem2, judul_ta)
				  VALUES ('$id_bimbingan', '$nim', '$nama_mhs', '$nidn_p1', '$nama_pem1', '$nidn_p2', '$nama_pem2', '$judul_ta')";
		$simpan=mysql_query($query);

		if($simpan) 
		{
			echo"<script>alert('Data berhasil diinputkan'); location='input_bimbingan.php';</script>";
		}
		else
		{
			echo"<script>alert('Data gagal diinputkan'); location='input_bimbingan.php';</script>";
		}
	}else {
		# code...
		echo"<script>alert('Data NIM sudah ada diinputkan'); location='input_bimbingan.php';</script>";
	}
}else {
	# code...
	echo"<script>alert('Data pembimbing sama'); location='input_bimbingan.php';</script>";
}
echo mysql_error();

?>