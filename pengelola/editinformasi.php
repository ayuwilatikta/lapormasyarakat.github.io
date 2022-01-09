<?php
include'header.php';
include'sidebar.php';
include 'koneksi.php';

    $id_informasi  = $_GET['id_informasi'];
    $result      = mysqli_query($conn, "SELECT * FROM informasi WHERE informasi. id_informasi = '$id_informasi'");
    if (mysqli_num_rows($result) == 0) {
        echo '<tr><td colspan="6"><center>Data Kosong!!!</center></td></tr>';
    }else{
    $no = 1;
    while($row = mysqli_fetch_array($result)) {
?> 
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
             <h4 class="card-title">Edit Informasi </h4>
             <form class="forms-sample" method="post" action="editinfo.php" enctype="multipart/form-data">
              <div class="form-group">
                <label >Kategori Informasi</label>
                <input type="hidden" name="id_informasi" value="<?php echo $row['id_informasi']?>">
              </div>
              <div class="form-group">
              <label >Tanggal</label>
                <input class="form-control" type="date" name="tgl_informasi" value="<?php echo $row['tgl_informasi']?>">
              </div>
              <div class="form-group">
              <label >Isi Informasi </label>
                <input class="form-control" type="text" name="isi_informasi" value="<?php echo $row['isi_informasi']?>">
              </div>
              <div class="form-group">
                <label >Foto</label>
                <input class="form-control" type="file" name="foto_informasi" value="<?php echo $row['foto_informasi']?>">
                <img src='../gambar/informasi/<?php echo $row['foto_informasi'];?>' width="200" height="auto">
              </div>
              <div class="form-group">
                <label >Kategori Informasi</label>
                <select name="id_kat_informasi" class="form-control" value="<?php echo $row['id_kat_informasi']?>">
                <?php 
                include"koneksi.php";
                $qokatben = "SELECT * FROM kategori_informasi";
                $open = mysqli_query($conn , $qokatben);

                while ($row = mysqli_fetch_assoc($open))
                {
                 ?>
                <option >
                <?php echo $row['id_kat_informasi']; ?>
                <?php echo $row['kategoriinformasi']; ?>
                </option>
                <?php
                }
                 ?>
               </select>
              <button type="submit" name="submit" value="Submit" class="btn btn-gradient-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
  </div>
</div>
</div>
</div>
</div>
<?php }}
include'footer.php';
?>