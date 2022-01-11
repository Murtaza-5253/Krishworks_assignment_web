<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="index.css" />
  </head>
<body>
<div class="form">
<form action="code.php" method="post" name="login">
<div>
<p class="h2user">Forgot Password</p>
</div>

<div class="container">
        <label for="uname"><b>Email Id</b></label>
        <input type="text" placeholder="Enter Email" name="txtEmail" required />

        <button type="submit" class="btnLogin" name="btnForgot">Send Password reset Link</button>
        
      </div>

      <div class="container" style="background-color: #f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        </div>
</form>
</body>
</html>