<?php
include '../database/koneksi.php';
$id_laporan       = $_GET['id_laporan'];
// DELETE FROM laporan JOIN komentar USING(id_laporan) WHERE id_laporan = '22'
$hapus         	  = mysqli_query($conn, "DELETE FROM laporan WHERE id_laporan = '$id_laporan'");
if($hapus){
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='history.php'</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');document.location.href='history.php''</script>";
}
?>