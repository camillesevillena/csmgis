<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Provincial Admin</title>
  <?php include './includes/libraries.php'; ?>

</head>
<?php 
include 'includes/provincial-navbar.php'; 
include 'includes/conn.php';
  session_start();

?>

<body>
  <div class="login-page">
    <div class="form">
      <h3 class="font-weight-light mb-4"><i class="fas fa-user"></i> Login</h3>


      <form class="login-form" action="" method="POST">
        <input type="text" name="username" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" class="btn btn-success" name="loginBtn">login</button>
      </form>
    </div>
  </div>
</body>

</html>

<style>
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
 
 
  body {
  
 
  
    /*background-color: #acdf87;*/
    background:url("uploaded_images/adminbg.png");
        background-repeat: no-repeat;
     background-size: 120% 120%;
     height: 800px
  }
</style>



<!-- <?php
if (isset($_POST['loginBtn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
 

  if ($username == 'admin' AND $password == 'admin') {
?> <script>
    alert("Login Success")
      window.location.href = "provincial/municipality-account.php";
    </script> <?php
            } else {
              ?> <script>
      alert("Login Failed")
    </script> <?php
            }
          }
              ?> -->


<?php
    if (isset($_POST['loginBtn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' and password = '$password' ") or die(mysqli_error($conn));
        if (mysqli_num_rows($login) > 0) {
            $_SESSION['username'] = $username;
    ?> 
    <script>
                alert('Login Success');
                window.location.href = 'provincial/municipality-account.php'
            </script> 
            <?php
                    } else {
                        ?>
                         <script>
                alert('Login Failed');
                window.location.href = 'admin-provincial-login.php'
            </script>
             <?php
                    }
                }
                        ?>