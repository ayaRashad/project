<?php 

require 'validation.php';
require 'dbConnection.php';


# Get Data related to id ...... 
   $id = $_GET['id'];

   $sql = "select * from service where id = $id";
   $op   = mysqli_query($connect,$sql);

     if(mysqli_num_rows($op) == 1){

        $data = mysqli_fetch_assoc($op);
     }else{

       echo  "Access Denied";
       header("Location: dbIndex.php");
     }

    $errors =[];
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      
     
    // CODE ...... 
    $title     = Clean($_POST['title']);
    $content    = Clean($_POST['content']);
    $description    = Clean($_POST['description']);
    $reference    = Clean($_POST['reference']);
    $remember    = Clean($_POST['remember']);

      # Validate title
    if (!validate($title, 1)) {
      $errors['title'] = 'Field Required';
    } elseif (!validate($title, 7)) {
        $errors['title'] = 'Invalid String';
    }
    # Validate content
    if (!validate($content, 1)) {
      $errors['content'] = 'Field Required';
    }     
    if (!validate($description, 1)) {
      $errors['description'] = 'Field Required';
    }
    if (!validate($reference, 1)) {
      $errors['reference'] = 'Field Required';
    }
    if (!validate($remember, 1)) {
      $errors['remember'] = 'Field Required';
    }    
        $content = str_replace("'","''",$content);

    if (count($errors) > 0) {
        print_r( $errors);
    } else {
      
        $sql = "update service set title = '$title' , content = '$content', description ='$description',reference ='$reference' ,remember='$remember' where id = $id";
        $op  = mysqli_query($connect,$sql);

        if($op){
              $message =  'Data Updated';
              echo $message;
              header("Location: dbIndex.php");
        }else{
              $message =  'Error Try Again'.mysqli_error($connect); 
          echo $message;

    }
  }
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
 <h2>Edit Account</h2>


 <form  action="update.php?id=<?php echo $data['id'];?>"   method="post" >

 

 <div class="form-group">
   <label for="exampleInputName">title</label>
   <input type="text" class="form-control" id="exampleInputName"  name="title"  value="<?php echo $data['title'];?>" aria-describedby="" placeholder="Enter title">
 </div>
 
 <div class="form-group">
   <label for="exampleInputEmail">Content</label>
   <input type="text"   class="form-control" id="exampleInputEmail1" name="content" value="<?php echo $data['content'];?>"  aria-describedby="emailHelp" placeholder="Enter content">
 </div>

 <div class="form-group">
   <label for="exampleInputEmail">description</label>
   <input type="text"   class="form-control" id="exampleInputEmail1" name="description" value="<?php echo $data['description'];?>" aria-describedby="emailHelp" placeholder="Enter description">
 </div>
 <div class="form-group">
   <label for="exampleInputEmail">reference</label>
   <input type="text"   class="form-control" id="exampleInputEmail1"  name="reference" value="<?php echo $data['reference'];?>"  aria-describedby="emailHelp" placeholder="Enter reference">
 </div>
 <div class="form-group">
   <label for="exampleInputEmail">remember</label>
   <input type="text"   class="form-control" id="exampleInputEmail1" name="remember" value="<?php echo $data['remember'];?>"  aria-describedby="emailHelp" placeholder="Enter remember">
 </div>
 
 <button type="submit" class="btn btn-primary">Update</button>
</form>
<br/>
</div>

</body>
</html>


<?php


?>