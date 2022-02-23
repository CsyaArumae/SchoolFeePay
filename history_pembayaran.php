<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_admin.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
  Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>
<body class="g-sidenav-show  bg-gray-100">
<?php 
        include "navbar.php";
        include "koneksi.php";
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php 
        include "navbar_top.php";
        
    ?>
    <br></br>
    <div class="Container col-md-9 square rounded p-3" style="margin-left:auto; margin-right:auto; border-color:white; background-color:white; text-align:left;">
        <div class="card-header" style="color:white; background-color:white; text-align:left">
        
           <center><h3><font color="#9300a0">Payment History</font><br></h3></center>
            <br>
            <form action="history_pembayaran.php" method="post" class="d-flex">
            <Input class="form-control me-1" type="search" name="cari" placeholder="type nisn here">
            <button type="submit" class="btn btn-secondary">search </button>
            </form> 
        </div>
        <div class="card-body">
            <table class="table table-striped table-light"> 
            <thead>
        <tr style="color:black;">
            <th scope="col">Admin ID</th>
            <th scope="col">NISN</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Month</th>
            <th scope="col">Year</th>
            <th scope="col" style="text-align:center">action</th>
        </tr>
        </thead>
    <tbody style="color:white;">
        <?php
        include "koneksi.php";
        if (isset($_POST["cari"])){
            $cari =  $_POST['cari'];
            $query_bayar = mysqli_query($koneksi,
            "SELECT * FROM pembayaran where bulan_spp = ' $cari ' or nisn like '$cari%' ORDER BY bulan_spp DESC");
        }else {
            //jika tidak ada keyword pencarian 
            $query_bayar = mysqli_query($koneksi,"select * from pembayaran ORDER BY bulan_spp DESC");
        }
        while ($data_bayar=mysqli_fetch_array($query_bayar)) { ?>
        <?php
        $query_siswa = mysqli_query($koneksi, "select * from siswa where nisn = '".$data_bayar['nisn']."'");
        $data_siswa = mysqli_fetch_array($query_siswa);
        ?>
              <tr style="color:black">
              <input type="hidden" value="<?php echo $data_bayar['id_pembayaran']?>">
                  <td><?php echo $data_bayar["id_admin"]; ?></td>
                  <td><?php echo $data_bayar["nisn"]; ?></td>
                  <td><?php echo $data_siswa["nama"]?></td>
                  <td><?php echo $data_bayar["tgl_bayar"]; ?></td>
                  <td><?php echo $data_bayar["bulan_spp"];?></td>
                  <td><?php echo $data_bayar["tahun_spp"];?></td>
                  <td>
                      <a href="hapus_bayar.php?id_pembayaran=<?=$data_bayar['id_pembayaran']?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin menghapus data ini?')">Delete</a>

                  </td> 
              </tr>
            <?php
            }
            ?>
        </tbody>
            <br>
        </table><a href="transaksi.php" class="btn btn-dark">payment</a> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</div>  
    </div>
</body>
</html>