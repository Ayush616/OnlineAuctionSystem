<?php include "connection.php";


if(array_key_exists("login", $_POST)){
    $email = mysqli_escape_string($connection, $_POST["email"]);
    $pass = mysqli_escape_string($connection, $_POST["pass"]);
    $utype = mysqli_escape_string($connection, $_POST["owner"]);
    
    $query = "SELECT * FROM `user` WHERE `email`='$email'";
    
    $result="";
    if(!($result = mysqli_query($connection, $query))){
        echo "Login query failed";
    }
    
    $row = mysqli_fetch_array($result);
        
    if(mysqli_num_rows($result)>0){

        if($row['user_type']!=$utype){
            echo "This is not a ".$utype." account.";
        }else{
            if($row['password']==$pass){
                session_start();
                $_SESSION['id'] = $row['uid'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];

                if($utype=='seller'){
                    header("location: seller.php");  
                }else if($utype=='bidder'){
                    header("location: bidder.php");  
                }else if($utype=="admin"){
                    header("location: admin.php");  
                }
                           
            }
        }
    }
    

}

?>