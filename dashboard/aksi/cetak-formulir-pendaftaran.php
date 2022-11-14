<?php ob_start(); ?>

<?php
include "../koneksi.php"; 
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$id=$_POST['id'];

$sql=mysqli_query($koneksi,"SELECT * FROM formulir_pendaftaran WHERE id='$id'");
foreach ($sql as $data_sql) {
    $id_pendaftaran=$data_sql['id'];
    $id_pemesanan=$data_sql['id_pemesanan'];
    $nama=$data_sql['nama'];
    $foto=$data_sql['foto'];
    $no_ktp=$data_sql['no_ktp'];
    $alamat=$data_sql['alamat_lengkap'];
    $tempat_lahir=$data_sql['tempat_lahir'];
    $tgl_lahir=$data_sql['tgl_lahir'];
    $jekel=$data_sql['jenis_kelamin'];
    $pekerjaan=$data_sql['pekerjaan'];
    $agama=$data_sql['agama'];
    $nm_ibu=$data_sql['nm_ibu'];
    $kewarga=$data_sql['kewarga'];
    $no_hp=$data_sql['no_hp'];
    $email=$data_sql['email'];
}
$pemesanan=mysqli_query($koneksi,"SELECT * FROM tb_pemesanan WHERE id_pemesanan=$id_pemesanan");
foreach ($pemesanan as $dt_pemesanan) {
    $id_jadwal=$dt_pemesanan['id_jadwal'];
    $id_paket=$dt_pemesanan['id_paket'];

}
$jadwal=mysqli_query($koneksi,"SELECT * FROM tb_jadwal WHERE id=$id_jadwal");
foreach ($jadwal as $dt_jadwal) {
    $tgl=$dt_jadwal['tgl_berangkat'];
    $id_paket=$dt_jadwal['id_paket'];
}
$paket=mysqli_query($koneksi,"SELECT * FROM tb_paket WHERE id_paket=$id_paket");
foreach ($paket as $dt_paket) {
    $nama_paket=$dt_paket['nm_paket'];
}
$html = '<html>';
$html .='<body>';
$html .='<div style="background:url(../../assets/img/bg3.png);background-repeat: no-repeat;width:100%; height:100%;background-size:200px;">';
$html .='<center><img width="250px" src="../../assets/img/logo.png"></center>';
$html .= '<center><h2>AIS TRAVEL</h2>
          <br><h4 style="margin-top:-40px;">Jl. Kh Dewantara no. 194 Tanah Garam <br> Telepon : 0811666581 <br> Email : aistravel@gmail.com</h4><br><h3 style="margin-top:-40px;">Formulir Pendaftaran Jamaah <br>Haji & Umrah AIS Travel</h3></center><hr/><br/>';

$html .='<div  style="display:flex;">
        <img align="right" width="140px" height="150px" src="../foto-jamaah/'.$foto.'">
        <table>
            <tr>
                <td width="150px">ID Pendaftaran</td>
                <td>:</td>
                <td width="350px">'.$id_pendaftaran.'</td>
            </tr> 
            <tr>
                <td width="150px">Nama</td>
                <td>:</td>
                <td width="350px">'.$nama.'</td>
            </tr> 
            <tr>
                <td width="150px">No KTP</td>
                <td>:</td>
                <td width="350px">'.$no_ktp.'</td>
            </tr>
            <tr>
                <td width="150px">Alamat</td>
                <td>:</td>
                <td width="350px">'.$alamat.'</td>
            </tr>
             <tr>
                <td width="150px">Tempat Lahir</td>
                <td>:</td>
                <td width="350px">'.$tempat_lahir.'</td>
            </tr>
             <tr>
                <td width="150px">Tanggal Lahir</td>
                <td>:</td>
                <td width="350px">'.$tgl_lahir.'</td>
            </tr>
             <tr>
                <td width="150px">Agama</td>
                <td>:</td>
                <td width="350px">'.$agama.'</td>
            </tr>
             <tr>
                <td width="150px">Nama Ibu</td>
                <td>:</td>
                <td width="350px">'.$nm_ibu.'</td>
            </tr>
             <tr>
                <td width="150px">Kewarganegaraan</td>
                <td>:</td>
                <td width="350px">'.$kewarga.'</td>
            </tr>
            <tr>
                <td width="150px">Pekerjaan</td>
                <td>:</td>
                <td width="350px">'.$pekerjaan.'</td>
            </tr>
            <tr>
                <td width="150px">Jenis Kelamin</td>
                <td>:</td>
                <td width="350px">'.$jekel.'</td>
            </tr>
            <tr>
                <td width="150px">Email</td>
                <td>:</td>
                <td width="350px">'.$email.'</td>
            </tr>
            <tr>
                <td width="150px">Nomor HP</td>
                <td>:</td>
                <td width="350px">'.$no_hp.'</td>
            </tr>
             <tr>
                <td width="150px">Tanggal Berangkat</td>
                <td>:</td>
                <td width="350px">'.$tgl.'</td>
            </tr>
             <tr>
                <td width="150px">Paket Pilihan</td>
                <td>:</td>
                <td width="350px">'.$nama_paket.'</td>
            </tr>
        </table>

        </div><br><br><br>
        <b>Persyaratan Umum Haji & Umrah</b>
        <p> 1.Pas Foto 4x6 = 6 Lembar<br>
            2.Paspor Asli dengan nama tiga kata <br>
            3.Buku kuning (buku suntik meningitis)<br>
            4.Foto Copy KTP <br>
            5.Buku Nikah Asli bagi yang berangkat suami istri <br>
            6.Akte Kelahiran bagi yang berangkat anak <br>
            7.Melunasi pembayaran 40 Hari sebelum keberangkatan
        </p>';
$html .='</div>';
$html .='</body>';
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('formulir-pendaftaran.pdf');
?>