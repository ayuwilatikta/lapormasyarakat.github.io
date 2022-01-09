<?php
session_start();
include "../header.php";
include "../sidebar.php";

?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Informasi</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> tgl_informasi </th>
                  <th> isi_informasi </th>
                  <th>foto_informasi</th>
                  <th>id_kat_informasi</th>
                  <th>Opsi</th>
                </tr>
              </thead>

              <?php
              include "../koneksi.php";

              $result2 = mysqli_query($conn, "SELECT * FROM informasi");
              while ($row2 = mysqli_fetch_array($result2)) {
              ?>
                <tbody>
                  <tr class="table-warning">
                    <td> <?php echo $row2["tgl_informasi"]; ?> </td>
                    <td><?php echo $row2['isi_informasi']; ?></td>
                    <td><?php echo $row2["foto_informasi"]; ?> </td>
                    <td><?php echo $row2['id_kat_informasi']; ?></td>
                    <td>
                      <a href="edits.php?id_informasi=<?php echo $row2['id_informasi'] ?>" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil">Edit</span></a>
                      <a href="phapuss.php?id_informasi=<?php echo $row2['id_informasi'] ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a>
                    </td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
      <?php
      include "../footer.php";
      ?>