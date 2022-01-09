<?php
include "../database/koneksi.php";
include "../fungsi.php";
session_start();

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,md5($_POST['password']));
    $sql = "select * from pengguna where username='".$username."' and password='".$password."'";
    $result = mysqli_query($conn,$sql);//melaakukan query dr db
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result)> 0){//banyak jumlah baris
        $_SESSION['id_pengguna'] = $row['id_pengguna'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['grup'] = $row['statusp'];

        if($_SESSION['grup'] == 1){
            header("location: ../../pengelola/dashboard.php");
        }
        elseif($_SESSION['grup'] == 2){
            if (cekprofilm($conn) ) {
                header("location: ../dashboard/dashboard.php");
            }
            else{
                header("location: ../register/pmas.php");
            }
        }
        else {
            header("location: ../../Lembaga/dashboard.php");
        }
    }
    else {
        echo "username or password salah";
    }
}
?>