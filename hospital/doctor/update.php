
<?php 
require_once("../functions.php");
checkIfDoctorIsRegsitered();
if (isset($_REQUEST['id'])) {
	$app_id=$_REQUEST['id'];
	$patient_id=$_REQUEST['patient_id'];
}
if (isset($_POST['submit'])) {
  require_once "../dbconfig.php";
  $msg="";
  $error="";
 if (strtotime($_POST['datetym'])) {
  $datetym=strtotime($_POST['datetym']);
  // die($datetym);
  $patient_id=$_POST['patient_id'];
  $diagnosis=$db->quote($_POST['diagnosis']);
  $drugs=$db->quote($_POST['drugs']);
  $recommedation=$db->quote($_POST['recommedation']);
  $rec_no=$_POST['rec_no'];

  $query="INSERT INTO history(patient_id, diagnosis, datetym, drugs,recommedation) VALUES('$patient_id', '$diagnosis', '$datetym', '$drugs','$recommedation')";
  $results=$db->query($query);
  if ($results==1) {
  $query="UPDATE appointments SET status='1' WHERE rec_no='$rec_no'";
  $results=$db->query($query);
  if ($results==1) {
    $msg="RECORD CREATED SUCCESSFULLY";
  }
  }
 }else{
  $error="INVALID DATE/TIME!!!";
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
                        <?php echo( 'welcome '. $_SESSION['doctor_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
               <?php require_once"navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
	 <h2 class="heading--secondary mb-5">Appointment update</h2>

	  <form class="py-2" method="POST" action="update.php">
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
                    <input type="text" class="form-control control-lg" name="" value=" PATIENT ID: <?php echo $patient_id ?>" disabled ">
                    <input type="hidden" name="patient_id" value="<?php echo $patient_id ?>">
                    <input type="hidden" name="rec_no" value="<?php echo $app_id ?>">
              </div>
              
              </div>
           </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
        
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                
              <textarea name="diagnosis" id="" cols="30" rows="10" class="form-control control-lg" required placeholder="DIAGNOSIS/TEST....."></textarea>
              </div>
              
             
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="form-group mb-5">
              <div class="row">
               <div class="col">
                <input type="datetime-local" class="form-control control-lg" name="datetym" required placeholder="DATE TIME">
              </div>
            </div>
          </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                
              <textarea name="drugs" id="" cols="30" rows="10" class="form-control control-lg" required placeholder="DRUGS GIVEN....."></textarea>
              </div>
              
             
            </div>
           </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                
              <textarea name="recommedation" id="" cols="30" rows="10" class="form-control control-lg" required placeholder="RECOMMEDATION....."></textarea>
              </div>
              
             
            </div>
           </div>
             <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">UPDATE APPOINTMENT</button>
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