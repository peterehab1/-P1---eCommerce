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
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = md5($password);
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE userEmail = ? AND userPassword = ?");
    $stmt->execute(array($email, $hashpassword));
    $count = $stmt->rowCount();
    if ($count > 0){
        $row = $stmt->fetch();
        $_SESSION['userId'] = $row['userId'];
        $_SESSION['userName'] = $row['userName'];
        
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
  You are Logged In Now ! <a href="index">Home</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        exit();
        
    }else{
    
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Your Email or Password is wrong, Try again :( </strong>
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
                    <form action="login" method="post">
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input">
                                     Remember Me 
                            </label><br>
                            <a href="#"><small>Forgot password ?</small></a>
                        </div>
                        <input value="Login" name="submit" type="submit" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>


    </div>
    
   
  <?php
include "init/includes/footer.php";
?>