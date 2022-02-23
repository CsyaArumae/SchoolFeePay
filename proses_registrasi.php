<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php
	if($_POST){
		$nama_admin=$_POST['nama_admin'];
        $username=$_POST['username'];
		$password=$_POST['password'];
		
		if(empty($nama_admin)){
			echo "<script>alert('nama tidak boleh kosong');location.href='registrasi.php';</script>";
        } elseif(empty($username)){
			echo "<script>alert('username tidak boleh kosong');location.href='registrasi.php';</script>";
		} elseif(empty($password)){ 	
			echo "<script>alert('password tidak boleh kosong');location.href='registrasi.php';</script>";
		} else {
			include "koneksi.php";
			$insert=mysqli_query($koneksi,"insert into admin (nama_admin, username, password) value ('".$nama_admin."','".$username."','".md5($password)."')");
            
			if($insert){
				echo "<script>alert('Sukses menambahkan admin');location.href='login_admin.php';</script>";
			} else {
				echo "<script>alert('Gagal menambahkan admin');location.href='registrasi.php';</script>";
			}
		}
	}
?>