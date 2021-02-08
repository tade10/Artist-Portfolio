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
    
<script type="text/javascript">
  var page=1;
  var item_count = 0;
  var per_page = 6;
  var divs_item = document.getElementsByClassName('filterDiv'); 
  var forward_loop = 0; 
  function myFunction(){
    console.log("loaded--------------"+page);
      forward_loop = 0
      var item_max = 0;
      var i = item_count;
      console.log(" start myFunction----------item_count:"+item_count) ;
      while(item_max<per_page && item_count<divs_item.length) {
          
          divs_item[i].setAttribute("id2", "1");
          divs_item[i].style.display=""; 
          forward_loop = forward_loop+1
          item_max = item_max+1;
          item_count=item_count+1;  
          i = i+1;
      } 

      console.log(" end myFunction----------item_count:"+item_count) ;
    }

  
function nextPage(){
  console.log("start nextpage----------item_count:"+item_count) ;
  if(item_count==0){
     myFunction();
  }
  if (item_count<divs_item.length){
    item_count = item_count-per_page;
    var item_max = 0;
    var i = item_count;
    while(item_max<per_page && item_count<divs_item.length) {
            divs_item[i].setAttribute("id2", "0");
            divs_item[i].style.display="none";
            item_max = item_max+1; 
            item_count=item_count+1;  
            i = i+1;
        }
        console.log("end nextpage----------item_count:"+item_count) ;
    myFunction();
  }
}

function prevPage(){
  
  item_count = item_count-1;
  console.log("prev ------ item_count :"+item_count)

  if (item_count>=2*per_page-1){
    
  
   var item_max = 0;
   
    var i = item_count;
    
    while(item_max<forward_loop && item_count>=0) {
           
            divs_item[i].setAttribute("id2", "0");
            divs_item[i].style.display="none"; 
            item_max = item_max+1; 
            
            item_count=item_count-1;  
            i = i-1;
        }

         item_count=item_count-per_page+1;
    
   
    myFunction();
  }
  else{
    item_count = 0;
    myFunction();
  }
}


  function search() { 
        let input = document.getElementById('searchbar').value;
        input=input.toLowerCase(); 
        let x = document.getElementsByClassName('filterDiv'); 
          
        for (i = 0; i < x.length; i++) {  
            var item_name = x[i].querySelector(".item-name").innerText;
            item_name = item_name.toLowerCase();

            if(x[i].getAttribute('id2')=="1"){
                if (!item_name.includes(input)) { 
                    x[i].style.display="none"; 
                } 
                else { 
                    x[i].style.display="";                  
                }
            } 
        } 
    } 

</script>
</head>
<body onload="myFunction()"  style="background-color: #333333; color:white;">
  
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
              if(basename(__FILE__) == "merchandise.php"){
                 
       
                    $connection = mysqli_connect("localhost", "root", "","portfolio");

                    if (mysqli_connect_errno()) {
                      echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
                    }
                    // database for merchandise
                    $query = "SELECT * FROM cart where user_id='".$_SESSION["user_id"]."'";
                    $result = mysqli_query($connection, $query);

                    if (!$result) {
                      die('Invalid query: ' . mysqli_error());
                    }
                    $count = 0;
                    while($row = mysqli_fetch_array($result)){
       
                      $count = (int)$row['quantity'] + $count;
                    }
                    
                    if($count !=0){
                      echo "<li><a href='cart_ui.php'><span class='glyphicon glyphicon-shopping-cart'></span>".$count."</a></li>";
                      }
                    else{
                      echo "<li><a href='cart_ui.php'><span class='glyphicon glyphicon-shopping-cart'></span></a></li>";
                    }    
              }
              echo "<li><a href='cart_transaction_history.php'>Order History</a></li>";
              echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span> Log Out</a></li>";
              
             }
             else{
              if(basename(__FILE__) == "merchandise.php"){
                echo "<li><a href='login.php'><span class='glyphicon glyphicon-shopping-cart'></span></a></li>";

              }
              echo "<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
              echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
              echo "<li><a href='login.php?admin=1'><span class='glyphicon glyphicon-log-in'></span> Admin</a></li>";
              
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

<!---------------------- MERCHANDISE ------------------------------>
<div class="container-fluid" >
  <?php 
    if(isset($_SESSION['user_id']) && $_SESSION['user_id']==1) 
      { 
        echo "<button class='btn btn-success' style='margin-top: 10px;margin-bottom: 10px;''><a style='color:white;text-decoration:none;' href='add_merch_ui.php'> Add New Item</a></button>";
      }
  ?>
  <div style="margin-top: 1%; margin-bottom: 1%;">
    <div class="row">
      <div class="col-sm-6">
        <form class="form-inline" action="merchandise.php" method="post">
          <label for="gender">Gender:</label>
          <select name="gender" id="gender" style="color: black;">
            <option value="all" >All</option>
            <option value="m">Male</option>
            <option value="f">Female</option>
          </select>
          <input id="submit" type="submit" value="submit" style="color: black;">
        </form>
      </div>
      <div class="col-sm-6">
        <input id="searchbar" onkeyup="search()" type="text" style="float: right;color: black;" name="search" placeholder="Search products..">
      </div>
    </div>
    
    
  </div>
  
  
  	 <?php

        $gender = "";
        if (isset($_POST['gender'])) {
          $gender = $_POST['gender'];
        }
        $connection = mysqli_connect("localhost", "root", "","portfolio");

        if (mysqli_connect_errno()) {
          echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
        }
        // database for merchandise
        
        if ($gender=='f') {
          $query = "SELECT * FROM merchandise where gender = 'f'";  
        }
        elseif ($gender=='m') {
          $query = "SELECT * FROM merchandise where gender = 'm'";  
        }
        else{
          $query = "SELECT * FROM merchandise";  
        }
        
        $result = mysqli_query($connection, $query);
        if (!$result) {
          die('Invalid query: ' . mysqli_error());
        }
        $user_id = "";
        if(isset($_SESSION['user_id'])) 
        { 
            $user_id = $_SESSION['user_id'];
        } 
        
        while($row = mysqli_fetch_array($result)){
          

          echo "<div class='col-sm-2 filterDiv' id='".$row['gender']."' id2='0' style='display:none; color:black; background-color:#333333;'>";
          echo "<div class='thumbnail'>";
          echo "<img src='images/merchandise/".$row['item_image']."' width='100px' height='100px'>";
          echo "<p><strong><span class='item-name'>".$row['item_name']."</span></strong></p>";
          echo "<p>Price: $".$row['item_price']."</p>";
          echo "<button class='btn btn-info'><a style='color:white;text-decoration:none;' href='add_cart.php?user_id=".$user_id."&item_id=".$row['merch_id']."&item_name=".$row['item_name']."&item_price=".$row['item_price']."&item_image=".$row['item_image']."'> Add To Cart</a></button>";
           if(isset($_SESSION['user_id']) && $_SESSION['user_id']==1) 
          {   
              echo "<br><button class='btn btn-success' style='margin-top: 10px;'><a style='color:white;text-decoration:none;' href='update_fetch.php?merch_id=".$row['merch_id']."'> Update</a></button>";
              echo "<button class='btn btn-success' style='margin-top: 10px;margin-left: 10px;'><a style='color:white;text-decoration:none;' href='delete.php?merch_id=".$row['merch_id']."'> Delete</a></button>";
          }
          
          echo "</div>";
          echo "</div>";
        }

        
    

      ?>

  </div>
  <div style="margin-left: 2%;">
    <button class='btn btn-success' style='margin-top: 10px;margin-left: 10px;'><a  href="javascript:prevPage()" id="btn_prev" style='color:white;text-decoration:none;'>Prev</a>
    <button class='btn btn-success' style='margin-top: 10px;margin-left: 10px;'><a  href="javascript:nextPage()" id="btn_next" style='color:white;text-decoration:none;'>Next</a>
  </div>
  

  <!---------------------- MERCHANDISE END ------------------------------>



<?php

  include "footer.php"
 ?>