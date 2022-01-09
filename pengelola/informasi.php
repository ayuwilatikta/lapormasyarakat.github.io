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
             <h4 class="card-title">kelola Informasi</h4>
             <a class="btn btn-gradient-primary btn-fw" href="http://localhost/lapor/pengelola/tambahinformasi.php">Tambah</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> id_informasi</th>
                  <th> tgl_informasi</th>
                  <th>isi_informasi</th>
                  <th>foto</th>
                  <th>id_kat_informasi</th>
                </tr>
              </thead>
              <?php 
              include "koneksi.php";

              $sql = "SELECT *from informasi";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
              <tbody>
                <tr class="table-warning">
                  <td> <?php echo $row["id_informasi"]; ?> </td>
                  <td> <?php echo $row["tgl_informasi"]; ?> </td>
                  <td> <?php echo $row["isi_informasi"]; ?> </td>
                  <td> <img src='../gambar/informasi/<?php echo $row['foto_informasi'];?>' width="240" height="auto"></td>
                  <td> <?php echo $row["id_kat_informasi"]; ?> </td>
                  <td>
                  <a href="editinformasi.php?id_informasi=<?php echo $row['id_informasi']?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-trash">edit</span></a>
			      <a href="deleteinformasi.php?id_informasi=<?php echo $row['id_informasi']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>
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