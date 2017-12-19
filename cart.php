 <table class="table">
  <thead>
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Quantity</th>
      <th>Product Total Price</th>
      <th>Product Actions</th>
    </tr>
  </thead>
<?php

session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login");
    exit();
}else{
    $userId = $_SESSION['userId'];
    include "init/init.php";
    include "init/includes/header.php";
    
    $stmt = $conn->prepare("SELECT * FROM products, cart, users WHERE 
                            products.productId = cart.productId AND
                            cart.userId = users.userId AND cart.userId = ?
                            
                            ");
    $stmt->execute(array($userId));
    $row = $stmt->fetchAll();
    
    
    foreach($row as $item){
        $id = $item['productId'];
        $name = $item['productName'];
        $q = $item['Q'];
        $total = $item['Q'] * $item['productPrice'];
        ?>
       
  <tbody>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $name; ?></td>
      <td><?php echo $q; ?></td>
      <td><?php echo "$" . $total; ?></td>
      <td><form method="post" action="delete"><input hidden value="<?php echo $id; ?>" name="id" /><input value="Delete" name="submit" type="submit"></form></td>
    </tr>
  </tbody>

        <?php
    }
echo "</table>";
   
}


include "init/includes/footer.php";
?>
     

    