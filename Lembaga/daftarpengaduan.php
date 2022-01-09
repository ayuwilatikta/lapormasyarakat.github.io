  <?php
  session_start();
  include "header.php";
  include "sidebar.php";
  require "koneksi.php";
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
                    <th> Status </th>
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
                      <td><img src="<?= '../gambar/laporan/' . $row['foto']; ?>" alt="gada gambar"> </td>
                      <td> <?php echo $row["id_kat_bencana"]; ?> </td>
                      <td> <?php echo $row["statuslap"]; ?> </td>
                      <td>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#konfir<?php echo $row['id_laporan']; ?>">Konfirmasi</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <?php
        include "footer.php";
        ?>

        <!-- Modal -->
        <div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="hidden" name="id_pengguna" value="<?= $_SESSION['id_pengguna']; ?>">
                    <label for="">Kategori Laporan</label>
                    <input type="text" name="kategori" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Isi Laporan</label>
                    <textarea name="isi" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Foto Laporan</label>
                    <input type="file" name="foto" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Kategori Bencana</label>
                    <select name="kat_bencana" id="" class="form-control">
                      <?php
                      $sql1 = "SELECT *FROM kategori_bencana";
                      $result1 = mysqli_query($conn, $sql1);

                      while ($row1 = mysqli_fetch_array($result1)) {
                      ?>
                        <option value="<?= $row1['id_kat_bencana'] ?>"><?= $row1['kategoribencana'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Refference Lembaga</label>
                    <select name="ref_lembaga" id="" class="form-control">
                      <?php
                      $sql2 = "SELECT *FROM references_lembaga";
                      $result2 = mysqli_query($conn, $sql2);

                      while ($row2 = mysqli_fetch_array($result2)) {
                      ?>
                        <option value="<?= $row2['id_ref_lembaga'] ?>"><?= $row2['reflembaga'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="status" value="Belum diterima">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" name="upload" value="Submit">
                </form>
              </div>
            </div>
          </div>
        </div>



        <?php
        include 'koneksi.php';
        if (isset($_POST['upload'])) {
          $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
          $foto = $_FILES['foto']['name'];
          $id_pengguna = $_POST['id_pengguna'];
          $kategori = $_POST['kategori'];
          $isi = $_POST['isi'];
          $kat_bencana = $_POST['kat_bencana'];
          $ref_lembaga = $_POST['ref_lembaga'];
          $status = $_POST['status'];

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
              move_uploaded_file($file_tmp, '../gambar/laporan/' . $foto);
              $query = mysqli_query($conn, "INSERT INTO `laporan` (`id_laporan`, `id_pengguna`, `kategorilapor`, `isi_lapor`, `foto`,`id_kat_bencana`,`id_ref_lembaga`,`statuslap`) VALUES (NULL, '$id_pengguna', '$kategori', '$isi', '$foto','$kat_bencana','$ref_lembaga','$status');");
              if ($query) {
                echo "<script>
                                    alert('Gambar Berhasil diupload');
                                      document.location.href = '';
                                </script>";
              } else {
                echo "<script>
                                    alert('Gambar Gagal diupload');
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
        foreach ($result as $res) :
        ?>
          <div class="modal fade" id="konfir<?= $res['id_laporan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Laporan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="lapsarana/status.php" method="POST">
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