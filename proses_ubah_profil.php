<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
if($_POST){
    $id_admin=$_POST["id_admin"];
    $nama_admin=$_POST["nama_admin"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $level=$_POST['level'];
    if(empty($nama_admin)){
        echo "<script>alert('nama admin tidak boleh kosong');location.href='registrasi.php';</script>";
 
    } else {
        include "koneksi.php";
        if(empty($password)){
            $update=mysqli_query($koneksi,"update admin set nama_admin='".$nama_admin."', username='".$username."' , level='".$level."' where id_admin = '".$id_admin."' ") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update admin');location.href='tampil_admin.php';</script>";
            } else {
                echo "<script>alert('Gagal update admin');location.href='ubah_profil.php?id_admin=".$id_admin."';</script>";
            }
        } else {
            $update=mysqli_query($koneksi,"update admin set nama_admin='".$nama_admin."', username='".$username."', password='".md5($password)."' , level='".$level."' where id_petugas = '".$id_petugas."'") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update admin');location.href='tampil_admin.php';</script>";
            } else {
                echo "<script>alert('Gagal update admin');location.href='ubah_profil.php?id_admin=".$id_admin."';</script>";
            }
        }
        
    } 
}
?>