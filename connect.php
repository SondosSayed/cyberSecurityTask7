<?php
$dsn = 'mysql:host=localhost;dbname=amna store' ;
$user = 'root';
$pass = '';
try {
    $connect = new PDO ($dsn, $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    

}catch(PDOException $e){ 
    echo 'connection failed' . $e->getMessage();
}

?>



