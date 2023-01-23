  <?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User</title>
  <?php include '../includes/admin_libraries.php';
  include '../includes/conn.php';
  ?>
</head>

<body>
  <!-- Navigation -->
  <?php include './navbar.php';

  $request_municipalityID = $_REQUEST['municipality'];


  $getmuinicipalityName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM municipality_climatic_data as a inner join municipality_account as b on a.municipality_id = b.id  where municipality_id = '".$request_municipalityID."' "));


   $getcropsName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where temperature >= '".$getmuinicipalityName['min_temp']."' AND temperature <= '".$getmuinicipalityName['max_temp']."' AND  del = 'N' "));

   ?>



  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:1% !important; ">
    <div class="container page-container">
      <div class="row">
        <div class="col-md-12">
          <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">Search Municipality </label>
     </div>
        <div class="col-md-12" style="padding-left: 0; margin-bottom: 20px;" > 
     
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" role="form">

        <div class="row">
          <div class="col-sm-6">
            <select class="form-control" name="municipality">

              <?php if($request_municipalityID == ""){ ?>
              <option value="" selected="" disabled>Select Municipality..</option>
            <?php }else{ ?>
              <option value="<?php echo $request_municipalityID ?>"><?php echo $getmuinicipalityName['municipality']; ?></option>
            <?php } ?>
              <?php  $getMunicipality = mysqli_query($conn, "SELECT * FROM municipality_climatic_data as a inner join municipality_account as b on a.municipality_id = b.id where a.del = 'N'");
              while($row = mysqli_fetch_array($getMunicipality)){
               ?>
               <option value="<?php echo $row['municipality_id']; ?>"><?php echo $row['municipality']; ?></option>
<?php } ?>

            </select>
            </div>

<div class="col-sm-6">
            <button type="submit"   class="btn btn-primary ">Find</button>
</div>
            </div>
      </form>
        </div>
      </div>

      <section>

        <?php if($request_municipalityID == ""){
          echo "";
        }else{ ?>
          <div class="row">
              <div class="col-sm-6">
                <p>Municipality Name: <b><?php echo $getmuinicipalityName['municipality']; ?></b></p>
              </div>
              <div class="col-sm-6">
                <p>Date: <b><?php echo $getmuinicipalityName['todate']; ?></b></p>
              </div>
              <!-- <div class="col-sm-4">
                 <p>Temperature: <b><?php echo $getmuinicipalityName['temperature']; ?></b></p>
              </div> -->
              <div class="col-sm-6">
                 <p>Humidity: <b><?php echo $getmuinicipalityName['humidity']; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Rainfall: <b><?php echo $getmuinicipalityName['rainfall']; ?></b></p>
              </div>
              
              <div class="col-sm-6">
                 <p>Minimum Temperature: <b><?php echo $getmuinicipalityName['min_temp']; ?></b></p>
              </div>
                <div class="col-sm-6">
                 <p>Maximum Temperature: <b><?php echo $getmuinicipalityName['max_temp']; ?></b></p>
              </div>
 

              <div style="padding-top: 5%; padding-bottom: 5%;"></div>
 

          </div>


          <h3>Recommended Crops</h3>

            <div class="row">
              <div class="col-sm-12">
                <p>Crops Name: <b><?php echo $getcropsName['crops_name']; ?></b></p>
              </div>
            
              <div class="col-sm-4">
                 <p>Temperature: <b><?php echo $getcropsName['temperature']; ?></b></p>
              </div>
              <div class="col-sm-4">
                 <p>Humidity: <b><?php echo $getcropsName['humidity']; ?></b></p>
              </div>
              <div class="col-sm-4">
                 <p>Rainfall: <b><?php echo $getcropsName['rainfall']; ?></b></p>
              </div>
              <div class="col-sm-4">
                 <p>Elevation: <b><?php echo $getcropsName['elevation']; ?></b></p>
              </div>

               <div class="col-sm-4">
                 <p>Soilph: <b><?php echo $getcropsName['soilph']; ?></b></p>
              </div>
              
   

          </div>



        <?php } ?>





   
      
      </section>


    </div>
  </section>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>






  <script>

 

    function confirmRemove(id) {

      if (confirm("Are you sure you want to Disable this Student?") == true) {
        window.location.href = "action.php?id=" + id;
      }
    }

 

  
  </script>


<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKps5AWXn0f1da43ALOJY-ROV3b8lMpBA&callback=initMap"></script> -->

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

  .insID{
    overflow: auto;
    height: 100px;
  }

  section{
    margin-bottom: 3%;
  }
  #rec_municipality {
    color: #111;
border-bottom: 3px solid #acdf87;
  }

 
  #printableArea {
    display: none;
  }


  @media print {

    #printableArea {
      display: block;
    }

  }
</style>