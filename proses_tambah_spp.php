<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
   
   $id_kelas = $_POST ["id_kelas"];
    $angkatan = $_POST ["angkatan"];
    $tahun = $_POST ["tahun"];
    $nominal = $_POST ["nominal"];
    
    include "koneksi.php";
    $input = mysqli_query($koneksi, "INSERT INTO spp ( id_kelas, angkatan, tahun, nominal ) VALUES ( '{$id_kelas}','{$angkatan}', '{$tahun}', '{$nominal}')");
    echo "INSERT INTO spp ( id_kelas, angkatan, tahun, nominal ) VALUES ('{$id_kelas}', '{$angkatan}', '{$tahun}', '{$nominal}')";
    
    if($input){
        echo "<script>alert('Berhasil');location.href='tampil_spp.php';</script>";
    }
    else{
        echo "<script>alert('Gagal');location.href='tambah_spp.php';</script>";
    }
?>