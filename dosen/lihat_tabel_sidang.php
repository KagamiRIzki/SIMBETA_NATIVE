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
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama MHS</th>
                  <th>judul</th>
                  <th>Bab</th>
                  <th>Pertemuan</th>
                  <th>Nama Pem1</th>
                  <th>Nama Pem2</th>
                  <th>Izin 1</th>
                  <th>Izin 2</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nama MHS</th>
                  <th>judul</th>
                  <th>Bab</th>
                  <th>Pertemuan</th>
                  <th>Nama Pem1</th>
                  <th>Nama Pem2</th>
                  <th>Izin 1</th>
                  <th>Izin 2</th>
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
                  include "../koneksi.php";

                  $panggil="SELECT * from sidang WHERE nidn_p1='$username' OR nidn_p2='$username'" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $id_sidang=$tampil['id_sidang'];
                  $id_bimbingan=$tampil['id_bimbingan'];
                  $nim=$tampil['nim'];
                  $nama_mhs=$tampil['nama_mhs'];
                  $nidn_p1=$tampil['nidn_p1'];
                  $nama_pem1=$tampil['nama_pem1'];
                  $nidn_p2=$tampil['nidn_p2'];
                  $nama_pem2=$tampil['nama_pem2'];
                  $judul_ta=$tampil['judul_ta'];
                  $bab=$tampil['bab'];
                  $pertemuan=$tampil['pertemuan'];
                  $cek_p1=$tampil['cek_p1'];
                  $cek_p2=$tampil['cek_p2'];
                  ?>
                  <tr>
                  <td><?php echo "$nama_mhs"; ?></td>
                  <td><?php echo "$judul_ta"; ?></td>
                  <td><?php echo "$bab"; ?></td>
                  <td><?php echo "$pertemuan"; ?></td>
                  <td><?php echo "$nama_pem1"; ?></td>
                  <td><?php echo "$nama_pem2"; ?></td>
                  <td>
                  <?php if ($cek_p1==1) {
                    # code...
                    echo "<input type='checkbox' checked onclick='return false;'>";
                  }else {
                    # code...
                    echo "<input type='checkbox' onclick='return false;'>";
                  }  ?>
                  </td>
                  <td>
                  <?php if ($cek_p2==1) {
                    # code...
                    echo "<input type='checkbox' checked onclick='return false;'>";
                  }else {
                    # code...
                    echo "<input type='checkbox' onclick='return false;'>";
                  }  ?>
                  </td>
                  
                  <td><a href='update_jadwal.php?id_jadwal=<?php echo $id_jadwal; ?>'> Update </a>|
                    <a href='delet_jadwal.php?id_jadwal=<?php echo $id_jadwal ?>'> Delet</a></td>
                  </tr>
                <?php
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