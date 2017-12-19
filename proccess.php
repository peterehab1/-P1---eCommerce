<?php


session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login");
    exit();
}else{
    $userId = $_SESSION['userId'];
    include "init/init.php";
    
}

if(isset($_POST['id']) && isset($_POST['quantity']) && isset($_POST['submit'])){
    
    $id = $_POST['id'];
    $q = $_POST['quantity'];
    
    $stmt = $conn->prepare("SELECT * FROM cart WHERE productId = ?");
    $stmt->execute(array($id));
    $count = $stmt->rowCount();
    if($count > 0){
        $stmt1 = $conn->prepare("UPDATE cart SET Q = ? WHERE productId = ?");
        $stmt1->execute(array($q, $id));
        header("Location: cart");
    }else{
        $stmt1 = $conn->prepare("INSERT INTO cart (productId, userId, Q) VALUES (?, ?, ?)");
        $stmt1->execute(array($id, $_SESSION['userId'], $q));
        header("Location: cart");
    }
    
    

    
    }
