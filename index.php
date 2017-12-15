<?php
session_start();
include "init/init.php";
include "init/includes/header.php";

?>

<h6 class="starter">Last Added</h6>
<div class="container">
    <div class="row starter">
              <?php
                
                for($i = 1; $i < 9; $i++){
                    echo ' <div class="col-lg-3">
            <img class="products" src="images/boots.png" alt="boots">
            <h4 class="text-center">Boot</h4>
            <h6 class="text-center">23.43$</h6>
            <a href="#"><button class="products-btn">Buy</button></a>
        </div> ';
                }
        
                ?>      
        
    </div>
</div>


<?php
include "init/includes/footer.php";
?>