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
             <h4 class="card-title">kelola berita</h4>
             <a class="btn btn-gradient-primary btn-fw" href="http://localhost/lapor/pengelola/tambahberita.php">Tambah</a>
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
              <?php 
              include "koneksi.php";

              $sql = "SELECT *from berita";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
              <tbody>
                <tr class="table-warning">
                  <td> <?php echo $row["id_berita"]; ?> </td>
                  <td> <?php echo $row["tgl_berita"]; ?> </td>
                  <td> <?php echo $row["isi_berita"]; ?> </td>
                  <td> <img src='../gambar/berita/<?php echo $row['foto_berita']; ?>'> </td>
                  <td> <?php echo $row["id_kat_berita"]; ?> </td>
                  <td>
                  <a href="editberita.php?id_berita=<?php echo $row['id_berita']?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-trash">edit</span></a>
			      <a href="deleteberita.php?id_berita=<?php echo $row['id_berita']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>
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