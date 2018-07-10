<?php 
error_reporting(0);
include '../koneksi.php';
session_start();
$username=$_SESSION['username'];
$nidn=$_SESSION['nidn'];
$nama_dsn=$_SESSION['nama_dsn'];
$selisih = "SELECT id_bimbingan, nim, nama_mhs, datediff(current_date(), tgl_bimbingan) as selisih, tgl_bimbingan FROM pertemuan WHERE nidn=$nidn ORDER BY tgl_bimbingan DESC ";
$hitung=mysql_query($selisih);
$num =  0;
while ($data=mysql_fetch_array($hitung)) {
  # code...
  if ($data["selisih"]>=14 && $num <=2) {
    $num++;
    # code...
        ?>
          <a class="dropdown-item" href="lihat_tabel_pertemuan.php?nim=<?php echo $data['nim'] ?>">
            <?php if ($data["selisih"]>=30){ ?>
              <span class="text-danger">
            <?php }else {?>
              <span class="text-success">
            <?php } ?>
              <!-- <span class="text-success"> -->
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i><?php echo   $nama_mhs=$data['nama_mhs']; ?></strong>
              </span>
              <span class="small float-right text-muted"><?php echo   $nim=$data['nim']; ?></span>
              <div class="dropdown-message small"> SUdah tidak bimbingan selama <?php echo  $data["selisih"]; ?> Hari</div>
            </a>
            <div class="dropdown-divider"></div>
        <?php
  }
}
?>