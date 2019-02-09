<?php 
require_once("../functions.php");
checkIfDoctorIsRegsitered();
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
                        <?php echo( 'welcome '. $_SESSION['doctor_name']) ?></span>
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
 $doctor_id=$_SESSION['doctor_id'];
$query="SELECT * FROM appointments WHERE doctor_id='$doctor_id'";
$results=$db->query($query);

 ?>
<!-- <h1 class="heading--primary">Appointments</h1> -->
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <!-- <th>DOCTOR ID</th> -->
      <th>PATIENT ID</th>
      <th>MEDICAL CONDITION</th>
      <th>DATE</th>
      <th>STATUS</th>
      <th>ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       foreach ($results as $result) {?>
    <tr class="table_row">
     <!--  <td>
        <?php 
        $app_id#=$result['doctor_id'];
        #echo($app_id) ?>
      </td> -->
      <td>

        <?php
           $patient_id=$result['patient_id'];
         echo($patient_id);
         $rec_no=$result['rec_no'];
          ?>
      </td>
      <td>
        <?php echo($result['med_condition']) ?>
      </td>
      
      <td>

       <?php $date=date("Y-m-d h:i:s a", $result['datetym']); 
                 echo $date; ?>
              
      </td>
 <?php $now=date("Y-m-d h:i:s a") ?>


    <td><?php $status=$result['status'] ;
        if ($status==0) {
         echo "Pending";
        }else{
          echo "Availed";
        }

    ?></td>
    
        <td>
        <a href="history.php?id=<?php echo $patient_id ?> " class="btn btn-info">History</a>
          <?php $status=$result['status'] ;
        if ($status==0) {?>
          <?php 
          if ($date > $now) { ?>
            <a href="update.php?id=<?php echo $result['rec_no']?>&patient_id=<?php echo $result['patient_id']?> " class="btn  btn-outline-warning">Update</a>
          <?php }else{ ?>
            <alert class="alert alert-danger"><small>Timed Out</small></alert>
         <?php }
           ?>
          
       <?php }else{ ?>
          <a href="viewdetails.php?id=<?php echo $result['rec_no']?>&patient_id=<?php echo $result['patient_id']?>" class="btn  btn-success">Details</a>
       <?php }

    ?>
    </td>
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