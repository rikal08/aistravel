 <?php 
if ($_SESSION['level']== 'jamaah') {
  ?>
		<section  class="py-5">
            <div  class="row">
                <div  class="col-xl-12 col-lg-12 mb-4 mb-xl-0">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Selamat!</h5>
                  Anda telah terdaftar sebagai member AIS TRAVEL lihat paket yang anda inginkan <a href="../index.php">Disini</a>
                </div>
              </div>
            </div>
            <img src="../assets/img/logo.png" width="100%">
          </section>
<?php } ?>