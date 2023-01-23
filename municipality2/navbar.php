<?php
session_start();

$SESSION_USERNAME = $_SESSION['email'];

$getAdmin = mysqli_query($conn, "SELECT * FROM municipality_account WHERE email = '$SESSION_USERNAME'") or die(mysqli_error($conn));
$DATA = mysqli_fetch_assoc($getAdmin);
// $teacherID = $DATA['id'];
if ($SESSION_USERNAME == "") {
    echo ("<script>window.location = '../admin-municipality-login.php';</script>");
} 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <a class="navbar-brand" href="index.php" style="margin-left: 15%;">
    <!-- <img src="../images/logo.jpg" alt="Logo" width="40" height="40"> -->
    
     <?php echo $DATA['municipality']; ?> Municipality </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
 <!--      <li class="nav-item">
        <a class="nav-link" id="municipality" href="municipality-account.php">Municipality </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="crops" href="crops.php">Crops</a>
      </li> -->
     
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<style type="text/css">
  #navbarResponsive{
    margin-right: 15%;
  }
</style>