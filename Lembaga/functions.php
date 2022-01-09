<?php
include '../koneksi.php';
$koneksi = $conn;
function edit($data) {
	global $koneksi;
	$id_pengguna = htmlspecialchars($data["id_pengguna"]);
	$username = htmlspecialchars($data["username"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$telp = htmlspecialchars($data["telp"]);

	$query = "UPDATE pengguna SET
				id_pengguna = '$id_pengguna',
				username = '$username',
				nama = '$nama',
				email = '$email',
				telp = '$telp'
			WHERE id_pengguna = $id_pengguna
			";
	mysqli_query($koneksi, $query);

	return mysqli_affected_rows($koneksi);
}