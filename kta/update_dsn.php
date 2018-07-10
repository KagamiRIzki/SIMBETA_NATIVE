<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Input Dosen</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Input Dosen</h1>
          <p>Silahkan Masukan data-data tentang dosen</p>
        </div>
      </div>
    </div>

      <?php
//error_reporting(0);
// koneksi database
      include "../koneksi.php";

// menerima data dengan methode GET
      $nidn_lama=$_GET['nidn'];

// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM

$panggil1="select * from dosen WHERE nidn='$nidn_lama'";
$panggil2="select * from login WHERE username='$nidn_lama'";


$hasil1=mysql_query($panggil1);
$hasil2=mysql_query($panggil2);

$tampil1=mysql_fetch_array($hasil1);
$tampil2=mysql_fetch_array($hasil2);
    // tulisan yang berwana merah di

    // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
        $nidn=$tampil1['nidn'];
        $nama_dsn=$tampil1['nama_dsn'];
        $jk=$tampil1['jk'];
        $email=$tampil1['email'];
        $no_telp=$tampil1['no_telp'];
        $password=$tampil2['password'];
      ?>
          <div class="col-lg-12">

            <form role="form" method="post" action="proses_update_dsn.php">

              <div class="form-group">
                <input type="hidden" name="nidn_lama" value="<?php echo $nidn_lama; ?>">
                <label>Nomor Induk Dosen Negara(NIDN)</label>
                <input class="form-control" placeholder="Nomor Induk Dosen Negara" name="nidn" value="<?php echo $nidn; ?>">
              </div>

              <div class="form-group">
                <label>Nama Dosen</label>
                <input class="form-control" placeholder="Nama Dosen" name="nama_dsn" value="<?php echo $nama_dsn; ?>">
              </div>
              <?php echo $jk; ?>
              <?php if ($jk=="Pria") {
                # code...
                echo "<div class='form-group'>
                <label>Jenis Kelamin</label>
                <div class='radio'>
                  <label>
                    <input type='radio' name='jk' id='optionsRadios1' value='Pria' checked>
                    Pria
                  </label>
                </div>
               <div class='radio'>
                  <label>
                    <input type='radio' name='jk' id='optionsRadios2' value='Wanita'>
                    Wanita
                  </label>
                </div>
              </div>";
              }
              else {
                 # code...
                echo "<div class='form-group'>
                <label>Jenis Kelamin</label>
                <div class='radio'>
                  <label>
                    <input type='radio' name='jk' id='optionsRadios1' value='Pria' >
                    Pria
                  </label>
                </div>
               <div class='radio'>
                  <label>
                    <input type='radio' name='jk' id='optionsRadios2' value='Wanita' checked>
                    Wanita
                  </label>
                </div>
              </div>";
               } ?>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Email" name="email" value="<?php echo $email; ?>">
              </div>

              <div class="form-group">
                <label>No Telp</label>
                <input class="form-control" placeholder="Nomor Telepon/No Hp" name="no_telp" value="<?php echo $no_telp; ?>">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo "$password" ?>">
              </div>

              <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_dsn.php" class="btn btn-secondary">Back</a>

            </form>

        </div><!-- /.row -->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
</div>
<?php include 'footer.php'; ?>
