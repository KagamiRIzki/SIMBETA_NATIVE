<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Jadwal Bimbingan</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Jadwal Bimbingan</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
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
            $id = "JDW.$date";
            $hr = ["Minggu","Senen","Selasa","Rabu","Kamis","Jumat","Sabtu"];
            
              // koneksi database
              include "../koneksi.php";

              // menerima data dengan methode GET
              $nidn=$username;

              // MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
              $panggil="select * from dosen WHERE nidn='$nidn'";
              $hasil=mysql_query($panggil);
              $tampil=mysql_fetch_array($hasil);
              // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
                $nidn=$tampil['nidn'];
                $nama_dsn=$tampil['nama_dsn'];
                $jk=$tampil['jk'];
                $email=$tampil['email'];
                $no_telp=$tampil['no_telp'];
            ?>
            <form role="form" method="post" action="proses_input_jadwal.php">

              <div class="form-group">
                <label>ID Jadwal</label>
                <input class="form-control" placeholder="ID Jadwal" name="id_jadwal" value="<?php echo $id; ?>" readonly>
              </div>

              <div class="form-group">
                <label>nidn</label>
                <input class="form-control" placeholder="NIDN" name="nidn" value="<?php echo $username; ?>" readonly>
              </div>

              <div class="form-group">
                <label>Nama Pembimbing</label>
                <input class="form-control" placeholder="Nama Pembimbing" name="nama_dsn" value="<?php echo $nama_dsn; ?>" readonly>
              </div>

              <div class="form-group">
                <label>Jadwal Bimbingan</label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="senen" value="1"> Senen
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="selasa" value="1"> Selasa
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="rabu" value="1"> Rabu
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="kamis" value="1"> Kamis
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox" name="jumat" value="1"> Jumat
                </label>
              </div>

              <button type="submit" class="btn btn-default">Submit Button</button>
              <button type="reset" class="btn btn-default">Reset Button</button>  

            </form>
            <br><br>

          </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   
  <?php include 'footer.php'; ?>