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
        
        ?>
        <section aria-label="Main content" role="main" class="product-detail">
  <div itemscope itemtype="http://schema.org/Product">
    <meta itemprop="url" content="http://html-koder-test.myshopify.com/products/tommy-hilfiger-t-shirt-new-york">
    <meta itemprop="image" content="//cdn.shopify.com/s/files/1/1047/6452/products/product_grande.png?v=1446769025">
    <div class="shadow">
      <div class="_cont detail-top">
        <div class="cols">
          <div class="left-col">
    <h6 style="color: green;"><i class="fas fa-thumbs-up"></i><span> 0</span></h6>
    <h6 style="color: red;"><i class="fas fa-thumbs-down"></i><span> 0</span></h6>
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
              <form id="AddToCartForm">
                
                <div class="btn-and-quantity-wrap">
                  <div class="btn-and-quantity">
                    <div class="spinner">
                      
                      <input type="number" id="updates_2721888517" name="quantity" placeholder="How many ?" class="quantity-selector" required>
                      
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
    <aside class="related">
      <div class="_cont">
        <h2>You might also like</h2>
        <div class="collection-list cols-4" id="collection-list" data-products-per-page="4">
          <a class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_70d2887b-ec6a-4bcb-a93b-7fd1783e6445_grande.jpg?v=1447530130')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/product_030f9fc5-f253-4dca-a43a-fe2b719d0704_grande.png?v=1447530130')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 2</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko2_357767df-d7ff-4b58-b705-edde76bb32b7_grande.jpg?v=1447530150')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_613d5776-ea61-4f9b-abef-0ce847c63a67_grande.jpg?v=1447530150')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 3</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a href="/collections/men/products/copy-of-copy-of-copy-of-tommy-hilfiger-t-shirt-new-york-4" class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko3_0e98498a-123c-4305-9d94-d8280bb46416_grande.jpg?v=1447530164')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko2_6c949188-dba0-4789-9434-c0821b92f3f4_grande.jpg?v=1447530164')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 4</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/product_7d606126-1b60-4738-99b3-062810f2db8b_grande.png?v=1447530674')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko3_fd08d231-654c-4304-81b2-9191e6fd141e_grande.jpg?v=1447530674')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 5</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box hidden">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_bba77d82-7f85-47af-9a45-f4700bcc04ad_grande.jpg?v=1447530689')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/product_f065e961-d296-48a8-8a67-a3532200e257_grande.png?v=1447530689')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 6</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box hidden">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko2_bf59c7f2-7c1f-4822-9494-6a984598a56c_grande.jpg?v=1447530706')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_c6fa0fc1-99a0-4bd0-a1d8-0270127977fc_grande.jpg?v=1447530706')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 7</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
        </div>
        <div class="more-products" id="more-products-wrap">
          <span id="more-products" data-rows_per_page="1">More products</span>
        </div>
      </div>
    </aside>
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
        $row = $stmt->fetch();
        
        $name = $row['productName'];
        $price = $row['productPrice'];
        $desc = $row['productDesc'];
        $date = $row['productDate'];
        $type = $row['productType'];
        $image = $row['productImage'];
        $brand = $row['productBrand'];
        
        echo $price . "<br>";
        echo $name. "<br>";
        ?>
        
        <aside class="related">
      <div class="_cont">
        <h2>You might also like</h2>
        <div class="collection-list cols-4" id="collection-list" data-products-per-page="4">
          <a class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_70d2887b-ec6a-4bcb-a93b-7fd1783e6445_grande.jpg?v=1447530130')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/product_030f9fc5-f253-4dca-a43a-fe2b719d0704_grande.png?v=1447530130')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 2</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko2_357767df-d7ff-4b58-b705-edde76bb32b7_grande.jpg?v=1447530150')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_613d5776-ea61-4f9b-abef-0ce847c63a67_grande.jpg?v=1447530150')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 3</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a href="/collections/men/products/copy-of-copy-of-copy-of-tommy-hilfiger-t-shirt-new-york-4" class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko3_0e98498a-123c-4305-9d94-d8280bb46416_grande.jpg?v=1447530164')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko2_6c949188-dba0-4789-9434-c0821b92f3f4_grande.jpg?v=1447530164')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 4</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/product_7d606126-1b60-4738-99b3-062810f2db8b_grande.png?v=1447530674')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko3_fd08d231-654c-4304-81b2-9191e6fd141e_grande.jpg?v=1447530674')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 5</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box hidden">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_bba77d82-7f85-47af-9a45-f4700bcc04ad_grande.jpg?v=1447530689')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/product_f065e961-d296-48a8-8a67-a3532200e257_grande.png?v=1447530689')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 6</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
          <a class="product-box hidden">
            <span class="img">
              <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko2_bf59c7f2-7c1f-4822-9494-6a984598a56c_grande.jpg?v=1447530706')" class="i first"></span>
              <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_c6fa0fc1-99a0-4bd0-a1d8-0270127977fc_grande.jpg?v=1447530706')"></span>
            </span>
            <span class="text">
              <strong>Tony Hunfinger T-Shirt New York 7</strong>
              <span>
                From $800.00
              </span>
              <div class="variants">
                <div class="variant">
                  <div class="var m available">
                    <div class="t">M</div>
                  </div>
                  <div class="var l available">
                    <div class="t">L</div>
                  </div>
                  <div class="var xl available">
                    <div class="t">XL</div>
                  </div>
                  <div class="var xxl available">
                    <div class="t">XXL</div>
                  </div>
                </div>
                <div class="variant">
                  <div class="var color blue available">
                    <div class="c" style="background-color: blue;"></div>
                  </div>
                  <div class="var color red available">
                    <div class="c" style="background-color: red;"></div>
                  </div>
                  <div class="var color yellow available">
                    <div class="c" style="background-color: yellow;"></div>
                  </div>
                </div>
              </div>
            </span>
          </a>
        </div>
        <div class="more-products" id="more-products-wrap">
          <span id="more-products" data-rows_per_page="1">More products</span>
        </div>
      </div>
    </aside>
        
        <?php
        exit();
       
    
    
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



