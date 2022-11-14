<?php 
include"../koneksi.php";
$id=$_POST['id_pemesanan'];
$jumlah=$_POST['jumlah'];
$id_jadwal=$_POST['id_jadwal'];
$sql=mysqli_query($koneksi,"UPDATE tb_pemesanan SET status=2 where id_pemesanan=$id");
$sql3=mysqli_query($koneksi,"UPDATE tb_jadwal SET jumlah_seat=jumlah_seat + $jumlah where id=$id_jadwal");



for ($i=1; $i <= $jumlah; $i++) {
	$waktu=date('Y-m-d');
	$tahun=date('Y');
	$bulan=date('m');
	$hari=date('d');
	$jam=date('h');
	$menit=date('i');
	$detik=date('i');
	$gabung=$tahun.$bulan.$hari.$jam.$menit.$detik.$i.$id;
	$sql4=mysqli_query($koneksi,"INSERT INTO formulir_pendaftaran VALUES ('$gabung','$id','kosong','kosong','kosong','kosong','kosong','kosong','$waktu','kosong','kosong','kosong','kosong','kosong','kosong')");

}


if ($sql && $sql4) {
	echo " <script type='text/javascript'>
 			alert('Pemesanan telah disetujui');window.location='../pemesanan';
 		</script>";
}else{
	echo "gagal";


}
 ?>


