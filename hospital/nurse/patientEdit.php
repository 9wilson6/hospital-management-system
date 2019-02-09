<?php 
require_once("../functions.php");
checkIfNurseIsRegistered();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php");
if (isset($_REQUEST['id'])) {
  $patient_id=$_REQUEST['id'];
}
require_once("../dbconfig.php");

 /////////////////////////////////////////////////////////////////////////////// -->
 
if (isset($_POST['submit'])) {

   $telephone=trim($_POST['telephone']);
    $patient_id=trim($_POST['patient_id']);
  $rec_no=trim($_POST['rec_no']);
  $name=trim($_POST['name']);
 // die($telephone);
  $email=trim($_POST['email']);
  $address=trim($_POST['address']);
  $med_condation=trim($_POST['med_condation']);
    $query="UPDATE patient SET name='$name', telephone='$telephone', email='$email', address='$address', med_condition='$med_condation' WHERE patient_id='$patient_id'";
    $results=$db->query($query);
    if ($results==1) {
     $msg="PATIENT ". $patient_id." UPDATED SUCCESSFULLY";
    }else{
      $error="UPDATE_ WAS NOT SUCCESSFUL";
    }


   
  
}else{


$query="SELECT * FROM patient WHERE patient_id='$patient_id'";
$results=$db->query($query);
foreach ($results as $result) {
 $name=$result['name'];
 $patient_id=$result['patient_id'];
 $rec_no=$result['rec_no'];
 $address=$result['address'];
 $telephone=$result['telephone'];
 $email=$result['email'];
 $med_condation=$result['med_condition'];
}
}
///////////////////////////////////////////////////////////////////////////////////////// -->
?>

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
   <h2 class="heading--secondary"> edit Patient info</h2>

          <form class="py-2" method="POST" action="patientEdit.php">
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
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                <input type="number" class="form-control control-lg"  disabled required placeholder="PATIENT ID: <?php echo $patient_id ?>">
                 <input type="hidden"  name="rec_no" min="0" value="<?php echo $rec_no ?>">
              </div>
              <div class="col">
                <input type="text" class="form-control control-lg" required name="name" value="<?php echo $name ?>">
                <input type="hidden" name="patient_id"  value="<?php echo $patient_id; ?>">
              </div>

            </div>
           </div>
          <!--  -->
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
             
              <div class="col">
                <input type="text" pattern="\d*" maxlength="10" minlength="10" class="form-control control-lg" name="telephone" required value="<?php echo $telephone ?>">
              </div>
              <div class="col">
                <input type="email" class="form-control control-lg" name="email" required value="<?php echo $email ?>">
              </div>
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                <input type="text" class="form-control control-lg" name="address" required value="<?php echo $address ?>">
              </div>
              <div class="col">
               <textarea name="med_condation" class="form-control control-lg" cols="30" rows="10" required"><?php echo $med_condation ?></textarea>
              </div>
             
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">UPDATE PATIENT INFO</button>
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
</body>

</html>