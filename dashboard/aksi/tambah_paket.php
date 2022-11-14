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
$jenis=$_POST['jenis_paket'];
$nm_paket=$_POST['nm_paket'];
$harga_quad=$_POST['harga_quad'];
$harga_triple=$_POST['harga_triple'];
$harga_double=$_POST['harga_double'];
$durasi=$_POST['durasi'];
$keterangan=$_POST['keterangan'];

// upload image
$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$nama=$_FILES['file']['name'];
$x=explode('.', $nama);
$ekstensi=strtolower(end($x));
$ukuran=$_FILES['file']['size'];
$file_tmp=$_FILES['file']['tmp_name'];

// end
if (in_array($ekstensi, $ekstensi_diperbolehkan)=== true) {
	if ($ukuran < 1044070) {
		move_uploaded_file($file_tmp, '../gambar-paket/'.$nama);
	$q=mysqli_query($koneksi,"INSERT INTO tb_paket values (NULL,'$jenis','$nm_paket','$harga_quad','$harga_triple','$harga_double','$durasi','$nama','$keterangan')");
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
						window.location.replace('../data-paket');
						},3000);
			</script>";
	}else{
		echo "gagal";
	}

}else{
	echo "<script>
				alert('Ukuran Terlalu Besar);location='../data-paket';
			</script>";
}
}else{
	echo "<script>
				alert('Ekstensi Tidak Sesuai');location='../data-paket';
			</script>";

}
 ?>
</body>
<script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

