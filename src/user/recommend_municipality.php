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

 
</head>

<body>
  <!-- Navigation -->
  <?php include './navbar.php';

  $request_cropsID = $_REQUEST['crops'];
 $from_date = $_REQUEST['date_from'];
$to_date = $_REQUEST['date_to'];
  $getcropsName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where id_crops = '".$request_cropsID."' "));



   // $getcropsName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where temperature >= '".$getmuinicipalityName['min_temp']."' AND temperature <= '".$getmuinicipalityName['max_temp']."' AND  del = 'N' "));

 


 $getmuinicipalityName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `municipality_climatic_data` as a inner join municipality_account as b on a.municipality_id = b.id where a.min_temp >= '".$getcropsName['min_temperature']."' and a.max_temp <= '".$getcropsName['max_temperature']."' and a.humidity >= '".$getcropsName['min_humidity']."' and a.humidity <= '".$getcropsName['max_humidity']."' and a.rainfall >= '".$getcropsName['min_rainfall']."' AND a.rainfall <= '".$getcropsName['max_rainfall']."' and a.todate   BETWEEN '".$from_date."' AND '".$to_date."' "));

 // $getmuinicipalityName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `municipality_climatic_data` as a inner join municipality_account as b on a.municipality_id = b.id where a.min_temp >= '18' and a.max_temp <= '25' and a.humidity >= '65' and a.humidity <= '90' and a.rainfall >= '125' AND a.rainfall <= '4200' and a.todate BETWEEN '2021-01-30' and '2021-02-25'"));
  
   ?>

<style type="text/css">
	#form_comparison label {
    display: block;
}
</style>

  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:5% !important; ">
    <div class="container page-container">
      <div class="row">
      
        <div class="col-md-6" style="padding-left: 0; margin-bottom: 20px;" > 
     
       <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">Search Crops </label>
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" role="form">

        <div class="row">
          <div class="col-sm-6" id="searchBox">
            <!--  <select class="form-control" name="crops">

              <?php if($request_cropsID == ""){ ?>
              <option value="" selected="" disabled>Select Crops..</option>
            <?php }else{ ?>
              <option value="<?php echo $request_cropsID ?>"><?php echo $getcropsName['crops_name']; ?></option>
            <?php } ?>
              <?php  $getCrops = mysqli_query($conn, "SELECT * FROM crops where del = 'N'");
              while($row = mysqli_fetch_array($getCrops)){
               ?>
               <option value="<?php echo $row['id_crops']; ?>"><?php echo $row['crops_name']; ?></option>
<?php } ?>

            </select>   -->
<!--   
 <div class="form-check form-check-inline" style="display: inline-block;" >

	  <?php  $getCrops = mysqli_query($conn, "SELECT * FROM crops where del = 'N'");
              while($row = mysqli_fetch_array($getCrops)){
               ?>
 
     <?php if($request_cropsID == $row['id_crops']){ ?>          
  <input class="form-check-input" type="radio" name="crops" id="cropsID" value="<?php echo $row['id_crops']; ?>" checked >
<?php }else{ ?>
  <input class="form-check-input" type="radio" name="crops" id="cropsID" value="<?php echo $row['id_crops']; ?>">
<?php } ?>
  <?php echo $row['crops_name']; ?> 
  <?php } ?>
</div>   -->
 

   <div id="form_comparison" class="field radio_field">
 	 <?php  $getCrops = mysqli_query($conn, "SELECT * FROM crops where del = 'N'");
              while($row = mysqli_fetch_array($getCrops)){
               ?>
                 <?php if($request_cropsID == $row['id_crops']){ ?>          
        <label for="form_comparison_0"><input type="radio" id="form_comparison_0" name="crops" value="<?php echo $row['id_crops']; ?>" checked/>
         <?php echo $row['crops_name']; ?></label>
     <?php }else{ ?>
     	<label for="form_comparison_0"><input type="radio" id="form_comparison_0" name="crops" value="<?php echo $row['id_crops']; ?>"  />
         <?php echo $row['crops_name']; ?></label>
        <?php } }?>
    </div>  


            </div>

<div class="col-sm-6"> 
            <div class="col-sm-12" id="searchBox">

               <div class="form-group">
                <label for="fromdate">Date From</label>
                <?php if($from_date ==""){ ?>
                  <input type="date" class="form-control" name="date_from" value="<?php echo date('Y-m-d'); ?>">   
                <?php }else{ ?>
               <input type="date" class="form-control" name="date_from" value="<?php echo $from_date; ?>">                                          
<?php } ?>
                </div>

             
             
            </div>
  <div class="col-sm-12" id="searchBox">
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


</div>



<div class="col-sm-12" >
     <?php if($request_cropsID == ""){
          echo "";
        }else{ ?>
          <div class="row"  style="border-top:1px solid black;">
              <div class="col-sm-6" style="margin-top: 5%;">
                <p>Crops Name: <b><?php echo $getcropsName['crops_name']; ?></b></p>
              </div>
              <div class="col-sm-12">
                <p>Instruction: 
                  <?php if($getcropsName['instruction'] == ""){
                    echo "n/a";
                  }else{ ?>
                  <b><?php echo $getcropsName['instruction']; ?></b></p>
                <?php } ?>
              </div>
              <div class="col-sm-6">
                 <p>Temperature Minimum/Maximum: <br><b><?php echo $getcropsName['min_temperature']."/".$getcropsName['max_temperature']; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Humidity Minimum/Maximum: <br><b><?php echo $getcropsName['min_humidity']."/".$getcropsName['max_humidity']; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Rainfall Minimum/Maximum:<br> <b><?php echo $getcropsName['min_rainfall']."/".$getcropsName['max_rainfall']; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Elevation: <br><b><?php echo $getcropsName['elevation']; ?></b></p>
              </div>

               <div class="col-sm-6">
                 <p>Soilph Minimum/Maximum: <br><b><?php echo $getcropsName['min_soilph']."/".$getcropsName['max_soilph']; ?></b></p>
              </div>
             
                 

              <div style="padding-top: 3%; padding-bottom: 3%;"></div>
              

          </div>
<?php } ?>



</div>

            </div>



      </form>
        </div>


           <?php 
           

            ?>

<div class="col-sm-6" >
  


  <div class="row">
              <div class="col-sm-12">
                 <h3>Recommended Location</h3>





                 <?php if($request_cropsID == ""){ ?>

                 <?php }else{ ?>

                 <?php if($getmuinicipalityName['latitude'] == ""){ ?>
                   <!--  <p>Municipality Name: <b>No available Location for this crops</b></p>
              </div>
            
              <div class="col-sm-6">
                 <p>Temperature min/max: <b>000</b></p>
              </div>
              <div class="col-sm-6">
                 <p>Humidity: <b>000</b></p>
              </div>
              <div class="col-sm-6">
                 <p>Rainfall: <b>000</b></p>
              </div> -->


               <table class="table">
          <thead>
            <tr>
              <th>Location</th>
              <th>Average Temperature Min/Max</th>
              <th>Average Humidity</th>
              <th>Average Rainfall</th>
            </tr>
          </thead>

          <tbody>
            
            <tr>
              <td colspan="4" style="text-align: center;">No available Location for this crops</td>
              
            </tr>
    
          </tbody>
        </table>
          
            <?php }else{ ?>
 <div class="col-sm-12"   >


        <table class="table">
          <thead>
            <tr>
              <th>Location</th>
              <th>Temperature Min/Max</th>
              <th>Humidity</th>
              <th>Rainfall</th>
            </tr>
          </thead>

          <tbody>
            <?php 
             $getmuinicipalityName2 =   mysqli_query($conn, "SELECT * FROM `municipality_climatic_data` as a inner join municipality_account as b on a.municipality_id = b.id where a.max_temp >= '".$getcropsName['min_temperature']."' and a.min_temp <= '".$getcropsName['max_temperature']."' and  a.humidity >= '".$getcropsName['min_humidity']."' and a.humidity <= '".$getcropsName['max_humidity']."' and a.rainfall >= '".$getcropsName['min_rainfall']."' AND a.rainfall <= '".$getcropsName['max_rainfall']."' and a.todate   BETWEEN '".$from_date."' AND '".$to_date."' order by b.municipality ASC ");



            while($row=mysqli_fetch_array($getmuinicipalityName2)){ ?>
            <tr>
              <td><?php echo $row['municipality']; ?></td>
              <td><?php echo $row['min_temp']."/".$row['max_temp']; ?></td>
              <td><?php echo $row['humidity']; ?></td>
               <td><?php echo $row['rainfall']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

            <!--     <p>Municipality Name: <b><?php echo $getmuinicipalityName['municipality']; ?></b></p>
          </div>
            
              <div class="col-sm-6">
                 <p>Temperature min/max: <b><?php echo $getmuinicipalityName['max_temp']."C/".$getmuinicipalityName['min_temp']."C"; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Humidity: <b><?php echo $getmuinicipalityName['humidity']; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Rainfall: <b><?php echo $getmuinicipalityName['rainfall']; ?> <?php echo $getcropsName['max_temperature']; ?></b></p>
              </div> -->
          <?php } ?>

        <?php } ?>

                
              <div class="col-sm-12" hidden >
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
  
<div class="col-sm-12">
     

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
 
 

// function initMap() {


//      const lats =document.getElementById("latID").value;
// const longs =document.getElementById("longID").value;

//    const municipalitymapID = document.getElementById("municipalitymapID").value;
 
 

// var mapProp= {
      

//   center:new google.maps.LatLng(lats,longs),
//   zoom:13,
// };
// var map = new google.maps.Map(document.getElementById("map"),mapProp);

//   new google.maps.Marker({
//     position: latlng,
//     map,
//     title: municipalitymapID,
//   });
// }



function initMap() {

var lats = parseFloat(document.getElementById("latID").value);
    var longs = parseFloat(document.getElementById("longID").value);

//      const lats =document.getElementById("latID").value;
// const longs =document.getElementById("longID").value;

   const municipalitymapID = document.getElementById("municipalitymapID").value;

  const myLatLng = {
   lat: lats, 
   lng: longs 
 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: municipalitymapID,
  });
}




  </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&channel=2"async></script>
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKps5AWXn0f1da43ALOJY-ROV3b8lMpBA&callback=initMap"></script>

</html>






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
  #rec_municipality {
    color: #111;
border-bottom: 3px solid #acdf87;
  }

 
 #map {
      width: 900px;
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