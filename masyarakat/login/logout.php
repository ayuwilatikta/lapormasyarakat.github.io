<?php
session_start();
session_unset();//memastikan biar kehapus
session_destroy();
header("location: ../login/login.php");
?>