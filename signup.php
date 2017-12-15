<?php

session_start();
include "init/init.php";
include "init/includes/header.php";

?>


    <div style="padding: 10px;margin: 10px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>


    </div>