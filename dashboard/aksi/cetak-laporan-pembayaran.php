<?php ob_start(); ?>

<?php
include "../koneksi.php"; 
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$tahun=$_POST['tahun'];
$bulan=$_POST['bulan'];
     if ($bulan=='01') {
       $nm='Januari';
   }elseif ($bulan=='02') {
       $nm='Februari';
   }elseif ($bulan=='03') {
       $nm='Maret';
   }elseif ($bulan=='04') {
       $nm='April';
   }elseif ($bulan=='05') {
       $nm='Mei';
   }elseif ($bulan=='06') {
       $nm='Juni';
   }elseif ($bulan=='07') {
       $nm='Juli';
   }elseif ($bulan=='08') {
       $nm='Agustus';
   }elseif ($bulan=='09') {
       $nm='September';
   }elseif ($bulan=='10') {
       $nm='Oktober';
   }elseif ($bulan=='11') {
       $nm='November';
   }elseif ($bulan=='12') {
       $nm='Desember';
   }
function rupiah($angka)
    {
    $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
} 

$html = '<html>';
$html .='<body>';
$html .='<div style="background:url(../../assets/img/bg.png);background-repeat: no-repeat;width:100%; height:100%;background-size:200px;">';
$html .='<center><img width="250px" src="../../assets/img/logo.png"></center>';
$html .= '<center><h2>AIS TRAVEL</h2>
          <br><h4 style="margin-top:-40px;">Jl. Kh Dewantara no. 194 Tanah Garam <br> Telepon : 0811666581 <br>Email : aistravel@gmail.com</h4><br><h3 style="margin-top:-40px;">Laporan Pembayaran Jamaah Haji dan Umrah AIS TRAVEL <br>Bulan '.$nm.' Tahun '.$tahun.'</h3></center><hr/><br/>';
$html .= '<table border="1"  width="100%" height: "100%" style="border-collapse: collapse; ">
        <tr>
            <th>#</th>
            <th>No Pemesanan</th>
            <th>Nama Pemesan</th>
            <th>Nama paket</th>
            <th>Tanggal Berangkat</th>
            <th>Jumlah Jamaah</th>
            <th>Total Tagihan</th>
            <th>Cicilan </th>
            <th>Total Pembayaran</th>
        </tr>';
    $no = 1;
    $pemesanan=mysqli_query($koneksi,"SELECT tb_pemesanan.id_jadwal,tb_pembayaran.id_pemesanan,sum(tb_pembayaran.jumlah_bayar) as jumlah,tb_pemesanan.id_paket,tb_pemesanan.id_user,tb_pemesanan.jmlh_jamaah,tb_pemesanan.total_harga FROM tb_pembayaran join tb_pemesanan where YEAR(tb_pembayaran.tgl)='$tahun' AND MONTH(tb_pembayaran.tgl)='$bulan' GROUP BY tb_pembayaran.id_pemesanan");
    foreach ($pemesanan as $dt_pemesanan) {
        $id=$dt_pemesanan['id_pemesanan'];
        $jumlah=$dt_pemesanan['jumlah'];
        $id_paket=$dt_pemesanan['id_paket'];
        $id_user=$dt_pemesanan['id_user'];
        $jumlah_jamaah=$dt_pemesanan['jmlh_jamaah'];
        $total_harga=$dt_pemesanan['total_harga'];

        $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket=$id_paket");
        foreach ($paket as $dt_paket) {
            $nama_paket=$dt_paket['nm_paket'];
        }
        $user=mysqli_query($koneksi,"SELECT * FROM tb_user where id=$id_user");
        foreach ($user as $dt_user) {
            $nama_user=$dt_user['nama'];
        }
        $jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal where id='$dt_pemesanan[id_jadwal]'");
        foreach ($jadwal as $dt_jadwal) {
            
        }

         $pembayaran=mysqli_query($koneksi,"SELECT sum(jumlah_bayar) as jumlah FROM tb_pembayaran WHERE id_pemesanan='$id'");
      foreach ($pembayaran as $dt_pembayaran) {
        $bayar=$dt_pembayaran['jumlah'];
        $sisa=$total_harga-$bayar;
        
    }
       
   
    $html .= "<tr>
            <td>".$no."</td>
            <td>".$id."</td>
            <td>".$nama_user."</td>
            <td>".$nama_paket."</td>
            <td>".$dt_jadwal['tgl_berangkat']."</td>
            <td>".$jumlah_jamaah." Orang</td>
            <td>".rupiah($total_harga)."</td><td>";

            $pem = mysqli_query($koneksi,"SELECT * FROM tb_pembayaran WHERE id_pemesanan='$id'");
        foreach ($pem as $key) {
            $html .="<p> Cicilan ke ".$key['ket']."</p><p>".rupiah($key['jumlah_bayar'])."</p>";
    }

            $html .="</td><td>".rupiah($bayar)."</td>
        
       
     
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
$dompdf->stream('laporan-pembayaran.pdf');
?>