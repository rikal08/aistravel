<?php
session_start();
include 'koneksi.php'; 
$user = $_POST['username'];
$pass =$_POST['pass'];
$masuk = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$user' AND pass='$pass'");
$cek = mysqli_num_rows($masuk);
if($cek > 0){
    $data = mysqli_fetch_array($masuk);
    if($data['level']=="admin"){
       
        $_SESSION['level'] = $level;
        $_SESSION['id'] = $data['id'];
        $_SESSION['level'] = "admin";
        $_SESSION['status']="login";
        header("location:admin");
 
}if($data['level']=="jamaah"){
       
        $_SESSION['level'] = $level;
        $_SESSION['id'] = $data['id'];
        $_SESSION['level'] = "jamaah";
        $_SESSION['status']="login";
        header("location:jamaah");
 
}
}else{
	header("location:index.php");
}


?>