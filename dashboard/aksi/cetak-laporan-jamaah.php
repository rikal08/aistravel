<?php ob_start(); ?>

<?php
include "../koneksi.php"; 
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$id=$_POST['paket'];

$query2 = mysqli_query($koneksi,"SELECT * FROM tb_pemesanan WHERE id_paket='$id'");
foreach ($query2 as $data2) {
    
}
$query3 = mysqli_query($koneksi,"SELECT * FROM tb_paket WHERE id_paket='$data2[id_paket]'");
foreach ($query3 as $data3) {
    
}
$query4 = mysqli_query($koneksi,"SELECT * FROM tb_jadwal WHERE id_paket='$data2[id_paket]'");
foreach ($query4 as $data4) {
    
}
$html = '<html>';
$html .='<body>';
$html .='<div style="background:url(../../assets/img/bg.png);background-repeat: no-repeat;width:100%; height:100%;background-size:200px;">';
$html .='<center><img width="250px" src="../../assets/img/logo.png"></center>';
$html .= '<center><h2>AIS TRAVEL</h2>
          <br><h4 style="margin-top:-40px;">Jl. Kh Dewantara no. 194 Tanah Garam <br> Telepon : 0811666581 <br> Email : aistravel@gmail.com</h4><br><h3 style="margin-top:-40px;">Laporan Jamaah Haji dan Umrah AIS TRAVEL</h3></center><hr/><br/>';
$html .='<h4>Nama Paket : '.$data3['nm_paket'].'<br> Tanggal Berangkat : '.$data4['tgl_berangkat'].'';
$html .= '<table border="1"  width="100%" height: "100%" style="border-collapse: collapse; ">
        <tr>
            <th>#</th>
            <th>ID Pendaftaran</th>
            <th>No Identitas</th>
            <th>Nama Lengkap</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Nomor Hp</th>
            <th>Email</th>
            
        </tr>';
    $no = 1;
$query = mysqli_query($koneksi,"SELECT * FROM tb_pemesanan WHERE id_paket='$id'");
foreach ($query as $datapaket) {
    $id_pemesanan = $datapaket['id_pemesanan'];
$cetak=mysqli_query($koneksi,"SELECT * FROM formulir_pendaftaran where id_pemesanan ='$id_pemesanan'");
    foreach ($cetak as $data) {
    $html .= "<tr>
            <td>".$no."</td>
            <td>".$data['id']."</td>
            <td>".$data['no_ktp']."</td>
            <td>".$data['nama']."</td>
            <td>".$data['tgl_lahir']."</td>
            <td>".$data['alamat_lengkap']."</td>
            <td>".$data['no_hp']."</td>
            <td>".$data['email']."</td>
            
        
       
     
            </tr>";

    $no++;
}
}

$date=date('d-m-Y');
$html .='<br>';
$html .='<h3 align="right">Ka. AIS Travel</h3>';
$html.='<br>';
$html.='<br>';
$html.='<h3 align="right"> Tanah Garam, '.$date.'</h3>';
$html .='</div>';
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-jamaah.pdf');
?>