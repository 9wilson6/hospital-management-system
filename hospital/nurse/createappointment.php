<?php 
require_once("../functions.php");
require_once("../dbconfig.php");
checkIfNurseIsRegistered();
$query="SELECT * FROM doctor";
$doctors=$db->query($query);
$query="SELECT * FROM patient";
$patients=$db->query($query);
 ?>
 <?php
 $error="";
 $msg="";

  
 if (isset($_POST['submit'])){ 
  require_once("../dbconfig.php");
 $patient_id=$_POST['patient_id'];

 $doctor_id=$_POST['doctor_id'];

 $med_condition=$_POST['med_condition'];

 $datetym=$_POST['datetym'];
// die($datetym);
if (strtotime($_POST['datetym'])) {
  $datetym=strtotime($_POST['datetym']);
  $query="SELECT * FROM appointments WHERE doctor_id='$doctor_id' and status=0";
  $results=$db->query($query);
 if (mysqli_num_rows($results)==0) {
    $query="INSERT INTO appointments(doctor_id, patient_id, med_condition, datetym)VALUES('$doctor_id', '$patient_id', '$med_condition', '$datetym')";
  $result1=$db->query($query);

  if ($result1==1) {
    $msg="APPOINTMENT CREATED SUCCESSFULLY";
  }else{
    $error="FAILED TO CREATE APPOINTMENT";
  }

 }else{
  $error="Doctor ID: ".$doctor_id." has a pedding apointment";
 }
 }else{
  $error="INVALID DATE AND TIME";
}
}
  


  ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php") ?>

<body>
  <div class="mycontainer">
    <div class=" container text-center">
      <div class="small__container">
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
          <h2 class="heading--primary">Register Patient</h2>
           <?php if (!empty($error)) {?>
            <div class="form-group  mb-5">
              <div class="form-control control-lg text-danger">
                <?php   echo($error) ?>
              </div>
            </div>
            <?php    }elseif (!empty($msg)) { ?>
               <div class="form-group  mb-5">
              <div class="form-control control-lg text-success">
                <?php   echo($msg) ?>
              </div>
            </div>
          <?php  } ?>

          <form class="py-2" method="POST" action="createappointment.php">
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
                    <div class="col">
                    <select class="custom-select mr-5" required name="patient_id">
                      <option value="" selected>SELECT PATIENT</option>
                    <?php foreach ($patients as $patient) {?>
                     <option value=" <?php echo $patient['patient_id'] ?> ">PATIENT ID: <?php echo $patient['patient_id'] ?> </option>
                  <?php  } ?>
 
                  </select>
              </div>
              
              </div>
           </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
             
              <div class="col">
                 <select class="custom-select mr-5" required name="doctor_id">
                      <option value="" selected>SELECT DOCTOR</option>
                    <?php foreach ($doctors as $doctor) {?>
                     <option value=" <?php echo $doctor['doctor_id'] ?> ">Name:  <?php echo $doctor['name']." ID: ".$doctor['doctor_id'] ?> </option>
                  <?php  } ?>
 
                  </select>
              </div>
             
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                
              <textarea name="med_condition" id="" cols="30" rows="10" class="form-control control-lg" placeholder="MEDICAL CONDITION....."></textarea>
              </div>
              
             
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="form-group mb-5">
              <div class="row">
               <div class="col">
                <?php 
                $date=date("Y-m-d");
                 $time=date("H:i");
                  ?>

                <input type="datetime-local" class="form-control control-lg" name="datetym" required min='<?php echo ($date."T".$time); ?>'>
              </div>
            </div>
          </div>
             <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">CREATE APPOINTMENT</button>
                </div>
              </div>
            </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          </form>
        </div>
        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      </div>
</div>

    </div>
  </div>
  </div>
</body>

</html>