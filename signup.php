<?php

session_start();
if(!isset($_SESSION['userId'])){
    include "init/init.php";
    include "init/includes/header.php";
}else{
    header("Location: index");
    exit();
    
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = md5($password);
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE userEmail = ?");
    $stmt->execute(array($email));
    $count = $stmt->rowCount();
    if ($count > 0){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oops !</strong>Looks like this Email is already in use, If that is you ,<a href="login">Log In</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        
    }else{
    
    $stmt = $conn->prepare("INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?)");
    $stmt->execute(array($name, $email, $hashpassword));
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congrats !</strong>Your account created Successfully, Now Go to <a href="login">Log In</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        } 
}

?>


    <div style="padding: 10px;margin: 10px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="signup" method="post">
                       <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" required>
                                      By clicking "Sign Up" you agree to Our Terms. 
                            </label>
                        </div>
                        <input type="submit" value="Sign Up" name="submit" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>


    </div>
    
   <?php
include "init/includes/footer.php";

?>