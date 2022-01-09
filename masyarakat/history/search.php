<?php 
include"../database/koneksi.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>search</title>
 </head>
 <body>
 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
 		<input type="text" name="query" placeholder="Cari">
 		<input type="submit" name="cari" value="Search">
 	</form>
 	<?php 
 	$query = $_POST['query'];
 	if($query != ''){
 		$sql ="SELECT id_laporan,statuslap,kategorilapor,isi_lapor,foto,kategoribencana,reflembaga FROM laporan JOIN pengguna USING(id_pengguna) JOIN kategori_bencana USING (id_kat_bencana) JOIN references_lembaga using(id_ref_lembaga) WHERE username = 'ab' AND kategorilapor LIKE '%".$query."%' OR isi_lapor LIKE '%".$query."%' ";
 	}else{
 		$sql = "SELECT id_laporan,statuslap,kategorilapor,isi_lapor,foto,kategoribencana,reflembaga FROM laporan JOIN pengguna USING(id_pengguna) JOIN kategori_bencana USING (id_kat_bencana) JOIN references_lembaga using(id_ref_lembaga) WHERE username = 'ab' ORDER BY id_laporan ASC LIMIT 0,5 ";

 	}
 	$result = $conn->query($sql);
 	while($row = mysqli_fetch_array($result)) {
                ?>
 	<table>
 		<tr>
 			<p class="mb-0 font-weight-light"><?php echo $row["kategorilapor"]; ?></p>
              <p class="mb-0 font-weight-light"><?php echo $row["isi_lapor"]; ?></p>
              <p class="mb-0 font-weight-light"><img src='../image/laporan/<?php echo $row['foto'];?>' width="240" height="auto"></p>
              <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                <span>kategori Bencana: <?php echo $row["kategoribencana"]; ?></span>
              </div><div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                <span>Lembaga: <?php echo $row["reflembaga"]; ?></span>
              </div>
 		</tr>
 	</table>
 <?php } ?>
 </body>
 </html>