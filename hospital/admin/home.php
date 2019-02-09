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
               <?php require_once"navigation.php" ?>
              <div class="border__bottom"></div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<div class="display_area">


   <!-- /////////////////////////////////////////////////////////////////// -->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
    <h2 class="text-info">ABOUT CROSSWAY HOSPITAL</h2>
        <p class="bg-info">

          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa mollitia blanditiis debitis, fuga labore
          fugit quae ad impedit sint dolor adipisci ratione eos. Pariatur est sequi aperiam dolorum reprehenderit,
          corporis neque voluptas explicabo, eum debitis, deserunt sit autem maxime laborum itaque mollitia dicta.
          Sapiente temporibus sint inventore, hic, quidem voluptates!
        </p>
      </div>
      <div class="carousel-item">
        <h2 class="text-warning">OUR STAFF</h2>
        <p class="bg-warning">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa mollitia blanditiis debitis, fuga labore
          fugit quae ad impedit sint dolor adipisci ratione eos. Pariatur est sequi aperiam dolorum reprehenderit,
          corporis neque voluptas explicabo, eum debitis, deserunt sit autem maxime laborum itaque mollitia dicta.
          Sapiente temporibus sint inventore, hic, quidem voluptates!
        </p>
      </div>
      <div class="carousel-item">
        <h2 class="text-success">TESTIMONIALS</h2>
        <p class="bg-success">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa mollitia blanditiis debitis, fuga labore
          fugit quae ad impedit sint dolor adipisci ratione eos. Pariatur est sequi aperiam dolorum reprehenderit,
          corporis neque voluptas explicabo, eum debitis, deserunt sit autem maxime laborum itaque mollitia dicta.
          Sapiente temporibus sint inventore, hic, quidem voluptates!
        </p>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
                      <!-- <div class="landingimage">
                        <img src="../assets/hosibg.jpg" alt="Background image">
                      </div> -->

</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>

     
      </div>
    </div>
  </div>
</body>
<?php require_once "../footer.php" ?>
</html>