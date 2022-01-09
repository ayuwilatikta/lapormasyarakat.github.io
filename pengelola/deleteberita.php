<?php
include 'koneksi.php';
$id_berita       = $_GET['id_berita'];

$hapus         	  = mysqli_query($conn, "DELETE FROM berita WHERE id_berita = '$id_berita'");
if($hapus){
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='berita.php'</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');document.location.href='berita.php''</script>";
}
?>