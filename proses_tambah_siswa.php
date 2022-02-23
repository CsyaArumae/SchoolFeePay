<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
include "koneksi.php";
if($_POST){
    $nisn=$_POST['nisn'];
    $nis=$_POST['nis'];
    $nama=$_POST['nama'];
    $id_kelas=$_POST['id_kelas'];
    $alamat=$_POST['alamat'];
    $no_tlp= $_POST['no_tlp'];
    if(empty($nisn)){
        echo "<script>alert('NISN siswa tidak boleh kosong');location.href='tambah_siswa.php';</script>";

    } elseif(empty ($nis)){
        echo "<script>alert('NIS tidak boleh kosong');location.href='tambah_siswa.php';</script>";
    } elseif(empty ($nama)){
        echo "<script>alert('nama tidak boleh kosong');location.href='tambah_siswa.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($koneksi,"insert into siswa (nisn, nis, nama, id_kelas, alamat, no_tlp) value ('".$nisn."','".$nis."','".$nama."','".$id_kelas."','".$alamat."','".$no_tlp."')") or die(mysqli_error($koneksi));
        if($insert){
            echo "<script>alert('Sukses menambahkan siswa');location.href='tampil_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan siswa');location.href='tambah_siswa.php';</script>";
        }
    }
}
?>