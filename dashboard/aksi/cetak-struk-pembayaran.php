<?php ob_start(); ?>

<?php
include "../koneksi.php"; 
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$id=$_POST['id'];
function rupiah($angka)
    {
    $hasil_rupiah= "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
} 

$html = '<html>';
$html .='<body>';
$html .='<div style="background:url(../../assets/img/bg2.png);background-repeat: no-repeat;width:100%; height:100%;background-size:200px;">';
$html .='<center><img width="250px" src="../../assets/img/logo.png"></center>';
$html .= '<center><h2>AIS TRAVEL</h2>
          <br><h4 style="margin-top:-40px;">Jl. Kh Dewantara no. 194 Tanah Garam <br> Telepon : 0811666581 <br> Email : aistravel@gmail.com</h4><br><h3 style="margin-top:-40px;">Rincian Pembayaran Jamaah Haji & Umrah AIS Travel</h3><p>aistravel0909@gmail.com</p></center><hr/><br/>';
$struk=mysqli_query($koneksi,"SELECT * FROM tb_pembayaran where id_pemesanan=$id");
    foreach ($struk as $dt_struk) {
        $id_user=$dt_struk['id_user'];
        $id_pemesanan=$dt_struk['id_pemesanan'];
        }
$user=mysqli_query($koneksi,"SELECT * FROM tb_user where id=$id_user");
foreach ($user as $dt_user) {
    $nama=$dt_user['nama'];
}
$html .="<h4>Nama Jamaah : ".$nama."</h4>";
$html .="<br>";
$html .="<h4 style='margin-top:-50px;'>ID Pemesanan : ".$id_pemesanan."</h4>";

$html .= '<table border="1"  width="100%" height: "100%" style="border-collapse: collapse; ">
        <tr>
            <th>ID Pemesanan</th>
            <th>Nama Jamaah</th>
            <th>Tanggal Bayar</th>
            <th>Jumlah Bayar</th>
        </tr>';
    $no = 1;
    $struk=mysqli_query($koneksi,"SELECT * FROM tb_pembayaran where id_pemesanan=$id");
    foreach ($struk as $dt_struk) {
        $id_pemesanan=$dt_struk['id_pemesanan'];
        $id_user=$dt_struk['id_user'];
        $tgl=$dt_struk['tgl'];
        $jumlah_bayar=$dt_struk['jumlah_bayar'];

        $html .= "<tr>
            <td>".$id_pemesanan."</td>
            <td>".$nama."</td>
            <td>".$tgl."</td>
            <td>".rupiah($jumlah_bayar)."</td>
            </tr>";

    $no++;
}
$html .='<br>';
$struk=mysqli_query($koneksi,"SELECT sum(jumlah_bayar) as total FROM tb_pembayaran where id_pemesanan=$id");
    foreach ($struk as $dt_struk) {
        $total=$dt_struk['total'];
    }
$pemesanan=mysqli_query($koneksi,"SELECT * FROM tb_pemesanan WHERE id_pemesanan=$id");
foreach ($pemesanan as $dt_pemesanan) {
    $total_harga=$dt_pemesanan['total_harga'];
}

$sisa=$total_harga-$total;
$date=date('d-m-Y');
$html .='<br>';
$html .='<h3 align="right">Ka. AIS Travel</h3>';
$html.='<br>';
$html.='<br>';
$html.='<h3 align="right"> Tanah Garam, '.$date.'</h3>';

$html .='<table>
            <tr>
                <td><b>Total Harga</b></td>
                <td>:</td>
                <td>'.rupiah($total_harga).'</td>
            </tr> 
            <tr>
                <td><b>Jumlah Bayar</b></td>
                <td>:</td>
                <td>'.rupiah($total).'</td>
            </tr> 
            <tr>
                <td><b>Sisa Pembayaran</b></td>
                <td>:</td>
                <td>'.rupiah($sisa).'</td>
            </tr>
        </table>';

$html .='</div>';
$html .='</body>';
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('struk-pembayaran.pdf');
?>