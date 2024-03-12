<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="css/style.css">
   <title>Add Item Process</title>
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
 if(isset($_POST["save"])){
      $barcode=cleanData($_POST["barcode"]);
      $name=cleanData($_POST["name"]);
      $price=cleanData($_POST["price"]);
      $qty=cleanData($_POST["qty"]);
    
      $image=$_FILES['image'];
      $image_name=$_FILES['image']['name'];
      $image_type=$_FILES['image']['type'];
      $image_temp=$_FILES['image']['tmp_name'];
      $image_size=$_FILES['image']['size'];
      $image_error=$_FILES['image']['error'];
 }


 $errors=array();
 $allowed_extension=array('png','jpg','jpeg','gif');
 $extension=explode('.',$image_name);
 $image_extension=strtolower(end($extension)); 


 if($image_error==4){
    
  $errors[]='<p class="error"> no file uploaded </p>';

 }else{

  if(! in_array($image_extension,$allowed_extension )) {
    $errors[]='<p class="error"> file isnt valid </p>';
   } 
  
   if($image_size>200000) {
    $errors[]='<p class="error"> image with large size cant be uploaded </p>';
   } 
  
  

 }

 


 if(!$barcode){
    $barcodeError= "<p class='error'> barcode is required </p>";
    $error= 1;
 }else if(!filter_var($barcode,FILTER_VALIDATE_INT )|| $barcode<0){
   $barcodeError= "<p class='error'> enter valid barcode</p>";
   $error= 1;
 }


if(!$name){
   $nameError= "<p class='error'> name is required</p>";
   $error= 1;
   
 }else if(filter_var($name,FILTER_VALIDATE_INT)){
   $nameError= "<p class='error'>enter valid name </p>";
   $error= 1;
 }


if(!$price){
   $priceError= "<p class='error'>price is required </p>";
   $error= 1;
   
}else if(!filter_var($price,FILTER_VALIDATE_FLOAT )||$price<0 ){
   $priceError= "<p class='error'>enter valid price </p>";
   $error= 1;
 }


if(!$qty){
   $qtyError= "<p class='error'>qty is required </p>";
   $error= 1;

 }else if(!filter_var($qty,FILTER_VALIDATE_INT  )|| $qty<0){
    $qtyError= "<p class='error'> enter valid qty</p>";
    $error= 1;
  }


 if(!empty($errors)){ 
  $error= 1;
  foreach($errors as $errorrr){ 
  $imageError= $errorrr;

 }
}
 



  if($error==1 ){
    $sent= "<p class='error'> Failed to send data </p>";
    include('add_item.php');
   
    exit();
  }else if(empty(($errors) && $error== 0)){
    
   $insert_product=$connect->prepare("INSERT INTO `testproduct`(`barcode`, `name`, `price`, `qty`, `image`) VALUES (:barcode,:name,:price,:qty,:image)");
   $insert_product->bindValue(':barcode', $barcode);
   $insert_product->bindValue(':name', $name);
   $insert_product->bindValue(':price', $price);
   $insert_product->bindValue(':qty', $qty);
   $insert_product->bindValue(':image', $image_name);
   $insert_product->execute();
   $sent = "<p class='sent'> The data has been sent and when it is approved or refused we will inform you </p>";

   
  //  $_SERVER['DOCUMENT_ROOT'] ==== F:\xampp\htdocs
   move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT']. '\cyberSecurityTask7\images\\'. $image_name);

   include('add_item.php');
   
    exit();
    
  }





    










  
 



?>