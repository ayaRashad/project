<?php 

require 'validation.php';
require 'dbConnection.php';
require 'sidenav.php';
//require 'checkAdmin.php';


# Get Data related to id ...... 
   $id = $_GET['id'];

   $sql = "select * from RequestService where id = $id";
   $op   = mysqli_query($connect,$sql);

    if(mysqli_num_rows($op) == 1){

        $data = mysqli_fetch_assoc($op);
    }else{

       header("Location: index.php");
    }


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $dateFrom    = Clean($_POST['dateFrom']);

    $open = $_POST['open'];
    if( $open== 'Yes') {
    
    $sql = "update RequestService set open = '$open' where id = $id";
    $op  = mysqli_query($connect,$sql);


     if($op){
          $message =  'Data Updated';
     }else{
          $message =  'Error Try Again : '.mysqli_error($connect); 
      echo $message;

     }

}else{
    $sql = "update RequestService set open = 'No' where id = $id";
    $op  = mysqli_query($connect,$sql);
    
}
header("Location: addedRequestService.php");
                                   
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h2>Approve Service</h2>


 <form  action="approveService.php?id=<?php echo $data['id'];?>"   method="post" >

 <div class="form-group">

 <table style ="background-color: white;"  class='table table-hover table-responsive table-bordered'>
                    <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>service</th>
                <th>client</th>
                <th>open</th>
                 <th>dateFrom</th>
            </tr>

            <tr>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['service_id'];?></td>
                <td ><?php echo $data['client_id'];?></td>
                <td >
                    <input type="checkbox" id="vehicle1" name="open" value="Yes">
                    <label for="vehicle1">  open </label><br>

                </td>
                <td >
                    <input type="text" class="form-control" id="exampleInputName"  name="dateFrom"  value="<?php echo $data['dateFrom'];?>" aria-describedby="" placeholder="Enter date">
                </td>
                <td >
                    <button type="submit" class="btn btn-primary">Approve</button>
                </td>
            <tr>
</table> 
</div>            

</form>
</div>

</body>

</html>


