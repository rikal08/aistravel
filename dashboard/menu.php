 <?php 
if ($_SESSION['level']== 'admin') {
 


  ?>

<div id="sidebar" class="sidebar py-3 bg-dark">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul  class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item"><a href="../" class="sidebar-link text-muted "><button class="btn btn-danger"><i class="fa fa-reply"></i> Home</button></a></li>
              <li class="sidebar-list-item"><a href="admin" class="sidebar-link text-muted "><i class="o-home-1 mr-3 text-gray"></i><span>Beranda</span></a></li>
              <li class="sidebar-list-item"><a href="data-paket" class="sidebar-link text-muted "><i class="o-wireframe-1 mr-3 text-gray"></i><span>Data Paket</span></a></li>
              <li class="sidebar-list-item"><a href="jadwal" class="sidebar-link text-muted "><i class="o-table-content-1 mr-3 text-gray"></i><span>Jadwal Keberangkatan</span></a></li>
              <li class="sidebar-list-item"><a href="pemesanan" class="sidebar-link text-muted "><i class="o-survey-1 mr-3 text-gray"></i><span>Pemesanan</span></a></li>
              <li class="sidebar-list-item"><a href="pembayaran" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Pembayaran</span></a></li>
              <li class="sidebar-list-item"><a href="formulir-pendaftaran" class="sidebar-link text-muted "><i class="o-user-1 mr-3 text-gray"></i><span>Formulir Pendaftaran Jamaah</span></a></li>
              <li class="sidebar-list-item"><a href="gallery" class="sidebar-link text-muted "><i class="o-table-content-1 mr-3 text-gray"></i><span>Gallery</span></a></li>
              <li class="sidebar-list-item"><a href="data-user" class="sidebar-link text-muted "><i class="o-user-1 mr-3 text-gray"></i><span>Data User</span></a></li>
              <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family"></div>
              <li class="sidebar-list-item"><a href="profil-ais-travel" class="sidebar-link text-muted "><i class="o-profile-1 mr-3 text-gray"></i><span>Profil AIS TRAVEL</span></a></li>
             
             
            </ul>
      </div>
<?php } ?> 
<?php 
if ($_SESSION['level']== 'jamaah') {
 


  ?>
<div id="sidebar" class="sidebar py-3 bg-dark">
    <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul  class="sidebar-menu list-unstyled">
           <li class="sidebar-list-item"><a href="../" class="sidebar-link text-muted "><button class="btn btn-danger"><i class="fa fa-reply"></i> Home</button></a></li>
          <li class="sidebar-list-item"><a href="jamaah" class="sidebar-link text-muted "><i class="o-home-1 mr-3 text-gray"></i><span>Beranda</span></a></li>
          <li class="sidebar-list-item"><a href="jadwal-paket" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Paket</span></a></li>
          <li class="sidebar-list-item"><a href="pemesanan-saya" class="sidebar-link text-muted"><i class="o-survey-1 mr-3 text-gray"></i><span>Pemesanan Saya</span></a></li>
          <li class="sidebar-list-item"><a href="pembayaran-jamaah" class="sidebar-link text-muted"><i class="o-repository-1 mr-3 text-gray"></i><span>Pembayaran Saya</span></a></li>
          <li class="sidebar-list-item"><a href="jadwal-saya" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Keberangkatan</span></a></li>
         
             </ul>
      </div>
<?php } ?>