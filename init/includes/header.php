<?php
include "init/init.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>eCommerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">


    
  </head>
  <style>
      .starter{
          text-align: center;
          margin: 10px;
          padding: 10px;
      }
    </style>
    
  <body>
  
   <nav class="navbar-light navbar-expand-lg sticky-top" style="background-color: #fff; height: 35px;">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item">   
        <a class="nav-link" href="product?type=Mobiles">
          Mobiles
        </a>
      </li>
      
      <li class="nav-item">   
        <a class="nav-link" href="product?type=Computers">
          Computers
        </a>
      </li>
    
      <li class="nav-item dropdown">   
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clothes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="product?type=Clothes : Men">Men</a>
          <a class="dropdown-item" href="product?type=Clothes : Women">Women</a>
          
        </div>
      </li>
      
      
      
      
    </ul>
  </div>
</nav>
    
    
   <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #086fcf;">
  <a class="navbar-brand" href="index">eCommerce <i class="fas fa-shopping-cart"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index">Home</a>
      </li>
       
       <?php
        if(!isset($_SESSION['userId'])){
        
            echo '<li class="nav-item">
        <a class="nav-link" href="login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup">Sign Up</a>
      </li>';
        }else{
            $stmt = $conn->prepare("SELECT * FROM cart WHERE userId = ?");
            $stmt->execute(array($_SESSION['userId']));
            $count = $stmt->rowCount();
            
            echo '<li class="nav-item dropdown">   
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '. $_SESSION['userName'] .'
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile?id='.$_SESSION['userId'].'">Profile</a>
          <a class="dropdown-item" href="logout">Logout</a>
        </div>
      </li>
      
      <li class="nav-item">
<a class="nav-link" href="cart"><div style="color: crimson;"><strong>'.$count.'</strong> <i class="fas fa-shopping-bag"></i></div></a>
      </li>
      ';
        }
        
        ?>
       
      
      
      
        
        
        
   <!--
      <li class="nav-item dropdown">   
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      -->
   
        
        
        
    </ul>
    
    <form method="post" action="search" class="form-inline my-2 my-lg-0">
     <select name="catg" class="search-form-select">
         <option value="Mobiles">Mobiles</option>
         <option value="Computers">Computers</option>
         <option value="Clothes : Men">Clothes : Men</option>
         <option value="Clothes : Women">Clothes : Women</option>
     </select>
      <input name="searchword"  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      
      <strong style="color: white;">Starting at</strong>
      <select name="price" class="search-form-select">
         <option value="0">0$</option>
         <option value="100">100$</option>
         <option value="200">200$</option>
         <option value="300">300$</option>
         <option value="400">400$</option>
         <option value="500">500$</option>
         
     </select>
     
     
     <input name="submit" class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search">
    </form>
  </div>
</nav>
