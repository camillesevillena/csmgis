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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> 

<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
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


  .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
#tab1{
  display: block;
}

 

</style>

<body>
  <!-- Navigation -->
  <?php include './navbar.php'; ?>




  <!-- Page Content -->
  <section class="py-5 page-content" id="about" style="margin-top:3% !important; ">
    <div class="container page-container">
      <div class="row">
        <div class="col-md-12">
          <label class="font-weight-light mt-1" style="font-size: 2em; font-weight: bold;">Municipality</label>
     </div>
        <div class="col-md-12" style="padding-left: 0; margin-bottom: 20px;" > 
     
            <!-- <div class="form-group"> -->
              <!-- <div class="flex-container" style="float: left;"> -->
                
  
                <button class="btn btn-success flex-item" onclick="insertMunicipality()" name="search" type="submit">Add Municipality Admin and Geologic data</button>
                <!-- <button type="button" class="btn btn-primary flex-item" onclick="printDiv('printableArea')"><span class="fas fa-print" style="font-size: 15px;"></span> Print</button> -->
              <!-- </div> -->
            <!-- </div> -->
      
        </div>
      </div>

      <div class="tab">
  <button class="tablinks" id ="tabID1" onclick="openMunicipality(event, 'tab1')" >Municipality Personal data</button>
  <button class="tablinks" id ="tabID2" onclick="openMunicipality(event, 'tab2')">Municipality Geologic  data</button>
 
</div>


      <section>
<div id="tab1" class="tabcontent"  >

        <table id="example"  class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="width: 20%;">Fullname</th>
              <th scope="col">Email</th>
              <th scope="col">Contact #</th>
              <th scope="col">Gender</th>
              <th scope="col">Municipality</th>
     <!--          <th scope="col">Elevation</th>
              <th scope="col">Soil pH</th> -->
              
              <th scope="col">Date Created</th>
              <th scope="col" >Action</th>
            </tr>
          </thead>


          <tbody>

            <?php 
            $getMunicipality = mysqli_query($conn, "SELECT * FROM municipality_account where status = 'Active' and del = 'N' ");

            while($row = mysqli_fetch_array($getMunicipality)){

 
             ?>
           
           <tr>
                   <td><?php echo $row['id']; ?></td>
                   <td> <?php echo $row['fname']." ".$row['mname'].". ".$row['lname']; ?>  </td>
                   <td><?php echo $row['email']; ?></td>
                   <td><?php echo $row['contact_num']; ?></td>
                   <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['municipality']; ?></td>
                 <!--   <td><?php echo $row['elevation']; ?></td>
                   <td><?php echo $row['soil_ph']; ?></td> -->
                   
                   <td><?php echo date('Y-m-d', strtotime($row['date_created'])); ?></td>
                  
                   <td>
                    <div class="col-sm-12">
                    
                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Remove" style="width: 100%; margin-bottom: 2px;" id="<?php echo $row['id']; ?>" onclick='confirmRemove($(this).attr("id"));'> Remove </button>
                    <button class="btn btn-success" onclick="updateAccount('<?php echo $row['id']; ?>')" style="width: 100%;">Edit</button>  
                  </div>
                   </td>


                  </tr>
        <?php } ?>
            
          </tbody>
    



        
          </tbody>


 
        </table>

</div>
<div id="tab2" class="tabcontent">
<table id="example2"  class="table table-striped table-bordered" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">ID</th>
           <!--    <th scope="col" style="width: 20%;">Fullname</th>
              <th scope="col">Email</th>
              <th scope="col">Contact #</th>
              <th scope="col">Gender</th> -->
              <th scope="col">Municipality</th>
            <th scope="col">Elevation</th>
              <th scope="col">Soil pH</th>  
              
              <th scope="col">Date Created</th>
              <th scope="col" >Action</th>
            </tr>
          </thead>


          <tbody>

            <?php 
            $getMunicipality = mysqli_query($conn, "SELECT * FROM municipality_account where status = 'Active' and del = 'N' ");

            while($row = mysqli_fetch_array($getMunicipality)){

 
             ?>
           
           <tr>
                   <td><?php echo $row['id']; ?></td>
                <!--    <td> <?php echo $row['fname']." ".$row['mname'].". ".$row['lname']; ?>  </td>
                   <td><?php echo $row['email']; ?></td>
                   <td><?php echo $row['contact_num']; ?></td>
                   <td><?php echo $row['gender']; ?></td> -->
                    <td><?php echo $row['municipality']; ?></td>
                <td><?php echo $row['elevation']; ?></td>
                   <td><?php echo $row['soil_ph']; ?></td>  
                   
                   <td><?php echo date('Y-m-d', strtotime($row['date_created'])); ?></td>
                  
                   <td>
                    <div class="col-sm-12">
                    
                    <!-- <button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Remove" style="width: 100%; margin-bottom: 2px;" id="<?php echo $row['id']; ?>" onclick='confirmRemove($(this).attr("id"));'> Remove </button> -->
                    <button class="btn btn-success" onclick="updateAccount2('<?php echo $row['id']; ?>')" style="width: 100%;">Edit</button>  
                  </div>
                   </td>


                  </tr>
        <?php } ?>
            
          </tbody>
    



        
          </tbody>


 
        </table>
</div>

 
      </section>


    </div>
  </section>


<?php include '../includes/jslibraries.php';
 
 ?>
  
    <?php include 'footer.php'; ?>
  
</body>



  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  


  <script>

function updateAccount(id) {
   	window.open('update-municipality-account.php?account_id='+id, 'updateAccount').focus();
}
function updateAccount2(id) {
    window.open('update-geologic-account.php?account_id='+id, 'updateAccount2').focus();
}


$(document).ready(function() {
   $('#example').DataTable();
   $('#example2').DataTable();

});


function confirmRemove(id) {

if (confirm("Are you sure you want to Remove this Account?") == true) {
  window.location.href = "action.php?account_id=" + id;
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



function openMunicipality(evt, municipalityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(municipalityName).style.display = "block";
  evt.currentTarget.className += " active";
}
  </script>


</html>






