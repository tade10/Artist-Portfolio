<?php
include "header.php";

 $connection = mysqli_connect("localhost", "root", "","portfolio");

if (mysqli_connect_errno()) {
  echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
}
if(isset($_SESSION['user_id'])) 
{ 
$query = "SELECT * FROM user";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}
$user_id = "";

    $user_id = $_SESSION['user_id'];

echo "USER_ID : ".$user_id;
?>
<div class="container">
  <h2>Available Users</h2>
  <table class="table">
  	<thead>
      <tr><th>Id</th><th>Name</th><th>Email</th><th>Password</th></tr>
    </thead>
    <tbody>
<?php
while($row = mysqli_fetch_array($result)){
  echo "<tr>";
  echo "<td>".$row['user_id']."</td>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['password']."</td>";
  echo "<td><p><a href='admin_update_user.php?user_id=".$row['user_id']."'> Update</a></p></td>";
  echo "<td><p><a href='admin_delete_user.php?user_id=".$row['user_id']."'> Delete</a></p></td>";
  
  echo "</tr>";
}
?>
</tbody>
</table>
<?php
echo "<p><a href='admin_add_user.php> Update</a></p>";
include "footer.php";
}
else{
	header("Location: login.php");
}
?>

