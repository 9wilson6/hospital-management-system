<?php 
require_once("../functions.php");
checkIfIsAdmin();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("../header_.php");

if (isset($_POST['id'])) {
  $patient_id=$_POST['id'];
}
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
   <h2 class="heading--secondary"> Search reasults for <?php echo $patient_id; ?></h2>
<h1 class="text-dark text-right"><a href="registerPatient.php" class="btn btn-primary
                         ">Register
    New Patient</a></h1>
     <a href="patients.php" class="btn btn-lg btn-success my-4">All Records</a>
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Gender</th>
      <th>Address</th>
      <th>Telephone</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $table="patient";
       require_once "../dbconfig.php";
       $query="SELECT * FROM patient WHERE patient_id like '$patient_id%'";
      $results=$db->query($query);
      if (mysqli_num_rows($results)>0) {
         foreach ($results as $result) {?>
    <tr>
      <td>
        <?php echo($result['patient_id']) ?>
      </td>
      <td>
        <?php echo  $result['name'] ?>
      </td>
      <td>
        <?php echo($result['gender']) ?>
      </td>
      <td>
        <?php echo($result['address']); ?>
      </td>
      <td>
        <?php echo($result['telephone']);?>
      </td>
      <td>
        <a href="delete.php?table=<?php echo $table ?>&id=<?php echo $result['patient_id']?>" class="btn btn-sm btn-danger">delete</a>
        <a href="patientEdit.php?id=<?php echo $result['patient_id']?>" class="btn btn-sm btn-primary">edit</a>
      </td>
    </tr>
    <?php }
      }else{ ?>
     <div class="alert alert-info"><?php echo "No Records Found"; ?></div>
      <?php }
      
        ?>
</table>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>

     
      </div>
    </div>
  </div>
</body>

</html>