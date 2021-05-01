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
<link rel="stylesheet" href="index.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Freckle+Face&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">

  <link rel="stylesheet" href="/resources/demos/style.css">
 
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark container">
  <!-- Brand/logo -->
  <a class="navbar-brand mx-4" href="index.php" style="color: darkorange;"><b>A</b>uction<b>H</b>ouse</a>
  
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



<div class="body-contain container mb-2" style="border: 2px solid black">
<?php if(!isset($_GET['cat'])){ ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100" src="images/banner.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
                <h3>Online Auction House</h3>
                <p>Bid for your favourite products and get it delivered at your doorstep in few easy steps.</p>
        </div>
        </div>
    </div>
    </div>

    <div class="categories">

        <div class="header my-5">
            <h4>Our Categories</h4>
            <hr>
        </div>

        <div class="cat border">
            <div class="row justify-content-center">
                <div class="card" style="width: 18rem;" onclick="window.location.href='index.php?cat=Electronic'">
                    <img class="card-img-top" height="168" src="images/categories/electronic.jfif" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Electronics</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;" onclick="window.location.href='index.php?cat=Home Appliances'">
                    <img class="card-img-top" height="168" src="images/categories/appliances.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Home Appliances</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;" onclick="window.location.href='index.php?cat=Clothing'">
                    <img class="card-img-top" height="168" src="images/categories/clothing.jfif" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Clothings</p>
                    </div>
                </div>
            </div>    
            <div class="row justify-content-center">
                <div class="card" style="width: 18rem;" onclick="window.location.href='index.php?cat=Stationary'">
                    <img class="card-img-top" height="168" src="images/categories/stationary.jfif" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Stationary Items</p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;" onclick="window.location.href='index.php?cat=All'">
                    <img class="card-img-top" height="168" src="images/categories/all.png" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">All Category</p>
                    </div>
                </div>
            </div>
        </div>
       

    </div>

    <?php }else{
            $q = mysqli_query($con, "SELECT * FROM product WHERE product_type='".$_GET['cat']."'");
                ?>
    <div class="catpage">
        <div class="header my-5">
        <?php echo mysqli_num_rows($q); ?> Results for <?php echo $_GET['cat']; ?> Products
         <hr>
        </div>
        <div class="filters">
            <div class="row">
                <span class="col"><strong>Sort By</strong></span>
                <span class="col active">Popularity</span>
                <span class="col">Price -- Low to High</span>
                <span class="col">Price -- Low to High</span>
                <span class="col">Newest First</span>     
            </div>

        </div> 

        <div class="plist">
            <?php if(mysqli_num_rows($q)==0){
                    echo "<h3 class='my-4' style='text-align:center'>No results for Products</h3>";
            }else{ while($row = mysqli_fetch_assoc($q)){ ?>
            
            <div class="products border-bottom row mx-auto my-4 p-2">
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
                        <div class="row mx-auto">
                            <h5> &#8377;<?php echo $row['highest_bid_price']; ?></h5>
                        </div>
                            <span class="font-weight-bold">Base Price: </span> <span class="price"> &#8377;<?php echo $row['base_price']; ?></span><br>  
                            <span class="font-weight-bold">Highest Bid: </span> <span class="price"> &#8377;<?php echo $row['highest_bid_price']; ?></span>
                        
                        <div class="bid-btn row mx-auto">
                            <small><button class="btn btn-secondary btn-sm mt-2" onclick="window.location.href='bidpage.php?pid=<?php echo $row['id']; ?>'">Bid Now</button></small>
                        </div>
                            
                </div>
                
            </div>

            <?php }} ?>
        </div>
    </div>

    
    
    <?php } ?>
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