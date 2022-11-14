<?php 	
// $koneksi=mysqli_connect("localhost","id15036204_travel","Umrah@123456","id15036204_ais_travel");
$koneksi=mysqli_connect("localhost","root","","ais_travel");

#cek koneksi
if (mysqli_connect_error()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 ?>