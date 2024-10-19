<?php 
session_start();
include '../assets/conn/config.php';
include '../assets/conn/cek.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="../assets-user/img/favicon.png" rel="icon">
  <link href="../assets-user/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets-user/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets-user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets-user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets-user/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets-user/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets-user/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets-user/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
 
  <!-- Template Main CSS File -->
  <link href="../assets-user/css/style.css" rel="stylesheet">
    
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">UDANG VANNAME</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="identifikasi.php">Identifikasi</a></li>
          <li><a class="nav-link scrollto" href="penyakit.php">Penyakit</a></li>
          <li><a class="nav-link scrollto" href="history.php">History</a></li>
          <li><a class="nav-link scrollto" href="tentang.php">Tentang</a></li>
          <li class="dropdown" data-toggle="dropdown" >
            <a href="#">
              <span>
                <?php
                $username=$_SESSION['username'];
                $det=mysqli_query($conn,"select * from tb_akun where username='$username'");
                while($d=mysqli_fetch_array($det)){
                  ?>
                  <span><?php echo $d['nama_lengkap'] ?></span>
                  <?php 
                }
                ?>
              </span>
              <i class="bi bi-person"></i>
            </a>
            <ul>
              <li><a href="profil.php">Akun</a></li>
              <li><a href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
            </ul>
          </li>
        </ul>
          
        <!-- End of Sidebar -->
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Anda akan keluar dari hak akses anda !!!</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

<div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets-user/vendor/aos/aos.js"></script>
  <script src="../assets-user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets-user/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets-user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets-user/vendor/php-email-form/validate.js"></script>
  <script src="../assets-user/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets-user/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets-user/js/main.js"></script>

  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/sb-admin-2.min.js"></script>
  <script src="../assets/vendor/chart.js/Chart.min.js"></script>
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>
  <script src="../assets/js/demo/chart-bar-demo.js"></script>
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/js/demo/datatables-demo.js"></script>

  </body>
</html>