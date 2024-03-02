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
      $fullName=cleanData($_POST["fullName"]);
      $userName=cleanData($_POST["userName"]);
      $email=cleanData($_POST["email"]);
      $pass=cleanData($_POST["pass"]);
      $rePass=cleanData($_POST["rePass"]);;
 } 

 if(!$fullName){
    $fullNameError= "<p class='error'> full name is required </p>";
    $error= 1;
   //  echo $fullNameError;
 }else if(filter_var($fullName,FILTER_VALIDATE_INT)){
   $fullNameError= "<p class='error'> enter valid full name </p>";
   $error= 1;
   // echo $fullNameError;

 }


if(!$userName){
   $userNameError= "<p class='error'>user name is required</p>";
   $error= 1;
   // echo $userNameError;
 }else if(strlen($userName)<6){
   $userNameError= "<p class='error'>user name should be 6+ characters </p>";
   $error= 1;
   // echo $userNameError;
 }else if(filter_var($userName,FILTER_VALIDATE_INT)){
   $userNameError= "<p class='error'>enter valid user name </p>";
   $error= 1;
   // echo $userNameError;
 }


if(!$email){
   $emailError= "<p class='error'>email is required </p>";
   $error= 1;
   // echo $emailError;
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $emailError= "<p class='error'>enter valid email </p>";
   $error= 1;
   // echo $emailError;
 }


if(!$pass){
   $passError= "<p class='error'>password is required </p>";
   $error= 1;
   // echo $passError;
 }else if(strlen($pass)<8){
   $passError= "<p class='error'>password should be 8+ characters </p>";
   $error= 1;
   // echo $passError;
}

 
if(!$rePass){
   $rePassError= "<p class='error'>confirm password is required </p>";
   $error= 1;
   // echo $rePassError;
 }else if($pass != $rePass){
   $rePassError= "<p class='error'>passwords dont match <br> <br>";
   $error= 1;
   // echo $rePassError;

 }

//  if($error ==1){
//    include('signup.php');

//  }

 $checkUser=$connect->prepare("SELECT count(*) FROM `users` WHERE user_name='$userName'");
 $checkUser->execute();
 $numberOfRows=$checkUser->fetchColumn();

 if($numberOfRows!=0){
   $userNameError= "<p class='error'>user name already exist </p>";
   $error= 1; 
   include('signup.php');
   // echo $userNameError;
}

 else {
   try{
  if($error==0 && $numberOfRows==0 ){
    
  $hash_password = password_hash($pass, PASSWORD_DEFAULT);
   $insert_user=$connect->prepare("INSERT INTO `users`(`full_name`, `user_name`, `email`, `password`) VALUES (:fullName, :userName, :email, :hash_password)") ;

   $insert_user->bindValue(':fullName', $fullName);
   $insert_user->bindValue(':userName', $userName);
   $insert_user->bindValue(':email', $email);
   $insert_user->bindValue(':hash_password', $hash_password);
  //  $insert_user_query->bindValue(':hash_password', $role);


   $insert_user->execute();

   header('location: login.php');
   exit();
  }

  else{
   include('signup.php');
   exit();
  }


 }catch(PDOException $e){ 
   echo 'error to sign up' . $e->getMessage();
}


 }

?>