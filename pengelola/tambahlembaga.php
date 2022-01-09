<?php 
include('header.php');
include('sidebar.php');
 ?>

 <div class="main-panel">
 	<div class="content-wrapper">
 		<div class="row">
 			<div class="col-12 grid-margin stretch-card">
 				<div class="card">
           <div class="card-body">
             <h4 class="card-title">Tambah lembaga</h4>
             <form class="forms-sample" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
             <div class="form-group">
               <label >id user embaga</label>
               <input class="form-control" type="number" name="id_user_lembaga">
              </div>
              <div class="form-group">
                <label >id_pengguna</label>
                <input class="form-control" type="text" name="id_pengguna">
              </div>
              <div class="form-group">
                <label >nip</label>
                <input class="form-control" type="number" name="nip" ></input>
              </div>
              <div class="form-group">
                <label >alamat kantor</label>
                <input class="form-control" type="text" name="alamatkantor">
              </div>
              <div class="form-group">
                <label >unitkerja</label>
                <input class="form-control" type="text" name="unitkerja">
              </div>
              <div class="form-group">
                <label >id_ref_lembaga</label>
                <input class="form-control" type="number" name="id_ref_lembaga">
              </div>
              <button type="submit" name="submit" value="Submit" class="btn btn-gradient-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
      <?php
      include 'koneksi.php';
      if (isset($_POST['submit'])) {
          $id_user_lembaga			= $_POST['id_user_lembaga'];
          $id_pengguna	            = $_POST['id_pengguna'];
          $nip				= $_POST['nip'];
          $alamatkantor             =$_POST['alamatkantor'];
          $unitkerja           =$_POST['unitkerja'];
          $id_ref_lembaga             =$_POST['id_ref_lembaga'];
          
          $sql = " INSERT INTO userlembaga (id_user_lembaga, id_pengguna, nip ,alamatkantor,unitkerja,id_ref_lembaga)
          VALUES ('".$id_user_lembaga."', '".$id_pengguna."', '".$nip."','".$alamatkantor."','".$unitkerja."','".$id_ref_lembaga."' )";


          if ($conn->query($sql) === TRUE) {
              echo "<script>alert('Data Berhasil Ditambah');document.location.href='userlembaga.php'</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
		}
    
    ?>

<?php 
include('footer.php');
 ?>