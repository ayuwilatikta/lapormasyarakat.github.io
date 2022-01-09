<?php
include 'koneksi.php';
$id_informasi      = $_GET['id_informasi'];

$hapus         	  = mysqli_query($conn, "DELETE FROM informasi WHERE id_informasi = '$id_informasi'");
if($hapus){
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='informasi.php'</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');document.location.href='informasi.php''</script>";
}
?>