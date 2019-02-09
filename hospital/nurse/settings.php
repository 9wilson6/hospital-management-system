<?php 
require_once("../functions.php");
checkIfNurseIsRegistered(); 
 require_once("../dbconfig.php");
 ?>
 <?php
 $error="";
 $msg=""; 
if (isset($_POST['submit'])) {

  $patient_id=$_POST['patient_id'];
  $password=$_POST['password'];
  $C_password=$_POST['C_password'];
 
   if ($password==$C_password) {
   	$password=hash('sha256', $password);
   		$query="UPDATE patient SET password='$password' WHERE patient_id='$patient_id'";
   		$results=$db->query($query);
   		if($results==1){
   			$msg="Password Update Successfully";
   		}
  }else{
    $error="PASSEORDS DID NOT MATCH";
  }
 }
    
   $query="SELECT * FROM patient";
    $results=$db->query($query);

  ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php") ?>

<body>
  <div class="mycontainer">
    <div class=" container text-center">
      <div class="medium__container">
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
          <h2 class="heading--primary">change password for Patient</h2>
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

          <form class="py-2" method="POST" action="settings.php">
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
                    <div class="col">
                      <select class="custom-select mr-5" required name="patient_id">
                    <option selected value="">Select Patient ID</option>
                    <?php 
                    	if (mysqli_num_rows($results)>0) {
                    		foreach ($results as $result) {?>
                    			<option value="<?php echo $result['patient_id'] ?>"><?php echo $result['patient_id'] ?></option>
                    		<?php }
                    	}

                     ?>
                  </select>
              </div>
                <div class="col">
                <input type="password" class="form-control control-lg" name="password" required placeholder="PASSWORD">
              </div>
              <div class="col">
                <input type="password" class="form-control control-lg" name="C_password" required placeholder="CONFIRM PASSWORD">
              </div>
              </div>
           </div>
       
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

           <!--  <div class="form-group mb-5">
              <div class="row">
               <div class="col">
               <textarea name="med_condation" class="form-control control-lg" cols="30" rows="10" required placeholder="MADICAL CONDATION..."></textarea>
              </div>
              

            </div>
           </div> -->
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">UPDATE PASSWORD</button>
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