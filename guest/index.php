<?php
require 'database/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lapor Masyarakat</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:mediumblue;">
    <b><a class="navbar-brand text-white" href="#">Lapor Masyarakat</a></b>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="margin-left:100px">
        <li class="nav-item active ">
          <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="static-page/tentang-kami.php">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="static-page/contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="static-page/faq.php">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="static-page/ketentuan-penggunaan.php">Ketentuan Penggunaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="static-page/kebijakan-privasi.php">Kebijakan Privasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../masyarakat/login/login.php">Login/Register</a>
        </li>

      </ul>
    </div>
  </nav>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: 50;">
    <path fill="	#000b76" fill-opacity="1" d="M0,32L48,58.7C96,85,192,139,288,144C384,149,480,107,576,122.7C672,139,768,213,864,202.7C960,192,1056,96,1152,53.3C1248,11,1344,21,1392,26.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
    </path>
  </svg>
  <h3 class="text-center">Selamat Datang di Website Lapor Masyarakat</h3>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="	#000b76" fill-opacity="1" d="M0,64L48,106.7C96,149,192,235,288,250.7C384,267,480,213,576,186.7C672,160,768,160,864,138.7C960,117,1056,75,1152,74.7C1248,75,1344,117,1392,138.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
  </svg>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="	#000b76" fill-opacity="1" d="M0,96L1440,192L1440,0L0,0Z"></path>
  </svg>
  </svg>
  <div class="container-fluid">
    <div class="row">
      <?php
      $query1 = mysqli_query($conn, "SELECT * FROM informasi ORDER BY id_informasi DESC");
      $query2 = mysqli_query($conn, "SELECT * FROM berita ORDER BY id_berita DESC");
      $query3 = mysqli_query($conn, "SELECT * FROM kategori_berita ORDER BY id_kat_berita DESC");
      $query4 = mysqli_query($conn, "SELECT * FROM kategori_informasi ORDER BY id_kat_informasi DESC");
      ?>
      <div class="col-md-4 bg-dark">
        <h3 class="text-center text-white">
          Informasi Terbaru
        </h3>
        <div class="card">
          <div class="card-body">
            <?php
            while ($row = mysqli_fetch_array($query1)) { ?>
              <div class="card" style="width: 28rem;">
                <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-muted"><?= date('d F Y', strtotime($row['tgl_informasi'])) ?></h6>
                  <p class="card-text"><?= $row['isi_informasi'] ?></p>
                  <p class="mb-0 font-weight-light"><img src='../gambar/informasi/<?php echo $row['foto_informasi']; ?>' width="200" height="auto"></p>
            

                </div>
              </div>
            <?php }
            ?>
          </div>
        </div>

      </div>
      <div class="col-md-4 bg-dark">
        <h3 class="text-center text-white">
          Berita Terbaru
        </h3>
        <?php
        while ($row = mysqli_fetch_array($query2)) { ?>
          <div class=" card" style="width: 28rem;">
            <div class="card-body">
              <h6 class="card-subtitle mb-2 text-muted"><?= date('d F Y', strtotime($row['tgl_berita'])) ?></h6>
              <p class="card-text"><?= $row['isi_berita'] ?></p>
              <p class="mb-0 font-weight-light"><img src='../gambar/berita/<?php echo $row['foto_berita']; ?>' width="200" height="auto"></p>
            </div>
          </div>
        <?php }
        ?>
      </div>
      <div class="col-md-4 bg-dark">
        <h3 class="text-center text-white">
          Kategori
        </h3>
        <div class="card">
          <div class="card-body">
            <div class="card-body">
              <h5>Kategori Berita</h5>
              <?php
              while ($row = mysqli_fetch_array($query3)) { ?>
                <ul>
                  <li>
                    <img src="assets/images/sosial.jpg" alt="" width="70px" width="70px">
                    <a href="public-page/detail-berita.php?idb=<?php echo $row['id_kat_berita'] ?>"><?= $row['kategoriberita'] ?></a><br>
                  </li>
                </ul>
              <?php }
              ?>
              <h5>Kategori Informasi</h5>
              <?php
              while ($row = mysqli_fetch_array($query4)) { ?>
                <ul>
                  <li>
                    <img src="assets/images/tech.jpg" alt="" width="70px" width="70px">
                    <a href="public-page/detail-info.php?idi=<?php echo $row['id_kat_informasi'] ?>"><?= $row['kategoriinformasi'] ?></a><br>
                  </li>
                </ul>
              <?php }
              ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>

</html>