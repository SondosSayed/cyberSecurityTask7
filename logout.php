<?php
 session_start();
 require 'init.php';
  session_unset();
  session_destroy();
  setcookie('user_role', 'admin', time() - 3600, '/');
  setcookie('admin_name', $userName, time() - 3600, '/');
  header('location: login.php'); 
  die();
?>
