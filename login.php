<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Login</title>
    <link rel="stylesheet" href="index.css" />
  </head>
<body>
<?php
//require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_SESSION['invalid']))
{
  echo "<div class='form'>
  <h3>Invalid Email</h3></div>";     
  unset($_SESSION['invalid']);
            // Redirect user to index.php
	    
}elseif(isset($_SESSION['wrong'])){
	echo "<div class='form'>
  <h3>password is incorrect.</h3></div>";   
  unset($_SESSION['wrong']);  
            // Redirect user to index.php
}
elseif(isset($_SESSION['status'])){
  echo "<div class='form'>
  <h3>password reset Successfull.</h3></div>";   
  unset($_SESSION['status']);
}
?>
<div class="form">
<form action="code.php" method="post" name="login">
<div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar" />
    </div>
      <div class="container" style="background-color: #f1f1f1">
        <p class="btnRegister">Not registered yet? <a href='registeration.php' class="fpsw">Register Here</a></p>
      </div>

      <div class="container">
        <label for="uname"><b>Email Id</b></label>
        <input type="text" placeholder="Enter Email" name="txtEmail" required />

        <label for="psw"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="txtPassword"
          
        />

        <button type="submit" class="btnLogin" name="btnLogin">Login</button>
        
      </div>

      <div class="container" style="background-color: #f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>


        <p class="psw"><a href='forgot.php' class="fpsw">Forgot Password?</a></p>
      </div>
</body>
</html>


