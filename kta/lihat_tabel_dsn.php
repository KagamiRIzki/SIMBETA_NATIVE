<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tabel Dosen</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tabel Dosen </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Jenis Kelamin</th>
                  <th>Email</th>
                  <th>No Telp</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Jenis Kelamin</th>
                  <th>email</th>
                  <th>No Telp</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  include "../koneksi.php";

                  $panggil="SELECT * from dosen" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $nidn=$tampil['nidn'];
                  $nama_dsn=$tampil['nama_dsn'];
                  $jk=$tampil['jk'];
                  $email=$tampil['email'];
                  $no_telp=$tampil['no_telp'];

                  echo "<tr>
                  <td>$nidn</td>
                  <td>$nama_dsn</td>
                  <td>$jk</td>
                  <td>$email</td>
                  <td>$no_telp</td>
                  <td><a type='button' class='btn btn-secondary' href='update_dsn.php?nidn=$nidn'> Update </a></td>
                  <td>
                  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#delete-$nidn'>
                  Delete
                  </button>
                      
                  <!-- Delete Modal -->
                  <div class='modal fade' id='delete-$nidn' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Yakin Ingin Menghapus</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                        Pilih 'Delete' jika ingin menghapus data '$nidn'
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                        <a class='btn btn-primary' href='delet_dsn.php?nidn=$nidn'>Delete </a>
                      </div>
                    </div>
                  </div>
                  </div></td>  </tr>";
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