<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pertemuan Bimbingan</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Pertemuan Bimbingan</h1>
        </div>
      </div>
    </div>

          <div class="col-12">
            <?php
              error_reporting(0);
// koneksi database
              include "../koneksi.php";

// menerima data dengan methode GET
              $id_bimbingan=$_GET['id_bimbingan'];

// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
              $panggil="SELECT * FROM bimbingan WHERE id_bimbingan='$id_bimbingan'";
              $hasil=mysql_query($panggil);
              $tampil=mysql_fetch_array($hasil);
    // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
                $id_bimbingan=$tampil['id_bimbingan'];
                $nim=$tampil['nim'];
                $nama_mhs=$tampil['nama_mhs'];
                $nidn_p1=$tampil['nidn_p1'];
                $nama_pem1=$tampil['nama_pem1'];
                $nidn_p2=$tampil['nidn_p2'];
                $nama_pem2=$tampil['nama_pem2'];
                $judul_ta=$tampil['judul_ta'];
            // error_reporting(0);
            session_start();
            $username=$_SESSION['username'];
            $nidn=$_SESSION['nidn'];
            $nama_dsn=$_SESSION['nama_dsn'];

            $date = date("Hmisdmy");
            $id = "PRT.$date";
            // $hr = ["Minggu","Senen","Selasa","Rabu","Kamis","Jumat","Sabtu"];
            // echo $hr[(int)date("w")];
            ?>

            <form role="form" method="post" action="proses_input_pertemuan.php">

              <div class="form-group">
                <label>ID pertemuan</label>
                <input class="form-control" placeholder="ID Pertemuan" name="id_pertemuan" value="<?php echo $id; ?>" readonly>
              </div>

              <div class="form-group">
                <label>ID Bimbingan</label>
                <input class="form-control" placeholder="ID Bimbingan" name="id_bimbingan" value="<?php echo $id_bimbingan; ?>" readonly>
              </div>

              <div class="form-group">
                <label>Nomor Induk mahasiswa(NIM)</label>
                <input class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" value="<?php echo $nim; ?>" readonly>
              </div>

              <div class="form-group">
                <label>Nama mahasiswa</label>
                <input class="form-control" placeholder="Nama Mahasiswa" name="nama_mhs" value="<?php echo $nama_mhs ?>" readonly> 
              </div>

              <div class="form-group">
                <label>NIDN</label>
                <input class="form-control" placeholder="NIDN Dosen" name="nidn" value="<?php echo $nidn; ?>" readonly>
              </div>

              <div class="form-group">
                <label>Nama Pembimbing</label>
                <input class="form-control" placeholder="Nama Dosen" name="nama_dsn" value="<?php echo $nama_dsn ?>" readonly>
              </div>

              <div class="form-group">
                <label>Judul Tugas Akhir</label>
                <input class="form-control" placeholder="Judul Tugas Akhir" name="judul_ta" value="<?php echo $judul_ta ?>" readonly>
              </div>

              <div class="form-group">
                <label>Tanggal Bimbingan</label>
                <input type="form-control" class="form-control" placeholder="Tanggal Bimbingan" name="tgl_bimbingan" value="<?php echo date("Y/m/d"); ?>" readonly>
              </div>

              
              <div class="form-group">
                <label>Bab Bimbingan</label>
              <?php 
                $pertemuan="SELECT * FROM pertemuan WHERE nim='$nim'";
                $hasil_prt=mysql_query($pertemuan);
                $tampil_prt=mysql_fetch_array($hasil_prt);
                $nim=$tampil_prt['nim'];
                $nama_mhs=$tampil_prt['nama_mhs'];
                $nidn=$tampil_prt['nidn'];
                $nama_dsn=$tampil_prt['nama_dsn'];
                $bab=$tampil_prt['bab'];
                if ($username==$nidn_p1) {
                  # code...
                  $panggil_bab="SELECT * FROM pertemuan WHERE nidn='$nidn_p2'";
                  $hasil_bab=mysql_query($panggil_bab);
                  $tampil_bab=mysql_fetch_array($hasil_bab);
                  $nim=$tampil_prt['nim'];
                  $nama_mhs=$tampil_prt['nama_mhs'];
                  $bab=$tampil_prt['bab'];
                  if($bab==1){
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='2'> 2
                    </label>";
                  }elseif ($bab==2) {
                    # code...
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='3'> 3
                    </label>";
                  }elseif ($bab==3) {
                    # code...
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='3' > 3
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                    </label>";
                  }elseif ($bab==4) {
                    # code...
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='3' > 3
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='5'> 5
                    </label>";
                  }else{
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>";
                  }
                }else {
                  # code...
                  echo "pembimbing 2";
                  $panggil_bab="SELECT * FROM pertemuan WHERE nidn='$nidn_p1'";
                  $hasil_bab=mysql_query($panggil_bab);
                  $tampil_bab=mysql_fetch_array($hasil_bab);
                  $nim=$tampil_prt['nim'];
                  $nama_mhs=$tampil_prt['nama_mhs'];
                  $bab=$tampil_prt['bab'];
                  if($bab==1){
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='2'> 2
                    </label>";
                  }elseif ($bab==2) {
                    # code...
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='3'> 3
                    </label>";
                  }elseif ($bab==3) {
                    # code...
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='3' > 3
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                    </label>";
                  }elseif ($bab==4) {
                    # code...
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='3' > 3
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='5'> 5
                    </label>";
                  }elseif ($bab==5) {
                    # code...
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='3' > 3
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline2' value='5'> 5
                    </label>";
                  }else{
                    echo "
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                    </label>
                    <label class='radio-inline'>
                      <input type='radio' name='bab' id='optionsRadiosInline1' value='2' > 2
                    </label>";
                  }
                }
              ?>
                
              </div>

              <div class="form-group">
                <label>Status</label>
                <label class="radio-inline">
                  <input type="radio" name="status" id="optionsRadiosInline1" value="prosses" checked> Proses
                </label>
                <label class="radio-inline">
                  <input type="radio" name="status" id="optionsRadiosInline2" value="acc"> ACC
                </label>
              </div>

              <div class="form-group">
                <label>Catatan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Catatan" name="catatan"></textarea>
              </div>

              <button type="submit" class="btn btn-default">Submit Button</button>
              <button type="reset" class="btn btn-default">Reset Button</button>  

            </form>
            <br><br>

          </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
  <?php include 'footer.php'; ?>