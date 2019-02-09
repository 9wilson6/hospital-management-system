<?php 
require_once("../functions.php");
checkIfIsAdmin();
 require_once("../dbconfig.php");
 if (isset($_REQUEST['id'])) {
   $rec_no=$_REQUEST['id'];
 }
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
$rec_no=$_POST['rec_no'];
 $doctor_id=$_POST['doctor_id'];

 $med_condition=$_POST['med_condition'];

 $datetym=$_POST['datetym'];
// die($datetym);
if (strtotime($_POST['datetym'])) {
  $datetym=strtotime($_POST['datetym']);
  $query="UPDATE appointments SET doctor_id='$doctor_id', patient_id='$patient_id', med_condition='$med_condition', datetym='$datetym' WHERE rec_no='$rec_no'";
  $result1=$db->query($query);

  if ($result1==1) {
    $msg="APPOINTMENT UPDATE SUCCESSFULLY";
  }else{
    $error="FAILED TO UPDATE APPOINTMENT";
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
                        <?php echo( 'welcome '. $_SESSION['admin_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
               <?php require_once"navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
           <?php 
          
           $query="SELECT * FROM appointments WHERE rec_no='$rec_no'";
           $results=$db->query($query);
           foreach ($results as $result) {
             $patient_id=$result['patient_id'];
             $doctor_id=$result['doctor_id'];
             $med_condition=$result['med_condition'];
             $datetym=date("Y-m-d h:i:s a", $result['datetym']);
           }
            ?>  

             <form class="py-2" method="POST" action="editAppointments.php">
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
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

           <div class="form-group mb-5">
              <div class="row">
                    <div class="col">
                    <select class="custom-select mr-5" required name="patient_id">
                      <option value="<?php echo $patient_id ?>" selected>PATIENT ID: <?php echo $patient_id ?></option>
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
                      <option value=" <?php echo $doctor_id ?> " selected>DOCTOR ID: <?php echo $doctor_id ?>  </option>
                    <?php foreach ($doctors as $doctor) {?>
                     <option value=" <?php echo $doctor['doctor_id'] ?> "> DOCTOR:  <?php echo $doctor['name'] ?> </option>
                  <?php  } ?>
 
                  </select>
              </div>
             
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                
              <textarea name="med_condition" id="" cols="30" rows="10" class="form-control control-lg" > <?php echo $med_condition; ?></textarea>
              </div>
              
             
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="form-group mb-5">
              <div class="row">
               <div class="col">
                <?php $date=date("Y-m-d");
                 $time=date("H:i");
                  ?>
                 <input type="datetime-local" class="form-control control-lg" name="datetym" required min='<?php echo ($date."T".$time); ?>'>
                <input type="hidden" name="rec_no" value=" <?php echo $rec_no ?> ">
              </div>
            </div>
          </div>
             <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">EDIT APPOINTMENT</button>
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