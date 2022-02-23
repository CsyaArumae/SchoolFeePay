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
    $qry_get_admin=mysqli_query($koneksi,"SELECT * FROM admin where 
    id_admin = '".$_GET['id_admin']."'");
    $data_admin=mysqli_fetch_array($qry_get_admin);
    ?>
    <div class="container">
        <div class="card" style="margin: 20px;">
            <div class="card-header">
              C</h1>
            </div>
            <div class="card-body">
                <form action="proses_ubah_profil.php" method="POST">
                    <input type="hidden" name="id_admin" value="<?= $data_admin['id_admin'] ?>">
                    <div class="mb-2">
                        <label class="form-label">Admin : </label>
                        <input type="text" name="nama_admin" value="<?=$data_admin['nama_admin'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">username : </label>
                        <input type="text" name="username" value="<?=$data_admin['username'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">password : </label>
                        <input type="text" name="password" value="" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Level : </label>
                        <input type="text" name="level" value="<?=$data_admin['level'] ?>" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <input type="submit" name="simpan" value="Ubah admin" class="btn btn-outline-danger">
                    </div>
                </form>
            </div>
        </div>
    </main>
   
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>