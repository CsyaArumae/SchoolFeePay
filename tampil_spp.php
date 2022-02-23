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
    <div class= "card-body" >
        <table class="table table-striped table-light">
        <center><h3><font color="#af007a">School Fees</font><br></h3></center>
        <form action = " tampil_spp.php" method = "POST">
            <input type="email" name="cari" class="form-control"
            placeholder = "Search"/>
        </form>
        <br>
        <a href="tambah_spp.php" class="btn btn-dark">Add SPP</a>
        <br></br>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Class</th>
      <th scope="col">Angkatan</th>
      <th scope="col">Year</th>
      <th scope="col">Nominal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";
    if (isset($_POST["cari"])){
        //jika ada keyword pencarian
        $cari = $_POST['cari'];
        $query_spp = mysqli_query($koneksi, "select * from spp join kelas on kelas.id_kelas=spp.id_kelas where spp.id_spp like '%$cari%' '");
    } else {
        //jika tidak ada keyword pencarian
        $query_spp = mysqli_query($koneksi, "select * from spp join kelas on kelas.id_kelas=spp.id_kelas");
    }
    while ($data_spp = mysqli_fetch_array($query_spp)){?>
        <tr> 
            
            <td><?php echo $data_spp["id_spp"];?></td>
            <td><?php echo $data_spp["nama_kelas"];?></td>
            <td><?php echo $data_spp["angkatan"];?></td>
            <td><?php echo $data_spp["tahun"];?></td>
            <td><?php echo $data_spp["nominal"];?></td>

            <td><a
            href="ubah_spp.php?id_spp=<?=$data_spp['id_spp']?>"
            class="btn btn-secondary">Ubah</a>
            <a
            href="hapus_spp.php?id_spp=<?=$data_spp['id_spp']?>"
            onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
            class=" btn btn-danger">Hapus</a>
            </td>
        </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    </div>
    </main>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>