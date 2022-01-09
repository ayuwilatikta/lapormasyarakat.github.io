<?php
session_start();
include'../temp/header.php';
include'../temp/sidebar.php';
include '../database/koneksi.php';

    $result      = mysqli_query($conn, "SELECT * from masyarakat JOIN references_provinsi USING(id_ref_provinsi) JOIN pengguna USING(id_pengguna) WHERE username = '".$_SESSION['username']."' ");
    if (mysqli_num_rows($result) == 0) {
        echo '<tr><td colspan="6"><center>Data Kosong!!!</center></td></tr>';
    }else{
    $no = 1;
    while($row = mysqli_fetch_array($result)) {
?> 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
                    <h4 class="card-title">Profil</h4>
                    <form class="pt-3" method="POST" action="peditp.php" enctype="multipart/form-data" >
                  <div class="form-group">
                    <div class="form-group">
                      <label >Foto</label>
                      <input type="file" name="foto" value="<?php echo $row['foto']?>">
                      <img src='../../gambar/profilm/<?php echo $row['foto'];?>' width="300" height="auto">
                    </div>
                    <label >NIK</label>
                    <input type="hidden" name="id_masyarakat" value="<?php echo $row['id_masyarakat']?>">
                    <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna']?>">
                    <input type="text" class="form-control form-control-lg" name="nik" value="<?php echo $row['nik']?>">
                  </div>
                  <div class="form-group">
                  <label >Alamat</label>
                    <input type="text" class="form-control form-control-lg" name="alamat" value="<?php echo $row['alamat']?>">
                  </div>
                  <div class="form-group">
                  <label >Kota</label>
                    <input type="text" class="form-control form-control-lg" name="kota" value="<?php echo $row['kota']?>">
                  </div>
                  <div class="form-group">
                  <label >Pekerjaan</label>
                    <input type="text" class="form-control form-control-lg" name="pekerjaan" value="<?php echo $row['pekerjaan']?>">
                  </div>
                  <div class="form-group">
                  <label >Jenis Kelamin</label>
                    <input type="text" class="form-control form-control-lg" name="jk" value="<?php echo $row['jk']?>">
                  </div>
                  <div class="form-group">
                  <label >Provinsi</label>
                    <select name="id_ref_provinsi" class="form-control" value="<?php echo $row['id_ref_provinsi']?>">
                    <?php 
                    include"../database/koneksi.php";
                    $qoprov = "SELECT * FROM references_provinsi";
                    $open = mysqli_query($conn , $qoprov);

                    while ($row = mysqli_fetch_assoc($open))
                    {
                     ?>
                    <option >
                    <?php echo $row['id_ref_provinsi']; ?>
                    <?php echo $row['refprovinsi']; ?>
                    </option>
                    <?php
                    }
                     ?>
                   </select>
                  </div>
                      <button type="submit" name="submit" value="submit" class="btn btn-gradient-primary mr-2">EDIT</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
<?php }}

include'../temp/footer.php';
?>