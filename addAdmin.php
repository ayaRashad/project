<?php

require 'header.php';
require 'validation.php' ;
require 'dbConnection.php' ;
//require 'checkAdmin.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $name =Clean($_POST['name']);
    $email =Clean($_POST['email']);
    $address =Clean($_POST['address']);
    $password =Clean($_POST['password']);
    $phone =Clean($_POST['phone']);

	 # Validate Name
	 if (!validate($name, 1)) {
        $errors['Name'] = 'Field Required';
    } elseif (!validate($name, 7)) {
        $errors['Name'] = 'Invalid String';
    }

    # Validate Email
    if (!validate($email, 1)) {
        $errors['Email'] = 'Field Required';
    } elseif (!validate($email, 2)) {
        $errors['Email'] = 'Invalid Email Format';
    }

    # Validate Password
    if (!validate($password, 1)) {
        $errors['password'] = 'Field Required';
    } elseif (!validate($password, 3)) {
        $errors['password'] = 'Length Must >= 6 chs';
    }


    # Validate phone
    if (!validate($phone, 1)) {
        $errors['phone'] = 'Field Required';
    } elseif (!validate($phone, 6)) {
        $errors['phone'] = 'Invalid Phone Number';
    }

    if (count($errors) > 0) {
        print_r ($errors);
    } else {
        // db ..........
		echo "done" ;
    	$password = md5($password); 
		$sql = "insert into user (username,password,email,address,phone,role_id)values ('$name','$password','$email','$address','$phone',1)";
 		$operation =  mysqli_query($connect,$sql);
		if ($operation){
		}else{

			echo "error".mysqli_error($connect);
		}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<section class="u-align-center u-clearfix u-grey-10 u-section-1" id="carousel_25b3">
<div class="u-container-layout u-similar-container u-container-layout-1">

<div class="container">
  <h2>Create New Admin</h2>
  <form action = "<?php echo $_SERVER['PHP_SELF'] ;?> " method ="post">

  <div class="form-group">
    <label for="exampleInputTitle">name</label>
    <input type="text" class="form-control" id="InputTitle" name = "name" placeholder="Enter title" >
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">password</label>
    <input type="text" class="form-control" id="InputTitle" name = "password" placeholder="Enter title" >
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">email</label>
    <input type="text" class="form-control" id="InputTitle" name = "email" placeholder="Enter title" >
  </div>
  <div class="form-group">
    <label for="exampleInputTitle">address</label>
    <input type="text" class="form-control" id="InputTitle" name = "address" placeholder="Enter title" >
  </div>

  <div class="form-group">
    <label for="exampleInputTitle">phone</label>
    <input type="text" class="form-control" id="InputTitle" name = "phone" placeholder="Enter title" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br/>
</div>
</div>

</section>

</body>
</html>
<?php
require 'footer.php';
?>
