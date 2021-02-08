<?php 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Taba Chake</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/old.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
<body style="background-color: #333333; color:white;">
	
<!-- ------------------------- NAVBAR ------------------------------------------------------------------------>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="index.php">TABA CHAKE</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="music.php">Music</a></li>
          <li><a href="tour.php">Events</a></li>
          <li><a href="merchandise.php">Merchandise</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          
        </ul>
	      <ul class="nav navbar-nav navbar-right">
	        
	        
	        <?php 
	        	if (isset($_SESSION["user_id"])){
	        		
	        		echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span> Log Out</a></li>";
	        		
	       		 }
	       		 else{
	       		 	echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
	       		 	echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
	       		 	echo "<li><a href='login.php?admin=1'><span class='glyphicon glyphicon-log-in'></span> Admin</a></li>";

	       		}
	        ?>
	      </ul>
	    </div>
	  </div>
	</nav>

