<?php 
require_once("../functions.php");
checkIfNurseIsRegistered();
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
                        <?php echo( 'welcome '. $_SESSION['nurse_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->

                  <div class="margin_top"></div>
                <?php require_once "navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
	<div class="btn btn-sm btn-primary float-right text-uppercase" onclick="printContent('print')">print report</div>
   <div id="print">
   	<h2 class="heading--secondary mb-5 text-center">generate reports</h2>
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>PATIENT ID</th>
      <th>DIAGNOSIS</th>
      <th>DRUGS</th>
      <th>DATE/TIME</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $table="patients";
       require_once "../dbconfig.php";
       $query="SELECT * FROM history";
      $results=$db->query($query);
       $table="patient";
       foreach ($results as $result) {?>
    <tr>
      <td>
        <?php echo($result['patient_id']) ?>
      </td>
      <td>
        <?php echo  $result['diagnosis'] ?>
      </td>
      <td>
        <?php echo($result['drugs']) ?>
      </td>
       <td>
        <?php echo date("Y-m-d h:i:s a", $result['datetym']);  ?>
      </td>
    </tr>
    <?php }
        ?>
</table>
</div>
   </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>

     
      </div>
    </div>
  </div>
</body>
<script src="../js/custom.js"></script>
</html>