<?php
     $merch_id = $_POST["merch_id"];
     $item_name = $_POST["name"];
     $item_category = $_POST["category"];
     $item_price = $_POST["price"];
     $item_image = "";
     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }

      $query = "";
      if (!empty($_FILES['image']['name'])) {
        $item_image = $_FILES["image"]["name"];
        $target_dir = "images/merchandise/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        
        $query = "UPDATE merchandise SET item_name='".$item_name."', item_type='".$item_category."',item_price='".$item_price."',item_image='".$item_image."'  WHERE merch_id='". $merch_id."'";
        }
      else{
        $query = "UPDATE merchandise SET item_name='".$item_name."', item_type='".$item_category."',item_price='".$item_price."'  WHERE merch_id='". $merch_id."'";
      }
    
      
      if (mysqli_query($connection, $query)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }

        mysqli_close($connection);

      

      header("Location: merchandise.php");
    ?>
