<?php
// session_start();
// if(!isset($_SESSION['nik']))
// {
//   header("location: ../register/bmas.php");
// }
include('header.php');
include('sidebar.php');

 ?>

 <div class="main-panel">
 	<div class="content-wrapper">
 		<div class="row">
 			<div class="col-12 grid-margin stretch-card">
 				<div class="card">
           <div class="card-body">
             <h4 class="card-title">Tambah Informasi</h4>
             <form class="forms-sample" method="post" action="iinformasi.php" enctype="multipart/form-data">
             <div class="form-group">
                <input class="form-control" type="hidden" name="id_informasi">
              <div class="form-group">
              <label >tgl_informasi</label>
                <input class="form-control" type="date" name="tgl_informasi">
              </div>
              <label >Isi Informasi</label>
                <input class="form-control" type="text" name="isi_informasi">
              </div>
              <div class="form-group">
                <label >Foto</label>
                <input class="form-control" type="file" name="foto_informasi" ></input>
              </div>
              <div class="form-group">
                <label >Kategori Informasi</label>
                <input class="form-control" type="number" name="id_kat_informasi" ></input>
              <button type="submit" name="submit" value="Submit" class="btn btn-gradient-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
              </div>
         </div>
             </div>
   <?