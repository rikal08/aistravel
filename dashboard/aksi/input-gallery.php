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

// upload image
$id=$_POST['id'];
$jumlah=count($_FILES['file']['name']);
for ($i=0; $i < $jumlah; $i++) { 
	# code...

$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$nama=$_FILES['file']['name'][$i];
$x=explode('.', $nama);
$ekstensi=strtolower(end($x));
$ukuran=$_FILES['file']['size'];
$file_tmp=$_FILES['file']['tmp_name'][$i];

// end
	move_uploaded_file($file_tmp, '../gambar-gallery/'.$nama);
	$q=mysqli_query($koneksi,"INSERT INTO tb_gallery values (NULL,'$id','$nama')");
}
	if ($q) {
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
						window.location.replace('../gallery');
						},3000);
			</script>";
	}else{
		echo "gagal";
	}
 ?>
</body>
<script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

