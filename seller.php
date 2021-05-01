<?php
include 'connection.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Freckle+Face&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">

  <link rel="stylesheet" href="/resources/demos/style.css">
 
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark container">
  <!-- Brand/logo -->
  <a class="navbar-brand mx-4" href="#" style="color: darkorange;"><b>A</b>uction<b>H</b>ouse</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Contact Us</a>
    </li>
  </ul>

  <ul class="navbar-nav login">
    <li class="nav-item">
      <a class="nav-link" data-toggle="modal" data-target="#login">Login | SignUp</a>
    </li>
  </ul>
</nav>

<input type="hidden" id="sid" value="<?php echo 4;?>">
<div class="container mb-2" style="border: 2px solid black">

    <div class="portal-name my-4">
        <h4>Your Dashboard</h4>
    </div>

    <div class="portal-header">
        <div>
            <span id="prds" class="active">Your Products</span>
            <span id="add">Add New Product</span>
            <span id="edit">Modify Products</span>
            <span id="remove">Remove Products</span>     
            <span id="transact">Transaction History</span>
        </div>
    </div>

    <div id="your-products">
                        <?php

                    $q = mysqli_query($con, "SELECT * FROM product");
                    ?>
        <span class="small"><b><?php echo mysqli_num_rows($q); ?></b> Products posted <b>4</b> Products pending <b>2</b> Products sold.</span>
        <hr>
        <?php while($row = mysqli_fetch_assoc($q)){ ?>
        
            <div class="products row mx-auto my-4 p-2">
                <div class="pr-img col-3">
                    <img src="<?php echo $row['product_img']; ?>" alt="" width="150">
                </div>
                
                <div class="pr-desc col-6">
                    <span class="h6 row"><?php echo $row['product_name']; ?></span>
                    <div class="row">
                        <span class="small text-secondary">Seller: Ayush Jaiswal</span>
                        <span class="desc small"><?php echo $row['description']; ?></span>
                    </div>
                </div>

                <div class="pr-price col-3">
                        <div class="row">
                            <span class="font-weight-bold">Base Price: </span> <br> <span class="price"> &#8377;<?php echo $row['base_price']; ?></span>
                            <span class="font-weight-bold">Highest Bid Price: </span> <br> <span class="price"> &#8377;<?php echo $row['highest_bid_price']; ?></span>
                        </div>
                        <div class="bid-btn row mx-auto">
                            <!-- <button class="btn btn-primary btn-sm">Purchase</button> -->
                        </div>
                </div>
                
            </div>

        <?php } ?>

    </div>

    <div id="add-product" style="display:none">
        <span class="small">Enter the required fields and submit the form to publish your products.</span>
        <hr>
        <div class="addpdalert alert alert-success alert-dismissible fade show" style="display:none">
        </div>

        <form class="mx-auto" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="pr-title" class="col-sm-2 col-form-label">Product Title</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="pr-title" name="title" placeholder="Ex: Lenovo Legion Y520">
                </div>
            </div>
            <div class="form-group row">
                <label for="desc" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="desc" name="desc" cols="30" rows="4" placeholder="Enter the product description.."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select class="custom-select" name="category" id="category">
                        <option value="">Choose</option>
                        <option value="Electronic">Electronic</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Hardware">Hardware</option>
                        <option value="Home Appliance">Home Appliances</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Base Price</label>
                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">&#8377;</div>
                        </div>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Ex: 4500">
                    </div>
                </div>
            </div>
           
            <div class="form-group row">
                <label for="datepicker" class="col-sm-2 col-form-label">Auction End Date</label>
                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                        </div>
                        <input type="text" class="form-control" id="enddate" name="enddate" placeholder="Ex. 01/05/2021">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="primg" class="col-sm-2 col-form-label">Product Image</label>
                <div class="col-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="primg" required>
                        <label class="custom-file-label" for="primg">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                <button type="button" class="btn btn-dark ppost">Publish this Product</button>
                </div>
            </div>
            </form>
       
    </div>

    <div id="transaction-history" style="display:none">
        <span class="small">You can view your Transaction History Here.</span>
        <hr>

    </div>

    <div id="edit-products" style="display:none">
        <span class="small">Click on 'Modify' button to edit product details.</span>
        <hr>

        <table class="table plist mx-auto">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Product Name</th>
                        <th></th>
                    </tr>
                    
                </thead>
                <tbody>

            <?php
            $q = mysqli_query($con, "SELECT * FROM product");
            $i=1;
            while($row = mysqli_fetch_assoc($q)){
            ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><button class="btn btn-sm btn-primary editbtn">Modify</button></td>        
                </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>

    <div id="remove-products" style="display:none">
        <span class="small">Delete your products here.</span>
        <hr>

        <table class="table plist mx-auto">
                <thead>
                    <tr>
                        <th>S. No.</th>
                        <th>Product Name</th>
                        <th></th>
                    </tr>
                    
                </thead>
                <tbody>

            <?php
            $q = mysqli_query($con, "SELECT * FROM product");
            $i=1;
            while($row = mysqli_fetch_assoc($q)){
            ?>
                <tr>
                    <td><?php echo $i; $i++;?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><button class="btn btn-sm btn-danger editbtn">&#9747; Delete</button></td>        
                </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="login">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Already registered? Please Sign in..</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Enter credentials to login to Portal</p>
                
                  
                      <form action="redirect.php" method="POST" class="form-group row m1 justify-content-center mt-4">
                    
                                    <p class="small">Login as a 
                                        <select name="owner" class="ml-1 mb-2 mt-1">
                                          <option value="bidder">Bidder</option>
                                          <option value="seller">Seller</option>
                                          <option value="admin">Admin</option>
                                        </select> </p>

                                    <input type="email" name="email" class="form-control mb-2" id="exampleInputEmail1"
                                     aria-describedby="emailHelp" placeholder="Enter your Username">

                                     <input type="password" name="pass" class="form-control mb-2" id="exampleInputPassword1" 
                                     placeholder="Enter your Password">
                                    
                                     <input type="submit" value="Login" name="login" class="btn mt-1 btn-block btn-dark btn-sm large">
                                     
                          </form>
                          <div class="row m1 justify-content-between">
                              <div class="col colso">
                                <input type="checkbox" class="small" id="check"> <label class="form-check-label small" for="check">Check me out</label>
                              </div>
                              <div class="col colso">
                                <a href="" class="small">Forgot Password?</a>
                              </div>
                          </div>
                 <div class="row or m2 justify-content-center mt-2">----OR----</div>             
                 <div class="row m2 justify-content-center mt-2">
                  <button class="btn btn-danger btn-sm"><i class="fab fa-google-plus"></i>  Sign Up with Gmail</button>
                  </div>
                
              </div>
              <div class="modal-footer row justify-content-start ml-3">
                <p class="small ">Note: "Sign in with Gmail" option is only available for clients.</p>
              </div>
            </div>
          </div>
        </div>


</body>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="index.js"></script>

</html>