  <?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Provincial Admin</title>
  <?php include '../includes/admin_libraries.php';
  include '../includes/conn.php';
  ?>
</head>

<body>
  <!-- Navigation -->
  <?php include './navbar.php'; ?>



  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:3% !important;">
    <div class="container page-container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="font-weight-light mb-4 mt-1">Insert Municipality Account</h3>
        </div>
     
      </div>

      <section>
  <form action="" method="POST" enctype="multipart/form-data">
                        
                            <div class="row">

                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="text" class="form-control" id="email" name="email" required>

                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pword">Password*</label>
                                        <input type="password" class="form-control" id="pword" name="password" required>

                                    </div>
                                </div>

                              

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="fname">First Name*</label>
                                        <input type="text" class="form-control" id="fname" name="fname" required >

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="mname">Middle Name*</label>
                                        <input type="text" class="form-control" id="mname" name="mname" required >

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="lname">Last Name*</label>
                                        <input type="text" class="form-control" id="lname" name="lname"  required>

                                    </div>
                                </div>

                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="genderID">Gender*</label>
                                        <select id="genderID" class="form-control" name="gender" required>
                                            <option value="" selected>Choose...</option>
                                            <option value="Male"> Male </option>
                                            <option value="Female"> Female </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contactnum">Contact Number*</label>
                                        <input type="text" class="form-control" id="contactnum" name="contact_num" required>

                                    </div>
                                </div>

                                    <div class="col-12">
                                    <div class="form-group">
                                        <label for="municipalityID">Municipality*</label>
                                       <?php //include 'muncipality-of-iloilo.php';  ?>
                                        <input type="text" class="form-control" id="municipalityID" name="municipality" required>
                                    </div>
                                </div>


                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="elevationId">Elevation *</label>
                                        <input type="text" class="form-control" id="elevationId" name="elevation" required>

                                    </div>
                                </div>

                               <div class="col-6">
                                    <div class="form-group">
                                        <label for="soilphID">Soil pH *</label>
                                        <input type="text" class="form-control" id="soilphID" name="soilph" required>

                                    </div>
                                </div>

                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="latID">Latitude *</label>
                                        <input type="text" class="form-control" id="latID" name="lattitude" required>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="longID">Longitude *</label>
                                        <input type="text" class="form-control" id="longID" name="longitude" required>

                                    </div>
                                </div>


                                


                               


                           
                            </div>

 
                            <button type="submit" class="btn btn-success" name="add_municipality" style="float: right;">Save &nbsp; </button>
                    <button type="button" class="btn btn-info" onclick="backBtn()" style="float: right; margin-right: 5px;">Back &nbsp; </button>
                    </form>
 
      </section>


    </div>
  </section>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>


<?php if(isset($_POST['add_municipality'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  $contact_num = $_POST['contact_num'];
  $municipality = $_POST['municipality'];
  $elevation = $_POST['elevation'];
  $soilph = $_POST['soilph'];
   $lattitude = $_POST['lattitude'];
  $longitude = $_POST['longitude'];
  $date_created = date('Y-m-d');





 $insertQuery = mysqli_query($conn, "INSERT INTO `municipality_account` VALUES (null, '$email', '$password' , '$fname', '$mname', '$lname', '$gender', '$contact_num',   '$municipality', '$elevation',  '$soilph', '$lattitude',  '$longitude', '$date_created', 'Active', 'N')");





 echo '
                <script>
                  
      alert("Municipality account added successfully");
    window.location.href = "municipality-account.php"
                </script>
              ';


} ?>



  <script>

    function backBtn(){
window.location.href = "municipality-account.php";
    }
 
    function confirmRemove(id) {

      if (confirm("Are you sure you want to Disable this Student?") == true) {
        window.location.href = "action.php?id=" + id;
      }
    }

    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }


    function insertMunicipality() {
      window.location.href = "insert-municipality.php";
    // window.open('insert-municipality.php');
}
  </script>


</html>






<style>
  body{
    /*background-color: #acdf87 ;*/

  }

/*  table>thead>tr>th{
    background-color: white;
    color:#000000;
  }*/

/*   table>tbody>tr>td{
    background-color: white;
    color:#000000;
  }*/
  #municipality {
    color: #111;
    border-bottom: 3px solid #acdf87;
  }

 
/*  footer {
    padding: 1em;
    background: #f3f3f3;
  }
*/
 
  #printableArea {
    display: none;
  }


  @media print {

    #printableArea {
      display: block;
    }

  }
</style>