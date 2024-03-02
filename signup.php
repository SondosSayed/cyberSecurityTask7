<?php
session_start();
?>
<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="login">
                <form action="signup_process.php" method="post">

                    <h1>SIGN UP</h1>
                    <hr>
                    <p class="name">Amna Store</p>
                    <label>Full Name</label>
                   
                    <input type="text"  name="fullName">
                    <?php
                      if(isset($fullNameError)){
                        echo $fullNameError ;
                      }
                    ?>
                    <label>User Name</label>
                  
                    <input type="text"  name="userName">
                    <?php
                      if(isset($userNameError)){
                        echo $userNameError;
                      }
                    ?>
                    <label>Email</label>
                 
                    <input type="text"  name="email">
                    <?php
                      if(isset($emailError)){
                        echo $emailError;
                      }
                    ?>
                    <label>Password</label>
                   
                    <input type="password"  name="pass">
                    <?php
                      if(isset($passError)){
                        echo $passError;
                      }
                    ?>
                    <label>Confirm Password</label>
                 
                    <input type="password"  name="rePass">
                    <?php
                      if(isset($rePassError)){
                        echo $rePassError;
                      }
                    ?>

                    <button name="submit">Submit</button>
                    <p>
                        Already a Member?
                        <a href="login.php" class="sign">LOGIN</a>
                    </p>
                </form>
            </div>
                <img src="background.png" class="pic">
            </div>
        </div>
    
    </body>
    
    </html>
</span>
    