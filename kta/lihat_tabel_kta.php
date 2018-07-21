<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tabel KTA</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input_kta">
            Input KTA
          </button><br>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table KTA</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NPAK</th>
                  <th>Nama KTA</th>
                  <th>Jenis Kelamin</th>
                  <th>Email</th>
                  <th>No Telp</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NPAK</th>
                  <th>Nama KTA</th>
                  <th>Jenis Kelamin</th>
                  <th>Email</th>
                  <th>No Telp</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  include "../koneksi.php";

                  $panggil="SELECT * from kta" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $npak=$tampil['npak'];
                  $nama_kta=$tampil['nama_kta'];
                  $jk=$tampil['jk'];
                  $email=$tampil['email'];
                  $no_telp=$tampil['no_telp'];

                  echo "<tr>
                  <td>$npak</td>
                  <td>$nama_kta</td>
                  <td>$jk</td>
                  <td>$email</td>
                  <td>$no_telp</td>
                  <td><a type='button' class='btn btn-secondary' href='update_kta.php?npak=$npak'> Update </a>
                  <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#delete'>
                  Delete
                  </button></td>
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
                        <a class='btn btn-primary' href='delet_kta.php?npak=$npak'>Delet </a>
                      </div>
                    </div>
                  </div>
                  </div>  </tr>";
                  }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
      <!-- Modal -->
      <div class="modal fade" id="input_kta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input KTA </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="proses_input_kta.php">

              <div class="form-group">
                <label>NPAK</label>
                <input type="text" class="form-control" placeholder="NPAK" name="npak" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)/g, '$1');" textchanged required>
              </div>

              <div class="form-group">
                <label>Nama KTA</label>
                <input class="form-control" placeholder="Nama KTA" name="nama_kta" required>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="jk" id="optionsRadios1" value="Pria" checked>
                    Pria
                  </label>
                </div>

               <div class="radio">
                  <label>
                    <input type="radio" name="jk" id="optionsRadios2" value="Wanita">
                    Wanita
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input class="form-control" id="exampleInputEmail1" type="email" placeholder="Email" name="email" required>
              </div>

              <div class="form-group">
                <label>No Telp</label>
                <input class="form-control" placeholder="Nomor Telepon/No Hp" name="no_telp" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="password" name="password" required>
              </div>

              <!-- <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_dsn.php" class="btn btn-secondary">Back</a> -->

            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
</div>
<?php include 'footer.php'; ?>