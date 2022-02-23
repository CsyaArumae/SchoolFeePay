<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
if($_POST){
    $nama_kelas=$_POST["nama_kelas"];
    $jurusan=$_POST["jurusan"];
    $angkatan=$_POST["angkatan"];
    
    $id_kelas=$_POST["id_kelas"];

    if(empty($nama_kelas)){
        echo "<script>alert('nama kelas tidak boleh kosong');location.href='tambah_kelas.php';</script>";
 
    }  else {
        include "koneksi.php";
            $update=mysqli_query($koneksi,"update kelas set nama_kelas='".$nama_kelas."', jurusan='".$jurusan."', angkatan='".$angkatan."' WHERE id_kelas = '".$id_kelas."'") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update kelas');location.href='tampil_kelas.php';</script>";
            } else {
                echo "<script>alert('Gagal update kelas');location.href='ubah_kelas.php?nisn=".$nisn."';</script>";
            }
        
    } 
}
?>