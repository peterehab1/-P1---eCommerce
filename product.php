<?php

    session_start();
    include "init/init.php";
    include "init/includes/header.php";

if(isset($_GET['name']) && isset($_GET['code'])){
    
    $proName = $_GET['name'];
    $proCode = $_GET['code'];
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE productName = ? AND productCode = ?");
    $stmt->execute(array($proName, $proCode));
    $count = $stmt->rowCount();
    if($count > 0){
        $row = $stmt->fetch();
        
        $price = $row['productPrice'];
        $desc = $row['productDesc'];
        $date = $row['productDate'];
        $type = $row['productType'];
        $image = $row['productImage'];
        $brand = $row['productBrand'];
        $id = $row['productId'];
        
        
        ?>
        <section aria-label="Main content" role="main" class="product-detail">
  <div itemscope itemtype="http://schema.org/Product">
    <meta itemprop="url" content="http://html-koder-test.myshopify.com/products/tommy-hilfiger-t-shirt-new-york">
    <meta itemprop="image" content="//cdn.shopify.com/s/files/1/1047/6452/products/product_grande.png?v=1446769025">
    <div class="shadow">
      <div class="_cont detail-top">
        <div class="cols">
          <div class="left-col">
   
            <div class="big">
              <span id="big-image" class="img" quickbeam="image" style="background-image: url('images/<?php echo $image; ?>')"></span>
              
              
            </div>
          </div>
          <div class="right-col">
            <h1 itemprop="name"><?php echo $proName; ?></h1>
            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
              <meta itemprop="priceCurrency" content="USD">
              <link itemprop="availability" href="https://schema.org/InStock">
              <div class="price-shipping">
                <div class="price" id="price-preview" quickbeam="price" >
                  $<?php echo $price; ?>
                </div>
                <a><?php echo $brand; ?></a>
                <a><?php echo $type; ?></a>
              </div>
              
              <!-- <form method="post" enctype="multipart/form-data" id="AddToCartForm"> -->
              <form method="post" action="proccess" id="AddToCartForm">
                
                <div class="btn-and-quantity-wrap">
                  <div class="btn-and-quantity">
                    <div class="spinner">
                      
                      <input type="number" id="updates_2721888517" name="quantity" placeholder="How many ?" class="quantity-selector" required>
                      
                      <input type="number" hidden id="updates_2721888517" name="id" value="<?php echo $id; ?>" class="quantity-selector" required>
                      
                      <span class="q">Qty.</span>
                      
                    </div>
                    <input type="submit" name="submit" id="AddToCart">
                  </div>
                </div>
              </form>
              <div class="tabs">
                <div class="tab-labels">
                  <span data-id="1" class="active">Info</span>
                  
                </div>
                <div class="tab-slides">
                  <div id="tab-slide-1" itemprop="description"  class="slide active">
                    <?php echo $desc; ?>
                  </div>
                </div>
              </div>
              <div class="social-sharing-btn-wrapper">
                <span id="social_sharing_btn">Share</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</section>


<!-- Quickbeam cart-->

<div id="quick-cart" quickbeam="cart">
  <a id="quick-cart-pay" quickbeam="cart-pay" class="cart-ico">
    <span>
      <strong class="quick-cart-text">Pay<br></strong>
      <span id="quick-cart-price">0</span>
      <span id="quick-cart-pay-total-count">0</span>
    </span>
  </a>
</div>

<!-- Quickbeam cart end -->
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='//raw.githubusercontent.com/greenwoodents/quickbeam.js/master/dist/quickbeam.min.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js'></script>
        
        <?php
        
        
        
    }else{
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oops !</strong>Looks like this Product is not in here. <a href="index">Home</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    exit();
        
        
    }
}elseif(isset($_GET['type'])){
    
    $proType = $_GET['type'];
    
    
    $stmt = $conn->prepare("SELECT * FROM products WHERE productType = ?");
    $stmt->execute(array($proType));
    $count = $stmt->rowCount();
    if($count > 0){
        $row = $stmt->fetchAll();
       
        ?>
        
        <aside class="related">
      <div class="_cont">
        <h2>You might also like</h2>
        <div class="collection-list cols-4" id="collection-list" data-products-per-page="4">
         
         <?php
        
            foreach($row as $item){
            
        $name = $item['productName'];
        $price = $item['productPrice'];
        $code = $item['productCode'];
        $image = $item['productImage'];
        
           
            ?>
            <a href="product?name=<?php echo $name; ?>&&code=<?php echo $code; ?>" class="product-box">
            <span class="img">
              <span style="background-image: url('images/<?php echo $image; ?>')" class="i first"></span>
              <span class="i second" style="background-image: url('images/<?php echo $image; ?>')"></span>
            </span>
            <span class="text">
              <strong><?php echo $name; ?></strong>
              <span>
                $<?php echo $price; ?>
              </span>
            </span>
          </a> 
            
            <?php
        }
        
            ?>
         
         
          
          
        </div>
      </div>
    </aside>
        
        <?php
      
    
    
}else{
        
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oops !</strong>Looks like this Product is not in here. <a href="index">Home</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    exit();
        
    }
}

else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oops !</strong>Looks like this Product is not in here. <a href="index">Home</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    exit();
    
}

?>





<?php
include "init/includes/footer.php";
?>



