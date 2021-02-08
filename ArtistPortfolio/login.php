<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$connection = mysqli_connect("localhost", "root", "","portfolio");
extract($_POST);

if(isset($submit))
{
	$rs=mysqli_query($connection,"SELECT * FROM user WHERE name='$user_id' and password='$pass'");
	
	
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{

      while($row = mysqli_fetch_array($rs)){
     
        $_SESSION["user_id"]=$row['user_id'];
        $_SESSION["user_name"]=$row['name'];
	
      }
		

		if (isset($_SESSION["user_id"]))
		{	
			
				header("Location: merchandise.php");
				exit;	
			
			
		}
	
   }	
}

include "header.php";

?>


<div class="container">
  <h1 class="text-center">Login</h1>

  <form class="form-horizontal" name="form1" method="post"enctype="multipart/form-data">
  	<?php
	  if(isset($found))
	  {
	  	echo '<p class="text-center" style="color:red;">Invalid user id OR password. Please try again</p>';
	  }
	?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="user_id">User Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="user_id"  id="loginid2" placeholder="Enter Username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pass">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="pass" id="pass2" placeholder="Enter Password">
      </div>
    </div>
    <input type="hidden" id="admin" name="admin" value='<?php echo $_GET['admin'] ?>'>
    
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info" name="submit" value="Login">Login</button>
        <button class="btn btn-danger"><a href="index.php" style="text-decoration: none; color:white;">Cancel</a></button>
    </div>
  </div>
</form>
</div>
<h5 class="text-center">New User? <a href="signup.php"> Register Here</a></h5>




<?php

include "footer.php";

?>