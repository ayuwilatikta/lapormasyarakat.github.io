<?php
include'header.php';
include'sidebar.php';
include 'koneksi.php';

    $id_berita  = $_GET['id_berita'];
    $result      = mysqli_query($conn, "SELECT * FROM berita WHERE berita. id_berita = '$id_berita'");
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
             <h4 class="card-title">Edit Berita </h4>
             <form class="forms-sample" method="post" action="editbrta.php" enctype="multipart/form-data">
              <div class="form-group">
                <label >Kategori Berita</label>
                <input type="hidden" name="id_berita" value="<?php echo $row['id_berita']?>">
              </div>
              <div class="form-group">
              <label >Tanggal</label>
                <input class="form-control" type="date" name="tgl_berita" value="<?php echo $row['tgl_berita']?>">
              </div>
              <div class="form-group">
              <label >Isi Berita </label>
                <input class="form-control" type="text" name="isi_berita" value="<?php echo $row['isi_berita']?>">
              </div>
              <div class="form-group">
                <label >Foto</label>
                <input class="form-control" type="file" name="foto_berita" value="<?php echo $row['foto_berita']?>">
                <img src='../gambar/berita/<?php echo $row['foto_berita'];?>' width="200" height="auto">
              </div>
              <div class="form-group">
                <label >Kategori Berita</label>
                <select name="id_kat_berita" class="form-control" value="<?php echo $row['id_kat_berita']?>">
                <?php 
                include"koneksi.php";
                $qokatben = "SELECT * FROM kategori_berita";
                $open = mysqli_query($conn , $qokatben);

                while ($row = mysqli_fetch_assoc($open))
                {
                 ?>
                <option >
                <?php echo $row['id_kat_berita']; ?>
                <?php echo $row['kategoriberita']; ?>
                </option>
                <?php
                }
                 ?>
                 <option value="lainnya.."> Lainnya..</option>
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