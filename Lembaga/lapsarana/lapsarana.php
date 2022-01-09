  <?php
  session_start();
  include "../header.php";
  include "../sidebar.php";
  require "../koneksi.php";
  $sql = "SELECT * FROM laporan";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Daftar Pengaduan</h4>
              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#laporanModal">Tambah</a>
              <table id="Table_ID" class="table table-bordered mt-3">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th> Isi Laporan </th>
                    <th> Foto </th>
                    <th> Kategori </th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td> <?php echo $row["isi_lapor"]; ?> </td>
                      <td><img src="<?= '../../gambar/laporan/' . $row['foto']; ?>" alt="gada gambar"> </td>
                      <td> <?php echo $row["id_kat_bencana"]; ?> </td>
                      <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#komenModal<?php echo $row['id_laporan']; ?>">Komentar</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php
        include "../footer.php";
        foreach ($result as $res) :
        ?>
          <div class="modal fade" id="exampleModal<?= $res['id_laporan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Laporan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="status.php" method="POST">
                    <div class="form-group">
                      <label for="">Status Laporan</label>
                      <select name="status" class="form-control">
                        <option value="<?= $res['statuslap']; ?>">-- <?= $res['statuslap']; ?> --</option>
                        <option value="Sudah diterima">Sudah diterima</option>
                        <option value="Ditolak">Ditolak</option>
                      </select>
                      <input type="hidden" name="id" value="<?= $res['id_laporan'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" name="konfirmasi" class="btn btn-primary" value="Submit">
                  </form>
                </div>
              </div>
            </div>
          </div>

        <?php

        endforeach; ?>
        <?php
        $result1 = mysqli_query($conn, "SELECT * FROM laporan");

        while ($data = mysqli_fetch_array($result1)) { ?>
          <div class="modal fade" id="komenModal<?= $data['id_laporan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Form Komentar</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna']; ?>">
                      <input type="hidden" name="id_laporan" value="<?= $data['id_laporan'] ?>">
                      <label for="">Isi Komentar</label>
                      <textarea name="komentar" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Foto Komentar</label>
                      <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" name="komen" class="btn btn-primary" value="Submit">
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php
        include '../koneksi.php';
        if (isset($_POST['komen'])) {
          $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
          $foto = $_FILES['foto']['name'];
          $id_pengguna = $_POST['id_pengguna'];
          $id_laporan = $_POST['id_laporan'];
          $komentar = $_POST['komentar'];

          $times = date('Y-m-d');
          $x = explode('.', $foto);
          $ekstensi = strtolower(end($x));
          $error = $_FILES['foto']['error'];
          $ukuran = $_FILES['foto']['size'];
          $file_tmp = $_FILES['foto']['tmp_name'];
          // periksa apakah ada yang diupload?
          if ($error === 4) {
            echo "<script>
            alert('Pilih gambar terlebih dahulu');
            document.location.href = '';
            </script>";
          }
          if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
              move_uploaded_file($file_tmp, '../../gambar/komentar/' . $foto);
              $query = mysqli_query($conn, "INSERT INTO `komentar`(`id_komentar`, `id_pengguna`, `balas_komentar`,`id_laporan`,`times`,`foto`)VALUES(NULL, '$id_pengguna', '$komentar', '$id_laporan','$times','$foto');") or die(mysqli_error($conn));
              if ($query) {
                echo "<script>
          alert('Komentar Berhasil ditambahkan');
          document.location.href = '';
        </script>";
              } else {
                echo "<script>
          alert('Komentar Gagal ditambahkan');
          document.location.href = '';
        </script>";
              }
            } else {
              echo "<script>
                                    alert('Ukuran file terlalu besar');
                                      document.location.href = '';
                                </script>";
            }
          } else {
            echo "<script>
                                    alert('file harus berupa gambar!');
                                      document.location.href = '';
                                </script>";
          }
        }

        ?>