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
  <?php include './navbar.php';
  
  $crops_id = $_REQUEST['id'];


  $getCrops = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where id_crops = '".$crops_id."' ")); 
  ?>



  <!-- Page Content -->
  <section class="py-5 page-content" id="about" >
    <div class="container page-container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="font-weight-light mb-4 mt-1">Insert Crops</h3>
        </div>
     
      </div>

      <section>
  <form action="" method="POST" enctype="multipart/form-data"> 
                        



                            <div class="row">
                            <input type="text" class="form-control" name="crops_id" value ="<?php echo $getCrops['id_crops']; ?>" hidden>

                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="cropnameID">Name</label>
                                        <input type="text" class="form-control" id="cropnameID" name="cropname" value ="<?php echo $getCrops['crops_name']; ?>" required>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="elevationID">Elevation*</label>
                                        <input type="text" class="form-control" id="elevationID" name="elevation" value ="<?php echo $getCrops['elevation']; ?>" required>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="min_temperature">Minimum Temperature*</label>
                                        <input type="text" class="form-control" id="min_temperature" name="min_temperature" value ="<?php echo $getCrops['min_temperature']; ?>" required>

                                    </div>
                                </div>
                             

                                 <div class="col-6">
                                    <div class="form-group">
                                        <label for="max_temperature">Maximum Temperature*</label>
                                        <input type="text" class="form-control" id="max_temperature" name="max_temperature" value ="<?php echo $getCrops['max_temperature']; ?>"required>

                                    </div>
                                </div>

                               

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="minhumidityID">Minimum Humidity*</label>
                                        <input type="text" class="form-control" id="minhumidityID" name="minhumidity" value ="<?php echo $getCrops['min_humidity']; ?>" required>

                                    </div>
                                </div>

                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="maxhumidityID">Maximum Humidity*</label>
                                        <input type="text" class="form-control" id="maxhumidityID" name="maxhumidity" value ="<?php echo $getCrops['max_humidity']; ?>" required>

                                    </div>
                                </div>

                                   <div class="col-6">
                                    <div class="form-group">
                                        <label for="minrainfallID">Minimum Rainfall*</label>
                                        <input type="text" class="form-control" id="minrainfallID" name="minrainfall" value ="<?php echo $getCrops['min_rainfall']; ?>" required>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="maxrainfallID">Maximum Rainfall*</label>
                                        <input type="text" class="form-control" id="maxrainfallID" name="maxrainfall" value ="<?php echo $getCrops['max_rainfall']; ?>" required>

                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="minsoilphID">Minimum Soilph*</label>
                                        <input type="text" class="form-control" id="minsoilphID" name="minsoilph" value ="<?php echo $getCrops['min_soilph']; ?>" required>

                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="maxsoilphID">Maximum Soilph*</label>
                                        <input type="text" class="form-control" id="maxsoilphID" name="maxsoilph" value ="<?php echo $getCrops['max_soilph']; ?>" required>

                                    </div>
                                </div>

                               
                                


                                <div class="col-12">
                                     <div class="form-group">

                                         <label for="instructionID">Instruction</label>
      <textarea class="form-control" id="instructionID" rows="3" id="instructionID" name="instruction" ><?php echo $getCrops['instruction']; ?></textarea>

                                    </div>
                                </div>

                              <!-- <div></div> -->

                            


                       


                               


                           
                            </div>

 
                            <!-- <button type="submit" class="btn btn-success" onclick="savebtn()" style="float: right;">Save &nbsp; </button> -->
                             <button type="submit" class="btn btn-success" name="update_crops" style="float: right;">Save &nbsp; </button>
                    <button type="button" class="btn btn-info" onclick="backBtn()" style="float: right; margin-right: 5px;">Back &nbsp; </button>
                    </form>  
 
      </section>


    </div>
  </section>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>




<?php if(isset($_POST['update_crops'])){
   $crops_id = $_POST['crops_id']; 
  $cropname = $_POST['cropname'];
  $elevation = $_POST['elevation'];
  $minhumidity = $_POST['minhumidity'];
  $maxhumidity = $_POST['maxhumidity'];
  $minrainfall = $_POST['minrainfall'];
  $maxrainfall = $_POST['maxrainfall'];
  $minsoilph = $_POST['minsoilph'];
  $maxsoilph = $_POST['maxsoilph'];
  $max_temperature = $_POST['max_temperature'];
  $min_temperature = $_POST['min_temperature'];
  $instruction = $_POST['instruction'];
 
 
  $date_created = date('Y-m-d');
 

 $update_query = mysqli_query($conn, "UPDATE crops SET crops_name = '".$cropname."', elevation = '".$elevation."', min_temperature = '".$min_temperature."' ,max_temperature = '".$max_temperature."', min_humidity = '".$minhumidity."' , max_humidity = '".$maxhumidity."' , min_rainfall = '".$minrainfall."', max_rainfall = '".$maxrainfall."', min_soilph = '".$minsoilph."' , max_soilph = '".$maxsoilph."', instruction = '".$instruction."'  WHERE id_crops = '".$crops_id."' ");

echo '
                <script>
                  
      alert("Crops Updated successfully");
    window.location.href = "crops.php"
                </script>
              ';


} ?>


  <script>
 
    function backBtn(){
window.location.href = "crops.php";
    }

 function savebtn(){
                    // $.ajax({
                    //     type: 'POST',
                    //     url: 'api/student/names1',
                    //     data: JSON.stringify(employee),
                    //     contentType: 'application/json; charset=utf-8',
                    //     dataType: 'json',
                    //     success: function (data) {
                    //         alert('data is ' + data);
                    //     },
                    //     error: function () {
                    //         alert("INSIDE FAILURE");
                    //     }
                    // });


                    $.ajax({
                    // url: "https://api.github.com/users/blackmiaool/repos",
                      url: "https://api.github.com/repos/reyrey1616/CSM-GIS-API",
                    jsonp: true,
                    method: "GET",
                    dataType: "json",
                    success: function(res) {
                      console.log(res)
                      // alert(res)
                    }
                  });
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
  #crops {
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