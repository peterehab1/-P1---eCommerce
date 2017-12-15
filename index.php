<?php
session_start();
include "init/init.php";
include "init/includes/header.php";

?>



<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/banner1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/banner1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/banner1.jpg" alt="Third slide">
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

<h6 class="starter">Last Added</h6>
<div class="container">
    <div class="row starter">
              <?php
                
                for($i = 1; $i < 9; $i++){
                    echo ' <div class="col-lg-3">
            <img class="products" src="images/boots.png" alt="boots">
            <h4 class="text-center">Boot</h4>
            <h6 class="text-center" style="color: crimson;">23.43$</h6>
            <a href="#"><button class="products-btn">Buy</button></a>
        </div> ';
                }
        
                ?>      
        
    </div>
</div>


<?php
include "init/includes/footer.php";
?>