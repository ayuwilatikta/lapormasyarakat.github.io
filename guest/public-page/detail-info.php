<?php
require '../database/koneksi.php';
require '../temp/header.php';
if (isset($_GET['idi'])) {
    $id = $_GET['idi'];

    $query = mysqli_query($conn, "SELECT * FROM informasi WHERE id_kat_informasi='$id'"); ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-light mt-3">
                    <div class="card-header">
                        <h4>Detail Informasi</h4>
                    </div>
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p><?= $data['tgl_informasi'] ?></p>
                                    <p><?= $data['isi_informasi'] ?></p>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-0 font-weight-light"><img src='../../gambar/informasi/<?php echo $data['foto_informasi']; ?>' width="200" height="auto"></p>
                                </div>
                            </div>
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