<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Table Pertemuan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tabel Pertemuan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>NIDN Pembimbing</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th>Bab</th>
                  <th>Permasalahan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>NIDN Pembimbing</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th>Bab</th>
                  <th>Permasalahan</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  session_start();
                  $username=$_SESSION['username'];
                  $nidn=$_SESSION['nidn'];
                  $nama_dsn=$_SESSION['nama_dsn'];


                  $nim=$_GET['nim'];
                  
                  include "../koneksi.php";

                  $panggil="SELECT * from pertemuan WHERE nim='$nim' AND nidn='$username' ORDER BY bab DESC" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $id_pertemuan=$tampil['id_pertemuan'];
                  $id_bimbingan=$tampil['id_bimbingan'];
                  $nim=$tampil['nim'];
                  $nama_mhs=$tampil['nama_mhs'];
                  $nidn=$tampil['nidn'];
                  $nama_dsn=$tampil['nama_dsn'];
                  $judul_ta=$tampil['judul_ta'];
                  $tgl_bimbingan=$tampil['tgl_bimbingan'];
                  $bab=$tampil['bab'];
                  $status=$tampil['status'];
                  $catatan=$tampil['catatan'];

                  echo  "<tr>
                  <td>$nim</td>
                  <td>$nama_mhs</td>
                  <td>$nidn</td>
                  <td>$judul_ta</td>
                  <td>$tgl_bimbingan</td>
                  <td>$bab</td>
                  <td>$status</td>
                  <td><a href='update_pertemuan.php?id_pertemuan=$id_pertemuan'>Update </a>||<a href='delet_pertemuan.php?id_pertemuan=$id_pertemuan'>Delet </a></td>
                  </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
  <?php include 'footer.php'; ?>