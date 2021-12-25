<?php 
 
 session_start();

 //require 'validation.php';

 session_destroy();

 header("Location: signin.php");


?>