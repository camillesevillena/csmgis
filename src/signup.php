<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crop Suitability Mapping Using Geographic Information System</title>
  <?php 
include 'includes/conn.php';
  include 'includes/libraries.php'; 

  ?>


</head>
<?php // include 'includes/municipality-navbar.php'; ?>

<body>
  <div class="login-page">
    <div class="form">
      <h3 class="font-weight-light mb-4">Sign up </h3>


      <form class="login-form" action="" method="POST">
        <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
               <label for="email">Email</label>
               <input type="email" class="form-control" id="email" name="email" required>

              </div>
          </div>
           <div class="col-sm-6">
              <div class="form-group">
               <label for="pass">Password</label>
               <input type="password" class="form-control" id="email" name="password" required>

              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
               <label for="fname">First Name</label>
               <input type="text" class="form-control" id="fname" name="fname" required>

              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
               <label for="mname">Middle Name</label>
               <input type="text" class="form-control" id="mname" name="mname"  >

              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
               <label for="lname">Last Name</label>
               <input type="text" class="form-control" id="lname" name="lname"  >

              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
               <label for="contact_num">Contact number</label>
               <input type="text" class="form-control" id="contact_num" name="contact_num"  >

              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group">
               <label for="address">Address</label>
               <input type="text" class="form-control" id="address" name="address"  >

              </div>
          </div>


           <div class="col-sm-12" style="margin-top: 5%;">
     <button type="submit" class="btn btn-success" name="savebtn" style="float: right;">Save &nbsp; </button>

             
          </div>
        </div>

      </form>
    </div>
  </div>
</body>

</html>

<style>
  .login-page {
    width: 1000px;
    padding: 8% 0 0;
    margin: auto;
  }

  .form {
    position: relative;
    z-index: 1;
    background-color: #ffffff;
    /* border: 1px solid #fff; */
    max-width: 1000px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }

  .form input {
    outline: 0;
    background: white;
    width: 100%;
    /*border: 0;*/
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
 
 
  body {
  
 
  
    /*background-color: #acdf87;*/
    background:url("uploaded_images/background_crops.jpg");;
  }
</style>

 



<?php if(isset($_POST['savebtn'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $contact_num = $_POST['contact_num'];
  $address = $_POST['address'];
  $date_created = date('Y-m-d');
  $status = 'Active';
 
 
  $date_created = date('Y-m-d');
 

 $insertQuery = mysqli_query($conn, "INSERT INTO `user_login` VALUES (null, '$email', '$password' , '$fname', '$mname', '$lname', '$contact_num', '$address',   '$date_created', '$status')");





 echo '
                <script>
                  
      alert("Registered successfully");
    window.location.href = "user_login.php"
                </script>
              ';


} ?>