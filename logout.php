<?php
 
 session_start();
 require 'init.php';
  session_unset();
  session_destroy();
  header('location: login.php'); 
  die();



?>