<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blank Page</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Blank</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div>
    </div>
<?php
//error_reporting(0);
// koneksi database
include "../koneksi.php";

// menerima data dengan methode GET
$id_bimbingan=$_GET['id_bimbingan'];

// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
$panggil="select * from bimbingan WHERE id_bimbingan='$id_bimbingan'";
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
?>
        <div class="col-12">

            <form role="form" method="post" action="proses_update_bimbingan.php"><!-- 

              <div class="form-group">
                  <label for="disabledSelect">ID Bimbingan</label>
                <input class="form-control" id="disabledInput" type="text" placeholder="ID Bimbingan" disabled>
              </div> -->

              <div class="form-group">
                <label>ID Bimbingan</label>
                <input class="form-control" placeholder="ID Bimbingan" name="id_bimbingan" value="<?php echo "$id_bimbingan"; ?>" readonly>
              </div>

              <div class="form-group">
                <label>Nomor Induk mahasiswa(NIM)</label>
                <input class="form-control" placeholder="Nomor Induk Mahasiswa" name="nim" value="<?php echo "$nim"; ?>">
              </div>

              <div class="form-group">
                <label>Nama mahasiswa</label>
                <input class="form-control" placeholder="Nama Mahasiswa" name="nama_mhs" value="<?php echo "$nama_mhs"; ?>"> 
              </div>

              <div class="form-group">
                <label>NIDN Pembimbing 1</label>
                <input class="form-control" placeholder="NIDN Pembimbing 1" name="nidn_p1" value="<?php echo "$nidn_p1"; ?>">
              </div>

              <div class="form-group">
                <label>Nama Pembimbing 1</label>
                <input class="form-control" placeholder="Nama Pembimbing 1" name="nama_pem1" value="<?php echo "$nama_pem1"; ?>">
              </div>

              <div class="form-group">
                <label>NIDN Pembimbing 2</label>
                <input class="form-control" placeholder="NIDN Pembimbing 2" name="nidn_p2" value="<?php echo "$nidn_p2"; ?>">
              </div>

              <div class="form-group">
                <label>Nama Pembimbing 2</label>
                <input class="form-control" placeholder="Nama Pembimbing 2" name="nama_pem2" value="<?php echo "$nama_pem2"; ?>">
              </div>

              <div class="form-group">
                <label>Judul Tugas Akhir</label>
                <input class="form-control" placeholder="Judul Tugas Akhir" name="judul_ta" value="<?php echo "$judul_ta"; ?>">
              </div>

              <button type="submit" class="btn btn-default">Submit Button</button>
              <button type="reset" class="btn btn-default">Reset Button</button>  

            </form>

          </div><!-- /.row -->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
</div>
<?php include 'footer.php'; ?>
