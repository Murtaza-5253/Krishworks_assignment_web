<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
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

<form name="registeration" action="code.php" method="post" enctype="multipart/form-data">
    <div style="float:right;">
        <label for="cancelbtn" class="btnCan">
            <button type="button" class="cancelbtn" id="cancelbtn"><a href="login.php" class="desCancel">Logout</a> </button>
        </label>
    </div>
    <div class="imgcontainer" >
        <label for="favatar"> 
        <?php 
                        if(isset($_SESSION['imagepath'])) 
                        {
                            ?>
                            <img src="<?php
                                    echo($_SESSION['imagepath']);
                            
                                    ?>" alt='Avatar' class='avatar' id='blah' />
                                    <?php
                        }
                        else{

                            echo("<img src='img_avatar2.png' alt='Avatar' class='avatar' id='blah' />");
                        }
                        ?>
                        
        
        <input type="file" name="imgavatar" class="favatar" accept="image/*" id="favatar" onchange="loadfile();" style="display:none;">
        </label>
        <script>

            function loadfile() {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("favatar").files[0]);

                    oFReader.onload = function (oFREvent) {
                        document.getElementById("blah").src = oFREvent.target.result;
                    };
                };
        </script>
    <div>
    <p class="h2user">User Profile</p>
    <p class="h3user">Hello <?php
        if(isset($_SESSION['name'])) {
            echo($_SESSION['name']);
        }
    ?></p>
    </div>
        <!-- <p class="h2user">User Profile</p> -->
    </div>
    
<div class="container">
    
        <label for="name"><b>Name</b></label>
         <input type="text" value="<?php 
                        if(isset($_SESSION['name'])) {
                            echo($_SESSION['name']);
                        }
                        ?>" name="name" required />

        <label for="email"><b>Email</b></label>
        <input type="text" value="<?php 
                        if(isset($_SESSION['email'])) {
                            echo($_SESSION['email']);
                        }
                        ?>" placeholder="Enter Email id" name="email" required />

        <label for="address"><b>Address</b></label>
        <input type="text" value="<?php 
                        if(isset($_SESSION['address'])) {
                            echo($_SESSION['address']);
                        }
                        ?>" placeholder="Enter Address" name="address" required /><br>

        <label for="DOB"><b>Date of Birth:- </b></label>
        <input type="date" value="<?php 
                        if(isset($_SESSION['dob'])) {
                            echo($_SESSION['dob']);
                        }
                        ?>" name="dob" required /><br> <br>

        <label for="pass"><b>Password</b></label>
        <input
          type="password"
          placeholder="Enter Password"
          value="<?php 
                        if(isset($_SESSION['password'])) {
                            echo($_SESSION['password']);
                        }
                        ?>"
          name="pass"
          required
        />
        
        
        <?php
            if(isset($_SESSION['noupdate'])){
                echo("Login First to update your Profile");
                unset($_SESSION['noupdate']);
            }
            else{
                unset($_SESSION['noupdate']);
                echo "<button type='submit' class='btnLogin' name='btnSave' id='btnSave'>Save</button>";
            }
        ?>
        
        <!-- <button type='submit' class='btnLogin' name='btnSave' id='btnSave'>Save</button> -->
      </div>

      <div class="container" style="background-color: #f1f1f1">
        <button type="button" class="cancelbtn"> <a href="login.php" class="desCancel">Cancel</a> </button>
        
      </div>
</form>
</div>

  
</body>
</html>