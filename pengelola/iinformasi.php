
<?php
session_start();
      include 'koneksi.php';
      if (isset($_POST['submit'])) {
        $id_informasi				= $_POST['id_informasi'];
        $tgl_informasi				= $_POST['tgl_informasi'];
        $isi_informasi   	= $_POST['isi_informasi'];
        $foto_informasi						= $_FILES['foto_informasi'];
        $id_kat_informasi          = $_POST['id_kat_informasi'];
       
        $target_dir     = "../gambar/informasi/";
        $namafile       = "informasi" . $id_informasi . "." . strtolower(pathinfo($foto_informasi["name"], PATHINFO_EXTENSION));
        $target_file    = $target_dir . $namafile;
        $uploadOk       = 1;
        $imageFileType  = strtolower(pathinfo($foto_informasi["name"], PATHINFO_EXTENSION));
        echo $imageFileType;
        
        
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($foto_informasi["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Check file size
        if ($foto_informasi["size"] > 1000000) {
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
                $sql = "INSERT INTO informasi (id_informasi, tgl_informasi, isi_informasi, foto_informasi, id_kat_informasi)
                VALUES  ('".$id_informasi."','".$tgl_informasi."', '".$isi_informasi."', '".$namafile."', '".$id_kat_informasi."')";
                // echo $sql;
                if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
              header("location: informasi.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
      }
      ?>
