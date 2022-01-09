<?php
session_start();
if(!isset($_SESSION['username']) and $_SESSION['grup']!= 2)
{
  header("location: ../login/login.php");
} 


include "../temp/header.php";
include "../temp/sidebar.php";
include "../database/koneksi.php";

?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Lapor Bencana <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
          </h4>
          <?php 
          $sql = mysqli_query($conn,"SELECT * FROM laporan where kategorilapor = 'Bencana' ");
          $jbencana= mysqli_num_rows($sql);
           ?>
          <h2 class="mb-5"><?php echo $jbencana ?></h2>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h4 class="font-weight-normal mb-3">Lapor Sarana <i class="mdi mdi-chart-line mdi-24px float-right"></i>
        </h4>
          <?php 
          $sql2 = mysqli_query($conn,"SELECT * FROM laporan where kategorilapor = 'Sarana' ");
          $jsarana= mysqli_num_rows($sql2);
           ?>
        <h2 class="mb-5"><?php echo $jsarana ?></h2>
      </div>
    </div>
  </div>
  
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Jumlah Pelapor <i class="mdi mdi-diamond mdi-24px float-right"></i>
      </h4>
      <?php 
      $jumlah = $jbencana + $jsarana;
       ?>
      <h2 class="mb-5"><?php echo $jumlah ?></h2>
    </div>
  </div>
</div>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">INFORMASI</h4>
      <?php
      $sqli = "SELECT tgl_informasi,isi_informasi,foto_informasi,kategoriinformasi FROM informasi JOIN kategori_informasi USING(id_kat_informasi) ORDER BY id_informasi ASC LIMIT 0,3 ";
      $resulti = $conn->query($sqli);
      while($rowi = mysqli_fetch_array($resulti)) {
                ?>
      <div class="d-flex">
        <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
          <i class="mdi mdi-account-outline icon-sm mr-2"></i>
          <span><?php echo $rowi["kategoriinformasi"]; ?></span>
        </div>
        <div class="d-flex align-items-center text-muted font-weight-light">
          <i class="mdi mdi-clock icon-sm mr-2"></i>
          <span><?php echo $rowi["tgl_informasi"]; ?></span>
        </div>
      </div>
      <div class="row mt-3">
      </div>
      <div class="d-flex mt-5 align-items-top">
        <div class="mb-0 flex-grow">
          <h5 class="mr-2 mb-2"><img src='../../gambar/informasi/<?php echo $rowi['foto_informasi']; ?>' width="200" height="auto"></p></h5>
          <p class="mb-0 font-weight-light"><?php echo $rowi["isi_informasi"]; ?></p>
        </div>
        <div class="ml-auto">
          <i class="mdi mdi-heart-outline text-muted"></i>
        </div>
      </div>
      <hr>
<?php } ?>
    </div>
  </div>
</div>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">BERITA</h4>
      <?php
      $sqlb = "SELECT tgl_berita,isi_berita,foto_berita,kategoriberita FROM berita JOIN kategori_berita USING(id_kat_berita) ORDER BY id_berita ASC LIMIT 0,3 ";
      $resultb = $conn->query($sqlb);
      while($rowb = mysqli_fetch_array($resultb)) {
                ?>
      <div class="d-flex">
        <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
          <i class="mdi mdi-account-outline icon-sm mr-2"></i>
          <span><?php echo $rowb["kategoriberita"]; ?></span>
        </div>
        <div class="d-flex align-items-center text-muted font-weight-light">
          <i class="mdi mdi-clock icon-sm mr-2"></i>
          <span><?php echo $rowb["tgl_berita"]; ?></span>
        </div>
      </div>
      <div class="row mt-3">
      </div>
      <div class="d-flex mt-5 align-items-top">
        <div class="mb-0 flex-grow">
          <h5 class="mr-2 mb-2"><img src='../../gambar/berita/<?php echo $rowb['foto_berita']; ?>' width="200" height="auto"></h5>
          <p class="mb-0 font-weight-light"><?php echo $rowb["isi_berita"]; ?></p>
        </div>
        <div class="ml-auto">
          <i class="mdi mdi-heart-outline text-muted"></i>
        </div>
      </div>
      <hr>
<?php } ?>
    </div>
  </div>
</div>
</div>

<?php

include "../temp/footer.php";
 ?>