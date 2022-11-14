<?php 

if(isset($_GET['p'])){
		$page = $_GET['p'];
 
		switch ($page) {
			case 'detail-paket':
				include "detail-paket.php";
				break;
			case 'syarat-pendaftaran':

				include "syarat-pendaftaran.php";
				break;
			case 'pembayaran':
				
				include "pembayaran.php";
				break;
			
						
			default:
				include"error.php";
				break;
		}
	}else{
		include"slide.php";
		include"home.php";

	   	include"paket.php";

	   	include"jadwal.php";

	  	include"about.php"; 

		include"kinerja.php";
		include"testimoni.php";
	}

 ?>