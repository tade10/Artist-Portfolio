<?php
     
     $item_name = $_POST["name"];
     $item_category = $_POST["category"];
     $item_gender = $_POST["gender"];
     $item_price = $_POST["price"];
     $item_image = $_FILES["image"]["name"];

     echo $item_name;
     echo $item_category;
     echo $item_price;
     echo $item_image;
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "INSERT INTO merchandise (merch_id, item_type, item_name, item_price, item_image, gender) VALUES (NULL,'".$item_category."','".$item_name."','".$item_price."','".$item_image."','".$item_gender."')";
      if (mysqli_query($connection, $query)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }

        mysqli_close($connection);

      $target_dir = "images/merchandise/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

      header("Location: merchandise.php");
    ?>
