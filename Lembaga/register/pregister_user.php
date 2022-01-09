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

    $id_pengguna    = test_input($_POST["id_pengguna"]);
    $username       = test_input($_POST["username"]);
    $password       = test_input(md5($_POST["password"]));
    $nama           = test_input($_POST["nama"]);
    $email          = test_input($_POST["email"]);
    $telp           = test_input($_POST["telp"]);
    $statusp        = test_input($_POST["statusp"]);

    $sql = "INSERT INTO pengguna (id_pengguna, username, password, nama, email, telp, statusp) 
        VALUES ('$id_pengguna','$username','$password', '$nama', '$email', '$telp', '$statusp') ";



    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
