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
      $oldPass=cleanData($_POST["oldPassword"]);
      $newPass=cleanData($_POST["newPassword"]);;
      $rePass=cleanData($_POST["rePass"]);;
 } 


 if(!$userName){
    $userNameError= "<p class='error'>user name is required</p>";
    $error= 1;
   
  }

if(!$oldPass){
   $oldPassError= "<p class='error'>old password is required </p>";
   $error= 1;

 }
 
 if(!$newPass){
    $newPassError= "<p class='error'>new password is required </p>";
    $error= 1;

  }else if(strlen($newPass)<8){
    $newPassError= "<p class='error'>new password should be 8+ characters </p>";
    $error= 1;
    
 }

 
if(!$rePass){
   $rePassError= "<p class='error'>confirm new password is required </p>";
   $error= 1;

 }else if($newPass != $rePass){
   $rePassError= "<p class='error'>passwords dont match <br> <br>";
   $error= 1;
 
 }
 
 
 if($error==0){
    $hash_password = password_hash($newPass, PASSWORD_DEFAULT);

  $checkUser = $connect->prepare("SELECT * FROM users WHERE user_name = :userName");  
  $checkUser->bindValue(':userName', $userName); 
  $checkUser->execute();
  $numberOfRows = $checkUser->rowcount();

  if ($numberOfRows === 1) {

      $get_user = $checkUser->fetch(PDO::FETCH_ASSOC); 
       $database_password = $get_user['password'];
     

       if (password_verify($oldPass, $database_password)) { 
     
        $updatePassword=$connect->prepare("UPDATE  users SET password = :newPassword"); 
        $updatePassword->bindValue(':newPassword', $hash_password);  
        $updatePassword->execute();

    
        session_unset();
        session_destroy();
         header('location: login.php');
       die();
   


       }else{
        $checkError= "<p class='error'> wrong user name or password</p>";
        include('update.php');
        exit();
     
       }
   
    }else{

        $checkError= "<p class='error'> user dont found </p>";
        include('update.php');
        exit();
     
    }
 
 } else {
    include('update.php');
 }





 
?>