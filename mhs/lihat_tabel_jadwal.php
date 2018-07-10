<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Jadwal Bimbingan Dosen</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Bimbingan Jadwal Dosen</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID Jadwal</th>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID Jadwal</th>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  include "../koneksi.php";
                  session_start();
                  $username=$_SESSION['username'];
                  $nim=$username;
                  include "../koneksi.php";

                  $panggil="SELECT id_jadwal,nidn,nama_dsn,senen,selasa,rabu,kamis,jumat
                  FROM jadwal
                  INNER JOIN bimbingan ON jadwal.nidn = bimbingan.nidn_p1 OR jadwal.nidn = bimbingan.nidn_p2 
                  WHERE bimbingan.nim = '$nim'";

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $id_jadwal=$tampil['id_jadwal'];
                  $nidn=$tampil['nidn'];
                  $nama_dsn=$tampil['nama_dsn'];
                  $senen=$tampil['senen'];
                  $selasa=$tampil['selasa'];
                  $rabu=$tampil['rabu'];
                  $kamis=$tampil['kamis'];
                  $jumat=$tampil['jumat'];
                  ?>
                  <tr>
                  <td><?php echo "$id_jadwal"; ?></td>
                  <td><?php echo "$nidn"; ?></td>
                  <td><?php echo "$nama_dsn"; ?></td>
                  <td><?php if ($senen==1) {
                    # code...
                    echo "<input type='checkbox' checked onclick='return false;'>";
                  }else {
                    # code...
                    echo "<input type='checkbox' onclick='return false;'>";
                  }  ?>
                  </td>
                  <td>
                    <?php if ($selasa==1) {
                    # code...
                    echo "<input type='checkbox' checked onclick='return false;'>";
                  }else {
                    # code...
                    echo "<input type='checkbox' onclick='return false;'>";
                  }  ?>
                  </td>
                  <td><?php if ($rabu==1) {
                    # code...
                    echo "<input type='checkbox' checked onclick='return false;'>";
                  }else {
                    # code...
                    echo "<input type='checkbox' onclick='return false;'>";
                  }  ?>
                  </td>
                  <td>
                    <?php if ($kamis==1) {
                    # code...
                    echo "<input type='checkbox' checked onclick='return false;'>";
                  }else {
                    # code...
                    echo "<input type='checkbox' onclick='return false;'>";
                  }  ?>
                  </td>
                  <td>
                    <?php if ($jumat==1) {
                    # code...
                    echo "<input type='checkbox' checked onclick='return false;'>";
                  }else {
                    # code...
                    echo "<input type='checkbox' onclick='return false;'>";
                  }  ?>
                  </td>
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