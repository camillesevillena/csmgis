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
  <section class="py-5 page-content" id="about" style="margin-top:3% !important; ">
    <div class="container page-container">
      <div class="row">
        <div class="col-md-12">
          <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">Crops</label>
     </div>
        <div class="col-md-12" style="padding-left: 0; margin-bottom: 20px;" > 
     
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
  
                <button class="btn btn-success flex-item" onclick="insertCrops()" name="search" type="submit">Add new crop</button>
                <!-- <button type="button" class="btn btn-primary flex-item" onclick="printDiv('printableArea')"><span class="fas fa-print" style="font-size: 15px;"></span> Print</button> -->
              <!-- </div> -->
            <!-- </div> -->
      
        </div>
      </div>

      <section>


        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
         

            <colgroup>
                <col class="col-4"/>
                <col class="col-10"/>
                <col class="col-32"/>
                <col class="col-8"/>
                <col class="col-8"/>
                <col />
                <col />
                <col />
                <col class="col-6"/>
                <col class="col-6"/>
              </colgroup>

              <thead class="color-header">
              <tr>
                <th>NO</th>
                <th>Crop name</th>
                <th>Instruction</th>
                <th>Elevation</th>
                <th>Temperature Min/Max </th>
                <th>Humidity Min/Max </th>

                <th>Rainfall Min/Max </th>
               
                <th>soilPh Min/Max </th>
                <th>Date</th>
                <th>Action</th>
              </tr>
              </thead>


          <tbody>
             <?php 
               $getCrops = mysqli_query($conn, "SELECT * FROM crops where del = 'N' ");

            while($row = mysqli_fetch_array($getCrops)){
              ?>
           <tr>
            



                 <td><?php echo $row['id_crops']; ?></td>
                   <td> <?php echo $row['crops_name']; ?>  </td>
                   <td><?php echo $row['instruction']; ?></td>
                   <td><?php echo $row['elevation']; ?></td>
                   <td><?php echo $row['min_temperature']." / ".$row['max_temperature']; ?></td>
                   <td><?php echo $row['min_humidity']." / ".$row['max_humidity']; ?></td>
                    <td><?php  echo $row['min_rainfall']." / ".$row['max_rainfall']; ?></td>
                      <td><?php  echo $row['min_soilph']." / ".$row['max_soilph']; ?></td>
                   <td><?php echo $row['date_created']; ?></td>
                   
 
                   <td>
                    <div class="col-sm-12">

                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Remove" style="width: 100%; margin-bottom: 2px;" id="<?php echo $row['id_crops']; ?>" onclick='confirmRemove($(this).attr("id"));'> Remove </button>
                    <button class="btn btn-success" onclick="updateCrops('<?php echo $row['id_crops']; ?>')" style="width: 100%;">Edit</button>
                    </div>
                   </td>


                  </tr>
      <?php } ?>
            
          </tbody>
    



        



 
        </table>





        <!-- Print Area -->
      
      </section>


    </div>
  </section>


 


  </form>
    </div>
  </div>
</div>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>






  <script>

function updateCrops(id) {
   	window.open('update-crops.php?id='+id, 'updateCrops').focus();
}

function confirmRemove(id) {

if (confirm("Are you sure you want to Remove this Crops?") == true) {
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


    function insertCrops() {
      window.location.href = "insert-crops.php";
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

  .insID{
    overflow: auto;
    height: 100px;
  }

  section{
    margin-bottom: 3%;
  }
  #crops {
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