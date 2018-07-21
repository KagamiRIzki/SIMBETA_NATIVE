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
$id_jadwal=$_GET['id_jadwal'];

// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
$panggil="select * from jadwal WHERE id_jadwal='$id_jadwal'";
$hasil=mysql_query($panggil);
$tampil=mysql_fetch_array($hasil);
    // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
  $id_jadwal=$tampil['id_jadwal'];
  $nidn=$tampil['nidn'];
  $nama_dsn=$tampil['nama_dsn'];
  $senen=$tampil['senen'];
  $selasa=$tampil['selasa'];
  $rabu=$tampil['rabu'];
  $kamis=$tampil['kamis'];
  $jumat=$tampil['jumat'];
?>
          <div class="col-12">

            <form role="form" method="post" action="proses_update_jadwal.php">

              <div class="form-group">
                <label>ID Jadwal</label>
                <input class="form-control" placeholder="ID Jadwal" name="id_jadwal" value="<?php echo $id_jadwal;?>" readonly>
              </div>

              <div class="form-group">
                <label>NIDN</label>
                <input class="form-control" placeholder="NIDN" name="nidn" value="<?php echo $nidn;?>" readonly>
              </div>

              <div class="form-group">
                <label>Nama Dosenes</label>
                <input class="form-control" placeholder="Nama Dosen" name="nama_dsn" value="<?php echo $nama_dsn;?>" readonly>
              </div>

              <div class="form-group">
                <label>Jadwal Bimbingan</label>
                <label class="checkbox-inline" >
                  <?php if ($senen==1) {
                    # code...
                    echo "<input name='senen' type='checkbox' value='1' checked > Senen ";
                  }else {
                    # code...
                    echo "<input name='senen' type='checkbox' value='1'> Senen ";
                  }  ?>
                </label>
                <label class="checkbox-inline">
                  <?php if ($selasa==1) {
                    # code...
                    echo "<input name='selasa' type='checkbox' value='1' checked > Selasa ";
                  }else {
                    # code...
                    echo "<input name='selasa' type='checkbox' value='1'> Selasa ";
                  }  ?>
                </label>
                <label class="checkbox-inline">
                  <?php if ($rabu==1) {
                    # code...
                    echo "<input name='rabu' type='checkbox' value='1' checked> Rabu ";
                  }else {
                    # code...
                    echo "<input name='rabu' type='checkbox' value='1'> Rabu ";
                  }  ?>
                </label>
                <label class="checkbox-inline">
                  <?php if ($kamis==1) {
                    # code...
                    echo "<input name='kamis' type='checkbox' value='1' checked > Kamis ";
                  }else {
                    # code...
                    echo "<input name='kamis' type='checkbox' value='1'> Kamis ";
                  }  ?>
                </label>
                <label class="checkbox-inline">
                  <?php if ($jumat==1) {
                    # code...
                    echo "<input name='jumat' type='checkbox' checked value='1'> Jumat ";
                  }else {
                    # code...
                    echo "<input name='jumat' type='checkbox' value='1'> Jumat ";
                  }  ?>
                </label>
              </div>

              <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_jadwal.php" class="btn btn-secondary">Back</a>
            </form>

          </div><!-- /.row -->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
<?php include 'footer.php'; ?>