<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID Pertemuan</th>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>NIDN</th>
                  <th>Pembimbing</th>
                  <th>Judul TA</th>
                  <th>Bab</th>
                  <th>Tanggal</th>
                  <th>Permasalahan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Pertemuan</th>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>NIDN</th>
                  <th>Pembimbing</th>
                  <th>Judul TA</th>
                  <th>Bab</th>
                  <th>Tanggal</th>
                  <th>Permasalahan</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  session_start();
                  $username=$_SESSION['username'];
                  $nim=$_SESSION['nim'];
                  include "../koneksi.php";

                  $panggil="SELECT * from pertemuan WHERE nim=$nim" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $id_pertemuan=$tampil['id_pertemuan'];
                  $id_bimbingan=$tampil['id_bimbingan'];
                  $nim=$tampil['nim'];
                  $nama_mhs=$tampil['nama_mhs'];
                  $nidn=$tampil['nidn'];
                  $nama_dsn=$tampil['nama_dsn'];
                  $judul_ta=$tampil['judul_ta'];
                  $bab=$tampil['bab'];
                  $tgl_bimbingan=$tampil['tgl_bimbingan'];
                  $catatan=$tampil['catatan'];

                  echo  "<tr>
                  <td>$id_pertemuan</td>
                  <td>$nim</td>
                  <td>$nama_mhs</td>
                  <td>$nidn</td>
                  <td>$nama_dsn</td>
                  <td>$judul_ta</td>
                  <th>$bab</th>
                  <td>$tgl_bimbingan</td>
                  <td>$catatan</td>
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