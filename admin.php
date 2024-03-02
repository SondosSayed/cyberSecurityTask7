
<?php 
session_start();
require 'init.php';

if( isset($_COOKIE['user_role'])  &&  isset( $_COOKIE['admin_name']) ){
   $admin_name=$_COOKIE['admin_name'];
   echo 'hi admin  ' . $admin_name ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>
<body>
<div class="container">
    <div class="box">
        <h2>Users</h2>
    </div>
    <div class="box">
        <h2>Products</h2>
    </div>
    <div class="box">
        <h2>Categories</h2>
    </div>
</div>

</body>
</html>
<?php
}else{
    header('location: login.php'); 
    exit();

}
?>