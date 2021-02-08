 <?php
      $item_id = $_GET['item_id'];
      $user_id = $_GET['user_id'];
      $qty = $_GET['qty'];
      echo "$user_id";
      echo nl2br("\n");
      echo "$item_id";
      echo nl2br("\n");
      echo "$qty";
      
     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "UPDATE cart SET quantity=$qty where item_id='".$item_id."' AND user_id='".$user_id."'";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die('Invalid query: ' . mysqli_error());
      }
      //header("Location: store.js");
      header("Location: cart_ui.php");
    ?>