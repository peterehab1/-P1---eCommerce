<?php

session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login");
    exit();
}else{
    $userId = $_SESSION['userId'];
    include "init/init.php";
    include "init/includes/header.php";
    
    if(isset($_POST['submit']) && isset($_POST['catg']) && isset($_POST['searchword']) && isset($_POST['price']) ){

        $s = strtolower($_POST['searchword']);
        $stmt = $conn->prepare("SELECT * FROM products WHERE productType = ? AND productPrice >= ? AND productName LIKE ? ");
        $stmt->execute(array($_POST['catg'], $_POST['price'], $s));
        $count = $stmt->rowCount();
        if($count > 0){
            $row = $stmt->fetchAll();
            foreach($row as $i){
    echo ' <div class="col-lg-3 text-center">
            <img class="products" src="images/'.$i['productImage'].'" alt="boots">
            <h4 class="text-center">'.$i['productName'].'</h4>
            <h6 class="text-center" style="color: crimson;">$'.$i['productPrice'].'</h6>
            <a href="product?name='.$i['productName'].'&code='.$i['productCode'].'"><button class="products-btn">Buy</button></a>
        </div> ';
            }
            
        }else{
            echo "there is no produst";
        }
        
    }else{
        echo "there is no produst";
    }
}
