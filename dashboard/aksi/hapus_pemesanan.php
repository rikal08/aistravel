<?php 
include"../koneksi.php";
$id=$_GET['id'];

		$sql=mysqli_query($koneksi,"DELETE FROM tb_pemesanan where id_pemesanan=$id");
			if ($sql) {
				echo "<script>
					alert('Pemesanan dibatalkan');window.location='pemesanan';
					</script>";
			}else{
				echo "gagal";
			}

 ?>