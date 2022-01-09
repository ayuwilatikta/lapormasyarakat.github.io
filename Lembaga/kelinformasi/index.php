<?php
session_start();
require '../koneksi.php';
$sql = "SELECT * FROM kategori_informasi";
$sql1 = "SELECT * FROM informasi JOIN kategori_informasi ON informasi.id_kat_informasi = kategori_informasi.id_kat_informasi";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
include "../header.php";
include "../sidebar.php";
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h4>Tabel Informasi</h4><br>
        <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#addinformasi">Tambah</a>
        <table id="Table_ID" class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th> No. </th>
                    <th> Tanggal Informasi </th>
                    <th> Isi Informasi </th>
                    <th> Foto Informasi </th>
                    <th> Kategori Informasi </th>
                    <th>Aksii</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($result1)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td> <?php echo $row["tgl_informasi"]; ?> </td>
                        <td> <?php echo $row['isi_informasi']; ?></td>
                        <td> <img width="100px" height="100px" src="<?php echo '../../gambar/informasi/' . $row['foto_informasi']; ?>" alt=""></td>
                        <td> <?php echo $row["kategoriinformasi"]; ?> </td>
                        <td>
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#updateinformasi<?= $row['id_informasi'] ?>">Ubah</a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteinformasi<?= $row['id_informasi'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>
<!-- main-panel ends -->
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
<!-- Custom js for this page -->
<!-- End custom js for this page -->
<!-- Modal Tambah informasi -->
<div class="modal fade" id="addinformasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Tanggal Informasi</label>
                    <input type="date" class="form-control" name="tgl" required placeholder="Tanggal informasi">
                    <label for="">Isi Informasi</label>
                    <textarea type="text" class="form-control" name="isi" required></textarea>
                    <label for="">Foto Informasi</label>
                    <input type="file" class="form-control" name="foto" required placeholder="Foto informasi">
                    <label for="">Kategori Informasi</label>
                    <select name="kategori" class="form-control">
                        <option value="">-- Kategori Informasi --</option>
                        <?php
                        foreach ($result as $row) { ?>
                            <option value="<?= $row['id_kat_informasi'] ?>"><?= $row['kategoriinformasi'] ?></option>
                        <?php }
                        ?>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" name="tambah">
            </div>
            </form>
        </div>
    </div>

</div>
<!-- Modal Ubah informasi -->
<?php foreach ($result1 as $row) { ?>
    <div class="modal fade" id="updateinformasi<?= $row['id_informasi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="">Tanggal Informasi</label>
                        <input type="hidden" name="id" value="<?= $row['id_informasi'] ?>">
                        <input type="date" class="form-control" name="tgl" value="<?= $row['tgl_informasi']; ?>" required placeholder="Tanggal informasi">
                        <label for="">Isi Informasi</label>
                        <textarea type="text" class="form-control" name="isi" required><?= $row['isi_informasi']; ?></textarea>
                        <label for="">Foto Informasi</label><br>
                        <input type="file" class="form_control" name="foto">
                        <input type="hidden" class="form-control" name="fotoLama" required placeholder="Foto informasi" value="<?= $row['foto_informasi'] ?>">
                        <label for="">Kategori Informasi</label><br>
                        <select name="kategori" class="form-control">
                            <option value="<?= $row['id_kat_informasi'] ?>"><?= $row['kategoriinformasi'] ?></option>
                            <?php
                            foreach ($result as $row) { ?>
                                <option value="<?= $row['id_kat_informasi'] ?>"><?= $row['kategoriinformasi'] ?></option>
                            <?php }
                            ?>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="ubah" value="Submit">
                </div>
                </form>
            </div>
        </div>

    </div>
<?php } ?>
<!-- Modal Hapus informasi -->
<?php foreach ($result1 as $row) : ?>
    <div class="modal fade" id="deleteinformasi<?= $row['id_informasi']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Informasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row['id_informasi'] ?>">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="hapus" value="Hapus">
                </div>
                </form>
            </div>
        </div>

    </div>
<?php endforeach; ?>
<?php
//tambah informasi
include '../koneksi.php';
if (isset($_POST['tambah'])) {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $foto = $_FILES['foto']['name'];
    $id_kategori = $_POST['kategori'];
    $tgl = $_POST['tgl'];
    $isi = $_POST['isi'];
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
            move_uploaded_file($file_tmp, '../../gambar/informasi/' . $foto);
            $query = mysqli_query($conn, "INSERT INTO `informasi` (`id_informasi`, `tgl_informasi`, `isi_informasi`, `foto_informasi`, `id_kat_informasi`) VALUES (NULL, '$tgl', '$isi', '$foto', '$id_kategori');");
            if ($query) {
                echo "<script>
                                   alert('Data berhasil ditambahkan');
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

//ubah informasi
if (isset($_POST['ubah'])) {
    $old_foto = $_POST['fotoLama'];
    $foto = $_FILES['foto']['name'];
    $id_kategori = $_POST['kategori'];
    $id = $_POST['id'];
    $tgl = $_POST['tgl'];
    $isi = $_POST['isi'];
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $x = explode('.', $old_foto);
    $y = explode('.', $foto);
    $ekstensi1 = strtolower(end($x));
    $ekstensi2 = strtolower(end($y));
    $error = $_FILES['foto']['error'];
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    // cek apakah user upload foto atau tidak
    if ($_FILES['foto']['error'] === 4) {
        if (in_array($ekstensi1, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../../gambar/informasi/' . $old_foto);
                $query = mysqli_query($conn, "UPDATE informasi SET `id_informasi` = $id, `tgl_informasi` = '$tgl', `isi_informasi` = '$isi', `foto_informasi` = '$old_foto', `id_kat_informasi` = $id_kategori WHERE id_informasi = $id");
                var_dump($isi);
                if ($query) {
                    echo "<script>
                                   alert('Data berhasil diubah');
                                    document.location.href = '';
                              </script>";
                } else {
                    echo "<script>
                                   alert('Data gagal diubah');
                                    document.location.href = '';
                              </script>";
                }
            }
        }
    } else {
        if (in_array($ekstensi2, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1044070) {
                move_uploaded_file($file_tmp, '../../gambar/informasi/' . $foto);
                $query = mysqli_query($conn, "UPDATE `informasi` SET `id_informasi` = $id, `tgl_informasi` = '$tgl', `isi_informasi` = '$isi', `foto_informasi` = '$foto', `id_kat_informasi` = $id_kategori WHERE id_informasi = $id");
                if ($query) {
                    echo "<script>
                                   alert('Data berhasil diubah');
                                    document.location.href = '';
                              </script>";
                } else {
                    echo "<script>
                                   alert('Data Gagal diubah');
                                    document.location.href = '';
                              </script>";
                }
            } else {
                echo "<script>
                                   alert('Ukuran file foto terlalu besar');
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
}
//hapus informasi
if (isset($_POST['hapus'])) {
    $id_informasi = $_POST['id'];
    $query = mysqli_query($conn, "DELETE FROM informasi WHERE id_informasi = $id_informasi");
    if ($query) {
        echo "<script>
                                   alert('data berhasil dihapus!');
                                    document.location.href = '';
                              </script>";
    } else {
        echo "<script>
                                   alert('data gagal dihapus!');
                                    document.location.href = '';
                              </script>";
    }
}

?>
<!-- plugins:js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">

</script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('#Table_ID').DataTable();
    });
</script>
</body>

</html>
</body>