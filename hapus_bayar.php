
<?php 
    if($_GET['id_pembayaran']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($koneksi,"DELETE from pembayaran where id_pembayaran='".$_GET['id_pembayaran']."'");
        if($qry_hapus){
            echo "<script>alert('Sucessfully Delete Payment');location.href='history_pembayaran.php';</script>";
        } else {
            echo "<script>alert('Failed Delete Payment');location.href='history_pembayaran.php';</script>";
        }
    }
?> 