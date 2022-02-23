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
    <?php
    $query_profil = mysqli_query($koneksi, "SELECT * FROM admin 
        where id_admin = '".$_SESSION['id_admin']."'");
        $data_admin=mysqli_fetch_array($query_profil);
        ?>
    
        <main class="container"> 
            <br><br><br>
            <center><h1><font color="#af007a">Profile Admin</font><br></h1></center>
            <hr>
        <section class="container">
            <div class="col">
                <form action=""><input type="hidden" name="id_admin" value="<?=$data_admin['id_admin']?>"></form>
                <table class="table table-hover table-striped mb-4">
                    <thead style="text-align: left;">
                    <tr>
                        <td>Admin Name</td>
                        <td>:</td>
                        <td><?=$data_admin["nama_admin"]?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?=$data_admin["username"]?></td>
                    </tr>
                    
                    <tr>
                        <td>level</td>
                        <td>:</td>
                        <td><?=$data_admin["level"]?></td>
                    </tr>
                    </thead>
                </table>
            </div>

        <a href="home.php" class="btn btn-dark">Back Home</a>
        <!-- <a href="registrasi.php" class="btn btn-success">Registrasi</a> -->
        <div style="float: right;">
            <a href="ubah_profil.php?id_admin=<?=$data_admin['id_admin']?>"
            class="btn btn-light">Change Account</a> | <a
            href="hapus_admin.php?id_admin=<?=$data_admin['id_admin']?>"
            onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
            class="btn btn-danger">Delete Account</a> 
        </div>
        </section>
    </main>
        
                
        </main>   

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>