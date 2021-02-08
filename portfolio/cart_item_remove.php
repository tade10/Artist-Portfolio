 <?php
      $item_id = $_GET['item_id'];
      $user_id = $_GET['user_id'];
      echo "$item_id";
      echo nl2br("\n");
      echo "$user_id";
     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "DELETE FROM cart where item_id='".$item_id."' AND user_id='".$user_id."'";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die('Invalid query: ' . mysqli_error());
      }
      header("Location: cart_ui.php");
    ?>