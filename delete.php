<?php 

require 'dbConnection.php';
require 'validation.php';


$id = $_GET['id'];



$sql = "select * from service where id = $id";
$op   = mysqli_query($connect,$sql);

if(mysqli_num_rows($op) == 1){
   
 

   $sql = "delete from service where id = $id ";
   $op  = mysqli_query($connect,$sql);


   if($op){
    $message = 'raw deleted';
   }else{
    $message = 'error Try Again !!!!!! ';
   }
}else{
    $message = 'Error In User Id ';
}


   $_SESSION['Message'] = $message;

   header("Location: dbIndex.php");


?>