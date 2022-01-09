<?php
include 'koneksi.php';
$id_berita          = $_POST['id_berita'];
$tgl_berita         = $_POST['tgl_berita'];
$foto_berita      = $_FILES['foto_berita'];
$isi_berita        = $_POST['isi_berita'];
$id_kat_berita      = $_POST['id_kat_berita'];

// Check if image file is a actual image or fake image;
if (isset($_POST["submit"])) {
    if ($_FILES['foto_berita']['name']!='') {
        $foto_berita                 = $_FILES['foto_berita'];
        $target_dir     = "../gambar/berita/";
        $namafile       = "berita" . $id_berita . "." . strtolower(pathinfo($foto_berita["name"], PATHINFO_EXTENSION));
        $target_file    = $target_dir . $namafile;
        $uploadOk       = 1;
        $imageFileType  = strtolower(pathinfo($foto_berita["name"], PATHINFO_EXTENSION));
        echo $imageFileType;
        $check = getimagesize($foto_berita["tmp_name"]);
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
            if (move_uploaded_file($foto_berita["tmp_name"], $target_file)) {
                $update          = mysqli_query($conn, "UPDATE berita SET id_berita = '$id_berita',  tgl_berita = '$tgl_berita',  isi_berita = '$isi_berita',  foto_berita = '$namafile' , id_kat_berita = '$id_kat_berita'
                    WHERE id_berita = '$id_berita'");
            }
        }
    }
    else{
        $update          = mysqli_query($conn, "UPDATE berita SET id_berita = '$id_berita',tgl_berita = '$tgl_berita', isi_berita = '$isi_berita', foto_berita = '$namafile' ,id_kat_berita = '$id_kat_berita'
            WHERE id_berita = '$id_berita'");
    }
    if($update){
        echo "<script>alert('Data Berhasil Diedit');document.location.href='berita.php'</script>";
    }else{
        echo "<script>alert('Data Gagal Diedit');document.location.href='editberita.php?id_berita='$id_berita''</script>";
    }
}

?>