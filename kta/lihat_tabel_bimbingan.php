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
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
</div>
<?php include 'footer.php'; ?>