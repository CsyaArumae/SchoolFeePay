
<?php 
    if($_GET['nisn']){
        include "koneksi.php";
        $nisn = $_GET['nisn'];
        $qry_hapus=mysqli_query($koneksi,"delete from siswa where nisn='".$nisn."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus siswa');location.href='tampil_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus siswa');location.href='tampil_siswa.php';</script>";
        }
    }
?>


