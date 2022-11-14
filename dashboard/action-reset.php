<?php
    
    // library email ini harus dipanggil sesuai directorynya diletakkan


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once "library/PHPMailer.php";
    require_once "library/Exception.php";
    require_once "library/OAuth.php";
    require_once "library/POP3.php";
    require_once "library/SMTP.php";
    $mail = new PHPMailer;


    // kode acak
    $ambilangka=rand(100,500);
    $code=$ambilangka;
    include"../koneksi.php";

    $subject = "Kode veritifikasi";
    $message = "Kode veritifikasi  Anda adalah: ".$code."<br> Jangan berikan kode ini kepada siapapun!";
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
    $mail->FromName = "AIS Travel Haji & Umrah"; //nama pengirim
    
     $select=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$_POST[email]'");
        $data=mysqli_fetch_array($select);
    if ($data=true){
        
         $mail->addAddress($_POST['email']); //email penerima
    }else{
        
          echo "<script>
                    alert('Email tidak terdaftar, silahkan coba lagi');location='lupa-password.php';
                    </script>";
    }
        
    

   

    $mail->isHTML(true);

    $mail->Subject = $subject; //subject
    $mail->Body    = $message; //isi email
    $mail->AltBody = "PHP mailer"; //body email (optional)

    // if (!$mail->send()) {
    //     echo "Mailer Error: " . $mail->ErrorInfo;

    // } else {
    //     echo "Message has been sent successfully";
        
    // }

    if (!$mail->send()) {
        // echo "<center>Email sent Gagal !!</center>";
        echo "<script>
                    alert('Pengiriman Kode gagal, silahkan coba lagi');location='lupa-password.php';
                    </script>";

    } else {
        // echo "<center>Email sent successfully !!</center>";
        $select=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$_POST[email]'");
        $data=mysqli_fetch_array($select);
       
        $ubah=mysqli_query($koneksi,"UPDATE tb_user SET pass='$code' WHERE id='$data[id]'");
        echo "<script>
                    alert('Pengiriman Kode Berhasil, cek email sekarang');location='lupa-password.php';
                    </script>";
    }
?>
