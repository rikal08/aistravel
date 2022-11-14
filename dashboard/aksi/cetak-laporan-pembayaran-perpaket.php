<?php ob_start(); ?>

<?php
include "../koneksi.php"; 
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$id_jadwal=$_POST['id_jadwal'];


function rupiah($angka)
    {
    $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
} 
 $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal where id='$id_jadwal'");
        foreach ($jadwal as $dt_jadwal) {
            
        } 
 $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket='$dt_jadwal[id_paket]'");
        foreach ($paket as $dt_paket) {
            $nama_paket=$dt_paket['nm_paket'];
        }
$html = '<html>';
$html .='<body>';
$html .='<div style="background:url(../../assets/img/bg.png);background-repeat: no-repeat;width:100%; height:100%;background-size:200px;">';

$html .='<center><img width="250px" src="../../assets/img/logo.png"></center>';
$html .= '<center><h2>AIS TRAVEL</h2>
          <br><h4 style="margin-top:-40px;">Jl. Kh Dewantara no. 194 Tanah Garam <br> Telepon : 0811666581 <br> Email : aistravel@gmail.com</h4><br><h3 style="margin-top:-40px;">Laporan Pembayaran Jamaah Haji dan Umrah AIS TRAVEL Untuk Keberangkatan <br>'.$nama_paket.' Tanggal '.$dt_jadwal['tgl_berangkat'].'</h3></center><hr/><br/>';
$html .= '<table border="1"  width="100%" height: "100%" style="border-collapse: collapse; ">
        <tr>
            <th>#</th>
            <th>No Pemesanan</th>
            <th>Nama Pemesan</th>
            <th>Jumlah Jamaah</th>
            <th>Total Tagihan</th>
            <th>Cicilan</th>
            <th>Total Pembayaran</th>
            <th>Sisa</th>

        </tr>';
    $no = 1;
  

      $biaya=mysqli_query($koneksi,"SELECT * FROM tb_pemesanan WHERE id_jadwal='$dt_jadwal[id]'");
        foreach ($biaya as $dt_biaya) {
          $tagihan=$dt_biaya['total_harga'];
        
      
      $user=mysqli_query($koneksi,"SELECT * FROM tb_user where id='$dt_biaya[id_user]'");
        foreach ($user as $dt_user) {
            $nama_user=$dt_user['nama'];
        }
      $pembayaran=mysqli_query($koneksi,"SELECT sum(jumlah_bayar) as jumlah,jumlah_bayar FROM tb_pembayaran WHERE id_pemesanan='$dt_biaya[id_pemesanan]'");
      foreach ($pembayaran as $dt_pembayaran) {
        $bayar=$dt_pembayaran['jumlah'];
        $sisa=$tagihan-$bayar;
        $jum = $dt_pembayaran['jumlah_bayar'];
    }
        
       
      

    $html .= "<tr>
            <td>".$no."</td>
            <td>".$dt_biaya['id_pemesanan']."</td>
            <td>".$nama_user."</td>
            <td>".$dt_biaya['jmlh_jamaah']."</td>
            <td>".rupiah($dt_biaya['total_harga'])."</td>
            <td>";
    $pem = mysqli_query($koneksi,"SELECT * FROM tb_pembayaran WHERE id_pemesanan='$dt_biaya[id_pemesanan]'");
        foreach ($pem as $key) {
            $html .="<p> Cicilan ke ".$key['ket']."</p><p>".rupiah($key['jumlah_bayar'])."</p>";
    }

    $html .="</td>
            <td>".rupiah($dt_pembayaran['jumlah'])."</td>
            <td>".rupiah($sisa)."</td>

           
        
       
     
            </tr>";

    $no++;

}


$date=date('d-m-Y');
$html .='<br>';
$html .='<h3 align="right">Ka. AIS Travel</h3>';
$html.='<br>';
$html.='<br>';
$html.='<h3 align="right"> Tanah Garam, '.$date.'</h3>';
$html .='</div>';
$html .='</body>';
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('rincian-pembayaran.pdf');
?>