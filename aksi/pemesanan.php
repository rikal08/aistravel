<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="../dashboard/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>
<?php 
include "../koneksi.php";
$id_paket=$_POST['id_paket'];
$id_jadwal=$_POST['jadwal'];
$jumlah_jamaah=$_POST['jumlah'];
$email=$_POST['email'];
$pass=md5($_POST['pass']);
$hrg=$_POST['hrg'];
$total_harga=$jumlah_jamaah * $hrg;

$masuk = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email' AND pass='$pass'");
$cek=mysqli_fetch_array($masuk);
if (empty($cek)) {

	echo "
		<script type='text/javascript'>
 		alert('Akun anda belum terdaftar, silahkan daftar dahulu!');window.location='../detail-paket&ac250e1459f7c6ea92b739e6e77f4f5e=$id_paket';
 		</script>";
}else{
	$pemesanan=mysqli_query($koneksi,"INSERT INTO tb_pemesanan VALUES (' ','$cek[id]','$id_paket','$id_jadwal','$jumlah_jamaah','$total_harga','1')");

	echo "
 <script type='text/javascript'>
 	alert('Pemesanan anda telah diterima, silahkan login untuk melanjutkan pendaftaran!');window.location='../detail-paket&ac250e1459f7c6ea92b739e6e77f4f5e=$id_paket';
 </script>";
}

 ?>
 </body>
<script src="../dashboard/sweetalert2/sweetalert2.min.js"></script>
</html>

