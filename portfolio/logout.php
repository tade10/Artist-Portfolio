<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

// destroy the session
session_destroy();
header("Location: merchandise.php");
//echo "session : ".$_SESSION['user_id'];
?>