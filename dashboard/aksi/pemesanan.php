<?php
    
    // library email ini harus dipanggil sesuai directorynya diletakkan


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once "../library/PHPMailer.php";
    require_once "../library/Exception.php";
    require_once "../library/OAuth.php";
    require_once "../library/POP3.php";
    require_once "../library/SMTP.php";
    $mail = new PHPMailer;


    // kode acak
    
    include"../../koneksi.php";
    $id_paket=$_POST['id_paket'];
    $id_jamaah=$_POST['id_jamaah'];
    $jamaah=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id='$id_jamaah'");
    foreach ($jamaah as $dt_jamaah) {
    	$nama=$dt_jamaah['nama'];
    	$email=$dt_jamaah['email'];
    	$nomor=$dt_jamaah['nomor_wa'];
    }
     $paket=mysqli_query($koneksi,"SELECT * FROM tb_paket where id_paket='$id_paket'");
    foreach ($paket as $dt_paket){
        $nm=$dt_paket['nm_paket'];
    }

    $subject = "Pendaftaran Baru Haji & Umrah AIS Travel";
    $message = "Jamaah ".$nama." baru saja melakukan pendaftaran Haji & Umrah<br><br> Data Jamaah:<br><br> Nama :".$nama."<br> Email : ".$email."<br>Nomor Telepon :".$nomor."<br>Jeni Paket yang dipesan: ".$nm."<br><br> Segera hubungi jamaah untuk veritifikas pendaftaran ";
    //Enable SMTP debugging. 
    $mail->SMTPDebug = 0;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                          
    $mail->Host = "tls://smtp.gmail.com"; //host mail server
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password     
    $mail->Username = "aistravel0909@gmail.com";   //nama-email smtp          
    $mail->Password = "umrah123456";           //password email smtp
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to 
    $mail->Port = 587;


    $mail->From = "aistravel0909@gmail.com"; //email pengirim
    $mail->FromName = "Pendaftaran Baru"; //nama pengirim

    $mail->addAddress("pendaftaranaistravel@gmail.com"); //email penerima

    $mail->isHTML(true);

    $mail->Subject = $subject; //subject
    $mail->Body    = $message; //isi email
    $mail->AltBody = "PHP mailer"; //body email (optional)

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;

    } else {
        echo "Message has been sent successfully";
        
    }

    // if (!$mail->send()) {
    //     // echo "<center>Email sent Gagal !!</center>";
    //     echo "<script>
    //                 alert('Pengiriman Kode gagal, silahkan coba lagi');location='lupa-password.php';
    //                 </script>";

    // } else {
    //     // echo "<center>Email sent successfully !!</center>";
    //     echo "<script>
    //                 alert('Pengiriman Kode Berhasil, cek email sekarang');location='lupa-password.php';
    //                 </script>";
    // }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="../sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>
<?php 
include "../../koneksi.php";
$id_jamaah=$_POST['id_jamaah'];
$id_paket=$_POST['id_paket'];
$id_jadwal=$_POST['jadwal'];
$jumlah_jamaah=$_POST['jumlah'];
$hrg=$_POST['hrg'];
$total_harga=$jumlah_jamaah * $hrg;

	$pemesanan=mysqli_query($koneksi,"INSERT INTO tb_pemesanan VALUES (NULL,'$id_jamaah','$id_paket','$id_jadwal','$jumlah_jamaah','$total_harga','1')");

if ($pemesanan==true) {
	

echo "<script>
				setTimeout(function(){
						Swal.fire({
							icon:'success',
							title:'Terimakasih Pesanan sudah kami terima!',
							type:'success',
							timer:'3000',
							showConfrimButton:'true'
							});
					},10);
					window.setTimeout(function(){
						window.location.replace('../pemesanan-saya');
						},3000);
			</script>";
}

 ?>
 </body>
<script src="../sweetalert2/sweetalert2.min.js"></script>
</html>

