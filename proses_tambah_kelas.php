<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
    $nama_kelas = $_POST ["nama_kelas"];
    $jurusan = $_POST ["jurusan"];
    $angkatan = $_POST ["angkatan"];
    
    include "./koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO kelas ( nama_kelas, jurusan, angkatan ) VALUES ('{$nama_kelas}', '{$jurusan}', '{$angkatan}')");
    
    if($input){
        echo "<script>alert('Berhasil');location.href='tampil_kelas.php';</script>";
    }
    else{
        echo "<script>alert('Gagal');location.href='tambah_kelas.php';</script>";
    }
?>