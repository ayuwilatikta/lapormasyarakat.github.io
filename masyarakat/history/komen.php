<?php
// koneksi ke mysql
include '../database/koneksi.php';
    $id_laporan         = $_GET['id_laporan'];
    $balas_komentar     = $_POST['balas_komentar'];
    $times              = $_POST['times'];

// Check if image file is a actual image or fake image;
    if (isset($_POST["btnkomen"])) {
        if ($_FILES['foto']['name']!='') {
            $foto                   = $_FILES['foto'];
            $target_dir     = "../image/komentar/";
            $namafile       = "komentar" . $id_laporan . "." . strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
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
                    $query = "INSERT INTO komentar (id_pengguna, balas_komentar,id_laporan,times,foto)
                    VALUES ('".$_SESSION['id_pengguna']."','".$balas_komentar."','".$id_laporan."','".$times."', '".$namafile."')";
                }
            }
        }
        else{
            $query = "INSERT INTO komentar (id_pengguna, balas_komentar,id_laporan,times)
                    VALUES ('".$_SESSION['id_pengguna']."','".$balas_komentar."','".$id_laporan."','".$times."')";
        }
        if ($conn->query($query) === TRUE) {
                header("location: detail2.php?id_laporan=".$id_laporan);//header tidak boleh atasnya ada echo
            } else {
                echo "<script>alert('Komen Gagal');document.location.href='detail2.php?id_laporan='".$id_laporan."'</script>";
            }
    }
?>
 
<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
   <div class="form-group">
      <label>Balas Komentar  :</label>
      <input type='hidden' name='id_laporan' value='<?= $id_laporan ?>' />
      <input type="hidden" name="times" value="<?php echo date("Y-m-d"); ?>">
      <textarea name="balas_komentar" class="form-control" rows="5"></textarea>
   </div>
   <button class="btn btn-primary mdi mdi-comment-processing-outline" type="submit" name="btnkomen" >
      Balas
   </button>
</form>