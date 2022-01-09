<?php
    include '../database/koneksi.php';

    if (isset($_POST['submit'])) {
        function test_input($data)
        {
            $data = trim($data);//spasi yang akan dihapus bisa berada di awal maupun di akhir string
            $data = stripslashes($data);//menghilangkan karakter backslashes
            $data = htmlspecialchars($data);//mengkonversi beberapa karakter yang telah ditetapkan untuk entitas HTML
            return $data;
        }

        $id_pengguna    = test_input($_POST["id_pengguna"]);//validasi input
        $username       = test_input($_POST["username"]);
        $password       = test_input(md5($_POST["password"]));
        $nama           = test_input($_POST["nama"]);
        $email          = test_input($_POST["email"]);
        $telp           = test_input($_POST["telp"]);
        $akses          = test_input($_POST["akses"]);
        $id= 9;
        $idp= $id++;
        $aks = 2;

        $sql = "INSERT INTO pengguna (id_pengguna, username, password, nama, email, telp, statusp) 
        VALUES ('" . $id_pengguna . "','" . $username . "', '" . $password . "', '" . $nama . "', '" . $email . "', '" . $telp . "', '" . $aks . "')";


          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
              header("location: ../login/login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
    }
    ?>