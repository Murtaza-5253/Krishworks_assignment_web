
<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Registration</title>
    <link rel="stylesheet" href="index.css" />
  </head>
<body>

<div class="form">
  <?php
    if(isset($_SESSION['status'])){
      echo "<h5 class='alertsuccess'>".$_SESSION['status']."</h5>";
      unset($_SESSION['status']);
    }
  ?>
<form name="registration" action="code.php" method="post">
    <div class="imgcontainer" >
        <p class="h2user">User Registration</p>
    </div>
<div class="container">
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter your name" name="name" required />

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email id" name="email" required />

        <label for="pass"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          name="pass"
          required
        />

        <button type="submit" class="btnLogin" name="btnRegister" id="btnRegister">Register</button>
        
      </div>

      <div class="container" style="background-color: #f1f1f1">
        <button type="button" class="cancelbtn"> <a href="login.php" class="desCancel">Cancel</a> </button>
        
      </div>
</form>
</div>

</body>
</html>