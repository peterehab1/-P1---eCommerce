<?php

session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login");
    exit();
}else{
    include "init/init.php";
    include "init/includes/header.php";
}

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $userId = $_GET['id'];
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE userId = ?");
    $stmt->execute(array($userId));
    $count = $stmt->rowCount();
    if($count > 0){
        $row = $stmt->fetch();
        $name = $row['userName'];
    }else{
       echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>There is no such profile <a href="index">Home</a></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        include "init/includes/footer.php";
        exit();
    }
    ?>
       <!--###-->
       
       <div class="container">
           <div class="row">
              
              <div class="col-lg-4 col-md-4"></div>
              
               <div class="col-lg-4 col-md-4">
                   <div class="profile-panel">
                     <img src="images/pic.jpg" alt="profile-pic"><br>
                      <strong><?php echo $name; ?></strong><br><br>
                      
                
                      <strong><i class="fas fa-cart-plus"></i></strong><br>
                    
                      <strong>655</strong><br>
                      
                      <?php
                    if($userId == $_SESSION['userId']){
                        echo '<a href="sell"><button name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Start Selling">Start Selling</button></a>';
                        
                    }else{
                        
                    }
                        ?>
        
                      
                       
                   </div>
               </div>
               
               <div class="col-lg-4 col-md-4"></div>
               
           </div>
       </div>
       
       <!--###-->
       
    <?php
}else{
   echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>There is no such profile <a href="index">Home</a></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

?>


<?php
include "init/includes/footer.php";
?>
