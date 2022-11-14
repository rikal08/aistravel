<header  id="header">
    <div class="container">

      <div class="logo float-left">
        <!-- <h1 class="text-light"><a href="index.html"><span>AIS TRAVEL</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.html"><img src="assets/img/logo.png" width="150px" ></a>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php?#about">About Us</a></li>
          <li><a href="index.php?#gallery">Gallery</a></li>
          <li><a href="syarat-pendaftaran">Syarat Pendaftaran</a></li>
          <li><a href="pembayaran">Pembayaran</a></li>
          <?php 
          if (isset($_SESSION['id'])==0) {
            
          

           ?>
          <li><a href=""  data-toggle="modal" data-target="#myModal" ><button style="width: 100px" class="btn btn-danger"><p>Daftar Akun</p></button></a></li>

          <li><a  href="dashboard"><button style="width: 100px" class="btn btn-info"><p>Login</p></button></a></li>
         <?php } ?>
         <?php if (isset($_SESSION['id'])==true): ?>
           
            <li><a  href="dashboard/<?= $dt_user['level']  ?>"><button style="width: 100px" class="btn btn-info"><p><i class="fa fa-user"></i> Akun Saya</p></button></a></li>
            <li><a  href="dashboard/keluar.php"><button style="width: 100px" class="btn btn-danger"><p><i class="fa fa-sign-out"></i> Keluar</p></button></a></li>
            <li><a href="">Hallo, <?= $dt_user['nama']  ?></a></li>
         <?php endif ?>
         
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>

  <?php include"daftar-jamaah.php"; ?>