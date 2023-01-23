<?php   
session_start(); 
session_destroy(); 
header("location:../admin-municipality-login.php"); 
exit();
?>
