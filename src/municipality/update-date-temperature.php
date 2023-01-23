<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Municipal Admin</title>
  <?php include '../includes/admin_libraries.php';
  include '../includes/conn.php';
    $climatic_id = $_REQUEST['climatic_id'];


    $getClimatic = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM municipality_climatic_data where id = '".$climatic_id."' "));
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
          <h3 class="font-weight-light mb-4 mt-1">Insert <?php echo $DATA['municipality']; ?> Agro-Climatic Data</h3>
        </div>
     
      </div> 

      <section>
  <form action="" method="POST" enctype="multipart/form-data">

  <input type="hidden" name="climatic_dataID" value ="<?php echo $getClimatic['id']; ?>">
                        
                            <div class="row">


                                 <div class="col-12" hidden>
                                    <div class="form-group">
                                        <label for="date_fromID">Municipality</label>
                                        <input type="hidden" class="form-control" id="date_fromID" name="municipality_id" value="<?php echo $DATA['id'] ?>" readonly="">
                                        <input type="text" name="created_by" class="form-control" value="<?php echo $DATA['email']; ?>">

                                    </div>
                                </div>

                         

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="todate">Select Data</label>
                                        <input type="date" class="form-control" id="todate" name="todate" value="<?php echo $getClimatic['todate']; ?>">

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="temperatureID">Minimum Temperature*</label>
                                        <input type="text" class="form-control" id="temperatureID" name="min_temp" value ="<?php echo $getClimatic['min_temp']; ?>" required>

                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="temperatureID">Max Temperature*</label>
                                        <input type="text" class="form-control" id="temperatureID" name="max_temp" value ="<?php echo $getClimatic['max_temp']; ?>" required>

                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="humidityID">Humidity*</label>
                                        <input type="text" class="form-control" id="humidityID" name="humidity" value ="<?php echo $getClimatic['humidity']; ?>" required>

                                    </div>
                                </div>

                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="rainfallID">Rainfall*</label>
                                        <input type="text" class="form-control" id="rainfallID" name="rainfall" value ="<?php echo $getClimatic['rainfall']; ?>" required>

                                    </div>
                                </div>

                                 
 

                            


                                


                               


                           
                            </div>

 
                            <button type="submit" class="btn btn-success" name="saveBtn" style="float: right;">Save &nbsp; </button>
                    <button type="button" class="btn btn-info" onclick="backBtn()" style="float: right; margin-right: 5px;">Back &nbsp; </button>
                    </form>
 
      </section>


    </div>
  </section>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>



<?php if(isset($_POST['saveBtn'])){
$climatic_dataID = $_POST['climatic_dataID'];
  $municipality_id = $_POST['municipality_id'];
  $min_temp = $_POST['min_temp'];
  $max_temp = $_POST['max_temp'];
  $humidity = $_POST['humidity'];
  $rainfall = $_POST['rainfall'];
  $todate = $_POST['todate'];
 
 
 
  $createdBy = $_POST['created_by'];



 

 
$updateClimatic = mysqli_query($conn,"UPDATE municipality_climatic_data SET todate = '".$todate."', min_temp = '".$min_temp."', max_temp = '".$max_temp."', humidity = '".$humidity."',rainfall = '".$rainfall."'  WHERE id = '".$climatic_dataID."'");




 echo '
                <script>
                  
      alert("Data updated successfully");
    window.location.href = "update-date-temperature.php?climatic_id='.$climatic_id.'"
                </script>
              ';


} ?>


  <script>

    function backBtn(){
window.location.href = "index.php";
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