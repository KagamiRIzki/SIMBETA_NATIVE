<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update KTA</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Update KTA</h1>
          <!-- <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p> -->
        </div>
      </div>
    </div>
<?php
//error_reporting(0);
// koneksi database
include "../koneksi.php";

// menerima data dengan methode GET
$npak_lama=$_GET['npak'];
$panggil1="select * from kta WHERE npak='$npak_lama'";
$panggil2="select * from login WHERE username='$npak_lama'";


$hasil1=mysql_query($panggil1);
$hasil2=mysql_query($panggil2);

$tampil1=mysql_fetch_array($hasil1);
$tampil2=mysql_fetch_array($hasil2);
// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
// $panggil="select * from kta WHERE npak='$npak'";
// $panggil_user="SELECT * FROM login WHERE username='$npak'";
$hasil1=mysql_query($panggil1);
$hasil2=mysql_query($panggil2);
$tampil1=mysql_fetch_array($hasil1);
$tampil2=mysql_fetch_array($hasil2);
    // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
  $npak=$tampil1['npak'];
  $nama_kta=$tampil1['nama_kta'];
  $jk=$tampil1['jk'];
  $email=$tampil1['email'];
  $no_telp=$tampil1['no_telp'];
  $password=$tampil2['password'];
?>

          <div class="col-lg-12">

            <form role="form" method="post" action="proses_update_kta.php">
              <input type="hidden" name="npak_lama" value="<?php echo $npak_lama; ?>">

              <div class="form-group">
                <label>NPAK</label>
                <input class="form-control" placeholder="NPAK" name="npak" value="<?php echo $npak; ?>">
              </div>

              <div class="form-group">
                <label>Nama KTA</label>
                <input class="form-control" placeholder="Nama KTA" name="nama_kta" value="<?php echo $nama_kta; ?>">
              </div>
              <?php if ($jk="Laki-Laki") {
                # code...
                echo "<div class='form-group'>
                <label>Jenis Kelamin</label>
                <div class='radio'>
                  <label>
                    <input type='radio' name='jk' id='optionsRadios1' value='Pria' checked >
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
                <label>Email</label>
                <input class="form-control" placeholder="Email" name="email" value="<?php echo "$email"; ?>">
              </div>

              <div class="form-group">
                <label>No Telp</label>
                <input class="form-control" placeholder="Nomor Telp" name="no_telp" value="<?php echo "$no_telp"; ?>">
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
