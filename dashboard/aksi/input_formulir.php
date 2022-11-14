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
$id_pendaftaran=$_POST['id_pendaftaran'];
$no_ktp=$_POST['no_ktp'];
$nm=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$pekerjaan=$_POST['pekerjaan'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$agama=$_POST['agama'];
$tgl_lahir=$_POST['tgl_lahir'];
$alamat_lengkap=$_POST['alamat_lengkap'];
$nm_ibu=$_POST['nm_ibu'];
$kewarga=$_POST['kewarga'];
$no_hp=$_POST['no_hp'];
$email=$_POST['email'];




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
		move_uploaded_file($file_tmp, '../foto-jamaah/'.$nama);
		$sql4=mysqli_query($koneksi,"UPDATE formulir_pendaftaran SET no_ktp='$no_ktp',nama='$nm',tempat_lahir='$tempat_lahir',pekerjaan='$pekerjaan',jenis_kelamin='$jenis_kelamin',agama='$agama',tgl_lahir='$tgl_lahir',alamat_lengkap='$alamat_lengkap',nm_ibu='$nm_ibu',kewarga='$kewarga',no_hp='$no_hp',email='$email',foto='$nama' WHERE id='$id_pendaftaran'");

	if ($sql4) {
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
						window.location.replace('../isi-formulir-jamaah&id=$id_pendaftaran');
						},3000);
			</script>";
	}else{
		echo "gagal";
	}

}else{
	echo "<script>
				alert('Ukuran Terlalu Besar);location='../isi-formulir-jamaah&id=$id_pendaftaran';
			</script>";
}
}else{
	echo "<script>
				alert('Ekstensi Tidak Sesuai');location='../isi-formulir-jamaah&id=$id_pendaftaran';
			</script>";

}
 ?>
</body>
<script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

