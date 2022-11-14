<?php 
include"koneksi.php";
$jenis=$_GET['hapus'];
$sql=mysqli_query($koneksi,"DELETE FROM tb_jenis_paket where id='$jenis'");
if ($sql) {
	echo " <script type='text/javascript'>
 			alert('Berhasil dihapus');window.location='data-paket';
 		</script>";
}
 ?>

