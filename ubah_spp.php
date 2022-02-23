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
   $qry_get_spp=mysqli_query($koneksi,"SELECT * FROM spp where 
   id_spp = '".$_GET['id_spp']."'");
   $data_spp=mysqli_fetch_array($qry_get_spp);
   ?>
   <div class="container">
       <div class="card" style="margin: 20px;">
           <div class="card-header">
             Change </h1>
           </div>
           <div class="card-body">
               <form action="proses_ubah_spp.php" method="POST">
               <input type="hidden" name="id_spp" value=  "<?=$data_spp['id_spp']?>">
   
             Kelas :
          <select name="id_kelas" class="form-control">
           <option></option>
           <?php 
           include "koneksi.php";
           $qry_kelas=mysqli_query($koneksi,"select * from kelas");
           while($data_kelas=mysqli_fetch_array($qry_kelas)){
               if($data_kelas['id_kelas']==$data_spp['id_kelas']){
                   $selek="selected";
               } else {
                   $selek="";
               }
           echo '<option value="'.$data_kelas['id_kelas'].'" '.$selek.'>'.$data_kelas['nama_kelas'].'</option>';   
           }
           ?>
             </select>
            Angkatan : 
            <input type="text" name="angkatan" value=   "<?=$data_spp['angkatan']?>" class="form-control">
            Tahun :
            <input type="text" name="tahun" value=   "<?=$data_spp['tahun']?>" class="form-control">
            Nominal :
            <input type="text" name="nominal" value=   "<?=$data_spp['nominal']?>" class="form-control">
                 <br><br>
                   <div class="mb-2">
                       <input type="submit" name="simpan" value="Ubah Kelas" class="btn btn-outline-danger">
                   </div>
               </form>
           </div>
       </div>
    </main>

        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>