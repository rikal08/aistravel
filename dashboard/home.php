<?php 
session_start();
include "koneksi.php";
$idn= $_SESSION['id'];
$q=mysqli_query($koneksi,"SELECT * FROM tb_user where id='$idn'");
foreach ($q as $id) {
  
}

if ($id['id'] =="") {
  header("location:index.php");
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AIS TRAVEL DASHBOARD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
     <link rel="stylesheet" href="daterangepicker/daterangepicker.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="select2/css/select2.min.css">
    <link rel="stylesheet" href="select2-bootstrap4-theme/select2-bootstrap4.min.css">

     <link rel="stylesheet" href="bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-primary shadow"><a  href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a style="color: black" href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base"><?= $id['level']  ?> Dashboard</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          
          
          <li class="nav-item dropdown ml-auto"><a style="color: black" id="userInfo" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-user"></i>  <?= $id['nama']  ?></a>
            <div aria-labelledby="userInfo" class="dropdown-menu">
              <h6 href="#" data-toggle="modal" data-target="#profil-user" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?= $id['nama']  ?></strong><small><?= $id['email']  ?></small></h6>
              <a href="" data-toggle="modal" data-target="#p" class="dropdown-item"><i class="fa fa-user"></i> Profil</a>
              <a href="keluar.php" class="dropdown-item"><i class="o-exit-1 mr-1 text-gray"></i>Keluar</a>

              <!-- profil -->
              
              <!-- profil -->
              
              
            </div>
          </li>

        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">


      <?php include"menu.php"; ?>



      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
         
         <?php include"router.php" ?>

         <!-- profil user -->
           <div id="p" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
              <div role="document" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">My Profile</h4>
                      <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                      <form action="aksi/edit-user.php" method="POST">
                        <div class="form-group">
                          <label>Nama</label>

                          <input type="" hidden="" name="id" value="<?= $id['id']  ?> ">
                          <input type="" hidden="" name="level" value="<?= $id['level']  ?> ">
                          <input type="" value="<?= $id['nama']  ?>" class="form-control" name="nama">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="" readonly="" value="<?= $id['email'] ?>" class="form-control" name="email">
                        </div> 
                        <div class="form-group">
                          <label>Telepon</label>
                          <input type=""  class="form-control" value="<?= $id['nomor_wa'] ?>" name="telepon">
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="" value="<?= $id['pass']  ?>"  class="form-control" name="pass">
                        </div>

                    </div>
                  <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save As</button>
              </div>
                      </form>
              </div>
            </div>
          </div>


         <!-- profil user -->
          
        </div>

        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">AIS Travel &copy; 2018-2020</p>
              </div>
              <div class="col-md-6 text-center text-md-right text-gray-400">
                <p class="mb-0">Design by <a href="https://bootstrapious.com/admin-templates" class="external text-gray-400">Bootstrapious</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script src="daterangepicker/daterangepicker.js"></script>
    <script src="bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="select2/js/select2.full.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#exampl').DataTable( {
            scrollX: true
        } );
    } );
    </script>
   

    <script type="text/javascript">
      CKEDITOR.replace('texteditor');
    </script>    
    <script type="text/javascript">
      CKEDITOR.replace('texteditor1');
    </script> 
    <script type="text/javascript">
      CKEDITOR.replace('texteditor2');
    </script>
    <!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var i=1;
    $('#add_input').click(function(){
      i++;
      $('#dynamic').append('<input id="row'+ i +'" type="file" name="file[]" class="form-control"><a style="color:red;" href="#" id="'+i+'" class="hapus"><i class="fa fa-minus"></i></a>');

    });
    $(document).on('click','.hapus',function(){
      var a=$(this).attr("id");
      $('#row'+a+'').remove();
    });
  });
</script>


  </body>
</html>