<?php
// ob_start();
session_start();


?>
<!-- partial -->
<div class="container-fluid page-body-wrapper" style="margin-top: 50px;">
  <!-- partial:../../partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="http://localhost/lapor/lembaga/akun/akun.php" class="nav-link">
          <div class="nav-profile-image">
            <img src="assets/images/faces/face1.jpg" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2"><?= $_SESSION['username']; ?></span>
            <span class="text-secondary text-small">Lembaga</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/lapor/lembaga/dashboard.php">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">kelola</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="http://localhost/lapor/Lembaga/daftarpengaduan.php">Kelola Laporan</a></li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/lapor/Lembaga/lapsarana/lapsarana.php">Kelola Komentar</a></li>
            <li class="nav-item"> <a class="nav-link" href="http://localhost/lapor/Lembaga/kelinformasi/">Informasi</a></li>
          </ul>
        </div>
      </li>
      </li>
    </ul>
  </nav>