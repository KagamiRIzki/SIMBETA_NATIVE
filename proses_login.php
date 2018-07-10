<?php
//$conn = new mysqli("localhost","root","","siak");

include 'koneksi.php';

IF(ISSET($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $cek=mysql_num_rows(mysql_query( "SELECT * FROM login WHERE username='$username' AND password='$password'"));
  
  // $data=mysql_query( "SELECT * FROM login WHERE username='$username' AND password='$password'");
  // echo $data;

  $data=mysql_fetch_array(mysql_query( "SELECT * FROM login WHERE username='$username' AND password='$password'"));

  IF($cek > 0)
  {

    session_start();
    $_SESSION['username'] = $data['username'];
    //echo "<script language=\"javascript\">alert(\"Selamat Datang\");document.location.href='Dosen/home_dosen.php';</script>";

    //echo $cek;
    $query1="SELECT akses FROM login WHERE username='$username'";
    $cek1=mysql_query($query1);
    $data=mysql_fetch_array($cek1);
    $jabatan=$data['akses'];

    switch ($jabatan) {
    case 'mhs':
      # code...
      $panggil="SELECT * from mahasiswa WHERE nim='$username'";
      $hasil=mysql_query($panggil);
      $data1=mysql_fetch_array(mysql_query( "SELECT * FROM mahasiswa WHERE nim='$username'"));

      while ($tampil=mysql_fetch_array($hasil)){
      $nim=$tampil['nim'];
      $nama_mhs=$tampil['nama_mhs'];

      $_SESSION['nim'] = $data1['nim'];
      $_SESSION['nama_mhs'] = $data1['nama_mhs'];

      }
      // echo "<script language=\"javascript\">alert(\"Selamat Datang\");</script>";
      echo "<script language=\"javascript\">alert(\"Selamat Datang, $nama_mhs\");document.location.href='http://localhost/SIMBETA/mhs/';</script>";
      break;
    case 'kta':
      # code...
      $panggil="SELECT * from kta WHERE npak='$username'";
      $hasil=mysql_query($panggil);
      $data1=mysql_fetch_array(mysql_query( "SELECT * FROM kta WHERE npak='$username'"));

      while ($tampil=mysql_fetch_array($hasil)){
      $npak=$tampil['npak'];
      $nama_kta=$tampil['nama_kta'];

      $_SESSION['npak'] = $data1['npak'];
      $_SESSION['nama_kta'] = $data1['nama_kta'];
      
      }
      // echo "<script language=\"javascript\">alert(\"Selamat Datang\");</script>";
      echo "<script language=\"javascript\">alert(\"Selamat Datang, $nama_kta\");document.location.href='http://localhost/SIMBETA/kta/';</script>";
      break;
    case 'dosen':
      # code...
      $panggil="SELECT * from dosen WHERE nidn='$username'";
      $hasil=mysql_query($panggil);
      $data1=mysql_fetch_array(mysql_query( "SELECT * FROM dosen WHERE nidn='$username'"));

      while ($tampil=mysql_fetch_array($hasil)){
      $nidn=$tampil['nidn'];
      $nama_dsn=$tampil['nama_dsn'];

      $_SESSION['nidn'] = $data1['nidn'];
      $_SESSION['nama_dsn'] = $data1['nama_dsn'];
      
      }
      // echo "<script language=\"javascript\">alert(\"Selamat Datang\");</script>";
      echo "<script language=\"javascript\">alert(\"Selamat Datang, $nama_dsn\");document.location.href='http://localhost/SIMBETA/dosen/';</script>";
      break;
      }
  }
  else {
    # code...
    echo "<script language=\"javascript\">alert(\"Password atau Username Salah !!!\");document.location.href='login.html';</script>";
  }
}

?>