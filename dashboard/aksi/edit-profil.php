<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>


<?php 
include"../koneksi.php";
$id=$_POST['id'];
$email=$_POST['email'];
$telepon=$_POST['telepon'];
$wa=$_POST['wa'];
$ig=$_POST['ig'];
$alamat=$_POST['alamat'];
$about=$_POST['about'];


$sql=mysqli_query($koneksi,"UPDATE tb_profil SET email='$email',telepon='$telepon',wa='$wa',ig='$ig',alamat='$alamat',about='$about' WHERE id='$id'");
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
						window.location.replace('../profil-ais-travel');
						},3000);
			</script>";

}
 ?>
</body>
 <script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

