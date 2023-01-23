  <?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CSMGIS </title>
  <?php include '../includes/admin_libraries.php';
  include '../includes/conn.php';
  ?>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
 
</head>

<body>
  <!-- Navigation -->
  <?php include './navbar.php';
// $request_cropsID2 = $_REQUEST['municipality'];
  $request_municipalityID = $_REQUEST['municipality'];
 $from_date = $_REQUEST['date_from'];
$to_date = $_REQUEST['date_to'];
  $getcropsName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where id_crops = '".$request_municipalityID."' "));

 $getMunicipalityID = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM municipality_account where id = '".$request_municipalityID."' "));

   // $getcropsName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where temperature >= '".$getmuinicipalityName['min_temp']."' AND temperature <= '".$getmuinicipalityName['max_temp']."' AND  del = 'N' "));


  
   ?>
  <?php 
           
 // $getmuinicipalityName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM municipality_climatic_data as a inner join municipality_account as b on a.municipality_id = b.id  where   a.todate BETWEEN '".$from_date."' AND '".$to_date."' and b.id = '".$request_municipalityID."' "));
 $getmuinicipalityName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM   municipality_account    where  id = '".$request_municipalityID."' "));

  $getmuinicipalityName2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM   municipality_climatic_data where  municipality_id = '".$getmuinicipalityName['id']."' AND todate BETWEEN '".$from_date."' AND '".$to_date."' "));
           
$monthFirstDate = date("Y-m-d", strtotime("-3 months"));
// $getMunicipalityIDName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM municipality_account where id = '".$request_cropsID."' "));

            ?>



  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:7% !important; ">
    <div class="container page-container" >
      <div class="row">
      
        <div class="col-md-6" style="padding-left: 0; margin-bottom: 20px;" > 
     
       <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">Search Municipality </label>
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" role="form">

        <div class="row">
          <div class="col-sm-12" id="searchBox">
            <select class="form-control" name="municipality" required="">

              <?php if($request_municipalityID == ""){ ?>
              <option value="" selected="" disabled>Select Municipality..</option>
            <?php }else{ ?>
              <option value="<?php echo $request_municipalityID ?>"><?php echo $getMunicipalityID['municipality']; ?></option>
            <?php } ?>
              <?php  $getCrops = mysqli_query($conn, "SELECT * FROM municipality_account where del = 'N'");
              while($row = mysqli_fetch_array($getCrops)){
               ?>
               <option value="<?php echo $row['id']; ?>"><?php echo $row['municipality']; ?></option>
<?php } ?>

            </select>
            </div>

            <div class="col-sm-6" id="searchBox">

               <div class="form-group">
                <label for="fromdate">Date From</label>
    <?php if($from_date ==""){ ?>
                  <input type="date" class="form-control" name="date_from" value="<?php echo $monthFirstDate; ?>">   
                <?php }else{ ?>
               <input type="date" class="form-control" name="date_from" value="<?php echo $from_date; ?>">                                          
<?php } ?>                                    

                </div>

             
             
            </div>
  <div class="col-sm-6" id="searchBox">
             <div class="form-group">
                <label for="todate">Date To</label>
   <?php if($to_date == ""){ ?>
                     <input type="date" class="form-control" name="date_to" value="<?php echo date('Y-m-d'); ?>">   
                   
                <?php }else{ ?>
                      <input type="date" class="form-control" name="date_to" value="<?php echo $to_date; ?>">                              
             <?php } ?>                                    

                </div>

             
            </div>

<div class="col-sm-12" id="searchBox">
            <button type="submit"   class="btn btn-primary " style="float:right;">Find</button>
</div>



<div class="col-sm-12">

   <h3>Recommended Crops</h3>

   <?php //if(){} ?>   
      <table class="table table-bordered">
        <head>
          <tr>
            <th>ID</th>
            <th>Crops Name <?php //echo $getmuinicipalityName2['min_temp']."/".$getmuinicipalityName2['max_temp'] ?></th>
            <th>Temperature Min/Max <?php //echo $getmuinicipalityName2['rainfall']."/".$getmuinicipalityName2['humidity']; ?></th>
            <th>Humidity Min/Max</th>
            <th>Rainfall Min/Max</th>
            <th>Elevation</th>
            <th>Soil pH</th>
          </tr>
        </head>
 
        <tbody>
          <?php 
  // $getRecommendedCrops = mysqli_query($conn, "SELECT * FROM crops where min_humidity >= '".$getmuinicipalityName2['humidity']."' AND max_humidity <= '".$getmuinicipalityName2['humidity']."' AND min_rainfall >= '".$getmuinicipalityName2['rainfall']."' AND max_rainfall <= '".$getmuinicipalityName2['rainfall']."' AND min_temperature >= '".$getmuinicipalityName2['min_temp']."' AND max_temperature <= '".$getmuinicipalityName2['max_temp']."' AND del = 'N'");
         

// $getRecommendedCrops = mysqli_query($conn, "SELECT * FROM crops where min_temperature >= '".$getmuinicipalityName2['max_temp']."' AND  max_temperature <= '".$getmuinicipalityName2['min_temp']."' AND   max_rainfall <= '".$getmuinicipalityName2['rainfall']."' AND   max_humidity <= '".$getmuinicipalityName2['humidity']."' AND del = 'N'");

 $getRecommendedCrops = mysqli_query($conn, "SELECT * FROM crops where min_temperature >= '".$getmuinicipalityName2['min_temp']."' AND max_temperature <= '".$getmuinicipalityName2['max_temp']."' AND max_rainfall <= '".$getmuinicipalityName2['rainfall']."' AND max_humidity >= '".$getmuinicipalityName2['humidity']."' AND del = 'N'");

 // $getRecommendedCrops = mysqli_query($conn, "SELECT * FROM crops where min_temperature >= '25' AND max_temperature <= '28' AND max_rainfall <= '415.5' AND max_humidity >= '81' and del = 'N'");
// $mintemp = '25';
// $maxtemp = '28';
// $rainfallss = '415.5';
// $humiditys = '85';
  // $getRecommendedCrops = mysqli_query($conn, "SELECT * FROM crops where min_temperature >= '".$getmuinicipalityName2['max_temp']."' AND max_temperature <= '".$getmuinicipalityName2['min_temp']."' AND max_rainfall <= '".$getmuinicipalityName2['rainfall']."' AND max_humidity <= '".$getmuinicipalityName2['humidity']."' and del = 'N'");


// a.max_temp >= '".$getcropsName['min_temperature']."' and a.min_temp <= '".$getcropsName['max_temperature']."'
          while($row = mysqli_fetch_array($getRecommendedCrops)){
           ?>
          
          <tr>
            <td><?php echo $row['id_crops']; ?></td>
             <td><?php echo $row['crops_name'] ?></td>
            <td><?php echo $row['min_temperature']."/".$row['max_temperature'] ?></td>
            <td><?php echo $row['min_humidity']."/".$row['max_humidity']; ?></td>
            <td><?php echo $row['min_rainfall']."/".$row['max_rainfall']; ?></td>
             <td><?php echo $row['elevation']; ?></td>
            <td><?php echo $row['min_soilph']."/".$row['max_soilph']; ?></td>
          </tr>

        <?php } ?>
        </tbody>
      </table>



</div>

            </div>



      </form>
        </div>


         

<div class="col-sm-6" >
  


  <div class="row">
              <div class="col-sm-12" >
                


     

                 <?php if($request_municipalityID == ""){ ?>

                 <?php }else{ ?>
<!-- <div class="row" style=" width: 1000px;">
              
  <div class="col-sm-6" style="padding-left: 20%;">
                <p>Municipality Name: <b><?php echo $getmuinicipalityName['municipality']; ?></b></p>
              </div>
            
              <div class="col-sm-6"  >
                 <p>Temperature min/max: <b><?php echo $getmuinicipalityName2['min_temp']."/".$getmuinicipalityName2['max_temp']; ?></b></p>
              </div>
              <div class="col-sm-6" style="padding-left: 20%;" >
                 <p>Humidity: <b><?php echo $getmuinicipalityName2['humidity']; ?></b></p>
              </div>
              <div class="col-sm-6"  >
                 <p>Rainfall: <b><?php echo $getmuinicipalityName2['rainfall']; ?> </b></p>
              </div>
         
</div> -->
      <div class="row" style=" width: 800px;">
      <div class="col-sm-12"  style="padding-left: 30%;">
        <table class="table">
          <thead>
            <tr>
              <th>Municipality</th>
              <th>Average Temperature Min/Max</th>
              <th>Average Humidity</th>
              <th>Average Rainfall</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td><?php echo $getmuinicipalityName['municipality']; ?></td>
              <td><?php echo $getmuinicipalityName2['min_temp']."/".$getmuinicipalityName2['max_temp']; ?></td>
              <td><?php echo $getmuinicipalityName2['humidity']; ?></td>
              <td><?php echo $getmuinicipalityName2['rainfall']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

        <?php } ?>

                
              <div class="col-sm-12" hidden  >
                <?php if($getmuinicipalityName['latitude']== ""){ ?>
                  <input type="text" name="" id="latID" value="10.7202">
                  <input type="text" name="" id="longID" value="122.5621">
                   <input type="text" id="municipalitymapID" name="" value="Iloilo">
                <?php }else{ ?>
                <input type="text" name="lat" id="latID" value="<?php echo $getmuinicipalityName['latitude'] ?>">
                <input type="text" name="long" id="longID" value="<?php echo $getmuinicipalityName['longitude']; ?>">
                  <input type="text" id="municipalitymapID" name="" value="<?php echo $getmuinicipalityName['municipality']; ?>">
              <?php } ?>
              
              </div>
   
        </div>
  
<div class="col-sm-12" style="padding-left: 15%;">
     

  <?php // if($getmuinicipalityName['latitude'] == ""){ ?>
    <!-- <div id="map2"></div> -->
  <?php //}else{ ?>
     <div id="map"></div>

   <?php //} ?>
</div>

</div>
</div>


      </div>

     

  
         

 


    </div>
  </section>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>






  <script>
 
 
 

// function initMap2() {


//      const lats2 =document.getElementById("latID").value;
// const longs2 =document.getElementById("longID").value;

//    const municipalitymapID2 = document.getElementById("municipalitymapID").value;
 
 

// var mapProp= {
      

//   center:new google.maps.LatLng(lats2,longs2),
//   zoom:13,
// };
// var map = new google.maps.Map(document.getElementById("map"),mapProp);

//   new google.maps.Marker({
//     position: map,
//     map,
//     title: municipalitymapID2,
//   });


// }

function initMap() {

var lats = parseFloat(document.getElementById("latID").value);
    var longs = parseFloat(document.getElementById("longID").value);

 

   const municipalitymapID = document.getElementById("municipalitymapID").value;

  const myLatLng = {
   lat: lats, 
   lng: longs 
 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: myLatLng,
     // mapTypeId: "satellite",
  });



  new google.maps.Marker({
    position: myLatLng,
    map,
    title: municipalitymapID,
  });

    // map.setTilt(45);
}


 // function initMap() {
 //  var lats = parseFloat(document.getElementById("latID").value);
 //    var longs = parseFloat(document.getElementById("longID").value);

 

  //  const municipalitymapID = document.getElementById("municipalitymapID").value;
  // const map = new google.maps.Map(document.getElementById("map"), {
  //   center: { lat: lats, lng:longs },
  //   zoom: 15,
  //   mapTypeId: "satellite",
 
  // });

  //   new google.maps.Marker({
  //   position: myLatLng,
  //   map,
  //   title: municipalitymapID,
  // });

//   map.setTilt(45);
// }


  </script>

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&channel=2"async></script> 
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKps5AWXn0f1da43ALOJY-ROV3b8lMpBA&callback=initMap"></script>
   <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&channel=2"async></script> -->
</html>




  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&channel=2"async></script> -->

<style>

  #searchBox{
    margin-bottom: 1%;
  }

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
  #rec_crops {
    color: #111;
border-bottom: 3px solid #acdf87;
  }

 
 #map {
  float: center;
  margin-left: 20%;
      width: 750px;
      height: 500px;
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