<?php 

function cekprofilm($conn){
	$sql = "select count(*) as nilai from masyarakat where id_pengguna = '".$_SESSION['id_pengguna']."'";
	$hasil = mysqli_query($conn,$sql);
	$count = mysqli_fetch_array($hasil);
	
	if ($count['nilai']== 1)
		return true;
	else
		return false;
 }

// function tampilLaporan($conn)
// {

// 	$query = "SELECT * FROM laporan";
// 	$res   = mysqli_query($conn, $query);

// 	$row   = [];

// 	while ($rows = mysqli_fetch_array($res)) {
// 		$row[] = $rows;
// 	}

// 	return $row;
// }

// function detailLaporan($conn,$id_laporan)
// {

// 	$query = "SELECT * FROM laporan WHERE id_laporan = '$id_laporan' ";
// 	$res   = mysqli_query($conn, $query);

// 	$row   = mysqli_fetch_assoc($res);

// 	return $row;
// }

// function tampilKomentar($conn,$id_laporan)
// {

// 	$query = "SELECT * FROM komentar WHERE id_pengguna = '$id_laporan' ";
// 	$res   = mysqli_query($conn, $query);

// 	$row   = [];

// 	while ($rows = mysqli_fetch_assoc($res)) {
// 		$row[] = $rows;
// 	}

// 	return $row;
// }

// function iKomentar($conn,$data, $id_laporan)
// {

// 	$balas_komentar   	= $data['balas_komentar'];
// 	$foto   			= $data['foto'];
// 	$query = "INSERT INTO komentar (id_pengguna, balas_komentar,id_laporan,foto)
//              VALUES ('".$_SESSION['id_pengguna']."','".$balas_komentar."','".$id_laporan."','".$foto."')";

// 	if (mysqli_query($conn, $query)) {
// 		echo "<div class='alert alert-success'>Sukses</div>";
// 	}
// }
?>