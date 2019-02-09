<?php 
require_once("../functions.php");
checkIfIsAdmin();
  require_once("../dbconfig.php");
if (isset($_REQUEST['id'])) {
 $doctor_id=trim($_REQUEST['id']);
}
 ?>
 <?php
 $error="";
 $msg=""; 
if (isset($_POST['submit'])) {
  $doctor_id=$_POST['doctor_id'];
  $name=$_POST['name'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $department=$_POST['department'];
   $query="UPDATE doctor SET address='$address', department='$department', name='$name', telephone='$telephone', email='$email' WHERE doctor_id='$doctor_id'";
   $results=$db->query($query);
    if ($results==1) {
     $msg="DOCTOR ". $doctor_id." UPDATED SUCCESSFULLY";
    }else{
      $error="REQUEST NOT SUCCESSFUL";
    }



  
}else{
  $query="SELECT * FROM doctor WHERE doctor_id='$doctor_id'";
  $results=$db->query($query);
  foreach ($results as $result ) {
    $doctor_id=$result['doctor_id'];
    $address=$result['address'];
    $department=$result['department'];
    $email=$result['email'];
    $telephone=$result['telephone'];
    $name=$result['name'];

  }
}

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
            <?php echo( 'welcome '. $_SESSION['admin_name']) ?></span>
          <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
        </div>
        <!-- /////////////////////////////////////////////////////////////////////////////// -->
        <div class="margin_top"></div>
        <?php require_once "navigation.php" ?>
        <div class="border__bottom"></div>
        <h2 class="heading--primary">Edit Doctor Info</h2>

          <form class="py-2" method="POST" action="doctorEdit.php">
             <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="display_area">
         
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
                <input type="number" class="form-control control-lg"  min="0" disabled placeholder="EMPLOYEE ID: <?php echo "$doctor_id" ?>">
                <input type="hidden" name="doctor_id" value="<?php echo $doctor_id ?>">
              </div>
               <div class="col">
                     <input type="text" class="form-control control-lg" required name="name" value="<?php echo $name ?>">
              </div>
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
                   
              <div class="col">
                <input type="email" class="form-control control-lg" name="email" required value="<?php echo $email?>">
              </div>
              <div class="col">
                    <select class="custom-select mr-5" required name="department">
                  <option value="<?php echo $department; ?>" selected><?php echo $department; ?></option>
                  <option value="Gastroenterology">Gastroenterology</option>
                  <option value="General surgery">General surgery</option>
                  <option value="Haematology">Haematology</option>
                  <option value="Maternity">Maternity</option>
                  <option value="Microbiology">Microbiology</option>
                 </select>
              </div>
              </div>
           </div>
         
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                 <input  type="text" pattern="\d*" maxlength="10" minlength="10" class="form-control control-lg" name="telephone" required value="<?php echo $telephone?>">
              </div>
              <div class="col">
                 <input type="text" class="form-control control-lg" name="address" required value="<?php echo $address?>">
              </div>
             
            </div>
           </div>
          
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">UPDATE DOCTOR INFO</button>
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