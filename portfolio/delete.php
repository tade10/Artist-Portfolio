 <?php
      $merch_id = $_GET['merch_id'];
     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "DELETE FROM merchandise where merch_id='".$merch_id."'";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die('Invalid query: ' . mysqli_error());
      }
      
      header("Location: merchandise.php");
    ?>