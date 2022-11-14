<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>


<?php 
include"../koneksi.php";
$id=$_POST['id_paket'];
$nm_paket=$_POST['nm_paket'];
$harga_quad=$_POST['harga_quad'];
$harga_triple=$_POST['harga_triple'];
$harga_double=$_POST['harga_double'];
$durasi=$_POST['durasi'];
$keterangan=$_POST['keterangan'];


$sql=mysqli_query($koneksi,"UPDATE tb_paket SET nm_paket='$nm_paket',harga_quad='$harga_quad',harga_triple='$harga_triple',harga_double='$harga_double',durasi='$durasi',keterangan='$keterangan' WHERE id_paket='$id'");
if ($sql) {
	echo "<script>
				setTimeout(function(){
						Swal.fire({
							icon:'success',
							title:'Berhasil di edit',
							type:'success',
							timer:'3000',
							showConfrimButton:'true'
							});
					},10);
					window.setTimeout(function(){
						window.location.replace('../data-paket');
						},3000);
			</script>";

}
 ?>
</body>
 <script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

