<?php
include 'koneksi.php';
$id_informasi           = $_POST['id_informasi'];
$tgl_informasi          = $_POST['tgl_informasi'];
$foto_informasi       = $_FILES['foto_informasi'];
$isi_informasi             = $_POST['isi_informasi'];
$id_kat_informasi        = $_POST['id_kat_informasi'];

// Check if image file is a actual image or fake image;
if (isset($_POST["submit"])) {
    if ($_FILES['foto_informasi']['name']!='') {
        $foto_informasi                  = $_FILES['foto_informasi'];
        $target_dir     = "../gambar/informasi/";
        $namafile       = "informasi" . $id_informasi . "." . strtolower(pathinfo($foto_informasi["name"], PATHINFO_EXTENSION));
        $target_file    = $target_dir . $namafile;
        $uploadOk       = 1;
        $imageFileType  = strtolower(pathinfo($foto_informasi["name"], PATHINFO_EXTENSION));
        echo $imageFileType;
        $check = getimagesize($foto_informasi["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check file size
        if ($foto_berita["size"] > 1000000) {
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
            if (move_uploaded_file($foto_informasi["tmp_name"], $target_file)) {
                $update          = mysqli_query($conn, "UPDATE informasi SET id_informasi = '$id_informasi',  tgl_informasi = '$tgl_informasi',  isi_informasi = '$isi_informasi',  foto_informasi = '$namafile' , id_kat_informasi = '$id_kat_informasi'
                    WHERE id_informasi = '$id_informasi'");
            }
        }
    }
    else{
        $update          = mysqli_query($conn, "UPDATE informasi SET id_informasi = '$id_informasi',tgl_informasi = '$tgl_informasi', isi_informasi = '$isi_informasi', foto_informasi = '$namafile' ,id_kat_informasi = '$id_kat_informasi'
            WHERE id_informasi = '$id_informasi'");
    }
    if($update){
        echo "<script>alert('Data Berhasil Diedit');document.location.href='informasi.php'</script>";
    }else{
        echo "<script>alert('Data Gagal Diedit');document.location.href='editinformasi.php?id_informasi='$id_informasi''</script>";
    }
}

?>