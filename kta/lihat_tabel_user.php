<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tabel User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tabel User</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Akun ID</th>
                  <th>Username</th>
                  <th>Akses</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Akun ID</th>
                  <th>Username</th>
                  <th>Akses</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  include "../koneksi.php";
                  session_start();
                  $username_log=$_SESSION['username'];

                  $panggil="SELECT * from login" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $akun_id=$tampil['akun_id'];
                  $username=$tampil['username'];
                  $akses=$tampil['akses'];
                  if ($username_log!=$username) {
                    # code...
                  echo  "<tr>
                  <td>$akun_id</td>
                  <td>$username</td>
                  <td>$akses</td>
                  <td><a type='button' class='btn btn-secondary' href='update_user.php?akun_id=$akun_id'>Update </a>
                  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#delete'>
                  Delete
                  </button>
                  ";
                  
                  echo "    
                  <!-- Delete Modal -->
                  <div class='modal fade' id='delete' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Yakin Ingin Menghapus</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                        Pilih 'Delete' jika ingin meng hapus
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                        <a class='btn btn-primary' href='delet_user.php?akun_id=$akun_id'>Delet </a>
                      </div>
                    </div>
                  </div>
                  </div>  </tr>";
                  }
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