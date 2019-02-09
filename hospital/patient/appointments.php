<?php 
require_once("../functions.php");
checkIfUserIsRegsitered();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php") ?>

<body>
  <div class="mycontainer">
    <div class=" container text-center">
      <!-- <div class="small__container"> -->
        <div class="colored__background">
                
        <div class="usernametag float-right"><span>
                        <?php echo( 'welcome '. $_SESSION['patient_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
                <?php require_once "navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
   <h2 class="heading--secondary mb-5">APPOINTMENTS LIST</h2>

                     <!-- <h1 class="text-dark text-right"><a href="createappointment.php" class="btn btn btn-primary">Create new Appointment</a></h1> -->
<?php 

require_once("../dbconfig.php");
 $patient_id=$_SESSION['patient_id'];
$query="SELECT * FROM appointments WHERE patient_id='$patient_id' order by status";
$results=$db->query($query);

 ?>
<!-- <h1 class="heading--primary">Appointments</h1> -->
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>DOCTOR ID</th>
      <th>PATIENT ID</th>
      <th>MEDICAL CONDITION</th>
      <th>DATE</th>
      <th>STATUS</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       foreach ($results as $result) {?>
    <tr class="table_row">
      <td>
        <?php 
        $app_id=$result['doctor_id'];
        echo($app_id) ?>
      </td>
      <td>
        <?php echo($result['patient_id']) ?>
      </td>
      <td>
        <?php echo($result['med_condition']) ?>
      </td>
      
      <td>

                 <?php echo date("Y-m-d h:i:s a", $result['datetym']); ?>
              
      </td>

    <td><?php $status=$result['status'] ;
        if ($status==0) {
         echo "Pending";
        }else{
          echo "Availed";
        }

    ?></td>
    </tr>
  <?php } ?>
</table>


</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>

     
      </div>
    </div>
  </div>
</body>

</html>