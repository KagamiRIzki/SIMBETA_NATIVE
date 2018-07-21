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
                  <th>ID Jadwal</th>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jumat</th>
                  <th>Action</th>
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

                  $panggil="SELECT * from jadwal WHERE nidn='$nidn'" ;

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
                  <td><a type='button' class='btn btn-info' href='update_jadwal.php?id_jadwal=<?php echo $id_jadwal; ?>'> Update </a>
                    <!-- <a href='update_jadwal.php?id_jadwal=<?php //echo $id_jadwal; ?>'> Update </a>| -->
                  <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete_jadwal-$id_jadwal'>
                    Delete
                  </button>
                  <!-- Modal Delete jawal-->
                    <div class="modal fade" id="delete_jadwal-$id_jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Yakin Ingin Menghapus</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-body'>
                            Pilih 'Delete' jika ingin meng hapus <?php echo $id_jadwal; ?>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                            <a class='btn btn-primary' href='delet_jadwal.php?id_jadwal=<?php echo $id_jadwal; ?>'>Delet </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <a href='delet_jadwal.php?id_jadwal=<?php //echo $id_jadwal ?>'> Delet</a>-->
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
      
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
  <?php include 'footer.php'; ?>