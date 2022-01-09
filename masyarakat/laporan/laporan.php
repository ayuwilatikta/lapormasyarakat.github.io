<?php
// session_start();
// if(!isset($_SESSION['nik']))
// {
//   header("location: ../register/bmas.php");
// }
include('../temp/header.php');
include('../temp/sidebar.php');

 ?>

 <div class="main-panel">
 	<div class="content-wrapper">
 		<div class="row">
 			<div class="col-12 grid-margin stretch-card">
 				<div class="card">
           <div class="card-body">
             <h4 class="card-title">Tambah Lapor</h4>
             <form class="forms-sample" method="post" action="ilaporan.php" enctype="multipart/form-data">
             <div class="form-group">
              <div class="form-group"> 
                <div class="form-group">
                <label >Kategori Lapor</label>
                <select name="kategorilapor" class="form-control">
                <option > Bencana </option>
                <option > Sarana </option>
               </select>
              </div>
              <label >Isi Lapor</label>
                <textarea class="form-control" type="text" name="isi_lapor"></textarea> 
              </div>
              <div class="form-group">
                <label >Foto</label>
                <input class="form-control" type="file" name="foto" ></input>
              </div>
              <div class="form-group">
                <label >Kategori Bencana</label>
                <select name="id_kat_bencana" class="form-control">
                <?php 
                include"../database/koneksi.php";
                $qokatben = "SELECT * FROM kategori_bencana";
                $open = mysqli_query($conn , $qokatben);

                while ($row = mysqli_fetch_assoc($open))
                {
                 ?>
                <option >
                <?php echo $row['id_kat_bencana']; ?>
                <?php echo $row['kategoribencana']; ?>
                </option>
                <?php
                }
                 ?>
               </select>
              </div>
              <div class="form-group">
                <label >Lembaga</label>
                <select name="id_ref_lembaga" class="form-control">
                <?php 
                include"../database/koneksi.php";
                $qoreflem = "SELECT * FROM references_lembaga";
                $openreflem = mysqli_query($conn , $qoreflem);

                while ($row = mysqli_fetch_assoc($openreflem))
                {
                 ?>
                <option >
                <?php echo $row['id_ref_lembaga']; ?>
                <?php echo $row['reflembaga']; ?>
                </option>
                <?php
                }
                 ?>
               </select>
              </div>
              <button type="submit" name="submit" value="Submit" class="btn btn-gradient-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>

<?php 
include('../temp/footer.php');
 ?>