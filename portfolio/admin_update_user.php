<?php
include "header.php";


$user_id = $_GET['user_id'];
 
$connection = mysqli_connect("localhost", "root", "","portfolio");

if (mysqli_connect_errno()) {
  echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
}

$query = "SELECT * FROM user where user_id='".$user_id."'";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

$user_id = $user_name = $user_email = $user_password = "";         

while($row = mysqli_fetch_array($result)){
  $user_id = $row['user_id'];
  $user_name = $row['name'];
  $user_email = $row['email'];
  $user_password = $row['password'];         
}

?>


<div class="container">
  <h1 class="text-center">Update Item</h1>

  <form class="form-horizontal" action="admin_update_user_insert.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user_id"  id="name" value="<?php echo $user_id; ?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" name="name"  id="name" placeholder="Enter Item Name" value="<?php echo $user_name; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Item Email" value="<?php echo $user_email; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">
        <input type="" class="form-control" name="password" id="password" placeholder="Enter Item Password" value="<?php echo $user_password; ?>">
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