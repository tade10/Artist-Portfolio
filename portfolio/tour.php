<?php include "header.php"; 

      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "SELECT * FROM tour";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die('Invalid query: ' . mysqli_error());
      }
?>  

<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">TOUR DATES</h3>
    <p class="text-center">We'll play you some music.<br> Remember to book your tickets!</p>
    
    
    <div class="row text-center">


  <?php
      

      while($row = mysqli_fetch_array($result)){
          echo "<div class='col-sm-4'>";
          echo "<div class='thumbnail'style='color: black;'>";
          echo "<img src='images/tour/".$row['image']."' alt='Paris' width='400px' height='300px'>";
          echo "<p><strong>".$row['location']."</strong></p>";
          echo "<p>".$row['day']." ".$row['date']." ".$row['month']." ".$row['year']."</p>";
          echo "<button class='btn btn-info'><a href='".$row['ticket']."' style='color:white;text-decoration:none;'>Buy Tickets</a></button>";
          echo "</div>";
          echo "</div>";
      }


    ?>
</div>
</div>
</div>

  <?php include "footer.php"; ?>