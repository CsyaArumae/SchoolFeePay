<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php 
    include "koneksi.php";
    
    $id_kelas = $_GET['id_kelas'];

    $sql = "delete from kelas where id_kelas = '$id_kelas'";

    //eksekusi perintah update
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "<script>alert('Berhasil');location.href='tampil_kelas.php';</script>";
    }
    else {
        // echo "<script>alert('Gagal');location.href='tampil_kelas.php';</script>";
    }

?>