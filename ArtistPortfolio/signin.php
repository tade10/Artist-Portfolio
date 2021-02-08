<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$connection = mysqli_connect("localhost", "root", "","portfolio");
extract($_POST);

$hashed= password_hash($login, PASSWORD_DEFAULT);



if(isset($submit))
{
	$rs=mysqli_query($connection,"SELECT * FROM user WHERE name='$name' and password='$hashed'");
	
	
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION["user_id"]=$name;
	}

if (isset($_SESSION["user_id"]))
{
	header("Location: merchandise.php");
exit;
}
	
}


?>

<?php

extract($_POST);

$connection = mysqli_connect("localhost", "root", "","portfolio");


$rs=mysqli_query($connection,"SELECT * FROM user WHERE name='$name'");
echo "count : ".mysqli_num_rows($rs);

if(mysqli_num_rows($rs)>0)
{	$user_exist = "Account Already Exists";
    header("Location:signup.php?user_exist=".$user_exist);
    
	exit;
}


$query="INSERT INTO user(user_id, name,email,password) VALUES (NULL,'$name','$email','$hashed')";

$rs=mysqli_query($connection,$query)or die("Could Not Perform the Query");

header("Location: login.php");
?>