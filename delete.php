<?php


session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login");
    exit();
}else{
    $userId = $_SESSION['userId'];
    include "init/init.php";
    
    
    if(isset($_POST['id']) && isset($_POST['submit'])){
        
        $stmt = $conn->prepare("DELETE FROM cart WHERE productId = ? AND userId = ?");
        $stmt->execute(array($_POST['id'], $_SESSION['userId']));
        header("Location: cart");
    }
    
}