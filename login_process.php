<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/style.css">
   <title>signup_process</title>
</head>
<body>
   
</body>
</html>

<?php
 session_start();
 require 'init.php';
 
 function cleanData($data){ 
    $data = preg_replace('# \' #', '&apos;', $data);    
    $data = preg_replace('# \\ #', '', $data); 
    $data = htmlspecialchars($data); 
    $data = trim($data); 
    $data = strip_tags($data); 
    $data = stripcslashes($data); 
    return $data;
 }


 $error=0;
 if(isset($_POST["submit"])){
      $userName=cleanData($_POST["userName"]);
      $pass=cleanData($_POST["pass"]);
 } 

 if(!$userName){
    $userNameError= "<p class='error'>user name is required</p>";
    $error= 1;
    // echo $userNameError;
  }

  if(!$pass){
    $passError= "<p class='error'>password is required </p>";
    $error= 1;
    // echo $passError;
  }  


if($error==0){
  $checkUser = $connect->prepare("SELECT * FROM users WHERE user_name = :userName");  
  $checkUser->bindValue(':userName', $userName); 
  $checkUser->execute();
  $numberOfRows = $checkUser->rowcount();

  if ($numberOfRows === 1) { 

      $get_user = $checkUser->fetch(PDO::FETCH_ASSOC); 
       $database_password = $get_user['password']; 


       if (password_verify($pass, $database_password)) { 
          $_SESSION['userName']=$get_user['user_name'];
          $_SESSION['userId']=$get_user['user_id'];     
         


          if($get_user['role']==='admin'){
            setcookie('user_role', 'admin', time() + (86400 * 30), '/');
            setcookie('admin_name', $userName, time() + (86400 * 30), '/');
            header('location: admin.php'); 
            exit();
          }else{
            setcookie('user_role', 'user', time() + (86400 * 30), '/');
            header('location: home.php'); 
          exit();
          }
         

          
        }else {
            $checkError= "<p class='error'>wrong user name or password </p>";
            include('login.php');
            exit();

               }
      }else {
         $checkError= "<p class='error'>user isnt found </p>";
         include('login.php');
         exit();
      
       }
      }


 ?>
