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
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  <!-- Navigation -->
  <?php include './navbar.php';

  $request_municipalityID = $_REQUEST['municipality'];
 $monthyear = $_REQUEST['monthyear'];
  $from_date = $_REQUEST['date_from'];
  $to_date = $_REQUEST['date_to'];

  $getMunicipalityID = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM municipality_account where id = '".$request_municipalityID."' "));
                         // First date of the month.
// $monthFirstDate = date('Y-m-01', strtotime('today'));
$monthFirstDate = date("Y-m-d", strtotime("-3 months"));
// Last date of the month.
$monthLastDate = date('Y-m-d');
   ?>



  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:5% !important; ">
    <div class="container page-container">
      <div class="row">
      
        <div class="col-md-6" style="padding-left: 0; margin-bottom: 20px;" > 
     
       <!-- <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">Search Crops </label> -->
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
      <form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" role="form">

        <div class="row" style="margin-top: 20%;">
          <div class="col-sm-12" id="searchBox">
            <div class="form-group">
                <label for="todate">Select Municipality To</label>
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
            </div>

         
  <div class="col-sm-6" id="searchBox">
          <div class="form-group">
                <label for="todate">Date From</label>
                <?php if($from_date == ""){ ?>
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



 

            </div>



      </form>
        </div>


           <?php 
           

            ?>

<div class="col-sm-6" >
  


  <div class="row">
              <div class="col-sm-12">
                 <h3 style="text-align: center;">Climatic Data</h3>
 
  
<div class="col-sm-12">
     

  <?php

  $dateToday = date('2021-06-01');
  $dateToday2 = date('Y-m-d');
if($request_municipalityID == ""){
    $query = "SELECT * FROM municipality_climatic_data Where min_temp = '0' or max_temp = '0' or humidity = '0' or rainfall = '0'  order by todate asc ";
  }else{
    
  $query = "SELECT * FROM municipality_climatic_data where municipality_id = '".$request_municipalityID."' and todate between '".$from_date."' AND '".$to_date."' order by todate asc ";
}
$result = mysqli_query($conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
  $month = date('Y-m',  strtotime($row['todate']));
// $year = date('Y',  strtotime($row['todate']));  

 $chart_data .= "{   month:".$month.", min_temp:".$row["min_temp"].", max_temp:".$row["max_temp"].", humidity:".$row["humidity"].", rainfall:".$row["rainfall"]."}, ";
}
$chart_data = substr($chart_data, 0, -1);

    ?>
    <!-- <div id="map2"></div> -->
  <?php //}else{ ?>
    
        <!-- <div id="chart" style="width: 800px;"></div> -->
            <!-- <div id="my-chart" style="width: 500px;"></div> -->
            <div id="my-chart" style="width: 1000px; height: 400px;"></div>
   

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



   <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart'],
                'mapsApiKey': ''   // her eyou can put you google map key
            });
            google.charts.setOnLoadCallback(drawRegionsMap);

            function drawRegionsMap() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'rainfall', 'humidity', 'min_temp' , 'max_temp'],
                     <?php
                     if($request_municipalityID == ""){

    $chartQuery = "SELECT * FROM municipality_climatic_data where  todate between '".$monthFirstDate."' AND '".$monthLastDate."'   order by todate asc ";
  }else{

                     $chartQuery = "SELECT * FROM municipality_climatic_data WHERE todate between '".$from_date."' AND '".$to_date."' and municipality_id = '".$request_municipalityID."' order by todate ASC";
                   }

                     // $query = "SELECT * FROM municipality_climatic_data where municipality_id = '".$request_municipalityID."' and todate between '".$from_date."' AND '".$to_date."' order by todate asc ";

                     $chartQueryRecords = mysqli_query($conn, $chartQuery);
                        while($row = mysqli_fetch_assoc($chartQueryRecords)){
                            echo "['".date('Y-m-d', strtotime($row['todate']))."',".$row['rainfall']." ,".$row['humidity']." ,".$row['min_temp'].",".$row['max_temp']."  ],";
                        }
                     ?>
                ]);

                var options = {
                   
                };

                var chart = new google.visualization.LineChart(document.getElementById('my-chart'));
                chart.draw(data, options);
            }
        </script>


  <script>
 
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'month',
 // ykey:'month',
 ykeys:[  'min_temp', 'max_temp','humidity', 'rainfall'],
 labels:[  'min_temp', 'max_temp', 'humidity', 'rainfall'],
 //  ykeys:[ 'month','year' ],
 // labels:['month', 'year' ],
 hideHover:'auto',
 stacked:true
});

// function initMap() {

   // const myLat = position.coords.latitude;
   //  const myLong = position.coords.longitude;


// alert(lats+longs);

  // var myLatLng = { lat: 10.7202, lng: 122.5621 };
    // var myLatLng = { lat: lats, lng: longs };

// const myLatLng = { lat: lats, lng: longs };
//   var map = new google.maps.Map(document.getElementById("map"), {
//     zoom: 13,
//     center: myLatLng,
//   });

//   new google.maps.Marker({
//     position: myLatLng,
//     map,
//     title: "Hello World!",
//   });
// }

// MYMAP.init = function(selector, latLng, zoom) {
//   var myOptions = {
//     zoom:zoom,
//     center: latLng,
//     mapTypeId: google.maps.MapTypeId.ROADMAP
//   }
//   this.map = new google.maps.Map($(selector)[0], myOptions);
//     this.bounds = new google.maps.LatLngBounds();
// }
 

// const x = navigator.geolocation;
// x.getCurrentPosition(success, failure);

// function success(position){

//   const myLat = position.coords.latitude;
//   const myLong = position.coords.longitude;

//   const coords = new google.maps.LatLng(myLat, myLong);

//   const mapOptions = {
//     zoom: 13,
//     center: coords,
//     mapTypeId: google.maps.MapTypeId.ROADMAP;
//   }

//   const map = new google.maps.Map(document.getElementById("map2"), mapOptions);
//   const marker = new.google.maps.Marker({map:mapm position:coords});

// }

 

function initMap() {


     const lats =document.getElementById("latID").value;
const longs =document.getElementById("longID").value;

   const municipalitymapID = document.getElementById("municipalitymapID").value;
 //  const myLatLng = { 
 //    lat: lats,
 //   lng: longs
 // };
 //  const map = new google.maps.Map(document.getElementById("map"), {
 //    zoom: 11,
 //    center: myLatLng,
 //  });

 //  new google.maps.Marker({
 //    position: myLatLng,
 //    map,
 //    title: municipalitymapID,
 //  });

// 10.8773
// 122.3674
  //   const myLatLng = { 
  //    lat: 10.8773,
  //  lng: 122.3674
  // };

 

var mapProp= {
      

  center:new google.maps.LatLng(lats,longs),
  zoom:13,
};
var map = new google.maps.Map(document.getElementById("map"),mapProp);

  new google.maps.Marker({
    position: latlng,
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
  #forecast {
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