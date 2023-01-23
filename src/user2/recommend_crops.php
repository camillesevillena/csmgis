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

  $request_cropsID = $_REQUEST['crops'];
 $date_today = $_REQUEST['date_today'];

  $getcropsName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where id_crops = '".$request_cropsID."' "));



   // $getcropsName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM crops where temperature >= '".$getmuinicipalityName['min_temp']."' AND temperature <= '".$getmuinicipalityName['max_temp']."' AND  del = 'N' "));


   $getmuinicipalityName = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM municipality_climatic_data as a inner join municipality_account as b on a.municipality_id = b.id  where  a.min_temp >= '".$getcropsName['min_temperature']."' AND a.max_temp <= '".$getcropsName['max_temperature']."' and a.todate = '".$date_today."' "));
   ?>



  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:1% !important; ">
    <div class="container page-container">
      <div class="row">
        <div class="col-md-12">
          <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">Search Crops </label>
     </div>
        <div class="col-md-12" style="padding-left: 0; margin-bottom: 20px;" > 
     
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" role="form">

        <div class="row">
          <div class="col-sm-4">
            <select class="form-control" name="crops">

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

            </select>
            </div>

            <div class="col-sm-4">
              <input type="date" class="form-control" name="date_today" value="<?php echo date('Y-m-d'); ?>">
            </div>

<div class="col-sm-4">
            <button type="submit"   class="btn btn-primary ">Find</button>
</div>
            </div>
      </form>
        </div>
      </div>

      <section>

        <?php if($request_cropsID == ""){
          echo "";
        }else{ ?>
          <div class="row">
              <div class="col-sm-6">
                <p>Municipality Name: <b><?php echo $getcropsName['crops_name']; ?></b></p>
              </div>
              <div class="col-sm-12">
                <p>Instruction: <b><?php echo $getcropsName['instruction']; ?></b></p>
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
              <div class="col-sm-6">
                 <p>Minimum Temperature: <b><?php echo $getcropsName['min_temperature']; ?></b></p>
              </div>
                <div class="col-sm-6">
                 <p>Maximum Temperature: <b><?php echo $getcropsName['max_temperature']; ?></b></p>
              </div>

              <div style="padding-top: 3%; padding-bottom: 3%;"></div>
              

          </div>


            <h3>Recommended Municipality</h3>

            <div class="row">
              <div class="col-sm-12">
                <p>Municipality : <b><?php echo $getmuinicipalityName['municipality']; ?></b></p>
              </div>
            
              <div class="col-sm-6">
                 <p>Temperature min/max: <b><?php echo $getmuinicipalityName['min_temp']."C/".$getmuinicipalityName['max_temp']."C"; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Humidity: <b><?php echo $getmuinicipalityName['humidity']; ?></b></p>
              </div>
              <div class="col-sm-6">
                 <p>Rainfall: <b><?php echo $getmuinicipalityName['rainfall']; ?></b></p>
              </div>
          

               <div class="col-sm-6">
                 <p>Date: <b><?php echo $getmuinicipalityName['todate']; ?></b></p>
              </div>
              <div class="col-sm-12">
                <input type="hidden" name="lat" id="latID" value="<?php echo $getmuinicipalityName['latitude']; ?>">
                <input type="hidden" name="long" id="longID" value="<?php echo $getmuinicipalityName['longitude']; ?>">
              </div>
   

          </div>

     <div id="map"></div>

        <?php } ?>
   
       


      </section>


    </div>
  </section>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>






  <script>
 
 

function initMap() {

  const lats =document.getElementById("latID").value;
const longs =document.getElementById("longID").value;
// alert(lats+longs);

  const myLatLng = { lat: 10.7202, lng: 122.5621 };

// const myLatLng = { lat: lats, lng: longs };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 13,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
}

MYMAP.init = function(selector, latLng, zoom) {
  var myOptions = {
    zoom:zoom,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  this.map = new google.maps.Map($(selector)[0], myOptions);
    this.bounds = new google.maps.LatLngBounds();
}

  </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKps5AWXn0f1da43ALOJY-ROV3b8lMpBA&callback=initMap"></script>

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
  #rec_crops {
    color: #111;
border-bottom: 3px solid #acdf87;
  }

 
 #map {
      width: 1000px;
      height: 600px;
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