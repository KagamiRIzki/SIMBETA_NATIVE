<?php
// error_reporting(0);
session_start();
$username=$_SESSION['username'];
$nidn=$_SESSION['nidn'];
$nama_dsn=$_SESSION['nama_dsn'];
include "../koneksi.php";

//MENERIMA DATA DG METODE POST
$id_sidang=$_POST['id_sidang'];
$id_bimbingan=$_POST['id_bimbingan'];
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
$judul_ta=$tampil['judul_ta'];
};

if ($cek_p==1) {
	# code...
	if ($username==$nidn_p1) {
		# code...
		$cek_p1=1;
		$cek_p2=0;
		$hitung_sidang=mysql_query("SELECT * FROM sidang WHERE nim ='$nim'");
		$jumlah=mysql_num_rows($hitung_sidang);
		
		if ($jumlah>0) {
			# code...

			echo "data ada lakukan update";
			$update_sdg="UPDATE sidang SET
			cek_p1='$cek_p1'
			WHERE nim='$nim'";
			$update_sdg=mysql_query($update_sdg);
			if ($update_sdg) {
				# code...
				echo"<script>alert('Data berhasil ditambahkan'); location='pilih_mahasiswa.php';</script>";
			}else {
				# code...
				echo"<script>alert('Data gagal ditambahkan'); location='pilih_mahasiswa.php';</script>";
			}
		}else {
			# code...
			echo "data tidak ada lakukan insert";
			$input_sdg="INSERT INTO sidang 
			(id_sidang, id_bimbingan, nim, nama_mhs, nidn_p1, nama_pem1, nidn_p2, nama_pem2, judul_ta, bab, pertemuan, cek_p1, cek_p2)
			VALUE
			('$id_sidang', '$id_bimbingan', '$nim', '$nama_mhs', '$nidn_p1', '$nama_pem1', '$nidn_p2', '$nama_pem2', '$judul_ta', '$bab', '$pertemuan',  '$cek_p1', '$cek_p2')";
			$simpan_sdg=mysql_query($input_sdg);
			if ($simpan_sdg) {
				# code...
				echo"<script>alert('Data berhasil di inputkan'); location='pilih_mahasiswa.php';</script>";
			}else {
				# code...
				echo"<script>alert('Data gagal di inputkan'); location='pilih_mahasiswa.php';</script>";
			}
		}
	}else {
		# code...
		$cek_p1=0;
		$cek_p2=1;

		$hitung_sidang=mysql_query("SELECT * FROM sidang WHERE nim ='$nim'");
		$jumlah=mysql_num_rows($hitung_sidang);
		if ($jumlah>0) {
			# code...
			echo "data ada lakukan update";
			$update_sidang="UPDATE sidang SET
			cek_p2='$cek_p2'
			WHERE nim='$nim'";
			$update_sdg=mysql_query($input_sidang);
			if ($update_sdg) {
				# code...
				echo"<script>alert('Data berhasil ditambahkan'); location='pilih_mahasiswa.php';</script>";
			}else {
				# code...
				echo"<script>alert('Data gagal ditambahkan'); location='pilih_mahasiswa.php';</script>";
			}
		}else {
			# code...
			echo "data tidak ada lakukan insert";
			$input_sdg="INSERT INTO sidang 
			(id_sidang, id_bimbingan, nim, nama_mhs, nidn_p1, nama_pem1, nidn_p2, nama_pem2, judul_ta, bab, pertemuan, cek_p1, cek_p2)
			VALUE
			('$id_sidang', '$id_bimbingan', '$nim', '$nama_mhs', '$nidn_p1', '$nama_pem1', '$nidn_p2', '$nama_pem2', '$judul_ta',  '$bab', '$pertemuan', '$cek_p1', '$cek_p2')";
			$simpan_sdg=mysql_query($input_sdg);
			if ($simpan_sdg) {
				# code...
				echo"<script>alert('Data berhasil di inputkan'); location='pilih_mahasiswa.php';</script>";
			}else {
				# code...
				echo"<script>alert('Data gagal di inputkan'); location='pilih_mahasiswa.php';</script>";
			}
		}
	}
}else {
	# code...
	echo"<script>alert('Data cek gk di cek');</script>";
}

echo mysql_error();
?>