<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">DAFTAR SIDANG</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>DAFTAR SIDANG</h1>
          <!-- <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p> -->
        </div>
      </div>
    </div>
          <div class="col-12">
            <?php 
            error_reporting(0);
            session_start();
            $username=$_SESSION['username'];

            date_default_timezone_set("Asia/Jakarta");
            $date = date("Hmisdmy");
            $id = "S.$date";
            $hr = ["Minggu","Senen","Selasa","Rabu","Kamis","Jumat","Sabtu"];
            
              // koneksi database
              include "../koneksi.php";

              // menerima data dengan methode GET
              $nidn=$username;
              echo $nim;
              $nim=$_GET['nim'];
              // MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
              $panggil="SELECT *
                        FROM bimbingan
                        INNER JOIN dosen ON bimbingan.nidn_p1 OR bimbingan.nidn_p2 = dosen.nidn
                        WHERE dosen.nidn='$nidn' AND bimbingan.nim='$nim'";
              $hasil=mysql_query($panggil);
              $tampil=mysql_fetch_array($hasil);

              $id_bimbingan=$tampil['id_bimbingan'];
              $nidn=$tampil['nidn'];
              $nama_dsn=$tampil['nama_dsn'];
              $judul_ta=$tampil['judul_ta'];
                // $nim=$tampil['nim'];
              $nama_mhs=$tampil['nama_mhs'];

              $panggil_pertemuan="SELECT * FROM pertemuan WHERE nim='$nim' GROUP BY tgl_bimbingan DESC";
              $hasil_pertemuan=mysql_query($panggil_pertemuan);
              $tampil_pertemuan=mysql_fetch_array($hasil_pertemuan);

              $bab=$tampil_pertemuan['bab'];
              $status=$tampil_pertemuan['status'];
              $jumlah_bimbingan="SELECT * FROM pertemuan WHERE nim='$nim'";
              $hasil_bimbingan=mysql_query($jumlah_bimbingan);
              $jumlah=mysql_num_rows($hasil_bimbingan);
              // echo $jumlah;
              // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
              // $jumlah=$tampil_pertemuan['jumlah'];
            ?>
            <form role="form" method="post" action="proses_input_sidang.php">

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tbody>
                        <tr>
                          <td>ID Sidang</td>
                          <td>
                            <input class="form-control" placeholder="ID Sidang" name="id_sidang" value="<?php echo $id; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>ID Bimbingan</td>
                          <td>
                            <input type="text" class="form-control" placeholder="ID Bimbingan" name="id_bimbingan" value="<?php echo $id_bimbingan; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>NIDN</td>
                          <td>
                            <input type="text" class="form-control" placeholder="NIDN" name="nidn" value="<?php echo $username; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Pembimbing</td>
                          <td>
                            <input type="text" class="form-control" placeholder="Nama Pembimbing" name="nama_dsn" value="<?php echo $nama_dsn; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>NIM</td>
                          <td>
                            <input type="text" class="form-control" placeholder="NIM" name="nim" value="<?php echo $nim; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Mahasiswa</td>
                          <td>
                            <input type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama_mhs" value="<?php echo $nama_mhs; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>BAB Bimbingan</td>
                          <td>
                            <input type="text" class="form-control" placeholder="BAB" name="bab" value="<?php echo $bab; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Judul TA</td>
                          <td>
                            <input type="text" class="form-control" placeholder="Judul TA" name="judul_ta" value="<?php echo $judul_ta; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td>
                            <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $status; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>Jumlah Pertemuan</td>
                          <td>
                            <input type="text" class="form-control" placeholder="Jumlah Pertemuan" name="jumlah" value="<?php echo $jumlah; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td>IJIN Sidang</td>
                          <td>
                            <label class="checkbox-inline">
                              <?php 
                              if ($jumlah==8) {
                                # code...
                                echo "<input type='checkbox' name='cek_p' value='1'>";
                                if ($bab==5) {
                                  # code...
                                  echo "<input type='checkbox' name='cek_p' value='1'>";
                                }else {
                                  # code...
                                  echo " Belum memenuhi Syarat mendaftarkan sidang ";
                                }
                              }else {
                                # code...
                                echo " Belum memenuhi Syarat mendaftarkan sidang ";
                              }
                              ?>
                            </label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <button type="submit" class="btn btn-default">DAFTAR</button>
                  </div>
                </div>

            </form>
            <br><br>

          </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
  <?php include 'footer.php'; ?>