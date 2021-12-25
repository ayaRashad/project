<?php
    session_start();
    require 'dbConnection.php';  
   // require 'checkLogin.php';  


    $client = $_SESSION['user']['id'];

    $role = $_SESSION['user']['role_id'];
    $service = $_GET['id'];

    $getRequest = "select open from RequestService where client_id = $client and service_id = $service";
    $op  = mysqli_query($connect,$getRequest);
    $data = mysqli_fetch_assoc($op);
       if($data['open'] == 'Yes'||$role == 1){
        $_SESSION['service_id'] = $service;
        $_SESSION['client_id'] = $client;

           header("Location: getService.php");

       }else if ($data['open'] == null){
            $sql = "insert into RequestService (service_id,client_id, open) values ('$service','$client','No')";
            $operation =  mysqli_query($connect,$sql);
            if ($operation){
                echo "hello : ".$client."<br>";

                echo "you can open ".$service." if admin approve <br>";
            }else{
               
            echo "error ".mysqli_error($connect);
       
        } 
    }else if ($data['open'] == 'No'){
        echo "<br> exit !!!";
    }

?>
