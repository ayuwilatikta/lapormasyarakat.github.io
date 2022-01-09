<?php
session_start();
include "../temp/header.php";
include "../temp/sidebar.php";
include "../database/koneksi.php";

?>
 <div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
       <div class="col-12 grid-margin">
        <div class="card">
      <div class="card-body">
        <h4 class="card-title">History </h4>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="text" name="query" placeholder="Cari">
            <input class="btn btn-sm btn-gradient-primary" type="submit" name="cari" value="Search">
          </form>
        <div class="table-responsive">
          <?php // trim() digunakan untuk menghapus spasi
          if(isset($_POST['query']) && !empty(trim($_POST['query']))){
            $query = $_POST['query'];
            $sql ="SELECT id_laporan,statuslap,kategorilapor,isi_lapor,foto,kategoribencana,reflembaga 
            FROM laporan 
            JOIN pengguna USING(id_pengguna) 
            JOIN kategori_bencana USING (id_kat_bencana) 
            JOIN references_lembaga using(id_ref_lembaga) 
            WHERE username = '".$_SESSION['username']."'
            AND kategorilapor LIKE '%".$query."%' 
            OR isi_lapor LIKE '%".$query."%' 
            OR kategoribencana LIKE '%".$query."%' 
            OR reflembaga LIKE '%".$query."%' ";
          }else{
            $sql = "SELECT id_laporan,statuslap,kategorilapor,isi_lapor,foto,kategoribencana,reflembaga FROM laporan JOIN pengguna USING(id_pengguna) JOIN kategori_bencana USING (id_kat_bencana) JOIN references_lembaga using(id_ref_lembaga) WHERE username = '".$_SESSION['username']."' ORDER BY id_laporan DESC ";
          }
          $result = $conn->query($sql);
          while($row = mysqli_fetch_array($result)) {
                ?>
                <hr>
                <hr>
                <h5 class="mr-2 mb-2"><?php echo $_SESSION['username']; ?></h5>
                <label class="badge badge-gradient-info"><?php echo $row["statuslap"]; ?></label>
              <p class="mb-0 font-weight-light"><?php echo $row["kategorilapor"]; ?></p>
              <p class="menu-title"><?php echo $row["isi_lapor"]; ?></p>
              <p class="mb-0 font-weight-light"><img src='../../gambar/laporan/<?php echo $row['foto'];?>' width="240" height="auto"></p>
              <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                <span>kategori Bencana: <?php echo $row["kategoribencana"]; ?></span>
              </div><div class="d-flex align-items-center mr-4 text-muted font-weight-light">
                <span>Lembaga: <?php echo $row["reflembaga"]; ?></span>
              </div>
              <hr>

              <a href="edit.php?id_laporan=<?php echo $row['id_laporan']?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-pencil">Edit</span></a>
              <a href="phapus.php?id_laporan=<?php echo $row['id_laporan']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>

              <a href="detail.php?id_laporan=<?php echo $row['id_laporan']?>"><span class="glyphicon glyphicon-trash">Detail</span></a>

              <?php } ?>
            </div>
          </div>
        </div>
      </div>

<?php
include "../temp/footer.php";
?>

              <!-- $sql = "SELECT id_laporan,statuslap,kategorilapor,isi_lapor,foto,kategoribencana,reflembaga FROM laporan JOIN pengguna USING(id_pengguna) JOIN kategori_bencana USING (id_kat_bencana) JOIN references_lembaga using(id_ref_lembaga) WHERE username = '".$_SESSION['username']."' ORDER BY id_laporan ASC LIMIT 0,3 "; -->