<?php
session_start();
require 'dbConnection.php';
require 'validation.php';
 
$client = $_SESSION['user']['id'];
$service = $_GET['id'];
   $sql = "delete from RequestService where client_id = $client and service_id =$service ";
   $op  = mysqli_query($connect,$sql);

   if($op){
    $message = 'raw deleted';
   }else{
    $message = 'error Try Again !!!!!! ';
   }

header("Location: profile.php");

?>