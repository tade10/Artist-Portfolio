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
              
              echo "<li><a href='cart_ui.php'><span class='glyphicon glyphicon-shopping-cart'></span></a></li>";
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


  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript" src="store.js" async></script>
  

  
  <section class="content-section container">
    <h2 class="section-header">Transaction History</h2>
    <div class="cart-row" style='color: white;'>
      <span class="cart-item cart-header cart-column" style='color: white;'>Item</span>
      <span class="cart-price cart-header cart-column" style='color: white;'>Price</span>
      <span class="cart-quantity cart-header cart-column" style='color: white;'>Quantity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date</span>
    </div>

    <div class="cart-items">
      <!-- Cart items will be generated by the JavaScript file-->
      <!-- -->
      <?php
     
       if(!isset($_SESSION)) 
      { 
          session_start(); 
      }
      $connection = mysqli_connect("localhost", "root", "","portfolio");

      if (mysqli_connect_errno()) {
        echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
      }
      
      $query = "SELECT * FROM transaction where user_id='".$_SESSION["user_id"]."'";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die('Invalid query: ' . mysqli_error());
      }
      $class_id =0;
      $total_price =0;
      echo "<div class='cart-items'>";
      while($row = mysqli_fetch_array($result)){
        echo nl2br("\n");

        echo "<div class='cart-row'>";
        echo "<div class='cart-item cart-column'>";
        //Start displaying the cart items
        echo "<img class='cart-item-image' src='images/merchandise/".$row['item_image']."' width='80' height='80'>";
        echo "<span class='cart-item-title' style='color: white;'>".$row['item_name']."</span>";
        echo "</div>";
        echo "<span class='cart-price cart-column'>$".$row['item_price']."</span>";
        echo "<div class='cart-quantity cart-column'>";
        //echo "<input   type='number' value=".$row['quantity'].">";
        echo "<span>".$row['quantity']."</span>";
        echo "<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
        echo "<span>".$row['date']."</span>";

        
        echo "</div>";
        echo "</div>";
        

        
      }
      echo "</div>";

      
      

      ?>
    </div> 
    
    
  </section>

<?php 
  include "footer.php";
?>