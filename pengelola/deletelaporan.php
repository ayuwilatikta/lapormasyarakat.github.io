<?php
include 'koneksi.php';
$id_laporan       = $_GET['id_laporan'];

$hapus         	  = mysqli_query($conn, "DELETE FROM laporan WHERE id_laporan = '$id_laporan'");
if($hapus){
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='laporan.php'</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');document.location.href='laporan.php''</script>";
}
?>