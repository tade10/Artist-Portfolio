<?php
include "header.php";

?>

  <h1 class="text-center">GALLERY</h1>
      <!-- ------------- ------------ CAROUSEL ------------------------------------------------------------------------>
  <div class="c-wrapper" style=" width:80%; margin: auto;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      

      <!-- Wrapper for slides -->
      <div class="carousel-inner " style=" width:100%; height: 550px; !important; margin: auto;">
        <?php
         
          $connection = mysqli_connect("localhost", "root", "","portfolio");

          if (mysqli_connect_errno()) {
            echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
          }
          
          $query = "SELECT * FROM gallery";
          $result = mysqli_query($connection, $query);
          if (!$result) {
            die('Invalid query: ' . mysqli_error());
          }
          $i=1;
          while($row = mysqli_fetch_array($result)){
            if($i==1){
              echo "<div class='item active'> <img style='width:500px;height:400px;'src='images/gallery/".$row['image']."'></div>";
              $i = $i + 1;
            }
            else{
              echo "<div class='item'> <img  style='width:800px;height:700px;' src='images/gallery/".$row['image']."'></div>";
            }
          }


        ?>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
  </div>

    <div class="container-fluid " style="margin-top: 40px;">
      
      <?php 

        if(isset($_SESSION['user_id']) && $_SESSION['user_id']==1) 
          { ?>


           <form class="form-horizontal" action="admin_add_gallery.php" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="image">Add Image:</label>
              <div class="col-sm-10">
               <input type="file" id="image" name="image"  placeholder="Select The Item Image">
               <button type="submit" class="btn btn-info">Submit</button>
              </div>
            </div>
        
          </form>
         <?php 
           }

      ?>
      <div class="row">
        <?php
       
        $connection = mysqli_connect("localhost", "root", "","portfolio");

        if (mysqli_connect_errno()) {
          echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
        }
        
        $query = "SELECT * FROM gallery";
        $result = mysqli_query($connection, $query);
        if (!$result) {
          die('Invalid query: ' . mysqli_error());
        }
        
        
        while($row = mysqli_fetch_array($result)){
          echo "<div class='col-sm-2'>";
          echo "<img src='images/gallery/".$row['image']."' width='200px' height='200px' style='margin: 5px;''>";    
          if(isset($_SESSION['user_id']) && $_SESSION['user_id']==1) 
            { 
                echo "<p><a href='admin_delete_gallery.php?image_id=".$row['id']."'> Delete</a></p>";
            }
          echo "</div>";
        }

      ?>
        
      </div>    
    </div>
 
</div>

<!-- ------------------------- GALLERY END----------------------------------------------------------------->


<?php
include "footer.php";
?>