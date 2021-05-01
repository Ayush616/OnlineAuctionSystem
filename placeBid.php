<?php include 'connection.php';

if(isset($_POST['pid'])){
    $q = mysqli_query($con, "INSERT INTO bids(pid, bids, ptimestamp) VALUES(".$_POST['pid'].", ".$_POST['bids'].", NOW())");
    $q1 = mysqli_query($con, "UPDATE product SET highest_bid_price = ".$_POST['bids']." WHERE id = ".$_POST['pid']."");
    if($q){
        echo 1;
    }
}


?>