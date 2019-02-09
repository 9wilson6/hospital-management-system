<?php 
require_once("../functions.php");
checkIfIsAdmin();
 ?>
 <?php
 $error="";
 $msg=""; 
if (isset($_POST['submit'])) {
  require_once("../dbconfig.php");
  $nurse_id=$_POST['nurse_id'];
  $name=$_POST['name'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $C_password=$_POST['C_password'];
    $query="SELECT * FROM nurses WHERE nurse_id='$nurse_id'";
    $results=$db->query($query);
    if (mysqli_num_rows($results)==0) {
   if ($password==$C_password) {
    //check pass length
if (strlen($password)>=5) {
    $password=hash('sha256', $password);
   $query="INSERT INTO nurses(nurse_id, name, telephone, email, password)VALUES('$nurse_id', '$name', '$telephone', '$email',  '$password')";
   $results=$db->query($query);
    if ($results==1) {
     $msg="NURSE ". $nurse_id." REGISTERED SUCCESSFULLY";
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
      $error="NURSE ". $nurse_id." IS ALREADY REGISTERED.";
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
        <?php require_once "navigation.php" ?>
        <div class="border__bottom"></div>
        <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="display_area">
          <h2 class="heading--primary">Register Nurse</h2>
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

          <form class="py-2" method="POST" action="registerNurse.php">
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                <input type="number" min=1 class="form-control control-lg" name="nurse_id" min="0" required placeholder="EMPLOYEE ID:">
              </div>
              
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
                    <div class="col">
                     <input type="text" class="form-control control-lg" required name="name" placeholder="NURSE NAME:">
              </div>
              
              </div>
           </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                <input type="email" class="form-control control-lg" name="email" required placeholder="EMAIL:">
              </div>
            </div>
           </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group mb-5">
              <div class="row">
              <div class="col">
                 <input type="text" pattern="\d*" maxlength="10" minlength="10" class="form-control control-lg" name="telephone" required placeholder="TELEPHONE">
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