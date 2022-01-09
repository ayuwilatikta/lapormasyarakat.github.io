<?php
session_start();
include "header.php";
include "sidebar.php";

?>	
 <div class="main-panel">
 	<div class="content-wrapper">
 		<div class="row">
       <div class="col-lg-12 stretch-card">
         <div class="card">
           <div class="card-body">
             <h4 class="card-title">History Berita</h4>
             <a class="btn btn-gradient-primary btn-fw" href="http://localhost/pengelola/tambahberita.php">Tambah</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                <th> id_berita</th>
                  <th> tgl_berita</th>
                  <th>isi_berita</th>
                  <th>foto</th>
                  <th>id_kat_berita</th>
                </tr>
              </thead>
              <!-- SELECT lapor_bencana.id_lap_bencana,lapor_bencana.isi_lapor_bencana, lapor_bencana.foto_berita, kategori_bencana.kategoribencana FROM lapor_bencana JOIN pengguna USING(id_pengguna) JOIN kategori_bencana USING (id_kat_bencana)WHERE username = 'ayu'; -->
              <?php 
              include "koneksi.php";

              
              $sql = "SELECT id_berita,tgl_berita,isi_berita,foto_berita,id_kat_berita FROM berita JOIN ketegori_berita ON berita.id_kat_berita = kategori_berita.id_kat_berita";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
              <tbody>
                <tr class="table-primary">
                  <td> <?php echo $row["isi_berita"]; ?> </td>
                  <td><img src='image/<?php echo $row['foto'];?>' width="200" height="auto"></td>
                  <td> <?php echo $row["kategoriberita"]; ?> </td>
                  <td>
										<a href="editberita2.php?id_berita=<?php echo $row['id_berita']?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil">Edit</span></a>
										<a href="hapusberita.php?id_berita=<?php echo $row['id_berita']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>
									</td>
                </tr>
              </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

      <?php
include "footer.php";
?>
