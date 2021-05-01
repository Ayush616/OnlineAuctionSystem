<?php
include "connection.php";

if(isset($_POST['pname'])){
    $title = $_POST['pname'];
    $desc = $_POST['desc'];
    $cat = $_POST['cat'];
    $price = $_POST['price'];
    $enddt = $_POST['enddt'];
    $sid = $_POST['sid'];

   /* Getting file name */
   $filename = $_FILES['primg']['name'];

   /* Location */
   $location = "images/products/".$filename;
   $ext = explode('.',$filename)[1];
   $ext = strtolower($ext);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png", "jfif", "webp");

   $response = 0;
   /* Check file extension */
   if(in_array($ext, $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['primg']['tmp_name'], $location)){
         $q = mysqli_query($con, "INSERT INTO product (product_name, description, base_price, highest_bid_price, seller_id, product_type, product_img, ptimestamp) VALUES('$title', '$desc', '$price', '$price', '$sid', '$cat', '$location', NOW())");

         if($q){
             echo 1;
         }else{
             echo mysqli_error($con);
             echo 2;
             
         }

      }else{
          echo 3;
      }
   }else{
       echo 'extension';
   }

}

?>