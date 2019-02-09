
<?php 
require_once("../functions.php");
checkIfNurseIsRegistered();
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
  $payment_id=$db->quote($_POST['payment_id']);
  $description=$db->quote($_POST['description']);
  $amount=$db->quote($_POST['amount']);
  $rec_no=$_POST['rec_no'];
  $query="SELECT * FROM payment WHERE payment_id='$payment_id'";
  $results=$db->query($query);
  if (mysqli_num_rows($results)==0) {
    $query="INSERT INTO payment(rec_id, patient_id, payment_id, datetym, description,amount) VALUES('$rec_no','$patient_id', '$payment_id', '$datetym', '$description','$amount')";
  $results=$db->query($query);
  if ($results==1) {
  $query="UPDATE appointments SET status='2' WHERE rec_no='$rec_no'";
  $results=$db->query($query);

  if ($results==1) {
    $msg="RECORD CREATED SUCCESSFULLY";
  }
  }
  }else{
    $error="Payment ID: ". $payment_id. " already exists";
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
                        <?php echo( 'welcome '. $_SESSION['nurse_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
               <?php require_once"navigation.php" ?>
               
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
	 <h2 class="heading--secondary mb-5">PAYMENT update</h2>

	  <form class="py-2" method="POST" action="payment.php">
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
              <input type="text" name="payment_id"  class="form-control control-lg" required placeholder="PAYMENT ID:">
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
                
              <textarea name="description" id="" cols="30" rows="10" class="form-control control-lg" required placeholder="DESCRIPTION....."></textarea>
              </div>
              
             
            </div>
           </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                
              <input type="number" name="amount" min="0" class="form-control control-lg" required placeholder="AMOUNT">
              </div>
              
             
            </div>
           </div>
             <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">UPDATE PAYMENT</button>
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