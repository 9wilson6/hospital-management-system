<?php 
require_once("../functions.php");
checkIfIsAdmin();
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
                        <?php echo( 'welcome '. $_SESSION['admin_name']) ?></span>
                    <span class="usernametag__logout"><a href="../logout.php" class="btn btn-sm btn-outline-danger linkl ">LOGOUT</a></span>
                </div>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
                  <div class="margin_top"></div>
                <?php require_once "navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">
   <h2 class="heading--secondary"> Doctors List</h2>
<h1 class="text-dark text-right"><a href="registereDoctor.php" class="btn btn-primary
                         ">Register New Doctor</a></h1>
         <form action="doctors_.php" class="my-4" method="POST">
        <input type="text" class="search_field" pattern="\d*" name="id" placeholder="Employee Id">
        <button type="submit" name="submit" class="btn btn-success btn-lg">Search</button>
      </form>
<table class="table table-light">
  <thead class="thead-light">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <!-- <th>Gender</th> -->
      <th>Address</th>
      <th>Telephone</th>
      <th>Department</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
       $table="doctor";
       require_once "../dbconfig.php";
       $query="SELECT * FROM doctor";
      $results=$db->query($query);
       foreach ($results as $result) {?>
    <tr>
      <td>
        <?php echo($result['doctor_id']) ?>
      </td>
      <td>
        <?php echo  $result['name'] ?>
      </td>
     <!--  <td>
        <?php #echo($result['gender']) ?>
      </td> -->
      <td>
        <?php echo($result['address']); ?>
      </td>
      <td>
        <?php echo($result['telephone']);?>
      </td>
      <td>
        <?php echo($result['department']);?>
      </td>
      <td><a href="delete.php?table=<?php echo $table ?>&id=<?php echo $result['doctor_id']?>" class="btn btn-sm btn-danger">delete
        </a>
        <a href="doctorEdit.php?id=<?php echo $result['doctor_id']?>" class="btn btn-sm btn-primary">edit</a>
      </td>
    </tr>
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