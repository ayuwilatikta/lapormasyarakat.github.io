<?php
include "../koneksi.php";

session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $sql = "select * from pengguna where username='" . $username . "' and password='" . $password . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['id_pengguna'] = $row['id_pengguna'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telp'] = $row['telp'];
        $_SESSION['statusp'] = $row['statusp'];
        // $_SESSION['grup'] = $row['akses'];

        if ($_SESSION['id_pengguna'] == $row['id_pengguna'])
            header("location: ../dashboard.php");
    } else {
        echo "username or password salah";
    }
}
