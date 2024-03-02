<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="login">
            
                <form action="login_process.php" method="post">
                    <h1>LOGIN</h1>
                    <hr>
                    <p>lets enjoy sweet girls!</p>
                    <label>User Name</label>
                    <input type="text"  name="userName">
                    <?php
                      if(isset($userNameError)){
                        echo $userNameError;
                      }
                    ?>
                    <label>Password</label>
                    <input type="password"  name="pass">
                
                    <?php
                      if(isset($passError)){
                        echo $passError;
                      }
                    ?>
                    <a href="#" class="forgot">Forgot Password?</a>
                    <button name="submit">Submit</button>
                    <p>
                        Not a Member?
                        <a href="signup.php" class="sign">REGISTER</a>
                        <?php
                      if(isset($checkError)){
                        echo $checkError;
                      }
                    ?>
                    </p>
                

                     
                </form>
            </div>
            <div class="pic">
                <img src="welcome.png">
            </div>
        </div>
    
    </body>
    </html>
    </span>