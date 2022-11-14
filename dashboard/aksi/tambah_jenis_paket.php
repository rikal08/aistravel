<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="../sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>
<?php 
include"../koneksi.php";
$jenis=$_POST['jenis'];
$sql=mysqli_query($koneksi,"INSERT INTO tb_jenis_paket VALUES (NULL,'$jenis')");
if ($sql) {
	echo "<script>
				setTimeout(function(){
						Swal.fire({
							icon:'success',
							title:'Data berhasil disimpan!',
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

