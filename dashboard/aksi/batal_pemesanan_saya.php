<?php 
include"../koneksi.php";
$id=$_POST['id_pemesanan'];
$jumlah=$_POST['jumlah'];
$id_jadwal=$_POST['id_jadwal'];
$sql=mysqli_query($koneksi,"UPDATE tb_pemesanan SET status=3 where id_pemesanan=$id");
$sql3=mysqli_query($koneksi,"UPDATE tb_jadwal SET jumlah_seat=jumlah_seat - $jumlah where id=$id_jadwal");
$sql4=mysqli_query($koneksi,"DELETE FROM formulir_pendaftaran WHERE id_pemesanan='$id'");


if ($sql && $sql4) {
	echo " <script type='text/javascript'>
 			alert('Pemesanan telah di Batalkan');window.location='../pemesanan-saya';
 		</script>";
}else{
	echo "gagal";


}
 ?>


