<?php
    if($_GET['id_admin']){
        include "koneksi.php";
        $query_hapus=mysqli_query($koneksi,"DELETE FROM admin where id_admin='".$_GET['id_admin']."'");
        // echo "DELETE FROM admin where id_admin='".$_GET['id_admin']."'";
    if($query_hapus){
        echo "<script>alert('Sucessfully Delete Admin');location.href='tampil_admin.php';</script>";
    } else {
        echo "<script>alert('Failed Delete Admin');location.href='tampil_admin.php';</script>";
        }
    } 
?>