<?php
require '../database/koneksi.php';
require '../temp/header.php';
$id = '';
if (isset($_GET['idb'])) {
    $id = $_GET['idb'];

    $query = mysqli_query($conn, "SELECT * FROM berita WHERE id_kat_berita='$id'"); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-light mt-3">
                    <div class="card-header">
                        <h4>Detail Berita</h4>
                    </div>
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p><?= $data['tgl_berita'] ?></p>
                                    <p><?= $data['isi_berita'] ?></p>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-0 font-weight-light"><img src='../../gambar/berita/<?php echo $data['foto_berita']; ?>' width="200" height="auto"></p>
            
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                </div>
            </div>
        <?php
    }
        ?>

        <?php require '../temp/footer.php';  ?>