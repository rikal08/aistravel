<?php 
include"koneksi.php";
$id=$_GET['id'];
$sql=mysqli_query($koneksi,"DELETE FROM tb_user where id='$id'");
if ($sql) {
	echo " <script type='text/javascript'>
 			alert('Berhasil dihapus');window.location='data-user';
 		</script>";
}
 ?>

