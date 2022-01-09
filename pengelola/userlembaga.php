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
             <h4 class="card-title">kelola lembaga</h4>
             <a class="btn btn-gradient-primary btn-fw" href="http://localhost/lapor/pengelola/tambahlembaga.php">Tambah</a>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> id user lembaga</th>
                  <th>id pengguna </th>
                  <th> NIP </th>
                  <th>alamat kantor</th>
                  <th>unit kerja</th>
                  <th>id ref lembaga</th>
                </tr>
              </thead>
        
              <?php 
              include "koneksi.php";

              $sql = "SELECT *from userlembaga";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result)) {
                ?>
              <tbody>
                <tr class="table-warning">
                  <td> <?php echo $row["id_user_lembaga"]; ?> </td>
                  <td> <?php echo $row["id_pengguna"]; ?> </td>
                  <td> <?php echo $row["nip"]; ?> </td>
                  <td> <?php echo $row["alamatkantor"]; ?> </td>
                  <td> <?php echo $row["unitkerja"]; ?> </td>
                  <td> <?php echo $row["id_ref_lembaga"]; ?> </td>
                  <td>
                    
									<a href="deletelembaga.php?id_user_lembaga=<?php echo $row['id_user_lembaga']?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>

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