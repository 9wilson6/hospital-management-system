<?php 
require_once("../functions.php");
checkIfNurseIsRegistered();
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
                        <?php echo( 'welcome '. $_SESSION['nurse_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
                <?php require_once "navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
   <h2 class="heading--secondary">APPOINTMENTS LIST</h2>

                     <h1 class="text-dark text-right"><a href="createappointment.php" class="btn btn btn-primary">Create new Appointment</a></h1>
        <form action="appointments_.php" class="my-4" method="POST">
        <input type="text" class="search_field" pattern="\d*" name="id" placeholder="Search by patient Id">
        <button type="submit" name="submit" class="btn btn-success btn-lg">Search</button>
      </form>
<?php 

require_once("../dbconfig.php");
// $patient_id=$_SESSION['id'];
$query="SELECT * FROM appointments ORDER BY status";
$results=$db->query($query);
$table="appointments";

 ?>
<!-- <h1 class="heading--primary">Appointments</h1> -->
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>DOCTOR ID</th>
      <th>PATIENT ID</th>
      <th>MEDICAL CONDITION</th>
      <th>Date</th>
      <th>Action</th>
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

      <td>
        
    
        <?php 
        if ($result['status']==1) {?>
        
         <a href="payment.php?id=<?php echo $result['rec_no']?>&patient_id=<?php echo $result['patient_id']?> " class="btn btn-lg btn-outline-warning">Update</a>
        <?php }elseif($result['status']==0){ ?>
           <a href="delete.php?table=<?php echo $table?>&id=<?php echo $result['rec_no']?>" class="btn btn-sm btn-danger">delete</a>
        <a href="editAppointments.php?id=<?php echo $result['rec_no']?>" class="btn btn-sm btn-primary">edit</a>
        
       <?php }else{ ?>
         <a href="viewdetails.php?id=<?php echo $result['rec_no']?>&patient_id=<?php echo $result['patient_id']?>" class="btn btn-lg btn-success">View Details</a>
     <?php  }
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