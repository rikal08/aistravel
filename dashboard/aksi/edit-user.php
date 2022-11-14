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
$nama=$_POST['nama'];
$telepon=$_POST['telepon'];
$pass=$_POST['pass'];
$level=$_POST['level'];


$sql=mysqli_query($koneksi,"UPDATE tb_user SET nama='$nama',nomor_wa='$telepon',pass='$pass' WHERE id='$id'");
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
						window.location.replace('../$level');
						},3000);
			</script>";

}
 ?>
</body>
 <script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

