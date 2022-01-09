<?php
include 'koneksi.php';
$id_user_lembaga      = $_GET['id_user_lembaga'];

$hapus         	  = mysqli_query($conn, " DELETE FROM userlembaga WHERE id_user_lembaga = '$id_user_lembaga'");
if($hapus){
    echo "<script>alert('Data Berhasil Dihapus');document.location.href='history.php'</script>";
}
// elseif($hapuss){
//     echo "<script>alert('Data Berhasil Dihapus');document.location.href='history.php'</script>";
// }else{
//     echo "<script>alert('Data Gagal Dihapus');document.location.href='history.php''</script>";
// }
?>