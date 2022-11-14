<?php 
include"../koneksi.php";
$paket=$_POST['paket'];
$tanggal=$_POST['tanggal'];
$max=$_POST['max_seat'];
$agenda=$_POST['agenda'];
$sql=mysqli_query($koneksi,"INSERT INTO tb_jadwal VALUES (NULL,'$paket','$tanggal','0','$max','$agenda')");
if ($sql) {
	echo " <script type='text/javascript'>
 			alert('Berhasil ditambahkan');window.location='../jadwal';
 		</script>";
}
 ?>


