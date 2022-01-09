<?php
ob_start();
session_start();
    include "../koneksi.php";
    include '../functions.php';

$tampilPeg    =mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$_SESSION[id_pengguna]'");
        $peg    =mysqli_fetch_array($tampilPeg);

if( isset($_POST["submit"])) {
    if(edit($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil di Edit!');
                document.location.href =
                    'akun.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('data gagal di Edit!');
                document.location.href =
                    'akun.php';
            </script>
        ";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Akun</title>
</head>
<body>
    <h1>Ubah Akun</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="id_pengguna">Id Pengguna : </label>
                <input type="text" name="id_pengguna" id="id_pengguna" required value="<?= $peg ["id_pengguna"] ?>" readonly>
            </li>
            <li>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" required value="<?= $peg ["username"] ?>">
            </li>
            <!-- <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" required value="<?= $peg ["password"] ?>">
            </li> -->
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $peg ["nama"] ?>" readonly>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $peg ["email"] ?>">
            </li>
            <li>
                <label for="telp">Telp : </label>
                <input type="text" name="telp" id="telp" required value="<?= $peg ["telp"] ?>">
            </li>
            <!-- <li>
                <label for="statusp">Statusp : </label>
                <input type="text" name="statusp" id="statusp" required value="<?= $peg ["statusp"] ?>">
            </li> -->
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>