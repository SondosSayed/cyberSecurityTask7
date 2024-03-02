<span style="font-family: verdana, geneva, sans-serif;">
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Change Password</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
                <form action="update_process.php" method="post">
                    
                    <h3>change your password!</h3>
                    <label>User Name</label>
                    <input type="text"  name="userName">
                    <?php
                      if(isset($userNameError)){
                        echo $userNameError;
                      }
                    ?>
                    <label>Old Password</label>
                    <input type="password"  name="oldPassword">
                    <?php
                      if(isset($oldPassError)){
                        echo $oldPassError;
                      }
                    ?>
                    <label>New Password</label>
                    <input type="password"  name="newPassword">
                    <?php
                      if(isset($newPassError)){
                        echo $newPassError;
                      }
                    ?>
                  <label>Confirm New Password</label>
                 
                 <input type="password"  name="rePass">
                 <?php
                   if(isset($rePassError)){
                     echo $rePassError;
                   }
                 ?>
                    <button name="submit">Save Change</button>
                    <?php
                      if(isset($checkError)){
                        echo $checkError;
                      }
                    ?>
    
                     
                </form>
    
           
      
    
    </body>
    </html>
    </span>