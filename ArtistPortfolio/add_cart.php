<?php
include "header.php";

$connection = mysqli_connect("localhost", "root", "","portfolio");


if(isset($_SESSION['user_id'])){

	 
	 $user_id = $_GET["user_id"];
	 $item_id = $_GET["item_id"];
	 $item_name = $_GET["item_name"];
     $item_price = $_GET["item_price"];
     $item_image = $_GET["item_image"];

     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }

      $rs=mysqli_query($connection,"SELECT * FROM cart WHERE user_id='".$user_id."'AND item_id='".$item_id."'AND item_name='".$item_name."'AND item_price='".$item_price."'AND item_image='".$item_image."'");
	 if(mysqli_num_rows($rs)<1)
	 {	echo "new element!!!";
	 	$found="N";
	 	$query = "INSERT INTO cart (cart_id, user_id, item_id, item_name, item_price, item_image, quantity) VALUES (NULL,'".$user_id."','".$item_id."','".$item_name."','".$item_price."','".$item_image."', 1)";
	 }
	 else
	 {	echo "old element!!!";
	    while($row = mysqli_fetch_array($rs)){
	     
	       $cart_id = $row['cart_id'];
	        //$row['name'];
	        $quantity = (int)$row['quantity'] + 1;
	        $query = "UPDATE cart SET quantity='".$quantity."' WHERE cart_id='". $cart_id."'";
		
	      }
    }	
      
      
      if (mysqli_query($connection, $query)) {
          header("Location: merchandise.php");
        } 
        else {
          echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }

        mysqli_close($connection);

      
      //header("Location: merchandise.php");
	}
	else{
			header("Location: login.php");
		 }
	
	include "footer.php";

?>

