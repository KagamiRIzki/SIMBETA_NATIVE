<?php
//error_reporting(0);
include "../koneksi.php";

//MENERIMA DATA DG METODE POST
$id_pertemuan=$_POST['id_pertemuan'];
$id_bimbingan=$_POST['id_bimbingan'];
$nim=$_POST['nim'];
$nama_mhs=$_POST['nama_mhs'];
$nidn=$_POST['nidn'];
$nama_dsn=$_POST['nama_dsn'];
$judul_ta=$_POST['judul_ta'];
$tgl_bimbingan=$_POST['tgl_bimbingan'];
$bab=$_POST['bab'];
$status=$_POST['status'];
$catatan=$_POST['catatan'];

// echo "id_pertemuan : $id_pertemuan";
// echo "id_bimbingan : $id_bimbingan";
// echo "nim : $nim";
// echo "nama_mhs : $nama_mhs";
// echo "nidn : $nidn";
// echo "nama_dsn : $nama_dsn";
// echo "judul_ta : $judul_ta";
// echo "tgl_bimbingan : $tgl_bimbingan";
// echo "bab : $bab";
// echo "status : $status";
// echo "catatan : $catatan";
$query = "INSERT INTO pertemuan (id_bimbingan, id_pertemuan, nim, nama_mhs, nidn, nama_dsn, judul_ta, tgl_bimbingan, bab, status, catatan)
		  VALUES ('$id_bimbingan', '$id_pertemuan', '$nim', '$nama_mhs', '$nidn', '$nama_dsn', '$judul_ta', '$tgl_bimbingan', '$bab', '$status', '$catatan')";
$simpan=mysql_query($query);

if($simpan) 
{
	echo"<script>alert('Data berhasil diinputkan'); location='pilih_pertemuan.php';</script>";
	// echo"<script>alert('Data berhasil diinputkan');</script>";
}
else
{
	echo"<script>alert('Data gagal diinputkan'); location='pilih_pertemuan.php';</script>";
	// echo"<script>alert('Data gagal diinputkan');</script>";
}
echo mysql_error();

?>