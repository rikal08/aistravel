<?php 
session_start();
include"koneksi.php";
if (isset($_SESSION['id'])) {
  # code...

$id=$_SESSION['id'];
$user=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id='$id'");
foreach ($user as $dt_user) {
  # code...
}
}
$profil=mysqli_query($koneksi,"SELECT * FROM tb_profil");
foreach ($profil as $data_profil) {
  # code...
}
 ?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php" ?>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com"><?= $data_profil['email']  ?></a>
        <i class="icofont-phone"></i> <?= $data_profil['telepon']  ?>
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <?php include "menu.php"; ?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <!-- End Hero -->

  <main id="main">
   <?php include"router.php" ?>

    <div id="welcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Daftar Jamaah</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            
                          </div>

                        </div>
                      </div>
                    </div>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"footer.php" ?>
  <!-- End Footer -->
  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="dashboard/sweetalert2/sweetalert2.min.js"></script>


  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

 <!-- GetButton.io widget -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#exampl').DataTable( {
        scrollX: true
    } );
} );
</script>
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+6285219443129", // WhatsApp number
            call_to_action: "Butuh bantuan?", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
<!-- <script type="text/javascript">
  $('#welcome').modal('show');
</script> -->
</body>


</html>