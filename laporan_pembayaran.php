<?php
  session_start();
  if ($_SESSION['status_login'] != true) {
    header('location:login_petugas.php');
  }
?>
<?php 
session_start();
if(isset($_SESSION['status_login']) ) {
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3>SCHOOL<b><br/>SchoolFee Report</b></h3>
	<br/>
	<hr/>
	Tanggal <?= $_GET['tgl1']." -- ".$_GET['tgl2'];  ?>
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>No</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>Name</th>
		<th>Class</th>
		<th>Month</th>
        <th>Year</th>
		
	</tr>
	<?php 
	$pembayaran = $koneksi -> query("SELECT siswa.nisn,siswa.nis,siswa.nama, kelas.nama_kelas , pembayaran.bulan_spp,pembayaran.tahun_spp
							FROM pembayaran INNER JOIN siswa ON siswa.nisn=pembayaran.nisn
                            JOIN kelas ON kelas.id_kelas = siswa.id_kelas 
							WHERE tgl_bayar BETWEEN '$_GET[tgl1]' AND '$_GET[tgl2]'
							");
                            
	$i=1;
	$total = 0;
	while($dta=mysqli_fetch_array($pembayaran)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['nisn'] ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
		<td align=""><?= $dta['nama'] ?></td>
		<td align=""><?= $dta['nama_kelas'] ?></td>
		<td align=""><?= $dta['bulan_spp'] ?></td>
        <td align=""><?= $dta['tahun_spp'] ?></td>
		
	</tr>
	<?php $i++; ?>
	

<?php endwhile; ?>

	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Malang , <?= date('d/m/y') ?> <br/>
				Admin,
			<br/>
			<br/>
			<br/>
		<p>____</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>


<?php 
} else {
	header("location : login.php");
}
?>