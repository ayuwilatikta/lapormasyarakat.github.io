
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Lembaga</title>
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
                <div class="brand-logo">
                  <img src="../assets/images/logo.svg">
                </div>
                <h4>Buat Akun Baru</h4>
                <h6 class="font-weight-light">Silahkan Isi Dengan Lengkap Kolom-Kolom Berikut : </h6>
                <form class="pt-3" method="post" action="pregister.php" >
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" name="id_user_lembaga" placeholder="id_user_lembaga">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" name="id_pengguna" placeholder="id_pengguna">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="nip" placeholder="nip">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="alamatkantor" placeholder="alamatkantor">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="unitkerja" placeholder="unitkerja">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg" name="id_ref_lembaga" placeholder="id_ref_lembaga">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Saya setuju dengan semua Syarat & Ketentuan </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button type="submit" name="submit" value="Submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Sudah memiliki akun? <a href="http://localhost/masyarakat/login/login.php" class="text-primary">Login</a>
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