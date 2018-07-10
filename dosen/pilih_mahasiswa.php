<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tables Mahasiswa Bimbingan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Mahasiswa</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Judul TA</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Judul TA</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              
                <?php
                  error_reporting(0);
                  session_start();
                  $username=$_SESSION['username'];
                  include "../koneksi.php";

                  $panggil="SELECT bimbingan.nim, bimbingan.nama_mhs, bimbingan.judul_ta, MAX(pertemuan.bab) as bab
                  FROM bimbingan
                  INNER JOIN pertemuan ON bimbingan.id_bimbingan = pertemuan.id_bimbingan
                  WHERE nidn_p1='$username' OR nidn_p2='$username' GROUP BY nim" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $id_bimbingan=$tampil['id_bimbingan'];
                  $nim=$tampil['nim'];
                  $nama_mhs=$tampil['nama_mhs'];
                  $bab=$tampil['bab'];
                  $judul_ta=$tampil['judul_ta'];

                  echo  "<tr>
                  <td>$nim</td>
                  <td>$nama_mhs</td>
                  <td>$judul_ta</td>
                  <td><a href='input_sidang_mhs.php?nim=$nim'> Proses </a></td>
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
    </div>
</div>
<?php include 'footer.php'; ?>