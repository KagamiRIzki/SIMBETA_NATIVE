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
          <div class="col-lg-12">

            <form role="form" method="post" action="proses_input_dsn.php">

              <div class="form-group">
                <label>Nomor Induk Dosen Negara(NIDN)</label>
                <input type="text" class="form-control" placeholder="Nomor Induk Dosen Negara" name="nidn" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)/g, '$1');" textchanged required >
              </div>

              <div class="form-group">
                <label>Nama Dosen</label>
                <input class="form-control" placeholder="Nama Dosen" name="nama_dsn" required>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="jk" id="optionsRadios1" value="Pria" checked>
                    Pria
                  </label>
                </div>

               <div class="radio">
                  <label>
                    <input type="radio" name="jk" id="optionsRadios2" value="Wanita">
                    Wanita
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input class="form-control" id="exampleInputEmail1" type="text" placeholder="Email" name="email" required>
              </div>

              <div class="form-group">
                <label>No Telp</label>
                <input type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\.*)\./g, '$1');" class="form-control" placeholder="Nomor Telepon/No Hp" name="no_telp" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>

              <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_dsn.php" class="btn btn-secondary">Back</a>

            </form>
            <br><br>

        </div><!-- /.row -->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
</div>
<?php include 'footer.php'; ?>