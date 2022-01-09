<?php
    include '../koneksi.php';

    if (isset($_POST['submit'])) {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $id_user_lembaga    = test_input($_POST["id_user_lembaga"]);
        $id_pengguna        = test_input($_POST["id_pengguna"]);
        $nip                = test_input($_POST["nip"]);
        $alamatkantor       = test_input($_POST["alamatkantor"]);
        $unitkerja          = test_input($_POST["unitkerja"]);
        $id_ref_lembaga     = test_input($_POST["id_ref_lembaga"]);

        $sql = "INSERT INTO userlembaga (id_user_lembaga, id_pengguna, nip, alamatkantor, unitkerja, id_ref_lembaga) 
        VALUES ('$id_user_lembaga','$id_pengguna','$nip', '$alamatkantor', '$unitkerja', '$id_ref_lembaga') ";



          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
              header("location:../dashboard.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
    }
    ?>