<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tabel Bimbingan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input_bimbingan">
            Input Bimbingan
          </button><br>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tabel Bimbingan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>NIDN 1</th>
                  <th>Pembimbing 1</th>
                  <th>NIDN 2</th>
                  <th>Pembimbing 2</th>
                  <th>Judul</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Mahasiswa</th>
                  <th>NIDN 1</th>
                  <th>Pembimbing 1</th>
                  <th>NIDN 2</th>
                  <th>Pembimbing 2</th>
                  <th>Judul</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  include "../koneksi.php";

                  $panggil="SELECT * from bimbingan" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $id_bimbingan=$tampil['id_bimbingan'];
                  $nim=$tampil['nim'];
                  $nama_mhs=$tampil['nama_mhs'];
                  $nidn_p1=$tampil['nidn_p1'];
                  $nama_pem1=$tampil['nama_pem1'];
                  $nidn_p2=$tampil['nidn_p2'];
                  $nama_pem2=$tampil['nama_pem2'];
                  $judul_ta=$tampil['judul_ta'];

                  echo  "<tr>
                  <td>$nim</td>
                  <td>$nama_mhs</td>
                  <td>$nidn_p1</td>
                  <td>$nama_pem1</td>
                  <td>$nidn_p2</td>
                  <td>$nama_pem2</td>
                  <td>$judul_ta</td>
                  <td>
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
                        <a class='btn btn-primary' href='delet_bimbingan.php?id_bimbingan=$id_bimbingan'>Delete </a>
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
<div class="modal fade" id="input_bimbingan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="proses_input_bimbingan.php">
            
            <?php 
            error_reporting(0);
            session_start();
            $username=$_SESSION['username'];
            include "../koneksi.php";

            date_default_timezone_set("Asia/Jakarta");
            $date = date("Hmisdmy");
            $id = "BIM.$date"; 
            ?>

              <div class="form-group">
                <label>ID Bimbingan</label>
                <input class="form-control" placeholder="ID Bimbingan" name="id_bimbingan" value="<?php echo $id; ?>" readonly>
              </div>

              <div class="form-group">
              <label>Nomor Induk mahasiswa(NIM)</label>
              <select name="nim" class="js-example-basic-single form-control">
              <?php 
                  $panggil_mhs="SELECT * FROM mahasiswa";
                  $hasil=mysql_query($panggil_mhs);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $nim=$tampil['nim'];
                  $nama_mhs=$tampil['nama_mhs'];
                  $judul_ta=$tampil['judul_ta'];

                  echo "<option value='$nim'> $nim || $nama_mhs || $judul_ta </option>";
                  } 
              ?>
              </select>
              </div>

              <div class="form-group">
              <label>NIDN Pembimbing 1</label>
              <select name="nidn_p1" class="js-example-basic-single form-control">
              <?php 
                  $panggil_dsn="SELECT * FROM dosen";
                  $hasil=mysql_query($panggil_dsn);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $nidn=$tampil['nidn'];
                  $nama_dsn=$tampil['nama_dsn'];

                  echo "<option value='$nidn'> $nidn || $nama_dsn</option>";
                  } 
              ?>
              </select>
              </div>
 
              <div class="form-group">
              <label>NIDN Pembimbing 2</label>
              <select name="nidn_p2" class="js-example-basic-single form-control">
              <?php 
                  $panggil_dsn="SELECT * FROM dosen";
                  $hasil=mysql_query($panggil_dsn);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $nidn=$tampil['nidn'];
                  $nama_dsn=$tampil['nama_dsn'];

                  echo "<option value='$nidn'> $nidn || $nama_dsn</option>";
                  } 
              ?>
              </select>
              </div>

              <!-- <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_bimbingan.php" class="btn btn-secondary">Tabel Bimbingan</a> -->

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit Button</button>
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