<?php 
require_once("../functions.php");
checkIfIsAdmin();
 ?>
 <?php
 $error="";
 $msg=""; 
if (isset($_POST['submit'])) {
  require_once("../dbconfig.php");
  $patient_id=$_POST['patient_id'];
  $name=$_POST['name'];
  $gender=$_POST['gender'];
  $age=$_POST['age'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $datetym=$_POST['datetym'];

  $address=$_POST['address'];
  $password=$_POST['password'];
  $C_password=$_POST['C_password'];
  $med_condation=$_POST['med_condation'];
    $query="SELECT * FROM patient WHERE patient_id='$patient_id'";
    $results=$db->query($query);
    if (mysqli_num_rows($results)==0) {
      if (strtotime($datetym)) {
        $datetym=strtotime($datetym);
   if ($password==$C_password) {
    //check pass length
if (strlen($password)>=5) {
    $password=hash('sha256', $password);
   $query="INSERT INTO patient(patient_id, name, gender, age, telephone, email, datetym, address, password, med_condition)VALUES('$patient_id', '$name', '$gender', '$age', '$telephone', '$email', '$datetym', '$address', '$password', '$med_condation')";
   $results=$db->query($query);
    if ($results==1) {
     $msg="PATIENT ". $patient_id." REGISTERED SUCCESSFULLY";
    }else{
      $error="REGISTRATION NOT SUCCESSFUL";
    }
}else{
  $error="PASSWORD MUST BE ATLEAST 5 CHARACTERS";
}
  }else{
    $error="PASSEORDS DID NOT MATCH";
  }
 }else{
  $error="INVALID DATE TIME";
 }
    }else{
      $error="PATIENT ". $patient_id." IS ALREADY REGISTERED.";
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
        <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="display_area">
          <h2 class="heading--primary">Register Patient</h2>
          

          <form class="py-2" method="POST" action="registerPatient.php">
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
                <input type="number" min=1 class="form-control control-lg" name="patient_id" min="0" required placeholder="PATIENT ID:">
              </div>
              <div class="col">
                <input type="text" class="form-control control-lg" required name="name" placeholder="PATIENT NAME:">
              </div>

            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
                    <div class="col">
                      <select class="custom-select mr-5" required name="gender">
                    <option selected value="">GeNDER:</option>
                    <option value="Patient">MALE</option>
                    <option value="Nurse">FEMALE</option>
 
                  </select>
              </div>
               <div class="col">
                 <input type="number" class="form-control control-lg" min="0" name="age" required placeholder="PATIENT AGE">
              </div>
              </div>
           </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
             
              <div class="col">
                <input type="text" pattern="\d*" maxlength="10" minlength="10" class="form-control control-lg" min="12" name="telephone" required placeholder="TELEPHONE">
              </div>
              <div class="col">
                <input type="email" class="form-control control-lg" name="email" required placeholder="EMAIL:">
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
              </div>
              <div class="col">
                <input type="text" class="form-control control-lg" name="address" required placeholder="ADDRESS:">
              </div>
             
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="form-group mb-5">
              <div class="row">
               <div class="col">
                <input type="password" class="form-control control-lg" name="password" required placeholder="PASSWORD">
              </div>
              <div class="col">
                <input type="password" class="form-control control-lg" name="C_password" required placeholder="CONFIRM PASSWORD">
              </div>

            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
               <div class="col">
               <textarea name="med_condation" class="form-control control-lg" cols="30" rows="10" required placeholder="MADICAL CONDATION..."></textarea>
              </div>
              

            </div>
           </div>
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">REGISTER</button>
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