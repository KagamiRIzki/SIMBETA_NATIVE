<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Input Bimbingan</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Input Bimbingan</h1>
          <p>Isikan data Bimbingan dengan data mahasiswa dan dosen dengan benar.</p>
        </div>
      </div>
    </div>

          <div class="col-12">

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

              <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_bimbingan.php" class="btn btn-secondary">Tabel Bimbingan</a>

            </form>
              <br><br>
          </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
<?php include 'footer.php'; ?>