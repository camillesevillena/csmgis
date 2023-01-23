<?php   
session_start(); 
session_destroy(); 
header("location:../admin-provincial-login.php"); 
exit();
?>
