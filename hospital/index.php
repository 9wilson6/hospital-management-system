<?php 
require_once("dbconfig.php");
require_once("formFunctions.php");
if (isset($_POST['submit'])) {
	   if ( !empty($_POST['username'])|| !empty($_POST['password'])) {
	 $password=$db->quote($_POST['password']);
    $password=hash('sha256', $password);
    $username=$_POST['username'];
	if ($_POST['user_type']=="Admin") {
		adminLogin();
	}elseif ($_POST['user_type']=="Doctor") {
		doctorLogin();
	}elseif ($_POST['user_type']=="Nurse") {
		nurseLogin();
	}elseif ($_POST['user_type']=="Patient") {
		patientLogin();
}
}else{
    
     $error="Empty Fields Ditected!!";
   }

}

 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("header.php") ?>

<body>
  <div class="mycontainer">
    <div class=" container text-center">
      <div class="small__container">
        <div class="colored__background">
          <form class="py-5" method="POST" action="index.php">
            <h1 class="heading--primary">Login</h1>
            <?php if (!empty($error)) {?>
            <div class="form-group">
              <div class="section-form__input text-danger">
                <?php   echo($error) ?>
              </div>
            </div>
            <?php    } ?>
            <div class="form-group mb-5">
              <div class="form-row">
                <div class="col mr-5">
                  <input type="text" class="form-control control-lg" name="username" placeholder="Username/Email">
                </div>
                <!--                 <div class="col ">
                  <input type="text" class="form-control control-lg" placeholder="Last name">
                </div> -->
              </div>
            </div>
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col mr-5">
                  <input type="password" class="form-control control-lg" name="password" placeholder="password">
                </div>
                <!--                 <div class="col">
                  <input type="text" class="form-control control-lg" placeholder="Last name">
                </div> -->
              </div>
            </div>
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col mr-5">
                  <select class="custom-select mr-5" required name="user_type">
                    <option value="Patient">Patient</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Admin">Admin</option>

                  </select>
                </div>

              </div>
            </div>
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col mr-5">
                 
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">Login</button>
                </div>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>