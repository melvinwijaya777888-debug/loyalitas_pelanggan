<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Brastagi Supermarket</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!--
  <link href="<?php echo e(URL::to('/')); ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo e(URL::to('/')); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo e(URL::to('/')); ?>/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="<?php echo e(URL::to('/')); ?>/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="<?php echo e(URL::to('/')); ?>/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SI Pelanggan</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo e(URL::to('/')); ?>/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <?php 
              $nama_user = Session::get('nama_user'); 
              $tipe_user = Session::get('user_type'); 
            ?>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e($nama_user); ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><b><?php echo e($nama_user); ?></b></h6>
              <span><b><?php echo e($tipe_user); ?></b></span>
            </li> 
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="/home">
          <i class="fa fa-home me-2"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Start Nav Pelanggan -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/customers">
          <i class="fa fa-users"></i><span>Pengelolaan Pelanggan</span>
        </a>
      </li><!-- End Nav Pelanggan -->

      <!-- Start Nav Produk -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/products">
          <i class="fa fa-shopping-basket"></i><span>Produk</span>
        </a>
      </li><!-- End Nav Produk -->

      <!-- Start Nav Order -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/orders">
          <i class="fa fa-cart-plus"></i><span>Order</span>
        </a>
      </li><!-- End Nav Order -->

      <!-- Start Nav Program Loyalty -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/loyaltys">
          <i class="fa fa-id-card"></i><span>Program Loyalty</span>
        </a>
      </li><!-- End Nav Order -->
      
      <!-- Start Nav User -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manajemen-user" data-bs-toggle="collapse" href="#">
          <i class="fa fa-user"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manajemen-user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/change_password">
              <i class="bi bi-circle"></i><span>Change Password</span>
            </a>
          </li>
          <li>
            <a href="/logout">
              <i class="bi bi-circle"></i><span>Logout</span>
            </a>
          </li>
        </ul>
      </li><!-- End Nav User -->


    </ul>
  </aside><!-- End Sidebar-->

  <?php echo $__env->yieldContent('container'); ?>



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>2025</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo e(URL::to('/')); ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo e(URL::to('/')); ?>/assets/js/main.js"></script>

</body>

</html><?php /**PATH D:\SKRIPSI 2026\UPH\- Melvin Wijaya\pelanggan\resources\views/layout/menu.blade.php ENDPATH**/ ?>