<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CSMGIS</title>
  <?php 
include 'includes/conn.php';
  include 'includes/libraries.php'; 

  ?>


</head>
<?php // include 'includes/municipality-navbar.php'; ?>

<body >
  <section >
       <center>
     <div class="row">
       <div class="col-sm-6" style="padding-top: 10%;  ">
      <div class="row">
       
         <h1 class="col-sm-12" id="title" style=" padding: 0% 35%;">crops  </h1>
         <h1 class="col-sm-12" id="title" style="  padding: 0% 35%;">suitability</h1>
         <h1 class="col-sm-12" id="title" style="  padding: 0% 35%;">mapping</h1>
     
        </div>
    
       </div>
 
       <div class="col-sm-6" style="margin-bottom: 10%; padding-top: 10%; ">
          <div class="row"> 
         <h4 class="col-sm-12" id="title2">ABOUT US</h4>
         <p class="col-sm-7" id="contentAboutus">
This crop suitability mapping system is developed by a team of Information Systems Students from West Visayas State University. They wanted to help out our farmers farmers and agricultural sectors and organizations in crop management and diversify the use of their crop lands in the most inexpensive way.</p>

       
       </div>
         <button class="btn btn-success btn-lg" style=" float: left;"  onclick="getStarted()">GET STARTED &nbsp;  <i class="fas fa-arrow-right"></i></button>
    </div>


       <div class="col-sm-12"  >
    
         <!-- <h4 id="title2">Contact us</h4> -->
         <div class="row">
       <p class="col-sm-12" id="contentAboutus2" style=" padding: 0% 4%; "><i class="fab fa-facebook-square"></i>&nbsp; www.facebook.com/csmgis</p>
       <p class="col-sm-12" id="contentAboutus2" style="padding: 0% 5%;  "><i class="far fa-envelope"></i>&nbsp; csmgis2021@gmail.com</p>
       </div>
           
              </div>
     </div> 


    </center>
  </section>
</body>

</html>

<script type="text/javascript">
      function getStarted(){
// window.location.href = "user_login.php";
window.location.href = "user/recommend_municipality.php?crops=&date_from=&date_to=";
    }
</script>

<style>
 
  #contentAboutus{
    font-size: 1.5em;
    color:white;
    width: 80%;
    font-weight: normal;
    text-align: left;
    margin-bottom: 4%;
  }

  #contentAboutus2{
    font-size: 1.2em;
    color:white;
    width: 80%;
    font-weight: normal;
    text-align: right;
    
  }
  #title2{
    text-transform: uppercase; color:white; font-size: 1.8em; text-align: left;
  }
  #title{
    text-transform: uppercase; color: white; font-family: arial; font-size:4em;  
    font-weight: bold;   text-align: left;
  }
  .login-page {
    width: 360px;
    padding: 8% 0 0;
    margin: auto;
  }

  .form {
    position: relative;
    z-index: 1;
    background-color: #ffffff;
    /* border: 1px solid #fff; */
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }

  .form input {
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
  }

  .form button {
    text-transform: uppercase;
    outline: 0;


    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
    transition: all 0.3s;
  }

  .form button:hover,
  .form button:active,
  .form button:focus {
    transform: scale(1.05);
  }

  .form .message {
    margin: 15px 0 0;
    color: #b3b3b3;
    font-size: 12px;
  }

  .form .message a {
    color: #4CAF50;
    text-decoration: none;
  }

  .form .register-form {
    display: none;
  }
 
 
  /*body {*/
  
 
  
    /*background-color: #acdf87;*/

    /*background:*/
 /*linear-gradient(rgba(255, 0, 0, 0.20), rgb(153,101,21)),*/
    /*url("uploaded_images/bgimage3.png");;*/

 /*       background-repeat: no-repeat;
    background-size: 130% 120%;*/
    /*height: 800px;*/
  /*}*/
  body {
  
 
  
    background-color: #acdf87;
    background:url("uploaded_images/bgimage3.png");
     background-repeat: no-repeat;
     background-size: 120% 120%;
     height: 800px
     /*width:800px;*/
  }

</style>



<!-- 
<?php
if (isset($_POST['loginBtn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
 

  if ($username == 'ajuy' AND $password == '1234') {
?> <script>
      window.location.href = "municipality/index.php";
    </script> <?php
            } else {
              ?> <script>
      alert("Login Failed")
    </script> <?php
            }
          }
              ?>
 -->


 