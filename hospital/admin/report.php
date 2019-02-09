<?php 
require_once("../functions.php");
checkIfIsAdmin();
require_once "../dbconfig.php";
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

<h1 class="text-dark text-right"><a href="newReport.php" class="btn btn-primary mr-3">Create New Record</a> <span class="btn btn-sm btn-primary py-2 mt-2 float-right text-uppercase" onclick="printContent('print')">print report</span></h1>
      
  <div id="print">

   
        <h2 class="heading--secondary text-center"> monthly expenditure Records</h2>    
     

      <table class="table table-light text-center">
  <thead class="thead-light">
    <tr>
      
      <th>DATE</th>
      <th>AVAILALE AMOUNT</th>
      <th>EXPENSES</th>
      <th>BALANCE</th>
      <th>DETAILS</th>
    </tr>
  </thead>
  <tbody>
   

    <?php 
     $expenses=0;
    $balance=0;
       $query="SELECT * FROM expenses";
        $results=$db->query($query);
      $results=$db->query($query);
       foreach ($results as $result) {?>
    <tr>
      <td>
         <?php echo date("Y-m-d h:i:s a", $result['datetym'])?>
        
      </td>
      <td>
       <?php echo($result['available']);
       
        ?>

      </td>
      <td>
       <?php echo($result['expense']);
        $expenses +=$result['expense'];
        ?>

      </td>
      <td>
        <?php echo($result['balance']);
        $balance += $result['balance'];
         ?>
      </td>
      <td>
        <?php echo($result['description']); ?>
      </td>
    </tr>
    <?php }
        ?>
         <thead class="bg-secondary text-light" >
    <tr>
      
      <th>RECORD FOR</th>
      <th>EXPENSES</th>
      <th>BALANCE</th>
      <th>GROSS RETURNS</th>
      <th>PERFORMANCE</th>
    </tr>
  </thead>
        <tr>
          <td class="text-center text-danger">Totals</td>
          <td class="text-center"><?php echo $expenses; ?></td>
          <td class="text-center"><?php echo $balance; ?></td>
          <?php $gross_returns=$balance-$expenses ?>
          <td class="text-center"><?php echo $gross_returns; ?></td>
          <?php if ($gross_returns<0) { ?>
            <td class="text-danger">POOR</td>
         <?php }elseif ($gross_returns==0) { ?>
           <td class="text-warning">NEUTRAL</td>
         <?php }elseif ($gross_returns>0) { ?>
            <td class="text-success">GOOD</td>
         <?php } ?>
        </tr>
      </tbody>
</table>
    </div>
      </div>
    </div>
  </div>
</div>

</body>
<script src="../js/custom.js"></script>
<?php require_once "../footer.php" ?>
</html>