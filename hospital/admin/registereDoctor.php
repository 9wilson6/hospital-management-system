<?php 
require_once("../functions.php");
checkIfIsAdmin();
 ?>
 <?php
 $error="";
 $msg=""; 
if (isset($_POST['submit'])) {
  require_once("../dbconfig.php");
  $doctor_id=$_POST['doctor_id'];
  $name=$_POST['name'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $C_password=$_POST['C_password'];
  $address=$_POST['address'];
  $datetym=$_POST['datetym'];
  $qualification=$_POST['qualification'];
  $dapartment=$_POST['dapartment'];
    $query="SELECT * FROM doctor WHERE doctor_id='$doctor_id'";
    $results=$db->query($query);
    if (mysqli_num_rows($results)==0) {
   if ($password==$C_password) {
    //check pass length
if (strlen($password)>=5) {
    $password=hash('sha256', $password);
   $query="INSERT INTO doctor(doctor_id, date_hired, address, qualification, department, name, telephone, email, password)VALUES('$doctor_id', '$datetym', '$address', '$qualification', '$dapartment', '$name', '$telephone', '$email',  '$password')";

   $results=$db->query($query);
   // die($results);
    if ($results==1) {
     $msg="DOCTOR ". $doctor_id." REGISTERED SUCCESSFULLY";
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
      $error="DOCTOR ". $doctor_id." IS ALREADY REGISTERED.";
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
          <h2 class="heading--primary">Register Doctor</h2>
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

          <form class="py-2" method="POST" action="registereDoctor.php">
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                <input type="number" min=1 class="form-control control-lg" name="doctor_id" min="0" required placeholder="EMPLOYEE ID:">
              </div>
               <div class="col">
                     <input type="text" class="form-control control-lg" required name="name" placeholder="DOCTOR NAME:">
              </div>
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
                   
              <div class="col">
                <input type="email" class="form-control control-lg" name="email" required placeholder="EMAIL:">
              </div>
              <div class="col">
                 <?php $date=date("Y-m-d");
                 $time=date("H:i");
                  ?>
                     <input type="datetime-local" class="form-control control-lg" name="datetym" required placeholder="date hired" min='<?php echo ($date."T".$time); ?>'>
              </div>
              </div>
           </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
              <div class="col">
              	 <select class="custom-select mr-5" required name="qualification">
              	 	<option value="" selected>SELECT QUALIFICATION</option>
              	 	<option value="Primary medical qualifications">Primary medical qualifications</option>
              	 	<option value="Higher medical degrees">Higher medical degrees</option>
              	 </select>
              </div>
              <div class="col">
              	 <select class="custom-select mr-5" required name="dapartment">
              	 	<option value="" selected>SELECT DEPARTMENT</option>
              	 	<option value="Gastroenterology">Gastroenterology</option>
              	 	<option value="General surgery">General surgery</option>
              	 	<option value="Haematology">Haematology</option>
              	 	<option value="Maternity">Maternity</option>
              	 	<option value="Microbiology">Microbiology</option>
              	 </select>
              </div>
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                 <input  type="text" pattern="\d*" maxlength="10" minlength="10" class="form-control control-lg" name="telephone" required placeholder="TELEPHONE">
              </div>
              <div class="col">
                 <input type="text" class="form-control control-lg" name="address" required placeholder="ADDRESS">
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