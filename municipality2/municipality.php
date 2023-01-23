 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Municipality</title>
  <?php include '../includes/admin_libraries.php';
  include '../includes/conn.php';
  ?>

   <?php //session_start(); ?>
</head>

<style>
 
  section{
    margin-bottom: 3%;
  }
  #municipality {
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

<body>
  <!-- Navigation -->
  <?php include 'navbar.php'; ?>




  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:1% !important; ">
    <div class="container page-container">
      <div class="row">
        <div class="col-md-12">
          <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">
            <?php echo $DATA['municipality']; ?>
          Ajuy Municipality Date Range Temperature </label>
     </div>
        <div class="col-md-12" style="padding-left: 0; margin-bottom: 20px;" > 
     
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
  
                <button class="btn btn-success flex-item" onclick="insertDateTemp()" name="search" type="submit">Add Agro Climatic Data</button>
                <!-- <button type="button" class="btn btn-primary flex-item" onclick="printDiv('printableArea')"><span class="fas fa-print" style="font-size: 15px;"></span> Print</button> -->
              <!-- </div> -->
            <!-- </div> -->
      
        </div>
      </div>

      <section>


        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
                <th scope="col">No</th>
                <th>Municipality</th>
                <th>Temperature</th>
                <th>Humidity</th>
                <th>Rainfall </th>
                <th>Date</th>

              <th scope="col" >Action</th>
            </tr>
          </thead>


          <tbody>
            <?php 
            $getData = mysqli_query($conn, "SELECT * FROM municipality_climatic_data where del = 'N' ");
            while($row = mysqli_fetch_array($getData)){ ?>
           <tr>
                   <td><?php echo $row['id']; ?></td>
                   <td><?php echo $row['municipality_id']; ?></td>
                   <td><?php echo $row['temperature']; ?></td>
                   <td><?php echo $row['humidity']; ?></td>
                   <td><?php echo $row['rainfall']; ?></td>
                   <td><?php echo $row['todate']; ?></td>
                   <td>
                    <div class="col-sm-12">
                    <button class="btn btn-danger" style="width: 100%; margin-bottom: 2px;">Remove</button> <button class="btn btn-success" style="width: 100%;">Edit</button>
                    </div>
                   </td>


                  </tr>
                <?php } ?>
            
          </tbody>
    



        
          </tbody>


 
        </table>





   
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

    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }


    function insertDateTemp() {
      window.location.href = "insert-date-temperature.php";
    // window.open('insert-municipality.php');
}
  </script>


</html>






