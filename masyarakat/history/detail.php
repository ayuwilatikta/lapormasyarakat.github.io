<?php
session_start();
include "../database/koneksi.php";
if (isset($_POST['btnkomen'])) {
	$id_laporan 		= $_POST['id_laporan'];
	$balas_komentar   	= $_POST['balas_komentar'];
	$times   			= $_POST['times'];
	$query = "INSERT INTO komentar (id_pengguna, balas_komentar,id_laporan,times)
	VALUES ('".$_SESSION['id_pengguna']."','".$balas_komentar."','".$id_laporan."','".$times."')";
	// echo $query;
		if ($conn->query($query) === TRUE) {
			header("location: detail.php?id_laporan=".$id_laporan);//header tidak boleh atasnya ada echo
		} else {
			echo "<script>alert('Komen Gagal');document.location.href='detail.php?id_laporan='".$id_laporan."'</script>";
		}
	}
include "../temp/header.php";
include "../temp/sidebar.php";
?>	
 <div class="main-panel">
 	<div class="content-wrapper">
 		<a href="#" onclick="history.back(-1)"><button class="btn btn-light mdi mdi-keyboard-backspace">Back</button> </a>
 		<p>
 			<div class="row">
 				<div class="col-12 grid-margin">
 					<div class="card">
 						<div class="card-body">
 							<h4 class="card-title">History </h4>
 							<div class="table-responsive">
 								<?php
 								$id_laporan = $_GET['id_laporan'];
 								$sql = "SELECT laporan.id_laporan,laporan.statuslap,laporan.kategorilapor,laporan.isi_lapor,laporan.foto,kategori_bencana.kategoribencana,references_lembaga.reflembaga
 								FROM laporan 
 								JOIN pengguna USING(id_pengguna) 
								JOIN kategori_bencana USING(id_kat_bencana) 
								JOIN references_lembaga USING(id_ref_lembaga)
								WHERE id_laporan = '$id_laporan' ";
								$result = $conn->query($sql);
								while ($row = mysqli_fetch_array($result))
								{
									?>
									<hr />
									<h5 class="mr-2 mb-2"><?php echo $_SESSION['username']; ?></h5>
									<label class="badge badge-gradient-info"><?php echo $row["statuslap"]; ?></label>
									<p class="mb-0 font-weight-light"><?php echo $row["kategorilapor"]; ?></p>
									<p class="mb-0 font-weight-light"><?php echo $row["isi_lapor"]; ?></p>
									<p class="mb-0 font-weight-light"><img src='../../gambar/laporan/<?php echo $row['foto']; ?>' width="200" height="auto"></p>
									<div class="d-flex align-items-center mr-4 text-muted font-weight-light">
										<span>kategori Bencana: <?php echo $row["kategoribencana"]; ?></span>
									</div>
									<div class="d-flex align-items-center mr-4 text-muted font-weight-light">
										<span>Lembaga: <?php echo $row["reflembaga"]; ?></span>
									</div>
									<?php
								}
								$query2 = "SELECT * FROM komentar JOIN pengguna USING(id_pengguna) WHERE id_laporan = '$id_laporan' ORDER BY id_komentar asc";
								$hasil = mysqli_query($conn, $query2);
								while($row2 = mysqli_fetch_array($hasil)) {
									?>
									<hr>
									<h5 class="mr-2 mb-2"><?php echo $row2['username']; ?></h5>
									<p class="mb-0 font-weight-light"><?php echo $row2["times"]; ?></p>
									<p class="mb-0 font-weight-light"><?php echo $row2["balas_komentar"]; ?></p>
									<p class="mb-0 font-weight-light"><img src='../../gambar/komentar/<?php echo $row2['foto']; ?>' width="200" height="auto"></p>
								<?php } ?>
							</div>
							<!-- komentar -->
							<form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
								<div class="form-group">
									<label>Balas Komentar  :</label>
									<input type='hidden' name='id_laporan' value='<?= $id_laporan ?>' />
									<input type="hidden" name="times" value="<?php echo date("Y-m-d"); ?>">
									<textarea name="balas_komentar" class="form-control" rows="5"></textarea>
								</div>
								<button class="btn btn-primary mdi mdi-comment-processing-outline" type="submit" name="btnkomen" >
									Balas
								</button>
							</form>
							</div>
						</div>
					</div>
<?php
include "../temp/footer.php";
?>