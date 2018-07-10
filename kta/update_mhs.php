<?php include 'header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Update Mahasiswa</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Update Mahasiswa</h1>
          <p>Halaman untuk Edit data Mahasiswa</p>
        </div>
      </div>
    </div>
<?php
//error_reporting(0);
// koneksi database
include "../koneksi.php";

// menerima data dengan methode GET
// $nim=$_GET['nim'];
$nim_lama=$_GET['nim'];

// MEMANGGIL DATA DARI DATABASE BERDASARKAN NIM
$panggil1="select * from mahasiswa WHERE nim='$nim_lama'";
$panggil2="select * from login WHERE username='$nim_lama'";

$hasil1=mysql_query($panggil1);
$hasil2=mysql_query($panggil2);

$tampil1=mysql_fetch_array($hasil1);
$tampil2=mysql_fetch_array($hasil2);
    // tulisan yang berwana merah disamakan dengan yang ada didalam database (tabel mahasiswa)
  $nim=$tampil1['nim'];
  $nama_mhs=$tampil1['nama_mhs'];
  $jk=$tampil1['jk'];
  $kelas=$tampil1['kelas'];
  $judul_ta=$tampil1['judul_ta'];
  $password=$tampil2['password'];
?>

          <div class="col-lg-12">

            <form role="form" method="post" action="proses_update_mhs.php">
              <input type="hidden" name="nim_lama" value="<?php echo $nim_lama; ?>">
              <div class="form-group">
                <label>Nomor Induk mahasiswa(NIM)</label>
                <input class="form-control" placeholder="Nomor Induk Mahasiswa(NIM)" name="nim" value="<?php echo $nim; ?>">
              </div>

              <div class="form-group">
                <label>Nama mahasiswa</label>
                <input class="form-control" placeholder="Nama Mahasiswa" name="nama_mhs" value="<?php echo $nama_mhs; ?>">
              </div>
              <?php if ($jk=="Pria") {
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
              else
                 {
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
                <label>Kelas</label>
                <?php 
                if ($kelas=="A") {
                  # code...
                  echo "<select placeholder='kelas' name='kelas'>
                    <option value='A' selected>A</option>
                    <option value='B'>B</option>
                    <option value='C'>C</option>
                    <option value='D'>D</option>
                  </select>";
                }elseif ($kelas=="B") {
                  # code...
                  echo "<select placeholder='kelas' name='kelas'>
                    <option value='A'>A</option>
                    <option value='B' selected>B</option>
                    <option value='C'>C</option>
                    <option value='D'>D</option>
                  </select>";
                }elseif ($kelas=="C") {
                  # code...
                  echo "<select placeholder='kelas' name='kelas'>
                    <option value='A'>A</option>
                    <option value='B'>B</option>
                    <option value='C' selected>C</option>
                    <option value='D'>D</option>
                  </select>";
                }elseif ($kelas=="D") {
                  # code...
                  echo "<select placeholder='kelas' name='kelas'>
                    <option value='A'>A</option>
                    <option value='B'>B</option>
                    <option value='C'>C</option>
                    <option value='D' selected>D</option>
                  </select>";
                }
                ?>
              </div>

              <div class="form-group">
                <label>Judul Tugas Akhir</label>
                <input class="form-control" placeholder="Judul Tugas Akhir" name="judul_ta" value="<?php echo "$judul_ta" ?>">
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo "$password" ?>">
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
