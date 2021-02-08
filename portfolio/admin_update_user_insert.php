<?php
     $user_id = $_POST["user_id"];
     $user_name = $_POST["name"];
     $user_email = $_POST["email"];
     $user_password = $_POST["password"];
    
     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }

      $query = "UPDATE user SET name='".$user_name."', email='".$user_email."',password='".$user_password."' where user_id='".$user_id."'";

      if (mysqli_query($connection, $query)) {
          mysqli_close($connection);
         header("Location: admin.php");
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($connection);
          mysqli_close($connection);
        }

        

?>
