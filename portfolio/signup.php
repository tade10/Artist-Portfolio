<?php
// Start the session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include "header.php";
?>

<script language="javascript">

function check()
{
  console.log("document.form1.name.value : "+document.form1.name.value);
  if(document.form1.name.value=="")
  {
    console.log("document.form1.name.value : "+document.form1.name.value);
    alert("Please Enter Your Name");
    document.form1.name.focus();
  return false;
  }

 if(document.form1.pass.value=="")
  {
    alert("Please Enter Your Password");
  document.form1.pass.focus();
  return false;
  } 

 


  if(document.form1.cpass.value=="")
  {
    alert("Please Enter Confirm Password");
  document.form1.cpass.focus();
  return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not match");
  document.form1.cpass.focus();
  return false;
  }

 
  if(document.form1.email.value=="")
  {
    alert("Please Enter your Email Address");
  document.form1.email.focus();
  return false;
  }
  e=document.form1.email.value;
    f1=e.indexOf('@');
    f2=e.indexOf('@',f1+1);
    e1=e.indexOf('.');
    e2=e.indexOf('.',e1+1);
    n=e.length;

    if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
    {
      alert("Please Enter valid Email");
      document.form1.email.focus();
      return false;
    }
  return true;
  }
  
</script>


<div class="container">
  <h1 class="text-center">Sign Up</h1>

  <form class="form-horizontal" name="form1"  action="signin.php" method="post"  onSubmit="return check()" enctype="multipart/form-data">
    <?php 

      if(isset($_GET['user_exist'])){
        echo '<p class="text-center" style="color:red;">Account Already Exists.</p>';
      }
    ?>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="name" class="form-control" name="name"  id="name" placeholder="Enter IName">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="login">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="login" id="pass" placeholder="Enter Password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="login">Confirm Password :</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="login" id="cpass" placeholder="Confirm Your Password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info" name="submit" value="Signup">Register</button>
        <button class="btn btn-danger"><a href="index.php" style="text-decoration: none; color:white;">Cancel</a></button>
    </div>
  </div>
</form>
</div>
<h5 class="text-center">Already Registered? <a href="login.php"> Login here</a></h5>

 
 <?php
include "footer.php";
?>