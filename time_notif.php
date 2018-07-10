<?php 
include 'koneksi.php';
// $selisih = "SELECT id_bimbingan, nim, nama_mhs, current_DATE() - tgl_bimbingan AS selisih FROM pertemuan";
$selisih = "SELECT id_bimbingan, nim, nama_mhs, datediff(current_date(), tgl_bimbingan) as selisih FROM pertemuan";
$hitung=mysql_query($selisih);
while ($data=mysql_fetch_array($hitung)) {
	# code...
	if ($data["selisih"]>=14) {
		# code...
		echo    "||";
		echo 	$id_bimbingan=$data['id_bimbingan'];
        echo    "||";
        echo 	$nim=$data['nim'];
        echo    "||";
        echo 	$nama_mhs=$data['nama_mhs'];
        echo    "||";
        echo 	$data["selisih"];
        echo 	"<br>";
	}
}
?>