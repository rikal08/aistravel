<?php 

if(isset($_GET['p'])){
		$page = $_GET['p'];
 
		switch ($page) {
			case 'admin':
				include "beranda-admin.php";
				break;
			case 'jamaah':
				include "beranda-jamaah.php";
				break;
			case 'formulir-pendaftaran':
				include "formulir-pendaftaran.php";
				break;
			case 'data-paket':
				include "data-paket.php";
				break;
			case 'jadwal':
				include "jadwal.php";
				break;
			case 'pemesanan':
				include "pemesanan.php";
				break;
			case 'profil-ais-travel':
				include "profil-ais-travel.php";
				break;
			case 'hapus-jenis-paket':
				include "aksi/hapus_jenis_paket.php";
				break;	
			case 'hapus-paket':
				include "aksi/hapus_paket.php";
				break;
			case 'hapus-jadwal':
				include "aksi/hapus_jadwal.php";
				break;
			case 'hapus-pembayaran':
				include "aksi/hapus-pembayaran.php";
				break;	
			case 'hapus-pemesanan':
				include "aksi/hapus_pemesanan.php";
				break;
			case 'batalkan-pemesanan':
				include "aksi/cencel_pemesanan.php";
				break;
			case 'lanjutkan-pemesanan':
				include "aksi/lanjutkan_pemesanan.php";
				break;
			case 'hapus-formulir':
				include "aksi/hapus_formulir_pendaftaran.php";
				break;
			case 'pemesanan-saya':
				include "pemesanan_saya.php";
				break;
			case 'jadwal-saya':
				include "jadwal_keberangkatan_jamaah.php";
				break;
			case 'pembayaran-jamaah':
				include "pembayaran-jamaah.php";
				break;
			case 'pembayaran':
				include "pembayaran.php";
				break;		
			case 'isi-formulir-jamaah':
				include "isi_formulir_jamaah.php";
				break;
			case 'gallery':
				include "data-galleri.php";
				break;
			case 'hapus-gallery':
				include "aksi/hapus-gallery.php";
				break;
			case 'jadwal-paket':
				include "jadwal-berangkat.php";
				break;
			case 'data-user':
				include "data-user.php";
				break;
			case 'hapus-user':
				include "aksi/hapus-user.php";
				break;
			case 'cetak-formulir-pendaftaran':
				include "aksi/cetak-formulir-pendaftaran.php";
				break;
			
						
			default:
				include"error.php";
				break;
		}
	}else{
		include "beranda-admin.php";
		include "beranda-jamaah.php";
	}

 ?>