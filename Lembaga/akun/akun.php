<?php
ob_start();
include '../koneksi.php';
include "header.php";
include "sidebar.php";
?>
<html>

<head>
    <title>Halaman Akun</title>
</head>

<body>

    <?php
    $tampilPeg    = mysqli_query($conn, "SELECT * FROM pengguna WHERE id_pengguna='$_SESSION[id_pengguna]'");
    $peg    = mysqli_fetch_array($tampilPeg);
    ?>
    <table border="0" cellpadding="4">
        <tr>
            <td width="390" colspan="2"><b>Akun Saya</b></td>
        </tr>
        <tr>
            <td width="90">Id Pengguna</td>
            <td width="300">: <?= $peg['id_pengguna'] ?></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>: <?= $peg['username'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?= $peg['nama'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?= $peg['email'] ?></td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>: <?= $peg['telp'] ?></td>
        </tr>
        <tr>
            <td>Statusp</td>
            <td>: <?= $peg['statusp'] ?></td>
        </tr>
        <tr height="80">
            <td></td>
            <td><a href="edit.php">Edit Akun</a></td>
            <td></td>
        </tr>
    </table>
</body>

</html>