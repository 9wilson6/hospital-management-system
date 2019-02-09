<?php 
require_once("../functions.php");
require_once("../dbconfig.php");
$rec_no=$_REQUEST['id'];
$patient_id=$_REQUEST['patient_id'];
$query="SELECT * FROM payment WHERE rec_id='$rec_no'";
$results=$db->query($query);
foreach ($results as $result) {
 $date=date("Y-m-d h:i:s a", $result['datetym']);
 $patient_id=$result['patient_id'];
 $description=$result['description'];
 $amount=$result['amount'];
}
checkIfDoctorIsRegsitered();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php") ?>

<body>
  <div class="mycontainer">
    <div class=" container text-center">
      <!-- <div class="small__container"> -->
        <div class="colored__background receipt">
                
        <div class="usernametag float-right receipt"><span>
                        <?php echo( 'welcome '. $_SESSION['doctor_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top receipt"></div>
               <?php require_once"navigation.php" ?>
              <div class="border__bottom receipt"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area receipt">
  <div class="btn btn-sm btn-primary float-right text-uppercase" onclick="printContent('print')">print report</div>
  <div id="print">
      <center class="receipt"> <h2 class="heading--secondary mb-5">REPORT FOR PATIENT ID:<?php echo $patient_id; ?></h2>              

           <u class="text-danger">PATIENT ID:</u>
          <p><?php echo $patient_id; ?></p>
           <u class="text-danger">DATE</u>
          <p><?php echo $date; ?></p>
         <u class="text-danger">DESCRIPTION</u>
          <p><?php echo $description; ?></p>
          <u class="text-danger">AMOUNT</u>
          <p><?php echo $amount; ?></p></center>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>
</div>
     
      </div>
    </div>
  </div>
</body>
<script src="../js/custom.js"></script>
</html>