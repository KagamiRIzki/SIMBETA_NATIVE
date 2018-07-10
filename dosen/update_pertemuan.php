<?php include 'header.php'; ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Pertemuan Bimbingan</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Update Pertemuan Bimbingan</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div>
    </div>
    <?php
//error_reporting(0);
// koneksi database
include "../koneksi.php";

// menerima data dengan methode GET
$id_pertemuan=$_GET['id_pertemuan'];

// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
$panggil="SELECT * FROM pertemuan WHERE id_pertemuan='$id_pertemuan'";
$hasil=mysql_query($panggil);
$tampil=mysql_fetch_array($hasil);
    // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
  $id_pertemuan=$tampil['id_pertemuan'];
  $id_bimbingan=$tampil['id_bimbingan'];
  $nim=$tampil['nim'];
  $email=$tampil['email'];
  $nama_mhs=$tampil['nama_mhs'];
  $nidn=$tampil['nidn'];
  $nama_dsn=$tampil['nama_dsn'];
  $judul_ta=$tampil['judul_ta'];
  $tgl_bimbingan=$tampil['tgl_bimbingan'];
  $bab=$tampil['bab'];
  $status=$tampil['status'];
  $catatan=$tampil['catatan'];
?>

          <div class="col-12">

            <form role="form" method="post" action="proses_update_pertemuan.php"><!-- 

              <div class="form-group">
                  <label for="disabledSelect">ID Bimbingan</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="ID Bimbingan" disabled>
              </div> -->

              <div class="form-group">
                <label>ID pertemuan</label>
                <input class="form-control" placeholder="ID Pertemuan" name="id_pertemuan" value="<?php echo $id_pertemuan;?>" readonly >
              </div>

              <div class="form-group">
                <label>ID Bimbingan</label>
                <input class="form-control" placeholder="ID Bimbingan" name="id_bimbingan" value="<?php echo $id_bimbingan;?>" readonly>
              </div>

              <div class="form-group">
                <label>Nomor Induk mahasiswa(NIM)</label>
                <input class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" value="<?php echo $nim;?>" readonly>
              </div>

              <div class="form-group">
                <label>Nama mahasiswa</label>
                <input class="form-control" placeholder="Nama Mahasiswa" name="nama_mhs" value="<?php echo $nama_mhs;?>" readonly> 
              </div>

              <div class="form-group">
                <label>NIDN</label>
                <input class="form-control" placeholder="NIDN Dosen" name="nidn" value="<?php echo $nidn;?>" readonly>
              </div>

              <div class="form-group">
                <label>Nama Pembimbing</label>
                <input class="form-control" placeholder="Nama Dosen" name="nama_dsn" value="<?php echo $nama_dsn;?>" readonly>
              </div>

              <div class="form-group">
                <label>Judul Tugas Akhir</label>
                <input class="form-control" placeholder="Judul Tugas Akhir" name="judul_ta" value="<?php echo $judul_ta;?>" readonly>
              </div>

              <div class="form-group">
                <label>Tanggal Bimbingan</label>
                <input class="form-control" placeholder="Tanggal Bimbingan" name="tgl_bimbingan" value="<?php echo $tgl_bimbingan;?>" readonly>
              </div>
              <?php if ($bab==1) {
                # code...
                echo "<div class='form-group'>
                <label>Bab Bimbingan</label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline1' value='1' checked> 1
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='2'> 2
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='3'> 3
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='5'> 5
                </label>
              </div>";
              }
              elseif ($bab==2) {
                 # code...
                echo "<div class='form-group'>
                <label>Bab Bimbingan</label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline1' value='1'> 1
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='2' checked> 2
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='3'> 3
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='5'> 5
                </label>
              </div>";
               }elseif ($bab==3) {
                 # code...
                echo "<div class='form-group'>
                <label>Bab Bimbingan</label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline1' value='1'> 1
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='2'> 2
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='3' checked> 3
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='5'> 5
                </label>
              </div>";
               }elseif ($bab==4) {
                 # code...
                echo "<div class='form-group'>
                <label>Bab Bimbingan</label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline1' value='1'> 1
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='2'> 2
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='3'> 3
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='4' checked> 4
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='5'> 5
                </label>
              </div>";
               }elseif ($bab==5) {
                 # code...
                echo "<div class='form-group'>
                <label>Bab Bimbingan</label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline1' value='1'> 1
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='2'> 2
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='3'> 3
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline2' value='4'> 4
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='bab' id='optionsRadiosInline3' value='5' checked> 5
                </label>
              </div>";
               } ?>
               <?php if ($status=="proses") {
                # code...
                echo "<div class='form-group'>
                <label>Status</label>
                <label class='radio-inline'>
                  <input type='radio' name='status' id='optionsRadiosInline1' value='proses' checked> Proses
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='status' id='optionsRadiosInline2' value='acc'> ACC
                </label>
              </div>";
              }
              else {
                 # code...
                echo "<div class='form-group'>
                <label>Status</label>
                <label class='radio-inline'>
                  <input type='radio' name='status' id='optionsRadiosInline1' value='proses'> Proses
                </label>
                <label class='radio-inline'>
                  <input type='radio' name='status' id='optionsRadiosInline2' value='acc' checked> ACC
                </label>
              </div>";
               } ?>

              <div class="form-group">
                <label>Catatan</label>
                <textarea class="form-control" placeholder="Catatan" name="catatan"><?php echo $catatan;?></textarea>
                <!-- <input type="textarea" class="form-control" placeholder="Catatan" name="catatan" value="<?php //echo $catatan;?>"> -->
              </div>

              <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_pertemuan.php?nim=<?php echo $nim;?>" class="btn btn-secondary">Back</a>

            </form>
            <br><br>

          </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
<?php include 'footer.php'; ?>