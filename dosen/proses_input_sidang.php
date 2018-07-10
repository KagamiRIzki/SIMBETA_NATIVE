<?php
// error_reporting(0);
session_start();
$username=$_SESSION['username'];
$nidn=$_SESSION['nidn'];
$nama_dsn=$_SESSION['nama_dsn'];
include "../koneksi.php";

//MENERIMA DATA DG METODE POST
$id_sidang=$_POST['id_sidang'];
echo "id sidang ";
echo $id_sidang;
$id_bimbingan=$_POST['id_bimbingan'];
echo "id bimbingan ";
echo $id_bimbingan;
$nim=$_POST['nim'];
$nama_mhs=$_POST['nama_mhs'];
$nidn=$_POST['nidn'];
$nama_dsn=$_POST['nama_dsn'];
$bab=$_POST['bab'];
$judul_ta=$_POST['judul_ta'];
$bab=$_POST['bab'];
$status=$_POST['status'];
$pertemuan=$_POST['jumlah'];
$cek_p=$_POST['cek_p'];

$panggil="SELECT * FROM bimbingan WHERE nim='$nim'";
$hasil=mysql_query($panggil);
while ($tampil=mysql_fetch_array($hasil)){
$id_bimbingan=$tampil['id_bimbingan'];
$nidn_p1=$tampil['nidn_p1'];
$nama_pem1=$tampil['nama_pem1'];
$nidn_p2=$tampil['nidn_p2'];
$nama_pem2=$tampil['nama_pem2'];
};

if ($cek_p==1) {
	# code...
	if ($username==$nidn_p1) {
		# code...
		$cek_nidn1=1;
		$cek_nidn2=0;

		$panggil_sdg="SELECT * FROM sidang WHERE nim =$nim";
		$hasil_sdg=mysql_query($panggil_sdg);
		$cek_sdg=mysql_num_rows($hasil_sdg);
		echo "cek ";
		echo $cek_sdg;
		if ($cek_sdg=0) {
			# code...
			$query = "INSERT INTO sidang 
			(id_sidang, id_bimbingan, nim, nama_mhs, nidn_p1, nama_pem1, nidn_p2, nama_pem2, judul_ta, bab, pertemuan, cek_p1, cek_p2)
			VALUES 
			('$id_sidang', '$id_bimbingan', '$nim', '$nama_mhs', '$nidn_p1', '$nama_pem1', '$nidn_p2', '$nama_pem2', '$judul_ta', '$bab', '$pertemuan', '$cek_p1', '$cek_p2')";
			
			$simpan=mysql_query($query);

			if($simpan) 
			{
				// echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_sidang.php';</script>";
				echo"<script>alert('Data berhasil diinputkan');</script>";
			}
			else
			{
				// echo"<script>alert('Data gagal diinputkan'); location='pilih_mahasiswa.php';</script>";
				echo"<script>alert('Data gagal diinputkan');</script>";
			}
		}else {
			# code...
			$query = "UPDATE sidang SET 
			id_sidang='$id_sidang', 
			id_bimbingan='$id_bimbingan', 
			nim='$nim', 
			nama_mhs='$nama_mhs', 
			nidn_p1='$nidn_p1', 
			nama_pem1='$nama_pem1',
			nidn_p2='$nidn_p2', 
			nama_pem2='$nama_pem2', 
			judul_ta='$judul_ta', 
			bab='$bab', 
			pertemuan='$pertemuan', 
			cek_p1='$cek_p1'";
			$simpan=mysql_query($query);

			if($simpan) 
			{
				// echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_sidang.php';</script>";
				echo"<script>alert('Data berhasil ditambahkan');</script>";
			}
			else
			{
				// echo"<script>alert('Data gagal diinputkan'); location='pilih_mahasiswa.php';</script>";
				echo"<script>alert('Data gagal ditambahkan');</script>";
			}
		}
	}else {
		# code...
		$cek_p1=0;
		$cek_p2=1;
		
		$panggil_sdg="SELECT * FROM sidang WHERE nim=$nim";
		$hasil_sdg=mysql_query($panggil_sdg);
		echo "hasil";
		echo $hasil_sdg;
		$cek_sdg=mysql_num_rows($hasil_sdg);
		echo "cek ";
		echo $cek_sdg;
		var_dump($cek_sdg);
		if ($cek_sdg==0) {
			# code...
			$query = "INSERT INTO sidang 
			(id_sidang, id_bimbingan, nim, nama_mhs, nidn_p1, nama_pem1, nidn_p2, nama_pem2, judul_ta, bab, pertemuan, cek_p1, cek_p2)
			VALUES 
			('$id_sidang', '$id_bimbingan', '$nim', '$nama_mhs', '$nidn_p1', '$nama_pem1', '$nidn_p2', '$nama_pem2', '$judul_ta', '$bab', '$pertemuan', '$cek_p1', '$cek_p2')";			
			$simpan=mysql_query($query);
			if($simpan) 
			{
				// echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_sidang.php';</script>";
				echo"<script>alert('Data berhasil diinputkan');</script>";
			}
			else
			{
				// echo"<script>alert('Data gagal diinputkan'); location='pilih_mahasiswa.php';</script>";
				echo"<script>alert('Data gagal diinputkan');</script>";
			}
		}else {
			# code...
			$query = "UPDATE sidang SET 
			id_sidang='$id_sidang', 
			id_bimbingan='$id_bimbingan', 
			nim='$nim', 
			nama_mhs='$nama_mhs', 
			nidn_p1='$nidn_p1', 
			nama_pem1='$nama_pem1',
			nidn_p2='$nidn_p2', 
			nama_pem2='$nama_pem2', 
			judul_ta='$judul_ta', 
			bab='$bab', 
			pertemuan='$pertemuan', 
			cek_p1='$cek_p1',
			cek_p2='$cek_p2'";
			$simpan=mysql_query($query);

			if($simpan) 
			{
				// echo"<script>alert('Data berhasil diinputkan'); location='lihat_tabel_sidang.php';</script>";
				echo"<script>alert('Data berhasil ditambahkan');</script>";
			}
			else
			{
				// echo"<script>alert('Data gagal diinputkan'); location='pilih_mahasiswa.php';</script>";
				echo"<script>alert('Data gagal ditambahkan');</script>";
			}
		}
	}
}else {
	# code...
	echo"<script>alert('Data izin belum di cek !!!');</script>";
}

echo mysql_error();

?>