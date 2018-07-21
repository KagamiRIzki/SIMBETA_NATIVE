<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Tabel Mahasiswa</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#input_mhs">
            Input Mahasiswa
          </button><br>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Tabel Mahasiswa</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Kelas</th>
                  <th>Judul TA</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Kelas</th>
                  <th>Judul TA</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                  error_reporting(0);
                  include "../koneksi.php";

                  $panggil="SELECT * from mahasiswa" ;

                  $hasil=mysql_query($panggil);

                  while ($tampil=mysql_fetch_array($hasil)){
                  $nim=$tampil['nim'];
                  $nama_mhs=$tampil['nama_mhs'];
                  $jk=$tampil['jk'];
                  $kelas=$tampil['kelas'];
                  $judul_ta=$tampil['judul_ta'];

                  echo "<tr>
                  <td>$nim</td>
                  <td>$nama_mhs</td>
                  <td>$jk</td>
                  <td>$kelas</td>
                  <td>$judul_ta</td>
                  <td><a type='button' class='btn btn-secondary' href='update_mhs.php?nim=$nim'>Update </a>
                  <button type='button' class='btn btn-primary' data-id='$nim' data-href='delet_mhs.php?nim=$nim' data-toggle='modal' data-target='#delete-$nim'>
                  Delete
                  </button>

                  <!-- Delete Modal -->
                  <div class='modal fade' id='delete-$nim' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                  <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Yakin Ingin Menghapus</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                      <div class='modal-body'>
                        Pilih 'Delete' jika ingin menghapus data mahasiswa dengan NIM '$nim'
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                        <a class='btn btn-primary' href='delet_mhs.php?nim=$nim'>Delet </a>
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
        <!-- Modal Input Mahasiswa -->
        <div class="modal fade" id="input_mhs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form role="form" method="post" action="proses_input_mhs.php">

              <div class="form-group">
                <label>Nomor Induk mahasiswa(NIM)</label>
                <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa(NIM)" name="nim" textchanged required>
              </div>

              <div class="form-group">
                <label>Nama mahasiswa</label>
                <input class="form-control" placeholder="Nama Mahasiswa" name="nama_mhs" required>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="jk" id="optionsRadios1" value="Pria" checked >
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
                <label>Kelas</label>
                <select placeholder="kelas" name="kelas">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>

              <div class="form-group">
                <label>Judul TA</label>
                <input type="text" class="form-control" placeholder="Judul TA" name="judul_ta" required>
              </div>

              <div class="form-group">
                <label>Password Pengguna</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>

              <!-- <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_mhs.php" class="btn btn-secondary">Daftar Mahasiswa</a>-->
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
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