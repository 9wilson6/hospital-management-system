<?php 
require_once("../functions.php");
checkIfDoctorIsRegsitered();
$patient_id=$_REQUEST['id'];
require_once("../dbconfig.php");
$query="SELECT * FROM history WHERE patient_id=$patient_id";
$results=$db->query($query);

 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php") ?>

<body>
  <div class="mycontainer">
    <div class=" container text-center">
      <!-- <div class="small__container"> -->
        <div class="colored__background">
                
        <div class="usernametag float-right"><span>
                        <?php echo( 'welcome '. $_SESSION['doctor_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
                <?php require_once "navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
   <h2 class="heading--secondary mb-5">HISTORY</h2>

                   <?php if (mysqli_num_rows($results)==0) {
                    echo "NO MEDICAL HISTORY FOUND FOR PATIENT ID ". $patient_id;
                   }else{ ?>
                    
                    <table class="table table-light">
  <thead class="thead-light">
    <tr>
      <!-- <th>DOCTOR ID</th> -->
      <th>PATIENT ID</th>
      <th>DIAGNOSIS</th>
      <th>DATE</th>
      <th>DRUGS</th>
      <th>RECOMMEDATION</th>
    </tr>
  </thead>
  <tbody>
                    <?php foreach ($results as $result) { ?>
                
                    <tr>
                      <td><?php echo $result['patient_id']; ?></td>
                      <td><?php echo $result['diagnosis']; ?></td>
                     <td>
                        <?php echo date("Y-m-d h:i:s a", $result['datetym']); ?>

                     </td>                     
                      <td><?php echo $result['drugs']; ?></td>
                      <td><?php echo $result['recommedation']; ?></td>

                    </tr>

                  <?php }
                   } ?>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>

     
      </div>
    </div>
  </div>
</body>

</html>