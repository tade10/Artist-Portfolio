<?php
  include "header.php";
?>

<div class="container">
  <h1 class="text-center">Add New Item</h1>

  <form class="form-horizontal" action="add_merch.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" name="name"  id="name" placeholder="Enter Item Name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="category">Category:</label>
      <div class="col-sm-10">
        <input type="category" class="form-control" name="category" id="category" placeholder="Enter Item Category">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="gender">Gender:</label>
      <div class="col-sm-10">
        <input type="gender" class="form-control" name="gender" id="Gender" placeholder="Enter Item Category">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Price:</label>
      <div class="col-sm-10">
        <input type="price" class="form-control" name="price" id="price" placeholder="Enter Item Price">
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
  </div>
</form>
</div>



<?php 
  include "footer.php";
?>