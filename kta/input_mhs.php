<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Input Mahasisswa</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Input Mahasiswa</h1>
        </div>
      </div>
    </div>
          <div class="col-lg-12">

            <form role="form" method="post" action="proses_input_mhs.php">

              <div class="form-group">
                <label>Nomor Induk mahasiswa(NIM)</label>
                <input type="text" class="form-control" placeholder="Nomor Induk Mahasiswa(NIM)" name="nim" textchanged required>
              </div>

              <div class="form-group">
                <label>Nama mahasiswa</label>
                <input class="form-control" placeholder="Nama Mahasiswa" name="nama_mhs" required>
              </div>

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="jk" id="optionsRadios1" value="Pria" checked >
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
                <label>Kelas</label>
                <select placeholder="kelas" name="kelas">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>

              <div class="form-group">
                <label>Judul TA</label>
                <input type="text" class="form-control" placeholder="Judul TA" name="judul_ta" required>
              </div>

              <div class="form-group">
                <label>Password Pengguna</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>

              <button type="submit" class="btn btn-primary">Submit Button</button>
              <button class='btn btn-secondary' type="reset" class="btn btn-default">Reset Button</button>  
              <a href="lihat_tabel_mhs.php" class="btn btn-secondary">Daftar Mahasiswa</a>

            </form>
            <br><br>

          </div><!-- /.row -->
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    </div>
</div>
<?php include 'footer.php'; ?>