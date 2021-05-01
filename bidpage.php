<?php
include 'connection.php';

if(isset($_GET['pid'])){
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
<link rel="stylesheet" href="bidpage.css">
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


<?php 
$q = mysqli_query($con, "SELECT * FROM product WHERE id='".$_GET['pid']."'");
$product = mysqli_fetch_assoc($q);
$q1 = mysqli_query($con, "SELECT * FROM user WHERE uid='".$product['seller_id']."'");
$q2 = mysqli_query($con, "SELECT * FROM bids WHERE pid='".$_GET['pid']."'");

$seller = mysqli_fetch_assoc($q1);
?>
<div class="body-contain container mb-2" style="border: 2px solid black">
    <div class="header my-5">
            <h3><?php echo $product['product_name']; ?></h3>
            <hr>
            <div class="addpdalert alert alert-success alert-dismissible fade show" style="display:none">
        </div>
    </div>

    <div class="main">
        <div class="row">
            <div class="col-6 pimg border p-3 m-2">
                <img src="<?php echo $product['product_img']; ?>" alt="" width="400">
            </div>
            <div class="bid col-4 border m-2 p-3">
                    <span class="price row text-primary font-weight-bolder justify-content-center">&#8377;<?php echo $product['highest_bid_price']; ?>
                    </span>
                    <hr>
                    <span class="timer row my-2 mx-auto justify-content-center p-2">
                        1d: 21:35:24
                    </span>

                    <span class="bid-input row my-2 mx-auto justify-content-center p-2">
                        <input type="text" class="form-control"  placeholder="Your Maximum Bid" id="placebid" required>
                        <button type="button" class="btn btn-primary btn-lg btn-block mt-2 btn-sm active" onclick="placeBid('<?php echo $_GET['pid']; ?>', '<?php echo $product['highest_bid_price']; ?>')">Place a Bid</button>
                        <p class="text-center mt-4"><a href="#" data-toggle="modal" data-target="#bidsModal">
                            <i class="fas fa-history" aria-hidden="true"></i> <?php echo mysqli_num_rows($q2); ?> bids so far - see history</a></p>
                    </span>
            </div>
            
        </div>
        <div class="row align-items-start">
            <div class="col-6 description p-3 m-2">

                <div class="card  mb-3">
                        <div class="card-header">
                            <h3 class="accordion-heading-special">Item description</h3>
                        </div>
                        <div class="card-body p-3 center-text">
                            <p><?php echo $product['description']; ?></p>
                        </div>
                    </div>

            </div>
            <div class="col-4 seller  border m-2 p-3">
                <div class="card  mb-3">
                    <div class="card-header">
                        <h3 class="accordion-heading-special">Seller Information</h3>
                    </div>
                    <div class="card-body p-3 center-text">

                        <div class="userprofile">
                            <div class="userpic"> <img src="<?php echo $seller['uimg']; ?>" width="100" height="100" alt="" class="userpicimg"></div>
                            <div class="user-information">
                                <h3 class="username"><?php echo $seller['name']; ?></h3>
                                <p><?php echo $seller['address']; ?></p></div>

                            <div class="w-100 text-center">

                                <p>(0 ratings)</p>

                                <p class="small-bio-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <p><a href="https://wpbeginnertutorials.com/demos/newauctiontheme/?a_action=user_profile&amp;userid=u-1" class="btn btn-outline-primary  btn-sm">View Seller Profile</a></p>
                                    
                                            <p><a href="https://wpbeginnertutorials.com/demos/newauctiontheme/?save_this_seller=1&amp;return=pst&amp;idres=122" class="btn btn-outline-primary  btn-sm"><i class="fas fa-heart" aria-hidden="true"></i> Save this seller</a></p>

                                            
                            </div>
                        </div>
                    </div>
                </div>
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

<script src="bidpage.js"></script>

</html>


            <?php } ?>