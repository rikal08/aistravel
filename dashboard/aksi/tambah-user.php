<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="../sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>
<?php 
include"../koneksi.php";

$nama=htmlspecialchars($_POST['nama']);
$no_hp=htmlspecialchars($_POST['nomor_wa']);
$email=htmlspecialchars($_POST['email']);
$level=htmlspecialchars($_POST['level']);
$password=$_POST['pass'];

		$sql=mysqli_query($koneksi,"INSERT INTO tb_user VALUES (NULL,'$nama','$email','$no_hp','$password','$level') ");

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
						window.location.replace('../data-user');
						},3000);
			</script>";
		}
 ?>

</body>
<script src="../sweetalert2/sweetalert2.min.js"></script>
</html>