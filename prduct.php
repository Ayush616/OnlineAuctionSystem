<?php

$q = mysqli_query($con, "SELECT * FROM product");
while($row = mysqli_fetch_assoc($q)){
?>
    <div class="products row">
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
                    <button class="btn btn-primary btn-sm">Purchase</button>
                </div>
        </div>
        
    </div>

<?php } ?>