<?php 
require_once("../functions.php");
checkIfIsAdmin();
require_once "../dbconfig.php";
 ?>
<!DOCTYPE html>
<html lang="en">

<?php require_once("../header_.php");
 $error="";
 $msg=""; 
if (isset($_POST['submit'])) {
$total_cash=trim($_POST['available_cash']);
$expenses=trim($_POST['expenses']);
$datetym=strtotime($_POST['datetym']);
$description=$_POST['description'];
$balance=($total_cash-$expenses);
$query="INSERT INTO expenses (expense, datetym, description, balance, available)VALUES('$expenses','$datetym','$description','$balance', '$total_cash')";
$results=$db->query($query);

if ($results==1) {

 $query="UPDATE payment SET counted=1";
 $results=$db->query($query);
 if ($results==1) {
   $msg="Record Created Successfully"; 
 }else{
  $error="Failed to Update record";
 }
}
else{
  $error="Failed to create record";
}
}
#/////////////////////////////////////////////////////////////////////////////// -->
$query="SELECT * FROM payment WHERE counted=0";
 $total_cash=0;
$results=$db->query($query);
if (mysqli_num_rows($results)>0) {
 
 foreach ($results as $result) {
 $total_cash +=$result['amount'];

}
}
# ///////////////////////////////////////////////////////////////////////////////////////// -->
 ?>

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

   <h2 class="heading--secondary"> New monthly expenditure Record</h2>


      <form action="newReport.php" class="py-2" method="POST">
       <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
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
                <input type="text"  class="form-control control-lg text-danger" disabled  value="<?php echo "ACCOUNT BAL:  ". $total_cash ?>" >
                <input type="hidden" name="available_cash" value="<?php echo $total_cash ?>">
              </div>
              <div class="col">
                     <input type="number" class="form-control control-lg"  name="expenses" required placeholder="TOTAL EXPENSIS">
              </div>
              </div>
           </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
           <div class="form-group mb-5">
              <div class="row">
                 <div class="col">
                   <?php $date=date("Y-m-d");
                 $time=date("H:i");
                  ?>
                <input type="datetime-local" class="form-control control-lg" required name="datetym" placeholder="DATE/TIME" min='<?php echo ($date."T".$time); ?>'>
              </div>  
             
              <div class="col">
                 <textarea name="description" class="form-control control-lg" required placeholder="DETAILS"></textarea>    
              </div>
              </div>
           </div>
          <!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
              <div class="form-group  mb-5">
              <div class="form-row">
                <div class="col">
                  <button class="btn btn-block btn-info myloginbutton" type="submit" name="submit">CREATE RECORD</button>
                </div>

              </div>
            </div>
           <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      </form>
    </div>
      </div>
    </div>
  </div>
</div>
</body>
<?php require_once "../footer.php" ?>
</html>