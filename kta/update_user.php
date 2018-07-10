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
$akun_id=$_GET['akun_id'];

// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
$panggil="select * from login WHERE akun_id='$akun_id'";
$hasil=mysql_query($panggil);
$tampil=mysql_fetch_array($hasil);
    // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
  $akun_id=$tampil['akun_id'];
  $username=$tampil['username'];
  $akses=$tampil['akses'];
  $password=$tampil['password'];
?>
          <div class="col-lg-12">

            <form role="form" method="post" action="proses_update_user.php">

              <div class="form-group">
                <label>Akun ID</label>
                <input class="form-control" placeholder="Akun ID" name="akun_id" value="<?php echo $akun_id;?>">
              </div>

              <div class="form-group">
                <label>Username</label>
                <input class="form-control" placeholder="Username" name="username" value="<?php echo $username;?>">
              </div>

              <div class="form-group">
                <label>Hak Akses</label>
                <input class="form-control" placeholder="Hak Akses" name="akses" value="<?php echo $akses;?>">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password;?>">
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

</html>
