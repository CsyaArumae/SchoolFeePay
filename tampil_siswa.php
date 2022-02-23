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
        <div class="card-body">
            <table class="table table-striped table-light">
                <center>
                    <h3>
                        <font color="#af007a">School Student Data</font><br>
                    </h3>
                </center>
                <form action=" tampil_siswa.php" method="POST">
                    <input type="text" name="cari" class="form-control" placeholder="Search Class" />
                </form>
                <br>
                <a href="tambah_siswa.php" class="btn btn-dark">Add Student</a>
                <br></br>
                <thead>
                    <tr>
                        <th scope="col">NISN</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Class</th>
                        <th scope="col">Name</th>
                        <th scope="col">Adress</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    if (isset($_POST["cari"])) {
                        //jika ada keyword pencarian
                        $cari = $_POST['cari'];
                        $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas where siswa.nisn like '%$cari%' or siswa.nama like '%$cari%'");
                    } else {
                        //jika tidak ada keyword pencarian
                        $query_siswa = mysqli_query($koneksi, "select * from siswa join kelas on kelas.id_kelas=siswa.id_kelas");
                    }
                    while ($data_siswa = mysqli_fetch_array($query_siswa)) { ?>
                        <tr>
                            <td><?php echo $data_siswa["nisn"]; ?></td>
                            <td><?php echo $data_siswa["nis"]; ?></td>
                            <td><?php echo $data_siswa["nama_kelas"]; ?></td>
                            <td><?php echo $data_siswa["nama"]; ?></td>
                            <td><?php echo $data_siswa["alamat"]; ?></td>
                            <td><?php echo $data_siswa["no_tlp"]; ?></td>

                            <td><a href="ubah_siswa.php?nisn=<?= $data_siswa['nisn'] ?>" class="btn btn-secondary">Ubah</a>
                                <!-- <a href="hapus_siswa.php?nisn=<?= $data_siswa['nisn'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class=" btn btn-danger">Hapus</a> -->
                                <a href="hapus_siswa.php?nisn=<?= $data_siswa['nisn'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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