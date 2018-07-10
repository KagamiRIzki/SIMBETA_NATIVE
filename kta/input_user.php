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
          <div class="col-lg-12">

            <form role="form" method="post" action="proses_input_user.php">
            <?php 
            error_reporting(0);
            session_start();
            $username=$_SESSION['username'];
            include "../koneksi.php";

            date_default_timezone_set("Asia/Jakarta");
            $date = date("Hmisdmy");
            $id = "A.$date"; 
            ?>

              <div class="form-group">
                <label>Akun ID</label>
                <input type="text" class="form-control" placeholder="Akun ID" name="akun_id" value="<?php echo $id ?>" disabled>
              </div>

              <div class="form-group">
                <label>Username</label>
                <input class="form-control" placeholder="Username" name="username">
              </div>

              <div class="form-group">
                <label>Hak Akses</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="akses" id="optionsRadios1" value="kta" >
                    KTA
                  </label>
                </div>
               <div class="radio">
                  <label>
                    <input type="radio" name="akses" id="optionsRadios2" value="dosen">
                    Dosen
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="akses" id="optionsRadios2" value="mahasiswa">
                    Mahasiswa
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input class="form-control" placeholder="Password" name="password">
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