<?php 

session_start();
require 'init.php';

if( isset( $_SESSION['userId']) && isset( $_SESSION['userName'])  ) {

    $id=$_SESSION['userId'];
    $user=$_SESSION['userName'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> Amna Store </title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">

</head>
<body>
	
		<div class="main">

		</div>
		 <ul>
      <li><a href="home.php">Home</a></li>
		 <li><a href="#">About</a></li>
		 <li><a href="#">Shop</a></li>
		 <li><a href="#">Categories</a></li>
		 <li><a href="#">Pricing</a></li>
		 <li><a href="#">Kids</a></li>
		 <li><a href="#">Women</a></li>
         <li><a href="#">Contact Us</a></li>
         <li class="user"> Hello 
            <?php
             echo $user;
            ?>
             <li>
         <li><a href="update.php">Update</a></li>
         <li><a href="logout.php"> logout </a></li>
		 
      
		</ul>

		 </div>
		 <div class="title">
		 	<h1>AMNA STORE</h1>
      
		 </div>
     <h3 class="h">Design Your Clothes!</h3>
		

		 

</body>
</html>


<?php
}else{
    header('location: login.php'); 
    exit();

}
?>