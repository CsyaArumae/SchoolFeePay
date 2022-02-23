<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>s
<?php
    if($_GET['id_spp']){
        include "koneksi.php";
        $query_hapus=mysqli_query($koneksi,"DELETE FROM spp where id_spp='".$_GET['id_spp']."'");
        // echo "DELETE FROM kelas where id_spp='".$_GET['id_spp']."'";
    if($query_hapus){
        echo "<script>alert('Sukses Hapus Kelas');location.href='tampil_spp.php';</script>";
    } else {
        echo "<script>alert('Gagal Hapus Kelas');location.href='tampil_spp.php';</script>";
        }
    } 
?>