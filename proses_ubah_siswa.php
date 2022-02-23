<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
if($_POST){
    $nisn=$_POST["nisn"];
    $nis=$_POST["nis"];
    $nama=$_POST["nama"];
    $alamat=$_POST["alamat"];
    $no_tlp=$_POST["no_tlp"];
    
    $id_kelas=$_POST["id_kelas"];

    if(empty($nama)){
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";
 
    }  else {
        include "koneksi.php";
        if(empty($password)){
            $update=mysqli_query($koneksi,"update siswa set nisn='".$nisn."', nis='".$nis."', nama='".$nama."', alamat='".$alamat."', no_tlp='".$no_tlp."', id_kelas='".$id_kelas."' where nisn = '".$nisn."' ") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?nisn=".$nisn."';</script>";
            }
        } else {
            $update=mysqli_query($koneksi,"update siswa set nisn='".$nisn."', nis='".$nis."', nama='".$nama."', alamat='".$alamat."', no_tlp='".$no_tlp."', id_kelas='".$id_kelas."' where nisn = '".$nisn."'") or die(mysqli_error($koneksi));
            if($update){
                echo "<script>alert('Sukses update siswa');location.href='tampil_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal update siswa');location.href='ubah_siswa.php?nisn=".$nisn."';</script>";
            }
        }
        
    } 
}
?>