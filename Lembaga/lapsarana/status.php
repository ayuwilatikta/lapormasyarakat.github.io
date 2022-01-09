  <?php
    include '../koneksi.php';
    if (isset($_POST['konfirmasi'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $query = mysqli_query($conn, "UPDATE laporan SET statuslap = '$status' WHERE id_laporan = $id");
        if ($query) {
            echo 'berhasil';
        } else {
            echo 'gagal';
        }
    } else {
        echo 'kosong';
    }

    ?>