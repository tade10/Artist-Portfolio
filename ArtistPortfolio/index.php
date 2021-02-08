<?php 
include "header.php";
?>

<!-- ------------------------- CAROUSEL ------------------------------------------------------------------------>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php
     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "SELECT * FROM home";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die('Invalid query: ' . mysqli_error());
      }
      $i=1;
      while($row = mysqli_fetch_array($result)){
        if($i==1){
          echo "<div class='item active'> <img src='images/carousel/".$row['image']."'></div>";
          $i = $i + 1;
        }
        else{
          echo "<div class='item'> <img src='images/carousel/".$row['image']."'></div>";
        }
      }


    ?>
    

  </div>

  <div class="online_music">
  
  	<a href="https://open.spotify.com/artist/6AnOY77z51J14nEUVsFKTy" alt="Spotify" title="Spotify"><i class="fab fa-spotify" style="color:green;"></i></a>
  	<a href="https://itunes.apple.com/us/artist/taba-chake/1230594300" title="Itunes"><i class="fab fa-itunes" style="color:red;";></i></a>
  	<a href="https://soundcloud.com/tabachakemusic" title="Soundcloud"><i class="fab fa-soundcloud" style="color:orange;"></i></a>
  </div>	
 </div>
 
 <div class="social">
  	<a href="https://www.facebook.com/tabachakemusic" ><i class="fab fa-facebook" style="color:blue;"></i></a>
  	<a href="https://www.instagram.com/taba.chake/?hl=en"><i class="fab fa-instagram" style="color:pink;"></i></a>
  	<a href="https://www.youtube.com/channel/UCM0yJPZK6c-K10WD1pi1lmA"><i class="fab fa-youtube" style="color:red;"></i></a>	
 </div>

 

</div>

<!-- ------------------------- CAROUSEL END ------------------------------------------------------------------------>

