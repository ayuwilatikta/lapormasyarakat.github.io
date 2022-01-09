<?php
include '../database/koneksi.php';
$id_masyarakat      = $_POST['id_masyarakat'];
$id_pengguna        = $_POST['id_pengguna'];
$nik                = $_POST['nik'];
$alamat             = $_POST['alamat'];
$kota               = $_POST['kota'];
$id_ref_provinsi    = $_POST['id_ref_provinsi'];
$jk                 = $_POST['jk'];
$pekerjaan          = $_POST['pekerjaan'];
$foto               = $_FILES['foto'];


// Check if image file is a actual image or fake image;
if (isset($_POST["submit"])) {
    if ($_FILES['foto']['name']!='') {
        $foto           = $_FILES['foto'];
        $target_dir     = "../../gambar/profilm/";
        $namafile       = "profilm" . $nik . "." . strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
        $target_file    = $target_dir . $namafile;
        $uploadOk       = 1;
        $imageFileType  = strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
        echo $imageFileType;
        $check = getimagesize($foto["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($foto["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($foto["tmp_name"], $target_file)) {
                $update = mysqli_query($conn, "UPDATE masyarakat SET id_masyarakat = '$id_masyarakat', id_pengguna = '$id_pengguna', nik='$nik', alamat='$alamat', kota='$kota',id_ref_provinsi='$id_ref_provinsi', jk='$jk', pekerjaan = '$pekerjaan', foto='$namafile'
                    WHERE id_masyarakat = '$id_masyarakat' ");
            }
        }
    }
    else{
        $update = mysqli_query($conn, "UPDATE masyarakat SET id_masyarakat = '$id_masyarakat', id_pengguna = '$id_pengguna', nik='$nik', alamat='$alamat', kota='$kota',id_ref_provinsi='$id_ref_provinsi', jk='$jk', pekerjaan = '$pekerjaan'
            WHERE id_masyarakat = '$id_masyarakat'");
    }
    if($update){
        echo "<script>alert('Data Berhasil Diedit');document.location.href='editp.php'</script>";
    }else{
        echo "<script>alert('Data Gagal Diedit');document.location.href='edit.php?id_masyarakat='$id_masyarakat''</script>";
    }
}

?>
