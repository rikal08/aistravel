<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="../dashboard/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="../dashboard/sweetalert2/sweetalert2.min.js"></script>
</head>
<body>
<?php 
include"../koneksi.php";

$nama=htmlspecialchars($_POST['nama']);
$no_hp=htmlspecialchars($_POST['no_hp']);
$email=htmlspecialchars($_POST['email']);
$password=$_POST['password'];

		$sql=mysqli_query($koneksi,"INSERT INTO tb_user VALUES (NULL,'$nama','$email','$no_hp','$password','jamaah') ");
			if ($sql) {
				echo "<script>
				setTimeout(function(){
						Swal.fire({
							icon:'success',
							title:'Pendaftaran telah berhasil',
							type:'success',
							timer:'3000',
							showConfrimButton:'true'
							});
					},10);
					window.setTimeout(function(){
						window.location.replace('../dashboard');
						},3000);
			</script>";
			}else{
				echo "gagal";
			}

 ?>
</body>

</html>