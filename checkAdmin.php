<?php 

if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] = 1){
    require 'header.php';
} else {
    header("Location: index.php");

}


?>