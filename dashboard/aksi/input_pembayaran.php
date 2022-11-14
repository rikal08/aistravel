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


$nomor=$_POST['nomor'];
$user=$_POST['user'];
$tgl=$_POST['tgl'];
$jumlah=$_POST['jumlah'];
$ket = $_POST['ket'];
$ekstensi_diperbolehkan = array('png','jpg','jpeg');
$nama=$_FILES['file']['name'];
$x=explode('.', $nama);
$ekstensi=strtolower(end($x));
$ukuran=$_FILES['file']['size'];
$file_tmp=$_FILES['file']['tmp_name'];

// end
	move_uploaded_file($file_tmp, '../bukti-pembayaran/'.$nama);

$sql2=mysqli_query($koneksi,"SELECT * FROM tb_pemesanan where id_pemesanan=$nomor AND id_user=$user");
$cek=mysqli_fetch_array($sql2);
$sql=mysqli_query($koneksi,"INSERT INTO tb_pembayaran VALUES (NULL,'$nomor','$user','$tgl','$jumlah','$nama','$ket')");
if ($sql) {
	
	echo "<script>
				setTimeout(function(){
						Swal.fire({
							icon:'success',
							title:'Pembayaran berhasil ditambahkan!',
							type:'success',
							timer:'3000',
							showConfrimButton:'true'
							});
					},10);
					window.setTimeout(function(){
						window.location.replace('../pembayaran');
						},3000);
			</script>";
}
 ?>
</body>
<script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

