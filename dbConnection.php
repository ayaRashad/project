<?php
$server = "localhost";
$dbUser ="root";
$dbPassword ="";
$dbName ="project";
$connect = mysqli_connect($server,$dbUser,$dbPassword ,$dbName);
if(!$connect){
    die (mysqli_connect_error());
} 

 
?>