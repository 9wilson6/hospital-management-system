<?php 
require_once("../functions.php");
checkIfIsAdmin();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php");
if (isset($_REQUEST['id'])) {
  $nurse_id=$_REQUEST['id'];
}
require_once("../dbconfig.php");

 /////////////////////////////////////////////////////////////////////////////// -->
 
if (isset($_POST['submit'])) {

   $telephone=trim($_POST['telephone']);
    $nurse_id=trim($_POST['nurse_id']);
  $rec_no=trim($_POST['rec_no']);
  $name=trim($_POST['name']);
 
  $email=trim($_POST['email']);
  // $address=trim($_POST['address']);
  // $med_condation=trim($_POST['med_condation']);
    $query="UPDATE nurses SET name='$name', telephone='$telephone', email='$email' WHERE nurse_id='$nurse_id'";
    $results=$db->query($query);
    if ($results==1) {
     $msg="NURSE ". $nurse_id." UPDATED SUCCESSFULLY";
    }else{
      $error="UPDATE_ WAS NOT SUCCESSFUL";
    }


   
  
}else{


$query="SELECT * FROM nurses WHERE nurse_id='$nurse_id'";
$results=$db->query($query);
foreach ($results as $result) {
 $name=$result['name'];
 $patient_id=$result['nurse_id'];
 $rec_no=$result['rec_no'];
 // $address=$result['address'];
 $telephone=$result['telephone'];
 $email=$result['email'];
 // $med_condation=$result['med_condition'];
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
                        <?php echo( 'welcome '. $_SESSION['admin_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
                <?php require_once "navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
   <h2 class="heading--secondary"> edit Nurse info</h2>

          <form class="py-2" method="POST" action="editNurse.php">
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
                <input type="number" class="form-control control-lg"  disabled required placeholder="NURSE ID: <?php echo $nurse_id ?>">
                 <input type="hidden"  name="rec_no" min="0" value="<?php echo $rec_no ?>">
              </div>
              <div class="col">
                <input type="text" class="form-control control-lg" required name="name" value="<?php echo $name ?>">
                <input type="hidden" name="nurse_id"  value="<?php echo $nurse_id; ?>">
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
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">UPDATE NURSE INFO</button>
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