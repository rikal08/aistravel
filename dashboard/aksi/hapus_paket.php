<?php 
include"koneksi.php";
$id=$_GET['hapus'];
$sql=mysqli_query($koneksi,"DELETE FROM tb_paket where id_paket='$id'");
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
						window.location.replace('data-paket');
						},3000);
			</script>";
}
 ?>

