<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
   
    session_start();
    
    include "koneksi.php";
    
    $id_admin= $_SESSION['id_admin'];
    $nisn = $_POST['nisn'];
    $bulan = $_POST['bulan_spp'];
    $tahun_spp = $_POST['tahun_spp'];
    $tgl_bayar = date('Y-m-d');


    $cek = mysqli_query($koneksi,"select * from pembayaran where nisn='".$nisn."' and bulan_spp = '".$bulan."' and tahun_spp = '".$tahun_spp."' ");
    
    if(mysqli_num_rows($cek) > 0 ){
        echo "<script>alert('Already Paid In This Month'); location.href='history_pembayaran.php'</script>";
    } elseif(mysqli_num_rows($cek) < 1){
        echo "<script>alert('Payment Sucessfully'); location.href='history_pembayaran.php'</script>";
        $input = mysqli_query($koneksi,"INSERT INTO pembayaran(id_admin, nisn, tgl_bayar, bulan_spp, tahun_spp) VALUES ('".$id_admin."','".$nisn."','".$tgl_bayar."','".$bulan."','".$tahun_spp."')");

    }

?>