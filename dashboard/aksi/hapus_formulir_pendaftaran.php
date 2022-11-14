<?php 
include"koneksi.php";
$id=$_GET['id'];
$sql=mysqli_query($koneksi,"DELETE FROM formulir_pendaftaran where id='$id'");
if ($sql) {
	echo "<script>
				setTimeout(function(){
						Swal.fire({
							icon:'error',
							title:'Data Berhasil dihapus',
							type:'error',
							timer:'3000',
							showConfrimButton:'true'
							});
					},10);
					window.setTimeout(function(){
						window.location.replace('formulir-pendaftaran');
						},3000);
			</script>";
}
 ?>

