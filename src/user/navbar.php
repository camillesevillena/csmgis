<?php
// session_start();

// $SESSION_USERNAME = $_SESSION['email'];

// $getAdmin = mysqli_query($conn, "SELECT * FROM user_login WHERE email = '$SESSION_USERNAME'") or die(mysqli_error($conn));
// $DATA = mysqli_fetch_assoc($getAdmin);
// // $teacherID = $DATA['id'];
// if ($SESSION_USERNAME == "") {
//     echo ("<script>window.location = '../user_login.php';</script>");
// } 
?>

 

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
<a class="navbar-brand" href="../index.php" style="margin-left: 15%;">
   <img src="../uploaded_images/logo.png" alt="Logo" width="70" height="70">  
    Crop Suitability Mapping Using Geographic Information System  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">

  <!--       <li class="nav-item">
        <a class="nav-link" href="../index.php">Home</a>
      </li>
 -->
        <li class="nav-item">
        <a class="nav-link" id="rec_municipality" href="recommend_municipality.php?crops=&date_from=&date_to=">Recommend Location </a>
      </li>
      <li class="nav-item">
       
         <a class="nav-link" id="rec_crops" href="recommend_crops.php?municipality=&date_from=&date_to=">Recommend Crops</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" id="forecast" href="forecasting.php?municipality=&date_from=&date_to=">Dashboard </a>
      </li>
    
     
    
    </ul>
  </div>
</nav>

<style type="text/css">
  #navbarResponsive{
    margin-right: 15%;
  }
  .page-content{
    margin-right: 300px;
  }
</style>