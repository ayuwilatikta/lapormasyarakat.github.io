<?php
session_start();
      include '../database/koneksi.php';
      if (isset($_POST['submit'])) {

        $foto                = $_FILES["foto"];
        $nik                = $_POST["nik"];
        $alamat             = $_POST["alamat"];
        $kota               = $_POST["kota"];
        $id_ref_provinsi    = $_POST["id_ref_provinsi"];
        $jk                 = $_POST["jk"];
        $pekerjaan          = $_POST["pekerjaan"];

        $target_dir     = "../../gambar/profilm/";
        $namafile       = "profilm" . $nik . "." . strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
        $target_file    = $target_dir . $namafile;
        $uploadOk       = 1;
        $imageFileType  = strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));
        echo $imageFileType;
        
        
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($foto["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
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
                $sql = "INSERT INTO masyarakat ( id_pengguna, nik, alamat, kota, id_ref_provinsi, jk,pekerjaan,foto)
                VALUES ('".$_SESSION['id_pengguna']."', '" . $nik . "', '" . $alamat . "', '" . $kota . "', '" . $id_ref_provinsi . "', '" . $jk . "', '" . $pekerjaan . "', '" . $namafile . "')";
                // echo $sql;
                if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
              header("location: ../dashboard/dashboard.php");
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
