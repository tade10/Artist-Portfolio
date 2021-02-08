<?php
include "header.php";


	  $merch_id = $_GET['merch_id'];
     
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "SELECT * FROM merchandise where merch_id='".$merch_id."'";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die('Invalid query: ' . mysqli_error());
      }
      
      $item_name = $item_type = $item_price = $item_image = "";
      
      while($row = mysqli_fetch_array($result)){
 
        $item_name = $row['item_name'];
        $item_type = $row['item_type'];
        $item_price = $row['item_price'];
 		   $item_image = $row['item_image'];         
      }


      
      ?>


<div class="container">
  <h1 class="text-center">Update Item</h1>

  <form class="form-horizontal" action="update_insert.php" method="post" enctype="multipart/form-data">
  	<input type="hidden" name="merch_id" id="merch_id"value="<?php echo $merch_id; ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" name="name"  id="name" placeholder="Enter Item Name" value="<?php echo $item_name; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">
        <input type="category" class="form-control" name="category" id="category" placeholder="Enter Item Category" value="<?php echo $item_type; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-10">
        <input type="price" class="form-control" name="price" id="price" placeholder="Enter Item Price" value="<?php echo $item_price; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="image">Choose Image:</label>
      <div class="col-sm-10">
       <input type="file" id="image" name="image"  placeholder="Select The Item Image">
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">Submit</button>
        <button class="btn btn-danger"><a href="/">Cancel</a></button>
  </div>


<?php
include "footer.php";
?>