
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h4>Lengkapi Profil</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" method="post" action="ppmas.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="file" class="form-control form-control-lg" name="foto" placeholder="foto">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nik" placeholder="nik">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="alamat" placeholder="alamat">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="kota" placeholder="kota">
                  </div>
                  <div class="form-group">
                    <select name="id_ref_provinsi" class="form-control">
		                <?php 
		                include"../database/koneksi.php";
		                $qoprov = "SELECT * FROM references_provinsi";
		                $open = mysqli_query($conn , $qoprov);

		                while ($row = mysqli_fetch_assoc($open))
		                {
		                 ?>
		                <option >
		                <?php echo $row['id_ref_provinsi']; ?>
		                <?php echo $row['refprovinsi']; ?>
		                </option>
		                <?php
		                }
		                 ?>
		                 <option value="lainnya.."> Lainnya..</option>
		               </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control form-control-lg" name="jk">
                      <option>jenis kelamin</option>
                      <option>Laki-Laki</option>
                      <option>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="pekerjaan" placeholder="pekerjaan">
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="submit" value="Submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="http://localhost/masyarakat/login/login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>