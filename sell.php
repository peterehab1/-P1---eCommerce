<?php

session_start();
if(!isset($_SESSION['userId'])){
    header("Location: login");
    exit();
}else{
    $userId = $_SESSION['userId'];
    include "init/init.php";
    include "init/includes/header.php";
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    
    $fileName = $_FILES['file']['name'];
    $fileStore = "images/".basename($_FILES['file']['name']);
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileAcualExt = strtolower(end($fileExt));
    $fileUniqueName = uniqid('', true).".".$fileAcualExt;
    $productCode = uniqid('', true);
    $fileDest = "images/".$fileUniqueName;
    
    $proName = $_POST['name'];
    $proDesc = $_POST['desc'];
    $proType = $_POST['type'];
    $proBrand = $_POST['brand'];
    $proColor = $_POST['color'];
    $proPrice = $_POST['price'];
    
    
    


    
    if($fileSize > 5000000){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry :( </strong> Max size 5 Megabytes and Only your file is '.$fileSize.' Bytes
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }elseif($fileAcualExt != "png"){
        
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry :( </strong>.PNG is allowed, your file is '.$fileType.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        
        
        
    }else{
        $imageName =$_FILES['file']['name'];
        $stmt = $conn->prepare("INSERT INTO products (productColor, productCode, userId, productName, productDesc, productPrice, productType, productBrand, productImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($proColor, $productCode, $userId, $proName, $proDesc, $proPrice, $proType, $proBrand, $fileUniqueName));
        if(move_uploaded_file($_FILES['file']['tmp_name'], $fileDest)){
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>WOW ! </strong>Your Product is ready for sell, Check is <a href="product?name='.$proName.'&&code='.$productCode.'">Here</a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Oops ! </strong>Looks like something went wrong, try again!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
    }
}

?>

<div style="padding: 10px;margin: 10px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form action="sell" method="post" enctype="multipart/form-data">
                       
                         
                         <div class="form-group">
                            <label for="exampleInputEmail1">Product Type</label>
                             <select name="type" class="form-control">
                                 <option value="Mobiles">Mobiles</option>
                                 <option value="Computers">Computers</option>
                                 <option value="Clothes : Men">Clothes : Men</option>
                                 <option value="Clothes : Women">Clothes : Women</option>
                             </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Brand</label>
                            <input type="text" name="brand" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Color</label>
                            <input type="text" name="color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Brand" required>
                        </div>
                         
                       <div class="form-group">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Description</label>
                            <textarea placeholder="Enter Description" name="desc" class="form-control" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input name="price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price" required>
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input name="file" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price" required>
                            
                        </div>
                        
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" required>
                                      By clicking "Sign Up" you agree to Our Terms. 
                            </label>
                        </div>
                        <input type="submit" value="Sell" name="submit" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>


    </div>


<?php

include "init/includes/footer.php";

?>